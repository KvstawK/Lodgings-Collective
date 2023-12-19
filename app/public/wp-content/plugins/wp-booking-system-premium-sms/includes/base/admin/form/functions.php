<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add the SMS Notifications tab to the Form Editor page
 *
 * @param array $tabs
 *
 * @return array
 *
 */
function wpbs_sms_submenu_page_edit_form_tabs($tabs)
{

    $settings = get_option('wpbs_settings', array());

    if (!isset($settings['sms_notifications']) || $settings['sms_notifications'] != 'on') {
        return $tabs;
    }

    $tabs = array_slice($tabs, 0, 3, true) +
    array('sms-notifications' => __('SMS Notifications', 'wp-booking-system-sms')) +
    array_slice($tabs, 3, count($tabs) - 3, true);

    return $tabs;

}
add_filter('wpbs_submenu_page_edit_form_tabs', 'wpbs_sms_submenu_page_edit_form_tabs');

/**
 * Add the content for the SMS Notifications tab
 *
 */
function wpbs_submenu_page_edit_form_tab_sms_notifications()
{
    $form_id   = absint( ! empty( $_GET['form_id'] ) ? $_GET['form_id'] : 0 );
    $form      = wpbs_get_form( $form_id );

    if( is_null( $form ) )
        return;

    $form_meta = wpbs_get_form_meta($form_id);
    $form_data = $form->get('fields');

    require 'views/view-edit-form-tab-sms-notifications.php';
}
add_action('wpbs_submenu_page_edit_form_tab_sms-notifications', 'wpbs_submenu_page_edit_form_tab_sms_notifications');

/**
 * Add SMS Notification sub tabs
 *
 */
function wpbs_sms_form_get_sub_tabs()
{
    $tabs = array(
        'admin-notification' => __('Admin Notification', 'wp-booking-system-sms'),
        'user-notification' => __('User Notification', 'wp-booking-system-sms'),
        'payment-notification' => __('Final Payment Reminder Notification', 'wp-booking-system-sms'),
        'reminder-notification' => __('Reminder Notification', 'wp-booking-system-sms'),
        'follow-up-notification' => __('Follow Up Notification', 'wp-booking-system-sms'),
    );

    /**
     * Filter the tabs before returning
     *
     * @param array $tabs
     *
     */
    $tabs = apply_filters('wpbs_submenu_page_edit_form_sms_sub_tabs', $tabs);

    return $tabs;
}

/**
 * Save meta fields
 *
 */
function wpbs_sms_edit_form_meta_fields($meta_fields)
{
    
    $meta_fields['admin_sms_notification_enable'] = array('translations' => false, 'sanitization' => 'sanitize_text_field', 'checkbox' => true);
    $meta_fields['admin_sms_notification_send_to'] = array('translations' => false, 'sanitization' => 'sanitize_text_field');
    $meta_fields['admin_sms_notification_message'] = array('translations' => false, 'sanitization' => 'sanitize_textarea_field');

    $meta_fields['user_sms_notification_enable'] = array('translations' => false, 'sanitization' => 'sanitize_text_field', 'checkbox' => true);
    $meta_fields['user_sms_notification_send_to'] = array('translations' => false, 'sanitization' => 'sanitize_text_field');
    $meta_fields['user_sms_notification_message'] = array('translations' => true, 'sanitization' => 'sanitize_textarea_field');

    $meta_fields['payment_sms_notification_enable'] = array('translations' => false, 'sanitization' => 'sanitize_text_field', 'checkbox' => true);
    $meta_fields['payment_sms_notification_send_to'] = array('translations' => false, 'sanitization' => 'sanitize_text_field');
    $meta_fields['payment_sms_notification_when_to_send'] = array('translations' => false, 'sanitization' => 'sanitize_text_field');
    $meta_fields['payment_sms_notification_message'] = array('translations' => true, 'sanitization' => 'sanitize_textarea_field');

    $meta_fields['reminder_sms_notification_enable'] = array('translations' => false, 'sanitization' => 'sanitize_text_field', 'checkbox' => true);
    $meta_fields['reminder_sms_notification_send_to'] = array('translations' => false, 'sanitization' => 'sanitize_text_field');
    $meta_fields['reminder_sms_notification_when_to_send'] = array('translations' => false, 'sanitization' => 'sanitize_text_field');
    $meta_fields['reminder_sms_notification_message'] = array('translations' => true, 'sanitization' => 'sanitize_textarea_field');

    $meta_fields['follow_up_sms_notification_enable'] = array('translations' => false, 'sanitization' => 'sanitize_text_field', 'checkbox' => true);
    $meta_fields['follow_up_sms_notification_send_to'] = array('translations' => false, 'sanitization' => 'sanitize_text_field');
    $meta_fields['follow_up_sms_notification_when_to_send'] = array('translations' => false, 'sanitization' => 'sanitize_text_field');
    $meta_fields['follow_up_sms_notification_message'] = array('translations' => true, 'sanitization' => 'sanitize_textarea_field');

    return $meta_fields;
}
add_filter('wpbs_edit_forms_meta_fields', 'wpbs_sms_edit_form_meta_fields', 10, 1);