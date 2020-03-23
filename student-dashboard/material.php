<?php
$current_user = wp_get_current_user();

$test_data = get_test_user_meta($current_user);
$is_allowed = (!$test_data['is_academic'] && !$test_data['is_general']) || date("Y-m-d") > $test_data['end_date'];
if ($is_allowed) {
    $tests = [];
    wp_redirect(site_url() . '/student-locked-profile');
}
$profile_url = home_url() . '/student-profile';

get_header('dashboard');


$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);
?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <a href="<?php echo $profile_url ?>" class="btn btn-primary pull-right">Back</a>


        <div class="table-responsive p-20">
            <table class="table">
                <thead>
                    <tr>
                        <th class="bdwT-0">#</th>
                        <th class="bdwT-0">Type</th>
                        <th class="bdwT-0">View/Listen</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    // check if the repeater field has rows of data
                    if (have_rows('material',$id)):
                        $count = 0;

                        // loop through the rows of dat,a
                        while (have_rows('material',$id)): the_row();
                            $field = get_sub_field('file');
                            $count++;
                            // display a sub field value
                          ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $field['type'] .'/ '. $field['subtype'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#materialModal_<?php echo $count ?>">
                               View 
                            </button>


                            <div class="modal fade" id="materialModal_<?php echo $count?>" tabindex="-1" role="dialog"
                                aria-labelledby="materialModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <?php if($field['subtype'] == 'pdf') : 
                                            echo do_shortcode('[pdf-embedder url="' . $field['url'] . '#toolbar=0"]');
                                        elseif($field['type'] == 'audio') : 
                                            echo do_shortcode('[audio src="' . $field['url'] . '"]');
                                        elseif($field['type'] == 'video') : 
                                            ?>
                                            <video  controls controlsList="nodownload">
                                                <source src="<?php echo $field['url'] ?>" type="video/<?php echo $field['subtype'] ?>">
                                                Your browser does not support the video tag.
                                            </video>
                                            <?php
                                        else: ?>
                                          <iframe  preload="none" src="<?php echo $field['url'].'?rel=0&cc_load_policy=1' ?>" width="100%" height="500px">
                                         </iframe>
                                        <?php endif; ?>
                                          
    
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    <?php

                        endwhile;

                    else:

                        // no rows found

                    endif;
                    ?>

                </tbody>
            </table>
        </div>


    </div>
</main>


<!-- Button trigger modal -->


<!-- Modal -->

<script>
function disableselect(e) {
  return false
}

function reEnable() {
  return true
}

document.onselectstart = new Function ("return false")

if (window.sidebar) {
  document.onmousedown = disableselect
  document.onclick = reEnable
}

document.addEventListener('contextmenu', event => event.preventDefault());


$('.modal').on('hidden.bs.modal', function () {
  $('audio').each(function(){
    this.pause(); // Stop playing
    this.currentTime = 0; // Reset time
}); 
})
</script>
<?php get_footer('dashboard');?>