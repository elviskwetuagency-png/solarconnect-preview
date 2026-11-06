<?php
/**
 * Template Name: Solution page
 *
 * One solution (child of /solutions/). Copy comes from sck_solutions()
 * keyed by this page's slug; products and "from" prices are live from
 * WooCommerce. Reuses the About B editorial blocks for a consistent look.
 */
get_header();
$slug = sck_current_solution();
$all  = sck_solutions();
if (!$slug) { $slug = array_key_first($all); }
$s    = $all[$slug];
$img  = get_stylesheet_directory_uri() . '/assets/img/';
$contact = home_url('/contact-us/');
$wa   = 'https://wa.me/254706636447?text=' . rawurlencode('Hello Solar Connect, I would like a quote for ' . strtolower($s['title']) . '. My needs are:');
$shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$sck_nav_current = 'solutions';
$arrow_r = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
$check = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12.5l4.2 4.2L19 7"/></svg>';
$ksh  = function ($n) { return 'KSh ' . number_format((float) $n); };
$first_cat = get_term_by('slug', $s['cats'][0], 'product_cat');
$cat_url   = $first_cat ? get_term_link($first_cat) : $shop;
$prices = [];
foreach ($s['prices'] as $pr) { $min = sck_cat_min_price($pr[0]); if ($min > 0) $prices[] = [$pr[1], $min, $pr[0]]; }
$products = sck_solution_products($s, 4);
?><main id="top" class="ab ab-b sl">

<div class="abB-top hero"><div class="hero-in abB-top-in"><?php include get_stylesheet_directory() . '/parts/site-nav.php'; ?></div></div>

<section class="wrap abB-hero sl-hero">
  <div class="abB-hero-txt">
    <nav class="sl-crumbs mono" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span aria-hidden="true">/</span><a href="<?php echo esc_url(sck_solution_url()); ?>">Solutions</a><span aria-hidden="true">/</span><span aria-current="page"><?php echo esc_html($s['title']); ?></span></nav>
    <span class="mono eyebrow"><?php echo esc_html($s['eyebrow']); ?></span>
    <h1><?php echo esc_html($s['h1']); ?></h1>
    <p><?php echo esc_html($s['sub']); ?></p>
    <div class="abB-actions">
      <a class="btn btn-ink" href="<?php echo esc_url($contact); ?>">Get a free quote</a>
      <a class="btn btn-ghost" href="<?php echo esc_url($wa); ?>">WhatsApp us</a>
    </div>
  </div>
  <div class="abB-collage sl-collage">
    <figure class="media abB-c1"><img src="<?php echo esc_url($img . $s['img']); ?>" alt="<?php echo esc_attr($s['img_alt']); ?>" fetchpriority="high"></figure>
    <figure class="media abB-c2"><img src="<?php echo esc_url($img . $s['img2']); ?>" alt="" loading="lazy"></figure>
    <?php if ($prices) : ?><div class="abB-badge sl-badge"><span>From</span><b><?php echo esc_html($ksh($prices[0][1])); ?></b><span><?php echo esc_html($prices[0][0]); ?></span></div><?php endif; ?>
  </div>
</section>

<section class="wrap sl-intro">
  <p class="sl-intro-p rv"><?php echo esc_html($s['intro']); ?></p>
  <div class="sl-best rv">
    <span class="mono eyebrow">Best for</span>
    <ul><?php foreach ($s['best'] as $b) : ?><li><?php echo $check; ?><span><?php echo esc_html($b); ?></span></li><?php endforeach; ?></ul>
  </div>
</section>

<section class="dark band abB-standard sl-incl">
  <div class="wrap">
    <div class="head-row rv">
      <div><span class="mono eyebrow">What is included</span><h2 class="h2">One system,<br>planned end to end.</h2></div>
      <p class="lede">Every <?php echo esc_html(strtolower($s['title'])); ?> project is sized and installed as a complete outcome, not a pile of separate parts.</p>
    </div>
    <ol class="sl-incl-list">
      <?php foreach ($s['incl'] as $i => $it) : ?>
      <li class="rv"><span class="abB-big"><?php echo sprintf('%02d', $i + 1); ?></span><div><h3><?php echo esc_html($it[0]); ?></h3><p><?php echo esc_html($it[1]); ?></p></div></li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section class="wrap abB-approach sl-steps">
  <div class="abB-approach-side">
    <span class="mono eyebrow">How it works</span>
    <h2 class="h2">From your power needs to a working system.</h2>
    <p class="shop-lede">Three clear steps, with the same team from the first message to handover.</p>
    <a class="btn btn-ink" href="<?php echo esc_url($contact); ?>">Send your power needs</a>
  </div>
  <ol class="abB-timeline">
    <?php foreach ($s['steps'] as $i => $st) : ?>
    <li class="rv"><span class="abB-tn"><?php echo (int) $i + 1; ?></span><div><h3><?php echo esc_html($st[0]); ?></h3><p><?php echo esc_html($st[1]); ?></p></div></li>
    <?php endforeach; ?>
  </ol>
</section>

