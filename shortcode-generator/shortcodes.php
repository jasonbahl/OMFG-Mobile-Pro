<?php
/**
 * This file holds the shortcode generating class. The class is a modified version of the free plugin VisualShortcodes.com
 * The classname was changed to avoid any conflicts with plugins that are maybe installed
 * @since		Version 1.0
 */

/*

    Copyright 2010 VisualShortcodes.com  (email : info@visualshortcodes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

class omfgmobilepro_shortcodes{
	
	function omfgmobilepro_shortcodes() {
	
			add_action( 'admin_init', array( &$this, 'action_admin_init' ) );
			add_action( 'wp_ajax_scn_check_url_action', array( &$this, 'ajax_action_check_url' ) );
		
	}
	
	function action_admin_init() {
		
		if ( current_user_can( 'edit_posts' ) 
		  && current_user_can( 'edit_pages' ) 
		  && get_user_option('rich_editing') == 'true' )  {
		  	
			add_filter( 'mce_buttons',          array( &$this, 'filter_mce_buttons'          ) );
			add_filter( 'mce_external_plugins', array( &$this, 'filter_mce_external_plugins' ) );
			
			
			wp_register_style('scnStyles', $this->plugin_url() . 'css/styles.css');
			wp_enqueue_style('scnStyles');
		}
	}
	
	function filter_mce_buttons( $buttons ) {

		global $post;
		$post_type = get_post_type_object(get_post_type($post));
	
		if ($post_type->menu_icon == OMFGMOBILEPRO . '/images/omfgwp-posttypes-icon.png') {
			
			array_push( $buttons, '|', 'scn_button');
			return $buttons;
		
		} else {
		
			return $buttons;
		
		}
		
	}
	
	function filter_mce_external_plugins( $plugins ) {
	
		global $post;
		$post_type = get_post_type_object(get_post_type($post));
	
		if ($post_type->menu_icon == OMFGMOBILEPRO . '/images/omfgwp-posttypes-icon.png') {
			
       		$plugins['ShortcodeNinjaPlugin'] = $this->plugin_url() . 'tinymce/editor_plugin.js';
       		return $plugins;
       	
       	} else {
        
        	return $plugins;
        
        }
	}
	
	/**
	 * Returns the full URL of this plugin including trailing slash.
	 */
	function plugin_url() {
		
		return OMFGMOBILEPRO.'shortcode-generator/';
	}
	
	
	// AJAX ACTION ///////////////
	
	/**
	 * Checks if a given url (via GET or POST) exists.
	 * Returns JSON
	 * 
	 * NOTE: for users that are not logged in this is not called.
	 *       The client receives <code>-1</code> in that case.
	 */
	function ajax_action_check_url() {

		$hadError = true;

		$url = isset( $_REQUEST['url'] ) ? $_REQUEST['url'] : '';

		if ( strlen( $url ) > 0  && function_exists( 'get_headers' ) ) {
				
			$file_headers = @get_headers( $url );
			$exists       = $file_headers && $file_headers[0] != 'HTTP/1.1 404 Not Found';
			$hadError     = false;
		}

		echo '{ "exists": '. ($exists ? '1' : '0') . ($hadError ? ', "error" : 1 ' : '') . ' }';

		die();
	}

}

new omfgmobilepro_shortcodes();
?>
