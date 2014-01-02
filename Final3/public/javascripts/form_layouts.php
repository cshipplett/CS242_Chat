<?php

require('db_connect.php');

if (isset($_POST['save'])) { 
	$projectTitle = $_POST['projectTitle'];
	$billingPO = $_POST['billingPO'];
    $description = $_POST['description'];
    $tags = $_POST['tags'];
    $roles = $_POST['roles[]'];
	$hour = $_POST['hours[]'];

	$query = "INSERT INTO projects (`projectTitle`, `billingPO`, `description`, `roles`, `hours`, `tags`) VALUES ";
	foreach($_POST['name'] as $i => $name) 
	{ 
	  // Get values from post.
	  $name = mysql_real_escape_string($name);
	  $url = mysql_real_escape_string($_POST['url'][$i]);

	  // Add to database
	  $query = $query." ('$name','$url') ,";
	}
	$query = substr($query,0,-1); //remove last char
	$result = mysql_query($query);

	$insertSQL="INSERT INTO projects (`projectTitle`, `billingPO`, `description`, `roles`, `hours`, `tags`) VALUES('$projectTitle', '$billingPO', '$description', '$roles', '$hours', '$tags')";
              	
    $insertResult=mysql_query($insertSQL);
}
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.3
Version: 1.5.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>OFDashboard | Create Project</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/gritter/css/jquery.gritter.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/compiled/timepicker.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/jquery-multi-select/css/multi-select.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/jquery-tags-input/jquery.tagsinput.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="index.html">
		<img src="assets/img/logo.png" alt="logo" class="img-responsive"/>
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<img src="assets/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN NOTIFICATION DROPDOWN -->
			<li class="dropdown" id="header_notification_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<i class="fa fa-warning"></i>
				<span class="badge">
					6
				</span>
				</a>
				<ul class="dropdown-menu extended notification">
					<li>
						<p>
							You have 14 new notifications
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							<li>
								<a href="#">
								<span class="label label-icon label-success">
									<i class="fa fa-plus"></i>
								</span>
								 New user registered.
								<span class="time">
									Just now
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-danger">
									<i class="fa fa-bolt"></i>
								</span>
								 Server #12 overloaded.
								<span class="time">
									15 mins
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-warning">
									<i class="fa fa-bell-o"></i>
								</span>
								 Server #2 not responding.
								<span class="time">
									22 mins
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-info">
									<i class="fa fa-bullhorn"></i>
								</span>
								 Application error.
								<span class="time">
									40 mins
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-danger">
									<i class="fa fa-bolt"></i>
								</span>
								 Database overloaded 68%.
								<span class="time">
									2 hrs
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-danger">
									<i class="fa fa-bolt"></i>
								</span>
								 2 user IP blocked.
								<span class="time">
									5 hrs
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-warning">
									<i class="fa fa-bell-o"></i>
								</span>
								 Storage Server #4 not responding.
								<span class="time">
									45 mins
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-info">
									<i class="fa fa-bullhorn"></i>
								</span>
								 System Error.
								<span class="time">
									55 mins
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-icon label-danger">
									<i class="fa fa-bolt"></i>
								</span>
								 Database overloaded 68%.
								<span class="time">
									2 hrs
								</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="external">
						<a href="#">See all notifications <i class="m-icon-swapright"></i></a>
					</li>
				</ul>
			</li>
			<!-- END NOTIFICATION DROPDOWN -->
			<!-- BEGIN INBOX DROPDOWN -->
			<li class="dropdown" id="header_inbox_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<i class="fa fa-envelope"></i>
				<span class="badge">
					5
				</span>
				</a>
				<ul class="dropdown-menu extended inbox">
					<li>
						<p>
							You have 12 new messages
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							<li>
								<a href="inbox.html?a=view">
								<span class="photo">
									<img src="./assets/img/avatar2.jpg" alt=""/>
								</span>
								<span class="subject">
									<span class="from">
										Lisa Wong
									</span>
									<span class="time">
										Just Now
									</span>
								</span>
								<span class="message">
									 Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh...
								</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
								<span class="photo">
									<img src="./assets/img/avatar3.jpg" alt=""/>
								</span>
								<span class="subject">
									<span class="from">
										Richard Doe
									</span>
									<span class="time">
										16 mins
									</span>
								</span>
								<span class="message">
									 Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
								</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
								<span class="photo">
									<img src="./assets/img/avatar1.jpg" alt=""/>
								</span>
								<span class="subject">
									<span class="from">
										Spencer Cree
									</span>
									<span class="time">
										2 hrs
									</span>
								</span>
								<span class="message">
									 Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh...
								</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
								<span class="photo">
									<img src="./assets/img/avatar2.jpg" alt=""/>
								</span>
								<span class="subject">
									<span class="from">
										Lisa Wong
									</span>
									<span class="time">
										40 mins
									</span>
								</span>
								<span class="message">
									 Vivamus sed auctor 40% nibh congue nibh...
								</span>
								</a>
							</li>
							<li>
								<a href="inbox.html?a=view">
								<span class="photo">
									<img src="./assets/img/avatar3.jpg" alt=""/>
								</span>
								<span class="subject">
									<span class="from">
										Richard Doe
									</span>
									<span class="time">
										46 mins
									</span>
								</span>
								<span class="message">
									 Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh...
								</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="external">
						<a href="inbox.html">See all messages <i class="m-icon-swapright"></i></a>
					</li>
				</ul>
			</li>
			<!-- END INBOX DROPDOWN -->
			<!-- BEGIN TODO DROPDOWN -->
			<li class="dropdown" id="header_task_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<i class="fa fa-tasks"></i>
				<span class="badge">
					5
				</span>
				</a>
				<ul class="dropdown-menu extended tasks">
					<li>
						<p>
							You have 12 pending tasks
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										New release v1.2
									</span>
									<span class="percent">
										30%
									</span>
								</span>
								<span class="progress">
									<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											40% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										Application deployment
									</span>
									<span class="percent">
										65%
									</span>
								</span>
								<span class="progress progress-striped">
									<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											65% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										Mobile app release
									</span>
									<span class="percent">
										98%
									</span>
								</span>
								<span class="progress">
									<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											98% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										Database migration
									</span>
									<span class="percent">
										10%
									</span>
								</span>
								<span class="progress progress-striped">
									<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											10% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										Web server upgrade
									</span>
									<span class="percent">
										58%
									</span>
								</span>
								<span class="progress progress-striped">
									<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											58% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										Mobile development
									</span>
									<span class="percent">
										85%
									</span>
								</span>
								<span class="progress progress-striped">
									<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											85% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
									<span class="desc">
										New UI release
									</span>
									<span class="percent">
										18%
									</span>
								</span>
								<span class="progress progress-striped">
									<span style="width: 18%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">
											18% Complete
										</span>
									</span>
								</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="external">
						<a href="#">See all tasks <i class="m-icon-swapright"></i></a>
					</li>
				</ul>
			</li>
			<!-- END TODO DROPDOWN -->
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<img alt="" src="assets/img/avatar1_small.jpg"/>
				<span class="username">
					Spencer Cree
				</span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="extra_profile.html"><i class="fa fa-user"></i> My Profile</a>
					</li>
					<li>
						<a href="page_calendar.html"><i class="fa fa-calendar"></i> My Calendar</a>
					</li>
					<li>
						<a href="inbox.html"><i class="fa fa-envelope"></i> My Inbox
						<span class="badge badge-danger">
							3
						</span>
						</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-tasks"></i> My Tasks
						<span class="badge badge-success">
							7
						</span>
						</a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> Full Screen</a>
					</li>
					<li>
						<a href="extra_lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
					</li>
					<li>
						<a href="login.html"><i class="fa fa-key"></i> Log Out</a>
					</li>
				</ul>
			</li>
			<!-- END USER LOGIN DROPDOWN -->
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start ">
					<a href="index.html">
					<i class="fa fa-home"></i>
					<span class="title">
						Dashboard
					</span>
					</a>
				</li>
				<li class="active">
					<a href="create.html">
					<i class="fa fa-home"></i>
					<span class="title">
						Create Project
						
					</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Create Project
					</h3>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom boxless">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-reorder"></i>New Project
										</div>
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="#" class="horizontal-form" method="POST">
											<div class="form-body">
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" placeholder="Project Title" name="projectTitle" class="custom-form" /><br /><br />
															<input type="text" id="firstName" class="form-control" name="billingPO" placeholder="Billing PO">
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														
														<div class="form-group">
															<h1>Add Roles</h1>
															<div id="input_container">

															</div>
															<a href="#" class="btn green" id="addRole"><i class="fa fa-plus"></i></a>
															
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">Tags Support List</label>
															<div class="col-md-9">
																<input type="hidden" id="select2_sample5" name="tags" class="form-control select2">
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="portlet box green">
															<div class="portlet-title">
																<div class="tools">
																</div>
															</div>
															<div class="portlet-body">
																<ul class="nav nav-tabs">
																	<li class="active">
																		<a href="#tab_1_1" data-toggle="tab">Description</a>
																	</li>
																	<li class="">
																		<a href="#tab_1_2" data-toggle="tab">Scope</a>
																	</li>
																	<li class="">
																		<a href="#tab_1_3" data-toggle="tab">Deliverables</a>
																	</li>
																</ul>
																<div class="tab-content">
																	<div class="tab-pane fade active in" id="tab_1_1">
																		<div class="wrap" style="overflow: hidden;">
																			<textarea class="wysihtml5 form-control" name="description" style="width: 100%; height: 150px; border: none; resize: none;"></textarea>
																		</div>
																	</div>
																	<div class="tab-pane fade" id="tab_1_2">
																		<div class="wrap" style="overflow: hidden;">
																			<textarea class="wysihtml5 form-control" name="scope" style="width: 100%; height: 150px; border: none; resize: none;"></textarea>
																		</div>
																	</div>
																	<div class="tab-pane fade" id="tab_1_3">
																		<div class="wrap" style="overflow: hidden;">
																			<textarea class="wysihtml5 form-control" name="deliverables" style="width: 100%; height: 150px; border: none; resize: none;"></textarea>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">

														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<h1>To Do:</h1>

															<div id="todo_container">

															</div>
															<a class="btn green" data-toggle="modal" href="#wide"><i class="fa fa-plus"></i></a>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="modal fade" id="wide" tabindex="-1" role="basic" aria-hidden="true">
													<div class="modal-dialog modal-wide">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																<h4 class="modal-title">Add To Do</h4>
																
															</div>
															<div class="modal-body" id="modal-body">
																 <select id="toDoListDropdown">
																 <option>Select Item</option>
																 	 <?php 
																 	 $sql = "SELECT * FROM template";
																 	 $result = mysql_query($sql);
											                            while($row = mysql_fetch_array($result)) {  
											                                echo '<option value="'. $row['id'] . '">' . $row['templateName'] . "</option>\n";
											                            } ?>
																 </select>
																 <!-- <a href="" class="btn green" id="addToDoModal"><i class="fa fa-plus"></i></a> -->
															</div>
															<div class="modal-footer">
																<button type="button" class="btn default" data-dismiss="modal">Close</button>
																<button type="button" class="btn blue" data-dismiss="modal" id="addToDoButton">Add</button>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
												<!--/row-->
												<h3 class="form-section"></h3>
												<div class="row">
													<div class="col-md-12 ">
														<div class="form-group">
															
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															
														</div>
													</div>
													<!--/span-->
												</div>
											</div>
											<div class="form-actions right">
												<button type="button" class="btn default">Cancel</button>
												<button type="submit" class="btn blue" name="save"><i class="fa fa-check"></i> Save</button>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		 2013 &copy; Metronic by keenthemes.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="assets/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.quicksearch.js"></script>
