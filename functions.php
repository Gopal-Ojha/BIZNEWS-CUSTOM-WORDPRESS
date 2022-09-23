<?php 


function biznews_theme_setup() {
    
    add_theme_support('custom-logo', array(
        'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'Blog Site', 'Technology News' ),
		'unlink-homepage-logo' => true, 
	
    ));

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support( 'post-formats', array( 'image', 'video', 'gallery' ) );

    add_image_size('biznews-slider-full', 1115, 715, true); // width, height, crop
    add_image_size('biznews-slider-center', 800, 500, true); // width, height, crop
    add_image_size('biznews-featured', 700, 435, true ); // width, height, crop
    add_image_size('biznews-medium', 540, 340, true); // width, height, crop
    add_image_size('biznews-medium-square', 400, 250, true); // width, height, crop
    add_image_size('biznews-cat', 364, 206, true); // width, height, crop

    add_theme_support('automatic-feed-links');

    add_theme_support('menus');

register_nav_menus(array(
    'primary-nav' => esc_html__('Primary Menu', 'biznews'),
    'top-nav' => esc_html__('Top Menu', 'biznews'),
    'footer-nav' => esc_html__('Footer Menu', 'biznews'),
));
};
add_action('after_setup_theme', 'biznews_theme_setup');


function biznews_scripts(){

    wp_enqueue_style( 'preconnect','https://fonts.gstatic.com',array(),'1.1','all');
    wp_enqueue_style( 'Google Web Fonts','https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap',array(),'1.1','all');
    wp_enqueue_style( 'Font Awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css',array(),'1.1','all');
    wp_enqueue_style( 'Libraries Stylesheet', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css',array(),'1.1','all');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css',array(),'1.1','all');
    wp_enqueue_style( 'min.style', get_template_directory_uri() . '/css/min.style.css',array(),'1.1','all');

    
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'easing', get_template_directory_uri() . '/lib/easing/easing.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', array ( 'jquery' ), time(), true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), time(), true);
    
}
add_action('wp_enqueue_scripts', 'biznews_scripts'); 

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function biznews_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'biznews' ),
        'id'            => 'main-sidebar',
        'description'   => 'Main Sidebar on Right Side',
        'before_widget' => '<section id="%1$s" class="box %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<header><h3 class="widget-title">',
        'after_title'   => '</h3></header>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Home Banner', 'biznews' ),
        'id'            => 'home-banner',
        'description'   => 'Banner Area on Homepage',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Home Services', 'biznews' ),
        'id'            => 'home-services',
        'description'   => 'Services Area on Homepage',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'GET IN TOUCH', 'biznews' ),
        'id'            => 'getintouch',
        'before_widget' => '<div class="col-lg-3 col-md-6 mb-5">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="mb-4 text-white text-uppercase font-weight-bold">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => __( 'POPULAR NEWS', 'biznews' ),
        'id'            => 'popularnews',
        'before_widget' => '<div class="col-lg-3 col-md-6 mb-5">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="mb-4 text-white text-uppercase font-weight-bold">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => __( 'CATEGORIES', 'biznews' ),
        'id'            => 'categories',
        'before_widget' => '<div class="col-lg-3 col-md-6 mb-5">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="mb-4 text-white text-uppercase font-weight-bold">',
        'after_title'   => '</h5>',
    ) );

    register_sidebar( array(
        'name'          => __( 'FLICKR PHOTOS', 'biznews' ),
        'id'            => 'flickrphotos',
        'before_widget' => '<div class="col-lg-3 col-md-6 mb-5">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="mb-4 text-white text-uppercase font-weight-bold">',
        'after_title'   => '</h5>',
    ) );

    register_sidebar( array(
        'name'          => __( 'FOLLOW US', 'biznews' ),
        'id'            => 'followus',
        'before_widget' => '<div class="bg-white border border-top-0 p-3">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => __( 'ADVERTISEMENT', 'biznews' ),
        'id'            => 'advertisement',
        'before_widget' => '<div class="bg-white text-center border border-top-0 p-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="mb-4 text-white text-uppercase font-weight-bold">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => __( 'TRANDING NEWS', 'biznews' ),
        'id'            => 'trending',
        'before_widget' => '<div class="col-lg-3 col-md-6 mb-5">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="mb-4 text-white text-uppercase font-weight-bold">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => __( 'NEWSLETTER', 'biznews' ),
        'id'            => 'newsletter',
        'before_widget' => '<div class="bg-white text-center border border-top-0 p-3">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'TAGS', 'biznews' ),
        'id'            => 'tags',
        'before_widget' => '<div class="d-flex flex-wrap m-n1">',
        'after_widget'  => '</div>',
        'before_title'  => ' ',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'biznews_widgets_init' );


?>