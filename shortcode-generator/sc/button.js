scnShortcodeMeta = {
    attributes: [{
        label: "Button Text",
        id: "content",
        help: "The text to display in the button.",
        isRequired: true
    }, {
        label: "Link",
        id: "link",
        help: "URL the button should link to.",
        validatelink: true
    }, {
		label:"Size",
		id:"size",
		help:"Small, Medium or Large", 
		controlType:"select-control", 
		selectValues:['small', 'medium', 'large'],
		defaultValue: 'medium', 
		defaultText: 'medium'
    }, {
		label:"Color",
		id:"color",
		help:"Select a button color",
		controlType:"select-control", 
		selectValues:['white', 'gray', 'black', 'lightblue', 'blue', 'darkblue', 'lightgreen', 'green', 'darkgreen', 'lightred', 'red', 'darkred', 'yellow', 'orange', 'brown'],
		defaultValue: 'blue', 
		defaultText: 'Blue'
	}, {
		label:"Align",
		id:"align",
		help:'Select the button alignment.', 
		controlType:"select-control", 
		selectValues:['left', 'right', 'center'],
		defaultValue: 'left', 
		defaultText: 'left'
	}, {
		label:"CSS Class",
		id:"class",
		help:"Optional CSS class."
	}, {
		label:"Link Target",
		id:"window",
		help:"Open link in a new window or the same window?", 
		controlType:"select-control", 
		selectValues:['_blank', '_parent', '_self'],
		defaultValue: '_self', 
		defaultText: '_self (Same Window)'
	}],
    defaultContent: "Click me!",
    shortcode: "omfg_button"
};