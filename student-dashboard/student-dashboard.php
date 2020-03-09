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
                    <p>Orders Expiry Date:
                        <?php echo $test_data['end_date'] ? date_format(new DateTime($test_data['end_date']), "j F , Y") : ''; ?>
                    </p>
                    <p>Test Types: <?php echo $test_type ?></p>
                </p>
            </div>
        </div>


        <div class="table-responsive p-20">
            <table class="table">
                <thead>
                    <tr>
                        <th class="bdwT-0">#</th>
                        <th class="bdwT-0">Test Name</th>
                        <th class="bdwT-0">Test Type</th>
                        <th class="bdwT-0">Date</th>
                        <th class="bdwT-0">Score(By Instrutor)</th>
                        <!-- <th class="bdwT-0">View</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $key => $result) {
    $result['test_id'];
    $test_type = get_field('test_part', $result['test_id']);
    $url = home_url() . '/student-profile/view-test/' . $test_type . '?et=' . base64_encode(get_the_ID());
    $url = wp_nonce_url($url, 'ar-tests-noonce')
    ?>

                    <tr>
                        <td class="fw-600"><?php echo $key + 1 ?></td>
                        <td><?php echo $result['post_title'] ?></td>
                        <td>
                            <?php
if ($test_type == 'listening') {
        echo '<span class="badge bgc-deep-purple-50 c-deep-purple-700 p-10 lh-0 tt-c badge-pill">Listening</span>';
    } elseif ($test_type == 'listening') {
        echo '<span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Reading</span>';
    } else {
        echo '
                            <span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">Writing</span>
                                 ';
    }
    ?>
                            </<span>
                        </td>
                        <td><?php echo date('j F , Y', strtotime($result['created_at'])); ?></td>
                        <td><?php echo $result['score'] ?: '' ?></td>
                        <!-- <td>
				            <a href="<?php //echo $url ?>" class="btn bgc-deep-purple-50 c-deep-purple-700">View</a>
                        </td> -->
                    </tr>
                    <?php }?>

                    <?php if (!count($results)) {
    echo '<tr><td colspan=5" class="text-center">You have not given any tests yet!!</td></tr>';
}?>
                </tbody>
            </table>
        </div>
    </div>

</main>
<?php get_footer('dashboard');