(function () {
    tinymce.create("tinymce.plugins.GrooveThemePlugin", {
        init: function (d, e) {
            d.addCommand("grooveOpenDialog", function (a, c) {
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
                c.setDisabled("groove_button", a.selection.getContent().length > 0)
            })
        },
        createControl: function (d, e) {
            if (d == "groove_button") {
                d = e.createMenuButton("groove_button", {
                    title: "Insert Shortcode",
                    image: "../wp-content/plugins/omfg-mobile/includes/template/groove-theme/shortcode-generator/tinymce/img/menu-icon.png",
                    icons: false
                });
                var a = this;
                d.onRenderMenu.add(function (c, b) {
                    a.addWithDialog(b, "Module", "module");
                    a.addWithDialog(b, "Contact Form", "contact_form");
                    a.addWithDialog(b, "Tweets", "tweets");
                    b.addSeparator();
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
                    tinyMCE.activeEditor.execCommand("grooveOpenDialog", false, {
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
    tinymce.PluginManager.add("GrooveThemePlugin", tinymce.plugins.GrooveThemePlugin)
})();