<?php
/**
 * Front page: full custom-coded homepage.
 * Keeps the site's global header (header.php) but owns its own
 * hero, sections and footer markup below it.
 */
get_header();
?><main id="top">

<!-- ============ HERO ============ -->
<section class="hero" id="hero">
  <div class="hero-bg" aria-hidden="true">
    <video class="bg-vid" autoplay muted loop playsinline preload="auto" poster="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/hero-poster.webp">
      <source src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/video/hero-solar.mp4" type="video/mp4">
    </video>
  </div>
  <div class="hero-in">
    <div class="ubar">
      <div class="ubar-l"><span class="ubar-k">Visit or call</span><a href="tel:+254706636447">Nairobi · 0706 636 447</a><a href="tel:+254705760861">Watamu · 0705 760 861</a><a href="https://www.google.com/maps/place/M2H7%2B23Q,+Watamu/@-3.3224125,40.0127344,17z" class="ubar-map">Watamu map ↗</a></div>
      <div class="ubar-r"><a href="<?php echo esc_url(home_url('/about-us/')); ?>">About us</a><a href="https://solarconnectkenya.com/user/orders">Order tracking</a><a href="https://solarconnectkenya.com/login">Login / My account</a></div>
    </div>
    <div class="hnav">
      <a class="logo" href="#top" aria-label="Solar Connect Kenya home"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/685172a7fa.png" alt="Solar Connect, Building a better future"></a>
      <nav aria-label="Hero menu"><ul>
        <li><a href="#solutions">Solutions</a></li>
        <li><a href="#shop">Shop</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#process">How we work</a></li>
        <li><a href="<?php echo esc_url(home_url('/about-us/')); ?>">About</a></li>
      </ul></nav>
      <div class="right">
        <a class="icon-btn" href="https://solarconnectkenya.com/products" aria-label="Search panels, batteries, inverters"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true"><circle cx="11" cy="11" r="6.5"/><path d="M20 20l-4-4"/></svg></a>
        <a class="icon-btn acct" href="https://solarconnectkenya.com/login" aria-label="Login or my account"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg></a>
        <a class="icon-btn" href="https://solarconnectkenya.com/get/cart" aria-label="Cart, Ksh 0.00"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a>
        <a class="btn btn-white contact" href="https://wa.me/254706636447?text=Hello%20Solar%20Connect%2C%20I%20need%20help%20choosing%20a%20solar%20system.">Contact us</a>
        <button class="icon-btn menu-toggle" type="button" id="menu-toggle" aria-expanded="false" aria-controls="mmenu" aria-label="Open menu"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg></button>
      </div>
      <nav class="mmenu" id="mmenu" aria-label="Mobile menu" hidden>
        <a href="#solutions">Solutions</a>
        <a href="#shop">Shop</a>
        <a href="#projects">Projects</a>
        <a href="#process">How we work</a>
        <a href="<?php echo esc_url(home_url('/about-us/')); ?>">About</a>
        <a href="https://solarconnectkenya.com/user/orders">Order tracking</a>
        <a href="https://solarconnectkenya.com/login">Login / My account</a>
        <a class="btn btn-white" href="https://wa.me/254706636447?text=Hello%20Solar%20Connect%2C%20I%20need%20help%20choosing%20a%20solar%20system.">Get a free quote</a>
      </nav>
    </div>

    <div class="hero-main">
      <h1><span class="ln"><span>Reliable solar</span></span><span class="ln"><span>for Kenyan homes</span></span><span class="ln"><span class="dim">&amp; businesses.</span></span></h1>
      <p class="hero-sub">Genuine panels, inverters and batteries, sized to your power needs, installed cleanly, and supported on WhatsApp after handover.</p>
      <div class="hero-actions">
        <a class="arrow-pill" href="#contact">Get a free quote <span class="ac"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg></span></a>
      </div>
    </div>

    <div class="hstats">
      <div class="hstat"><b>200+</b><span>Solar projects completed</span></div>
      <div class="hstat"><b>10+</b><span>Genuine brands in stock</span></div>
      <div class="hstat"><b>2</b><span>Bases in Nairobi &amp; Watamu</span></div>
    </div>
  </div>
