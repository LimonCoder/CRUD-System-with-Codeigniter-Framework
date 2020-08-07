<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classdb extends CI_Model
{

	public function class_insert($data,$section){
		$this->db->trans_start();
		$this->db->insert('class', $data);

		if (!empty($section)) {
			for ($i = 0; $i < count($section); $i++) {
				$section[$i] = array_merge($section[$i], array("class_id" => $this->db->insert_id()));
			}
			$this->db->insert_batch('class_wtih_section_group', $section);
		}
		$this->db->trans_complete();
		return $this->db->trans_status();


	}

	public function get_class(){
		$query = $this->db->get('class');
		return $query->result();
	}



}

?>
