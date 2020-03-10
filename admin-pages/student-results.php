<?php

$tests = getAllStudentResults();
$total_tests = get_total_tests();
?>

<div class="table-responsive">
    <table class="table table-hover ar-lists-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student Name</th>
                <th scope="col">Test</th>
                <th scope="col">Test Type</th>

                <th scope="col">Score</th>
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tests as $key => $test) {
    $current_user = get_user_by('id', $test['user_id']);
    $home_url = menu_page_url('student-results', false);
    $view = add_query_arg(array(
        'test_id' => $test['id'],
        'type' => 'view',
    ), $home_url);

    ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><a href="<?php echo get_edit_user_link($test['user_id']) ?>"
                        target="_blank"><?php echo $current_user ? $current_user->display_name : 'User not exists' ?></a>
                </td>
                <td><a href="<?php echo get_edit_post_link($test['test_id']) ?>"
                        target="_blank"><?php echo $test['post_title'] ?></a></td>
                <td><?php echo get_field('test_part', $test['test_id']) ?></td>
                <td><?php echo $test['score'] ?></td>
                <td>
                    <a href="<?php echo $view ?>" class="btn btn-primary">View</a>
                </td>
            </tr>
            <?php }?>

            <?php if (!$total_tests) {
    echo '<td colspan="6" class="text-center">Student have not given any test yet</td>';
}?>
        </tbody>
    </table>
</div>

<?php if ($total_tests > 10) {?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
$count = 0;
    for ($i = 1; $i <= $total_tests; $i = $i + 10) {
        $count++;
        $home_url = menu_page_url('student-results', false);
        $next_page = add_query_arg(array(
            'paged' => $count,
        ), $home_url);

        ?>
        <li class="page-item"><a class="page-link" href="<?php echo $next_page ?>"><?php echo $count ?></a></li>
        <?php }?>

    </ul>
</nav>
<?php }?>