<?php
// Our custom post type function
function create_posttype()
{

    $labels = array(
        'name' => _x('Ielts Tests', 'Post Type General Name', 'twentytwenty'),
        'singular_name' => _x('Ielts Test', 'Post Type Singular Name', 'twentytwenty'),
        'menu_name' => __('Ielts Tests', 'twentytwenty'),
        'parent_item_colon' => __('Parent Ielts Test', 'twentytwenty'),
        'all_items' => __('All Ielts Tests', 'twentytwenty'),
        'view_item' => __('View Ielts Test', 'twentytwenty'),
        'add_new_item' => __('Add New Ielts Test', 'twentytwenty'),
        'add_new' => __('Add New', 'twentytwenty'),
        'edit_item' => __('Edit Ielts Test', 'twentytwenty'),
        'update_item' => __('Update Ielts Test', 'twentytwenty'),
        'search_items' => __('Search Ielts Test', 'twentytwenty'),
        'not_found' => __('Not Found', 'twentytwenty'),
        'not_found_in_trash' => __('Not found in Trash', 'twentytwenty'),
    );

// Set other options for Custom Post Type

    $args = array(
        'label' => 'Tests ',
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies' => array('genres'),
        /* A hierarchical CPT is like Pages and can have
         * Parent and child items. A non-hierarchical CPT
         * is like Posts.
         */
        'hierarchical' => false,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        // 'show_in_rest' => true,

    );

// Registering your Custom Post Type
    register_post_type('ar-ielts-tests', $args);

}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');

// hooks your functions into the correct filters
function wdm_add_mce_button()
{
    // check user permissions
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    global $current_screen;
    if ($current_screen->post_type != 'ar-ielts-tests') {
        return;
    }

    // check if WYSIWYG is enabled
    if ('true' == get_user_option('rich_editing')) {
        add_filter('mce_external_plugins', 'wdm_add_tinymce_plugin');
        add_filter('mce_buttons', 'wdm_register_mce_button');
    }
}
add_action('admin_head', 'wdm_add_mce_button');

// register new button in the editor
function wdm_register_mce_button($buttons)
{
    array_push($buttons, 'wdm_mce_dropbutton');
    return $buttons;
}

// declare a script for the new button
// the script will insert the shortcode on the click event
function wdm_add_tinymce_plugin($plugin_array)
{
    $plugin_array['wdm_mce_dropbutton'] = get_stylesheet_directory_uri() . '/js/button.js';
    return $plugin_array;
}

function my_editor_settings($settings)
{
    global $current_screen;
    if ($current_screen->post_type == 'ar-ielts-tests'
    ) {
        $settings['quicktags'] = false;
        return $settings;
    } else {
        $settings['quicktags'] = true;
        return $settings;
    }
}

add_filter('wp_editor_settings', 'my_editor_settings');

add_action("wp_ajax_get_test_answers", "get_test_answers");
add_action("wp_ajax_nopriv_get_test_answers", "my_must_login");

function get_test_answers()
{

    $id = $_POST['test_id'];
    $test_part = $_POST['test_part'];
    $user_id = get_current_user_id();
    global $wpdb;
    $tbl_name = $wpdb->prefix . 'ar_ielts_student_results';

    if ($test_part == 'writing') {
        $response = $wpdb->insert(
            $tbl_name,
            array(
                'created_at' => current_time('y-m-d h-m-s'),
                'test_id' => $id,
                'user_id' => $user_id,
                'wrting_1' => $_POST['writing_ans_1'],
                'wrting_2' => $_POST['writing_ans_2'],
            )
        );
        $test_id = $wpdb->insert_id;

        wp_die();
    }

    $user_answers = json_encode($_POST['user_answers']);

    // $result = $wpdb->get_row('SELECT * FROM ' . $tbl_name . ' WHERE `test_id` = ' . $id . '', ARRAY_A);

    // $answers = the_field('answers', $id);
    $rows = get_field('answers', $id);

    $arr = [];
    if ($rows) {
        foreach ($rows as $row) {
            $ans = [];

            foreach ($row['answer'] as $a) {
                $ans[] = $a['answer'];
            }
            $arr[] = [
                'state' => $row['type'],
                'ans' => $ans,
            ];
            // get_sub_field('type');
        }

    }
    $response = $wpdb->insert(
        $tbl_name,
        array(
            'created_at' => current_time('y-m-d h-m-s'),
            'test_id' => $id,
            'user_id' => $user_id,
            'student_response' => $user_answers,
            'test_response' => json_encode($arr),
        )
    );
    $test_id = $wpdb->insert_id;

    echo json_encode($arr);
    wp_die();
}

add_action("wp_ajax_save_test_answers", "save_test_answers");
add_action("wp_ajax_nopriv_save_test_answers", "my_must_login");

function save_test_answers()
{

    $id = $_GET['test_id'];
    $user_answers = $_POST['user_answers'];
    $user_id = get_current_user_id();

    // $answers = the_field('answers', $id);
    $rows = get_field('answers', $id);
    $arr = [];
    if ($rows) {
        foreach ($rows as $row) {
            $ans = [];

            foreach ($row['answer'] as $a) {
                $ans[] = $a['answer'];
            }
            $arr[] = [
                'state' => $row['type'],
                'ans' => $ans,
            ];
            // get_sub_field('type');
        }

    }
// print_r($arr);
    echo json_encode($arr);
    wp_die();
}
