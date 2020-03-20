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
                            <td><?php //echo do_shortcode('[pdf-embedder url='.$field['url'].']') ?></td>
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

<?php get_footer('dashboard');?>