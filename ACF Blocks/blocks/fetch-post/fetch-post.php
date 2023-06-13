<?php  
$postType = get_field('post_list')['value'];
$category = get_field('category_list');
$catArray = explode('/', $category);
$categorySlug = $catArray[0];
$categoryId = $catArray[1];
$tag = get_field('tag_list');
$term = get_term($categoryId);
$taxonomy = $term->taxonomy;

    //Category Filteration
    if ($categorySlug !='choose-category') {
      $args = array(
        'post_type' => $postType,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        // 'tag' => $tag,
        'tax_query' => array(
          array(
            'taxonomy' => $taxonomy,
            'field' => 'slug',
            'terms' => $categorySlug,
          )
        ),
        'orderby' => 'date',
        'order' => 'ASC',
      );
    } else {
      //When nothing have to select, just show all posts
      $args = array(
        'post_type' => $postType,
        'posts_per_page' => -1,
        'order' => 'ASC',
      );
    }
    $blogs_query = new WP_Query($args);
?>
<!-- get all the content of the post like title, excerpt, thumbnail, permalink  -->
<?php if ($blogs_query->have_posts()) {
      while ($blogs_query->have_posts()) { $blogs_query->the_post(); ?>
<div class="col-lg-4 col-sm-6 mb-5">
    <div class="card card-shadow  h-100 ">
        <div class="card-body h-100 d-flex flex-column">
            <img class="w-100 lozad" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="software-engineer-openings">
            <h5 class="card-title text-gray-1"> <?php the_title(); ?></h5>
            <div class="card-text text-gray-2">
                <p><?php the_excerpt() ?></p>
                <a class=" text-red mt-auto" href="<?php echo get_the_permalink(); ?>">Continue Reading...</a>
                <div class="card-footer"><small class="text-danger">Published on <?php the_time( 'l, j/F, Y' ); ?> By
                        <?php the_author_posts_link(); ?></small><?php $blogs_category = get_the_terms( $post->ID , 'blogs_category' );
             foreach ( $blogs_category  as $blog ) {
                 echo '<li><a href="'.get_term_link($blog).'">'.$blog->name.'</a></li>';
             }
             ?></div>
            </div>
        </div>
    </div>
</div>
<?php } } else{
  echo '<div>No Post Found</div>';
};