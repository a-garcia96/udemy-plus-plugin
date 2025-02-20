<?php

/*
 * Plugin Name:       Udemy Plus
 * Plugin URI:        https://udemy.com/
 * Description:       A plugin for adding blocks to the udemy theme.
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      8
 * Author:            Alex Garcia
 * Author URI:        https://algarcia.dev/
 * Text Domain:       udemy-plus
 * Domain Path:       /languages
 */

//  VERIFY THAT WORDPRESS HAS LOADED
if (!function_exists('add_action')) {
    echo 'Seems like you stumbled here by accident!';
    exit;
}

// SETUP
define('UP_PLUGIN_DIR', plugin_dir_path(__FILE__));

// INCLUDES
$rootFiles = glob(UP_PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(UP_PLUGIN_DIR . 'includes/**/*.php');

$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach ($allFiles as $fileName) {
    include_once($fileName);
}

// include(UP_PLUGIN_DIR . 'includes/register-blocks.php');
// include(UP_PLUGIN_DIR . 'includes/blocks/search-form.php');
// include(UP_PLUGIN_DIR . 'includes/blocks/page-header.php');


// HOOKS
add_action('init', 'up_register_blocks');
add_action('rest_api_init', 'up_rest_api_init');
add_action('wp_enqueue_scripts', 'up_enqueue_scripts');