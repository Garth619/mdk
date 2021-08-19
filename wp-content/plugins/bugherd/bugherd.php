<?php
/**
 * Plugin Name:     BugHerd
 * Plugin URI:      https://bugherd.com
 * Description:     BugHerd is the visual feedback tool for websites. For help, go to <a href="http://support.bugherd.com">support.bugherd.com</a>
 * Author:          BugHerd
 * Author URI:      https://bugherd.com
 * Text Domain:     bugherd
 * Version:         1.0.4
 * License:         GPLv3 or later
 *
 * @package         BugHerd
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Bootstrap
 *
 * @since 1.0.0
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/scripts.php';
