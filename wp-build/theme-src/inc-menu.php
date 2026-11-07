<?php
/**
 * Main menu with dropdowns, shared by the three menus: the homepage hero
 * nav, the hero nav on content pages (parts/site-nav.php) and the floating
 * pill header (header.php). Desktop renders dropdown panels (hover, focus or
 * tap the chevron); the mobile menus render the same tree as expandable
 * groups. Shop links only list categories that currently have products.
 */

/** Which top-level item the current page belongs to. */
function sck_menu_current() {
    if (is_page_template(['page-solutions.php', 'page-solution.php'])) return 'solutions';
    if (function_exists('is_woocommerce') && (is_woocommerce() || is_cart() || is_checkout())) return 'shop';
    if (is_post_type_archive('sck_project') || is_singular('sck_project')) return 'projects';
    if (is_page_template(['page-about-a.php', 'page-about-b.php'])) return 'about';
    if (is_home() || is_singular('post') || is_category()) return 'blog';
    if (is_page_template('page-contact.php')) return 'contact';
    if (is_page_template('page-faqs.php')) return 'faqs';
    return '';
}

/** Menu tree: [key, label, url, children]. Children: groups or flat links. */
function sck_menu_items() {
    static $items = null;
    if ($items !== null) return $items;

    $cat = function ($slug, $label) {
        $t = get_term_by('slug', $slug, 'product_cat');
        return ($t && $t->count > 0) ? [$label, get_term_link($t)] : null;
    };
    $shop_groups = [
        'Inverters'         => [$cat('hybrid-solar-inverters', 'Hybrid inverters'), $cat('off-grid-solar-inverters', 'Off-grid inverters'), $cat('inverter-chargers', 'Inverter chargers'), $cat('grid-tie-inverters', 'Grid-tie inverters')],
        'Batteries'         => [$cat('lithium-batteries', 'Lithium batteries'), $cat('solar-gel-batteries', 'Gel batteries'), $cat('tubular-battery', 'Tubular batteries')],
        'Panels and parts'  => [$cat('monocrystalline', 'Solar panels'), $cat('polycrystalline-solar-panel', 'Polycrystalline panels'), $cat('mppt-charge-controller', 'MPPT charge controllers'), $cat('pwm-charge-controller', 'PWM charge controllers')],
        'Systems and more'  => [$cat('solar-system-packages', 'Complete solar packages'), $cat('pressurized-systems', 'Solar water heaters'), $cat('solar-flood-light', 'Solar flood lights'), $cat('portable-power-stations', 'Portable power stations')],
    ];
    $shop_children = [];
    foreach ($shop_groups as $g => $links) {
        $links = array_values(array_filter($links));
        if ($links) $shop_children[] = ['group' => $g, 'links' => $links];
    }
    $shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');

    $sol_children = [];
    if (function_exists('sck_solutions')) {
        foreach (sck_solutions() as $slug => $s) $sol_children[] = [$s['title'], sck_solution_url($slug), $s['eyebrow']];
    }


    $items = [
        ['solutions', 'Solutions', home_url('/solutions/'), ['type' => 'list', 'links' => $sol_children, 'all' => ['All solutions', home_url('/solutions/')]]],
        ['shop', 'Shop', $shop_url, ['type' => 'groups', 'groups' => $shop_children, 'all' => ['Shop all products', $shop_url]]],
    ];
    if (function_exists('sck_projects_live') && sck_projects_live()) {
        $items[] = ['projects', 'Projects', get_post_type_archive_link('sck_project'), null];
    }
    $items[] = ['about', 'About', home_url('/about-us/'), null];
    $items[] = ['blog', 'Guides', home_url('/blog/'), null];
    $items[] = ['contact', 'Contact', home_url('/contact-us/'), null];
    return $items;
}

/** Chevron icon for dropdown toggles. */
function sck_menu_chevron() {
    return '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>';
}

/** Dropdown panel markup for one item. */
function sck_menu_panel($key, $label, $sub) {
    $id = 'sm-' . $key . '-' . wp_rand(100, 999);
    $h = '<div class="sm-panel sm-panel--' . esc_attr($sub['type']) . '" id="' . esc_attr($id) . '">';
    if ($sub['type'] === 'groups') {
        $h .= '<div class="sm-cols">';
        foreach ($sub['groups'] as $g) {
            $h .= '<div class="sm-col"><span class="sm-h">' . esc_html($g['group']) . '</span>';
            foreach ($g['links'] as $l) $h .= '<a href="' . esc_url($l[1]) . '">' . esc_html($l[0]) . '</a>';
            $h .= '</div>';
        }
        $h .= '</div>';
    } else {
        $h .= '<div class="sm-list">';
        foreach ($sub['links'] as $l) {
            $h .= '<a href="' . esc_url($l[1]) . '">' . (!empty($l[2]) ? '<small>' . esc_html($l[2]) . '</small>' : '') . '<span>' . esc_html($l[0]) . '</span></a>';
        }
        $h .= '</div>';
    }
    if (!empty($sub['all'])) $h .= '<a class="sm-all" href="' . esc_url($sub['all'][1]) . '">' . esc_html($sub['all'][0]) . ' <span aria-hidden="true">→</span></a>';
    return [$id, $h . '</div>'];
}

