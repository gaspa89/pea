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
    wp_enqueue_script('mappa-footer-js', get_stylesheet_directory_uri() . '/src/js/mappa-footer.js', array(), null, true);
    wp_enqueue_script('mappa-contattaci-js', get_stylesheet_directory_uri() . '/src/js/mappa-contattaci.js', array(), null, true);
    wp_enqueue_script( 'mappa-initializer-js', get_stylesheet_directory_uri() . '/src/js/mappa-initialize.js', array(), null, true);
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/js/swiper.min.js', array(), null, true);
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/css/swiper.min.css', array());

    //select2 libreria
    //wp_enqueue_style( 'select2_css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' );
    wp_enqueue_script( 'select2_js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', array('jquery'), '4.0.3', true );

    //libreria animate 
    wp_enqueue_style('animate-min-css', get_stylesheet_directory_uri() . '/src/assets/css/animate.min.css', array());

    //flickity
    wp_enqueue_script('flickity-js', get_stylesheet_directory_uri() . '/src/js/flickity.pkgd.min.js', array(), null, true);
    wp_enqueue_style('flickity-css', get_stylesheet_directory_uri() . '/src/flickity.css', array());

}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

//Definizione dinamica template directory uri per javascript 
add_action('admin_enqueue_scripts', 'scripts');
add_action('wp_enqueue_scripts', 'scripts');
function scripts() {
?>
<script>
    var themeURL = '<?php echo get_stylesheet_directory_uri(); ?>';
</script> 
<?php
}

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


//Implementazione shortcode contact form 
function add_shortcode_imageradio() {
    wpcf7_add_shortcode( 'imageradio', 'imageradio_handler', true );
    wpcf7_add_shortcode( 'select2', 'select2_handler', true );
}
add_action( 'wpcf7_init', 'add_shortcode_imageradio' );

function imageradio_handler( $tag ){
    $tag = new WPCF7_FormTag( $tag );

    $atts = array(
        'type' => 'radio',
        'name' => $tag->name,
        'list' => $tag->name . '-options' );

    $input = sprintf(
        '<input %s />',
        wpcf7_format_atts( $atts ) );
        $datalist = '';
        $datalist .= '<div class="imgradio row p-3">';
        foreach ( $tag->values as $val ) {
            list($radiovalue,$imagepath,$descrizione) = explode("!", $val);
            $datalist .= '<div class="col-4 col-md-2 text-center">';
                $datalist .= sprintf(
                '<label><input type="radio" name="%s" value="%s" class="hideradio" /><img src="'. get_stylesheet_directory_uri() .'/src/assets/%s"></label>%s', $tag->name, $radiovalue, $imagepath, $descrizione
                );
            $datalist .= '</div>';

    }
    $datalist .= '</div>';
    return $datalist;
}

//funzione handler per select2
function select2_handler($tag){
    $tag = new WPCF7_FormTag($tag);
    $atts = array(
        'type' => 'select',
        'name' => $tag->name,
        'list' => $tag->name . '-options' );
    
    $input = sprintf('<input %s />', wpcf7_format_atts($atts) );

    $datalist = '';
    $datalist .='<select class="select-interesse js-example-basic-multiple" name="servizi_interesse[]" multiple="multiple">';
    foreach ( $tag->values as $val ) {
        $datalist .= '<option value="'. $val .'">'. $val .'</option>';
    }
     $datalist .= '</select>';
     return $datalist;
}