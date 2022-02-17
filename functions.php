<?php
/**
 * 
 * Enqueues theme styles and scripts 
 **/


if ( !function_exists( 'theme_setup' ) ) :
    
    function theme_setup() {
      
        //Add Theme Supports
        add_theme_support( 'automatic-feed-links' );  // Add default posts and comments RSS feed links to <head>.
 
        
        add_theme_support( 'post-thumbnails' ); 
        add_theme_support( 'editor-styles' ); 
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'menus' );
    }
endif;


add_action( 'after_setup_theme', 'theme_setup' );
 
/**
 * Enqueue theme scripts and styles.
 */
function jgdm_theme_scripts() {

    wp_enqueue_style( 'block_editing_example', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'jgdm_theme_scripts' );