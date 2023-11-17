<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Palermo
 */

get_header();

$e404_title = get_field('e404_title','options');
$e404_title = ( !empty($e404_title) ) ? $e404_title : '';

$e404_text = get_field('e404_text','options');
$e404_text = ( !empty($e404_text) ) ? $e404_text : '';

$e404_button = get_field('e404_button','options');
$e404_button = ( !empty($e404_button) ) ? $e404_button : '';
?>


<section class="error-404 not-found" data-in='100'>
	<div class="container">
		<div class="left">
			<div class="e404">
				404
			</div>
		</div>
		<div class="right">
			<h1 class="title">
				<?php echo wp_kses_post($e404_title); ?>
			</h1>
			<?php if (!empty($e404_text)) {?>
			<p>
				<?php echo wp_kses_post($e404_text); ?>
			</p>
			<?php } ?>

			<?php get_template_part('modules/components/button',null,['button'=>$e404_button]); ?>
		</div>
	</div><!-- .page-content -->
</section><!-- .error-404 -->


<?php
get_footer();
