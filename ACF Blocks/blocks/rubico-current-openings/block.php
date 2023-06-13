<?php
    $postType = get_field('select_current_openings');
?>
<section class="openings-section container text-center">
    <!-- <div class=""> -->
    <h2 class=" text-uppercase"><?php echo get_field('current_opening_heading'); ?></h2>
    <div class="openings-carousel">
        <?php $openings = new WP_Query(array(
                    'post_type' => $postType
                  )); ?>
        <?php while($openings->have_posts()): ?>
        <?php $openings->the_post(); ?>
        <div>
            <img class="w-100 " src="<?php echo get_the_post_thumbnail_url();?>" alt="designer-openings">
            <h4 class="text-red"><?php the_title(); ?></h4>
            <p class="text-gray-2 text-center"><?php the_excerpt();?>
            </p>
            <?php wp_reset_postdata(); ?>
            <div class="text-red  pb-1  mt-auto d-inline"><a href="<?php the_permalink(); ?>">READ MORE...</a></div>
        </div>
        <?php endwhile; ?>
    </div>
</section>