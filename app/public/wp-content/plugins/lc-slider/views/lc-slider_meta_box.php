<?php
$values =  get_post_meta( $post->ID );

 multi_media_uploader_field($name = '', $value = '')
?>
<div class="lc-slider__options">
    <input type="hidden" name="lc_slider_nonce" value="<?php echo wp_create_nonce('lc_slider_nonce') ?>">
    <div class="lc-slider__options-images">
        <div class="lc-slider__options-images-text"><?php esc_html_e('Slider\'s Images', 'lc-slider'); ?></div>
        <div class="lc-slider__options-images-attachments">
            <?php echo multi_media_uploader_field( 'images', get_post_meta($post->ID,'images',true) ); ?>
        </div>
    </div>
    <div class="lc-slider__options-checkboxes">
    <div class="lc-slider__options-checkboxes-item">
            <div><?php esc_html_e('Check to change image sizes:', 'lc-slider'); ?></div>
            <div><label for="thumbnail"><?php esc_html_e('Thumbnail:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="thumbnail" id="thumbnail" class="checkbox checkbox-sizes" value="true" <?php if ( isset ( $values['thumbnail'] ) ) checked( $values['thumbnail'][0], 'true' ); ?>>
            </div>
            <div><label for="medium"><?php esc_html_e('Medium:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="medium" id="medium" class="checkbox checkbox-sizes" value="true" <?php if ( isset ( $values['medium'] ) ) checked( $values['medium'][0], 'true' ); ?>>
            </div>
            <div><label for="large"><?php esc_html_e('Large:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="large" id="large" class="checkbox checkbox-sizes" value="true" <?php if ( isset ( $values['large'] ) ) checked( $values['large'][0], 'true' ); ?>>
            </div>
            <div><label for="full"><?php esc_html_e('Full:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="full" id="full" class="checkbox checkbox-sizes" value="true" <?php if ( isset ( $values['full'] ) ) checked( $values['full'][0], 'true' ); ?>>
            </div>
        </div>
        <div class="lc-slider__options-checkboxes-item">
            <div><label for="image-link"><?php esc_html_e('Check if you would like the image to be the link from the "Attachments Details" in Media Library:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="image-link" id="image-link" class="checkbox" value="true" <?php if ( isset ( $values['image-link'] ) ) checked( $values['image-link'][0], 'true' ); ?>>
            </div>
        </div>
        <div class="lc-slider__options-checkboxes-item">
            <div><label for="image-appear-disappear-slider"><?php esc_html_e('Check if you want the "image appearing-disappearing" type of slider:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="image-appear-disappear-slider" id="image-appear-disappear-slider" class="checkbox" value="true" <?php if ( isset ( $values['image-appear-disappear-slider'] ) ) checked( $values['image-appear-disappear-slider'][0], 'true' ); ?>>
            </div>
        </div>
        <div class="lc-slider__options-checkboxes-item">
        <div><label for="dots"><?php esc_html_e('Check if you would like to display bullets:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="dots" id="dots" class="checkbox" value="true" <?php if ( isset ( $values['dots'] ) ) checked( $values['dots'][0], 'true' ); ?>>
            </div>
        </div>
        <div class="lc-slider__options-checkboxes-item">
            <div><label for="dots-carousel"><?php esc_html_e('Check if you would like to display a second slider like bullets:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="dots-carousel" id="dots-carousel" class="checkbox" value="true" <?php if ( isset ( $values['dots-carousel'] ) ) checked( $values['dots-carousel'][0], 'true' ); ?>>
            </div>
        </div>
        <div class="lc-slider__options-checkboxes-item">
            <div><label for="content"><?php esc_html_e('Check if you would like to display the content:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="content" id="content" class="checkbox" value="true" <?php if ( isset ( $values['content'] ) ) checked( $values['content'][0], 'true' ); ?>>
            </div>
        </div>
        <div class="lc-slider__options-checkboxes-item">
            <div><label for="2-slide-carousel"><?php esc_html_e('Check if you would like to display 2 slides in 1 in desktop:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="2-slide-carousel" id="2-slide-carousel" class="checkbox" value="true" <?php if ( isset ( $values['2-slide-carousel'] ) ) checked( $values['2-slide-carousel'][0], 'true' ); ?>>
            </div>
        </div>
        <div class="lc-slider__options-checkboxes-item">
            <div><label for="3-slide-carousel"><?php esc_html_e('Check if you would like to display 3 slides in 1 in desktop:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="3-slide-carousel" id="3-slide-carousel" class="checkbox" value="true" <?php if ( isset ( $values['3-slide-carousel'] ) ) checked( $values['3-slide-carousel'][0], 'true' ); ?>>
            </div>
        </div>
        <div class="lc-slider__options-checkboxes-item">
            <div><label for="lightbox"><?php esc_html_e('Check if you would like to have a lightbox:', 'lc-slider'); ?></label></div>
            <div>
                <input type="checkbox" name="lightbox" id="lightbox" class="checkbox" value="true" <?php if ( isset ( $values['lightbox'] ) ) checked( $values['lightbox'][0], 'true' ); ?>>
            </div>
        </div>
    </div>
</div>