</section>
<!-- ============ BRANDS ============ -->
<section class="brands" aria-label="Brands we supply and install">
  <p class="mono eyebrow">Genuine brands behind every system</p>
  <div class="marquee">
    <div class="track">
      <span><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/deye/" aria-label="Shop Deye products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_deye.webp" alt="Deye" loading="lazy"></a></span><span><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/felicity-solar/" aria-label="Shop Felicity Solar products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_felicity-solar.webp" alt="Felicity Solar" loading="lazy"></a></span><span><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/ja-solar/" aria-label="Shop JA Solar products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_ja-solar.webp" alt="JA Solar" loading="lazy"></a></span><span><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/jinko-solar/" aria-label="Shop Jinko Solar products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_jinko-solar.webp" alt="Jinko Solar" loading="lazy"></a></span><span><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/sma/" aria-label="Shop SMA products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_sma.webp" alt="SMA" loading="lazy"></a></span><span><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/srne/" aria-label="Shop SRNE products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_srne.webp" alt="SRNE" loading="lazy"></a></span><span><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/must/" aria-label="Shop Must products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_must.webp" alt="Must" loading="lazy"></a></span><span><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/taico/" aria-label="Shop Taico products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_taico.webp" alt="Taico" loading="lazy"></a></span><span><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/suntree/" aria-label="Shop Suntree products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_suntree.webp" alt="Suntree" loading="lazy"></a></span><span><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/vestwoods/" aria-label="Shop Vestwoods products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_vestwoods.webp" alt="Vestwoods" loading="lazy"></a></span>
      <span aria-hidden="true"><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/deye/" aria-label="Shop Deye products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_deye.webp" alt="Deye" loading="lazy"></a></span><span aria-hidden="true"><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/felicity-solar/" aria-label="Shop Felicity Solar products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_felicity-solar.webp" alt="Felicity Solar" loading="lazy"></a></span><span aria-hidden="true"><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/ja-solar/" aria-label="Shop JA Solar products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_ja-solar.webp" alt="JA Solar" loading="lazy"></a></span><span aria-hidden="true"><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/jinko-solar/" aria-label="Shop Jinko Solar products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_jinko-solar.webp" alt="Jinko Solar" loading="lazy"></a></span><span aria-hidden="true"><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/sma/" aria-label="Shop SMA products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_sma.webp" alt="SMA" loading="lazy"></a></span><span aria-hidden="true"><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/srne/" aria-label="Shop SRNE products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_srne.webp" alt="SRNE" loading="lazy"></a></span><span aria-hidden="true"><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/must/" aria-label="Shop Must products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_must.webp" alt="Must" loading="lazy"></a></span><span aria-hidden="true"><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/taico/" aria-label="Shop Taico products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_taico.webp" alt="Taico" loading="lazy"></a></span><span aria-hidden="true"><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/suntree/" aria-label="Shop Suntree products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_suntree.webp" alt="Suntree" loading="lazy"></a></span><span aria-hidden="true"><a href="https://palevioletred-panther-439834.hostingersite.com/product-tag/vestwoods/" aria-label="Shop Vestwoods products"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/brands/logo_vestwoods.webp" alt="Vestwoods" loading="lazy"></a></span>
    </div>
  </div>
</section>


<!-- ============ STATEMENT + STATS ============ -->
<section class="wrap statement">
  <div class="about2">
    <div class="about2-txt rv">
      <h2>Solar Connect Kenya is a solar shop and installation team, <em>with bases in Nairobi and Watamu.</em></h2>
      <p>We supply genuine panels, inverters, batteries and accessories from brands like Deye, Felicity and Jinko. Our own team then sizes the system to your power needs, installs and tests it, and stays reachable on WhatsApp after handover.</p>
        <a class="link-arrow" href="<?php echo esc_url(home_url('/about-us/')); ?>">More about Solar Connect <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
      <div class="astats"><div class="stat"><b data-count="200" data-suffix="+">200+</b><span class="mono">Project records</span></div><div class="stat"><b data-count="10" data-suffix="+">10+</b><span class="mono">Genuine brands stocked</span></div><div class="stat"><b data-count="2">2</b><span class="mono">Bases · Nairobi &amp; Watamu</span></div><div class="stat"><b data-count="4" data-suffix="-step">4-step</b><span class="mono">Service process</span></div></div>
    </div>
    <div class="ashow rv" id="ashow"><figure class="aslide on"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/6fd700f137.webp" alt="Solar Connect technician handling a panel on site"></figure><figure class="aslide"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/b40d931493.webp" alt="6kW hybrid rooftop array in South C" loading="lazy"></figure><figure class="aslide"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/510a930c57.webp" alt="Inverter, battery and protection wall" loading="lazy"></figure><figure class="aslide"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/360449f788.webp" alt="Battery storage cabinet delivered to site" loading="lazy"></figure><figure class="aslide"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/eec44d0885.webp" alt="Completed 4kW hybrid array" loading="lazy"></figure><figure class="aslide"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/90fc216d74.webp" alt="Clean indoor inverter and battery backup" loading="lazy"></figure>
      <div class="ashow-bar"><span class="ashow-cap" id="ashow-cap">Solar Connect technician handling a panel on site</span><span class="adots"><button type="button" class="adot on" aria-label="Show photo 1" aria-current="true"></button><button type="button" class="adot" aria-label="Show photo 2"></button><button type="button" class="adot" aria-label="Show photo 3"></button><button type="button" class="adot" aria-label="Show photo 4"></button><button type="button" class="adot" aria-label="Show photo 5"></button><button type="button" class="adot" aria-label="Show photo 6"></button></span></div>
    </div>
  </div>
  <div class="gband rv"><img class="gband-bg" src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/ae37fea010.webp" alt="" aria-hidden="true"><div class="gband-in"><h3 class="gband-h">What every Solar Connect customer gets</h3><div class="gcards"><div class="gcard"><h3>System-first guidance</h3><p>Start with your power need before choosing panels, batteries, inverters or accessories.</p></div><div class="gcard"><h3>Professional installation</h3><p>Delivery, mounting, wiring, inverter and battery setup, testing and handover, done by our own team.</p></div><div class="gcard"><h3>Genuine solar products</h3><p>Quality panels, batteries, inverters, protection equipment and accessories for complete systems.</p></div><div class="gcard"><h3>After-sales support you can reach</h3><p>Phone and WhatsApp guidance before purchase, during installation and after handover.</p></div></div></div></div>
