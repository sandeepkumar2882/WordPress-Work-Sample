<?php

/**
 * Plugin Name: Gutenberg Custom Blocks
 * Plugin URI: http://wordpress.org/plugins/custom-blocks/
 * Description: Demo plugin to register custom gutenberg blocks with react
 * Author: Rubico IT
 * Version: 1.0.0
 * Author URI: https://rubicotech.in
 * text-domain: gutenberg-custom-blocks
 *
 * @package gutenberg-custom-blocks
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

defined('ABSPATH') || exit;
define('GCB_BLOCKS_PATH', untrailingslashit(plugin_dir_path(__FILE__)));
define('GCB_BLOCKS_URL', untrailingslashit(plugin_dir_url(__FILE__)));

//register pattern categories
register_block_pattern_category('dynamic-patterns', array(
    'label' => __('Dynamic Patterns', 'rich-block')
));
register_block_pattern_category('card-patterns', array(
    'label' => __('Card Patterns', 'rich-block')
));

//require pattern files
require_once('patterns/dynamic-data/dynamic-data.php');
require_once('patterns/card-pattern/card-pattern.php');

function create_block_rich_block_block_init()
{
    register_block_type(__DIR__ . '/build/rich-block');
    register_block_type(__DIR__ . '/build/rich-module');
    register_block_type(__DIR__ . '/build/rich-filter');
    register_block_type(__DIR__ . '/build/rich-fetch-post', array('render_callback' => 'renderPostsUsingBlock'));
    register_block_type(__DIR__ . '/build/rich-media-upload');
    register_block_type(__DIR__ . '/build/rich-card-block');
    register_block_type(__DIR__ . '/build/rich-category-post', array('render_callback' => 'render_block_category_posts'));
    register_block_type(__DIR__ . '/build/rich-color-picker');
    // include(plugin_dir_path(__FILE__). 'src/rich-fetch-post/fetch-post.php');
}

add_action('init', 'create_block_rich_block_block_init');

//block locking and unlocking using filter
// add_filter('block_editor_settings_all', function($settings, $context){

// 	if($context->post->post_type === 'page'){
// 		$settings['canLockBlocks'] = true;
// 	}
// 	return $settings;
// },10,2);

add_filter(
    'block_editor_settings_all',
    function ($settings, $context) {
        // Allow for the Editor role and above - https://wordpress.org/support/article/roles-and-capabilities/.
        $settings['canLockBlocks'] = current_user_can('delete_others_posts');

        // Only enable for specific user(s).
        $user = wp_get_current_user();
        if (in_array($user->user_email, ['rich.sandeep@rubicotech.in'], true)) {
            $settings['canLockBlocks'] = false;
        }

        // Disable for posts/pages.
        if ($context->post && $context->post->post_type === 'page') {
            $settings['canLockBlocks'] = false;
        }

        return $settings;
    },
    10,
    2
);

//render callback function for rich fetch post
function renderPostsUsingBlock()
{
    $allPosts = wp_get_recent_posts([
        'numberposts' => 3,
        'post_status' => 'publish'
    ]);

    if (empty($allPosts)) {
        return '<p>No Posts</p>';
    }

    $displayPosts = '<div class="fetch-latest-posts">';
    foreach ($allPosts as $post) {
        $postId = $post['ID'];
        $allPosts .= '<div class="post-title">
		<h2>
		<a href="' . get_permalink($postId) . '">' . get_the_title($postId) . '<a/>
		</h2>
		</div>';
    }
    $displayPosts .= '</div>';
    return $displayPosts;
}

//render rich category post block
function render_block_category_posts($attributes)
{
    $args = array('posts_per_page' => 10, 'offset' => 0, 'category' => $attributes['selectedCategory']);

    $allPosts = get_posts($args);
    $count    = 1;
    $cards    = '';
    foreach ($allPosts as $recentPost) :
        $cards .= '<div class="components-item-group">
			<div class="post-list" data-aos="fade-up">

				<div class="post-content" data-aos="fade-up">
					<h3><a href="' . get_permalink($recentPost->ID) . '">' . get_the_title($recentPost->ID) . '</a></h3>
					<p>' . $recentPost->post_excerpt . '</p>
					<a href="' . get_permalink($recentPost->ID) . '" class="view-case-btn">' . __("Read More") . ' <span class="icon-right-arrow"></span></a>
				</div>
			</div>
		</div>';

        $count = $count + 1;
    endforeach;
    wp_reset_postdata();

    return $cards;
}
