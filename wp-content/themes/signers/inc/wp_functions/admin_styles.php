<?php
// Customize Login Screen ( UPD: Logo URL )
add_filter( 'login_headerurl', 'admin_logo_custom_url' );
function admin_logo_custom_url() {
    return get_home_url();
}


// Include Theme Style & JavaScript Files for Login 

add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
function my_login_stylesheet() {

    wp_enqueue_style( 'login-style', get_stylesheet_directory_uri() . '/login.css', array() );

}
