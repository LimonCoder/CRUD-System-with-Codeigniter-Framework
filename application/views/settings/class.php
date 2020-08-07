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
				<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Class</a></li>
			</ul>
		</div>
	</div>
	<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
	<div class="row animated fadeInUp">
		<div class="col-sm-12 col-lg-12">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<button type="button" id="add_class" class="btn btn-primary pull-right" data-toggle="modal" data-target="#class_modal" ><i class="fa fa-plus-circle"></i> Add Class</button>
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<table id="session" class="table table-striped table-bordered" style="width:100%">
								<thead>
								<tr>
									<th width="20%">SL</th>
									<th width="30%">Class</th>
									<th width="30%">Section</th>
									<th  width="20%">Group</th>
									<th  width="20%">Action</th>
								</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- Add session Modal -->
			<div class="modal fade" id="class_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content" id="modal_content">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title" id="myModalLabel2">Add Class</h4>
						</div>
						<form id="student_class" class="form-horizontal form_middle" method="post">
							<div class="modal-body">
								<div class="row" style="margin-top:20px ">
									<div class="form-group col-md-5">
										<label class="control-label col-md-6 col-sm-6 col-xs-8 pull-left" for="class_name">Class Name:<span id="class_name_error" style="color: red"></span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="text" id="class_name" name="class_name" required="required" class="form-control col-md-7 col-xs-12">

										</div>
									</div>
									<div class="form-group col-md-3">
										<label class="control-label col-md-5 col-sm-5 col-xs-8 pull-left" for="sorting">Sorting:
										</label>
										<div class="col-md-7 col-sm-7 col-xs-12">
											<input type="text" name="class_sorting" id="sorting" required="required" class="form-control col-md-7 col-xs-12">
											<span id="sorting_error"></span>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group col-md-12">
										<label class="control-label " for="" style="padding-left: 20px;padding-right: 20px">Section
										</label>
										<?php foreach ($session_data as $row):?>
										<label class="checkbox-inline" for="section<?=$row->id?>">
											<input type="checkbox" name="section[]" id="section<?=$row->id?>" value="<?=$row->id?>" ><?=$row->section_name ?>
										</label>
										<?php endforeach;?>
										<span id="section_error"></span>
									</div>
								</div>

								<div class="row">
									<div class="form-group col-md-5">
										<label class="control-label col-md-5 col-sm-5 col-xs-12" for="group">Has Group
										</label>
										<div class="col-md-7 col-sm-7 col-xs-12">
											<label class="checkbox-inline">
												<input type="checkbox" name="has_group" value="1" id="group_checked_status">
											</label>
										</div>
									</div>
									<!-- hidden class id-->
<!--									<input type="hidden" id="class_id" name="class_id" required="required" class="form-control" value="">-->
								</div>

<!--								<div class="row" id="group_section" style="display: none;">-->
<!--									<div class="form-group col-md-12">-->
<!--										<label class="control-label " style="padding-left: 20px;padding-right: 20px">Group-->
<!--										</label>-->
<!--										<span id="group_error"></span>-->
<!--									</div>-->
<!--								</div>-->

							</div>
						<div class="modal-footer">
							<button type="submit" id="class_save_btn" value="Submit"  class="btn btn-primary"> Save</button>
							<button type="button" id="class_update_btn" class="btn btn-warning" onclick="class_update()" style="display: none;">Update </button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
						</form>


					</div>
				</div>
			</div>
			<!-- End session Modal -->

			<!-- Update session Modal -->
			<div class="modal fade" id="update_session_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="margin-top: -197px;">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Update Section</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<form id="update_section_form" class="form-horizontal form_middle" action="" method="post">
								<div class="modal-body">

									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_name">Section Name <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="text" id="section_name" name="section_name" required="required" class="form-control">

											<input type="hidden" id="section_id" name="section_id" required="required" class="form-control" value="">
											<span id="section_name_error" style="color: red"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sorting">Sorting <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="number" id="sorting" name="sorting" required="required" class="form-control">
											<span id="sorting_error"></span>
										</div>
									</div>
								</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-warning" name="section_update" value="submit ">Update</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Update session Modal -->
		</div>

	</div>
	<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<!-- CONTENT -->

<script>
	$(document).ready(function() {




		// // add class event //
		$("#student_class").submit(function (event) {
			event.preventDefault();

			var form_valeus = $(this).serializeArray();

			$.ajax({
				url:'http://localhost/school/settings/add_class',
				type:'POST',
				data:form_valeus,
				dataType:'json',
				success:function (result) {
					console.log(result);

					if (result.key == 1){
						// session form reset()
						$("#student_class")[0].reset();
						//modal hide //
						$('#class_modal').modal('hide');
						swal({
							title: "Success!",
							text: "Successfully added!",
							icon: "success",
							buttons: false,
							timer: 1500
						})

					}

					if (typeof result.class_name_error == 'string' )
					{
						$("#class_name_error").html("*");
					}
				}
			})
		});

		// update session //
		$(document).on("click","#update_session",function (e) {
			e.preventDefault();
			var sid = $(this).data('id');
			$.ajax({
				url:'http://localhost/school/settings/session_edit',
				type:'post',
				data:{id:sid},
				dataType: 'json',
				success:function (result) {
					$("#row_id").val(result.id);
					$("#update_session_name").val(result.session_name);

					if (result.is_current == 1 ){
						$("#update_is_current").prop( "checked", true );
					}else{
						$("#update_is_current").prop( "checked", false );
					}
				}
			})



			$("#update_session_modal").modal("show");

		})

		//update session action //
		$(document).on("submit","#update_session_form", function (e) {
			e.preventDefault();
			var values = $(this).serializeArray();
			$.ajax({
				url:"http://localhost/school/settings/session_edit_action",
				type:'POST',
				data:values,
				dataType:'json',
				success:function (res) {
					if (res[0]){
						// session form reset()
						$("#update_session_form")[0].reset();
						//modal hide //
						$('#update_session_modal').modal('hide');
						swal({
							title: "Success!",
							text: "Session Update Successfully !",
							icon: "success",
							buttons: false,
							timer: 1500
						})

					}
					if (typeof res.update_session_name_error == 'string' )
					{
						$("#update_session_name_error").html(res.session_name_error);
					}
					// datable reloading after session inserted //
					dataTable.ajax.reload();
				}
			})
		})

		// delete session
		$(document).on("click","#delete_session",function (e) {
			e.preventDefault();
			var sid = $(this).data('id');
			swal({
				title: "Are you sure?",
				text: "Once deleted, you want to delete it ?",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
				.then((willDelete) => {
					if (willDelete) {

						$.ajax({
							url:'http://localhost/school/settings/session_delete_action',
							type:'post',
							data:{id:sid},
							dataType:'json',
							success:function (result) {
								if(result){
									swal("Poof! Session has been deleted!", {
										icon: "success",
										buttons:false,
										timer:1500
									});
								}else {

								}
								// datable reloading after session inserted //
								dataTable.ajax.reload();
							}
						})
					}
				});



		})


		//current session
		$(document).on("click","#is_current_session",function (e) {
			e.preventDefault();
			alert("Session is now current");

		})



		//










	} );
</script>


