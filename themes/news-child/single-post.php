<link rel = "stylesheet" href = "<?php echo get_template_directory_uri().'/style.css' ?>" >
<?php
 get_header();
 ?>
<div class="container">
    <div class="left-area">
<?php

while(have_posts()) :
    the_post();
    ?>
     <div class="content"><div class="title"><?php the_title();?></div><?php echo get_the_content();?>
     <br><br>
     <div class="date">Published on  <?php the_time( 'l, j/F, Y' ); ?> By  <?php the_author_posts_link(); ?>  <?php the_category();
            ?> </div>  
     
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
<!-- <div class="footer"> -->
    <?php
        get_footer();
    ?>
<!-- </div> -->