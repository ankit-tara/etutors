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
				<!-- <div class="owl-item">
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
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?= get_template_directory_uri();?>/images/home_slider_2.jpg)"></div>
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
				</div> -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?= get_template_directory_uri();?>/images/home_slider_3.jpg)"></div>
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
						<h3 class="feature_title">60+ Tests


						</h3>
						<div class="feature_text"><p>Get Access to 60 plus practice tests for ielts</p></div>
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
				
				<?php  
					$args = array(
						'post_type'      => 'product',
						'posts_per_page' => 3,
					);

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post();
						global $product;
						// print_r($product);
					?>
						<!-- Course -->
						<div class="col-lg-4 col-sm-6 course_col">
							<div class="course">
								<div class="course_image"><?= woocommerce_get_product_thumbnail();?></div>
								<div class="course_body">
									<h3 class="course_title"><a href="<?= get_permalink();?>"><?= get_the_title();?></a></h3>
									<!-- <div class="course_teacher">Mr. John Taylor</div> -->
									<div class="course_text">
										<p><?= $product->get_short_description();?></p>
										<a href="<?= get_permalink();?>" class="read-more">Read More</a>
									</div>
								</div>
								<div class="course_footer">
									<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
										<div class="course_info">
											<i class="fa fa-clock-o" aria-hidden="true"></i>
											<span>Duration: 2 - 3 months</span>
										</div>
										<div class="course_price ml-auto">&#8377;<?= $product->get_regular_price();?></div>
									</div>
								</div>
							</div>
						</div>
					<?php
					endwhile;
						wp_reset_query();
					?>

			</div>
			<div class="row">
				<div class="col">
					<div class="courses_button trans_200"><a href="/shop">view all courses</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Counter -->

	<div class="courses" id="get-demo">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="<?= get_template_directory_uri();?>/images/courses_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Register for Online Demo</h2>
						<div class="section_subtitle mb-5"></div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 feature_col">
					<div class="feature_video d-flex flex-column align-items-center justify-content-center">
						<div class="feature_video_background" style="background-image:url(<?= get_template_directory_uri();?>/images/test-screenshot.png)"></div>
						<a class="vimeo feature_video_button cboxElement" href="<?= get_template_directory_uri();?>/test-video.mp4">
							<img src="<?= get_template_directory_uri();?>/images/play.png" alt="">
						</a>
					</div>
				</div>
				<div class="col-lg-6">
					<?php echo do_shortcode( '[contact-form-7 id="277" title="Demo" html_class="counter_form_content d-flex flex-column align-items-center justify-content-center"]' )?>
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
				<!-- <div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="<?= get_template_directory_uri();?>/images/team_2.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">Mr. Paras Jhokke</a></div>
							<div class="team_subtitle">IELTS/TOEFL Instructor</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div> -->

				<div class="col-lg-12 team_col">
					<div class="team_item">
						<div class="team_body detail">
							<div class="left">
								<div class=""><img src="<?= get_template_directory_uri();?>/images/instructor.png" alt=""></div>
								<div class="team_title"><a href="#">Mr. Paras Jhokke</a></div>
								<div class="team_subtitle">IELTS/TOEFL Instructor</div>
								<div class="social_list">
									<ul>
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="right">
								<div class="team_title">Mr. Paras Jhokke</div>
								<div class="team_subtitle">Mr. Paras Jhokke is a Graduate from California State University, Northridge USA,
								and he holds Bachelors of Science in Mechanical Engineer. Mr. Paras has Extensive
								Experience with English language including Listening, Reading, Writing and
								Speaking modules. His degree required him to go through rigorous Writing,
								Speaking and Reading Courses which has made him an experienced teacher of
								English Language. He has taken several reading and writing courses such as ENG
								028: Intermediate Reading &amp; Composition, ENG 097: Development Reading, ENG
								098: Development Writing, ENG 101: College Reading and Composition I, ENG
								103: Advanced Writing and Critical Thinking. Additionally, he has taken Personality
								Development and Critical Thinking Course for Overall growth and Development of
								the personality. He has taken PSY 002: General Psychology 2, PSY 150: Principles
								of Human Behavior, SPEECH 121: Interpersonal Communication/Process, PHIL:
								001: Principles of Religions, POL SCI 100: Government and Constitution and many
								more. So, whether you want to achieve higher bands in IELTS/TOEFL or just want to
								develop and grow your personality, Mr. Paras is here to help you.</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

<?php get_footer(); ?>
