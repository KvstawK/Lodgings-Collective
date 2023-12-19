<?php

function html_form() {
	?>
    <form action="" method="post">
        <input type="email" id="lc-newsletter-email" name="lc-newsletter-email" aria-label="<?php echo esc_attr__('Please enter your email', 'lc-newsletter'); ?>" placeholder="<?php echo esc_attr__('Your email', 'lc-newsletter'); ?>">
        <input type="submit" class="btn" name="lc-newsletter-submit" value="<?php echo esc_attr__('Subscribe', 'lc-newsletter'); ?>">
        <input type="hidden" name="action" value="lc-newsletter">
    </form>
	<?php
}

function subscribe() {
	if ( 'POST' === $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && 'lc-newsletter' === $_POST['action'] ) {
		$email     = sanitize_email( $_POST['lc-newsletter-email'] );
		$post_type = 'lc-newsletter';

		$existing_post = get_page_by_title( $email, OBJECT, $post_type );
		if ( !empty( $existing_post ) ) {
			return;
		}

		$new_post = array(
			'post_title'    => $email,
			'post_status'   => 'publish',
			'post_type'     => $post_type,
		);

		$pid = wp_insert_post( $new_post );
		if ( ! is_wp_error( $pid ) ) {
			add_post_meta( $pid, 'lc-newsletter-email', $email, true );
			?>
            <div class="subscription-success">
                <p><?php esc_html_e( 'You are now subscribed!', 'lc-newsletter' ); ?></p>
            </div>
			<?php
		} else {
			?>
            <div class="subscription-success">
                <p><?php esc_html_e( 'You have already subscribed!', 'lc-newsletter' ); ?></p>
            </div>
			<?php
		}
	}
}



