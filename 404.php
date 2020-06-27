<?php get_header(); ?>
    <div id="content" class="site-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <section class="error-404 not-found text-center post-wrapper">
                                <div class="page-content">
                                    <p><?php echo esc_html__('It looks like nothing was found at this location. Maybe try a search?', 'steduty'); ?>
                                    </p>
                                    <?php get_search_form(); ?>
                                </div>
                            </section>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
