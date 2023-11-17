<?php
/**
 * Text/image
 *
 * Title:       Text/image
 * Description: Text/image
 * Category:    palermo
 * Icon:        columns
 * Keywords:    facts
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
$image = get_field('image');
$title = get_field('title');
$list = get_field('list');
?>

<!-- Text Image -->
<section class="wrapper wrapper--grey">
    <section class="text-image">
        <div class="container">
            <div class="content">
                <div class="content__text">
                    <?php echo empty($title)? '':'<h4 class="title">'.esc_html($title).'</h4>'; ?>
                    <?php                     
                    if( $list ):
                        echo '<ul class="list-text">';
                            foreach( $list as $item ):
                                echo empty($item['text'])? '':'<li>'.esc_html($item['text']).'</li>';             
                            endforeach;
                        echo '</ul>';
                    endif;                     
                    ?>  
                </div>
                <?php if($image): ?>
                    <div class="content__image">
                        <div class="image-background">
                            <?php get_template_part('modules/components/image', null, ['image' => $image]); ?>
                        </div>
                    </div>
                <?php endif; ?>               
            </div>
        </div>
    </section>
</section>
