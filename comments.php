<?php
if (post_password_required()) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php
    if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                printf(_x('One Reply to &ldquo;%s&rdquo;', 'comments title', 'steduty'), get_the_title());
            } else {
                printf(
                    _nx(
                        '%1$s Reply to &ldquo;%2$s&rdquo;',
                        '%1$s Replies to &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'steduty'
                    ),
                    number_format_i18n($comments_number),
                    get_the_title()
                );
            }
            ?>
        </h2>
        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'avatar_size' => 100,
                'style' => 'ol',
                'short_ping' => true,
                'reply_text' => __('Reply', 'steduty'),
            ));
            ?>
        </ol>
        <?php the_comments_pagination(array(
            'prev_text' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i><span class="screen-reader-text">' . __('Previous', 'steduty') . '</span>',
            'next_text' => '<span class="screen-reader-text">' . __('Next', 'steduty') . '</span><i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
        ));
    endif;
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'steduty'); ?></p>
    <?php
    endif;
    comment_form();
    ?>
</div>
