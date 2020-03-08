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
<body <?php body_class();?>>

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
										<div><a href="tel:<?php echo of_get_option('header_phone'); ?>"><?php echo of_get_option('header_phone'); ?></a></div>
									</li>
									<li>
										<i class="fa fa-envelope-o" aria-hidden="true"></i>
										<div><a href="mailto:<?php echo of_get_option('header_email'); ?>"><?php echo of_get_option('header_email'); ?></a></div>
									</li>
								</ul>
								<div class="top_bar_login ml-auto">
									<div class="login_button">
										<?php if (is_user_logged_in() && current_user_can('instructor')){
											?>
											<a href="<?php echo site_url() ?>/instructor-profile">Dashboard</a>
										<?php
										}
										elseif(is_user_logged_in() && current_user_can('student')){
											?>
											<a href="<?php echo site_url() ?>/student-profile">Dashboard</a>
										<?php
										}
										else{
											?>
											<a href="<?php home_url() ?>/login">Login</a>
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
									<img src="<?php echo of_get_option('header-logo2'); ?>" alt="" width="200">
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<?php wp_nav_menu( array( 'theme_location' => 'header-menu' , 'menu_class'=>'main_nav') );?>
								<!-- <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div> -->

								<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
									$count = WC()->cart->cart_contents_count;
									$link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();

									?><a class="cart-contents" href="<?php echo $link ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php 
									if ( $count > 0 ) {
										?>
										<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
										<?php
									}
										?></a>
								
								<?php } ?>

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

	</header>

	<!-- Menu -->

	<div class="menu menu_mm">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo_container">
			<a href="<?= site_url();?>">
				<!-- <div class="logo_text">Wis<span>utors</span></div> -->
				<img src="<?php echo of_get_option('header-logo2'); ?>" alt="" width="200">
			</a>
		</div>
		<nav class="menu_nav">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' , 'menu_class'=>'menu_mm') );?>
		</nav>
		<div class="login_button">
			<?php if (is_user_logged_in() && current_user_can('instructor')){
			?>
			<a href="<?php echo site_url() ?>/instructor-profile">Go to Dashboard</a>
			<?php
			}
			elseif(is_user_logged_in() && current_user_can('student')){
			?>
			<a href="<?php echo site_url() ?>/student-profile">Go to Dashboard</a>
			<?php
			}
			else{
			?>
			<a href="<?php home_url() ?>/login">Login</a>
			<?php
			}
			?>
		</div>
	</div>