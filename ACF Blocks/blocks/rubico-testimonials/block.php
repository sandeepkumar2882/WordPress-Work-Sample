<?php

    $testimonialSectionHeading = get_field('testimonials_section_heading');

?>
<section class="bg-light testimonials-section text-center">
    <h2 class=" text-uppercase"><?php echo $testimonialSectionHeading; ?></h2>
    <div class="testimonials-carousel text-center container">
        <?php if(have_rows('rubico_testimonials_repeater')): ?>
        <?php while(have_rows('rubico_testimonials_repeater')): ?>
        <?php the_row(); ?>
        <div>
            <div class="overlay text-gray-1 ">
                <img src="<?php echo get_sub_field('testimonial_image')['url']; ?>" alt="testimonial-dummy">
                <h5 class="text-gray-1"><?php the_sub_field('testimonial_message'); ?></h5>
                <p><?php the_sub_field('testimonial_name'); ?><br> <span
                        class="text-uppercase mt-2"><?php the_sub_field('testimonial_designation'); ?></span> </p>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>