<?php
/**
 * ACF Blocks Integration.
 *
 * This component adds an easy to use ACF Blocks integration.
 *
 * @package    WordPress
 * @subpackage defaultTheme
 * @since      defaultTheme 1.0
 */

defined( 'ABSPATH' ) || die();

/**
 * The class that sets up ACF blocks to be built using a single PHP file.
 *
 * ACF blocks should be built in the /modules/blocks/ directory of the theme.
 */

 function register_theme_blocks() {
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}
		$blockspath = get_template_directory(). '/modules/blocks/*/block.php';
		$blocks = glob( $blockspath  );

		$blockspath_hero = get_template_directory(). '/modules/hero/*/block.php';
		$blocks_hero = glob( $blockspath_hero  );

		$blocks = array_merge( $blocks, $blocks_hero );

		global $customblocks;

		if ( ! empty( $blocks ) ) {

			foreach ( $blocks as $block ) {
				preg_match('/\/modules\/([^\/]+)\/((?:[^\/]+\/)*[^\/]+)\/block\.php$/', $block, $matches);
					
				if ( empty($matches) ) continue;

				$blockPath = $matches[0];
				$folderName = $matches[1];
				$blockName = $matches[2];

				// if folder starts with _ dont add this block
				if( substr($blockName, 0, 1) === '_' ) continue; 

				$block_data = get_file_data(
					$block,
					array(
						'slug'       => 'Slug',
						'title'       => 'Title',
						'description' => 'Description',
						'category'    => 'Category',
						'icon'        => 'Icon',
						'keywords'    => 'Keywords',
						'post_types'  => 'Post Types',
						'multiple'    => 'Multiple',
						'active'      => 'Active',
						'cssdeps'     => 'CSS Deps',
						'jsdeps'      => 'JS Deps',
						'InnerBlocks' => 'InnerBlocks',
						'mode'        => 'Mode',
						'parent'      => 'Parent',
						'styles'      => 'Styles'
					)
				);

				//	convert value to boolean
				$isActive = filter_var($block_data['active'], FILTER_VALIDATE_BOOLEAN);
				if( $isActive === false )
					continue;
				
				$blockfolder = str_replace( 'block.php', '', $block );
				$name = ( isset($block_data['slug']) && !empty($block_data['slug']) ) ? sanitize_title($block_data['slug']) : sanitize_title($block_data['title']);
				$block_scripts = [];

				// if the js folder exists, loop the inside files
				$scriptsfolder = $blockfolder.'js/';
				if ( file_exists($scriptsfolder) ) {
					$scripts = glob( $scriptsfolder.'*.js'  );
					
					foreach ($scripts as $script) {
						$script_filename = str_replace( $scriptsfolder,'',$script );
							
						//skip commented scripts
						if( substr($script_filename, 0, 1) === '_' ) continue;

						$block_scripts[$name.'-'.$script_filename] = get_template_directory_uri().'/modules/'.$folderName.'/'.$blockName.'/js/'.$script_filename;
					}
				}

				$block_settings = array(
					'name'            => $name,
					'title'           => $block_data['title'],
					'description'     => $block_data['description'],
					'render_template' => $block,
					'category'        => $block_data['category'],
					'icon'            => $block_data['icon'],
					'mode'            => 'auto',
					'keywords'        => array_filter( explode( ',', $block_data['keywords'] ) ),
					'enqueue_assets'  => function() use ( $block_scripts ) {
						foreach ($block_scripts as $name => $url) {
							wp_enqueue_script( $name, $url );
						}
					},
				);

				if ( ! empty( $block_data['post_types'] ) && 'all' !== $block_data['post_types'] ) {
					$block_settings['post_types'] = explode( ',', $block_data['post_types'] );
				}

				if ( 'true' === $block_data['InnerBlocks'] ) {
					$block_settings['supports']['jsx'] = true;
					$block_settings['mode']            = 'preview';
				}

				if ( ! empty( $block_data['mode'] ) ) {
					$block_settings['mode'] = $block_data['mode'];
				}

				if ( 'false' === $block_data['multiple'] ) {
					$block_settings['supports']['multiple'] = false;
				}

				if ( ! empty( $block_data['parent'] ) ) {
					$block_settings['parent'] = explode( ',', $block_data['parent'] );
				}

				if ( ! empty( $block_data['styles'] ) ) {
					$block_styles             = array_map( 'trim', explode( ',', $block_data['styles'] ) );
					$block_settings['styles'] = array();

					foreach ( $block_styles as $key => $block_style ) {
						$default = false;

						if ( 0 === $key ) {
							$default = true;
						}

						$block_settings['styles'][] = array(
							'name'      => sanitize_title( $block_style ),
							'label'     => $block_style,
							'isDefault' => $default,
						);
					}
				}

				if ( $block_settings["category"] == "palermo_hero")
					$block_settings["name"] = "hero-".$block_settings["name"];

				$customblocks[] = "acf/".$block_settings["name"];

				$preview = [
					//'mode' => 'preview',
					'data' => array(
						'_is_preview'   => 'true'
					),
					'example'         => array(
						'attributes' => array(
							'mode' => '_is_preview',
						),
					),
				];
				$block_settings = array_merge( $block_settings, $preview);

				acf_register_block_type( $block_settings );
				
				/*
				Include ajax functions if exists
				*/
				$ajaxfile = $blockfolder.'ajax.php';
				if ( file_exists( $ajaxfile ) ) {
					include_once( $ajaxfile );
				}
			}
		}
	}

