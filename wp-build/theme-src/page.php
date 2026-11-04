<?php
/**
 * Generic page template (cart, checkout, my account, legal pages, and any
 * page without a dedicated template), styled with the homepage tokens.
 * WooCommerce pages get the full content width so the block cart/checkout
 * can use their two-column layouts; text pages keep a readable measure.
 */
get_header();
$sck_wide = function_exists('is_cart') && (is_cart() || is_checkout() || is_account_page());
?>
<main class="wrap sck-page<?php echo $sck_wide ? ' sck-page-wide' : ''; ?>" style="padding-block:140px 100px;min-height:50vh">
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h1 class="h2" style="margin-bottom:28px"><?php the_title(); ?></h1>
      <div class="sck-page-body" style="font-size:16.5px;line-height:1.7;color:var(--ink-2);<?php echo $sck_wide ? '' : 'max-width:760px'; ?>">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>
