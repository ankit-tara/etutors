<?php
/*
Template Name: Reading Test
*/
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/test-assets/player.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/test-assets/style.css" />
</head>

<body>
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

    <div class="heading">
        <h2 class="title">Sample Academic Readings</h2>
    </div>
    <div class="wrapper test">
        <div class="content-wrapper row reading1">
            <div class="left col-md-6 scroll-section">
                <div class="content">
                    <?php include get_theme_file_path('./test-assets/reading/reading1.php') ?>
                </div>
            </div>
            <div class="right col-md-6 scroll-section ">
                <div class="content">
                    <?php include get_theme_file_path('./test-assets/reading/questions2.php') ?>
                </div>
            </div>
        </div>

        <div class="content-wrapper row reading2" style="display:none">
            <div class="left col-md-6 scroll-section">
                <div class="content">
                    <?php include get_theme_file_path('./test-assets/reading/reading2.php') ?>
                </div>
            </div>
            <div class="right col-md-6 scroll-section ">
                <div class="content">
                    <?php include get_theme_file_path('./test-assets/reading/questions3.php') ?>
                </div>
            </div>
        </div>

        <div class="content-wrapper row reading3" style="display:none">
            <div class="left col-md-6 scroll-section">
                <div class="content">
                    <?php include get_theme_file_path('./test-assets/reading/reading3.php') ?>
                </div>
            </div>
            <div class="right col-md-6 scroll-section ">
                <div class="content">
                    <?php include get_theme_file_path('./test-assets/reading/questions4.php') ?>
                </div>
            </div>
        </div>

        <div class="content-wrapper row reading4" style="display:none">
            <div class="left col-md-6 scroll-section">
                <div class="content">
                    <?php include get_theme_file_path('./test-assets/reading/reading4.php') ?>
                </div>
            </div>
            <div class="right col-md-6 scroll-section ">
                <div class="content">
                    <?php include get_theme_file_path('./test-assets/reading/questions5.php') ?>
                </div>
            </div>
        </div>

        <div class="content-wrapper row reading5" style="display:none">
            <div class="left col-md-6 scroll-section">
                <div class="content">
                    <?php include get_theme_file_path('./test-assets/reading/reading5.php') ?>
                </div>
            </div>
            <div class="right col-md-6 scroll-section ">
                <div class="content">
                    <?php include get_theme_file_path('./test-assets/reading/questions6.php') ?>
                </div>
            </div>
        </div>

    </div>

    <div class="left-help help-icon">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
    </div>

    <div class="right-help help-icon">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
    </div>


    <?php include get_theme_file_path('./test-assets/reading/pagination.php') ?>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="<?= get_template_directory_uri()?>/test-assets/soundmanager2.js"></script>
    <script src="<?= get_template_directory_uri()?>/test-assets/player.js"></script>
    <script src="<?= get_template_directory_uri()?>/test-assets/main.js"></script>
    <script src="<?= get_template_directory_uri()?>/test-assets/question.js"></script>
</body>

</html>