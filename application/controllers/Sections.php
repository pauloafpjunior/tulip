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

	
	
}
