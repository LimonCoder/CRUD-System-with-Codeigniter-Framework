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
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Manage Student</a></li>

			</ul>
		</div>
	</div>
	<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
	<div class="row animated fadeInUp">
		<div class="col-sm-12 col-lg-12">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<table id="student_info" class="table table-striped table-bordered" style="width:100%">
						<thead>
						<tr>
							<th>SL No</th>
							<th>Photo</th>
							<th>Student Name</th>
							<th>Gender</th>
							<th>Religion</th>
							<th>Date of Birth</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>




						</tbody>

					</table>
				</div>
			</div>
		</div>

	</div>
	<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<script>
	$(document).ready(function() {

		// Server side processing data table //
		var dataTable =	$('#student_info').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"http://localhost/school/student/get_student_info",
				type:"POST"
			}
		});



		$(document).on('click', '#delete', function(){
			var id = $(this).data('id');
			if(confirm("Are you sure you want to delete this?"))
			{
				window.open("http://localhost/school/student/delete_student_info/"+id,"_self");
			}
			else
			{
				return false;
			}
		});

		$(document).on('click','#update',function (e) {
			e.preventDefault();
			var id = $(this).data('id');
			window.open("http://localhost/school/student/student_info_edit/"+id,"_self");
		})





	} );
</script>
