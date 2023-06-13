<?php
/*
Template Name: enhabit-filter
Author: Rubico IT
Description: This Template Shows Resource Article With Category And Tag Filter & Without Filter Also, two dropdowns here for select category and tag
*/
get_header(); ?>
<!-- main begins -->
<main>
  <?php
  $postTypeCheck = get_field('post_type', 'option');
  $selectField1 = get_field('first_field', 'option');
  $selectField2 = get_field('second_field', 'option');
  ?>
  <!-- open Filteration section -->
  <section class="careers-section bg-light">
    <!-- First Dropdown filter Start  -->
    <div class="d-lg-flex categories-taxonomy">
      <button type="button" class="btn d-block location-btn px-3 card-filter">
        <img src="<?php echo $career_select_location_image['url']; ?>" alt="<?php echo $career_select_location_image['alt']; ?>" class="w-100 mr-3">Select Category
      </button>
      <?php if ($categories = get_terms(
        array(
          'taxonomy' => $selectField1,
          'orderby'  => 'name',
          'hide_empty' => false,
        )
      )) :
      ?>
        <div class="dropdown my-3 my-lg-0 location-dropdown card-filter">
          <button class="btn selected-location black-border search-field d-flex text-left w-100 btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span id="selectPosition">Select Position</span>
          </button>
          <div class="dropdown-menu w-100 ml-0 location" aria-labelledby="dropdownMenuButton">
            <?php foreach ($categories as $cat) : ?>
              <?php if ($selectField1 != 'post_tag') : ?>
                <span class="dropdown-item" id="<?php echo $cat->term_id; ?>" name="<?php echo $cat->slug; ?>"><?php echo $cat->name ?></span>
              <?php else : ?>
                <span class="select-topic" href="" id="select-topic" name="<?php echo $cat->slug; ?>"><?php echo $cat->name ?></span>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <!-- First Dropdown filter End Here  -->

    <!-- Second Dropdown filter Start -->
    <div class="container">
      <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" id="select-topic" type="button" data-toggle="dropdown">Select Topic
          <span class="caret"></span></button>
        <?php if ($tags = get_tags(
          array(
            'taxonomy' => $selectField2,
            'orderby'  => 'name',
            'hide_empty' => false
          )
        )) : ?>
          <ul class="dropdown-menu">
            <?php foreach ($tags as $tag) : ?>
              <?php if ($selectField2 == 'post_tag') : ?>
                <li><a class="select-topic" href="" id="select-topic" name="<?php echo $tag->slug; ?>"><?php echo $tag->name ?></a></li>
              <?php else : ?>
                <li><a class="dropdown-item" id="<?php echo $tag->term_id; ?>" name="<?php echo $tag->slug; ?>"><?php echo $tag->name ?></a></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
    <!-- Second Dropdown Filter End Here  -->

    <!-- Reset Button  -->
    <button class="clear">Clear Filter</button>
    <!-- Reset Button End -->

    <!-- Data displays in this div after every ajax call -->
    <div class="row py-5 ajax-results">
      <!-- ajax-results class is using in dropdown.js file for "$(".ajax-results").html(response)" this statement inside success-->
    </div>
  </section>
  <!-- Filteration section end -->
</main>
<!-- main end -->
<?php get_footer(); ?>