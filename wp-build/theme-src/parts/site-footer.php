<?php
/**
 * Full site footer (same design as the homepage footer), with links that
 * point at this site's own shop/category pages rather than the old live
 * domain. Used by the About templates; the homepage still carries its own
 * inline copy.
 */
$sck_home = home_url('/');
$sck_shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$sck_acct = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$sck_cat  = function ($slug) { $t = get_term_by('slug', $slug, 'product_cat'); return $t ? get_term_link($t) : home_url('/shop/'); };
$sck_chk  = '<span class="f-chk"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg></span>';
$sck_pin  = '<span class="b-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg></span>';
$sck_tel  = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/></svg>';
?>
<footer>
  <div class="wrap">
    <div class="f-head">
      <div class="f-brand">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/685172a7fa.png" alt="Solar Connect Kenya" style="height:34px;width:auto">
        <p>Solar Connect Kenya provides quality solar products, system guidance, project delivery, installation, testing, and local support for homes and businesses.</p>
      </div>
      <ul class="f-promise" aria-label="Our service promise">
        <li><?php echo $sck_chk; ?>Consultation and system sizing</li>
        <li><?php echo $sck_chk; ?>Delivery and installation support</li>
        <li><?php echo $sck_chk; ?>Testing and confirmation</li>
        <li><?php echo $sck_chk; ?>After-sales WhatsApp support</li>
      </ul>
    </div>

    <div class="f-main">
      <nav class="f-col f-paths" aria-label="Customer paths">
        <h3>Customer paths</h3>
        <a href="<?php echo esc_url($sck_shop); ?>">Shop products</a>
        <a href="<?php echo esc_url($sck_acct); ?>">Check order status</a>
        <a href="https://wa.me/254706636447?text=<?php echo rawurlencode('Hello Solar Connect, I need help choosing a solar system.'); ?>">Request a quote</a>
        <a href="<?php echo esc_url(get_permalink()); ?>">About Solar Connect</a>
      </nav>
      <nav class="f-deps" aria-label="Departments">
        <h3>Departments</h3>
        <div class="f-dep-grid">
          <div class="f-dep"><h4>Solar inverters</h4><a href="<?php echo esc_url($sck_cat('hybrid-solar-inverters')); ?>">Hybrid solar inverters</a><a href="<?php echo esc_url($sck_cat('off-grid-solar-inverters')); ?>">Off-grid solar inverters</a><a href="<?php echo esc_url($sck_cat('inverter-chargers')); ?>">Inverter chargers</a><a href="<?php echo esc_url($sck_cat('grid-tie-inverters')); ?>">Grid-tie inverters</a></div>
          <div class="f-dep"><h4>Charge controllers</h4><a href="<?php echo esc_url($sck_cat('mppt-charge-controller')); ?>">MPPT charge controllers</a></div>
          <div class="f-dep"><h4>Solar batteries</h4><a href="<?php echo esc_url($sck_cat('lithium-batteries')); ?>">Lithium batteries</a><a href="<?php echo esc_url($sck_cat('solar-gel-batteries')); ?>">Solar gel batteries</a></div>
          <div class="f-dep"><h4>Panels, heating &amp; lighting</h4><a href="<?php echo esc_url($sck_cat('monocrystalline')); ?>">Monocrystalline panels</a><a href="<?php echo esc_url($sck_cat('pressurized-systems')); ?>">Solar water heaters</a><a href="<?php echo esc_url($sck_cat('solar-flood-light')); ?>">Solar flood lights</a></div>
        </div>
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
      <span class="f-legal"><a href="#">Terms</a><a href="#">Privacy</a></span>
      <a class="f-top" href="#top">Back to top <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M12 19V5M6 11l6-6 6 6"/></svg></a>
    </div>
  </div>
  <div class="giant" id="giant" aria-hidden="true">Solar Connect</div>
</footer>
