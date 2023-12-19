<?php

class LC_Newsletter_Settings {
	public function __construct() {
		add_action('admin_menu', array($this, 'add_settings_page'));
		add_action('admin_init', array($this, 'register_settings'));
		add_action('admin_post_send_newsletter', array($this, 'send_newsletter'));
	}

	public function add_settings_page() {
		add_submenu_page(
			'edit.php?post_type=lc-newsletter',
			'LC Newsletter Settings',
			'Settings',
			'manage_options',
			'lc-newsletter',
			array($this, 'render_settings_page')
		);
	}

	public function register_settings() {
		register_setting('lc-newsletter', 'lc_newsletter_title');
		register_setting('lc-newsletter', 'lc_newsletter_content');
	}

	public function render_settings_page() {
		?>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
			<?php settings_fields('lc-newsletter'); ?>
            <h2>LC Newsletter Settings</h2>
            <p>Set your newsletter title and content.</p>
            <table>
                <tr>
                    <th>Title</th>
                    <td><input type="text" name="lc_newsletter_title" value="<?php echo esc_attr(get_option('lc_newsletter_title')); ?>" /></td>
                </tr>
                <tr>
                    <th>Content</th>
                    <td><textarea name="lc_newsletter_content"><?php echo esc_html(get_option('lc_newsletter_content')); ?></textarea></td>
                </tr>
            </table>
            <input type="hidden" name="action" value="send_newsletter">
			<?php submit_button('Send Newsletter'); ?>
        </form>
		<?php
	}

	public function send_newsletter() {
		// Get all the subscribers from the "lc-newsletter" custom post type
		$subscribers = get_posts(array(
			'post_type' => 'lc-newsletter',
			'posts_per_page' => -1
		));

		// Get the newsletter title and content from the settings
		$subject = get_option('lc_newsletter_title');
		$message = get_option('lc_newsletter_content');

		// Send the email to each subscriber
		$sent = true;  // Keep track of whether the email was sent
		foreach ($subscribers as $subscriber) {
			$to = $subscriber->post_title;
			$result = wp_mail($to, $subject, $message);
			if (!$result) {
				$sent = false;  // If any email fails to send, set $sent to false
			}
		}

		// Redirect back to the settings page, with a query parameter indicating whether the email was sent
		$redirect_url = add_query_arg('sent', $sent ? 'true' : 'false', $_SERVER['HTTP_REFERER']);
		wp_redirect($redirect_url);
		exit;
	}
}
