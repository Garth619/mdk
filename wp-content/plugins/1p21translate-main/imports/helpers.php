<?php

function ilaw_get_lang_code($id = null){
    if($id){
        $the_id = $id;
    }else{
        global $post;
        $the_id = $post->ID;
    }


    $supported_cpts = get_field('translation_supported_cpt','options');

    $to_return  = false;

    if($supported_cpts){
        foreach($supported_cpts as $supported_cpt){

            if(!$to_return){
                if( ilaw_is_lang($supported_cpt['type']) ){
                    $to_return = $supported_cpt['language'];
                }
            }
        }
    }

    if(!$to_return){
        $to_return = 'en_US';
    }

    return $to_return;
}

function ilaw_is_lang($language_post_type = '',$id = null){

    if($id){
        $the_id = $id;
    }else{
        global $post;
        $the_id = $post->ID;
    }

    $cpt_obj = get_post_type_object( $language_post_type );

    $translate_parts = get_post_meta($the_id,'translate_parts',true);

    $has_parts_set = ($translate_parts == $language_post_type);

    $cpt_no_fallback_parts = (
        (
            (
                $translate_parts !== ''
                && $translate_parts !== 'fallback'
            )
            && (
                $language_post_type !== ''
                && $language_post_type !== 'fallback'
            )
            && (
                is_singular($language_post_type)
            )
        ) || (//404 fix 
            strpos($_SERVER['REQUEST_URI'], "/{$cpt_obj->rewrite['slug']}") !== false    
        )
    );

    $can_fallback = ( //no partts + not cpt support = english
        ($language_post_type == '' || $language_post_type == 'fallback')
        && (
            is_page() || is_single()
            || (
                $translate_parts == ''
                || $translate_parts == 'fallback'
            )
        )

    );

    // var_dump($has_parts_set , $cpt_no_fallback_parts , $can_fallback);
    
    return ( $has_parts_set || $cpt_no_fallback_parts || $can_fallback );
}

if(!function_exists('is_lang')){
    function is_lang($language_post_type = '',$id = null){
        return ilaw_is_lang($language_post_type,$id);
    }
}

function ilaw_tr_parse($data = false){

    if(!$data) return;

    $supported_cpts = get_field('translation_supported_cpt','options');


    $defaults = array(
        'fallback' => '',
    );

    if($supported_cpts){
        foreach($supported_cpts as $supported_cpt){
            $defaults[$supported_cpt['type']] = '';
        }
    }

    $translations = wp_parse_args($data,$defaults);

    $found_proper_translation = false;
    

    //find translation
    foreach($translations as $lang => $translation){
        if(!$found_proper_translation && $lang !== 'fallback' && $lang !== 'key'){
            if(ilaw_is_lang($lang) && ($translation || $translation !== '')){
                $to_return = $translation;
                $found_proper_translation = true;
            }
        }
    }

    //langnahanap so fallback
    if(!$found_proper_translation){
        $to_return = $translations['fallback'];
    }

    return $to_return;

}

function ilaw_get_translation($key = null){
    if(!$key) return;
    $translation_rows = get_field('ilaw_tr_rows_translation','options');

    $row_to_use = null;

    foreach($translation_rows as $row){
        if(!$row_to_use){
            if($row['key'] == $key){
                $row_to_use = $row;
            }
        }
    }

    if($row_to_use){
        return ilaw_tr_parse($row_to_use);
    }else{
        return false;
    }
}


function ilaw_the_translation($key = null){
    echo ilaw_get_translation($key);
}

function ilaw_tr_menu_location($menu_name){

    if(!$menu_name) { return; }

    $menu_locs = array(
        'fallback' => $menu_name,
    );

    $supported_cpts = get_field('translation_supported_cpt','options');


    if($supported_cpts){
        foreach($supported_cpts as $supported_cpt){
            $menu_locs[ $supported_cpt['type'] ] = "{$menu_name}_{$supported_cpt['type']}";
        }
    }

    return ilaw_tr_parse($menu_locs);
}
