<?php
$sub_tabs = wpbs_sms_form_get_sub_tabs();
$active_section = ( ! empty( $_GET['section']) && array_key_exists($_GET['section'], $sub_tabs) ? sanitize_text_field( $_GET['section'] ) : key($sub_tabs) ); 
$settings = get_option( 'wpbs_settings', array() );
$active_languages = (!empty($settings['active_languages']) ? $settings['active_languages'] : array());
$languages = wpbs_get_languages();
?>



<ul class="subsubsub wpbs-form-tab-navigation">
    <?php 
        $i = 0; foreach( $sub_tabs as $tab_slug => $tab_name ) {

            echo '<li> ' . ($i != 0 ? '&nbsp;|&nbsp;' : '') . '<a href="' . add_query_arg( array( 'page' => 'wpbs-forms', 'subpage' => 'edit-form', 'form_id' => $_GET['form_id'], 'tab' => 'sms-notifications', 'section' => $tab_slug), admin_url('admin.php') ) . '" data-tab="' . $tab_slug . '" '. ($active_section == $tab_slug  ? ' class="current"' : '').'>' . $tab_name . '</a></li>';
        $i++;
        }
    ?>
</ul>

<div class="wpbs-clear"><!-- --></div>

<div class="wpbs-form-sections">

    <?php foreach( $sub_tabs as $tab_slug => $tab_name ) {

				echo '<div class="wpbs-form-section wpbs-form-section-' . $tab_slug . ( $active_section == $tab_slug ? ' wpbs-section-active' : '' ) . ' " data-tab="' . $tab_slug . '">';

				// Handle general tab
				if( $tab_slug == 'admin-notification' ) {

                    include 'view-edit-form-tab-sms-admin-notification.php';
				
				// Handle general tab
				} else if( $tab_slug == 'user-notification' ) {

					include 'view-edit-form-tab-sms-user-notification.php';
				
				} else if( $tab_slug == 'payment-notification' ) {

					include 'view-edit-form-tab-sms-payment-notification.php';
				
				} else if( $tab_slug == 'reminder-notification' ) {

					include 'view-edit-form-tab-sms-reminder-notification.php';

				} else if( $tab_slug == 'follow-up-notification' ) {

					include 'view-edit-form-tab-sms-follow-up-notification.php';

				// Handle dynamic tabs
				} else {

					/**
					 * Action to dynamically add content for each tab
					 *
					 */
					do_action( 'wpbs_submenu_page_edit_form_tabs_sms_notifications_' . $tab_slug );
				}
				echo '</div>';
			}

	?>
		

</div>
