<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <a href="#content" class="skip-link"><?php esc_html_e('Skip to content', 'lodgings_collective_theme'); ?></a>
        <header role="banner" id="site-header" class="header">
            <div class="container">
                <div class="header__container">
                    <div class="header__container-logo" title="<?php esc_attr_e('Home', 'lodgings_collective_theme'); ?>">
                        <?php if(has_custom_logo()) : the_custom_logo();
                            else : ?>
                        <a href="<?php echo esc_url(site_url('/')) ?>"><?php esc_html(bloginfo('name')) ?></a>
                            <?php endif; ?>
                    </div>
                    <button title="<?php esc_attr_e('Menu', 'lodgings_collective_theme'); ?>" class="header__container-menu" aria-controls="<?php esc_attr_e('primary-nav', 'lodgings_collective_theme'); ?>" aria-expanded="false"><span></span></button>
                    <nav id="primary-nav" role="navigation" class="header__container-links" data-visible="false" aria-label="<?php esc_attr_e('Main navigation', 'lodgings_collective_theme'); ?>">
                        <div class="header__container-links-logo" title="<?php esc_attr_e('Home', 'lodgings_collective_theme'); ?>">
                            <?php if(has_custom_logo()) : the_custom_logo();
                            else : ?>
                                <a href="<?php echo esc_url(site_url('/')) ?>"><?php esc_html(bloginfo('name')) ?></a>
                            <?php endif; ?>
                        </div>
                        <?php
                        wp_nav_menu(
                            array(
                                    'theme_location' => 'main-menu',
                                    'link_after' => '<span></span>'
                            )
                        )
                        ?>
<!--                        <div class="header__container-links-flags">-->
<!---->
<!--							--><?php
//							if( str_contains( $_SERVER['HTTP_HOST'], 'gr.lodgingscollective.com' ) ) :
//							?>
<!---->
<!--                            <a href="--><?php //echo esc_url('https://lodgingscollective.com') ?><!--">--><?php //echo wp_get_attachment_image(180, 'full') ?><!--<p class="paragraph-first-line">--><?php //echo esc_html('EN') ?><!--</p></a>-->
<!---->
<!--							--><?php //else : ?>
<!---->
<!--								<a href="--><?php //echo esc_url('https://gr.lodgingscollective.com') ?><!--">--><?php //echo wp_get_attachment_image(62, 'full') ?><!--<p class="paragraph-first-line">--><?php //echo esc_html('GR') ?><!--</p></a>-->
<!---->
<!--							--><?php //endif; ?>
<!---->
<!--                        </div>-->
                    </nav>
                </div>
            </div>
        </header>

    <div id="content">

