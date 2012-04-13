<?php 

/*-----------------------------------------------------------------------*/
/* ADDS STYLES AND JS TO THE PAGE HEADER
/*-----------------------------------------------------------------------*/

function omfg_mobile_pro_shortcode_styles() {

	global $omfgmobilepro_pluginroot;

	echo '<link rel="stylesheet" href="'.$omfgmobilepro_pluginroot.'shortcodes/shortcodes.css">';

}

add_action('omfg_mobile_pro_styles','omfg_mobile_pro_shortcode_styles');

function omfg_mobile_pro_shortcode_js() {

	global $omfgmobilepro_pluginroot;

	echo '<script type="text/javascript" src="'.$omfgmobilepro_pluginroot.'shortcodes/shortcodes.js"></script>';

}

add_action('omfg_mobile_pro_js','omfg_mobile_pro_shortcode_js');

/*-----------------------------------------------------------------------*/
/* SETS UP THEME SHORTCODES
/*-----------------------------------------------------------------------*/
require_once('columns/columns-shortcode.php');
require_once('callouts/callouts-shortcode.php');
require_once('buttons/buttons-shortcode.php');
require_once('tabs/tabs-shortcode.php');
require_once('toggles/toggles-shortcode.php');
require_once('dividers/dividers-shortcode.php');