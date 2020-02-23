<?php

get_header();
wp_reset_postdata()
?>

<div class="about">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container text-center">
                    <h2 class="section_title"><?php the_title(  ) ?></h2>
                    <!-- <div class="section_subtitle"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel gravida arcu Vestibulum</p></div> -->
                </div>
            </div>
        </div>
        <div class="row about_row">
        <?php the_content() ?>
        </div>
    </div>
</div>

<?php
get_footer(  );
?>