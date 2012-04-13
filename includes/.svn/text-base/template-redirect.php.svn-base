<?php

function omfg_mobile_pro_defaulttheme_template_redirect($single_template) {

	global $post, $wp_query;	
	
	// Post ID
	$postid = $wp_query->post->ID;
	
	// Post Type
	$post_type = get_post_type($postid);
	
	$fullposttype = $post_type;
	$fullposttype = substr($fullposttype, 0, 4);
	
	$post_type_stripped = substr($post_type, 5);
	
	$groovetheme_pagetype = get_post_meta($post->ID, '_omfg_groovetheme_page_type', true);

	if ($fullposttype == 'omfg') {

		// ARGS FOR THE CUSTOM POST TYPE LOOP
		// THAT CREATES NEW CUSTOM POST TYPES 
		// FOR EACH MOBILE SITE THAT IS CREATED
		// ===================================== -->
		$defaulttheme_query = new WP_Query(array(
   	 	'post_type' => 'omfg-mobile-pro',
    	'name' => ''.$post_type_stripped.'', 
		'posts_per_page' => 1
 		));

		// STARTS THE LOOP 
		// ===================================== -->
		foreach ($defaulttheme_query as $defaulttheme) { }

		if (get_post_meta($defaulttheme->ID, '_omfg_theme_select', true) == 'omfg-mobile-groove-theme') {
    	
    		$single_template = dirname( __FILE__ ) . '/template/groove-theme/standard.php'; 
		
		}
	
	}

	return $single_template;

}

add_filter( "single_template", "omfg_mobile_pro_defaulttheme_template_redirect", 1);