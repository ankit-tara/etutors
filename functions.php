<?php

//Add scripts and stylesheets
function ar_scripts() {
  $url = get_template_directory_uri() ;
	wp_enqueue_style( 'bootstrap',  $url . '/styles/bootstrap4/bootstrap.min.css');
	wp_enqueue_style( 'fontAwesome',  $url . '/plugins/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'owl',  $url . '/plugins/OwlCarousel2-2.2.1/owl.carousel.css' );
	wp_enqueue_style( 'owl-theme',  $url . '/plugins/OwlCarousel2-2.2.1/owl.theme.default.css' );
	wp_enqueue_style( 'animate',  $url . '/plugins/OwlCarousel2-2.2.1/animate.css' );
	wp_enqueue_style( 'themify-icons',  $url . '/plugins/themify-icons.css' );
	wp_enqueue_style( 'color-box-css',  $url . '/plugins/colorbox/colorbox.css' );
	wp_enqueue_style( 'main',  $url . '/styles/main_styles.css' );
	wp_enqueue_style( 'aboutcss',  $url . '/styles/about.css' );
	wp_enqueue_style( 'blogcss',  $url . '/styles/blog.css' );
	wp_enqueue_style( 'blog_single',  $url . '/styles/blog_single.css' );
	wp_enqueue_style( 'contactpage',  $url . '/styles/contactpage.css' );
	wp_enqueue_style( 'courses',  $url . '/styles/courses.css' );
	wp_enqueue_style( 'course',  $url . '/styles/course.css' );
	wp_enqueue_style( 'responsive',  $url . '/styles/responsive.css' );  
	wp_enqueue_script( 'jquery',  $url . '/js/jquery-3.2.1.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'tweenmax',  $url . '/plugins/greensock/TweenMax.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'colorbox-js',  $url . '/plugins/colorbox/jquery.colorbox-min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'popper',  $url . '/styles/bootstrap4/popper.js', array( 'jquery' ), true );
	wp_enqueue_script( 'bootstrap',  $url . '/styles/bootstrap4/bootstrap.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'timelineMax',  $url . '/plugins/greensock/TimelineMax.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'scrollMagic',  $url . '/plugins/scrollmagic/ScrollMagic.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'animationGsap',  $url . '/plugins/greensock/animation.gsap.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'scrolltoplugin',  $url . '/plugins/greensock/ScrollToPlugin.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'owljs',  $url . '/plugins/OwlCarousel2-2.2.1/owl.carousel.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'easing',  $url . '/plugins/easing/easing.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'parallax',  $url . '/plugins/parallax-js-master/parallax.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'App',  $url . '/js/app.js', array( 'jquery' ), '3.3.6', true );

	if(is_page('home')){
		wp_enqueue_script( 'homejs',  $url . '/js/home.js', array( 'jquery' ), '3.3.6', true );
	}
	if(is_page('about')){
		wp_enqueue_script( 'aboutjs',  $url . '/js/about.js', array( 'jquery' ), '3.3.6', true );
	}
}

add_action( 'wp_enqueue_scripts', 'ar_scripts' );


add_role('student', 'Student', array(
	'read' => true, // True allows that capability
));


function create_student_account(){
    //You may need some data validation here
    $user = ( isset($_POST['uname']) ? $_POST['uname'] : '' );
    $pass = ( isset($_POST['upass']) ? $_POST['upass'] : '' );
    $email = ( isset($_POST['uemail']) ? $_POST['uemail'] : '' );

    if ( !username_exists( $user )  && !email_exists( $email ) ) {
       $user_id = wp_create_user( $user, $pass, $email );
       if( !is_wp_error($user_id) ) {
           //user has been created
           $user = new WP_User( $user_id );
           $user->set_role( 'student' );
           //Redirect
           wp_redirect( site_url() . '/login' );
           exit;
       } else {
           //$user_id is a WP_Error object. Manage the error
       }
    }

}
add_role('instructor', 'instructor', array(
	'read' => true, // True allows that capability
));


function create_instructor_account(){
    //You may need some data validation here
    $user = ( isset($_POST['uname']) ? $_POST['uname'] : '' );
    $pass = ( isset($_POST['upass']) ? $_POST['upass'] : '' );
    $email = ( isset($_POST['uemail']) ? $_POST['uemail'] : '' );

    if ( !username_exists( $user )  && !email_exists( $email ) ) {
       $user_id = wp_create_user( $user, $pass, $email );
       if( !is_wp_error($user_id) ) {
           //user has been created
           $user = new WP_User( $user_id );
           $user->set_role( 'instructor' );
           //Redirect
           wp_redirect( site_url() . '/login' );
           exit;
       } else {
           //$user_id is a WP_Error object. Manage the error
       }
    }

}
add_action('init','create_instructor_account');


function my_logged_in_redirect() {
     
    if ( is_user_logged_in() && is_page('login') && current_user_can('student') ) 
    {
        wp_redirect( site_url().'/student-profile');
        die;
    }
    if ( is_user_logged_in() && is_page('login') && current_user_can('instructor') ) 
    {
        wp_redirect( site_url().'/instructor');
        die;
    }
     
}
add_action( 'template_redirect', 'my_logged_in_redirect' );


add_action( 'template_redirect', 'redirect_to_specific_page' );

function redirect_to_specific_page() {

if ( is_page('student-profile') && ! is_user_logged_in() ) {

wp_redirect( site_url() . '/login', 301 ); 
  exit;
    }
if ( is_page('instructor') && ! is_user_logged_in() ) {

wp_redirect( site_url() . '/login', 301 ); 
  exit;
    }
}


function cc_wpse_278096_disable_admin_bar() {
  //  if (current_user_can('administrator') || current_user_can('contributor') ) {
  //    // user can view admin bar
  //    show_admin_bar(true); // this line isn't essentially needed by default...
  //  } else {
     // hide admin bar
     show_admin_bar(false);
  //  }
}
add_action('after_setup_theme', 'cc_wpse_278096_disable_admin_bar');



function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

function woocommerce_quantity_input_max_callback( $max, $product ) {
	$max = 1;  
	return $max;
}
add_filter( 'woocommerce_quantity_input_max', 'woocommerce_quantity_input_max_callback', 10, 2 );

function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Buy Now', 'woocommerce' ); 
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Buy Now', 'woocommerce' );
}



add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
    function wcs_woo_remove_reviews_tab($tabs) {
    unset($tabs['reviews']);
    return $tabs;
}

add_filter('woocommerce_product_related_posts_query', '__return_empty_array', 100);

function disable_woo_commerce_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 
}
add_action('init', 'disable_woo_commerce_sidebar');


/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */

 /*
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    $link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();

    ?><a class="cart-contents" href="<?php echo  $link ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

*/


