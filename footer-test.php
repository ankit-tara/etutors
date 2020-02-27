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
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
  <?php wp_footer();?>
  <script src="<?=get_stylesheet_directory_uri()?>/test-assets/soundmanager2.js"></script>
  <script src="<?=get_stylesheet_directory_uri()?>/test-assets/player.js"></script>
  <script src="<?=get_stylesheet_directory_uri()?>/test-assets/main.js"></script>
  <!-- <script src="<?=get_stylesheet_directory_uri()?>/test-assets/question.js"></script> -->
</body>

</html>