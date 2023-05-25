<?php
/*
 * 1. Constants to help us throughout the theme.
 */
DEFINE( 'PLATO_CSS_PATH', get_template_directory_uri() . '/assets/css/' );
DEFINE( 'PLATO_JS_PATH', get_template_directory_uri() . '/assets/js/' );
DEFINE( 'PLATO_IMAGES_PATH', get_template_directory_uri() . '/assets/images/' );
DEFINE( 'PLATO_FONTS_PATH', get_template_directory_uri() . '/assets/fonts/' );
DEFINE( 'PLATO_STYLESHEET_PATH', get_stylesheet_uri() );
DEFINE( 'PLATO_FRAMEWORK_PATH', get_template_directory_uri() . '/framework/' );
DEFINE( 'PLATO_FRAMEWORK_REQUIRED_PATH', get_template_directory() . '/framework/' );

/*
 * 2. After setup theme
 */
add_action( 'after_setup_theme', 'plato_setup' );
if ( ! function_exists( 'plato_setup' ) ):
	function plato_setup() {

		if ( ! isset( $content_width ) ) {
			$content_width = 750;
		}

		add_theme_support( 'automatic-feed-links' );
		load_theme_textdomain( 'plato', get_template_directory() . '/languages' );
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );

		global $wp_version;
		if ( version_compare( $wp_version, '4.1', '>=' ) ):
			add_theme_support( 'title-tag' );
		endif;

		register_nav_menus( array(
			'main'   => __( 'Main Navigation', 'plato' ),
		) );

        add_editor_style('style.css');

		$plato_bg_defaults = array(
			'default-color'    => 'ffffff',
			'default-image'    => '',
			'wp-head-callback' => 'plato_bg_callback',
		);
		add_theme_support( 'custom-background', $plato_bg_defaults );

		$plato_header_defaults = array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => '1920',
			'height'                 => '820',
			'flex-height'            => false,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => false,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);

		add_theme_support( 'custom-header', $plato_header_defaults );

		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 280,
			'flex-width' => true,
		) );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'plato-slider-image', 1920, 850, true ); // slider image size.
		add_image_size( 'plato-smaller-slider-image', 1300, 650, true ); // slider image size.
		add_image_size( 'plato-boxed-9', 847, 385, true ); // slider image size.
		add_image_size( 'plato-boxed-12', 1170, 550, true ); // Single post type image (boxed 3/4 layout)
		add_image_size( 'plato-fullwidth', 1920, 700, true ); // Single post type image (fulwidth)
		add_image_size( 'plato-blog-section-image', 380, 380, true );

	}
endif;

/*
 * 3. Fallback Functions
 */
if ( ! function_exists( 'plato_bg_callback' ) ):

	function plato_bg_callback() {
		$background = set_url_scheme( get_background_image() );
		$color      = get_theme_mod( 'background_color', get_theme_support( 'custom-background', 'default-color' ) );

		if ( ! $background && ! $color ) {
			return;
		}

		$style = $color ? "background-color: #$color;" : '';

		if ( $background ) {
			$image = " background-image: url('$background');";

			$repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
			if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) ) {
				$repeat = 'repeat';
			}
			$repeat = " background-repeat: $repeat;";

			$position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
			if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) ) {
				$position = 'left';
			}
			$position = " background-position: top $position;";

			$attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
			if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) ) {
				$attachment = 'scroll';
			}
			$attachment = " background-attachment: $attachment;";

			$style .= $image . $repeat . $position . $attachment;
		}
		?>
		<style type="text/css" id="custom-background-css">
			body.custom-background {
			<?php echo trim( $style ); ?>
			}
		</style>
		<?php
	}
endif;

/*
 * 4. Enqueue styles + scripts.
 */
