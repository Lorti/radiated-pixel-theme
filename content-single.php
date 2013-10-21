<?php
/**
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

		<div class="entry-meta large-12 columns">
			<small><?php rp_posted_on(); ?></small>
		</div><!-- .entry-meta -->
		<div class="entry-content large-12 columns">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta large-12 columns">
			<small>
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
			</small>
	    <?php
	      // If comments are open or we have at least one comment, load up the comment template
	      if ( comments_open() || '0' != get_comments_number() )
	        comments_template();
	    ?>
		</footer><!-- .entry-meta -->

	</div>

</article><!-- #post-## -->
