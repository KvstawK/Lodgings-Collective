<h2><?php echo __('SMS Notifications', 'wp-booking-system-sms') ?></h2>

<!-- Styled Phone Number Field -->
<div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
	<label class="wpbs-settings-field-label" for="sms_notifications">
        <?php echo __( 'Enable', 'wp-booking-system-sms' ); ?>
        <?php echo wpbs_get_output_tooltip(__("Make the Phone form field a stylised input with a dropdown for selecting the country code, phone number formatting and live validation.", 'wp-booking-system-sms'));?>
    </label>

	<div class="wpbs-settings-field-inner">
        <label for="sms_notifications" class="wpbs-checkbox-switch">
            <input type="hidden" name="wpbs_settings[sms_notifications]" value="0">
            <input data-target="#wpbs-sms-notifications-wrapper" name="wpbs_settings[sms_notifications]" type="checkbox" id="sms_notifications"  class="regular-text wpbs-settings-toggle wpbs-settings-wrap-toggle" <?php echo ( ! empty( $settings['sms_notifications']) && $settings['sms_notifications'] == 'on' ) ? 'checked' : '';?> >
            <div class="wpbs-checkbox-slider"></div>
        </label>
	</div>
</div>

<div id="wpbs-sms-notifications-wrapper" class="wpbs-sms-notification-wrapper wpbs-settings-wrapper <?php echo ( ! empty( $settings['sms_notifications']) && $settings['sms_notifications'] == 'on' ) ? 'wpbs-settings-wrapper-show' : '';?>">

    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-heading wpbs-settings-field-large">
        <label class="wpbs-settings-field-label"><?php echo __('Twilio API Credentials', 'wp-booking-system-sms') ?></label>
        <div class="wpbs-settings-field-inner">&nbsp;</div>
    </div>

    <div class="wpbs-page-notice notice-info wpbs-form-changed-notice"> 
        <p><?php echo __('If you need help getting your API Keys, <a target="_blank" href="https://www.wpbookingsystem.com/documentation/sms-notifications/">check out our guide</a> which offers step by step instructions.', 'wp-booking-system-sms') ?></p>
    </div>

    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="twilio_account_sid">
            <?php echo __( 'Account SID', 'wp-booking-system-sms'); ?>
        </label>

        <div class="wpbs-settings-field-inner">
            <input name="wpbs_twilio_api[twilio_account_sid]" type="text" id="twilio_account_sid"  class="regular-text " value="<?php echo ( !empty( $twilio_api['twilio_account_sid'] ) ) ? $twilio_api['twilio_account_sid'] : '';?>" >
        </div>
    </div>

    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="twilio_auth_token">
            <?php echo __( 'Auth Token', 'wp-booking-system-sms'); ?>
        </label>

        <div class="wpbs-settings-field-inner">
            <input name="wpbs_twilio_api[twilio_auth_token]" type="text" id="twilio_auth_token"  class="regular-text " value="<?php echo ( !empty( $twilio_api['twilio_auth_token'] ) ) ? $twilio_api['twilio_auth_token'] : '';?>" >
        </div>
    </div>

    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="twilio_phone_number">
            <?php echo __( 'Twilio Phone Number', 'wp-booking-system-sms'); ?>
        </label>

        <div class="wpbs-settings-field-inner">
            <input name="wpbs_twilio_api[twilio_phone_number]" type="text" id="twilio_phone_number"  class="regular-text " value="<?php echo ( !empty( $twilio_api['twilio_phone_number'] ) ) ? $twilio_api['twilio_phone_number'] : '';?>" >
        </div>
    </div>

    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="twilio_sender_id">
            <?php echo __( 'Alphanumeric Sender ID', 'wp-booking-system-sms'); ?>
            <?php echo wpbs_get_output_tooltip(__("Optional. Replace your phone number with a custom string. Must be no longer than 11 characters, and can only contain letters and numbers. ", 'wp-booking-system-sms'));?>
        </label>

        <div class="wpbs-settings-field-inner">
            <input name="wpbs_twilio_api[twilio_sender_id]" pattern="[ A-Za-z0-9]{3,11}" maxlength="11" type="text" id="twilio_sender_id"  class="regular-text " value="<?php echo ( !empty( $twilio_api['twilio_sender_id'] ) ) ? $twilio_api['twilio_sender_id'] : '';?>">
        </div>
    </div>

    <div class="wpbs-twilio-send-test-sms">
        <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-heading wpbs-settings-field-large">
            <label class="wpbs-settings-field-label"><?php echo __('Send a test SMS', 'wp-booking-system-sms') ?></label>
            <div class="wpbs-settings-field-inner">&nbsp;</div>
        </div>

        <div class="wpbs-twilio-test-sms-response"></div>

        <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
            <label class="wpbs-settings-field-label" for="twilio_test_number">
                <?php echo __( 'Your phone number', 'wp-booking-system-sms'); ?>
            </label>

            <div class="wpbs-settings-field-inner">
                <input name="" type="text" id="twilio_test_number" class="regular-text " placeholder="+" >
                <button type="button" id="twilio_test_number_send" class="button button-secodary"><?php echo __('Send', 'wp-booking-system-sms') ?></button>
            </div>
        </div>

        

    </div>
    

</div>

<!-- Submit button -->
<input type="submit" class="button-primary" value="<?php echo __( 'Save Settings', 'wp-booking-system-sms' ); ?>" />