<?php
get_header();
$sidebar_class = steduty_get_option('steduty_sidebar');
?>
<section class="page-header jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">LES DERNIÈRES ACTUALITÉS</h1>
            </div>
        </div>
    </div>
</section>
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <?php $posts_per_page = get_option('posts_per_page'); ?>
            <div <?php if (get_theme_mod('home_sidebar') == true) : ?> class="col-md-6" <?php else : ?>class="col-md-6 <?php echo $sidebar_class; ?>" <?php endif; ?>>
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <div class="steduty-post-grid row">
                            <?php
                            if (have_posts()) :
                                $i = 0;
                                while (have_posts()) : the_post();
                                    if ($i % 2 == 0) {
                                        if ($i + 1 != $posts_per_page) {
                                            get_template_part('template-parts/post/content');
                                        }
                                    }
                                    $i++;
                                endwhile;
                            else :
                                get_template_part('template-parts/post/content', 'none');
                            endif;
                            ?>
                        </div>
                    </main>
                </div>
            </div>
            <div <?php if (get_theme_mod('home_sidebar') == true) : ?> class="col-md-6" <?php else : ?>class="col-md-6 <?php echo $sidebar_class; ?>" <?php endif; ?>>
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <div class="steduty-post-grid row">
                            <?php
                            if (have_posts()) :
                                $i = 0;
                                while (have_posts()) : the_post();
                                    if ($i % 2 == 1) {
                                        get_template_part('template-parts/post/content');
                                    }
                                    $i++;
                                endwhile;
                            else :
                                get_template_part('template-parts/post/content', 'none');
                            endif;
                            ?>
                        </div>
                    </main>
                </div>
            </div>


            <div style="margin-top: 26px; <?php if($posts_per_page%2==0) echo ' display: none;'?>" <?php if (get_theme_mod('home_sidebar') == true) : ?> class="col-md-12" <?php else : ?>class="col-md-12 <?php echo $sidebar_class; ?>" <?php endif; ?>>
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <div class="steduty-post-grid row">
                            <?php
                            if (have_posts()) :
                                while (have_posts()) : the_post();
                                endwhile;
                                get_template_part('template-parts/post/content');
                            else :
                                get_template_part('template-parts/post/content', 'none');
                            endif;
                            ?>
                        </div>
                    </main>
                </div>
            </div>


            <div <?php if (get_theme_mod('home_sidebar') == true) : ?> class="col-md-12" <?php else : ?>class="col-md-12 <?php echo $sidebar_class; ?>" <?php endif; ?>>
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <div class="pagination-wrap">
                            <?php the_posts_pagination(); ?>
                        </div>
                    </main>
                </div>
            </div>


            <?php if (get_theme_mod('home_sidebar') == false) : ?>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <aside class="page-header jumbotron">
                    <h1 class="page-title">Mot Du Directeur</h1>
                </aside>
                <br>
                <aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
                    <section id="recent-posts-3" class="widget widget_recent_entries">
                        <img src="<?php echo steduty_get_option('photo_the_director'); ?>" class="rounded-circle"
                             alt="Phot the Director" width="140px" height="236">
                        <div style="text-align: center">
                            <h2> <?php echo steduty_get_option('name_the_director'); ?></h2>
                        </div>
                        <h3 style="text-align:justify;">
                            <?php
                            echo steduty_get_option('word_the_director');
                            ?>
                        </h3>
                    </section>
                </aside>
            </div>
            <div class="col-md-6">
                <aside class="page-header jumbotron">
                    <h1 class="page-title">Témoignage</h1>
                </aside>
                <br>
                <aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
                    <section id="recent-posts-3" class="widget widget_recent_entries" style="text-align:justify;">
                        <img src="<?php echo steduty_get_option('photo_the_testimony'); ?>" class="rounded-circle"
                             alt="Phot the Testimony" width="140px" height="236">
                        <div style="text-align: center">
                            <h2> <?php echo steduty_get_option('name_the_testimony'); ?></h2>
                        </div>
                        <h3> <?php
                            echo steduty_get_option('the_testimony');
                            ?></h3>
                        <div style="float: right;font-style: italic;">
                            <?php
                            echo steduty_get_option('job_testimony');
                            ?>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
</div>
<section id="school" class="page-header jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title"><?php bloginfo('name'); ?> en chiffres</h1>
            </div>
        </div>
    </div>
</section>
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
                    <section id="recent-posts-3" class="widget widget_recent_entries">
                        <div class="counter-block-wrapper clearfix" style="
    text-align: center;
    /* font-family: 'Quicksand', sans-serif; */
