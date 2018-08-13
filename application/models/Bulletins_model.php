<?php
	class Bulletins_model extends CI_Model{
		public function __construct(){
			$this->load->database();			
		}

		public function getAll($org_id){
			$this->db->order_by('created_at', 'DESC');
			return $this->db->get_where('bulletins', array(
				'organization_id' => $org_id
			))->result_array();
		}

		

	}