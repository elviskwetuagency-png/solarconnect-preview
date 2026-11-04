<?php
/**
 * Template Name: About – Draft A (photo-led)
 *
 * Dark, photo-led About page built from the homepage's own components:
 * full-bleed field photo hero, split "who we are", glass-card standards
 * band, services list, numbered approach, field-photo mosaic, reviews, CTA.
 */
get_header();
$img = get_stylesheet_directory_uri() . '/assets/img/';
$wa  = function ($msg) { return 'https://wa.me/254706636447?text=' . rawurlencode($msg); };
$sck_nav_current = 'about';
$arrow = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>';
$shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
?><main id="top" class="ab ab-a">

<!-- ============ HERO ============ -->
<section class="hero ab-hero" id="hero">
  <div class="hero-bg" aria-hidden="true"><img src="<?php echo esc_url($img . 'about/field-tech-panel.webp'); ?>" alt="" fetchpriority="high"></div>
  <div class="hero-in">
    <?php include get_stylesheet_directory() . '/parts/site-nav.php'; ?>
    <div class="hero-main">
      <ul class="ab-chips" aria-label="What we do"><li>Solar products</li><li>System guidance</li><li>Field support</li></ul>
      <h1><span class="ln"><span>A solar partner</span></span><span class="ln"><span>for reliable Kenyan</span></span><span class="ln"><span class="dim">homes &amp; businesses.</span></span></h1>
      <p class="hero-sub">Solar Connect Kenya helps customers choose, buy and install dependable solar systems, with clear guidance, quality equipment and practical support from first enquiry to handover.</p>
      <div class="hero-actions ab-actions">
        <a class="arrow-pill" href="<?php echo esc_url($wa('Hello Solar Connect, I would like to talk to your team about a solar system.')); ?>">Talk to our team <span class="ac"><?php echo $arrow; ?></span></a>
        <a class="btn btn-ghost-dark" href="<?php echo esc_url($shop); ?>">View products</a>
      </div>
    </div>
    <div class="hstats">
      <div class="hstat"><b>200+</b><span>Solar projects completed</span></div>
      <div class="hstat"><b>10+</b><span>Genuine brands in stock</span></div>
      <div class="hstat"><b>2</b><span>Bases in Nairobi &amp; Watamu</span></div>
    </div>
  </div>
</section>

<!-- ============ WHO WE ARE ============ -->
<section class="wrap ab-who">
  <div class="about2">
    <div class="about2-txt rv">
      <span class="mono eyebrow">Who we are</span>
      <h2>Practical solar guidance, <em>backed by real installation experience.</em></h2>
      <p>We serve customers who want dependable power without confusion. That means helping you compare panels, inverters, batteries, water heating, lighting and accessories as one working system instead of isolated parts.</p>
      <p>Our work is shaped around Kenyan homes, shops, offices, apartments and small facilities, where power needs are practical, budgets matter, and after-sales support must be reachable.</p>
      <div class="tags ab-who-tags" aria-label="Who we work with"><span>Homes</span><span>Shops</span><span>Offices</span><span>Apartments</span><span>Clinics</span><span>Small facilities</span></div>
    </div>
    <div class="ab-who-media rv">
      <figure class="media ab-who-main"><img src="<?php echo esc_url($img . 'about/rooftop-sky.webp'); ?>" alt="Rooftop solar array installed by Solar Connect Kenya" loading="lazy"></figure>
      <figure class="media ab-who-inset"><img src="<?php echo esc_url($img . 'about/inverter-wall-c.webp'); ?>" alt="Wall-mounted inverter and battery backup" loading="lazy"></figure>
    </div>
  </div>
</section>

