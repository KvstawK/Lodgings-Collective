<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add the Inventory meta box to the calendar editor page.
 *
 * @param $calendar
 *
 */
function wpbs_calendar_editor_inventory_metabox($calendar)
{
?>
    <!-- Inventory -->
    <div class="postbox">

        <h3 class="hndle"><?php echo __('Inventory', 'wp-booking-system'); ?></h3>

        <div class="inside">
            <p>
                <label for="wpbs-default-inventory"><?php echo __('Maximum Bookings per Day', 'wp-booking-system'); ?></label>
                <input id="wpbs-default-inventory" name="default_inventory" min="0" type="number" value="<?php echo wpbs_get_calendar_meta($calendar->get('id'), 'default_inventory', true); ?>" />

            </p>
        </div>

        <div class="wpbs-plugin-card-bottom plugin-card-bottom">
            <a href="#" class="button button-secondary wpbs-save-calendar"><span class="dashicons dashicons-chart-bar"></span> <?php echo __('Set Default Limit', 'wp-booking-system'); ?></a>
        </div>

    </div><!-- / Inventory -->
<?php
}
add_action('wpbs_view_edit_calendar_sidebar_before', 'wpbs_calendar_editor_inventory_metabox', 20, 1);

/**
 * Save the default inventory in the database
 *
 * @param $calendar
 *
 */
function wpbs_save_calendar_default_inventory($post_data)
{

    if (!isset($post_data['form_data']['default_inventory'])) {
        return false;
    }

    $calendar_id = absint($post_data['form_data']['calendar_id']);

    $inventory = absint($post_data['form_data']['default_inventory']);

    if ($inventory < 1) {
        $inventory = 1;
    }

    wpbs_update_calendar_meta($calendar_id, 'default_inventory', $inventory);
}
add_action('wpbs_save_calendar_data', 'wpbs_save_calendar_default_inventory');

/**
 * Add Inventory Header to Calendar Editor
 *
 */
function wpbs_calendar_editor_columns_header_inventory($output)
{
    $output .= '<div class="wpbs-calendar-date-inventory-header">' . __('Inventory', 'wp-booking-system') . '' . wpbs_get_output_tooltip(__('In this column you can see number of bookings that can be made for each day. When a booking is made, the number decreases by 1.', 'wp-booking-system')) . '</div>';

    return $output;
}
add_filter('wpbs_calendar_editor_columns_header_before_description', 'wpbs_calendar_editor_columns_header_inventory', 20, 1);

/**
 * Add Inventory Field Input to Calendar Editor
 *
 */
function wpbs_calendar_editor_columns_inventory($output, $year, $month, $day, $event, $data, $default_price, $default_inventory)
{

    $value = '';

    if (!is_null($data) && isset($data['inventory'])) {
        $value = $data['inventory'];
    } elseif (!is_null($event)) {
        $value = $event->get('inventory');
    }

    $output .= '<div class="wpbs-calendar-date-inventory">';

    $output .= '<span class="dashicons dashicons-chart-bar"></span>';
    $output .= '<input type="number" min="0" value="' . esc_attr($value) . '" placeholder="' . $default_inventory . '" data-name="inventory" data-year="' . esc_attr($year) . '" data-month="' . esc_attr($month) . '" data-day="' . esc_attr($day) . '" />';

    $output .= '</div>';

    return $output;
}
add_filter('wpbs_calendar_editor_columns_before_description', 'wpbs_calendar_editor_columns_inventory', 20, 8);

/**
 * Add the inventory field to the bulk editor
 *
 */
function wpbs_bulk_editor_add_inventory()
{

?>
    <!-- Price -->
    <p>
        <label for="wpbs-bulk-edit-availability-inventory"><?php echo __('Inventory', 'wp-booking-system'); ?></label>
        <input id="wpbs-bulk-edit-availability-inventory" type="number" min="0" />
    </p>
<?php

}
add_action('wpbs_view_edit_calendar_bulk_editor_before', 'wpbs_bulk_editor_add_inventory', 20, 1);


