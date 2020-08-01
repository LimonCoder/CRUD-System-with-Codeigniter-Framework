<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Studentsdb');
		$this->load->model('Settingsdb');
	}

	public function add_student(){
		if ($this->session->userdata("email") != ''){
			$session['session_values'] = $this->Settingsdb->get_session_name();
			$data['maincontain'] = $this->load->view('add_student',$session,true);
			$this->load->view('pages/adminpage',$data);
		}else{
			redirect(base_url()."home/login");
		}

	}


	public function addstudent_form_validation(){

		$student_info = array(
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
					'rules' => ''
				),
				array(
					'field' => 'religion',
					'label' => 'Religion',
					'rules' => 'required'
				)




		);
		$academic_info = array(
				array(
					'field' => 'session',
					'label' => 'Session',
					'rules' => 'required'
				),
				array(
					'field' => 'class',
					'label' => 'Class',
					'rules' => 'required'
				),
				array(
					'field' => 'section',
					'label' => 'Section',
					'rules' => 'required'
				),
				array(
					'field' => 'group',
					'label' => 'Group',
					'rules' => ''
				),
				array(
					'field' => 'previous_school',
					'label' => 'Previous School',
					'rules' => 'required'
				)

		);


			$image_config['upload_path']          = './assets/images/uploaded-images';
			$image_config['allowed_types']        = 'gif|jpg|png';
			$image_config['encrypt_name'] = true;
			$this->load->library('upload', $image_config);

			$this->form_validation->set_rules($student_info);
			$this->form_validation->set_rules($academic_info);

		if ($this->form_validation->run() == true)
		{
			$student_info = array(
				"english_name" => $this->input->post('english_name'),
				"bangla_name" => $this->input->post('bangla_name'),
				"gender" => $this->input->post('gender'),
				"birth_date" => $this->input->post('birth_date'),
				"birth_certificate_no" => $this->input->post('birth_certificate_no'),
				"blood_grp" => $this->input->post('blood_group'),
				"religion" => $this->input->post('religion'),
				"created_by_ip" => $_SERVER['REMOTE_ADDR']

			);
			// when image is selected
			if ($this->upload->do_upload('student_photo') == true){
				$student_info =  array_merge($student_info, array("image"=>$this->upload->data('file_name')));
			}

			$acdemic_info = array(
				"session_id" =>  $this->input->post('session'),
				"class_id" =>  $this->input->post('class'),
				"section_id" =>  $this->input->post('section'),
				"group_id" =>  $this->input->post('group'),
				"previous_school" =>  $this->input->post('previous_school')
			);




			if ($this->Studentsdb->student_insert($student_info,$acdemic_info)){
				redirect(base_url()."student/inserted");
			}else{
				redirect(base_url()."student/failed");
			}

		}else{
			$this->add_student();

		}


	}


	public function manage_student(){

		$data["maincontain"] = $this->load->view("manage_student",'',true);
		$this->load->view("pages/adminpage",$data);

	}


	public function get_student_info(){
		$serial_no = 1;
		$fetch_data = $this->Studentsdb->make_datable();

		$student_info = array();
		foreach ($fetch_data as $row){
			$sub_array = array();
			$sub_array[] = $serial_no++;
			$sub_array[] = $row->session_name;
			if ($row->image !== NULL)
			{
				$sub_array[] = '<img src="'.base_url().'assets/images/uploaded-images/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';
			}else
			{
				$sub_array[] = "";
			}
			$sub_array[] = $row->english_name;
			$sub_array[] = $row->gender;
			$sub_array[] = $row->previous_school;
			$sub_array[] = '<button type="button" name="update" id="update" data-id="'.$row->id.'" class="btn btn-warning">Edit</button>
							<button type="button" name="delete" id="delete" data-id="'.$row->id.'" class="btn btn-danger">Delete</button>
							';
			$student_info[] = $sub_array;
		}

		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->Studentsdb->get_all_data(),
			"recordsFiltered"     =>     $this->Studentsdb->get_filtered_data(),
			"data"                    =>     $student_info
		);

		echo json_encode($output);


	}

	public function get_single_student_info(){
		$id = $_POST['id'];
		echo json_encode($this->Studentsdb->single_fetch_data($id));
	}


	public function delete_student_info(){
			$id = $this->uri->segment(3);
			$this->Studentsdb->delete_single_fetch($id);
			redirect(base_url()."student/manage_student");
	}

	public function student_info_edit(){
		$data['maincontain'] = $this->load->view('update_student','',true);
		$this->load->view('pages/adminpage',$data);
	}

	public function student_info_edit_action(){
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

			if ($this->Studentsdb->update_single_fetch($student_info,$this->input->post('id_no'))){
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
