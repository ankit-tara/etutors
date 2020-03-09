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
				<?php 
				if( have_rows('slides') ): while ( have_rows('slides') ) : the_row();
				?>
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?php the_sub_field('slide_image');?>)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title"><?php the_sub_field('slide_title');?></div>
									<div class="home_slider_subtitle"><?php the_sub_field('slide_subtitle');?></div>
									<br>
									<a href="<?php the_sub_field('slide_btn_link');?>" class="home_search_button btn"><?php the_sub_field('slide_btn_text');?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				endwhile; else : endif;
				?>
			</div>
		</div>

		<!-- Home Slider Nav -->

		<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>

	<!-- About Us Section -->

	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title"><?= get_field('about_title');?></h2>
						<div class="section_subtitle"><?= get_field('about_subtitle');?></div>
					</div>
					<br>
					<?= get_field('about_content');?>
				</div>
			</div>
			<div class="row features_row">
				<?php 
				if( have_rows('about_boxes') ): while ( have_rows('about_boxes') ) : the_row();
				?>
					<div class="col-lg-3 col-sm-6 feature_col">
						<div class="feature text-center trans_400">
							<div class="feature_icon"><img src="<?php the_sub_field('box_icon');?>" alt=""></div>
							<h3 class="feature_title"><?php the_sub_field('box_title');?></h3>
							<div class="feature_text"><p><?php the_sub_field('box_content');?></p></div>
						</div>
					</div>
				<?php
				endwhile; else : endif;
				?>
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
						<h2 class="section_title"><?= get_field('courses_heading');?></h2>
						<div class="section_subtitle"><p><?= get_field('courses_subheading');?></p></div>
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
									<div class="course_text">
										<p><?= $product->get_short_description();?></p>
										<a href="<?= get_permalink();?>" class="read-more">Read More</a>
									</div>
								</div>
								<div class="course_footer">
									<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
										<div class="course_info">
											<i class="fa fa-clock-o" aria-hidden="true"></i>
											<span>Duration: 15 to 60 days</span>
										</div>
										<div class="course_price ml-auto">&#8377;<?= $product->get_price();?></div>
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

	<!-- Demo Section -->

	<div class="courses" id="get-demo">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="<?= get_template_directory_uri();?>/images/courses_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title"><?= get_field('demo_heading');?></h2>
						<div class="section_subtitle mb-5"></div>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 feature_col">
					<div class="feature_video d-flex flex-column align-items-center justify-content-center">
						<div class="feature_video_background" style="background-image:url(<?= get_template_directory_uri();?>/images/test-screenshot.png)"></div>
						<a class="vimeo feature_video_button cboxElement" href="<?= get_field('demo_video')['url'];?>">
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

	<!-- Instructor Section -->

	<div class="team">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title"><?= get_field('tutor_heading');?></h2>
					</div>
				</div>
			</div>
			<div class="row team_row">

				<div class="col-lg-12 team_col">
					<div class="team_item">
						<div class="team_body detail">
							<div class="left">
								<div class=""><img src="<?= get_field('tutour_img');?>" alt=""></div>
								<div class="team_title"><a href="javascript:void(0)"><?= get_field('tutor_name');?></a></div>
								<div class="team_subtitle"><?= get_field('tutour_profile');?></div>
							</div>
							<div class="right">
								<div class="team_title"><?= get_field('tutor_name');?></div>
								<div class="team_subtitle"><?= get_field('tutour_description');?></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

<?php get_footer(); ?>
