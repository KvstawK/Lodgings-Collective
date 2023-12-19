<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get the conversion rate for a given currency
 *
 * @param string $currency_code
 *
 * @return int
 *
 */
function wpbs_get_currency_rate($currency_code)
{

    if (wpbs_auto_currency_rate_enabled()) {

        $currencies = wpbs_get_currency_auto_rates();

        if (isset($currencies[$currency_code])) {
            return $currencies[$currency_code];
        }

    }

    $settings = get_option('wpbs_settings');

    if (isset($settings['currency_conversion_' . strtolower($currency_code)]) && !empty($settings['currency_conversion_' . strtolower($currency_code)])) {
        return $settings['currency_conversion_' . strtolower($currency_code)];
    }

    return 1;
}

/**
 * Check if automatic conversion rate is enabled
 *
 * @return bool
 *
 */
function wpbs_auto_currency_rate_enabled()
{

    $settings = get_option('wpbs_settings');

    if (!isset($settings['multiple_currencies_auto_rate'])) {
        return false;
    }

    if($settings['multiple_currencies_auto_rate'] != 'on'){
        return false;
    }

    return true;
}

/**
 * Get the conversion rates from the database or from an online service
 *
 * @return mixed bool|array
 *
 */
function wpbs_get_currency_auto_rates()
{

    if (!wpbs_auto_currency_rate_enabled()) {
        return false;
    }

    if (get_transient('currency_rates_' . wpbs_get_currency())) {
        return get_transient('currency_rates_' . wpbs_get_currency());
    }

    $currency_rates = wpbs_update_currency_auto_rates();

    if($currency_rates === false){
        return get_option('wpbs_currency_rates');
    }

    set_transient('currency_rates_' . wpbs_get_currency(), $currency_rates, DAY_IN_SECONDS);
    update_option('wpbs_currency_rates', $currency_rates);

    return $currency_rates;

}

/**
 * Get the conversion rates from https://fixer.io
 *
 * @return array
 *
 */
function wpbs_update_currency_auto_rates()
{

    $settings = get_option('wpbs_settings');

    $currency_rates = wp_remote_get('http://data.fixer.io/latest?access_key=' . $settings['multiple_currencies_exchangerate_apikey']);

    $currencies = json_decode($currency_rates['body'], true);

    // Update API to use API Layer key.
    if (isset($currencies['error']['code']) && $currencies['error']['code'] == 101) {
        $currency_rates = wp_remote_get('https://api.apilayer.com/fixer/latest', array(
            'headers' => array('apikey' => $settings['multiple_currencies_exchangerate_apikey']),
        ));
    }

    if(is_wp_error($currency_rates)){
        return false;
    }

    $currencies = json_decode($currency_rates['body'], true);

    if (isset($currencies['error'])) {
        echo '
        <div class="wpbs-page-notice notice-error wpbs-form-changed-notice">
            <p>' . $currencies['error']['info'] . '</p>
        </div>
        ';
    }

    if ($currencies['base'] != wpbs_get_currency()) {
        $base = $currencies['rates'][wpbs_get_currency()];
        foreach ($currencies['rates'] as $code => $rate) {
            $formatted_currencies[$code] = round($rate / $base, 6);
        }
    } else {
        $formatted_currencies = $currencies['rates'];
    }

    return $formatted_currencies;

}
