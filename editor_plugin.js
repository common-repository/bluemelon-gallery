(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('bluemelongallery');
	 
	tinymce.create('tinymce.plugins.bluemelongallery', {
		
		init : function(ed, url) {
		// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');

			ed.addCommand('bluemelongallery', function() {
				ed.windowManager.open({
					file : url + '/window.php',
					width : 550,
					height : 90,
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});
			});

			// Register bluemelon button
			ed.addButton('bluemelongallery', {
				title : 'Bluemelon gallery button',
				cmd : 'bluemelongallery',
				image : url + '/bluemelon_img.gif'
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('bluemelongallery', n.nodeName == 'IMG');
			});
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
					longname  : 'bluemelongallery',
					author 	  : 'Bluemelon team',
					authorurl : 'http://www.bluemelon.com',
					infourl   : 'http://www.bluemelon.com',
					version   : "0.2 beta"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('bluemelongallery', tinymce.plugins.bluemelongallery);
})();


