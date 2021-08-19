<?php
/**
 * Settings Page.
 *
 * @package BugHerd
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'admin_enqueue_scripts', 'bugherd_enqueue_admin_stylesheet' );
/**
 * Enqueue stylesheet in the admin.
 *
 * @return void
 * @since 1.0.0
 */
function bugherd_enqueue_admin_stylesheet() {
	wp_enqueue_style( 'bugherd', plugin_dir_url( __DIR__ ) . 'assets/css/style.css', array(), '1.0.0' );
}

add_action( 'admin_menu', 'bugherd_register_options_page' );
/**
 * Add menu into options page
 *
 * @since 1.0.0
 * @return void
 */
function bugherd_register_options_page() {
	add_options_page(
		esc_html__( 'BugHerd', 'bugherd' ),
		esc_html__( 'BugHerd', 'bugherd' ),
		'manage_options',
		'bugherd',
		'bugherd_options_page'
	);
}

add_filter( 'plugin_action_links_bugherd/bugherd.php', 'bugherd_options_page_link', 10, 4 );
/**
 * Add options page link to the plugin actions list.
 *
 * @param array  $actions An array of plugin action links. By default this can include 'activate', 'deactivate', and 'delete'.
 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
 * @param array  $plugin_data An array of plugin data.
 * @param string $context The plugin context.
 * @return array
 * @since 1.0.1
 */
function bugherd_options_page_link( $actions, $plugin_file, $plugin_data, $context ) {
	$actions[] = sprintf(
		'<a href="%s">%s</a>',
		esc_url( admin_url( 'options-general.php?page=bugherd' ) ),
		esc_html__( 'Settings', 'bugherd' )
	);
	return $actions;
}

add_action( 'admin_menu', 'bugherd_register_settings' );
/**
 * Register options and settings fields.
 *
 * @return void
 * @since 1.0.0
 */
function bugherd_register_settings() {

	// Section.
	add_settings_section( 'bugherd_settings', '', '__return_false', 'bugherd_settings' );

	// Project ID.
	register_setting(
		'bugherd_settings',
		'bugherd_project_key',
		array(
			'type'              => 'string',
			'description'       => esc_html__( 'Bugherd Project Key', 'bugherd' ),
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => true,
			'default'           => '',
		)
	);

	// Enable Admin.
	register_setting(
		'bugherd_settings',
		'bugherd_enable_admin',
		array(
			'type'              => 'boolean',
			'description'       => esc_html__( 'Enable BugHerd in wp-admin?', 'bugherd' ),
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => true,
			'default'           => false,
		)
	);

	// Project ID Field.
	add_settings_field(
		'bugherd_project_key_field',
		__( 'Project Key', 'bugherd' ),
		'bugherd_project_key_settings_field',
		'bugherd_settings',
		'bugherd_settings'
	);

	// Enable admin Field.
	add_settings_field(
		'bugherd_enable_admin_field',
		__( 'Enable BugHerd in wp-admin?', 'bugherd' ),
		'bugherd_enable_admin_settings_field',
		'bugherd_settings',
		'bugherd_settings'
	);
}

/**
 * Display the settings field for the Project Key.
 *
 * @return void
 * @since 1.0.0
 */
function bugherd_project_key_settings_field() {
	printf(
		'<label id="%2$s-description">%1$s:</label><input type="text" id="%2$s" name="%4$s" value="%3$s" aria-describedby="%2$s-description" class="regular-text ltr" /><p class="description">%5$s</p>',
		esc_html__( 'Project Key', 'bugherd' ),
		esc_attr( 'bugherd-project-key' ),
		esc_attr( get_option( 'bugherd_project_key' ) ),
		esc_attr( 'bugherd_project_key' ),
		esc_html__( 'Leave blank to disable plugin', 'bugherd' )
	);
}

/**
 * Display the settings for the Enable in Admin checkbox.
 *
 * @return void
 * @since 1.0.0
 */
function bugherd_enable_admin_settings_field() {
	printf(
		'<input type="checkbox" id="%2$s" name="%4$s" value="1" %3$s aria-describedby="%2$s-description" /><label id="%2$s-description">%1$s</label><p class="description">%5$s</p>',
		esc_html__( 'Also show BugHerd on WP Admin pages?', 'bugherd' ),
		esc_attr( 'bugherd-enable-admin' ),
		checked( get_option( 'bugherd_enable_admin' ), '1', false ),
		esc_attr( 'bugherd_enable_admin' ),
		esc_html__( 'If selected, the BugHerd sidebar will also appear on WordPress admin screens, in addition to your website.', 'bugherd' )
	);
}

/**
 * Display the options page.
 *
 * @return void
 * @since 1.0.0
 */
function bugherd_options_page() {

	// Logo.
	printf(
		'<img src="%s%s" class="bugherd-logo">',
		esc_url( plugin_dir_url( __DIR__ ) ),
		'assets/images/logo-web.png'
	);

	// Tagline.
	printf(
		'<h2 class="bugherd-tagline">%s<br>%s</h2>',
		esc_html__( 'The Visual Feedback', 'bugherd' ),
		esc_html__( 'Tool for Websites', 'bugherd' )
	);

	echo '<form method="post" action="options.php" class="card bugherd-container">';

		// Intro.
		printf(
			'<p>%s <a href="%s" target="_blank" rel="noopener">%s</a></p>',
			esc_html__( 'To install BugHerd on this site simply add your BugHerd Project Key to the field below. Not sure where to find your Project Key?', 'bugherd' ),
			esc_url( 'https://support.bugherd.com/hc/en-us/articles/360002121575' ),
			esc_html__( 'Check out this help article.', 'bugherd' )
		);

		// Settings.
		settings_fields( 'bugherd_settings' );
		do_settings_sections( 'bugherd_settings' );

		// Submit.
		printf(
			'<div class="bugherd-submit">%1$s<p>%2$s <a href="%3$s" target="_blank" rel="noopener">%3$s</a></p></div>',
			get_submit_button(), // phpcs:ignore
			esc_html__( 'Need help? Try', 'bugherd' ),
			esc_url( 'https://support.bugherd.com' )
		);

	echo '</form>';
}
