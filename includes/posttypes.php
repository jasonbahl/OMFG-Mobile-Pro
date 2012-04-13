<?php
/*-------------------------------------------------------------------------
ADDS OMFG MOBILE SITES POST TYPE
-------------------------------------------------------------------------*/

	$labels = array(
	    'name' => _x('OMFG Mobile', 'omfg-mobile-pro'),
	    'menu_name' => _x('OMFG Mobile', 'omfg-mobile-pro'),
	    'all_items' => _x('OMFG Mobile Sites', 'omfg-mobile-pro'),
	    'singular_name' => _x('OMFG Mobile Site', 'omfg-mobile-pro'),
	    'add_new' => _x('Add New OMFG Mobile Site', 'omfg-mobile-pro'),
	    'add_new_item' => __('Add OMFG Mobile Site', 'omfg-mobile-pro'),
	    'edit_item' => __('Edit OMFG Mobile Site', 'omfg-mobile-pro'),
	    'new_item' => __('New OMFG Mobile Site', 'omfg-mobile-pro'),
	    'view_item' => __('View OMFG Mobile Site', 'omfg-mobile-pro'),
	    'search_items' => __('Search OMFG Mobile Sites', 'omfg-mobile-pro'),
	    'not_found' =>  __('No OMFG Mobile Sites found', 'omfg-mobile-pro'),
	    'not_found_in_trash' => __('No OMFG Mobile Site found in Trash', 'omfg-mobile-pro'), 
	    'parent_item_colon' => ''
	  );
 
	$args = array(
    	'labels' => $labels,
    	'public' => false,
    	'publicly_queryable' => true,
    	'show_ui' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'rewrite' => false,
    	'show_in_nav_menus' => false,
    	'supports' => array(
      			'title',
      			'thumbnail'
    		),
    	'menu_position' => 35,
    	'menu_icon' => OMFGMOBILEPRO . '/images/omfgwp-icon.png',
    );
	
	register_post_type( 'omfg-mobile-pro', $args );


/*-------------------------------------------------------------------------
THIS CREATES A NEW POST TYPE FOR EVERY MOBILE SITE THAT IS CREATED
MAKING IT EASY TO SET SETTINGS FOR A SITE AND CREATE PAGES WHILE KEEPING
THINGS AS ORGANIZED AND CLEAN AS POSSIBLE FOR THE USERS
-------------------------------------------------------------------------*/

function omfg_mobile_pro_individual_sites() {

	// ARGS FOR THE CUSTOM POST TYPE LOOP
	// THAT CREATES NEW CUSTOM POST TYPES 
	// FOR EACH MOBILE SITE THAT IS CREATED
	// ===================================== -->
	$mobile_sites_query = new WP_Query(array(
    'post_type' => 'omfg-mobile-pro',
	));

	// STARTS THE LOOP 
	// ===================================== -->
	while ($mobile_sites_query->have_posts()){
    	$mobile_sites_query->the_post();
    
    // GETS POST META VARIABLES
    // ===================================== -->    
    global $post;
    
    $the_title = get_the_title(); // POST TITLE - USED TO NAME THE NEW POST TYPE
	
	$theme = get_post_meta($post->ID, '_omfg_theme_select', true);
    $formattedtheme = str_replace("-", " ", $theme);
    $formattedtheme = ucwords($formattedtheme);
    
	$labels = array(
	    'name' => _x(''.$the_title.'', ''),
	    'menu_name' => _x(''.$the_title.'', ''),
	    'all_items' => _x(''.$the_title.' Pages', ''),
	    'singular_name' => _x(''.$the_title.' Page', ''),
	    'add_new' => _x('Add New '.$the_title.' Page', ''),
	    'add_new_item' => __('Add '.$the_title.' Page'),
	    'edit_item' => __('Edit '.$the_title.' Page'),
	    'new_item' => __('New '.$the_title.' Page'),
	    'view_item' => __('View '.$the_title.' Page'),
	    'search_items' => __('Search '.$the_title.' Page'),
	    'not_found' =>  __('No '.$the_title.' Pages found'),
	    'not_found_in_trash' => __('No '.$the_title.' Pages found in Trash'), 
	    'parent_item_colon' => ''
	  );
 	
	$args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'rewrite' => false,
    	'show_in_nav_menus' => true,
    	'description' => 'OMFG Mobile Site - '.$formattedtheme.'',
    	'supports' => array(
      			'title',
      			'thumbnail',
    		),
    	'menu_position' => 35,
    	'menu_icon' => OMFGMOBILEPRO . '/images/omfgwp-posttypes-icon.png',
    );
	
	register_post_type( 'omfg-'.$post->post_name.'', $args );

	// CREATES A SITE TAXONOMY 
	// TERM FOR THE NEW POST TYPE
	// ====================================== -->	
	wp_insert_term(
  		''.$the_title.'', 			// the term
   		'omfg_mobile_pro_sites', 	// the taxonomy
  		array(
    		'description'=> 'Taxonomy Term to connect to the '.$the_title.' Site.',
    		'slug' => 'omfg-mobile-site-'.$the_title.''
  		)
	);
	
    // ENDS THE LOOP AND RESETS THE QUERY
    // ===================================== --> 
    } wp_reset_query();
    
}

add_action('init', 'omfg_mobile_pro_individual_sites', 100);


/*-------------------------------------------------------------------------
MOVES THE SITE SETTINGS PAGES TO THE RESPECTIVE SITE MENUS
-------------------------------------------------------------------------*/

function omfg_mobile_pro_site_settings_menu() {

	global $post, $wp_query;
	
	// Post ID
	$postid = $wp_query->post->ID;
	
	// Post Type
	$post_type = get_post_type($postid);
	
	// Run Query
	// ===================================== -->
	$mobile_sites = new WP_Query(array(
    'post_type' => 'omfg-mobile-pro',
	));

	// STARTS THE LOOP 
	// ===================================== -->
	while ($mobile_sites->have_posts()){
    	$mobile_sites->the_post();
	
		// GETS POST META VARIABLES
    	// ===================================== -->    
    	global $post, $wp_query, $wpdb;
    
    	$the_title = get_the_title(); // POST TITLE - USED TO NAME THE NEW POST TYPE		

		// ADDS THE SLIDESHOWS AS SUB-MENUS TO
		// THE SLIDESHOWS POST TYPE
		// ===================================== --> 
		add_submenu_page( 'edit.php?post_type=omfg-mobile-pro', __(''.$the_title.' Settings'), __(''.$the_title.' Settings'), 'edit_posts', 'post.php?post='.$post->ID.'&action=edit');
		
    // ENDS THE LOOP AND RESETS THE QUERY
    // ===================================== --> 
    } wp_reset_query();
    
}

add_action('admin_menu','omfg_mobile_pro_site_settings_menu');