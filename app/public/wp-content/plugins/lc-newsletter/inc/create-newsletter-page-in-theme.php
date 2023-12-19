<?php

function lc_create_newsletter_page() {
	$page = array(
		'post_type' => 'page',
		'post_title' => 'Lodgings Collective Newsletter',
		'post_status' => 'publish',
		'post_author' => 1,
	);

	// Check if the page exists already
	$existing_page = get_page_by_title($page['post_title']);
	if ($existing_page === null) {
		// Temporarily remove the save_post_page action to prevent email sending
		remove_action('save_post_page', 'lc_on_save_newsletter_page', 10);

		// The page doesn't exist, so create it
		$post_id = wp_insert_post($page);

		// Set a post meta value to indicate that the email has not been sent yet
		update_post_meta($post_id, '_lc_newsletter_email_sent', false);

		// Re-add the save_post_page action
		add_action('save_post_page', 'lc_on_save_newsletter_page', 10, 3);
	}
}

function lc_on_save_newsletter_page($post_id, $post, $update) {
	$newsletter_page = get_page_by_title('Lodgings Collective Newsletter');
	if ($post_id !== $newsletter_page->ID) {
		// This is not the Lodgings Collective Newsletter page, so we can ignore it
		return;
	}

	// Check if the email has already been sent for this save
	$email_sent = get_post_meta($post_id, '_lc_newsletter_email_sent', true);
	if ($email_sent) {
		// The email has already been sent, so we can ignore this save
		return;
	}

	// Get all the subscribers from the "lc-newsletter" custom post type
	$subscribers = get_posts(array(
		'post_type' => 'lc-newsletter',
		'posts_per_page' => -1
	));

	// Get the newsletter title and content from the post data
	$subject = $post->post_title . ' - ' . date('F Y');
	$message = apply_filters('the_content', $post->post_content);

	// Send the email to each subscriber
	foreach ($subscribers as $subscriber) {
		// You might need to adjust this depending on how the subscriber's email is stored
		$to = $subscriber->post_title;
		$headers = array('Content-Type: text/html; charset=UTF-8');

		// Add the unsubscribe link to the footer
		$unsubscribe_link = sprintf(
			'<p><a href="%s/lc-newsletter-unsubscribe?unsubscribe=1&email=%s">%s</a></p>',
			home_url(),
			$to,
			esc_html__('Unsubscribe', 'lc-newsletter')
		);
		$message_with_unsubscribe = $message . $unsubscribe_link;

		wp_mail($to, $subject, $message_with_unsubscribe, $headers);

		// Delete the post associated with this email address
		wp_delete_post($subscriber->ID);
	}

	// Set a post meta value to indicate that the email has been sent
	update_post_meta($post_id, '_lc_newsletter_email_sent', true);
}

// Add the action to trigger lc_on_save_newsletter_page when a page is saved
add_action('save_post_page', 'lc_on_save_newsletter_page', 10, 3);

function lc_delete_newsletter_page() {
	$page = get_page_by_title('Lodgings Collective Newsletter');
	if ($page) {
		wp_delete_post($page->ID, true);
	}
}
