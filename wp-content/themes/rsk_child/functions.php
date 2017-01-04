<?php
/**
 * Generate child theme functions and definitions
 *
 * @package Generate
 */

 function custom_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/* Translate function */
add_filter('gettext', 'translate_text');
    add_filter('ngettext', 'translate_text');

    function translate_text($translated) {
    $translated = str_ireplace('Eng', 'Da', $translated);
    return $translated;
    }


add_action( 'wp_enqueue_scripts', 'themeprefix_slick_enqueue_scripts_styles' );
function themeprefix_slick_enqueue_scripts_styles() {
wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.5.9', true );
wp_enqueue_script( 'slickjs-init', get_stylesheet_directory_uri(). '/js/slick-init.js', array( 'slickjs' ), '1.5.9', true );
wp_enqueue_style( 'slickcss', get_stylesheet_directory_uri() . '/slick/slick.css', '1.5.9', 'all');
wp_enqueue_style( 'slickcsstheme', get_stylesheet_directory_uri() . '/slick/slick-theme.css', '1.5.9', 'all');
wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true);
wp_enqueue_script( 'lightbox', get_stylesheet_directory_uri() . '/js/lightbox.min.js', array( 'jquery' ), '1.0.0', true);
};


/* Opret Generelt sider i dashboardet */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Generelt',
        'menu_title'    => 'Generelt',
        'menu_slug'     => 'generelt',
        'capability'    => 'edit_posts',
        'parent_slug'   => '',
        'position'      => false,
        'icon_url'      => false,
    ));

};

function child_theme_setup() {
  // Enable support for post thumbnails
  add_image_size( 'misc-thumb', 520, 400, true );
  add_image_size( 'thumb', 440, 294, true );
}
add_action( 'after_setup_theme', 'child_theme_setup', 11 );

/* calendar widget */
 if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Calendar',
		'id' => 'calendar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
}
/* Iframe widget */
 if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Tilmelding',
		'id' => 'tilmelding',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));
}




/* Custom Post Type Gallery */

function gallery_custom_post_type (){

	$labels = array(
		'name' => 'Gallery',
		'singular_name' => 'Gallery',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Gallery',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'thumbnail',
			'revisions',
		),
		'menu_position' => 5,
    'menu_icon' => 'dashicons-format-gallery',
		'exclude_from_search' => false
	);
	register_post_type('gallery',$args);
}
add_action('init','gallery_custom_post_type');
