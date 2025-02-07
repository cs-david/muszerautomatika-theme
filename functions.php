<?php
/**
 * Műszer Automatika Sablon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Műszer_Automatika_Sablon
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function muszerautomatika_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Műszer Automatika Sablon, use a find and replace
		* to change 'muszerautomatika-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'muszerautomatika-theme', get_template_directory() . '/languages' );

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
	add_post_type_support('page', 'thumbnail');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => 'Fejléc 1',
			'menu-2' => 'Fejléc 2',
			'menu-footer' => 'Lábléc',
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
add_action( 'after_setup_theme', 'muszerautomatika_theme_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function muszerautomatika_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'muszerautomatika-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'muszerautomatika-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'muszerautomatika_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function muszerautomatika_theme_scripts() {
	wp_enqueue_style( 'muszerautomatika-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap', false);
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/styles.css', array(), null);
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/33aef8f39e.js', array(), null, true);

	wp_enqueue_script( 'muszerautomatika-theme-scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'muszerautomatika_theme_scripts' );

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

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Egyes menüpontok módosítása
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        $output .= '<li class="' . esc_attr($class_names) . '">';

        $attributes  = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $title = apply_filters('the_title', $item->title, $item->ID);

        $output .= '<a' . $attributes . '>' . $title;

        // Itt adjuk hozzá az egyedi HTML-t a menüpont szöveg után
        $output .= '<div class="menu-underline">
                        <div class="menu-dot dot-1"></div>
                        <div class="menu-dot dot-2"></div>
                        <div class="menu-dot dot-underline"></div>
                    </div>';

        $output .= '</a>';
    }
}

function ma_products_post_type() {
    $labels = array(
        'name'               => __('Termékek', 'textdomain'),
        'singular_name'      => __('Termék', 'textdomain'),
        'menu_name'          => __('Termékek', 'textdomain'),
        'name_admin_bar'     => __('Termék', 'textdomain'),
        'add_new_item'       => __('Új termék hozzáadása', 'textdomain'),
        'new_item'           => __('Új termék', 'textdomain'),
        'edit_item'          => __('Termék szerkesztése', 'textdomain'),
        'view_item'          => __('Termék megtekintése', 'textdomain'),
        'all_items'          => __('Összes termék', 'textdomain'),
        'search_items'       => __('Termékek keresése', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true, 
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'termekek'), 
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5, 
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'), 
        'menu_icon'          => 'dashicons-products',
        'show_in_rest'       => true, // Gutenberg támogatás
    );

    register_post_type('termek', $args);
}

add_action('init', 'ma_products_post_type');

function ma_product_categories() {
    $labels = array(
        'name'              => _x('Termék kategóriák', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Termék kategória', 'taxonomy singular name', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true, // Ha hamis, akkor címkéként viselkedik
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'termek-kategoria'),
    );

    register_taxonomy('termek_kategoria', array('termek'), $args);
}

add_action('init', 'ma_product_categories');

function ma_product_foa() {
    $labels = array(
        'name'              => _x('Alkalmazási területek', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Alkalmazási terület', 'taxonomy singular name', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => false, // Ha hamis, akkor címkéként viselkedik
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'alkalmazasi-teruletek'),
    );

    register_taxonomy('alkalmazasi_teruletek', array('termek'), $args);
}

add_action('init', 'ma_product_foa');

function ma_customizer_settings($wp_customize) {
	$wp_customize->add_section('phone_section', array(
		'title'       => __('Telefonszámok', 'textdomain'),
		'priority'    => 30,
	));
    // Info Phone
    $wp_customize->add_setting('info_phone', array(
        'default'           => __('Telefonszám', 'textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('info_phone', array(
        'label'       => __('Info telefonszám', 'textdomain'),
        'section'     => 'phone_section',
        'type'        => 'text',
    ));
	// Service Phone
    $wp_customize->add_setting('service_phone', array(
        'default'           => __('Telefonszám', 'textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('service_phone', array(
        'label'       => __('Serviz telefonszám', 'textdomain'),
        'section'     => 'phone_section',
        'type'        => 'text',
    ));
}

add_action('customize_register', 'ma_customizer_settings');

