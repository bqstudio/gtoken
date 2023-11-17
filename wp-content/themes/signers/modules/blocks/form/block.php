<?php
/**
 * Form
 *
 * Title:       Form
 * Description: Form
 * Category:    palermo
 * Icon:        admin-comments
 * Keywords:    form
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
$form_id = get_field('form_id');
?>

<section class="wrapper wrapper--light-blue">
    <section class="contact-form">
        <div class="anchor" id="contact"></div>
        <div class="container">
            <?php echo empty($title)? '':'<h2 class="title">'.esc_html($title).'</h2>'; ?>
            <div class="formcontainer">
                <?php echo apply_shortcodes('[gravityform id="'.esc_attr($form_id).'" title="false" description="false" ajax="true"]'); ?>
            </div>
        </div>
    </section>
</section>
