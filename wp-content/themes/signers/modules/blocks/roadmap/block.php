<?php
/**
 * Roadmap
 *
 * Title:       Roadmap
 * Description: Roadmap
 * Category:    palermo
 * Icon:        columns
 * Keywords:    facts
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * Styles:      normal, Grey Background, Light-blue Background
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
$description = get_field('description');
$text = get_field('text');
?>

<!-- Roadmap -->
<section id="<?php echo esc_attr($block['id']); ?>" class="wrapper block-roadmap <?php echo esc_attr( $block['className'] );?>">
    <section class="roadmap">
    <div class="anchor" id="roadmap"></div>
        <div class="container">
            <div class="content">
                <?php if($image): ?>
                    <div class="roadmap__image">
                        <div class="image-background">
                            <?php get_template_part('modules/components/image', null, ['image' => $image]); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="roadmap__text">
                    <?php echo empty($title)? '':'<h2 class="title">'.esc_html($title).'</h2>'; ?>
					<?php echo empty($description)? '':'<h4 class="description">'.esc_html($description).'</h4>'; ?>
					<?php echo empty($text)? '':''.wp_kses_post($text).''; ?>                    
                </div>
            </div>
        </div>
    </section>
</section>
