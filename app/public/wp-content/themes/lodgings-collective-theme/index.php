<?php get_header() ?>

<section class="page-banner">
    <?php echo wp_get_attachment_image(107, 'full') ?>
    <div class="page-banner-text">
        <h1><?php esc_html_e('Our Blog:', 'lodgings_collective_theme'); ?></h1>
        <h2><?php esc_html_e('Articles relative to the field we expertise', 'lodgings_collective_theme'); ?></h2>
    </div>
</section>

<div class="blog">
    <div class="container">
        <div class="blog__container">
            <main role="main" class="blog__container-posts">
                <?php

                get_template_part('loop');

				the_posts_pagination();
                ?>
            </main>

            <?php

            if(is_active_sidebar('primary-sidebar')) {
                get_sidebar();
            }

            ?>

        </div>
    </div>
</div>

<?php get_footer() ?>
