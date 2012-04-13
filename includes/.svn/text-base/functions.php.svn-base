<?php
/*-------------------------------------------------------------------------
Sets Up Admin jQuery
-------------------------------------------------------------------------*/

function omfg_mobile_pro_theme_select_script() {
	
	global $current_screen;
		
	if( $current_screen->post_type == 'omfg-mobile-pro' ) {

		wp_register_script('omfg-mobile-pro-admin', OMFGMOBILEPRO . 'js/omfg-mobile-pro-admin.js', 'jquery');
		wp_enqueue_script('omfg-mobile-pro-admin');

	}
}

add_action('admin_print_scripts', 'omfg_mobile_pro_theme_select_script',1);

/*-------------------------------------------------------------------------
Sets Up Groove Theme Admin jQuery
-------------------------------------------------------------------------*/

function omfg_mobile_pro_groovetheme_admin_script() {

	$posttypes = get_post_types( array( 'description' => 'OMFG Mobile Site - Omfg Mobile Groove Theme' ) );
    
    foreach ( $posttypes as $posttype ) {
    
		wp_register_script('omfg-mobile-pro-groove-admin', OMFGMOBILEPRO . 'includes/template/groove-theme/js/admin.js', 'jquery');
		wp_enqueue_script('omfg-mobile-pro-groove-admin');   
    
    }

}
    
add_action('admin_print_scripts', 'omfg_mobile_pro_groovetheme_admin_script');
    
/*-------------------------------------------------------------------------
Registers OMFG Theme Taxonomy
-------------------------------------------------------------------------*/

add_action( 'init', 'register_taxonomy_omfg_mobile_pro_themes' );
add_action( 'init', 'register_taxonomy_omfg_mobile_pro_sites' );