</section>

<!-- ============ SHOP ============ -->
<section id="shop" class="shop">
  <div class="wrap">
    <div class="head-row rv">
      <div><h2 class="h2">Shop the components.</h2><p class="shop-lede">Genuine inverters, batteries, panels and controllers, in stock in Nairobi.</p></div>
      <a class="link-arrow" href="https://palevioletred-panther-439834.hostingersite.com/shop/"><span class="shop-all-lbl">Browse all products</span> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
    </div>
    <div class="filter-bar rv">
      <div class="filters" id="filters" role="group" aria-label="Filter products">
        <button type="button" aria-pressed="true" data-f="all">All products</button>
        <button type="button" aria-pressed="false" data-f="inv">Inverters</button>
        <button type="button" aria-pressed="false" data-f="bat">Batteries</button>
        <button type="button" aria-pressed="false" data-f="cc">Charge controllers</button>
      </div>
      <span class="filter-count" id="filter-count" aria-live="polite">Showing 8 products</span>
    </div>
    <div class="grid4" id="prods">
      <article class="prod rv" data-c="inv"><a class="media light" href="https://palevioletred-panther-439834.hostingersite.com/product/deye-8kw-8kva-48v-single-phase-hybrid-solar-inverter/" tabindex="-1" aria-hidden="true"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/uploads/2026/11/01JP24Z9N388GMWZQ4NQV0SHSZ.webp" alt="Deye 8KW | 8KVA 48V Single Phase Hybrid Solar Inverter" loading="lazy"></a><div class="b"><span class="c">Hybrid inverter</span><h3><a href="https://palevioletred-panther-439834.hostingersite.com/product/deye-8kw-8kva-48v-single-phase-hybrid-solar-inverter/">Deye 8KW | 8KVA 48V Single Phase Hybrid Solar Inverter</a></h3><div class="f"><div class="pr"><b>Ksh 229,000</b></div><a class="add" href="https://palevioletred-panther-439834.hostingersite.com/product/deye-8kw-8kva-48v-single-phase-hybrid-solar-inverter/" aria-label="View Deye 8KW | 8KVA 48V Single Phase Hybrid Solar Inverter"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a></div></div></article><article class="prod rv" data-c="inv"><a class="media light" href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-1kva-12v-ivcm1012-high-frequency-inverter/" tabindex="-1" aria-hidden="true"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/uploads/2026/11/01JP7FJGTAT1H3BS08G2MXXFS9-1024x1024.jpg" alt="Felicity 1kva 12v IVCM1012 High Frequency Inverter" loading="lazy"></a><div class="b"><span class="c">Hybrid inverter</span><h3><a href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-1kva-12v-ivcm1012-high-frequency-inverter/">Felicity 1kva 12v IVCM1012 High Frequency Inverter</a></h3><div class="f"><div class="pr"><b>Ksh 25,000</b><span class="pold"><s>Ksh 28,000</s><span class="psave">Save Ksh 3,000</span></span></div><a class="add" href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-1kva-12v-ivcm1012-high-frequency-inverter/" aria-label="View Felicity 1kva 12v IVCM1012 High Frequency Inverter"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a></div></div></article><article class="prod rv" data-c="inv"><a class="media light" href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-solar-3kva-24v-ivem3024-hybrid-high-frequency-inverter/" tabindex="-1" aria-hidden="true"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/uploads/2026/11/01JP2A0TWMT1SWFH06G06YY7ES.jpeg" alt="Felicity Solar 3KVA 24V IVEM3024 Hybrid High Frequency Inverter" loading="lazy"></a><div class="b"><span class="c">Hybrid inverter</span><h3><a href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-solar-3kva-24v-ivem3024-hybrid-high-frequency-inverter/">Felicity Solar 3KVA 24V IVEM3024 Hybrid High Frequency Inverter</a></h3><div class="f"><div class="pr"><b>Ksh 42,000</b><span class="pold"><s>Ksh 46,000</s><span class="psave">Save Ksh 4,000</span></span></div><a class="add" href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-solar-3kva-24v-ivem3024-hybrid-high-frequency-inverter/" aria-label="View Felicity Solar 3KVA 24V IVEM3024 Hybrid High Frequency Inverter"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a></div></div></article><article class="prod rv" data-c="bat"><a class="media light" href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-5kwh-48v-lpbf48100-m-lithium-battery-pack-with-bms/" tabindex="-1" aria-hidden="true"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/uploads/2026/11/01JNXZ566CYWXPMSKWH5V8JFX7.webp" alt="Felicity 5kWh 48v LPBF48100-M  Lithium Battery Pack With BMS" loading="lazy"></a><div class="b"><span class="c">Lithium battery</span><h3><a href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-5kwh-48v-lpbf48100-m-lithium-battery-pack-with-bms/">Felicity 5kWh 48v LPBF48100-M  Lithium Battery Pack With BMS</a></h3><div class="f"><div class="pr"><b>Ksh 115,000</b><span class="pold"><s>Ksh 120,000</s><span class="psave">Save Ksh 5,000</span></span></div><a class="add" href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-5kwh-48v-lpbf48100-m-lithium-battery-pack-with-bms/" aria-label="View Felicity 5kWh 48v LPBF48100-M  Lithium Battery Pack With BMS"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a></div></div></article><article class="prod rv" data-c="bat"><a class="media light" href="https://palevioletred-panther-439834.hostingersite.com/product/vestwoods-12v-100ah-lithium-lifepo4-battery/" tabindex="-1" aria-hidden="true"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/uploads/2026/11/01JNXYZT3Y3XXV3GFD30XASHGZ.webp" alt="Vestwoods 12V 100Ah Lithium LiFePO4 Battery" loading="lazy"></a><div class="b"><span class="c">Lithium battery</span><h3><a href="https://palevioletred-panther-439834.hostingersite.com/product/vestwoods-12v-100ah-lithium-lifepo4-battery/">Vestwoods 12V 100Ah Lithium LiFePO4 Battery</a></h3><div class="f"><div class="pr"><b>Ksh 50,000</b></div><a class="add" href="https://palevioletred-panther-439834.hostingersite.com/product/vestwoods-12v-100ah-lithium-lifepo4-battery/" aria-label="View Vestwoods 12V 100Ah Lithium LiFePO4 Battery"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a></div></div></article><article class="prod rv" data-c="bat"><a class="media light" href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-7-2kwh-48v-lpbf48150-p-lithium-battery-pack-with-bms/" tabindex="-1" aria-hidden="true"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/uploads/2026/11/01JP27AYZ3TXCEN4C2K71XAF0Y.webp" alt="Felicity 7.2kWh 48v LPBF48150-P Lithium Battery Pack With BMS" loading="lazy"></a><div class="b"><span class="c">Lithium battery</span><h3><a href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-7-2kwh-48v-lpbf48150-p-lithium-battery-pack-with-bms/">Felicity 7.2kWh 48v LPBF48150-P Lithium Battery Pack With BMS</a></h3><div class="f"><div class="pr"><b>Ksh 160,000</b><span class="pold"><s>Ksh 180,000</s><span class="psave">Save Ksh 20,000</span></span></div><a class="add" href="https://palevioletred-panther-439834.hostingersite.com/product/felicity-7-2kwh-48v-lpbf48150-p-lithium-battery-pack-with-bms/" aria-label="View Felicity 7.2kWh 48v LPBF48150-P Lithium Battery Pack With BMS"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a></div></div></article><article class="prod rv" data-c="cc"><a class="media light" href="https://palevioletred-panther-439834.hostingersite.com/product/must-80a-mppt-solar-charge-controller-pc18-8025f/" tabindex="-1" aria-hidden="true"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/uploads/2026/11/01JNZZ6T39YWY4EVSAJ3RM5P2K.jpeg" alt="MUST 80A MPPT Solar Charge Controller PC18-8025F" loading="lazy"></a><div class="b"><span class="c">Charge controller</span><h3><a href="https://palevioletred-panther-439834.hostingersite.com/product/must-80a-mppt-solar-charge-controller-pc18-8025f/">MUST 80A MPPT Solar Charge Controller PC18-8025F</a></h3><div class="f"><div class="pr"><b>Ksh 27,000</b><span class="pold"><s>Ksh 29,000</s><span class="psave">Save Ksh 2,000</span></span></div><a class="add" href="https://palevioletred-panther-439834.hostingersite.com/product/must-80a-mppt-solar-charge-controller-pc18-8025f/" aria-label="View MUST 80A MPPT Solar Charge Controller PC18-8025F"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a></div></div></article><article class="prod rv" data-c="cc"><a class="media light" href="https://palevioletred-panther-439834.hostingersite.com/product/30a-12v-24v-felicity-mppt-charge-controller/" tabindex="-1" aria-hidden="true"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/uploads/2026/11/01JP1Y6J3M62GRDARNPEY88RS9.webp" alt="30A 12V 24V FELICITY MPPT CHARGE CONTROLLER" loading="lazy"></a><div class="b"><span class="c">Charge controller</span><h3><a href="https://palevioletred-panther-439834.hostingersite.com/product/30a-12v-24v-felicity-mppt-charge-controller/">30A 12V 24V FELICITY MPPT CHARGE CONTROLLER</a></h3><div class="f"><div class="pr"><b>Ksh 11,500</b><span class="pold"><s>Ksh 12,000</s><span class="psave">Save Ksh 500</span></span></div><a class="add" href="https://palevioletred-panther-439834.hostingersite.com/product/30a-12v-24v-felicity-mppt-charge-controller/" aria-label="View 30A 12V 24V FELICITY MPPT CHARGE CONTROLLER"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 4h2l2.4 11.2a1.5 1.5 0 0 0 1.5 1.2h8.6a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/><circle cx="9.5" cy="20" r="1.2"/><circle cx="17.5" cy="20" r="1.2"/></svg></a></div></div></article>
    </div>
    <a class="btn btn-ink shop-all-btn" href="https://palevioletred-panther-439834.hostingersite.com/shop/"><span class="shop-all-lbl">Browse all products</span> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
  </div>
