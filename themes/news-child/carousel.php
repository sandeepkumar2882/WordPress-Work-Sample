<?php
/*
    Template Name: carousel
    */
?>




<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




<div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
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
            <div class="card">
                <div class="img-wrapper"><a href='<?php the_permalink(); ?>'> <?php the_post_thumbnail('medium');?></a> </div>
                <div class="card-body">
                    <h5 class="card-title"> <a href='<?php the_permalink(); ?>'><div class="carousel-caption d-none d-md-block">
      <h4 class="slidertitle"><?php the_title();?></h4></h5>
                    <p class="card-text"><div class="sliderexcerpt"><?php the_excerpt();?></div></a></div></p>
                    <a href="#" class="btn btn-primary">Read More...</a>
                </div>
            </div>
        </div>
        <?php $i++; endwhile; ?>
    </div>
</div>













<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Carousel cards title </h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

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
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" ><a href='<?php the_permalink(); ?>'> <?php the_post_thumbnail('medium');?></a>
                                        <div class="card-body">
                                            <h4 class="card-title"><a href='<?php the_permalink(); ?>'><div class="carousel-caption d-none d-md-block">
      <h4 class="slidertitle"><?php the_title();?></h4></h4>
                                            <p class="card-text"><div class="sliderexcerpt"><?php the_excerpt();?></p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; endwhile; ?>
        </div>
    </div>
</section>
