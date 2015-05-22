
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Dashboard </title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css"> -->

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/morris/morris.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?=base_url()?>assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="<?=base_url()?>assets/images/logo.png" height="35" alt="Porto Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
			
					<span class="separator"></span>
			
					
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?=base_url()?>assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">Joseph Websphere</span>
								<span class="role">administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?=base_url()?>admin/logout"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-active">
										<a href="<?=base_url('admin')?>">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li>
										<a href="<?=base_url('admin')?>/add_shipment">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Add Shipment</span>
										</a>
									</li>
									<li>
										<a href="<?=base_url('admin')?>/add_shipment_status">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Add Shipment Status</span>
										</a>
									</li>
									<li>
										<a href="<?=base_url('admin')?>/view_shipments">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>View Shipments</span>
										</a>
									</li>
									<?php
									$userdata=$this->session->userdata('logged_in');
									if($userdata['type']=='su') { ?>
									<li>
										<a href="<?=base_url('admin')?>/add_destination">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Add Destinations</span>
										</a>
									</li>
									
									<li>
										<a href="<?=base_url('admin')?>/view_weights">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Weights</span>
										</a>
									</li>
									<li>
										<a href="<?=base_url('admin')?>/view_pricing">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Pricing</span>
										</a>
									</li>
									<li>
										<a href="<?=base_url('admin')?>/view_activity">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Activity Stream</span>
										</a>
									</li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Users</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=base_url('admin')?>/view_users">
													 List Users
												</a>
											</li>
											<li>
												<a href="<?=base_url('admin')?>/add_user">
													 Add User
												</a>
											</li>
										</ul>
									</li>
									<?php } ?>
								</ul>
							</nav>
							<div class="sidebar-widget widget-stats">
								
								
							</div>
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							
						</div>
					</header>