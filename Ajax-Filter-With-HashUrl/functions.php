<?php
//This file have all the functionalites related to hooks that are using in this theme, Add custom post types, taxonomies, acf, other settings.

//Enqueue Stylesheet , scripts and fonts
function dynamic_theme_enqueue_styles()
{
    wp_enqueue_style('dynamic-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap');
    wp_enqueue_style('bootstrap_css', '//stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css');
    wp_enqueue_style('dynamic-style', get_template_directory_uri() . '/dist/css/app.css');
    wp_enqueue_style('enhabit-style', get_template_directory_uri() . '/inc/css/pagination.css');
    wp_enqueue_script('jQuery-external', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), false, true);
    wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js', array(), false, true);
    wp_enqueue_script('script-js', get_template_directory_uri() . '/dist/js/app.js', array('jQuery-external'), false, true);
}
add_action('wp_enqueue_scripts', 'dynamic_theme_enqueue_styles');


add_theme_support('post-thumbnails');
set_post_thumbnail_size(300, 300, false);

//Create Custom Post type for enhabit project as blogs

function create_blogs_post_type()
{
    register_post_type(
        'blogs',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('blogs'),
                'singular_name' => __('blogs')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'blogs'),
            'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
            'show_in_rest' => true,
            'taxonomies' => array('blogs', 'post_tag'),
        )
    );
} 
add_action('init', 'create_blogs_post_type');
/*Custom Post type end*/


//Register blogs taxonomy
add_action('init', 'create_blogs_taxonomy', 0);

function create_blogs_taxonomy()
{
    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI
    $labels = array(
        'name' => _x('blogs_category', 'taxonomy general name'),
        'singular_name' => _x('blogs_category', 'taxonomy singular name'),
        'search_items' =>  __('Search blogs_category'),
        'all_items' => __('All blogs_category'),
        'parent_item' => __('Parent blogs_category'),
        'parent_item_colon' => __('Parent blogs_category:'),
        'edit_item' => __('Edit blogs_category'),
        'update_item' => __('Update blogs_category'),
        'add_new_item' => __('Add New blogs_category'),
        'new_item_name' => __('New blogs_category Name'),
        'menu_name' => __('blogs_category'),
    );

    // Now register the taxonomy
    register_taxonomy('blogs_category', array('blogs'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'blogs_category'),
    ));
}

//hook into the init action and call create_book_taxonomies when it fires
 
add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it subjects for your posts
 
function create_subjects_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Subjects', 'taxonomy general name' ),
    'singular_name' => _x( 'Subject', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Subjects' ),
    'all_items' => __( 'All Subjects' ),
    'parent_item' => __( 'Parent Subject' ),
    'parent_item_colon' => __( 'Parent Subject:' ),
    'edit_item' => __( 'Edit Subject' ), 
    'update_item' => __( 'Update Subject' ),
    'add_new_item' => __( 'Add New Subject' ),
    'new_item_name' => __( 'New Subject Name' ),
    'menu_name' => __( 'Subjects' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('subjects',array('blogs'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'subject' ),
  ));
}

//Password Error Msg Change
function login_password_error()
{
    return 'Your username or password is incorrect!';
}
add_filter('login_errors', 'login_password_error');

//Remove Some of the header stuff 
function remove_header_info()
{
    remove_action('wp_head', 'rsd_link'); //remove really simple discovery link
    remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest.xml (needed to support windows live writer)
    remove_action('wp_head', 'wp_generator'); //remove wordpress version
    remove_action('wp_head', 'start_post_rel_link'); //remove random post link
    remove_action('wp_head', 'index_rel_link'); //remove link to index page
    remove_action('wp_head', 'adjacent_posts_rel_link'); //remove the next and previous post links
}
add_action('init', 'remove_header_info');

//Enable svg images upload
// Wp v4.7.1 and higher
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
		  	.attachment-266x266, .thumbnail img {
				   width: 100% !important;
			 	  height: auto !important;
		 	 }
		  	</style>';
}
add_action('admin_head', 'fix_svg');

/**
 * Populate the ACF field with terms from the custom taxonomy Article type.
 */
add_filter( 'acf/load_field', function( $field ) { 
    // Get all taxonomy terms
    $blogsTaxonomies = get_taxonomies();
    $unsetElement = ['nav_menu','link_category','post_format','wp_theme','wp_template_part_area'];
    foreach($unsetElement as $key){
        unset($blogsTaxonomies[$key]);
    }
    // Add each term to the choices array.
    // Example: $field['choices']['review'] = Review
    foreach ( $blogsTaxonomies as $taxonomies ) {
      $field['choices'][$taxonomies] = $taxonomies;
    }
    return $field;
  } );

  //ACF select field dynamic manipulation

  function load_post_type_choices( $field ) {
    $choices               = [];
    $post_types            = get_post_types([
       'public'  => true,
       'show_ui' => true,
    ]);
    $post_types_to_exclude = [ 'attachment', 'page', 'tag', 'taxonomy' ]; 
    foreach ( $post_types as $post_type => $slug ) {
       if ( ! in_array( $slug, $post_types_to_exclude, true ) ) {
          $choices[ $slug ] = ucfirst( $post_type );
       }
    } 
    $field['choices']       = $choices;
    $field['default_value'] = 'post'; 
    return $field;
 } 
 add_filter( 'acf/load_field/name=post_type','load_post_type_choices' );

//Register Option feature

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}
if (function_exists('acf_set_options_page_menu')) {
    acf_set_options_page_menu(__('Options Page'));
}

//filter scripts
require_once("load-more-filter-post/post-filter.php");
require_once("add-scripts/scripts.php");

//BLF Category Filter scripts
require_once("load-more-filter-post/blf-category-filter.php");
require_once("add-scripts/blf-filter-post-script.php");



//Register rest field for extended functionality or information from the api
function genesis_blocks_register_rest_fields() {
    /* Add landscape featured image source */
    register_rest_field(
        array( 'post', 'page' ),
        'featured_image_src',
        array(
            'get_callback'    => 'genesis_blocks_get_image_src_landscape',
            'update_callback' => null,
            'schema'          => null,
        )
    );

    /* Add square featured image source */
    register_rest_field(
        array( 'post', 'page' ),
        'featured_image_src_square',
        array(
            'get_callback'    => 'genesis_blocks_get_image_src_square',
            'update_callback' => null,
            'schema'          => null,
        )
    );

    /* Add author info */
    register_rest_field(
        'post',
        'author_info',
        array(
            'get_callback'    => 'genesis_blocks_get_author_info',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
add_action( 'rest_api_init', 'genesis_blocks_register_rest_fields' );



function genesis_blocks_get_author_info( $object, $field_name, $request ) {
    /* Get the author name */
    $author_data['display_name'] = get_the_author_meta( 'display_name', $object['author'] );

    /* Get the author link */
    $author_data['author_link'] = get_author_posts_url( $object['author'] );

    /* Return the author data */
    return $author_data;
}

function genesis_blocks_get_image_src_landscape( $object, $field_name, $request ) {
	$feat_img_array = wp_get_attachment_image_src(
		$object['featured_media'],
		'gb-block-post-grid-landscape',
		false
	);
	if ( is_array( $feat_img_array ) ) {
		return $feat_img_array[0];
	}
}

function genesis_blocks_get_image_src_square( $object, $field_name, $request ) {
	$feat_img_array = wp_get_attachment_image_src(
		$object['featured_media'],
		'gb-block-post-grid-square',
		false
	);
	if ( is_array( $feat_img_array ) ) {
		return $feat_img_array[0];
	}
}
