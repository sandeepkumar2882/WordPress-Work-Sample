<?php
//this function is called with ajax call, this function fetch the content with the values that is recieved by ajax
function load_filtered_posts()
{
  //Display posts per page according to device
  $deviceCheck = strtolower($_SERVER["HTTP_USER_AGENT"]);
  // (A) MOBILE DEVICE CHECK
  $isMobile = is_numeric(strpos($deviceCheck, "mobile"));
  // (B) TABLET CHECK
  $isTablet = is_numeric(strpos($deviceCheck, "tablet"));
  // (C) MANY OTHERS...
  $isAndroid = is_numeric(strpos($deviceCheck, "android"));
  $isIPhone = is_numeric(strpos($deviceCheck, "iphone"));
  $isIPad = is_numeric(strpos($deviceCheck, "ipad"));
  $isIOS = $isIPhone || $isIPad;
  // (D) DESKTOP?
  $isDesktop = !$isMobile && !$isTablet && !$isAndroid && !$isIPhone && !$isIPad;
  //Check conditions for display the number of posts according to device
  if ($isMobile && !$isTablet && !$isIOS) {
    $postsPerPage = 3;
  } else if ($isDesktop) {
    $postsPerPage = 6;
  } else if ($isIPad && !$isIPhone) {
    $postsPerPage = 4;
  } else if ($isIPhone) {
    $postsPerPage = 2;
  } else {
    $postsPerPage = 4;
  }
  //Check conditions end here

  //Check post type here
  $postTypeCheck = get_field('post_type', 'option');

  //Check Taxonomy Type Here
  $taxonomyCheck1 = get_field('first_field', 'option');
  $taxonomyCheck2 = get_field('second_field', 'option');
  if ($taxonomyCheck1 != 'post_tag') {
    $taxonomyCheck = $taxonomyCheck1;
  }
  if ($taxonomyCheck2 != 'post_tag') {
    $taxonomyCheck = $taxonomyCheck2;
  }

  //Category Filteration and Category With Tag Filter
  $cat_slug = $_POST['cat_slug'];
  $pageId = $_POST['pageId'];
  $tag_slug = $_POST['tag_slug'];
  if ($cat_slug || $tag_slug || $pageId) {
    //Category Filteration
    if ($cat_slug) {
      $args = array(
        'post_status' => 'publish',
        'posts_per_page' => $postsPerPage,
        'tag' => $tag_slug,
        'tax_query' => array(
          array(
            'taxonomy' => $taxonomyCheck,
            'field' => 'slug',
            'terms' => $cat_slug,
          )
        ),
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => $pageId
      );
    } else if ($tag_slug) {
      //Tag Filteration
      $args = array(
        'post_type' => $postTypeCheck,
        'post_status' => 'publish',
        'posts_per_page' => $postsPerPage,
        'tag' => $tag_slug,
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => $pageId
      );
    } else {
      //When nothing have to select, just show all posts
      $args = array(
        'post_type' => $postTypeCheck,
        'posts_per_page' => $postsPerPage,
        'order' => 'ASC',
        'paged' => $pageId
      );
    }
    $blogs_query = new WP_Query($args);
?>
    <!-- get all the content of the post like title, excerpt, thumbnail, permalink  -->
    <?php if ($blogs_query->have_posts()) {
      $checkPost = true;
      while ($blogs_query->have_posts()) : $blogs_query->the_post(); ?>
        <div class="col-lg-4 col-sm-6 mb-5">
          <div class="card card-shadow  h-100 ">
            <div class="card-body h-100 d-flex flex-column">
              <img class="w-100 lozad" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="software-engineer-openings">
              <h5 class="card-title text-gray-1"> <?php the_title(); ?></h5>
              <div class="card-text text-gray-2">
                <p><?php the_excerpt() ?></p>
                <a class=" text-red mt-auto" href="<?php echo get_the_permalink(); ?>">Apply Now</a>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile;
    } else { ?><div class="category-not-found"><?php echo "Landing Not Found"; $checkPost = false; ?></div> <?php } ?>
    <!-- Pagination For Filter -->
    <?php if ($checkPost == true) { ?>
      <!-- $checkPost is using for check "landing not found" condition, if any category or tag or post type does not have any post then display a msg -->
      <div class="pagination-style">
        <?php
        $totalPages = $blogs_query->max_num_pages;
        if ($totalPages > 1) {
          if ($pageId != 1) { ?>
            <a href="" class="pagination" page-id="prev">Prev<< </a> <!-- Previous Page -->
              <?php
            }
            if($pageId - 2 > 0 ): ?>
              <span>...</span>
              <?php endif;
            for ($i = 1; $i <= $totalPages; $i++) {
              ?>
              <?php if($i == $pageId || $i== $pageId + 1 || $i == $pageId - 1): ?>
                <a class="pagination" href="" page-id="<?php echo $i ?>">
                  <?php if ($i <= 3) {
                    echo $i . " ";
                  } ?>
                </a>
                <?php endif;
            }
            if($pageId + 2 < $totalPages + 1 ): ?>
              <span>...</span>
              <?php endif; ?>
              <span><?php echo $totalPages; ?></span>
              <?php
            if ($pageId != $totalPages) { ?>
                <a href="" class="pagination" page-id="next">Next>></a> <!-- Next Page -->
              <?php }
              ?>
              <input type="text" class="search-text" id="search-text" placeholder="Enter Page No">
              <button id="find-page" calss="find-page" total-page="<?php echo $totalPages ?>">Search</button> <!-- Search Page -->
      </div>
      <!-- Pagination For Filter End -->
<?php }
      }
      wp_reset_postdata();
      die;
    }
  }
  add_action('wp_ajax_load_filtered_posts', 'load_filtered_posts');
  add_action('wp_ajax_nopriv_load_filtered_posts', 'load_filtered_posts');
?>