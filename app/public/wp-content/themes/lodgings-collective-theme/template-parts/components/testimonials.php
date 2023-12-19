<div aria-roledescription="testimonials" class="testimonials" aria-label="<?php esc_attr_e('Highlighted images of our testimonials', 'lodgings_collective_theme'); ?>">
    <div tabindex="0" role="tablist" class="testimonials__nav" aria-label="<?php esc_attr_e('Slides', 'lodgings_collective_theme'); ?>">
        <div tabindex="0" role="tab" class="testimonials__nav-dot active" aria-selected="true" aria-controls="testimonial-item-1" aria-label="<?php esc_attr_e('Slide 1', 'lodgings_collective_theme'); ?>"></div>
        <div tabindex="0" role="tab" class="testimonials__nav-dot" aria-selected="false" aria-controls="testimonial-item-2" aria-label="<?php esc_attr_e('Slide 2', 'lodgings_collective_theme'); ?>"></div>
    </div>
    <div class="testimonials__container" aria-live="polite">
        <ul class="testimonials__container-sliders">
            <li role="tabpanel" class="testimonials__container-sliders-item active" aria-roledescription="<?php esc_attr_e('slide', 'lodgings_collective_theme');?>" aria-selected="true" aria-label="<?php esc_attr_e('1 of 2', 'lodgings_collective_theme'); ?>">
                <div class="testimonials__container-sliders-item-slide">
                    <?php echo wp_get_attachment_image(1869, 'full') ?>
                </div>
                <div class="testimonials__container-sliders-item-slide">
                    <?php echo wp_get_attachment_image(1869, 'full') ?>
                </div>
                <div class="testimonials__container-sliders-item-slide">
                    <?php echo wp_get_attachment_image(1869, 'full') ?>
                </div>
            </li>
        </ul>
    </div>
</div>

