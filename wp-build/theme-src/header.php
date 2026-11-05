<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<link rel="profile" href="https://gmpg.org/xfn/11">
<style>:root{padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}body{margin:0}[hidden]{display:none!important}</style>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
$sck_h_home = home_url('/');
$sck_h_shop = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$sck_h_cart = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
/* "Get a quote" always opens the Contact page (quote form, phones, WhatsApp). */
$sck_h_quote = home_url('/contact-us/');
?>
<header class="nav" id="nav">
  <div class="nav-in">
    <a class="brand" href="<?php echo esc_url($sck_h_home); ?>" aria-label="Solar Connect Kenya home"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/685172a7fa.png" alt="Solar Connect, Building a better future" style="height:36px;width:auto;display:block">
    </a>
    <nav class="pill" aria-label="Main">
      <a class="lk" href="<?php echo esc_url(home_url('/solutions/')); ?>">Solutions</a>
      <a class="lk" href="<?php echo esc_url($sck_h_shop); ?>">Shop</a>
      <a class="lk" href="<?php echo esc_url(home_url('/about-us/')); ?>">About</a>
      <a class="lk" href="<?php echo esc_url(home_url('/blog/')); ?>">Guides</a>
      <a class="lk" href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact</a>
      <a class="icon" href="<?php echo esc_url($sck_h_shop); ?>" aria-label="Search products"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="6.5"/><path d="M20 20l-4-4"/></svg></a>
      <a class="icon" href="<?php echo esc_url($sck_h_cart); ?>" aria-label="Cart"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a>
      <a class="btn btn-white cta" href="<?php echo esc_url($sck_h_quote); ?>">Get a quote</a>
      <button class="icon nav-burger" type="button" id="nav-burger" aria-expanded="false" aria-controls="nav-panel" aria-label="Open menu"><svg class="b-open" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg><svg class="b-close" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg></button>
    </nav>
  </div>
  <?php $sck_h_acct = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/'); ?>
  <div class="nav-panel" id="nav-panel" hidden>
    <nav class="np-main" aria-label="Menu">
      <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
      <a href="<?php echo esc_url(home_url('/solutions/')); ?>">Solutions</a>
      <a href="<?php echo esc_url($sck_h_shop); ?>">Shop</a>
      <a href="<?php echo esc_url(home_url('/about-us/')); ?>">About</a>
      <a href="<?php echo esc_url(home_url('/blog/')); ?>">Guides</a>
      <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact</a>
    </nav>
    <div class="np-sub">
      <a href="<?php echo esc_url(home_url('/faqs/')); ?>">FAQs</a>
      <a href="<?php echo esc_url($sck_h_cart); ?>">Cart</a>
      <a href="<?php echo esc_url($sck_h_acct); ?>">Order tracking</a>
      <a href="<?php echo esc_url($sck_h_acct); ?>">My account</a>
    </div>
    <div class="np-act">
      <a class="btn btn-sun" href="<?php echo esc_url($sck_h_quote); ?>">Get a free quote</a>
      <a class="btn btn-ghost-dark" href="tel:+254706636447">Call 0706 636 447</a>
      <a class="btn btn-ghost-dark" href="https://wa.me/254706636447?text=<?php echo rawurlencode('Hello Solar Connect, I need help choosing a solar system.'); ?>">WhatsApp</a>
    </div>
  </div>
</header>
