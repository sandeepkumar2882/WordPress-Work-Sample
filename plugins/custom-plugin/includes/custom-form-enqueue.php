<?php
//Enqueue Stylesheet , scripts and fonts 

function custom_form_enqueue_styles()
{
    wp_enqueue_style('dynamic-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap');
    wp_enqueue_style('bootstrap_css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css');
    wp_enqueue_script('jQuery-external', '//code.jquery.com/jquery-1.11.1.min.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'custom_form_enqueue_styles');