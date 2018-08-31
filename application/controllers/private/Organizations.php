<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizations extends CI_Controller {

	private $BASE_PATH_IMAGES = 'assets/images/organizations/';
	
	public function index() 
	{
		// Check organization login
		if (!$this->session->userdata('user_id') || !$this->session->userdata('user_name')) {
			redirect('users/index');
		}

		$data['title'] = 'Minhas organizações';
		$data['organizations'] = $this->organizations_model->getByUser($this->session->userdata('user_id'));
		$this->load->view('templates/header');
		$this->load->view('organizations/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($org_id = null) 
	{
		if (!$org_id || !is_numeric($org_id)) {
			show_404();
		}
		
		$data['title'] = 'Organização';
		$data['org'] = $this->organizations_model->getOrganization($org_id);
		
		if (!$data['org']) {
            show_404();
        }

		$this->load->view('templates/header');
		$this->load->view('organizations/view', $data);
		$this->load->view('templates/footer');
	}

	public function create() 
	{
		$data['title'] = 'Nova organização';
		$this->load->view('templates/header');
		$this->load->view('organizations/create', $data);
		$this->load->view('templates/footer');
	}

	public function entry($org_id = NULL) 
	{
		if (!$org_id || !is_numeric($org_id)) {
			show_404();
		}
		
		$data['organization'] = $this->organizations_model->getOrganization($org_id);
		if (!$data['organization']) {
			show_404();
		}

		$this->session->set_userdata('org_id', $data['organization']->id);
		$this->session->set_userdata('org_name', $data['organization']->name);
		
		redirect('private/bulletins/index');
	}

	public function edit($org_id = NULL) 
	{
		if (!$org_id || !is_numeric($org_id)) {
			show_404();
		}
		
		$data['org'] = $this->organizations_model->getOrganization($org_id);
		if (!$data['org']) {
			show_404();
		}

		$data['title'] = 'Editar organização';
		$this->load->view('templates/header');
		$this->load->view('organizations/edit', $data);
		$this->load->view('templates/footer');
	}

	public function exit_org()
	{
		$this->session->unset_userdata('org_id');
		$this->session->unset_userdata('org_name');
		$this->index();
	}

	public function save() 
	{
		$this->form_validation->set_rules('name', 'Nome da Organização', 'required|min_length[3]',
			array(
				'required' => 'Você deve informar o %s.',
				'min_length' => 'O %s deve conter pelo menos %d caracteres.',
			));
		if ($this->form_validation->run() === FALSE) {
			if ($this->input->post('id')) {
				$this->edit($this->input->post('id'));
			} else {
				$this->create();
			}
		} else {			

			// Upload Image
			$config['upload_path'] = './' . $this->BASE_PATH_IMAGES;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1024';
			$config['max_width'] = '2000';
			$config['file_name'] = 'ORG_USER_'.$this->session->userdata('user_id').'_'.(new DateTime)->format('YmdHis');
			$config['max_height'] = '2000';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image')){				
				$data = array('upload_data' => $this->upload->data());
				$image_path = base_url() . $this->BASE_PATH_IMAGES . $data['upload_data']['file_name'];
				$this->organizations_model->save($this->getOrganizationFromInput($image_path));
			} else {
				if ($this->input->post('image_path')) {
					$this->organizations_model->save($this->getOrganizationFromInput($this->input->post('image_path')));				
				} else {
					$image_path = base_url() . $this->BASE_PATH_IMAGES . 'noimage.png';
					$this->organizations_model->save($this->getOrganizationFromInput($image_path));				
				}				
			}
			redirect('private/organizations/index');
		}
	}

	private function getOrganizationFromInput($image_path) {
		$organization = new stdClass();
		if ($this->input->post('id')) {
			$organization->id = $this->input->post('id');
		} else {
			$organization->id = null;
		}
		$organization->name = $this->input->post('name');
		$organization->description = $this->input->post('description');
		$organization->last_updated = (new DateTime)->format('Y-m-d H:i:s');
		$organization->image = $image_path;
		$organization->user_id = $this->session->userdata('user_id');
		return $organization;
	}

	
}
