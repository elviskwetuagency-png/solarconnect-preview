<?php
/**
 * Blog index ("Solar guides"), used for the page set as the Posts page.
 * Editorial style matching About/Contact: dark nav strip, paper hero,
 * a featured latest guide, then a grid of the rest.
 */
get_header();
$sck_nav_current = 'blog';
$wa = 'https://wa.me/254706636447?text=' . rawurlencode('Hello Solar Connect, I have a question about my solar setup:');
$read_mins = function ($id) { return max(2, (int) ceil(str_word_count(wp_strip_all_tags(get_post_field('post_content', $id))) / 220)); };
?><main id="top" class="ab ab-b blg">

<div class="abB-top hero"><div class="hero-in abB-top-in"><?php include get_stylesheet_directory() . '/parts/site-nav.php'; ?></div></div>

<section class="wrap blg-hero" id="hero">
  <span class="mono eyebrow">Solar guides</span>
  <h1>Practical solar advice <span class="abB-em">for Kenyan homes and businesses.</span></h1>
  <p>Plain-language guides from the Solar Connect Kenya team on sizing a system, choosing inverters and batteries, and getting the most from solar.</p>
</section>

<section class="wrap blg-list">
  <?php if (have_posts()) : $i = 0; ?>
    <div class="blg-grid">
    <?php while (have_posts()) : the_post(); $i++; $cat = get_the_category(); ?>
      <article <?php post_class('blg-card' . ($i === 1 && !is_paged() ? ' is-featured' : '') . ' rv'); ?>>
        <a class="media blg-card-img" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
          <?php if (has_post_thumbnail()) the_post_thumbnail($i === 1 ? 'large' : 'medium_large', ['loading' => $i === 1 ? 'eager' : 'lazy', 'alt' => '']); ?>
        </a>
        <div class="blg-card-b">
          <span class="mono blg-meta"><?php echo esc_html($cat ? $cat[0]->name : 'Guide'); ?> · <?php echo (int) $read_mins(get_the_ID()); ?> min read</span>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), $i === 1 ? 40 : 24)); ?></p>
          <a class="link-arrow" href="<?php the_permalink(); ?>" aria-label="Read: <?php echo esc_attr(get_the_title()); ?>">Read the guide <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
        </div>
      </article>
    <?php endwhile; ?>
    </div>
    <div class="blg-pager"><?php the_posts_pagination(['mid_size' => 1]); ?></div>
  <?php else : ?>
    <p class="shop-lede">New guides are on the way.</p>
  <?php endif; ?>
</section>

<section id="contact" class="wrap abB-cta-wrap">
  <div class="abB-cta rv">
    <div>
      <span class="mono" style="color:var(--mist)">Prefer to ask?</span>
      <h2>Send us your appliances and we’ll size the system for you.</h2>
      <p>Free advice on WhatsApp from our Nairobi and Watamu team.</p>
    </div>
    <div class="abB-cta-btns">
      <a class="btn btn-sun" href="<?php echo esc_url($wa); ?>">WhatsApp us</a>
      <a class="btn btn-ghost-dark" href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">Browse the shop</a>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
