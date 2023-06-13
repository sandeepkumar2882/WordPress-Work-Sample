<?php
/*
* Enqueue scripts.js if file scripts.js exists
*/

function load_filtered(){
wp_enqueue_script('filter-js', get_template_directory_uri() . '/inc/js/dropdown.js', array('jQuery-external'),1.0, true);
wp_localize_script('filter-js', 'filter_object',
    array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'action' => 'load_filtered_posts'
    )
);
}
add_action('wp_enqueue_scripts', 'load_filtered');