<?php get_header() ?>

<section class="page-banner">
    <?php echo wp_get_attachment_image(315, 'full') ?>
    <div class="page-banner-text">
        <h1><?php esc_html_e('Villas & Apartments In Crete:', 'lodgings_collective_theme'); ?></h1>
        <h2><?php esc_html_e('Check the availability of our rentals in Crete in Greece', 'lodgings_collective_theme'); ?></h2>
    </div>
</section>

<main role="main" class="rentals page-section--sm">
    <section class="rentals__search">
        <div class="container">
        <?php echo do_shortcode('[wpbs-search calendars="all" language="auto" start_day="1" title="no" mark_selection="yes" selection_type="multiple" minimum_stay="0" featured_image="yes" starting_price="yes" results_layout="list" results_per_page="10" redirect=""]') ?>
        </div>
    </section>
    <section class="rentals__items page-section--sm">
        <div class="container">
            <div class="rentals__items-container">

                <?php
                global $post;
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $rentalItems = new WP_Query(
                    array(
                    'posts_per_page' => 4,
                    'post_type' => 'lc-rentals',
                    'order' => 'ASC',
                    'paged' => $paged,
                    )
                );
                if($rentalItems->have_posts()) : while ($rentalItems->have_posts()) : $rentalItems->the_post();

                        get_template_part('template-parts/page/rental-items');

                endwhile; ?>

            </div>
            <div class="rentals__items-container-pagination scrolled">

                    <?php

                    $total_pages = $rentalItems->max_num_pages;

                    if($total_pages > 1) :
                        $current_page = max(1, get_query_var('paged'));

                        echo paginate_links(
                            array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text'    => wp_get_attachment_image(2110, 'full'),
                            'next_text'    => wp_get_attachment_image(2111, 'full')
                            )
                        );

                    endif;
                endif; wp_reset_postdata();

                ?>

            </div>
        </div>
    </section>
</main>

<?php get_footer() ?>
