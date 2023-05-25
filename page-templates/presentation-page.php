<?php
/*
* Template Name: Presentation - FrontPage
*/
get_header();

$about_page = absint(get_theme_mod('plato_theme_about_page',''));
?>
	<!-- ABOUT SECTION FRONTPAGE ---->
	<?php if($about_page != ''):
			$about = get_post($about_page);
	?>
		<div class="full-section-60" id="about">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">

							<h2 class="section-title">
								<?php echo $about->post_title; ?>
							</h2>

					</div>
					<!-- col-md-12 -->
				  </div>       <!--.row -->
				<div class="row">
					<div class="col-md-12">

							<div class="about-text">
								<?php echo $about->post_content; ?>
							</div>

						 </div>

				</div> <!--.row -->
			</div>     <!-- .container -->
		</div>
	<?php endif; ?>
	<!-- .full-section-60-->

	<!-- END ABOUT SECTION FRONTPAGE ---->


	<!-- FEATURES SECTION ---->

<?php $title = get_theme_mod( 'plato_theme_features_title', '' );
$subtitle    = get_theme_mod( 'plato_theme_features_subtitle', '' ); ?>
	<div class="full-section-60" id="features">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<?php if ( $title != '' ): ?>
						<h2 class="features-title">
							<?php echo sanitize_text_field( $title ); ?>
						</h2>             <?php endif; ?>
					<?php if ( $subtitle != '' ): ?>
						<h3 class="features-subtitle">
							<?php echo sanitize_text_field( $subtitle ); ?>
						</h3>              <?php endif; ?>
				</div>
				<!-- col-md-12 -->
			</div>
			<!-- Row of 4 services -->
			<div class="row">
				<?php
					$feature_1 = absint(get_theme_mod('plato_theme_feature_1',''));
				?>

				<?php if($feature_1 != ''):

					$f1 = get_post($feature_1);

					?>

				<div class="col-md-3 plato-circle-icon-block-container">

						<span class="circle-icon fa fa-check"></span>


						<h4	class="circle-icon-title"><?php echo $f1->post_title; ?></h4>


						 <p
						class="circle-icon-paragraph">
						<?php echo $f1->post_content; ?>
						</p>


				<a	target="_blank" class="circle-icon-link" href="<?php echo esc_url(get_permalink($f1)); ?>"></a>

				</div>

				<?php endif; ?>


				<?php
					$feature_2 = absint(get_theme_mod('plato_theme_feature_2',''));
				?>

				<?php if($feature_2 != ''):

					$f2 = get_post($feature_2);

					?>

				<div class="col-md-3 plato-circle-icon-block-container">

						<span class="circle-icon fa fa-check"></span>


						<h4	class="circle-icon-title"><?php echo $f2->post_title; ?></h4>


						 <p
						class="circle-icon-paragraph">
						<?php echo $f2->post_content; ?>
						</p>


				<a	target="_blank" class="circle-icon-link" href="<?php echo esc_url(get_permalink($f2)); ?>"></a>

				</div>

				<?php endif; ?>


				<?php
					$feature_3 = absint(get_theme_mod('plato_theme_feature_3',''));
				?>

				<?php if($feature_3 != ''):

					$f3 = get_post($feature_3);

					?>

				<div class="col-md-3 plato-circle-icon-block-container">

						<span class="circle-icon fa fa-check"></span>


						<h4	class="circle-icon-title"><?php echo $f3->post_title; ?></h4>


						 <p
						class="circle-icon-paragraph">
						<?php echo $f3->post_content; ?>
						</p>


				<a	target="_blank" class="circle-icon-link" href="<?php echo esc_url(get_permalink($f3)); ?>"></a>

				</div>

				<?php endif; ?>


				<?php
					$feature_4 = absint(get_theme_mod('plato_theme_feature_4',''));
				?>

				<?php if($feature_4 != ''):

					$f4 = get_post($feature_4);

					?>

				<div class="col-md-3 plato-circle-icon-block-container">

						<span class="circle-icon fa fa-check"></span>


						<h4	class="circle-icon-title"><?php echo $f4->post_title; ?></h4>


						 <p
						class="circle-icon-paragraph">
						<?php echo $f4->post_content; ?>
						</p>


				<a	target="_blank" class="circle-icon-link" href="<?php echo esc_url(get_permalink($f4)); ?>"></a>

				</div>

				<?php endif; ?>

			</div>

			<!-- Row of 4 services -->
		</div>
	</div>

	<!-- END FEATURES SECTION ---->


	<!-- PARALLAX SECTION ---->
