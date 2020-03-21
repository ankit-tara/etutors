<?php
get_header('dashboard');
wp_get_current_user();
$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
if (contains('listening', $url_path)) {
    $test_part = 'listening';
} elseif (contains('reading', $url_path)) {
    $test_part = 'reading';
} else {
    $test_part = 'writing';
}

$results = getStudentResults($test_part);
$profile_url = home_url() . '/student-profile';

?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
      
<h2>Test Results</h2>

<p class="pull-right">
<a href="<?php echo $profile_url ?>" class="btn btn-primary">Back</a>
</p>
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
    } elseif ($test_type == 'reading') {
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