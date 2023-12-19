<?php get_header() ?>

<main role="main" class="home">
    <section class="home__welcome">
        <div class="container">
            <div class="home__welcome-container">
                <div class="home__welcome-container-text">
                    <p tabindex="0"class="paragraph-first-line"><?php esc_html_e('Welcome to', 'lodgings_collective_theme'); ?><span></span></p>
                    <h1 tabindex="0"><?php esc_html_e('Lodgings Collective', 'lodgings_collective_theme'); ?></h1>
                    <h2 tabindex="0"><?php esc_html_e('A vacation rental online management, promotion and marketplace service for exceptional lodgings.', 'lodgings_collective_theme'); ?></h2>
                    <div class="home__welcome-container-text-social">
                        <div class="home__welcome-container-text-social-item">
                            <a href="<?php echo esc_url('tel:+306940277341') ?>" target="_blank" rel="noopener" title="<?php esc_attr_e('Contact Us On Telephone', 'lodgings_collective_theme'); ?>"><?php echo wp_get_attachment_image(93, 'full', false, array('aria-hidden'=> 'true', 'alt' => 'Icon of a telephone')) ?><span></span></a>
                            <p><?php esc_html_e('Telephone', 'lodgings_collective_theme') ?></p>
                        </div>
                        <div class="home__welcome-container-text-social-item">
                            <a href="<?php echo esc_url('viber://chat?number=%2B306940277341') ?>" target="_blank" rel="noopener" title="<?php esc_attr_e('Contact Us On Viber', 'lodgings_collective_theme'); ?>"><?php echo wp_get_attachment_image(96, 'full', false, array('aria-hidden'=> 'true', 'alt' => 'Icon of the Viber application')) ?><span></span></a>
                            <p><?php echo esc_html('Viber') ?></p>
                        </div>
                        <div class="home__welcome-container-text-social-item">
                            <a href="<?php echo esc_url('https://t.me/Lodgings_Collective') ?>" target="_blank" rel="noopener" title="<?php esc_attr_e('Contact Us On Telegram', 'lodgings_collective_theme'); ?>"><?php echo wp_get_attachment_image(92, 'full', false, array('aria-hidden'=> 'true', 'alt' => 'Icon of the Telegram application')) ?><span></span></a>
                            <p><?php echo esc_html('Telegram') ?></p>
                        </div>
						<div class="home__welcome-container-text-social-item">
							<a href="<?php echo esc_url('https://www.instagram.com/the_lodgings_collective/') ?>" target="_blank" rel="noopener" title="<?php esc_attr_e('Follow Us On Instagram', 'lodgings_collective_theme'); ?>">
								<?php echo wp_get_attachment_image(2167, 'full', false, array('aria-hidden'=> 'true', 'alt' => 'Icon of the Instagram application')) ?>
								<span></span>
							</a>
							<p><?php echo esc_html('Instagram') ?></p>
						</div>
						<div class="home__welcome-container-text-social-item">
                            <a href="<?php echo esc_url('mailto:info@lodgingscollective.com') ?>" target="_blank" rel="noopener" title="<?php esc_attr_e('Contact Us On Email', 'lodgings_collective_theme'); ?>"><?php echo wp_get_attachment_image(59, 'full', false, array('aria-hidden'=> 'true', 'alt' => 'Icon of an email')) ?><span></span></a>
                            <p><?php echo esc_html('Email') ?></p>
                        </div>
                    </div>
                </div>
                <div class="home__welcome-container-slider">

                    <?php echo do_shortcode('[lc_slider id="139"]'); ?>

                </div>
            </div>
        </div>
    </section>
    <section class="home__search page-section--sm scrolled">
        <div class="container">
