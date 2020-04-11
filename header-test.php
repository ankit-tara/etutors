<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Etutour - Test</title>

    <link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/test-assets/style.css" />
    <link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/test-assets/player.css">
 <link href="https://swisnl.github.io/jQuery-contextMenu/dist/jquery.contextMenu.css" rel="stylesheet" type="text/css" />

   <?php wp_head();?>
</head>

<body>
    <?php
$id = isset($_GET['et']) && $_GET['et'] ? base64_decode($_GET['et']) : '';
$test = get_post($id);
$test_part = get_field('test_part', $test->ID);
$time = get_field('test_time', $test->ID);
$parsed = date_parse($time);
$seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];

?>
    <input type="hidden" name="ar-test-id" id="ar-test-id" value="<?php echo $id ?>">
    <input type="hidden" name="ar-test-type" id="ar-test-type" value="<?php echo $test_part ?>">
    <div class="loading-test" style="display:none">
        <img src="<?php echo get_stylesheet_directory_uri() . '/images/loader.svg' ?>" alt="">
    </div>
    <header class="test-header">
        <nav>
            <div class="timer">
                <span style="display: none;" class="time-block">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <span id="time" data-time="<?php echo $seconds ?>"> <?php the_field('test_time', $test->ID)?> </span>
                </span>
            </div>

            <div class="actions">
                <a href="#" class="help notes-btn">Take Notes <i class="fa fa-info-circle" aria-hidden="true"></i></a>
                <div class="notebook" id="notebook">
                    <div id="notebookheader"><span>Drag from here</span><a href="#" class="close-notebook"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
                    <textarea id="page" cols="30" rows="10" placeholder="well...start note taking"></textarea>
                </div>
                <a href="#" style="display:none" class="btn btn-primary form-btn" data-section="1" data-test-part="<?php echo $test_part ?>">Submit</a>
                <a href="<?php echo home_url() .'/student-profile' ?>" class="">
                    Go to Dashboard
                </a>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row heading">
            <div class="col-lg-4">
                <h2 class="title"><?php echo $test->post_title ?></h2>

            </div>
            <div class="col-lg-8 demo-audio">
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
                <h4 style="text-transform:uppercase"><strong> IELTS <?php echo $test_part ?> </strong></h4>
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
                <?php if($test_part == 'writing') 
                {
                ?>
                    <p class="card-text">
                        Answer both parts.
                    </p>
                    <p class="card-text">
                    You can change your answers at any time during the test.
                    
                        <ul>
                            <li>There are two parts in this test.</li>
                            <li>Part 2 contributes twice as much as Part 1 to the writing score.</li>
                            <li>The test clock will show you when there are 10 minutes and 5 minutes remaining.</li>
                        </ul>
                    </p>
                <?php
                }
                ?>
                <?php if($test_part == 'reading') 
                {
                ?>
                    <p class="card-text">
                        Answer all the questions.
                    </p>
                    <p class="card-text">
                    You can change your answers at any time during the test.
                        <ul>
                            <li>There are 40 questions in this test.</li>
                            <li>Each question carries one mark.</li>
                            <li>There are four parts to the test.</li>
                            <li>For each part of the test there will be time for you to look through the questions and time
                                for
                                you to check
                                your answers.</li>
                        </ul>
                    </p>
                <?php
                }
                ?>
                <?php if($test_part == 'listening') 
                {
                ?>
                    <p class="card-text">
                        Answer all the questions.
                    </p>
                    <p class="card-text">
                    You can change your answers at any time during the test.
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
                <?php
                }
                ?>
                
                <a href="#" class="btn btn-primary start-test">Start Test</a>
            </div>
        </div>

    </div>