<?php
/**
 * Fallback template: singular content, plus search results and archives.
 * Lists get one page heading (h1) and an h2 per result, rather than an
 * h1 for every post. Product searches are handled by WooCommerce's own
 * archive template, so this mainly serves site-wide search.
 */
get_header();
$is_list = !is_singular();
?>
<main class="wrap sck-generic" style="padding-block:140px 100px;min-height:50vh">
  <?php if ($is_list) : ?>
    <header style="margin-bottom:40px;display:flex;flex-direction:column;gap:14px">
      <span class="mono eyebrow"><?php echo is_search() ? 'Search' : 'Archive'; ?></span>
      <h1 class="h2"><?php
        if (is_search()) { printf('Results for “%s”', esc_html(get_search_query())); }
        else { echo esc_html(wp_strip_all_tags(get_the_archive_title())); }
      ?></h1>
      <?php if (is_search()) : ?>
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="display:flex;gap:8px;max-width:560px;margin-top:8px">
          <label class="screen-reader-text" for="sck-s">Search</label>
          <input id="sck-s" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" style="flex:1;min-width:0;font:inherit;font-size:15px;padding:12px 18px;border-radius:999px;border:1px solid var(--line-2);background:var(--white)">
          <input type="hidden" name="post_type" value="product">
          <button class="btn btn-ink" type="submit">Search products</button>
        </form>
      <?php endif; ?>
    </header>
  <?php endif; ?>

  <?php if (have_posts()) : ?>
    <div style="<?php echo $is_list ? 'display:grid;gap:12px' : ''; ?>">
    <?php while (have_posts()) : the_post(); ?>
      <?php if ($is_list) : ?>
        <article <?php post_class(); ?> style="background:var(--white);border-radius:var(--r-lg);padding:24px 28px;display:flex;flex-direction:column;gap:8px">
          <span class="mono" style="color:var(--ink-3)"><?php echo esc_html(get_post_type() === 'product' ? 'Product' : (get_post_type() === 'page' ? 'Page' : 'Article')); ?></span>
          <h2 style="font-size:22px;font-weight:400;letter-spacing:-.02em"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p style="color:var(--ink-2);font-size:15px;line-height:1.6;max-width:72ch"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 28)); ?></p>
        </article>
      <?php else : ?>
        <article <?php post_class(); ?>>
          <h1 class="h2" style="margin-bottom:28px"><?php the_title(); ?></h1>
          <div style="font-size:16.5px;line-height:1.7;color:var(--ink-2);max-width:760px"><?php the_content(); ?></div>
        </article>
      <?php endif; ?>
    <?php endwhile; ?>
    </div>
    <?php if ($is_list) : ?><div style="margin-top:32px"><?php the_posts_pagination(['mid_size' => 1]); ?></div><?php endif; ?>
  <?php else : ?>
    <p style="color:var(--ink-2);font-size:17px">Nothing matched that search. Try a product name, brand or type, such as “inverter”, “Deye” or “lithium battery”, or <a href="https://wa.me/254706636447?text=<?php echo rawurlencode('Hello Solar Connect, I am looking for:'); ?>" style="text-decoration:underline;text-underline-offset:3px">ask us on WhatsApp</a>.</p>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
