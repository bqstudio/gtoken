<?php

/**
 * Escape SVG content to ensure safe insertion.
 * Uses wp_kses allowing svg-related tags and attributes (add more attributes if needed) 
 *
 * @param string $svg The SVG content to be escaped.
 * @return string The escaped SVG content.
 */
function palermo_escape_svg($svg) {
	wp_kses( $svg, array(
		'svg'  => array(
			'xmlns'   => array(),
			'width'   => array(),
			'height'  => array(),
			'viewbox' => array(),
			'fill'    => array(),
			'class'           => true,
			'aria-hidden'     => true,
			'aria-labelledby' => true,
			'role'            => true,
		),
		'path' => array(
			'd'         => true,
			'fill'      => true,
			'fill-rule' => true,
			'clip-rule' => true,
		),
		'g' => array(
			'fill' => true,
		),
		'title' => array(
			'title' => true,
		),
	) );
	
	return $svg;
}