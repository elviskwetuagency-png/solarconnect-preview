<?php
/**
 * Generic page/content template, styled with the same design tokens
 * as the homepage (global.css) until a dedicated template is built.
 */
get_header();
?>
<main class="wrap" style="padding-block:140px 100px;min-height:50vh">
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
      <h1 class="h2" style="margin-bottom:28px"><?php the_title(); ?></h1>
      <div style="font-size:16.5px;line-height:1.7;color:var(--ink-2);max-width:760px">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>