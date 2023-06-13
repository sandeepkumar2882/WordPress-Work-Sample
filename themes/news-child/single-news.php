<link rel = "stylesheet" href = "<?php echo get_template_directory_uri().'taskstyle.css' ?>" >

<?php
 get_header();
 ?>
<div class="container">
    <div class="left-area">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-xl-1 g-4 " >
<?php
while(have_posts()) :
    the_post();
    ?>
 <div class="col gx-4 gx-sm-4 " >
<div class="card-columns">
  <div class="card">
    <div class="card-img-top">
</div>
    <div class="card-body">
      <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
      <p class="card-text"><a href="<?php the_permalink(); ?>"><?php  the_content();?></a></p>
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
</div>    
<div class="comments">
    <?php 
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    ?></div>
    <?php
endwhile;
?>
</div>
<?php
    // get_sidebar();
?>
</div>
    <?php
        get_footer();
    ?>