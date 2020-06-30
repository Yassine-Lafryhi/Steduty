<?php get_header(); ?>
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div <?php if (get_theme_mod('pages_sidebar') == true) : ?> class="col-md-12" <?php else: ?>class="col-md-8" <?php endif; ?> >
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <?php
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/page/content', 'page');
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                        endwhile;
                        ?>
                    </main>
                </div>
            </div>
            <?php if (get_theme_mod('pages_sidebar') == false) : ?>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
