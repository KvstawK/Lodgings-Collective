<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Twilio Validation to the Phone Number field
 *
 */
function wpbs_twilio_phone_number_validation($valid, $phone)
{

    $twilio = new WPBS_Twilio_API();

    if (!$twilio->twilio) {
        return $valid;
    }

    return $twilio->validate($phone);

}
add_filter('wpbs_phone_number_validation', 'wpbs_twilio_phone_number_validation', 10, 2);

/**
 * Handle SMS Admin Notification
 *
 * @param WPBS_Form     $form
 * @param WPBS_Calendar $calendar
 * @param int           $booking_id
 * @param array         $form_fields
 * @param string        $language
 * @param int           $start_date
 * @param int           $end_date
 *
 */
function wpbs_sms_admin_notification($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date)
{

    if (!wpbs_sms_is_enabled()) {
        return false;
    }

    // Check if notification is enabled
    if (wpbs_get_form_meta($form->get('id'), 'admin_sms_notification_enable', true) != 'on') {
        return false;
    }

    // Get the phone number
    $phone_number = wpbs_get_form_meta($form->get('id'), 'admin_sms_notification_send_to', true);

    if (empty($phone_number)) {
        return false;
    }

    $twilio = new WPBS_Twilio_API();

    // Validate it
    $valid = $twilio->validate($phone_number);

    if (!$valid) {
        return false;
    }

    // Get the message
    $message = wpbs_get_form_meta($form->get('id'), 'admin_sms_notification_message', true);

    // Parse dynamic tags
    $email_tags = new WPBS_Email_Tags($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date);
    $message = $email_tags->parse($message);

    // And send.
    $twilio->send($phone_number, $message);

}
add_action('wpbs_submit_form_emails', 'wpbs_sms_admin_notification', 20, 7);

/**
 * Handle SMS User Notification
 *
 * @param WPBS_Form     $form
 * @param WPBS_Calendar $calendar
 * @param int           $booking_id
 * @param array         $form_fields
 * @param string        $language
 * @param int           $start_date
 * @param int           $end_date
 *
 */
function wpbs_sms_user_notification($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date)
{

    if (!wpbs_sms_is_enabled()) {
        return false;
    }

    // Check if notification is enabled
    if (wpbs_get_form_meta($form->get('id'), 'user_sms_notification_enable', true) != 'on') {
        return false;
    }

    // Get the phone number
    $phone_number = wpbs_get_form_meta($form->get('id'), 'user_sms_notification_send_to', true);

    // Parse dynamic tags
    $email_tags = new WPBS_Email_Tags($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date);

    $phone_number = $email_tags->parse($phone_number);

    if (empty($phone_number)) {
        return false;
    }

    $twilio = new WPBS_Twilio_API();

    // Validate it
    $valid = $twilio->validate($phone_number);

    if (!$valid) {
        return false;
    }

    // Get the message
    $message = wpbs_get_translated_form_meta($form->get('id'), 'user_sms_notification_message', $language);
    $message = $email_tags->parse($message);

    // And send.
    $response = $twilio->send($phone_number, $message);

    wpbs_log_sms_notification($booking_id, $phone_number, $message, 'User Notification', $response);

    do_action('wpbs_sms_notification_sent', $booking_id, 'user_notification', $response);

}
add_action('wpbs_submit_form_emails', 'wpbs_sms_user_notification', 20, 7);

/**
 * Schedule the SMS Reminder Notification
 *
 * @param WPBS_Form     $form
 * @param WPBS_Calendar $calendar
 * @param int           $booking_id
 * @param array         $form_fields
 * @param string        $language
 * @param int           $start_date
 * @param int           $end_date
 *
 */
function wpbs_sms_schedule_reminder_notification($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date)
{

    if (!wpbs_sms_is_enabled()) {
        return false;
    }

    // Check if notification is enabled
    if (wpbs_get_form_meta($form->get('id'), 'reminder_sms_notification_enable', true) != 'on') {
        return false;
    }

    // Get the phone number
    $phone_number = wpbs_get_form_meta($form->get('id'), 'reminder_sms_notification_send_to', true);

    // Parse dynamic tags
    $email_tags = new WPBS_Email_Tags($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date);

    $phone_number = $email_tags->parse($phone_number);

    if (empty($phone_number)) {
        return false;
    }

    $twilio = new WPBS_Twilio_API();

    // Validate it
    $valid = $twilio->validate($phone_number);

    if (!$valid) {
        return false;
    }

    // When to send?
    $days_before = wpbs_get_form_meta($form->get('id'), 'reminder_sms_notification_when_to_send', true) * DAY_IN_SECONDS;
    $when_to_send = $start_date - $days_before;

    if(function_exists('wpbs_scheduled_email_delivery_hour')){
        $when_to_send += wpbs_scheduled_email_delivery_hour();
    }

    // Schedule the email
    wp_schedule_single_event($when_to_send, 'wpbs_sms_reminder_notification', array($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date));

}
add_action('wpbs_submit_form_emails', 'wpbs_sms_schedule_reminder_notification', 20, 7);

