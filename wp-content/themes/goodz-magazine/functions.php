<?php
/**
 * goodz-magazine functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Goodz Magazine
 */

if ( ! function_exists( 'goodz_magazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function goodz_magazine_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on goodz-magazine, use a find and replace
	 * to change 'goodz-magazine' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'goodz-magazine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Add thumbnail image sizes
	 */
	add_image_size( 'goodz-magazine-archive-featured-image', 692, 463, true );
	add_image_size( 'goodz-magazine-video-featured-image', 348, 233, true );
	add_image_size( 'goodz-magazine-sticky-featured-image', 1084, 725, true );
	add_image_size( 'goodz-magazine-single-featured-image', 1620, 999999, false );
	add_image_size( 'goodz-magazine-logo', 340, 999999, false );
	add_image_size( 'goodz-magazine-related-post', 353, 227, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'goodz-magazine' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'gallery',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'goodz_magazine_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enables theme styles the visual with editor-style.css
	add_editor_style();

}
endif; // goodz_magazine_setup
add_action( 'after_setup_theme', 'goodz_magazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function goodz_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'goodz_magazine_content_width', 1660 );
}
add_action( 'after_setup_theme', 'goodz_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function goodz_magazine_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'goodz-magazine' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'goodz-magazine' ),
		'id'            => 'footer-widget-1',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'goodz-magazine' ),
		'id'            => 'footer-widget-2',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', 'goodz-magazine' ),
		'id'            => 'footer-widget-3',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
}
add_action( 'widgets_init', 'goodz_magazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function goodz_magazine_scripts() {
	wp_enqueue_style( 'goodz-magazine-style', get_stylesheet_uri() );

	// Fancybox style
	wp_enqueue_style( 'fancybox-style', get_template_directory_uri() . '/js/fancybox/fancybox.css' );

	wp_enqueue_script( 'goodz-magazine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'goodz-magazine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/js/slick/slick.js', false, false, true );
	wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/js/infinite-scroll/infinite-scroll.min.js', array( 'jquery', 'masonry' ), false, true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox/fancybox.pack.js', false, false, true );
	wp_enqueue_script( 'fancybox-helper', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-media.js', false, false, true );

	// Main JS file
	wp_enqueue_script( 'goodz-magazine-call-scripts', get_template_directory_uri() . '/js/common.js', array( 'jquery', 'masonry' ), false, true );

	// Get and define JS vars
	$infinite_scroll_type = get_theme_mod( 'infinite_scroll_type', 'click' );
	$paging_type          = get_theme_mod( 'paging_setting', 'infinite_scroll' );

	$js_vars = array(
		'url'          => get_template_directory_uri(),
		'is_type'      => $infinite_scroll_type,
		'paging_type'  => $paging_type,
		'no_more_text' => esc_html__( 'No more posts to load.', 'goodz-magazine' )
	);

	// Localize php variables
	wp_localize_script( 'goodz-magazine-call-scripts', 'js_vars', $js_vars );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'goodz_magazine_scripts' );

/* ADMIN SCRIPT AND STYLE */
function goodz_magazine_add_admin_scripts() {
	// Admin styles
	wp_register_style( 'goodz-magazine-admin-css', get_template_directory_uri() . '/inc/admin/admin.css' );
	wp_enqueue_style( 'goodz-magazine-admin-css' );
	wp_enqueue_style( 'wp-color-picker' );

	// Admin scripts
	wp_enqueue_media();
	wp_enqueue_script( 'my-upload' );
	wp_enqueue_script( 'jquery-ui' );
	wp_enqueue_script( 'goodz-magazine-admin-js', get_template_directory_uri() . '/inc/admin/admin.js' );
}
add_action( 'admin_enqueue_scripts', 'goodz_magazine_add_admin_scripts' );

/**
 * Change theme color support
 */
function goodz_magazine_change_color() {
	get_template_part( 'inc/change-colors' );
}
add_action( 'wp_head', 'goodz_magazine_change_color', '99' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

require get_template_directory() . '/inc/noerror.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Plugin Activation
 */
require get_template_directory() . '/inc/plugin-activation.php';

/**
 * Load Meta Boxes Config
 */
require get_template_directory() . '/inc/meta-boxes.php';