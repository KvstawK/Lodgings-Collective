<?php

$value = get_post_meta($post->ID,'lc_slider_options',true);

var_dump($value);
?>

<div class="lc-slider__options">
    <input type="hidden" name="lc_slider_nonce" value="<?php echo wp_create_nonce('lc_slider_nonce') ?>">
    <div class="lc-slider__options-item">
        <label for="lc-slider__options_field"><?php esc_html_e('Check if you would like to display bullets:', 'lc-slider'); ?></label>
        <input type="checkbox" name="lc-slider__options_field" id="lc-slider__options_field" class="checkbox" value="true" <?php if ( isset ( $value['lc_slider_options'] ) ) checked( $value['lc_slider_options'][0], 'true' ); ?>><br>
    </div>
    <div class="lc-slider__options-item">
        <label for="lc-slider__options_field"><?php esc_html_e('Check if you would like to display a second slider like bullets:', 'lc-slider'); ?></label>
        <input type="checkbox" name="lc-slider__options_field" id="lc-slider__options_field" class="checkbox" value=""><br>
    </div>
    <div class="lc-slider__options-item">
        <label for="lc-slider__options_field"><?php esc_html_e('Check if you would like to have a lightbox:', 'lc-slider'); ?></label>
        <input type="checkbox" name="lc-slider__options_field" id="lc-slider__options_field" class="checkbox" value=""><br>
    </div>
</div>
