<?php
function emp_admin_menu() {
    add_submenu_page('edit.php?post_type=employee', 'Employee Admin', 'Admin Page', 'manage_options', 'employee_admin', 'emp_render_admin_page');
}
add_action('admin_menu', 'emp_admin_menu');

function emp_render_admin_page() {
    echo '<div class="wrap"><h1>Employee Admin</h1>';

    // CSV export button
    echo '<p><a href="' . esc_url(admin_url('admin.php?page=employee_admin&emp_export=1')) . '" class="button button-primary">Export CSV</a></p>';

    // Average salary (AJAX-loaded)
    echo '<div id="avg-salary"><strong>Average Salary:</strong> Loading...</div>';

    // Employee list
    $query = new WP_Query([
        'post_type' => 'employee',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    ]);

    if ($query->have_posts()) {
        echo '<h2>Employee List</h2>';
        echo '<table class="widefat fixed striped"><thead><tr>
                <th>Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Salary</th>
              </tr></thead><tbody>';

        foreach ($query->posts as $post) {
            $name = get_the_title($post);
            $email = get_post_meta($post->ID, 'email', true);
            $position = get_post_meta($post->ID, 'position', true);
            $salary = get_post_meta($post->ID, 'salary', true);

            echo '<tr>';
            echo '<td>' . esc_html($name) . '</td>';
            echo '<td>' . esc_html($email) . '</td>';
            echo '<td>' . esc_html($position) . '</td>';
            echo '<td>$' . number_format((float) $salary, 2) . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    } else {
        echo '<p>No employees found.</p>';
    }

    echo '</div>';
}
