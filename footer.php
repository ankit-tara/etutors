	<!-- Newsletter -->

	<div class="newsletter">
		<div class="newsletter_background" style="background-image:url(<?= get_template_directory_uri();?>/images/newsletter_background.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex  align-items-center justify-content-center">
						<div class="newsletter_title">Sign up for free demo and get to know your instructor</div>
						<a href="<?php echo site_url();?>#get-demo" class="newsletter_button">Get a Demo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Footer -->

	<footer class="footer">
		<div class="footer_background" style="background-image:url(<?= get_template_directory_uri();?>/images/footer_background.png)"></div>
		<div class="container">
			<div class="row footer_row">
				<div class="col">
					<div class="footer_content">
						<div class="row">

							<div class="col-lg-3 col-sm-6 footer_col">
					
								<!-- Footer About -->
								<div class="footer_section footer_about">
									<div class="footer_logo_container">
										<a href="<?= site_url();?>">
										<img src="<?php echo of_get_option('footer_logo1'); ?>" alt="" width="200">
											<!-- <div class="footer_logo_text">wis<span>utors</span></div> -->
										</a>
									</div>
									<div class="footer_about_text">
										<p><?php echo of_get_option('footer_copyright'); ?></p>
									</div>
								</div>
								
							</div>

							<div class="col-lg-3 col-sm-6 footer_col">
					
								<!-- Footer Contact -->
								<div class="footer_section footer_contact">
									<div class="footer_title">Contact Us</div>
									<div class="footer_contact_info">
										<ul>
											<li>Email: <a href="mailto:<?php echo of_get_option('header_email'); ?>"><?php echo of_get_option('header_email'); ?></a></li>
											<li> Phone:  <a href="tel:<?php echo of_get_option('header_phone'); ?>"><?php echo of_get_option('header_phone'); ?></a></li>
										</ul>
									</div>
								</div>
								
							</div>

							<div class="col-lg-3 col-sm-6 footer_col footer-menu">
					
								<!-- Footer links -->
								<div class="footer_section footer_links">
									<div class="footer_title">Menu Links</div>
									<div class="footer_links_container">
										<?php wp_nav_menu( array( 'theme_location' => 'header-menu' , 'menu_class'=>'main_nav') );?>	
									</div>
								</div>
								
							</div>

							<div class="col-lg-3 col-sm-6 footer_col clearfix">
					
								<!-- Footer links -->
								<div class="footer_section footer_mobile">
									<div class="footer_title">Social links</div>
									<div class="footer_about_text">
										<p>Follow us on:</p>
									</div>
									<div class="footer_social">
										<ul>
											<li><a href="<?php echo of_get_option('fb_link'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="<?php echo of_get_option('skype_link'); ?>"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
											<li><a href="<?php echo of_get_option('insta_link'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>
								
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="row copyright_row">
				<div class="col">
					<div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
						<div class="cr_text">
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
						</div>
						<!-- <div class="ml-lg-auto cr_links">
							<ul class="cr_list">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

 <?php wp_footer();?>
</body>
</html>