</section>

<!-- ============ TWO WAYS ============ -->
<section id="solutions" class="dark band">
  <div class="wrap ways">
    <div class="head-row rv">
      <h2 class="h2">Two ways in.<br>One standard of work.</h2>
      <p class="lede">Start with the outcome you need. We match the panels, inverter, batteries and installation plan to it.</p>
    </div>
    <div class="way-row">
      <article class="way a rv">
        <div class="media"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/home-rooftop.webp" alt="Rooftop solar panels installed on a home" loading="lazy"><span class="tag mono">Residential</span></div>
        <div class="way-body">
          <h3>For homes</h3>
          <p>Full home solar and inverter-battery backup that keeps essential appliances running through outages.</p>
          <div class="tags"><span>Full home solar</span><span>Power backup</span><span>Solar water heating</span></div>
          <a class="btn btn-white" href="#contact">Explore home systems</a>
        </div>
      </article>
      <article class="way b rv">
        <div class="media"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/business-solar-farm.webp" alt="Aerial view of a large-scale solar installation" loading="lazy"><span class="tag mono">Business</span></div>
        <div class="way-body">
          <h3>For businesses</h3>
          <p>Practical hybrid setups for shops, offices, apartments and facilities, plus solar lighting for compounds and walkways.</p>
          <div class="tags"><span>Hybrid systems</span><span>Outdoor lighting</span><span>Parts &amp; accessories</span></div>
          <a class="btn btn-ink" href="#contact">Explore business systems</a>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ============ PROJECTS ============ -->
