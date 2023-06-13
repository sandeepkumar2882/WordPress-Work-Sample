
<div class="wrapper">
<?php get_header(); ?>
<body>
   
<div class="container">
<div class="left-area">


<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 g-4 " >
<?php
while(have_posts()) :
    the_post();
    ?>
 <div class="col gx-4 gx-sm-4 " >
<div class="card-columns">
  <div class="card">
    <div class="card-img-top"><?php the_post_thumbnail('medium');?>  
</div>
    <div class="card-body">
      <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
      <p class="card-text"><a href="<?php the_permalink(); ?>"><?php  the_excerpt();?></a></p>
    </div>
    <div class="date">Published on  <?php the_time( 'l, j/F, Y' ); ?> By  <?php the_author_posts_link(); ?> <?php $terms = get_the_terms( $post->ID , 'news_category' );
             foreach ( $terms as $term ) {
                 echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
             }
             ?> </div> 
  </div>
  <br><br>   
  </div>
            </div>
             <?php
endwhile;
?>
</div>
    <?php 
        // get_sidebar();
    ?>
</div>
<div class="footer">
    <?php 
    get_footer(); 
    ?>
</div>
</body>