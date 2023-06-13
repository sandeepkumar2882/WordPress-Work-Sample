<?php
/* 
  Pressroom Post List block for display data on front-end
  Created By: Sandeep Kumar
*/

use Genesis\CustomBlocks\Blocks\Block;

$backgroundColor = block_value('background-color');
$heading = block_value('title');
$content = block_value('content');
$button1Text = block_value('button-1-text');
$button2Text = block_value('button-2-text');
$button1Url = block_value('button-1-url');
$button2Url = block_value('button-2-url');

?>

<div class="row future-of-enhabit-div module_paginated-list body-l alignfull <?php echo $backgroundColor; ?>">

    <div class="col-md-7 future-of-enhabit-left">
        <?php if ($heading) : ?>
            <h1>
                <?php echo $heading; ?>
            </h1>
        <?php endif;
        if ($content) :
        ?>
            <p>
                <?php echo $content; ?>
            </p>
        <?php endif;
        if ($button1Url && $button1Text || $button2Url  && $button2Text) :
        ?>
            <div>
                <?php if ($button1Url && $button1Text) : ?>
                    <button class="button-future" title="Click me to go on edit page!">
                        <a href="<?php echo $button1Url ?>">
                            <?php echo $button1Text ?>
                        </a>
                    </button>
                <?php endif;
                if ($button2Url && $button2Text) :
                ?>
                    <button class="button-future" title="Click me to go on enhabit original site!">
                        <a href="<?php echo $button2Url ?>">
                            <?php echo $button2Text ?>
                        </a>
                    </button>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-5 future-of-enhabit-right">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php if (block_rows('add-swiper-slider')) : ?>
                    <?php $i = 0;
                    while (block_rows('add-swiper-slider')) : block_row('add-swiper-slider');
                        $i++;
                        $title = block_sub_value('swiper-slider-title');
                        $image = block_sub_value('swiper-slider-image');
                        $image = wp_get_attachment_image_url($image, '');
                        $designation = block_sub_value('swiper-slider-designation');
                    ?>
                        <div class="swiper-slide">
                            <?php if ($title) : ?>
                            <h1>
                                <?php echo $title; ?>
                            </h1>
                            <?php endif;
                                if ($designation) :
                            ?>
                            <h3>
                                <?php echo $designation; ?>
                            </h3>
                            <?php endif; 
                                if ($image) : 
                            ?>
                            <img src="<?php echo $image; ?>">
                            <?php endif; ?>
                        </div>
                <?php endwhile;
                endif;
                reset_block_rows('add-swiper-slider'); ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
