<?php

//add_filter( 'cmb_meta_boxes', 'omfg_mobile_pro_groovetheme_metabox', 1000 );
	
function omfg_mobile_pro_groovetheme_metabox( array $meta_boxes ) {

/* ---------------------------------------------------------------------------- */
/* GETS THE POST TYPE THEN RUNS THE QUERY - FOR EDIT_POST.PHP
/* ---------------------------------------------------------------------------- */

	$post_type = $_GET['post_type'];
	$post_type_stripped = substr($post_type, 5);

	// ARGS FOR THE CUSTOM POST TYPE LOOP
	// THAT CREATES NEW CUSTOM POST TYPES 
	// FOR EACH MOBILE SITE THAT IS CREATED
	// ===================================== -->
	$groovetheme_query = new WP_Query(array(
    'post_type' => 'omfg-mobile-pro',
    'name' => ''.$post_type_stripped.'', 
	'posts_per_page' => 1
 	));

	// STARTS THE LOOP 
	// ===================================== -->
	//while ($groovetheme_query->have_posts()){
    //	$groovetheme_query->the_post();
    
    foreach ($groovetheme_query as $groovetheme) {
    
    	// GETS POST META VARIABLES
    	// ===================================== -->    
    	global $post;
    
    	$theme = get_post_meta($post->ID, '_omfg_theme_select', true);
    	$formattedtheme = str_replace("-", " ", $theme);
    	$formattedtheme = ucwords($formattedtheme);
    	
    	$omfgtitle = get_post_meta($post->ID, '_omfg_theme_name', true);
	
	}

/* ---------------------------------------------------------------------------- */
/* ADDS THE META BOXES TO THE POST EDIT PAGES IF THEY ARE RELATED TO THIS THEME
/* ---------------------------------------------------------------------------- */
	
	$posttypes = get_post_types( array( 'description' => 'OMFG Mobile Site - Omfg Mobile Groove Theme' ) );
    
    foreach ( $posttypes as $posttype ) {
		
		// Start with an underscore to 
		// hide fields from custom fields list
		// ================================ -->
		$prefix = '_omfg_groovetheme_';

		// CREATES THE PAGETYPE SELECT OPTION
		// ================================ -->
		$meta_boxes[] = array(
			'id'         => 'omfg_mobile_pro_groovetheme_pagetype_metabox',
			'title'      => 'Groove Theme Page Type',
			'pages'      => array($posttype),
			'context'    => 'side',
			'priority'   => 'low',
			'show_names' => true, // Show field names on the left
			'fields'     => array(
						
				array(
					'name'     => 'Page Type',
					'desc'     => 'Select the page type.',
					'id'       => $prefix . 'page_type',
					'type'     => 'select',
					'options'  => array(
						array('name' => 'Standard Page', 'value' => 'standard'),
						array('name' => 'Twitter Page', 'value' => 'twitter'),
						array('name' => 'Contact Page', 'value' => 'contact')				
					)
				),
			),
		);
	}
	
	// Add other metaboxes as needed
	return $meta_boxes;	
	
}

add_action( 'init', 'omfg_groovetheme_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function omfg_groovetheme_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}