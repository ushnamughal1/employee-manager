<?php
function emp_register_post_type() {
    register_post_type('employee', [
        'label' => 'Employees',
        'public' => false,
        'show_ui' => true,
        'supports' => ['title'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-id',
    ]);
}
add_action('init', 'emp_register_post_type');
