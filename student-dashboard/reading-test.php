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


<div class="left-help help-icon">
    <i class="fa fa-chevron-left" aria-hidden="true"></i>
</div>

<div class="right-help help-icon">
    <i class="fa fa-chevron-right" aria-hidden="true"></i>
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
<?php get_footer('test')?>