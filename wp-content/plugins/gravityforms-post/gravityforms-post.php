<?php
/**
 * Plugin Name: 1POINT21 Gravity Form Entries via Post 
 * Plugin URI: //1point21interactive.com
 * Description: Posts Gravity Form Entries to iLawyer Dashboard
 * Version: 1.0
 * Author: 1POINT21 Interactive
 */


add_action( 'gform_after_submission', 'post_to_ilawyer_dashboard', 10, 2 );

function post_to_ilawyer_dashboard( $entry, $form ) {

		wp_remote_post( 'https://dashboard.ilawyermarketing.com/webhooks/gravity_forms', array(
			'method' => 'POST',
			'timeout' => 20,
			'headers' => array("Content-type" => "application/json","X-GF-Webhooks-Key" => "3d09c45ed3114cd52e067df860704c6f"),
			'body' => json_encode($entry)
			)
	);
 
}