/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Header Search

******************************/

jQuery(document).ready(function () {
    "use strict";

    /* 

    1. Vars and Inits

    */

    var header = jQuery('.header');
    var menuActive = false;
    var menu = jQuery('.menu');
    var burger = jQuery('.hamburger');

    setHeader();

    jQuery(window).on('resize', function () {
        setHeader();
    });

    jQuery(document).on('scroll', function () {
        setHeader();
    });

    initMenu();
    initHeaderSearch();

    /* 

    2. Set Header

    */

    function setHeader() {
        if (jQuery(window).scrollTop() > 100) {
            header.addClass('scrolled');
        } else {
            header.removeClass('scrolled');
        }
    }

    /* 

    3. Init Menu

    */

    function initMenu() {
        if (jQuery('.menu').length) {
            var menu = jQuery('.menu');
            if (jQuery('.hamburger').length) {
                burger.on('click', function () {
                    if (menuActive) {
                        closeMenu();
                    } else {
                        openMenu();

                        jQuery(document).one('click', function cls(e) {
                            if (jQuery(e.target).hasClass('menu_mm')) {
                                jQuery(document).one('click', cls);
                            } else {
                                closeMenu();
                            }
                        });
                    }
                });
            }
        }
    }

    function openMenu() {
        menu.addClass('active');
        menuActive = true;
    }

    function closeMenu() {
        menu.removeClass('active');
        menuActive = false;
    }

    /* 

    4. Init Header Search

    */

    function initHeaderSearch() {
        if (jQuery('.search_button').length) {
            jQuery('.search_button').on('click', function () {
                if (jQuery('.header_search_container').length) {
                    jQuery('.header_search_container').toggleClass('active');
                }
            });
        }
    }


});