<?php 
/*
Buttons
=============================================*/

function vz_button( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'link' => '',
		'size' => 'medium',
		'color' => 'blue',
		'target' => '_self',
		'caption' => '',
		'align' => 'right'
    ), $atts));	
	
	$button;
	
	$button .= '<div class="button '.$size.' '. $align.'">';
		
		$button .= '<a target="'.$target.'" class="button '.$color.'" href="'.$link.'">';
			
			$button .= $content;
			
			if ($caption != '') {

				$button .= '<br /><span class="btn_caption">'.$caption.'</span>';
			
			};
	
		$button .= '</a>';
	
	$button .= '</div><div class="clear"></div>';
	
	return $button;
}
add_shortcode('omfg_button', 'vz_button');