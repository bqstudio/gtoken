<?php
/**
 * Hero
 *
 * Title:       Hero
 * Description: Hero
 * Category:    palermo_hero
 * Icon:        align-full-width
 * Keywords:    hero
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * CSS Deps:
 * JS Deps:
 *
 * @package Palermo
 * @subpackage defaultTheme
 * @since defaultTheme  1.0
 */

 do_action( 'palermo_pre_render_block', $block );
 ?>

<?php 
$image = get_field('image');
$title = get_field('title');
$subtitle = get_field('subtitle');
$text = get_field('text');
?>

<!-- Hero Home -->
<section class="wrapper wrapper--hero">
    <section class="hero hero--home">
        <div class="container">
            <div class="content">
                <div class="hero__text">
					<?php echo empty($title)? '':'<h1 class="title">'.esc_html($title).'</h1>'; ?>
					<?php echo empty($subtitle)? '':'<h3 class="uppertitle">'.esc_html($subtitle).'</h3>'; ?>
					<?php echo empty($text)? '':''.wp_kses_post($text).''; ?>
                </div>
				<?php if($image): ?>
					<div class="hero__image">
						<div class="image-background">
							<?php get_template_part('modules/components/image', null, ['image' => $image]); ?>
						</div>
					</div>
				<?php endif; ?>
            </div>
        </div>  
    </section>
</section>