">
                            <span class="counter-icon"> <i class="fa fa-users" style="
    color: #009688;
     width: 80px;
    font-size: 48px;
    /* font-family: 'Quicksand', sans-serif; */
"></i> </span><br><span id="etudiants" class="counter" style="
    font-size: 26px;
"><?php
                                echo steduty_get_option('students_number_text');
                                ?>
                            </span><br><span class="counter-text" style="
    font-size: 26px;
">Étudiants</span></div>
                    </section>
                </aside>
            </div>
            <div class="col-md-3">
                <aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
                    <section id="recent-posts-3" class="widget widget_recent_entries">
                        <div class="counter-block-wrapper clearfix" style="
    text-align: center;
    /* font-family: 'Quicksand', sans-serif; */
">
                            <span class="counter-icon"> <i class="fa fa-graduation-cap" style="
    color: #009688;
     width: 80px;
    font-size: 48px;
    /* font-family: 'Quicksand', sans-serif; */
"></i> </span><br><span id="laureats" class="counter" style="
    font-size: 26px;
"><?php
                                echo steduty_get_option('laureats_number_text');
                                ?></span><br><span class="counter-text" style="
    font-size: 26px;
">Lauréats</span></div>
                    </section>
                </aside>
            </div>
            <div class="col-md-3">
                <aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
                    <section id="recent-posts-3" class="widget widget_recent_entries">
                        <div class="counter-block-wrapper clearfix" style="
    text-align: center;
    /* font-family: 'Quicksand', sans-serif; */
">
                            <span class="counter-icon"> <i class="fa fa-university" style="
    color: #009688;
     width: 80px;
    font-size: 48px;
    /* font-family: 'Quicksand', sans-serif; */
"></i> </span><br><span id="departements" class="counter" style="
    font-size: 26px;
"><?php
                                echo steduty_get_option('departments_number_text');
                                ?></span><br><span class="counter-text" style="
    font-size: 26px;
">Départements</span></div>
                    </section>
                </aside>
            </div>
            <div class="col-md-3">
                <aside id="secondary" class="widget-area" role="complementary" aria-label="Blog Sidebar">
                    <section id="recent-posts-3" class="widget widget_recent_entries">
                        <div class="counter-block-wrapper clearfix" style="
    text-align: center;
    /* font-family: 'Quicksand', sans-serif; */
">
                            <span class="counter-icon"> <i class="fa fa-user" style="
    color: #009688;
     width: 80px;
    font-size: 48px;
    /* font-family: 'Quicksand', sans-serif; */
"></i> </span><br><span id="enseignants" class="counter" style="
    font-size: 26px;
"><?php
                                echo steduty_get_option('teachers_number_text');
                                ?>
                            </span><br><span class="counter-text" style="
    font-size: 26px;
">Enseignants</span></div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        function isScrolledIntoView(elem) {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();
            var elemTop = $(elem).offset().top;
            var elemBottom = elemTop + $(elem).height();
            return (elemTop <= docViewBottom);
        }

        var enseignants = 1;
        var etudiants = 1;
        var laureats = 1;
        var departements = 1;
        var myelement = $('#school'); // the element to act on if viewable
        $(window).scroll(function () {
            if (isScrolledIntoView(myelement)) {
                if (enseignants === 1) {
                    var val1 = window.setInterval(counter1, 10);

                    function counter1() {
                        enseignants++;
                        document.getElementById("enseignants").textContent = enseignants;
                        ;
                        if (enseignants ===
                        <?php
                            echo steduty_get_option('teachers_number_text');
                            ?>

                        ) {
                            window.clearInterval(val1);
                        }
                    }
                }
                if (etudiants === 1) {
                    var val2 = window.setInterval(counter2, 10);

                    function counter2() {
                        etudiants++;
                        document.getElementById("etudiants").textContent = etudiants;
                        ;
                        if (etudiants === <?php echo steduty_get_option('students_number_text'); ?>) {
                            window.clearInterval(val2);
                        }
                    }
                }
                if (laureats === 1) {
                    var val3 = window.setInterval(counter3, 10);

                    function counter3() {
                        laureats++;
                        document.getElementById("laureats").textContent = laureats;
                        ;
                        if (laureats === <?php echo steduty_get_option('laureates_number_text'); ?>) {
                            window.clearInterval(val3);
                        }
                    }
                }
                if (departements === 1) {
                    var val4 = window.setInterval(counter4, 10);

                    function counter4() {
                        departements++;
                        document.getElementById("departements").textContent = departements;
                        if (departements === <?php echo steduty_get_option('departments_number_text'); ?>) {
                            window.clearInterval(val4);
                        }
                    }
                }
            }
        });
    });
</script>
<?php get_footer(); ?>
