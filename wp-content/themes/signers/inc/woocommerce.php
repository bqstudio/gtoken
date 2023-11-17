<?php
/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'palermo_is_woocommerce_activated' ) ) {
	function palermo_is_woocommerce_activated() {
		return class_exists( 'woocommerce' );
	}
}
if( !palermo_is_woocommerce_activated()) return;

function palermo_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'palermo_add_woocommerce_support' );

add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
	return array(
	'width' => 400,
	'height' => 400,
	'crop' => 1,
	);
} );

remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);
add_action('woocommerce_single_product_excerpt','woocommerce_template_single_excerpt',20);
remove_action('woocommerce_cart_collaterals','woocommerce_cross_sell_display');
add_action('woocommerce_cart_collaterals','woocommerce_cross_sell_display',11);
add_filter( 'woocommerce_single_product_carousel_options', function ( $options ) {
	$options['directionNav'] = true;
	return $options;
});