function wpbs_inventory_validation($output, $form, $form_args, $calendar, $calendar_args, $language, $form_fields)
{

    // If there's already an error, display it.
    if ($output !== false && isset($output['error']) && !empty($output['error'])) {
        return $output;
    }

    // Validate it
    $start_date = new DateTime;
    $start_date->setTimestamp(wpbs_convert_js_to_php_timestamp($calendar_args['start_date']));

    $end_date = new DateTime;
    $end_date->setTimestamp(wpbs_convert_js_to_php_timestamp($calendar_args['end_date']));

    $available_inventory = wpbs_get_available_inventory($calendar->get('id'), $start_date, $end_date);

    if ($available_inventory === 0) {
        return array(
            'form_args' => $form_args,
            'calendar_args' => $calendar_args,
            'error_message' => wpbs_get_form_default_string($form->get('id'), 'zero_inventory', $language),
            'error' => true,
        );
    }

    foreach ($form_fields as $field) {
        if (!isset($field['type'])) {
            continue;
        }

        if ($field['type'] != 'inventory') {
            continue;
        }

        $occupation = isset($field['user_value']) ? absint($field['user_value']) : 0;
    }

    if (!isset($occupation)) {
        return $output;
    }

    if ($occupation > $available_inventory) {
        return array(
            'form_args' => $form_args,
            'calendar_args' => $calendar_args,
            'error_message' => __('Invalid date selection. Please refresh the page and try again.', 'wp-booking-system-inventory'),
            'error' => true,
        );
    }

    return $output;
}
add_filter('wpbs_form_validator_custom_validation', 'wpbs_inventory_validation', 20, 7);


/**
 * Updates the inventory and sets the correct legends when a booking is made
 *
 * @param array $events_data
 * @param string $selection_style
 * @param int $calendar_id
 * @param WPBS_Legend $legend_item_booked
 * @param WPBS_Legend $legend_item_changeover_start
 * @param WPBS_Legend $legend_item_changeover_end
 *
 */
function wpbs_form_handler_inventory($events_data, $selection_style, $calendar_id, $legend_item_booked, $legend_item_changeover_start, $legend_item_changeover_end, $post_data, $form_fields)
{

    $default_inventory = wpbs_get_calendar_meta($calendar_id, 'default_inventory', true) ?: 0;

    // Get number of slots to book
    $occupation = apply_filters('wpbs_default_inventory_value', 1, $events_data, $form_fields, $post_data, $calendar_id);

    foreach ($form_fields as $field) {
        if ($field['type'] != 'inventory') {
            continue;
        }

        $occupation = absint($field['user_value']);
    }

    // Validate it
    $start_date = new DateTime;
    $start_date->setTimestamp(wpbs_convert_js_to_php_timestamp($post_data['calendar']['start_date']));

    $end_date = new DateTime;
    $end_date->setTimestamp(wpbs_convert_js_to_php_timestamp($post_data['calendar']['end_date']));

    if ($occupation > wpbs_get_available_inventory($calendar_id, $start_date, $end_date)) {
        die('Something went wrong. Inventory not valid.');
    }

    // Add correct inventory to events
    for ($i = 0; $i < count($events_data); $i++) {
        $event = wpbs_get_events(array('calendar_id' => $calendar_id, 'date_day' => $events_data[$i]['date_day'], 'date_month' => $events_data[$i]['date_month'], 'date_year' => $events_data[$i]['date_year']));
        $inventory = !empty($event) && $event[0]->get('inventory') !== null && !(empty($event[0]->get('inventory') || $event[0]->get('inventory') === 0)) ? $event[0]->get('inventory') : $default_inventory;

        // If we're using split day selection, don't subtract from last day's inventory.
        if (count($events_data) == 1 || (($selection_style != 'split' || apply_filters('wpbs_inventory_decrease_ending_changeover', false)) || $i != (count($events_data) - 1))) {
            $inventory = $inventory - $occupation;
        }

        // Set new inventory value
        $events_data[$i]['inventory'] = $inventory;

        // Unset legend item
        unset($events_data[$i]['legend_item_id']);

        $events_data[$i]['original_legend_item_id'] = !empty($event) && $event[0]->get('legend_item_id') ? $event[0]->get('legend_item_id') : false;

        // Set legend item to booked only if inventory is 0;
        if ($events_data[$i]['inventory'] <= 0) {
            $events_data[$i]['legend_item_id'] = $legend_item_booked->get('id');
        }
    }

    // Check if we are using Split Days Selection and add the correct changeover legends;
    if ($selection_style == 'split' && !apply_filters('wpbs_inventory_decrease_ending_changeover', false)) {
        $previous_legend = false;

        for ($i = 0; $i < count($events_data); $i++) {

            // If the current legend item is booked but before the booking it was a starting changeover
            if (isset($events_data[$i]['legend_item_id']) && $events_data[$i]['legend_item_id'] == $legend_item_booked->get('id') && $events_data[$i]['original_legend_item_id'] == $legend_item_changeover_end->get('id')) {
                $previous_legend = $legend_item_booked->get('id');
                continue;
            }

            // If the current legend item is booked but before the booking it was an ending changeover
            if (isset($events_data[$i]['legend_item_id']) && $events_data[$i]['legend_item_id'] == $legend_item_booked->get('id') && $events_data[$i]['original_legend_item_id'] == $legend_item_changeover_start->get('id')) {
                $previous_legend = $legend_item_booked->get('id');
                continue;
            }

            // If legend item id is Booked and there is no previous legend item
            if (isset($events_data[$i]['legend_item_id']) && $events_data[$i]['legend_item_id'] == $legend_item_booked->get('id') && $previous_legend == false) {
                $events_data[$i]['legend_item_id'] = $previous_legend = $legend_item_changeover_start->get('id');
                continue;
            }

            // If there is no legend item and previous legend item is booked or a starting changeover
            if (!isset($events_data[$i]['legend_item_id']) && ($previous_legend == $legend_item_booked->get('id') || $previous_legend == $legend_item_changeover_start->get('id'))) {
                $events_data[$i]['legend_item_id'] = $previous_legend = $legend_item_changeover_end->get('id');
                continue;
            }

            $previous_legend = (isset($events_data[$i]['legend_item_id'])) ? $legend_item_booked->get('id') : false;

            unset($events_data[$i]['original_legend_item_id']);
        }
    }

    $intermediate_legend_id = apply_filters('wpbs_inventory_intermediate_legend_id', false, $calendar_id);
    $intermediate_legend_id = apply_filters('wpbs_inventory_intermediate_legend_id_calendar_' . $calendar_id, $intermediate_legend_id, $calendar_id);

    if ($intermediate_legend_id) {
        for ($i = 0; $i < count($events_data); $i++) {
            if(isset($events_data[$i]['legend_item_id']) && !empty($events_data[$i]['legend_item_id'])){
                continue;
            }

            if (count($events_data) == 1 || (($selection_style != 'split' || apply_filters('wpbs_inventory_decrease_ending_changeover', false)) || $i != (count($events_data) - 1))) {
                $events_data[$i]['legend_item_id'] = $intermediate_legend_id;
            }
        }
    }

    return $events_data;
}
add_filter('wpbs_form_handler_auto_pending_events', 'wpbs_form_handler_inventory', 10, 8);

