<?php
/**
 * Moina Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Moina Blog
 */

if ( ! defined( 'MOINA_BLOG_VERSION' ) ) {
	$moina_blog_theme = wp_get_theme();
	define( 'MOINA_BLOG_VERSION', $moina_blog_theme->get( 'Version' ) );
}


/**
 * Enqueue scripts and styles.
 */
function moina_blog_scripts() {
    wp_enqueue_style( 'moina-blog-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','moina-default-block','moina-style'), '', 'all');
    wp_enqueue_style( 'moina-blog-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), MOINA_BLOG_VERSION, 'all');
}
add_action( 'wp_enqueue_scripts', 'moina_blog_scripts' );

/**
 * Custom excerpt length.
 */
function moina_blog_excerpt_length( $length ) {
    return 19;
}
add_filter( 'excerpt_length', 'moina_blog_excerpt_length', 999 );