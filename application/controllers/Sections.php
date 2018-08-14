<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends CI_Controller {
	public function index() 
	{
		// Check bulletin login
		if(!$this->session->userdata('bul_id') || !$this->session->userdata('bul_title')){
			redirect('bulletins/index');
		}

		$data['title'] = 'Sections';
		$data['sections'] = $this->sections_model->getAll($this->session->userdata('bul_id'));
		$this->load->view('templates/header');
		$this->load->view('sections/index', $data);
		$this->load->view('templates/footer');		
	}

	
	public function create() 
	{
		$data['title'] = 'New section';
		
		$this->load->view('templates/header');
		$this->load->view('sections/create', $data);
		$this->load->view('templates/footer');
	}

	public function save() 
	{
		$this->form_validation->set_rules('title', 'Section title', 'required|min_length[3]');
		if ($this->form_validation->run() === FALSE) {
			$this->create();
		} else {
			// Upload Image
			$config['upload_path'] = './assets/images/sections/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('icon')){				
				$data = array('upload_data' => $this->upload->data());
				$this->sections_model->save($this->getSectionFromInput($data['upload_data']['file_name']));				
			} else {
				$this->sections_model->save($this->getSectionFromInput());				
			}
			redirect('sections/index');			
		}
	}

	private function getSectionFromInput($icon = "noimage.png") {
		$section = new stdClass();
		$section->id = null;
		$section->title = $this->input->post('title');
		$section->content = $this->input->post('content');
		$section->bulletin_id = $this->session->userdata('bul_id');
		$section->icon = $icon;
		return $section;		
	}
}
