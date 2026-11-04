<?php
/**
 * Template Name: About – Draft B (editorial)
 *
 * Light, editorial About page: dark nav strip over a paper hero with big
 * type and a photo collage, stats row, statement line, dark numbered
 * standards, solution cards, sticky approach timeline, two-bases section,
 * brand strip, featured review, closing CTA band.
 */
get_header();
$img = get_stylesheet_directory_uri() . '/assets/img/';
$wa  = function ($msg) { return 'https://wa.me/254706636447?text=' . rawurlencode($msg); };
$sck_nav_current = 'about';
$arrow_r = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
$shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
?><main id="top" class="ab ab-b">

<!-- ============ NAV STRIP + HERO ============ -->
<div class="abB-top hero"><div class="hero-in abB-top-in"><?php include get_stylesheet_directory() . '/parts/site-nav.php'; ?></div></div>

<section class="wrap abB-hero" id="hero">
  <div class="abB-hero-txt">
    <span class="mono eyebrow">About Solar Connect Kenya</span>
    <h1>Solar done properly, <span class="abB-em">from first question to handover.</span></h1>
    <p>A solar partner built for reliable Kenyan homes and businesses. We help you choose, buy and install a dependable system, with clear guidance, quality equipment and a team you can still reach after installation.</p>
    <div class="abB-actions">
      <a class="btn btn-ink" href="<?php echo esc_url($wa('Hello Solar Connect, I would like to talk to your team about a solar system.')); ?>">Talk to our team</a>
      <a class="btn btn-ghost" href="<?php echo esc_url($shop); ?>">View products</a>
    </div>
  </div>
  <div class="abB-collage">
    <figure class="media abB-c1"><img src="<?php echo esc_url($img . 'about/field-tech-panel.webp'); ?>" alt="Solar Connect technician carrying a solar panel on site" fetchpriority="high"></figure>
    <figure class="media abB-c2"><img src="<?php echo esc_url($img . 'about/rooftop-sky.webp'); ?>" alt="Rooftop solar array" loading="lazy"></figure>
    <div class="abB-badge"><b>Nairobi</b><span>Lusaka Road</span><b>Watamu</b><span>M2H7+23Q</span></div>
  </div>
</section>

<section class="wrap abB-stats">
  <div class="stat rv"><b>200+</b><span class="mono">Solar projects completed</span></div>
  <div class="stat rv"><b>10+</b><span class="mono">Genuine brands in stock</span></div>
  <div class="stat rv"><b>2</b><span class="mono">Bases · Nairobi &amp; Watamu</span></div>
  <div class="stat rv"><b>4-step</b><span class="mono">Consult · size · install · support</span></div>
</section>

<!-- ============ STATEMENT ============ -->
<section class="wrap abB-statement rv">
  <p>We serve customers who want dependable power without confusion. Panels, inverters, batteries, water heating, lighting and accessories, compared as <mark>one working system</mark> instead of isolated parts.</p>
</section>

<!-- ============ OUR STANDARD ============ -->
<section class="dark band abB-standard">
  <div class="wrap">
    <div class="head-row rv">
      <div><span class="mono eyebrow">Our standard</span><h2 class="h2">Neat systems.<br>Clear sizing.<br>Reliable handover.</h2></div>
      <p class="lede">Our work is shaped around Kenyan homes, shops, offices, apartments and small facilities, where budgets matter and after-sales support must be reachable.</p>
    </div>
    <div class="abB-std-grid">
      <article class="rv"><span class="abB-big">01</span><span class="mono abB-k">Reliable recommendations</span><h3>We size systems around real usage.</h3><p>Every good solar purchase starts with the appliances, hours of use, backup goals and site conditions.</p></article>
      <article class="rv"><span class="abB-big">02</span><span class="mono abB-k">Quality equipment</span><h3>Products are selected as complete systems.</h3><p>Panels, inverters, batteries, protection, mounting and accessories are considered together.</p></article>
      <article class="rv"><span class="abB-big">03</span><span class="mono abB-k">Local support</span><h3>You keep talking to the same team.</h3><p>From enquiry to handover, support stays practical, reachable and focused on dependable daily power.</p></article>
    </div>
    <div class="abB-strip rv">
      <figure class="media"><img src="<?php echo esc_url($img . 'about/battery-rack.webp'); ?>" alt="Battery storage cabinet" loading="lazy"></figure>
      <figure class="media"><img src="<?php echo esc_url($img . 'about/rooftop-landscape.webp'); ?>" alt="Completed rooftop array" loading="lazy"></figure>
      <figure class="media"><img src="<?php echo esc_url($img . 'about/inverter-wall-b.webp'); ?>" alt="Inverter and battery installed on a wall" loading="lazy"></figure>
    </div>
  </div>
