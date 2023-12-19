<?php get_header() ?>

<section class="page-banner">
	<?php echo wp_get_attachment_image(445, 'full') ?>
	<div class="page-banner-text">
		<h1><?php esc_html_e('Our Services For Travelers:', 'lodgings_collective_theme'); ?></h1>
		<h2><?php esc_html_e('What we offer to our traveler clients in detail', 'lodgings_collective_theme'); ?></h2>
	</div>
</section>

<main role="main" class="services__travelers">
	<div class="container">
		<section class="services__travelers-solution-container page-section">
			<div class="services__travelers-solution-container-left">
				<h3><?php esc_html_e('A Complete Travel Solution For Your Trip Or Vacation', 'lodgings_collective_theme'); ?></h3>
			</div>
			<div class="services__travelers-solution-container-right">
				<p class="paragraph paragraph--dark">
					<?php esc_html_e('Our travel hub offers a comprehensive solution for your trip or vacation. Choose from a selection of carefully curated and unique villas and apartments for your stay. Book your flights at competitive prices and rent a car for added convenience. We also offer airport taxi services and attraction packages to enhance your travel experience. Let us help make your trip a success by providing all your travel needs in one place.', 'lodgings_collective_theme'); ?>
				</p>
			</div>
		</section>
	</div>
	<section class="services__travelers-icons page-section--sm ">
		<div class="services__travelers-icons-container">
			<div class="services__travelers-icons-container-items-1 scrolled">
				<div class="services__travelers-icons-container-items-1-item">
					<?php echo wp_get_attachment_image(446, 'full') ?>
				</div>
				<div class="services__travelers-icons-container-items-1-item">
					<?php echo wp_get_attachment_image(447, 'full') ?>
				</div>
				<div class="services__travelers-icons-container-items-1-item">
					<?php echo wp_get_attachment_image(448, 'full') ?>
				</div>
				<div class="services__travelers-icons-container-items-1-item">
					<?php echo wp_get_attachment_image(449, 'full') ?>
				</div>
				<div class="services__travelers-icons-container-items-1-item">
					<?php echo wp_get_attachment_image(450, 'full') ?>
				</div>
				<div class="services__travelers-icons-container-items-1-item">
					<?php echo wp_get_attachment_image(451, 'full') ?>
				</div>
			</div>
			<div class="services__travelers-icons-container-items-2 scrolled">
				<div class="services__travelers-icons-container-items-2-item">
					<?php echo wp_get_attachment_image(446, 'full') ?>
				</div>
				<div class="services__travelers-icons-container-items-2-item">
					<?php echo wp_get_attachment_image(447, 'full') ?>
				</div>
				<div class="services__travelers-icons-container-items-2-item">
					<?php echo wp_get_attachment_image(448, 'full') ?>
				</div>
				<div class="services__travelers-icons-container-items-2-item">
					<?php echo wp_get_attachment_image(449, 'full') ?>
				</div>
				<div class="services__travelers-icons-container-items-2-item">
					<?php echo wp_get_attachment_image(450, 'full') ?>
				</div>
				<div class="services__travelers-icons-container-items-2-item">
					<?php echo wp_get_attachment_image(451, 'full') ?>
				</div>
			</div>
		</div>
	</section>
	<section class="services__travelers-how page-section">
		<div class="container">
			<h3><?php esc_html_e('How Does It Work?', 'lodgings_collective_theme'); ?></h3>
			<div class="services__travelers-how-container">
				<div class="services__travelers-how-container-item scrolled">
					<div class="services__travelers-how-container-item-image">
						<?php echo wp_get_attachment_image(479, 'full') ?>
					</div>
					<div class="services__travelers-how-container-item-text">
						<p class="paragraph paragraph--dark"><?php esc_html_e('Access booking options by clicking the "Make A Booking" link at the top of the page. From there, you can choose to book accommodation, flights, or a vehicle with just one click. Each link will take you directly to the desired booking page.', 'lodgings_collective_theme'); ?></p>
					</div>
				</div>
				<div class="services__travelers-how-container-item scrolled">
					<div class="services__travelers-how-container-item-image">
						<?php echo wp_get_attachment_image(480, 'full') ?>
					</div>
					<div class="services__travelers-how-container-item-text">
						<p class="paragraph paragraph--dark"><?php esc_html_e('Upon reaching the desired booking page, simply select your preferred accommodation or flight/vehicle, input the necessary information and dates. Then, proceed to add your payment information and confirm the booking for your chosen services.', 'lodgings_collective_theme'); ?></p>
					</div>
				</div>
				<div class="services__travelers-how-container-item scrolled">
					<div class="services__travelers-how-container-item-image">
						<?php echo wp_get_attachment_image(481, 'full') ?>
					</div>
					<div class="services__travelers-how-container-item-text">
						<p class="paragraph paragraph--dark"><?php esc_html_e('Once the form is submitted, your booking is complete! You\'ll receive an email confirmation with all the details. If needed, cancellations can be made through the link provided in the email or by contacting us. Thank you for choosing us.', 'lodgings_collective_theme'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="services__travelers">

		<?php get_template_part('template-parts/components/faq') ?>

	</section>
</main>

<?php get_footer() ?>
