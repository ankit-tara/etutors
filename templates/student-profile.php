<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Dashboard</title>
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

<body class="app">
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
                    <li class="nav-item"><a class="sidebar-link" href="#"><span class="icon-holder"><i class="c-blue-500 ti-share"></i> </span><span class="title">Upgrade</span></a></li>
                    <li class="nav-item"><a class="sidebar-link" href="#"><span class="icon-holder"><i class="c-indigo-500 ti-bar-chart"></i> </span><span class="title">Test history</span></a></li>
                    <li class="nav-item"><a class="sidebar-link" href="#"><span class="icon-holder"><i class="c-light-blue-500 ti-pencil"></i> </span><span class="title">Tests</span></a></li>
                    <li class="nav-item dropdown"><a class="sidebar-link" href="ui"><span class="icon-holder"><i class="c-pink-500 ti-palette"></i> </span><span class="title">Profile</span></a></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-orange-500 ti-layout-list-thumb"></i> </span><span class="title">Courses</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="#">Reading</a></li>
                            <li><a class="sidebar-link" href="#">Listening</a></li>
                            <li><a class="sidebar-link" href="#">Writing</a></li>
                            <li><a class="sidebar-link" href="#">Personality Development</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="sidebar-link" href="#"><span class="icon-holder"><i class="c-purple-500 ti-map"></i> </span><span class="title">Your Orders</span></a></li>
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
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="row gap-20 masonry pos-r">
                        <!-- <div class="masonry-item col-md-12">
                            <div class="bgc-white p-20 bd">
                                <h2 class="c-grey-900">Welcome Arbites</h2>
                                <div class="mT-30">

                                </div>
                            </div>
                        </div> -->
                        <div class="masonry-sizer col-md-6"></div>
                        <div class="masonry-item w-100">
                            <div class="row gap-20">
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Reading</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">+10%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Listening</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">-7%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Writing</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">~12%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="layers bd bgc-white p-20">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">Speaking</h6></div>
                                        <div class="layer w-100">
                                            <div class="peers ai-sb fxw-nw">
                                                <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                                                <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">33%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="masonry-item col-md-6">
                            <div class="bgc-white p-20 bd">
                                <h6 class="c-grey-900">Complete Profile Details</h6>
                                <div class="mT-30">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6"><label for="inputEmail4">Email</label> <input type="email"
                                                    class="form-control" id="inputEmail4" placeholder="Email"></div>
                                            <div class="form-group col-md-6"><label for="inputPassword4">Password</label> <input type="password"
                                                    class="form-control" id="inputPassword4" placeholder="Password"></div>
                                        </div>
                                        <div class="form-group"><label for="inputAddress">Address</label> <input type="text"
                                                class="form-control" id="inputAddress" placeholder="1234 Main St"></div>
                                        <div class="form-group"><label for="inputAddress2">Address 2</label> <input type="text"
                                                class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor"></div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6"><label for="inputCity">City</label> <input type="text"
                                                    class="form-control" id="inputCity"></div>
                                            <div class="form-group col-md-4"><label for="inputState">State</label> <select id="inputState"
                                                    class="form-control">
                                                    <option selected="selected">Choose...</option>
                                                    <option>...</option>
                                                </select></div>
                                            <div class="form-group col-md-2"><label for="inputZip">Zip</label> <input type="text"
                                                    class="form-control" id="inputZip"></div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6"><label class="fw-500">Birthdate</label>
                                                <div class="timepicker-input input-icon form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon bgc-white bd bdwR-0"><i class="ti-calendar"></i></div>
                                                        <input type="text" class="form-control bdc-grey-200 start-date" placeholder="Datepicker"
                                                            data-provide="datepicker">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        </div><button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600"><span>Copyright © 2020 .All rights reserved.</span></footer>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendor.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bundle.js"></script>
</body>

</html>