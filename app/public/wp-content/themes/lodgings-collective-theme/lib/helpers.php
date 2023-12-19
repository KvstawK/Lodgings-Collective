<?php

// Allow to add svg in the WordPress Library
add_filter(
    'wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
        $filetype = wp_check_filetype($filename, $mimes);
        return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
        ];

    }, 10, 4
);

function cc_mime_types( $mimes )
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'fix_svg');


// Viber links protocol, needed for esc_url Viber links
add_filter(
    'kses_allowed_protocols',
    function ( $protocols ) {
        $protocols[] = 'viber';
        return $protocols;
    }
);

// Read More for blog posts link
function lodgings_collective_theme_readmore_link()
{
    echo '<a href="' . esc_url(get_permalink()) . '" title="' . the_title_attribute(['echo' => false]) . '"><button class="btn btn--blog">';
    /* translators: %s: Post Title */
    printf(
        wp_kses(
            __('Read More <span class="screen-reader-text">About %s</span>', 'lodgings_collective_theme'),
            [
                'span' => [
                    'class' => []
                ]
            ]
        ),
        get_the_title()
    );
    echo wp_get_attachment_image(45, 'full') . '</button></a>';
}


// Meta for single blog post
if(!function_exists('lodgings_collective_theme_post_meta')) {
    function lodgings_collective_theme_post_meta()
    {
        /* translators: %s: Post Date */
        printf(
            esc_html__('Posted on %s', 'lodgings_collective_theme'),
            '<div><time datetime="' . esc_attr(get_the_date('c')) . '">' .  esc_html(get_the_date()) . '</time></div>'
        );
        /* translators: %s: Post Author */
        printf(
            esc_html__(' By: %s', 'lodgings_collective_theme'),
            '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
        );
    }
}


// Only show blog posts from search widget
function SearchFilter($query)
{
    if (($query->is_search)&&(!is_admin())) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts', 'SearchFilter');


// Modify archive.php, get rid of the “Category:”, “Tag:”, “Author:”, “Archives:” and “Other taxonomy name:” in the archive title.
function lodgings_collective_theme_archive_title( $title )
{
    if (is_category() ) {
        $title = single_cat_title('', false);
    } elseif (is_tag() ) {
        $title = single_tag_title('', false);
    } elseif (is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive() ) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax() ) {
        $title = single_term_title('', false);
    }

    return $title;
}

add_filter('get_the_archive_title', 'lodgings_collective_theme_archive_title');


// Only show comments from the blog in recent comments widget
function lodgings_collective_theme_comments_widget($comment_args)
{
    $comment_args['post_type'] = 'post';
    return $comment_args;
}

add_filter('widget_comments_args', 'lodgings_collective_theme_comments_widget');


// Validate if user has a Gravatar
function validate_gravatar($email)
{
    // Craft a potential url and test its headers
    $hash = md5(strtolower(trim($email)));
    $uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
    $headers = @get_headers($uri);
    if (!preg_match("|200|", $headers[0])) {
        $has_valid_avatar = false;
    } else {
        $has_valid_avatar = true;
    }
    return $has_valid_avatar;
}

// Load asynchronous CSS
function load_css_asynchronously( $html, $handle, $href, $media ) {
	$async_styles = array(
//		'/wp-content/themes/rentals-collective-theme-two/assets/dist/css/styles.css',
		'/wp-includes/css/dist/block-library/style.min.css',
		'/wp-includes/css/classic-themes.min.css',
		'/wp-content/plugins/wp-booking-system-premium/assets/css/style-front-end.min.css',
		'/wp-content/plugins/wp-booking-system-premium-contracts/assets/css/style-front-end.min.css',
		'/wp-content/plugins/wp-booking-system-premium-multiple-currencies/assets/css/style-front-end.min',
//		'/wp-content/plugins/wp-booking-system-premium-search/assets/css/style-front-end.min.css',
		'/wp-content/plugins/wp-booking-system-premium-stripe/assets/css/style-front-end.min.css',
	);
	foreach ( $async_styles as $async_style ) {
		if ( strpos( $href, $async_style ) !== false ) {
			$html = <<<EOT
<link rel='stylesheet' id='$handle' href='$href' media='none' onload="if(media!='all')media='all'" />
<noscript><link rel='stylesheet' id='$handle-noscript' href='$href' media='all' /></noscript>
EOT;
		}
	}
	return $html;
}
add_filter( 'style_loader_tag', 'load_css_asynchronously', 10, 4 );


// Async js
function load_js_asynchronously( $tag, $handle, $src ) {
	$async_scripts = array(
//		'/wp-includes/js/jquery/jquery.min.js',
//		'/wp-includes/js/jquery/jquery-migrate.min.js',
//		'/wp-includes/js/jquery/ui/core.min.js',
//		'/wp-includes/js/jquery/ui/datepicker.min.js',
		'/wp-content/plugins/ewww-image-optimizer/includes/lazysizes.min.js',
		'/wp-content/plugins/wp-booking-system-premium/assets/js/moment.min.js',
		'/wp-content/plugins/wp-booking-system-premium/assets/js/script-front-end.min.js',
		'/wp-content/plugins/wp-booking-system-premium-multiple-currencies/assets/js/script-front-end.min.js',
		'/wp-content/plugins/wp-booking-system-premium-inventory/assets/js/script-front-end.min.js',
		'/wp-content/plugins/wp-booking-system-premium-contracts/assets/js/script-front-end.min.js',
		'/wp-content/plugins/wp-booking-system-premium-contracts/assets/js/signature_pad.umd.min.js',
		'/wp-content/plugins/wp-booking-system-premium-search/assets/js/script-front-end.min.js',
//		'/wp-content/themes/lodgings-collective-theme/assets/dist/js/app.js?ver=1.0.0'
	);

	foreach ( $async_scripts as $async_script ) {
		if ( strpos( $src, $async_script ) !== false ) {
			$tag = str_replace( ' src', ' async="async" src', $tag );
		}
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'load_js_asynchronously', 10, 3 );


// Add plausible.io script
function add_to_head() {
	?>
	<script defer data-domain="lodgingscollective.com" src="https://plausible.io/js/script.js"></script>
	<?php
}
add_action( 'wp_head', 'add_to_head' );


// Search & Filter Plugin
function custom_validate_form($output, $form, $calendar, $language, $form_fields) {
	// Check if the 'number_of_persons' field is set and get its value
	$people = isset($_GET['number_of_persons']) ? intval($_GET['number_of_persons']) : 0;

	// Query to get rentals with 'persons' meta value less than the user's input
	$args = array(
		'post_type' => 'lc-rentals',
		'meta_query' => array(
			array(
				'key' => 'persons',
				'value' => $people,
				'compare' => '<',
				'type' => 'NUMERIC'
			)
		)
	);
	$query = new WP_Query($args);

	// If any rentals are found, display an error message
	if ($query->have_posts()) {
		return array(
			'error_message' => "Some rentals do not accommodate the specified number of persons.",
			'error' => true,
		);
	}

	return $output;
}

add_filter('wpbs_form_validator_custom_field_validation', 'custom_validate_form', 20, 5);


// Find static images
function get_attachment_image_url($attachment_id, $size = 'full') {
    $image_data = wp_get_attachment_image_src($attachment_id, $size);
    return $image_data ? $image_data[0] : false;
}





