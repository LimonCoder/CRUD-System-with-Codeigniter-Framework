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
					<button type="button" id="add_session" class="btn btn-primary pull-right" data-toggle="modal" data-target="#session_modal" ><i class="fa fa-plus-circle"></i> Add Session</button>
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<table id="session" class="table table-striped table-bordered" style="width:100%">
								<thead>
								<tr>
									<th width="20%">SL No</th>
									<th width="30%">Name</th>
									<th width="30%">Is_current</th>
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
			<div class="modal fade" id="session_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="margin-top: -197px;">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Session</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<form id="session_form" class="form-horizontal form_middle" action="" method="post">
								<div class="modal-body">

									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="session_name">Session Name <span class="required">*</span>
										</label>
										<div class="col-md-5 col-sm-5 col-xs-12">
											<input type="number" id="session_name" name="session_name"  class="form-control">

<!--											<input type="hidden" id="session_id" name="session_id"  class="form-control" value="">-->
											<span style="color:red;" id="session_name_error"></span>
										</div>

										<label class="control-label col-md-2 col-sm-2 col-xs-12" for="is_current">Is Current
										</label>
										<div class="col-md-1 col-sm-1 col-xs-12">
											<input type="checkbox" id="is_current" name="is_current"  class="form-control">

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
							<h5 class="modal-title" id="exampleModalLabel">Update Session</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<form id="update_session_form" class="form-horizontal form_middle" action="" method="post">
								<div class="modal-body">

									<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="session_name">Session Name <span class="required">*</span>
										</label>
										<div class="col-md-5 col-sm-5 col-xs-12">
											<input type="hidden" name="row_id" id="row_id" value="">
											<input type="number" id="update_session_name" name="update_session_name"  class="form-control">

											<!--											<input type="hidden" id="session_id" name="session_id"  class="form-control" value="">-->
											<span style="color:red;" id="update_session_name_error"></span>
										</div>

										<label class="control-label col-md-2 col-sm-2 col-xs-12" for="is_current">Is Current
										</label>
										<div class="col-md-1 col-sm-1 col-xs-12">
											<input type="checkbox" id="update_is_current" name="update_is_current"  class="form-control">

										</div>
									</div>

								</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-warning" name="session_update" value="submit ">Update</button>
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
				url:"http://localhost/school/settings/session_list",
				type:"POST"
			}
		});

		// add session event //
		$("#session_form").submit(function (event) {
			event.preventDefault();
			var form_valeus = $(this).serializeArray();
			$.ajax({
				url:"http://localhost/school/settings/add_session",
				type:'POST',
				data:form_valeus,
				dataType:'json',
				success:function (res) {
					if (res[0]){
						// session form reset()
						$("#session_form")[0].reset();
						//modal hide //
						$('#session_modal').modal('hide');
						swal({
							title: "Success!",
							text: "Successfully added!",
							icon: "success",
							buttons: false,
							timer: 1500
						})

					}
					if (typeof res.session_name_error == 'string' )
					{
						$("#session_name_error").html(res.session_name_error);
					}
					// datable reloading after session inserted //
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
