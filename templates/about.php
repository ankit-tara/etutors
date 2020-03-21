<?php
/*
Template Name: About us
*/

 get_header();
 wp_reset_query();
?>



<!-- Banner Section -->

<div class="banner_section">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="<?php echo site_url();?>">Home</a></li>
                            <li>About</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>
                                                                                
<!-- About -->

<div class="about">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title"><?php the_title();?></h2>
                </div>
            </div>
        </div>
        <div class="row about_row">
            
            <!-- About Item -->
            <div class="col-md-12">
                <?php the_content();?>
                <br>
                <br>
            </div>
            <?php 
				if( have_rows('image_sections') ): while ( have_rows('image_sections') ) : the_row();
            ?>
            <div class="col-lg-4 about_col">
                <div class="about_item">
                    <div class="about_item_image"><img src="<?php the_sub_field('image');?>" alt=""></div>
                    <div class="about_item_title text-center"><a href="javascript:void(0)"><?php the_sub_field('text');?></a></div>
                </div>
            </div>
            <?php
				endwhile; else : endif;
            ?>
        </div>
    </div>
</div>

<!-- Feature -->

<div class="feature">
    <div class="feature_background" style="background-image:url(<?= get_template_directory_uri();?>/images/courses_background.jpg)"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Testimonials</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme testimonial_slider">
                    <?php  
					$args = array(
						'post_type'      => 'student_reviews',
						'posts_per_page' => 15,
					);

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post();
						global $student_reviews;
					?>
                    <div class="owl-item">
                        <div class="bubble-center">
                            <div class="bubble-3">
                                <h3><?php the_title();?></h3>
                                <?php the_content();?>
                            </div>
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




<?php get_footer(); ?>

