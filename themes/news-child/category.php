<link rel = "stylesheet" href = "<?php echo get_template_directory_uri().'/style.css' ?>" >
<div class="wrapper">
<?php get_header(); ?>
<body>
    <div class="wrapper">
<div class="container">
<div class="left-area">

<?php

while(have_posts()) :
    the_post();
    ?>
    <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
    	
        <?php ?>
     <div class="content"> <div class="image"><?php the_post_thumbnail(); ?></div><a href="<?php the_permalink(); ?>"> <?php  the_excerpt();?></a>
     <a href="<?php the_permalink(); ?>"> <input type="button" value = "Continue Reading..." class ="viewpost"></a>
     <br><br>
     <div class="date">Published on  <?php the_time( 'l, j/F, Y' ); ?> By  <?php the_author_posts_link(); ?>  <?php the_category();
            ?> </div>   
    </div>
    <?php
     
endwhile;
?>
<div class="footer">
    <?php get_footer(); ?>
</div>
</div>
<body>
</div>