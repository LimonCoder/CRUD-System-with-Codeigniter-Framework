<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:03:33 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Helsinki</title>
	<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>assets/favicon/apple-icon-120x120.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?=base_url()?>assets/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/favicon/favicon-16x16.png">
	<!--load progress bar-->
	<script src="<?=base_url()?>assets/vendor/pace/pace.min.js"></script>
	<link href="<?=base_url()?>assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

	<!--BASIC css-->
	<!-- ========================================================= -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/animate.css/animate.css">
	<!--SECTION css-->
	<!-- ========================================================= -->
	<!--Notification msj-->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/toastr/toastr.min.css">
	<!--Magnific popup-->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/magnific-popup/magnific-popup.css">
	<!--TEMPLATE css-->
	<!-- ========================================================= -->
	<link rel="stylesheet" href="<?=base_url()?>assets/stylesheets/css/style.css">


</head>

<body>
<div class="wrap">
	<!-- page HEADER -->
	<!-- ========================================================= -->
	<div class="page-header">
		<!-- LEFTSIDE header -->
		<div class="leftside-header">
			<div class="logo">
				<a href="index.html" class="on-click">
					<img alt="logo" src="<?=base_url()?>assets/images/header-logo.png" />
				</a>
			</div>
			<div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
				<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>
		<!-- RIGHTSIDE header -->
		<div class="rightside-header">
			<div class="header-middle"></div>
			<!--SEARCH HEADERBOX-->
			<div class="header-section" id="search-headerbox">
				<input type="text" name="search" id="search" placeholder="Search...">
				<i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
				<div class="header-separator"></div>
			</div>
			<!--NOCITE HEADERBOX-->
			<div class="header-section hidden-xs" id="notice-headerbox">
				<!--check list-->
				<div class="notice" id="checklist-notice">
					<i class="fa fa-check-square-o" aria-hidden="true"></i>
					<div class="dropdown-box basic">
						<div class="drop-header">
							<h3><i class="fa fa-check-square-o" aria-hidden="true"></i> To-Do List</h3>
						</div>
						<div class="drop-content">
							<div class="widget-list list-to-do">
								<ul>
									<li>
										<div class="checkbox-custom checkbox-primary">
											<input type="checkbox" id="check-s1" value="option1">
											<label class="check" for="check-s1">Accusantium eveniet ipsam neque</label>
										</div>
									</li>
									<li>
										<div class="checkbox-custom checkbox-primary">
											<input type="checkbox" id="check-s2" value="option1" checked>
											<label class="check" for="check-s2">Lorem ipsum dolor sit</label>
										</div>
									</li>
									<li>
										<div class="checkbox-custom checkbox-primary">
											<input type="checkbox" id="check-s3" value="option1">
											<label class="check" for="check-s3">Dolor eligendi in ipsum sapiente</label>
										</div>
									</li>
									<li>
										<div class="checkbox-custom checkbox-primary">
											<input type="checkbox" id="check-s4" value="option1">
											<label class="check" for="check-s4">Natus recusandae vel</label>
										</div>
									</li>
									<li>
										<div class="checkbox-custom checkbox-primary">
											<input type="checkbox" id="check-s5" value="option1">
											<label class="check" for="check-s5">Adipisci amet officia tempore ut</label>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="drop-footer">
							<a>See all Items</a>
						</div>
					</div>
				</div>
				<!--messages-->
				<div class="notice" id="messages-notice">
					<i class="fa fa-comments-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger"><i class="fa fa-exclamation"></i></span>
					</i>
					<div class="dropdown-box basic">
						<div class="drop-header ">
							<h3><i class="fa fa-comments" aria-hidden="true"></i> Messages</h3>
							<span class="badge x-danger b-rounded">120</span>
						</div>
						<div class="drop-content">
							<div class="widget-list list-left-element">
								<ul>
									<li>
										<a href="#">
											<div class="left-element"><img alt="profile photo" src="images/avatar/avatar_1.jpg" /></div>
											<div class="text">
												<span class="title">John Doe</span>
												<span class="subtitle">hello world</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="left-element"><img alt="profile photo" src="images/avatar/avatar_2.jpg" /></div>
											<div class="text">
												<span class="title">Alice Smith</span>
												<span class="subtitle">hello world</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="left-element"><img alt="profile photo" src="images/avatar/avatar_3.jpg" /></div>
											<div class="text">
												<span class="title">Klaus Wolf</span>
												<span class="subtitle">hello world</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="left-element"><img alt="profile photo" src="images/avatar/avatar_4.jpg" /></div>
											<div class="text">
												<span class="title">Sun Li</span>
												<span class="subtitle">hello world</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="left-element"><img alt="profile photo" src="images/avatar/avatar_5.jpg" /></div>
											<div class="text">
												<span class="title">Sonia Valera</span>
												<span class="subtitle">hello world</span>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="drop-footer">
							<a>See all messages</a>
						</div>
					</div>
				</div>
				<!--alerts notices-->
				<div class="notice" id="alerts-notice">
					<i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger">7</span></i>

					<div class="dropdown-box basic">
						<div class="drop-header">
							<h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
							<span class="badge x-danger b-rounded">7</span>

						</div>
						<div class="drop-content">
							<div class="widget-list list-left-element list-sm">
								<ul>
									<li>
										<a href="#">
											<div class="left-element"><i class="fa fa-warning color-warning"></i></div>
											<div class="text">
												<span class="title">8 Bugs</span>
												<span class="subtitle">reported today</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="left-element"><i class="fa fa-flag color-danger"></i></div>
											<div class="text">
												<span class="title">Error</span>
												<span class="subtitle">sevidor C down</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="left-element"><i class="fa fa-cog color-dark"></i></div>
											<div class="text">
												<span class="title">New Configuration</span>
												<span class="subtitle"></span>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="left-element"><i class="fa fa-tasks color-success"></i></div>
											<div class="text">
												<span class="title">14 Task</span>
												<span class="subtitle">completed</span>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
											<div class="text">
												<span class="title">21 Menssage</span>
												<span class="subtitle"> (see more)</span>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="drop-footer">
							<a>See all notifications</a>
						</div>
					</div>
				</div>
				<div class="header-separator"></div>
			</div>
			<!--USER HEADERBOX -->
			<div class="header-section" id="user-headerbox">
				<div class="user-header-wrap">
					<div class="user-photo">
						<img alt="profile photo" src="images/avatar/avatar_user.jpg" />
					</div>
					<div class="user-info">
						<span class="user-name">Jane Doe</span>
						<span class="user-profile">Admin</span>
					</div>
					<i class="fa fa-plus icon-open" aria-hidden="true"></i>
					<i class="fa fa-minus icon-close" aria-hidden="true"></i>
				</div>
				<div class="user-options dropdown-box">
					<div class="drop-content basic">
						<ul>
							<li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
							<li> <a href="pages_lock-screen.html"><i class="fa fa-lock" aria-hidden="true"></i> Lock Screen</a></li>
							<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configurations</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="header-separator"></div>
			<!--Log out -->
			<div class="header-section">
				<a href="pages_sign-in.html" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	<!-- page BODY -->
	<!-- ========================================================= -->
	<div class="page-body">
		<!-- LEFT SIDEBAR -->
		<!-- ========================================================= -->
		<div class="left-sidebar">
			<!-- left sidebar HEADER -->
			<div class="left-sidebar-header">
				<div class="left-sidebar-title">Navigation</div>
				<div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
					<span></span>
				</div>
			</div>
			<!-- NAVIGATION -->
			<!-- ========================================================= -->
			<div id="left-nav" class="nano">
				<div class="nano-content">
					<nav>
						<ul class="nav nav-left-lines" id="main-nav">
							<!--HOME-->
							<li class="active-item"><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
							<!--UI ELEMENTENTS-->
							<li class="has-child-item close-item">
								<a><i class="fa fa-cubes" aria-hidden="true"></i><span>UI Elements</span></a>
								<ul class="nav child-nav level-1">
									<li><a href="ui-elements_panels.html">Panels</a></li>
									<li><a href="ui-elements_accordions.html">Accordions</a></li>
									<li><a href="ui-elements_tabs.html">Tabs</a></li>
									<li><a href="ui-elements_buttons.html">Buttons</a></li>
									<li><a href="ui-elements_typography.html">Typography</a></li>
									<li><a href="ui-elements_alerts.html">Alerts</a></li>
									<li><a href="ui-elements_modals.html">Modals</a></li>
									<li><a href="ui-elements_lightbox.html">Lightbox</a></li>
									<li class="has-child-item close-item">
										<a>Notifications</a>
										<ul class="nav child-nav level-2 ">
											<li><a href="ui-elements_notifications-pnotify.html">PNotify</a></li>
											<li><a href="ui-elements_notifications-toastr.html">Toastr</a></li>
										</ul>
									</li>
									<li><a href="ui-elements_animations-appear.html">Animations</a></li>
									<li><a href="ui-elements_badges-tags.html">Badge & Tags</a></li>
								</ul>
							</li>
							<!--CHARTS-->
							<li class="has-child-item close-item">
								<a><i class="fa fa-pie-chart" aria-hidden="true"></i><span>Charts</span> </a>
								<ul class="nav child-nav level-1">
									<li><a href="charts_chart-js.html">CharJS</a></li>
									<li><a href="charts_morris.html">Morris</a></li>
									<li><a href="charts_peity.html">Peity</a></li>
								</ul>
							</li>
							<!--FORMS-->
							<li class="has-child-item close-item">
								<a><i class="fa fa-columns" aria-hidden="true"></i><span>Forms </span></a>
								<ul class="nav child-nav level-1">
									<li><a href="forms_layouts.html">Layouts</a></li>
									<li><a href="forms_elements.html">Elements</a></li>
									<li><a href="forms_advanced.html">Advanced</a></li>
									<li><a href="forms_validation.html">Validation</a></li>
									<li><a href="forms_wizard.html">Wizard</a></li>
								</ul>
							</li>
							<!--TABLES-->
							<li class="has-child-item close-item">
								<a><i class="fa fa-table" aria-hidden="true"></i><span>Tables</span></a>
								<ul class="nav child-nav level-1">
									<li><a href="tables_basic.html">Basic</a></li>
									<li><a href="tables_data-tables.html">DataTable</a></li>
									<li><a href="tables_responsive.html">Responsive</a></li>
								</ul>
							</li>
							<!--PAGES-->
							<li class="has-child-item close-item">
								<a><i class="fa fa-files-o" aria-hidden="true"></i><span>Pages</span></a>
								<ul class="nav child-nav level-1">
									<li><a href="pages_sign-in.html">Sign in</a></li>
									<li><a href="pages_register.html">Register</a></li>
									<li><a href="pages_lock-screen.html">Lock screen</a></li>
									<li><a href="pages_forgot-password.html">Forgot password</a></li>
									<li class="has-child-item close-item">
										<a>Error pages</a>
										<ul class="nav child-nav level-2 ">
											<li><a href="pages_error-404-content.html">Error 404 content</a></li>
											<li><a href="pages_error-404.html">Error 404 page</a></li>
											<li><a href="pages_error-500.html">Error 500</a></li>
										</ul>
									</li>
									<li><a href="pages_faq.html">FAQ</a></li>
									<li><a href="pages_user-profile.html">User profile</a></li>
									<li class="has-child-item close-item">
										<a>Search results<span></a>
										<ul class="nav child-nav level-2 ">
											<li><a href="pages_search-results-list.html">List style</a></li>
											<li><a href="pages_search-results-grid.html">Grid Style</a></li>
										</ul>
									</li>
									<li class="has-child-item close-item">
										<a>Projects<span></a>
										<ul class="nav child-nav level-2 ">
											<li><a href="pages_project-list.html">List</a></li>
											<li><a href="pages_project-detail.html">Detail</a></li>
										</ul>
									</li>

								</ul>
							</li>
							<!--WIDGETS-->
							<li class="has-child-item close-item">
								<a><i class="fa fa-paper-plane" aria-hidden="true"></i><span>Widgets</span></a>
								<ul class="nav child-nav level-1">
									<li><a href="widgets_boxes.html">Boxes</a></li>
									<li><a href="widgets_lists.html">Lists</a></li>
									<li><a href="widgets_posts.html">Posts</a></li>
									<li><a href="widgets_timelines.html">Timelines</a></li>
								</ul>
							</li>
							<!--HELPERS-->
							<li class="has-child-item close-item">
								<a><i class="fa fa-magic" aria-hidden="true"></i><span>Helpers</span></a>
								<ul class="nav child-nav level-1">
									<li><a href="helpers_background-border.html">Background & Border</a></li>
									<li><a href="helpers_margin-padding.html">Margin & Padding</a></li>
								</ul>
							</li>
							<!--MENU LEVELS-->
							<li class=" has-child-item close-item">
								<a>
									<i class="fa fa-sitemap" aria-hidden="true"></i>
									<span>Menu levels</span>
								</a>
								<ul class="nav child-nav level-1">
									<li><a>First Item</a></li>
									<li class="has-child-item close-item">
										<a>Second Item</a>
										<ul class="nav child-nav level-2 ">
											<li><a href="#">Option 1</a></li>
											<li><a href="#">Option 2</a></li>
											<li class="has-child-item close-item">
												<a>Option 3</a>
												<ul class="nav child-nav level-3 ">
													<li><a href="#">Item 1</a></li>
													<li><a href="#">Item 2</a></li>
													<li><a href="#">Item 3</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li><a>Third Item</a></li>
									<li class="has-child-item close-item">
										<a>Fourth Item</a>
										<ul class="nav child-nav level-2 ">
											<li><a href="#">Option 1</a></li>
											<li><a href="#">Option 2</a></li>
											<li class="has-child-item close-item">
												<a>Option 3</a>
												<ul class="nav child-nav level-3 ">
													<li><a href="#">Item 1</a></li>
													<li><a href="#">Item 2</a></li>
													<li><a href="#">Item 3</a></li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>

							<!--DOCUMENTATION-->
							<li><a target="_blank" href="http://myiideveloper.com/helsinki/last-version/documentation/index.html"><i class="fa fa-book" aria-hidden="true"></i><span>Online Documentation</span></a></li>

						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!-- CONTENT -->
		<?= $deshboard ?>
		<!-- CONTENT -->
		<!-- RIGHT SIDEBAR -->
		<!-- ========================================================= -->

	</div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="<?=base_url()?>assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="<?=base_url()?>assets/javascripts/template-script.min.js"></script>
<script src="<?=base_url()?>assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
<!--Notification msj-->
<script src="<?=base_url()?>assets/vendor/toastr/toastr.min.js"></script>
<!--morris chart-->
<script src="<?=base_url()?>assets/vendor/chart-js/chart.min.js"></script>
<!--Gallery with Magnific popup-->
<script src="<?=base_url()?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!--Examples-->
<script src="<?=base_url()?>assets/javascripts/examples/dashboard.js"></script>
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:07 GMT -->
</html>