<script src="assets/plugins/jquery.pwstrength.bootstrap/src/pwstrength.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-switch/static/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-tags-input/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/form-components.js"></script>
<script>
$(document).ready(function () {
	$("#addRole").click(function(){ 
		input = $('<input type="text" name="roles[]" class="form-control" style="width: 50%" placeholder="Role" /><input type="text" name="hours[]" class="form-control" style="width: 50%" placeholder="Role Hours" /><br />');
		$('#input_container').append(input);
	});
	$("#toDoListDropdown").change(function(){ 
		alert('changed');
		$.ajax({
	        type:"GET",
	        url : "getToDoListItems.php",
	        data : "id="+$(this).val(),
	        async: false,
	        crossDomain: true,
	        success : function(response) {
	        	array = JSON.parse(response);
	        	var header = array[0].templateName;
	        	var	item1 = array[0].taskOne;
	        	var	item2 = array[0].taskTwo;
	        	var	item3 = array[0].taskThree;
	        	var	item4 = array[0].taskFour;


	        	console.log(array);
	            var item = $('<p id="todoHeader"><strong>'+header+'</strong></p><ul><li>'+item1+'</li><li>'+item2+'</li><li>'+item3+'</li></ul>');
				$('#todo_container').append(item);
	        },
	        error: function() {
	            alert('Error occured');
	        }
	    });
		
	});
});
</script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   App.init();
   FormComponents.init();
});   
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>