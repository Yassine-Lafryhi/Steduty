<?php
$steduty_theme_path = get_template_directory();
require($steduty_theme_path . '/include/fonts.php');
function steduty_setup()
{
    load_theme_textdomain('steduty');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('steduty-featured-image', 1450, 480, true);
    add_image_size('steduty-thumbnail-1', 720, 480, true);
    add_image_size('steduty-thumbnail-2', 600, 200, true);
    add_image_size('steduty-random-thumb', 520, 400, true);
    add_image_size('steduty-thumbnail-3', 320, 240, true);
    add_image_size('steduty-thumbnail-4', 360, 240, true);
    add_image_size('steduty-thumbnail-5', 100, 75, true);
    add_image_size('steduty-thumbnail-avatar', 100, 100, true);
    $GLOBALS['content_width'] = 525;
    register_nav_menus(array(
        'top-header' => __('Top Header Menu', 'steduty'),
        'primary' => __('Primary Menu', 'steduty'),
        'social' => __('Social Links Menu', 'steduty'),
    ));
    add_theme_support('html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo', array(
        'width' => 550,
        'height' => 99,
        'flex-width' => true,
        'flex-height' => true,
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_editor_style(array('assets/css/editor.css', steduty_fonts_url()));
    add_theme_support('align-wide');
}

add_action('after_setup_theme', 'steduty_setup');
function steduty_content_width()
{
    $content_width = $GLOBALS['content_width'];
    $page_layout = get_theme_mod('page_layout');
    if ('one-column' === $page_layout) {
        if (steduty_is_frontpage()) {
            $content_width = 644;
        } elseif (is_page()) {
            $content_width = 740;
        }
    }
    if (is_single() && !is_active_sidebar('sidebar-1')) {
        $content_width = 740;
    }
    $GLOBALS['content_width'] = apply_filters('steduty_content_width', $content_width);
}

add_action('template_redirect', 'steduty_content_width', 0);
function steduty_resource_hints($urls, $relation_type)
{
    if (wp_style_is('steduty-fonts', 'queue') && 'preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}

add_filter('wp_resource_hints', 'steduty_resource_hints', 10, 2);
function steduty_widgets_init()
{
    register_sidebar(array(
        'name' => __('Blog Sidebar', 'steduty'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'steduty'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'steduty_widgets_init');
function steduty_javascript_detection()
{
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'steduty_javascript_detection', 0);
function steduty_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('wp_head', 'steduty_pingback_header');
function steduty_scripts()
{
    if (is_rtl()) {
        wp_enqueue_style('bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap-rtl.css');
    }
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('steduty', get_stylesheet_uri());
    if (is_customize_preview()) {

    }
    $steduty_l10n = array(
        'quote' => steduty_get_svg(array('icon' => 'quote-right')),
    );
    wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('steduty-theme', get_theme_file_uri('/assets/js/theme.js'), array('jquery'), '1.0', true);
    wp_localize_script('steduty-skip-link-focus-fix', 'stedutyScreenReaderText', $steduty_l10n);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'steduty_scripts');
function steduty_content_image_sizes_attr($sizes, $size)
{
    $width = $size[0];
    if (740 <= $width) {
        $sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
    }
    if (is_active_sidebar('sidebar-1') || is_archive() || is_search() || is_home() || is_page()) {
        if (!(is_page() && 'one-column' === get_theme_mod('page_options')) && 767 <= $width) {
            $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
        }
    }
    return $sizes;
}

add_filter('wp_calculate_image_sizes', 'steduty_content_image_sizes_attr', 10, 2);
function steduty_post_thumbnail_sizes_attr($attr, $attachment, $size)
{
    if (is_archive() || is_search() || is_home()) {
        $attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
    } else {
        $attr['sizes'] = '100vw';
    }
    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'steduty_post_thumbnail_sizes_attr', 10, 3);
function steduty_front_page_template($template)
{
    return is_home() ? '' : $template;
}

add_filter('frontpage_template', 'steduty_front_page_template');
function steduty_widget_tag_cloud_args($args)
{
    $args['largest'] = 12;
    $args['smallest'] = 12;
    $args['unit'] = 'px';
    $args['format'] = 'list';
    return $args;
}

add_filter('widget_tag_cloud_args', 'steduty_widget_tag_cloud_args');
require get_parent_theme_file_path('/include/template-tags.php');
require get_parent_theme_file_path('/include/template-functions.php');
require get_parent_theme_file_path('/include/customizer.php');
require get_parent_theme_file_path('/include/icon-functions.php');
require get_parent_theme_file_path('/include/hooks.php');





