<?php get_header() ?>

<section class="page-banner">
    <?php echo wp_get_attachment_image(107, 'full') ?>
    <div class="page-banner-text">
        <?php the_archive_title('<h1>', '</h1>'); ?>
        <?php if(get_the_archive_description()) :

			the_archive_description( '<div class="paragraph-first-line paragraph--white">', '</div>' );
        else :
            echo wp_get_attachment_image(58, 'full');
        endif;

        ?>

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
