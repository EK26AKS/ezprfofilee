/*-----------------------------------------------------------------------------------
    Template Name: Fioxen - Directory & Listings HTML Template
    Template URI: site.com
    Description: Fioxen - Directory & Listings HTML Template
    Author: WebTend 
    Author URI: https://webtend.net/
    Version: 1.0

    Note: This is Main Js file
-----------------------------------------------------------------------------------
    Js INDEX
    ===================
    ## Main Menu
-----------------------------------------------------------------------------------*/

$(document).ready(function () {    
    progressBar();  
});

(function($) {
    'use strict';

    //===== Main Menu
    // Menu js

    $(".navbar-toggler,.nav-overlay").on('click', function (e) {
        $(".navbar-toggler").toggleClass("active");
    });
    $(".navbar-toggler,.nav-overlay").on('click', function (e) {
        $(".navigation-wrapper,.nav-overlay").toggleClass("active");
    });


    //===== Counter js
    $('.count').counterUp({
        delay: 100,
        time: 4000
    });

    //===== Nice select js
    $('select').niceSelect();

    //==== Isotope js
    $('#masonry-portfolio').imagesLoaded( function() {
        // items on button click
        $('.filter-btn').on('click', 'li', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });
        // menu active class
        $('.filter-btn li').on('click', function (e) {
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        var $grid = $('.masonry-row').isotope({
            itemSelector: '.portfolio-column',
            percentPosition: true,
            masonry: {
                columnWidth: 1
            }
        });
    });

    // Typed js
    if ($("#typed").length > 0) {
        var typed = new Typed('#typed', {
            stringsElement: '.type-string',
            typeSpeed: 80,
            loop: true
        });
    }

    // lazy load init
    var lazyLoadInstance = new LazyLoad();
})(window.jQuery);

//===== Prealoder
$(window).on('load', function(event) {
    $('.preloader').delay(500).fadeOut('500');
})

function progressBar() {
    $('.progress-bars').on('inview', function (event, isInView) {
        if (isInView) {
            $(this).find('.single-progress-bar').each(function () {
                const percentage = $(this).data('percentage'),
                    lineInner = $(this).find('.line'),
                    widthCss = percentage + '%';

                lineInner.width(widthCss);
            });
            $(this).unbind('inview');
        }
    });
}