<?php
/**
 *
 * Template Name: Tilmelding Page
 *
 * @package GeneratePress
 */

// No direct access, please

if (! defined('ABSPATH')) {
    exit;
}

get_header(); ?>

    <div id="primary" <?php generate_content_class();?>>
        <main id="main" <?php generate_main_class(); ?>>
            <?php do_action('generate_before_main_content'); ?>
  <div class="tilmelding">
    <div class="tabPanel-widget">
        <?php if (have_rows('tilmelding_repeater')) : ?>

        <?php while (have_rows('tilmelding_repeater')) :
            the_row();

          // vars
            $title = get_sub_field('sidetitel');
            $headline = get_sub_field('tilmelding_overskrift');
            $text = get_sub_field('tilmelding_tekst');

            ?>

          <label for="<?php echo $title; ?>" tabindex="0"></label>
            <input id="<?php echo $title; ?>" type="radio" name="tabs" checked="true" aria-hidden="true">
          <h2><?php echo $title; ?></h2>
          <div>
            <p><?php echo $text; ?></p>
          </div>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>
  </div>
</div>


<?php
do_action('generate_sidebars');
get_footer();
