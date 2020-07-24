<?php
$config = array(

	'add_from_validation'=> array(
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
			'rules' => 'callback_accpect_blood'
		),
		array(
			'field' => 'religion',
			'label' => 'Religion',
			'rules' => 'required'
		),
		array(
			'field' => 'previous_school',
			'label' => 'Previous School',
			'rules' => ''
		)

	)

);




?>
