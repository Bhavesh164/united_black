<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from radixtouch.in/templates/admin/aegis/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 May 2020 09:24:49 GMT -->

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>United Black</title>
	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bundles/jqvmap/dist/jqvmap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bundles/weather-icon/css/weather-icons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bundles/weather-icon/css/weather-icons-wind.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bundles/summernote/summernote-bs4.css">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
	<!-- Custom style CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
	<link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url(); ?>assets/img/favicon.ico' />
	<!-- General JS Scripts -->
	<script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
</head>

<body>
	<div class="loader"></div>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<div class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>
						<li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
								<i data-feather="maximize"></i>
							</a></li>
						<li>
							<form class="form-inline mr-auto">
								<div class="search-element">
									<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
									<button class="btn" type="submit">
										<i class="fas fa-search"></i>
									</button>
								</div>
							</form>
						</li>
					</ul>
				</div>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
							<span class="badge headerBadge1">
								6 </span> </a>
						<div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
							<div class="dropdown-header">
								Messages
								<div class="float-right">
									<a href="#">Mark All As Read</a>
								</div>
							</div>
							<div class="dropdown-list-content dropdown-list-message">
								<a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
                      text-white"> <img alt="image" src="<?php echo base_url(); ?>assets/img/users/user-1.png" class="rounded-circle">
									</span> <span class="dropdown-item-desc"> <span class="message-user">John
											Deo</span>
										<span class="time messege-text">Please check your mail !!</span>
										<span class="time">2 Min Ago</span>
									</span>
								</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
										<img alt="image" src="<?php echo base_url(); ?>assets/img/users/user-2.png" class="rounded-circle">
									</span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
											Smith</span> <span class="time messege-text">Request for leave
											application</span>
										<span class="time">5 Min Ago</span>
									</span>
								</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
										<img alt="image" src="<?php echo base_url(); ?>assets/img/users/user-5.png" class="rounded-circle">
									</span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
											Ryan</span> <span class="time messege-text">Your payment invoice is
											generated.</span> <span class="time">12 Min Ago</span>
									</span>
								</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
										<img alt="image" src="<?php echo base_url(); ?>assets/img/users/user-4.png" class="rounded-circle">
									</span> <span class="dropdown-item-desc"> <span class="message-user">Lina
											Smith</span> <span class="time messege-text">hii John, I have upload
											doc
											related to task.</span> <span class="time">30
											Min Ago</span>
									</span>
								</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
										<img alt="image" src="<?php echo base_url(); ?>assets/img/users/user-3.png" class="rounded-circle">
									</span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
											Joshi</span> <span class="time messege-text">Please do as specify.
											Let me
											know if you have any query.</span> <span class="time">1
											Days Ago</span>
									</span>
								</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
										<img alt="image" src="<?php echo base_url(); ?>assets/img/users/user-2.png" class="rounded-circle">
									</span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
											Smith</span> <span class="time messege-text">Client Requirements</span>
										<span class="time">2 Days Ago</span>
									</span>
								</a>
							</div>
							<div class="dropdown-footer text-center">
								<a href="#">View All <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</li>
					<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="bell"></i>
							<span class="badge headerBadge2">
								3 </span> </a>
						<div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
							<div class="dropdown-header">
								Notifications
								<div class="float-right">
									<a href="#">Mark All As Read</a>
								</div>
							</div>
							<div class="dropdown-list-content dropdown-list-icons">
								<a href="#" class="dropdown-item dropdown-item-unread"> <span class="dropdown-item-icon bg-primary text-white"> <i class="fas
                        fa-code"></i>
									</span> <span class="dropdown-item-desc"> Template update is
										available now! <span class="time">2 Min
											Ago</span>
									</span>
								</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
                        fa-user"></i>
									</span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
											Sugiharto</b> are now friends <span class="time">10 Hours
											Ago</span>
									</span>
								</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i class="fas
                        fa-check"></i>
									</span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
										moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
											Hours
											Ago</span>
									</span>
								</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i class="fas fa-exclamation-triangle"></i>
									</span> <span class="dropdown-item-desc"> Low disk space. Let's
										clean it! <span class="time">17 Hours Ago</span>
									</span>
								</a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
                        fa-bell"></i>
									</span> <span class="dropdown-item-desc"> Welcome to Aegis
										template! <span class="time">Yesterday</span>
									</span>
								</a>
							</div>
							<div class="dropdown-footer text-center">
								<a href="#">View All <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?php echo base_url(); ?>assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
						<div class="dropdown-menu dropdown-menu-right pullDown">
							<div class="dropdown-title">Hello Sarah Smith</div>
							<a href="<?= base_url('admin/profile') ?>" class="dropdown-item has-icon"> <i class="far
                    fa-user"></i> Profile
							</a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
								Activities
							</a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
								Settings
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url('admin/auth/logout') ?>" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
								Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>