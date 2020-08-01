<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- CONTENT -->
<div class="content">
	<!-- content HEADER -->
	<!-- ========================================================= -->
	<div class="content-header">
		<!-- leftside content header -->
		<div class="leftside-content-header">
			<ul class="breadcrumbs">
				<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Add Student</a></li>
			</ul>
		</div>
	</div>
	<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
	<div class="row animated fadeInUp">
		<div class="col-sm-12 col-lg-12">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="x_panel">
						<?php
							if ($this->uri->segment(2) == "inserted"){ ?>
								<div class="alert alert-success" role="alert">
									Successfully Data saved
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
								</div>
						<?php }
							if ($this->session->flashdata('data_unsuccess') != '' ){ ?>
								<div class="alert alert-danger" role="alert">
									Data inserted failid
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
						<?php	}
						?>

						<div class="clearfix"></div>


						<div class="x_content">
							<br>
							<form class="form-horizontal" role="form" action="<?=base_url()?>student/addstudent_form_validation" method="post"
								  enctype="multipart/form-data">

								<h4 class="student-head" style="">&nbsp;&nbsp;Student Information </h4>
								<div class="information_wrapper">

									<div class="row">
										<div class="form-group col-md-6">

											<label class="control-label col-md-4 col-sm-4 col-xs-12" for="english_name"
												   style="margin-top: 30px;"> Student Name (English) <span
														class="required">*</span>
											</label>

											<div class="col-md-8 col-sm-8 col-xs-12" style="margin-top: 30px;">

												<input type="text" id="english_name" name="english_name"
													   class="form-control" value="<?= set_value("english_name"); ?>">

												<span class="required" id="english_name_error"><?= form_error('english_name')?></span>

											</div>

										</div>

										<div class="form-group col-md-6">

											<label class="control-label col-md-4 col-sm-4 col-xs-12"
												   for="present_village">
											</label>

											<div class="col-md-8 col-sm-8 col-xs-12">

												<img src="<?=base_url()?>assets/images/default_image.png" id="image_preview" name="image_preview"  width="80px" height="80px">

											</div>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12" for="bangla_name">Student
												Name (বাংলা)
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<input type="text" id="bangla_name" name="bangla_name"
													   class="form-control col-md-7 col-xs-12" value="<?= set_value("bangla_name"); ?>">
											</div>
										</div>

										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12 pull-left"
												   for="photo"> Photo
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<input type="file" id="student_photo" name="student_photo" accept="image/*">

												<span class="required" id="photo_error">
													<?php
													if (isset($image_error)){
														echo $image_error;
													}
													?>
												</span>
											</div>
										</div>

									</div>

									<div class="row" style="margin-top: 10px;">
										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12" for="gender">Gender<span
														class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control " name="gender" id="gender" >
													<option value="">Select</option>

													<option value="Male">Male</option>

													<option value="Famale">Female</option>

													<option value="Others">Others</option>

												</select>
												<span class="required" id="gender_error">
													<?=form_error("gender")?>
                                                      </span>
											</div>

										</div>

										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12" for="birth_date">Date
												of birth<span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<input type="text" id="birth_date" name="birth_date"
													   class="form-control" value="<?= set_value("birth_date"); ?>">
												<span class="required"><?=form_error("birth_date")?></span>
											</div>
										</div>
									</div>

									<div class="row" style="margin-top: 10px;">

										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12 pull-left"
												   for="birth_certificate_no">Birth Certificate No
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<input type="text" id="birth_certificate_no" name="birth_certificate_no"
													   class="form-control col-md-7 col-xs-12" value="<?= set_value("birth_certificate_no"); ?>">
												<span class="required"><?=form_error("birth_certificate_no")?></span>
											</div>
										</div>

										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12" for="blood_group">Blood
												Group
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control" name="blood_group" id="blood_group" >
													<option value=""> Select</option>

													<option value="A+">A+</option>

													<option value="A-">A-</option>

													<option value="B+">B+</option>

													<option value="B-">B-</option>

													<option value="AB+">AB+</option>

													<option value="AB-">AB-</option>

													<option value="O+">O+</option>

													<option value="O-">O-</option>

												</select>
												<span class="required" id="religion_error"><?=form_error("blood_group")?>
                                                      </span>
											</div>
										</div>
									</div>

									<div class="row" style="margin-top: 10px;">
										<div class="form-group col-md-6">
											<label for="previous_school"
												   class="control-label col-md-4 col-sm-4 col-xs-12">Session<span
														class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control" name="session" id="session">
													<option value="">Select</option>
													<?php
														foreach($session_values as $row){ ?>
															<option value="<?= $row->id?>"><?= $row->session_name?></option>
												<?php		}
													?>

												</select>
												<span class="required" id="session_error"><?=form_error("session")?>
                                                      </span>
											</div>
										</div>

										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12"
												   for="previous_school">Class<span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control" name="class" id="class">
													<option value="">Select</option>
													<option value="5">Five</option>
													<option value="6">Six</option>
													<option value="7">Seven</option>
													<option value="8">Eight</option>
													<option value="9">Nine</option>
													<option value="10">Ten</option>

												</select>
												<span class="required" id="class_error"><?=form_error("class")?>
                                                      </span>


											</div>
										</div>
									</div>
									<div class="row" style="margin-top: 10px;">
										<div class="form-group col-md-6">
											<label for="section"
												   class="control-label col-md-4 col-sm-4 col-xs-12">Section<span
														class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control" name="section" id="section">
													<option value="">Select</option>
													<option value="1">A</option>
													<option value="2">B</option>
													<option value="3">c</option>


												</select>
												<span class="required" id="section_error"><?=form_error("section")?>
                                                      </span>
											</div>
										</div>

										<div class="form-group col-md-6" id="group_sec" style="display: none">
											<label class="control-label col-md-4 col-sm-4 col-xs-12"
												   for="group">Group
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control" name="group" id="group">
													<option value="">Select</option>
													<option value="1">Science</option>
													<option value="2">Commarce</option>
													<option value="3">Arts</option>

												</select>


											</div>
										</div>
									</div>
									<div class="row" style="margin-top: 10px;">
										<div class="form-group col-md-6">
											<label for="previous_school"
												   class="control-label col-md-4 col-sm-4 col-xs-12">Religion <span
														class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control" name="religion" id="religion">
													<option value="">Select</option>

													<option value="Islam">Islam</option>

													<option value="Hinduism">Hinduism</option>

													<option value="Christianity">Christianity</option>

													<option value="Buddhism">Buddhism</option>

												</select>
												<span class="required" id="religion_error"><?=form_error("religion")?>
                                                      </span>
											</div>
										</div>

										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12"
												   for="previous_school">Previous School Name<span
														class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<input type="text" id="previous_school" name="previous_school"
													   class="form-control" value="<?= set_value("previous_school"); ?>">


											</div>
										</div>
									</div>


									<div class="row" style="margin-top: 20px;">
										<div class="form-group col-md-11">
											<div class="buttons" style="float: right">
												<button type="submit" name="submit" class="btn btn-primary"><span
															class="glyphicon glyphicon-send"></span> Save
												</button>
												&nbsp;&nbsp;


												<button type="reset" value="" class="btn btn-warning" id="reset"><span
															class="glyphicon glyphicon-refresh"></span> Reset
												</button>
											</div>


										</div>

									</div>


								</div>


							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<!-- CONTENT -->
<script>


	$(function () {
		// Date picker
		$("#birth_date").datepicker();
	})

	// image preview
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#image_preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}

	$("#student_photo").change(function() {
		readURL(this);

	});


	//
	$(document).on("change","#class",function (e) {
		e.preventDefault();
		var id = $(this).val();

		if (id != '' && id >8){
			$("#group_sec").css("display", "block");
		}else{
			$("#group_sec").css("display", "none");
		}

	})
</script>





