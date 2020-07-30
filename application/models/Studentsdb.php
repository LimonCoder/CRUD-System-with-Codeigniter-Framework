<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studentsdb extends CI_Model {

	private $table_name = "add_student";
	private $select_colum = array("id","english_name","gender","religion","birth_date","image");
	private $order_colum = array("english_name","gender","religion","birth_date");

	public function can_login($email,$password){
		$this->db->where("email",$email);
		$this->db->where("password",$password);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function student_insert($data){
		$query = $this->db->insert("add_student",$data);
		return $query;

	}

	public function fatch_data(){
		$query = $this->db->get("add_student");
		return $query->result();
	}


	public function single_fetch_data($id){
		$this->db->where("id",$id);
		$query = $this->db->get("add_student");
		return $query->result_array() ;

	}

	public function delete_single_fetch($id){
		$this->db->where("id",$id);
		$this->db->delete("add_student");
	}

	public function update_single_fetch($data, $id){
		$this->db->where('id', $id);
		return  $this->db->update('add_student', $data);
	}



	//  server side datatables //
	public function make_query(){
		$this->db->select($this->select_colum);
		 $this->db->from($this->table_name);

		 if (isset($_POST['search']['value'])){
		 	$this->db->like("english_name",$_POST['search']['value']);
		 	$this->db->or_like("gender",$_POST['search']['value']);
		 	$this->db->or_like("religion",$_POST['search']['value']);
		 }

		 if (isset($_POST['order'])){
			 $this->db->order_by($this->select_colum[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		 }else{
		 	$this->db->order_by("id","DESC");
		 }

	}

	
	public function make_datable()
	{
		$this->make_query();
		if($_POST["length"] != -1)
		{
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_data()
	{
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();

	}
	public function get_all_data()
	{
		$this->db->select("*");
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}
	//  server side datatables //




}
?>
