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

    if (is_page_template(sck_hero_templates())) {
        wp_enqueue_style(
            'sck-pages',
            get_stylesheet_directory_uri() . '/assets/pages.css',
            ['sck-global'],
            filemtime(get_stylesheet_directory() . '/assets/pages.css')
        );
        wp_enqueue_script(
            'sck-pages',
            get_stylesheet_directory_uri() . '/assets/pages.js',
            [],
            filemtime(get_stylesheet_directory() . '/assets/pages.js'),
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
    if (!is_front_page() && !is_page_template(sck_hero_templates())) {
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

/**
 * Content-page templates that open with their own dark hero nav and use
 * assets/pages.css (About, Contact, FAQs). Single source for the enqueue,
 * the body class and the header's "Get a quote" target.
 */
function sck_hero_templates() {
    return ['page-about-a.php', 'page-about-b.php', 'page-contact.php', 'page-faqs.php'];
}

/**
 * Keep the user list out of the public XML sitemap: it only exposes the
 * admin login name and has no value for search engines on a shop site.
 */
add_filter('wp_sitemaps_add_provider', function ($provider, $name) {
    return $name === 'users' ? false : $provider;
}, 10, 2);

/**
 * No page uses a Contact Form 7 form (the contact and quote forms hand off
 * to WhatsApp), so don't load CF7's scripts and styles on every page.
 * Remove these two lines if a CF7 form is added later.
 */
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');

/**
 * Rank Math schema on pages: Rank Math only builds the schema graph
 * (Organization, WebSite, WebPage) when pages have a default schema type,
 * and its page default adds a blog Article + author Person, which is wrong
 * for About/Contact/FAQs. Keep the graph, drop Article/Person on pages, and
 * mark About and Contact with their specific WebPage types.
 */
add_filter('rank_math/json_ld', function ($data) {
    if (!is_page() || !is_array($data)) return $data;
    foreach ($data as $key => $node) {
        $types = isset($node['@type']) ? (array) $node['@type'] : [];
        if (array_intersect($types, ['Article', 'BlogPosting', 'NewsArticle', 'Person'])) {
            unset($data[$key]);
        }
    }
    $page_types = ['page-about-a.php' => 'AboutPage', 'page-about-b.php' => 'AboutPage', 'page-contact.php' => 'ContactPage'];
    $tpl = get_page_template_slug();
    foreach ($data as $key => $node) {
        if (isset($node['@type']) && $node['@type'] === 'WebPage') {
            if (isset($page_types[$tpl])) $data[$key]['@type'] = $page_types[$tpl];
            unset($data[$key]['author']);
        }
    }
    return $data;
}, 99);
