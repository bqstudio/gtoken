<?php 
if ( !isset($args['image']) AND !isset($args['image_id']) ) return;

/*
USE
$button = get_field('buttonfieldname');
get_template_part(
	'modules/components/image',
	null,
	[
		'image' => $image, (ACF ARRAY)
        or
        'image_id' => (IMAGE ID),
        'cssclass' => 'class'
	]
);
*/

( empty($args['image']) ? $image_id =   $args['image_id'] : $image_id =   $args['image']['id'] );
if ( $image_id ) :

    $cssclass = ( isset($args['cssclass']) ) ? $args['cssclass'] : '';
    $loading = ( isset($args['loading']) ) ? $args['loading'] : 'lazy';

    echo wp_get_attachment_image( $image_id, '', false, [ 
        'class' => $cssclass,
        'loading' => $loading
    ] );
    endif;
