<?php
/**
 * Partners
 *
 * Title:       Partners
 * Description: Partners
 * Category:    palermo
 * Icon:        access
 * Keywords:    partners
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * Styles:      
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
$title = get_field('title');
$partners = get_field('partners');
?>

<!-- Partners -->
<section class="wrapper wrapper--white">
    <section class="partners">
    <div class="anchor" id="partners"></div>
        <div class="container">
            <?php echo empty($title)? '':'<h3 class="title">'.esc_html($title).'</h3>'; ?>
            <?php if( $partners ): ?>
                <div class="swiper-cont">
                    <div class="swiper slider-partners">
                        <div class="swiper-wrapper">
                            <?php foreach( $partners as $partner ): ?>
                                <div class="swiper-slide item">
                                    <?php get_template_part('modules/components/image', null, ['image' => $partner]); ?>
                                </div>                                
                            <?php endforeach; ?>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            <?php endif; ?>            
        </div>
    </section>
</section>
