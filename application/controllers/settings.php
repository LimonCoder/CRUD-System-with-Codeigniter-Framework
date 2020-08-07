<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Settingsdb');
		$this->load->model('Sectiondb');
		$this->load->model('Classdb');

	}

//----------- 	 Start Session	-----------  //
	public function session()
	{
		if ($this->session->userdata("email") != '')
		{
			$data['maincontain'] = $this->load->view('settings/session','',true);
			$this->load->view('pages/adminpage',$data);
		}else{
			$this->load->view("login");
		}

	}
	public function add_session()
	{

		$this->form_validation->set_rules("session_name","Session","required|numeric|is_unique[session.session_name]");
		$this->form_validation->set_rules("is_current","Is current","");

		if ($this->form_validation->run() === true)
		{

			$session_values = array(
				"session_name"=> $this->input->post("session_name"),
				"is_current"=> ($this->input->post("is_current") === NULL)?0:1

			);

			if ($this->Settingsdb->session_save($session_values)){

				echo json_encode(array(TRUE));
			}else
			{
				echo json_encode(array(FALSE));
			}

		}else{
			$erros_array = array(
				"session_name_error" => form_error('session_name')
			);

			echo json_encode($erros_array);
		}

	}
	public function session_list(){

		$serial_no = 1;
		$fetch_data = $this->Settingsdb->session_make_datable();

		$student_info = array();
		foreach ($fetch_data as $row){
			$sub_array = array();
			$sub_array[] = $serial_no++;
			$sub_array[] = $row->session_name;
			$sub_array[] = ($row->is_current == 1)?'<label class="label label-primary" style="font-size:12px;">Current</label>':'';
			$delete_button = ($row->is_current == 1)?'<button type="button" name="delete_session" id="is_current_session" class="btn btn-danger btn-xs">Delete</button>':'<button type="button" name="delete_session" id="delete_session" data-id="'.$row->id.'" class="btn btn-danger btn-xs">Delete</button>';
			$sub_array[] = '<button type="button" name="update_session" id="update_session" data-id="'.$row->id.'" class="btn btn-warning btn-xs"  >Edit</button> '.$delete_button;
			$student_info[] = $sub_array;
		}

		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->Settingsdb->get_all_data(),
			"recordsFiltered"     =>     $this->Settingsdb->get_filtered_data(),
			"data"                    =>     $student_info
		);

		echo json_encode($output);
	}
	public function session_edit(){

		$id = $this->input->post('id');

		$result = $this->Settingsdb->session_edit_info($id);

		echo json_encode($result);

	}
	public function session_edit_action(){

		$id = $this->input->post("row_id");

		$this->form_validation->set_rules("update_session_name","Session","required|numeric");
		$this->form_validation->set_rules("update_is_current","Is current","");


		if ($this->form_validation->run() === true)
		{

			$session_values = array(
				"session_name"=> $this->input->post("update_session_name"),
				"is_current"=> ($this->input->post("update_is_current") === NULL)?0:1

			);
			if ($this->Settingsdb->session_update($session_values,$id)){
				echo json_encode(array(TRUE));
			}else{
				echo json_encode(array(FALSE));
			}



		}else{
			$erros_array = array(
				"update_session_name_error" => form_error('update_session_name')
			);

			echo json_encode($erros_array);
		}




	}
	public function session_delete_action(){

		$id = $_POST['id'];

		if ($this->Settingsdb->single_session_delete($id))
		{
			echo json_encode(array("TRUE"));
		}else{
			echo json_encode(array("FALSE"));
		}

	}
   //----------- 	 End Session	-----------  //


	//----------- start section -----------//
	public function section()
	{
		if ($this->session->userdata("email") != '')
		{
			$data['maincontain'] = $this->load->view('settings/section','',true);
			$this->load->view('pages/adminpage',$data);
		}else{
			$this->load->view("login");
		}
	}
	public function add_section()
	{

		$this->form_validation->set_rules('section_name', 'Section Name', 'required|is_unique[section.section_name]');


		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				"section_name"=> $_POST['section_name'],
				"sorting"=> $_POST['sorting']
			);

			echo json_encode($this->Sectiondb->section_insert($data));
		}
		else
		{
			echo json_encode(array("section_name_error"=> form_error('section_name')));
		}


	}
	public function section_list()
	{
		$serial_no = 1;
		$fetch_data = $this->Sectiondb->section_make_datable();

		$student_info = array();
		foreach ($fetch_data as $row){
			$sub_array = array();
			$sub_array[] = $serial_no++;
			$sub_array[] = $row->section_name;
			$sub_array[] = $row->sorting;
			$sub_array[] = '<button type="button" name="update_section" id="update_section" style="margin-right:3px;" data-id="'.$row->id.'" class="btn btn-warning btn-xs"  >Edit</button><button type="button" name="delete_section"  id="delete_section" class="btn btn-danger btn-xs" data-id="'.$row->id.'">Delete</button>';
			$student_info[] = $sub_array;
		}

		$output = array(
			"draw"                    =>     intval($_POST["draw"]),
			"recordsTotal"          =>      $this->Sectiondb->get_all_data(),
			"recordsFiltered"     =>     $this->Sectiondb->get_filtered_data(),
			"data"                    =>     $student_info
		);

		echo json_encode($output);
	}
	//-----------  end section ---------------------- //


	public function student_class(){
		$values['session_data'] = $this->Sectiondb->get_section();

		$data['maincontain'] = $this->load->view('settings/class',$values,true);

		$this->load->view('pages/adminpage',$data);
	}

	public function add_class(){
		$section_info = array();

		$this->form_validation->set_rules('class_name', 'Class Name', 'required|is_unique[class.class_name]');

		if ($this->form_validation->run() == TRUE)
		{
			if (isset($_POST['section']))
			{
				for ($i = 0; $i <count($_POST['section']); $i++)
				{

					$class_info = array(
						"class_name" => $_POST['class_name'],
						"is_sorting" => $_POST['class_sorting']

					);
					$section_info[] = array(
						"section_id" => $_POST['section'][$i]
					);

				}

			}else{
				$class_info = array(
					"class_name" => $_POST['class_name'],
					"is_sorting" => $_POST['class_sorting']
				);

			}

			$res = $this->Classdb->class_insert($class_info,$section_info);

			echo json_encode(array("key"=>$res));
		}
		else
		{
			echo json_encode(array("class_name_error"=> form_error("class_name")));
		}
		exit();









	}






}
