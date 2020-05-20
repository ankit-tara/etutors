<?php
$is_delete = isset($_GET['type']) && $_GET['type'] == 'delete' ? true : false;
$test_id = isset($_GET['test_id']) ? $_GET['test_id'] : '';

if ($is_delete && $test_id) {
    $del = delete_test_result($test_id);
}

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
                <th scope="col">Delete</th>
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
    $delete = add_query_arg(array(
        'test_id' => $test['id'],
        'type' => 'delete',
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
                <td>
                    <a href="<?php echo $delete ?>" class="btn btn-danger">Delete</a>
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
        <?php // if($page_no > 1){ echo "<li><ahref='".getStudentNextPage()."1'>First Page</ahref=></li>"; }
    $page_no = isset($_GET['paged']) ? $_GET['paged'] : 1;
    $total_no_of_pages = ceil($total_tests / 10);
;
    // $total_no_of_pages = $total_tests/10;

    $total_records_per_page = 3;
    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";
    $second_last = $total_no_of_pages - 1;
?>
        <!--  ?> -->

        <li class="page-item <?php if ($page_no <= 1) {echo 'disabled';}?>">
            <a class='page-link' <?php if ($page_no > 1) {echo "href='".getStudentNextPage($previous_page)."'";}?>>Previous</a>
        </li>

<?php
if ($total_no_of_pages <= 10) {
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='".getStudentNextPage($counter)."'>$counter</a></li>";
            }
        }
    } elseif ($total_no_of_pages > 10) {

        if ($page_no <= 4) {
            for ($counter = 1; $counter < 8; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='".getStudentNextPage($counter)."'>$counter</a></li>";
                }
            }
            echo "<li  class='page-item'><a class='page-link'>...</a></li>";
            echo "<li  class='page-item'><a class='page-link'href='".getStudentNextPage($second_last)."'>$second_last</a></li>";
            echo "<li  class='page-item'><a class='page-link'href='".getStudentNextPage($total_no_of_pages)."'>$total_no_of_pages</a></li>";
        } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
            echo "<li  class='page-item'><a class='page-link'href='".getStudentNextPage(1)."'>1</a></li>";
            echo "<li  class='page-item'><a class='page-link'href='".getStudentNextPage(2)."'>2</a></li>";
            echo "<li  class='page-item'><a class='page-link'>...</a></li>";
            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='".getStudentNextPage($counter)."'>$counter</a></li>";
                }
            }
            echo "<li class='page-item'><a class='page-link'>...</a></li>";
            echo "<li class='page-item'><a class='page-link'href='".getStudentNextPage($second_last)."'>$second_last</a></li>";
            echo "<li class='page-item'><a class='page-link'href='".getStudentNextPage($total_no_of_pages)."'>$total_no_of_pages</a></li>";
        } else {
            echo "<li class='page-item'><a class='page-link'href='".getStudentNextPage(1)."'>1</a></li>";
            echo "<li class='page-item'><a class='page-link'href='".getStudentNextPage(2)."'>2</a></li>";
            echo "<li class='page-item'><a class='page-link'>...</a></li>";

            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='".getStudentNextPage($counter)."'>$counter</a></li>";
                }
            }
        }
    }
    ?>

        <li class='page-item' <?php if ($page_no >= $total_no_of_pages) {echo "class='disabled'";}?>>
            <a class='page-link'
                <?php if ($page_no < $total_no_of_pages) {echo "href='".getStudentNextPage($next_page)."'";}?>>Next</a>
        </li>
        <?php if ($page_no < $total_no_of_pages) {
        echo "<li class='page-item'><a class='page-link'href='".getStudentNextPage($total_no_of_pages)."'>Last &rsaquo;&rsaquo;</a></li>";
    }?>
    </ul>


</nav>
<?php }?>