<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Radiated Pixel
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h1>
  </header><!-- .entry-header -->

  <div class="panel panel--radiated-pixel row">
    <div class="entry-content large-12 columns">
      <?php  the_content(); ?>
    </div><!-- .entry-content -->
  </div>
</article><!-- #post-## -->
