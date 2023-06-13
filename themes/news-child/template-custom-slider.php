<?php
/*
    Template Name: custom slider
*/
?>

<div class="contactwrapper">

<div class="contactheader">
<?php get_header(); ?>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<div class="contactcontainer">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
 <?php $the_query = new WP_Query(array(
       'post_type' => 'news',
    // 'category_name' => 'sports', 
    'posts_per_page' => 6,
    )); 
    $i=0;
   while ( $the_query->have_posts() ) : 
   $the_query->the_post();
  ?>
  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i?>" class="<?php echo $i==0?'active':'';?>" aria-current="true" aria-label="Slide <?php echo $i?>"></button>
  <?php 
    $i++;
   endwhile; 
   wp_reset_postdata();
  ?>
 
  </div> 
  <div class="carousel-inner">
  <?php 
   $the_query = new WP_Query(array(
       'post_type' => 'news',
    // 'category_name' => 'sports', 
    'posts_per_page' => 6,
    // 'offset' => 1
    )); 
    $i=0;
   while ( $the_query->have_posts() ) : 
   $the_query->the_post();
  ?>
    <div class="carousel-item <?php echo $i==0?'active':'';?>">
   <div> <a href='<?php the_permalink(); ?>'> <?php the_post_thumbnail('medium');?></a></div>
    <div> <a href='<?php the_permalink(); ?>'><div class="carousel-caption d-none d-md-block">
      <h4 class="slidertitle"><?php the_title();?></h4>
     <div class="sliderexcerpt"><?php the_excerpt();?></div></a></div>
      </div>
    </div>
    <?php 
    $i++;
    ?>
<!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->

<?php
  endwhile; 
    wp_reset_postdata();
  ?>
</div>
</div>

</div>
<div class="contactfooter">
<?php 
get_footer(); 
?>
</div>








<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 
	  
      <div class="container cta-100 ">
        <div class="container">
          <div class="row blog">
            <div class="col-md-12">
              <div id="blogCarousel" class="carousel slide container-blog" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#blogCarousel" data-slide-to="1"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                <?php 
   $the_query = new WP_Query(array(
       'post_type' => 'news',
    // 'category_name' => 'sports', 
    'posts_per_page' => 1,
    // 'offset' => 1
    )); 
    $j=0;
   while ( $the_query->have_posts() ) : 
   $the_query->the_post();
  ?>
                  <div class="carousel-item <?php echo $j==0?'active':'';?>">
                    <div class="row">
                      <div class="col-md-4" >
                        <div class="item-box-blog">
                          <div class="item-box-blog-image">
                            <!--Date-->
                            <div class="item-box-blog-date bg-blue-ui white"> <span class="mon"><?php the_date(); ?></span> </div>
                            <!--Image-->
                        <div> <a href='<?php the_permalink(); ?>'> <?php the_post_thumbnail('medium');?></a></div>
                          </div>
                          <div class="item-box-blog-body">
                            <!--Heading-->
                            <div class="item-box-blog-heading">
                            <div> <a href='<?php the_permalink(); ?>'><div class="carousel-caption d-none d-md-block">
                        <h4> <?php the_title();?> </h4>
                            </div>
                            <!--Text-->
                            <div class="item-box-blog-text">
                            <?php the_excerpt();?></a></div>
                            </div>
                            <!--Text-->
                            <div class="mt"> <a href="#" tabindex="0" class="btn bg-blue-ui white read">read more</a> </div>
                            <!--Read More Button-->
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--.row-->
                  </div>
                  <!--.item-->
                  <?php $j++; endwhile;?>
                </div>
                
                <!--.carousel-inner-->
              </div>
              <!--.Carousel-->
            </div>
          </div>
        </div>
      </div>
   
