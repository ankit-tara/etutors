<?php
/*
Template Name: Full Page Template
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
				<div class="col-lg-12">
					
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

		</div>
	</div>


<?php get_footer(); ?>
