<?php
/**
 * Plugin Name: Employee Manager
 * Description: A plugin to manage employees with custom fields, CSV export, and average salary AJAX.
 * Version: 1.0
 * Author: Ushna Mughal
 */

if (!defined('ABSPATH')) exit;

// Includes
include_once plugin_dir_path(__FILE__) . 'includes/post-type.php';
include_once plugin_dir_path(__FILE__) . 'includes/meta-boxes.php';
include_once plugin_dir_path(__FILE__) . 'includes/admin-page.php';
include_once plugin_dir_path(__FILE__) . 'includes/export.php';
include_once plugin_dir_path(__FILE__) . 'includes/ajax-handler.php';
