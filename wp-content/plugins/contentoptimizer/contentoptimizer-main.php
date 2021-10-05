<?php

/**
 *
 * The file responsible for starting the 1Point21 Content Optimizer Plugin
 *
 * The 1Point21 Content Optimizer Plugin is a plugin that displays....
 *
 * Plugin Name: 1Point21 Content Optimizer
 * Description: Enables Content Optimizer Features on Page/Post Content
 * Version: 1.0
 * Author: 1Point21 Interactive
 * Author URI: https://www.1point21interactive.com
 */

if (!defined('WPINC')) {
    die;
}

/**
 * Include the core classes responsible for loading all necessary components of the plugin.
 */

require_once plugin_dir_path(__FILE__) . 'contentoptimizer-sidebar.php';
require_once plugin_dir_path(__FILE__) . 'contentoptimizer-ajax.php';

new Content_Optimizer_Sidebar();
new Content_Optimizer_Ajax();