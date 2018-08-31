<?php
	class Users_model extends CI_Model{
		public function __construct(){
			$this->load->database();			
		}

		public function getUserLogin($email, $password){
			$query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
			return $query->row();
		}
	}