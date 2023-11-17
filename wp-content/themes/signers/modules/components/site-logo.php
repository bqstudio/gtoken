<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

<?php
$site_logo = get_field('site_logo','options');
if ( !empty($site_logo['url']) ) {
    $logocode = file_get_contents( $site_logo['url'] );    
    $logocode = str_replace( 'id="Capa_1"', "", $logocode );
    
    if ( isset($args['footer']) ){
        $logocode = str_replace( "logo_text", "logo_text_footer", $logocode );
    }
    echo $logocode;
}
?>

</a>
