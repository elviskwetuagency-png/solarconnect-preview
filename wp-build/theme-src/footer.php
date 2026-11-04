<?php
/**
 * Site-wide footer for every template that calls get_footer(): renders the
 * original homepage footer (parts/site-footer.php) plus the floating
 * WhatsApp button, so shop, product, cart and content pages all match the
 * homepage.
 */
include get_stylesheet_directory() . '/parts/site-footer.php';
include get_stylesheet_directory() . '/parts/wa-float.php';
wp_footer();
?>
</body>
</html>
