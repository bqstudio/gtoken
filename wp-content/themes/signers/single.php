<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Palermo
 */
get_header();
?>
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'modules/posts/item');

	endwhile; // End of the loop.
	?>
<?php
get_footer();
