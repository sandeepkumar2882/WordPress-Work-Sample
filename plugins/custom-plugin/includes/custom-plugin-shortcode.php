<?php

//custom-reg-plugin shortcode generation code  

add_shortcode( 'custom_reg_plugin', 'custom_reg_plugin_shortcode' );
 
// The callback function that will replace
function custom_reg_plugin_shortcode() {
	ob_start();
	include_once('custom-form-plugin.php');
	return ob_get_clean();
}

?>