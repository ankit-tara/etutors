<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>

    <link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/test-assets/style.css" />
    <link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/test-assets/player.css">

    <?php wp_head();?>
</head>

<body>
    <?php
$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);
$test_part = get_field('test_part', $test->ID)
?>
<input type="hidden" name="ar-test-id" id="ar-test-id" value="<?php echo $id ?>">
    <div class="loading-test" style="display:none"> 
        <img src="<?php echo get_stylesheet_directory_uri() . '/images/loader.svg' ?>" alt="">
    </div>
    <header class="test-header">
        <nav>
            <div class="timer">
                <span style="display: none;" class="time-block">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <span id="time"> </span> minutes left</span>
            </div>

            <div class="actions">
                <a href="#" class="help">Help <i class="fa fa-info-circle" aria-hidden="true"></i>
                </a>
                <a href="#" class="user"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                </a>
            </div>
        </nav>
    </header>

    <div class="">
        <div class="row heading">
            <div class="col-lg-4">
                <h2 class="title"><?php echo $test->post_title ?></h2>

            </div>
            <div class="col-lg-8">
                <?php
if ($test_part == 'listening') {
    $audio = get_stylesheet_directory_uri() . '/test-assets/sample-audio.ogg';
    echo do_shortcode('[audio src="' . $audio . '"]');
}
?>


                <!-- <div id="player" class="player ml-auto"></div> -->
            </div>

        </div>
    </div>
    <?php if ($test_part == 'listening') {?>

    <div class="card step-1 test-sound">
        <div class="card-header">
            <i class="fa fa-headphones" aria-hidden="true"></i>
            Test Sound
        </div>
        <div class="card-body">
            <p class="card-text">
                Put on your headphones and check the sound using audio player.
            </p>
            <p class="card-text">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                If you cannot hear the sound clearly, please tell the invigilator.
            </p>

            <a href="#" class="btn btn-primary continue">Continue</a>
        </div>
    </div>
    <?php }?>

    <?php
$style = $test_part == 'listening' ? 'display:none' : null
?>

    <div class="step-2 instructions" style="<?php echo $style ?>">
        <div class="card">
            <div class="card-header">
                <h4><strong> IELTS <?php echo $test_part ?> </strong></h4>
                <p>
                    Time: Approximately <?php echo the_field('test_time' . $test->time) ?> minutes
                </p>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <strong>
                        INSTRUCTIONS TO CANDIDATES

                    </strong>
                </h5>
                <p class="card-text">
                    Answer all the questions.
                </p>
                <p class="card-text">
                    You can change your answers at any time during the test.
                    INFORMATION FOR CANDIDATES
                    <ul>
                        <li>There are 40 questions in this test.</li>
                        <li>Each question carries one mark.</li>
                        <li>There are four parts to the test.</li>
                        <li>You will hear each part once.</li>
                        <li>For each part of the test there will be time for you to look through the questions and time
                            for
                            you to check
                            your answers.</li>
                    </ul>
                </p>

                <a href="#" class="btn btn-primary start-test">Start Test</a>
            </div>
        </div>

    </div>