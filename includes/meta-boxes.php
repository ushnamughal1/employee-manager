<?php
function emp_add_meta_boxes() {
    add_meta_box('emp_details', 'Employee Details', 'emp_render_meta_box', 'employee', 'normal', 'default');
}
add_action('add_meta_boxes', 'emp_add_meta_boxes');

function emp_render_meta_box($post) {
    $fields = ['position', 'email', 'date_of_hire', 'salary'];
    foreach ($fields as $field) {
        $value = get_post_meta($post->ID, $field, true);
        echo '<p><label>' . ucfirst(str_replace('_', ' ', $field)) . '</label><br>';
        echo '<input type="text" name="' . esc_attr($field) . '" value="' . esc_attr($value) . '" /></p>';
    }
}

function emp_save_meta_boxes($post_id) {
    foreach (['position', 'email', 'date_of_hire', 'salary'] as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'emp_save_meta_boxes');