<!--            <div class="home__search-form">-->
<!---->
<!--                --><?php //= do_shortcode('[lc_rentals_search_shortcode]') ?>
<!---->
<!--            </div>-->
            <div class="home__search-widget">

				<?php
				if ( str_contains( $_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com' ) ) {
					echo do_shortcode('[wpbs-search calendars="1,2,3" language="auto" start_day="1" title="yes" mark_selection="yes" selection_type="multiple" minimum_stay="0" featured_image="yes" starting_price="yes" results_layout="list" results_per_page="10" redirect=""]');
				} else {
					echo do_shortcode('[wpbs-search calendars="1,5,6" language="auto" start_day="1" title="yes" mark_selection="yes" selection_type="multiple" minimum_stay="0" featured_image="yes" starting_price="yes" results_layout="list" results_per_page="10" redirect=""]');
				}
				?>

            </div>
        </div>
    </section>
    <section class="home__categories">
        <div class="container container--border page-section">
            <div class="home__categories-container">
				<div class="home__categories-container-item scrolled">
					<div class="home__categories-container-item-text">
						<div class="home__categories-container-item-text-headline">
							<h2 tabindex="0" class="headline-2--bold"><?php esc_html_e('Our Locations', 'lodgings_collective_theme'); ?></h2>
							<span></span>
						</div>
						<a href="<?php echo get_post_type_archive_link( 'lc-rentals' ) . 'rental-location/'; ?>" style="visibility: hidden"><p class="paragraph-first-line"><?php esc_html_e('View All', 'lodgings_collective_theme'); ?></p><span class="screen-reader-text"><?php echo esc_html__('Our locations', 'lodgings_collective_theme') ?></span></a>
					</div>
					<div class="home__categories-container-item-slider">

						<?php echo do_shortcode('[lc_slider id="636"]') ?>

					</div>
				</div>

                <?php
                $terms = get_term(4, 'rental-category');
                if(!empty($terms && !is_wp_error($terms)) && !empty($terms->count)) : ?>

                <div class="home__categories-container-item scrolled">
                    <div class="home__categories-container-item-text">
						<div class="home__categories-container-item-text-headline">
							<h2 tabindex="0" class="headline-2--bold"><?php esc_html_e('Lodgings Near The Sea', 'lodgings_collective_theme'); ?></h2>
							<span></span>
						</div>
                        <a href="<?php echo get_term_link(4, 'rental-category') ?>"><p class="paragraph-first-line"><?php esc_html_e('View All', 'lodgings_collective_theme'); ?></p><span class="screen-reader-text"><?php echo esc_html__('Lodgings Near The Sea', 'lodgings_collective_theme') ?></span></a>
                    </div>
                    <div class="home__categories-container-item-slider">

                    <?php echo do_shortcode('[lc_slider id="141"]') ?>

                    </div>
                </div>

                <?php endif; ?>

                <?php
                $terms = get_term(5, 'rental-category');
                if(!empty($terms && !is_wp_error($terms)) && !empty($terms->count)) : ?>

                <div class="home__categories-container-item scrolled">
                    <div class="home__categories-container-item-text">
						<div class="home__categories-container-item-text-headline">
							<h2 tabindex="0" class="headline-2--bold"><?php esc_html_e('Mountain Based Lodgings', 'lodgings_collective_theme'); ?></h2>
							<span></span>
						</div>
                        <a href="<?php echo get_term_link(5, 'rental-category') ?>"><p class="paragraph-first-line"><?php esc_html_e('View All', 'lodgings_collective_theme'); ?></p><span class="screen-reader-text"><?php echo esc_html__('Mountain Based Lodgings', 'lodgings_collective_theme') ?></span></a>
                    </div>
                    <div class="home__categories-container-item-slider">

                    <?php echo do_shortcode('[lc_slider id="164"]') ?>

                    </div>
                </div>

                <?php endif; ?>

                <?php
                $terms = get_term(6, 'rental-category');
                if(!empty($terms && !is_wp_error($terms)) && !empty($terms->count)) : ?>

                <div class="home__categories-container-item scrolled">
                    <div class="home__categories-container-item-text">
						<div class="home__categories-container-item-text-headline">
							<h2 tabindex="0" class="headline-2--bold"><?php esc_html_e('Lodgings Suitable For Events', 'lodgings_collective_theme'); ?></h2>
							<span></span>
						</div>
                        <a href="<?php echo get_term_link(6, 'rental-category') ?>"><p class="paragraph-first-line"><?php esc_html_e('View All', 'lodgings_collective_theme'); ?></p><span class="screen-reader-text"><?php echo esc_html__('Lodgings Suitable For Events', 'lodgings_collective_theme') ?></span></a>
                    </div>
                    <div class="home__categories-container-item-slider">

                    <?php echo do_shortcode('[lc_slider id="166"]') ?>

                    </div>
                </div>

                <?php endif; ?>

                <?php
                $terms = get_term(7, 'rental-category');
                if(!empty($terms && !is_wp_error($terms)) && !empty($terms->count)) : ?>

                <div class="home__categories-container-item scrolled">
                    <div class="home__categories-container-item-text">
						<div class="home__categories-container-item-text-headline">
							<h2 tabindex="0" class="headline-2--bold"><?php esc_html_e('Apartments', 'lodgings_collective_theme'); ?></h2>
							<span></span>
						</div>
                        <a href="<?php echo get_term_link(7, 'rental-category') ?>"><p class="paragraph-first-line"><?php esc_html_e('View All', 'lodgings_collective_theme'); ?></p><span class="screen-reader-text"><?php echo esc_html__('Apartments', 'lodgings_collective_theme') ?></span></a>
                    </div>
                    <div class="home__categories-container-item-slider">

                    <?php echo do_shortcode('[lc_slider id="167"]') ?>

                    </div>
                </div>

                <?php endif; ?>

            </div>
        </div>
    </section>
    <section class="home__services">
        <div class="container container--border page-section">
            <div class="home__services-container">
                <div class="home__services-container-images">
                    <div class="home__services-container-images-image1 scrolled" aria-hidden="true"><?php echo wp_get_attachment_image(40, 'full') ?></div>
                    <div class="home__services-container-images-image2" aria-hidden="true"><?php echo wp_get_attachment_image(48, 'full') ?></div>
                    <div class="home__services-container-images-image3 scrolled" aria-hidden="true"><?php echo wp_get_attachment_image(61, 'full') ?></div>
                    <div class="home__services-container-images-image4 scrolled" aria-hidden="true"><?php echo wp_get_attachment_image(68, 'full') ?></div>
                    <div class="home__services-container-images-image5 scrolled" aria-hidden="true"><?php echo wp_get_attachment_image(94, 'full') ?></div>
                </div>
                <div class="home__services-container-text">
                    <p tabindex="0" class="paragraph-first-line"><?php esc_html_e('A vacation rentals online management and marketing solution', 'lodgings_collective_theme'); ?></p>
                    <div class="home__services-container-text-span">
                    <h2 tabindex="0" class="headline-2--bold scrolled"><?php esc_html_e('Our Services', 'lodgings_collective_theme'); ?></h2><span class="underlined scrolled"></span>
                    </div>
                    <p tabindex="0" class="paragraph paragraph--dark scrolled"><?php esc_html_e('We create a modern website and promote online your business so that you can maximize your lodgings potential. We manage your vacation rental through our online marketplace and a variety of websites like Airbnb, Booking.com, Vrbo e.t.c. and we use modern SEO methods so that we can be assured that your business rental website appears higher into all search engines results.', 'lodgings_collective_theme'); ?></p>
                    <a href="<?php echo esc_url(site_url('/services-for-landlords')) ?>"><button class="btn scrolled"><?php esc_html_e('Read More', 'lodgings_collective_theme'); ?><span class="theme-screen-reader-text"><?php esc_html_e('About Our Services For Landlords', 'lodgings_collective_theme'); ?></span></button></a>
                </div>
            </div>
			<div class="home__services-container">
				<div class="home__services-container-text">
					<p tabindex="0" class="paragraph-first-line"><?php esc_html_e('A complete travel solution for your vacations', 'lodgings_collective_theme'); ?></p>
					<div class="home__services-container-text-span">
						<h2 tabindex="0" class="headline-2--bold scrolled"><?php esc_html_e('Our Marketplace', 'lodgings_collective_theme'); ?></h2><span class="underlined underlined--second scrolled"></span>
					</div>
					<p tabindex="0" class="paragraph paragraph--dark scrolled"><?php esc_html_e('Explore our comprehensive range of travel services which include villas, apartments, flights, rental cars, tours, excursions, and airport taxis. Simply navigate to these services via direct links on our website or through our blog posts and booking confirmation emails. Feel free to choose and book the services that align with your requirements. Our dedicated team is always ready to address any questions or concerns you may have.', 'lodgings_collective_theme'); ?></p>
					<a href="<?php echo esc_url(site_url('/services-for-travelers')) ?>"><button class="btn scrolled"><?php esc_html_e('Read More', 'lodgings_collective_theme'); ?><span class="theme-screen-reader-text"><?php esc_html_e('About Our Services', 'lodgings_collective_theme'); ?></span></button></a>
				</div>
				<div class="home__services-container-images">
					<div class="home__services-container-images-image1 second scrolled" aria-hidden="true"><?php echo wp_get_attachment_image(507, 'full') ?></div>
					<div class="home__services-container-images-image2 second" aria-hidden="true"><?php echo wp_get_attachment_image(408, 'full') ?></div>
					<div class="home__services-container-images-image3 second scrolled" aria-hidden="true"><?php echo wp_get_attachment_image(409, 'full') ?></div>
					<div class="home__services-container-images-image4 second scrolled" aria-hidden="true"><?php echo wp_get_attachment_image(410, 'full') ?></div>
					<div class="home__services-container-images-image5 second scrolled" aria-hidden="true"><?php echo wp_get_attachment_image(506, 'full') ?></div>
					<div class="home__services-container-images-image6 second scrolled" aria-hidden="true"><?php echo wp_get_attachment_image(505, 'full') ?></div>
				</div>
			</div>
        </div>
    </section>
	<section class="home__faq">

		<?php get_template_part('template-parts/components/faq') ?>

	</section>

<!--    <section class="home__blog">-->
<!--        <div class="container page-section">-->
<!--            <p class="paragraph-first-line">--><?php //esc_html_e('From our blog', 'lodgings_collective_theme'); ?><!--</p>-->
<!--            <h2>--><?php //esc_html_e('News & Articles', 'lodgings_collective_theme'); ?><!--</h2>-->
<!--            <div class="home__blog-container">-->
<!--                --><?php
//                $homeBlogPosts = new WP_Query(array(
//                        'posts_per_page' => 6
//                ));
//                if ($homeBlogPosts->have_posts()) : while($homeBlogPosts->have_posts()) : $homeBlogPosts->the_post();
//
//                    get_template_part('template-parts/page/content');
//
//                    endwhile; endif; wp_reset_postdata();
//                ?>
<!--            </div>-->
<!--            <div class="home__blog-link"><a href="--><?php //echo esc_url(site_url('/blog')) ?><!--"><button class="btn btn--big">--><?php //esc_html_e('Read Our Blog!', 'lodgings_collective_theme'); ?><!--</button>--><?php //echo wp_get_attachment_image(1985, 'full') ?><!--</a></div>-->
<!--        </div>-->
<!--    </section>-->
</main>

<?php get_footer() ?>
