<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Adds the HTML for the Cron Regeneration tab
 *
 */
function wpbs_sms_submenu_page_settings_tab_regenerate_crons()
{

    include 'views/view-regenerate-crons.php';
}
add_action('wpbs_submenu_page_settings_tab_tools', 'wpbs_sms_submenu_page_settings_tab_regenerate_crons', 20, 1);

/**
 * Registers the admin notices
 *
 */
function wpbs_register_admin_notices_regenerate_sms_cron_jobs()
{

    if (empty($_GET['wpbs_message'])) {
        return;
    }

    /**
     * Register website notices
     *
     */
    wpbs_admin_notices()->register_notice('cron_sms_regenerate_success', '<p>' . __('Cron jobs successfully regenerated.', 'wp-booking-system') . '</p>');
}
add_action('admin_init', 'wpbs_register_admin_notices_regenerate_sms_cron_jobs');

/**
 * Action that regenerates cron jobs
 *
 */
function wpbs_action_regenerate_sms_cron_jobs()
{

    // Verify for nonce
    if (empty($_GET['wpbs_token']) || !wp_verify_nonce($_GET['wpbs_token'], 'wpbs_regenerate_sms_cron_jobs')) {
        return;
    }
    // Delete crons
    $crons = _get_cron_array();

    foreach ($crons as $timestamp => $cron) {
        if (isset($cron['wpbs_sms_reminder_notification'])) {
            unset($crons[$timestamp]['wpbs_sms_reminder_notification']);
        }
        if (isset($cron['wpbs_sms_follow_up_notification'])) {
            unset($crons[$timestamp]['wpbs_sms_follow_up_notification']);
        }
        if (isset($cron['wpbs_sms_payment_notification'])) {
            unset($crons[$timestamp]['wpbs_sms_payment_notification']);
        }
    }

    foreach ($crons as $timestamp => $cron) {
        if (!$cron) {
            unset($crons[$timestamp]);
        }
    }

    _set_cron_array($crons);

    $bookings = wpbs_get_bookings();

    // Reschedule Reminder SMS
    foreach ($bookings as $booking) {

        if ($booking->get('status') == 'trash') {
            continue;
        }

        if (wpbs_get_form_meta($booking->get('form_id'), 'reminder_sms_notification_enable', true) != 'on') {
            continue;
        }

        $form = wpbs_get_form($booking->get('form_id'));
        $calendar = wpbs_get_calendar($booking->get('calendar_id'));
        $start_date = strtotime($booking->get('start_date'));
        $end_date = strtotime($booking->get('end_date'));

        $phone_number = wpbs_get_form_meta($form->get('id'), 'reminder_sms_notification_send_to', true);

        // Parse dynamic tags
        $email_tags = new WPBS_Email_Tags($form, $calendar, $booking->get('id'), $booking->get('fields'), wpbs_get_booking_meta($booking->get('id'), 'submitted_language', true), $start_date, $end_date);

        $phone_number = $email_tags->parse($phone_number);

        if (empty($phone_number)) {
            continue;
        }

        if ($start_date < current_time('timestamp')) {
            continue;
        }

        // When to send?
        $days_before = wpbs_get_form_meta($form->get('id'), 'reminder_sms_notification_when_to_send', true) * DAY_IN_SECONDS;
        $when_to_send = $start_date - $days_before;

        if (function_exists('wpbs_scheduled_email_delivery_hour')) {
            $when_to_send += wpbs_scheduled_email_delivery_hour();
        }

        if ($when_to_send < current_time('timestamp')) {
            continue;
        }

        // Schedule the SMS
        wp_schedule_single_event($when_to_send, 'wpbs_sms_reminder_notification', array($form, $calendar, $booking->get('id'), $booking->get('fields'), wpbs_get_booking_meta($booking->get('id'), 'submitted_language', true), $start_date, $end_date));
    }

    // Reschedule Follow-up SMS
    foreach ($bookings as $booking) {

        if ($booking->get('status') == 'trash') {
            continue;
        }

        if (wpbs_get_form_meta($booking->get('form_id'), 'follow_up_sms_notification_enable', true) != 'on') {
            continue;
        }

        $form = wpbs_get_form($booking->get('form_id'));
        $calendar = wpbs_get_calendar($booking->get('calendar_id'));
        $start_date = strtotime($booking->get('start_date'));
        $end_date = strtotime($booking->get('end_date'));


        $phone_number = wpbs_get_form_meta($form->get('id'), 'follow_up_sms_notification_send_to', true);

        // Parse dynamic tags
        $email_tags = new WPBS_Email_Tags($form, $calendar, $booking->get('id'), $booking->get('fields'), wpbs_get_booking_meta($booking->get('id'), 'submitted_language', true), $start_date, $end_date);

        $phone_number = $email_tags->parse($phone_number);

        if (empty($phone_number)) {
            continue;
        }

        // When to send?
        $days_after = wpbs_get_form_meta($form->get('id'), 'follow_up_sms_notification_when_to_send', true) * DAY_IN_SECONDS;
        $when_to_send = $end_date + $days_after;

        if (function_exists('wpbs_scheduled_email_delivery_hour')) {
            $when_to_send += wpbs_scheduled_email_delivery_hour();
        }

        if ($when_to_send < current_time('timestamp')) {
            continue;
        }

        // Schedule the SMS
        wp_schedule_single_event($when_to_send, 'wpbs_sms_follow_up_notification', array($form, $calendar, $booking->get('id'), $booking->get('fields'), wpbs_get_booking_meta($booking->get('id'), 'submitted_language', true), $start_date, $end_date));
    }

    // Reschedule Payment SMS
    foreach ($bookings as $booking) {

        if ($booking->get('status') == 'trash') {
            continue;
        }


        $settings = get_option('wpbs_settings', array());

        if (!isset($settings['payment_part_payments_method'])) {
            continue;
        }

        if ($settings['payment_part_payments_method'] != 'initial') {
            continue;
        }

        // Check if notification is enabled
        if (wpbs_get_form_meta($booking->get('form_id'), 'payment_sms_notification_enable', true) != 'on') {
            continue;
        }

        $form = wpbs_get_form($booking->get('form_id'));
        $calendar = wpbs_get_calendar($booking->get('calendar_id'));
        $start_date = strtotime($booking->get('start_date'));
        $end_date = strtotime($booking->get('end_date'));

        $payment = wpbs_get_payment_by_booking_id($booking->get('id'));
        if (empty($payment)) {
            continue;
        }

        if (!$payment->is_part_payment()) {
            continue;
        }

        // If payment has a deposit
        if (!$payment->is_deposit_paid() && $payment->get('gateway') != 'bank_transfer') {
            continue;
        }

        // Get the phone number
        $phone_number = wpbs_get_form_meta($form->get('id'), 'payment_sms_notification_send_to', true);

        // Parse dynamic tags
        $email_tags = new WPBS_Email_Tags($form, $calendar, $booking->get('id'), $booking->get('fields'), wpbs_get_booking_meta($booking->get('id'), 'submitted_language', true), $start_date, $end_date);

        $phone_number = $email_tags->parse($phone_number);

        if (empty($phone_number)) {
            continue;
        }

        // When to send?
        $days_before = wpbs_get_form_meta($form->get('id'), 'payment_sms_notification_when_to_send', true) * DAY_IN_SECONDS;
        $when_to_send = $start_date - $days_before;

        if (function_exists('wpbs_scheduled_email_delivery_hour')) {
            $when_to_send += wpbs_scheduled_email_delivery_hour();
        }

        if ($when_to_send < current_time('timestamp')) {
            continue;
        }

        // Schedule the SMS
        wp_schedule_single_event($when_to_send, 'wpbs_sms_payment_notification', array($form, $calendar, $booking->get('id'), $booking->get('fields'), wpbs_get_booking_meta($booking->get('id'), 'submitted_language', true), $start_date, $end_date));
    }

    // Redirect to the current page
    wp_redirect(add_query_arg(array('page' => 'wpbs-settings', 'tab' => 'tools', 'wpbs_message' => 'cron_sms_regenerate_success'), admin_url('admin.php')));
    exit;
}
add_action('wpbs_action_regenerate_sms_cron_jobs', 'wpbs_action_regenerate_sms_cron_jobs');
