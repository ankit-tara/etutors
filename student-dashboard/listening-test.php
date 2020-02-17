<?php
/*
Template Name: Listening Test
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document</title>
  <?php wp_head();?>
  <link rel="stylesheet" href="<?=get_template_directory_uri()?>/test-assets/player.css">
  <link rel="stylesheet" href="<?=get_template_directory_uri()?>/test-assets/style.css" />
</head>

<body>
<?php
$id = isset($_GET['test']) && $_GET['test'] ? base64_decode($_GET['test']) : '';
$test = getTest($id);
?>
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
        <h2 class="title">Test 1 Listening</h2>

      </div>
      <div class="col-lg-8">
<?php
$audio = get_stylesheet_directory_uri() . '/test-assets/sample-audio.ogg';
echo do_shortcode('[audio src="' . $audio . '"]')?>


<!-- <div id="player" class="player ml-auto"></div> -->
      </div>

    </div>
  </div>
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

  <div class="step-2 instructions" style="display: none;">
  <div class="card">
    <div class="card-header">
      <h4><strong> IELTS Listening </strong></h4>
      <p>
        Time: Approximately <?php echo date('H:i', strtotime($test['time'])); ?> minutes
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
        <li>For each part of the test there will be time for you to look through the questions and time for you to check
          your answers.</li>
      </ul>
    </p>

    <a href="#" class="btn btn-primary start-test">Start Test</a>
    </div>
  </div>

  </div>

  <div class="step-3 test section-1 scroll-section" style="display: none;">
    <div class="section-qus">

          <?php
           for ($i=1; $i <=4 ; $i++) { ?>
              <div class="section-block card">
               <h3 class="section card-header">Section <?php echo $i ?></h3>
                 <div class="card-body">
                 <?php echo $test['test_form_editor_'.$i] ?>
                 </div>
              </div>
         <?php  }
          ?>
      <?php// include get_theme_file_path('/test-assets/questions2.php')?>
    </div>
    <a href="#" class="btn btn-primary form-btn" data-section="1">Submit</a>
  </div>


   <?php include get_theme_file_path('./test-assets/pagination.php')?>


  <div class="modal" id="result-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Results</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table" id="result-table">

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary restart">Restart</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <?php wp_footer();?>
  <script src="<?=get_template_directory_uri()?>/test-assets/soundmanager2.js"></script>
  <script src="<?=get_template_directory_uri()?>/test-assets/player.js"></script>
  <script src="<?=get_template_directory_uri()?>/test-assets/main.js"></script>
  <script src="<?=get_template_directory_uri()?>/test-assets/question.js"></script>
</body>

</html>