<?php

function lodgings_collective_theme_support()
{
    // add_theme_support('lc-testimonials');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption'));
    add_theme_support(
        'custom-logo', array(
        'flex-height' => true,
        "flex-width" => true
        )
    );
    add_theme_support(
        'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
        )
    );
    add_theme_support('align-wide');
    add_image_size('lodgings_collective_theme_custom_image', 70, 50);
    load_theme_textdomain('lodgings_collective_theme', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'lodgings_collective_theme_support');
