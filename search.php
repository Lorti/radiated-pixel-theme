<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Radiated Pixel
 */

get_header(); ?>

		<?php if ( have_posts() ) : ?>

			<section id="primary" class="large-8 columns">
				<div id="content" role="main">

					<header class="page-header">
						<h1 class="page-title"><?php printf( '<small>' . __( 'Search results for %s', 'rp' ), '</small><span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'search' ); ?>

					<?php endwhile; ?>

					<?php rp_content_nav( 'nav-below' ); ?>

				</div><!-- #content -->
			</section><!-- #primary -->

			<?php get_sidebar(); ?>

		<?php else : ?>

			<section id="primary" class="large-12 columns">
				<div id="content" role="main">

					<article id="post-0" class="post error404 not-found">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Sorry! Your search did not match any documents.', 'rp' ); ?></h1>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<p><?php _e( 'Please try different keywords and make sure that all words are spelled correctly.', 'rp' ); ?></p>
						</div><!-- .entry-content -->
					</article><!-- #post-0 .post .error404 .not-found -->

				</div><!-- #content -->
			</section><!-- #primary -->

		<?php endif; ?>

<?php get_footer(); ?>