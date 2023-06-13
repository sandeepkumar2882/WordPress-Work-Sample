<?php

    /*
        Plugin Name: Custom Rest Api
        Description: It's a custom rest api just for learning purpose.
        Version: 1.0
        Author: Sandeep Kumar
    */ 

?>

<?php

function custom_rest_api(){
    $args = [

        'numberposts' => 10,
        'post_type' => 'post',
        'order' => 'asc'
    ];

    $posts = get_posts($args);
    $data = [];
    $i = 0;

    foreach($posts as $post) {
		$data[$i]['id'] = $post->ID;
		$data[$i]['title'] = $post->post_title;
		$data[$i]['content'] = $post->post_content;
		$data[$i]['slug'] = $post->post_name;
		$data[$i]['featured_image']['thumbnail'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
		$data[$i]['featured_image']['medium'] = get_the_post_thumbnail_url($post->ID, 'medium');
		$data[$i]['featured_image']['large'] = get_the_post_thumbnail_url($post->ID, 'large');
		$i++;
	}
	return $data;
}

function custom_rest_api_slug( $slug ) {
	$args = [
		'name' => $slug['slug'],
		'post_type' => 'positions'
	];

	$post = get_posts($args);


	$data['id'] = $post[0]->ID;
	$data['title'] = $post[0]->post_title;
	$data['content'] = $post[0]->post_content;
	$data['slug'] = $post[0]->post_name;
	$data['featured_image']['thumbnail'] = get_the_post_thumbnail_url($post[0]->ID, 'thumbnail');
	$data['featured_image']['medium'] = get_the_post_thumbnail_url($post[0]->ID, 'medium');
	$data['featured_image']['large'] = get_the_post_thumbnail_url($post[0]->ID, 'large');

	return $data;
}

add_action('rest_api_init', function(){
    register_rest_route('custom/v1','posts',[
        'methods' => 'GET',
        'callback' => 'custom_rest_api'
    ]);
    register_rest_route( 'custom/v2', 'posts/(?P<slug>[a-zA-Z0-9-]+)', array(
		'methods' => 'GET',
		'callback' => 'custom_rest_api_slug',
    ) );
});
