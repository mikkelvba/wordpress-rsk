<?php
/**
 * Get the defaults
 */
require plugin_dir_path( __FILE__ ) . 'defaults.php';

/**
 * Get the post image functions
 */
require plugin_dir_path( __FILE__ ) . 'images.php';

/**
 * Get the masonry functions
 */
require plugin_dir_path( __FILE__ ) . 'masonry.php';

/**
 * Get the column functions
 */
require plugin_dir_path( __FILE__ ) . 'columns.php';

/**
 * Get the Customizer options
 */
require plugin_dir_path( __FILE__ ) . 'customizer.php';

/**
 * Get the Customizer options
 */
require plugin_dir_path( __FILE__ ) . 'blog-content.php';

if ( ! function_exists( 'generate_blog_scripts' ) ) :
/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'generate_blog_scripts', 50 );
function generate_blog_scripts() {

	global $post;
	$generate_settings = wp_parse_args( 
		get_option( 'generate_blog_settings', array() ), 
		generate_blog_get_defaults() 
	);

	wp_add_inline_style( 'generate-style', generate_blog_css() );
	wp_add_inline_style( 'generate-style', generate_blog_columns_css() );
	
	if ( generate_blog_get_masonry() == 'true' ) :
		wp_enqueue_script( 'jquery-masonry');
		wp_enqueue_script( 'blog-scripts', plugin_dir_url( __FILE__ ) . 'js/scripts.min.js', array('jquery-masonry'), GENERATE_BLOG_VERSION, true );
		wp_enqueue_script( 'blog-imagesloaded', plugin_dir_url( __FILE__ ) . 'js/imagesloaded.pkgd.min.js', array('blog-scripts'), GENERATE_BLOG_VERSION, true );
		wp_localize_script( 'blog-scripts', 'objectL10n', array(
			'more'  => __( $generate_settings['masonry_load_more'],'generate-blog'),
			'loading' => __( $generate_settings['masonry_loading'], 'generate-blog' ),
		) );
	endif;
	
	if ( generate_blog_get_columns() ) :
		wp_enqueue_script( 'blog-matchHeight', plugin_dir_url( __FILE__ ) . 'js/jquery.matchHeight-min.js', array('jquery'), GENERATE_BLOG_VERSION, true );
	endif;
	
	wp_enqueue_style( 'blog-styles', plugin_dir_url( __FILE__ ) . 'css/style.min.css' );

}
endif;

if ( ! function_exists( 'generate_blog_post_classes' ) ) :
/**
 * Adds custom classes to the content container
 * @since 0.1
 */
add_filter( 'post_class', 'generate_blog_post_classes');
function generate_blog_post_classes( $classes )
{

	// Get theme options
	global $post, $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	$generate_blog_settings = wp_parse_args( 
		get_option( 'generate_blog_settings', array() ), 
		generate_blog_get_defaults() 
	);

	if ( generate_blog_get_masonry() == 'true' ) :
		$stored_meta = ( isset( $post ) ) ? get_post_meta( $post->ID, '_generate-blog-post-class', true ) : '';
		$masonry_post_width = ( '' !== $stored_meta ) ? $stored_meta : $generate_blog_settings['masonry_width'];
		
		if ( $generate_blog_settings['masonry_width'] == 'width4' )
			$masonry_post_width = 'medium';
		
		if ( $wp_query->current_post == 0 && $paged == 1 ) :

			if ( $masonry_post_width == 'medium' && $generate_blog_settings['masonry_most_recent_width'] == 'width4' ) :
				$masonry_post_width = 'medium';
			else :
				$masonry_post_width = $generate_blog_settings['masonry_most_recent_width'];
			endif;
		endif;
		
		$classes[] = $masonry_post_width;
		$classes[] = 'masonry-post';

	endif;
	
	if ( generate_blog_get_columns() && ! is_singular() ) :
		$classes[] = 'generate-columns';
		$classes[] = 'grid-' . $generate_blog_settings['columns'];
		$classes[] = 'tablet-grid-50';
		$classes[] = 'mobile-grid-100';
		
		if ( $wp_query->current_post == 0 && $paged == 1 && $generate_blog_settings['featured_column'] ) :
			$classes[] = 'featured-column';
		endif;
	endif;

	return $classes;
	
}
endif;

if ( ! function_exists( 'generate_blog_body_classes' ) ) :
/**
 * Adds custom classes to the body
 * @since 0.1
 */
add_filter( 'body_class', 'generate_blog_body_classes');
function generate_blog_body_classes( $classes )
{

	// Get theme options
	global $post;
	$generate_settings = wp_parse_args( 
		get_option( 'generate_blog_settings', array() ), 
		generate_blog_get_defaults() 
	);
	
	$classes[] = ( '' == $generate_settings['post_image_position'] ) ? 'post-image-below-header' : 'post-image-above-header';
	$classes[] = ( !empty( $generate_settings['post_image_alignment'] ) ) ? $generate_settings['post_image_alignment'] : 'post-image-aligned-center';
	
	if ( generate_blog_get_masonry() == 'true' ) :
		$classes[] = 'masonry-enabled';
	endif;
	
	if ( generate_blog_get_columns() && ! is_singular() ) :
		$classes[] = 'generate-columns-activated';
	endif;

	return $classes;
	
}
endif;