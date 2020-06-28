<?php
$user_id = base64_decode($_GET['et']);
$tests = getStudentResultsCtpd($user_id);
$user = get_user_by('id', $user_id);
$total_tests = get_count_ctpd($user_id);
// print_R($tests);
// die;

get_header('instructor');

?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <h2>Tests given by  -<?php echo $user->display_name ?> </h2>
         <a href="<?php echo home_url() . '/instructor-profile/students' ?>" class="btn btn-primary pull-right">Back</a>
        <div class="table-responsive p-20">
            <table class="table">
                <thead>
                    <tr>
                        <th class="bdwT-0">Title</th>
                        <th class="bdwT-0">score</th>
                        <th class="bdwT-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tests as $test) {
                        // print_r($test);
                        // die;

    $url = home_url() . '/instructor-profile/student-test/?et=' . base64_encode($test['id']);

    ?>
                    <tr>
                        <td><?php echo $test['post_title'] ?></td>
                        <td><?php echo $test['score'] ?></td>
                        <td>
                            <a href="<?php echo $url ?>" class="btn bgc-deep-purple-50 c-deep-purple-700">View Test</a>
                        </td>

                    </tr>

                    <?php }?>

                    <?php if (!count($tests)) {
    echo '<tr><td colspan=5" class="text-center">No tests given yet!!</td></tr>';

}?>
                </tbody>
            </table>

            
<?php if ($total_tests > 20) {?>
<nav aria-label="Page navigation example">




    <ul class="pagination">
        <?php // if($page_no > 1){ echo "<li><ahref='".getStudentTestsNextPage($_GET['et'],)."1'>First Page</ahref=></li>"; }
    $page_no = isset($_GET['paged']) ? $_GET['paged'] : 1;
    $total_no_of_pages = ceil($total_tests / 20);

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
            <a class='page-link' <?php if ($page_no > 1) {echo "href='" . getStudentTestsNextPage($_GET['et'],$previous_page) . "'";}?>>Previous</a>
        </li>

<?php
if ($total_no_of_pages <= 20) {
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
            if ($counter == $page_no) {
                echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='" . getStudentTestsNextPage($_GET['et'],$counter) . "'>$counter</a></li>";
            }
        }
    } elseif ($total_no_of_pages > 20) {

        if ($page_no <= 4) {
            for ($counter = 1; $counter < 8; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='" . getStudentTestsNextPage($_GET['et'],$counter) . "'>$counter</a></li>";
                }
            }
            echo "<li  class='page-item'><a class='page-link'>...</a></li>";
            echo "<li  class='page-item'><a class='page-link'href='" . getStudentTestsNextPage($_GET['et'],$second_last) . "'>$second_last</a></li>";
            echo "<li  class='page-item'><a class='page-link'href='" . getStudentTestsNextPage($_GET['et'],$total_no_of_pages) . "'>$total_no_of_pages</a></li>";
        } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
            echo "<li  class='page-item'><a class='page-link'href='" . getStudentTestsNextPage($_GET['et'],1) . "'>1</a></li>";
            echo "<li  class='page-item'><a class='page-link'href='" . getStudentTestsNextPage($_GET['et'],2) . "'>2</a></li>";
            echo "<li  class='page-item'><a class='page-link'>...</a></li>";
            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='" . getStudentTestsNextPage($_GET['et'],$counter) . "'>$counter</a></li>";
                }
            }
            echo "<li class='page-item'><a class='page-link'>...</a></li>";
            echo "<li class='page-item'><a class='page-link'href='" . getStudentTestsNextPage($_GET['et'],$second_last) . "'>$second_last</a></li>";
            echo "<li class='page-item'><a class='page-link'href='" . getStudentTestsNextPage($_GET['et'],$total_no_of_pages) . "'>$total_no_of_pages</a></li>";
        } else {
            echo "<li class='page-item'><a class='page-link'href='" . getStudentTestsNextPage($_GET['et'],1) . "'>1</a></li>";
            echo "<li class='page-item'><a class='page-link'href='" . getStudentTestsNextPage($_GET['et'],2) . "'>2</a></li>";
            echo "<li class='page-item'><a class='page-link'>...</a></li>";

            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='" . getStudentTestsNextPage($_GET['et'],$counter) . "'>$counter</a></li>";
                }
            }
        }
    }
    ?>

        <li class='page-item' <?php if ($page_no >= $total_no_of_pages) {echo "class='disabled'";}?>>
            <a class='page-link'
                <?php if ($page_no < $total_no_of_pages) {echo "href='" . getStudentTestsNextPage($_GET['et'],$next_page) . "'";}?>>Next</a>
        </li>
        <?php if ($page_no < $total_no_of_pages) {
        echo "<li class='page-item'><a class='page-link'href='" . getStudentTestsNextPage($_GET['et'],$total_no_of_pages) . "'>Last &rsaquo;&rsaquo;</a></li>";
    }?>
    </ul>


</nav>
<?php }?>
        </div>

    </div>
</main>
<?php get_footer('dashboard');