<section id="projects" class="projects">
  <div class="wrap head-row rv">
    <h2 class="pj-h">Recent<br>installations</h2>
    <p class="pj-intro">Real systems our team has sized, delivered, installed and handed over, from first site visit to after-sales support.</p>
  </div>
  <div class="wrap"><div class="pj-body rv">
    <div class="pj-side">
      <div class="pj-count"><b id="pj-n">01</b><span>/11</span></div>
      <p class="pj-cap" id="pj-cap">A finished system customers can trust</p>
      <div class="pj-btns">
        <button class="sq" type="button" id="prev" aria-label="Previous project"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 14L4 9l5-5"/><path d="M4 9h10.5a5.5 5.5 0 0 1 0 11H11"/></svg></button>
        <button class="sq dark" type="button" id="next" aria-label="Next project"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 14l5-5-5-5"/><path d="M20 9H9.5a5.5 5.5 0 0 0 0 11H13"/></svg></button>
      </div>
    </div>
    <div class="rail" id="rail"><div class="rail-in"><article class="ocard" data-cap="A finished system customers can trust"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-1.jpg" alt="A finished system customers can trust" loading="lazy" draggable="false"><span class="ocard-tag">Nairobi</span><div class="ocard-txt"><span class="ocard-k">Case study 01</span><h3>A finished system customers can trust</h3><p>A full project moment showing the kind of clean execution, equipment handling, and visible handover quality customers expect.</p></div></article><article class="ocard" data-cap="Rooftop installation detail"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-3.jpg" alt="Rooftop installation detail" loading="lazy" draggable="false"><span class="ocard-tag">Nairobi</span><div class="ocard-txt"><span class="ocard-k">Case study 02</span><h3>Rooftop installation detail</h3><p>Inverters, batteries, protection, and accessories treated as one reliable working system.</p></div></article><article class="ocard" data-cap="Careful site handling"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-4.jpg" alt="Careful site handling" loading="lazy" draggable="false"><span class="ocard-tag">Machakos</span><div class="ocard-txt"><span class="ocard-k">Case study 03</span><h3>Careful site handling</h3><p>Visible field preparation helps customers trust what happens before installation starts.</p></div></article><article class="ocard" data-cap="Home system"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-6.jpg" alt="Home system" loading="lazy" draggable="false"><span class="ocard-tag">Athi River</span><div class="ocard-txt"><span class="ocard-k">Case study 04</span><h3>Home system</h3><p>Completed home solar work.</p></div></article><article class="ocard" data-cap="Business setup"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-8.jpg" alt="Business setup" loading="lazy" draggable="false"><span class="ocard-tag">Thika</span><div class="ocard-txt"><span class="ocard-k">Case study 05</span><h3>Business setup</h3><p>Business solar project.</p></div></article><article class="ocard" data-cap="Site finish"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-9.jpg" alt="Site finish" loading="lazy" draggable="false"><span class="ocard-tag">Ruiru</span><div class="ocard-txt"><span class="ocard-k">Case study 06</span><h3>Site finish</h3><p>Completed hybrid solar project.</p></div></article><article class="ocard" data-cap="Indoor backup"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-10.jpg" alt="Indoor backup" loading="lazy" draggable="false"><span class="ocard-tag">Nairobi</span><div class="ocard-txt"><span class="ocard-k">Case study 07</span><h3>Indoor backup</h3><p>Clean indoor backup setup.</p></div></article><article class="ocard" data-cap="Protected wiring"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-13.jpg" alt="Protected wiring" loading="lazy" draggable="false"><span class="ocard-tag">Nairobi</span><div class="ocard-txt"><span class="ocard-k">Case study 08</span><h3>Protected wiring</h3><p>System accessories and protection details arranged to support a clean, reliable installation.</p></div></article><article class="ocard" data-cap="Installation day"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-15.jpg" alt="Installation day" loading="lazy" draggable="false"><span class="ocard-tag">Thika</span><div class="ocard-txt"><span class="ocard-k">Case study 09</span><h3>Installation day</h3><p>A field-work moment showing the process customers trust before final handover.</p></div></article><article class="ocard" data-cap="Site documentation"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-17.jpg" alt="Site documentation" loading="lazy" draggable="false"><span class="ocard-tag">Ruiru</span><div class="ocard-txt"><span class="ocard-k">Case study 10</span><h3>Site documentation</h3><p>Documented project work adds transparency from preparation to completion.</p></div></article><article class="ocard" data-cap="Power equipment"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect/assets/img/projects/proj-18.jpg" alt="Power equipment" loading="lazy" draggable="false"><span class="ocard-tag">Athi River</span><div class="ocard-txt"><span class="ocard-k">Case study 11</span><h3>Power equipment</h3><p>A closer look at equipment that supports stable backup and solar performance.</p></div></article></div></div>
  </div></div>
