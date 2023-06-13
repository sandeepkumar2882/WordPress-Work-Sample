<?php

    $bannerTitle = get_field('banner_heading');
    $bannerContent = get_field('banner_content');
    $bannerBackgroundImage = get_field('banner_background_image');
    $bannerWatchVideo = get_field('banner_watch_video');
    ?>

    <section class="banner">
    <?php
      $banner_background_image = get_field('banner_background_image');
    ?>
      <img class="bannerImage o-cover w-100 h-100 lozad" src="<?php echo $bannerBackgroundImage['url']; ?>" alt="bannerImage">
      <div class="container">
        <div class="bannerContent ">
          <h1 class="banner-title text-left text-red"><?php echo $bannerTitle; ?></h1>
          <h4 class="text-white banner-subtitle"><?php echo $bannerContent; ?> </h4>
          <a class="btn-primary m-0" role="button" href="#" data-toggle="modal" data-target="#exampleModalCenter"> <?php echo $bannerWatchVideo['title']; ?> <i class="far fa-play-circle"></i></a>
        </div>

      </div>
    </section>