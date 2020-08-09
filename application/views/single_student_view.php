<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<!-- Meta, title, CSS, favicons, etc. -->
	<base href="http://apps.digiins.gov.bd/">

	<script>
		var base_url = "http://apps.digiins.gov.bd/";
	</script>

	<!-- jQuery -->
	<script src="assets/js/jquery.min.js"></script>

	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>  Digital School</title>
	<!-- Bootstrap -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<!-- Animated -->
	<link href="assets/css/animate.min.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="assets/css/custom.min.css" rel="stylesheet">
	<link href="assets/css/custom_school.css" rel="stylesheet">
	<!-- sweetalert -->
	<link rel="stylesheet" href="assets/css/sweetalert.css">
	<!-- Datetime picker -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="assets/css/daterangepicker.css">
	<link rel="stylesheet" href="assets/css/chosen.css">
	<link rel="stylesheet" href="assets/css/management.css">

	<!---- -Start for DataTable ------------>

	<!--<link rel="stylesheet" href="datatables/css/bootstrap.min.css" />-->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">

	<link rel="stylesheet" href="assets/css/dataTables.jqueryui.min.css">

	<!-- <link rel="stylesheet" href="assets/css/buttons.dataTables.min.css" /> -->

	<!-- <link rel="stylesheet" href="assets/css/buttons.bootstrap.min.css" /> -->

	<link rel="stylesheet" href="assets/css/buttons.jqueryui.min.css">

	<link rel="stylesheet" href="assets/css/responsive.bootstrap.min.css">

	<!-- for custom style -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/attendance.css">

	<!-- FullCalendar -->
	<link href="assets/css/fullcalendar.min.css" rel="stylesheet">
	<link href="assets/css/fullcalendar.print.css" rel="stylesheet" media="print">

	<!-- bootstrap toogle button css -->
	<link href="assets/css/bootstrap-toggle.min.css" rel="stylesheet">


	<!-- for auto complete -->
	<link rel="stylesheet" href="assets/css/chosen.css">

	<!-- for multi input color change -->
	<link rel="stylesheet" href="assets/css/bootstrap-tagsinput.css">
	<!-- for jquery ui css -->
	<link rel="stylesheet" href="assets/css/jquery-ui.css">

	<!-- <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
	 <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script> -->
	<!-- <script type="text/javascript" src="assets/js/dataTables.responsive.min.js"></script> -->

	<!-- End  for DataTable pdf,exel,csv,copy,print  -->

	<style>
		.dataTables_wrapper .dataTables_processing {
			background-color:#2A3F54;
		}
	</style>
</head>
<body class="nav-md">
<div class="container body">
	<div class="main_container">





		<meta charset="UTF-8">
		<base href="http://apps.digiins.gov.bd/">

		<title>Student Information</title>
		<link href="http://apps.digiins.gov.bd/assets/css/student_phone_book.css" rel="stylesheet" type="text/css">




		<style type="text/css">
			table {
				width: 100%;
			}

			table td {
				padding: 5px;
			}
		</style>
		<?php foreach ($single_info as $row):?>
		<div class="fix stracture wrapper">

			<div class="fix top-side">
				<div class="fix heading">
					<div class="heading-left floatleft">
						<div style="float:right;">
							<img src="http://apps.digiins.gov.bd/assets/media/school_logo/20200808_5f2e8be4c40f9.jpg" alt="" style="height: 60px;width: 60px;">
						</div>
					</div>
					<div class="heading-mid floatleft">
						<h2>কাশিনগর বি এম উচ্চ বিদ্যালয়</h2>
						<p class="small-font">কাশিনগর, চৌদ্দগ্রাম,কুমিল্লা</p>

						<p>
							<span>Mobile :</span>
							<span>01727040444,</span>

						</p>
						<p>
							<span>Web :</span>
							<span>kbmhs.digiins.gov.bd, </span>
							<span>E-mail :</span>
							<span>@</span>
						</p>
					</div>


					<div>
						<img src="<?=base_url()?>assets/images/uploaded-images/<?=$row['image']?>" alt="" style="height: 100px;width: 100px;">
					</div>

				</div>
			</div>
			<!---top side end---->


			<div class="container">



				<div class="row">

					<div class="col-md-12 col-xs-12">

						<div class="x_content">


							<h4>&nbsp;&nbsp;Student Information </h4>
							<div class="information_wrapper">
								<table class="" border="none">
									<tbody><tr>
										<td width="140px">Student ID</td>
										<td colspan="3">: 119000100601</td>
									</tr>
									<tr>
										<td> Name (English)</td>
										<td>: <?= $row['english_name']; ?></td>
										<td width="140px"> Name (বাংলা)</td>
										<td>: <?= $row['bangla_name']; ?></td>
									</tr>
									<tr>
										<td>Gender</td>
										<td>: <?= $row['gender']; ?></td>
										<td>Date of birth</td>
										<td>: <?= $row['birth_date']; ?></td>
									</tr>
									<tr>
										<td>Birth Certificate No</td>
										<td>: <?= $row['birth_certificate_no']; ?></td>
										<td>Blood Group</td>
										<td>: <?= $row['blood_grp']; ?></td>
									</tr>


									<tr>
										<td>Religion</td>
										<td>: <?= $row['religion']; ?></td>
										<td>Previous School</td>
										<td>: </td>
									</tr>


									<tr>
										<td>Previous Class</td>
										<td>: </td>
										<td>Previous Result</td>
										<td>: </td>
									</tr>
									<tr>
										<td>Present District</td>
										<td>: </td>
										<td>Present Upazila</td>
										<td>: Nangolkot</td>
									</tr>

									<tr>
										<td>Present Post Office</td>
										<td>: Demra</td>
										<td>Present Village</td>
										<td>: </td>
									</tr>
									<tr>
										<td>Permanent District</td>
										<td>: </td>
										<td>Permanent Upazila</td>
										<td>: Nangolkot</td>
									</tr>
									<tr>
										<td>Permanent Post Office</td>
										<td>: Demra</td>
										<td>Permanent Village</td>
										<td>: </td>
									</tr>

									</tbody></table>

							</div><br>


							<h4>Academic Information </h4>
							<div class="information_wrapper">

								<table class="" border="none">
									<tbody><tr>
										<td width="120px">Session Year</td>
										<td>: 2020</td>
										<td width="110px">Section</td>
										<td>: A</td>
									</tr>
									<tr>
										<td>Shift</td>
										<td>: Day</td>
										<td>Group</td>
										<td>: </td>
									</tr>
									<tr>
										<td>Class</td>
										<td>: Seven</td>
										<td>Roll</td>
										<td>: 1</td>
									</tr>
									</tbody></table>

							</div>



						</div></div></div></div></div></div></div></body>
				<?php endforeach;?>
</html>
