<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Includes the files needed for the Twilio API
 *
 */
function wpbs_include_files_twilio_api()
{

    // Include Twilio API
    if (file_exists(WPBS_SMS_PLUGIN_DIR . 'libs/twilio/class-twilio-api.php')) {
        include WPBS_SMS_PLUGIN_DIR . 'libs/twilio/class-twilio-api.php';
    }

}
add_action('wpbs_include_files', 'wpbs_include_files_twilio_api');


/**
 * Check if the SMS functionality is enabled and the API keys are present.
 *
 * @return bool
 * 
 */
function wpbs_sms_is_enabled(){
    $settings = get_option('wpbs_settings', array());
    
    if(!isset($settings['sms_notifications'])){
        return false;
    }

    if($settings['sms_notifications'] != 'on'){
        return false;
    }

    $twilio_api = get_option('wpbs_twilio_api', array());

    if(!isset($twilio_api['twilio_account_sid'])  || empty($twilio_api['twilio_account_sid'])){
        return false;
    }
    if(!isset($twilio_api['twilio_auth_token'])  || empty($twilio_api['twilio_auth_token'])){
        return false;
    }
    if(!isset($twilio_api['twilio_phone_number'])  || empty($twilio_api['twilio_phone_number'])){
        return false;
    }
    
    return true;
}