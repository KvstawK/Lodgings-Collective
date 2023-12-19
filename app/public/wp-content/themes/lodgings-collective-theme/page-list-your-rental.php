<?php get_header() ?>

<section class="page-banner">
	<?php echo wp_get_attachment_image(661, 'full') ?>
	<div class="page-banner-text">
		<h1><?php esc_html_e('List Your Property:', 'lodgings_collective_theme'); ?></h1>
		<h2><?php esc_html_e('Choose one of our packages and list your property with us.', 'lodgings_collective_theme'); ?></h2>
	</div>
</section>

<section class="services__landlords-rental page-section">
	<div class="container">
		<div class="services__landlords-rental-container">
			<div class="services__landlords-rental-container-text">
				<h2><?php esc_html_e('Promote Your Vacation Rental', 'lodgings_collective_theme'); ?></h2>
				<p class="paragraph paragraph--dark"><?php esc_html_e('Fill out the form to submit your vacation rental information and see if you meet our eligibility requirements. We\'ll review your submission and get back to you shortly. Please make sure to include all relevant details about your property, including its name, your contact information, and any amenities or special features that make it stand out. Once approved, your property will be promoted on our platform, reaching a wider audience of potential guests.', 'lodgings_collective_theme'); ?></p>
			</div>
			<div class="services__landlords-rental-container-form">

				<?php echo do_shortcode('[lc_list_property_form]'); ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer() ?>
