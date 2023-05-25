<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Loader -->
<div id="site-loader"></div>
<!-- Load Header area partials -->

<?php
	if (plato_sticky_menu() == false):
?>

		<!-- Mobile Navigation -->
		<div id="mobile-header">
			<a id="responsive-menu-button" href="#plato-mobile-navigation"><i class="fa fa-bars"></i></a>
			<nav id="plato-mobile-navigation">
				<?php $plato_menu_args = array(
					'theme_location' => 'main',
					'container'      => false,
					'menu_id'        => false,
					'menu_class'     => 'responsive-menu',
					'echo'           => true
				);
				wp_nav_menu( $plato_menu_args ); ?>     </nav>
		</div>

<?php endif; ?>


<section id="plato-header" class="<?php echo plato_sticky_menu(); ?> full-section-20 <?php echo( plato_theme_transparent_header() ? ' trans-header' : '' ); ?>">
	<div class="container">

		<?php if (plato_sticky_menu() != false): ?>
		<div class="row">

			<div id="mobile-header">
				<a id="responsive-menu-button" href="#plato-mobile-navigation"><i class="fa fa-bars"></i></a>
				<nav id="plato-mobile-navigation">
					<?php $plato_menu_args = array(
						'theme_location' => 'main',
						'container'      => false,
						'menu_id'        => false,
						'menu_class'     => 'responsive-menu',
						'echo'           => true
					);
					wp_nav_menu( $plato_menu_args ); ?>     </nav>
			</div>

		</div>
	<?php endif; ?>
		<div class="row">
			<div class="col-lg-3">
				<!-- Logo -->
				<section id="plato-logo">
					<?php if(!empty(get_custom_logo())):

						the_custom_logo();
					else:
						$html = '';
						$site_name = get_bloginfo('name');
						$site_description = get_bloginfo('description');

						if (!empty($site_name)):
							$html .= '<h1><a href="' . esc_url(home_url('/')) . '">' . strip_tags($site_name) . '</a></h1>';
						endif;
						if (!empty($site_description)):
							$html .= '<h5>' . strip_tags($site_description) . '</h5>';
						endif;

						echo $html;
					endif;
					?>
				</section>
			</div>
			<div class="col-lg-9 clearfix">

				<!-- Main Navigation -->
				<nav id="plato-main-navigation">     <?php $plato_menu_args = array(
						'theme_location' => 'main',
						'container'      => false,
						'menu_id'        => false,
						'menu_class'     => 'responsive-menu',
						'echo'           => true
					);
					wp_nav_menu( $plato_menu_args ); ?>
				</nav>

			</div>
		</div>
	</div>
</section><!-- #plato-header -->


<!-- Load Header Image
- You can turn the header image on from the customizer settings.
- If the slider is enabled then the header is not visible.
- Header image should be of 1920x820px
-->
<?php if ( plato_get_header_image() != false && is_front_page() ): ?>
	<section id="plato-header-image">
		<?php echo plato_get_header_image(); ?>

		<?php
		$header_above_text = get_theme_mod( 'plato_theme_header_above_title', '' );
		$header_title      = get_theme_mod( 'plato_theme_header_title', '' );
		$header_btn_text   = get_theme_mod( 'plato_theme_header_btn_text', '' );
		$header_btn_url    = get_theme_mod( 'plato_theme_header_btn_url', '' );

		?>
		<div class="plato-header-content">
			<?php if ( $header_above_text != '' ): ?>

				<div class="plato-header-above-text">
					<?php echo sanitize_text_field( $header_above_text ); ?>
				</div>
				<hr class="divider"/>

			<?php endif; ?>

			<?php if ( $header_title != "" ): ?>
				<div class="plato-header-title">
					<?php echo sanitize_text_field( $header_title ); ?>
				</div>
			<?php endif; ?>


			<?php if ( $header_btn_text != '' && $header_btn_url != '' ): ?>

				<a class="plato-btn" href="<?php echo esc_url( $header_btn_url ); ?>">
					<?php echo sanitize_text_field( $header_btn_text ); ?>
				</a>

			<?php endif; ?>


		</div>

	</section>

<?php endif; ?>
