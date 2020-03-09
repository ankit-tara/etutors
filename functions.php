<?php

include 'includes/test_functions.php';
//Add scripts and stylesheets
function ar_scripts()
{
    $url = get_template_directory_uri();
    wp_enqueue_script('jquery', $url . '/js/jquery-3.2.1.min.js', array('jquery'), '3.3.6', true);

    wp_register_script("questions-script", $url . '/test-assets/question.js', array('jquery'));
    wp_localize_script('questions-script', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_enqueue_script('questions-script');

    wp_enqueue_style('bootstrap', $url . '/styles/bootstrap4/bootstrap.min.css');
    wp_enqueue_style('fontAwesome', $url . '/plugins/font-awesome-4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('owl', $url . '/plugins/OwlCarousel2-2.2.1/owl.carousel.css');
    wp_enqueue_style('owl-theme', $url . '/plugins/OwlCarousel2-2.2.1/owl.theme.default.css');
    wp_enqueue_style('animate', $url . '/plugins/OwlCarousel2-2.2.1/animate.css');
    wp_enqueue_style('themify-icons', $url . '/plugins/themify-icons.css');
    wp_enqueue_style('color-box-css', $url . '/plugins/colorbox/colorbox.css');
    wp_enqueue_style('main', $url . '/styles/main_styles.css');
    wp_enqueue_style('aboutcss', $url . '/styles/about.css');
    wp_enqueue_style('blogcss', $url . '/styles/blog.css');
    wp_enqueue_style('blog_single', $url . '/styles/blog_single.css');
    wp_enqueue_style('contactpage', $url . '/styles/contactpage.css');
    wp_enqueue_style('courses', $url . '/styles/courses.css');
    wp_enqueue_style('course', $url . '/styles/course.css');
    wp_enqueue_style('responsive', $url . '/styles/responsive.css');
    wp_enqueue_script('tweenmax', $url . '/plugins/greensock/TweenMax.min.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('colorbox-js', $url . '/plugins/colorbox/jquery.colorbox-min.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('slim', 'https: //code.jquery.com/jquery-3.2.1.slim.min.js', array('jquery'), true);
    wp_enqueue_script('popper', $url . '/styles/bootstrap4/popper.js', array('jquery'), true);
    wp_enqueue_script('bootstrap', $url . '/styles/bootstrap4/bootstrap.min.js', array('jquery'), true);
    wp_enqueue_script('timelineMax', $url . '/plugins/greensock/TimelineMax.min.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('scrollMagic', $url . '/plugins/scrollmagic/ScrollMagic.min.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('animationGsap', $url . '/plugins/greensock/animation.gsap.min.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('scrolltoplugin', $url . '/plugins/greensock/ScrollToPlugin.min.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('owljs', $url . '/plugins/OwlCarousel2-2.2.1/owl.carousel.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('easing', $url . '/plugins/easing/easing.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('parallax', $url . '/plugins/parallax-js-master/parallax.min.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('App', $url . '/js/app.js', array('jquery'), '3.3.6', true);

    if (is_page('home')) {
        wp_enqueue_script('homejs', $url . '/js/home.js', array('jquery'), '3.3.6', true);
    }
    if (is_page('about')) {
        wp_enqueue_script('aboutjs', $url . '/js/about.js', array('jquery'), '3.3.6', true);
    }
}

add_action('wp_enqueue_scripts', 'ar_scripts');

add_action('wp_enqueue_scripts', 'ar_scripts');

add_role('student', 'Student', array(
    'read' => true, // True allows that capability
));

function create_student_account()
{
    //You may need some data validation here
    $user = (isset($_POST['uname']) ? $_POST['uname'] : '');
    $pass = (isset($_POST['upass']) ? $_POST['upass'] : '');
    $email = (isset($_POST['uemail']) ? $_POST['uemail'] : '');

    if (!username_exists($user) && !email_exists($email)) {
        $user_id = wp_create_user($user, $pass, $email);
        if (!is_wp_error($user_id)) {
            //user has been created
            $user = new WP_User($user_id);
            $user->set_role('student');
            //Redirect
            wp_redirect(site_url() . '/login');
            exit;
        } else {
            //$user_id is a WP_Error object. Manage the error
        }
    }

}
add_role('instructor', 'instructor', array(
    'read' => true, // True allows that capability
));

function create_instructor_account()
{
    //You may need some data validation here
    $user = (isset($_POST['uname']) ? $_POST['uname'] : '');
    $pass = (isset($_POST['upass']) ? $_POST['upass'] : '');
    $email = (isset($_POST['uemail']) ? $_POST['uemail'] : '');

    if (!username_exists($user) && !email_exists($email)) {
        $user_id = wp_create_user($user, $pass, $email);
        if (!is_wp_error($user_id)) {
            //user has been created
            $user = new WP_User($user_id);
            $user->set_role('instructor');
            //Redirect
            wp_redirect(site_url() . '/login');
            exit;
        } else {
            //$user_id is a WP_Error object. Manage the error
        }
    }

}
add_action('init', 'create_instructor_account');

function my_logged_in_redirect()
{

    if (is_user_logged_in() && is_page('login') && current_user_can('student')) {
        wp_redirect(site_url() . '/student-profile');
        die;
    }
    if (is_user_logged_in() && is_page('login') && current_user_can('instructor')) {
        wp_redirect(site_url() . '/instructor');
        die;
    }

}
add_action('template_redirect', 'my_logged_in_redirect');

add_action('template_redirect', 'redirect_to_specific_page');

function redirect_to_specific_page()
{

    if (is_page('student-profile') && !is_user_logged_in()) {

        wp_redirect(site_url() . '/login', 301);
        exit;
    }
    if (is_page('instructor') && !is_user_logged_in()) {

        wp_redirect(site_url() . '/login', 301);
        exit;
    }
}

function cc_wpse_278096_disable_admin_bar()
{
    //  if (current_user_can('administrator') || current_user_can('contributor') ) {
    //    // user can view admin bar
    //    show_admin_bar(true); // this line isn't essentially needed by default...
    //  } else {
    // hide admin bar
    show_admin_bar(false);
    //  }
}
add_action('after_setup_theme', 'cc_wpse_278096_disable_admin_bar');

function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'extra-menu' => __('Extra Menu'),
        )
    );
}
add_action('init', 'register_my_menus');

function woocommerce_quantity_input_max_callback($max, $product)
{
    $max = 1;
    return $max;
}
add_filter('woocommerce_quantity_input_max', 'woocommerce_quantity_input_max_callback', 10, 2);

function woocommerce_custom_single_add_to_cart_text()
{
    return __('Buy Now', 'woocommerce');
}
add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text');

// To change add to cart text on product archives(Collection) page
add_filter('woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text');
function woocommerce_custom_product_add_to_cart_text()
{
    return __('Buy Now', 'woocommerce');
}

add_filter('woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98);
function wcs_woo_remove_reviews_tab($tabs)
{
    unset($tabs['reviews']);
    return $tabs;
}

add_filter('woocommerce_product_related_posts_query', '__return_empty_array', 100);

function disable_woo_commerce_sidebar()
{
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
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

// add_action( 'init', 'wpse26388_rewrites_init' );
// function wpse26388_rewrites_init(){
//     add_rewrite_rule(
//         'student-profile/([0-9]+)/?$',
//         'index.php?pagename=student-profile&property_id=$matches[1]',
//         'top' );
// }

// add_filter( 'query_vars', 'wpse26388_query_vars' );
// function wpse26388_query_vars( $query_vars ){
//     $query_vars[] = 'property_id';
//     return $query_vars;
// }

add_action('init', function () {
    if (is_user_logged_in() && current_user_can('student')) {
        $current_user = wp_get_current_user();

        $valid_test_list_url = [
            'student-profile/listening',
            'student-profile/reading',
            'student-profile/writing',
        ];
        $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
// print_r(get_user_meta($current_user->ID));
        // die;
        if (contains('student-profile', $url_path) && $current_user->user_email != 'demo@demo.com') {
            checkCurrentUserOrder($current_user);
        }

        if (in_array($url_path, $valid_test_list_url)) {

            // load the file if exists
            $load = locate_template('student-dashboard/tests.php', true);
            if ($load) {
                exit(); // just exit if template was found and loaded
            }
        }

        if ($url_path == 'student-profile/test/listening' && isset($_GET['et']) && $_GET['et']) {

            // load the file if exists
            $load = locate_template('student-dashboard/listening-test.php', true);
            if ($load) {
                exit(); // just exit if template was found and loaded
            }
        }
        if ($url_path == 'student-profile/test/reading' && isset($_GET['et']) && $_GET['et']) {

            // load the file if exists
            $load = locate_template('student-dashboard/reading-test.php', true);
            if ($load) {
                exit(); // just exit if template was found and loaded
            }
        }
        if ($url_path == 'student-profile/test/writing' && isset($_GET['et']) && $_GET['et']) {

            // load the file if exists
            $load = locate_template('student-dashboard/writing-test.php', true);
            if ($load) {
                exit(); // just exit if template was found and loaded
            }
        }

    }
});
add_action('init', function () {
    if (is_user_logged_in() && current_user_can('instructor')) {
        // $valid_test_url = [
        //     'instructor-profile/tests',
        //     'instructor-profile/students',
        // ];
        $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');

        if ($url_path == 'instructor-profile/tests') {

            // load the file if exists
            $load = locate_template('instructor-dashboard/tests.php', true);
            if ($load) {
                exit(); // just exit if template was found and loaded
            }
        }
        if ($url_path == 'instructor-profile/students') {

            // load the file if exists
            $load = locate_template('instructor-dashboard/students.php', true);
            if ($load) {
                exit(); // just exit if template was found and loaded
            }
        }
    }

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $table_name = $wpdb->prefix . 'ar_ielts_student_results';
    if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            test_id mediumint(9) NOT NULL ,
            user_id mediumint(9) NOT NULL ,
            student_response longtext  NULL ,
            test_response longtext  NULL ,
            wrting_1 longtext  NULL ,
            wrting_2 longtext  NULL ,
            instrutor_resp_1 longtext  NULL ,
            instrutor_resp_2 longtext  NULL ,
            score mediumint(9) NULL,
            created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

});

function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}
add_filter('woocommerce_new_customer_data', 'wc_assign_custom_role', 10, 1);

function wc_assign_custom_role($args)
{
    $args['role'] = 'student';

    return $args;
}

function checkCurrentUserOrder($current_user)
{

    $args = array(
        'customer_id' => $current_user->ID,
    );
    $orders = wc_get_orders($args);
    if (!count($orders)) {
        student_invalid_order();
    }

    $customer_orders = get_posts(array(
        'numberposts' => -1,
        'meta_key' => '_customer_user',
        'meta_value' => get_current_user_id(),
        'post_type' => wc_get_order_types(),
        'post_status' => ['wc-processing', 'wc-completed'],
    ));

    if (!count($customer_orders)) {

        student_invalid_order();
    }

    // $completed_count = get_orders_count_from_status('completed', get_current_user_id());
    // $processing_count = get_orders_count_from_status('processing', get_current_user_id());
    // if(!$completed_count && !$processing_count){
    //  student_invalid_order();
    // }

    // $completed_tests = 0;
    // foreach(wc_get_is_paid_statuses() as $status){

    // }

    // print_r(wc_get_is_paid_statuses());

    // $orders = wc_get_orders([
    //     'type' => 'shop_order',
    //     'limit' => -1,
    //     'customer_id' => $current_user->ID,
    //     // 'status' => $paid_status,
    // ]);

    // print_r($orders);

    // die;

}

function student_invalid_order()
{

    wp_redirect('student-locked-profile');
    // die;
    // load the file if exists
    // $load = locate_template('student-dashboard/student_invalid_order.php', true);
    // exit(); // just exit if template was found and loaded

}

function get_orders_count_from_status($status, $customer_id)
{
    global $wpdb;

    // We add 'wc-' prefix when is missing from order staus
    $status = 'wc-' . str_replace('wc-', '', $status);

    // return $wpdb->get_var("
    //     SELECT count(ID)  FROM {$wpdb->prefix}posts WHERE post_status LIKE '$status' AND `post_type` LIKE 'shop_order'
    // ");

    global $wpdb;

    return $wpdb->get_var("
    SELECT count(p.ID) FROM {$wpdb->prefix}posts p
    INNER JOIN {$wpdb->prefix}postmeta pm ON p.ID = pm.post_id
    WHERE p.post_type = 'shop_order'
    AND p.post_status ='$status'
    AND pm.meta_key = '_customer_user'
    AND pm.meta_value = '$customer_id'
    ORDER BY p.ID DESC LIMIT 1
");

}

add_action('woocommerce_thankyou', 'bbloomer_checkout_save_user_meta');

function bbloomer_checkout_save_user_meta($order_id)
{

    $order = wc_get_order($order_id);
    $user_id = $order->get_user_id();
    $items = $order->get_items();

    $product_ids = [];
    foreach ($items as $key => $item) {
        $product = $item->get_product();
        $product_id = $item->get_product_id();
        $product_ids[] = $product_id;
        $product_variation_id = $item->get_variation_id();

        $test_type = get_field('test_type', $product_id) ?: 'general';

        $variation = new WC_Product_Variation($product_variation_id);
        $variationName = implode(" / ", $variation->get_variation_attributes());

        if ($test_type == 'academic') {
            $user_data = get_user_meta($user_id, 'is_acedemic', true);
        } else {
            $user_data = get_user_meta($user_id, 'is_general', true);
        }

        if ($user_data && json_decode($user_data)) {
            $data = json_decode($user_data);
            if (isset($data->order_id) && $data->order_id == $order_id) {
                return;
            }

            $days = explode('-', $variationName)[0];
            $dt = date($data->end_date);

            $data = [
                'days' => (int) $data->days + (int) $days,
                'end_date' => date("Y-m-d", strtotime("$dt +$days day")),
                'order_id' => $order_id,
            ];

        } else {
            $days = explode('-', $variationName)[0];
            $dt = date("Y-m-d");

            $data = [
                'days' => $days,
                'end_date' => date("Y-m-d", strtotime("$dt +$days day")),
                'order_id' => $order_id,
            ];

        }

        if (!$data) {
            return;
        }

    }

    if ($test_type == 'academic') {
        $user_data = update_user_meta($user_id, 'is_acedemic', json_encode($data));
    } else {
        $user_data = update_user_meta($user_id, 'is_general', json_encode($data));
    }

}

function checkIfUserCanTest($meta_name)
{
    $user_id = get_current_user_id();
    $user_meta = get_user_meta($user_id, $meta_name, true);

    if ($user_meta && json_decode($user_meta)) {
        $date_now = date("Y-m-d");
        $meta = json_decode($user_meta);

        if ($date_now < $meta->end_date) {
            return true;
        }

    }
    return false;
}

function getNoDays($is_general, $is_academic)
{$user_id = get_current_user_id();

    $days = null;
    if ($is_general) {
        $user_meta = get_user_meta($user_id, 'is_general', true);
        $user_meta = json_decode($user_meta);
        $days = $user_meta && $user_meta->days ? $user_meta->days : '';
    }
    if ($is_academic) {
        $user_meta = get_user_meta($user_id, 'is_acedemic', true);
        $user_meta = json_decode($user_meta);
        $days = $user_meta && $user_meta->days && $user_meta->days > $days ? $user_meta->days : $days;
    }
    return $days;
}

function getExpiryDate($is_general, $is_academic)
{$user_id = get_current_user_id();

    $date = null;
    if ($is_general) {
        $user_meta = get_user_meta($user_id, 'is_general', true);
        $user_meta = json_decode($user_meta);
        $date = $user_meta && $user_meta->end_date ? $user_meta->end_date : '';
    }
    if ($is_academic) {
        $user_meta = get_user_meta($user_id, 'is_acedemic', true);
        $user_meta = json_decode($user_meta);
        $date = $user_meta && $user_meta->end_date && $user_meta->end_date > $date ? $user_meta->end_date : $date;
    }

    return $date;
}

function getStudentResults()
{
    $user_id = get_current_user_id();

    global $wpdb;
    $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';
    $posts_per_page = 20;
    $start = 0;
    $paged = isset($_GET['paged']) && $_GET['paged'] ? $_GET['paged'] : 1; // Current page number
    $start = ($paged - 1) * $posts_per_page;

    $result = $wpdb->get_results('SELECT * FROM ' . 
    $tbl_name . ' as t
    LEFT JOIN '.$wpdb->prefix.'posts as p
    ON p.id = t.test_id
     WHERE (t.user_id="' . $user_id . '")  
     ORDER BY t.id DESC
     LIMIT ' . $start . ', ' . $posts_per_page . '',
      ARRAY_A);
    return $result;

}

getStudentResults();

function custom_user_profile_fields($user)
{
    $test_data = get_test_user_meta($user);
    ?>
    <h3>User Test Information (Only valid for student Role)</h3>
    <table class="form-table">
        <tr>
            <th><label for="company">General</label></th>
            <td>
                <input type="checkbox" class="regular-text"
                <?php echo $test_data['is_general'] ? 'checked' : '' ?>
                name="is_general" id="is_general" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="company">Academic</label></th>
            <td>
                <input type="checkbox" class="regular-text"
                    <?php echo $test_data['is_academic'] ? 'checked' : '' ?>
                 name="is_acedemic" id="is_acedemic" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="company">Days</label></th>
            <td>
                <input type="text" class="regular-text" name="days" id="days"
                value="<?php echo $test_data['days'] ?>"
                /><br />
                <span class="description"> Eg. 15 , 30 , 40 etc </span>
            </td>
        </tr>
        <tr>
            <th><label for="company">Expiry Date</label></th>
            <td>
                <input type="date" class="regular-text"
                 value="<?php echo $test_data['end_date'] ?>"
                name="expiry_date" id="expiry_date" /><br />
                <span class="description">Last date when user is allowed to give tests</span>
            </td>
        </tr>
    </table>
  <?php
}
add_action('show_user_profile', 'custom_user_profile_fields');
add_action('edit_user_profile', 'custom_user_profile_fields');
add_action("user_new_form", "custom_user_profile_fields");

function save_custom_user_profile_fields($user_id)
{
    # again do this only if you can
    if (!current_user_can('manage_options')) {
        return false;
    }

    $data = [
        'days' => $_POST['days'],
        'end_date' =>$_POST['expiry_date'],
        'order_id' => '',
    ];
    $data = json_encode($data);
    update_user_meta($user_id,'is_general',$_POST['is_general'] ? $data : '');
    update_user_meta($user_id,'is_acedemic',$_POST['is_acedemic'] ? $data : '');

    # save my custom field
    // update_usermeta($user_id, 'company', $_POST['company']);
}
add_action('user_register', 'save_custom_user_profile_fields');
add_action('profile_update', 'save_custom_user_profile_fields');

function get_test_user_meta($user)
{
    $user_id = $user->ID;
    $academic = get_user_meta($user_id, 'is_acedemic', true);
    $general = get_user_meta($user_id, 'is_general', true);
    $days = '';
    $end_date = '';

    if ($academic && json_decode($academic)) {
        $a_data = json_decode($academic);
        $days = $a_data->days;
        $end_date = $a_data->end_date;
    }

    if ($general && json_decode($general)) {
        $g_data = json_decode($general);
        $days = $g_data->days > $days ? $g_data->days : $days;
        $end_date = $g_data->end_date > $end_date ? $g_data->end_date : $end_date;

    }
    $data = [
        'is_academic' => $academic && json_decode($academic),
        'is_general' => $general && json_decode($general),
        'days' => $days,
        'end_date' => $end_date,
    ];

    return $data;
}

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'student_reviews',
        array(
            'labels' => array(
                'name' => __( 'Student Reviews' ),
                'singular_name' => __( 'Reviews' )
            ),
        'public' => true,
        'has_archive' => false,
        )
    );
}
