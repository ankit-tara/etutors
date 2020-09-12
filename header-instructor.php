<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <title>Dashboard</title>
        <?php wp_head(); ?>
    <style>
        #loader {
            transition: all .3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000
        }
        
        #loader.fadeOut {
            opacity: 0;
            visibility: hidden
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1s infinite ease-in-out;
            animation: sk-scaleout 1s infinite ease-in-out
        }

        .dashboard .header{
            right:0;
            left:auto;
        }
        .dashboard .sidebar{
            padding-left:0;
            margin-top:0;
        }
        .dashboard .page-container{
            min-height: calc(100vh - 61px);
        }
        .dashboard .sidebar .sidebar-inner .sidebar-logo .logo{
            width:auto;
        }
        
        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                opacity: 0
            }
        }
        
        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }
    </style>
    <link href="<?php echo get_template_directory_uri(); ?>/plugins/themify-icons.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/dashboardstyle.css" rel="stylesheet">
    <script>
    jQuery(document).ready(function() {
        jQuery("#toggleLog").click(function(e) {
            e.preventDefault();
            jQuery("#logDrop").toggle();
        });
    });
    </script>
</head>

<body class="app dashboard js-focus-visible is-collapsed">
    <?php 
        $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
        $profile_url = home_url() . '/instructor-profile';
        $profile_url_name = 'instructor-profile';
    ?>
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', function load() {
            const loader = document.getElementById('loader');
            setTimeout(function() {
                loader.classList.add('fadeOut');
            }, 300);
        });
    </script>
    <div>
        <div class="sidebar">
            <div class="sidebar-inner">
                <div class="sidebar-logo">
                    <div class="peers ai-c fxw-nw">
                        <div class="peer peer-greed">
                            <a class="sidebar-link td-n" href="index">
                                <div class="peers ai-c fxw-nw">
                                    <div class="peer">
                                        <div class="logo"><img src="<?php echo get_template_directory_uri();?>/images/logo1.png" alt="" width="200"></div>
                                    </div>
                                    <div class="peer peer-greed">
                                        <h5 class="lh-1 mB-0 logo-text"></h5></div>
                                </div>
                            </a>
                        </div>
                        <div class="peer">
                            <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                        </div>
                    </div>
                </div>
                <ul class="sidebar-menu scrollable pos-r">
                    <li class="nav-item mT-30 <?php echo $url_path == $profile_url ? 'active':''  ?>">
                        <a class="sidebar-link" href="<?php  echo $profile_url?>">
                            <span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    
                    <!-- <li class="nav-item dropdown <?php //echo $url_path == $profile_url_name.'/tests' ? 'active':''  ?>">
                        <a class="sidebar-link" href="<?php //echo $profile_url .'/tests'?>">
                            <span class="icon-holder"> <i class="c-purple-500 ti-headphone-alt"></i> </span>
                            <span class="title">Tests</span>
                        </a>
                    </li> -->

                    <li class="nav-item dropdown <?php echo $url_path == $profile_url_name.'/students' ? 'active':''  ?>">
                        <a class="sidebar-link" href="<?php echo $profile_url .'/students'?>">
                            <span class="icon-holder"> <i class="c-green-500 ti-palette"></i> </span>
                            <span class="title">Students</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-container">
        <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i
                                    class="ti-menu"></i></a></li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown">
                            <a href="" id="toggleLog" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                                data-toggle="dropdown">
                                <div class="peer mR-10"><i class="c-blue-500 ti-user usericonDash"></i></div>
                                <div class="peer"><span
                                        class="fsz-sm c-grey-900"><?=wp_get_current_user()->user_login;?></span></div>
                            </a>
                            <ul class="dropdown-menu fsz-sm" id="logDrop">
                                <li><a href="<?php site_url();?>/my-account"
                                        class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i>
                                        <span>My account</span></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo wp_logout_url(home_url()); ?>"
                                        class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i
                                            class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>