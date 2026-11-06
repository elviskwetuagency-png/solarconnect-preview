<?php
/**
 * One project: title, key facts, story (need → what we installed → result),
 * photos, equipment from the shop, customer quote, related projects.
 */
get_header();
the_post();
$id   = get_the_ID();
$sols = sck_project_solutions();
$cust = sck_project_customer_types();
$m    = function ($k) use ($id) { return sck_project_meta($id, $k); };
$sv   = $m('solution');
$contact = home_url('/contact-us/');
$sck_nav_current = 'projects';
$arrow_r = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
$facts = array_filter([
    'Location'    => $m('location'),
    'Customer'    => $cust[$m('customer')] ?? '',
    'System'      => $m('size'),
    'Completed'   => sck_project_date_label($m('completed')),
]);
$gallery = array_filter(array_map('intval', explode(',', (string) $m('gallery'))));
$equip   = array_filter(array_map('intval', explode(',', (string) $m('equipment'))));
$body    = trim(get_the_content());
$wa = 'https://wa.me/254706636447?text=' . rawurlencode('Hello Solar Connect, I saw the project "' . get_the_title() . '" and would like something similar.');
?><main id="top" class="ab ab-b sl pj pj-one">

<div class="abB-top hero"><div class="hero-in abB-top-in"><?php include get_stylesheet_directory() . '/parts/site-nav.php'; ?></div></div>

<article>
<header class="wrap pj-head">
  <nav class="sl-crumbs mono" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span aria-hidden="true">/</span><a href="<?php echo esc_url(get_post_type_archive_link('sck_project')); ?>">Projects</a><span aria-hidden="true">/</span><span aria-current="page"><?php the_title(); ?></span></nav>
  <?php if (isset($sols[$sv])) : ?><a class="mono eyebrow pj-sol" href="<?php echo esc_url(sck_solution_url($sv)); ?>"><?php echo esc_html($sols[$sv]); ?></a><?php endif; ?>
  <h1><?php the_title(); ?></h1>
  <?php if (has_excerpt()) : ?><p class="pj-dek"><?php echo esc_html(get_the_excerpt()); ?></p><?php endif; ?>
</header>

<?php if (has_post_thumbnail()) : ?>
<figure class="wrap pj-main"><div class="media"><?php the_post_thumbnail('full', ['fetchpriority' => 'high', 'alt' => esc_attr(get_the_title())]); ?></div></figure>
<?php endif; ?>

<?php if ($facts) : ?>
<section class="wrap"><dl class="pj-facts">
  <?php foreach ($facts as $k => $v) : ?><div><dt class="mono"><?php echo esc_html($k); ?></dt><dd><?php echo esc_html($v); ?></dd></div><?php endforeach; ?>
</dl></section>
<?php endif; ?>

<section class="wrap pj-story">
  <?php if ($m('challenge')) : ?><div class="pj-block"><span class="mono eyebrow">What the customer needed</span><p><?php echo esc_html($m('challenge')); ?></p></div><?php endif; ?>
  <?php if ($body) : ?><div class="pj-block pj-prose pst-prose"><span class="mono eyebrow">What we installed</span><?php the_content(); ?></div><?php endif; ?>
  <?php if ($m('result')) : ?><div class="pj-block"><span class="mono eyebrow">The result</span><p><?php echo esc_html($m('result')); ?></p></div><?php endif; ?>
</section>

<?php if ($m('quote')) : ?>
<section class="wrap pj-quote-wrap"><figure class="abB-feature pj-quote rv">
  <span class="abB-q" aria-hidden="true">“</span>
  <blockquote><?php echo esc_html($m('quote')); ?></blockquote>
  <?php if ($m('quote_by')) : ?><figcaption><b><?php echo esc_html($m('quote_by')); ?></b></figcaption><?php endif; ?>
</figure></section>
<?php endif; ?>

<?php if ($gallery) : ?>
<section class="wrap pj-gal" aria-label="Project photos">
  <?php foreach ($gallery as $aid) : ?>
    <a class="media" href="<?php echo esc_url(wp_get_attachment_image_url($aid, 'full')); ?>"><?php echo wp_get_attachment_image($aid, 'large', false, ['loading' => 'lazy']); ?></a>
  <?php endforeach; ?>
</section>
<?php endif; ?>
</article>

<?php $cards = ''; foreach ($equip as $pid) { $terms = get_the_terms($pid, 'product_cat'); $cards .= sck_product_card($pid, ($terms && !is_wp_error($terms)) ? $terms[0]->name : ''); }
if ($cards) : ?>
<section class="wrap sl-prods">
  <div class="head-row rv"><div><span class="mono eyebrow">Equipment used</span><h2 class="h2">Installed on this project.</h2></div></div>
  <div class="grid4"><?php echo $cards; ?></div>
</section>
<?php endif; ?>

<?php $more = sck_projects(['numberposts' => 3, 'exclude' => [$id]]); if ($more) : ?>
<section class="wrap pj-more">
  <div class="head-row rv"><div><span class="mono eyebrow">More projects</span><h2 class="h2">Other recent installations.</h2></div><a class="link-arrow" href="<?php echo esc_url(get_post_type_archive_link('sck_project')); ?>">All projects <?php echo $arrow_r; ?></a></div>
  <div class="pj-grid"><?php foreach ($more as $p) echo sck_project_card($p); ?></div>
</section>
<?php endif; ?>

<section class="wrap abB-cta-wrap">
  <div class="abB-cta rv">
    <div>
      <span class="mono" style="color:var(--mist)">Want a system like this?</span>
      <h2>Send us your power needs. We’ll recommend a practical setup.</h2>
      <p>Share your appliances, usage pattern, budget range or site details.</p>
    </div>
    <div class="abB-cta-btns">
      <a class="btn btn-sun" href="<?php echo esc_url($contact); ?>">Get a free quote</a>
      <a class="btn btn-ghost-dark" href="<?php echo esc_url($wa); ?>">Ask about this project</a>
      <?php if (isset($sols[$sv])) : ?><a class="btn btn-ghost-dark" href="<?php echo esc_url(sck_solution_url($sv)); ?>"><?php echo esc_html($sols[$sv]); ?></a><?php endif; ?>
    </div>
  </div>
</section>

</main>
<?php get_footer();
