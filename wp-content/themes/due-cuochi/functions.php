<?php
/**
 * Due cuochi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Due_cuochi
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function due_cuochi_setup() {

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'due-cuochi' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'due-cuochi' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'due_cuochi_setup' );


function due_cuochi_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'due-cuochi' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'due-cuochi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget', 'due-cuochi' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'due-cuochi' ),
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'News Sidebar', 'due-cuochi' ),
			'id'            => 'news-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'due-cuochi' ),
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'due_cuochi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function due_cuochi_scripts() {
	wp_enqueue_style( 'due-cuochi-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'due-cuochi-style', 'rtl', 'replace' );
	wp_register_style( 'Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
    wp_enqueue_style('Font_Awesome');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'fancy-css', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', array(), _S_VERSION );
	wp_enqueue_style( 'globals', get_template_directory_uri() . '/assets/css/globals.css', array(), _S_VERSION );
	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/css/theme-style.css', array(), _S_VERSION );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), _S_VERSION );

	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'fancy-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'masonry-js', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'due_cuochi_scripts' );

require get_template_directory() . '/inc/template-functions.php';
