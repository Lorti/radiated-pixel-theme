<?php
/**
 * @package Radiated Pixel
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>


	<header class="entry-header large-12 columns">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'rp' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->


	<div class="panel panel--radiated-pixel large-12 columns">

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta large-12 columns">
			<small><?php rp_posted_on(); ?></small>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<div class="large-4 columns">
			<?php if ( has_post_thumbnail() ) : ?>
			<a class="th" href="<?php the_permalink(); ?>">
				<?php $featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-thumbnail'); ?>
				<img src="<?php echo $featuredImage[0]; ?>" width="100%" alt="Thumbnail"></a>
			<?php endif; ?>
			<a href="<?php the_permalink(); ?>" class="button hide-for-small">Read Post...</a>
		</div>


		<div class="entry-summary large-8 columns">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="button show-for-small">Read Post...</a>
		</div><!-- .entry-summary -->


		<footer class="entry-meta large-12 columns">
			<small>
				<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
					<?php
						/* translators: used between list items, there is a space after the comma */
						$categories_list = get_the_category_list( __( ', ', 'rp' ) );
						if ( $categories_list && rp_categorized_blog() ) :
					?>
					<span class="icon-bookmark">
						<?php printf( __( '%1$s', 'rp' ), $categories_list ); ?>
					</span>
					<?php endif; // End if categories ?>

					<?php
						/* translators: used between list items, there is a space after the comma */
						$tags_list = get_the_tag_list( '', __( ', ', 'rp' ) );
						if ( $tags_list ) :
					?>
					<span class="icon-tag">
						<?php printf( __( '%1$s', 'rp' ), $tags_list ); ?>
					</span>
					<?php endif; // End if $tags_list ?>
				<?php endif; // End if 'post' == get_post_type() ?>

				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="icon-comment">
					<?php comments_popup_link( __( 'Leave a comment', 'rp' ), __( '1 Comment', 'rp' ), __( '% Comments', 'rp' ) ); ?>
				</span>
				<?php endif; ?>
			</small>
		</footer><!-- .entry-meta -->

	</div>


</article><!-- #post-## -->
