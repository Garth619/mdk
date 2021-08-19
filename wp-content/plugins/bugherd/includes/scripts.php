<?php
/**
 * Frontend and Admin Scripts.
 *
 * @package BugHerd
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Get the tracking script.
 *
 * @param string $project_key BugHerd project Key.
 * @return string
 * @since 1.0.0
 */
function bugherd_get_the_script( $project_key ) {
	return sprintf(
		// phpcs:disable
		'<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=%s" async="true"></script>',
		// phpcs:enable
		esc_html( $project_key )
	);
}

add_action( 'wp_head', 'bugherd_do_the_frontend_script' );
/**
 * Add BugHerd integration code for the frontend.
 *
 * @return void
 * @since 1.0.0
 */
function bugherd_do_the_frontend_script() {
	/**
	 * Filter the project_key variable to support other methods of setting this value.
	 *
	 * @param string $project_key BugHerd project Key.
	 * @return string
	 * @since 1.0.0
	 */
	$project_key = apply_filters( 'bugherd_project_key', get_option( 'bugherd_project_key', '' ) );

	if ( '' === $project_key ) {
		return;
	}

	echo bugherd_get_the_script( $project_key ); // phpcs:ignore
}

add_action( 'admin_head', 'bugherd_do_the_admin_script' );
/**
 * Add BugHerd integration code for the wp-admin.
 *
 * @return void
 * @since 1.0.0
 */
function bugherd_do_the_admin_script() {
	/**
	 * Filter the enable_admin variable to support other methods of setting this value.
	 *
	 * @param boolean $enable_admin BugHerd enable admin.
	 * @return boolean
	 * @since 1.0.0
	 */
	$enable_admin = apply_filters( 'bugherd_enable_admin', get_option( 'bugherd_enable_admin', false ) );

	if ( ! $enable_admin ) {
		return;
	}

	/**
	 * Filter the project_key variable to support other methods of setting this value.
	 *
	 * @param string $project_key BugHerd project Key.
	 * @return string
	 * @since 1.0.0
	 */
	$project_key = apply_filters( 'bugherd_project_key', get_option( 'bugherd_project_key', '' ) );

	if ( '' === $project_key ) {
		return;
	}

	echo bugherd_get_the_script( $project_key ); // phpcs:ignore
}
