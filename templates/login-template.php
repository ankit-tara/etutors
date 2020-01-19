<?php
/*
Template Name: Login Template
*/
 get_header();

?>


<!-- Banner section -->

	<div class="banner_section">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Contact</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>

    <!-- Register/Login -->
    
    <section class="login-section">

        
        <div class="login-wrapper container">
        <div class="side-1">
            <div class="head">
                <h2 class="h-main">Welcome Back!</h2>
            <p class="h-sec">Please log in with your username and password </p>
            <button class="toggle-log">SIGN UP</button>
        </div>
        </div>
        <div class="side-2">
            <div class="head">
            <h2 class="h-main">Hey there!</h2>
            <p class="h-sec">Enter your personal details and start today!</p>
            <button class="toggle-log">SIGN IN</button>
            </div>
        </div>
        <div class="forms">
            <div class="sign-up">
            <div class="form">
                <fieldset class="block">
                    <h2 class="form-h">Sign up</h2>
                <!-- <div class="log-buttons"><a class="log-btn log-fb" href="#"></a><a class="log-btn log-gp" href="#"></a><a class="log-btn log-li" href="#"></a></div> -->
                <form action="">
                    <input class="input-text" placeholder="Email" email="email" type="email"/>
                    <input class="input-text" placeholder="Username" type="text"/>
                    <input class="input-text" placeholder="Password" password="password" type="password"/>
                    <input class="input-submit" type="submit" value="SIGN UP"/>
                </form>
                </fieldset>
            </div>
            </div>
            <div class="sign-in">
                <div class="form">
                <fieldset>
                <h2 class="form-h">Sign in</h2>
                <!-- <div class="log-buttons"><a class="log-btn log-fb" href="#"></a><a class="log-btn log-gp" href="#"></a><a class="log-btn log-li" href="#"></a></div> -->
                <form action="">
                    <input class="input-text" placeholder="Email" email="email" type="email"/>
                    <input class="input-text" placeholder="Password" type="password"/><a class="forgot" href="#">Forgot your password?</a>
                    <input class="input-submit" type="submit" value="SIGN IN"/>
                </form>
                </fieldset>
            </div>
            </div>
        </div>
    </div>

    </section>

    
    <script>
        "use strict";
        var side1 = jQuery('.side-1');
        var side2 = jQuery('.side-2');
        var signInF = jQuery('.sign-in fieldset');
        var signUpF = jQuery('.sign-up fieldset');
        jQuery('.side-1 .toggle-log').click(function () {
        side1.css({
            'transform': 'rotateY(180deg)',
            'background-position': '100%'
        });
        side2.css({
            'transform': 'rotateY(0deg)',
            'background-position': '100%'
        });
        signInF.attr('disabled', 'disable');
        signInF.addClass('block');
        signUpF.removeAttr('disabled');
        signUpF.removeClass('block');
        });
        jQuery('.side-2 .toggle-log').click(function () {
        side1.css({
            'transform': 'rotateY(0deg)',
            'background-position': '0%'
        });
        side2.css({
            'transform': 'rotateY(-180deg)',
            'background-position': ' 0%'
        });
        signInF.removeAttr('disabled');
        signInF.removeClass('block');
        signUpF.attr('disabled', 'disable');
        signUpF.addClass('block');
        });
    </script>

<?php get_footer(); ?>