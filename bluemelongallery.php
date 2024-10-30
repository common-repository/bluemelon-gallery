<?php
/*
Plugin Name: Bluemelon gallery
Plugin URI: http://wordpress.org/extend/plugins/bluemelon-gallery/
Version: 1.0.8
Stable tag: 1.0.8
Tested up to: 3.0.1
Author: bluemelon
Author URI: http://www.bluemelon.com
License: GPL3
*/

function bluemelongallery_addbuttons() {
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
	// add the button for wp25 in a new way
		add_filter("mce_external_plugins", "add_bluemelongallery_tinymce_plugin", 5);
		add_filter('mce_buttons', 'register_bluemelongallery_button', 5);
	}
}

// used to insert button in wordpress 2.5x editor
function register_bluemelongallery_button($buttons) {
	array_push($buttons, "separator", "bluemelongallery");
	return $buttons;
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_bluemelongallery_tinymce_plugin($plugin_array) {
	$plugin_array['bluemelongallery'] = get_option('siteurl').'/wp-content/plugins/bluemelon-gallery/editor_plugin.js';	
	return $plugin_array;
}

function bluemelongallery_change_tinymce_version($version) {
	return ++$version;
}
// Modify the version when tinyMCE plugins are changed.
add_filter('tiny_mce_version', 'bluemelongallery_change_tinymce_version');
// init process for button control
add_action('init', 'bluemelongallery_addbuttons');


function getIframe( $atributes )
{
	return "<iframe $atributes ></iframe>";
}
	
function parseIframe( $content )
{
		$pattern = "/\[iframe:([^\]]+)\]/";
		preg_match_all( $pattern, $content, $iframes );
		
		foreach( $iframes[0] as $k=>$iframe )
		{
			$content = str_replace( $iframe, getIframe( $iframes[1][$k] ), $content );
		}
		
	return $content;
}

add_filter ('the_content', 'parseIframe');
?>