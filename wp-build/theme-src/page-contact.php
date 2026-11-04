<?php
/**
 * Template Name: Contact
 *
 * Contact page in the About (editorial) style: quick contact options,
 * a quote-request form that composes a WhatsApp message (no email server
 * or stored submissions needed), both branches, and common questions.
 */
get_header();
$img  = get_stylesheet_directory_uri() . '/assets/img/';
$wa   = function ($msg) { return 'https://wa.me/254706636447?text=' . rawurlencode($msg); };
$shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$faqs = get_page_by_path('faqs');
$faqs_url = ($faqs && $faqs->post_status === 'publish') ? get_permalink($faqs) : '';
$sck_nav_current = 'contact';
$arrow = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>';
$i_wa  = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20l1.3-3.9A8 8 0 1 1 8 19.1z"/><path d="M9 9.5c0 3 2.5 5.5 5.5 5.5l1.2-1.4-1.9-1-.8.8a3.6 3.6 0 0 1-2.4-2.4l.8-.8-1-1.9z"/></svg>';
$i_tel = '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/></svg>';
?><main id="top" class="ab ab-b ct">

<div class="abB-top hero"><div class="hero-in abB-top-in"><?php include get_stylesheet_directory() . '/parts/site-nav.php'; ?></div></div>

<!-- ============ HERO ============ -->
<section class="wrap ct-hero" id="hero">
  <div class="ct-hero-txt">
    <span class="mono eyebrow">Contact Solar Connect Kenya</span>
    <h1>Tell us your power needs. <span class="abB-em">We’ll recommend the right setup.</span></h1>
    <p>Share your appliances, usage pattern, budget range or site details, and our team will help you move from idea to the right solar equipment with confidence.</p>
  </div>
  <div class="ct-quick">
    <a class="ct-q ct-q-main" href="<?php echo esc_url($wa('Hello Solar Connect, I need help choosing a solar system.')); ?>">
      <span class="ct-q-ic"><?php echo $i_wa; ?></span>
      <span class="ct-q-txt"><span class="mono">Fastest response</span><b>WhatsApp us</b><span>0706 636 447</span></span>
      <span class="ct-q-go"><?php echo $arrow; ?></span>
    </a>
    <a class="ct-q" href="tel:+254706636447">
      <span class="ct-q-ic"><?php echo $i_tel; ?></span>
      <span class="ct-q-txt"><span class="mono">Nairobi branch</span><b>0706 636 447</b><span>Lusaka Road</span></span>
      <span class="ct-q-go"><?php echo $arrow; ?></span>
    </a>
    <a class="ct-q" href="tel:+254705760861">
      <span class="ct-q-ic"><?php echo $i_tel; ?></span>
      <span class="ct-q-txt"><span class="mono">Watamu branch</span><b>0705 760 861</b><span>M2H7+23Q, Watamu</span></span>
      <span class="ct-q-go"><?php echo $arrow; ?></span>
    </a>
  </div>
</section>

