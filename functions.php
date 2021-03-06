<?php
/**
 * My Tix functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package My_Tix
 */

if ( ! function_exists( 'mtx_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mtx_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on My Tix, use a find and replace
		 * to change 'mtx' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mtx', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mtx' ),
			'social-menu' => esc_html__( 'Social Menu', 'mtx' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mtx_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 150,
			'width'       => 150,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mtx_setup' );

function mtx_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Roboto and Open Sans translate, this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto = _x( 'on', 'Roboto font: on or off', 'mtx' );

	$open_sans = _x( 'on', 'Open Sans font: on or off', 'mtx' );

	$font_families = array();

	if ( 'off' !== $roboto ) {
		$font_families[] = 'Roboto:400,700';
	}

	if ( 'off' !== $open_sans ) {
		$font_families[] = 'Open Sans:400,400i,700';
	}

	if ( in_array('on', array( $roboto, $open_sans) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

// Add preconnect for Google Fonts, per twentyseventeen

function mtx_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'mtx-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'mtx_resource_hints', 10, 2 );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 * Only affects content coming from outside (videos, etc.).
 *
 * @global int $content_width
 */
function mtx_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mtx_content_width', 640 );
}
add_action( 'after_setup_theme', 'mtx_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mtx_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mtx' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mtx' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mtx_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mtx_scripts() {

	//	Add Google fonts Roboto, and Open Sans.
	wp_enqueue_style( 'mtx-fonts', mtx_fonts_url() );
	wp_enqueue_style( 'mtx-style', get_stylesheet_uri() );
	wp_enqueue_style( 'mtx-jquery-ui-css', get_template_directory_uri() . '/js/jquery/jquery-ui.min.css');
	wp_enqueue_script( 'mtx-jquery-ui', get_template_directory_uri() . '/js/jquery/jquery-ui.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'mtx-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20170712', true );
	wp_enqueue_script( 'mtx-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );
	//this relates to the accordion widget in single post views
	if ( is_singular() ) {
		wp_enqueue_script(  'images_loaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array('jquery'), true  );
		// wp_enqueue_script( 'mtx-accordion-ui', get_template_directory_uri() . '/js/accordion-functions.js', array('jquery'), '20151215', true );//need to fix RBD
		wp_enqueue_script( 'mtx-manage-img-height', get_template_directory_uri() . '/js/tall.js', array('jquery'), '20151215', true );
	}
	wp_localize_script( 'mtx-navigation','mtxScreenReaderText', array(
		'expand' => __( 'Expand child menu', 'mtx' ),
		'collapse' => __( 'Collapse child menu', 'mtx' ),
	));
	wp_enqueue_script( 'mtx-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mtx_scripts' );

// adding dashicons to frontend
add_action( 'wp_enqueue_scripts', 'mtx_dashicons_front_end' );
function mtx_dashicons_front_end() {
wp_enqueue_style( 'dashicons' );
}


function mtx_add_custom_types( $query ) {
	if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
	  $query->set( 'post_type', array(
	   'post', 'movies', 'live-events', 'attractions', 'sundry'
		  ));
	  }
	  return $query;
  }
  add_filter( 'pre_get_posts', 'mtx_add_custom_types' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions that act independently of the theme templates.
 */
//require get_template_directory() . '/inc/extras.php'; // On hold... 

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
