<?php
/*
Template Name: About us
*/

 get_header();
 
?>

<!-- Banner Section -->

<div class="banner_section">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>About</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>			
</div>

<!-- About -->

<div class="about">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">About Us</h2>
                    <!-- <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu Vestibulum</p></div> -->
                </div>
            </div>
        </div>
        <div class="row about_row">
            
            <!-- About Item -->
            <div class="col-md-12">
                <p>e-Tutuor aims to impart necessary skills, knowledge and
                education for the overall-personality development of the Individuals who aspire to
                succeed in all aspects of life. Nowadays, Effective Communication and Strong-
                Personality is must in a competitive-world, where most Industries and professional-
                sphere require strong personality and communication either in English or a foreign
                language. We aim to develop those skills through courses that are specifically
                designed to meet those requirements.</p>
                <br>
                <br>
            </div>
            <div class="col-lg-4 about_col about_col_left">
                <div class="about_item">
                    <div class="about_item_image"><img src="<?= get_template_directory_uri();?>/images/about_1.jpg" alt=""></div>
                    <div class="about_item_title"><a href="#">Our Stories</a></div>
                    <div class="about_item_text">
                        <p>Lorem ipsum dolor sit , consectet adipisi elit, sed do eiusmod tempor for enim en consectet adipisi elit, sed do consectet adipisi elit, sed doadesg.</p>
                    </div>
                </div>
            </div>

            <!-- About Item -->
            <div class="col-lg-4 about_col about_col_middle">
                <div class="about_item">
                    <div class="about_item_image"><img src="<?= get_template_directory_uri();?>/images/about_2.jpg" alt=""></div>
                    <div class="about_item_title"><a href="#">Our Mission</a></div>
                    <div class="about_item_text">
                        <p>Lorem ipsum dolor sit , consectet adipisi elit, sed do eiusmod tempor for enim en consectet adipisi elit, sed do consectet adipisi elit, sed doadesg.</p>
                    </div>
                </div>
            </div>

            <!-- About Item -->
            <div class="col-lg-4 about_col about_col_right">
                <div class="about_item">
                    <div class="about_item_image"><img src="<?= get_template_directory_uri();?>/images/about_3.jpg" alt=""></div>
                    <div class="about_item_title"><a href="#">Our Vision</a></div>
                    <div class="about_item_text">
                        <p>Lorem ipsum dolor sit , consectet adipisi elit, sed do eiusmod tempor for enim en consectet adipisi elit, sed do consectet adipisi elit, sed doadesg.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Feature -->

<div class="feature">
    <div class="feature_background" style="background-image:url(<?= get_template_directory_uri();?>/images/courses_background.jpg)"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title">Testimonials</h2>
                    <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu. Vestibulum feugiat, sapien ultrices fermentum congue, quam velit venenatis sem</p></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme testimonial_slider">
                    <div class="owl-item">
                        <div class="bubble-center">
                            <div class="ava"><img src="https://upload.wikimedia.org/wikipedia/commons/f/f5/Poster-sized_portrait_of_Barack_Obama.jpg" alt=""></div>
                            <div class="bubble-3">
                                <h3>Adam</h3>
                                <p>It's just amazing. I will let my friend know about this, she could really make use of etutour! Thanks etutour! I am completely blown away.</p>
                            </div>
                        </div>   
                    </div>
                    <div class="owl-item">
                        <div class="bubble-center">
                            <div class="ava"><img src="https://www.ludoviccareme.com/files/image_211_image_fr.jpg" alt=""></div>
                            <div class="bubble-3">
                                <h3>John</h3>
                                <p>It's just amazing. I will let my friend know about this, she could really make use of etutour! Thanks etutour! I am completely blown away.</p>  
                            </div>
                        </div>   
                    </div>
                    <div class="owl-item">
                        <div class="bubble-center">
                            <div class="ava"><img src="https://i.ytimg.com/vi/OtHrDCox_kI/maxresdefault.jpg" alt=""></div>
                            <div class="bubble-3">
                                <h3>Peter</h3>
                                <p>It's just amazing. I will let my friend know about this, she could really make use of etutour! Thanks etutour! I am completely blown away.</p>                    
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php get_footer(); ?>

