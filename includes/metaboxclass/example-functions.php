<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'omfg_mobile_pro_starting_metabox' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function omfg_mobile_pro_starting_metabox( array $meta_boxes ) {

	// Start with an underscore to 
	// hide fields from custom fields list
	// ================================ -->
	$prefix = '_omfg_';
	$groovetheme = '_groovetheme_';
	$deffaulttheme = '_defaulttheme_';
	$artisttheme = '_artisttheme_';

/*-------------------------------------------------------------------------------------*/

	// CREATES THE THEME SELECT OPTION
	// ================================ -->
	$meta_boxes[] = array(
		'id'         => 'omfg_mobile_pro_theme_select_metabox',
		'title'      => 'Create a New Site',
		'pages'      => array( 'omfg-mobile-pro'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
			// CREATES SECTION
			array(
				'type' => 'section',
				'id' => 'themeselect1',
			),
			
				// SELECT A THEME (PULLS THEMES FROM THEME TAXONOMY)
				array(
					'name'     => 'Select a Theme',
					'desc'     => 'Select a theme to use for the mobile site.',
					'id'       => $prefix . 'theme_select',
					'type'     => 'theme_select',
					'taxonomy' => 'omfg_mobile_pro_themes', // Taxonomy Slug
				),
			
			// CLOSES SECTION
			array(
				'type' => 'close',
			),

		),
	);

/*-------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------*/

	// CREATES THE GROOVE THEME OPTIONS
	// ================================ -->		
	$meta_boxes[] = array(
		'id'         => 'omfg-mobile-groove-theme-options',
		'title'      => 'Groove Theme Settings',
		'pages'      => array( 'omfg-mobile-pro'), // Post type
		'context'    => 'normal',
		'priority'   => 'low',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
						
			// CREATES THE TAB ANCHORS
			// ================================ -->
			array(
				'type' => 'tabanchors',
				'tabs' => array(
					array( 'name' => 'General Settings', 'value' => 'groove-general', ),
					array( 'name' => 'Style Settings', 'value' => 'groove-style', ),
					//array( 'name' => 'Social Settings', 'value' => 'groove-social', ),
					array( 'name' => 'Sidebar Settings', 'value' => 'groove-sidebar', ),
				)
			),
			
			
			// BEGINS THE GENERAL SETTINGS
			// FOR THE GROOVE THEME
			// ================================ -->
			array(
			'type' => 'section',
			'id' => 'groove-general',
			),
				
				// Dummy Content
				array(
					'name'     => 'Dummy Content',
					'desc'     => 'Select yes to create sample pages with sample content for the site.<br/><strong>Note:</strong> You must publish the site first, then update the site with this option selected for the content to be created.',
					'id'       => $groovetheme . 'dummy_content',
					'type'     => 'select',
					'options'  => array(
						array('name' => 'Create Dummy Pages & Content', 'value' => 'yes'),
						array('name' => 'Do Not Create Dummy Pages & Content', 'value' => 'no')			
					)
				),
				// LOGO
				array(
					'name' => 'Logo',
					'desc' => 'Upload a logo for the site.',
					'id'   => $groovetheme . 'logo',
					'type' => 'file',
				),
				// Footer Text
				array(
					'name' => 'Footer Text',
					'desc' => 'Enter text to display in the footer of the pages.',
					'id' => $groovetheme . 'footer_text',
					'type' => 'text'
				),	
				// Twitter Page Tab Link
				array(
					'name'	=> 'Twitter Page',
					'desc' => 'Select a page the Twitter Tab should link to. If no page is selected, the tab will not show.',
					'id' => $groovetheme . 'twitter_page',
					'type' => 'mobile_page_select',
				),
				// Home Page Tab Link
				array(
					'name'	=> 'Home Page',
					'desc' => 'Select a page the Home Tab should link to. If no page is selected, the tab will not show.',
					'id' => $groovetheme . 'home_page',
					'type' => 'mobile_page_select',
				),
				// Contact Page Tab Link
				array(
					'name'	=> 'Contact Page',
					'desc' => 'Select a page the Contact Tab should link to. If no page is selected, the tab will not show.',
					'id' => $groovetheme . 'contact_page',
					'type' => 'mobile_page_select',
				),						
				

			array(
			'type' => 'close',
			),
			
			// BEGINS SIDEBAR SETTINGS 
			// FOR THE GROOVE THEME
			// ================================ -->
			array(
				'type' => 'section',
				'id' => 'groove-sidebar',
			),
			

				// Sidebar Links Section
				array(
					'name'     => 'Slide Out Menu',
					'desc'     => 'Show the Slide-Out Menu',
					'id'       => $groovetheme . 'slide_out_menu',
					'desc'     => 'You can enable or disable the slide-out menu altogether.',
					'type'     => 'select',
					'options'  => array(
						array('name' => 'Use Slide Out Menu', 'value' => 'show'),
						array('name' => 'Do Not Use the Slide Out Menu', 'value' => 'hide')			
					)
				),
				
				// Sidebar Links Section
				array(
					'name'     => 'Links Section',
					'desc'     => 'Display links to other pages within this site in the slide-out menu',
					'id'       => $groovetheme . 'links_section',
					'type'     => 'select',
					'options'  => array(
						array('name' => 'Display', 'value' => 'show'),
						array('name' => 'Do Not Display', 'value' => 'hide')			
					)
				),

				// Sidebar Links Section Order
				array(
					'name'     => 'Links Orderby',
					'desc'     => 'How should the links be ordered?',
					'id'       => $groovetheme . 'links_orderby',
					'type'     => 'select',
					'options'  => array(
						array('name' => 'By Name', 'value' => 'title'),
						array('name' => 'By Date', 'value' => 'date'),
						array('name' => 'By Modified Date', 'value' => 'modified'),	
						array('name' => 'Random Order', 'value' => 'rand')	
					)
				),	
				// Sidebar Links Section Order
				array(
					'name'     => 'Links Order',
					'desc'     => 'Set the order of the links',
					'id'       => $groovetheme . 'links_order',
					'type'     => 'select',
					'options'  => array(
						array('name' => 'Ascending', 'value' => 'ASC'),
						array('name' => 'Descending', 'value' => 'DESC'),	
					)
				),			
				
				// Sidebar Social Section
				array(
					'name'     => 'Social Section',
					'desc'     => 'Display a section with social media links in the slide-out menu',
					'id'       => $groovetheme . 'social_section',
					'type'     => 'select',
					'options'  => array(
						array('name' => 'Display', 'value' => 'show'),
						array('name' => 'Do Not Display', 'value' => 'hide')			
					)
				),
				// Facebook URL
				array(
					'name' => 'Facebook URL',
					'desc' => 'Enter the URL to your Facebook.',
					'id' => $groovetheme . 'facebook_url',
					'type' => 'text'
				),
				// Twitter URL
				array(
					'name' => 'Twitter URL',
					'desc' => 'Enter the URL to your Twitter.',
					'id' => $groovetheme . 'twitter_url',
					'type' => 'text'
				),
				// Flickr URL
				array(
					'name' => 'Flickr URL',
					'desc' => 'Enter the URL to your Flickr.',
					'id' => $groovetheme . 'flickr_url',
					'type' => 'text'
				),
				// Forrst URL
				array(
					'name' => 'Forrst URL',
					'desc' => 'Enter the URL to your Forrst.',
					'id' => $groovetheme . 'forrst_url',
					'type' => 'text'
				),
				// LinkdIn URL
				array(
					'name' => 'LinkdIn URL',
					'desc' => 'Enter the URL to your LinkdIn.',
					'id' => $groovetheme . 'linkdin_url',
					'type' => 'text'
				),
				
				
				
				// Sidebar Contact Section
				array(
					'name'     => 'Contact Section',
					'desc'     => 'Display contact info in the slide-out menu',
					'id'       => $groovetheme . 'contact_section',
					'type'     => 'select',
					'options'  => array(
						array('name' => 'Display', 'value' => 'show'),
						array('name' => 'Do Not Display', 'value' => 'hide')			
					)
				),
				// Contact Web URL
				array(
					'name' => 'Website URL',
					'desc' => 'Enter the URL to your website.',
					'id' => $groovetheme . 'contact_weburl',
					'type' => 'text'
				),
				// Contact Email
				array(
					'name' => 'Email Address',
					'desc' => 'Enter an email address.',
					'id' => $groovetheme . 'contact_email',
					'type' => 'text'
				),
				// Contact Phone
				array(
					'name' => 'Phone',
					'desc' => 'Enter a phone number people can call from the landing page.',
					'id' => $groovetheme . 'contact_phone',
					'type' => 'text'
				),
				// Contact Address
				array(
					'name' => 'Address',
					'desc' => 'Enter your address.',
					'id' => $groovetheme . 'contact_address',
					'type' => 'text'
				),
			

			array(
			'type' => 'close',
			),
			
			// BEGINS CONTENT IN THE 
			// GROOVE THEME STYLE SETTINGS TAB
			// ================================ -->
			array(
				'type' => 'section',
				'id' => 'groove-style',
			),
						
				array(
					'name' 	=> 'Color 1',
					'desc' 	=> 'Select the primary site color',
					'type' 	=> 'colorpicker',
					'id' 	=> $groovetheme . 'color1',
					'std'  => '#5E2462'
				),

				array(
					'name' 	=> 'Color 2',
					'desc' 	=> 'Select the secondary site color',
					'type' 	=> 'colorpicker',
					'id' 	=> $groovetheme . 'color2',
					'std'  => '#f76e40'
				),
				
				// Body Font
				array(
					'name'     	=> 'Body Font',
					'desc'     	=> 'Set the font for the body text.',
					'id'       	=> $groovetheme . 'font2',
					'type'     	=> 'select',
					'std' 		=> 'Arial, Arial, Helvetica, sans-serif',
					'options'  	=> array(
						array('name' => 'Arial', 'value' => 'Arial, Arial, Helvetica, sans-serif'),
						array('name' => 'Arial Black', 'value' => 'Arial Black, Arial Black, Gadget, sans-serif'),
						array('name' => 'Comic Sans', 'value' => 'Comic Sans MS, Comic Sans MS5, cursive'),
						array('name' => 'Courier New', 'value' => 'Courier New, Courier New, monospace'),
						array('name' => 'Georgia', 'value' => 'Georgia1, Georgia, serif'),
						array('name' => 'Impact', 'value' => 'Impact, Impact5, Charcoal6, sans-serif'),
						array('name' => 'Lucida Console', 'value' => 'Lucida Console, Monaco5, monospace'),
						array('name' => 'Lucida Sans', 'value' => 'Lucida Sans Unicode, Lucida Grande, sans-serif'),
						array('name' => 'Palatino', 'value' => 'Palatino Linotype, Book Antiqua3, Palatino, serif'),
						array('name' => 'Tahoma', 'value' => 'Tahoma, Geneva, sans-serif'),
						array('name' => 'Trebuchet', 'value' => 'Trebuchet MS1, Trebuchet MS, sans-serif'),
						array('name' => 'Verdana', 'value' => 'Verdana, Verdana, Geneva, sans-serif'),
						array('name' => 'Geneva', 'value' => 'MS Sans Serif4, Geneva, sans-serif'),
						array('name' => 'New York', 'value' => 'MS Serif4, New York6, serif'),			
					)
				),

				// Body Font Size
				array(
					'name'     	=> 'Body Font',
					'desc'     	=> 'Set the font for the body text.',
					'id'       	=> $groovetheme . 'font2size',
					'type'     	=> 'select',
					'std'		=> '12px',
					'options'  	=> array(
						array('name' => '8px', 'value' => '8px'),
						array('name' => '10px', 'value' => '10px'),
						array('name' => '11px', 'value' => '11px'),
						array('name' => '12px', 'value' => '12px'),
						array('name' => '13px', 'value' => '13px'),
						array('name' => '14px', 'value' => '14px'),
						array('name' => '15px', 'value' => '15px'),
						array('name' => '16px', 'value' => '16px'),
						array('name' => '17px', 'value' => '17px'),
						array('name' => '18px', 'value' => '18px'),
						array('name' => '19px', 'value' => '19px'),
						array('name' => '20px', 'value' => '20px'),
						array('name' => '21px', 'value' => '22px'),
						array('name' => '22px', 'value' => '22px'),
						array('name' => '23px', 'value' => '23px'),
						array('name' => '24px', 'value' => '24px'),
						array('name' => '25px', 'value' => '25px'),
						array('name' => '26px', 'value' => '26px'),
						array('name' => '27px', 'value' => '27px'),
						array('name' => '28px', 'value' => '28px'),
						array('name' => '29px', 'value' => '29px'),
						array('name' => '30px', 'value' => '30px'),
						array('name' => '31px', 'value' => '31px'),
						array('name' => '32px', 'value' => '32px'),
						array('name' => '33px', 'value' => '33px'),
						array('name' => '34px', 'value' => '34px'),
						array('name' => '35px', 'value' => '35px'),
						array('name' => '36px', 'value' => '36px'),			
					)
				),
				
				// Headings Font
				array(
					'name'     => 'Headings Font',
					'desc'     => 'Set the font for all headings (H1, H2, H3, H4, H5, H6)',
					'id'       => $groovetheme . 'font1',
					'type'     => 'select',
					'std' 		   => 'Arial Black, Arial Black, Gadget, sans-serif',
					'options'  => array(
						array('name' => 'Arial', 'value' => 'Arial, Arial, Helvetica, sans-serif'),
						array('name' => 'Arial Black', 'value' => 'Arial Black, Arial Black, Gadget, sans-serif'),
						array('name' => 'Comic Sans', 'value' => 'Comic Sans MS, Comic Sans MS5, cursive'),
						array('name' => 'Courier New', 'value' => 'Courier New, Courier New, monospace'),
						array('name' => 'Georgia', 'value' => 'Georgia1, Georgia, serif'),
						array('name' => 'Impact', 'value' => 'Impact, Impact5, Charcoal6, sans-serif'),
						array('name' => 'Lucida Console', 'value' => 'Lucida Console, Monaco5, monospace'),
						array('name' => 'Lucida Sans', 'value' => 'Lucida Sans Unicode, Lucida Grande, sans-serif'),
						array('name' => 'Palatino', 'value' => 'Palatino Linotype, Book Antiqua3, Palatino, serif'),
						array('name' => 'Tahoma', 'value' => 'Tahoma, Geneva, sans-serif'),
						array('name' => 'Trebuchet', 'value' => 'Trebuchet MS1, Trebuchet MS, sans-serif'),
						array('name' => 'Verdana', 'value' => 'Verdana, Verdana, Geneva, sans-serif'),
						array('name' => 'Geneva', 'value' => 'MS Sans Serif4, Geneva, sans-serif'),
						array('name' => 'New York', 'value' => 'MS Serif4, New York6, serif'),				
					)
				),

				// H1 Size
				array(
					'name'     => 'H1 Size',
					'desc'     => 'Set the font size for the heading 1 size.',
					'id'       => $groovetheme . 'h1size',
					'type'     => 'select',
					'std'	   => '36px',
					'options'  => array(
						array('name' => '8px', 'value' => '8px'),
						array('name' => '10px', 'value' => '10px'),
						array('name' => '11px', 'value' => '11px'),
						array('name' => '12px', 'value' => '12px'),
						array('name' => '13px', 'value' => '13px'),
						array('name' => '14px', 'value' => '14px'),
						array('name' => '15px', 'value' => '15px'),
						array('name' => '16px', 'value' => '16px'),
						array('name' => '17px', 'value' => '17px'),
						array('name' => '18px', 'value' => '18px'),
						array('name' => '19px', 'value' => '19px'),
						array('name' => '20px', 'value' => '20px'),
						array('name' => '21px', 'value' => '22px'),
						array('name' => '22px', 'value' => '22px'),
						array('name' => '23px', 'value' => '23px'),
						array('name' => '24px', 'value' => '24px'),
						array('name' => '25px', 'value' => '25px'),
						array('name' => '26px', 'value' => '26px'),
						array('name' => '27px', 'value' => '27px'),
						array('name' => '28px', 'value' => '28px'),
						array('name' => '29px', 'value' => '29px'),
						array('name' => '30px', 'value' => '30px'),
						array('name' => '31px', 'value' => '31px'),
						array('name' => '32px', 'value' => '32px'),
						array('name' => '33px', 'value' => '33px'),
						array('name' => '34px', 'value' => '34px'),
						array('name' => '35px', 'value' => '35px'),
						array('name' => '36px', 'value' => '36px'),			
					)
				),

				// H2 Size
				array(
					'name'     => 'H2 Size',
					'desc'     => 'Set the font size for the heading 2 size.',
					'id'       => $groovetheme . 'h2size',
					'type'     => 'select',
					'std'	   => '30px',
					'options'  => array(
						array('name' => '8px', 'value' => '8px'),
						array('name' => '10px', 'value' => '10px'),
						array('name' => '11px', 'value' => '11px'),
						array('name' => '12px', 'value' => '12px'),
						array('name' => '13px', 'value' => '13px'),
						array('name' => '14px', 'value' => '14px'),
						array('name' => '15px', 'value' => '15px'),
						array('name' => '16px', 'value' => '16px'),
						array('name' => '17px', 'value' => '17px'),
						array('name' => '18px', 'value' => '18px'),
						array('name' => '19px', 'value' => '19px'),
						array('name' => '20px', 'value' => '20px'),
						array('name' => '21px', 'value' => '22px'),
						array('name' => '22px', 'value' => '22px'),
						array('name' => '23px', 'value' => '23px'),
						array('name' => '24px', 'value' => '24px'),
						array('name' => '25px', 'value' => '25px'),
						array('name' => '26px', 'value' => '26px'),
						array('name' => '27px', 'value' => '27px'),
						array('name' => '28px', 'value' => '28px'),
						array('name' => '29px', 'value' => '29px'),
						array('name' => '30px', 'value' => '30px'),
						array('name' => '31px', 'value' => '31px'),
						array('name' => '32px', 'value' => '32px'),
						array('name' => '33px', 'value' => '33px'),
						array('name' => '34px', 'value' => '34px'),
						array('name' => '35px', 'value' => '35px'),
						array('name' => '36px', 'value' => '36px'),			
					)
				),

				// H3 Size
				array(
					'name'     => 'H3 Size',
					'desc'     => 'Set the font size for the heading 3 size.',
					'id'       => $groovetheme . 'h3size',
					'type'     => 'select',
					'std'	   => '24px',
					'options'  => array(
						array('name' => '8px', 'value' => '8px'),
						array('name' => '10px', 'value' => '10px'),
						array('name' => '11px', 'value' => '11px'),
						array('name' => '12px', 'value' => '12px'),
						array('name' => '13px', 'value' => '13px'),
						array('name' => '14px', 'value' => '14px'),
						array('name' => '15px', 'value' => '15px'),
						array('name' => '16px', 'value' => '16px'),
						array('name' => '17px', 'value' => '17px'),
						array('name' => '18px', 'value' => '18px'),
						array('name' => '19px', 'value' => '19px'),
						array('name' => '20px', 'value' => '20px'),
						array('name' => '21px', 'value' => '22px'),
						array('name' => '22px', 'value' => '22px'),
						array('name' => '23px', 'value' => '23px'),
						array('name' => '24px', 'value' => '24px'),
						array('name' => '25px', 'value' => '25px'),
						array('name' => '26px', 'value' => '26px'),
						array('name' => '27px', 'value' => '27px'),
						array('name' => '28px', 'value' => '28px'),
						array('name' => '29px', 'value' => '29px'),
						array('name' => '30px', 'value' => '30px'),
						array('name' => '31px', 'value' => '31px'),
						array('name' => '32px', 'value' => '32px'),
						array('name' => '33px', 'value' => '33px'),
						array('name' => '34px', 'value' => '34px'),
						array('name' => '35px', 'value' => '35px'),
						array('name' => '36px', 'value' => '36px'),			
					)
				),

				// H4 Size
				array(
					'name'     => 'H4 Size',
					'desc'     => 'Set the font size for the heading 4 size.',
					'id'       => $groovetheme . 'h4size',
					'type'     => 'select',
					'std'	   => '16px',
					'options'  => array(
						array('name' => '8px', 'value' => '8px'),
						array('name' => '10px', 'value' => '10px'),
						array('name' => '11px', 'value' => '11px'),
						array('name' => '12px', 'value' => '12px'),
						array('name' => '13px', 'value' => '13px'),
						array('name' => '14px', 'value' => '14px'),
						array('name' => '15px', 'value' => '15px'),
						array('name' => '16px', 'value' => '16px'),
						array('name' => '17px', 'value' => '17px'),
						array('name' => '18px', 'value' => '18px'),
						array('name' => '19px', 'value' => '19px'),
						array('name' => '20px', 'value' => '20px'),
						array('name' => '21px', 'value' => '22px'),
						array('name' => '22px', 'value' => '22px'),
						array('name' => '23px', 'value' => '23px'),
						array('name' => '24px', 'value' => '24px'),
						array('name' => '25px', 'value' => '25px'),
						array('name' => '26px', 'value' => '26px'),
						array('name' => '27px', 'value' => '27px'),
						array('name' => '28px', 'value' => '28px'),
						array('name' => '29px', 'value' => '29px'),
						array('name' => '30px', 'value' => '30px'),
						array('name' => '31px', 'value' => '31px'),
						array('name' => '32px', 'value' => '32px'),
						array('name' => '33px', 'value' => '33px'),
						array('name' => '34px', 'value' => '34px'),
						array('name' => '35px', 'value' => '35px'),
						array('name' => '36px', 'value' => '36px'),			
					)
				),

				// H5 Size
				array(
					'name'     => 'H5 Size',
					'desc'     => 'Set the font size for the heading 5 size.',
					'id'       => $groovetheme . 'h5size',
					'type'     => 'select',
					'std'	   => '12px',
					'options'  => array(
						array('name' => '8px', 'value' => '8px'),
						array('name' => '10px', 'value' => '10px'),
						array('name' => '11px', 'value' => '11px'),
						array('name' => '12px', 'value' => '12px'),
						array('name' => '13px', 'value' => '13px'),
						array('name' => '14px', 'value' => '14px'),
						array('name' => '15px', 'value' => '15px'),
						array('name' => '16px', 'value' => '16px'),
						array('name' => '17px', 'value' => '17px'),
						array('name' => '18px', 'value' => '18px'),
						array('name' => '19px', 'value' => '19px'),
						array('name' => '20px', 'value' => '20px'),
						array('name' => '21px', 'value' => '22px'),
						array('name' => '22px', 'value' => '22px'),
						array('name' => '23px', 'value' => '23px'),
						array('name' => '24px', 'value' => '24px'),
						array('name' => '25px', 'value' => '25px'),
						array('name' => '26px', 'value' => '26px'),
						array('name' => '27px', 'value' => '27px'),
						array('name' => '28px', 'value' => '28px'),
						array('name' => '29px', 'value' => '29px'),
						array('name' => '30px', 'value' => '30px'),
						array('name' => '31px', 'value' => '31px'),
						array('name' => '32px', 'value' => '32px'),
						array('name' => '33px', 'value' => '33px'),
						array('name' => '34px', 'value' => '34px'),
						array('name' => '35px', 'value' => '35px'),
						array('name' => '36px', 'value' => '36px'),			
					)
				),

				// H6 Size
				array(
					'name'     => 'H6 Size',
					'desc'     => 'Set the font size for the heading 6 size.',
					'id'       => $groovetheme . 'h6size',
					'type'     => 'select',
					'std'	   => '8px',
					'options'  => array(
						array('name' => '8px', 'value' => '8px'),
						array('name' => '10px', 'value' => '10px'),
						array('name' => '11px', 'value' => '11px'),
						array('name' => '12px', 'value' => '12px'),
						array('name' => '13px', 'value' => '13px'),
						array('name' => '14px', 'value' => '14px'),
						array('name' => '15px', 'value' => '15px'),
						array('name' => '16px', 'value' => '16px'),
						array('name' => '17px', 'value' => '17px'),
						array('name' => '18px', 'value' => '18px'),
						array('name' => '19px', 'value' => '19px'),
						array('name' => '20px', 'value' => '20px'),
						array('name' => '21px', 'value' => '22px'),
						array('name' => '22px', 'value' => '22px'),
						array('name' => '23px', 'value' => '23px'),
						array('name' => '24px', 'value' => '24px'),
						array('name' => '25px', 'value' => '25px'),
						array('name' => '26px', 'value' => '26px'),
						array('name' => '27px', 'value' => '27px'),
						array('name' => '28px', 'value' => '28px'),
						array('name' => '29px', 'value' => '29px'),
						array('name' => '30px', 'value' => '30px'),
						array('name' => '31px', 'value' => '31px'),
						array('name' => '32px', 'value' => '32px'),
						array('name' => '33px', 'value' => '33px'),
						array('name' => '34px', 'value' => '34px'),
						array('name' => '35px', 'value' => '35px'),
						array('name' => '36px', 'value' => '36px'),			
					)
				),

			array(
				'type' => 'close',
			),
		),
	);

