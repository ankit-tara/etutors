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

</head>

<body class="app dashboard">
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
                    <li class="nav-item mT-30 actived"><a class="sidebar-link" href="#"><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a></li>
                    <li class="nav-item dropdown"><a class="sidebar-link" href="ui"><span class="icon-holder"><i class="c-pink-500 ti-user"></i> </span><span class="title">Profile</span></a></li>
                    <li class="nav-item dropdown open"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-light-blue-500 ti-pencil"></i></span><span class="title">Tests</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="#"><i class="c-green-500 ti-palette"></i>Reading</a></li>
                            <li><a class="sidebar-link" href="#"><i class="c-purple-500 ti-headphone-alt"></i>Listening</a></li>
                            <li><a class="sidebar-link" href="#"><i class="c-pink-500 ti-pencil-alt"></i>Writing</a></li>
                            <li><a class="sidebar-link" href="#"><i class="c-red-500 ti-microphone"></i>Personality Development</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="sidebar-link" href="#"><span class="icon-holder"><i class="c-purple-500 ti-shopping-cart"></i> </span><span class="title">Your Orders</span></a></li>
                </ul>
            </div>
        </div>
        <div class="page-container">
        <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                                <div class="peer mR-10"><img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg" alt=""></div>
                                <div class="peer"><span class="fsz-sm c-grey-900"><?= wp_get_current_user()->user_login;?></span></div>
                            </a>
                            <ul class="dropdown-menu fsz-sm">
                                <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i> <span>Profile</span></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo wp_logout_url(home_url()); ?>" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>