<?php
/* 
  Pressroom Post List block for display data on front-end
  Created By: Sandeep Kumar
*/

$backgroundColor = block_value('background-color');
$heading = (!empty(block_value('title'))) ? block_value('title'): block_field_config('title')['settings']['default'];
$content = (!empty(block_value('content'))) ? block_value('content'): block_field_config('content')['settings']['default'];
$postsPerPage = block_value('posts-per-page');
$category = (block_value('select-post-category'))? block_value('select-post-category'): '';
$orderByField = (block_value('order-by'));
$current = (get_query_var('paged')) ? get_query_var('paged') : 1; // get the current page

//check condition for orderby attribute in array for fetching the posts according to given value in orderby
if ($orderByField === 'title') :
    $orderBy = 'title';
    $order = 'ASC';
else :
    $orderBy = 'post_date';
    $order = $orderByField;
endif;

    //array for wp query
    $args = array(
        'post_type'         => 'post',
        'cat'               => $category,
        'posts_per_page'    => $postsPerPage,
        'orderby'           => $orderBy,
        'order'             => $order,
        'paged'             => $current,
    );
?>

<div class="module_paginated-list body-l alignfull <?php echo $backgroundColor;?>">
        <div class="grid-wrap">
            <div class="block_head-center text-center">
                    <h3><?php echo $heading; ?></h3>
                    <p><?php echo $content ?></p>
            </div>
        </div>
    <div class="grid-wrap">
        <?php
        $postArray = new WP_Query($args); //Query loop for getting the post
        if ($postArray->have_posts()) :
            while ($postArray->have_posts()) :
                $postArray->the_post();
                ?>
                <div class="post-list" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-title">
                        <span class="post-date"><?php echo get_the_date('m.d.Y') ?></span>
                        <a class="title-in link-primary" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                    <div class="post-content body-m">
                        <?php the_excerpt(); ?>
                        <a class="btn-more" href="<?php the_permalink(); ?>"><img
                                    src="<?php echo SBX_GENESIS_PLUGIN_URL ?>/images/arrow-right-purple.png"
                                    alt="Read More"></a>
                    </div>
                </div>
            <?php
            endwhile;
        endif;
        $totalPages = $postArray->max_num_pages;
        // Pagination display only when totalPages count is more than 1
        if ($totalPages > 1) : 
            // structure of "format" depends on whether we're using pretty permalinks
            $format = empty(get_option('permalink_structure')) ? '&page=%#%' : 'page/%#%/';
            echo '<div class="list-pagination">' . paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => $format,
                        'current' => $current,
                        'total' => $totalPages,
                        'mid_size' => 4,
                        'type' => 'plain',
                        'prev_text' => __('&laquo;'),
                        'next_text' => __('&raquo;'),
                    )
                ) . '</div>';
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>






