<?php
if (!function_exists('steduty_top_header_menu_action')) :
    function steduty_top_header_menu_action()
    { ?>
        <div class="col-md-6 col-sm-12">
            <?php if (has_nav_menu('top-header')) : ?>
                <div class="navigation-section">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'top-header',
                            'menu_id' => 'top-header',
                            'menu_class' => 'main-menu',
                        ));
                        ?>
                    </nav>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
endif;

add_action('steduty_top_header_menu', 'steduty_top_header_menu_action');

if (!function_exists('steduty_top_header_social_icon_action')) :

    function steduty_top_header_social_icon_action()
    { ?>
        <div class="col-md-6 col-sm-12 social-links">
            <?php if (has_nav_menu('social')) : ?>
                <?php wp_nav_menu(array(
                    'theme_location' => 'social',
                    'menu_id' => 'social',
                    'menu_class' => 'social-info list-inline',
                ));
                ?>
            <?php endif; ?>
        </div>
    <?php }

endif;

add_action('steduty_top_header_social_icon', 'steduty_top_header_social_icon_action');

if (!function_exists('steduty_widgets_backend_enqueue')) :
    function steduty_widgets_backend_enqueue($hook)
    {
        if ('widgets.php' != $hook) {
            return;
        }
        wp_register_script('steduty-custom-widgets', get_template_directory_uri() . '/assets/js/widget.js', array('jquery'), true);
        wp_enqueue_media();
        wp_enqueue_script('steduty-custom-widgets');
    }

    add_action('admin_enqueue_scripts', 'steduty_widgets_backend_enqueue');
endif;
