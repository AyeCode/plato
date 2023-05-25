<?php

if (class_exists('WP_Customize_Control') && !class_exists('Plato_Custom_Content')) :
    class Plato_Custom_Content extends WP_Customize_Control
    {
        // Whitelist content parameter
        public $content = '';

        /**
         * Render the control's content.
         *
         * Allows the content to be overriden without having to rewrite the wrapper.
         *
         * @since   1.0.0
         * @return  void
         */
        public function render_content()
        {
            if (isset($this->label)) {
                echo '<span class="customize-control-title">' . $this->label . '</span>';
            }
            if (isset($this->content)) {
                echo $this->content;
            }
            if (isset($this->description)) {
                echo '<span class="description customize-control-description">' . $this->description . '</span>';
            }
        }
    }
endif;
/*
* Homepage builder
*/
$wp_customize->add_panel('plato_home_builder', array(
    'priority' => 9,
    'title' => __('Homepage Builder', 'plato'),
    'description' => __('Build the home page like the demo', 'plato'),
));

$wp_customize->add_section(
    'homepage_settings_section',
    array(
        'title' => __('Header Text & Buttons', 'plato'),
        'description' => __('After uploading a header image fill this forms to enhance your header.', 'plato'),
        'panel' => 'plato_home_builder',
    )
);
$wp_customize->add_section(
    'homepage_about_section',
    array(
        'title' => __('About Section', 'plato'),
        'description' => __('Set your about section.', 'plato'),
        'panel' => 'plato_home_builder',
    )
);
$wp_customize->add_section(
    'homepage_features_section',
    array(
        'title' => __('Features Section', 'plato'),
        'description' => __('Set your features section.', 'plato'),
        'panel' => 'plato_home_builder',
    )
);
$wp_customize->add_section(
    'homepage_parallax_section',
    array(
        'title' => __('Parallax Section', 'plato'),
        'description' => __('Enable a nice parallax section with image and content.', 'plato'),
        'panel' => 'plato_home_builder',
    )
);
$wp_customize->add_section(
    'homepage_team_section',
    array(
        'title' => __('Team Section', 'plato'),
        'description' => __('This is our team section.', 'plato'),
        'panel' => 'plato_home_builder',
    )
);
$wp_customize->add_section(
    'homepage_blog_section',
    array(
        'title' => __('Blog Section', 'plato'),
        'description' => __('This is our blog section. It shows the 3 latests posts.', 'plato'),
        'panel' => 'plato_home_builder',
    )
);
$wp_customize->add_section(
    'homepage_contact_section',
    array(
        'title' => __('Contact Section', 'plato'),
        'description' => __('This is our contact section. You can use it among with the Contact form 7 plugin.', 'plato'),
        'panel' => 'plato_home_builder',
    )
);

$wp_customize->add_setting(
    'plato_theme_header_above_title',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'plato_theme_header_above_title',
    array(
        'type' => 'text',
        'label' => __('The small text above the header title', 'plato'),
        'section' => 'homepage_settings_section',
        'settings' => 'plato_theme_header_above_title',

    ));

$wp_customize->add_setting(
    'plato_theme_header_title',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'plato_theme_header_title',
    array(
        'type' => 'text',
        'label' => __('The title of the header.', 'plato'),
        'section' => 'homepage_settings_section',
        'settings' => 'plato_theme_header_title',

    ));

$wp_customize->add_setting(
    'plato_theme_header_btn_text',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    'plato_theme_header_btn_text',
    array(
        'type' => 'text',
        'label' => __('The header button text.', 'plato'),
        'section' => 'homepage_settings_section',
        'settings' => 'plato_theme_header_btn_text',

    ));

$wp_customize->add_setting(
    'plato_theme_header_btn_url',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control(
    'plato_theme_header_btn_url',
    array(
        'type' => 'text',
        'label' => __('The header button url.', 'plato'),
        'section' => 'homepage_settings_section',
        'settings' => 'plato_theme_header_btn_url',

    ));


/*
* About Section
*/

$wp_customize->add_setting(
    'plato_theme_about_page',
    array(
        'default' => '',
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    'plato_theme_about_page',
    array(
        'type' => 'dropdown-pages',
        'label' => __('Select the about page.', 'plato'),
        'section' => 'homepage_about_section',
        'settings' => 'plato_theme_about_page',

    ));
/*
*
* Progress Bars
*
*/


/*
* Features Settings
*/
$wp_customize->add_setting(
    'plato_theme_features_title',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);
$wp_customize->add_control(
    'plato_theme_features_title',
    array(
        'type' => 'text',
        'label' => __('Features section main title', 'plato'),
        'section' => 'homepage_features_section',
        'settings' => 'plato_theme_features_title',

    ));

$wp_customize->add_setting(
    'plato_theme_features_subtitle',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'

    )
);
$wp_customize->add_control(
    'plato_theme_features_subtitle',
    array(
        'type' => 'text',
        'label' => __('Features section subtitle', 'plato'),
        'section' => 'homepage_features_section',
        'settings' => 'plato_theme_features_subtitle',

    ));


    $wp_customize->add_setting(
        'plato_theme_feature_1',
        array(
            'default' => '',
            'sanitize_callback' => 'absint',

        )
    );
    $wp_customize->add_control(
        'plato_theme_feature_1',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Select the first feature', 'plato'),
            'section' => 'homepage_features_section',
            'settings' => 'plato_theme_feature_1',

        ));

        $wp_customize->add_setting(
            'plato_theme_feature_2',
            array(
                'default' => '',
                'sanitize_callback' => 'absint',

            )
        );
        $wp_customize->add_control(
            'plato_theme_feature_2',
            array(
                'type' => 'dropdown-pages',
                'label' => __('Select the second feature', 'plato'),
                'section' => 'homepage_features_section',
                'settings' => 'plato_theme_feature_2',

            ));


            $wp_customize->add_setting(
                'plato_theme_feature_3',
                array(
                    'default' => '',
                    'sanitize_callback' => 'absint',

                )
            );
            $wp_customize->add_control(
                'plato_theme_feature_3',
                array(
                    'type' => 'dropdown-pages',
                    'label' => __('Select the third feature', 'plato'),
                    'section' => 'homepage_features_section',
                    'settings' => 'plato_theme_feature_3',

                ));


                $wp_customize->add_setting(
                    'plato_theme_feature_4',
                    array(
                        'default' => '',
                        'sanitize_callback' => 'absint',

                    )
                );
                $wp_customize->add_control(
                    'plato_theme_feature_4',
                    array(
                        'type' => 'dropdown-pages',
                        'label' => __('Select the fourth feature', 'plato'),
                        'section' => 'homepage_features_section',
                        'settings' => 'plato_theme_feature_4',

                    ));

