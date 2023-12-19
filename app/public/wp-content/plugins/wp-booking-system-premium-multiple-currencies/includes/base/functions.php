<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Includes the Base files
 *
 */
function wpbs_mc_include_files_base()
{

    // Get legend dir path
    $dir_path = plugin_dir_path(__FILE__);

    // Include currency functions
    if (file_exists($dir_path . 'functions-currencies.php')) {
        include $dir_path . 'functions-currencies.php';
    }

    // Include auto-rates functions
    if (file_exists($dir_path . 'functions-auto-rates.php')) {
        include $dir_path . 'functions-auto-rates.php';
    }

}
add_action('wpbs_include_files', 'wpbs_mc_include_files_base');

/**
 * Add currency option to Discounts and Coupons add-on
 * 
 */
add_filter('wpbs_discount_rules', function($rules){
    $rules['currency'] = __('Currency', 'wp-booking-system-multiple-currencies');
    return $rules;
});