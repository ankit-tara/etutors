<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);

	// Multi check Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multi check Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue', 'georgia' => 'Georgia' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
	
	/*Header Settings*/
	$options[] = array(
		'name' => __('Options', 'options_check'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Header PNG Logo', 'options_check'),
		'desc' => __('This logo will show in Header', 'options_check'),
		'id' => 'header-logo2',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Phone Number', 'options_check'),
		'desc' => __('Phone no', 'options_check'),
		'id' => 'header_phone',
		'type' => 'text');	

	$options[] = array(
		'name' => __('email', 'options_check'),
		'desc' => __('Email address', 'options_check'),
		'id' => 'header_email',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Facebook Link', 'options_check'),
		'desc' => __('Fb link', 'options_check'),
		'id' => 'fb_link',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Skype Link', 'options_check'),
		'desc' => __('Skype link', 'options_check'),
		'id' => 'skype_link',
		'type' => 'text');

	$options[] = array(
		'name' => __('Insta Link', 'options_check'),
		'desc' => __('Insta Link', 'options_check'),
		'id' => 'insta_link',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __('Youtube Link', 'options_check'),
		'desc' => __('Youtube Link', 'options_check'),
		'id' => 'youtube_link',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __('Footer Logo 1', 'options_check'),
		'desc' => __('This logo will show in footer', 'options_check'),
		'id' => 'footer_logo1',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Footer Content', 'options_check'),
		'desc' => __('This text will show in footer bottom', 'options_check'),
		'id' => 'footer_copyright',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Dashboard video', 'options_check'),
		'desc' => __('This video will show in dashboard', 'options_check'),
		'id' => 'dash-video',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Dashboard video CPT', 'options_check'),
		'desc' => __('This video will show in dashboard CPT', 'options_check'),
		'id' => 'dash-video-cpt',
		'type' => 'upload');


	return $options;
}