</section>

<!-- ============ WHAT WE HELP WITH ============ -->
<section class="wrap abB-help">
  <div class="head-row rv">
    <div><span class="mono eyebrow">What we help with</span><h2 class="h2">Complete before it<br>reaches your roof.</h2></div>
    <p class="shop-lede">One replacement component or a full system: we guide selection, sizing, delivery, installation, testing and after-sales support.</p>
  </div>
  <div class="abB-cards">
    <?php
    $cards = [
      ['Homes', 'Full home solar', 'Panels, inverter, battery, protection, installation and testing for dependable household power.', 'b40d931493.webp', 'full-home-solar'],
      ['Backup', 'Inverter & battery systems', 'Matched backup for lights, entertainment, fridges, routers, tills and essential loads.', 'about/inverter-wall-a.webp', 'power-backup'],
      ['Business', 'Hybrid commercial setups', 'Solar and backup power for shops, offices, apartments, clinics and small business operations.', 'about/battery-rack.webp', 'business-power-systems'],
      ['Heating', 'Solar water heating', 'Water heating that reduces electricity use in homes, rentals and commercial facilities.', 'solar-water-heating.webp', 'solar-water-heating'],
      ['Outdoor', 'Solar lighting', 'Compound, walkway, security, street and commercial outdoor lighting for safer spaces.', 'outdoor-lighting.webp', 'outdoor-lighting'],
      ['Parts', 'Accessories & protection', 'Controllers, cables, breakers, rails, cabinets and mounting hardware for clean installs.', '510a930c57.webp', 'parts-and-accessories'],
    ];
    foreach ($cards as $c) : ?>
      <article class="abB-card rv">
        <figure class="media"><img src="<?php echo esc_url($img . $c[3]); ?>" alt="" loading="lazy"></figure>
        <div class="abB-card-b">
          <span class="mono abB-k"><?php echo esc_html($c[0]); ?></span>
          <h3><?php echo esc_html($c[1]); ?></h3>
          <p><?php echo esc_html($c[2]); ?></p>
          <a class="link-arrow" href="<?php echo esc_url(home_url('/solutions/' . $c[4] . '/')); ?>">Explore <?php echo esc_html(strtolower($c[1])); ?> <?php echo $arrow_r; ?></a>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<!-- ============ OUR APPROACH ============ -->
<section class="wrap abB-approach">
  <div class="abB-approach-side">
    <span class="mono eyebrow">Our approach</span>
    <h2 class="h2">A clearer path to dependable power.</h2>
    <p class="shop-lede">We keep the process visible, so you understand what is being recommended, why it fits, and how it will be delivered.</p>
    <a class="btn btn-ink" href="<?php echo esc_url($wa('Hello Solar Connect, here are my power needs:')); ?>">Send your power needs</a>
  </div>
  <ol class="abB-timeline">
    <li class="rv"><span class="abB-tn">1</span><div><h3>Listen to the power need</h3><p>We start with your goal, site type, appliances, hours of use and budget range.</p></div></li>
    <li class="rv"><span class="abB-tn">2</span><div><h3>Recommend the right setup</h3><p>The system is sized as a complete outcome, with the right balance of panels, battery, inverter and protection.</p></div></li>
    <li class="rv"><span class="abB-tn">3</span><div><h3>Deliver and install cleanly</h3><p>Products and field work are handled with care, so the final installation feels organised and dependable.</p></div></li>
    <li class="rv"><span class="abB-tn">4</span><div><h3>Test, hand over and support</h3><p>You receive a working system, basic guidance, and a reachable team for follow-up support.</p></div></li>
  </ol>
