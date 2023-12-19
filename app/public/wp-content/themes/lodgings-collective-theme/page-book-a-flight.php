<?php get_header() ?>

<section class="page-banner">
	<?php echo wp_get_attachment_image(494, 'full') ?>
	<div class="page-banner-text">
		<h1><?php esc_html_e('Book A Flight:', 'lodgings_collective_theme'); ?></h1>
		<h2><?php esc_html_e('Check the availability of flights for every destination needed.', 'lodgings_collective_theme'); ?></h2>
	</div>
</section>

<main class="book__flight page-section--sm">
	<div class="container">
		<script>
			(function addWidget(d) {
				var widgetStyle = d.createElement('link');
				widgetStyle.setAttribute('rel', 'stylesheet');
				widgetStyle.setAttribute('href', 'https://www.omio.com/gcs-proxy/b2b-nemo-prod/bundle/en/bundle.css?v=' + new Date().getTime());
				d.head.appendChild(widgetStyle);
				var widgetScript = d.createElement('script');
				widgetScript.setAttribute('src', 'https://www.omio.com/gcs-proxy/b2b-nemo-prod/bundle/en/bundle.js?v=' + new Date().getTime());
				d.body.appendChild(widgetScript);
			})(document);
		</script>
		<div
				id="nemo-search-widget"
				data-partner-id="rentalscollective"
				data-default-travel-mode="flight"
				data-new-tab="true"
		></div>

		<?php echo get_template_part('template-parts/components/book-notice') ?>

	</div>
</main>

<?php get_footer() ?>
