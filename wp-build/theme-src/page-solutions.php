<?php
/**
 * Template Name: Solutions hub
 *
 * /solutions/: overview of every solution page (from sck_solutions()),
 * a "where to start" chooser, the process and a closing CTA.
 */
get_header();
$all  = sck_solutions();
$img  = get_stylesheet_directory_uri() . '/assets/img/';
$contact = home_url('/contact-us/');
$wa   = 'https://wa.me/254706636447?text=' . rawurlencode('Hello Solar Connect, I am not sure which solar solution I need. My situation is:');
$shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$sck_nav_current = 'solutions';
$arrow_r = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
$choose = [
    ['I want to cut my power bill and run my home on solar', 'full-home-solar'],
    ['I just need power during blackouts', 'power-backup'],
    ['I run a shop, office, clinic or apartment block', 'business-power-systems'],
    ['Hot water is a big part of my electricity bill', 'solar-water-heating'],
    ['I need light at the gate, compound or parking', 'outdoor-lighting'],
    ['I already have a system and need parts', 'parts-and-accessories'],
];
?><main id="top" class="ab ab-b sl sl-hub">

<div class="abB-top hero"><div class="hero-in abB-top-in"><?php include get_stylesheet_directory() . '/parts/site-nav.php'; ?></div></div>

<section class="wrap abB-hero sl-hero">
  <div class="abB-hero-txt">
    <span class="mono eyebrow">Solar solutions</span>
    <h1>Solar solutions for homes and businesses in Kenya</h1>
    <p>Complete home systems, inverter and battery backup, business hybrid systems, solar water heating, outdoor lighting and parts. Each one is sized around how you actually use power, then supplied, installed and supported by one team.</p>
    <div class="abB-actions">
      <a class="btn btn-ink" href="<?php echo esc_url($contact); ?>">Get a free quote</a>
      <a class="btn btn-ghost" href="#start">Help me choose</a>
    </div>
  </div>
  <div class="abB-collage">
    <figure class="media abB-c1"><img src="<?php echo esc_url($img . 'about/rooftop-landscape.webp'); ?>" alt="Rooftop solar array installed by Solar Connect" fetchpriority="high"></figure>
    <figure class="media abB-c2"><img src="<?php echo esc_url($img . 'about/inverter-wall-a.webp'); ?>" alt="" decoding="async"></figure>
    <div class="abB-badge"><b>6</b><span>Solutions</span><b>2</b><span>Locations · Nairobi &amp; Watamu</span></div>
  </div>
</section>

<section class="wrap abB-help sl-all">
  <div class="head-row rv">
    <div><span class="mono eyebrow">Our solutions</span><h2 class="h2">Pick the outcome<br>you need.</h2></div>
    <p class="shop-lede">Every solution covers selection, sizing, delivery, installation, testing and after-sales support.</p>
  </div>
  <div class="abB-cards">
    <?php foreach ($all as $k => $s) : ?>
      <article class="abB-card rv">
        <figure class="media"><img src="<?php echo esc_url($img . $s['img']); ?>" alt="" loading="lazy"></figure>
        <div class="abB-card-b">
          <span class="mono abB-k"><?php echo esc_html($s['eyebrow']); ?></span>
          <h3><a href="<?php echo esc_url(sck_solution_url($k)); ?>"><?php echo esc_html($s['title']); ?></a></h3>
          <p><?php echo esc_html($s['card']); ?></p>
          <span class="link-arrow" aria-hidden="true">Explore <?php echo $arrow_r; ?></span>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="dark band abB-standard sl-start" id="start">
  <div class="wrap">
    <div class="head-row rv">
      <div><span class="mono eyebrow">Where to start</span><h2 class="h2">Not sure which<br>one you need?</h2></div>
      <p class="lede">Pick the sentence that sounds most like you. If none fit, send us your situation and we will point you the right way.</p>
    </div>
    <ul class="sl-choose">
      <?php foreach ($choose as $c) : ?>
      <li class="rv"><a href="<?php echo esc_url(sck_solution_url($c[1])); ?>"><span><?php echo esc_html($c[0]); ?></span><em><?php echo esc_html($all[$c[1]]['title']); ?> <?php echo $arrow_r; ?></em></a></li>
      <?php endforeach; ?>
    </ul>
    <a class="btn btn-sun sl-start-btn" href="<?php echo esc_url($wa); ?>">Describe my situation on WhatsApp</a>
  </div>
</section>

<section class="wrap abB-approach">
  <div class="abB-approach-side">
    <span class="mono eyebrow">How we work</span>
    <h2 class="h2">A clearer path to dependable power.</h2>
    <p class="shop-lede">The same four steps for every solution, so you understand what is recommended and why.</p>
    <a class="btn btn-ink" href="<?php echo esc_url($contact); ?>">Send your power needs</a>
  </div>
  <ol class="abB-timeline">
    <li class="rv"><span class="abB-tn">1</span><div><h3>Listen to the power need</h3><p>Your goal, site type, appliances, hours of use and budget range.</p></div></li>
    <li class="rv"><span class="abB-tn">2</span><div><h3>Recommend the right setup</h3><p>Panels, battery, inverter and protection sized as one complete system.</p></div></li>
    <li class="rv"><span class="abB-tn">3</span><div><h3>Deliver and install cleanly</h3><p>Careful delivery and tidy field work, so the installation is organised and dependable.</p></div></li>
    <li class="rv"><span class="abB-tn">4</span><div><h3>Test, hand over and support</h3><p>A working system, clear guidance and a reachable team for follow-up.</p></div></li>
  </ol>
</section>

<section class="wrap abB-cta-wrap">
  <div class="abB-cta rv">
    <div>
      <span class="mono" style="color:var(--mist)">Ready to plan your system?</span>
      <h2>Send us your power needs. We’ll recommend a practical setup.</h2>
      <p>Share your appliances, usage pattern, budget range or site details.</p>
    </div>
    <div class="abB-cta-btns">
      <a class="btn btn-sun" href="<?php echo esc_url($contact); ?>">Get a free quote</a>
      <a class="btn btn-ghost-dark" href="tel:+254706636447">Call 0706 636 447</a>
      <a class="btn btn-ghost-dark" href="<?php echo esc_url($shop); ?>">Browse the shop</a>
    </div>
  </div>
</section>

</main>
<?php get_footer();
