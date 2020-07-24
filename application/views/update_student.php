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
				<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Update Student</a></li>
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
						if ($this->uri->segment(2) == "updated"){ ?>
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
							<form class="form-horizontal" role="form" action="<?=base_url()?>student/update_form_validation" method="post"
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
												<input type="hidden" id="id_no" name="id_no" value="">
												<input type="text" id="english_name" name="english_name"
													   class="form-control" value="">

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
													   class="form-control col-md-7 col-xs-12" value="">
											</div>
										</div>

										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12 pull-left"
												   for="photo"> Photo
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<input type="file" id="student_photo" name="student_photo" accept="image/*">

												<span class="required" id="photo_error">

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
												<select class="form-control " name="gender" id="gender"  >
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
													   class="form-control">
												<span class="required"><?=form_error("birth_date")?></span>
											</div>
										</div>
									</div>

									<div class="row" style="margin-top: 10px;">

										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12 pull-left"
												   for="birth_certificate_no">Birth Certificate No<span class="required">*</span>
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<input type="text" id="birth_certificate_no" name="birth_certificate_no"
													   class="form-control col-md-7 col-xs-12">
												<span class="required"><?=form_error("birth_certificate_no")?></span>
											</div>
										</div>

										<div class="form-group col-md-6">
											<label class="control-label col-md-4 col-sm-4 col-xs-12" for="blood_group">Blood
												Group
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control" name="blood_group" id="blood_group">
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
												   for="previous_school">Previous School Name
											</label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<input type="text" id="previous_school" name="previous_school"
													   class="form-control" value="">


											</div>
										</div>
									</div>


									<div class="row" style="margin-top: 20px;">
										<div class="form-group col-md-11">
											<div class="buttons" style="float: right">
												<button type="submit" name="submit" class="btn btn-primary"><span
														class="glyphicon glyphicon-send"></span> Update
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
		var sid = <?= $this->uri->segment(3)?>;
		$.ajax({
			url:'<?=base_url()?>student/student_info_edit_action',
			type:'POST',
			data:{
				id:sid
			},
			dataType:'json',
			success:function (res) {
				$(res).each(function (index, value) {

					$("#id_no").val(value.id);
					$("#english_name").val(value.english_name);
					$("#bangla_name").val(value.bangla_name);
					$("#gender").val(value.gender);
					$("#birth_certificate_no").val(value.birth_certificate_no);
					$("#religion").val(value.religion);
					$("#birth_date").val(value.birth_date);
					$("#blood_group").val(value.blood_grp);
					$("#previous_school").val(value.previous_school);
					if (value.image != null){
						$('#image_preview').attr('src',"http://localhost/School/assets/images/uploaded-images/"+value.image);
					}



				})

			}
		})
	})


	// Date picker
	$(function () {
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


</script>






