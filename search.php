<?php
get_header(); ?>
    <div id="content" class="site-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <div class="steduty-post-list">
                                <?php if (have_posts()) :
                                    while (have_posts()) : the_post();
                                        if (get_post_type() === 'page') continue;
                                        get_template_part('template-parts/post/content');
                                    endwhile;
                                else : ?>
                                    <article class="wrong-search-wrapper text-center post">
                                        <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'steduty'); ?></p>
                                        <?php get_search_form(); ?>
                                    </article>
                                <?php endif; ?>
                            </div>
                            <?php the_posts_pagination(); ?>
                        </main>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();
