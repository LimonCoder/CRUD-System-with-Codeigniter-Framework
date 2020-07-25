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
							<th width="10%">SL No</th>
							<th width="5%">Photo</th>
							<th>Student Name</th>
							<th>Gender</th>
							<th>Religion</th>
							<th>Date of Birth</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
							$serial_no = 1;
							foreach ($student_info as $row){ ?>
									<tr>
										<td><?=$serial_no++ ?></td>
										<?php
											if ($row->image != null){ ?>
												<td><img src="<?=base_url()?>assets/images/uploaded-images/<?=$row->image?>" alt="" width="50" height="50"></td>
									<?php	}else{ ?>
												<td></td>
										<?php	}
										?>

										<td><?=$row->english_name?></td>
										<td><?=$row->gender?></td>
										<td><?=$row->religion?></td>
										<td><?=$row->birth_date?></td>
										<td>
											<a href="#" class="btn btn-warning updateinfo" id="<?= $row->id?>" >Edit</a>
											<a href="#" class="btn btn-danger deleteinfo" id="<?= $row->id?>" >Delete</a>
										</td>
									</tr>
					<?php		}
						?>






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
		

		$('#student_info').DataTable({});

		$(".deleteinfo").click(function (e) {
			e.preventDefault();
			var id = $(this).attr('id');

			if (confirm("Are you delete this Student ?")){
				window.open("http://localhost/school/student/delete_student_info/"+id,"_self");
			}

		})

		$(".updateinfo").click(function (e) {
			e.preventDefault();
			var id = $(this).attr('id');

			window.open("http://localhost/school/student/student_info_edit/"+id,"_self");

		})

	} );
</script>
