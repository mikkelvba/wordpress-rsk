<?php
/**
 *
 * Template Name: About Page
 *
 * @package GeneratePress
 */
 
// No direct access, please

if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?>>
			<?php do_action('generate_before_main_content'); ?>

            
<div class="container-fluid about-box">
    <div class="row">
        <div class="col-md-6">
            <div class="about-text">
                <h2><?php the_field('about_headline'); ?></h2>
                <?php the_field('about_text'); ?>
            </div>
            <div class="contact-text">
                <h2><?php the_field('contact_headline'); ?></h2>
                <?php the_field('contact_text'); ?>
            </div>

        </div>



        <div class="col-md-6">
            <img src="<?php the_field('about_image'); ?>">
        </div>
    </div>
</div>


<div class="container-fluid about-box">
    <div class="row">
        <div class="col-md-12">
<div class="about-members">
<div class="contact-text">
<h2>Owners and Curators</h2>
</div>
<?php if( have_rows('member_field')): ?>

   <div class="full-list-members">
    <div class="row">
   <?php while( have_rows('member_field')): the_row(); ?>

        <div class="col-md-4">
            <h3><?php the_sub_field('member_name'); ?></h3>
            <p><?php the_sub_field('member_phonenumber'); ?></p>
            <p><?php the_sub_field('member_mail'); ?></p>
        </div>

   <?php endwhile; ?>
    </div>
   </div>

<?php endif; ?>

</div>
</div>
</div>
</div>

            
            

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) : ?>
					<div class="comments-area">
						<?php comments_template(); ?>
					</div>
				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>
			<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();