<?php get_header() ?>

<section class="rentals__single">
    <div class="container">
        <?php
        global $post;

        if(have_posts()) : while(have_posts()) : the_post();

                if($post->ID === 168) :

					echo do_shortcode('[lc_slider id="171"]');

				elseif($post->ID === 2864 || $post->ID === 1445) :

					echo do_shortcode('[lc_slider id="750"]');

				elseif($post->ID === 781) :

					echo do_shortcode('[lc_slider id="792"]');

				elseif($post->ID === 784) :

					echo do_shortcode('[lc_slider id="847"]');

				elseif($post->ID === 789) :

					echo do_shortcode('[lc_slider id="846"]');

				elseif ($post->ID === 803) :

					echo do_shortcode('[lc_slider id="806"]');

				elseif ($post->ID === 802) :

					echo do_shortcode('[lc_slider id="807"]');

                endif;
                ?>

            <div class="rentals__single-content">
                <div class="rentals__single-content-basic">
                    <div class="rentals__single-content-basic-left">
                        <h1 class="headline-1--text-shadow-less">"<?php the_title() ?>"</h1>
                        <div class="rentals__single-content-basic-location">
                <?php echo wp_get_attachment_image(72, 'full') ?>
                <?php echo get_the_terms(get_the_ID(), 'rental-location')[1]->name; ?>,
                <?php echo get_the_terms(get_the_ID(), 'rental-location')[0]->name;
                echo isset(get_the_terms(get_the_ID(), 'rental-location')[2]) ? ',' : '' ?>
                <?php echo isset(get_the_terms(get_the_ID(), 'rental-location')[2]) ? get_the_terms(get_the_ID(), 'rental-location')[2]->name : '' ?>
                        </div>
                    </div>
                    <div class="rentals__single-content-basic-right">
                        <p class="paragraph paragraph--black"><?php esc_html_e('From ', 'lodgings_collective_theme'); ?></p>
                        <p class="headline-3"><?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?>&euro; </p>
                        /<p class="paragraph paragraph--black"><?php esc_html_e('night', 'lodgings_collective_theme'); ?></p>
                    </div>
                </div>
                    <div class="rentals__single-content-info">
                        <div class="rentals__single-content-info-left">
                            <div title="<?php esc_attr_e('Number Of Guests', 'lodgings_collective_theme'); ?>" class="rentals__single-content-info-left-item">
                <?php echo wp_get_attachment_image(38, 'full') ?>
                <?php echo esc_html(get_post_meta(get_the_ID(), 'persons', true)); ?>
                            </div>
                            <div title="<?php esc_attr_e('Number Of Double Beds', 'lodgings_collective_theme'); ?>" class="rentals__single-content-info-left-item">
                <?php echo wp_get_attachment_image(57, 'full') ?>
                <?php echo esc_html(get_post_meta(get_the_ID(), 'double', true)); ?>
                            </div>
                            <div title="<?php esc_attr_e('Number Of Single Beds', 'lodgings_collective_theme'); ?>" class="rentals__single-content-info-left-item">
                <?php echo wp_get_attachment_image(89, 'full') ?>
                                <p><?php echo esc_html(get_post_meta(get_the_ID(), 'single', true)); ?></p>
                            </div>
                            <div title="<?php esc_attr_e('Number Of Bathrooms', 'lodgings_collective_theme'); ?>" class="rentals__single-content-info-left-item">
                <?php echo wp_get_attachment_image(46, 'full') ?>
                                <p><?php echo esc_html(get_post_meta(get_the_ID(), 'bathrooms', true)); ?>
                            </div>
                            <div title="<?php esc_attr_e("Rental's Square Meters", 'lodgings_collective_theme'); ?>" class="rentals__single-content-info-left-item">
                <?php echo wp_get_attachment_image(67, 'full') ?>
                                <p><?php echo esc_html(get_post_meta(get_the_ID(), 'meters', true)); ?>
                            </div>
                        </div>
                        <div class="rentals__single-content-info-right">
                            <div title="<?php esc_attr_e("Gym", 'lodgings_collective_theme'); ?>" class="rentals__single-content-info-right-item">
                <?php echo ( get_post_meta(get_the_ID(), 'gym', true) ? wp_get_attachment_image(63, 'full') : '' ); ?>
                            </div>
                            <div title="<?php esc_attr_e("Swimming-pool", 'lodgings_collective_theme'); ?>" class="rentals__single-content-info-right-item">
                <?php echo ( get_post_meta(get_the_ID(), 'pool', true) ? wp_get_attachment_image(91, 'full') : '' ); ?>
                            </div>
                            <div title="<?php esc_attr_e("Kids Friendly", 'lodgings_collective_theme'); ?>" class="rentals__single-content-info-right-item">
                <?php echo ( get_post_meta(get_the_ID(), 'kids', true) ? wp_get_attachment_image(74, 'full') : '' ); ?>
                            </div>
                            <div title="<?php esc_attr_e("Jacuzzi", 'lodgings_collective_theme'); ?>" class="rentals__single-content-info-right-item">
                <?php echo ( get_post_meta(get_the_ID(), 'jacuzzi', true) ? wp_get_attachment_image(70, 'full') : '' ); ?>
                            </div>
                        </div>
                    </div>
                <div class="rentals__single-content-main">
                    <div class="rentals__single-content-main-content">

						<?php

							the_content();

							$parent_post_id = get_the_ID();
							$args = array(
								'post_type' => 'lc-rentals',
								'posts_per_page' => -1,
								'post_parent' => $parent_post_id,
							);
							$child_posts_query = new WP_Query($args);

							if ($child_posts_query->have_posts()) : ?>
							<h2><?php esc_html_e('Choose A Room:', 'lodgings_collective_theme'); ?></h2>
							<div class="rentals__single-content-main-content-rooms">
								<?php
								while ($child_posts_query->have_posts()) {
									$child_posts_query->the_post();

									get_template_part('template-parts/page/rental-items');
								}
								wp_reset_postdata();
								?>
							</div>

							<?php endif; ?>

                        <div class="rentals__single-content-main-content-text">
                            <h2><?php esc_html_e('Reviews', 'lodgings_collective_theme'); ?>(<?php echo get_comments_number() ?>)</h2>
                <?php
                if($post->comment_count != 0) :
                    ?>
                            <p class="paragraph paragraph--black"><?php echo wp_get_attachment_image(90, 'full') ?> <?php echo lc_rentals_reviews_get_average_ratings($post->ID) ?></p>
                <?php endif; ?>
                        </div>

						<?php
						if (isset($_GET['showreviewform']) && $_GET['showreviewform'] == 15467456347958675434) {
							get_template_part('template-parts/components/reviews-form');
						}
						?>

                        <div class="rentals__single-content-main-content-reviews">
                <?php get_template_part('template-parts/components/reviews-display') ?>
                        </div>

						<?php
						if ($post->ID === 789 || $post->ID === 784 || $post->ID === 803 || $post->ID === 802) : ?>

						<div class="rentals__single-content-main-content-similar page-section">
							<h2><?php esc_html_e('Related Rooms', 'lodgings_collective_theme'); ?></h2>

							<?php
							// Check if the URL contains "gr.rentalscollective.com"
							if ( str_contains( $_SERVER['HTTP_HOST'], 'gr.rentalscollective.com' ) ) {
								$relatedPostID = $post->ID === 789 ? 784 : 789;
							} else {
								$relatedPostID = $post->ID === 803 ? 802 : 803;
							}

							$singleRoomsQuery = new WP_Query(array(
								'post_type' => 'lc-rentals',
								'p' => $relatedPostID
							));

							if($singleRoomsQuery->have_posts()) : while($singleRoomsQuery->have_posts()) : $singleRoomsQuery->the_post();

								echo get_template_part('template-parts/page/rental-items');

							endwhile; endif; wp_reset_postdata(); ?>

						</div>

						<?php endif; ?>

                    </div>
                    <div class="rentals__single-content-main-calendar">
                <?php

					if($post->ID === 168) :

						echo do_shortcode('[wpbs id="1" title="yes" legend="yes" legend_position="bottom" display="2" year="0" month="0" language="auto" start="1" dropdown="yes" jump="no" history="3" tooltip="1" highlighttoday="yes" weeknumbers="no" show_prices="yes" form_id="1" form_position="bottom" auto_pending="yes" selection_type="multiple" selection_style="split" minimum_days="4" maximum_days="0" booking_start_day="0" booking_end_day="0" show_date_selection="yes"]');

					elseif($post->ID === 2864 || $post->ID === 1147) :

						echo do_shortcode( '[wpbs-search calendars="5, 6" language="auto" start_day="1" title="yes" mark_selection="yes" selection_type="multiple" minimum_stay="0" featured_image="yes" starting_price="yes" results_layout="list" results_per_page="10" redirect=""]' );

					elseif($post->ID === 781) :

						echo do_shortcode( '[wpbs-search calendars="2, 3" language="auto" start_day="1" title="yes" mark_selection="yes" selection_type="multiple" minimum_stay="0" featured_image="yes" starting_price="yes" results_layout="list" results_per_page="10" redirect=""]' );

					elseif($post->ID === 802) :

						echo do_shortcode('[wpbs id="5" title="yes" legend="yes" legend_position="bottom" display="2" year="0" month="0" language="auto" start="1" dropdown="yes" jump="no" history="3" tooltip="1" highlighttoday="yes" weeknumbers="no" show_prices="yes" form_id="4" form_position="bottom" auto_pending="yes" selection_type="multiple" selection_style="split" minimum_days="4" maximum_days="0" booking_start_day="0" booking_end_day="0" show_date_selection="yes"]');

					elseif($post->ID === 789) :

						echo do_shortcode('[wpbs id="2" title="yes" legend="yes" legend_position="bottom" display="2" year="0" month="0" language="auto" start="1" dropdown="yes" jump="no" history="3" tooltip="1" highlighttoday="yes" weeknumbers="no" show_prices="yes" form_id="3" form_position="bottom" auto_pending="yes" selection_type="multiple" selection_style="split" minimum_days="4" maximum_days="0" booking_start_day="0" booking_end_day="0" show_date_selection="yes"]');

					elseif($post->ID === 803) :

						echo do_shortcode('[wpbs id="6" title="yes" legend="yes" legend_position="bottom" display="2" year="0" month="0" language="auto" start="1" dropdown="yes" jump="no" history="3" tooltip="1" highlighttoday="yes" weeknumbers="no" show_prices="yes" form_id="3" form_position="bottom" auto_pending="yes" selection_type="multiple" selection_style="split" minimum_days="4" maximum_days="0" booking_start_day="0" booking_end_day="0" show_date_selection="yes"]');

					elseif($post->ID === 784) :

						echo do_shortcode('[wpbs id="3" title="yes" legend="yes" legend_position="bottom" display="2" year="0" month="0" language="auto" start="1" dropdown="yes" jump="no" history="3" tooltip="1" highlighttoday="yes" weeknumbers="no" show_prices="yes" form_id="2" form_position="bottom" auto_pending="yes" selection_type="multiple" selection_style="split" minimum_days="4" maximum_days="0" booking_start_day="0" booking_end_day="0" show_date_selection="yes"]');

					endif;
					?>

                    </div>
                </div>

            </div>

                <?php



        endwhile;

        else :

            get_template_part('template-parts/post/content', 'none');

        endif; wp_reset_postdata();

        ?>
    </div>

</section>


<?php get_footer() ?>
