<?php
/**
 * Single blog post (solar guide). Dark nav strip, article header with
 * category / reading time / updated date, featured image, readable prose
 * column with a sticky "talk to us" card, then related guides and a CTA.
 * Byline is the company (the Article schema author is set to the
 * Organization in functions.php to match).
 */
get_header();
$sck_nav_current = 'blog';
$wa = 'https://wa.me/254706636447?text=' . rawurlencode('Hello Solar Connect, I read your guide and have a question:');
$blog = get_permalink((int) get_option('page_for_posts')) ?: home_url('/blog/');
?><main id="top" class="ab ab-b pst">

<div class="abB-top hero"><div class="hero-in abB-top-in"><?php include get_stylesheet_directory() . '/parts/site-nav.php'; ?></div></div>

<?php while (have_posts()) : the_post();
  $cat  = get_the_category();
  $mins = max(2, (int) ceil(str_word_count(wp_strip_all_tags(get_the_content())) / 220));
?>
<article <?php post_class('pst-article'); ?>>
  <header class="wrap pst-head" id="hero">
    <nav class="pst-crumbs" aria-label="Breadcrumb"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <a href="<?php echo esc_url($blog); ?>">Solar guides</a></nav>
    <span class="mono eyebrow"><?php echo esc_html($cat ? $cat[0]->name : 'Guide'); ?> · <?php echo (int) $mins; ?> min read</span>
    <h1><?php the_title(); ?></h1>
    <?php if (has_excerpt()) : ?><p class="pst-dek"><?php echo esc_html(get_the_excerpt()); ?></p><?php endif; ?>
    <p class="pst-by">By the Solar Connect Kenya team · Updated <time datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>"><?php echo esc_html(get_the_modified_date('j F Y')); ?></time></p>
  </header>

  <?php if (has_post_thumbnail()) : ?>
    <figure class="wrap pst-hero-img"><div class="media"><?php the_post_thumbnail('full', ['loading' => 'eager', 'fetchpriority' => 'high']); ?></div></figure>
  <?php endif; ?>

  <div class="wrap pst-body">
    <div class="pst-prose"><?php the_content(); ?></div>
    <aside class="pst-aside" aria-label="Talk to Solar Connect">
      <div class="pst-aside-card">
        <span class="mono" style="color:var(--mist)">Free sizing advice</span>
        <h2>Not sure what you need?</h2>
        <p>Send your appliance list and we’ll recommend matched panels, inverter and battery.</p>
        <a class="btn btn-sun" href="<?php echo esc_url($wa); ?>">WhatsApp us</a>
        <a class="pst-aside-link" href="tel:+254706636447">Call 0706 636 447</a>
      </div>
    </aside>
  </div>
</article>

<?php
  $related = get_posts(['post_type' => 'post', 'posts_per_page' => 3, 'post__not_in' => [get_the_ID()], 'orderby' => 'date']);
  if ($related) : ?>
  <section class="wrap pst-related">
    <h2 class="h2">More solar guides</h2>
    <div class="blg-grid blg-grid-3">
      <?php foreach ($related as $r) : ?>
        <article class="blg-card rv">
          <a class="media blg-card-img" href="<?php echo esc_url(get_permalink($r)); ?>" tabindex="-1" aria-hidden="true"><?php echo get_the_post_thumbnail($r, 'medium_large', ['loading' => 'lazy', 'alt' => '']); ?></a>
          <div class="blg-card-b">
            <h3><a href="<?php echo esc_url(get_permalink($r)); ?>"><?php echo esc_html(get_the_title($r)); ?></a></h3>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt($r), 20)); ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; endwhile; ?>

<section id="contact" class="wrap abB-cta-wrap">
  <div class="abB-cta rv">
    <div>
      <span class="mono" style="color:var(--mist)">Ready to plan your system?</span>
      <h2>Send us your power needs. We’ll recommend a practical setup.</h2>
      <p>Share your appliances, usage pattern, budget range or site details.</p>
    </div>
    <div class="abB-cta-btns">
      <a class="btn btn-sun" href="<?php echo esc_url($wa); ?>">WhatsApp us</a>
      <a class="btn btn-ghost-dark" href="tel:+254706636447">Call 0706 636 447</a>
      <a class="btn btn-ghost-dark" href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">Browse the shop</a>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
