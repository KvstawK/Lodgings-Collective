<?php $logs = wpbs_get_booking_meta($booking->get('id'), 'sms_log');?>

<table>
    <tr>
        <th><?php echo __('Send Date', 'wp-booking-system-sms') ?></th>
        <th><?php echo __('SMS Type', 'wp-booking-system-sms') ?></th>
        <th><?php echo __('Recepient', 'wp-booking-system-sms') ?></th>
        <th><?php echo __('Message', 'wp-booking-system-sms') ?></th>
        <th><?php echo __('Status', 'wp-booking-system-sms') ?></th>
    </tr>

    <?php if (count($logs) > 0): ?>
        <?php foreach ($logs as $meta_id => $log): ?>

            <tr>
                <td>
                    <?php echo wpbs_date_i18n(get_option('date_format') . ' ' . get_option('time_format'), $log['send_date']) ?>
                </td>
                <td><?php echo $log['type'] ?></td>
                <td><?php echo $log['send_to'] ?></td>
                <td><?php echo $log['message'] ?></td>
                <td><strong class="wpbs-sms-<?php echo $log['response']['success'] ? 'success' : 'error'; ?>"><?php echo $log['response']['success'] ? __('Sent', 'wp-booking-system-sms') : '<abbr title="' . esc_attr($log['response']['error']) . '">' . __('Error', 'wp-booking-system-sms') . ' </abbr>' ?></strong></td>
            </tr>

        <?php endforeach;?>
    <?php else: ?>
        <tr>
            <td colspan="5"><?php echo __('No SMS messages sent yet.', 'wp-booking-system-sms') ?></td>
        </tr>
    <?php endif;?>
</table>