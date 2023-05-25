/*
 ** This is the main js file. However , we use the compressed one with the same name and the .min extension **/

function plato_menu_height(){

}


function plato_responsive_menu(){
    jQuery('#responsive-menu-button').sidr({
        name:'plato-mobile-navigation'
    });
}
function plato_matchHeight(){
    jQuery('.matchHeight').matchHeight();
}

jQuery(window).load(function(){

    jQuery('#site-loader').fadeOut();
    plato_menu_height();
    jQuery('ul.nav-tabs li:first-child').addClass('active');

});
function plato_smooth_scrolling(){

        jQuery('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = jQuery(this.hash);
                target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    jQuery('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });

}

function plato_carousel(){
    jQuery('.slick-container').slick({
        slidesToShow: 1,
        slidesToScroll: 1
    });
}

function plato_add_sticky(){
    jQuery('.sticky-header').sticky({topSpacing:'0px'});

    jQuery('.sticky-header').removeClass('trans-header');
}

jQuery(document).ready(function(){
    'use-strict';

    var windoww = jQuery(window).width();


    if(windoww > 1048) {
        jQuery(window).stellar({
            horizontalScrolling: false,
            responsive: true
        });
    }


    plato_menu_height();
    plato_responsive_menu();
    plato_matchHeight();
    plato_smooth_scrolling();
    plato_add_sticky();
});
