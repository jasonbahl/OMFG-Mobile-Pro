<?php
/*
Callouts
=============================================*/

function vz_callout( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'bgcolor' => '#cccccc',
		'textcolor' => '#000000'
    ), $atts));
	$style;
		
	$style .= 'background-color:'.$bgcolor.';';
	$style .= 'color:'.$textcolor.';';
	
	
   return '<div class="cta" style="margin-bottom:15px; '.$style.'">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('omfg_callout', 'vz_callout');
