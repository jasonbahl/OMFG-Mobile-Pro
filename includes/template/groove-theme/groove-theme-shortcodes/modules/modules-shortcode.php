<?php 

/*-------------------------------------------------------------------------
Module Shortcode
-------------------------------------------------------------------------*/

function omfg_mobile_pro_groove_theme_module($atts, $content) {

	extract(shortcode_atts( array(
		'title' => '',
		), $atts));

	$output .='<div class="clear"></div>';
	
	// Start Module
	$output .='	<div class="module">';
	
		// Module Title
		$output .='<h3>'.$title.'</h3>';
	
		// Module Content Container
		$output .='<div>';
	
			// Module Content
			$output .= do_shortcode($content);
			
			$output .='<div class="clear-small"></div>';
	
		// End Module Content Container	
		$output .='</div>';
	
	// End Module
	$output .='	</div>';
	
	$output .='<div class="clear"></div>';
		
	return $output; // Outputs the shortcode

}

add_shortcode('groove_module','omfg_mobile_pro_groove_theme_module');