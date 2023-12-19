<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Adds a new tab to the Settings page of the plugin
 *
 * @param array $tabs
 *
 * @return $tabs
 *
 */
function wpbs_submenu_page_settings_tabs_sms($tabs)
{

    $tabs['sms'] = __('SMS', 'wp-booking-system-search');

    return $tabs;

}
add_filter('wpbs_submenu_page_settings_tabs', 'wpbs_submenu_page_settings_tabs_sms', 10);

/**
 * Adds the HTML for the Search Add-on Setting tab
 *
 */
function wpbs_submenu_page_settings_tab_sms()
{

    $twilio_api = get_option('wpbs_twilio_api', array());
    $settings = get_option('wpbs_settings', array());

    include 'views/view-settings-tab-sms.php';

}
add_action('wpbs_submenu_page_settings_tab_sms', 'wpbs_submenu_page_settings_tab_sms');

/**
 * Save twilio API Keys in a separate option field.
 *
 */
function wpbs_sms_save_api_keys($option_name, $old_value, $value)
{
    // If wpbs_settings are being saved
    if ($option_name != 'wpbs_settings') {
        return false;
    }

    // If isset twilio api post data
    if (!isset($_POST['wpbs_twilio_api'])) {
        return false;
    }

    // Do the update
    update_option('wpbs_twilio_api', $_POST['wpbs_twilio_api']);

};
add_action('updated_option', 'wpbs_sms_save_api_keys', 10, 3);

/**
 * Send a test SMS
 *
 */
function wpbs_twilio_test_sms()
{
    $twilio = new WPBS_Twilio_API();

    $phone_number = sanitize_text_field($_POST['phone_number']);

    if (!$phone_number) {
        echo '<div class="wpbs-page-notice notice-error">
            <p>' . __('Please enter your phone number', 'wp-booking-system-sms') . '</p>
        </div>';
        exit;
    }

    $response = $twilio->send($phone_number, 'This is a test message sent by WP Booking System.');

    if ($response === false) {
        echo '<div class="wpbs-page-notice notice-error">
            <p>' . __('Please enter your Twilio API credentials.', 'wp-booking-system-sms') . '</p>
        </div>';
        exit;
    }

    if ($response['success']) {
        echo '<div class="wpbs-page-notice notice-success">
            <p>' . __('SMS Message sent.', 'wp-booking-system-sms') . '</p>
        </div>';
        exit;
    } else {
        echo '<div class="wpbs-page-notice notice-error">
            <p>' . $response['error'] . '</p>
        </div>';
        exit;
    }

    exit;
}
add_action('wp_ajax_wpbs_twilio_test_sms', 'wpbs_twilio_test_sms');
