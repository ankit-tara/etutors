<?php get_header('test');

$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);

?>
<?php for ($i = 1; $i <= 2; $i++) {
    $style = $i != 1 ? 'display:none' : '';
    $class = $i != 1 ? ' ' : 'step-3'
    ?>
      <div class="writing test <?php echo $class ?>" style="display:none">
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