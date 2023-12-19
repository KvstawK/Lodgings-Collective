
<div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-heading wpbs-settings-field-large">
    <label class="wpbs-settings-field-label"><?php echo __( 'Admin Notification', 'wp-booking-system-sms' ); ?> </label>
    <div class="wpbs-settings-field-inner">&nbsp;</div>
</div>

<!-- Enable Notification -->
<div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
	<label class="wpbs-settings-field-label" for="admin_sms_notification_enable">
        <?php echo __( 'Enable Notification', 'wp-booking-system-sms' ); ?>
        <?php echo wpbs_get_output_tooltip(__("Send an SMS to yourself (the website administrator) whenever a booking is made.", 'wp-booking-system-sms'));?>
    </label>

	<div class="wpbs-settings-field-inner">
        <label for="admin_sms_notification_enable" class="wpbs-checkbox-switch">
            <input type="hidden" name="admin_sms_notification_enable" value="0">
            <input data-target="#wpbs-admin-sms-notification-wrapper" name="admin_sms_notification_enable" type="checkbox" id="admin_sms_notification_enable"  class="regular-text wpbs-settings-toggle wpbs-settings-wrap-toggle" <?php echo ( !empty($form_meta['admin_sms_notification_enable'][0]) ) ? 'checked' : '';?> >
            <div class="wpbs-checkbox-slider"></div>
        </label>
	</div>
</div>

<div id="wpbs-admin-sms-notification-wrapper" class="wpbs-user-notification-wrapper wpbs-settings-wrapper <?php echo ( !empty($form_meta['admin_sms_notification_enable'][0]) ) ? 'wpbs-settings-wrapper-show' : '';?>">

    <!-- Email Tags -->
    <div class="card wpbs-email-tags-wrapper">
        <h2 class="title"><?php echo __( 'Dynamic Tags', 'wp-booking-system-sms' ); ?></h2>
        <p><?php echo __( 'You can use these dynamic tags in any of the fields. They will be replaced with the values submitted in the form.', 'wp-booking-system-sms' ); ?></p>
        
        <?php wpbs_output_email_tags($form_data); ?>

    </div>

    <!-- Send To -->
    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="admin_sms_notification_send_to"><?php echo __( 'Send To', 'wp-booking-system-sms' ); ?></label>

        <div class="wpbs-settings-field-inner">
            <input name="admin_sms_notification_send_to" placeholder="+" type="text" id="admin_sms_notification_send_to" value="<?php echo ( !empty($form_meta['admin_sms_notification_send_to'][0]) ) ? esc_attr($form_meta['admin_sms_notification_send_to'][0]) : '';?>" class="regular-text" >
        </div>
    </div> 

    <?php 
    $valid = true;
    if(!empty($form_meta['admin_sms_notification_send_to'][0])){
        $twilio = new WPBS_Twilio_API();
        if($twilio->twilio){
            $valid = $twilio->validate($form_meta['admin_sms_notification_send_to'][0]);
        }
    }
    ?>
    <?php if(!$valid): ?>
    <div class="wpbs-page-notice wpbs-page-notice-email-domain notice-error"><p><?php echo __('Invalid phone number. Please start your phone number with a + and include the country prefix.', 'wp-booking-system-twilio') ?></p></div>
    <?php endif; ?>

    <!-- Message -->
    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="admin_sms_notification_message"><?php echo __( 'Message', 'wp-booking-system-sms' ); ?></label>

        <div class="wpbs-settings-field-inner">
            <textarea name="admin_sms_notification_message" placeholder="" type="text" id="admin_sms_notification_message"class="regular-text" ><?php echo ( !empty($form_meta['admin_sms_notification_message'][0]) ) ? esc_attr($form_meta['admin_sms_notification_message'][0]) : '';?></textarea>
        </div>
    </div> 
    
</div>