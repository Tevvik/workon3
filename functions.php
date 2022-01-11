<?php 
include get_template_directory() . '/inc/cpt.php';

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('main', get_template_directory_uri() . '/dist/main.css', [], '1.0.0');
    wp_enqueue_script('main', get_template_directory_uri() . '/dist.main.js', ['jquery'], '1.0', true);

    wp_localize_script('main', 'page', [
        'url' => get_home_url(),
        'desc' => get_bloginfo('name')
    ]);
});


//deklaracjia pozycji pod menu
add_action('after_setup_theme', function () {
    register_nav_menus([
        'header_nav' => "Header navigation",
        'footer_nav_1' => "Footer Navigation 1",
        'footer_nav_2' => "Footer Navigation 2"

    ]);
});

add_theme_support('post-thumbnails');
add_user_meta(1,'phone_num','666099000');

function my_login_stylesheet() { 
    wp_enqueue_style( 'niestandardowe logowanie', get_stylesheet_directory_uri() . '/style-login.css' ); 
    wp_enqueue_script('custom-login', get_stylesheet_directory_uri(). '/style-login.js' ); 
} 
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' ); 


function new_user($data) {

    // Separate Data
    $default_newuser = array(
        'user_pass' =>  wp_hash_password( $data['user_pass']),
        'user_login' => $data['user_login'],
        'user_email' => $data['user_email'],
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'role' => 'pending'
    );
    $user_id = wp_insert_user($default_newuser);
    if ( $user_id && !is_wp_error( $user_id ) ) {
        $code = sha1( $user_id . time() );
        $activation_link = add_query_arg( array( 'key' => $code, 'user' => $user_id ), get_permalink( /* YOUR ACTIVATION PAGE ID HERE */ ));
        add_user_meta( $user_id, 'has_to_be_activated', $code, true );
        wp_mail( $data['user_email'], 'ACTIVATION SUBJECT', 'HERE IS YOUR ACTIVATION LINK: ' . $activation_link );
    }
}


include get_template_directory() . '/inc/theme-options.php';