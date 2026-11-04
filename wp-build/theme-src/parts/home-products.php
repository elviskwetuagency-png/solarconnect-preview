<?php
/**
 * Homepage "Shop the components" cards, rendered live from WooCommerce so
 * prices, sale savings, images and links always match the store. The
 * hand-picked products and their filter group (inv / bat / cc, used by the
 * homepage filter buttons in home.js) are listed here; a product that is
 * deleted or unpublished simply drops out.
 */
$sck_picks = [
    ['deye-8kw-8kva-48v-single-phase-hybrid-solar-inverter', 'inv', 'Hybrid inverter'],
    ['felicity-1kva-12v-ivcm1012-high-frequency-inverter', 'inv', 'Hybrid inverter'],
    ['felicity-solar-3kva-24v-ivem3024-hybrid-high-frequency-inverter', 'inv', 'Hybrid inverter'],
    ['felicity-5kwh-48v-lpbf48100-m-lithium-battery-pack-with-bms', 'bat', 'Lithium battery'],
    ['vestwoods-12v-100ah-lithium-lifepo4-battery', 'bat', 'Lithium battery'],
    ['felicity-7-2kwh-48v-lpbf48150-p-lithium-battery-pack-with-bms', 'bat', 'Lithium battery'],
    ['must-80a-mppt-solar-charge-controller-pc18-8025f', 'cc', 'Charge controller'],
    ['30a-12v-24v-felicity-mppt-charge-controller', 'cc', 'Charge controller'],
];
$sck_ksh  = function ($n) { return 'Ksh ' . number_format((float) $n); };
$sck_cart = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg>';

foreach ($sck_picks as $pick) {
    $post = get_page_by_path($pick[0], OBJECT, 'product');
    if (!$post || $post->post_status !== 'publish') continue;
    $p = wc_get_product($post->ID);
    if (!$p) continue;
    $url   = get_permalink($post);
    $name  = $p->get_name();
    $img   = wp_get_attachment_image_url($p->get_image_id(), 'woocommerce_thumbnail') ?: wc_placeholder_img_src('woocommerce_thumbnail');
    $price = (float) $p->get_price();
    $reg   = (float) $p->get_regular_price();
    $price_html = '<b>' . esc_html($sck_ksh($price)) . '</b>';
    if ($p->is_on_sale() && $reg > $price) {
        $price_html .= '<span class="pold"><s>' . esc_html($sck_ksh($reg)) . '</s><span class="psave">Save ' . esc_html($sck_ksh($reg - $price)) . '</span></span>';
    }
    echo '<article class="prod rv" data-c="' . esc_attr($pick[1]) . '">'
        . '<a class="media light" href="' . esc_url($url) . '" tabindex="-1" aria-hidden="true"><img src="' . esc_url($img) . '" alt="' . esc_attr($name) . '" loading="lazy"></a>'
        . '<div class="b"><span class="c">' . esc_html($pick[2]) . '</span>'
        . '<h3><a href="' . esc_url($url) . '">' . esc_html($name) . '</a></h3>'
        . '<div class="f"><div class="pr">' . $price_html . '</div>'
        . '<a class="add" href="' . esc_url($url) . '" aria-label="View ' . esc_attr($name) . '">' . $sck_cart . '</a></div></div></article>';
}
