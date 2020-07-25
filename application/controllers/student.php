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
		if ($this->session->userdata("email") != ''){
			$data['maincontain'] = $this->load->view('add_student','',true);
			$this->load->view('pages/adminpage',$data);
		}else{
			redirect(base_url()."home/login");
		}

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
				'rules' => 'required|exact_length[13]|is_unique[add_student.birth_certificate_no]'
			),
			array(
				'field' => 'blood_group',
				'label' => 'Blood Group',
				'rules' => '' // callback function callback_(function_name)
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

			$image_config['upload_path']          = './assets/images/uploaded-images';
			$image_config['allowed_types']        = 'gif|jpg|png';
			$image_config['encrypt_name'] = true;
			$this->load->library('upload', $image_config);

			$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == true){

			$student_info = array(
				"english_name" => $this->input->post('english_name'),
				"bangla_name" => $this->input->post('bangla_name'),
				"gender" => $this->input->post('gender'),
				"birth_date" => $this->input->post('birth_date'),
				"birth_certificate_no" => $this->input->post('birth_certificate_no'),
				"blood_grp" => $this->input->post('blood_group'),
				"religion" => $this->input->post('religion'),
				"previous_school" => $this->input->post('previous_school')

			);
			// when image is selected
			if ($this->upload->do_upload('student_photo') == true){
				$student_info =  array_merge($student_info, array("image"=>$this->upload->data('file_name')));
			}


			if ($this->StudentsDB->student_insert($student_info)){
				redirect(base_url()."student/inserted");
			}else{
				redirect(base_url()."student/failed");
			}

		}else{

			$this->add_student();
		}


	}


	public function manage_student(){
		$info['student_info'] = $this->StudentsDB->fatch_data();
		$data['maincontain'] = $this->load->view('manage_student',$info,true);
		$this->load->view('pages/adminpage',$data);


	}


	public function delete_student_info(){
			$id = $this->uri->segment(3);
			$this->StudentsDB->delete_single_fetch($id);
			redirect(base_url()."student/manage_student");
	}

	public function student_info_edit(){
		$data['maincontain'] = $this->load->view('update_student','',true);
		$this->load->view('pages/adminpage',$data);
	}

	public function student_info_edit_action(){
		$id = $_POST['id'];
		echo json_encode($this->StudentsDB->single_fetch_data($id));
	}

	public function update_form_validation(){
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
				'rules' => '' // callback function callback_(function_name)
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

		$image_config['upload_path']          = './assets/images/uploaded-images';
		$image_config['allowed_types']        = 'gif|jpg|png';
		$image_config['encrypt_name'] = true;
		$this->load->library('upload', $image_config);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == true){

			$student_info = array(
				"english_name" => $this->input->post('english_name'),
				"bangla_name" => $this->input->post('bangla_name'),
				"gender" => $this->input->post('gender'),
				"birth_date" => $this->input->post('birth_date'),
				"birth_certificate_no" => $this->input->post('birth_certificate_no'),
				"blood_grp" => $this->input->post('blood_group'),
				"religion" => $this->input->post('religion'),
				"previous_school" => $this->input->post('previous_school')

			);
			// when image is selected
			if ($this->upload->do_upload('student_photo') == true){
				$student_info =  array_merge($student_info, array("image"=>$this->upload->data('file_name')));
			}

			if ($this->StudentsDB->update_single_fetch($student_info,$this->input->post('id_no'))){
				redirect(base_url()."student/student_info_edit/".$this->input->post('id_no'));
			}else{

			}

		}else{

			$this->student_info_edit();
		}
	}



	public function inserted(){
		$data['maincontain'] = $this->load->view('add_student','',true);
		$this->load->view('pages/adminpage',$data);
	}






}

?>
