jQuery(document).ready(function($){
	
	/* ------------------------------------------------------------------------- */
	/* Initialize jQuery Tabs
	/* ------------------------------------------------------------------------- */
	$(".tabs").tabs();
	
	/* ------------------------------------------------------------------------- */ 
	/* SETS UP THE SHOW-HIDE FEATURE
	/* ------------------------------------------------------------------------- */ 
		
	$('#omfg-mobile-groove-theme-options').hide();
	$('#' + $('#_omfg_theme_select').val() + '-options').show();
	
	$('#_omfg_theme_select').change(function(){
	
		$('#omfg-mobile-groove-theme-options').hide();
		$('#' + $('#_omfg_theme_select').val() + '-options').show();
	
	});
	
}); // END JQUERY READY FUNCTION