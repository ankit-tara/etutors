<?php
get_header('test');


$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);

?>


<div class="step-3 test section-1 scroll-section pag-qus-sec" style="display: none;">
    <div class="section-qus">

        <?php
           for ($i=1; $i <=4 ; $i++) { ?>
        <div class="section-block card ">
            <h3 class="section card-header">Section <?php echo $i ?></h3>
            <div class="card-body">
                <?php the_field('section_'.$i.'_test',$test->ID) ?>
            </div>
        </div>
        <?php  }
          ?>
    </div>
</div>


<?php //include get_theme_file_path('./test-assets/pagination.php')?>




<?php get_footer('test') ?>