add_action( 'wp_enqueue_scripts', 'plato_styles' );
if ( ! function_exists( 'plato_styles' ) ):
	function plato_styles() {

		wp_enqueue_style( 'plato-oxygen-font', PLATO_FONTS_PATH . 'Oxygen/stylesheet.css', '', '', 'all' );
		wp_enqueue_style( 'plato-source-sans-font', PLATO_FONTS_PATH . 'SourceSansPro/stylesheet.css', '', '', 'all' );

		wp_enqueue_style( 'bootstrap', PLATO_CSS_PATH . 'bootstrap.min.css', '', '', 'all' );
		wp_enqueue_style( 'bootstrap-thems', PLATO_CSS_PATH . 'bootstrap-theme.min.css', '', '', 'all' );
		wp_enqueue_style( 'font-awesome', PLATO_CSS_PATH . 'font-awesome.min.css', '', '', 'all' );
		wp_enqueue_style( 'animate', PLATO_CSS_PATH . 'animate.min.css', '', '', 'all' );
		wp_enqueue_style( 'navigation-menu', PLATO_CSS_PATH . 'navigation-menu.css', '', '', 'all' );
		wp_enqueue_style( 'sidr', PLATO_CSS_PATH . 'jquery.sidr.dark.css', '', '', 'all' );
		wp_enqueue_style( 'wp-default', PLATO_CSS_PATH . 'wordpress-default-min.css', '', '', 'all' );
		wp_enqueue_style( 'responsive-grid', PLATO_CSS_PATH . 'responsive-grid.css', '', '', 'all' );
		wp_enqueue_style( 'responsive', PLATO_CSS_PATH . 'responsive.css', '', '', 'all' );

		wp_enqueue_style( 'plato-main-stylesheets', PLATO_STYLESHEET_PATH );
	}
endif;

add_action( 'wp_enqueue_scripts', 'plato_scripts' );
if ( ! function_exists( 'plato_scripts' ) ):
	function plato_scripts() {
		if ( is_singular() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'bootstrap', PLATO_JS_PATH . 'bootstrap.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'sidr', PLATO_JS_PATH . 'jquery.sidr.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'sticky', PLATO_JS_PATH . 'jquery.sticky.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'matchHeight', PLATO_JS_PATH . 'jquery.matchHeight-min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'html5shiv', PLATO_JS_PATH . 'html5shiv.min.js', array('jquery'), '',true );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

		wp_enqueue_script( 'stellar', PLATO_JS_PATH . 'jquery.stellar.min.js', array( 'jquery' ), '', true );

		wp_enqueue_script( 'plato-customizer-js-2', PLATO_FRAMEWORK_PATH . 'libraries/plato-customizer/js/customizer.js', array( 'jquery' ), '', true );


		wp_enqueue_script( 'plato-main-js', PLATO_JS_PATH . 'main-js.js', array( 'jquery' ), '', true );
	}
endif;

function plato_customizer_preview() {
	wp_enqueue_script( 'plato-customizer-js', get_template_directory_uri() . '/assets/js/customizer.js', array( 'jquery', 'customize-preview' ), '', true );
}

add_action( 'customize_preview_init', 'plato_customizer_preview' );
/*
 * 5. Comments
 */
if ( ! function_exists( 'plato_comment' ) ):
	function plato_comment(
		$comment,
		$args,
		$depth
	) {
		$GLOBALS['comment'] = $comment;
		extract( $args, EXTR_SKIP );

		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo $tag ?><?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="row">

			<div class="col-md-2">


				<div class="comment-author vcard">
					<?php
					if ( $args['avatar_size'] != 0 ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					} ?>

				</div>

			</div>

			<div class="col-md-10">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'plato' ); ?></em>
					<br/>
				<?php endif; ?>

				<?php printf( __( '<cite class="fn">%s</cite>', 'plato' ), get_comment_author_link() ); ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
						printf( __( '%1$s at %2$s', 'plato' ), get_comment_date(), get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'plato' ), '  ', '' );
					?>
				</div>
				<hr class="comment-name-hr">

				<div class="plato_comment_body">
					<?php comment_text(); ?>
				</div>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
			</div>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
			</div>
		<?php endif; ?>
		<?php
	}
