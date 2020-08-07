<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sectiondb extends CI_Model
{

	private $select_coloum = array("id", "section_name","sorting");

	public function section_insert($data){

		$query = $this->db->insert("section",$data);
		return $query;
	}

	public function make_qurey(){
		$this->db->select($this->select_coloum);
		$this->db->from("section");

		if (isset($_POST['search']['value'])){
			$this->db->like("section_name",$_POST['search']['value']);
		}

		if (isset($_POST['order'])){
			$this->db->order_by($this->select_coloum[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		}else{
			$this->db->order_by("sorting","ASC");
		}

	}

	public function section_make_datable()
	{
		$this->make_qurey();
		if($_POST["length"] != -1)
		{
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function get_filtered_data()
	{
		$this->make_qurey();
		$query = $this->db->get();
		return $query->num_rows();

	}
	public function get_all_data()
	{
		$this->db->select("*");
		$this->db->from("section");
		return $this->db->count_all_results();
	}


	public function get_section(){
		$query = $this->db->get("section");
		return $query->result();
	}

	public function get_section_by_class($id){
		$this->db->select(array("s.section_name", "s.id"));
		$this->db->from("class_wtih_section_group w");
		$this->db->join("class c","w.class_id = c.id");
		$this->db->join("section s","w.section_id = s.id");
		$this->db->where("w.class_id",$id);
		$query = $this->db->get();
		return $query->result();

	}

}

?>