</section>

<!-- ============ TWO BASES ============ -->
<section class="wrap abB-bases">
  <div class="head-row rv">
    <div><span class="mono eyebrow">Where to find us</span><h2 class="h2">Two bases, one team.</h2></div>
    <p class="shop-lede">Visit, call or WhatsApp either branch. The same team handles your enquiry from first message to handover.</p>
  </div>
  <div class="abB-base-row">
    <article class="abB-base rv">
      <span class="mono abB-k">Nairobi branch</span>
      <h3>Lusaka Road, Nairobi</h3>
      <div class="abB-base-links"><a class="btn btn-ink" href="tel:+254706636447">Call 0706 636 447</a><a class="btn btn-ghost" href="<?php echo esc_url($wa('Hello Solar Connect Nairobi,')); ?>">WhatsApp</a></div>
    </article>
    <article class="abB-base rv">
      <span class="mono abB-k">Watamu branch</span>
      <h3>M2H7+23Q, Watamu</h3>
      <div class="abB-base-links"><a class="btn btn-ink" href="tel:+254705760861">Call 0705 760 861</a><a class="btn btn-ghost" href="https://www.google.com/maps/place/M2H7%2B23Q,+Watamu/@-3.3224125,40.0127344,17z">Open in Maps ↗</a></div>
    </article>
  </div>
</section>

<!-- ============ BRANDS ============ -->
<section class="brands abB-brands" aria-label="Brands we supply and install">
  <p class="mono eyebrow">Genuine brands behind every system</p>
  <div class="marquee"><div class="track">
    <?php include get_stylesheet_directory() . '/parts/brand-marquee.php'; ?>
  </div></div>
</section>

<!-- ============ REVIEWS ============ -->
<section class="wrap abB-reviews">
  <figure class="abB-feature rv">
    <span class="abB-q" aria-hidden="true">“</span>
    <blockquote>The follow-up after installation made me forever love Solar Connect. Thank you, George.</blockquote>
    <figcaption><b>Cavine Ochieng</b><span class="mono">Nairobi · ★★★★★</span></figcaption>
  </figure>
  <div class="abB-minis">
    <figure class="abB-mini rv"><blockquote>“George is responsive, and if he says he will get a product to you by a certain day, he sure keeps his word.”</blockquote><figcaption><b>Abu Rutunu</b> · Nairobi</figcaption></figure>
    <figure class="abB-mini rv"><blockquote>“The team is very professional and their services are top notch.”</blockquote><figcaption><b>Anna Wangechi</b> · Nairobi</figcaption></figure>
    <figure class="abB-mini rv"><blockquote>“Great customer service and excellent site work.”</blockquote><figcaption><b>Linus Mutahi</b> · Nairobi</figcaption></figure>
  </div>
</section>

<!-- ============ CTA ============ -->
<section id="contact" class="wrap abB-cta-wrap">
  <div class="abB-cta rv">
    <div>
      <span class="mono" style="color:var(--mist)">Ready to plan your system?</span>
      <h2>Send us your power needs. We’ll recommend a practical setup.</h2>
      <p>Share your appliances, usage pattern, budget range or site details.</p>
    </div>
    <div class="abB-cta-btns">
      <a class="btn btn-sun" href="<?php echo esc_url($wa('Hello Solar Connect, I need help choosing a solar system.')); ?>">WhatsApp us</a>
      <a class="btn btn-ghost-dark" href="tel:+254706636447">Call 0706 636 447</a>
      <a class="btn btn-ghost-dark" href="<?php echo esc_url($shop); ?>">Browse the shop</a>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
