<?php 
$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);
$test_type =$test? $test->test_type:[];
$test_part =$test? $test->test_part:'';
$style =  $test->test_part != 'listening' && in_array('ctpd', $test_type) ? '' : 'display:none';

?>
<div class="container-fluid">
    <div class="test-footer row" style="<?php echo $style ?>
">
        <div class="col-md-10 col-12">
            <div class="pagination">
            
            </div>
        </div>
        <div class="col-md-2 col-3">
            <div class="pointers">
                <span class="icon"><i class="fa fa-chevron-left move up" aria-hidden="true"></i></span>
                <span class="icon"><i class="fa fa-chevron-right move down" aria-hidden="true"></i></span>
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