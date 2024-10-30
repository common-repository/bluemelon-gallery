<?php
$wpconfig = realpath("../../../wp-config.php");
if (!file_exists($wpconfig))  {
	echo "Could not found wp-config.php. Error in path :\n\n".$wpconfig ;	
	die;	
}
require_once($wpconfig);
require_once(ABSPATH.'/wp-admin/admin.php');
global $wpdb;
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Bluemelon gallery</title>
	<script type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-content/plugins/bluemelon-gallery/main.js"></script>

</head>
<body>
  <form name="bluemelongallery" action="#">
		<table style="border: none;">
      <tr>
			 <td nowrap="nowrap"><label for="bluemelongallery_galleryLink">Bluemelon album/category link : </label></td>
       <td><label><input name="galleryLink" id='bluemelongallery_galleryLink' type="text" size="60"/></label></td>
      </tr>
      <tr>
			 <td nowrap="nowrap"><label for="bluemelongallery_height">Gallery height : </label></td>
       <td><label><input name="bluemelongallery_height" id='bluemelongallery_height' type="text" size="5"/></label></td>
      </tr>
    </table>
	<div class="mceActionPanel">
		<div style="float: left">
			    <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'bluemelongallery_main'); ?>" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
				<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'bluemelongallery_main'); ?>" onclick="insertBMIframe();" />
		</div>
	</div>
</form>
</body>
</html>