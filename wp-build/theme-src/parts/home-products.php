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
foreach ($sck_picks as $pick) {
    $post = get_page_by_path($pick[0], OBJECT, 'product');
    if ($post) echo sck_product_card($post->ID, $pick[2], $pick[1]);
}
