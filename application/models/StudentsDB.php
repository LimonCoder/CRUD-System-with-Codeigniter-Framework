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


}
?>
