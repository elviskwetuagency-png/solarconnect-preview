<?php
/**
 * Site footer — the original homepage footer design (index.html), shared
 * by every page: the homepage includes it directly, every other template
 * gets it through footer.php.
 *
 * Department links only render when that category actually has products
 * (PWM controllers, tubular batteries and polycrystalline panels have none
 * yet), so the footer never links to an empty page; they appear on their
 * own once products are added. Terms/Privacy work the same way: they show
 * once those pages are published.
 */
$sck_shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$sck_acct = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$sck_page = function ($slug) { $p = get_page_by_path($slug); return ($p && $p->post_status === 'publish') ? get_permalink($p) : ''; };

/* Returns [url, has_products] for a category slug or a product search term. */
$sck_dep = function ($slug, $search = '') {
    $t = get_term_by('slug', $slug, 'product_cat');
    if ($t && $t->count > 0) return get_term_link($t);
    if ($search) {
        $q = new WP_Query(['post_type' => 'product', 'post_status' => 'publish', 's' => $search, 'posts_per_page' => 1, 'fields' => 'ids', 'no_found_rows' => true]);
        if ($q->have_posts()) return add_query_arg(['s' => $search, 'post_type' => 'product'], home_url('/'));
    }
    return '';
};
$sck_deps = [
    'Solar inverters' => [
        ['Hybrid solar inverters', 'hybrid-solar-inverters'],
        ['Off-grid solar inverters', 'off-grid-solar-inverters'],
        ['Inverter chargers', 'inverter-chargers'],
        ['Grid-tie inverters', 'grid-tie-inverters'],
    ],
    'Solar charge controllers' => [
        ['MPPT charge controllers', 'mppt-charge-controller'],
        ['PWM charge controllers', 'pwm-charge-controller', 'pwm'],
    ],
    'Solar batteries' => [
        ['Lithium batteries', 'lithium-batteries'],
        ['Solar gel batteries', 'solar-gel-batteries'],
        ['Tubular batteries', 'tubular-battery', 'tubular'],
    ],
    'Solar panels' => [
        ['Monocrystalline panels', 'monocrystalline'],
        ['Polycrystalline panels', 'polycrystalline-solar-panel', 'polycrystalline'],
    ],
    'Systems and more' => [
        ['Solar system packages', 'solar-system-packages'],
        ['Portable power stations', 'portable-power-stations'],
        ['Solar water heaters', 'pressurized-systems'],
        ['Solar flood lights', 'solar-flood-light'],
    ],
];

$sck_chk = '<span class="f-chk"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg></span>';
$sck_pin = '<span class="b-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg></span>';
$sck_tel = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/></svg>';

$sck_contact = $sck_page('contact-us');
$sck_faqs    = $sck_page('faqs');
$sck_about   = $sck_page('about-us');
$sck_privacy = function_exists('get_privacy_policy_url') ? get_privacy_policy_url() : '';
$sck_terms_id = function_exists('wc_terms_and_conditions_page_id') ? wc_terms_and_conditions_page_id() : 0;
$sck_terms   = ($sck_terms_id && get_post_status($sck_terms_id) === 'publish') ? get_permalink($sck_terms_id) : '';
?>
<footer>
  <div class="wrap">
    <div class="f-head">
      <div class="f-brand">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/sck-logo-dark-720.webp" width="720" height="176" alt="Solar Connect Kenya" style="height:34px;width:auto">
        <p>Solar Connect Kenya provides quality solar products, system guidance, project delivery, installation, testing, and local support for homes and businesses.</p>
      </div>
      <ul class="f-promise" aria-label="Our service promise"><li><?php echo $sck_chk; ?>Consultation and system sizing</li><li><?php echo $sck_chk; ?>Delivery and installation support</li><li><?php echo $sck_chk; ?>Testing and confirmation</li><li><?php echo $sck_chk; ?>After-sales WhatsApp support</li></ul>
    </div>

    <div class="f-main">
      <nav class="f-col f-paths" aria-label="Customer paths">
        <h3>Customer paths</h3>
        <a href="<?php echo esc_url($sck_shop); ?>">Shop products</a>
        <?php $sck_sol_hub = get_page_by_path('solutions'); if ($sck_sol_hub && $sck_sol_hub->post_status === 'publish') : ?><a href="<?php echo esc_url(get_permalink($sck_sol_hub)); ?>">Solar solutions</a><?php endif; ?>
        <a href="<?php echo esc_url($sck_acct); ?>">Check order status</a>
        <a href="https://wa.me/254706636447?text=Hello%20Solar%20Connect%2C%20I%20need%20help%20choosing%20a%20solar%20system.">Request a quote</a>
        <?php if ($sck_about) : ?><a href="<?php echo esc_url($sck_about); ?>">About Solar Connect</a><?php endif; ?>
        <?php $sck_blog_id = (int) get_option('page_for_posts'); if ($sck_blog_id && get_post_status($sck_blog_id) === 'publish') : ?><a href="<?php echo esc_url(get_permalink($sck_blog_id)); ?>">Solar guides</a><?php endif; ?>
        <?php if ($sck_faqs) : ?><a href="<?php echo esc_url($sck_faqs); ?>">FAQs</a><?php endif; ?>
        <?php if ($sck_contact) : ?><a href="<?php echo esc_url($sck_contact); ?>">Contact us</a><?php endif; ?>
      </nav>
      <nav class="f-deps" aria-label="Departments">
        <h3>Departments</h3>
        <div class="f-dep-grid"><?php
        foreach ($sck_deps as $group => $items) {
            $links = '';
            foreach ($items as $it) {
                $url = $sck_dep($it[1], isset($it[2]) ? $it[2] : '');
                if ($url) $links .= '<a href="' . esc_url($url) . '">' . esc_html($it[0]) . '</a>';
            }
            if ($links) echo '<div class="f-dep"><h4>' . esc_html($group) . '</h4>' . $links . '</div>';
        }
        ?></div>
      </nav>
      <div class="f-branches">
        <h3>Visit us</h3>
        <div class="branch">
          <?php echo $sck_pin; ?>
          <div class="b-txt"><span class="b-name">Nairobi branch</span><span class="b-addr">Lusaka Road</span><a class="b-tel" href="tel:+254706636447"><?php echo $sck_tel; ?> 0706 636 447</a></div>
        </div>
        <div class="branch">
          <?php echo $sck_pin; ?>
          <div class="b-txt"><span class="b-name">Watamu branch</span><span class="b-addr">M2H7+23Q, Watamu</span><a class="b-tel" href="tel:+254705760861"><?php echo $sck_tel; ?> 0705 760 861</a><a class="b-map" href="https://www.google.com/maps/place/M2H7%2B23Q,+Watamu/@-3.3224125,40.0127344,17z">View on Google Maps ↗</a></div>
        </div>
      </div>
    </div>

    <div class="f-base">
      <span>&copy; <?php echo esc_html(date('Y')); ?> Solar Connect Kenya. All rights reserved.</span>
      <span class="f-legal"><?php
        if ($sck_terms) echo '<a href="' . esc_url($sck_terms) . '">Terms</a>';
        if ($sck_privacy) echo '<a href="' . esc_url($sck_privacy) . '">Privacy</a>';
      ?><a href="<?php echo esc_url(home_url('/sitemap_index.xml')); ?>">Sitemap</a></span>
      <a class="f-top" href="#top">Back to top <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M12 19V5M6 11l6-6 6 6"/></svg></a>
    </div>
  </div>
  <div class="giant" id="giant" aria-hidden="true">Solar Connect</div>
</footer>
