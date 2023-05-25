(function ($) {

    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title a').text(to);
        });
    });

    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });
  
  
   wp.customize('plato_theme_header_above_title', function (value) {
        value.bind(function (to) {
            $('.plato-header-above-text').text(to);
        });
    });
  
   wp.customize('plato_theme_header_title', function (value) {
        value.bind(function (to) {
            $('.plato-header-title').text(to);
        });
    });
  
   wp.customize('plato_theme_header_btn_text', function (value) {
        value.bind(function (to) {
            $('.plato-btn').text(to);
        });
    });
  
    wp.customize('plato_theme_about_title', function (value) {
        value.bind(function (to) {
            $('.section-title').text(to);
        });
    });
  
    wp.customize('plato_theme_about_subtitle', function (value) {
        value.bind(function (to) {
            $('.section-subtitle').text(to);
        });
    });
  
   wp.customize('plato_theme_about_text', function (value) {
        value.bind(function (to) {
            $('.about-text').text(to);
        });
    });
  
    wp.customize('plato_theme_features_title', function (value) {
        value.bind(function (to) {
            $('.features-title').text(to);
        });
    });
  
  wp.customize('plato_theme_features_subtitle', function (value) {
        value.bind(function (to) {
            $('.features-subtitle').text(to);
        });
    });
  
  wp.customize('plato_theme_parallax_title', function (value) {
        value.bind(function (to) {
            $('.parallax-title').text(to);
        });
    });
  
  wp.customize('plato_theme_parallax_text', function (value) {
        value.bind(function (to) {
            $('.parallax-text').text(to);
        });
    });
})(jQuery);
