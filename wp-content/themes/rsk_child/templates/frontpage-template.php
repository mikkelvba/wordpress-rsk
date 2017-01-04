<?php
/**
 *
 * Template Name: Frontpage
 *
 * @package GeneratePress
 */
 
// No direct access, please

if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>
   
   
    <div id="primary" <?php generate_content_class();?>>
        <main id="main" <?php generate_main_class(); ?>>
               
               
               
               
               
                <div class="container tre-box-frontpage">
                    <div class="row">
                        <a href="<?php the_field('boks_1-3_link'); ?>">
                        <div class="col-xs-12 col-md-4"> 
                            <div style="background-image: url(<?php echo the_field('boks_1-3_baggrund'); ?>)">
                                <h2><?php the_field('boks_1-3_titel'); ?></h2>
                            </div>
                        </div>
                        </a>
                        <a href="<?php the_field('boks_2-3_link'); ?>">
                        <div class="col-xs-12 col-md-4">
                            <div style="background-image: url(<?php echo the_field('boks_2-3_baggrund'); ?>)">
                                <h2><?php the_field('boks_2-3_titel'); ?></h2>
                            </div>
                        </div>
                        </a>
                        <a href="<?php the_field('boks_3-3_link'); ?>">
                        <div class="col-xs-12 col-md-4">
                            <div style="background-image: url(<?php echo the_field('boks_3-3_baggrund'); ?>)">
                                <h2><?php the_field('boks_3-3_titel'); ?></h2>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                
                
                <div class="container news-events-frontpage">
                    <div class="row">
                        <div class="col-xs-12 col-md-6"> 
                            <div>
                                   <div class="calendar-area"><?php
            // Top bar widget area start
            if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Calendar') ) : ?>
                <?php endif; ?>
                </div>
                            </div>
                        </div>
                        <div class="hidden-xs hidden-sm col-xs-12 col-md-6">
                            <div>
                                <h2><?php the_field('news-2-2-title'); ?></h2>
                                <?php the_field('news-frontpage'); ?>
                            </div>
                        </div>
                    </div>
                </div>



        </main>
        <!-- #main -->
        </div>
        <!-- #primary -->

        <?php 
do_action('generate_sidebars');
get_footer();