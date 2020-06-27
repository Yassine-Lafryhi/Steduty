<?php
function steduty_body_classes($classes)
{
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    if (is_customize_preview()) {
        $classes[] = 'steduty-customizer';
    }
    if (is_front_page() && 'posts' !== get_option('show_on_front')) {
        $classes[] = 'steduty-front-page';
    }
    if (has_header_image()) {
        $classes[] = 'has-header-image';
    }
    if (is_active_sidebar('sidebar-1') && !is_page()) {
        $classes[] = 'has-sidebar';
    }
    if (is_page() || is_archive()) {
        if ('one-column' === get_theme_mod('page_layout')) {
            $classes[] = 'page-one-column';
        } else {
            $classes[] = 'page-two-column';
        }
    }
    if ('blank' === get_header_textcolor()) {
        $classes[] = 'title-tagline-hidden';
    }
    $sidebar_class = steduty_get_option('steduty_sidebar');
    if ($sidebar_class == "left-sidebar") {
        $classes[] = 'left-sidebar';
    } else {
        $classes[] = 'right-sidebar';
    }
    return $classes;
}

add_filter('body_class', 'steduty_body_classes');
function steduty_panel_count()
{
    $panel_count = 0;
    $num_sections = apply_filters('steduty_front_page_sections', 4);
    for ($i = 1; $i < (1 + $num_sections); $i++) {
        if (get_theme_mod('panel_' . $i)) {
            $panel_count++;
        }
    }
    return $panel_count;
}

function steduty_is_frontpage()
{
    return (is_front_page() && !is_home());
}
