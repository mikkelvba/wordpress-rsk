<?php
/**
 *
 * Template Name: Gallery Page
 *
 * @package GeneratePress
 */

// No direct access, please

if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

	<section id="primary" <?php generate_content_class(); ?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>
		<?php

    $args = array('post_type' => 'gallery', 'post_per_page' => 3);
    $loop = new WP_Query( $args );

    if ( $loop->have_posts() ) : ?>

			<div class="container">

		    <div class="row">

	        <div class="col-lg-12">
            <h2 class="page-header">Galleri</h2>
	        </div>


					<ul>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', 'gallery' );
							?>
						<?php endwhile; ?>
					</ul>



				</div>
			</div>



			<?php generate_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
do_action('generate_sidebars');
get_footer();
