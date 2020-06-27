<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrapper">
        <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            <ul class="entry-meta list-inline">
                <?php steduty_posted_on(); ?>
                <?php if (!get_theme_mod('post_categories')) : ?>
                    <?php if (has_category()):
                        echo '<li class="meta-categories list-inline-item"><i class="fa fa-folder-o" aria-hidden="true"></i>';
                        the_category(',');
                        echo '</li>';
                    endif; ?>
                <?php endif; ?>
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
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <?php if (!get_theme_mod('article_tags') && has_tag()) : ?>
            <div class="entry-footer">
                <div class="meta-left">
                    <?php if (has_tag()): ?>
                        <div class="tag-list">
                            <?php the_tags('<i class="fa fa-tags" aria-hidden="true"></i>'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</article>

