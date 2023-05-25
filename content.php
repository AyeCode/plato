<?php
/*
 * Boxed-9 content.
 * Contains both main content and sidebar.
 */
?>
<div class="full-section-60">
	<div class="container white-bg">
		<div class="row">
			<?php if ( is_single() || is_page() ): ?>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<section class="blog-item-featured-image">
								<?php
								$attachment_id = get_post_thumbnail_id( get_the_ID() );
								$image_src     = wp_get_attachment_image_src( $attachment_id, 'plato-boxed-12' );
								if ( ! empty( $image_src ) && ! empty( $image_src[0] ) ) :
									echo '<img src="' . esc_url( $image_src[0] ) . '" alt="' . esc_attr(__( 'featured image', 'plato' )) . '" width="' . esc_attr( $image_src[1] ) . '" height="' . esc_attr( $image_src[2] ) . '" />';
								endif;
								?>
							</section>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-lg-8">

				<?php if ( is_home() || is_category() || is_tag() || is_search() || is_archive() ): // is the blog index? ?>
					<?php if ( have_posts() ): ?>

						<section id="plato-blog-container">
							<?php while ( have_posts() ):the_post(); ?>
								<article id="<?php the_ID(); ?>" class="blog-item">

									<?php if ( has_post_thumbnail() ): ?>

										<section class="blog-item-featured-image">

											<?php
											/*
											* Featured image if any.
											*/
											if ( is_single() || is_page() ):
												if ( has_post_thumbnail() ):

													$attachment_id = get_post_thumbnail_id( get_the_ID() );
													$image_src     = wp_get_attachment_image_src( $attachment_id, 'plato-boxed-12' );

													echo '<img src="' . esc_url( $image_src[0] ) . '" alt="' . esc_attr(__( 'featured image', 'plato' ) ). '" width="' . esc_attr( $image_src[1] ) . '" height="' . esc_attr( $image_src[2] ) . '" />';
												endif;
											elseif ( is_home() || is_category() || is_search() || is_archive() || is_tag() ):
												if ( has_post_thumbnail() ):

													$attachment_id = get_post_thumbnail_id( get_the_ID() );
													$image_src     = wp_get_attachment_image_src( $attachment_id, 'plato-boxed-9' );

													echo '<img src="' . esc_url( $image_src[0] ) . '" alt="' . esc_attr(__( 'featured image', 'plato' )) . '" width="' . esc_attr( $image_src[1] ) . '" height="' . esc_attr( $image_src[2] ) . '" />';
												endif;
											endif;
											?>

										</section>
									<?php endif; ?>
									<section class="blog-item-title">
										<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</section>
									<section class="blog-item-main-content">
										<?php the_excerpt(); ?>
									</section>

									<section class="blog-item-meta">
										<?php
										get_template_part( '/framework/partials/common-partials/meta' );
										?>
									</section>

									<a class="blog-item-read-more plato-btn" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
										<?php echo __( 'READ MORE', 'plato' ); ?>
									</a>
									<hr/>
								</article>
							<?php endwhile; ?>


							<section class="pagination">
								<?php the_posts_navigation(); ?>
							</section>


						</section>

					<?php else: ?>
						<p><?php echo __( 'There are not any posts available' ,'plato' ); ?></p>
					<?php endif; ?>

				<?php else: // is not blog page    ?>
				<!-- Main Item Content -->
				<section>
					<?php if ( is_single() ): ?>


						<section id="page-meta">
							<?php
							$post_terms = wp_get_post_terms( get_the_ID(), 'category' );
							$counter    = 1;
							?>
							<span class="date-published"><span class="fa fa-calendar-check-o"></span> <?php echo get_the_date( get_option( 'date_format' ) ); ?></span> |
							<span class="post-categories">
    <?php foreach ( $post_terms as $term ) { ?>
	    <a href="<?php echo get_term_link( $term->term_id, 'category' ); ?>"><?php echo $term->name; ?></a>
	    <?php if ( $counter < sizeof( $post_terms ) ): echo ', '; endif; ?>
	    <?php $counter ++;
    } ?>
</span> |
							<span class="by-author"><span class="fa fa-user"></span> <?php echo __( 'By ', 'plato' ) . ' ' . get_the_author_meta( 'display_name' ); ?></span> |
							<span class="fa fa-comments"></span><span class"comments-number"> <a
								href="<?php the_permalink(); ?>#comments"><?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments
title',
									'plato'
								),
									number_format_i18n( get_comments_number()
									) );
								?></a>
							</span>

						</section>

					<?php endif; ?>


					<section id="main-entry-content">
						<?php the_content(); ?>
					</section>
					<section id="main-entry-link-pages">
						<?php wp_link_pages(); ?>

					</section>

					<!-- Tags -->
					<?php if ( has_tag() ): ?>
						<section id="page-tags">
							<?php echo get_the_tag_list( ' ', ' ', ' ' ); ?>
						</section>
					<?php endif; ?>

					<?php if ( is_single() ): ?>
						<div class="post-navigation clearfix">
							<div class="previous-posts-link"><?php previous_post_link(); ?></div>
							<div class="next-posts-link"><?php next_post_link(); ?></div>
						</div>
					<?php endif; ?>


					<?php endif;  // is home(blog) or single page/post ?>

					<section id="page-comments-area">
						<?php comments_template( '', true ); ?>
					</section>


			</div>
			<div class="col-lg-4">

				<!-- Sidebar -->
				<aside>
					<?php get_sidebar(); ?>
				</aside>

			</div>
		</div>
	</div>

</div>
