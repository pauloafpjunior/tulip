<?php
	class Bulletins_model extends CI_Model{
		public function __construct(){
			$this->load->database();			
		}

		public function getAll($org_id, $just_published = false){
			$this->db->order_by('created_at', 'DESC');
			if ($just_published) {
				$query = $this->db->get_where('bulletins', array(
					'organization_id' => $org_id,
					'published' => '1'
				));
			} else {
				$query = $this->db->get_where('bulletins', array(
					'organization_id' => $org_id
				));
			}
			return $query->result_array();
		}

		public function save($bulletin){
			if ($bulletin->id) {
				$this->db->where('id', $bulletin->id);
				return $this->db->update('bulletins', $bulletin);
			} else {
				return $this->db->insert('bulletins', $bulletin);
			}
		}

		public function getBulletin($id, $just_published = false) {
			if ($just_published) {
				$query = $this->db->get_where('bulletins', array(
					'id' => $id,
					'published' => '1'
				));
			} else {
				$query = $this->db->get_where('bulletins', array(
					'id' => $id
				));
			}
			return $query->row();
		}
	}