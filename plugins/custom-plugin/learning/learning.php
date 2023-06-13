<?php
//Plugin show in dashboard, We can show settings in dashboard with this technique also 

add_action('admin_menu','custom_form_menu');

function custom_form_menu(){
    // add_menu_page('custom form','Custom Form',8,__FILE__,'custom_form_data_list');
	add_menu_page('custom form 2','Custom Form 2','manage_options','custom_plugin_page','custom_form_menu_callback','',6);

	add_submenu_page(
		'custom_plugin_page', 'Custom Form Main Page', 'Custom Form Main Page', 'manage_options', 'custom_plugin_page', 'custom_form_menu_callback',
		array('wpdocs_method_name_in_the_class' )
	);

	add_submenu_page(
		'custom_plugin_page', 'Show All Data', 'Show All Data', 'manage_options', 'retrieve_data_from_database', 'custom_form_submenu_callback',
		array('wpdocs_method_name_in_the_class' )
	);
}
?>

<?php 
        //   $featured_blogs = get_fields('careers_posts_display');
        //     if($featured_blogs):
        //       foreach($featured_blogs as $post): 
            ?>
