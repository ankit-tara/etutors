<?php

include 'includes/test_functions.php';
include 'includes/admin_functions.php';
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
    wp_enqueue_script('slim', 'https://code.jquery.com/jquery-3.4.1.js', array('jquery'), true);
    wp_enqueue_script('tweenmax', $url . '/plugins/greensock/TweenMax.min.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('colorbox-js', $url . '/plugins/colorbox/jquery.colorbox-min.js', array('jquery'), '3.3.6', true);
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
    wp_enqueue_script('homejs', $url . '/js/home.js', array('jquery'), '3.3.6', true);

    if (is_page('about')) {
        wp_enqueue_script('aboutjs', $url . '/js/about.js', array('jquery'), '3.3.6', true);
    }
    if (is_page('student-profile')) {
        wp_enqueue_script('dashboard-styles', $url . '/dashboardstyle.css');
    }
}

add_action('wp_enqueue_scripts', 'ar_scripts');

add_action('wp_enqueue_scripts', 'ar_scripts');

add_role('student', 'Student', array(
    'read' => true, // True allows that capability
));

add_action('init', 'create_post_type');
function create_post_type()
{
    register_post_type('student_reviews',
        array(
            'labels' => array(
                'name' => __('Student Reviews'),
                'singular_name' => __('Reviews'),
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
        )
    );

    register_post_type('test_materials',
        array(
            'labels' => array(
                'name' => __('Test Materials'),
                'singular_name' => __('Material'),
            ),
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'taxonomies' => array('mat_categories'),
            'query_var' => true,
            'show_ui' => true,
            'show_admin_column' => true,
        )
    );
    register_taxonomy("mat_categories", array("test_materials"),
        array(
            "hierarchical" => false,
            "label" => "Types",
            "singular_label" => "Type",
            'show_ui' => true,
        )
    );

}

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

function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
    show_admin_bar(false);

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

add_action('init', function () {
    if (is_user_logged_in() && current_user_can('student')) {

        $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
        if (contains('student-profile', $url_path)) {
            $current_user = wp_get_current_user();

            $valid_test_list_url = [
                'student-profile/listening',
                'student-profile/reading',
                'student-profile/writing',
            ];

            if (contains('student-profile/results', $url_path)) {
                $load = locate_template('student-dashboard/result-view.php', true);
                if ($load) {
                    exit(); // just exit if template was found and loaded
                }

            }

            if (in_array($url_path, $valid_test_list_url)) {

                // load the file if exists
                $load = locate_template('student-dashboard/tests.php', true);
                if ($load) {
                    exit(); // just exit if template was found and loaded
                }
            }

            if (contains('student-profile/test', $url_path)) {

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

            if (contains('student-profile/material', $url_path)) {
                $load = locate_template('student-dashboard/materials.php', true);
                if ($load) {
                    exit(); // just exit if template was found and loaded
                }

            }
            if (contains('student-profile/view/material', $url_path)) {
                $load = locate_template('student-dashboard/material.php', true);
                if ($load) {
                    exit(); // just exit if template was found and loaded
                }

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

        if ($url_path == 'instructor-profile/student-tests') {

            // load the file if exists
            $load = locate_template('instructor-dashboard/students-tests.php', true);
            if ($load) {
                exit(); // just exit if template was found and loaded
            }
        }
        if ($url_path == 'instructor-profile/student-test') {

            // load the file if exists
            $load = locate_template('instructor-dashboard/student-test.php', true);
            if ($load) {
                exit(); // just exit if template was found and loaded
            }
        }
    }

//     global $wpdb;
    //     $charset_collate = $wpdb->get_charset_collate();

//     $table_name = $wpdb->prefix . 'ar_ielts_student_results';
    //     if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {

//         $sql = "CREATE TABLE $table_name (
    //             id mediumint(9) NOT NULL AUTO_INCREMENT,
    //             test_id mediumint(9) NOT NULL ,
    //             user_id mediumint(9) NOT NULL ,
    //             student_response longtext  NULL ,
    //             test_response longtext  NULL ,
    //             wrting_1 longtext  NULL ,
    //             wrting_2 longtext  NULL ,
    //             instrutor_resp_1 longtext  NULL ,
    //             instrutor_resp_2 longtext  NULL ,
    //             score mediumint(9) NULL,
    //             created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    //             PRIMARY KEY  (id)
    //         ) $charset_collate;";

//         require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    //         dbDelta($sql);
    //     }

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
            $user_data = get_user_meta($user_id, 'ielts', true);

        } elseif ($test_type == 'ctpd') {
            $user_data = get_user_meta($user_id, 'is_ctpd', true);
        } else {
            $user_data = get_user_meta($user_id, 'is_general', true);
            $user_data = get_user_meta($user_id, 'ielts', true);

        }

        if ($user_data && json_decode($user_data)) {

            $data = json_decode($user_data);
            if (isset($data->order_id) && $data->order_id == $order_id) {
                return;
            }

            $date_now = date("Y-m-d");
            $date2 = ($data->end_date);
            $days = explode('-', $variationName)[0];
            $dt = $date_now > $date2 ? $date_now : $date2;

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
    } elseif ($test_type == 'ctpd') {
        $user_data = update_user_meta($user_id, 'is_acedemic', json_encode($data));
        $user_data = update_user_meta($user_id, 'is_general', json_encode($data));
        $user_data = update_user_meta($user_id, 'is_ctpd', json_encode($data));
    } else {
        $user_data = update_user_meta($user_id, 'is_general', json_encode($data));
    }

}

function getStudentResults($test_part)
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
    LEFT JOIN ' . $wpdb->prefix . 'posts as p
    ON p.id = t.test_id
     LEFT JOIN wp_postmeta pm ON ( pm.post_id = p.ID)
     WHERE (t.user_id="' . $user_id . '")
     AND (pm.meta_key="test_part")
     AND (pm.meta_value="' . $test_part . '")
     ORDER BY t.id DESC
     LIMIT ' . $start . ', ' . $posts_per_page . '',
        ARRAY_A);
    return $result;

}

function getStudentResultsCtpd($user_id)
{
    // $user_id = get_current_user_id();

    global $wpdb;
    $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';
    $posts_per_page = 20;
    $start = 0;
    $paged = isset($_GET['paged']) && $_GET['paged'] ? $_GET['paged'] : 1; // Current page number
    $start = ($paged - 1) * $posts_per_page;

    $result = $wpdb->get_results('SELECT * FROM ' .
        $tbl_name . ' as t
    LEFT JOIN ' . $wpdb->prefix . 'posts as p
    ON p.id = t.test_id
     LEFT JOIN wp_postmeta pm ON ( pm.post_id = p.ID)
     WHERE (t.user_id="' . $user_id . '")
 AND (pm.meta_key="test_type")
     AND (pm.meta_value LIKE "%ctpd%")
     ORDER BY t.id DESC
     LIMIT ' . $start . ', ' . $posts_per_page . '',
        ARRAY_A);
    return $result;

}

function get_count_ctpd($user_id)
{

    // $user_id = get_current_user_id();

    global $wpdb;
    $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';

    // $result = $wpdb->get_var('SELECT COUNT(*)  FROM ' .
    //     $tbl_name . '
    //  WHERE (user_id="' . $user_id . '")

    // ');

    $result = $wpdb->get_var('SELECT count(*) FROM ' .
        $tbl_name . ' as t
    LEFT JOIN ' . $wpdb->prefix . 'posts as p
    ON p.id = t.test_id
     LEFT JOIN wp_postmeta pm ON ( pm.post_id = p.ID)
     WHERE (t.user_id="' . $user_id . '")
AND (pm.meta_key="test_type")
     AND (pm.meta_value LIKE "%ctpd%")
      '
    );

    return $result;

}
function get_tests_given()
{

    // $user_id = get_current_user_id();

    global $wpdb;
    $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';

    $result = $wpdb->get_var('SELECT count(*) FROM ' .
        $tbl_name . ' as t
    LEFT JOIN ' . $wpdb->prefix . 'posts as p
    ON p.id = t.test_id
         LEFT JOIN wp_postmeta pm ON ( pm.post_id = p.ID)

   WHERE (pm.meta_key="test_type")
     AND (pm.meta_value LIKE "%ctpd%")
      '
    );
//     $result = $wpdb->get_var('SELECT count(*) FROM ' .
//         $tbl_name . ' as t
//     LEFT JOIN ' . $wpdb->prefix . 'posts as p
//     ON p.id = t.test_id
//          LEFT JOIN wp_postmeta pm ON ( pm.post_id = p.ID)

//   WHERE (pm.meta_key="test_type")
//      AND (pm.meta_value="ctpd")
//       '
//     );

    return $result;

}

function get_count($type)
{

    $user_id = get_current_user_id();

    global $wpdb;
    $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';

    $result = $wpdb->get_row('SELECT count(*) as count FROM ' .
        $tbl_name . ' as t
    LEFT JOIN ' . $wpdb->prefix . 'posts as p
    ON p.id = t.test_id
     LEFT JOIN wp_postmeta pm ON ( pm.post_id = p.ID)
     WHERE (t.user_id="' . $user_id . '")
     AND (pm.meta_key="test_part")
     AND (pm.meta_value="' . $type . '")
    ',
        ARRAY_A);

    return $result;

}
function custom_user_profile_fields($user)
{
    $test_data = get_test_user_meta($user);
    ?>
<h3>User Test Information (Only valid for student Role)</h3>
<table class="form-table">
    <tr>
        <th><label for="company">General</label></th>
        <td>
            <input type="checkbox" class="regular-text" <?php echo $test_data['is_general'] ? 'checked' : '' ?>
                name="is_general" id="is_general" /><br />
        </td>
    </tr>
    <tr>
        <th><label for="company">Academic</label></th>
        <td>
            <input type="checkbox" class="regular-text" <?php echo $test_data['is_academic'] ? 'checked' : '' ?>
                name="is_acedemic" id="is_acedemic" /><br />
        </td>
    </tr>
    <tr>
        <th><label for="company">Crtical Thinking And Personality Development</label></th>
        <td>
            <input type="checkbox" class="regular-text" <?php echo @$test_data['is_ctpd'] ? 'checked' : '' ?>
                name="is_ctpd" id="is_ctpd" /><br />
        </td>
    </tr>
    <tr>
        <th><label for="company">IELTS</label></th>
        <td>
            <input type="checkbox" class="regular-text" <?php echo @$test_data['is_ielts'] ? 'checked' : '' ?>
                name="is_ielts" id="is_ielts" /><br />
        </td>
    </tr>
    <tr>
        <th><label for="company">Demo User</label></th>
        <td>
            <input type="checkbox" class="regular-text" <?php echo @$test_data['is_demo_user'] ? 'checked' : '' ?>
                name="is_demo_user" id="is_demo_user" /><br />
        </td>
    </tr>
    <tr>
        <th><label for="company">Days</label></th>
        <td>
            <input type="text" class="regular-text" name="days" id="days"
                value="<?php echo $test_data['days'] ?>" /><br />
            <span class="description"> Eg. 15 , 30 , 40 etc </span>
        </td>
    </tr>
    <tr>
        <th><label for="company">Expiry Date</label></th>
        <td>
            <input type="date" class="regular-text" value="<?php echo $test_data['end_date'] ?>" name="expiry_date"
                id="expiry_date" /><br />
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
        'end_date' => $_POST['expiry_date'],
        'order_id' => '',
    ];
    $data = json_encode($data);
    update_user_meta($user_id, 'is_general', $_POST['is_general'] ? $data : '');
    update_user_meta($user_id, 'is_acedemic', $_POST['is_acedemic'] ? $data : '');
    update_user_meta($user_id, 'is_ctpd', $_POST['is_ctpd'] ? $data : '');
    update_user_meta($user_id, 'is_ielts', $_POST['is_ielts'] ? $data : '');
    update_user_meta($user_id, 'is_demo_user', $_POST['is_demo_user'] ? $data : '');

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
    $ctpd = get_user_meta($user_id, 'is_ctpd', true);
    $ielts = get_user_meta($user_id, 'is_ielts', true);
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
    if ($ctpd && json_decode($ctpd)) {
        $c_data = json_decode($ctpd);
        $days = $c_data->days > $days ? $c_data->days : $days;
        $end_date = $c_data->end_date > $end_date ? $c_data->end_date : $end_date;
    }
    $data = [
        'is_academic' => $academic && json_decode($academic),
        'is_general' => $general && json_decode($general),
        'is_ctpd' => $ctpd && json_decode($ctpd),
        'is_ielts' => $ielts && json_decode($ielts),
        'is_demo_user' => get_user_meta($user_id, 'is_demo_user', true),
        'days' => $days,
        'end_date' => $end_date,
    ];

    return $data;
}

function getAllStudentResults()
{

    global $wpdb;
    $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';
    $posts_per_page = 10;
    $start = 0;
    $paged = isset($_GET['paged']) && $_GET['paged'] ? $_GET['paged'] : 1; // Current page number
    $start = ($paged - 1) * $posts_per_page;

    $result = $wpdb->get_results('SELECT * FROM ' .
        $tbl_name . ' as t
    LEFT JOIN ' . $wpdb->prefix . 'posts as p
    ON p.id = t.test_id

     ORDER BY t.id DESC
     LIMIT ' . $start . ', ' . $posts_per_page . '',
        ARRAY_A);
    return $result;

}

function get_test_result($test_id)
{

    global $wpdb;
    $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';

    $result = $wpdb->get_row('SELECT * FROM ' .
        $tbl_name . ' as t
    LEFT JOIN ' . $wpdb->prefix . 'posts as p
    ON p.id = t.test_id
WHERE t.id = ' . $test_id . '
     ORDER BY t.id DESC
    ',
        ARRAY_A);
    return $result;

}

function delete_test_result($test_id)
{
    if ($test_id) {
        global $wpdb;
        $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';
        $wpdb->delete($tbl_name, array('id' => $test_id));

    }
}

function get_total_tests()
{
    global $wpdb;
    $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';

    $result = $wpdb->get_var('SELECT COUNT(*) FROM ' . $tbl_name . ' ');
    return $result;
}

// function create_column()
// {
//     global $wpdb;
//     $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';

//     $myPosts = $wpdb->get_var("SELECT count(*) FROM INFORMATION_SCHEMA.COLUMNS
//     WHERE TABLE_NAME = '{$tbl_name}' AND COLUMN_NAME = 'score' ");

//     if (!$myPosts) {
//         $wpdb->query("ALTER TABLE $tbl_name ADD score FLOAT(10) NULL");
//     }

//     $myPosts = $wpdb->get_var("SELECT count(*) FROM INFORMATION_SCHEMA.COLUMNS
//     WHERE TABLE_NAME = '{$tbl_name}' AND COLUMN_NAME = 'comment' ");

//     if (!$myPosts) {
//         $wpdb->query("ALTER TABLE $tbl_name ADD comment VARCHAR(255) NULL");
//     }

// }

// add_action('init', 'create_column');

function wpm_create_user_form_registration($cfdata)
{
    if (!isset($cfdata->posted_data) && class_exists('WPCF7_Submission')) {
        // Contact Form 7 version 3.9 removed $cfdata->posted_data and now
        // we have to retrieve it from an API
        $submission = WPCF7_Submission::get_instance();
        if ($submission) {
            $formdata = $submission->get_posted_data();
        }
    } elseif (isset($cfdata->posted_data)) {
        // For pre-3.9 versions of Contact Form 7
        $formdata = $cfdata->posted_data;
    } else {
        // We can't retrieve the form data
        return $cfdata;
    }
    // Check this is the user registration form

    if ($cfdata->title() == 'Demo') {

        $username = $formdata['NAME'];
        $email = $formdata['EMAIL'];
        $phone = $formdata['PHONE'];
        $course_type = $formdata['COURSE_TYPE'][0];

        $password = wp_generate_password(12);

        // $fname = $formdata['FNAME'];
        // $lname = $formdata['LNAME'];

        if (!email_exists($email)) {
            // Find an unused username
            $username_tocheck = $username;
            $i = 1;
            while (username_exists($username_tocheck)) {
                $username_tocheck = $username . $i++;
            }
            $username = $username_tocheck;
            // Create the user
            $userdata = array(
                'user_login' => $username,
                'user_pass' => $password,
                'user_email' => $email,
                // 'nickname' => $fname . ' ' . $lname,
                // 'display_name' => $fname . ' ' . $lname,
                // 'first_name' => $fname,
                // 'last_name' => $lname,
                'role' => 'student',
            );

            $user_id = wp_insert_user($userdata);
            $dt = date("Y-m-d");

            $data = [
                'days' => 2,
                'end_date' => date("Y-m-d", strtotime("$dt +1 day")),
                'order_id' => '',
            ];
            $user_data = update_user_meta($user_id, 'is_acedemic', json_encode($data));
            $user_data = update_user_meta($user_id, 'is_general', json_encode($data));
            if ($course_type != 'IELTS') {
                $user_data = update_user_meta($user_id, 'is_ctpd', json_encode($data));
            } else {
                $user_data = update_user_meta($user_id, 'is_ielts', json_encode($data));
            }

            $user_data = update_user_meta($user_id, 'billing_phone', $phone);
            $user_data = update_user_meta($user_id, 'demo_p_data', $password);
            $user_data = update_user_meta($user_id, 'is_demo_user', true);

            if (!is_wp_error($user_id)) {
                wp_set_current_user($user_id);
                wp_set_auth_cookie($user_id);

                do_action('woocommerce_created_customer', $user_id);
            }
        }
    }

    return $cfdata;
}
add_action('wpcf7_before_send_mail', 'wpm_create_user_form_registration', 1);

function my_login_logo_one()
{?>
<style type="text/css">
body.login {
    background-color: #fff;
}

body.login div#login h1 a {
    background-image: url(<?php echo get_stylesheet_directory_uri();
    ?>/images/logo.png);
    padding-bottom: 0;
    background-size: 250px;
    display: block;
    width: 100%;
    margin-bottom: 0px;
}

.message.register {
    display: none;
}

body.login div#login input#wp-submit {
    background: #14bdee;
    border: none;
    box-shadow: none;
    text-shadow: none;
    color: #fff;
    font-weight: 600;
}
</style>
<?php
}
add_action('login_enqueue_scripts', 'my_login_logo_one');

function getStudentNextPage($count = 1)
{
    $home_url = menu_page_url('student-results', false);
    $next_page = add_query_arg(array(
        'paged' => $count,
    ), $home_url);
    return $next_page;
}

function getStudentTestsNextPage($user_id, $count = 1)
{
    $home_url = home_url() . '/instructor-profile/student-tests';
    $next_page = add_query_arg(array(
        'paged' => $count,
        'et' => $user_id,
    ), $home_url);
    return $next_page;
}

function get_ctpd_students()
{
    $users = get_users(
        [
            'role__in' => ['student'],

        ]);

    $count = 0;
    foreach ($users as $key => $user) {
        $is_ctpd = get_user_meta($user->ID, 'is_ctpd');

        if (!$is_ctpd || !count($is_ctpd) || !$is_ctpd[0]) {
            continue;
        }
        $count++;
    }

    return $count;

}