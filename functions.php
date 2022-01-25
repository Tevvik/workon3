<?php 

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('main', get_template_directory_uri() . '/dist/main.css', [], '1.4.0');
    wp_enqueue_script('main', get_template_directory_uri() . '/dist/main.js', ['jquery'], '1.4.0', true);
    
    wp_localize_script('main', 'page', [
        'url' => get_home_url(),
        'api_url' => get_rest_url(),
        'desc' => get_bloginfo('name')
    ]);
});

add_theme_support('post-thumbnails');
add_user_meta(1, 'user_phone', '666 666 666');

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
function ending_two_weeks_olds() {
  $query_of_death = new WP_Query([
    'fields'         => 'ids',
    'post_type'      => 'offers',
    'posts_per_page' => '-1',
    'date_query'     => [
      'column'  => 'post_date',
      'before'   => '14 days ago'
      ]
    ]);
  if ( $query_of_death->have_posts() ) {
    while ( $query_of_death->have_posts() ) {
        $query_of_death->the_post();
        wp_delete_post(get_the_ID(),true);
    }    
  }
  die();
  wp_reset_postdata();
}
if ( !wp_next_scheduled('deadly_action') ) {
  wp_schedule_event( current_time( 'timestamp' ), 'hourly', 'deadly_action');
}
add_action( 'deadly_action', 'ending_two_weeks_olds' );

add_action('user_register', 'addMyCustomMeta');    
function addMyCustomMeta( $user_id ) {    
  update_user_meta( $user_id, 'user_phone', $_POST['user_phone'] ); 
}

add_action( 'user_register', 'register_page_redirect', 10, 1 );
function register_page_redirect( $user_id ) {
    wp_redirect(site_url('zaloguj'));
    exit;

}
add_action( 'wp_login', 'login_page_redirect', 10, 1 );
function login_page_redirect( $user_id ) {
    wp_redirect(site_url());
    exit;
}
add_filter('login_errors','login_error_message');

function login_error_message($error){
    $pos = strpos($error, 'incorrect');
    if (is_int($pos)) {
        $error = "Niepoprawne dane";
    }
    return $error;
}
add_action( 'wp_login_failed', 'custom_login_failed', 10, 2 );
function custom_login_failed( $username )
{
    $referrer = wp_get_referer();

    if ( $referrer && ! strstr($referrer, 'wp-login') && ! strstr($referrer, 'wp-admin') )
    {
        if ( empty($_GET['loggedout']) )
        wp_redirect( add_query_arg('action', 'failed', get_template_directory_uri().'/zaloguj?err=failed') );
        else
        wp_redirect( add_query_arg('action', 'loggedout', get_template_directory_uri().'/zaloguj?err=loggedout') );
        exit;
    }
}
include get_template_directory() . '/inc/theme-options.php';
include get_template_directory() . '/inc/cpt.php';
include get_template_directory() . "/inc/api.php";