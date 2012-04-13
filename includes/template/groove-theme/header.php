<!DOCTYPE HTML>
<html lang="en">

<head>
	
	<!-- VARIABLES
	======================================== -->	
	<?php 
	global $post, $wpdb, $wp_query, $omfgmobilepro_pluginroot;
	
	// Plugin Root & Site Root
	$pluginroot = plugin_dir_url(__FILE__);
	$plugin_dir_root = get_bloginfo('url');
	
	// Post ID
	$postid = $wp_query->post->ID;
	
	// Post Type
	$posttype = get_post_type($postid);
	$posttype = substr($post_type, 5);
	
	$the_permalink = get_post_permalink();
	
		// THEME VARIABLES
		// ======================================== -->
		// Get Theme Settings
		query_posts( "post_type=omfg-mobile-pro&posts_per_page=1&name=".$posttype."" );
		while ( have_posts() ) : the_post();
		
			// General Options
			// --------------------------------------------- //
			
			// Top Tabs
			$home_page 			= get_post_meta($post->ID, '_groovetheme_home_page', true);
			$twitter_page 		= get_post_meta($post->ID, '_groovetheme_twitter_page', true);
			$contact_page		= get_post_meta($post->ID, '_groovetheme_contact_page', true);
			$footer_text 		= get_post_meta($post->ID, '_groovetheme_footer_text', true);
			
			// Logo link
			$logo 				= get_post_meta($post->ID, '_groovetheme_logo', true);
			$logo_link 			= get_post_meta($post->ID, '_groovetheme_logo_link', true);
			
			// Set default logo if none exists
			if ($logo == '' ) {
				$logo = '<div id="logo"><img src="'.$pluginroot.'images/logo.png"></div>';
			} else {
				$logo = '<div id="logo"><img src="'.$logo.'"></div>';
			}

			// Set logo link, if it exists
			if ($logo_link == '' ) {
				$logo = $logo;
			} else {
				$logo = '<div id="logo"><a href="'.$logo_link.'">'.$logo.'</a></div>';
			}
			
			
			// Sidebar Options
			// --------------------------------------------- //
			
			// Show or Hide Slide Out Menu
			$sidebar_menu 		= get_post_meta($post->ID, '_groovetheme_slide_out_menu', true);
			
			// Menu Section
			$link_section 		= get_post_meta($post->ID, '_groovetheme_links_section', true);
			$link_orderby 		= get_post_meta($post->ID, '_groovetheme_links_orderby', true);
			$link_order 		= get_post_meta($post->ID, '_groovetheme_links_order', true);
			
			// Sidebar Contact Info
			$contact_section 	= get_post_meta($post->ID, '_groovetheme_contact_section', true);
			$web_url 			= get_post_meta($post->ID, '_groovetheme_contact_weburl', true);
			$email_address 		= get_post_meta($post->ID, '_groovetheme_contact_email', true);
			$phone_number 		= get_post_meta($post->ID, '_groovetheme_contact_phone', true);
			$address 			= get_post_meta($post->ID, '_groovetheme_contact_address', true);
			
			// Sidebar Social Info
			$social_section 	= get_post_meta($post->ID, '_groovetheme_social_section', true);
			$twitter_url 		= get_post_meta($post->ID, '_groovetheme_twitter_url', true);
			$facebook_url 		= get_post_meta($post->ID, '_groovetheme_facebook_url', true);
			$flickr_url 		= get_post_meta($post->ID, '_groovetheme_flickr_url', true);
			$linkdin_url 		= get_post_meta($post->ID, '_groovetheme_linkdin_url', true);
			$forrst_url 		= get_post_meta($post->ID, '_groovetheme_forrst_url', true);
			
			// Newsletter Signup
			$newsletter_section = 'hide'; // Not Supported in initial plugin release
			
			// Style Options
			// --------------------------------------------- //
			
			// Colors
			$color1 			= get_post_meta($post->ID, '_groovetheme_color1', true);
			$color2 			= get_post_meta($post->ID, '_groovetheme_color2', true);
			
			// Fonts
			$font1				= get_post_meta($post->ID, '_groovetheme_font1', true);
			$h1size				= get_post_meta($post->ID, '_groovetheme_h1size', true);
			$h2size				= get_post_meta($post->ID, '_groovetheme_h2size', true);
			$h3size				= get_post_meta($post->ID, '_groovetheme_h3size', true);
			$h4size				= get_post_meta($post->ID, '_groovetheme_h4size', true);
			$h5size				= get_post_meta($post->ID, '_groovetheme_h5size', true);
			$h6size				= get_post_meta($post->ID, '_groovetheme_h6size', true);
			
			$font2				= get_post_meta($post->ID, '_groovetheme_font2', true);
			$font2size			= get_post_meta($post->ID, '_groovetheme_font2size', true);
			
		
		// END THEME VARIABLES
		// ======================================== -->
		endwhile; 			// End Query
		wp_reset_query(); 	// Reset Query
		
	// Page VARIABLES
	// ======================================== -->
	
	
	?>
	
	<!-- Title
	============================================ -->
	<title><?php the_title(); ?></title>
	
	<!-- Meta Tags
	============================================ -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	
	<!-- CSS
	============================================ -->
	<link rel="stylesheet" type="text/css" href="<?php echo $pluginroot; ?>css/style.css" media="screen" />
		
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Styles Hook
	============================================ -->
	<?php omfg_mobile_pro_styles(); ?>
	
	<?php 
	echo '<style type="text/css">';
	
		/* Color 1 */
		echo 'header, .controls, aside section, .readmore, header li.tweets.active a, header li.home.active a, header li.contact.active a{background-color:'.$color1.'}';
		echo 'h1, h2, h3, h4, h5, h6, a, del{color:'.$color1.'}';
		
		/* Color 2 */
		echo 'header li.tweets a, header li.home a, header li.contact a{background-color: '.$color2.'}';
		echo 'aside li.active a, aside a:hover, a:hover{color:'.$color2.'}';
		
		/* Heading Fonts */
		echo 'h1, h2, h3, h4, h5, h6 {font-family:'.$font1.'}';
		echo 'h1{font-size:'.$h1size.'; line-height:'.($h1size + 6).'px;}';
		echo 'h2{font-size:'.$h2size.'; line-height:'.($h2size + 6).'px;}';
		echo 'h3{font-size:'.$h3size.'; line-height:'.($h3size + 6).'px;}';
		echo 'h4{font-size:'.$h4size.'; line-height:'.($h4size + 6).'px;}';
		echo 'h5{font-size:'.$h5size.'; line-height:'.($h5size + 6).'px;}';
		echo 'h6{font-size:'.$h6size.'; line-height:'.($h6size + 6).'px;}';
	
		/* Body Font */
		echo 'body{font-family:'.$font2.';}';
		echo 'body, p{font-size:'.$font2size.'; line-height:'.($font2size + 6).'px;}';
	
	echo '</style>';
	?>
	
	
	<!-- JQuery
	============================================ -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<!-- iOS4 Scrolling Fix -->
	<script src="<?php echo $pluginroot; ?>includes/scrolling.js"></script>

	<!-- Twitter Feed -->
	<script src="<?php echo $pluginroot; ?>includes/tweet.js"></script>

	<!-- Script Controls -->
	<script src="<?php echo $pluginroot; ?>includes/scripts.js"></script>
	
	<!-- FitVid -->
	<script src="<?php echo $pluginroot; ?>includes/fitvid.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		$('.flexslider').fitVids();
	});	
	</script>
	
	<!-- JS Hook
	============================================ -->
	<?php omfg_mobile_pro_js(); ?>
	
