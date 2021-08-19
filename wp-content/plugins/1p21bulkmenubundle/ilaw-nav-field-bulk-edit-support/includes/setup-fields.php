<?php
/********************************************************************************************
* setup acf fields
*********************************************************************************************/



/* opts page
--------------------------------------------------------------------------------------- */
	function _ilaw_sm_make_opt_page(){

		if( function_exists('acf_add_options_page') ) :
				acf_add_options_page(array(
				'page_title' 	=> __('iLawyer Sidebars Settings'),
				'menu_title'	=> __('iLawyer Sidebars Settings'),
				'menu_slug' 	=> 'ilaw-sidebar-options',
				'capability'	=> 'edit_posts',
				'redirect'	=> false,
				'icon_url'	=> 'dashicons-menu-alt'
				));
		endif;

	}
	add_action( 'plugins_loaded', '_ilaw_sm_make_opt_page' );



/* setup acf field groups + update json file in case need for editing
--------------------------------------------------------------------------------------- */
	add_action('acf/init', '_ilaw_sm_load_acf',2);
	function _ilaw_sm_load_acf(){
		
		if(function_exists('acf_add_local_field_group')):

			//retrieve field groups
			include _ILAW_SM_PLUGIN_PATH . '/fields/fields.php';
				
			//add each field group
			foreach($_ilaw_sm_field_groups as $arr):
				acf_add_local_field_group($arr);
			endforeach;

			//get mod dates
			$fields_mod = filemtime(_ILAW_SM_PLUGIN_PATH . '/fields/fields.php');
			$json_mod = filemtime(_ILAW_SM_PLUGIN_PATH . '/fields/acf-sm-fields.json');

			// update json on changes for ability to edit
			if(
				($fields_mod > $json_mod)
				and is_admin()
			):

				//put bois here
				$json = [];

				//give each boi spotlight
				foreach($_ilaw_sm_field_groups as $arr):

					// $key = $arr['key'];

					// $group = acf_get_local_field_group($key);
					// $fields = acf_get_local_fields($key);

					// 	unset($group['ID']);
		
					// 	// Add the fields as an array to the group because getting field group doesnt append the fields it has?? what the fook?
					// 	$group['fields'] = $fields;
		
						// Add this group to the array going to be jsonified

					$to_json = $arr;

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
				$file =  _ILAW_SM_PLUGIN_PATH . 'fields/acf-sm-fields.json';
				file_put_contents($file, $json);
			endif;

			//add cpt
				// $curr_site_cpt = get_post_types(
				// 	// '', 'names'
				// 	array(
				// 		'public'   => true,
				// 		'_builtin' => false
				// 	),
				// 	'objects'
				// );
			//why is acf too early the fuq
		endif;
	}




/* manipularte fields for ur  bois needs
--------------------------------------------------------------------------------------- */
	add_filter( 'acf/prepare_field/key=field_5f3bf77d7d1a2', '_ilaw_sm_load_other_cpts_choices_to_global_settings_repeater');
	function _ilaw_sm_load_other_cpts_choices_to_global_settings_repeater($field){

		$curr_site_cpt = get_post_types(
			// '', 'names'
			array(
				'public'   => true,
				'_builtin' => false
			),
			'objects'
		);

		//clear out whatever custom bois was ther but shouldbnt even be there because this is a plugin and is used by other sites so one site might need a product post type but another might not so why why why you know you get the idea shakalaka
		$field['choices'] = array();

		if(count($curr_site_cpt)){
			foreach($curr_site_cpt as $type=>$props){
				$field['choices'][$type] = $props->labels->name;
			}
		}else{
			return false;
		}

		return $field;
	}



	add_filter( 'acf/prepare_field/key=field_5d7a725c6573b', '_ilaw_sm_make_pages_repeater_reequired_if_no_cpt_available');
	function _ilaw_sm_make_pages_repeater_reequired_if_no_cpt_available($field){

		$curr_site_cpt = get_post_types(
			// '', 'names'
			array(
				'public'   => true,
				'_builtin' => false
			),
			'names'
		);
		
		if(!count($curr_site_cpt)){
			$field['required'] = true;
			$field['min'] = 1;
		}

		return $field;
	}


	add_filter('acf/get_field_group', '_ilaw_sm_add_field_to_edit_page_of_other_cpts');
	function _ilaw_sm_add_field_to_edit_page_of_other_cpts($group){

		if ( !function_exists( 'get_current_screen' ) ) { 
			require_once ABSPATH . '/wp-admin/includes/screen.php'; 
		} 

		if($group['key'] == 'group_5c366a793a9df'){

			$curr_site_cpt = get_post_types(
				// '', 'names'
				array(
					'public'   => true,
					'_builtin' => false
				),
				'objects'
			);
			if(count($curr_site_cpt)){
				$curr_screen = get_current_screen();
				$curr_post_type = $curr_screen->post_type;
				
				foreach($curr_site_cpt as $type=>$props){
					// $field['choices'][$type] = $props->labels->name;
					if($type == $curr_post_type){
						array_push(
							$group['location'], 
							array(
								array(
									'param' => 'post_type',
									'operator' => '==',
									'value' => $type,
								)
							)
						);
					}
				}
			}
		}

		return $group;

	}


	add_filter('acf/validate_value/key=field_5cc0984cf5836', '_ilaw_sm_validate_unique_repeater', 20, 4);
	function _ilaw_sm_validate_unique_repeater( $valid, $value, $field, $input ) {
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
