<?php

set_post_thumbnail_size( 300, 300, false );


//Create Custom Post type

add_action('init', 'news_custom_post_type');

function news_custom_post_type() {

$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);

$labels = array(
'name' => _x('news', 'plural'),
'singular_name' => _x('news', 'singular'),
'menu_name' => _x('news', 'admin menu'),
'name_admin_bar' => _x('news', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New news'),
'new_item' => __('New news'),
'edit_item' => __('Edit news'),
'view_item' => __('View news'),
'all_items' => __('All news'),
'search_items' => __('Search news'),
'not_found' => __('No news found.'),
);

$args = array(
'supports' => $supports,
'labels' => $labels,
'description' => 'Holds our news and specific data',
'public' => true,
'taxonomies' => array( 'category', 'post_tag' ),
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'show_in_admin_bar' => true,
'can_export' => true,
'capability_type' => 'post',
'show_in_rest' => true,
'query_var' => true,
'rewrite' => array('slug' => 'news', 'with_front' => false),
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 6,
'menu_icon' => 'dashicons-smiley',
);

register_post_type('news', $args); // Register Post type
}



//Register news taxonomy

//hook into the init action and call create_book_taxonomies when it fires
 
add_action( 'init', 'create_news_taxonomy', 0 );
 
//create a custom taxonomy name it sports_category for your posts
 
function create_news_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'news_category', 'taxonomy general name' ),
    'singular_name' => _x( 'news_category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search news_category' ),
    'all_items' => __( 'All news_category' ),
    'parent_item' => __( 'Parent news_category' ),
    'parent_item_colon' => __( 'Parent news_category:' ),
    'edit_item' => __( 'Edit news_category' ), 
    'update_item' => __( 'Update news_category' ),
    'add_new_item' => __( 'Add New news_category' ),
    'new_item_name' => __( 'New news_category Name' ),
    'menu_name' => __( 'news_category' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('news_category',array('news'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'news_category' ),
  ));
 
}



// CODE FOR NEXT & PREV BUTTONS

function buttons(){
  ?>
  <div class="arrowNav hide-on-mobile">
    <div class="arrowLeft">
      <?php previous_post_link('%link', '<i class="fas fa-chevron-circle-left" aria-hidden="true"></i>', FALSE); ?>
    </div>
    <div class="arrowRight">
      <?php next_post_link('%link', '<i class="fas fa-chevron-circle-right" aria-hidden="true"></i>', FALSE); ?>
    </div>
  </div>
  <?php
  }
  add_action('wp_head', 'buttons');



//Code for tag of custom taxonomies

function custom_tag( $query ) {
  if (!is_admin() && $query->is_main_query()){
    // alter the query for the archive and category pages
    if( is_category() || is_archive() ){
            $query->set('post_type', array('news', 'post') );
            $query->set('post_status', 'publish');
            $query->set('orderby', 'date');
    }
  }
}
add_action( 'pre_get_posts', 'custom_tag' );

  ?>