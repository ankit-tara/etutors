<?php
/*
Template Name: PD Template
*/

 get_header();
 
?>

    <section class="banner">
        <div class="course_title"><?php the_title();?></div>
    </section>

	<!-- Course -->

	<div class="course mt-9">
		<div class="container">
			<div class="row">

				<!-- Course -->
				<div class="col-lg-8">
					
					<div class="course_container">
						<!-- Course Tabs -->
						<div class="course_tabs_container">
							<div class="tab_panels">
								<div class="tab_panel active">
								<!-- Description -->
                                <?php
                                    if( have_posts() ) {
                                    while( have_posts() ) {
                                        the_post();
                                        ?>
                                        <?php the_content(); ?>
                                        <?php
                                    }
                                    }
                                    ?>
									<br>
									<br>
									<?php
									if(get_field('video_file')['url']) {?>
									<div class="feature_col">
										<div class="feature_video d-flex flex-column align-items-center justify-content-center">
											<div class="feature_video_background" style="background-image:url(<?= get_field('video_screenshot')['url'];?>"></div>
											<a class="vimeo feature_video_button cboxElement" href="<?= get_field('video_file')['url'];?>">
												<img src="<?= get_template_directory_uri();?>/images/play.png" alt="">
											</a>
										</div>
									</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Course Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Feature -->
						<div class="sidebar_section">
							<!-- <div class="sidebar_section_title">Teacher</div> -->
							<div class="sidebar_teacher">
								<div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
									<div class="teacher_image"><img src="http://www.etutour.in/wp-content/uploads/2020/06/HmCoN3.png" alt=""></div>
									<div class="teacher_title">
										<div class="teacher_name"><a href="#">Ms. Priya Gupta</a></div>
										<div class="teacher_position">English Speaking &amp; <br> Personality Development</div>
									</div>
								</div>
								<div class="teacher_info">
									<p>Ms. Priya Gupta is a Graduate from Kumaun University Nanital, and she has over 2 years of experience tutoring  English Language and Personality Development courses. She has acquired knowledge of Personality Plus Program and  English Professional Program. Her teaching style and techniques  instill  confidence, fluency, and sophistication needed to succeed in English in a variety of social and work-related environments. So, Whether your goal is to  crack interviews/competitive Exams or you just want to refine your pronunciation, or produce more professionally written business documents or enhance your public speaking skills, you will benefit from her innovative methods that improve your English and help you to gain that much-needed competitive edge. </p>
								</div>
							</div>
						</div>

						<!-- Latest Course -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Latest Courses</div>
							<div class="sidebar_latest">

                            <?php  
                            $args = array(
                                'post_type'      => 'product',
                                'posts_per_page' => 3,
                            );

                            $loop = new WP_Query( $args );

                            while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;
                            ?>

								<!-- Latest Course -->
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><?= woocommerce_get_product_thumbnail();?></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="<?= get_permalink();?>"><?= get_the_title();?></a></div>
										<div class="latest_price">₹ <?= $product->get_price();?></div>
									</div>
								</div>

                            <?php
                            endwhile;
                                wp_reset_query();
                            ?>

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>
