<div class="faq">
	<div class="container <?php echo (is_page(413) ? 'page-section--sm' : 'container--border page-section') ?>">
		<p tabindex="0" class="paragraph-first-line"><?php esc_html_e('Most common question we\'ve been asked', 'lodgings_collective_theme'); ?></p>
		<div class="faq-span">
			<div class="faq-span-headline">
				<h2 tabindex="0" class="headline-2--bold"><?php esc_html_e('FAQ', 'lodgings_collective_theme'); ?></h2><span class="underlined"></span>
			</div>
		</div>
		<div class="faq-container">
			<div class="faq-container-image" aria-hidden="true">
				<?php echo wp_get_attachment_image(111, 'full') ?>
			</div>
			<div class="faq-container-content">
				<div role="tabpanel" id="faqItem1" class="faq-container-content-item scrolled" aria-expanded="true" aria-controls="sect1">
					<div class="faq-container-content-item-text">
						<div class="faq-container-content-item-text-header">
							<p tabindex="0" class="paragraph paragraph--black paragraph--bold"><?php esc_html_e('What kind of bookings can i do from "Lodgings Collective" ?', 'lodgings_collective_theme'); ?></p>
							<?php echo wp_get_attachment_image(42, 'full') ?>
						</div>
						<div id="sect1" class="faq-container-content-item-text-info active" role="region" aria-labelledby="faqItem1">
							<p tabindex="0" class="paragraph paragraph--dark"><?php esc_html_e('At Lodgings Collective, we offer travel services to enhance your vacation. Clients can book accommodations like villas and apartments, rental cars, flights, and access tours, excursions, and airport taxis through our affiliate partners. Simply click "Make a Booking" at the top of the page, then "Book Travel Services" to explore options. Our team is always available for assistance.', 'lodgings_collective_theme'); ?></p>
						</div>
					</div>
				</div>
				<div role="tabpanel" id="faqItem2" class="faq-container-content-item scrolled" aria-expanded="false" aria-controls="sect2">
					<div class="faq-container-content-item-text">
						<div class="faq-container-content-item-text-header">
							<p tabindex="0" class="paragraph paragraph--black paragraph--bold"><?php esc_html_e('What kind of properties can i find in "Lodgings Collective" ?', 'lodgings_collective_theme'); ?></p>
							<?php echo wp_get_attachment_image(42, 'full') ?>
						</div>
						<div id="sect2" class="faq-container-content-item-text-info" role="region" aria-labelledby="faqItem2">
							<p tabindex="0" class="paragraph paragraph--dark"><?php esc_html_e('We have carefully selected villas and apartments available for renting.', 'lodgings_collective_theme'); ?></p>
						</div>
					</div>
				</div>
				<div role="tabpanel" id="faqItem3" class="faq-container-content-item scrolled" aria-expanded="false" aria-controls="sect3">
					<div class="faq-container-content-item-text">
						<div class="faq-container-content-item-text-header">
							<p tabindex="0" class="paragraph paragraph--black paragraph--bold"><?php esc_html_e('In which countries "Lodgings Collective" has available rentals?', 'lodgings_collective_theme'); ?></p>
							<?php echo wp_get_attachment_image(42, 'full') ?>
						</div>
						<div id="sect3" class="faq-container-content-item-text-info" role="region" aria-labelledby="faqItem3">
							<p tabindex="0" class="paragraph paragraph--dark"><?php esc_html_e('We currently have properties in the island Of Crete in Greece.', 'lodgings_collective_theme'); ?></p>
						</div>
					</div>
				</div>
				<div role="tabpanel" id="faqItem4" class="faq-container-content-item scrolled" aria-expanded="false" aria-controls="sect4">
					<div class="faq-container-content-item-text">
						<div class="faq-container-content-item-text-header">
							<p tabindex="0" class="paragraph paragraph--black paragraph--bold"><?php esc_html_e('How can i place my property in the platform?', 'lodgings_collective_theme'); ?></p>
							<?php echo wp_get_attachment_image(42, 'full') ?>
						</div>
						<div id="sect4" class="faq-container-content-item-text-info" role="region" aria-labelledby="faqItem4">
							<p tabindex="0" class="paragraph paragraph--dark"><?php esc_html_e('Please fill this form here:', 'lodgings_collective_theme'); ?></p>
							<?php
							$listYourLodgingURL = (strpos($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com') !== false) ? esc_url(site_url('/καταχωρίστε-το-ακίνητο-σας/')) : esc_url(site_url('/list-your-rental'));
							?>
							<a href="<?php echo $listYourLodgingURL; ?>"><?php echo esc_html__('List Your Lodging', 'lodgings_collective_theme') ?></a>
							<p tabindex="0" class="paragraph paragraph--dark"><?php esc_html_e('or contact us to discuss the possibility of working together!', 'lodgings_collective_theme'); ?></p>
							<?php
							$contactUsURL = (strpos($_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com') !== false) ? esc_url(site_url('/επικοινωνία/')) : esc_url(site_url('/contact-us'));
							?>
							<a href="<?php echo $contactUsURL; ?>"><?php echo esc_html__('Contact Us', 'lodgings_collective_theme') ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
