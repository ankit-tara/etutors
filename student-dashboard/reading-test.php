<?php get_header('test');

$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);

?>
    <?php for ($i = 1; $i <= 4; $i++) {
        $style = $i != 1 ? 'display:none':'';
        $class = $i != 1 ? 'wrapper test':'step-3 wrapper test'
        ?>
            <div class="<?php echo  $class ?>" style="display:none" >
                        <div class="content-wrapper row reading<?php echo $i ?>">
                            <div class="left col-md-6 scroll-section">
                                <div class="content">
                                    <?php the_field('section_'.$i.'_paragraph',$test->ID) ?>
                                </div>
                            </div>
                            <div class="right col-md-6 scroll-section ">
                                <div class="content">
                                    <?php  the_field('section_'.$i.'_test',$test->ID) ?>
                                </div>
                            </div>
                        </div>
            </div>
    <?php }?>



<?php include get_theme_file_path('./test-assets/pagination.php')?>


<?php get_footer('test')?>