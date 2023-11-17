<?php
/**
 * Palermo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Palermo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


function palermo_setup() {

	load_theme_textdomain( 'palermo', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-font-sizes' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'palermo_setup' );

/**
 * Enqueue scripts and styles.
 */
function palermo_scripts() {
	wp_enqueue_style( 'palermo-style', get_stylesheet_uri(), array(), time() );	
	wp_style_add_data( 'palermo-style', 'rtl', 'replace' );
	wp_deregister_script('jquery-core'); 
	wp_enqueue_script( 'jquery-core',get_template_directory_uri().'/js/vendor/jquery-3.6.0.min.js', '', '', false );
	wp_enqueue_script( 'swiper', get_template_directory_uri().'/js/vendor/swiper.js', '', '', true );
	wp_enqueue_script( 'theme-functions', get_template_directory_uri() . '/js/theme.min.js', array('jquery-core','swiper'), false, true );
	wp_localize_script( 'theme-functions', 'WP', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
	wp_enqueue_style( 'fancybox', get_template_directory_uri().'/css/fancybox.css', '', array('palermo-style'), 'all');	
}
add_action( 'wp_enqueue_scripts', 'palermo_scripts' );


/*
Parche si no funcionan los required en gutenberg
https://support.advancedcustomfields.com/forums/topic/required-fields-in-gutenberg-editor/#post-155852
*/
add_action( 'acf/validate_save_post', '_validate_save_post', 5 );
function _validate_save_post() {

    // bail early if no $_POST
    $acf = false;
    foreach($_POST as $key => $value) {
        if (strpos($key, 'acf') === 0) {
            if (! empty( $_POST[$key] ) ) {
                acf_validate_values( $_POST[$key], $key);
            }
        }
    }
}


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/admin.php';
require get_template_directory() . '/inc/theme.php';
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/posttypes.php';
require get_template_directory() . '/inc/blocks.php';
require get_template_directory() . '/inc/acf/wysiwyg.php';
//require get_template_directory() . '/inc/woocommerce.php';

$files = glob(get_template_directory().'/inc/wp_functions/*.php');

foreach ($files as $file) {
    require($file);   
}


add_action( 'template_redirect', 'my_callback' );
function my_callback() {
	$leadership_index_page = get_field('leadership_index_page', 'options');
  	if ( $_SERVER['REQUEST_URI'] == '/team' OR $_SERVER['REQUEST_URI'] == '/team/' ) {
    	wp_redirect( get_permalink( $leadership_index_page->ID ) , 301 );
    	exit();
  	}
}
