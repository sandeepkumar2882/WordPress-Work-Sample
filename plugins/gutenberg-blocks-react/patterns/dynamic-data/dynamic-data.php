<?php

    require_once('content.php');

    register_block_pattern('rich-block/dynamic-data', array(
        'title' => __('Dynamic Data Pattern', 'rich-block'),
        'content' => dynamicDataPatternContent(),
        'description' => __('This pattern is for get dynamic posts and details using created blocks', 'rich-block'),
        'viewportWidth' => 800,
        'categories' => array('dynamic-patterns'),
        'blockTypes' => array('core/post-content'),
        'keywords' => array('posts', 'posts pattern', 'dynamic data', 'get posts pattern', 'rich-dynamic-data')
    ))

?>