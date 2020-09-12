<?php
$current_user = wp_get_current_user();

$test_data = get_test_user_meta($current_user);

$is_allowed = (!$test_data['is_academic'] && !$test_data['is_general'] && (isset($test_data['is_ctpd']) && !$test_data['is_ctpd'])) || date("Y-m-d") > $test_data['end_date'];
if ($is_allowed) {
    $tests = [];
    wp_redirect(site_url() . '/student-locked-profile');

}

get_header('dashboard');
wp_reset_postdata();
$args = array(
    'post_type' => 'video_materials',
    'posts_per_page' => 20,
    // 'tax_query' => array(
    //     array(
    //         'taxonomy' => 'mat_categories',
    //         'field' => 'slug',
    //         'terms' => $name,
    //     ),
    // ),

    // 'mat_categories' => $name
);
$posts = new WP_Query($args);

$profile_url = home_url() . '/student-profile';
?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <h2> Video Materials <a href="<?php echo $profile_url ?>" class="btn btn-primary p-r">Back</a></h2>



        <div class="material-boxes">


            <?php
if ($posts->have_posts()) {
    while ($posts->have_posts()) {
        $posts->the_post();
        $id = get_the_ID();
        $url = $profile_url . '/view/video-material?et=' . base64_encode($id);
        $url = wp_nonce_url($url, 'ar-tests-noonce');
        // if ($test_data['is_ctpd'] && get_field('course_type') != 'pd') {
        //     continue;

        // }
        // if (!$test_data['is_ctpd'] && get_field('course_type') == 'pd') {
        //     continue;

        // }
        ?>

            <div class="material-box">
                <a href="<?php echo $url ?>">
                    <h3><?php the_title()?></h3>
                    <!-- <p>Materials: <?php // echo $count = count(get_field('material')); ?></p> -->
                </a>
            </div>

            <?php
}

}

?>
        </div>

    </div>
</main>

<?php get_footer('dashboard');?>