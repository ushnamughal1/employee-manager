<?php
add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook === 'employee_page_employee_admin') {
        wp_enqueue_script('emp-admin', plugin_dir_url(__FILE__) . '../js/admin-script.js', ['jquery'], null, true);
        wp_localize_script('emp-admin', 'emp_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('emp_nonce')
        ]);
    }
});

add_action('wp_ajax_get_average_salary', function () {
    check_ajax_referer('emp_nonce', 'nonce');
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Unauthorized');
    }

    global $wpdb;
    $results = $wpdb->get_col("
        SELECT meta_value FROM $wpdb->postmeta 
        WHERE meta_key = 'salary' AND meta_value != ''
    ");

    $salaries = array_filter(array_map('floatval', $results), function($val) {
        return $val > 0;
    });

    $average = count($salaries) ? array_sum($salaries) / count($salaries) : 0;

    wp_send_json_success(['average' => number_format($average, 2)]);
});
