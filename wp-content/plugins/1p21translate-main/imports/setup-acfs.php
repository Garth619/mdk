<?php
//register fields
add_action('acf/init', '_ilaw_tr_load_acf',2);
function _ilaw_tr_load_acf(){
    
    if(function_exists('acf_add_local_field_group')):

        //retrieve field groups
        include ILAW_TRANSLATE_PATH . 'fields/fields.php';
            
        //add each field group
        foreach($ilaw_tr_fields as $id => $arr):
            $arr['key'] = $id;
            acf_add_local_field_group($arr);
        endforeach;

        //get mod dates
        $fields_mod = filemtime(ILAW_TRANSLATE_PATH . 'fields/fields.php');
        $json_mod = filemtime(ILAW_TRANSLATE_PATH . 'fields/acf-tr-fields.json');

        // update json on changes for ability to edit
        if(
            ($fields_mod > $json_mod)
            and is_admin()
        ):

            //put bois here
            $json = [];

            //give each boi spotlight
            foreach($ilaw_tr_fields as $id => $arr):

                $to_json = $arr;

                $arr['key'] = $id;

                if(isset($to_json['ID'])):
                    unset($to_json['ID']);
                endif;

                // $json[] = $group;
                $json[] = $to_json;

            endforeach;

            //boop
            $json = json_encode($json, JSON_PRETTY_PRINT);

            // Write output to file for easy import into ACF.
            // The file must be writable by the server process. In this case, the file is located in
            // the current theme directory.
            $file =  ILAW_TRANSLATE_PATH . 'fields/acf-tr-fields.json';
            file_put_contents($file, $json);
        endif;

    endif;
}

// setup config cpt dropdown

add_action('acf/prepare_field/key=ilaw_tr_config_translation_supported_cpt_type', '_ilaw_tr_set_config_cpt_dropdown',2);
function _ilaw_tr_set_config_cpt_dropdown($field){

    $curr_site_cpt = get_post_types(
        // '', 'names'
        array(
            'public'   => true,
            '_builtin' => false
        ),
        'objects'
    );

    //clear out whatever custom bois was ther but shouldbnt even be there because this is a plugin and is used by other sites so one site might need a product post type but another might not so why why why you know you get the idea shakalaka
    $field['choices'] = array(
        0 => 'Select Post type...'
    );
    
    if(count($curr_site_cpt)){
        foreach($curr_site_cpt as $type=>$props){
            $field['choices'][$type] = $props->labels->name;
        }
    }

    return $field;
}

add_action('acf/prepare_field/key=ilaw_tr_config_translation_supported_cpt_lang', '_ilaw_tr_set_config_lang_dropdown',2);
function _ilaw_tr_set_config_lang_dropdown($field){
    

    //clear out whatever custom bois was ther but shouldbnt even be there because this is a plugin and is used by other sites so one site might need a product post type but another might not so why why why you know you get the idea shakalaka
    $field['choices'] = array(
        'Most Frequent' => array(
            '' => 'Other/English (United States) - DEFAULT [en-US]',
            'es' => 'Spanish (Basic) - Español [es]'
        ),
        'More Options' => array()
    );
    
    if ( !function_exists( 'wp_get_available_translations' ) ) { 
        require_once(ABSPATH . 'wp-admin/includes/translation-install.php');
    } 

    $languages_wp = wp_get_available_translations();
    
    if(count($languages_wp)){
        foreach($languages_wp as $lang){
            // var_dump($lang);
            $field['choices']['More Options'][$lang['language']] = "{$lang['english_name']} - {$lang['native_name']} [{$lang['language']}]";
        }
    }

    return $field;
}

add_action('acf/prepare_field/key=ilaw_tr_singular_translate_parts', '_ilaw_tr_setup_template_parts_opts',2);
function _ilaw_tr_setup_template_parts_opts($field){

    //clear out whatever custom bois was ther but shouldbnt even be there because this is a plugin and is used by other sites so one site might need a product post type but another might not so why why why you know you get the idea shakalaka
    $field['choices'] = array(
        '0' => 'English/Fallback (Default)'
    );

    $supported_cpts = get_field('translation_supported_cpt','options');

    if($supported_cpts){
        foreach($supported_cpts as $supported_cpt){
            if(get_current_screen()->post_type !== $supported_cpt['type']){
                $type_props = get_post_type_object( $supported_cpt['type'] );
                $field['choices'][ $supported_cpt['type']] = $type_props->labels->singular_name;
            }else{
                $field['choices']['0'] = 'Current Set Language';
                $field['choices']['fallback'] = 'English/ Default';
            }
        }
    }
    return $field;
}

// add_action('acf/load_field/key=ilaw_tr_rows_translation', '_ilaw_tr_setup_translations_sub_fields',2);
add_action('acf/init', '_ilaw_tr_setup_translations_sub_fields',4);
function _ilaw_tr_setup_translations_sub_fields(){
    $supported_cpts = get_field('translation_supported_cpt','options');
    

    if($supported_cpts){
        foreach($supported_cpts as $supported_cpt){
            $type_props = get_post_type_object( $supported_cpt['type'] );
            $new_sub_field = array(
                "key" => 'ilaw_tr_rows_translation_'.$supported_cpt['type'],
                "label" => $supported_cpt['type'],
                'name' => $supported_cpt['type'],
                'type' => 'textarea',
                'rows' => 3,
                'instructions' => 'Translation for <code>'.$supported_cpt['type'].'</code> post types and template parts',
                'parent' => 'ilaw_tr_rows_translation',
                'new_lines' => 'br',
                // 'parent' => $field['key'],

            );
            acf_add_local_field($new_sub_field);
        }
    }
}


add_filter('acf/validate_value/key=ilaw_tr_rows_translation_key', '_ilaw_tr_validate_text_key_uniqueness', 20, 4);
function _ilaw_tr_validate_text_key_uniqueness( $valid, $value, $field, $input ) {
    // bail early if value is already invalid
    if( !$valid ) {
        return $valid;
    }

    //https://support.advancedcustomfields.com/forums/topic/avoid-duplicate-content-on-repeater-field/
    // get list of array indexes from $input
    // [ <= this fixes my IDE, it has problems with unmatched brackets
    preg_match_all('/\[([^\]]+)\]/', $input, $matches);
    if (!count($matches[1])) {
        // this should actually never happen
        return $valid;
    }
    $matches = $matches[1];

    // walk the acf input to find the repeater and current row      
    $array = $_POST['acf'];

    $repeater_key = false;
    $repeater_value = false;
    $row_key = false;
    $row_value = false;
    $field_key = false;
    $field_value = false;

    for ($i=0; $i<count($matches); $i++) {
        if (isset($array[$matches[$i]])) {
            $repeater_key = $row_key;
            $repeater_value = $row_value;
            $row_key = $field_key;
            $row_value = $field_value;
            $field_key = $matches[$i];
            $field_value = $array[$matches[$i]];
            if ($field_key == $field['key']) {
            break;
            }
            $array = $array[$matches[$i]];
        }
    }

    if (!$repeater_key) {
        // this should not happen, but better safe than sorry
        return $valid;
    }
    
    //check if it's like blog or default sidebar
    // look for duplicate values in the repeater
    
    foreach ($repeater_value as $index => $row) {
        if ($index != $row_key && $row[$field_key] == $value) {
            // this is a different row with the same value
            $valid = 'this value is not unique';
            break;
        }
    }
    
    // return
    return $valid;
}