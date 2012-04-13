<!-- =================================================================================================================
CREATES THE SHORTCODE BUTTON
================================================================================================================= -->

<div class="shortcode-select groove_blog_list_post_type_button" id="groove_blog_list"></div>

<!-- =================================================================================================================
 
[menu name=name-of-menu]

================================================================================================================= -->

	<div class="button-dialog groove_blog_list" ><!-- MENU SHORTCODE OPTIONS -->

		<div class="close-dialog" id="groove_blog_list">Close</div>
		
		<h2>Groove Blog List</h2>
		
		<form action="/" method="get" accept-charset="utf-8">

			<!-- Blog List Post Type -->
			<div>
				<label for="groove_blog_list_post_type">Post Type</label>

				<select name="groove_blog_list_post_type" id="groove_blog_list_post_type">
						
						<!-- RUNS THE LOOP OUTSIDE OF WORDPRESS, AS THIS FILE TECHNICALLY IS NOT A WP FILE -->
						<?php
 						// Include WordPress
  						define('WP_USE_THEMES', false);
  						require('../../../../../../../wp-blog-header.php'); //UPDATE IF THE PLUGIN IS NOT IN THE PLUGINS FOLDER
 						
 						$posttypes = get_post_types(array(
 							'public' => true
 							)
 						);
						
						foreach($posttypes as $posttype){
						
							$posttype_upper = str_replace( "-", " ", $posttype);
							$posttype_upper = ucwords($posttype_upper);
							

 	 						echo "<option value=".$posttype.">".$posttype_upper."</option>";
 	 						
 	 					} 
    					
    					?>
					
				</select>
			
			</div>
			
			<div>

				<label for="groove_blog_list_post_per_page">Post Type</label>

				<select name="groove_blog_list_post_per_page" id="groove_blog_list_post_per_page">
						
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					
				</select>



			</div>
			
			<!-- Insert Button -->
			<div class="insert">
				<a href="javascript:BlogListDialog.insert(BlogListDialog.local_ed)" id="insert" style="display: block; line-height: 24px;">Insert</a>
			</div>
			
		</form>
	
	</div><!-- END MENU SHORTCODE OPTIONS -->