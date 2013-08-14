<?php
/**
 * @package Radiated Pixel
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php rp_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			$content = get_the_content();
			// http://codex.wordpress.org/Function_Reference/the_content#Alternative_Usage
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			// http://foundation.zurb.com/docs/components/flex-video.html
			$content = preg_replace('/<iframe.*?youtube.*?><\/iframe>/', '<div class="flex-video widescreen">$0</div>', $content);
			$content = preg_replace('/<iframe.*?vimeo.*?><\/iframe>/', '<div class="flex-video vimeo widescreen">$0</div>', $content);
			echo $content;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'rp' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'rp' ) );

			if ( ! rp_categorized_blog() ) {
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="icon-tag"> %2$s </span>', 'rp' );
				}
			} else {
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="icon-bookmark"> %1$s </span> <span class="icon-tag"> %2$s </span>', 'rp' );
				}
			}

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
