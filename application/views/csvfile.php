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
					<div class="title_left">
						<h3>Student &amp; Teacher CSV Data upload</h3>

						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="x_panel">
									<div class="clearfix"></div>
									<div class="x_content">
										<br>
										<form action="" id="csv_upload" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
											<div class="row">

												<div class="form-group col-md-6">
													<label class="control-label col-md-5 col-sm-5 col-xs-12" for="session_id"> Session:  <span class="required">*</span>
													</label>

													<div class="col-md-7 col-sm-7 col-xs-12">
														<select name="session_id" id="session_id" required="" class="form-control">
															<!-- <option value="">Select</option> -->
															<?php
																foreach ($session_name as $row){ ?>
																	<option value="<?=$row->id?>"><?=$row->session_name?></option>
														<?php		}
															?>

														</select>
													</div>
												</div>
											</div>
											<div class="row" style="margin-top: 5px">

												<div class="form-group col-md-6">
													<label class="control-label col-md-5 col-sm-5 col-xs-12" for="session_id"> Csv File:  <span class="required">*</span>
													</label>

													<div class="col-md-7 col-sm-7 col-xs-12">
														<input type="file" id="csv_file" name="csv_file" required="" accept=".csv">

														<span class="required" id="sid_error"></span>
													</div>
												</div>
											</div>



											<div class="row" style="margin-top: 20px;">
												<div class="form-group col-md-8">

												</div>

												<div class="form-group col-md-12">
													<button id="check_file" type="button" name="check_file" class="btn btn-danger">Check your file</button>

													<button id="upload" type="submit" name="submit" class="btn btn-primary">Upload</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div>
				<div class="col-md-12 col-lg-12">
					<div class="error_sms" style="margin: 10px; background-color: white; padding: 5px" >

					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>

<script>
	$(document).ready(function () {
		$("#csv_upload").submit(function (e) {
			e.preventDefault();
			$.ajax({
				url:'http://localhost/school/student/process_csv',
				type:'post',
				data:new FormData(this),
				contentType:false,
				cache: false,
				processData:false,
				beforeSend: function() {
					$("#upload").html('Uploading...');
				},
				success:function (res) {
					$("#upload").html('Upload');
					$("#csv_upload")[0].reset();



					if (res == 1){
						swal({
							title: "Good job!",
							text: "You clicked the button!",
							icon: "success",
							buttons: false,
							timer:2000
						});
					}


				}
			})

		})

		$("#check_file").click(function (e) {
			e.preventDefault();
			var file = $("#csv_file")[0].files[0];

			var formdata = new FormData();
			formdata.append("csv_file",file);

			$.ajax({
				url:'http://localhost/school/student/checking_csvfile',
				type: 'post',
				data:formdata,
				contentType:false,
				cache: false,
				processData:false,
				success:function (res) {
					$(".error_sms").html(res);
				}

			})


		})
	})
</script>
