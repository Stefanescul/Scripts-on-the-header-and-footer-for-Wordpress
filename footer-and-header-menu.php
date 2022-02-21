<?php 
/*Plugin name: Add Extra script to header and footer
Description: This plugin will help to add a script on the footer and the header
Author: MIHAI
*/

 

/*Function x that will add the menu settings admin */
function x (){

     add_menu_page('Header and Footer content script', 'Add Scripts for Header and Footer','manage_options','mihai-admin-menu', 'y', 'dashicons-media-code', 100);
     /*add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )*/
}
add_action('admin_menu', 'x');


/* Fucntion y that will add the content to plugin admin page */
 
function y(){


if (array_key_exists('submit_scripts_update', $_POST))
{

	update_option('header', $_POST['header_scripts']);
	update_option('footer', $_POST['footer_scripts']);
?>
<div id="settings-error-settings-updated" class="update_settings_error notice is-dismissible"><b>Settings have been saved</b></div>
<?php


}

     $header_scripts = get_option('header', 'none');
     $footer_scripts = get_option('footer', 'none');


?>
<div class="wrap">
	<h2>Update Scripts on the header and footer</h2>
	<form method="post" action="">
		<label for="header_scripts">Header Scripts</label>
		<textarea name="header_scripts" class="large-text"><?php print $header_scripts; ?> </textarea>
		<label for="footer_scripts">Footer Scripts</label>
		<textarea name="footer_scripts" class="large-text"><?php print $footer_scripts; ?></textarea>
		<input type="submit" name="submit_scripts_update" class="button button-primary" value="UPDATE SCRIPTS">

</form>
</div>
<?php
}
/*Functions that will display the content added on the header and the footer section of the website*/

function display_header_scripts(){

	$header_scripts = get_option('header','none');
	print $header_scripts;
}

   add_action('wp_head', 'display_header_scripts');

function display_footer_scripts(){

	$footer_scripts= get_option('footer','none');
	print $footer_scripts;

}
    add_action('wp_footer','display_footer_scripts');