</section>

<!-- ============ LAYERS ============ -->
<section class="dark band">
  <div class="wrap layers">
    <div class="anat media rv" id="anat">
      <div class="shot on"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/eec44d0885.webp" alt="Solar panel array" loading="lazy"></div>
      <div class="shot"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/90fc216d74.webp" alt="Wall-mounted inverter" loading="lazy"></div>
      <div class="shot"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/360449f788.webp" alt="Lithium battery cabinet on delivery" loading="lazy"></div>
      <div class="shot"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/510a930c57.webp" alt="Breakers, isolator and wiring under the inverter" loading="lazy"></div>
      <div class="shot"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/6fd700f137.webp" alt="Technician handling a solar panel on site" loading="lazy"></div>
      <span class="lbl mono">System anatomy</span>
      <div class="dots" aria-hidden="true"><i class="on"></i><i></i><i></i><i></i><i></i></div>
      <div class="now" aria-live="polite"><b class="swap" id="anat-name">Solar panels</b><span class="mono" id="anat-n">1 of 5</span></div>
    </div>
    <div class="acc-side rv">
      <h2>Matched components.<br>Nothing left to guesswork.</h2>
      <div class="acc" id="acc">
        <div class="acc-item open"><button type="button" aria-expanded="true" aria-controls="acc-0" id="accb-0"><span>Solar panels</span><span class="sign" aria-hidden="true">+</span></button><div class="acc-panel" id="acc-0" role="region" aria-labelledby="accb-0"><div><p>Tier-one modules from JA Solar and Jinko Solar, sized to your roof and daily energy use.</p></div></div></div>
        <div class="acc-item"><button type="button" aria-expanded="false" aria-controls="acc-1" id="accb-1"><span>Inverter</span><span class="sign" aria-hidden="true">+</span></button><div class="acc-panel" id="acc-1" role="region" aria-labelledby="accb-1"><div><p>Hybrid, off-grid or grid-tie inverters from Deye, Felicity, Solis and SRNE, matched to your load and phase.</p></div></div></div>
        <div class="acc-item"><button type="button" aria-expanded="false" aria-controls="acc-2" id="accb-2"><span>Batteries</span><span class="sign" aria-hidden="true">+</span></button><div class="acc-panel" id="acc-2" role="region" aria-labelledby="accb-2"><div><p>Lithium and gel storage sized to the backup hours you need, up to 17.5kWh packs.</p></div></div></div>
        <div class="acc-item"><button type="button" aria-expanded="false" aria-controls="acc-3" id="accb-3"><span>Protection &amp; wiring</span><span class="sign" aria-hidden="true">+</span></button><div class="acc-panel" id="acc-3" role="region" aria-labelledby="accb-3"><div><p>Breakers, surge protection, cabling and cabinets installed neatly and labelled for safe servicing.</p></div></div></div>
        <div class="acc-item"><button type="button" aria-expanded="false" aria-controls="acc-4" id="accb-4"><span>Mounting &amp; handover</span><span class="sign" aria-hidden="true">+</span></button><div class="acc-panel" id="acc-4" role="region" aria-labelledby="accb-4"><div><p>Rails and mounting hardware, system testing, a usage walkthrough, and WhatsApp support after handover.</p></div></div></div>
      </div>
    </div>
  </div>
