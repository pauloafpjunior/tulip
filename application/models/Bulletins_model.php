<?php
	class Bulletins_model extends CI_Model{
		public function __construct(){
			$this->load->database();			
		}

		public function getAll(){
			$this->db->order_by('created_at', 'DESC');
			return $this->db->get('bulletins')->result_array();
		}

		

	}