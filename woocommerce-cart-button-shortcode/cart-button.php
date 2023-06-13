<?php
//cart icon code start here


add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
    ob_start();

    $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
    $cart_url = wc_get_cart_url();  // Set Cart URL

    ?>
    <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
            <img src="<?php echo get_site_url(); ?>/wp-content/themes/launch-leadership/assets/images/cart-icon.png"> <?php
           
                ?>
               
                <span class="cart-contents"><?php echo $cart_count; ?></span>
                <?php
            
            ?>
        </a>
    <?php

    return ob_get_clean();

}
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {

    ob_start();

    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();

    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
        <img src="<?php echo get_site_url(); ?>/wp-content/themes/launch-leadership/assets/images/cart-icon.png"><?php
        
            ?>
            
            <span class="cart-contents"><?php echo $cart_count; ?></span>
            <?php
        
        ?></a>
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}

add_filter( 'wp_nav_menu_header-menu_items', 'woo_cart_but_icon', 10, 2 ); // Change menu to suit - example uses 'top-menu'

/**
 * Add WooCommerce Cart Menu Item Shortcode to particular menu
 */
function woo_cart_but_icon ( $items, $args ) {
    $items .=do_shortcode('[woo_cart_but]'); // Adding the created Icon via the shortcode already created

    return $items;
}
//cart icon code ends here
