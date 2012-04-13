<?php
/*
Toggles
============================*/
function vz_toggle( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		 'title' => '',
		 'style' => 'list'
    ), $atts));
	output;
	
	$output .= '<div style="width:98%; margin: 5px auto;">';
		
		$output .= '<div class="'.$style.'">';
		
			$output .= '<p class="trigger">';
				$output .= '<a href="#">' .$title. '</a>';
			$output .= '</p>';
			
			$output .= '<div class="toggle_container">';	
				$output .= '<div class="block">';
				$output .= apply_filters('the_content',$content);
				$output .= '</div>';
			$output .= '</div>';
		
		$output .= '</div>';
	
	$output .= '</div>';

	return $output;
	
}

add_shortcode('omfg_toggle', 'vz_toggle');

