<section id="eaCarouselRental" aria-roledescription="carousel" aria-label="<?php esc_attr_e('Highlighted images of the rental', 'lodgings_collective_theme'); ?>" class="ea-carousel">
    <div tabindex="0" role="tablist" class="ea-carousel__nav" aria-label="<?php esc_attr_e('Slides', 'lodgings_collective_theme'); ?>">
        <div tabindex="0" role="tab" class="ea-carousel__nav-dot active" aria-selected="true" aria-controls="ea-carousel-item-1" aria-label="<?php esc_attr_e('Slide 1', 'lodgings_collective_theme'); ?>"></div>
        <div tabindex="0" role="tab" class="ea-carousel__nav-dot" aria-selected="false" aria-controls="ea-carousel-item-2" aria-label="<?php esc_attr_e('Slide 2', 'lodgings_collective_theme'); ?>"></div>
        <div tabindex="0" role="tab" class="ea-carousel__nav-dot" aria-selected="false" aria-controls="ea-carousel-item-3" aria-label="<?php esc_attr_e('Slide 3', 'lodgings_collective_theme'); ?>"></div>
    </div>
    <button type="button" class="ea-carousel__btn ea-carousel__btn-left hide" aria-label="<?php esc_attr_e('previous slide button', 'lodgings_collective_theme'); ?>" aria-controls="ea-carousel__container"><?php echo wp_get_attachment_image(1844, 'full') ?></button>
    <div class="ea-carousel__container" aria-live="polite">
        <ul class="ea-carousel__container-sliders">
            <li role="tabpanel" class="ea-carousel__container-sliders-slide active ea-carousel-item-1" aria-roledescription="<?php esc_attr_e('slide', 'lodgings_collective_theme');?>" aria-selected="true" aria-label="<?php esc_attr_e('1 of 3', 'lodgings_collective_theme'); ?>">
                <div class="ea-carousel__container-sliders-slide-image">
                    <?php echo wp_get_attachment_image(767, 'full') ?>
                </div>
                <div tabindex="0" class="ea-carousel__container-sliders-slide-content">
                    <h1  class="h1"><?php esc_html_e('Villa First luxury villa', 'lodgings_collective_theme'); ?></h1>
                    <h2 ><?php esc_html_e('Enjoy a luxury experience in Crete', 'lodgings_collective_theme'); ?></h2>
                    <button type="button" class="btn"><a href="<?php echo esc_url(site_url('/rooms-suites')) ?>"><?php esc_html_e('Rooms & Suites', 'lodgings_collective_theme'); ?></a></button>
                </div>
            </li>
            <li role="tabpanel" class="ea-carousel__container-sliders-slide ea-carousel-item-2" aria-roledescription="<?php esc_attr_e('slide', 'lodgings_collective_theme');?>" aria-label="<?php esc_attr_e('2 of 3', 'lodgings_collective_theme'); ?>">
                <div class="ea-carousel__container-sliders-slide-image">
                    <?php echo wp_get_attachment_image(768, 'full') ?>
                </div>
                <div tabindex="-1" class="ea-carousel__container-sliders-slide-content">
                    <h1 class="h1"><?php esc_html_e('Unique villa in Heraklion', 'lodgings_collective_theme'); ?></h1>
                    <h2><?php esc_html_e('A perfect base for your vacation in Crete', 'lodgings_collective_theme'); ?></h2>
                    <button tabindex="-1" type="button" class="btn"><a tabindex="-1" href="<?php echo esc_url(site_url('/rooms-suites')) ?>"><?php esc_html_e('Rooms & Suites', 'lodgings_collective_theme'); ?></a></button>
                </div>
            </li>
            <li role="tabpanel" class="ea-carousel__container-sliders-slide ea-carousel-item-3" aria-roledescription="<?php esc_attr_e('slide', 'lodgings_collective_theme');?>" aria-label="<?php esc_attr_e('3 of 3', 'lodgings_collective_theme'); ?>">
                <div class="ea-carousel__container-sliders-slide-image">
                    <?php echo wp_get_attachment_image(769, 'full') ?>
                </div>
                <div tabindex="-1" class="ea-carousel__container-sliders-slide-content">
                    <h1 class="h1"><?php esc_html_e('Villa First in Crete', 'lodgings_collective_theme'); ?></h1>
                    <h2><?php esc_html_e('Luxurious vacation in Heraklion', 'lodgings_collective_theme'); ?></h2>
                    <button tabindex="-1" type="button" class="btn"><a tabindex="-1" href="<?php echo esc_url(site_url('/rooms-suites')) ?>"><?php esc_html_e('Rooms & Suites', 'lodgings_collective_theme'); ?></a></button>
                </div>
            </li>
        </ul>
    </div>
    <button type="button" class="ea-carousel__btn ea-carousel__btn-right" aria-label="<?php esc_attr_e('next slide button', 'lodgings_collective_theme'); ?>" aria-controls="ea-carousel__container"><?php echo wp_get_attachment_image(1845, 'full') ?></button>


</section>


