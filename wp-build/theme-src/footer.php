<?php
/**
 * Minimal site-wide footer for non-homepage templates.
 * The homepage carries its own full footer design inline
 * (see front-page.php) and does not call get_footer().
 */
?>
<footer style="background:var(--night);color:var(--white);padding:56px max(16px, env(safe-area-inset-left, 0px)) 32px max(16px, env(safe-area-inset-right, 0px));margin-top:80px">
  <div class="wrap" style="display:flex;flex-wrap:wrap;gap:24px;justify-content:space-between;align-items:center">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="display:flex;align-items:center;gap:10px;color:var(--white)">
      <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/685172a7fa.png" alt="Solar Connect, Building a better future" style="height:30px;width:auto;display:block">
    </a>
    <p style="color:var(--mist);font-size:14px;margin:0">&copy; <?php echo esc_html(date('Y')); ?> Solar Connect Kenya. Genuine solar products and installation for Nairobi &amp; Watamu.</p>
    <a href="https://wa.me/254706636447" class="btn btn-sun" style="font-size:14px">WhatsApp us</a>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>