<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Includes the files needed for the Twilio API
 *
 */
function wpbs_sms_include_files_booking()
{

    // Get form dir path
    $dir_path = plugin_dir_path(__FILE__);

    // Include SMS Logging functions
    if (file_exists($dir_path . 'functions-sms-logs.php')) {
        include $dir_path . 'functions-sms-logs.php';
    }


}
add_action('wpbs_include_files', 'wpbs_sms_include_files_booking');