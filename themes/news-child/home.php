<link rel = "stylesheet" href = "<?php echo get_template_directory_uri().'/style.css' ?>" >

<div class="wrapper">
<?php get_header(); ?>
   
<div class="container">
<div class="left-area">
<?php
while(have_posts()) :
    the_post();
    ?>
     <div class="content"><?php ?> <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div><div class="image"><?php the_post_thumbnail(); ?><a href="<?php the_permalink(); ?>"></div> <?php  the_excerpt();?></a>
     <a href="<?php the_permalink(); ?>"> <input type="button" value = "Continue Reading..." class ="viewpost"></a>
     <br><br>
     <div class="date">Published on  <?php the_time( 'l, j/F, Y' ); ?> By  <?php the_author_posts_link(); ?>  <?php the_category();
            ?> </div>  <br><br>
    <?php    
endwhile;
?>
</div>
</div>
<div class="rightarea">
<?php
//  get_sidebar(); 
?>
</div>
<div class="footer">
    <?php get_footer(); ?>
</div>
</div>