<?php
// Trudy theme functions

/**
 * Define Constants
 *
 */
define( 'TEMPLATE_URL', get_stylesheet_directory_uri() );

add_action( 'wp_enqueue_scripts', 'site_scripts_and_styles' );
function site_scripts_and_styles() {
    
    //wp_enqueue_style( 'trudy-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
    //wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/styles/style.css', array( 'parent-style' ) );
	
    // Events Manager (EM) style overrides and additions
    $ver = filemtime( get_stylesheet_directory() . '/css/nycago-events-manager.css');
    wp_enqueue_style( 'nycago-em-style', get_stylesheet_directory_uri() . '/css/nycago-events-manager.css', NULL, $ver );
    
    // Enqueue the Dashicons script
	wp_enqueue_style( 'dashicons' );
	
}

add_filter( 'the_content', 'trudy_the_content', 20, 1 );
function trudy_the_content( $content ) {
    
    $post_id = get_the_ID();
    
    $content .= sdg_custom_post_content();
    
    /*if ( is_singular('person') ) {
        $content .= get_cpt_person_content();
    } else if ( is_singular('venue') ) {
        $content .= get_cpt_venue_content();
    } else if ( is_singular('newsletter') ) {
        $content .= get_cpt_newsletter_content();
    } else {
        //$content .= "?$?#?$?#?$?#"; // tft
    }*/
    
    return $content;
    
}

add_filter( 'the_excerpt', 'trudy_the_excerpt', 999 );
function trudy_the_excerpt( $content ) {
    
    $post_id = get_the_ID();
    
    if ( is_post_type_archive('person') ) {
        $content .= get_cpt_person_content();
    } else if ( is_post_type_archive('newsletter') ) {
        $content .= get_cpt_newsletter_content();
    } else {
        //$content .= "?$?#?$?#?$?#"; // tft
    }
    
    return $content;
    
}

// Hook into header for ACF form function, where applicable
add_action( 'get_header', 'acf_header_hook' );
function acf_header_hook( $name ) {
	if ( queenbee() && is_singular('venue') ) { //
		echo "testing acf_header_hook...";
		acf_form_head();
	}
}
?>