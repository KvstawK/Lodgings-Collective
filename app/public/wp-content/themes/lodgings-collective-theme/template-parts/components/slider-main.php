<div id="eaCarouselMain" aria-roledescription="carousel" aria-label="<?php esc_attr_e('Highlighted images of our rentals', 'lodgings_collective_theme'); ?>" class="ea-carousel">
    <button type="button" class="ea-carousel__btn ea-carousel__btn-left hide" aria-label="<?php esc_attr_e('previous slide button', 'lodgings_collective_theme'); ?>" aria-controls="ea-carousel__container"><?php echo wp_get_attachment_image(1844, 'full') ?></button>
    <div class="ea-carousel__container" aria-live="polite">
        <ul class="ea-carousel__container-sliders">
            <li role="tabpanel" class="ea-carousel__container-sliders-slide active" aria-roledescription="<?php esc_attr_e('slide', 'lodgings_collective_theme');?>" aria-selected="true" aria-label="<?php esc_attr_e('1 of 3', 'lodgings_collective_theme'); ?>">
                <div class="ea-carousel__container-sliders-slide-image">
                    <?php echo wp_get_attachment_image(1843, 'full') ?>
                </div>
            </li>
            <li role="tabpanel" class="ea-carousel__container-sliders-slide" aria-roledescription="<?php esc_attr_e('slide', 'lodgings_collective_theme');?>" aria-label="<?php esc_attr_e('2 of 3', 'lodgings_collective_theme'); ?>">
                <div class="ea-carousel__container-sliders-slide-image">
                    <?php echo wp_get_attachment_image(1841, 'full') ?>
                </div>
            </li>
            <li role="tabpanel" class="ea-carousel__container-sliders-slide" aria-roledescription="<?php esc_attr_e('slide', 'lodgings_collective_theme');?>" aria-label="<?php esc_attr_e('3 of 3', 'lodgings_collective_theme'); ?>">
                <div class="ea-carousel__container-sliders-slide-image">
                    <?php echo wp_get_attachment_image(1842, 'full') ?>
                </div>
            </li>
        </ul>
    </div>
    <button type="button" class="ea-carousel__btn ea-carousel__btn-right" aria-label="<?php esc_attr_e('next slide button', 'lodgings_collective_theme'); ?>" aria-controls="ea-carousel__container"><?php echo wp_get_attachment_image(1845, 'full') ?></button>
</div>

