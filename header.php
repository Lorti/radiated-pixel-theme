<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Radiated Pixel
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<!-- =======================================================================
	 Theme for Radiated Pixel by Manuel Wieser
	 office@manuelwieser.com
	 http://www.radiatedpixel.com/
	 https://github.com/lorti/radiated-pixel-theme
	 ======================================================================= -->

<body <?php body_class(); ?>>

<ul class="small-block-grid-3 large-block-grid-5 block-grid--featured">
<?php $fQuery = new WP_Query('tag=Featured&posts_per_page=5'); ?>
<?php $fIndex = 0; ?>
<?php while ($fQuery->have_posts()) : $fQuery->the_post(); ?>
	<li<?php if ($fIndex > 2) echo ' class="hide-for-small"'; ?>>
  		<a href="<?php the_permalink(); ?>">
  			<img class="block-grid--featured__fallback-image" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="Thumbnail">
  			<div class="block-grid--featured__cropped-image" style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>);"></div>
  		</a>
	</li>
	<?php $fIndex++; ?>
<?php endwhile;?>
</ul>

<nav class="top-bar top-bar--radiated-pixel" role="navigation">
	<ul class="title-area">
	  <li class="name">
	    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
	    	   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
	    	   rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	  </li>
	  <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
	</ul>

	<section class="top-bar-section">
		<?php wp_nav_menu(array(
				'theme_location' => 'primary',
				'container' 		 => false,
				'after'          => '<li class="divider"></li>',
				'items_wrap'     => '<ul id="%1$s" class="%2$s"><li class="divider"></li>%3$s</ul>',
				'depth'          => '-1'

		)); ?>
		<ul class="right">
			<li><?php get_search_form(); ?></li>
		</ul>
	</section>
</nav>

<!-- microformats.org/wiki/hatom -->
<div id="page" class="hfeed">

	<?php do_action( 'before' ); ?>

	<div id="main" class="row">
