<?php 

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

function my_login_stylesheet() { 
    wp_enqueue_style( 'niestandardowe logowanie', get_stylesheet_directory_uri() . '/style-login.css' ); 
    wp_enqueue_script('custom-login', get_stylesheet_directory_uri(). '/style-login.js' ); 
} 
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' ); 



include get_template_directory() . '/inc/theme-options.php';
include get_template_directory() . '/inc/cpt.php';