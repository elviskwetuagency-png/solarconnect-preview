<?php
/**
 * Template Name: FAQs
 *
 * FAQ page in the About (editorial) style. Answers only state what the
 * site itself already says (About/Solutions copy, product listings,
 * footer promise). Questions live in one array that drives both the
 * accordion and the FAQPage structured data, so they can't drift apart.
 */
get_header();
$wa      = function ($msg) { return 'https://wa.me/254706636447?text=' . rawurlencode($msg); };
$shop    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$acct    = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$contact = get_page_by_path('contact-us');
$contact_url = ($contact && $contact->post_status === 'publish') ? get_permalink($contact) : $wa('Hello Solar Connect,');
$sck_nav_current = 'faqs';

/* Brands that actually have products right now, largest range first. */
$brand_terms = get_terms(['taxonomy' => 'product_tag', 'hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC', 'number' => 10]);
$brand_names = is_wp_error($brand_terms) ? [] : wp_list_pluck($brand_terms, 'name');
$brand_list  = count($brand_names) > 1 ? implode(', ', array_slice($brand_names, 0, -1)) . ' and ' . end($brand_names) : implode('', $brand_names);

$groups = [
    'choosing' => ['Choosing a system', [
        ['How do I know what size of solar system I need?',
         'We size every system around real usage: the appliances you want to run, how many hours a day you use them, how long you need backup during outages, and your site conditions. Send us that list and we’ll recommend matched panels, inverter, battery and protection gear as one complete system.'],
        ['What information should I send for a quote?',
         'Your property type (home, apartment, shop, office or facility), the main appliances and their hours of use, how long you need backup, your location and, if you have one, a budget range. You can send it on WhatsApp or through the form on our <a href="' . esc_url($contact_url) . '">contact page</a>.'],
        ['What’s the difference between full home solar and inverter-battery backup?',
         'Full home solar combines panels, an inverter, battery storage, protection, installation and testing to power the home and reduce grid reliance. Inverter-battery backup focuses on stability first: it keeps essential loads such as lights, TV, Wi-Fi and charging running during outages without needing a full solar array straight away.'],
        ['Can I start with backup and add solar panels later?',
         'Yes. A backup system is sized by the hours of backup you need, and we can plan it so solar panels can be added later as an expansion.'],
        ['Do you design systems for businesses?',
         'Yes. We set up hybrid solar and backup systems for shops, offices, apartments, clinics, salons and other operations with daytime energy demand, starting with a load assessment of your equipment and backup for your priority loads, then handover to your staff.'],
        ['Do you also do solar water heating and outdoor lighting?',
         'Yes. We supply and guide solar water heating for homes, rentals and guest houses, and solar lighting for compounds, walkways, parking areas, gates and commercial outdoor spaces.'],
    ]],
    'buying' => ['Buying and orders', [
        ['Can I buy single components, or only complete systems?',
         'Both. Our <a href="' . esc_url($shop) . '">shop</a> stocks panels, inverters, batteries, charge controllers, water heaters, lighting and accessories. If you’re adding to an existing setup, tell us what you already have so we can confirm the new part is compatible.'],
        ['Which brands do you stock?',
         'Genuine brands including ' . $brand_list . '. You can <a href="' . esc_url($shop) . '">filter the shop by brand</a> to see what’s currently available.'],
        ['Do products come with a warranty?',
         'Warranty cover depends on the product and manufacturer, and it’s stated on each product page where provided. For example, some of our gel batteries list 1 year and several lithium batteries list 3 to 5 years. Ask us to confirm the cover on any item before you buy.'],
        ['How do I check the status of my order?',
         'Log in to <a href="' . esc_url($acct) . '">My account</a> and open Orders, or message us on WhatsApp with your order number.'],
    ]],
    'install' => ['Installation and support', [
        ['Do you install, or only sell products?',
         'Both. We can supply a single component or handle the full job: consultation and sizing, delivery, installation, testing and handover.'],
        ['What happens after installation?',
         'We test the system, hand it over working, and explain the basic operating routine. After that you keep talking to the same team for follow-up support on WhatsApp.'],
        ['Where are you based?',
         'We have two bases: our Nairobi branch on Lusaka Road (0706 636 447) and our Watamu branch at M2H7+23Q, Watamu (0705 760 861). Tell us where your site is and the nearest branch will take it from there.'],
    ]],
];

/* FAQPage structured data from the same content. */
$schema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => []];
foreach ($groups as $g) {
    foreach ($g[1] as $qa) {
        $schema['mainEntity'][] = ['@type' => 'Question', 'name' => $qa[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => wp_strip_all_tags($qa[1])]];
    }
}
?><main id="top" class="ab ab-b fqp">

<div class="abB-top hero"><div class="hero-in abB-top-in"><?php include get_stylesheet_directory() . '/parts/site-nav.php'; ?></div></div>

<section class="wrap fqp-hero" id="hero">
  <span class="mono eyebrow">Frequently asked questions</span>
  <h1>Questions customers ask <span class="abB-em">before going solar.</span></h1>
  <p>Straight answers on sizing, buying, installation and support. Can’t find yours? Ask us on WhatsApp.</p>
  <nav class="fqp-jump" aria-label="FAQ topics">
    <?php foreach ($groups as $id => $g) : ?><a href="#<?php echo esc_attr($id); ?>"><?php echo esc_html($g[0]); ?></a><?php endforeach; ?>
  </nav>
</section>

<section class="wrap fqp-body">
  <?php foreach ($groups as $id => $g) : ?>
    <div class="fqp-group" id="<?php echo esc_attr($id); ?>">
      <h2 class="fqp-gh"><?php echo esc_html($g[0]); ?></h2>
      <div class="fq-list">
        <?php foreach ($g[1] as $qa) : ?>
          <details class="fq"><summary><?php echo esc_html($qa[0]); ?><span class="fq-sign" aria-hidden="true"></span></summary><div class="fq-a"><p><?php echo wp_kses($qa[1], ['a' => ['href' => []]]); ?></p></div></details>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>
</section>

<section id="contact" class="wrap abB-cta-wrap">
  <div class="abB-cta rv">
    <div>
      <span class="mono" style="color:var(--mist)">Still have a question?</span>
      <h2>Ask the team directly on WhatsApp or by phone.</h2>
      <p>Send your question with any photos or details of your setup.</p>
    </div>
    <div class="abB-cta-btns">
      <a class="btn btn-sun" href="<?php echo esc_url($wa('Hello Solar Connect, I have a question:')); ?>">WhatsApp us</a>
      <a class="btn btn-ghost-dark" href="tel:+254706636447">Call 0706 636 447</a>
      <a class="btn btn-ghost-dark" href="<?php echo esc_url($contact_url); ?>">Contact page</a>
    </div>
  </div>
</section>

<script type="application/ld+json"><?php echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
</main>
<?php get_footer(); ?>