/*-------------------------------------------------------------------------------------*/

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}

/*--------------------------------------------------------------------------------*/
/* CREATES THE OMFG PAGE CONTENT META BOX FOR ALL OMFG MOBILE PAGES
/*--------------------------------------------------------------------------------*/

add_action( 'admin_init', 'omfg_mobile_pro_page_content_register_meta_box');

function omfg_mobile_pro_page_content_register_meta_box()
{
	if ( ! class_exists( 'RW_Meta_Box' ) )
		return;

	global $post, $wp_query, $wpdb;

	$prefix = '_omfg_';
	$meta_boxes = array();
	$post_id = $wp_query->post->ID;
	$post_types = get_post_types();
	$post_type = get_post_type_object( get_post_type($post_id) );
	$posttypes = get_post_types( array( 'menu_icon' => OMFGMOBILEPRO . '/images/omfgwp-posttypes-icon.png' ) );

		// 1st meta box
		$meta_boxes[] = array(
			'id' => 'omfg_mobile_pro_page_content_metabox',
			'title' => 'Page Content',
			'pages' => $posttypes,
			'priority' => 'high',

			'fields' => array(
				array(
					'name'		=> 'Page Content',
					'id'		=> $prefix . 'page_content',
					'type'		=> 'wysiwyg',
				),
				// Other fields go here
			)
		);
		// Other meta boxes go here

	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}

