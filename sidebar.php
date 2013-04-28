<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Radiated Pixel
 */
?>
	<div id="secondary" class="large-4 columns" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h4 class="widget-title"><?php _e( 'Archives', 'rp' ); ?></h4>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h4 class="widget-title"><?php _e( 'Meta', 'rp' ); ?></h4>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
