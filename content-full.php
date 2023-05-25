<?php
/*
 * Boxed-12 content.
 * Fullwidth boxed content.
 */
?>
<div class="full-section-60">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Main Item Content -->
				<section>
					<?php if ( is_single() ): ?>
						<section id="page-meta">
							<?php

							$post_terms = wp_get_post_terms( get_the_ID(), 'category');
							$counter= 1;
							?>
							<span class="date-published"><span class="fa fa-calendar-check-o"></span> <?php echo get_the_date(get_option('date_format')); ?></span> |
<span class="post-categories">
    <?php foreach($post_terms as $term){ ?>
	    <a href="<?php echo get_term_link($term->term_id,'category'); ?>"><?php echo $term->name; ?></a>
	    <?php if($counter < sizeof($post_terms)): echo ', '; endif; ?>
	    <?php $counter++; } ?>
</span> |
							<span class="by-author"><span class="fa fa-user"></span> <?php echo __('By ','plato').' '.get_the_author_meta('display_name'); ?></span> |
							<span class="fa fa-comments"></span><span class"comments-number"> <a href="<?php the_permalink(); ?>#comments"><?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments
title',
									'plato'
								),
									number_format_i18n(get_comments_number()
									) );
								?></a></span>
							?>
						</section>
					<?php endif; ?>

					<?php if ( has_post_thumbnail() ): ?>
						<section id="page-featured-image">
							<?php
							/*
							* Featured image if any.
							*/
							if ( is_single() || is_page() ):
								if ( has_post_thumbnail() ):
									$attachment_id = get_post_thumbnail_id( get_the_ID() );
									$image_src     = wp_get_attachment_image_src( $attachment_id, $layout );

									echo '<img src="' . esc_url($image_src[0]) . '" alt="' . esc_url(__( 'featured image', 'plato' ) ). '" width="' . esc_attr($image_src[1]) . '" height="' . esc_attr($image_src[2]) . '" />';
								endif;
							elseif ( is_home() || is_category() || is_search() || is_archive() || is_tag() ):
								if ( has_post_thumbnail() ):
									$layout        = plato_get_layout();
									$attachment_id = get_post_thumbnail_id( get_the_ID() );
									$image_src     = wp_get_attachment_image_src( $attachment_id, 'boxed-9' );

									echo '<img src="' . esc_url($image_src[0]) . '" alt="' . esc_attr(__( 'featured image', 'plato' )) . '" width="' . esc_attr($image_src[1]) . '" height="' . esc_attr($image_src[2]) . '" />';
								endif;
							endif;
							?>

						</section>
					<?php endif; ?>

					<section id="main-entry-content">
						<?php the_content(); ?>
					</section>

					<section id="main-entry-link-pages">
						<?php wp_link_pages(); ?>
					</section>
				</section>

				<!-- Tags -->
				<?php if ( has_tag() ): ?>
					<section id="page-tags">
						<?php echo get_the_tag_list( ' ', ' ', ' ' ); ?>
					</section>
				<?php endif; ?>

				<section id="page-comments-area">
					<?php comments_template( '', true ); ?>
				</section>

			</div>
		</div>
	</div>

</div>

