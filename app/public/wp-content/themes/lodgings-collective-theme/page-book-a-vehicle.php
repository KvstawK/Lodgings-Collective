<?php get_header() ?>

<section class="page-banner page-banner--dark">
	<?php echo wp_get_attachment_image(545, 'full') ?>
	<div class="page-banner-text">
		<h1><?php esc_html_e('Book A Vehicle:', 'lodgings_collective_theme'); ?></h1>
		<h2><?php esc_html_e('Check the availability of vehicles from our partners.', 'lodgings_collective_theme'); ?></h2>
	</div>
</section>

<main class="book__car page-section--sm">
	<div class="container">
		<section class="book__car-container">
			<script
					id="dchwidget"
					src="https://www.discovercars.com/wg.js"
					data-dev-env="com"
					data-location=""
					data-lang="en"
					data-utm-source="lodgingscollective"
					data-utm-medium="widget"
					data-aff-code="a_aid"
					data-autocomplete="on"
					data-style-submit-bg-color="2A4A4A"
					data-style-submit-font-color="white"
					data-style-form-bg-color="F7F2EE"
					data-style-form-font-color="333"
					data-style-submit-text="Search now"
					async
			></script>
		</section>

		<?php echo get_template_part('template-parts/components/book-notice') ?>

	</div>
</main>

<?php get_footer() ?>
