<?php

function lodgings_collective_theme_sidebar()
{
    register_sidebar(
        array(
        'id' => 'primary-sidebar',
        'name' => esc_html__('Primary Sidebar', 'lodgings_collective_theme'),
        'description' => esc_html__('The sidebar for the blog page', 'lodgings_collective_theme'),
        'before_widget' => '<section id="%1$s" class="blog__sidebar-container-item %2$s">',
        'after_widget' => '</section>'
        )
    );
}

add_action('widgets_init', 'lodgings_collective_theme_sidebar');
