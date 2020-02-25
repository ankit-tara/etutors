<?php
get_header('test');


$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);

?>


<div class="step-3 test section-1 scroll-section" style="display: none;">
    <div class="section-qus">

        <?php
           for ($i=1; $i <=4 ; $i++) { ?>
        <div class="section-block card">
            <h3 class="section card-header">Section <?php echo $i ?></h3>
            <div class="card-body">
                <?php the_field('section_'.$i.'_test',$test->ID) ?>
            </div>
        </div>
        <?php  }
          ?>
    </div>
    <a href="#" class="btn btn-primary form-btn" data-section="1">Submit</a>
</div>


<?php include get_theme_file_path('./test-assets/pagination.php')?>


<div class="modal" id="result-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Results</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="result-table">

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary restart">Restart</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php get_footer('test') ?>