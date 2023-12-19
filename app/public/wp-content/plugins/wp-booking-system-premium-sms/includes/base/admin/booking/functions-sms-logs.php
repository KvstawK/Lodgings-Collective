<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Log SMS Notifications
 *
 */
function wpbs_log_sms_notification($booking_id, $phone_number, $message, $type, $response)
{
    $log_data = array(
        'send_date' => current_time('timestamp'),
        'send_to' => $phone_number,
        'message' => $message,
        'type' => $type,
        'response' => $response,
    );
    wpbs_add_booking_meta($booking_id, 'sms_log', $log_data);
}

/**
 * Add the SMS Logs tab in the Booking Modal
 * 
 * @param array $tabs
 * @param WPBS_Booking $booking
 * 
 * @return array
 * 
 */
function wpbs_sms_booking_modal_tabs($tabs, $booking)
{
    $tabs['sms'] = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M232 128C245.3 128 256 138.7 256 152V232C256 245.3 245.3 256 232 256H88C74.75 256 64 245.3 64 232V152C64 138.7 74.75 128 88 128H232zM96 160V224H224V160H96zM56 328C56 314.7 66.75 304 80 304C93.25 304 104 314.7 104 328C104 341.3 93.25 352 80 352C66.75 352 56 341.3 56 328zM104 408C104 421.3 93.25 432 80 432C66.75 432 56 421.3 56 408C56 394.7 66.75 384 80 384C93.25 384 104 394.7 104 408zM136 328C136 314.7 146.7 304 160 304C173.3 304 184 314.7 184 328C184 341.3 173.3 352 160 352C146.7 352 136 341.3 136 328zM184 408C184 421.3 173.3 432 160 432C146.7 432 136 421.3 136 408C136 394.7 146.7 384 160 384C173.3 384 184 394.7 184 408zM216 328C216 314.7 226.7 304 240 304C253.3 304 264 314.7 264 328C264 341.3 253.3 352 240 352C226.7 352 216 341.3 216 328zM264 408C264 421.3 253.3 432 240 432C226.7 432 216 421.3 216 408C216 394.7 226.7 384 240 384C253.3 384 264 394.7 264 408zM192 64C200.8 64 208 71.16 208 80C208 88.84 200.8 96 192 96H128C119.2 96 112 88.84 112 80C112 71.16 119.2 64 128 64H192zM256 0C291.3 0 320 28.65 320 64V448C320 483.3 291.3 512 256 512H64C28.65 512 0 483.3 0 448V64C0 28.65 28.65 0 64 0H256zM256 32H64C46.33 32 32 46.33 32 64V448C32 465.7 46.33 480 64 480H256C273.7 480 288 465.7 288 448V64C288 46.33 273.7 32 256 32z"/></svg>' . __('SMS Logs', 'wp-booking-system-sms');
    return $tabs;
}
add_filter('wpbs_booking_modal_tabs', 'wpbs_sms_booking_modal_tabs', 5, 2);

/**
 * Add SMS Logs Tab view
 *
 * @param WPBS_Booking $booking
 * @param WPBS_Calendar $calendar
 *
 */
function wpbs_booking_modal_add_sms_logs_view($booking, $calendar)
{
    
    include 'views/view-modal-sms-logs.php';
}
add_action('wpbs_booking_modal_tab_sms', 'wpbs_booking_modal_add_sms_logs_view', 10, 2);

/**
 * Check if a booking has a phone number
 * 
 * @param WPBS_Booking $booking
 * 
 * @return mixed
 * 
 */
function wpbs_get_booking_phone_numbers($booking)
{

    $numbers = array();

    foreach ($booking->get('fields') as $field) {
        if ($field['type'] != 'phone') {
            continue;
        }

        if (empty($field['user_value'])) {
            continue;
        }

        $numbers[] = $field['user_value'];
    }

    if (empty($numbers)) {
        return false;
    }

    return $numbers;

}
