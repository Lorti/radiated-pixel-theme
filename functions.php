<?php
/**
 * Ricola functions and definitions
 *
 * @package Radiated Pixel
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1000; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'rp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function rp_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Ricola, use a find and replace
	 * to change 'rp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rp', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 450, 300, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rp' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * http://kendsnyder.com/posts/simple-and-effective-fix-for-the-wordpress-wpautop-madness
	 */
	add_filter('the_content', 'fix_autop');
	add_filter('the_excerpt', 'fix_autop');

	function fix_autop($content) {
		$html = trim($content);
		if ( $html === '' ) {
			return '';
		}
		$blocktags = 'address|article|aside|audio|blockquote|canvas|caption|center|col|del|dd|div|dl|fieldset|figcaption|figure|footer|form|frame|frameset|h1|h2|h3|h4|h5|h6|header|hgroup|iframe|ins|li|nav|noframes|noscript|object|ol|output|pre|script|section|table|tbody|td|tfoot|thead|th|tr|ul|video';
		$html = preg_replace('~<p>\s*<('.$blocktags.')\b~i', '<$1', $html);
		$html = preg_replace('~</('.$blocktags.')>\s*</p>~i', '</$1>', $html);
		return $html;
	}

	/**
	 * http://foundation.zurb.com/docs/components/flex-video.html
	 */
	add_filter('the_content', 'flex_video');

	function flex_video($content) {
		$content = preg_replace('/<iframe.*?youtube.*?><\/iframe>/', '<div class="flex-video widescreen">$0</div>', $content);
		$content = preg_replace('/<iframe.*?vimeo.*?><\/iframe>/', '<div class="flex-video vimeo widescreen">$0</div>', $content);
		return $content;
	}

	/**
	 * Headings receive an automatic anchor and a link to themselves.
	 */
	add_filter('the_content', 'add_anchors');

	function add_anchors($content) {
		preg_match_all('/<(h[0-6])>(.*?)<\/\1>/i', $content, $matches, PREG_SET_ORDER);
		foreach ( $matches as $match ) {
			$slug = rp_create_slug($match[2]);
			$heading = sprintf('<%s id="%s"><a href="#%s">%s</a></%s>', $match[1], $slug, $slug, $match[2], $match[1]);
			$content = str_replace($match[0], $heading, $content);
		}
		return $content;
	}
}
endif; // rp_setup
add_action( 'after_setup_theme', 'rp_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function rp_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'rp_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'rp_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function rp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'rp' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'rp_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function rp_scripts() {
	wp_enqueue_style( 'Foundation-normalize', get_template_directory_uri() . '/css/normalize.css' );
	wp_enqueue_style( 'Foundation-style', get_template_directory_uri() . '/css/app.css' );
	wp_enqueue_script( 'Foundation-modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js' );
  wp_enqueue_script( 'Foundation-foundation', get_template_directory_uri() . '/js/foundation/foundation.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-alerts', get_template_directory_uri() . '/js/foundation/foundation.alerts.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-clearing', get_template_directory_uri() . '/js/foundation/foundation.clearing.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-cookie', get_template_directory_uri() . '/js/foundation/foundation.cookie.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-dropdown', get_template_directory_uri() . '/js/foundation/foundation.dropdown.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-forms', get_template_directory_uri() . '/js/foundation/foundation.forms.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-joyride', get_template_directory_uri() . '/js/foundation/foundation.joyride.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-magellan', get_template_directory_uri() . '/js/foundation/foundation.magellan.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-orbit', get_template_directory_uri() . '/js/foundation/foundation.orbit.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-placeholder', get_template_directory_uri() . '/js/foundation/foundation.placeholder.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-reveal', get_template_directory_uri() . '/js/foundation/foundation.reveal.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-section', get_template_directory_uri() . '/js/foundation/foundation.section.js', array(), '20130420', true );
	// wp_enqueue_script( 'Foundation-tooltips', get_template_directory_uri() . '/js/foundation/foundation.tooltips.js', array(), '20130420', true );
	wp_enqueue_script( 'Foundation-topbar', get_template_directory_uri() . '/js/foundation/foundation.topbar.js', array(), '20130420', true );
	wp_enqueue_script( 'Radiated Pixel', get_template_directory_uri() . '/js/main.js', array(), '20130926', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rp_scripts' );

// jQuery Insert From Google
if (!is_admin()) add_action( 'wp_enqueue_scripts', 'my_jquery_enqueue', 11 );
function my_jquery_enqueue() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http' . ($_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2' );
	wp_enqueue_script('jquery');
}
