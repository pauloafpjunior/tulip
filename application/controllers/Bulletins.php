<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bulletins extends CI_Controller {
	public function index($org_id = NULL) 
	{
		if (!$org_id) {
			redirect('organizations');
		} else {
			$data['title'] = 'Bulletins';
			$this->load->view('templates/header');
			$this->load->view('bulletins/index', $data);
			$this->load->view('templates/footer');
		}
	}

	
}
