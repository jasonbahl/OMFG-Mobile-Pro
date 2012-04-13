<?php 

/*-----------------------------------------------------------------------*/
/* ADDS STYLES AND JS TO THE PAGE HEADER
/*-----------------------------------------------------------------------*/

function omfg_mobile_pro_groove_theme_shortcode_styles() {

	global $omfgmobilepro_pluginroot;
	
	if (get_post_type($post) == 'omfg-groove-theme') {

		echo '<link rel="stylesheet" href="'.$omfgmobilepro_pluginroot.'includes/template/groove-theme/groove-theme-shortcodes/shortcodes.css">';
	
	}

}

add_action('omfg_mobile_pro_styles','omfg_mobile_pro_groove_theme_shortcode_styles');

function omfg_mobile_pro_groove_theme_shortcode_js() {

	global $omfgmobilepro_pluginroot;

	if (get_post_type($post) == 'omfg-groove-theme') {
	
		echo '<script type="text/javascript" src="'.$omfgmobilepro_pluginroot.'includes/template/groove-theme/groove-theme-shortcodes/shortcodes.js"></script>';
	
	}

}

add_action('omfg_mobile_pro_js','omfg_mobile_pro_groove_theme_shortcode_js');

/*-----------------------------------------------------------------------*/
/* SETS UP THEME SHORTCODES
/*-----------------------------------------------------------------------*/
require_once('modules/modules-shortcode.php');
require_once('tweets/tweets-shortcode.php');
require_once('contact-form/contact-shortcode.php');
require_once('blog-list/blog-list-shortcode.php');