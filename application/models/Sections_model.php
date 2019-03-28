<?php
	class Sections_model extends CI_Model{
		public function __construct(){
			$this->load->database();			
		}

		public function save($sec){
			if ($sec->id and $sec->id != null) {
				$this->db->where('id', $sec->id);
				return $this->db->update('sections', $sec);
			} else {
				return $this->db->insert('sections', $sec);
			}
		}

		public function getAll($bul_id){
			return $this->db->get_where('sections', array(
				'bulletin_id' => $bul_id
			))->result_array();
		}

		public function getSection($id){
			$query = $this->db->get_where('sections', array('id' => $id));
			return $query->row();
		}

		public function remove($id){
			$this->db->where('id', $id);
			return $this->db->delete('sections');
		}
	}