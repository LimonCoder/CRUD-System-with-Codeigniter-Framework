<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studentsdb extends CI_Model {

	private $table_name = "add_student";
	private $select_colum = array("i.id","s.session_name","a.image","a.english_name", "a.gender","i.previous_school","a.id as sid");
	private $order_colum = array("a.english_name","a.gender","s.session_name","i.previous_school");

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

	public function student_insert($stduent_info,$academic_info){

		$this->db->trans_start();
		$this->db->insert("add_student",$stduent_info);
		$academic_info = array_merge($academic_info,array("student_id"=>$this->db->insert_id()));
		$this->db->insert("student_academic_info",$academic_info);
		$this->db->trans_complete();

		return $this->db->trans_status() ;




	}


	public function student_csvfile_insert($student_info,$academic_info){



		if (count($student_info) == count($academic_info) ){
			$this->db->trans_start();
			for($i = 0; $i<count($student_info); $i++ ){
				$this->db->insert("add_student",$student_info[$i]);
				$academic_info[$i] = array_merge($academic_info[$i],array("student_id"=>$this->db->insert_id()));
				$this->db->insert("student_academic_info",$academic_info[$i]);
			}
			$this->db->trans_complete();

			return  $this->db->trans_status();

		}else{
			return FALSE;
		}



	}


	public function fetch_data(){
		$query = $this->db->get("add_student");
		return $query->result();
	}


	public function single_fetch_data($id){
		$this->db->where("id",$id);
		$query = $this->db->get("add_student");
		return $query->result_array() ;

	}

	public function delete_single_fetch($id){
		$this->db->trans_start();
		$this->db->where("id",$id);
		$this->db->delete("add_student");
		$this->db->where("student_id",$id);
		$this->db->delete("student_academic_info");
		$this->db->trans_complete();
		return  $this->db->trans_status();

	}

	public function update_single_fetch($data, $id){
		$this->db->where('id', $id);
		return  $this->db->update('add_student', $data);
	}





	//  server side datatables //
	public function make_query(){
		$this->db->select($this->select_colum);
		$this->db->from('student_academic_info i');
		$this->db->join('add_student a', 'i.student_id = a.id');
		$this->db->join('session s', 'i.session_id = s.id');
		$this->db->where('s.is_current',1);

		 if (isset($_POST['search']['value'])){
		 	$this->db->group_start();
		 	$this->db->like("a.english_name",$_POST['search']['value']);
		 	$this->db->or_like("a.gender",$_POST['search']['value']);
		 	$this->db->or_like("s.session_name",$_POST['search']['value']);
		 	$this->db->or_like("i.previous_school",$_POST['search']['value']);
		 	$this->db->group_end();
		 }
		 if (isset($_POST['order'])){
			 $this->db->order_by($this->select_colum[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		 }else{
			 $this->db->order_by('i.id','desc');
		 }

	}

	
	public function make_datable()
	{
		$this->make_query();
		if (isset($_POST["length"])){
			if($_POST["length"] != -1)
			{
				$this->db->limit($_POST['length'], $_POST['start']);
			}
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
