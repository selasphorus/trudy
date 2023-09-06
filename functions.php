<?php
// Trudy theme functions

/**
 * Define Constants
 *
 */
define( 'TEMPLATE_URL', get_stylesheet_directory_uri() );

add_action( 'wp_enqueue_scripts', 'site_scripts_and_styles' );
function site_scripts_and_styles() {
    
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    //wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
    //wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/styles/style.css', array( 'parent-style' ) );

    // Enqueue the Dashicons script
	wp_enqueue_style( 'dashicons' );
	
}

?>