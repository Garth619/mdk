<?php
/*	 for modification to layouts that can be controlled by a boody class */
function _ilaw_tr_custom_body_classes($classes) {


    $supported_cpts = get_field('translation_supported_cpt','options');

    if($supported_cpts){
        foreach($supported_cpts as $supported_cpt){

			if( ilaw_is_lang($supported_cpt['type']) ){
				$classes[] = 'ilaw-translate-'.$supported_cpt['type'];
			}
        }
    }
	
	return $classes;
}
add_filter('body_class', '_ilaw_tr_custom_body_classes');



add_filter( 'language_attributes', '_ilaw_tr_set_lang');
function _ilaw_tr_set_lang($output){
    if(!is_admin()):
        return 'lang="'.str_replace('_','-',ilaw_get_lang_code()).'"';
    else:
        return $output;
    endif;
}


function _ilaw_tr_nav_menus(){

    $menus = get_registered_nav_menus();
    $supported_cpts = get_field('translation_supported_cpt','options');

    $register_menu_translations = array();
    
    if($supported_cpts){
        foreach($menus as $menu_location => $menu_name){
            foreach($supported_cpts as $supported_cpt){
                $name = "{$menu_location}_{$supported_cpt['type']}";

                if(!isset($menus[$name])){
                    $register_menu_translations[$name] = "{$menu_name} - [{$supported_cpt['type']}] (iLawyer Translate)";
                }
                
            }
        }

        register_nav_menus( $register_menu_translations );
    }
}
add_action( 'init', '_ilaw_tr_nav_menus',999999999 );