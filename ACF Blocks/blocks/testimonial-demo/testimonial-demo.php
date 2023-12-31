<?php 
/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
// $id = 'testimonial-' . $block['id'];
// if( !empty($block['anchor']) ) {
//     $id = $block['anchor'];
// }

// // Create class attribute allowing for custom "className" and "align" values.
// $className = 'testimonial';
// if( !empty($block['className']) ) {
//     $className .= ' ' . $block['className'];
// }
// if( !empty($block['align']) ) {
//     $className .= ' align' . $block['align'];
// }
// Load values and assign defaults.
$text             = get_field( 'testimonial' ) ?: 'Your testimonial here...';
$author           = get_field( 'author' ) ?: 'Author name';
$author_role      = get_field( 'role' ) ?: 'Author role';
$image            = get_field( 'image' ) ?: 295;
$background_color = get_field( 'background_color' );
$text_color       = get_field( 'text_color' );

// Build a valid style attribute for background and text colors.
// $styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
// $style  = implode( '; ', $styles );

?>

<div class=testimonial-card>
    <div class="content-wrapper">
        <div class="content">
            <p><?php echo esc_html( $text ); ?> </p>
        </div>
        <div class="Author">
            <h5><?php echo esc_html( $author ); ?></h5>
            <h5><?php echo esc_html( $author_role ); ?></h5>
        </div>
    </div>
    <div class="image">
        <?php echo wp_get_attachment_image( $image['ID'], 'thumbnail' ); ?>
    </div>
</div>




