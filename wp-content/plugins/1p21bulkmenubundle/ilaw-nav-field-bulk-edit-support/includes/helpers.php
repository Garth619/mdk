<?php
/********************************************************************************************
* helpers and shakalaka
*********************************************************************************************/

function _ilaw_sm_create_admin_error($message,$notice_type = 'error'){
		
	$class = 'notice notice-'.$notice_type;
	$parsed_message = __( $message );
	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), strip_tags( $parsed_message,"<br><pre><code><br/><strong><b><i><em><p><strong>" ) ); 
}

 
function _ilaw_sm_slug_text($string) {

	// $new_id = preg_replace("/[^a-zA-Z_]/","",str_replace(array(' ',), '_', $string)); // Replaces spaces in Sidebar Name to dash
	// $new_id = strtolower( $new_id ); // Transforms edited Sidebar Name to lowercase
  
	return sanitize_title($string);

}

function _ilaw_sm_get_widget_instance($widget_class = '',$title_class = '',$has_id = true){
		$_ilaw_sm_widget_class = get_option('options_sm_widget_class');
		$_ilaw_sm_title_class = get_option('options_sm_title_class');
		$_ilaw_sm_title_tag = (get_option('options_sm_title_tag')) ? get_option('options_sm_title_tag') : bulk_get_default('title_tag');


		
		$to_return = array(
			'after_widget'  => '</div>',
			'before_title'  => '<'.$_ilaw_sm_title_tag.' class="widget-title'.' '.$title_class.' '.$_ilaw_sm_title_class.'">',
			'after_title'   => '</'.$_ilaw_sm_title_tag.'>'
		);

		if($has_id){
			$to_return['before_widget'] = '<div id="%1$s" class="widget %2$s '.$_ilaw_sm_widget_class.' '.$widget_class.'">';
		}else{
			$to_return['before_widget'] = '<div class="widget %s '.$_ilaw_sm_widget_class.' '.$widget_class.'">';
		}

		$to_simulate_wp = apply_filters( 'dynamic_sidebar_params', array(0 => $to_return) );
		
		$to_return = $to_simulate_wp[0];
		
		return $to_return;
}

function _ilaw_sm_get_widget_args($menu_id = null,$title = ''){

	if(!$menu_id){
		return;
	}

	$to_return = array(
		'nav_menu' => $menu_id
	);

	if(!$title !== ''){
		$to_return['title'] = $title;
	}

	return $to_return;
}



function _ilaw_sm_is_descendant_of($an_ancestor = null,$an_id = null){

	if(!$an_ancestor){
		// no use checking kung wala namang iproprovide na ninuno
		return false;
	}else{
		$ancestor = $an_ancestor;
		if(!is_array($ancestor)) {
		$ancestor = array($ancestor);
		}
	}
	if(!$an_id){
		global $post;
		$the_id = $post->ID;
	}else{
		$the_id = $an_id;
	}
	
	//list all the current page's kwan... ancestor
	$ancestors_to_match = get_post_ancestors($the_id);
	
	if(
		count(array_intersect($ancestors_to_match, $ancestor)) > 0
		|| in_array($the_id,$ancestor)
	){
		return true;
	}else{
		return false;
	}
}


/********************************************************************************************
* open for the pooblic
*********************************************************************************************/
//duh
if(!function_exists('bulk_sidebar')){
	function bulk_sidebar(){
		if(class_exists('ACF')){
			include _ILAW_SM_PLUGIN_PATH . 'template/sidebar.php';
		}
	}
}

//defaults arent really registered in the database unless you like... flush the pages were the field groups at. boi you acf. imma still use u tho <3
if(!function_exists('get_bulk_default')){
	function bulk_get_default($slug = ''){
		
		$defaults = $GLOBALS['_ilaw_sm']['defaults'];

	if(isset($defaults[$slug]))
		return $defaults[$slug];
	}
}
