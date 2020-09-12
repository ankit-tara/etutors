<?php
$current_user = wp_get_current_user();

$test_data = get_test_user_meta($current_user);
$is_allowed = (!$test_data['is_academic'] && !$test_data['is_general'] && (isset($test_data['is_ctpd']) && !$test_data['is_ctpd'])) || date("Y-m-d") > $test_data['end_date'];
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


<div class="row video-material-boxes">
<!-- <div class="table-responsive p-20"> -->
            <!-- <table class="table">
                <thead>
                    <tr>
                        <th class="bdwT-0">#</th>
                        <th class="bdwT-0">Name</th>
						<th class="bdwT-0">Type</th>
                        <th class="bdwT-0">View/Listen</th>

                    </tr>
                </thead>
                <tbody> -->
                    <?php

                    // check if the repeater field has rows of data
                    if (have_rows('video_materials',$id)):
                        $count = 0;

                        // loop through the rows of dat,a
                        while (have_rows('video_materials',$id)): the_row();
                            $field = get_sub_field('material');
                            $url = get_sub_field('url');
                            $poster_image = get_sub_field('poster_image');
                            $video_title = get_sub_field('video_material_title');
                            
                            if(!$url && !$field){
                                continue;
                            }
                            $count++;
                            // display a sub field value
                          
                          ?>
                          <div class="col-md-3">
                               <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#materialModal_<?php echo $count ?>">
                               <img src="<?php echo $poster_image ?>" alt=""> 
                            </button>
                            <h5 class="video-material-title"><?php echo $video_title ?></h5>
                                
                          </div>

                          <div class="modal fade materialModal" id="materialModal_<?php echo $count?>" tabindex="-1" role="dialog"
                                aria-labelledby="materialModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">Study Material
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php if($url): ?>
                                                <iframe  src="<?php echo $url ?>">
                                                   
                                                </iframe>
                                                
                                            <?php else: ?>
                                                <video  controls controlsList="nodownload">
                                                    <source src="<?php echo$field['url'] ?>" type="video/<?php echo $field['subtype'] ?>">
                                                    Your browser does not support the video tag.
                                                </video>
                                            <?php endif; ?>
                                        
                                          
                                       
                                          
    
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>

                    <!-- <tr>
                        <td><?php //echo $count ?></td>
						<td><?php// echo $field['filename'] ?></td>
                        <td><?php //echo $field['type'] .'/ '. $field['subtype'] ?></td>
                        <td>
                           


                            <div class="modal fade materialModal" id="materialModal_<?php echo $count?>" tabindex="-1" role="dialog"
                                aria-labelledby="materialModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">Study Material
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php //if($url): ?>
                                                <iframe  src="<?php //echo $url ?>">
                                                   
                                                </iframe>
                                            <?php //else: ?>
                                                <video  controls controlsList="nodownload">
                                                    <source src="<?php //echo$field['url'] ?>" type="video/<?php echo $field['subtype'] ?>">
                                                    Your browser does not support the video tag.
                                                </video>
                                            <?php //endif; ?>
                                        
                                          
                                       
                                          
    
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            
                        </td>
                    </tr> -->
                    <?php

                        endwhile;

                    else:

                        // no rows found

                    endif;
                    ?>

                <!-- </tbody>
            </table> -->
        </div>
    </div>
</main>


<!-- Button trigger modal -->


<!-- Modal -->


<?php get_footer('dashboard');?>