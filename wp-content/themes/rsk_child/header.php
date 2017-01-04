<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package GeneratePress
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php generate_body_schema();?> <?php body_class(); ?>>
	<?php do_action( 'generate_before_header' ); ?>
	<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'generate' ); ?>"><?php _e( 'Skip to content', 'generate' ); ?></a>
	<header itemtype="http://schema.org/WPHeader" itemscope="itemscope" id="masthead" <?php generate_header_class(); ?>>
		<div <?php generate_inside_header_class(); ?>>
			<?php do_action( 'generate_before_header_content'); ?>
			<?php generate_header_items(); ?>
			<?php do_action( 'generate_after_header_content'); ?>
		</div><!-- .inside-header -->
	</header><!-- #masthead -->
	<?php do_action( 'generate_after_header' ); ?>





<?php if ( is_front_page() ) { ?>
<div class="slider-outer-container">

<?php
// Image slider frontpage
$images = get_field('slider-images');

if( $images ): ?>
    <div class="slider">
            <?php foreach( $images as $image ): ?>

	<div class="fp-slick-container" style="background-image: url('<?php echo $image['url']; ?>');"></div>


            <?php endforeach; ?>
    </div>
<?php endif; ?>



<div class="frontpage-heading-container">
	<div class="slider-box">
		<h1>
			<span class="slider-box-headline-up"><?php the_field('slider-text-up');?></span>
			<span class="slider-box-headline-down"><?php the_field('slider-text-down');?></span>
		</h1>
		<div class="slider-button"><a href="http://rejseide.dk/om/"><?php the_field('slider-button');?></a></div>
	</div>
</div>
</div>
<?php } ?>




	<div id="page" class="hfeed site grid-container container grid-parent">
		<div id="content" class="site-content">
			<?php do_action('generate_inside_container'); ?>