function wpbs_sms_reminder_notification($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date)
{

    if (!wpbs_sms_is_enabled()) {
        return false;
    }

    $booking = wpbs_get_booking($booking_id);

    if (is_null($booking)) {
        return false;
    }
    if ($booking->get('status') == 'trash') {
        return false;
    }
    if ($booking->get('status') == 'pending') {

        // Reschedule the event to be sent after an hour
        if ($start_date < current_time('timestamp')) {
            return false;
        }

        $when_to_send = current_time('timestamp') + HOUR_IN_SECONDS;
        wp_schedule_single_event($when_to_send, 'wpbs_sms_reminder_notification', array($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date));

        return false;
    }

    $email_tags = new WPBS_Email_Tags($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date);

    // Get the phone number
    $phone_number = wpbs_get_form_meta($form->get('id'), 'reminder_sms_notification_send_to', true);
    $phone_number = $email_tags->parse($phone_number);

    // Get the message
    $message = wpbs_get_translated_form_meta($form->get('id'), 'reminder_sms_notification_message', $language);
    $message = $email_tags->parse($message);

    $twilio = new WPBS_Twilio_API();

    // And send.
    $response = $twilio->send($phone_number, $message);

    wpbs_log_sms_notification($booking_id, $phone_number, $message, 'Reminder Notification', $response);

    do_action('wpbs_sms_notification_sent', $booking_id, 'reminder', $response);

}
add_action('wpbs_sms_reminder_notification', 'wpbs_sms_reminder_notification', 10, 7);

/**
 * Schedule the SMS Follow Up Notification
 *
 * @param WPBS_Form     $form
 * @param WPBS_Calendar $calendar
 * @param int           $booking_id
 * @param array         $form_fields
 * @param string        $language
 * @param int           $start_date
 * @param int           $end_date
 *
 */
function wpbs_sms_schedule_follow_up_notification($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date)
{

    if (!wpbs_sms_is_enabled()) {
        return false;
    }

    // Check if notification is enabled
    if (wpbs_get_form_meta($form->get('id'), 'follow_up_sms_notification_enable', true) != 'on') {
        return false;
    }

    // Get the phone number
    $phone_number = wpbs_get_form_meta($form->get('id'), 'follow_up_sms_notification_send_to', true);

    // Parse dynamic tags
    $email_tags = new WPBS_Email_Tags($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date);

    $phone_number = $email_tags->parse($phone_number);

    if (empty($phone_number)) {
        return false;
    }

    $twilio = new WPBS_Twilio_API();

    // Validate it
    $valid = $twilio->validate($phone_number);

    if (!$valid) {
        return false;
    }

    // When to send?
    $days_after = wpbs_get_form_meta($form->get('id'), 'follow_up_sms_notification_when_to_send', true) * DAY_IN_SECONDS;
    $when_to_send = $end_date + $days_after;

    if(function_exists('wpbs_scheduled_email_delivery_hour')){
        $when_to_send += wpbs_scheduled_email_delivery_hour();
    }

    // Schedule the email
    wp_schedule_single_event($when_to_send, 'wpbs_sms_follow_up_notification', array($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date));

}
add_action('wpbs_submit_form_emails', 'wpbs_sms_schedule_follow_up_notification', 20, 7);

function wpbs_sms_follow_up_notification($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date)
{

    if (!wpbs_sms_is_enabled()) {
        return false;
    }

    $booking = wpbs_get_booking($booking_id);

    if (is_null($booking)) {
        return false;
    }
    if ($booking->get('status') != 'accepted') {
        return false;
    }

    $email_tags = new WPBS_Email_Tags($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date);

    // Get the phone number
    $phone_number = wpbs_get_form_meta($form->get('id'), 'follow_up_sms_notification_send_to', true);
    $phone_number = $email_tags->parse($phone_number);

    // Get the message
    $message = wpbs_get_translated_form_meta($form->get('id'), 'follow_up_sms_notification_message', $language);
    $message = $email_tags->parse($message);

    $twilio = new WPBS_Twilio_API();

    // And send.
    $response = $twilio->send($phone_number, $message);

    wpbs_log_sms_notification($booking_id, $phone_number, $message, 'Follow Up Notification', $response);

    do_action('wpbs_sms_notification_sent', $booking_id, 'followup', $response);

}
add_action('wpbs_sms_follow_up_notification', 'wpbs_sms_follow_up_notification', 10, 7);

