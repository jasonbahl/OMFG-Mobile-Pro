<?php
/*
Plugin Name: OMFG Mobile Pro
Plugin URI: http://omfgmobile.com/
Description: Easily, create, manage and deploy unlimited mobile landing pages with WordPress.
Version: 1.1.21
Author: Visioniz
Author URI: http://visioniz.com/
*/

/*-------------------------------------------------------------------------
DEFINES PLUGIN CONSTANTS
-------------------------------------------------------------------------*/

define('OMFGMOBILEPRO', plugin_dir_url(__FILE__));
$omfgmobilepro_pluginroot = plugin_dir_url(__FILE__);

/*-------------------------------------------------------------------------
INCLUDES ESSENTIAL FILES
-------------------------------------------------------------------------*/

// Include the RWILS meta box script
// ================================ -->
include 'includes/meta-box-class/meta-box.php';

/*-------------------------------------------------------------------------
INCLUDES ESSENTIAL FILES
-------------------------------------------------------------------------*/

// FUNCTIONS THAT MAKE THE PLUGIN RUN	
// ================================ -->				
include 'includes/functions.php';	

// SETS UP POST TYPES
// ================================ -->			
include 'includes/posttypes.php';		

// SETS UP INITIAL TEMPLATE REDIRECT
// ================================ -->				
include 'includes/template-redirect.php';

// INCLUDES THE SCRIPT THAT 
// CREATES THE INITIAL META BOXES	
// ================================ -->	
include 'includes/metaboxclass/example-functions.php'; 

// INCLUDES OMFG MOBILE SHORTCODES
// ================================ -->
include 'shortcodes/shortcodes.php';

// SHORTCODE GENERATOR
// ================================ -->				
require_once('shortcode-generator/shortcodes.php'); 	

/*-------------------------------------------------------------------------
INCLUDES BUILT IN THEMES
-------------------------------------------------------------------------*/

// SETS UP GROOVE THEME OPTIONS
// ================================ -->
include 'includes/template/groove-theme/groove-theme-options.php';
include 'includes/template/groove-theme/functions.php';