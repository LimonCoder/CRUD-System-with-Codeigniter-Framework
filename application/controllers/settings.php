<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Settingsdb');

	}
//	 Start Session	 //
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
			$delete_button = ($row->is_current == 1)?'<button type="button" name="delete_session" id="is_current_session" class="btn btn-danger">Delete</button>':'<button type="button" name="delete_session" id="delete_session" data-id="'.$row->id.'" class="btn btn-danger">Delete</button>';
			$sub_array[] = '<button type="button" name="update_session" id="update_session" data-id="'.$row->id.'" class="btn btn-warning"  >Edit</button> '.$delete_button;
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

//	 End Session	 //



}
