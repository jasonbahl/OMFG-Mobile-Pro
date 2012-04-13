scnShortcodeMeta={
	attributes:[
		{
			label:"Tabs",
			id:"content",
			controlType:"tab-control"
		}],
		disablePreview:true,
		customMakeShortcode: function(b){
				
			var a=b.data;
			var tabTitles = new Array();
			
			if(!a)return"";
			
			var c=a.content;
			var r= b.active_tab_item;
			
			var g = ''; // The shortcode.
			
			for ( var i = 0; i < a.numTabs; i++ ) {
			
				var currentField = 'tle_' + ( i + 1 );
				
				var currentID = 'tle_' + ( i + 1 );

				if ( b[currentField] == '' ) {
				
					tabTitles.push( 'Tab ' + ( i + 1 ) );
				
				} else {
				
					var currentTitle = b[currentField];
					
					currentTitle = currentTitle.replace( /"/gi, "'" );
					
					tabTitles.push( currentTitle );
				
				} // End IF Statement
				
			} // End FOR Loop
			
			g += '[omfg_tabgroup]<br/>';
			
			for ( var t in tabTitles ) {
			
				// Convert Tab Title to Tab ID
				var currentID; 
				currentID = tabTitles[t].replace(/\s/g, "");
				currentID = currentID.toLowerCase();
			
				g += '[omfg_tab title="' + tabTitles[t] + '" id="' + currentID + '"]<br/>' + tabTitles[t] + ' content goes here.<br/>[/omfg_tab]<br/>';
			
			} // End FOR Loop

			g += '[/omfg_tabgroup]';

			return g
		
		}
};