<?php 

/**
 * Remove customizer options.
 *
 * @since 1.0.0
 * @param object $wp_customize The current WordPress customizer object.
 */
add_action(  'customize_register', function ( $wp_customize ) {
	$wp_customize->remove_panel( 'themes' );
}, 30 );

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

	global $wp_version;
    if ( $wp_version !== '4.7.1' ) 
        return $data;

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

add_filter( 'upload_mimes', function ( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
});

/*
Remove items from the dashboard
*/
function palermo_removemenuitems () { 
  //remove_menu_page('edit.php');
  // remove_menu_page('upload.php');
  remove_menu_page('edit-comments.php');
  //remove_menu_page('edit.php?post_type=page');
} 
add_action('admin_menu', 'palermo_removemenuitems');
