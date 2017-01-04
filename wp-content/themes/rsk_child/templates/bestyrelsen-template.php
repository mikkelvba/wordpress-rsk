<?php
/**
 *
 * Template Name: Bestyrelsen Page
 *
 * @package GeneratePress
 */

// No direct access, please

if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

  <div id="primary" <?php generate_content_class();?>>
    <main id="main" <?php generate_main_class(); ?>>
      <?php do_action('generate_before_main_content'); ?>
      <div class="row">
          <?php if( have_rows('bestyrelsesmedlem') ): ?>

            <?php while( have_rows('bestyrelsesmedlem') ): the_row();

              // vars
              $title = get_sub_field('board_title');
              $name = get_sub_field('board_name');
              $address = get_sub_field('board_address');
              $zip = get_sub_field('board_zip');
              $city = get_sub_field('board_city');
              $phone = get_sub_field('board_phone');
              $mail = get_sub_field('board_email');
              $image = get_sub_field('board_image');

              ?>
              <div class="col-sm-6 col-md-4" style="height: 300px;">
                <div class="thumbnail text-center">
                  <img class="img-rounded img-responsive" style="max-height: 100px;" alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>">
                  <h4><?php echo $name; ?></h4>
                  <p><?php echo $title; ?></p>
                  <p><?php echo $address; ?></br>
                  <?php echo $zip; ?>, <?php echo $city; ?>
                  <div class="board__contact">
                    <p>
                      E-mail: <a href="mailto: <?php echo $mail; ?>"><?php echo $mail; ?></a></br>
                      Tlf: <a href="tel: <?php echo $phoen; ?>"><?php echo $phone; ?></a>
                    </p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>


          <?php endif; ?>
        </div>
      </div>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
do_action('generate_sidebars');
get_footer();
