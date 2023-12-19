<?php

if(is_single()) : ?>

    <article>
    <?php

    if(get_the_post_thumbnail() !== '') :

        the_post_thumbnail();

		// Check if the post ID is 2655
		if(get_the_ID() == 2655) :
			$link = "https://commons.wikimedia.org/wiki/File:Natural_History_Museum_of_Crete_Bldg.jpg";
			?>
			<p class="blog__single-featured"><?php esc_html_e('Natural History Museum of Crete, source: '); ?><a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener"><?php echo esc_html('Wikimedia Commons') ?></a></p>
		<?php
		endif;

    endif;

    get_template_part('template-parts/post/header'); ?>

        <div class="blog__single-content"><?php
        if(is_single()) : ?>
			<div title="<?php esc_attr_e('Back To Top', 'lodgings_collective_theme'); ?>" class="blog__single-content-arrow"><a href="#contents"><?php
			if( str_contains( $_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com' ) ) :
				echo wp_get_attachment_image(1043, 'full');
			else:
					echo wp_get_attachment_image(1645, 'full');
			endif;
			?>
				</a></div>
			<section class="blog__single-content-share">
				<div class="blog__single-content-share-title">
					<p class="paragraph-first-line">
						<?php esc_html_e('Share:', 'lodgings_collective_theme'); ?>
					</p>
				</div>
				<div class="blog__single-content-share-icons">
					<?php
					$facebookURL = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink());
					$twitterURL = esc_url('https://twitter.com/share?url=' . get_the_permalink() . '&text=' . get_the_title());
					$linkedinURL = esc_url('https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&title=' . get_the_title());
					$pinterestURL = esc_url('https://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . wp_get_attachment_url(get_post_thumbnail_id($post->ID)) . '&description=' . get_the_title());

					$facebookImageID = (strpos(site_url(), 'gr.lodgingscollective.com') !== false) ? 1065 : 1711;
					$twitterImageID = (strpos(site_url(), 'gr.lodgingscollective.com') !== false) ? 1066 : 1712;
					$linkedinImageID = (strpos(site_url(), 'gr.lodgingscollective.com') !== false) ? 1067 : 1713;
					$pinterestImageID = (strpos(site_url(), 'gr.lodgingscollective.com') !== false) ? 1068 : 1714;
					?>
					<a title="<?php esc_attr_e('Share on Facebook', 'lodgings_collective_theme'); ?>" href="<?php echo $facebookURL; ?>" target="_blank" rel="noopener">
						<?php echo wp_get_attachment_image($facebookImageID, 'full') ?>
					</a>
					<a title="<?php esc_attr_e('Share on Twitter', 'lodgings_collective_theme'); ?>" href="<?php echo $twitterURL; ?>" target="_blank" rel="noopener">
						<?php echo wp_get_attachment_image($twitterImageID, 'full') ?>
					</a>
					<a title="<?php esc_attr_e('Share on Linkedin', 'lodgings_collective_theme'); ?>" href="<?php echo $linkedinURL; ?>" target="_blank" rel="noopener">
						<?php echo wp_get_attachment_image($linkedinImageID, 'full') ?>
					</a>
					<a title="<?php esc_attr_e('Share on Pinterest', 'lodgings_collective_theme'); ?>" href="<?php echo $pinterestURL; ?>" target="_blank" rel="noopener">
						<?php echo wp_get_attachment_image($pinterestImageID, 'full') ?>
					</a>
				</div>
			</section>
			<section class="blog__single-content-promotion">
				<div class="blog__single-content-promotion-container">
					<p class="headline-3"><?php esc_html_e('In Lodgings Collective We Offer:', 'lodgings_collective_theme'); ?></p>
					<ul class="gutenberg-list">
						<li><p><?php esc_html_e('Free Website Creation & SEO For Vacation Rentals', 'lodgings_collective_theme'); ?></p>
							<div class="blog-list--small">
								<?php
								$servicesForLandlordsURL = (strpos($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com') !== false) ? esc_url(home_url('/υπηρεσίες-για-ιδιοκτήτες/')) : esc_url(home_url('/services-for-landlords/'));
								$listYourRentalURL = (strpos($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com') !== false) ? esc_url(home_url('/καταχωρίστε-το-ακίνητο-σας/')) : esc_url(home_url('/list-your-rental/'));
								?>
								<a href="<?php echo $servicesForLandlordsURL; ?>" target="_blank" rel="noopener"><p><?php esc_html_e('Check Our Services Page', 'lodgings_collective_theme'); ?></p></a>
								<a href="<?php echo $listYourRentalURL; ?>" target="_blank" rel="noopener"><p><?php esc_html_e('List Your Vacation Rental', 'lodgings_collective_theme'); ?></p></a>
							</div>
						</li>
						<li><p><?php esc_html_e('Platforms Management (Airbnb, VRBO, etc)', 'lodgings_collective_theme'); ?></p>
							<div class="blog-list--small">
								<?php
								$servicesForLandlordsURL = (strpos($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com') !== false) ? esc_url(home_url('/υπηρεσίες-για-ιδιοκτήτες/')) : esc_url(home_url('/services-for-landlords/'));
								$listYourRentalURL = (strpos($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com') !== false) ? esc_url(home_url('/καταχωρίστε-το-ακίνητο-σας/')) : esc_url(home_url('/list-your-rental/'));
								?>
								<a href="<?php echo $servicesForLandlordsURL; ?>" target="_blank" rel="noopener"><p><?php esc_html_e('Check Our Services Page', 'lodgings_collective_theme'); ?></p></a>
								<a href="<?php echo $listYourRentalURL; ?>" target="_blank" rel="noopener"><p><?php esc_html_e('List Your Vacation Rental', 'lodgings_collective_theme'); ?></p></a>
							</div>
						</li>
						<li><p><?php esc_html_e('Our Booking Platform For Travelers', 'lodgings_collective_theme'); ?></p>
							<div class="blog-list--small">
								<a href="<?php echo esc_url(home_url('/lc-rentals/')); ?>" target="_blank" rel="noopener"><p><?php esc_html_e('Book Your Vacation Rental', 'lodgings_collective_theme'); ?></p></a>
							</div>
						</li>
						<li><p><?php esc_html_e('Travel Services:', 'lodgings_collective_theme'); ?></p>
							<div class="blog-list--small">
								<?php
								$bookAFlightURL = (strpos($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com') !== false) ? esc_url(home_url('/κράτηση-για-πτήση/')) : esc_url(home_url('/book-a-flight/'));
								$bookAVehicleURL = (strpos($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com') !== false) ? esc_url(home_url('/κράτηση-για-όχημα/')) : esc_url(home_url('/book-a-vehicle/'));
								$bookATaxiURL = (strpos($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com') !== false) ? esc_url(home_url('/κράτηση-για-ταξί/')) : esc_url(home_url('/book-a-taxi/'));
								$bookATourURL = (strpos($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com') !== false) ? esc_url(home_url('/κράτηση-για-περιήγηση/')) : esc_url(home_url('/book-a-tour/'));
								?>
								<a href="<?php echo $bookAFlightURL; ?>" target="_blank" rel="noopener"><p><?php esc_html_e('Book A Flight', 'lodgings_collective_theme'); ?></p></a>
								<a href="<?php echo $bookAVehicleURL; ?>" target="_blank" rel="noopener"><p><?php esc_html_e('Book A Vehicle', 'lodgings_collective_theme'); ?></p></a>
								<a href="<?php echo $bookATaxiURL; ?>" target="_blank" rel="noopener"><p><?php esc_html_e('Book A Taxi', 'lodgings_collective_theme'); ?></p></a>
								<a href="<?php echo $bookATourURL; ?>" target="_blank" rel="noopener"><p><?php esc_html_e('Book A Tour', 'lodgings_collective_theme'); ?></p></a>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<?php
            the_content();
			wp_link_pages();

            ?></div>

            <?php get_template_part('template-parts/post/footer');

        endif;

        ?>
    </article>

    <?php

            else :

                get_template_part('template-parts/page/content');

            endif;


