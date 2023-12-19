<article title="<?php the_title_attribute() ?>" class="rentals__items-container-rentals-item">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>
        <div class="rentals__items-container-rentals-item-image"></div>
        <div class="rentals__items-container-rentals-item-content">
            <?php
            if($post->comment_count != 0) :
                ?>
            <div class="rentals__items-container-rentals-item-content-review">
                <?php echo wp_get_attachment_image(1892, 'full') ?>
                <p class="paragraph paragraph--black"><?php echo lc_rentals_reviews_get_average_ratings($post->ID) ?></p>
            </div>
            <?php endif; ?>
            <div class="rentals__items-container-rentals-item-content-text">
                <div class="rentals__items-container-rentals-item-content-text-left">
                    <h3>"<?php the_title() ?>"</h3>
                    <div class="rentals__items-container-rentals-item-content-text-left-location">
                        <?php echo wp_get_attachment_image(72, 'full') ?>
                        <?php echo get_the_terms(get_the_ID(), 'rental-location')[1]->name; ?>,
                        <?php echo get_the_terms(get_the_ID(), 'rental-location')[0]->name;
                        echo isset(get_the_terms(get_the_ID(), 'rental-location')[2]) ? ',' : '' ?>
                        <?php echo isset(get_the_terms(get_the_ID(), 'rental-location')[2]) ? get_the_terms(get_the_ID(), 'rental-location')[2]->name : '' ?>
                    </div>
                    <div class="rentals__items-container-rentals-item-content-text-left-info">
                        <p><?php
                        $ctp_listing_cats = wp_get_post_terms($post->ID, 'rental-category', array('parent' => 0));
                        $parent = strip_tags(get_term_parents_list($ctp_listing_cats[0], 'rental-category'));
                        echo str_replace('/', '', $parent);
                        ?></p>
                        |<div title="<?php esc_attr_e('square meters', 'lodgings_collective_theme'); ?>"><?php echo wp_get_attachment_image(67, 'full') ?></div>
                        <p title="<?php esc_attr_e('square meters', 'lodgings_collective_theme'); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), 'meters', true)); ?></p>
                        |<div title="<?php esc_attr_e('Number of persons', 'lodgings_collective_theme'); ?>"><?php echo wp_get_attachment_image(38, 'full') ?></div>
                        <p title="<?php esc_attr_e('Number of persons', 'lodgings_collective_theme'); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), 'persons', true)); ?></p>
                        |<div title="<?php esc_attr_e('Number of bathrooms', 'lodgings_collective_theme'); ?>"><?php echo wp_get_attachment_image(46, 'full') ?></div>
                        <p title="<?php esc_attr_e('Number of bathrooms', 'lodgings_collective_theme'); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), 'bathrooms', true)); ?></p>
                    </div>
                </div>
                <div class="rentals__items-container-rentals-item-content-text-right">
                    <div class="rentals__items-container-rentals-item-content-text-right-content">
                        <p class="paragraph paragraph--black"><?php esc_html_e('From ', 'lodgings_collective_theme'); ?></p>
                        <p class="headline-3"><?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?>&euro; </p>
                        /<p class="paragraph paragraph--black"><?php esc_html_e('night', 'lodgings_collective_theme'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</article>

