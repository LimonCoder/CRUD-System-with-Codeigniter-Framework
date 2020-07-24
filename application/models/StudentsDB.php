<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentsDB extends CI_Model {

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




}
?>
