<?php
	class Organizations_model extends CI_Model{
		public function __construct(){
			$this->load->database();			
		}

		public function save($org){
			if ($org->id) {
				$this->db->where('id', $org->id);
				return $this->db->update('organizations', $org);
			} else {
				return $this->db->insert('organizations', $org);
			}
		}

		public function getAll($query = null){
			$this->db->order_by('last_updated', 'DESC');
			
			if ($query) {
				$this->db->like('name', $query);
			}

			return $this->db->get('organizations')->result_array();
		}

		public function getByUser($user_id, $query = null){
			$this->db->order_by('last_updated', 'DESC');
			$this->db->where('user_id', $user_id);
			
			if ($query) {
				$this->db->like('name', $query);
			}

			return $this->db->get('organizations')->result_array();
		}

		public function getOrganization($id){
			$query = $this->db->get_where('organizations', array('id' => $id));
			return $query->row();
		}

	}