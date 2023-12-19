<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add the currency selector to the pricing table
 *
 * @param string $output
 * @param array $line_items
 * @param array @prices
 *
 * @return string
 *
 */
function wpbs_pricing_table_currency_selector($output, $line_items, $prices, $language)
{

    $settings = get_option('wpbs_settings');

    if(!isset($settings['multiple_currencies'])){
        return $output;
    }

    $available_currencies = $settings['multiple_currencies'];

    if(!is_array($available_currencies)){
        return $output;
    }

    array_unshift($available_currencies, wpbs_get_currency());

    $output .= '<div class="wpbs-currency-toggle-wrapper">';
    $output .= '<a href="#" class="wpbs-currency-toggle-button">'.wpbs_get_payment_default_string('currency', $language).'</a>';
    $output .= '<ul class="wpbs-currency-toggle-list wpbs-currency-selector">';

    foreach ($available_currencies as $available_currency) {

        $output .= '<li><a' . ($available_currency == $prices['currency'] ? ' class="wpbs-currency-toggle-selected"' : '') . ' href="#" data-wpbs-currency-value="' . $available_currency . '"><img src="' . WPBS_PLUGIN_DIR_URL . 'assets/img/flags/' . wpbs_currency_flags($available_currency) . '.png" /> ' . $available_currency . '</a></li>';
    }

    $output .= '</ul>';
    $output .= '</div>';

    return $output;
}
add_filter('wpbs_pricing_table_before', 'wpbs_pricing_table_currency_selector', 10, 4);


/**
 * Save the selected custom currency as a form input
 * 
 */
function wpbs_add_custom_currency_field($output, $form, $args){

    if(isset($_POST['form_data'])){
        parse_str($_POST['form_data'], $post_data);
    }

    // Use default one.
    $currency = wpbs_get_currency();

    // If a currency is provided as a shortcode arg, use that one instead
    if(isset($args['currency'])){
        $currency = $args['currency'];
    }

    // If a currency is passed through post_data, use that one instead
    if(isset($post_data['wpbs-custom-currency'])){
        $currency = $post_data['wpbs-custom-currency'];
    }

    $output .= '<input type="hidden" name="wpbs-custom-currency" class="wpbs-custom-currency" value="' . $currency . '">';

    return $output;
}
add_filter('wpbs_form_outputter_form_fields_after', 'wpbs_add_custom_currency_field', 10, 3);



/**
 * Change the currency
 *
 * @param array $prices
 * @param array $post
 *
 * @return array
 *
 */
function wpbs_payment_set_custom_currency($prices, $post)
{
    if (in_array($prices['payment_method'], wpbs_mc_get_unsupported_gateways())) {
        return $prices;
    }

    $data_source = false;

    if (isset($post['post_data'])) {
        $data_source = 'post_data';
    }

    if (isset($post['form_data'])) {
        $data_source = 'form_data';
    }

    if ($data_source === false) {
        return $prices;
    }

    parse_str($post[$data_source], $post_data);

    if (!isset($post_data['wpbs-custom-currency'])) {
        return $prices;
    }

    if ($post_data['wpbs-custom-currency'] == wpbs_get_currency()) {
        return $prices;
    }

    $settings = get_option('wpbs_settings');

    $available_currencies = isset($settings['multiple_currencies']) ? $settings['multiple_currencies'] : [];

    if (!in_array($post_data['wpbs-custom-currency'], $available_currencies)) {
        return $prices;
    }

    $prices['base_currency'] = $prices['currency'];
    $prices['original_total'] = $prices['total'];

    $prices['currency'] = $post_data['wpbs-custom-currency'];
    $prices['custom_currency'] = true;

    $prices['conversion_rate'] = wpbs_get_currency_rate($post_data['wpbs-custom-currency']);

    return $prices;

}
add_filter('wpbs_payment_prices', 'wpbs_payment_set_custom_currency', 10, 2);

/**
 * Filter for modifying the prices
 *
 * @param int $price
 * @param array $prices
 *
 * @return int
 *
 */
function wpbs_payment_apply_currency_conversion($price, $prices)
{

    if (!isset($prices['custom_currency'])) {
        return $price;
    }

    if ($price == 0) {
        return $price;
    }

    return $price * $prices['conversion_rate'];

}
add_filter('wpbs_pricing_item_modifier', 'wpbs_payment_apply_currency_conversion', 20, 2);



/**
 * An array with flag names for all the currencies
 *
 * @param string $currency
 *
 * @return string
 *
 */
function wpbs_currency_flags($currency)
{
    $flags = array(
        'AUD' => 'au',
        'BGN' => 'bg',
        'BRL' => 'br',
        'CAD' => 'canada',
        'CHF' => 'ch',
        'CZK' => 'cs',
        'DKK' => 'da',
        'GBP' => 'gb',
        'HKD' => 'hk',
        'HRK' => 'hr',
        'HUF' => 'hu',
        'ILS' => 'il',
        'JPY' => 'jp',
        'INR' => 'in',
        'MXN' => 'mx',
        'MYR' => 'my',
        'NOK' => 'no',
        'NZD' => 'nz',
        'PHP' => 'ph',
        'PLN' => 'pl',
        'RON' => 'ro',
        'RUB' => 'ru',
        'SEK' => 'sr',
        'SGD' => 'sg',
        'THB' => 'th',
        'USD' => 'us',
        'ZAR' => 'za',
        'EUR' => 'europeanunion',
    );

    return $flags[$currency];
}

/**
 * An array with Payment Gateways which do not support custom currencies
 *
 * @return array
 */
function wpbs_mc_get_unsupported_gateways()
{
    return array('authorize_net', 'square');
}


/**
 * Make strings translatable - add default strings for currencies
 *
 * @param array $strings
 *
 * @return array
 *
 */
function wpbs_mc_payment_default_strings($strings)
{
    $strings['currency'] = __('currency', 'wp-booking-system');

    return $strings;
}
add_filter('wpbs_payment_default_strings', 'wpbs_mc_payment_default_strings');

/**
 * Make strings translatable - add form fields strings for currencies
 *
 * @param array $strings
 *
 * @return array
 *
 */
function wpbs_mc_payment_default_strings_labels($strings)
{
    $strings['currency'] = array(
        'label' => __('Currency', 'wp-booking-system'),
        'tooltip' => __("The label for currency selector dropdown.", 'wp-booking-system'),
    );

    return $strings;
}
add_filter('wpbs_payment_default_strings_labels', 'wpbs_mc_payment_default_strings_labels');
