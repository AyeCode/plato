<?php
/*
 * Category page
 */
get_header(); ?>

    <!-- This section contains the full item content+ sidebars -->
    <article id="full-container-<?php echo get_the_title(get_queried_object_id()); ?>">

        <!-- Title -->
        <section id="single-title-container">

            <?php get_template_part('/framework/partials/common-partials/title'); ?>

        </section>

        <!-- Breadcrumb -->
        <section id="single-breadcrumb-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <?php echo plato_breadcrumb(); ?>

                    </div>
                </div>
            </div>
        </section>

        <!-- Content , for blog is always boxed-9 -->
        <?php
            get_template_part('content');
        ?>
    </article>
    <!-- Full section ends here -->

<?php get_footer(); ?>