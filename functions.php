<?php


add_action( 'wp_enqueue_scripts', 'add_bootstrap' );
function add_bootstrap(){

	wp_register_style('bootstrap',get_stylesheet_directory_uri().'/inc/bootstrap/css/bootstrap.css',array('storefront-style'));
	wp_enqueue_style( 'bootstrap' );

	// Register the script like this for a theme:
	wp_register_script( 'bootstrap.min', get_stylesheet_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'bootstrap.min' );

	

}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'storefront-style'; // This is 'storefront-style' for the Storefront theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/style.css', array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    wp_register_script( 'shop', get_stylesheet_directory_uri() . '/inc/js/shop.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'shop' );
}



require 'inc/shop91now-template-hooks.php';
require 'inc/shop91now-template-functions.php';

/*shop page product add cart with quantity*/
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .='<span class="wocommerce-product-quantity"><div class="loop_qty"> <label class="loop_qty_lbl">Qty</label>';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '</div></span>';
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}
	return $html;
}

add_filter( 'default_checkout_billing_state', 'change_default_checkout_state' );
function change_default_checkout_state() {
  return 'OR'; // state code
}
?>