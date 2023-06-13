<?php

    require_once('content.php');

    register_block_pattern('rich-block/card-pattern', array(
        'title' => __('Card Pattern', 'rich-block'),
        'content' => cardPatternContent(),
        'description' => __('This pattern is for card block pattern', 'rich-block'),
        'viewportWidth' => 800,
        'categories' => array('card-patterns'),
        'blockTypes' => array('core/post-content'),
        'keywords' => array('card', 'card pattern', 'card block pattern', 'cards', 'rich-card-pattern')
    ))

?>