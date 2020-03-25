<?php
/**
 * steduty functions and definitions
 * @package steduty
 * @version 1.0.0
 */

/**
 * steduty only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/include/back-compat.php';
	return;
}

//set font
$steduty_theme_path = get_template_directory();

require( $steduty_theme_path .'/include/fonts.php');

// Widgets.

require( get_template_directory() . '/widgets/recent-post-widget.php' );

require( get_template_directory() . '/widgets/author-widget.php' );


 //Sets up theme defaults and registers support for various WordPress features.
function steduty_setup() {
	
	//Make theme available for translation.
	load_theme_textdomain( 'steduty' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'steduty-featured-image', 1450, 480, true );
	add_image_size( 'steduty-thumbnail-1', 720, 480, true );
	add_image_size( 'steduty-thumbnail-2', 600, 200, true );
	add_image_size( 'steduty-random-thumb', 520, 400, true );
	add_image_size( 'steduty-thumbnail-3', 320, 240, true );
	add_image_size( 'steduty-thumbnail-4', 360, 240, true );
	add_image_size( 'steduty-thumbnail-5', 100, 75, true );
	add_image_size( 'steduty-thumbnail-avatar', 100, 100, true );
	
	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top-header' => __( 'Top Header Menu', 'steduty' ),
		'primary'    => __( 'Primary Menu', 'steduty' ),
		'social'     => __( 'Social Links Menu', 'steduty' ),
	) );

	//Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 550,
		'height'      => 99,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor.css', steduty_fonts_url() ) );

   // Add theme support for gutenberg-editor
	
	 add_theme_support( 'align-wide' );
	
}
add_action( 'after_setup_theme', 'steduty_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * @global int $content_width
 */
function steduty_content_width() {

	$content_width = $GLOBALS['content_width'];
	
	// Get layout.
	$page_layout   = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {

		if ( steduty_is_frontpage() ) {

			$content_width = 644;

		} elseif ( is_page() ) {

			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter steduty content width of the theme.
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'steduty_content_width', $content_width );
}
add_action( 'template_redirect', 'steduty_content_width', 0 );


/**
 * Add preconnect for Google Fonts.
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function steduty_resource_hints( $urls, $relation_type ) {

	if ( wp_style_is( 'steduty-fonts', 'queue' ) && 'preconnect' === $relation_type ) {

		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'steduty_resource_hints', 10, 2 );

/**
 * Register widget areas.
 */
function steduty_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'steduty' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'steduty' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'steduty_widgets_init' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 */
function steduty_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'steduty_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function steduty_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'steduty_pingback_header' );

/**
 * Enqueue scripts and styles.
 */

function steduty_scripts() {

	
	if ( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap-rtl.css');
    }

	//Bootstrap stylesheet.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );

	
	// Theme stylesheet.
	wp_enqueue_style( 'steduty', get_stylesheet_uri() );
	

	//Fontawesome web stylesheet.
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );

	//Animate
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );


	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'steduty-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'steduty-style' ), '1.0' );
		wp_style_add_data( 'steduty-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'steduty-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'steduty-style' ), '1.0' );
	wp_style_add_data( 'steduty-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'steduty-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$steduty_l10n = array(
		'quote'          => steduty_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	wp_enqueue_script( 'steduty-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );
	
	
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), '1.0', true );
		
	wp_enqueue_script( 'jquery-easing', get_theme_file_uri( '/assets/js/jquery.easing.js' ), array( 'jquery' ), '1.0', true );
    
	wp_enqueue_script( 'steduty-theme', get_theme_file_uri( '/assets/js/theme.js' ), array( 'jquery' ), '1.0', true );

	wp_localize_script( 'steduty-skip-link-focus-fix', 'stedutyScreenReaderText', $steduty_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'steduty_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *	values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function steduty_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'steduty_content_image_sizes_attr', 10, 2 );


/**
 * Add custom image sizes attribute to enhance responsive image functionality for post thumbnails.
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function steduty_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'steduty_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function steduty_front_page_template( $template ) {
	
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'steduty_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size and use list format for better accessibility.
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function steduty_widget_tag_cloud_args( $args ) {
	$args['largest']  = 12;
	$args['smallest'] = 12;
	$args['unit']     = 'px';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'steduty_widget_tag_cloud_args' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/include/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/include/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/include/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/include/icon-functions.php' );

/**
 * breadcrumb.
 */
require get_parent_theme_file_path( '/template-parts/header/breadcrumb.php' );


/**
 * hooks function.
 */
require get_parent_theme_file_path( '/include/hooks.php' );





