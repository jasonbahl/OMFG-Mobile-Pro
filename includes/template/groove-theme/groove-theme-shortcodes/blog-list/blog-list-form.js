// ============================================================================================================ -->
// 
// GROOVE BLOG LIST SHORTCODE
// [groove_blog_list post_type=post post_per_page=5]
//
// ============================================================================================================ -->

var BlogListDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertButton(ed) {
 
		// set up variables to contain our input values
		// ============================================-->
		var post_type 		= jQuery('.groove_blog_list select#groove_blog_list_post_type').val();
		var posts_per_page 	= jQuery('.groove_blog_list select#groove_blog_list_post_per_page').val();
		
		var output = '';
 
		// setup the output of our shortcode
		// ============================================-->
		output = '[groove_blog_list ';
			output += 'post_type=' + post_type + ' ';
			output += 'posts_per_page=' + posts_per_page + '';
			output += ']';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
 
		// Return
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(BlogListDialog.init, BlogListDialog);