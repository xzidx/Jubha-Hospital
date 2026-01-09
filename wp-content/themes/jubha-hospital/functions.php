<?php
// -------------------------
// THEME SETUP
// -------------------------
function mytheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => 'Primary Menu',
    ]);
}
add_action('after_setup_theme', 'mytheme_setup');

function jubha_theme_styles() {

    // Global styles (includes header + footer)
    wp_enqueue_style(
        'jubha-style',
        get_stylesheet_uri(),
        [],
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // Front page only
    if (is_front_page()) {
        wp_enqueue_style(
            'front-page-style',
            get_stylesheet_directory_uri() . '/css/front-page.css',
            ['jubha-style'],
            filemtime(get_stylesheet_directory() . '/css/front-page.css')
        );
    }

    // Services page
    if (is_page('services')) {
        wp_enqueue_style(
            'services-style',
            get_stylesheet_directory_uri() . '/css/services.css',
            ['jubha-style'],
            filemtime(get_stylesheet_directory() . '/css/services.css')
        );
    }













































































    


// vannara-space






















































































































}
add_action('wp_enqueue_scripts', 'jubha_theme_styles');
