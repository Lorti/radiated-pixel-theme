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

<body <?php body_class(); ?>>

<ul class="rp-teaser-banner small-block-grid-3 large-block-grid-5 large-12 columns">
  <li><a><img src="http://placekitten.com/400/250"></a></li>
  <li><a><img src="http://placekitten.com/400/250"></a></li>
  <li><a><img src="http://placekitten.com/400/250"></a></li>
  <li><a><img src="http://placekitten.com/400/250" class="hide-for-small"></a></li>
  <li><a><img src="http://placekitten.com/400/250" class="hide-for-small"></a></li>
</ul>

<nav class="top-bar" role="navigation">
	<ul class="title-area">
	  <li class="name">
	    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	  </li>
	  <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
	</ul>

	<section class="top-bar-section">
		<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false)); ?>
		<ul class="right"> 
			<li><?php get_search_form(); ?></li>
		</ul>
	</section>

</nav>

<!-- microformats.org/wiki/hatom -->
<div id="page" class="hfeed">

	<?php do_action( 'before' ); ?>
<!-- 	
	<header class="row" role="banner">
		<div class="large-12 columns">
			<h1>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<small><?php bloginfo( 'description' ); ?></small>
			</h1>
		</div>
	</header>
 -->
	<div id="main" class="row">
