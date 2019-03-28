<?php
	class Bulletins_model extends CI_Model{
		
		public function __construct(){
			$this->load->database();			
		}

		public function getAll($org_id, $just_published = false, $page = 1){
			$QTD_PAGE = 5;

			$this->db->order_by('created_at', 'DESC');
			$offset = $page * $QTD_PAGE; 
			$this->db->limit($QTD_PAGE, $offset);
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

		public function search($org_id, $q){
			$this->db->order_by('created_at', 'DESC');
			$sql = "SELECT bulletins.id, bulletins.title, bulletins.subtitle, bulletins.image FROM bulletins JOIN sections ON bulletins.organization_id = ? AND bulletins.id = sections.bulletin_id  AND sections.content LIKE '%".   $this->db->escape_like_str($q)."%' ESCAPE '!' GROUP BY bulletins.id";
			$query = $this->db->query($sql, array($org_id));
			return $query->result();
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