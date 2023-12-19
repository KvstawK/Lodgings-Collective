<?php
function wpbs_mc_settings_page($settings)
{
    
    ?>

    <h2><?php echo __('Multiple Currencies', 'wp-booking-system-multiple-currencies') ?></h2>

    <!-- Custom Currencies -->
    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="multiple_currencies">
            <?php echo __('Additional Currencies', 'wp-booking-system-multiple-currencies'); ?>
            <?php echo wpbs_get_output_tooltip(__('Additional currencies that the customer can switch between. Make sure the Payment Gateways you use all support the selected currencies.', 'wp-booking-system-multiple-currencies')) ?>
        </label>

        <div class="wpbs-settings-field-inner wpbs-chosen-wrapper">
            <select name="wpbs_settings[multiple_currencies][]" id="multiple_currencies" class="wpbs-chosen" multiple>
                <?php $currencies = wpbs_get_currencies(); foreach ($currencies as $currency_code => $currency_name): if($currency_code == wpbs_get_currency()) continue; ?>
                    <option <?php echo isset($settings['multiple_currencies']) && in_array($currency_code, $settings['multiple_currencies']) ? 'selected' : ''; ?> value="<?php echo $currency_code; ?>"><?php echo $currency_code ?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="multiple_currencies_auto_rate">
            <?php echo __('Auto Rates', 'wp-booking-system-multiple-currencies'); ?>
            <?php echo wpbs_get_output_tooltip(__('Enabling this will automatically retrieve the conversion rates from https://exchangeratesapi.io/. Rates are updated daily.', 'wp-booking-system-multiple-currencies')) ?>
        </label>

        <div class="wpbs-settings-field-inner">
            <label for="multiple_currencies_auto_rate" class="wpbs-checkbox-switch">
                <input type="hidden" name="wpbs_settings[multiple_currencies_auto_rate]" value="0">
                <input name="wpbs_settings[multiple_currencies_auto_rate]" type="checkbox" id="multiple_currencies_auto_rate"  class="regular-text wpbs-settings-toggle " <?php echo (!empty($settings['multiple_currencies_auto_rate'])) ? 'checked' : ''; ?> >
                <div class="wpbs-checkbox-slider"></div>
            </label>
        </div>
    </div>

    <div id="wpbs-auto-currency-api">

        <!-- Custom Currencies -->
        <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
            <label class="wpbs-settings-field-label" for="multiple_currencies_exchangerate_apikey">
                <?php echo __('Auto Rates - API Key', 'wp-booking-system-multiple-currencies'); ?>
                <?php echo wpbs_get_output_tooltip(__('Your <a href="https://fixer.io/" target="_blank">https://fixer.io/</a> API Key.', 'wp-booking-system-multiple-currencies')) ?>
            </label>

            <div class="wpbs-settings-field-inner wpbs-chosen-wrapper">
                <input type="text" name="wpbs_settings[multiple_currencies_exchangerate_apikey]" id="multiple_currencies_exchangerate_apikey" value="<?php echo (!empty($settings['multiple_currencies_exchangerate_apikey'])) ? $settings['multiple_currencies_exchangerate_apikey'] : ''; ?>">
            </div>

            <?php if(empty($settings['multiple_currencies_exchangerate_apikey'])): ?>
            <div class="wpbs-page-notice notice-info wpbs-form-changed-notice">
                <p><?php echo __('You will need to sign up for a free API key at <a href="https://fixer.io/" target="_blank">https://fixer.io/</a>', 'wp-booking-system-multiple-currencies') ?></p>
            </div>
            <?php else: ?>
                <?php $currency_rates = wpbs_get_currency_auto_rates(); ?>
            <?php endif; ?>
        </div>
        
    </div>

    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="">
            <?php echo __('Conversion Rates', 'wp-booking-system-multiple-currencies'); ?>
        </label>
        <div class="wpbs-settings-field-inner wpbs-settings-field-inner-currency-rates">
            <?php if(isset($settings['multiple_currencies']) && !empty($settings['multiple_currencies'])): ?>
                <?php foreach($settings['multiple_currencies'] as $currency): ?>
                    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
                        <label class="wpbs-settings-field-label" for="currency_conversion_<?php echo strtolower($currency);?>">
                            <img src="<?php echo WPBS_PLUGIN_DIR_URL; ?>assets/img/flags/<?php echo wpbs_currency_flags($currency);?>.png">
                            <?php echo $currency;?>
                        </label>
                        <div class="wpbs-settings-field-inner">

                            <?php 
                            if(isset($currency_rates) && !empty($currency_rates)){
                                $value = $currency_rates[$currency];
                            } else {
                                $value = (!empty($settings['currency_conversion_' . strtolower($currency)]) ? esc_attr($settings['currency_conversion_' . strtolower($currency)]) : '');
                            }
                            ?>

                            <input name="wpbs_settings[currency_conversion_<?php echo strtolower($currency);?>]" type="number" step="0.00001" id="currency_conversion_<?php echo strtolower($currency);?>" value="<?php echo $value; ?>" class="wpbs-currency-conversion-input regular-text" <?php echo (isset($settings['multiple_currencies_auto_rate']) && $settings['multiple_currencies_auto_rate']) ? 'disabled' : '';?>>
                        </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="wpbs-page-notice notice-info wpbs-form-changed-notice">
                    <p><?php echo __('After selecting some currencies and saving the page, the conversion rates will appear here.', 'wp-booking-system-multiple-currencies') ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <?php
}
add_action('wpbs_submenu_page_settings_tab_payment_general_bottom', 'wpbs_mc_settings_page', 20, 1);
