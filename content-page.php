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
      <?php
        $content = get_the_content();
        // http://codex.wordpress.org/Function_Reference/the_content#Alternative_Usage
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        // http://foundation.zurb.com/docs/components/flex-video.html
        $content = preg_replace('/<iframe.*?youtube.*?><\/iframe>/', '<div class="flex-video widescreen">$0</div>', $content);
        $content = preg_replace('/<iframe.*?vimeo.*?><\/iframe>/', '<div class="flex-video vimeo widescreen">$0</div>', $content);
        // Headings receive an automatic anchor and a link to themselves.
        preg_match_all('/<(h[0-6])>(.*?)<\/\1>/i', $content, $matches, PREG_SET_ORDER);
        foreach ( $matches as $match ) {
          $slug = rp_create_slug($match[2]);
          $heading = sprintf('<%s id="%s"><a href="#%s">%s</a></%s>', $match[1], $slug, $slug, $match[2], $match[1]);
          $content = str_replace($match[0], $heading, $content);
        }
        echo $content;
      ?>
    </div><!-- .entry-content -->
  </div>
</article><!-- #post-## -->
