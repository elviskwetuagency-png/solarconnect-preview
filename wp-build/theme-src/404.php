<?php
get_header();
$shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
?>
<main class="wrap" style="padding-block:160px 120px;min-height:50vh;display:flex;flex-direction:column;align-items:center;text-align:center;gap:18px">
  <span class="mono eyebrow">Error 404</span>
  <h1 class="h2">Page not found.</h1>
  <p style="color:var(--ink-2);max-width:46ch">The page you’re looking for doesn’t exist or has moved. Try the shop, search for a product, or ask us on WhatsApp.</p>
  <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" style="display:flex;gap:8px;width:100%;max-width:480px;margin-top:6px">
    <label class="screen-reader-text" for="sck-404-s">Search products</label>
    <input id="sck-404-s" type="search" name="s" placeholder="Search panels, batteries, inverters" style="flex:1;min-width:0;font:inherit;font-size:15px;padding:12px 18px;border-radius:999px;border:1px solid var(--line-2);background:var(--white)">
    <input type="hidden" name="post_type" value="product">
    <button class="btn btn-ink" type="submit">Search</button>
  </form>
  <div style="display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-top:10px">
    <a class="btn btn-ghost" href="<?php echo esc_url(home_url('/')); ?>">Homepage</a>
    <a class="btn btn-ghost" href="<?php echo esc_url($shop); ?>">Shop products</a>
    <a class="btn btn-ghost" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact us</a>
  </div>
</main>
<?php get_footer(); ?>
