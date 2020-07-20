<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('StudentsDB');

	}


	public function index()
	{
		$this->login();
	}

	public function login(){
		$this->load->view('login');
	}

	public function loginValidation(){

		$config = array(
			array(
				'field' => 'email_address',
				'label' => 'Email Address',
				'rules' => 'required|valid_email',
				'errors' => array(
					'required' => 'Your Email Address empty',
					'valid_email' => 'Your Email Address Invaild'
				),

			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Your Password is Empty',
				),
			)
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == true){
			$email = $this->input->post("email_address");
			$password = $this->input->post("password");
			if ($this->StudentsDB->can_login($email,$password)){
				$user = array(
					"email" => $email,
					"logged_in" => true
				);
				$this->session->set_userdata($user);

//				redirect(base_url()."Student/deshboard");
				redirect("deshboard");

			}else{
				$this->session->set_flashdata('error', 'Your Email and Password Invaild');
				redirect(base_url()."Student/login");
			}


		}else{
			$this->index();
		}
	}

	public function deshboard(){

		if ($this->session->userdata("email") != ''){
			$data['deshboard'] = $this->load->view('deshboard','',true);
			$this->load->view('pages/adminpage',$data);
		}else{
			$this->load->view('login');
		}


	}
	public function logout(){
		if ($this->session->has_userdata('email')){
			$this->session->unset_userdata('email');
			$this->session->sess_destroy();

		}
		redirect(base_url()."Student/login");
	}

	public function add_student(){
		
	}
}
