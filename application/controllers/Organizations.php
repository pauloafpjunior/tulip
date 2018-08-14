<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizations extends CI_Controller {
	
	public function index() 
	{
		$data['title'] = 'My organizations';
		$data['organizations'] = $this->organizations_model->getAll();
		$this->load->view('templates/header');
		$this->load->view('organizations/index', $data);
		$this->load->view('templates/footer');
	}

	public function create() 
	{
		$data['title'] = 'New organization';
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
		
		redirect('bulletins/index');
	}

	public function exit() 
	{
		$this->session->unset_userdata('org_id');
		$this->session->unset_userdata('org_name');
		$this->index();
	}

	public function save() 
	{
		$this->form_validation->set_rules('name', 'Organization name', 'required|min_length[3]');
		if ($this->form_validation->run() === FALSE) {
			$this->create();
		} else {
			// Upload Image
			$config['upload_path'] = './assets/images/organizations/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image')){				
				$data = array('upload_data' => $this->upload->data());
				$this->organizations_model->save($this->getOrganizationFromInput($data['upload_data']['file_name']));				
			} else {
				$this->organizations_model->save($this->getOrganizationFromInput());				
			}
			redirect('organizations/index');
		}
	}

	private function getOrganizationFromInput($image = "noimage.png") {
		$organization = new stdClass();
		$organization->id = null;
		$organization->name = $this->input->post('name');
		$organization->description = $this->input->post('description');
		$organization->created_at = (new DateTime)->format('Y-m-d H:i:s');
		$organization->image = $image;
		return $organization;
	}

	
}
