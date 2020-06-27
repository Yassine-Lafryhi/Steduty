<?php
if (get_theme_mod('home_style') == 'Simple') :
    $column = 'col-lg-12 masonry post';
else :
    $column = 'col-lg-12 masonry post';
endif;
$readmore = steduty_get_option('readmore_text');
$hide_category = steduty_get_option('post_categories');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($column); ?>>
    <div class="post-wrapper">
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>
        <?php endif; ?>
        <div class="post-content-wrapper">
            <?php
            $the_cat = get_the_category();
            if (!empty($the_cat)) {
                $category_name = $the_cat[0]->cat_name;
                $category_description = $the_cat[0]->category_description;
                $category_link = get_category_link($the_cat[0]->cat_ID);
            }
            if ($hide_category != 1) {
                ?>
                <span class="meta-category"><a href="<?php echo esc_url($category_link); ?>"><?php
                        echo esc_html($category_name); ?></a>
                </span>
            <?php } ?>
            <header class="entry-header">
                <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                <ul class="entry-meta list-inline">
                    <?php if ('post' === get_post_type()): steduty_posted_on(); endif; ?>
                    <?php if (!get_theme_mod('article_comment_link')) : ?>
                        <li class="meta-comment list-inline-item">
                            <?php $cmt_link = get_comments_link();
                            $num_comments = get_comments_number();
                            if ($num_comments == 0) {
                                $comment = __('No Comments', 'steduty');
                            } elseif ($num_comments > 1) {
                                $comment = $num_comments . __(' Comments', 'steduty');
                            } else {
                                $comment = __('1 Comment', 'steduty');
                            }
                            ?>
                            <i class="fa fa-comment-o" aria-hidden="true"></i>
                            <a href="<?php echo esc_url($cmt_link); ?>"><?php echo esc_html($comment); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </header>
            <div class="entry-content">
                <p>  <?php echo wp_kses_post(wp_trim_words(get_the_content(), 30)); ?></p>
                <div class="read-more"><a href="<?php the_permalink(); ?>"
                                          class="link"><?php echo esc_html($readmore); ?><i
                                class="fa fa-angle-right"></i></a></div>
            </div>
        </div>
    </div>
</article>