<!-- ============ QUOTE FORM ============ -->
<section class="wrap ct-form-sec" id="contact">
  <div class="ct-form-card">
    <div class="ct-form-head">
      <span class="mono eyebrow">Request a recommendation</span>
      <h2 class="h2">Send your power needs.</h2>
      <p>Fill this in and it opens WhatsApp with your details ready to send to our team. Nothing is stored on this website.</p>
    </div>
    <form class="ct-form" id="ct-form" novalidate>
      <div class="ct-row">
        <label class="ct-f"><span>Your name</span><input type="text" name="name" autocomplete="name" required></label>
        <label class="ct-f"><span>Town or area</span><input type="text" name="location" autocomplete="address-level2" placeholder="e.g. Kilimani, Nairobi" required></label>
      </div>
      <div class="ct-row">
        <label class="ct-f"><span>Property type</span>
          <select name="property" required>
            <option value="">Choose one</option>
            <option>Home</option><option>Apartment or rental units</option><option>Shop or office</option><option>Clinic, school or facility</option><option>Other</option>
          </select>
        </label>
        <label class="ct-f"><span>What do you need?</span>
          <select name="need" required>
            <option value="">Choose one</option>
            <option>Full home solar</option><option>Inverter &amp; battery backup</option><option>Business power system</option><option>Solar water heating</option><option>Outdoor lighting</option><option>Parts &amp; accessories</option><option>Not sure yet</option>
          </select>
        </label>
      </div>
      <label class="ct-f"><span>Appliances and hours of use</span><textarea name="details" rows="4" placeholder="e.g. Fridge 24h, TV and Wi-Fi in the evening, lights, 2 hours of borehole pump per day"></textarea></label>
      <label class="ct-f"><span>Budget range <em>(optional)</em></span><input type="text" name="budget" placeholder="e.g. KSh 150,000 – 250,000"></label>
      <p class="ct-err" id="ct-err" role="alert" hidden>Please fill in your name, area, property type and what you need.</p>
      <div class="ct-actions">
        <button class="btn btn-ink" type="submit"><?php echo $i_wa; ?>Send on WhatsApp</button>
        <span class="ct-note">Prefer to call? <a href="tel:+254706636447">0706 636 447</a></span>
      </div>
      <noscript><p class="ct-note">This form needs JavaScript. You can <a href="<?php echo esc_url($wa('Hello Solar Connect, I need help choosing a solar system.')); ?>">message us on WhatsApp directly</a>.</p></noscript>
    </form>
  </div>
  <aside class="ct-side">
    <figure class="media ct-side-img"><img src="<?php echo esc_url($img . 'about/inverter-wall-c.webp'); ?>" alt="Inverter and battery backup installed by Solar Connect Kenya" loading="lazy"></figure>
    <div class="ct-side-card">
      <h3>What helps us recommend faster</h3>
      <ul>
        <li>The appliances you want to power, and for how many hours a day</li>
        <li>How long you need backup during outages</li>
        <li>Your property type and location</li>
        <li>A budget range, if you have one</li>
        <li>Photos of your roof or meter board, if you can share them on WhatsApp</li>
      </ul>
    </div>
  </aside>
</section>

<!-- ============ BRANCHES ============ -->
<section class="wrap abB-bases ct-bases">
  <div class="head-row rv">
    <div><span class="mono eyebrow">Visit us</span><h2 class="h2">Two bases, one team.</h2></div>
    <p class="shop-lede">Visit, call or WhatsApp either branch. The same team handles your enquiry from first message to handover.</p>
  </div>
  <div class="abB-base-row">
    <article class="abB-base rv">
      <span class="mono abB-k">Nairobi branch</span>
      <h3>Lusaka Road, Nairobi</h3>
      <div class="abB-base-links"><a class="btn btn-ink" href="tel:+254706636447">Call 0706 636 447</a><a class="btn btn-ghost" href="<?php echo esc_url($wa('Hello Solar Connect Nairobi,')); ?>">WhatsApp</a><a class="btn btn-ghost" href="https://www.google.com/maps/search/?api=1&amp;query=Lusaka+Road+Nairobi">Directions ↗</a></div>
    </article>
    <article class="abB-base rv">
      <span class="mono abB-k">Watamu branch</span>
      <h3>M2H7+23Q, Watamu</h3>
      <div class="abB-base-links"><a class="btn btn-ink" href="tel:+254705760861">Call 0705 760 861</a><a class="btn btn-ghost" href="https://www.google.com/maps/place/M2H7%2B23Q,+Watamu/@-3.3224125,40.0127344,17z">Directions ↗</a></div>
    </article>
  </div>
</section>

<!-- ============ COMMON QUESTIONS ============ -->
<section class="wrap ct-faq">
  <div class="ct-faq-side rv">
    <span class="mono eyebrow">Before you message</span>
    <h2 class="h2">Common questions.</h2>
    <?php if ($faqs_url) : ?><a class="link-arrow" href="<?php echo esc_url($faqs_url); ?>">See all FAQs <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a><?php endif; ?>
  </div>
  <div class="fq-list rv">
    <details class="fq"><summary>How do I know what size of system I need?<span class="fq-sign" aria-hidden="true"></span></summary><div class="fq-a"><p>We size every system around real usage: the appliances you want to run, how many hours you use them, your backup goals and your site. Send us that list and we’ll recommend matched panels, inverter, battery and protection.</p></div></details>
    <details class="fq"><summary>Do you install, or only sell products?<span class="fq-sign" aria-hidden="true"></span></summary><div class="fq-a"><p>Both. We can supply a single component or handle the full job: system sizing, delivery, installation, testing and handover, with after-sales support on WhatsApp.</p></div></details>
    <details class="fq"><summary>Can I start with backup and add panels later?<span class="fq-sign" aria-hidden="true"></span></summary><div class="fq-a"><p>Yes. An inverter and battery setup keeps essential appliances running during outages, and we plan it so solar panels can be added later.</p></div></details>
  </div>
</section>

</main>
<?php get_footer(); ?>
