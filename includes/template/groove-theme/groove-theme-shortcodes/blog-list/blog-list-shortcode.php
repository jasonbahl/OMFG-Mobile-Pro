<?php

/*-------------------------------------------------------------------------
Contact Shortcode
-------------------------------------------------------------------------*/

function omfg_mobile_pro_groove_theme_blog_list($atts) {

	global $omfgmobilepro_pluginroot;
	
	$emailscript = $omfgmobilepro_pluginroot . 'includes/template/groove-theme/groove-theme-shortcodes/contact/email.php';

	extract(shortcode_atts( array(
		'post_type' => 'post',
		'posts_per_page' => '5',
		), $atts));

	query_posts( "post_type=".$post_type."&posts_per_page=".$posts_per_page."&name=".$posttype."" );
		while ( have_posts() ) : the_post();
		
				$permalink = get_permalink();
				$title = get_the_title();
				$excerpt = get_the_excerpt();
				$comments = get_comments_number($post->ID);

				$output .= '<div class="module">';
					
					$output .= '<h3><a href="'.$permalink.'" title="'.$title.'">'.$title.'</a></h3>';
					
					$output .= '<div class="odd">';
						$output .= '<p class="author">By Author on December 12, 2011</p>';
					$output .= '</div>';
					
					$output .= '<div class="article">';
						$output .= ''.do_shortcode($excerpt).'';
					$output .= '</div>';
					
					$output .= '<div class="comments">';
						$output .= '<p><a href="article.htm" title="Comments">Comments: '.$comments.'</a></p>';
					$output .= '</div>';
				
				$output .= '</div>';
				
				$output .= '<div class="action">';
					$output .= '<a href="'.$permalink.'" target="_blank" title="Read More" class="readmore">Read More</a>';
				$output .= '</div>';
	
	// END BLOG LOOP
	// ======================================== -->
	endwhile; 			// End Query
	wp_reset_query(); 	// Reset Query				
		
	return $output; // Outputs the shortcode

}

add_shortcode('groove_blog_list','omfg_mobile_pro_groove_theme_blog_list');