<?php
/**
 * Category + brand filter bar on the shop, category and brand (product_tag)
 * archive pages, so visitors can browse the real catalog by category/brand.
 */
add_action('woocommerce_before_shop_loop', 'sck_shop_filter_bar', 25);
function sck_shop_filter_bar() {
    $cats = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'orderby'    => 'count',
        'order'      => 'DESC',
    ]);
    $cats = array_filter($cats, function ($c) { return $c->slug !== 'uncategorized'; });

    $brands = get_terms([
        'taxonomy'   => 'product_tag',
        'hide_empty' => true,
        'orderby'    => 'count',
        'order'      => 'DESC',
    ]);

    $current_cat   = is_tax('product_cat') ? get_queried_object() : null;
    $current_brand = is_tax('product_tag') ? get_queried_object() : null;

    echo '<div class="sck-shop-filters">';

    echo '<div class="sck-filter-row"><span class="sck-filter-label">Category</span><div class="sck-pills">';
    echo '<a class="sck-pill' . (is_shop() ? ' active' : '') . '" href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '">All</a>';
    foreach ($cats as $c) {
        $active = ($current_cat && $current_cat->term_id === $c->term_id) ? ' active' : '';
        echo '<a class="sck-pill' . $active . '" href="' . esc_url(get_term_link($c)) . '">' . esc_html($c->name) . ' <span class="sck-pill-n">' . (int) $c->count . '</span></a>';
    }
    echo '</div></div>';

    if (!empty($brands)) {
        echo '<div class="sck-filter-row"><span class="sck-filter-label">Brand</span><div class="sck-pills sck-pills-scroll">';
        foreach ($brands as $b) {
            $active = ($current_brand && $current_brand->term_id === $b->term_id) ? ' active' : '';
            echo '<a class="sck-pill' . $active . '" href="' . esc_url(get_term_link($b)) . '">' . esc_html($b->name) . ' <span class="sck-pill-n">' . (int) $b->count . '</span></a>';
        }
        echo '</div></div>';
    }

    echo '</div>';
}
