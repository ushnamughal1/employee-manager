jQuery(document).ready(function($) {
    $.post(emp_ajax.ajax_url, {
        action: 'get_average_salary',
        nonce: emp_ajax.nonce
    }, function(response) {
        if (response.success) {
            $('#avg-salary').text('Average Salary: $' + response.data.average);
        } else {
            $('#avg-salary').text('Could not load average salary');
        }
    });
});
