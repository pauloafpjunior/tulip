<?php
	class Organizations_model extends CI_Model{
		public function __construct(){
			$this->load->database();			
		}

		public function save($org){
			if ($org['id']) {
				$this->db->where('id', $org['id']);
				return $this->db->update('organizations', $org);
			} else {
				return $this->db->insert('organizations', $org);
			}
		}

		public function getAll(){
			$this->db->order_by('last_updated', 'DESC');
			return $this->db->get('organizations')->result_array();
		}

		public function getOrganization($id){
			$query = $this->db->get_where('organizations', array('id' => $id));
			return $query->row();
		}

	}