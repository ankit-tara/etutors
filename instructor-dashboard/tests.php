<?php

get_header('instructor');
$url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
if (contains('tests', $url_path)) {
    $test_type = 'tests';
} elseif (contains('students', $url_path)) {
    $test_type = 'students';
} 
$tests = get_tests();
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
                    <?php foreach ($tests as $test) {?>
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
                        <td><?php echo date('d j , Y', strtotime($test['created_at'])); ?></td>
                        <td>
                            <a href="" class="btn bgc-deep-purple-50 c-deep-purple-700">Start Test</a>
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