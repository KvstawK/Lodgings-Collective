<?php get_header() ?>

<section class="page-banner">
    <?php echo wp_get_attachment_image(107, 'full') ?>
    <div class="page-banner-text">
        <h1><?php
        printf(esc_html__('Search results for: %s', 'lodgings_collective_theme'), get_search_query())
        ?></h1>
        <?php echo wp_get_attachment_image(2209, 'full') ?>
    </div>
</section>

<div class="blog">
    <div class="container">
        <div class="blog__container">
            <main role="main" class="blog__container-posts">
                <?php
                if(have_posts()) : while(have_posts()) : the_post();

                        get_template_part('template-parts/page/content', get_post_format());

                endwhile;

                else :

                    get_template_part('template-parts/post/content', 'none');

                endif; wp_reset_postdata();

                the_posts_pagination();

                ?>
            </main>

            <aside role="complementary" class="blog__sidebar">
                <div class="blog__sidebar-container">
                    <div>
                        <?php dynamic_sidebar('primary-sidebar'); ?>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

<?php get_footer() ?>