/**
 * Add Inventory Field to Form Builder
 *
 */
function wpbs_form_available_field_types_inventory($fields)
{

    if (!wpbs_is_pricing_enabled()) {
        return $fields;
    }

    $fields['inventory'] = array(
        'type' => 'inventory',
        'group' => 'pricing',
        'supports' => array(
            'primary' => array('label', 'inventory_type', 'inventory_limit', 'required'),
            'secondary' => array('placeholder', 'description', 'layout', 'class', 'hide_label'),
        ),
        'values' => array(),
    );

    return $fields;
}
add_filter('wpbs_form_available_field_types', 'wpbs_form_available_field_types_inventory', 10, 1);

/**
 * Add custom field types
 *
 */
function wpbs_add_inventory_field_types_options($options)
{

    $options['inventory_type'] = array('key' => 'inventory_type', 'label' => __('Price Calculation', 'wp-booking-system'), 'translatable' => false, 'options' => array('none' => __('None', 'wp-booking-system'), 'multiply' => __('Multiply by Calendar Price', 'wp-booking-system')));
    $options['inventory_limit'] = array('key' => 'inventory_limit', 'label' => __('Maximum Limit', 'wp-booking-system'), 'translatable' => false);

    return $options;
}
add_filter('wpbs_form_available_field_types_options', 'wpbs_add_inventory_field_types_options', 10, 1);

/**
 * Ajax request to get the available inventory
 *
 */
function wpbs_ajax_get_available_inventory()
{
    $calendar_id = absint($_POST['calendar_id']);

    $start_date = new DateTime;
    $start_date->setTimestamp(wpbs_convert_js_to_php_timestamp($_POST['start_date']));

    $end_date = new DateTime;
    $end_date->setTimestamp(wpbs_convert_js_to_php_timestamp($_POST['end_date']));

    $available = wpbs_get_available_inventory($calendar_id, $start_date, $end_date);

    $limit = isset($_POST['limit']) && $_POST['limit'] ? $_POST['limit'] : false;

    if ($limit) {
        $available = min($limit, $available);
    }

    echo $available;

    wp_die();
}

add_action('wp_ajax_nopriv_wpbs_get_available_inventory', 'wpbs_ajax_get_available_inventory');
add_action('wp_ajax_wpbs_get_available_inventory', 'wpbs_ajax_get_available_inventory');

/**
 * Get the available inventory for a given date range
 *
 */
