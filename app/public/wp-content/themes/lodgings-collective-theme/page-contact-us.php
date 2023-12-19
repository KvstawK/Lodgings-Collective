<?php get_header() ?>

<section class="page-banner">
    <?php echo wp_get_attachment_image(108, 'full') ?>
    <div tabindex="0" class="page-banner-text">
        <h1><?php esc_html_e('Contact Us:', 'lodgings_collective_theme'); ?></h1>
        <h2><?php esc_html_e('Feel free to contact us for anything needed', 'lodgings_collective_theme'); ?></h2>
    </div>
</section>

<section class="contact page-section">
    <div class="container">
        <div class="contact__container">
            <div tabindex="0" class="contact__container-text">
                <p class="paragraph-first-line"><?php esc_html_e('Get in touch', 'lodgings_collective_theme'); ?></p>
                <h3><?php esc_html_e('Send us a text or call us:', 'lodgings_collective_theme'); ?></h3>
            </div>
            <div class="contact__container-info">
                <div class="contact__container-info-item">
                    <?php echo wp_get_attachment_image(93, 'full') ?>
                    <a href="<?php echo esc_url('tel:00306940277341') ?>" target="_blank" rel="noopener"><p title="<?php esc_attr_e('Telephone', 'lodgings_collective_theme'); ?>" class="paragraph--dark"><?php esc_html_e('Telephone: +30 6940 27 73 41', 'lodgings_collective_theme'); ?></p></a>
                </div>
                <div class="contact__container-info-item">
                    <?php echo wp_get_attachment_image(96, 'full') ?>
                    <a href="<?php echo esc_url('viber://chat?number=%2B306940277341') ?>" target="_blank" rel="noopener"><p title="<?php esc_attr_e('Viber'); ?>" class="paragraph--dark"><?php esc_html_e('Viber: +30 6940 27 73 41'); ?></p></a>
                </div>
                <div class="contact__container-info-item">
                    <?php echo wp_get_attachment_image(92, 'full') ?>
                    <a href="<?php echo esc_url('https://t.me/Lodgings_Collective') ?>" target="_blank" rel="noopener"><p  title="<?php esc_attr_e('Telegram'); ?>"class="paragraph--dark"><?php esc_html_e('Telegram: +30 6940 27 73 41'); ?></p></a>
                </div>
				<div class="contact__container-info-item">
					
					<?php
					$domain = $_SERVER['HTTP_HOST'];

					if ($domain == 'gr.lodgingscollective.com') {
						echo wp_get_attachment_image(1192, 'full');
					} else {
						echo wp_get_attachment_image(2167, 'full');
					}
					?>

					<a href="<?php echo esc_url('https://www.instagram.com/the_lodgings_collective/') ?>" target="_blank" rel="noopener">
						<p title="<?php echo esc_attr('Instagram') ?>" class="paragraph--dark"><?php echo esc_html('Instagram: @the_lodgings_collective') ?></p>
					</a>
				</div>
				<div class="contact__container-info-item">
                    <?php echo wp_get_attachment_image(59, 'full') ?>
                    <a href="<?php echo esc_url('mailto:info@lodgingscollective.com') ?>" target="_blank" rel="noopener"><p title="<?php esc_attr_e('Email'); ?>" class="paragraph--dark"><?php echo esc_html('Email: info@lodgingscollective.com'); ?></p></a>
                </div>
            </div>
        </div>
        <div class="contact__form">
            <div class="container">
                <div class="contact__form-container">
                    <div class="contact__form-container-text">
                        <h3 tabindex="0"><?php esc_html_e('Or send us a message through our contact form:', 'lodgings_collective_theme'); ?></h3>
                    </div>
                    <div class="contact__form-container-form scrolled">

                        <?php echo do_shortcode('[lc_contact_form]') ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>
