<?php
/**
 * Compact shop toolbar for the shop, category and brand (product_tag)
 * archives: Category and Brand dropdowns on the left, result count and
 * sort on the right, in one row.
 *
 * Dropdowns are <details> menus of plain links, so they work without
 * JavaScript; a small script only closes one when another opens or when
 * the visitor clicks outside / presses Escape.
 */

/* Move WooCommerce's own result count + sort into the toolbar instead of
   printing them as separate rows above it. */
add_action('wp', function () {
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
});

add_action('woocommerce_before_shop_loop', 'sck_shop_filter_bar', 25);
function sck_shop_filter_bar() {
    $shop_url = get_permalink(wc_get_page_id('shop'));

    $cats = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => true, 'orderby' => 'name']);
    $cats = is_wp_error($cats) ? [] : array_filter($cats, function ($c) { return $c->slug !== 'uncategorized'; });

    $brands = get_terms(['taxonomy' => 'product_tag', 'hide_empty' => true, 'orderby' => 'name']);
    $brands = is_wp_error($brands) ? [] : $brands;

    $current_cat   = is_tax('product_cat') ? get_queried_object() : null;
    $current_brand = is_tax('product_tag') ? get_queried_object() : null;
    $total         = (int) wp_count_posts('product')->publish;

    $chev = '<svg class="sck-dd-chev" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>';
    $nice  = function ($name) { return ucwords($name); }; // brand names are stored inconsistently ("suness", "roadsmart solar")

    echo '<div class="sck-toolbar">';
    echo '<div class="sck-tb-filters">';

    /* Category */
    echo '<details class="sck-dd"><summary><span class="sck-dd-k">Category</span><span class="sck-dd-v">' . esc_html($current_cat ? $current_cat->name : 'All') . '</span>' . $chev . '</summary>';
    echo '<div class="sck-dd-panel" role="list">';
    echo '<a role="listitem" class="' . (!$current_cat ? 'active' : '') . '" href="' . esc_url($shop_url) . '">All products <span>' . $total . '</span></a>';
    foreach ($cats as $c) {
        $on = $current_cat && $current_cat->term_id === $c->term_id;
        echo '<a role="listitem" class="' . ($on ? 'active' : '') . '" href="' . esc_url(get_term_link($c)) . '"' . ($on ? ' aria-current="page"' : '') . '>' . esc_html($c->name) . ' <span>' . (int) $c->count . '</span></a>';
    }
    echo '</div></details>';

    /* Brand */
    if (!empty($brands)) {
        echo '<details class="sck-dd"><summary><span class="sck-dd-k">Brand</span><span class="sck-dd-v">' . esc_html($current_brand ? $nice($current_brand->name) : 'All') . '</span>' . $chev . '</summary>';
        echo '<div class="sck-dd-panel sck-dd-grid" role="list">';
        echo '<a role="listitem" class="' . (!$current_brand ? 'active' : '') . '" href="' . esc_url($shop_url) . '">All brands</a>';
        foreach ($brands as $b) {
            $on = $current_brand && $current_brand->term_id === $b->term_id;
            echo '<a role="listitem" class="' . ($on ? 'active' : '') . '" href="' . esc_url(get_term_link($b)) . '"' . ($on ? ' aria-current="page"' : '') . '>' . esc_html($nice($b->name)) . ' <span>' . (int) $b->count . '</span></a>';
        }
        echo '</div></details>';
    }

    if ($current_cat || $current_brand) {
        echo '<a class="sck-clear" href="' . esc_url($shop_url) . '">Clear filter <span aria-hidden="true">&times;</span></a>';
    }

    echo '</div>'; // filters

    echo '<div class="sck-tb-right">';
    woocommerce_result_count();
    woocommerce_catalog_ordering();
    echo '</div>';

    echo '</div>'; // toolbar
}

/* Close-other / outside-click / Escape behaviour for the dropdowns. */
add_action('wp_footer', function () {
    if (!function_exists('is_shop') || !(is_shop() || is_product_taxonomy())) return;
    ?>
<script>
(function(){
  var dds=[].slice.call(document.querySelectorAll('.sck-dd'));
  if(!dds.length) return;
  dds.forEach(function(d){ d.addEventListener('toggle',function(){ if(d.open) dds.forEach(function(o){ if(o!==d) o.open=false; }); }); });
  document.addEventListener('click',function(e){ dds.forEach(function(d){ if(d.open && !d.contains(e.target)) d.open=false; }); });
  document.addEventListener('keydown',function(e){ if(e.key==='Escape') dds.forEach(function(d){ if(d.open){ d.open=false; d.querySelector('summary').focus(); } }); });
})();
</script>
    <?php
});