/**
 * Desktop menu. $variant 'hero' outputs <li> items for the existing hero
 * <ul>; 'pill' outputs the floating header's links.
 */
function sck_menu_desktop($variant = 'hero') {
    $cur = sck_menu_current();
    $out = '';
    foreach (sck_menu_items() as [$key, $label, $url, $sub]) {
        $aria = $key === $cur ? ' aria-current="page"' : '';
        $cls  = $variant === 'pill' ? 'lk' : '';
        if (!$sub) {
            $out .= '<li class="sm-item"><a class="' . $cls . '" href="' . esc_url($url) . '"' . $aria . '>' . esc_html($label) . '</a></li>';
            continue;
        }
        [$pid, $panel] = sck_menu_panel($key . ($variant === 'pill' ? 'p' : 'h'), $label, $sub);
        $out .= '<li class="sm-item has-sub">'
            . '<a class="' . $cls . ' sm-top" href="' . esc_url($url) . '"' . $aria . '>' . esc_html($label) . '</a>'
            . '<button class="sm-btn" type="button" aria-expanded="false" aria-controls="' . esc_attr($pid) . '" aria-label="' . esc_attr('Show ' . $label . ' menu') . '">' . sck_menu_chevron() . '</button>'
            . $panel . '</li>';
    }
    return $out;
}

/** Mobile menu: top links, with expandable groups for items that have children. */
function sck_menu_mobile() {
    $cur = sck_menu_current();
    $out = '';
    foreach (sck_menu_items() as [$key, $label, $url, $sub]) {
        $aria = $key === $cur ? ' aria-current="page"' : '';
        if (!$sub) { $out .= '<a href="' . esc_url($url) . '"' . $aria . '>' . esc_html($label) . '</a>'; continue; }
        $links = [];
        if ($sub['type'] === 'groups') { foreach ($sub['groups'] as $g) foreach ($g['links'] as $l) $links[] = $l; }
        else $links = $sub['links'];
        $out .= '<details class="msub"><summary' . $aria . '>' . esc_html($label) . sck_menu_chevron() . '</summary><div class="msub-links">';
        if (!empty($sub['all'])) $out .= '<a class="msub-all" href="' . esc_url($sub['all'][1]) . '">' . esc_html($sub['all'][0]) . '</a>';
        foreach ($links as $l) $out .= '<a href="' . esc_url($l[1]) . '">' . esc_html($l[0]) . '</a>';
        $out .= '</div></details>';
    }
    return $out;
}

/** Dropdown behaviour: tap/click the chevron, Escape closes, click outside closes. */
add_action('wp_footer', function () { ?>
<script>
(function(){
  function closeAll(except){ document.querySelectorAll('.sm-item.open').forEach(function(li){ if(li!==except){ li.classList.remove('open'); var b=li.querySelector('.sm-btn'); if(b) b.setAttribute('aria-expanded','false'); } }); }
  document.addEventListener('click', function(e){
    var b=e.target.closest('.sm-btn');
    if(b){ var li=b.closest('.sm-item'); var open=!li.classList.contains('open'); closeAll(li); li.classList.toggle('open',open); b.setAttribute('aria-expanded',open?'true':'false'); return; }
    /* touch devices: first tap on a top link opens its panel, second tap follows the link */
    var top=e.target.closest('.sm-top');
    if(top && window.matchMedia('(hover: none)').matches){ var li2=top.closest('.sm-item'); if(!li2.classList.contains('open')){ e.preventDefault(); closeAll(li2); li2.classList.add('open'); li2.querySelector('.sm-btn').setAttribute('aria-expanded','true'); return; } }
    if(!e.target.closest('.sm-item')) closeAll(null);
  });
  document.addEventListener('keydown', function(e){ if(e.key==='Escape'){ var o=document.querySelector('.sm-item.open .sm-btn'); closeAll(null); if(o) o.focus(); } });
})();
</script>
<?php }, 98);