/*--------------------------------------------------------------------------------*/
/* CREATES THE OMFG PAGE QR CODE PREVIEW
/*--------------------------------------------------------------------------------*/

add_action( 'admin_init', 'omfg_mobile_pro_page_qrcode_meta_box');

function omfg_mobile_pro_page_qrcode_meta_box()
{
	if ( ! class_exists( 'RW_Meta_Box' ) )
		return;

	global $post, $wp_query, $wpdb;

	$prefix = '_omfg_';
	$meta_boxes = array();
	$post_id = $wp_query->post->ID;
	$post_types = get_post_types();
	$post_type = get_post_type_object( get_post_type($post_id) );
	$posttypes = get_post_types( array( 'menu_icon' => OMFGMOBILEPRO . '/images/omfgwp-posttypes-icon.png' ) );

		// 1st meta box
		$meta_boxes[] = array(
			'id' => 'omfg_mobile_pro_page_qrcode_metabox',
			'title' => 'Mobile Page Preview',
			'pages' => $posttypes,
			'priority' => 'low',
			'context' => 'side',

			'fields' => array(
				array(
					'name'		=> '',
					'id'		=> $prefix . 'qr_code_preview',
					'type'		=> 'qr_code',
				),
				// Other fields go here
			)
		);
		// Other meta boxes go here

	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}