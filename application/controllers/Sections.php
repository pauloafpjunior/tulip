<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends CI_Controller {

	private $BASE_PATH_IMAGES = 'assets/images/sections/';

	public function index() 
	{
		// Check bulletin login
		if(!$this->session->userdata('bul_id') || !$this->session->userdata('bul_title')){
			redirect('bulletins/index');
		}

		$data['title'] = 'Seções do boletim';
		$data['sections'] = $this->sections_model->getAll($this->session->userdata('bul_id'));
		$this->load->view('templates/header');
		$this->load->view('sections/index', $data);
		$this->load->view('templates/footer');		
	}

	
	public function create() 
	{
		$data['title'] = 'Nova seção';
		
		$this->load->view('templates/header');
		$this->load->view('sections/create', $data);
		$this->load->view('templates/footer');
	}

	public function edit($sec_id = NULL) 
	{
		if (!$sec_id || !is_numeric($sec_id)) {
			show_404();
		}
		
		$data['sec'] = $this->sections_model->getSection($sec_id);
		if (!$data['sec']) {
			show_404();
		}

		$data['title'] = 'Editar seção';
		$this->load->view('templates/header');
		$this->load->view('sections/edit', $data);
		$this->load->view('templates/footer');
	}

	public function remove($sec_id = NULL) 
	{
		if (!$sec_id || !is_numeric($sec_id)) {
			show_404();
		}
		
		$this->sections_model->remove($sec_id);
		$this->index();
	}

	public function save() 
	{
		$this->form_validation->set_rules('title', 'Título da Seção', 'required|min_length[3]', array(
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
			$config['max_height'] = '2000';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('icon')){				
				$data = array('upload_data' => $this->upload->data());
				$image_path = base_url() . $this->BASE_PATH_IMAGES . $data['upload_data']['file_name'];
				$this->sections_model->save($this->getSectionFromInput($image_path));				
			} else {
				if ($this->input->post('image_path')) {
                    $this->sections_model->save($this->getSectionFromInput($this->input->post('image_path')));				
				} else {
					$image_path = base_url() . $this->BASE_PATH_IMAGES . 'noimage.png';
					$this->sections_model->save($this->getSectionFromInput($image_path));				
				}
			}
			redirect('sections/index');			
		}
	}

	private function getSectionFromInput($image_path) {
		$section = new stdClass();
		if ($this->input->post('id')) {
			$section->id = $this->input->post('id');
		} else {
			$section->id = null;
		}
		$section->title = $this->input->post('title');
		$section->content = $this->input->post('content');
		$section->bulletin_id = $this->session->userdata('bul_id');
		$section->icon = $image_path;
		return $section;		
	}
}
