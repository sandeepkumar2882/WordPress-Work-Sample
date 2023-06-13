<?php

    $branchesSectionHeading = get_field('branches_section_heading');
    ?>

<section class="branches-section">
    <h2 class="text-center our-branches text-uppercase"><?php echo $branchesSectionHeading; ?></h2>
    <div class="container">
        <div class="row">
            <!-- haridwar -->
            <?php while(have_rows('branches_repeater')): the_row();?>
            <div class="col-lg-6 haridwar-section">
                <h3 class="text-red branch-name text-center text-uppercase"><?php the_sub_field('branch_name'); ?></h3>
                <img class="o-cover w-100 h-100" src="<?php echo get_sub_field('branch_first_image')['url']; ?>" alt="branches-1">
                <div class="row img-grid">
                    <div class="col-7 ">
                        <img class="h-100 w-100 o-cover" src="<?php echo get_sub_field('branch_second_image')['url']; ?>"
                            alt="branches-2">
                    </div>
                    <div class="col-5 ">
                        <img class="o-cover h-100 w-100 " src="<?php echo get_sub_field('branch_third_image')['url']; ?>"
                            alt="branches-3">
                    </div>
                </div>
                <div class=" text-center text-gray-2">
                    <p><?php the_sub_field('branch_description'); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>