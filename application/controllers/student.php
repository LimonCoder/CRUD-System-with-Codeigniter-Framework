<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('StudentsDB');
	}

	public function add_student(){
		$data['maincontain'] = $this->load->view('add_student','',true);
		$this->load->view('pages/adminpage',$data);
	}

	public function addstudent_form_validation(){

		$config = array(
			array(
				'field' => 'english_name',
				'label' => 'English Name',
				'rules' => 'required'

			),
			array(
				'field' => 'bangla_name',
				'label' => 'Bangla Name',
				'rules' => ''

			),
			array(
				'field' => 'gender',
				'label' => 'Gender',
				'rules' => 'required'
			),
			array(
				'field' => 'birth_date',
				'label' => 'Birth Date',
				'rules' => 'required'
			),
			array(
				'field' => 'birth_certificate_no',
				'label' => 'Birth Certificate',
				'rules' => 'required|exact_length[13]'
			),
			array(
				'field' => 'blood_group',
				'label' => 'Blood Group',
				'rules' => ''
			),
			array(
				'field' => 'religion',
				'label' => 'Religion',
				'rules' => 'required'
			),array(
				'field' => 'previous_school',
				'label' => 'Previous School',
				'rules' => ''
			)

		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == true){
			$data = array(
				"english_name" => $this->input->post('english_name'),
				"bangla_name" => $this->input->post('bangla_name'),
				"gender" => $this->input->post('gender'),
				"birth_date" => $this->input->post('birth_date'),
				"birth_certificate_no" => $this->input->post('birth_certificate_no'),
				"blood_grp" => $this->input->post('blood_group'),
				"religion" => $this->input->post('religion'),
				"previous_school" => $this->input->post('previous_school')
			);
			if ($this->StudentsDB->student_insert($data)){
				redirect(base_url()."student/inserted");
			}else{
				echo "Unsuccessfully data";
			}

		}else{
			$this->add_student();
		}


	}

	public function manage_student(){

	}

	public function inserted(){
		$data['maincontain'] = $this->load->view('add_student','',true);
		$this->load->view('pages/adminpage',$data);
	}

}

?>