<?php
$parallax_page =  absint(get_theme_mod('plato_theme_parallax_page',''));


if ( $parallax_page != '' ):
	$parallax = get_post($parallax_page);

	$thumb_id = get_post_thumbnail_id( $parallax_page );
		$thumb_src = wp_get_attachment_image_src( $thumb_id, 'full' );
?>
	<div class="full-section-60" id="parallax" data-stellar-background-ratio="0.4" style="background:url('<?php echo esc_url( $thumb_src[0] ); ?>')">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

						<h4 class="parallax-title">
							<?php echo $parallax->post_title; ?>
						</h4>



						<p class="parallax-text">
							<?php echo $parallax->post_content; ?>
						</p>

				</div>
			</div>
		</div>
	</div><!-- #parallax ends here -->
<?php endif; ?>
	<!-- END PARALLAX SECTION ---->


	<!-- OUR TEAM SECTION ---->

<?php
$title    = get_theme_mod( 'plato_theme_team_title', '' );
$subtitle = get_theme_mod( 'plato_theme_team_subtitle', '' );
?>

	<div class="full-section-60" id="our-team">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<?php if ( $title != '' ): ?>
						<h2 class="section-title">
							<?php echo sanitize_text_field( $title ); ?>
						</h2>
					<?php endif; ?>

					<?php if ( $subtitle != '' ): ?>
						<h3 class="section-subtitle">
							<?php echo sanitize_text_field( $subtitle ); ?>
						</h3>
					<?php endif; ?>

				</div><!-- col-md-12 -->
			</div> <!-- .row -->

			<!-- Team members start here -->
			<div class="row">
				<?php
				$plato_staff_1 = absint(get_theme_mod('plato_theme_staff_1',''));

				?>
				<?php if($plato_staff_1 != ''):
					$staff_1 = get_post($plato_staff_1);
					$thumb_id = get_post_thumbnail_id( $plato_staff_1 );
					$thumb_src = wp_get_attachment_image_src( $thumb_id, 'full' );
				 ?>

				<div class="col-md-4 plato-single-staff-member">

					<div class="plato-single-staff-image-container">

						<img src="<?php echo esc_url( $thumb_src[0] ); ?>" class="img-responsive" alt="Staff Image"/>


						<h2 class="plato-single-staff-title"><?php echo $staff_1->post_title; ?></h2>




						<p class="plato-single-staff-content">
							<?php echo $staff_1->post_content; ?>
						</p>

					</div><!-- single team member end here -->
				</div>
				<?php endif; ?>


				<?php
				$plato_staff_2 = absint(get_theme_mod('plato_theme_staff_2',''));

				?>
				<?php if($plato_staff_2 != ''):
					$staff_2 = get_post($plato_staff_2);
					$thumb_id = get_post_thumbnail_id( $plato_staff_2 );
					$thumb_src = wp_get_attachment_image_src( $thumb_id, 'full' );
				 ?>

				<div class="col-md-4 plato-single-staff-member">

					<div class="plato-single-staff-image-container">

						<img src="<?php echo esc_url( $thumb_src[0] ); ?>" class="img-responsive" alt="Staff Image"/>


						<h2 class="plato-single-staff-title"><?php echo $staff_2->post_title; ?></h2>

						<p class="plato-single-staff-content">
							<?php echo $staff_2->post_content; ?>
						</p>

					</div><!-- single team member end here -->
				</div>
				<?php endif; ?>

				<?php
				$plato_staff_3 = absint(get_theme_mod('plato_theme_staff_3',''));

				?>
				<?php if($plato_staff_3 != ''):
					$staff_3 = get_post($plato_staff_1);
					$thumb_id = get_post_thumbnail_id( $plato_staff_3 );
					$thumb_src = wp_get_attachment_image_src( $thumb_id, 'full' );
				 ?>

				<div class="col-md-4 plato-single-staff-member">

					<div class="plato-single-staff-image-container">

						<img src="<?php echo esc_url( $thumb_src[0] ); ?>" class="img-responsive" alt="Staff Image"/>


						<h2 class="plato-single-staff-title"><?php echo $staff_3->post_title; ?></h2>

						<p class="plato-single-staff-content">
							<?php echo $staff_3->post_content; ?>
						</p>

					</div><!-- single team member end here -->
				</div>
				<?php endif; ?>

			</div>

		</div>
	</div>
	<!-- END OUR TEAM SECTION ---->

	<!-- BLOG SECTION ---->
