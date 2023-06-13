<?php

    $technologySectionHeading = get_field('technologies_section_heading');

?>
<section class="technologies bg-light">
    <div class="container text-center">
        <h2 class=" text-uppercase"> <?php echo $technologySectionHeading; ?> </h2>
        <div class="row">
            <?php if(have_rows('technologies_repeater')): ?>
            <?php while(have_rows('technologies_repeater')): ?>
            <?php the_row(); ?>
            <div class="col-sm-6 col-lg-4 mb-5">
                <div class="card card-shadow h-100">
                    <div class="card-body h-100 d-flex flex-column">
                        <h5 class="card-title"><?php the_sub_field('technology_name'); ?></h5>
                        <div>
                            <p class=" text-gray-2 "><?php the_sub_field('technology_description'); ?></p>
                        </div>
                        <?php $link = get_sub_field('technology_know_more');?>
                        <p class="text-red mt-auto"><a href="<?php $link['url']; ?>"
                                class="h-100"><?php echo $link['title']; ?> </a></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
</section>