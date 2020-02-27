<?php get_header('test');

$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);

?>

    <div class="heading">
      <h2 class="title">GENERAL WRITING</h2>
    </div>
    <div class="wrapper">

      <div class="content-wrapper row reading1">
        <div class="left col-md-6 scroll-section">
          <div class="content">
            <?php include get_theme_file_path('./test-assets/writing/reading1.php')?>
          </div>
        </div>
        <div class="right col-md-6 scroll-section ">
          <div class="content">
            <span class="qus-index" data-index="1" style="display: none;">1.</span>
            <textarea
              name="ans1"
              id="ans1"
              placeholder="Start Typing..."
              autofocus
            ></textarea>
            <div id="the-count">
              Word count
              <span id="current">0</span>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="wrapper">

      <div class="content-wrapper row reading2"  style="display: none;">
        <div class="left col-md-6 scroll-section">
          <div class="content">
            <?php include get_theme_file_path('./test-assets/writing/reading2.php')?>
          </div>
        </div>
        <div class="right col-md-6 scroll-section ">
          <div class="content">
                        <span class="qus-index" data-index="2" style="display: none;">2.</span>

            <textarea
              name="ans2"
              id="ans2"
              placeholder="Start Typing..."
              autofocus
            ></textarea>
            <div id="the-count">
              Word count
              <span id="current">0</span>
            </div>
          </div>
        </div>
      </div>



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