/**
 * Add a block category for all Palermo ACF blocks.
 *
 */
add_filter( 'block_categories_all', function( $categories, $post ) {
    return array_merge(
           $categories,
           array(
				array(
                   'slug'  => 'palermo_hero',
                   'title' => get_option('blogname')." Hero",
               ),
               array(
                   'slug'  => 'palermo',
                   'title' => get_option('blogname')." Content",
               ),
			   
           )
    );
}, 10, 2 );
register_theme_blocks();




/**
 * Exclude default WP themes from the site
 *
 *  Run wp.blocks.getBlockTypes() in the console to get a list of all available blocks
 */
add_filter( 'allowed_block_types_all', 'palermo_allowed_block_types' );
function palermo_allowed_block_types( $allowed_blocks ) { 
    global $customblocks;
	
    $ret =  array(
        'core/paragraph',
        'core/image',
        'core/heading',  
        'core/subhead',
        'core/list',
		'core/list-item',
		'core/html',
		'core/shortcode',		
		'core/pattern',	
		'core/block',
    );
	$ret = array_merge( $ret, $customblocks );
    return $ret; 
}

/**
 * Add sites css to the editor for previews
 *
 */
function palermo_block_editor_styles() {
    wp_enqueue_style('palermo-editor-styles', get_theme_file_uri( '/editor.css' ), false, '1.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'palermo_block_editor_styles' );




/*
Wrap default wp blocks in a container
*/

add_filter( 'render_block', 'wrap_classic_block', 10, 2 );
function wrap_classic_block( $block_content, $block ) {
    
    if ( 
        $block['blockName'] && substr($block['blockName'], 0, 3) != 'acf' 
    ) {
       	$blockclass = explode('/', $block['blockName']); 
        $block_content_return = '<div class="container '.$blockclass[1].' default_block " data-waypoint=".25">';
		$block_content_return .= $block_content;
		$block_content_return .= '</div>';

		return $block_content_return;
    }
    return $block_content;
}







add_action( 'palermo_pre_render_block', 'pre_render_block_cb', 10, 1 );
function pre_render_block_cb( $block ) {

	/*
	Add blocks spacing 
	*/
	global $breakpoints;
	if ( 
		(isset($block['data']['spacing_desktop']) AND $block['data']['spacing_desktop'] != '') OR 
		(isset($block['data']['spacing_tablet']) AND $block['data']['spacing_desktop'] != '') OR 
		(isset($block['data']['spacing_mobile']) AND $block['data']['spacing_desktop'] != '') 
		) {
		
		$style = '<style>';

		if ( isset($block['data']['spacing_desktop']) AND $block['data']['spacing_desktop'] != '' )
			$style .= '@media only screen and (min-width: '.$breakpoints['desktop-s'].' ) { #'.$block['id'].'{ margin-bottom: '.$block['data']['spacing_desktop'].'px; } }';

		if ( isset($block['data']['spacing_tablet']) AND $block['data']['spacing_tablet'] != '' )
			$style .= '@media only screen and (min-width: '.($breakpoints['mobile-h']).' ) and (max-width: '.($breakpoints['desktop-s']).' ) { #'.$block['id'].'{ margin-bottom: '.$block['data']['spacing_tablet'].'px; } }'; 

		if ( isset($block['data']['spacing_mobile']) AND $block['data']['spacing_mobile'] != '' )
			$style .= '@media only screen and (max-width: '.($breakpoints['mobile-h']).' ) { #'.$block['id'].'{ margin-bottom: '.$block['data']['spacing_mobile'].'px; } }'; 

		$style .= '</style>';
		add_action('wp_footer', function ( ) use ( $style ) { echo $style; }, 100,1);
	}


	/*
	Add js.php scripts to the sites footer
	*/
	$jsfile = str_replace( 'block.php', 'js.php', $block['render_template'] );
	if ( file_exists( $jsfile ) ) {
		ob_start();
		include ( $jsfile );
		$jsscript = ob_get_clean();
		if ( $jsscript ) {
			$jsscript = preg_replace( "/\r|\n/", "", $jsscript);
			add_action('wp_footer', function ( ) use ($jsscript) {
				echo $jsscript;
			},100,1);
		}
	} 	


	/* 
	generates block preview
	*/
 	if( isset( $block['data']['_is_preview'] ) ) { 
 
    	$name = explode('/', $block['name']);
		$imagepath = str_replace('block.php','preview.jpg', $block['render_template']);
		$imageurl = explode('modules', $imagepath) ;
		$imageurl = get_stylesheet_directory_uri().'/modules/'.$imageurl[1];

		
    	if ( is_admin() AND file_exists( $imagepath ) ) {
		?>
		<figure>
			<img src="<?php echo $imageurl; ?>" >
		</figure>
		<style>
			.block-editor-iframe__body .acf-block-preview>*{
				display: none !important;
			}
			.block-editor-iframe__body .acf-block-preview>figure{
				display: block !important;
			}
			.block-editor-iframe__body .acf-block-preview>figure img{
				max-width: 100%;
				display: block;
			}
		</style>
		<?php 
	
    	} 
		

		return '';
	} 




}





