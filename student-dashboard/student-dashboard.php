<?php

/*
Template Name: Student Dashboard
 */

get_header('dashboard');
global $current_user;
wp_get_current_user();

$test_type = '';
$is_academic = checkIfUserCanTest('is_acedemic');
$is_general = checkIfUserCanTest('is_general');

if ($is_academic) {
    $test_type .= "Academic";
}
if ($is_general) {
    $test_type .= $test_type ? " , General" : "General";
}
$date = getExpiryDate($is_general, $is_academic);

$results = getStudentResults();

?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="card">
            <div class="card-body">
                <p class="card-text">
                    <p style="text-transform:capitalize">
                        Name : <a><?php echo $current_user->display_name ?></a>
                    </p>
                    <p>Orders Expiry Date: <?php echo $date ? date_format(new DateTime($date), "j F , Y") : ''; ?></p>
                    <p>Test Types: <?php echo $test_type ?></p>
                </p>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <h2 class="card-title">
                    Results
                </h2>
                <p class="card-text">
                </p>
            </div>
        </div>
    </div>

</main>
<?php get_footer('dashboard');