function register_taxonomy_omfg_mobile_pro_themes() {
	
	// CREATES THE OMFG MOBILE PRO THEMES TAXONOMY 
	// USED TO CONNECT A SITE WITH A SELECTED THEME
	// ============================================ -->
    $labels = array( 
        'name' => _x( 'OMFG Mobile Pro Page Themes', 'omfg_mobile_pro_themes' ),
        'singular_name' => _x( 'OMFG Mobile Pro Page Theme', 'omfg_mobile_pro_themes' ),
        'search_items' => _x( 'Search OMFG Mobile Pro Page Themes', 'omfg_mobile_pro_themes' ),
        'popular_items' => _x( 'Popular OMFG Mobile Pro Page Themes', 'omfg_mobile_pro_themes' ),
        'all_items' => _x( 'All OMFG Mobile Pro Page Themes', 'omfg_mobile_pro_themes' ),
        'parent_item' => _x( 'Parent OMFG Mobile Pro Page Theme', 'omfg_mobile_pro_themes' ),
        'parent_item_colon' => _x( 'Parent OMFG Mobile Pro Page Theme:', 'omfg_mobile_pro_themes' ),
        'edit_item' => _x( 'Edit OMFG Mobile Pro Page Theme', 'omfg_mobile_pro_themes' ),
        'update_item' => _x( 'Update OMFG Mobile Pro Page Theme', 'omfg_mobile_pro_themes' ),
        'add_new_item' => _x( 'Add New OMFG Mobile Pro Page Theme', 'omfg_mobile_pro_themes' ),
        'new_item_name' => _x( 'New OMFG Mobile Pro Page Theme Name', 'omfg_mobile_pro_themes' ),
        'separate_items_with_commas' => _x( 'Separate omfg mobile pro page themes with commas', 'omfg_mobile_pro_themes' ),
        'add_or_remove_items' => _x( 'Add or remove omfg mobile pro page themes', 'omfg_mobile_pro_themes' ),
        'choose_from_most_used' => _x( 'Choose from the most used omfg mobile pro page themes', 'omfg_mobile_pro_themes' ),
        'menu_name' => _x( 'OMFG Mobile Pro Page Themes', 'omfg_mobile_pro_themes' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,
        'rewrite' => false,
        'query_var' => true
    );
	
	register_taxonomy( 'omfg_mobile_pro_themes', /*array('omfg-mobile-pro'),*/ $args );

} 

function register_taxonomy_omfg_mobile_pro_sites() {
	
	// CREATES THE OMFG MOBILE PRO THEMES TAXONOMY 
	// USED TO CONNECT A SITE WITH A SELECTED THEME
	// ============================================ -->
    $labels = array( 
        'name' => _x( 'OMFG Mobile Pro Page Sites', 'omfg_mobile_pro_sites' ),
        'singular_name' => _x( 'OMFG Mobile Pro Page Site', 'omfg_mobile_pro_sites' ),
        'search_items' => _x( 'Search OMFG Mobile Pro Page Sites', 'omfg_mobile_pro_sites' ),
        'popular_items' => _x( 'Popular OMFG Mobile Pro Page Sites', 'omfg_mobile_pro_sites' ),
        'all_items' => _x( 'All OMFG Mobile Pro Page Sites', 'omfg_mobile_pro_sites' ),
        'parent_item' => _x( 'Parent OMFG Mobile Pro Page Site', 'omfg_mobile_pro_sites' ),
        'parent_item_colon' => _x( 'Parent OMFG Mobile Pro Page Site:', 'omfg_mobile_pro_sites' ),
        'edit_item' => _x( 'Edit OMFG Mobile Pro Page Site', 'omfg_mobile_pro_sites' ),
        'update_item' => _x( 'Update OMFG Mobile Pro Page Site', 'omfg_mobile_pro_sites' ),
        'add_new_item' => _x( 'Add New OMFG Mobile Pro Page Site', 'omfg_mobile_pro_sites' ),
        'new_item_name' => _x( 'New OMFG Mobile Pro Page Site Name', 'omfg_mobile_pro_sites' ),
        'separate_items_with_commas' => _x( 'Separate omfg mobile pro page sites with commas', 'omfg_mobile_pro_sites' ),
        'add_or_remove_items' => _x( 'Add or remove omfg mobile pro page sites', 'omfg_mobile_pro_sites' ),
        'choose_from_most_used' => _x( 'Choose from the most used omfg mobile pro page sites', 'omfg_mobile_pro_sites' ),
        'menu_name' => _x( 'OMFG Mobile Pro Page Sites', 'omfg_mobile_pro_sites' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true,
        'rewrite' => false,
        'query_var' => true
    );

    register_taxonomy( 'omfg_mobile_pro_sites', /*array('omfg-mobile-pro'),*/ $args );
}

/*-------------------------------------------------------------------------
REGISTERS OMFG MOBILE THEME TAXONOMY ON ACTIVATION
-------------------------------------------------------------------------*/

// DEFAULT THEME
// ============================ -->
function omfg_mobile_default_add_theme_taxonomy() {

	wp_insert_term(
  		'Default Theme', 			// the term
   		'omfg_mobile_pro_themes', 	// the taxonomy
  		array(
    		'description' => 'Default Theme for the OMFG Mobile Landing Page Plugin.',
    		'slug' => 'omfg-mobile-default-theme'
  		)
	);

}

//add_action('init','omfg_mobile_default_add_theme_taxonomy');

// GROOVE THEME
// ============================ -->
function omfg_mobile_groove_add_theme_taxonomy() {

	wp_insert_term(
  		'Groove Theme', 				// the term
   		'omfg_mobile_pro_themes', 	// the taxonomy
  		array(
    		'description' => 'Groove Theme for the OMFG Mobile Landing Page Plugin.',
    		'slug' => 'omfg-mobile-groove-theme'
  		)
	);

}

add_action('init','omfg_mobile_groove_add_theme_taxonomy');

// ARTIST THEME
// ============================ -->
function omfg_mobile_artist_add_theme_taxonomy() {

	wp_insert_term(
  		'Artist Theme', 				// the term
   		'omfg_mobile_pro_themes', 	// the taxonomy
  		array(
    		'description' => 'Artist Theme for the OMFG Mobile Landing Page Plugin.',
    		'slug' => 'omfg-mobile-artist-theme'
  		)
	);

}

//add_action('init','omfg_mobile_artist_add_theme_taxonomy');

/*-------------------------------------------------------------------------
Sets Up Action Hooks
-------------------------------------------------------------------------*/

// Header
function omfg_mobile_pro_header() {
	do_action('omfg_mobile_pro_header');
}

// Styles
function omfg_mobile_pro_styles() {
	do_action('omfg_mobile_pro_styles');
}

// JS
function omfg_mobile_pro_js() {
	do_action('omfg_mobile_pro_js');
}

// Pre Content
function omfg_mobile_pro_pre_content() {
	do_action('omfg_mobile_pro_pre_content');
}

// Page Content
function omfg_mobile_pro_page_content() {
	do_action('omfg_mobile_pro_page_content');
}

// Post Content
function omfg_mobile_pro_post_content() {
	do_action('omfg_mobile_pro_post_content');
}

// Footer
function omfg_mobile_pro_footer() {
	do_action('omfg_mobile_pro_footer');
}

// Create Site Post Types
function omfg_mobile_pro_create_site_posttypes() {
	do_action('omfg_mobile_pro_create_site_posttypes');
}

/*-------------------------------------------------------------------------
Sets Up The Page Content
-------------------------------------------------------------------------*/

function omfg_mobile_pro_pagecontent () {

	global $post, $wp_query;
	
	// Post ID
	$postid = $wp_query->post->ID;
	$page_content = get_post_meta($postid, '_omfg_page_content', true);
	$page_content = do_shortcode($page_content);
	$page_content = wpautop($page_content, 1);
	
	echo $page_content;

}

add_action('omfg_mobile_pro_page_content','omfg_mobile_pro_pagecontent');

/*-------------------------------------------------------------------------
FUNCTION TO GET THE OMFG MOBILE THEME TAXONOMY ID
-------------------------------------------------------------------------*/

function get_omfg_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'omfg_mobile_themes');
	return $term->term_id;
}