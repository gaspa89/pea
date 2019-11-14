<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

show_admin_bar( false );

//Paths personalizzate tema
include_once get_stylesheet_directory() . '/theme-path.php';

add_image_size( 'slide_servizio', 760, 510, true );

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/js/swiper.min.js', array(), null, true);
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/css/swiper.min.css', array());

    //flickity
    wp_enqueue_script('flickity-js', get_stylesheet_directory_uri() . '/src/js/flickity.pkgd.min.js', array(), null, true);
    wp_enqueue_style('flickity-css', get_stylesheet_directory_uri() . '/src/flickity.css', array());

}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

//SUPPORTO UPLOAD SVG
function pea_svg_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'pea_svg_uploads');

function pea_custom_logo(){
    $html = '<img src="' . get_stylesheet_directory_uri() .'/src/assets/logo-agenzia-Pea-white.svg">';
    return $html;
}

//register custom footer sidebar
$args_footer_1 = array(
    'name'          => __( 'Footer 1 colonna', 'pea-child' ),
    'id'            => 'footer-1',    // ID should be LOWERCASE  ! ! !
    'before_widget' => '',
    'after_widget'  => '',
    ); 
register_sidebar( $args_footer_1 );

//register custom footer sidebar
$args_footer_2 = array(
    'name'          => __( 'Footer 2 colonna', 'pea-child' ),
    'id'            => 'footer-2',    // ID should be LOWERCASE  ! ! !
    'before_widget' => '',
    'after_widget'  => '',
    ); 
register_sidebar( $args_footer_2 );

//register custom footer sidebar
$args_footer_3 = array(
    'name'          => __( 'Footer 3 colonna', 'pea-child' ),
    'id'            => 'footer-3',    // ID should be LOWERCASE  ! ! !
    'before_widget' => '',
    'after_widget'  => '',
    ); 
register_sidebar( $args_footer_3 );
