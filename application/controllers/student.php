<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ .'../../libraries/vendor/autoload.php';


class student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library("excel");
		$this->load->library("Csvimport");
		$this->load->model('Studentsdb');
		$this->load->model('Settingsdb');
		$this->load->model('Sectiondb');
		$this->load->model('Classdb');
	}

	public function add_student(){
		if ($this->session->userdata("email") != ''){
			$info['session_values'] = $this->Settingsdb->get_session_name();
			$info['class_values'] = $this->Classdb->get_class();

			$data['maincontain'] = $this->load->view('add_student',$info,true);
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
			$sub_array[] = '<button type="button" name="update" id="update" data-id="'.$row->sid.'" class="btn btn-warning btn-xs">Edit</button>
							<button type="button" name="delete" id="delete" data-id="'.$row->sid.'" class="btn btn-danger btn-xs">Delete</button>
							<button type="button" name="student_view" id="student_view" data-id="'.$row->sid.'" class="btn btn-primary btn-xs">View</button>
							<button type="button" name="student_print" id="student_print" data-id="'.$row->sid.'" class="btn btn-darker-1 btn-xs">Print</button>
							
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
		$id = $_POST['deleteid'];
	  $results = $this->Studentsdb->delete_single_fetch($id);
	  echo $results;

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

	public function csvfile()
	{
		$data['session_name'] = $this->Settingsdb->get_session_name();
		$data['maincontain'] = $this->load->view('csvfile',$data,true);

		$this->load->view('pages/adminpage',$data);
	}

	public function checking_csvfile(){
		$line = 1;
		$csv_info = $this->csvimport->get_array($_FILES['csv_file']['tmp_name']);


		foreach ($csv_info as $row){
			++$line;
			if (is_numeric($row['english_name'])){
				echo "<h5 style='color: red'>[English_Name] only charecter ! error line : $line<h5>";
			}
			if (is_numeric($row['bangla_name'])){
				echo "<h5 style='color: red'>[bangla_name] only charecter ! error line : $line<h5>";
			}
			if (!is_numeric($row['gende'])){
				echo "<h5 style='color: red'>[gender] only number ! error line : $line<h5>";
			}else{
				if (!in_array($row['gende'],array("1","2"))){
					echo "<h5 style='color: red'>[gender] Male = 1 and Female = 2 ! error line : $line<h5>";
				}
			}






		}





	}

	public function process_csv(){


		$info = $this->csvimport->get_array($_FILES['csv_file']['tmp_name']);



		foreach ($info as $row){

			if ($row['gende'] == 1){
				$gender = "Male";
			}else{
				$gender = "Female";
			}

			if ($row['eligio'] ==1) {
				$religion = "Islam";
			}elseif ($row['eligio'] == 2){
				$religion = "Hindu";
			}elseif ($row['eligio'] == 3){
				$religion = "Christhan";
			}

			$student_info[] = array(
				'english_name' => $row['english_name'],
				'bangla_name' => $row['bangla_name'],
				'gender' => $gender,
				'birth_date' => $row['birth_date'],
				'religion' =>$religion

			);
			$academic_info[] = array(
				"session_id" => $_POST['session_id'],
				"class_id" => $row['class'],
				"section_id" => $row['sectio'],
				"group_id" => $row['grp']
			);


		}

	   echo $this->Studentsdb->student_csvfile_insert($student_info,$academic_info);








	}

	public function student_info_export_excel()
	{
		$object = new PHPExcel();
		$object->setActiveSheetIndex(0);
		$table_columns = array("Session", "Name", "Gender", "Perious_school");
		$column = 0;

		foreach($table_columns as $field)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$column++;
		}

		$student_data = $this->Studentsdb->make_datable();

		$excel_row = 2;

		foreach($student_data as $row)
		{
			$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->session_name );
			$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->english_name);
			$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->gender );
			$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->previous_school);
			$excel_row++;
		}

		$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Student_Information.xlsx"');
		$object_writer->save('php://output');

	}

	public function student_info_export_pdf(){

	}

	public function get_sectionByclass(){
		$id = $_POST['classid'];
		$res =$this->Sectiondb->get_section_by_class($id);

		$output ='<option value="">Select</option>';
		foreach ($res as $row){
			$output .= '<option value="'.$row->id.'">'.$row->section_name.'</option>';
		}

		echo $output;

	}

	public function view(){
		$sid = $this->uri->segment(3);
		$data['single_info'] = $this->Studentsdb->single_fetch_data($sid);
		$this->load->view("single_student_view",$data);
	}

	public function student_print(){

		$html = $this->load->view('student_print',[],true);

		$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];

		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];


		$mpdf = new \Mpdf\Mpdf([
			'margin_top' => 7,
			'margin_left' => 7,
			'margin_right' => 8,
			'mirrorMargins' => true,
			'format'=>'A4',
			'orientation'=>'P',
			'fontDir' => array_merge($fontDirs, ['/fonts']),
			'fontdata' => $fontData + [
					'solaimanlipi' => [
						'R' => 'SolaimanLipi.ttf',
						'useOTL' => 0xFF,
					]
				],
			'default_font' => 'solaimanlipi'
		]);



		$html=$this->load->view('pdf',[],true);

		$mpdf->WriteHTML($html);
		$mpdf->SetFooter('Document Title');
		$mpdf->Output();

	}



	public function inserted(){
		$data['maincontain'] = $this->load->view('add_student','',true);
		$this->load->view('pages/adminpage',$data);
	}








}

?>
