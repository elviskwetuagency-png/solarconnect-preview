<?php
/**
 * Solar Connect theme functions.
 * Fully custom-coded theme. All content and styling are managed by Claude via Novamira.
 */

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('automatic-feed-links');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    register_nav_menus([
        'primary' => __('Primary Menu', 'solarconnect'),
    ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'sck-global',
        get_stylesheet_directory_uri() . '/assets/global.css',
        [],
        filemtime(get_stylesheet_directory() . '/assets/global.css')
    );

    wp_enqueue_script(
        'sck-global',
        get_stylesheet_directory_uri() . '/assets/global.js',
        [],
        filemtime(get_stylesheet_directory() . '/assets/global.js'),
        true
    );

    if (is_front_page()) {
        wp_enqueue_script(
            'sck-home',
            get_stylesheet_directory_uri() . '/assets/home.js',
            ['sck-global'],
            filemtime(get_stylesheet_directory() . '/assets/home.js'),
            true
        );
    }

    if (function_exists('is_woocommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_account_page())) {
        wp_enqueue_style(
            'sck-woo',
            get_stylesheet_directory_uri() . '/assets/woo.css',
            ['sck-global'],
            filemtime(get_stylesheet_directory() . '/assets/woo.css')
        );
    }

    if (is_page_template(['page-about-a.php', 'page-about-b.php'])) {
        wp_enqueue_style(
            'sck-about',
            get_stylesheet_directory_uri() . '/assets/about.css',
            ['sck-global'],
            filemtime(get_stylesheet_directory() . '/assets/about.css')
        );
        wp_enqueue_script(
            'sck-about',
            get_stylesheet_directory_uri() . '/assets/about.js',
            [],
            filemtime(get_stylesheet_directory() . '/assets/about.js'),
            true
        );
    }

    wp_enqueue_style(
        'sck-geist-font',
        'https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600&display=swap',
        [],
        null
    );
});

/**
 * On every page except the homepage, the floating pill header has no hero
 * to scroll past, so show it immediately instead of waiting for scroll.
 */
add_filter('body_class', function ($classes) {
    /* About templates open with their own dark hero nav (like the homepage),
       so they keep the scroll-to-reveal behaviour instead. */
    if (!is_front_page() && !is_page_template(['page-about-a.php', 'page-about-b.php'])) {
        $classes[] = 'sck-interior';
    }
    return $classes;
});

require_once get_stylesheet_directory() . '/inc-shop-filters.php';


/**
 * This theme is full-width everywhere with no sidebar, but WooCommerce's
 * core templates still call woocommerce_sidebar(), which falls back to
 * WordPress's legacy default widget sidebar (Search/Pages/Archives/
 * Categories) since our theme has no sidebar.php. Remove it entirely.
 */
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