endif;
/*
 * 6. Widgets Initialization
 */
/**== Add some sidebars ==**/
add_action( 'widgets_init', 'plato_sidebars' );
function plato_sidebars() {

	/**== Right sidebar ==**/
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'plato' ),
		'id'            => 'sidebar',
		'description'   => __( 'This is the main sidebar.It is in every page - post. However you can override this setting from within each post.',
			'plato' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	/**== Footer Sidebar 1 ==**/
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 1', 'plato' ),
		'id'            => 'plato-footer-1',
		'description'   => __( 'This is the sidebar in the footer, on the left', 'plato' ),
		'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
	/**== Footer Sidebar 1 ==**/
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 2', 'plato' ),
		'id'            => 'plato-footer-2',
		'description'   => __( 'This is the sidebar in the footer, the second on the left', 'plato' ),
		'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
	/**== Footer Sidebar 1 ==**/
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 3', 'plato' ),
		'id'            => 'plato-footer-3',
		'description'   => __( 'This is the sidebar in the footer, the second on the right', 'plato' ),
		'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
	/**== Footer Sidebar 1 ==**/
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 4', 'plato' ),
		'id'            => 'plato-footer-4',
		'description'   => __( 'This is the sidebar in the footer, on the right', 'plato' ),
		'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );
}
/*
 * Required Files + Plato theme bootstrapped
 */

require_once( PLATO_FRAMEWORK_REQUIRED_PATH . 'libraries/TGM-Class/class-tgm-plugin-activation.php' );
function plato_theme_customizer_init( $wp_customize ) {
	require_once( PLATO_FRAMEWORK_REQUIRED_PATH . 'customizer/customizer-init.php' );
}

add_action( 'customize_register', 'plato_theme_customizer_init' );
add_action( 'tgmpa_register', 'plato_register_required_plugins' );
function plato_register_required_plugins() {

	$plugins = array(
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false
		),

	);
	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'plato',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		'strings' => array(
			'page_title'                      => __( 'Install Required Plugins', 'plato' ),
			'menu_title'                      => __( 'Install Plugins', 'plato' ),
			'installing'                      => __( 'Installing Plugin: %s', 'plato' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'plato' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'plato'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'plato'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'plato'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'plato'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'plato'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'plato'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'plato'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'plato'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'plato'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'plato'
			),
			'update_link'                     => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'plato'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'plato'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'plato' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'plato' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'plato' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'plato' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'plato' ),  // %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'plato' ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'plato' ),
			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),

	);
	tgmpa( $plugins, $config );
}

/*
* Enable transparent header class
*/

if ( ! function_exists( 'plato_theme_transparent_header' ) ):

	function plato_theme_transparent_header() {
		$trans = get_theme_mod( 'plato_theme_transparent_header', '0' );

		if ( $trans == '1' && is_front_page() && get_header_image() != '') {
			return true;
		} else {
			return false;
		}
	}

endif;
/*
 * 1. Function that gets the social networks and create the social list in the top bar.
 */
if ( ! function_exists( 'plato_social_list' ) ):
	function plato_social_list() {
		//Social Networks array
		$socials_array = array(
			'facebook',
			'twitter',
			'google-plus',
			'instagram',
			'pinterest',
			'linkedin',
			'flickr',
			'skype',
			'vimeo',
			'youtube'
		);
		$html          = '';

		foreach ( $socials_array as $sa ):
			if ( get_theme_mod( $sa . '-url', '' ) != '' ):
				$html .= '<li><a id = "social-' . $sa . '" href="' . esc_url( get_theme_mod( $sa . '-url', '' ) ) . '"><i class="fa fa-' . $sa . '"></i></a></li>'; endif;
		endforeach;

		return $html;
	}
