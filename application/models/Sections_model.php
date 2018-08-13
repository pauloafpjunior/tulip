<?php
	class Sections_model extends CI_Model{
		public function __construct(){
			$this->load->database();			
		}

		public function getAll($bul_id){
			return $this->db->get_where('sections', array(
				'bulletin_id' => $bul_id
			))->result_array();
		}
	}