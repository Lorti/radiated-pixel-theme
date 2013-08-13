<?php
/**
 * @package Radiated Pixel
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<header class="entry-header large-12 columns">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'rp' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<?php if ( 'post' == get_post_type() ) : ?>
	<div class="entry-meta large-12 columns">
		<?php rp_posted_on(); ?>
	</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="large-4 columns">
		<a class="th" href="<?php the_permalink(); ?>">
			<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail')[0] ?>" width="100%" alt="Thumbnail"></a>
		<a href="<?php the_permalink(); ?>" class="button hide-for-small">Read Post...</a>
	</div>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary large-8 columns">
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="button show-for-small">Read Post...</a>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content large-8 columns">
		<?php
			$content = get_the_content(__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rp' ));
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			// Needed for Foundation's subheader, so that it appears as a normal paragraph.
			$content = preg_replace('/<h[1-6] class=\"subheader\">(.*?)<\/h[1-6]>/', '<p>$1</p>', $content);
			// http://foundation.zurb.com/docs/components/flex-video.html
			$content = preg_replace('/<iframe.*?youtube.*?><\/iframe>/', '<div class="flex-video widescreen">$0</div>', $content);
			$content = preg_replace('/<iframe.*?vimeo.*?><\/iframe>/', '<div class="flex-video vimeo widescreen">$0</div>', $content);
			echo $content;
		?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'rp' ), 'after' => '</div>' ) ); ?>
		<a href="<?php the_permalink(); ?>" class="button show-for-small">Read Post...</a>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta large-12 columns">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'rp' ) );
				if ( $categories_list && rp_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'rp' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'rp' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"> | </span>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'rp' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> | </span>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'rp' ), __( '1 Comment', 'rp' ), __( '% Comments', 'rp' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'rp' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
