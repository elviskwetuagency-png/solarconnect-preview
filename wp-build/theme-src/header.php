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
/* Pages that carry their own #contact section scroll to it; elsewhere go straight to WhatsApp. */
$sck_h_has_contact = is_front_page() || is_page_template(['page-about-a.php', 'page-about-b.php']);
$sck_h_quote = $sck_h_has_contact ? '#contact' : 'https://wa.me/254706636447?text=' . rawurlencode('Hello Solar Connect, I would like a quote.');
?>
<header class="nav" id="nav">
  <div class="nav-in">
    <a class="brand" href="<?php echo esc_url($sck_h_home); ?>" aria-label="Solar Connect Kenya home"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/685172a7fa.png" alt="Solar Connect, Building a better future" style="height:36px;width:auto;display:block">
    </a>
    <nav class="pill" aria-label="Main">
      <a class="lk" href="<?php echo esc_url($sck_h_home . '#solutions'); ?>">Solutions</a>
      <a class="lk" href="<?php echo esc_url($sck_h_shop); ?>">Shop</a>
      <a class="lk" href="<?php echo esc_url($sck_h_home . '#projects'); ?>">Projects</a>
      <a class="lk" href="<?php echo esc_url($sck_h_home . '#process'); ?>">How we work</a>
      <a class="icon" href="<?php echo esc_url($sck_h_shop); ?>" aria-label="Search products"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="6.5"/><path d="M20 20l-4-4"/></svg></a>
      <a class="icon" href="<?php echo esc_url($sck_h_cart); ?>" aria-label="Cart"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a>
      <a class="btn btn-white cta" href="<?php echo esc_url($sck_h_quote); ?>">Get a quote</a>
    </nav>
  </div>
</header>
