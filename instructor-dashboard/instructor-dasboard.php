
<?php

/*
Template Name: Instructor Dashboard
 */

$students_count = get_ctpd_students();
$tests_count = get_tests_given();
// $not_scored = get_ctpd_not_scored();
$profile_url = home_url() . '/instructor-profile';

get_header('instructor');
global $current_user;
wp_get_current_user();

?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                    <p style="text-transform:capitalize">
                        Name : <a><?php echo $current_user->display_name ?></a>
                    </p>
                   
                </p>
            </div>
        </div>
        <h2>Your Results</h2>


        <div class="row gap-20">
            <div class="col-md-3">
            <a href="<?php echo $profile_url . '/students' ?>">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Total Students</h6>
                    </div>
                    <div class="layer w-100">
                        View All
                            <div class="peer"><span
                                    class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?php echo $students_count ?></span>
                            </div>

                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-3">
            <a href="<?php echo $profile_url . '/students'  ?>
">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Total Tests</h6>
                    </div>
                    <div class="layer w-100">
                        View All
                            <div class="peer"><span
                                    class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?php echo $tests_count ?></span>
                            </div>

                    </div>
                </div>
                </a>
            </div>
            <!-- <div class="col-md-3">
            <a href="<?php //echo $profile_url . 'writing' ?>
">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Tests Not Scored</h6>
                    </div>
                     <div class="layer w-100">
                        View All
                            <div class="peer"><span
                                    class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500"><?php echo $writing_count['count'] ?></span>
                            </div>

                    </div>
                </div>
                </a>
            </div> -->

        </div>
  

    </div>

</main>
<?php get_footer('dashboard');
