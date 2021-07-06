<?php
/**
 * Linpark functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Linpark
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'linpark_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function linpark_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Linpark, use a find and replace
		 * to change 'linpark' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'linpark', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Header', 'linpark' ),
				'footer' => esc_html__( 'Footer', 'linpark' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'linpark_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'linpark_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function linpark_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'linpark_content_width', 640 );
}
add_action( 'after_setup_theme', 'linpark_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function linpark_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'linpark' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'linpark' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'linpark_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function linpark_scripts() {
	/* Boostrap */
	wp_enqueue_style( 'boostrap-grid', get_template_directory_uri() . '/css/bootstrap-grid.min.css', array(), _S_VERSION );

	if (is_front_page()) {
		wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), _S_VERSION );
		wp_enqueue_script( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'swiper-gallery', get_template_directory_uri() . '/js/swiper-gallery.js', array(), _S_VERSION, true );
	}

	wp_enqueue_style( 'linpark-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'linpark-style', 'rtl', 'replace' );

	wp_enqueue_script( 'linpark-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	/* Custom */
	wp_enqueue_script( 'menu-toggle', get_template_directory_uri() . '/js/menu-toggle.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'linpark_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * 
 * ========= LINPARK CUSTOM FILTERS AND ACTIONS =========
 * 
 */

// Filter excerpt length to 35 words.
function linpark_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'linpark_custom_excerpt_length', 999 );

// Filter excerpt more
function linpark_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'linpark_excerpt_more');

//Remove default image sizes
function remove_default_image_sizes($sizes) {
	unset($sizes['thumbnail']);
	unset($sizes['medium']);
	return $sizes;
}
add_action('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

// Register new image size
add_image_size('linpark-medium', 500, 500, false);

// Remove prefix from archive title
function remove_archive_title_prefix($title) {
	if ( is_category() ) {    
			$title = single_cat_title( '', false );    
		} elseif ( is_tag() ) {    
			$title = single_tag_title( '', false );    
		} elseif ( is_author() ) {    
			$title = '<span class="vcard">' . get_the_author() . '</span>' ;    
		} elseif ( is_tax() ) { //for custom post types
			$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
		} elseif (is_post_type_archive()) {
			$title = post_type_archive_title( '', false );
		}
	return $title;    
}
add_filter( 'get_the_archive_title', 'remove_archive_title_prefix');

// Register Event custom post type
function create_event_post_type() {
	$args = array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' ),
				'add_new' => _x('Add New', 'event'),
				'add_new_item' => __('Add New Event'),
				'edit_item' => __('Edit Event'),
				'new_item' => __('New Event'),
				'all_items' => __('All Events'),
				'view_item' => __('View Event'),
				'search_items' => __('Search Events'),
				'not_found' =>  __('No events found'),
				'not_found_in_trash' => __('No events found in Trash'), 
				'parent_item_colon' => '',
				'menu_name' => __('Events')
            ),
            'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'			  => 'dashicons-calendar-alt',
			'can_export'          => true,
			'has_archive'         => true,
			'rewrite' => array('slug' => 'events'),
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
	);

	register_post_type( 'events', $args);
}
add_action('init', 'create_event_post_type');

// Event date function
function get_event_date($post_id = null) {
	global $post;
	if (!$post_id) {
		$post_id = $post->ID;
	}
	$start_date = raw_date_to_arr(get_post_meta($post_id, 'date_start_date', true));
	$end_date = raw_date_to_arr(get_post_meta($post_id, 'date_end_date', true));
	$event_date = array('start' => $start_date);
	if ($end_date) {
		$event_date['end'] = $end_date;
	}
	return $event_date;
}

// Convert raw date to array
function raw_date_to_arr($raw_date) {
	$year = substr($raw_date, 0, 4);
	$month = substr($raw_date, 4, 2);
	$day = substr($raw_date, 6);
	$external = $day . '/' . $month . '/' . $year;
	$format = "d/m/Y";
	$dateObj = date_create_from_format($format, $external);
	$day = date_format($dateObj, 'd');
	$month = date_format($dateObj, 'M');
	$year = date_format($dateObj, 'Y');
	return $date_arr = array('day' => $day, 'month' => $month, 'year' => $year);
}

// Event time function
function get_event_time($post_id = null) {
	global $post;
	if (!$post_id) {
		$post_id = $post->ID;
	}
	$start_time = raw_time_to_arr(get_post_meta($post_id, 'time_start_time', true));
	$end_time = raw_time_to_arr(get_post_meta($post_id, 'time_end_time', true));
	$event_time = array('start' => $start_time);
	if ($end_time) {
		$event_time['end'] = $end_time;
	}
	return $event_time;
}

// Convert raw time to array
function raw_time_to_arr($raw_time) {
	$format = "H:i:s";
	$dateObj = date_create_from_format($format, $raw_time);
	$time = date_format($dateObj, 'H:i');
	return $time;
}