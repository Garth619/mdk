<?php
function _ilaw_tr_make_opt_page(){
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title' 	=> 'Configuration',
            'menu_title'	=> 'Configuration',
            'menu_slug' 	=> 'ilaw-translation-config',
            'capability'	=> 'edit_posts',
            'redirect'		=> false,
            'parent_slug'   => 'ilaw-translation-welcome',
            'icon_url'      => 'dashicons-admin-tools',
            'position'      => 1
        ));
        acf_add_options_page(array(
            'page_title' 	=> 'Text Setup',
            'menu_title'	=> 'Text Setup',
            'menu_slug' 	=> 'ilaw-translation-text',
            'capability'	=> 'edit_posts',
            'redirect'		=> false,
            'parent_slug'   => 'ilaw-translation-welcome',
            'icon_url'      => 'dashicons-translation',
            'position'      => 2
        ));
    }
}
add_action( 'plugins_loaded', '_ilaw_tr_make_opt_page' );


function _ilaw_tr_setup_admin_page() {
	add_menu_page(
        'iLawyer Translation Plugin',
        'iLawyer Translation',
        'edit_posts',
        'ilaw-translation-welcome',
        '_ilaw_tr_render_admin_page_welcome',
        'dashicons-translation',
        70
    );
	add_submenu_page(
        'ilaw-translation-welcome',
        'iLawyer Translation Documentation',
        'Documentation',
        'edit_posts',
        'ilaw-translation-docs',
        '_ilaw_tr_render_admin_page_docs',
        9999
    );
}
add_action( 'admin_menu', '_ilaw_tr_setup_admin_page' );

function _ilaw_tr_render_admin_page_welcome(){
    require_once ILAW_TRANSLATE_PATH . 'pages/welcome.html';
}
function _ilaw_tr_render_admin_page_docs(){
    require_once ILAW_TRANSLATE_PATH . 'pages/documentation.html';
}