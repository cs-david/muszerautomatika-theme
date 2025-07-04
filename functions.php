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
	define( '_S_VERSION', '1.7.3' );
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
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

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

function wpacg_mszer_automatika_admin_color_scheme() {
    //Get the theme directory
    $theme_dir = get_stylesheet_directory_uri();
  
    //Műszer Automatika
    wp_admin_css_color( 'mszer_automatika',  'Műszer Automatika',
      $theme_dir . '/mszer_automatika.css',
      array( '#212e5b', '#e5f8ff', '#c41d48' , '#070b1a')
    );
  }
  add_action('admin_init', 'wpacg_mszer_automatika_admin_color_scheme');

add_action('admin_menu', function() {
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
    remove_submenu_page('themes.php', 'widgets.php');
});

add_action('init', function() {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
});

// Close comments on the front end
add_filter('comments_open', '__return_false');
add_filter('pings_open', '__return_false');

/**
 * Enqueue scripts and styles.
 */
function muszerautomatika_theme_scripts() {
	wp_enqueue_style( 'muszerautomatika-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap', false);
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/styles.css', array(), null);
    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/css/owl-carousel/owl.carousel.css', array(), true );
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/fontawesome/css/fontawesome.min.css', array(), null);
    wp_enqueue_style('font-awesome-solid', get_template_directory_uri() . '/css/fontawesome/css/solid.min.css', array(), null);
    wp_enqueue_style('font-awesome-brands', get_template_directory_uri() . '/css/fontawesome/css/brands.min.css', array(), null);
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'muszerautomatika-theme-scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'muszerautomatika_theme_scripts' );

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

function search_only_custom_post_type($query) {
    if ($query->is_search() && !is_admin()) {
        $query->set('post_type', 'termek'); // Change 'your_post_type' to your desired post type
    }
}
add_action('pre_get_posts', 'search_only_custom_post_type');

function ma_products_post_type() {
    $labels = array(
        'name'               => 'Termékek',
        'singular_name'      => 'Termék',
        'menu_name'          => 'Termékek',
        'name_admin_bar'     => 'Termék',
        'add_new_item'       => 'Új termék hozzáadása',
        'new_item'           => 'Új termék',
        'edit_item'          => 'Termék szerkesztése',
        'view_item'          => 'Termék megtekintése',
        'all_items'          => 'Összes termék',
        'search_items'       => 'Termékek keresése',
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
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'), 
        'menu_icon'          => 'dashicons-products',
        'show_in_rest'       => true, // Gutenberg támogatás
    );

    register_post_type('termek', $args);
}

add_action('init', 'ma_products_post_type');

function ma_product_categories() {
    $labels = array(
        'name'              => 'Termékkategóriák',
        'singular_name'     => 'Termékkategória',
    );

    $args = array(
        'hierarchical'      => true, // Ha hamis, akkor címkéként viselkedik
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'termek-kategoria'),
        'show_in_rest'       => true,
    );

    register_taxonomy('termek_kategoria', array('termek'), $args);
}

add_action('init', 'ma_product_categories');

function ma_product_foa() {
    $labels = array(
        'name'              => 'Alkalmazási területek',
        'singular_name'     => 'Alkalmazási terület',
    );

    $args = array(
        'hierarchical'      => false, // Ha hamis, akkor címkéként viselkedik
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'alkalmazasi-teruletek'),
        'show_in_rest'       => true,
    );

    register_taxonomy('alkalmazasi_teruletek', array('termek'), $args);
}

add_action('init', 'ma_product_foa');

function ma_team_post_type() {
    $labels = array(
        'name'               => 'Munkatársak',
        'singular_name'      => 'Munkatárs',
        'menu_name'          => 'Munkatársak',
        'name_admin_bar'     => 'Munkatárs',
        'add_new_item'       => 'Új munkatárs hozzáadása',
        'new_item'           => 'Új munkatárs',
        'edit_item'          => 'Munkatárs szerkesztése',
        'view_item'          => 'Munkatárs megtekintése',
        'all_items'          => 'Összes munkatárs',
        'search_items'       => 'Munkatársak keresése',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true, 
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'munkatarsak'), 
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6, 
        'supports'           => array('title', 'editor', 'custom-fields'), 
        'menu_icon'          => 'dashicons-groups',
        'show_in_rest'       => true, // Gutenberg támogatás
    );

    register_post_type('munkatarsak', $args);
}

add_action('init', 'ma_team_post_type');

function ma_slides_post_type() {
    $labels = array(
        'name'               => 'Slide-ok',
        'singular_name'      => 'Slide',
        'menu_name'          => 'Slide-ok',
        'name_admin_bar'     => 'Slide',
        'add_new_item'       => 'Új slide hozzáadása',
        'new_item'           => 'Új slide',
        'edit_item'          => 'Slide szerkesztése',
        'view_item'          => 'Slide megtekintése',
        'all_items'          => 'Összes slide',
        'search_items'       => 'Slide-ok keresése',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true, 
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'slides'), 
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6, 
        'supports'           => array('title', 'thumbnail', 'page-attributes'), 
        'menu_icon'          => 'dashicons-align-wide',
        'show_in_rest'       => true, // Gutenberg támogatás
    );

    register_post_type('slides', $args);
}

add_action('init', 'ma_slides_post_type');

function ma_slides_tag() {
    $labels = array(
        'name'              => 'Megjelenési helyek',
        'singular_name'     => 'Megjelenési hely',
    );

    $args = array(
        'hierarchical'      => false, // Ha hamis, akkor címkéként viselkedik
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'megjelenesi-helyek'),
        'show_in_rest'       => true,
    );

    register_taxonomy('megjelenesi-helyek', array('slides'), $args);
}

add_action('init', 'ma_slides_tag');

/* Media Library File type support */
// Allow DWG and DXF file types in the media library

function allow_custom_mime_types($mimes) {
    $mimes['dwg'] = 'image/vnd.dwg';
    $mimes['dxf'] = 'image/vnd.dxf';
    return $mimes;
}
add_filter('upload_mimes', 'allow_custom_mime_types');

add_action('template_redirect', function () {
    if (is_404()) {
        wp_redirect(home_url());
        exit;
    }
});