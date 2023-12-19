<?php

function lodgings_collective_theme_register_menus()
{
    register_nav_menus(
        array(
        'main-menu' => esc_html__('Main Menu', 'lodgings_collective_theme')
        )
    );
}

add_action('init', 'lodgings_collective_theme_register_menus');


$imgId = 42;
function lodgings_collective_theme_submenu_button($imgId, $title)
{
    $button = '<button class="menu-button" aria-expanded="false">';
    $button .= '<span class="screen-reader-text menu-button-show" aria-hidden="false">' . sprintf(esc_html__('Show %s submenu', 'lodgings_collective_theme'), $title) . '</span>';
    $button .= '<span class="screen-reader-text menu-button-hide" aria-hidden="true">' . sprintf(esc_html__('Hide %s submenu', 'lodgings_collective_theme'), $title) . '</span>';
    $button .= '<div aria-hidden="true">' . wp_get_attachment_image($imgId, "full") . '</div>';
    $button .= '</button>';
    return $button;
}


function lodgings_collective_theme_dropdown_icon($title, $item, $args, $depth)
{
    if($args->theme_location == 'main-menu') {
        if(in_array('menu-item-has-children', $item->classes)) {
            if($depth == 0) {
                $title .= lodgings_collective_theme_submenu_button(41, $title);
            } else {
                $title .= lodgings_collective_theme_submenu_button(42, $title);
            }
        }
    }
    return $title;
}

add_filter('nav_menu_item_title', 'lodgings_collective_theme_dropdown_icon', 10, 4);


// Aria labels for accessibility
function lodgings_collective_theme_aria_has_dropdown($atts, $item, $args)
{
    if($args->theme_location == 'main-menu') {
        if(in_array('menu-item-has-children', $item->classes)) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }
    }
    return $atts;
}

add_filter('nav_menu_link_attributes', 'lodgings_collective_theme_aria_has_dropdown', 10, 3);