endif;

/*
 * 3. Function that return the header image if any
 */
if ( ! function_exists( 'plato_get_header_image' ) ):
	function plato_get_header_image() {
		$html = '';
		if ( get_header_image() != '' ):
			$html .= '<img class="img-responsive" src="' . get_header_image() . '" height="' . get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt=""/>';
		else:
			return false;
		endif;

		return $html;
	}

	;
endif;

/*
 * 3.1 - Function that returns the prefix for use into other functions
 */
if ( ! function_exists( 'plato_get_prefix' ) ):
	function plato_get_prefix() {
		$prefix = '';

		if ( is_home() ):
			$prefix = 'page';
		elseif ( is_page() ):
			$prefix = 'page';
		elseif ( is_single() ):
			$prefix = 'page';
		endif;

		return $prefix;
	}
endif;

/*
 * 3.2 - Function that returns if the menu is sticky
 */
if ( ! function_exists( 'plato_sticky_menu' ) ):
	function plato_sticky_menu() {
		$is_sticky = get_theme_mod( 'plato_theme_sticky_menu', '0' );

		if ( $is_sticky == '1' ):
			return ' sticky-header';
		else:
			return false;
		endif;
	}
endif;

/*
 * 4. Function that returns if the layout is boxed or fullwidth
 */

if ( ! function_exists( 'plato_get_layout' ) ):
	function plato_get_layout() {

		$prefix      = plato_get_prefix();
		$item_layout = get_post_meta( get_the_ID(), '_plato_' . $prefix . '_layout_type', true );

		return $item_layout;
	}
endif;

/*
 * 5. Function that returns the breadcrumb
 */
if ( ! function_exists( 'plato_breadcrumb' ) ):
	function plato_breadcrumb() {

		$bc_html            = '';
		$base_link          = esc_url( home_url( '/' ) );
		$current_link       = esc_url(get_permalink( get_queried_object_id() ));
		$current_link_title = get_the_title( get_queried_object_id() );
		$current_text       = '';

		if ( is_tax() ):
			$term         = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$current_text = $term->name;
		elseif ( is_category() ):
			$current_text = single_cat_title( "", false );

		elseif ( is_tag() ):
			$current_text = single_tag_title( '', false );

		elseif ( is_search() ) :
			$current_text = esc_attr(__( 'Search Results', 'plato' ));
		elseif ( is_archive() ):
			if ( is_year() ):
				$current_text = esc_attr(__( 'Archive for: ', 'plato' ) . get_the_time( 'Y' ));
			elseif ( is_month() ):
				$current_text = esc_attr(__( 'Archive for ', 'plato' ) . get_the_time( 'F, Y' ));
			elseif ( is_day() ):
				$current_text = esc_attr(__( 'Archive for ', 'plato' ) . get_the_time( 'F jS, Y' ));
			endif;

		endif;

		$bc_html .= '<ul id="single-breadcrumb">';

		$bc_html .= '<li><a href ="' . esc_url($base_link) . '" title="' . esc_attr(__( 'Go to the homepage', 'plato' )) . '">' . esc_attr(__( 'Home', 'plato' )) . '</a> <i class="fa fa-angle-double-right"></i></li>  ';

		if ( is_category() || is_tag() || is_archive() || is_search() ):
			$bc_html .= '<li id="current-breadcrumb-item">' . $current_text . '</li>';
		else:
			$bc_html .= '<li id="current-breadcrumb-item"><a href="' . $current_link . '">' . $current_link_title . '</a></li>';
		endif;
		$bc_html .= '</ul>';

		return $bc_html;

	}
endif;

/*
 * 6. Function to show the breadcrumb
 */
if ( ! function_exists( 'plato_show_breadcrumb' ) ) :
	function plato_show_breadcrumb() {

		$prefix          = plato_get_prefix();
		$show_breadcrumb = get_post_meta( get_the_ID(), '_plato_' . $prefix . '_show_breadcrumb', true );

		return $show_breadcrumb;
	}