<?php
$title = get_theme_mod('plato_blog_title','');
$subtitle = get_theme_mod('plato_blog_subtitle','');

$args = array('post_type'=>'post','posts_per_page'=>3);

$post_q = new WP_Query($args);
?>

	<div class="full-section-60" id="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<?php if($title != ''): ?>
						<h2 class="section-title">
							<?php echo sanitize_text_field($title); ?>
						</h2>
					<?php endif; ?>

					<?php if($subtitle != ''): ?>
						<h3 class="section-subtitle">
							<?php echo sanitize_text_field($subtitle); ?>
						</h3>
					<?php endif; ?>

				</div><!-- col-md-12 -->
			</div>

			<div class="row">

				<div class="blog-section-container">
					<?php if($post_q->have_posts()):

						while($post_q->have_posts()):$post_q->the_post(); ?>

							<?php
								$thumb_id = get_post_thumbnail_id(get_the_ID());
								$thumb_src = wp_get_attachment_image_src($thumb_id,'blog-section-image');

								if($thumb_src[0] != ''):
							?>

							<div class="col-md-4">

								<div class="plato-blog-section-item">


									<img src="<?php echo esc_url($thumb_src[0]); ?>" class="img-responsive"/>

									<h3 class="plato-blog-section-item-title">
										<a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
									</h3>
									<?php $content = get_the_content(); ?>

									<p class="plato-blog-section-item-excerpt">
										<?php echo wp_trim_words($content,12,'...'); ?>
									</p>

									<a href="<?php the_permalink(); ?>"><?php echo __('Read More','plato'); ?></a>

									<div class="plato-blog-section-item-meta">

										<span class="fa fa-calendar"></span> <?php echo get_the_time(get_option('date_format')); ?>
										<span class="fa fa-comments"></span><?php echo get_comments_number() ;?>
									</div>

								</div>

							</div>
						<?php endif;  // if a post does not have a featured image , does not appear here ?>
						<?php endwhile; ?>

					<?php endif; wp_reset_postdata(); ?>
				</div>

			</div>
		</div>
	</div>
	<!-- END BLOG SECTION ---->


	<!-- CONTACT SECTION ---->
<?php
	$contact_page = absint(get_theme_mod('plato_contact_page',''));
?>
 <?php if($contact_page != ''):
	 $contact = get_post($contact_page);
	 ?>
	<div class="full-section-60" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">

						<h2 class="section-title">
							<?php echo $contact->post_title; ?>
						</h2>


				</div><!-- col-md-12 -->

			</div>

				<div class="row">
					<div class="col-md-12">
						<div class="plato-contact-section-form-container">
							<?php echo do_shortcode($contact->post_content); ?>
						</div>
					</div>
				</div>
			<?php endif;  ?>
		</div>
	</div>
	<!-- END CONTACT SECTION ---->
<?php
get_footer();
