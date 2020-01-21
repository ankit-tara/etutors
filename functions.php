<?php

//Add scripts and stylesheets
function ar_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/styles/bootstrap4/bootstrap.min.css');
	wp_enqueue_style( 'fontAwesome', get_template_directory_uri() . '/plugins/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/plugins/OwlCarousel2-2.2.1/owl.carousel.css' );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/plugins/OwlCarousel2-2.2.1/owl.theme.default.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/plugins/OwlCarousel2-2.2.1/animate.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/styles/main_styles.css' );
	wp_enqueue_style( 'aboutcss', get_template_directory_uri() . '/styles/about.css' );
	wp_enqueue_style( 'blogcss', get_template_directory_uri() . '/styles/blog.css' );
	wp_enqueue_style( 'blog_single', get_template_directory_uri() . '/styles/blog_single.css' );
	wp_enqueue_style( 'contact', get_template_directory_uri() . '/styles/contact.css' );
	wp_enqueue_style( 'courses', get_template_directory_uri() . '/styles/courses.css' );
	wp_enqueue_style( 'course', get_template_directory_uri() . '/styles/course.css' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/styles/responsive.css' );  
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'tweenmax', get_template_directory_uri() . '/plugins/greensock/TweenMax.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/styles/bootstrap4/popper.js', array( 'jquery' ), true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/styles/bootstrap4/bootstrap.min.js', array( '' ), true );
	wp_enqueue_script( 'timelineMax', get_template_directory_uri() . '/plugins/greensock/TimelineMax.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'scrollMagic', get_template_directory_uri() . '/plugins/scrollmagic/ScrollMagic.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'animationGsap', get_template_directory_uri() . '/plugins/greensock/animation.gsap.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'scrolltoplugin', get_template_directory_uri() . '/plugins/greensock/ScrollToPlugin.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'owljs', get_template_directory_uri() . '/plugins/OwlCarousel2-2.2.1/owl.carousel.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/plugins/easing/easing.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/plugins/parallax-js-master/parallax.min.js', array( 'jquery' ), '3.3.6', true );
	wp_enqueue_script( 'App', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '3.3.6', true );

	if(is_page('home')){
		wp_enqueue_script( 'homejs', get_template_directory_uri() . '/js/home.js', array( 'jquery' ), '3.3.6', true );
	}
	if(is_page('about')){
		wp_enqueue_script( 'aboutjs', get_template_directory_uri() . '/js/about.js', array( 'jquery' ), '3.3.6', true );
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
add_action('init','create_student_account');

?>