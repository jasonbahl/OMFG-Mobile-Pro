<?php

/*-------------------------------------------------------------------------
Tweets Shortcode
-------------------------------------------------------------------------*/

function omfg_mobile_pro_groove_theme_tweets($atts) {

	extract(shortcode_atts( array(
		'name' => 'visioniz',
		'count' => '10',
		), $atts));

	$output .= '<div class="module">';
	
		$output .= '<h3>Latest Tweets</h3>';
		$output .= '<div class="feed"></div>';
	
	$output .= '</div>';
				
	$output .= '
	<script type="text/javascript">
	/* Initializes Twitter Feed */
	jQuery(document).ready(function($){
		$(".feed").tweet({
			join_text: "auto",
			username: "'.$name.'",
			count: '.$count.',
			auto_join_text_default: "",
			auto_join_text_ed: "",
			auto_join_text_ing: "",
			auto_join_text_reply: "",
			auto_join_text_url: "",
			loading_text: ""
		});
	});
	</script>
	';
		
	return $output; // Outputs the shortcode

}

add_shortcode('groove_tweets','omfg_mobile_pro_groove_theme_tweets');