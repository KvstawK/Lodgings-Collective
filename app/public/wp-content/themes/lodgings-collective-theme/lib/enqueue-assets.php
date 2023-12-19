<?php

function lodgings_collective_theme_assets()
{
	wp_enqueue_style('lodgings_collective_theme_stylesheet', get_template_directory_uri() . '/assets/dist/css/styles.css', array(), '1.0.0', 'all');

    wp_enqueue_script('lodgings_collective_theme_script', get_template_directory_uri() . '/assets/dist/js/app.js', array(), '1.0.0', true);

	wp_enqueue_script('getyourguide', 'https://widget.getyourguide.com/dist/pa.umd.production.min.js', array(), null, true);

    if(is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'lodgings_collective_theme_assets');


function lodgings_collective_theme_admin_assets()
{

    wp_enqueue_style('lodgings_collective_theme_admin_stylesheet', get_template_directory_uri() . '/assets/dist/css/admin.css', array(), '1.0.0', 'all');

    wp_enqueue_script('lodgings_collective_theme_admin_script', get_template_directory_uri() . '/assets/dist/js/admin.js', array('jquery'), '1.0.0', true);

    wp_enqueue_media();
}

add_action('admin_enqueue_scripts', 'lodgings_collective_theme_admin_assets');