</head>

<body>

<div id="wrapper">
	
<?php if ($sidebar_menu != 'hide') { ?>
	
	<!-- Sidebar Begin
	============================================ -->
	<aside id="sidebar">
		<div class="sidebar-scroll">
	
			<!-- Main Navigation
			============================================ -->
			<?php if ($link_section == 'show') { ?>
			
			<nav>
				<ul>
				
					<?php 
					// Loop Through Current Post Type Pages
					// ==================================================
					global $post, $wp_query;
		
					$postid = $wp_query->post->ID; 			// Current Post ID
					$post_type = get_post_type($postid);	// Current Post Type
			
					// Runs the Query
					// ==================================================
					query_posts( "post_type=".$post_type."&posts_per_page=-1&orderby=".$link_orderby."&order=".$link_order."" );
					while ( have_posts() ) : the_post();
					
					$permalink = get_permalink(); 
					$title = get_the_title();
					?>
					
						<li<?php if ($the_permalink == $permalink) { echo ' class="active" '; } ?>>
							<a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>"><?php echo $title; ?><!--<span>8</span>--></a>
						</li>
						<!-- Use <span> in order to display a count -->
						
					<?php 
					endwhile; 			// End Query
					wp_reset_query(); 	// Reset Query
					?>
					
				</ul>
			</nav>
			
			<?php } ?>
			
			<!-- Newsletter Subscription
			============================================ -->
			<?php if ($newsletter_section == 'show') { ?>
			
			<section id="newsletter">
				<h2>Newsletter</h2>
				
				<!-- Make sure to add a working action and method
				============================================ -->
				<form action="index.htm" method="post">
					<div>
						<label for="newsletter-input">Subscribe to our weekly newsletter</label>
						<input name="email" id="newsletter-input" />
						<input type="image" src="<?php echo $pluginroot; ?>images/icons/icon-subscribe.png" alt="Subscribe" id="newsletter-submit" />
					</div>
				</form>
				
			</section>
			
			<?php } ?>
			
			<!-- Social Media
			============================================ -->
			<?php if ($social_section == 'show') { ?>
			
			<section id="socialize">
				<h2>Socialize</h2>
				<ul>
					
					<?php if ($twitter_url != '') { ?>
					<li class="twitter">
						<a href="<?php echo $twitter_url; ?>" target="_blank" title="Twitter"><?php echo substr($twitter_url, 7); ?></a>
					</li>
					<?php } ?>
					
					<?php if ($facebook_url != '') { ?>
					<li class="facebook">
						<a href="<?php echo $facebook_url; ?>" target="_blank" title="Facebook"><?php echo substr($facebook_url, 7); ?></a>
					</li>
					<?php } ?>
					
					<?php if ($flickr_url != '') { ?>
					<li class="flickr">
						<a href="<?php echo $flickr_url; ?>" target="_blank" title="Flickr"><?php echo substr($flickr_url, 7); ?></a>
					</li>
					<?php } ?>
					
					<?php if ($linkdin_url != '') { ?>
					<li class="linkedin">
						<a href="<?php echo $linkdin_url; ?>" target="_blank" title="LinkedIn"><?php echo substr($linkdin_url, 7); ?></a>
					</li>
					<?php } ?>
					
					<?php if ($forrst_url != '') { ?>
					<li class="forrst">
						<a href="<?php echo $forrst_url; ?>" target="_blank" title="Forrst"><?php echo substr($forrst_url, 7); ?></a>
					</li>
					<?php } ?>
					
				</ul>
			</section>
			
			<?php } ?>
			
			<!-- Contact Information
			============================================ -->
			<?php if ($contact_section == 'show') { ?>
			
			<section id="contact">
				<h2>Get in Touch</h2>
				<ul>
					<?php if ($web_url != '' ) { ?>
					<li class="web"><a href="<?php echo $web_url; ?>" target="_blank" title="Website"><?php echo $web_url; ?></a></li>
					<?php } ?>
					
					<?php if ($email_address != '' ) { ?>
					<li class="email"><a href="mailto:<?php echo $email_address; ?>" title="E-Mail"><?php echo $email_address; ?></a></li>
					<?php } ?>
					
					<?php if ($phone_number != '' ) { ?>
					<li class="phone"><a href="tel:<?php echo $phone_number; ?>" title="Phone"><?php echo $phone_number; ?></a></li>
					<?php } ?>
					
					<?php if ($address != '' ) { ?>
					<li class="address">
						<div>
							<?php echo $address; ?>
						</div>
					</li>
					<?php } ?>
					
				</ul>
			</section>
			
			<?php } ?>
		
		</div>
	</aside>
	<!-- Sidebar End
	============================================ -->

<?php } ?><!-- Endif Sidebar Menu != hide -->
	
	<!-- Main Content Begin
	============================================ -->
	<section id="content">
		<div class="content-scroll">
	
			<!-- Sidebar Toggle & Tabbed Navigation -->
			<header>
				
				<?php if ($sidebar_menu != 'hide') { ?><!-- Show Sidebar Toggle if Side Menu is NOT hidden -->
					
					<div class="controls">
					
						<a title="Toggle Sidebar">
							<img src="<?php echo $pluginroot; ?>images/icons/icon-toggle.png" alt="Toggle Sidebar" />
						</a>
					
					</div>
				
				<?php } ?><!-- END IF - Show Sidebar Toggle if Side Menu is NOT hidden -->
				
				<ul>
				
					<?php if ($home_page != '') {?>				
						<li class="home<?php if ($postid == $home_page) { echo ' active'; } ?> <?php echo $post->ID; ?> <?php echo $home_page; ?>"><a href="<?php echo get_permalink($home_page); ?>" title="Home">Home</a></li>
					<?php } ?>
					
					<?php if ($twitter_page != '') {?>
						<li class="tweets<?php if ($postid == $twitter_page) { echo ' active'; } ?> <?php echo $post->ID; ?> <?php echo $twitter_page; ?>"><a href="<?php echo get_permalink($twitter_page); ?>" title="Twitter Feed">Twitter Feed</a></li>
					<?php } ?>
					
					<?php if ($contact_page != '') { ?>
						<li class="contact<?php if ($postid == $contact_page) { echo ' active'; } ?> <?php echo $post->ID; ?> <?php echo $contact_page; ?>"><a href="<?php echo get_permalink($contact_page); ?>" title="Contact">Contact</a></li>
					<?php } ?>
					
				</ul>
			</header>
			
			<!-- Logo & Slideshow Controls -->
			<section id="branding">
				<?php echo $logo; ?>
			</section>