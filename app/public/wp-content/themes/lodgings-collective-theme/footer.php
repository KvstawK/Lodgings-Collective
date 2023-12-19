</div>

    <footer role="contentinfo" class="footer">
        <div class="container">
            <div class="footer__container">
                <div class="footer__container-item">
                    <div class="footer__container-item-logo">
                        <a title="<?php esc_attr_e('Homepage', 'lodgings_collective_theme'); ?>" href="<?php echo esc_url(home_url()) ?>">

							<?php

							echo wp_get_attachment_image(861, 'full');

							?>

						</a>
                    </div>
                </div>
                <div class="footer__container-item">
                    <div class="footer__container-item-links">
                        <p tabindex="0" class="paragraph-first-line"><?php esc_html_e('Useful Links', 'lodgings_collective_theme'); ?></p>
                        <ul>
							<li>
								<p class="paragraph">
									<a href="<?php
									if ($_SERVER['HTTP_HOST'] == 'gr.lodgingscollective.com') {
										echo esc_url(site_url('/όροι-προϋποθέσεις'));
									} else {
										echo esc_url(site_url('/terms-conditions'));
									}
									?>">
										<?php esc_html_e('Terms & Conditions', 'lodgings_collective_theme'); ?>
									</a>
								</p>
							</li>
							<li>
								<p class="paragraph">
									<a href="<?php
									if ($_SERVER['HTTP_HOST'] == 'gr.lodgingscollective.com') {
										echo esc_url(site_url('/πολιτική-απορρήτου'));
									} else {
										echo esc_url(site_url('/privacy-policy'));
									}
									?>">
										<?php esc_html_e('Privacy Policy', 'lodgings_collective_theme'); ?>
									</a>
								</p>
							</li>
							<li>
								<p class="paragraph">
									<a href="<?php
									if ($_SERVER['HTTP_HOST'] == 'gr.lodgingscollective.com') {
										echo esc_url(site_url('/δήλωση-αποποίησης-ευθύνης'));
									} else {
										echo esc_url(site_url('/disclaimer'));
									}
									?>">
										<?php esc_html_e('Disclaimer', 'lodgings_collective_theme'); ?>
									</a>
								</p>
							</li>
                        </ul>
                    </div>
                </div>
                <div class="footer__container-item">
                    <div class="footer__container-item-contact">
                        <p tabindex="0" class="paragraph-first-line"><?php esc_html_e('Contact Us', 'lodgings_collective_theme'); ?></p>
                        <ul>
                            <li><p class="paragraph paragraph--black"><?php esc_html_e('Tel: ', 'lodgings_collective_theme'); ?></p><a href="<?php echo esc_url('tel:+6940277341') ?>" target="_blank" rel="noopener"><p aria-label="<?php esc_attr_e('Our Telephone', 'lodgings_collective_theme'); ?>" class="paragraph"><?php echo esc_html('+30 6940277341'); ?></p></a></li>
                            <li><p class="paragraph paragraph--black"><?php echo esc_html('Viber: '); ?></p><a href="<?php echo esc_url('viber://chat?number=%2B306940277341') ?>" target="_blank"><p aria-label="<?php esc_attr_e('Our Viber', 'lodgings_collective_theme'); ?>" class="paragraph"><?php echo esc_html('6940277341'); ?></p></a></li>
                            <li><p class="paragraph paragraph--black"><?php echo esc_html('Telegram: '); ?></p><a href="<?php echo esc_url('https://t.me/Lodgings_Collective') ?>" target="_blank" rel="noopener"><p aria-label="<?php esc_attr_e('Our Telegram', 'lodgings_collective_theme'); ?>" class="paragraph"><?php echo esc_html('6940277341'); ?></p></a></li>
							<li>
								<p class="paragraph paragraph--black"><?php echo esc_html('Instagram: '); ?></p>
								<a href="<?php echo esc_url('https://www.instagram.com/the_lodgings_collective/') ?>" target="_blank" rel="noopener">
									<p aria-label="<?php esc_attr_e('Our Instagram', 'lodgings_collective_theme'); ?>" class="paragraph">
										<?php echo esc_html('@the_lodgings_collective'); ?>
									</p>
								</a>
							</li>
							<li><p class="paragraph paragraph--black"><?php echo esc_html('email: '); ?></p><a href="<?php echo esc_url('mailto:info@lodgingscollective.com') ?>" target="_blank" rel="noopener"><p aria-label="<?php esc_attr_e('Our email', 'lodgings_collective_theme'); ?>" class="paragraph"><?php echo esc_html('info@lodgingscollective.com'); ?></p></a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer__container-item">
                    <div class="footer__container-item-newsletter">
                        <p tabindex="0" class="paragraph-first-line"><?php esc_html_e('Newsletter', 'lodgings_collective_theme'); ?></p>
                        <p tabindex="0" class="paragraph"><?php esc_html_e('Subscribe to our newsletter!', 'lodgings_collective_theme'); ?></p>
                        <?php echo do_shortcode('[lc_newsletter_shortcode]') ?>
                    </div>
                </div>
                <span class="footer__container-border"></span>
                <div class="footer__copyright">
                    <div class="footer__copyright-container">
                        <p class="paragraph paragraph--white"><?php echo esc_html('Copyright © ') ?><?php echo date("Y"); ?></p>
                        <p class="paragraph paragraph--white"><?php esc_html_e('Lodgings Collective', 'lodgings_collective_theme'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>
