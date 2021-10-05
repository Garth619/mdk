<?php

/*
Plugin Name: iLawyer Translate Plugin
Author: Sam Zabala
Plugin URI: https://www.ilawyermarketing.com/
Version: 0.0.2
Description: Creates fields, registers menus and adds helpers for translating another language. Needs ACF PRO and a Custom Post Type setup for other languages to work
*/



function _ilaw_translate_create_admin_error($message,$notice_type = 'error'){
	$class = 'notice notice-'.$notice_type;
	$parsed_message = __( $message );
	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), strip_tags( $parsed_message,"<br><pre><code><br/><strong><b><i><em><p><strong>" ) ); 
}

function _ilaw_translate_check_for_acf(){
	// if acf isnt even installed just kill it. kill it with fire. before it kills the site. because it will definitley kill the site.
	if(!class_exists( 'ACF' ) ){
		if(current_user_can( 'activate_plugins' )){
			wp_die('Advanced Custom Fields PRO is not installed. iLawyer needs this plugin to work <a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
		}
        deactivate_plugins( plugin_basename( __FILE__ ) );
	}
}


register_activation_hook(__FILE__,'_ilaw_translate_check_for_acf');


define('ILAW_TRANSLATE_PATH',plugin_dir_path( __FILE__ ));
define('ILAW_TRANSLATE_URL',plugin_dir_url(__FILE__));

require_once ILAW_TRANSLATE_PATH . 'imports/opt-pages.php';
require_once ILAW_TRANSLATE_PATH . 'imports/setup-acfs.php';
require_once ILAW_TRANSLATE_PATH . 'imports/helpers.php';
require_once ILAW_TRANSLATE_PATH . 'imports/setup-core.php';
require_once ILAW_TRANSLATE_PATH . 'imports/hooks.php';