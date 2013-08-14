<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Radiated Pixel
 */

get_header(); ?>

	<div id="primary" class="large-8 columns">
		<div id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php rp_content_nav( 'nav-below' ); ?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>