<?php if ($products) : ?>
<section class="wrap sl-prods">
  <div class="head-row rv">
    <div><span class="mono eyebrow">Shop the components</span><h2 class="h2">Equipment we use for <?php echo esc_html(strtolower($s['title'])); ?>.</h2></div>
    <?php if ($prices) : ?>
    <dl class="sl-prices">
      <?php foreach ($prices as $pr) : $t = get_term_by('slug', $pr[2], 'product_cat'); ?>
      <div><dt class="mono"><?php if ($t) : ?><a href="<?php echo esc_url(get_term_link($t)); ?>"><?php echo esc_html($pr[0]); ?></a><?php else : echo esc_html($pr[0]); endif; ?></dt><dd>from <b><?php echo esc_html($ksh($pr[1])); ?></b></dd></div>
      <?php endforeach; ?>
    </dl>
    <?php endif; ?>
  </div>
  <div class="grid4">
    <?php foreach ($products as $pid) {
        $terms = get_the_terms($pid, 'product_cat');
        $lbl = ($terms && !is_wp_error($terms)) ? $terms[0]->name : '';
        echo sck_product_card($pid, $lbl);
    } ?>
  </div>
  <div class="sl-prods-foot">
    <a class="btn btn-ink" href="<?php echo esc_url($cat_url); ?>">See all <?php echo esc_html($first_cat ? strtolower($first_cat->name) : 'products'); ?> <?php echo $arrow_r; ?></a>
    <p class="mono">Prices are live from our shop. Delivery and installation are quoted for your site.</p>
  </div>
</section>
<?php endif; ?>

<section class="wrap sl-learn">
  <div class="sl-guides">
    <span class="mono eyebrow">Solar guides</span>
    <h2 class="h2">Read before you buy.</h2>
    <ul>
      <?php foreach ($s['guides'] as $g) : $gp = get_page_by_path($g, OBJECT, 'post'); if (!$gp || $gp->post_status !== 'publish') continue; ?>
      <li><a href="<?php echo esc_url(get_permalink($gp)); ?>"><span><?php echo esc_html(get_the_title($gp)); ?></span><?php echo $arrow_r; ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="sl-faqs">
    <span class="mono eyebrow">Common questions</span>
    <h2 class="h2">FAQs</h2>
    <div class="fq-list">
      <?php foreach ($s['faqs'] as $f) : ?>
      <details class="fq"><summary><?php echo esc_html($f[0]); ?><span class="fq-sign" aria-hidden="true"></span></summary><div class="fq-a"><p><?php echo esc_html($f[1]); ?></p></div></details>
      <?php endforeach; ?>
    </div>
    <a class="link-arrow" href="<?php echo esc_url(home_url('/faqs/')); ?>">All FAQs <?php echo $arrow_r; ?></a>
  </div>
</section>

<?php $sck_rel = function_exists('sck_projects') ? sck_projects(['numberposts' => 3, 'meta_key' => '_sck_p_solution', 'meta_value' => $slug]) : []; if ($sck_rel) : ?>
<section class="wrap sl-projects">
  <div class="head-row rv"><div><span class="mono eyebrow">Recent projects</span><h2 class="h2"><?php echo esc_html($s['title']); ?> we have installed.</h2></div><a class="link-arrow" href="<?php echo esc_url(get_post_type_archive_link('sck_project')); ?>">All projects <?php echo $arrow_r; ?></a></div>
  <div class="pj-grid"><?php foreach ($sck_rel as $p) echo sck_project_card($p); ?></div>
</section>
<?php endif; ?>

<section class="wrap sl-more">
  <div class="head-row rv"><div><span class="mono eyebrow">Other solutions</span><h2 class="h2">Explore more ways to power up.</h2></div></div>
  <div class="sl-more-grid">
    <?php foreach ($all as $k => $o) : if ($k === $slug) continue; ?>
    <a class="sl-mini rv" href="<?php echo esc_url(sck_solution_url($k)); ?>">
      <figure class="media"><img src="<?php echo esc_url($img . $o['img']); ?>" alt="" loading="lazy"></figure>
      <span class="mono"><?php echo esc_html($o['eyebrow']); ?></span>
      <b><?php echo esc_html($o['title']); ?></b>
    </a>
    <?php endforeach; ?>
  </div>
</section>

<section class="wrap abB-cta-wrap">
  <div class="abB-cta rv">
    <div>
      <span class="mono" style="color:var(--mist)">Ready to plan your <?php echo esc_html(strtolower($s['title'])); ?>?</span>
      <h2>Send us your power needs. We’ll recommend a practical setup.</h2>
      <p>Share your appliances, usage pattern, budget range or site details.</p>
    </div>
    <div class="abB-cta-btns">
      <a class="btn btn-sun" href="<?php echo esc_url($contact); ?>">Get a free quote</a>
      <a class="btn btn-ghost-dark" href="<?php echo esc_url($wa); ?>">WhatsApp us</a>
      <a class="btn btn-ghost-dark" href="tel:+254706636447">Call 0706 636 447</a>
    </div>
  </div>
</section>

</main>
<?php get_footer();
