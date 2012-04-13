<?php

/*-------------------------------------------------------------------------
Contact Shortcode
-------------------------------------------------------------------------*/

function omfg_mobile_pro_groove_theme_contact_form($atts) {
	
	global $omfgmobilepro_pluginroot, $omfg_groove_contact_add_my_script;
 
	$omfg_groove_contact_add_my_script = true;
	
	$emailscript = $omfgmobilepro_pluginroot . 'includes/template/groove-theme/groove-theme-shortcodes/contact-form/process.php';

	extract(shortcode_atts( array(
		'title' => 'Contact Form',
		'intro' => 'Please feel free to use the form below in order to get in touch with me at any time.',
		'email' => 'info@visioniz.com',
		'newsletter' => 'no'
		), $atts));

	$output .= '<div class="module contactbox">';
		
		$output .= '<h3>'.$title.'</h3>';
		
		// INTRO MESSAGE
		// ================================ -->
		$output .= '<div class="odd">';
			$output .= ''.wpautop(do_shortcode($intro)).'';
		$output .= '</div>';
		
		$output .= '<form method="post" action="'.$emailscript.'">';
			
			// NAME
			// ================================ -->
			$output .= '<div>';
				$output .= '<label for="name">Your Name</label>';
				$output .= '<input type="text" id="name" class="name" name="name" />';
			$output .= '</div>';
		
			// EMAIL ADDRESS 
			// ================================ -->
			$output .= '<div>';
				$output .= '<label for="email">Your E-Mail Address</label>';
				$output .= '<input type="text" id="email" class="email" name="email" />';
			$output .= '</div>';
		
			// MESSAGE 
			// ================================ -->
			$output .= '<div>';
				$output .= '<label for="message">Message</label>';
				$output .= '<textarea cols="30" rows="4" id="message" class="message" name="message"></textarea>';
			$output .= '</div>';
			
			$output .= '<input type="hidden" value="'.$email.'" name="emailaddress" id="emailaddress" class="emailaddress">';
		
			// NEWSLETTER SUBSCRIBE CHECKBOX
			// ================================= -->
			if ($newsletter == 'yes') {
		
				$output .= '<div>';
					$output .= '<label>Newsletter</label>';
					$output .= '<input type="checkbox" value="no" name="mailing" /><small>I\'d like to receive the weekly newsletter</small><br />';
				$output .= '</div>';
			
			}
			
			// SUBMIT 
			// ================================ -->
			$output .= '<div class="center">';
				$output .= '<input id="submit" type="submit" value="Submit" />';
			$output .= '</div>';
			
		$output .= '</form>';
	
	$output .= '</div>';
			
	return $output; // Outputs the shortcode

}

add_shortcode('groove_contact_form','omfg_mobile_pro_groove_theme_contact_form');

/*-------------------------------------------------------------------------
Contact Form Shortcode Submission
-------------------------------------------------------------------------*/

function omfg_groovetheme_contactform_jquery(){
	
	global $omfg_groove_contact_add_my_script;
 
	if ( ! $omfg_groove_contact_add_my_script )
		return;
		
	$output .= '
	<script type="text/javascript">
		jQuery(document).ready(function($){

		//VALIDATES THE EMAIL FIELD
		// ================================== -->
		function isValidEmailAddress(emailAddress) {
    		
    		var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    		return pattern.test(emailAddress);
		};

		// FORM SUBMISSION
		// ================================== -->		
		$(function() {
			
			// Hide the error class to start
			// ==================================== -->
			$("input.email").removeClass("error-email");
			
			// Process Form When Submit Button is Clicked
			// ========================================== -->
			$("submit").click(function() {
				
				// Remove Error Messages
				// ======================================= -->
				$("input.email").removeClass("error-email");
		
				// Gather Form Fields as Variables
				// ======================================= --> 
				var email = $("input.email").val();
				
				var name = $("input#name").val();
				
				var message = $("textarea#message").val();
				
				// VALIDATE THE EMAIL FIELD
				// ================================================== -->
				if ( (email == "") || (!isValidEmailAddress(email)) ) {
					
						$("input.email").addClass("error-email");
						$("input.email").val("Enter a valid email");
					
						return false;
				}
			
				// THIS GETS THE DATA TOGETHER TO SEND TO THE PROCESS PAGE
				// ======================================================= -->	
				var dataString = "&email=" + email + "&name=" + name + "&message=" + message;
			
		
				// SUBMIT THE FORM
				// =========================================== -->
				
				$.ajax({
					type: "POST",
					url: "'.$emailscript.'",
					data: dataString,
					success: function() {
						$(".contactbox").html("<div id=submitmessage></div>");
						$("#submitmessage").html("<h2>Thank You for Contacting Us.</h2>")
						.append("<p></p>")
						.hide()
						.fadeIn(1500, function() {
							$("#submitmessage").append("");
						});
					}
				});

				return false;
	
			});
		
		});
		
	});
	</script>
	';

	echo $output;

}

add_action('omfg_mobile_pro_footer','omfg_groovetheme_contactform_jquery');