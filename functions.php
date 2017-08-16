<?php


add_action( 'wp_enqueue_scripts', 'add_bootstrap' );
function add_bootstrap(){

	wp_register_style('bootstrap.min',get_stylesheet_directory_uri().'/inc/bootstrap/css/bootstrap.min.css',array('storefront-style'));
	wp_enqueue_style( 'bootstrap.min' );

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
}

require 'inc/shop91now-template-hooks.php';
require 'inc/shop91now-template-functions.php';
?>