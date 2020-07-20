<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function add_student(){
		$data['maincontain'] = $this->load->view('add_student','',true);
		$this->load->view('pages/adminpage',$data);
	}

	public function addstudent_validation(){

	}

	public function manage_student(){

	}

}

?>