/**
 * Schedule the SMS Final Payment Reminder Notification
 *
 * @param WPBS_Form     $form
 * @param WPBS_Calendar $calendar
 * @param int           $booking_id
 * @param array         $form_fields
 * @param string        $language
 * @param int           $start_date
 * @param int           $end_date
 *
 */
function wpbs_sms_schedule_payment_notification($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date)
{

    if (!wpbs_sms_is_enabled()) {
        return false;
    }

    $settings = get_option('wpbs_settings', array());

    if (!isset($settings['payment_part_payments_method'])) {
        return false;
    }

    if ($settings['payment_part_payments_method'] != 'initial') {
        return false;
    }

    // Check if notification is enabled
    if (wpbs_get_form_meta($form->get('id'), 'payment_sms_notification_enable', true) != 'on') {
        return false;
    }

    $payment = wpbs_get_payment_by_booking_id($booking_id);
    if (empty($payment)) {
        return false;
    }

    $details = $payment->get('details');

    if (!$payment->is_part_payment()) {
        return false;
    }

    // If payment has a deposit
    if (!$payment->is_deposit_paid() && $payment->get('gateway') != 'bank_transfer') {
        return false;
    }

    // Get the phone number
    $phone_number = wpbs_get_form_meta($form->get('id'), 'payment_sms_notification_send_to', true);

    // Parse dynamic tags
    $email_tags = new WPBS_Email_Tags($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date);

    $phone_number = $email_tags->parse($phone_number);

    if (empty($phone_number)) {
        return false;
    }

    $twilio = new WPBS_Twilio_API();

    // Validate it
    $valid = $twilio->validate($phone_number);

    if (!$valid) {
        return false;
    }

    // When to send?
    $days_before = wpbs_get_form_meta($form->get('id'), 'payment_sms_notification_when_to_send', true) * DAY_IN_SECONDS;
    $when_to_send = $start_date - $days_before;

    if(function_exists('wpbs_scheduled_email_delivery_hour')){
        $when_to_send += wpbs_scheduled_email_delivery_hour();
    }

    // Schedule the email
    wp_schedule_single_event($when_to_send, 'wpbs_sms_payment_notification', array($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date));

}
add_action('wpbs_submit_form_emails', 'wpbs_sms_schedule_payment_notification', 20, 7);

function wpbs_sms_payment_notification($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date)
{

    if (!wpbs_sms_is_enabled()) {
        return false;
    }

    $booking = wpbs_get_booking($booking_id);

    if (is_null($booking)) {
        return false;
    }
    if ($booking->get('status') == 'trash') {
        return false;
    }

    // If it's a bank transfer and it is marked as paid, don't send the email anymore.
    $payment = wpbs_get_payment_by_booking_id($booking_id);

    if ($payment->is_final_payment_paid()) {
        return false;
    }

    if ($booking->get('status') == 'pending') {

        // Reschedule the event to be sent after an hour
        if ($start_date < current_time('timestamp')) {
            return false;
        }

        $when_to_send = current_time('timestamp') + HOUR_IN_SECONDS;
        wp_schedule_single_event($when_to_send, 'wpbs_sms_payment_notification', array($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date));

        return false;
    }

    $email_tags = new WPBS_Email_Tags($form, $calendar, $booking_id, $form_fields, $language, $start_date, $end_date);

    // Get the phone number
    $phone_number = wpbs_get_form_meta($form->get('id'), 'payment_sms_notification_send_to', true);
    $phone_number = $email_tags->parse($phone_number);

    // Get the message
    $message = wpbs_get_translated_form_meta($form->get('id'), 'payment_sms_notification_message', $language);
    $message = $email_tags->parse($message);

    $twilio = new WPBS_Twilio_API();

    // And send.
    $response = $twilio->send($phone_number, $message);

    wpbs_log_sms_notification($booking_id, $phone_number, $message, 'Final Payment Notification', $response);

    do_action('wpbs_sms_notification_sent', $booking_id, 'payment', $response);

}
add_action('wpbs_sms_payment_notification', 'wpbs_sms_payment_notification', 10, 7);
