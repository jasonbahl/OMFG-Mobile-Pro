(function () {
    tinymce.create("tinymce.plugins.ShortcodeNinjaPlugin", {
        init: function (d, e, url) {
        	theurl = url;
            d.addCommand("scnOpenDialog", function (a, c) {
                scnSelectedShortcodeType = c.identifier;
                jQuery.get(e + "/dialog.php", function (b) {
                    jQuery("#scn-dialog").remove();
                    jQuery("body").append(b);
                    jQuery("#scn-dialog").hide();
                    var f = jQuery(window).width();
                    b = jQuery(window).height();
                    f = 720 < f ? 720 : f;
                    f -= 80;
                    b -= 84;
                    tb_show("Insert Shortcode", "#TB_inline?width=" + f + "&height=" + b + "&inlineId=scn-dialog");
                    jQuery("#scn-options h3:first").text("Customize the " + c.title + " Shortcode")
                })
            });
            d.onNodeChange.add(function (a, c) {
                c.setDisabled("scn_button", a.selection.getContent().length > 0)
            })
        },
        createControl: function (d, e) {
            if (d == "scn_button") {
                d = e.createMenuButton("scn_button", {
                    title: "Insert Shortcode",
                    image: "../wp-content/plugins/omfg-mobile/shortcode-generator/tinymce/img/icon.png",
                    icons: false
                });
                var a = this;
                d.onRenderMenu.add(function (c, b) {
                    a.addWithDialog(b, "Button", "button");
                    a.addWithDialog(b, "Callout Box", "callout_box");
                    
                    // a.addWithDialog(b, "Icon link", "ilink");
                    // b.addSeparator();
                    // a.addWithDialog(b, "Icon Box", "iconbox");
                    // a.addWithDialog(b, "Info Box", "info_box");
                    // a.addWithDialog(b, "Quote", "quote");
                  	//a.addWithDialog(b, "Related Posts", "related");
                    
                    b.addSeparator();
                    a.addWithDialog(b, "Column Layout", "column");
					// a.addWithDialog(b, "Content Slider","slider");
					a.addWithDialog(b, "Tabbed Content","tab");
					a.addWithDialog(b, "Toggles","toggle");
					
					//a.addWithDialog(b, "Tab Layout","tab");
                    
                    b.addSeparator();
                    
                    c = b.addMenu({
                        title: "Dividers"
                    });
                    
                    	a.addImmediate(c, "Whitespace", "<br>[omfg_clear] <br>");
                    	a.addImmediate(c, "Horizontal Rule", "<br>[omfg_clearline] <br>");
                   
                   // c = b.addMenu({
                   //     title: "Dropcaps"
                   // });
                    
                   // 	a.addImmediate(c, "Dropcap Style 1 (Big Letter)", "[dropcap1]A[/dropcap1]");
                   // 	a.addImmediate(c, "Dropcap Style 2 (Colored Background)", "[dropcap2]A[/dropcap2]");
                   // 	a.addImmediate(c, "Dropcap Style 3 (Dark Background)", "[dropcap3]A[/dropcap3]");
                    
                    // b.addSeparator();
                    
                    // c = b.addMenu({
                    //    title: "Widgets"
                    // });
                    
                    //	a.addWithDialog(c, "Latest Tweets", "latest_tweets");
					//	a.addWithDialog(c, "Latest Posts",	"latest_posts");
					//	a.addWithDialog(c, "Latest Portfolio entries",	"latest_portfolio");                    
                    
                    
                    // c = b.addMenu({
                    //    title: "Social Buttons"
                    // });
                    // a.addWithDialog(c, "Twitter", "twitter");
                    // a.addWithDialog(c, "Tweetmeme", "tweetmeme");
                    // a.addWithDialog(c, "Digg", "digg");
                    // a.addWithDialog(c, "Like on Facebook", "fblike");
      
                });
                
                return d

            }

            return null

        },
        addImmediate: function (d, e, a) {
            d.add({
                title: e,
                onclick: function () {
                    tinyMCE.activeEditor.execCommand("mceInsertContent", false, a)
                }
            })
        },
        addWithDialog: function (d, e, a) {
            d.add({
                title: e,
                onclick: function () {
                    tinyMCE.activeEditor.execCommand("scnOpenDialog", false, {
                        title: e,
                        identifier: a
                    })
                }
            })
        },
        getInfo: function () {
            return {
                longname: "Shortcode Ninja plugin",
                author: "VisualShortcodes.com (modified by Kriesi)",
                authorurl: "http://visualshortcodes.com",
                infourl: "http://visualshortcodes.com/shortcode-ninja",
                version: "1.0"
            }
        }
    });
    tinymce.PluginManager.add("ShortcodeNinjaPlugin", tinymce.plugins.ShortcodeNinjaPlugin)
})();