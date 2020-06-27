<?php
function steduty_switch_theme()
{
    switch_theme(WP_DEFAULT_THEME);
    unset($_GET['activated']);
    add_action('admin_notices', 'steduty_upgrade_notice');
}

add_action('after_switch_theme', 'steduty_switch_theme');

function steduty_upgrade_notice()
{
    $message = sprintf(__('web log requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'steduty'), $GLOBALS['wp_version']);
    printf('<div class="error"><p>%s</p></div>', $message);
}

function steduty_customize()
{
    wp_die(sprintf(__('web log requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'steduty'), $GLOBALS['wp_version']), '', array(
        'back_link' => true,
    ));
}

add_action('load-customize.php', 'steduty_customize');

function steduty_preview()
{
    if (isset($_GET['preview'])) {
        wp_die(sprintf(__('steduty requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'steduty'), $GLOBALS['wp_version']));
    }
}

add_action('template_redirect', 'steduty_preview');
