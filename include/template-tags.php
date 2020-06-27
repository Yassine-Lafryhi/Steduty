<?php
if (!function_exists('steduty_posted_on')) :
    function steduty_posted_on()
    {
        $byline = sprintf('<span class="author vcard"><i class="fa fa-user-o" aria-hidden="true"></i><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>');
        if (!get_theme_mod('article_author')) :
            echo '<li class="byline list-inline-item">' . $byline . '</li>';
        endif;
        if (!get_theme_mod('article_date_area')) :
            echo '<li class="posted-on list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i>' . steduty_time_link() . '</li>';
        endif;
    }
endif;
if (!function_exists('steduty_time_link')) :
    function steduty_time_link()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        $archive_year = get_the_time('Y');
        $archive_month = get_the_time('m');
        $archive_day = get_the_time('d');
        $time_string = sprintf($time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );
        return sprintf(
            __('<span class="screen-reader-text">Posted on</span> %s', 'steduty'),
            '<a href="' . esc_url(get_day_link($archive_year, $archive_month, $archive_day)) . '" rel="bookmark">' . $time_string . '</a>'
        );
    }
endif;
if (!function_exists('steduty_entry_footer')) :
    function steduty_entry_footer()
    {
        $separate_meta = __(', ', 'steduty');
        $categories_list = get_the_category_list($separate_meta);
        $tags_list = get_the_tag_list('', $separate_meta);
        if (((steduty_categorized_blog() && $categories_list) || $tags_list) || get_edit_post_link()) {
            echo '<footer class="entry-footer">';
            if ('post' === get_post_type()) {
                if (($categories_list && steduty_categorized_blog()) || $tags_list) {
                    echo '<span class="cat-tags-links">';
                    if ($categories_list && steduty_categorized_blog()) {
                        echo '<span class="cat-links">' . steduty_get_svg(array('icon' => 'folder-open')) . '<span class="screen-reader-text">' . esc_html__('Categories', 'steduty') . '</span>' . esc_html($categories_list) . '</span>';
                    }
                    if ($tags_list && !is_wp_error($tags_list)) {
                        echo '<span class="tags-links">' . steduty_get_svg(array('icon' => 'hashtag')) . '<span class="screen-reader-text">' . esc_html__('Tags', 'steduty') . '</span>' . esc_html($tags_list) . '</span>';
                    }
                    echo '</span>';
                }
            }
            steduty_edit_link();
            echo '</footer>';
        }
    }
endif;
if (!function_exists('steduty_edit_link')) :
    function steduty_edit_link()
    {
        edit_post_link(
            sprintf(
                __('Edit<span class="screen-reader-text"> "%s"</span>', 'steduty'),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;
function steduty_categorized_blog()
{
    $category_count = get_transient('steduty_categories');
    if (false === $category_count) {
        $categories = get_categories(array(
            'fields' => 'ids',
            'hide_empty' => 1,
            'number' => 2,
        ));
        $category_count = count($categories);
        set_transient('steduty_categories', $category_count);
    }
    if (is_preview()) {
        return true;
    }

    return $category_count > 1;
}

function steduty_category_transient_flusher()
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    delete_transient('steduty_categories');
}

add_action('edit_category', 'steduty_category_transient_flusher');
add_action('save_post', 'steduty_category_transient_flusher');
