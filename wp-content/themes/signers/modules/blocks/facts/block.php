<?php
/**
 * Facts
 *
 * Title:       Facts
 * Description: Facts
 * Category:    palermo
 * Icon:        editor-quote
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
$uppertitle = get_field('uppertitle');
$title = get_field('title');
$facts = get_field('facts');
$values = get_field('values');
?>

<!-- facts -->
<section id="<?php echo esc_attr($block['id']); ?>" class="wrapper block-facts <?php echo esc_attr( $block['className'] );?>">
    <section class="facts">
        <div class="anchor" id="work"></div>
        <div class="container">
            <div class="content">
                <div class="content__text">
                    <?php echo empty($uppertitle)? '':'<h4 class="subtitle">'.esc_html($uppertitle).'</h4>'; ?>
                    <?php echo empty($title)? '':'<h2 class="title">'.esc_html($title).'</h2>'; ?>
                </div>
                <div class="content__items">
                    <?php                     
                    if( $facts ):
                        echo '<div class="top">';
                            foreach( $facts as $fact ): ?>
                                <div class="item">
                                    <div class="item__icon">
                                        <?php get_template_part('modules/components/image', null, array('image' => $fact['icon'])); ?>
                                    </div>
                                    <div class="item__data">
                                        <?php echo empty($fact['number'])? '':'<div class="item__number">'.esc_html($fact['number']).'</div>'; ?>
                                        <?php echo empty($fact['text'])? '':'<h5 class="item__name">'.esc_html($fact['text']).'</h5>'; ?>
                                    </div>
                                </div>               
                            <?php endforeach;
                        echo '</div>';
                    endif;

                    if( $values ):
                        echo '<div class="bottom">';
                            foreach( $values as $value ):
                                echo empty($value['text'])? '':'<h6 class="facts-inline">'.esc_html($value['text']).'</h6>';
                            endforeach;
                        echo '</div>';
                    endif;                     
                    ?>   
                </div>
            </div>
        </div>
    </section>
</section>

