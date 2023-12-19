<?php

// Define the maximum width and height for standard and retina resized images
define( 'AUTO_RESIZE_IMAGES_MAX_WIDTH', 1200 );
define( 'AUTO_RESIZE_IMAGES_MAX_HEIGHT', 800 );
define( 'AUTO_RESIZE_IMAGES_RETINA_MAX_WIDTH', 2400 );
define( 'AUTO_RESIZE_IMAGES_RETINA_MAX_HEIGHT', 1600 );

// Add a filter to automatically resize images on upload
add_filter( 'wp_generate_attachment_metadata', 'auto_resize_images', 10, 2 );

function auto_resize_images( $metadata, $attachment_id ) {
	// Get the path to the full-size image
	$full_size_image_path = get_attached_file( $attachment_id );

	// Check if the device has a retina screen
	$is_retina = ( isset( $_SERVER['HTTP_USER_AGENT'] ) && strpos( $_SERVER['HTTP_USER_AGENT'], 'AppleWebKit' ) !== false && strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false && isset( $_SERVER['HTTP_X_DEVICE_PIXEL_RATIO'] ) && $_SERVER['HTTP_X_DEVICE_PIXEL_RATIO'] > 1 );

	// Get the image dimensions
	list( $orig_width, $orig_height ) = getimagesize( $full_size_image_path );

	// Calculate the new image dimensions
	$new_width = $is_retina ? AUTO_RESIZE_IMAGES_RETINA_MAX_WIDTH : AUTO_RESIZE_IMAGES_MAX_WIDTH;
	$new_height = $is_retina ? AUTO_RESIZE_IMAGES_RETINA_MAX_HEIGHT : AUTO_RESIZE_IMAGES_MAX_HEIGHT;
	$ratio_orig = $orig_width / $orig_height;
	$ratio_new = $new_width / $new_height;
	if ( $ratio_new > $ratio_orig ) {
		$new_width = $new_height * $ratio_orig;
	} else {
		$new_height = $new_width / $ratio_orig;
	}

	// Resize the image using GD library
	$image = wp_get_image_editor( $full_size_image_path );
	if ( ! is_wp_error( $image ) ) {
		$image->resize( $new_width, $new_height, true );
		$resized_file_path = $image->save();

		// Update the attachment metadata with the new image dimensions
		$metadata['width'] = $new_width;
		$metadata['height'] = $new_height;
		$metadata['file'] = wp_basename( $resized_file_path );
	}

	return $metadata;
}
