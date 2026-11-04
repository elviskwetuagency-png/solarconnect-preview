<?php
/**
 * In-hero utility bar + main nav, shared by interior templates that open
 * with a dark hero (same look as the homepage hero nav, but every link
 * resolves to a real URL so it works from any page, not just the homepage).
 *
 * Optional: set $sck_nav_current = 'about' | 'shop' before including to
 * mark the active item.
 */
$sck_nav_current = isset($sck_nav_current) ? $sck_nav_current : '';
$sck_home  = home_url('/');
$sck_shop  = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop/');
$sck_cart  = function_exists('wc_get_cart_url') ? wc_get_cart_url() : home_url('/cart/');
$sck_acct  = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url('/my-account/');
$sck_about_page = get_page_by_path('about-us');
$sck_about = $sck_about_page ? get_permalink($sck_about_page) : get_permalink();
$sck_contact = home_url('/contact-us/');
$sck_faqs    = home_url('/faqs/');
$sck_wa    = 'https://wa.me/254706636447?text=' . rawurlencode('Hello Solar Connect, I need help choosing a solar system.');
$sck_cur   = function ($k) use ($sck_nav_current) { return $k === $sck_nav_current ? ' aria-current="page"' : ''; };
?>
<div class="ubar">
  <div class="ubar-l"><span class="ubar-k">Visit or call</span><a href="tel:+254706636447">Nairobi · 0706 636 447</a><a href="tel:+254705760861">Watamu · 0705 760 861</a><a href="https://www.google.com/maps/place/M2H7%2B23Q,+Watamu/@-3.3224125,40.0127344,17z" class="ubar-map">Watamu map ↗</a></div>
  <div class="ubar-r"><a href="<?php echo esc_url($sck_faqs); ?>"<?php echo $sck_cur('faqs'); ?>>FAQs</a><a href="<?php echo esc_url($sck_about); ?>">About us</a><a href="<?php echo esc_url($sck_acct); ?>">Order tracking</a><a href="<?php echo esc_url($sck_acct); ?>">Login / My account</a></div>
</div>
<div class="hnav">
  <a class="logo" href="<?php echo esc_url($sck_home); ?>" aria-label="Solar Connect Kenya home"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/685172a7fa.png" alt="Solar Connect, Building a better future"></a>
  <nav aria-label="Main menu"><ul>
    <li><a href="<?php echo esc_url($sck_home . '#solutions'); ?>">Solutions</a></li>
    <li><a href="<?php echo esc_url($sck_shop); ?>"<?php echo $sck_cur('shop'); ?>>Shop</a></li>
    <li><a href="<?php echo esc_url($sck_home . '#projects'); ?>">Projects</a></li>
    <li><a href="<?php echo esc_url($sck_home . '#process'); ?>">How we work</a></li>
    <li><a href="<?php echo esc_url($sck_about); ?>"<?php echo $sck_cur('about'); ?>>About</a></li>
    <li><a href="<?php echo esc_url($sck_contact); ?>"<?php echo $sck_cur('contact'); ?>>Contact</a></li>
  </ul></nav>
  <div class="right">
    <a class="icon-btn" href="<?php echo esc_url($sck_shop); ?>" aria-label="Search panels, batteries, inverters"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="6.5"/><path d="M20 20l-4-4"/></svg></a>
    <a class="icon-btn acct" href="<?php echo esc_url($sck_acct); ?>" aria-label="Login or my account"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg></a>
    <a class="icon-btn" href="<?php echo esc_url($sck_cart); ?>" aria-label="Cart"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a>
    <a class="btn btn-white contact" href="<?php echo esc_url($sck_wa); ?>">Contact us</a>
    <button class="icon-btn menu-toggle" type="button" id="menu-toggle" aria-expanded="false" aria-controls="mmenu" aria-label="Open menu"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg></button>
  </div>
  <nav class="mmenu" id="mmenu" aria-label="Mobile menu" hidden>
    <a href="<?php echo esc_url($sck_home . '#solutions'); ?>">Solutions</a>
    <a href="<?php echo esc_url($sck_shop); ?>">Shop</a>
    <a href="<?php echo esc_url($sck_home . '#projects'); ?>">Projects</a>
    <a href="<?php echo esc_url($sck_home . '#process'); ?>">How we work</a>
    <a href="<?php echo esc_url($sck_about); ?>"<?php echo $sck_cur('about'); ?>>About</a>
    <a href="<?php echo esc_url($sck_contact); ?>"<?php echo $sck_cur('contact'); ?>>Contact</a>
    <a href="<?php echo esc_url($sck_faqs); ?>"<?php echo $sck_cur('faqs'); ?>>FAQs</a>
    <a href="<?php echo esc_url($sck_acct); ?>">Order tracking</a>
    <a href="<?php echo esc_url($sck_acct); ?>">Login / My account</a>
    <a class="btn btn-white" href="<?php echo esc_url($sck_wa); ?>">Get a free quote</a>
  </nav>
</div>