<!-- ============ OUR STANDARD ============ -->
<section class="wrap ab-standard">
  <div class="gband rv">
    <img class="gband-bg" src="<?php echo esc_url($img . 'about/rooftop-landscape.webp'); ?>" alt="" aria-hidden="true" loading="lazy">
    <div class="gband-in">
      <div class="ab-gband-head">
        <span class="mono ab-gband-k">Our standard</span>
        <h2 class="gband-h">Neat systems. Clear sizing. Reliable handover.</h2>
      </div>
      <div class="gcards ab-gcards3">
        <div class="gcard"><span class="mono ab-gcard-k">Reliable recommendations</span><h3>We size systems around real usage.</h3><p>Every good solar purchase starts with the appliances, hours of use, backup goals and site conditions.</p></div>
        <div class="gcard"><span class="mono ab-gcard-k">Quality equipment</span><h3>Products are selected as complete systems.</h3><p>Panels, inverters, batteries, protection, mounting and accessories are considered together.</p></div>
        <div class="gcard"><span class="mono ab-gcard-k">Local support</span><h3>You keep talking to the same team.</h3><p>From enquiry to handover, support stays practical, reachable and focused on dependable daily power.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- ============ WHAT WE HELP WITH ============ -->
<section class="wrap services ab-services">
  <div class="head-row rv">
    <div><span class="mono eyebrow">What we help with</span><h2 class="h2">Solutions that feel complete before they reach your roof.</h2></div>
    <p class="shop-lede">One replacement component or a complete system: we guide selection, sizing, delivery, installation, testing and after-sales support.</p>
  </div>
  <div class="svc-list">
    <?php
    $svcs = [
      ['01', 'Full home solar', 'Panels, inverter, battery, protection, installation and testing for dependable household power.', 'b40d931493.webp'],
      ['02', 'Inverter & battery backup', 'Properly matched backup for lights, entertainment, fridges, routers, tills and essential loads.', 'about/inverter-wall-a.webp'],
      ['03', 'Hybrid business setups', 'Practical solar and backup power for shops, offices, apartments, clinics and small business operations.', 'about/battery-rack.webp'],
      ['04', 'Solar water heating', 'Water heating options that reduce electricity use in homes, rentals and commercial facilities.', 'solar-water-heating.webp'],
      ['05', 'Solar lighting', 'Compound, walkway, security, street and commercial outdoor lighting for safer spaces.', 'outdoor-lighting.webp'],
      ['06', 'Accessories & protection', 'Controllers, cables, breakers, rails, cabinets, mounting hardware and finishing details for clean installs.', '510a930c57.webp'],
    ];
    foreach ($svcs as $s) : ?>
      <a class="svc rv" href="<?php echo esc_url($wa('Hello Solar Connect, I would like advice on ' . strtolower($s[1]) . '.')); ?>">
        <span class="nm"><span class="ab-svc-n mono"><?php echo esc_html($s[0]); ?></span><?php echo esc_html($s[1]); ?></span>
        <span class="ds"><?php echo esc_html($s[2]); ?></span>
        <span class="media"><img src="<?php echo esc_url($img . $s[3]); ?>" alt="" loading="lazy"></span>
        <span class="go" aria-hidden="true"><?php echo $arrow; ?></span>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<!-- ============ OUR APPROACH ============ -->
<section class="dark band ab-approach">
  <div class="wrap">
    <div class="head-row rv">
      <div><span class="mono eyebrow">Our approach</span><h2 class="h2">A clearer path from enquiry to dependable power.</h2></div>
      <p class="lede">We keep the process visible, so you understand what is being recommended, why it fits, and how it will be delivered.</p>
    </div>
    <ol class="ab-steps">
      <li class="rv"><span class="ab-step-n">01</span><h3>Listen to the power need</h3><p>We start with your goal, site type, appliances, hours of use and budget range.</p><div class="tags"><span>Consultation</span></div></li>
      <li class="rv"><span class="ab-step-n">02</span><h3>Recommend the right setup</h3><p>The system is sized as a complete outcome, with the right balance of panels, battery, inverter and protection.</p><div class="tags"><span>Sizing</span></div></li>
      <li class="rv"><span class="ab-step-n">03</span><h3>Deliver and install cleanly</h3><p>Products and field work are handled with care, so the final installation feels organised and dependable.</p><div class="tags"><span>Delivery</span></div></li>
      <li class="rv"><span class="ab-step-n">04</span><h3>Test, hand over, support</h3><p>You receive a working system, basic guidance, and a reachable team for follow-up support.</p><div class="tags"><span>Support</span></div></li>
    </ol>
  </div>
</section>

