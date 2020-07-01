<?php
$current_user = wp_get_current_user();

$is_demo_user = $current_user->user_email == 'demo@demo.com';
$test_data = get_test_user_meta($current_user);
$is_allowed = (!$test_data['is_academic'] && !$test_data['is_general'] && (isset($test_data['is_ctpd']) && !$test_data['is_ctpd'])) || date("Y-m-d") > $test_data['end_date'];
if ($is_allowed && !$is_demo_user) {$tests = [];
    $tests = [];
    wp_redirect(site_url() . '/student-locked-profile');

}

get_header('test');

$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);
$test_type = $test->test_type;

?>
<?php for ($i = 1; $i <= 2; $i++) {
    $style = $i == 1 && in_array('ctpd', $test_type) ? '' : 'display:none';
    $class = $i != 1 ? ' ' : 'step-3'
    ?>
      <div class="writing test <?php echo $class ?>" style="<?php echo $style ?>">
          <div class="content-wrapper row reading1">
              <div class="left col-md-6 scroll-section">
                  <div class="content">
                      <?php the_field('section_' . $i . '_paragraph', $test->ID)?>
                  </div>
              </div>
              <div class="right col-md-6 scroll-section pag-qus-sec">
                  <div class="content">
                      <span class="qus-input" data-index="<?php echo $i ?>" style="display:none" ><?php echo $i ?>.</span>
                      <textarea name="ans1" id="writing-ans-<?php echo $i ?>" placeholder="Start Typing..." autofocus></textarea>
                      <div id="the-count">
                          Word count
                          <span id="current">0</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
<?php }?>
<?php include get_theme_file_path('./test-assets/pagination.php')?>


<?php get_footer('test')?>