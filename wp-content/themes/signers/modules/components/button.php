<?php
/*
USE
$button = get_field('buttonfieldname');
get_template_part( 
    'modules/components/button', 
    null,  
    [
        'button' => $button
    ]
);
*/



$button = $args['button'];
$cssclass =  ( $args['style'] ? 'button '.$args['style'] : 'button' );

if ( ! empty( $button ) AND ! empty( $button['title'] )  AND ! empty( $button['url'] ) ) {
	?>
	<a class="<?php echo esc_attr( $cssclass ); ?>" href="<?php echo esc_url( $button['url'] ); ?>" <?php echo ! empty( $button['target'] ) ? 'target="' . esc_attr( $button['target'] ) . '"' : ''; ?>> </a>
	<?php
}
