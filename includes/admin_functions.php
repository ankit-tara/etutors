<?php

add_action('admin_enqueue_scripts', 'arbites_forms_admin_styles');

function arbites_forms_admin_styles()
{

    wp_enqueue_style('arbites_admin_boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_enqueue_style('arbites_admin_main_css', get_stylesheet_directory_uri() . '/styles/admin.css');
    wp_enqueue_script('arbites_admin_bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('arbites_admin_main_js', get_stylesheet_directory_uri() . '/js/admin.js', array('jquery'));
    wp_localize_script('arbites_admin_main_js', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    // wp_enqueue_script('jquery-ui-datepicker');
    // wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
    // wp_enqueue_style('jquery-ui');
}

add_action('admin_menu', 'ielts_tests_pages');
function ielts_tests_pages()
{
    add_menu_page('Student Results', 'Student Results', 'manage_options', 'student-results', 'ielts_tests_pages_html', 'dashicons-clipboard', 3);
 add_submenu_page(
        'student-results',
        'Ielts Tests',
        'Ielts Tests',
        'manage_options',
        'student-results&test_type=ielts',
        'ielts_tests_pages_html'
    );
 add_submenu_page(
        'student-results',
        'CTPD Tests',
        'CTPD Tests',
        'manage_options',
        'student-results&test_type=ctpd',
        'ielts_tests_pages_html'
    );
}

function ielts_tests_pages_html()
{
    if (isset($_GET['type']) && $_GET['type'] == 'view') {
        $load = locate_template('admin-pages/view_test.php', true);

    } else {
        $load = locate_template('admin-pages/student-results.php', true);

    }
    if ($load) {
        exit();
    }

}

add_action("wp_ajax_save_test_result", "save_test_result");
add_action("wp_ajax_nopriv_save_test_result", "my_must_login");

function save_test_result()
{
    // return current_user_can('administrator');
    // if (!current_user_can('administrator')) {
    //     wp_die();
    // }

    $test_id = $_REQUEST['test_id'];
    $user_id = $_REQUEST['user_id'];
    $score = $_REQUEST['score'];
    $comment = $_REQUEST['comment'];
    global $wpdb;
    $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';

    $response = $wpdb->update(
        $tbl_name,
        array(
            'score' => $score,
            'comment' => $comment,
            
        ),
        array(
            'id' => $test_id,
            
        )
    );

    return  $response;
    wp_die();

}
