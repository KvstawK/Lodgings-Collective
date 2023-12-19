<?php

function wp_get_attachment($attachment_id)
{

    $attachment = get_post($attachment_id);
    return array(
        'alt' => get_post_meta($attachment->ID, 'images', true),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink($attachment->ID),
        'src' => $attachment->guid,
        'title' => $attachment->post_title
    );
}


function multi_media_uploader_field($name, $value = '') {
    $image = '">' . esc_html__('Add Images', 'lc-slider') . '';
    $image_str = '';
    $image_size = 'full';
    $display = 'none';
    $value = explode(',', $value);

    if (!empty($value)) {
        foreach ($value as $values) {
            if ($image_attributes = wp_get_attachment_image_src($values, $image_size)) {
                $image_str .= '<li data-attachment-id=' . $values . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="dashicons dashicons-no delete-img"></i></li>';
            }
        }

    }

    if($image_str){
        $display = 'inline-block';
    }

    return '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attachments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">' . esc_html__('Remove All Images', 'lc-slider') . '</a></div>';
}

// Add text field in attachment details screen

// Add custom text/textarea attachment field
function add_custom_text_field_to_attachment_fields_to_edit( $form_fields, $post ) {
    $text_field = get_post_meta($post->ID, 'text_field', true);
    $form_fields['text_field'] = array(
        'label' => esc_html__('Add a link URL', 'lc-slider'),
        'input' => 'text', // you may also use 'textarea' field
        'value' => $text_field,
        'helps' => esc_html__('Add a link to redirect from this attachment (example: https://eadjustments.com)', 'lc-slider')
    );
    return $form_fields;
}
add_filter('attachment_fields_to_edit', 'add_custom_text_field_to_attachment_fields_to_edit', null, 2);

// Save custom text/textarea attachment field
function save_custom_text_attachment_field($post, $attachment) {
    if( isset($attachment['text_field']) ){
        update_post_meta($post['ID'], 'text_field', sanitize_text_field( $attachment['text_field'] ) );
    }else{
        delete_post_meta($post['ID'], 'text_field' );
    }
    return $post;
}
add_filter('attachment_fields_to_save', 'save_custom_text_attachment_field', null, 2);


// Add custom checkbox attachment field
//function add_custom_checkbox_field_to_attachment_fields_to_edit( $form_fields, $post ) {
//    $checkbox_field = (bool) get_post_meta($post->ID, 'checkbox_field', true);
//    $form_fields['checkbox_field'] = array(
//        'label' => 'Checkbox',
//        'input' => 'html',
//        'html' => '<input type="checkbox" id="attachments-'.$post->ID.'-checkbox_field" name="attachments['.$post->ID.'][checkbox_field]" value="1"'.($checkbox_field ? ' checked="checked"' : '').' /> ',
//        'value' => $checkbox_field,
//        'helps' => ''
//    );
//    return $form_fields;
//}
//add_filter('attachment_fields_to_edit', 'add_custom_checkbox_field_to_attachment_fields_to_edit', null, 2);
//
//// Save custom checkbox attachment field
//function save_custom_checkbox_attachment_field($post, $attachment) {
//    if( isset($attachment['checkbox_field']) ){
//        update_post_meta($post['ID'], 'checkbox_field', sanitize_text_field( $attachment['checkbox_field'] ) );
//    }else{
//        delete_post_meta($post['ID'], 'checkbox_field' );
//    }
//    return $post;
//}
//add_filter('attachment_fields_to_save', 'save_custom_checkbox_attachment_field', null, 2);