<?php
/**
 * All Block Layout Registration
 * Created By: RubicoTech (Nick Nripendra)
 * @Package SBX Genesis Collection
 */

//Pressroom Post List Section
genesis_blocks_register_layout_component(
    [
        'type' => 'section',
        'key' => 'genesis_pressroom_post_list',
        'name' => 'Pressroom Post List',
        'content' => require_once WP_PLUGIN_DIR . '/genesis-customization/sections/pressroom-post-list.php',
        'category' => [
            'Pressroom Genesis Block',
        ],
        'keywords' => [
            'pressroom',
            'post',
            'category',
            'category posts',
            'all posts',
            'post list',
            'pressroom post list',
        ],
        'image' => CUSTOM_GENESIS_PLUGIN_URL . 'assets/enhabit-paginated-post-list.png',
        'collection' => [
            'slug' => 'genesis-customization',
            'label' => 'Genesis Customization',
        ],
    ]
);