/*
* Parallax
*/

$wp_customize->add_setting(
    'plato_theme_parallax_page',
    array(
        'default' => '',
        'sanitize_callback' => 'absint'

    )
);

$wp_customize->add_control(
    'plato_theme_parallax_page',
    array(
        'type' => 'dropdown-pages',
        'label' => __('Select the page for the parallax section', 'plato'),
        'section' => 'homepage_parallax_section',
        'settings' => 'plato_theme_parallax_page',

    ));


/*
* Our team section
*/



$wp_customize->add_setting(
    'plato_theme_team_subtitle',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'plato_theme_team_subtitle',
    array(
        'type' => 'text',
        'label' => __('The subtitle of this section', 'plato'),
        'section' => 'homepage_team_section',
        'settings' => 'plato_theme_team_subtitle',
    ));


    $wp_customize->add_setting(
        'plato_theme_staff_1',
        array(
            'default' => '',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        'plato_theme_staff_1',
        array(
            'type' => 'dropdown-pages',
            'label' => __('Select the first person of staff', 'plato'),
            'section' => 'homepage_team_section',
            'settings' => 'plato_theme_staff_1'
        ));


        $wp_customize->add_setting(
            'plato_theme_staff_2',
            array(
                'default' => '',
                'sanitize_callback' => 'absint',
            )
        );

        $wp_customize->add_control(
            'plato_theme_staff_2',
            array(
                'type' => 'dropdown-pages',
                'label' => __('Select the second person of staff', 'plato'),
                'section' => 'homepage_team_section',
                'settings' => 'plato_theme_staff_2'
            ));

            $wp_customize->add_setting(
                'plato_theme_staff_3',
                array(
                    'default' => '',
                    'sanitize_callback' => 'absint',
                )
            );

            $wp_customize->add_control(
                'plato_theme_staff_3',
                array(
                    'type' => 'dropdown-pages',
                    'label' => __('Select the third person of staff', 'plato'),
                    'section' => 'homepage_team_section',
                    'settings' => 'plato_theme_staff_3'
                ));
/*
* Blog Section
*/

$wp_customize->add_setting(
    'plato_blog_title',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'plato_blog_title',
    array(
        'type' => 'text',
        'label' => __('Blog section title.', 'plato'),
        'section' => 'homepage_blog_section',
        'settings' => 'plato_blog_title',
    ));

$wp_customize->add_setting(
    'plato_blog_subtitle',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'plato_blog_subtitle',
    array(
        'type' => 'text',
        'label' => __('Blog section subtitle.', 'plato'),
        'section' => 'homepage_blog_section',
        'settings' => 'plato_blog_subtitle',
    ));

/*
* Contact Settings
*/

/** Register Settings **/

$wp_customize->add_setting(
    'plato_contact_page',
    array(
        'default' => '',
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control(
    'plato_contact_page',
    array(
        'type' => 'dropdown-pages',
        'label' => __('Select the page for the contact section.', 'plato'),
        'section' => 'homepage_contact_section',
        'settings' => 'plato_contact_page',
    ));

/** GENERAL SECTION Options**/

$wp_customize->add_section(
    'general_settings_section',
    array(
        'title' => __('General Settings', 'plato'),
        'description' => __('General Settings for this theme.', 'plato'),
        'priority' => 10,
    )
);


/** Register Settings **/
$wp_customize->add_setting(
    'plato_theme_logo_upload',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_setting(
    'plato_theme_transparent_header',
    array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_setting(
    'plato_theme_sticky_menu',
    array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field'
    )
);


$wp_customize->add_control(
    'plato_theme_transparent_header',
    array(
        'type' => 'select',
        'label' => __('Enable transparent header. Front page', 'plato'),
        'section' => 'general_settings_section',
        'settings' => 'plato_theme_transparent_header',
        'choices' => array(
            '0' => __('No', 'plato'),
            '1' => __('Yes', 'plato'),
        )
    ));

/** Register Controls **/


$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'plato_theme_logo_upload',
        array(
            'label' => __('Upload a logo', 'plato'),
            'section' => 'general_settings_section',
            'settings' => 'plato_theme_logo_upload',
        )
    )
);

$wp_customize->add_control(
    'plato_theme_sticky_menu',
    array(
        'type' => 'select',
        'label' => __('Make navigation menu sticky', 'plato'),
        'section' => 'general_settings_section',
        'settings' => 'plato_theme_sticky_menu',
        'choices' => array(
            '0' => __('No', 'plato'),
            '1' => __('Yes', 'plato'),
        )
    ));
