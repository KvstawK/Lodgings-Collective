<?php $phone_fields = wpbs_form_get_phone_fields($form_data); ?>

<?php if($phone_fields === false): ?>

    <div class="wpbs-page-notice notice-error"> 
        <p><?php echo __( 'You must add a Phone field to the form in order to configure SMS notifications.', 'wp-booking-system-sms'); ?></p>
    </div>

<?php else: ?>

<div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-heading wpbs-settings-field-large">
    <label class="wpbs-settings-field-label"><?php echo __( 'User Notification', 'wp-booking-system-sms' ); ?> </label>
    <div class="wpbs-settings-field-inner">&nbsp;</div>
</div>

<!-- Enable Notification -->
<div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
	<label class="wpbs-settings-field-label" for="reminder_sms_notification_enable">
        <?php echo __( 'Enable Notification', 'wp-booking-system-sms' ); ?>
        <?php echo wpbs_get_output_tooltip(__("Send a reminder SMS to the person who made the booking.", 'wp-booking-system-sms'));?>
    </label>

	<div class="wpbs-settings-field-inner">
        <label for="reminder_sms_notification_enable" class="wpbs-checkbox-switch">
            <input type="hidden" name="reminder_sms_notification_enable" value="0">
            <input data-target="#wpbs-reminder-sms-notification-wrapper" name="reminder_sms_notification_enable" type="checkbox" id="reminder_sms_notification_enable"  class="regular-text wpbs-settings-toggle wpbs-settings-wrap-toggle" <?php echo ( !empty($form_meta['reminder_sms_notification_enable'][0]) ) ? 'checked' : '';?> >
            <div class="wpbs-checkbox-slider"></div>
        </label>
	</div>
</div>

<div id="wpbs-reminder-sms-notification-wrapper" class="wpbs-user-notification-wrapper wpbs-settings-wrapper <?php echo ( !empty($form_meta['reminder_sms_notification_enable'][0]) ) ? 'wpbs-settings-wrapper-show' : '';?>">

    <!-- Email Tags -->
    <div class="card wpbs-email-tags-wrapper">
        <h2 class="title"><?php echo __( 'Dynamic Tags', 'wp-booking-system-sms' ); ?></h2>
        <p><?php echo __( 'You can use these dynamic tags in any of the fields. They will be replaced with the values submitted in the form.', 'wp-booking-system-sms' ); ?></p>
        
        <?php wpbs_output_email_tags($form_data); ?>

    </div>

    <!-- When to send -->
    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="reminder_sms_notification_when_to_send"><?php echo __( 'When to send', 'wp-booking-system-sms'); ?></label>

        <div class="wpbs-settings-field-inner">
            <input name="reminder_sms_notification_when_to_send" type="number" min="1" id="reminder_sms_notification_when_to_send" value="<?php echo ( !empty($form_meta['reminder_sms_notification_when_to_send'][0]) ) ? esc_attr($form_meta['reminder_sms_notification_when_to_send'][0]) : '7';?>" class="regular-text" >
            <?php echo __('days before the booking starts','wp-booking-system-sms') ?>
        </div>
    </div>

    <!-- Send To -->
    <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
        <label class="wpbs-settings-field-label" for="reminder_sms_notification_send_to"><?php echo __( 'Send To', 'wp-booking-system-sms' ); ?></label>

        <div class="wpbs-settings-field-inner">
                <?php $send_to = ( !empty($form_meta['reminder_sms_notification_send_to'][0]) ) ? esc_attr($form_meta['reminder_sms_notification_send_to'][0]) : ''; ?>
                <select name="reminder_sms_notification_send_to" id="reminder_sms_notification_send_to">
                    <?php foreach($phone_fields as $phone_field): ?>
                    <option <?php echo ($send_to == '{' . $phone_field['id'] . ':' . $phone_field['values']['default']['label'] . '}') ? 'selected' : '';?> value="<?php echo '{' . $phone_field['id'] . ':' . $phone_field['values']['default']['label'] . '}'; ?>"><?php echo '{' . $phone_field['id'] . ':' . $phone_field['values']['default']['label'] . '}'; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
    </div> 
    
    <!-- Message -->
    <div class="wpbs-settings-field-translation-wrapper">
        <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">
            <label class="wpbs-settings-field-label" for="reminder_sms_notification_message"><?php echo __( 'Message', 'wp-booking-system-sms' ); ?></label>

            <div class="wpbs-settings-field-inner">
                <textarea name="reminder_sms_notification_message" placeholder="" type="text" id="reminder_sms_notification_message"class="regular-text" ><?php echo ( !empty($form_meta['reminder_sms_notification_message'][0]) ) ? esc_attr($form_meta['reminder_sms_notification_message'][0]) : '';?></textarea>
                <?php if(wpbs_translations_active()): ?><a href="#" class="wpbs-settings-field-show-translations"><?php echo __( 'Translations', 'wp-booking-system-sms' ); ?> <i class="wpbs-icon-down-arrow"></i></a><?php endif ?>
            </div>
        </div> 
    
        <?php if(wpbs_translations_active()): ?>
        <!-- Subject Translations -->
        <div class="wpbs-settings-field-translations">
            <?php foreach($active_languages as $language): ?>
                <!-- Submit Button -->
                <div class="wpbs-settings-field-wrapper wpbs-settings-field-inline wpbs-settings-field-large">

                    <label class="wpbs-settings-field-label" for="reminder_sms_notification_message_translation_<?php echo $language;?>"><img src="<?php echo WPBS_PLUGIN_DIR_URL ;?>/assets/img/flags/<?php echo $language;?>.png" /> <?php echo $languages[$language];?></label>

                    <div class="wpbs-settings-field-inner">
                        <textarea name="reminder_sms_notification_message_translation_<?php echo $language;?>" placeholder="" type="text" id="reminder_sms_notification_message_translation_<?php echo $language;?>"class="regular-text" ><?php echo ( !empty($form_meta['reminder_sms_notification_message_translation_' . $language][0]) ) ? esc_attr($form_meta['reminder_sms_notification_message_translation_' . $language][0]) : '';?></textarea>
                    </div>
                    
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif ?>
    </div> 
</div>

<?php endif; ?>