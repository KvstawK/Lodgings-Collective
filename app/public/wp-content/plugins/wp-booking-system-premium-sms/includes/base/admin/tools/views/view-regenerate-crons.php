<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<h2><?php _e('Regenerate SMS Reminder & Follow Up cron jobs', 'wp-booking-system-sms') ?></h2>

<div class="wpbs-notice-error">

	<p><?php echo __( 'This will remove all existing cron jobs and rebuild them based on current form settings.', 'wp-booking-system-sms' ); ?></p>

</div>

<a class="button-primary" onclick="return confirm('<?php _e('Are you sure you want to proceed?','wp-booking-system-sms');?>');" href="<?php echo add_query_arg( array( 'wpbs_action' => 'regenerate_sms_cron_jobs', 'wpbs_token' => wp_create_nonce( 'wpbs_regenerate_sms_cron_jobs' ) ), admin_url( 'admin.php' ) ); ?>"><?php echo __( 'Regenerate SMS Notifications Cron Jobs', 'wp-booking-system-sms' ); ?></a>