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
				<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Session</a></li>
			</ul>
		</div>
	</div>
	<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
	<div class="row animated fadeInUp">
		<div class="col-sm-12 col-lg-12">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<button type="button" id="add_session" class="btn btn-primary pull-right" data-toggle="modal" data-target="#section_modal" ><i class="fa fa-plus-circle"></i> Add Section</button>
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<table id="session" class="table table-striped table-bordered" style="width:100%">
								<thead>
								<tr>
									<th width="20%">SL</th>
									<th width="30%">Name</th>
									<th width="30%">Sorting</th>
									<th  width="20%">action</th>
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
			<div class="modal fade" id="section_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="margin-top: -197px;">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<form id="section_form" class="form-horizontal form_middle" action="" method="post">
								<div class="modal-body">

									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_name">Section Name <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<input type="text" id="section_name" name="section_name" required="required" class="form-control">
											<span id="section_name_error"></span>
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
							<button type="submit" class="btn btn-warning" name="session_save" value="submit ">Save</button>
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

		// Server side processing data table //
		var dataTable =	$('#session').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"http://localhost/school/settings/section_list",
				type:"POST"
			}
		});

		// add session event //
		$("#section_form").submit(function (event) {
			event.preventDefault();
			var form_valeus = $(this).serializeArray();
			$.ajax({
				url:"http://localhost/school/settings/add_section",
				type:'POST',
				data:form_valeus,
				dataType:'json',
				success:function (res) {
					if (res == 1){
						// session form reset()
						$("#section_form")[0].reset();
						//modal hide //
						$('#section_modal').modal('hide');
						swal({
							title: "Success!",
							text: "Successfully added!",
							icon: "success",
							buttons: false,
							timer: 1500
						})

					}
					if (typeof res.section_name_error == 'string' )
					{
						$("#section_name_error").html(res.section_name_error);
					}
					// // datable reloading after session inserted //
					 dataTable.ajax.reload();
				}
			})
		})

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

