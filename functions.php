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
	
    // Events Manager (EM) style overrides and additions
    $ver = filemtime( get_stylesheet_directory() . '/css/nycago-events-manager.css');
    wp_enqueue_style( 'nycago-em-style', get_stylesheet_directory_uri() . '/css/nycago-events-manager.css', NULL, $ver );
    
    // Enqueue the Dashicons script
	//wp_enqueue_style( 'dashicons' );
	
}

add_filter( 'the_content', 'trudy_the_content', 20, 1 );
add_filter( 'the_excerpt', 'trudy_the_content', 20, 1 );
function trudy_the_content( $content ) {
    
    $post_id = get_the_ID();
    
    if ( is_singular('person') ) {
        $content .= get_cpt_person_content();
    } else if ( is_singular('newsletter') ) {
        $content .= get_cpt_newsletter_content();
    }
    
    return $content;
    
}
?>