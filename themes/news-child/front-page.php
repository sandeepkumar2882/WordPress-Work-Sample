
<div class="wrapper">
<?php get_header(); ?>
<body>
    
<div class="container">
<div class="myslider"><h3 class="slider-heading">Latest Five Posts</h3><?php 
   echo do_shortcode('[psac_post_slider post_type="news" limit="5" design="design-2" show_author="false" show_category="false" show_date="false" show_content="false" show_title="false"]');
   ?>
   </div>
 
   <div class="mycarousel">
   <?php
   echo do_shortcode('[psac_post_carousel post_type="news" limit="5" order="ASC" slide_show="5" autoplay="true" autoplay_interval="1000" speed="800"]]'); 

  // limit="5" order="ASC"

?>

</div>
    <?php
    // wp_list_categories();
while(have_posts()) :
    the_post();
    ?>
<div class="news-category"><?php $terms = get_terms( 'news_category', 'news' );
            foreach($terms as $term){
                echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
            }
            ?>
    </div>
    <?php endwhile; ?>

    <div class="tags"><?php wp_tag_cloud(); ?></div>
    
<div class="footer">
    <?php 
    get_footer(); 
    ?>
</div>
<body>
</div>