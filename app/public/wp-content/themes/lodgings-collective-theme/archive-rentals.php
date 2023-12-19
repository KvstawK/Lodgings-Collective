<?php get_header() ?>

<section class="page-banner">
    <?php echo wp_get_attachment_image(109, 'full') ?>
    <div class="page-banner-text">
        <?php the_archive_title('<h1>', '</h1>'); ?>
        <?php the_archive_description('<h2>', '</h2>'); ?>
    </div>
</section>

<section class="rentals__single page-section">
    <div class="container">
        <?php
        if(have_posts()) : while(have_posts()) : the_post(); ?>

            <section class="rentals__items page-section">
                <div class="container">
                    <div class="rentals__items-container">
                        <article title="<?php the_title_attribute() ?>" class="rentals__items-container-item">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            <a href="<?php the_permalink(); ?>"><h3 class="rentals__items-container-item-title"><?php the_title() ?></h3></a>
                            <div class="rentals__items-container-item-excerpt"><?php the_excerpt(); ?></div>
                            <div class="rentals__items-container-item-info">
                                <span class="rentals__items-container-item-info-border"></span>
                                <div title="<?php esc_attr_e('Number Of Guests', 'lodgings_collective_theme'); ?>" class="rentals__items-container-item-info-item">
                <?php echo wp_get_attachment_image(38, 'full') ?>
                <?php echo esc_attr(get_post_meta(get_the_ID(), 'adults', true)); ?>
                                </div>
                                <div title="<?php esc_attr_e('Number Of Double Beds', 'lodgings_collective_theme'); ?>" class="rentals__items-container-item-info-item">
                <?php echo wp_get_attachment_image(57, 'full') ?>
                <?php echo esc_attr(get_post_meta(get_the_ID(), 'double', true)); ?>
                                </div>
<!--                                        <div title="--><?php //esc_html_e('Number Of Single Beds', 'lodgings_collective_theme'); ?><!--" class="rentals__item-info-item">-->
<!--                                            --><?php //echo wp_get_attachment_image(1902, 'full') ?>
<!--                                            <p>--><?php //echo esc_attr( get_post_meta( get_the_ID(), 'single', true ) ); ?><!--</p>-->
<!--                                        </div>-->
                                <div title="<?php esc_attr_e('Number Of Bathrooms', 'lodgings_collective_theme'); ?>" class="rentals__items-container-item-info-item">
                <?php echo wp_get_attachment_image(46, 'full') ?>
                                    <p><?php echo esc_html(get_post_meta(get_the_ID(), 'bathrooms', true)); ?>
                                </div>
                                <div title="<?php esc_attr_e("Rental's Square Meters", 'lodgings_collective_theme'); ?>" class="rentals__items-container-item-info-item">
                <?php echo wp_get_attachment_image(67, 'full') ?>
                                    <p><?php echo esc_html(get_post_meta(get_the_ID(), 'meters', true)); ?>
                                </div>
                                <span class="rentals__items-container-item-info-border rentals__items-container-item-info-border--bottom"></span>
                            </div>
                            <div class="rentals__items-container-item-info-amenities">
                                <h3><?php esc_html_e('Amenities: ', 'lodgings_collective_theme'); ?></h3>
                                <p><?php echo esc_html(get_post_meta(get_the_ID(), 'amenities', true)); ?></p>
                            </div>
                        </article>

                    </div>
                </div>
            </section>

        <?php endwhile;

        else :

            get_template_part('template-parts/post/content', 'none');

        endif; wp_reset_postdata();

        the_posts_pagination();

        ?>
    </div>
</section>

<?php get_footer() ?>

