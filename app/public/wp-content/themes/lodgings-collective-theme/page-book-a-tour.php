<?php get_header() ?>

<section class="page-banner">
	<?php echo wp_get_attachment_image(547, 'full') ?>
	<div class="page-banner-text">
		<h1><?php esc_html_e('Book A Tour:', 'lodgings_collective_theme'); ?></h1>
		<h2><?php esc_html_e('Check the availability of tours & excursions in the area you require.', 'lodgings_collective_theme'); ?></h2>
	</div>
</section>

<main class="book__tour page-section">
	<div class="container">
		<div data-gyg-href="https://widget.getyourguide.com/default/city.frame" data-gyg-location-id="404" data-gyg-locale-code="en-US" data-gyg-widget="city" data-gyg-partner-id="NTTBMRK"></div>

		<?php echo get_template_part('template-parts/components/book-notice') ?>

	</div>
</main>

<?php get_footer() ?>
