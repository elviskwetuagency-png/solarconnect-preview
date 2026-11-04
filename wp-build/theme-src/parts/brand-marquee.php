<?php
/**
 * Brand logo marquee track (homepage + About). Each logo links to its
 * brand page only when that brand currently has products; otherwise it
 * links to the shop, so no logo ever lands on an empty brand page.
 * The list is drawn twice for the seamless loop; the copy is hidden from
 * screen readers and keyboard focus.
 */
$sck_brand_logos = ['deye' => 'Deye', 'felicity-solar' => 'Felicity Solar', 'ja-solar' => 'JA Solar', 'jinko-solar' => 'Jinko Solar', 'sma' => 'SMA', 'srne' => 'SRNE', 'must' => 'Must', 'taico' => 'Taico', 'suntree' => 'Suntree', 'vestwoods' => 'Vestwoods'];
$sck_shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$sck_img_base = get_stylesheet_directory_uri() . '/assets/img/brands/logo_';
foreach ([false, true] as $sck_dup) {
    foreach ($sck_brand_logos as $slug => $name) {
        $t = get_term_by('slug', $slug, 'product_tag');
        $has = $t && $t->count > 0;
        $href = $has ? get_term_link($t) : $sck_shop_url;
        $label = $has ? 'Shop ' . $name . ' products' : $name . ' (browse the shop)';
        echo '<span' . ($sck_dup ? ' aria-hidden="true"' : '') . '><a href="' . esc_url($href) . '"' . ($sck_dup ? ' tabindex="-1"' : '') . ' aria-label="' . esc_attr($label) . '"><img src="' . esc_url($sck_img_base . $slug . '.webp') . '" alt="' . esc_attr($name) . '" loading="lazy"></a></span>';
    }
}