function wpbs_get_available_inventory($calendar_id, $start_date, $end_date)
{
    $default_inventory = absint(wpbs_get_calendar_meta($calendar_id, 'default_inventory', true));

    if ($default_inventory < 1) {
        $default_inventory = 1;
    }

    $max_inventory = PHP_INT_MAX;

    if ($start_date == $end_date) {
        $end_date->modify('+1 day');
    }

    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($start_date, $interval, $end_date);

    foreach ($period as $day) {
        $events = wpbs_get_events(array('calendar_id' => $calendar_id, 'date_year' => $day->format('Y'), 'date_month' => $day->format('m'), 'date_day' => $day->format('d')));
        $event = (!empty($events) ? $events[0] : null);

        if (!$event) {
            continue;
        }

        if ((!empty($event->get('inventory')) || strlen($event->get('inventory')) !== 0) && $event->get('inventory') < $max_inventory) {
            $max_inventory = $event->get('inventory');
        }
    }

    if ($max_inventory === PHP_INT_MAX) {
        $max_inventory = $default_inventory;
    }

    // Allow booking if dates are available, even if inventory is lower or equal to 0.
    $allow_negative_inventory_bookings = apply_filters('wpbs_allow_negative_inventory_bookings', false);
    if ($max_inventory <= 0 && $allow_negative_inventory_bookings) {
        $max_inventory = 1;
    }

    return $max_inventory;
}

/**
 * Check if multiplication is enabled and adjust the price accordingly
 *
 */
function wpbs_inv_inventory_price_modifier($events_price, $prices, $calendar_id, $form_args, $form, $form_fields, $start_date, $end_date)
{

    $occupation = false;

    foreach ($form_fields as $field) {
        if ($field['type'] != 'inventory') {
            continue;
        }
        if ($field['values']['default']['inventory_type'] != 'multiply') {
            continue;
        }

        if (empty($field['user_value'])) {
            continue;
        }

        $occupation = absint($field['user_value']);
    }

    if ($occupation === false) {
        return $events_price;
    }

    return $events_price * $occupation;
}
add_filter('wpbs_pricing_events_price', 'wpbs_inv_inventory_price_modifier', 10, 8);

/**
 * Check if multiplication is enabled and adjust the quantity accordingly
 *
 */
function wpbs_inv_inventory_quantity_modifier($prices, $payment, $calendar_id, $form_args, $form, $form_fields, $start_date, $end_date)
{

    $occupation = false;

    foreach ($form_fields as $field) {
        if ($field['type'] != 'inventory') {
            continue;
        }
        if ($field['values']['default']['inventory_type'] != 'multiply') {
            continue;
        }

        if (empty($field['user_value'])) {
            continue;
        }

        $occupation = absint($field['user_value']);
    }

    if ($occupation === false) {
        return $prices;
    }

    $prices['events']['multiplication'] = $prices['events']['multiplication'] * $occupation;

    foreach ($prices['events']['individual_days'] as $multiplication_individual_day => $multiplication_individual_price) {
        $prices['events']['individual_days'][$multiplication_individual_day] = $occupation * $multiplication_individual_price;
    }

    return $prices;
}
add_filter('wpbs_get_checkout_price_after_events', 'wpbs_inv_inventory_quantity_modifier', 10, 8);

/**
 * Multiply fixed amount discounts if inventory is present and multiplied by calendar value.
 *
 */
function wpbs_inv_inventory_price_modifier_discount($value, $options, $prices, $payment, $calendar_id, $form_args, $form, $form_fields, $start_date, $end_date)
{

    if ($options['type'] != 'fixed_amount') {
        return $value;
    }

    $occupation = false;

    foreach ($form_fields as $field) {
        if ($field['type'] != 'inventory') {
            continue;
        }
        if ($field['values']['default']['inventory_type'] != 'multiply') {
            continue;
        }

        if (empty($field['user_value'])) {
            continue;
        }

        $occupation = absint($field['user_value']);
    }

    if ($occupation === false) {
        return $value;
    }

    return $value * $occupation;
}
add_filter('wpbs_pricing_discount_value', 'wpbs_inv_inventory_price_modifier_discount', 10, 10);

/**
 * Make strings translatable
 *
 * @param array $strings
 *
 * @return array
 *
 */
function wpbs_inv_form_default_strings($strings)
{
    $strings['zero_inventory'] = __("Invalid date selection. The inventory for the selected dates is 0.", 'wp-booking-system-inventory');
    return $strings;
}
add_filter('wpbs_form_default_strings', 'wpbs_inv_form_default_strings', 10, 1);

/**
 * Add strings to Form Strings page.
 *
 * @param array $strings
 *
 * @return array
 *
 */
function wpbs_inv_form_default_strings_settings_page($strings)
{

    $strings['validation-strings']['strings']['zero_inventory'] = array(
        'label' => __('Zero Inventory', 'wp-booking-system-inventory'),
    );

    return $strings;
}
add_filter('wpbs_form_default_strings_settings_page', 'wpbs_inv_form_default_strings_settings_page', 10, 1);
