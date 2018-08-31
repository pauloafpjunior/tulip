<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	private $BASE_PATH_IMAGES = 'assets/images/users/';
	
	public function index() 
	{ 
		$data['title'] = 'Login';
		$this->load->view('templates/header');
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}	

	public function login() 
	{
		$this->form_validation->set_rules('email', 'Endereço de Email', 'required',
			array(
				'required' => 'Você deve informar o %s.'
		));
		$this->form_validation->set_rules('password', 'Senha', 'required',
		array(
			'required' => 'Você deve informar a %s.'
		));		

		if ($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$data['user'] = $this->users_model->getUserLogin($email, $password);

			if (!$data['user']) {
				$this->index();
			} else {
				$this->session->set_userdata('user_id', $data['user']->id);
				$this->session->set_userdata('user_name', $data['user']->name);
		
				redirect('private/organizations/index');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->index();
	}
}