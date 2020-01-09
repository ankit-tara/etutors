<?php
/*
Template Name: HomePage
*/

 get_header();
 
 ?>


    <!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?= get_template_directory_uri();?>/images/home_slider_1.jpg)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title">Institute For Growth &amp; Development</div>
									<div class="home_slider_subtitle">Get a demo and know your instructor</div>
									<br>
									<button type="submit" class="home_search_button">Learn More</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- Home Slider Nav -->

		<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>

	<!-- Features -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">About Us</h2>
						<div class="section_subtitle">One-To-One Instruction “ONLINE at your convivence”</div>
					</div>
					<br>
					<p class="text-center">Wisutors aims to impart necessary Skills, Knowledge and
						Education for the Overall-Personality Development of the Individuals who aspire to
						succeed in all aspects of life. Nowadays, Effective Communication and Strong-
						Personality is must in a competitive-world, where most Industries and professional-
						sphere require communication either in English or a foreign language. We aim
						to develop those skills through courses that are specifically designed to meet those
						requirements.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>Unlike other learning centers and school-based programs, WISUTERS’s unique
						system of one-to-one instruction, combined with The Rotational Approach to
						Learning, means you are the focus of our attention. With one-to-one instruction, you
						can expect quicker progress and more engaged learning. Results matter. Don’t settle
						for small-group instruction.
						At e-Tutor, we overcome every obstacle faced in small group instruction by creating
						a one-to-one learning environment and supplying the attention students need and
						then giving them the tools that foster confidence, necessary for long-term academic
						success.</p>
				</div>
			</div>
			<div class="row features_row">
				
				<!-- Features Item -->
				<div class="col-lg-3 col-sm-6 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?= get_template_directory_uri();?>/images/icon_1.png" alt=""></div>
						<h3 class="feature_title">The Experts</h3>
						<div class="feature_text"><p>Learn from the best Tutors <br> in the town</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 col-sm-6 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?= get_template_directory_uri();?>/images/icon_2.png" alt=""></div>
						<h3 class="feature_title">Study Material</h3>
						<div class="feature_text"><p>Get access to the online study materials and practice tests</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 col-sm-6 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?= get_template_directory_uri();?>/images/icon_3.png" alt=""></div>
						<h3 class="feature_title">Best Courses</h3>
						<div class="feature_text"><p>Buy our Premium Courses and take a step towards sucess.</p></div>
					</div>
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 col-sm-6 feature_col">
					<div class="feature text-center trans_400">
						<div class="feature_icon"><img src="<?= get_template_directory_uri();?>/images/icon_2.png" alt=""></div>
						<h3 class="feature_title">Heading


						</h3>
						<div class="feature_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Popular Courses -->

	<div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="<?= get_template_directory_uri();?>/images/courses_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Popular Online Courses</h2>
						<div class="section_subtitle"><p>One-To-One Instruction “ONLINE at your convivence”</p></div>
					</div>
				</div>
			</div>
			<div class="row courses_row">
				
				<!-- Course -->
				<div class="col-lg-4 col-sm-6 course_col">
					<div class="course">
						<div class="course_image"><img src="<?= get_template_directory_uri();?>/images/img2.jpg" alt=""></div>
						<div class="course_body">
							<h3 class="course_title"><a href="course.html">Advance English Writing Course for IELTS &amp; TOEFL</a></h3>
							<!-- <div class="course_teacher">Mr. John Taylor</div> -->
							<div class="course_text">
								<p>This class is designed for those who are stuck at 6.5 in
								IELTS writing or any other tests...</p>
								<a href="#" class="read-more">Read More</a>
							</div>
						</div>
						<div class="course_footer">
							<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
								<div class="course_info">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<span>Duration: 2 - 3 months</span>
								</div>
								<div class="course_price ml-auto">&#8377; 7500</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Course -->
				<div class="col-lg-4 col-sm-6 course_col">
					<div class="course">
						<div class="course_image"><img src="<?= get_template_directory_uri();?>/images/img5.jpg" alt=""></div>
						<div class="course_body">
							<h3 class="course_title"><a href="course.html">Critical Thinking &amp; Personality Development</a></h3>
							<!-- <div class="course_teacher">Ms. Lucius</div> -->
							<div class="course_text">
								<p>This course enables
								students to think critically about behavioral and mental processes...</p>
								<a href="#" class="read-more">Read More</a>
							</div>
						</div>
						<div class="course_footer">
							<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
								<div class="course_info">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<span>Duration: 10 - 15 hrs </span>
								</div>
								<div class="course_price ml-auto">&#8377; 2500</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Course -->
				<div class="col-lg-4 col-sm-6 course_col">
					<div class="course">
						<div class="course_image"><img src="<?= get_template_directory_uri();?>/images/img1.jpg" alt=""></div>
						<div class="course_body">
							<h3 class="course_title"><a href="course.html">Spoken Languages:</a></h3>
							<!-- <div class="course_teacher">Mr. Charles</div> -->
							<div class="course_text">
								<p>Train for languages through speaking sessions such as
								English, Spanish, German etc. If you are stuck at 6.5,
								this course is perfect for you...</p>
								<a href="#" class="read-more">Read more</a>
							</div>
						</div>
						<div class="course_footer">
							<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
								<div class="course_info">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
									<span>Duration: 3 months</span>
								</div>
								<div class="course_price ml-auto"><span>&#8377;5500</span>&#8377; 3500</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col">
					<div class="courses_button trans_200"><a href="#">view all courses</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Counter -->

	<div class="counter">
		<div class="counter_background" style="background-image:url(<?= get_template_directory_uri();?>/images/counter_background.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="counter_content">
						<h2 class="counter_title">Register Now</h2>
						<div class="counter_text"><p>Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dumy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></div>
						<div class="courses_button trans_200 ml-0"><a href="#">Learn More</a></div>
					</div>

				</div>
			</div>

			<div class="counter_form">
				<div class="row fill_height">
					<div class="col fill_height">
						<form class="counter_form_content d-flex flex-column align-items-center justify-content-center" action="#">
							<div class="counter_form_title">courses now</div>
							<input type="text" class="counter_input" placeholder="Your Name:" required="required">
							<input type="tel" class="counter_input" placeholder="Phone:" required="required">
							<select name="counter_select" id="counter_select" class="counter_input counter_options">
								<option>Choose Subject</option>
								<option>Subject</option>
								<option>Subject</option>
								<option>Subject</option>
							</select>
							<textarea class="counter_input counter_text_input" placeholder="Message:" required="required"></textarea>
							<button type="submit" class="counter_form_button">submit now</button>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- Team -->

	<div class="team">
		<div class="team_background parallax-window" data-parallax="scroll" data-image-src="<?= get_template_directory_uri();?>/images/team_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">The Best Tutors in Town</h2>
						<div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
					</div>
				</div>
			</div>
			<div class="row team_row">
				
				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="<?= get_template_directory_uri();?>/images/team_1.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">Jacke Masito</a></div>
							<div class="team_subtitle">Marketing & Management</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="<?= get_template_directory_uri();?>/images/team_2.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">William James</a></div>
							<div class="team_subtitle">Designer & Website</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="<?= get_template_directory_uri();?>/images/team_3.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">John Tyler</a></div>
							<div class="team_subtitle">Quantum mechanics</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="<?= get_template_directory_uri();?>/images/team_4.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">Veronica Vahn</a></div>
							<div class="team_subtitle">Math & Physics</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="newsletter_background parallax-window" data-parallax="scroll" data-image-src="<?= get_template_directory_uri();?>/images/newsletter.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						<!-- Newsletter Content -->
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">sign up for more Information</div>
							<div class="newsletter_subtitle">Subcribe to lastest courses deals we offer</div>
						</div>

						<!-- Newsletter Form -->
						<div class="newsletter_form_container ml-lg-auto">
							<form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
								<input type="email" class="newsletter_input" placeholder="Your Email" required="required">
								<button type="submit" class="newsletter_button">subscribe</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
