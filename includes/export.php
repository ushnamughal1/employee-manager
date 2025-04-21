<?php
add_action('admin_init', function () {
    if (isset($_GET['emp_export']) && current_user_can('manage_options')) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="employees.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $out = fopen('php://output', 'w');
        fputcsv($out, ['Name', 'Email', 'Position', 'Salary']);

        $query = new WP_Query([
            'post_type' => 'employee',
            'posts_per_page' => -1,
        ]);

        foreach ($query->posts as $post) {
            $name = get_the_title($post);
            $email = get_post_meta($post->ID, 'email', true);
            $position = get_post_meta($post->ID, 'position', true);
            $salary = get_post_meta($post->ID, 'salary', true);

            fputcsv($out, [
                sanitize_text_field($name),
                sanitize_email($email),
                sanitize_text_field($position),
                floatval($salary)
            ]);
        }

        fclose($out);
        exit;
    }
});
