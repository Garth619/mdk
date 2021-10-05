<?php
//Gravity forms heading validation
add_filter( 'gform_validation_message', 'ilaw_tr_translate_validation_to_spanish', 10, 2 );
function ilaw_tr_translate_validation_to_spanish(){
    
    $custom_validation = ilaw_get_translation('ilaw_tr_gform_validation_message');

    if(!$custom_validation){
        $custom_validation = ilaw_tr_parse(array(
            'fallback' => 'There was a problem with your submission. Please review the fields below.',
        ));
    }
	
	return $custom_validation;
}