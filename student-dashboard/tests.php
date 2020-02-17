<?php

/*
Template Name: Student Dashboard
 */

get_header('dashboard');
$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
if (contains('listening', $url_path)) {
    $test_type = 'listening';
} elseif (contains('reading', $url_path)) {
    $test_type = 'reading';
} else {
    $test_type = 'writing';
}
$tests = get_type_tests($test_type);
?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="table-responsive p-20">
            <table class="table">
                <thead>
                    <tr>
                        <th class="bdwT-0">Name</th>
                        <th class="bdwT-0">Test</th>
                        <th class="bdwT-0">Type</th>
                        <th class="bdwT-0">Date</th>
                        <th class="bdwT-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tests as $test) {
                        $url = home_url().'/student-profile/test/listening?test='.base64_encode($test['id']).'&et=Mc=='
                        ?>
                    <tr>
                        <td class="fw-600"><?php echo $test_type . ' ' . $test['id'] ?></td>
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
                        <td><?php echo $test['module_type'] ?></td>
                        <td><?php echo date('F j , Y', strtotime($test['created_at'])); ?></td>
                        <td>
                            <a href="<?php echo   $url ?>" class="btn bgc-deep-purple-50 c-deep-purple-700">Start Test</a>
                        </td>
                    </tr>
                    <?php }?>

                    <?php if(!count($tests)){
                        echo '<tr><td colspan=5" class="text-center">New Tests Coming up soon!!</td></tr>';
                    } ?>
                </tbody>
            </table>
        </div>

    </div>
</main>

<?php get_footer('dashboard');?>