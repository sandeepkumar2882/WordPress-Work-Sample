<?php
/*
  Plugin Name: custom form
  Plugin URI: https://www.rubicotech.in
  Description: Updates user rating based on number of posts.
  Version: 1.0
  Author: Sandeep Kumar
  Author URI: http://www.rubicotech.in
 */

//Code for activation and deactivation of plugin

//include activation and deactivation hook here for table creation in database
register_activation_hook(__FILE__,'custom_form_activate');
register_deactivation_hook(__FILE__,'custom_form_deactivate');

//When it will activate, a table in database will be created automatically 
function custom_form_activate(){

    global $wpdb; 
    $db_table_name = $wpdb->prefix . 'custom_form';  // table name
    $charset_collate = $wpdb->get_charset_collate();
  
   //Check to see if the table exists already, if not, then create it
  if($wpdb->get_var( "show tables like '$db_table_name'" ) != $db_table_name ) 
   {
         $sql = "CREATE TABLE $db_table_name (
                  id int(11) NOT NULL auto_increment,
                  name varchar(15) NOT NULL,
                  phone int(10) NOT NULL,
                  experience varchar(200) NOT NULL,
                  email varchar(50) NOT NULL,
                  current_salary varchar(100) NOT NULL,
                  referred_by varchar(100) NOT NULL,
                  expected_salary varchar(100) NOT NULL,
                  hometown varchar(100) NOT NULL,
                  attach_resume varchar(100) NOT NULL,
                  UNIQUE KEY id (id)
          ) $charset_collate;";
  
     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
     dbDelta( $sql );
    //  add_option( 'test_db_version', $test_db_version );
   }
  } 

//When it will deactivate, automatic generated table by this plugin will be droped automatically from the database
function custom_form_deactivate(){

    global $wpdb;
     $table_name = $wpdb->prefix . 'custom_form';
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);
    //  delete_option("my_plugin_db_version");   
}
   
//custom plugin settings here include from custom plugin settings
include_once('admin-settings/custom-plugin-settings.php');

//custom plugin settings for print anything on dashboard
function custom_form_menu_callback(){
    include_once('admin-settings/custom-form-menu.php');
}

//custom plugin settings for fetching data from database table and show all data on dashboard in tabular form
function custom_form_submenu_callback(){
	include_once('admin-settings/show-all-data.php');
}

//custom-reg-plugin shortcode generation code will be include here from custom plugin shortcode
include_once('includes/custom-plugin-shortcode.php');
?>

