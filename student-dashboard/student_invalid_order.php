<?php

/*
Template Name: Student Dashboard
 */
if(!is_user_logged_in()){
    wp_redirect('/login');
}
get_header('dashboard');
?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container card">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="card-title">
                            Oops!! you cannot access tests yet.

                        </h2>
                        <h4 class="card-body">

                            Check your orders

                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
                                title="<?php _e('My Account', '');?>"><?php _e('Here', '');?></a>

                        </h4>
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

</main>
<?php get_footer('dashboard');