<!-- ============ RECENT WORK ============ -->
<section class="wrap ab-work">
  <div class="head-row rv">
    <div><span class="mono eyebrow">Recent work</span><h2 class="h2">Real sites, clean execution.</h2></div>
    <p class="shop-lede">Field photos from our own installations: careful equipment handling, organised installation details, and systems prepared for everyday use.</p>
  </div>
  <div class="ab-bento">
    <figure class="media ab-b1 rv"><img src="<?php echo esc_url($img . 'about/rooftop-landscape.webp'); ?>" alt="Completed rooftop solar array" loading="lazy"><figcaption>Completed project</figcaption></figure>
    <figure class="media ab-b2 rv"><img src="<?php echo esc_url($img . 'about/battery-rack.webp'); ?>" alt="Lithium battery storage cabinet" loading="lazy"><figcaption>Battery storage</figcaption></figure>
    <figure class="media ab-b3 rv"><img src="<?php echo esc_url($img . 'about/inverter-wall-b.webp'); ?>" alt="Inverter and battery installed on a wall" loading="lazy"><figcaption>Installation detail</figcaption></figure>
    <figure class="media ab-b4 rv"><img src="<?php echo esc_url($img . 'about/field-tech-panel.webp'); ?>" alt="Technician carrying a solar panel on site" loading="lazy"><figcaption>Panel work</figcaption></figure>
    <figure class="media ab-b5 rv"><img src="<?php echo esc_url($img . 'about/inverter-wall-a.webp'); ?>" alt="Clean indoor backup installation" loading="lazy"><figcaption>Site handover</figcaption></figure>
  </div>
</section>

<!-- ============ REVIEWS ============ -->
<section class="wrap reviews ab-reviews">
  <div class="head-row rv">
    <div><span class="mono eyebrow">After handover</span><h2 class="h2">What customers say.</h2></div>
    <span style="color:var(--ink-2)">★★★★★ rated by customers</span>
  </div>
  <div class="ab-rev-grid">
    <figure class="rev rv"><blockquote>“Very good seller. George is responsive and if he doesn’t have a product and says he will get it to you by a certain day, he sure keeps his word.”</blockquote><figcaption><span class="av">AR</span><span class="who"><b>Abu Rutunu</b><span class="mono">Nairobi · ★★★★★</span></span></figcaption></figure>
    <figure class="rev rv"><blockquote>“The follow-up after installation made me forever love Solar Connect. Thank you, George.”</blockquote><figcaption><span class="av">CO</span><span class="who"><b>Cavine Ochieng</b><span class="mono">Nairobi · ★★★★★</span></span></figcaption></figure>
    <figure class="rev rv"><blockquote>“The team is very professional and their services are top notch. I have also been using their panels and pump for the past year.”</blockquote><figcaption><span class="av">AW</span><span class="who"><b>Anna Wangechi</b><span class="mono">Nairobi · ★★★★★</span></span></figcaption></figure>
    <figure class="rev rv"><blockquote>“Great customer service and excellent site work.”</blockquote><figcaption><span class="av">LM</span><span class="who"><b>Linus Mutahi</b><span class="mono">Nairobi · ★★★★★</span></span></figcaption></figure>
  </div>
</section>

<!-- ============ CTA ============ -->
<section id="contact" class="cta">
  <div class="cta-frame media">
    <img src="<?php echo esc_url($img . 'cta-bg.webp'); ?>" alt="" loading="lazy">
    <div class="cta-body">
      <div class="cta-copy rv">
        <span class="mono" style="color:#DADAD4">Ready to plan your system?</span>
        <h2>Send us your power needs. We’ll recommend a practical setup.</h2>
        <p>Share your appliances, usage pattern, budget range or site details. Our team will help you move from idea to the right solar equipment with confidence.</p>
      </div>
      <div class="ab-cta-btns rv">
        <a class="btn btn-sun" href="<?php echo esc_url($wa('Hello Solar Connect, I need help choosing a solar system.')); ?>"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20l1.3-3.9A8 8 0 1 1 8 19.1z"/></svg>WhatsApp us · 0706 636 447</a>
        <a class="btn btn-white" href="<?php echo esc_url($shop); ?>">Browse the shop</a>
      </div>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
