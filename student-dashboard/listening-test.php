<?php

$current_user = wp_get_current_user();
$is_demo_user = $current_user->user_email == 'demo@demo.com';
$test_data = get_test_user_meta($current_user);
$is_allowed = (!$test_data['is_academic'] && !$test_data['is_general'] && (isset($test_data['is_ctpd']) && !$test_data['is_ctpd'])) || date("Y-m-d") > $test_data['end_date'];
if ($is_allowed && !$is_demo_user) {$tests = [];
    wp_redirect(site_url() . '/student-locked-profile');

}

get_header('test');

$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);

?>


<div class="step-3 test section-1 listening-test " style="display: none;">
    <div class="content-wrapper row">
        <div class="section-qus scroll-section ">
            <!-- <div class="content"> -->

            <?php
for ($i = 1; $i <= 4; $i++) {?>
            <div class="section-block card pag-qus-sec">
                <h3 class="section card-header">Section <?php echo $i ?></h3>
                <div class="card-body content">
                    <?php the_field('section_' . $i . '_test', $test->ID)?>
                </div>
            </div>
            <?php }
?>
            <!-- </div> -->
        </div>
    </div>
</div>
<?php include get_theme_file_path('./test-assets/pagination.php')?>




<?php get_footer('test')?>