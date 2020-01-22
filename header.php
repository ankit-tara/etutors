<!DOCTYPE html>
<html lang="en">
<head>
<title>e-tutour - Institute For Growth &amp; Development</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="e-tutour - Institute For Growth & Development">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head();?>
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
			
		<!-- Top Bar -->
		<div class="top_bar">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<ul class="top_bar_contact_list">
									<li><div class="question">Have any questions?</div></li>
									<li>
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div><a href="#">221-1234-8228</a></div>
									</li>
									<li>
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
										<div><a href="#">parasjhokke@gmail.com</a></div>
									</li>
								</ul>
								<div class="top_bar_login ml-auto">
									<div class="login_button">
										<?php if (is_user_logged_in()){
											?>
											<a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
										<?php
										}
										else{
											?>
											<a href="http://arbites.in/e-tutors/login">Register or Login</a>
										<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container">
								<a href="<?= site_url();?>">
									<!-- <div class="logo_text">Wis<span>utors</span></div> -->
									<img src="<?= get_template_directory_uri()?>/images/logo1.png" alt="" width="200">
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li class="active nav-item"><a href="http://arbites.in/e-tutors">Home</a></li>
									<li class="nav-item"><a href="http://arbites.in/e-tutors/about/">About</a></li>
									<li class="nav-item dropdown">
										<a  class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">Service</a>
										<ul class="dropdown-menu">
											<li class="dropdown-item"><a href="#">IELTS/TOEFL</a></li>
											<li class="dropdown-item"><a href="#">CRITICAL THINKING &amp; PERSONALITY
												DEVELOPMENT</a></li>
											<li class="dropdown-item"><a href="#">Spoken English</a></li>
										</ul>
									</li>
									<li class="nav-item"><a href="#">Counselling</a></li>
									<li class="nav-item"><a href="http://arbites.in/e-tutors/contact-us">Contact</a></li>
								</ul>
								<div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

								<!-- Hamburger -->
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Search Panel -->
		<div class="header_search_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
							<form action="#" class="header_search_form">
								<input type="search" class="search_input" placeholder="Search" required="required">
								<button class="header_search_button d-flex flex-column align-items-center justify-content-center">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</div>			
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="search">
			<form action="#" class="header_search_form menu_mm">
				<input type="search" class="search_input menu_mm" placeholder="Search" required="required">
				<button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
					<i class="fa fa-search menu_mm" aria-hidden="true"></i>
				</button>
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="http://arbites.in/e-tutors/about/">Home</a></li>
				<li class="menu_mm"><a href="http://arbites.in/e-tutors/about/">About</a></li>
				<li class="menu_mm"><a href="#">Courses</a></li>
				<li class="nav-item"><a href="#">Counselling</a></li>
				<li class="menu_mm"><a href="http://arbites.in/e-tutors/contact-us/">Contact</a></li>
			</ul>
		</nav>
	</div>