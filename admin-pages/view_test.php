<?php
$home_url = menu_page_url('student-results', false);

$test_id = isset($_GET['test_id']) ? $_GET['test_id'] : '';
$test = get_test_result($test_id);
$current_user = get_user_by('id', $test['user_id']);
$test_part = get_field('test_part', $test['test_id']);
$nonce = wp_create_nonce("my_user_vote_nonce");

?>

<div class="container">

    <div class="pull-right">
        <a href="<?php echo $home_url ?>" class="btn btn-primary">Back</a>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Student Name : <?php echo $current_user ? $current_user->display_name : '' ?></h5>
            <p class="card-text">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Test Name:</td>
                            <td><?php echo $test['post_title'] ?></td>
                        </tr>
                        <tr>
                            <td>Test Part:</td>
                            <td><?php echo $test_part ?></td>
                        </tr>

                    </tbody>
                </table>
            </p>
        </div>
    </div>

    <?php
if ($test_part == 'writing') {
    for ($i = 1; $i <= 2; $i++) {?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Section <?php echo $i ?></h5>
            <p class="card-text" style="white-space: pre-line">
                <?php print_r($test['wrting_' . $i])?>
            </p>
        </div>
    </div>

    <?php
}
} else {

    $user_answers = json_decode($test['student_response']);
    $test_answers = json_decode($test['test_response']);

    ?>
  <div class="card">
        <div class="card-body">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Index</th>
                <th>User Answer</th>
                <th>Test Answer</th>
            </tr>
        </thead>
        <tbody>
            <?php
foreach ($test_answers as $key => $value) {
        ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $user_answers[$key] ?></td>
                <td><?php echo implode(',', $value->ans) ?></td>
            </tr>
            <?php
}
    ?>

        </tbody>
    </table>
       </div>
    </div>
    <?php

}

?>



    <div class="card">
        <div class="card-body">
            <div class="form">
                <div class="form-group">
                    <label for="">Score</label>
                    <input class="form-control t-score" type="number" name="score" value="<?php echo $test['score'] ?>">
                    <span class="text-danger t-score-error" style="display:none">should be an integer</span>
                </div>
                <div class="form-group">
                    <label for="">Comments</label>
                    <Textarea class="form-control t-comment"><?php echo $test['comment'] ?></Textarea>
                </div>

                <button type="submit" class="btn btn-primary test-result-save"
                    data-user-id="<?php echo $test['user_id'] ?>" data-test-id="<?php echo $test['id'] ?>"
                    data-nonce="<?php echo $nonce ?>">Save</button>



            </div>
        </div>
    </div>


</div>