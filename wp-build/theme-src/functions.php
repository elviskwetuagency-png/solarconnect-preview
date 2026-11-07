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

    if (sck_is_content_page()) {
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
    if (!is_front_page() && !sck_is_content_page()) {
        $classes[] = 'sck-interior';
    }
    return $classes;
});

require_once get_stylesheet_directory() . '/inc-shop-filters.php';
require_once get_stylesheet_directory() . '/inc-solutions.php';
require_once get_stylesheet_directory() . '/inc-checkout.php';
require_once get_stylesheet_directory() . '/inc-projects.php';
require_once get_stylesheet_directory() . '/inc-menu.php';


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
    return ['page-about-a.php', 'page-about-b.php', 'page-contact.php', 'page-faqs.php', 'page-solutions.php', 'page-solution.php'];
}

/** Content pages that use pages.css and the in-page hero nav: the templates above plus the blog. */
function sck_is_content_page() {
    return (bool) apply_filters('sck_extra_content_page', is_page_template(sck_hero_templates()) || is_home() || is_singular('post'));
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
    $page_types = ['page-about-a.php' => 'AboutPage', 'page-about-b.php' => 'AboutPage', 'page-contact.php' => 'ContactPage', 'page-solutions.php' => 'CollectionPage'];
    $tpl = get_page_template_slug();
    foreach ($data as $key => $node) {
        if (isset($node['@type']) && $node['@type'] === 'WebPage') {
            if (isset($page_types[$tpl])) $data[$key]['@type'] = $page_types[$tpl];
            unset($data[$key]['author']);
        }
    }
    return $data;
}, 99);

/**
 * Shop archive heading: a descriptive H1 instead of the bare page name.
 * The intro paragraph under it is the Shop page's own content (WooCommerce
 * prints it as the archive description), so it stays editable in wp-admin.
 */
add_filter('woocommerce_page_title', function ($title) {
    return (function_exists('is_shop') && is_shop() && !is_search()) ? 'Shop solar panels, inverters and batteries' : $title;
});

/**
 * Blog posts: the byline is the company, so make the Article schema author
 * the Organization (not the WordPress login account) and drop the Person.
 */
add_filter('rank_math/json_ld', function ($data) {
    if (!is_singular('post') || !is_array($data)) return $data;
    $org = ['@id' => home_url('/#organization')];
    foreach ($data as $key => $node) {
        $types = isset($node['@type']) ? (array) $node['@type'] : [];
        if (in_array('Person', $types, true)) { unset($data[$key]); continue; }
        if (array_intersect($types, ['Article', 'BlogPosting', 'NewsArticle'])) {
            $data[$key]['author'] = $org;
            $data[$key]['publisher'] = $org;
        }
        if (isset($node['author'])) $data[$key]['author'] = $org;
    }
    return $data;
}, 100);

/**
 * llms.txt (served by Rank Math): keep shop utility pages out, and describe
 * each entry with its SEO meta description when one is set (falls back to
 * Rank Math's excerpt), so AI assistants get the same accurate summaries
 * as search engines.
 */
add_filter('rank_math/llms_txt/posts', function ($posts) {
    $skip = array_filter([
        function_exists('wc_get_page_id') ? wc_get_page_id('cart') : 0,
        function_exists('wc_get_page_id') ? wc_get_page_id('checkout') : 0,
        function_exists('wc_get_page_id') ? wc_get_page_id('myaccount') : 0,
    ]);
    return array_values(array_filter((array) $posts, function ($p) use ($skip) {
        if (in_array((int) $p->ID, array_map('intval', $skip), true)) return false;
        $robots = get_post_meta($p->ID, 'rank_math_robots', true);
        return !(is_array($robots) && in_array('noindex', $robots, true));
    }));
});
add_filter('rank_math/llms_txt/post_description', function ($desc, $post) {
    $meta = trim((string) get_post_meta($post->ID, 'rank_math_description', true));
    if ($meta !== '') return $meta;
    if ($post->post_type === 'product' && has_excerpt($post)) return wp_strip_all_tags($post->post_excerpt);
    return $desc;
}, 10, 2);

/**
 * Blog posts: build FAQPage structured data from the article's own FAQ
 * accordion (<details class="fq">), so the visible Q&A and the schema can
 * never disagree.
 */
add_action('wp_head', function () {
    if (!is_singular('post')) return;
    $html = get_post_field('post_content', get_queried_object_id());
    if (!preg_match_all('#<details class="fq"><summary>(.*?)<span[^>]*></span></summary><div class="fq-a">(.*?)</div></details>#s', $html, $m, PREG_SET_ORDER)) return;
    $items = [];
    foreach ($m as $qa) {
        $items[] = ['@type' => 'Question', 'name' => trim(wp_strip_all_tags($qa[1])), 'acceptedAnswer' => ['@type' => 'Answer', 'text' => trim(wp_strip_all_tags($qa[2]))]];
    }
    echo '<script type="application/ld+json">' . wp_json_encode(['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $items], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}, 30);

/**
 * One product card (homepage "Shop the components" style), rendered live
 * from WooCommerce: image, label, name, price with sale saving, link.
 * Shared by the homepage product grid and the solution pages. Returns ''
 * for missing or unpublished products.
 */
function sck_product_card($product_id, $label = '', $filter = '') {
    $p = function_exists('wc_get_product') ? wc_get_product($product_id) : null;
    if (!$p || get_post_status($product_id) !== 'publish') return '';
    $ksh   = function ($n) { return 'Ksh ' . number_format((float) $n); };
    $url   = get_permalink($product_id);
    $name  = $p->get_name();
    $img   = wp_get_attachment_image_url($p->get_image_id(), 'woocommerce_thumbnail') ?: wc_placeholder_img_src('woocommerce_thumbnail');
    $price = (float) $p->get_price();
    $reg   = (float) $p->get_regular_price();
    $price_html = '<b>' . esc_html($ksh($price)) . '</b>';
    if ($p->is_on_sale() && $reg > $price) {
        $price_html .= '<span class="pold"><s>' . esc_html($ksh($reg)) . '</s><span class="psave">Save ' . esc_html($ksh($reg - $price)) . '</span></span>';
    }
    $cart = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg>';
    return '<article class="prod rv"' . ($filter ? ' data-c="' . esc_attr($filter) . '"' : '') . '>'
        . '<a class="media light" href="' . esc_url($url) . '" tabindex="-1" aria-hidden="true"><img src="' . esc_url($img) . '" alt="' . esc_attr($name) . '" loading="lazy"></a>'
        . '<div class="b">' . ($label ? '<span class="c">' . esc_html($label) . '</span>' : '')
        . '<h3><a href="' . esc_url($url) . '">' . esc_html($name) . '</a></h3>'
        . '<div class="f"><div class="pr">' . $price_html . '</div>'
        . '<a class="add" href="' . esc_url($url) . '" aria-label="View ' . esc_attr($name) . '">' . $cart . '</a></div></div></article>';
}