</section>

<!-- ============ PROCESS ============ -->
<section id="process" class="wrap process">
  <div class="head-row rv">
    <div><h2 class="h2">From power need<br>to working system.</h2><p class="shop-lede">Design. Deliver. Install. Test. A clear process you can follow before you buy.</p></div>
    <a class="btn btn-ink" href="#contact">Send your power needs</a>
  </div>
  <div class="tabs rv" role="tablist" aria-label="Process steps" id="tabs">
    <button class="tab" type="button" role="tab" aria-selected="true" aria-controls="step-view" data-i="0"><span class="mono">Step 1</span><span class="nm">Consultation</span></button>
    <button class="tab" type="button" role="tab" aria-selected="false" aria-controls="step-view" data-i="1"><span class="mono">Step 2</span><span class="nm">System design</span></button>
    <button class="tab" type="button" role="tab" aria-selected="false" aria-controls="step-view" data-i="2"><span class="mono">Step 3</span><span class="nm">Delivery &amp; installation</span></button>
    <button class="tab" type="button" role="tab" aria-selected="false" aria-controls="step-view" data-i="3"><span class="mono">Step 4</span><span class="nm">Testing &amp; support</span></button>
  </div>
  <div class="step-view rv" id="step-view" role="tabpanel">
    <div class="step-card">
      <div class="top swap" id="step-top">
        <span class="mono eyebrow" id="step-n">Step 1 of 4</span>
        <h3 id="step-h">Consultation</h3>
        <p id="step-p">We understand the property, your appliances, budget and how many hours of backup you need.</p>
      </div>
      <div class="tags" id="step-tags"><span>Site survey</span><span>Load audit</span><span>Budget</span></div>
    </div>
    <div class="media" id="step-media"><img id="step-img" src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/6fd700f137.webp" alt="Technician on site" loading="lazy" onerror="this.style.visibility='hidden'"></div>
  </div>
</section>

