<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settingsdb extends CI_Model
{
	private $select_colum = array("id","session_name","is_current");

	public function session_save($data){

		if ($data['is_current'] === 1){
			$this->db->trans_start();
			$this->db->insert("session",$data);
			$this->db->where("id !=",$this->db->insert_id());
			$this->db->update("session",array("is_current"=>0));
			$this->db->trans_complete();
			return $this->db->trans_status();
		}else
			{
				$query = $this->db->insert("session",$data);
				return $query;
			}



	}

	public function session_edit_info($id){
		$this->db->where("id",$id);
		$query = $this->db->get("session");
		if ($query->num_rows() >0){
			$row = $query->result_array();
			return $row[0];

		}
	}
	public function session_update($data,$id){

		if ($data['is_current'] == 1){
			$this->db->trans_start();
			$this->db->where("id",$id);
			$this->db->update("session",$data);

			$this->db->where("id !=",$id);
			$this->db->update("session",array("is_current"=>0));

			$this->db->trans_complete();
			return $this->db->trans_status();
		}else{
			$this->db->where("id",$id);
			$query = $this->db->update("session",$data);
			return $query;
		}

	}


	public function session_make_query(){
		$this->db->select($this->select_colum);
		$this->db->from("session");

		if (isset($_POST['search']['value'])){
			$this->db->like("session_name",$_POST['search']['value']);
		}

		if (isset($_POST['order'])){
			$this->db->order_by($this->select_colum[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		}else{
			$this->db->order_by("id","DESC");
		}
	}
	public function session_make_datable()
	{
		$this->session_make_query();
		if($_POST["length"] != -1)
		{
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function get_filtered_data()
	{
		$this->session_make_query();
		$query = $this->db->get();
		return $query->num_rows();

	}
	public function get_all_data()
	{
		$this->db->select("*");
		$this->db->from("session");
		return $this->db->count_all_results();
	}



}