endif;

/*
 * 7. Function to get the page's/post's etc sidebar
 */
if ( ! function_exists( 'plato_get_sidebar' ) ):
	function plato_get_sidebar() {

		$sidebar = get_post_meta( get_the_ID(), '_plato_page_sidebar', true );

		return $sidebar;
	}
endif;

/*
 * 7.1 Function to return specific sidebars for category, tag, search, archive pages.
 */
if ( ! function_exists( 'plato_get_specific_sidebar' ) ):
	function plato_get_specific_sidebar() {
		$sidebar = 'sidebar';

		if ( is_category() ):
			$sidebar = 'category-sidebar';
		elseif ( is_tag() ):
			$sidebar = 'tag-sidebar';
		elseif ( is_archive() ):
			$sidebar = 'archive-sidebar';
		elseif ( is_search() ):
			$sidebar = 'search-sidebar';
		elseif ( is_home() ):
			$sidebar = 'blog-sidebar';
		endif;

		return $sidebar;
	}
endif;
/*
 * 16. Function that returns the pagination
 */
add_filter( 'next_posts_link_attributes', 'plato_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'plato_prev_posts_link_attributes' );

function plato_posts_link_attributes() {
	return 'class="next"';
}

function plato_prev_posts_link_attributes() {
	return 'class="prev"';
}

if ( ! function_exists( 'plato_pagination' ) ):

	function plato_pagination() {

		if ( is_singular() ) {
			return;
		}

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if ( $wp_query->max_num_pages <= 1 ) {
			return false;
		}

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );

		/**    Add current page to the array */
		if ( $paged >= 1 ) {
			$links[] = $paged;
		}

		/**    Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		/**    Previous Post Link */
		if ( get_previous_posts_link() ) {
			printf( '<span>%s</span>' . "\n", get_previous_posts_link() );
		}

		/**    Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="current page-numbers"' : '';

			printf( '<span%s><a href="%s">%s</a></span>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( ! in_array( 2, $links ) ) {
				echo '<span>…</span>';
			}
		}

		/**    Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="current page-numbers"' : '';
			printf( '<span%s><a href="%s">%s</a></span>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		/**    Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) ) {
				echo '<span>…</span>' . "\n";
			}

			$class = $paged == $max ? ' class="current page-numbers"' : '';
			printf( '<span%s><a href="%s">%s</a></span>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		/**    Next Post Link */
		if ( get_next_posts_link() ) {
			printf( '<span>%s</span>' . "\n", get_next_posts_link() );
		}

	}

endif;
/*
 * Function that returns the footer sidebars
 */
if ( ! function_exists( 'plato_active_footer' ) ):
	function plato_active_footer() {

		$active_footer_sidebars = 0;
		$active_sidebars        = array();

		for ( $i = 1; $i < 5; $i ++ ) {
			if ( is_active_sidebar( 'plato-footer-' . $i ) ):
				$active_footer_sidebars ++;
			endif;
		}

		if ( $active_footer_sidebars == 0 ):
			return false;

		elseif ( $active_footer_sidebars == 1 ):

			$active_sidebars['class']          = 'col-md-12';
			$active_sidebars['sidebars_count'] = 1;

			return $active_sidebars;

		elseif ( $active_footer_sidebars == 2 ):

			$active_sidebars['class']          = 'col-md-6';
			$active_sidebars['sidebars_count'] = 2;

			return $active_sidebars;

		elseif ( $active_footer_sidebars == 3 ):

			$active_sidebars['class']          = 'col-md-4';
			$active_sidebars['sidebars_count'] = 3;

			return $active_sidebars;

		elseif ( $active_footer_sidebars == 4 ):

			$active_sidebars['class']          = 'col-md-3';
			$active_sidebars['sidebars_count'] = 4;

			return $active_sidebars;

		endif;
	}
endif;
