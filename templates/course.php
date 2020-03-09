<?php
/*
Template Name: Course Template
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
									<div class="teacher_image"><img src="<?= get_template_directory_uri();?>/images/instructor.png" alt=""></div>
									<div class="teacher_title">
										<div class="teacher_name"><a href="#">Paras Jhokke</a></div>
										<div class="teacher_position">IELTS/TOEFL Instructor</div>
									</div>
								</div>
								<div class="teacher_info">
									<p>Mr. Paras Jhokke is a Graduate from California State University, Northridge USA,
										and he holds Bachelors of Science in Mechanical Engineer.
										<br> Mr. Paras has Extensive
										Experience with English language including Listening, Reading, Writing and
										Speaking modules.So, whether you want to achieve higher bands in IELTS/TOEFL or just want to
										develop and grow your personality, Mr. Paras is here to help you.</p>
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
