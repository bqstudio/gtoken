<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<section id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<section class="product__single">
		<div class="container">
		<?php woocommerce_breadcrumb(); ?>
			<div class="product__single__top">
				<div class="product__single__top__left">
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>
				
				<div class="product__single__top__right">
					<?php 
						if( $product->get_sku() )
							echo '<span class="sku_wrapper">Model No.: '. $product->get_sku() .'</span>';

						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action( 'woocommerce_single_product_summary' );
					?>
					<div class="product__description">
						<?php 
							/**
							 * Hook: woocommerce_single_product_excerpt.
							 *
							 * @hooked woocommerce_template_single_excerpt - 20
							 */
							do_action( 'woocommerce_single_product_excerpt' );
						?>
					</div>

					<?php if( have_rows('product_details') ):?>
						<div class="product__accordion">
							<button class="product__accordion__title">Product details</button>
							<div class="product__accordion__cont">
								<?php while ( have_rows('product_details') ) : the_row();?>
									<?php echo ($text = get_sub_field('text'))? '<div class="product__accordion__item">'.$text.'</div>':''; ?>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif; ?>

					<div class="product__accordion">
						<button class="product__accordion__title">Shipping & Returns</button>
						<div class="product__accordion__cont">
							<div class="product__accordion__text">
								<p>Free shipping on orders over $150, and our 30 days, no questions asked return policy.</p> 
							</div>
						</div>
					</div>
					<div class="product__accordion">
						<button class="product__accordion__title">Warrenty</button>
						<div class="product__accordion__cont">
							<div class="product__accordion__text">
								<p>Lorem ipsum dolor sit est in verbatim et ceteram dolorem est. In vernatim  et ceteram esyt.</p> 
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php
				if( get_field('content') ): ?>
					<section class="title_separator">
						<div class="container">
							<h3 class="title_separator__title">Product features</h3>
						</div>
					</section>
					<?php while ( has_sub_field('content') ) :
						get_template_part('modules/'.get_row_layout());
					endwhile;
				endif;
			?>


			<div class="product__single__bottom">
				<?php
				/**
				 * Hook: woocommerce_after_single_product_summary.
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				do_action( 'woocommerce_after_single_product_summary' );
				?>
			</div>
		</div>
	</section>
</section>

<?php do_action( 'woocommerce_after_single_product' ); ?>