<?php

    $galleryHeading = get_field('rubico_gallery_heading');
    $galleryImages = get_field('rubico_gallery_images');
    $galleryLeftText = get_field('gallery_left_text');
    $galleryRightText = get_field('gallery_right_text');

?>
<section class="gallery-carousel-section container">
    <h2 class="text-uppercase text-center"><?php echo $galleryHeading; ?></h2>
    <div class="gallery-carousel">
        <?php if($galleryImages): ?>
        <?php foreach($galleryImages as $image): ?>
        <div>
            <img class="w-100  o-cover" src="<?php echo $image['url']; ?>" alt="emp-playing">
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="label-organisation label text-uppercase position-absolute"><?php echo $galleryRightText;  ?></div>
    <div class="label-gallery label text-uppercase position-absolute"><?php echo $galleryLeftText; ?></div>
</section>