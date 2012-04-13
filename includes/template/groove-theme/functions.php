<?php

/*-------------------------------------------------------------------------
Sets Up Admin jQuery
-------------------------------------------------------------------------*/

function omfg_groove_script() {
	
	global $current_screen;
		
	if( $current_screen->post_type == 'omfg-mobile' ) {

		wp_register_script('groove-admin', OMFGMOBILEPRO . 'includes/template/groove-theme/js/admin.js', 'jquery');
		wp_enqueue_script('groove-admin');

	}
}

//add_action('admin_print_scripts', 'omfg_groove_script',2);


// Create Default Twitter, Home 
// & Contact Pages for Groove Theme Sites
// ===================================== --> 

function omfg_mobile_pro_groovetheme_initial_pages() {
	
	global $post, $omfgmobilepro_pluginroot;
	
	$the_title = get_the_title();
	$theme = get_post_meta($post->ID, '_omfg_theme_select', true);
	$dummycontent = get_post_meta($post->ID, '_groovetheme_dummy_content', true);
    $formattedtheme = str_replace("-", " ", $theme);
    $formattedtheme = ucwords($formattedtheme);
	
	$home_post = get_posts(array(
    	'post_type' => 'omfg-'.$post->post_name.'',
    	'title' => 'Home',
	));
	
	$twitter_post = get_posts(array(
    	'post_type' => 'omfg-'.$post->post_name.'',
    	'title' => 'Twitter',
	));
	
	$contact_post = get_posts(array(
    	'post_type' => 'omfg-'.$post->post_name.'',
    	'title' => 'Contact',
	));

	if (($theme == 'omfg-mobile-groove-theme') && ($dummycontent == 'yes')) {
		
		// Creates a Home Page
		// ============================ -->
		if ( (empty($home_post)) && (empty($twitter_post)) && (empty($contact_post)) ) {
			
			// Creates a Home Page
			// ============================ -->
			$home_postinfo = array(
  				'post_name' => 'home',
  				'post_status' => 'publish', 
  				'post_title' => 'Home', 
  				'post_type' => 'omfg-'.$post->post_name.''
  				);
	
			$home_id = wp_insert_post($home_postinfo);	
			
			$default_home_content = '
			<img class="aligncenter size-full wp-image-470" title="omfg_banner" src="'.$omfgmobilepro_pluginroot.'includes/template/groove-theme/images/omfg_banner.jpg" alt="" width="930" height="340" />
			[groove_module title="Welcome to Groove Theme"]
			<h2>The Groove Theme is the standard OMFG Mobile Pro theme.</h2>
			Some of the features of the Groove Theme include:
			<ul>
				<li>Flyout Sidebar Menu</li>
				<li>Tabbed Home, Contact &amp; Twitter Pages</li>
				<li>Twitter Feed</li>
				<li>Contact Form</li>
				<li>Module Boxes</li>
				<li>OMFG Mobile Responsive Gallery Support</li>
				<li>OMFG Mobile Responsive Slideshow Support</li>
				<li>And More. . .</li>
			</ul>
			With the Groove Theme for OMFG Mobile Pro, you will be able to quickly create a mobile landing page that will have people saying OMFG!
			[/groove_module]
			';
			
			add_post_meta($home_id, '_omfg_page_content', $default_home_content);
			add_post_meta($home_id, '_omfg_groovetheme_page_type', 'standard');
			
			// Creates a Twitter Page
			// ============================ -->
			$twitter_postinfo = array(
  				'post_name' => 'twitter',
  				'post_status' => 'publish', 
  				'post_title' => 'Twitter', 
  				'post_type' => 'omfg-'.$post->post_name.''
  				);
	
			$twitter_id = wp_insert_post($twitter_postinfo);	
			
			$default_twitter_content = '
			[groove_module title="Contact Page Intro"]

			Hello There. This is a Contact page.

			[/groove_module]

			[groove_contact_form email=info@visioniz.com]
			';
			
			add_post_meta($twitter_id, '_omfg_page_content', $default_twitter_content);
			add_post_meta($twitter_id, '_omfg_groovetheme_page_type', 'standard');

			// Creates a Contact Page
			// ============================ -->
			$contact_postinfo = array(
  				'post_name' => 'contact',
  				'post_status' => 'publish', 
  				'post_title' => 'Contact', 
  				'post_type' => 'omfg-'.$post->post_name.''
  				);
	
			$contact_id = wp_insert_post($contact_postinfo);	
			
			$default_contact_content = '
			[groove_module title=Contact Page Intro]
			<h2>Hello There. This is a Contact page.</h2>
			[/groove_module]
			
			[groove_contact_form email=info@visioniz.com]
			';
			
			add_post_meta($contact_id, '_omfg_page_content', $default_contact_content);
			add_post_meta($contact_id, '_omfg_groovetheme_page_type', 'standard');

		}
	
	}

}

add_action('publish_omfg-mobile-pro', 'omfg_mobile_pro_groovetheme_initial_pages', 999);
add_action('new_to_publish_omfg-mobile-pro', 'omfg_mobile_pro_groovetheme_initial_pages', 999);

// Include Theme-Specific Shortcodes
// ===================================== --> 
include 'groove-theme-shortcodes/shortcodes.php';
require_once('shortcode-generator/shortcodes.php');