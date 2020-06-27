<?php
$header_status = steduty_get_option('show_top_header');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if (function_exists('wp_body_open')) {
    wp_body_open();
}
?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'steduty'); ?></a>
    <div class="mobile-menu-wrap">
        <div class="mobile-menu"></div>
    </div>
    <header id="masthead" class="site-header" role="banner">
        <div class="header-wrapper">
            <div class="mobile-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-bar-wrap text-center">
                                <div class="mobile-nav">
                                    <span class="menu-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                </div>
                                <div class="mobile-logo">
                                    <?php get_template_part('template-parts/header/site', 'branding'); ?>
                                </div>
                                <div class="mobile-search">
                                    <div class="search-icon">
                                        <a href="#" id="mobile-search"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </div>
                                    <div id="mobile-search-popup" class="search-off full-search-wrapper">
                                        <div id="search" class="open">
                                            <button data-widget="remove" id="close-icon" class="close" type="button"><i
                                                        class="fa fa-times" aria-hidden="true"></i></button>
                                            <?php echo get_search_form(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="navigation-section">
                                <nav id="site-navigation" class="main-navigation" role="navigation">
                                    <div class="menu-top-header-menu-container">
                                        <ul id="top-header" class="main-menu">
                                            <li id="menu-item-105"
                                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-105">
                                                <a title="" href="#">Accueil</a></li>
                                            <li id="menu-item-104"
                                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-104">
                                                <a title="" href="#">Bibliothèque</a></li>
                                            <li id="menu-item-106"
                                                class="menu-item menu-item-type-taxonomy menu-item-object-category current-post-ancestor current-menu-parent current-post-parent menu-item-106">
                                                <a title="" href="#">Bureau Des Étudiants</a></li>
                                            <li id="menu-item-115"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-115">
                                                <a title="" href="#">Clubs De L'<?php bloginfo('name'); ?></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 social-links">
                            <div class="menu-social-container">
                                <ul id="social" class="social-info list-inline">
                                    <?php
                                    if (steduty_get_option('facebook_icon') == "show") {
                                        echo "<a class='fa fa-facebook' id='social_networks_icons' href=" . steduty_get_option('facebook_link') . "></a>";
                                    }
                                    if (steduty_get_option('twitter_icon') == "show") {
                                        echo "<a class='fa fa-twitter' id='social_networks_icons'  href=" . steduty_get_option('twitter_link') . "></a>";
                                    }
                                    if (steduty_get_option('instagram_icon') == "show") {
                                        echo "<a class='fa fa-instagram' id='social_networks_icons'  href=" . steduty_get_option('instagram_link') . "></a>";
                                    }
                                    if (steduty_get_option('youtube_icon') == "show") {
                                        echo "<a class='fa fa-youtube' id='social_networks_icons' href=" . steduty_get_option('youtube_link') . "></a>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($header_status == '1') : ?>
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <?php do_action('steduty_top_header_menu');
                            do_action('steduty_top_header_social_icon');
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="header-logo">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 desktop-logo" style="display: flex;">
                            <?php get_template_part('template-parts/header/site', 'branding'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (has_nav_menu('primary')) : ?>
                                <div class="navigation-section">
                                    <nav id="site-navigation" class="main-navigation" role="navigation">
                                        <?php wp_nav_menu(array(
                                            'theme_location' => 'primary',
                                            'menu_id' => 'primary-menu',
                                            'menu_class' => 'main-menu',
                                        ));
                                        ?>
                                    </nav>
                                </div>
                            <?php endif; ?>
                            <div class="mini-search-icon">
                                <a href="#" id="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                            <div id="search-popup" class="search-off full-search-wrapper">
                                <div id="search" class="open">
                                    <button data-widget="remove" id="removeClass" class="close" type="button"><i
                                                class="fa fa-times" aria-hidden="true"></i></button>
                                    <?php echo get_search_form(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php if (!is_front_page()) : ?>
        <section class="page-header jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (is_page() || is_single()) { ?>
                            <h1 class="page-title"><?php echo esc_html(get_the_title()); ?></h1>
                        <?php } elseif (is_search()) { ?>
                            <h1 class="page-title"><?php printf(esc_html__('Search Results for: %s', 'steduty'), '<span>' . get_search_query() . '</span>'); ?></h1>
                        <?php } elseif (is_404()) { ?>
                            <h1 class="page-title"><?php echo esc_html('Page Not Found: 404', 'steduty'); ?></h1>
                        <?php } elseif (is_home()) { ?>
                            <h1 class="page-title"><?php single_post_title(); ?></h1>
                        <?php } else {
                            the_archive_title('<h1 class="page-title">', '</h1>');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
