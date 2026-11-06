<?php
/**
 * /projects/: all published projects, filterable by solution type.
 */
get_header();
$contact = home_url('/contact-us/');
$sck_nav_current = 'projects';
$projects = sck_projects();
$sols = sck_project_solutions();
$present = array_values(array_unique(array_filter(array_map(function ($p) { return sck_project_meta($p->ID, 'solution'); }, $projects))));
$img = get_stylesheet_directory_uri() . '/assets/img/';
?><main id="top" class="ab ab-b sl pj">

<div class="abB-top hero"><div class="hero-in abB-top-in"><?php include get_stylesheet_directory() . '/parts/site-nav.php'; ?></div></div>

<section class="wrap pj-hero">
  <nav class="sl-crumbs mono" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a><span aria-hidden="true">/</span><span aria-current="page">Projects</span></nav>
  <div class="head-row">
    <div><span class="mono eyebrow">Our projects</span><h1>Solar installations across Kenya</h1></div>
    <p class="shop-lede">Real systems our team has sized, supplied, installed and handed over, for homes, businesses and institutions from Nairobi to the coast.</p>
  </div>
  <div class="pj-stats">
    <div><b>200+</b><span class="mono">Solar projects completed</span></div>
    <div><b>2</b><span class="mono">Locations · Nairobi &amp; Watamu</span></div>
    <div><b>6</b><span class="mono">Solution types</span></div>
  </div>
</section>

<section class="wrap pj-list">
  <?php if ($projects) : ?>
    <?php if (count($present) > 1) : ?>
    <div class="pj-filter" role="group" aria-label="Filter projects by solution">
      <button type="button" class="pj-chip" aria-pressed="true" data-f="">All</button>
      <?php foreach ($present as $sv) : if (!isset($sols[$sv])) continue; ?>
      <button type="button" class="pj-chip" aria-pressed="false" data-f="<?php echo esc_attr($sv); ?>"><?php echo esc_html($sols[$sv]); ?></button>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="pj-grid" id="pj-grid">
      <?php foreach ($projects as $p) echo sck_project_card($p); ?>
    </div>
  <?php else : ?>
    <div class="pj-empty">
      <h2 class="h2">Project stories are on the way.</h2>
      <p class="shop-lede">We are documenting recent installations. In the meantime, ask us for examples similar to your site.</p>
      <a class="btn btn-ink" href="https://wa.me/254706636447?text=<?php echo rawurlencode('Hello Solar Connect, can you share examples of projects similar to mine?'); ?>">Ask for examples on WhatsApp</a>
    </div>
  <?php endif; ?>
</section>

<section class="wrap abB-cta-wrap">
  <div class="abB-cta rv">
    <div>
      <span class="mono" style="color:var(--mist)">Want a system like these?</span>
      <h2>Send us your power needs. We’ll recommend a practical setup.</h2>
      <p>Share your appliances, usage pattern, budget range or site details.</p>
    </div>
    <div class="abB-cta-btns">
      <a class="btn btn-sun" href="<?php echo esc_url($contact); ?>">Get a free quote</a>
      <a class="btn btn-ghost-dark" href="tel:+254706636447">Call 0706 636 447</a>
      <a class="btn btn-ghost-dark" href="<?php echo esc_url(sck_solution_url()); ?>">Explore solutions</a>
    </div>
  </div>
</section>

</main>
<script>
(function(){
  var chips=[].slice.call(document.querySelectorAll('.pj-chip')), cards=[].slice.call(document.querySelectorAll('#pj-grid .pjc'));
  chips.forEach(function(c){ c.addEventListener('click', function(){
    var f=c.getAttribute('data-f');
    chips.forEach(function(x){ x.setAttribute('aria-pressed', x===c?'true':'false'); });
    cards.forEach(function(card){ card.hidden = !!f && card.getAttribute('data-sol')!==f; card.classList.remove('pre'); });
  }); });
})();
</script>
<?php get_footer();