<!-- ============ SERVICES ============ -->
<section class="wrap services">
  <h2 class="h2 rv">What we install.</h2>
  <div class="svc-list">
    <a class="svc rv" href="#contact"><span class="nm">Full home solar</span><span class="ds">Panels, inverter, battery, protection, installation and testing for dependable home power.</span><span class="media"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/b40d931493.webp" alt="" loading="lazy"></span><span class="go" aria-hidden="true"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></a>
    <a class="svc rv" href="#contact"><span class="nm">Power backup</span><span class="ds">Keep essential appliances running with a properly matched inverter and battery system.</span><span class="media"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/90fc216d74.webp" alt="" loading="lazy"></span><span class="go" aria-hidden="true"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></a>
    <a class="svc rv" href="#contact"><span class="nm">Business power systems</span><span class="ds">Practical hybrid setups for shops, offices, apartments and small business operations.</span><span class="media"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/eec44d0885.webp" alt="" loading="lazy"></span><span class="go" aria-hidden="true"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></a>
    <a class="svc rv" href="#contact"><span class="nm">Solar water heating</span><span class="ds">Reliable water heating that reduces electricity use in homes and facilities.</span><span class="media"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/solar-water-heating.webp" alt="Seven SS Stars solar water heater" loading="lazy"></span><span class="go" aria-hidden="true"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></a>
    <a class="svc rv" href="#contact"><span class="nm">Outdoor lighting</span><span class="ds">Solar lighting for compounds, walkways, security points and commercial outdoor spaces.</span><span class="media"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/outdoor-lighting.webp" alt="Solar garden and pathway lighting" loading="lazy"></span><span class="go" aria-hidden="true"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></a>
    <a class="svc rv" href="#contact"><span class="nm">Parts &amp; accessories</span><span class="ds">Controllers, cables, breakers, rails, cabinets and mounting hardware for clean installations.</span><span class="media"><img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/510a930c57.webp" alt="" loading="lazy"></span><span class="go" aria-hidden="true"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M7 17L17 7M8 7h9v9"/></svg></span></a>
  </div>
</section>


<!-- ============ REVIEWS ============ -->
<section class="wrap reviews">
  <div class="head-row rv">
    <div><h2 class="h2">What customers say<br>after handover.</h2></div>
    <div class="ctrl"><span style="color:var(--ink-2)">★★★★★ rated by customers</span><button class="arrow" type="button" id="rev-prev" aria-label="Previous review"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6"/></svg></button><button class="arrow" type="button" id="rev-next" aria-label="Next review"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button></div>
  </div>
  <div class="rev-viewport" id="revs" aria-roledescription="carousel" aria-label="Customer reviews"><div class="rev-track" id="rev-track">
    <figure class="rev rv"><blockquote>“Very good seller. George is responsive and if he doesn’t have a product and says he will get it to you by a certain day, he sure keeps his word.”</blockquote><figcaption><span class="av">AR</span><span class="who"><b>Abu Rutunu</b><span class="mono">Nairobi · ★★★★★</span></span></figcaption></figure>
    <figure class="rev rv"><blockquote>“The follow-up after installation made me forever love Solar Connect. Thank you, George.”</blockquote><figcaption><span class="av">CO</span><span class="who"><b>Cavine Ochieng</b><span class="mono">Nairobi · ★★★★★</span></span></figcaption></figure>
    <figure class="rev rv"><blockquote>“The team is very professional and their services are top notch. I have also been using their panels and pump for the past year.”</blockquote><figcaption><span class="av">AW</span><span class="who"><b>Anna Wangechi</b><span class="mono">Nairobi · ★★★★★</span></span></figcaption></figure>
    <figure class="rev rv"><blockquote>“Great customer service and excellent site work.”</blockquote><figcaption><span class="av">LM</span><span class="who"><b>Linus Mutahi</b><span class="mono">Nairobi · ★★★★★</span></span></figcaption></figure>
    </div></div>
</section>

<!-- ============ CTA ============ -->
<section id="contact" class="cta">
  <div class="cta-frame media">
    <img src="https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/cta-bg.webp" alt="" loading="lazy">
    
    <div class="cta-body">
      <div class="cta-copy rv">
        <h2>Send us your power needs. We’ll recommend the right setup.</h2>
        <p>Tell us your appliances, backup hours, property type and budget. We’ll guide you to the right panels, inverter, battery and installation plan.</p>
      </div>
      <form class="qform rv" id="qform" novalidate>
        <label for="q-phone" class="mono">Your phone or WhatsApp number</label>
        <div class="qrow">
          <input id="q-phone" name="phone" type="tel" inputmode="tel" placeholder="07XX XXX XXX" autocomplete="tel">
          <button class="btn btn-white" type="submit">Request a quote</button>
        </div>
        <p class="msg" id="q-msg" hidden></p>
        <a class="btn btn-sun" href="https://wa.me/254706636447?text=Hello%20Solar%20Connect%2C%20I%20need%20help%20choosing%20a%20solar%20system."><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20l1.3-3.9A8 8 0 1 1 8 19.1z"/></svg>Chat on WhatsApp · 0706 636 447</a>
      </form>
    </div>
  </div>
</section>

</main>

<!-- ============ FOOTER (shared: parts/site-footer.php) ============ -->
<?php include get_stylesheet_directory() . '/parts/site-footer.php'; ?>
<?php include get_stylesheet_directory() . '/parts/wa-float.php'; ?>

<?php wp_footer(); ?>
</body>
</html>
