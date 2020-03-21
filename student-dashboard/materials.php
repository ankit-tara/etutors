<?php
$current_user = wp_get_current_user();

$test_data = get_test_user_meta($current_user);
$is_allowed = (!$test_data['is_academic'] && !$test_data['is_general']) || date("Y-m-d") > $test_data['end_date'];
if ($is_allowed && !$is_demo_user) {
    $tests = [];
    wp_redirect(site_url() . '/student-locked-profile');

}

echo $name = basename(parse_url(add_query_arg(array()), PHP_URL_PATH));
$args = array(
    'post_type' => 'test_materials',
    'posts_per_page' => 20,
    'mat_categories' => $name);
$posts = new WP_Query($args);
// print_R($posts);
// die();
get_header('dashboard');
$profile_url = home_url() . '/student-profile';
?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <h2> <?php echo $name ?></h2>
<a href="<?php echo $profile_url ?>" class="btn btn-primary">Back</a>


        <div class="material-boxes">


            <?php
if ($posts->have_posts()) {
    while ($posts->have_posts()) {
        $posts->the_post();
        $id = get_the_ID();
        $url = $profile_url . '/view/material?et=' . base64_encode($id);
        $url = wp_nonce_url($url, 'ar-tests-noonce')

        ?>

            <div class="material-box">
                <a href="<?php echo $url ?>">
                    <h3><?php the_title()?></h3>
                    <p>Materials: <?php echo $count = count(get_field('material')); ?></p>
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