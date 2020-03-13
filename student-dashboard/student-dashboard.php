<?php

/*
Template Name: Student Dashboard
 */

get_header('dashboard');
global $current_user;
wp_get_current_user();

$test_data = get_test_user_meta($current_user);

$test_type = '';

if ($test_data['is_academic']) {
    $test_type .= "Academic";
}
if ($test_data['is_general']) {
    $test_type .= $test_type ? " , General" : "General";
}


$listening_count = get_count('listening');
$reading_count = get_count('reading');
$writing_count = get_count('writing');
$results =  $listening_count || $reading_count || $writing_count;
$profile_url = home_url() . '/student-profile';
$profile_result_url = $profile_url .'/results/'
?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                    <p style="text-transform:capitalize">
                        Name : <a><?php echo $current_user->display_name ?></a>
                    </p>
                    <p>Orders Expiry Date:
                        <?php echo $test_data['end_date'] ? date_format(new DateTime($test_data['end_date']), "j F , Y") : ''; ?>
                    </p>
                    <p>Test Types: <?php echo $test_type ?></p>
                </p>
            </div>
        </div>
        <?php if($results ): ?>
        <h2>Your Results</h2>


        <div class="row gap-20">
            <div class="col-md-3">
            <a href="<?php echo $profile_result_url.'listening'  ?>">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Listening Results</h6>
                    </div>
                    <div class="layer w-100">
                        View All
                            <div class="peer"><span
                                    class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?php echo $listening_count['count']  ?></span>
                            </div>
                        
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-3">
            <a href="<?php echo $profile_result_url . 'reading' ?>
">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Reading Results</h6>
                    </div>
                    <div class="layer w-100">
                        View All
                            <div class="peer"><span
                                    class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?php echo $reading_count['count']  ?></span>
                            </div>
                        
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3">
            <a href="<?php echo $profile_result_url . 'writing' ?>
">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Writing Results</h6>
                    </div>
                     <div class="layer w-100">
                        View All
                            <div class="peer"><span
                                    class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?php echo $writing_count['count']  ?></span>
                            </div>
                        
                    </div>
                </div>
                </a>
            </div>
          
        </div>
    <?php else: ?>

    <div>
    <h2 class="text-center">You will see your test results here</h2>
    </div>
    <?php endif; ?>

      
    </div>

</main>
<?php get_footer('dashboard');