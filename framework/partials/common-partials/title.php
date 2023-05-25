<?php
/*
 * Title partial.
 */
$id = get_queried_object_id();
?>
<?php if (is_home() && $id != 0): ?>

    <h1 id="single-title"><?php echo get_the_title($id); ?></h1>

<?php elseif(is_home() && $id == 0): ?>

      <h1 id="single-title"><?php echo __('Our Blog','plato'); ?></h1>

<?php elseif(is_tax()) : $term = get_term_by('slug',get_query_var('term'),get_query_var('taxonomy')); ?>
    <h1 id="single-title"><?php echo $term->name; ?></h1>

<?php elseif (is_category()): ?>
    <h1 id="single-title"><?php echo __('Posts in category: ', 'plato'); ?><?php single_cat_title(); ?></h1>

<?php elseif (is_tag()): ?>
    <h1 id="single-title"><?php echo __('Posts tagged with: ', 'plato'); ?><?php single_tag_title(); ?></h1>

<?php elseif (is_search()): ?>
    <h1 id="single-title"><?php echo __('Search results for:  ', 'plato'). esc_html( get_search_query() ); ?></h1>

<?php elseif (is_archive()): ?>

        <?php if (is_year()):
            $archive = __('Archive for: ', 'plato') . get_the_time('Y');
        elseif (is_month()):
            $archive = __('Archive for ', 'plato') . get_the_time('F, Y');
        elseif (is_day()):
            $archive = __('Archive for ', 'plato') . get_the_time('F jS, Y');
        endif; ?>

        <h1 id="single-title"><?php echo ( isset( $archive ) ? $archive : '' ); ?></h1>
<?php else: ?>
        <h1 id="single-title"><?php the_title(); ?></h1>
<?php endif; ?>
