
<?php 
/*
Template Name: Inavlid order
 */

get_header();?>
   <div class="banner_section">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">404</a></li>
                            <li>Page Not Found</li>
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
                    <h2 class="section_title">

                   
                    </h2>
                    <h2>
                    
                    Check your orders 
                    
                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account',''); ?>"><?php _e('Here',''); ?></a>

                    </h2>
                    <p>
                    Either you dont have any valid order yet or your orders have expired.
                    </p>
                    <p class="text text-success">Please contact us for any query</p>
                    <!-- <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu Vestibulum</p></div> -->
                </div>
            </div>
        </div>

    </div>
</div>
<?php get_footer();?>