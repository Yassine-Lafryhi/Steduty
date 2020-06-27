<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <div class="page-inner-wrap">
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <div class="entry-content">
            <?php
            the_content();
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'steduty'),
                'after' => '</div>',
            ));
            ?>
        </div>
        <div class="entry-footer">
            <?php steduty_edit_link(get_the_ID()); ?>
        </div>
    </div>
</article>
