<?php

// Compress images on upload in WordPress library and deletes the original uncompressed image.
add_filter('wp_handle_upload', 'compress_and_convert_on_upload');

function compress_and_convert_on_upload($image) {
	$quality = 75;

	$info = getimagesize($image['file']);

	if ($info['mime'] == 'image/jpeg') {
		$compressed_image = compress_jpeg($image['file'], $quality);
		unlink($image['file']);
		rename($compressed_image, $image['file']);
	}
	elseif ($info['mime'] == 'image/png') {
		$compressed_image = compress_png($image['file'], $quality);
		unlink($image['file']);
		rename($compressed_image, $image['file']);
	}

	return $image;
}

function compress_jpeg($path, $quality) {
	$image = imagecreatefromjpeg($path);
	$temp = tempnam(sys_get_temp_dir(), 'JPEG_COMPRESSION_TEMP');
	imagejpeg($image, $temp, $quality);
	imagedestroy($image);
	return $temp;
}

function compress_png($path, $quality) {
	$image = imagecreatefrompng($path);
	$temp = tempnam(sys_get_temp_dir(), 'PNG_COMPRESSION_TEMP');
	imagepng($image, $temp, 9 - ($quality / 10));
	imagedestroy($image);
	return $temp;
}


