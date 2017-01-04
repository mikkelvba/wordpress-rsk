<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package GeneratePress
 */
?>






    </div><!-- #content -->
</div><!-- #page -->

  <div class="hidden-xs hidden-sm hidden-md container">
      <div class="row">
            <div class="instagram__footer">
              <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="instagram__item instagram__item--center">
                  <a href="https://www.facebook.com/randerssportsdykkerklub/" target="_blank"><img src="http://rejseide.dk/wp-content/uploads/2016/12/facebook.png"><?php the_field('instagram-grid-1-4', 'option'); ?></a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="instagram__item insta-img" style="background-image: url(<?php the_field('instagram-grid-2-4', 'option'); ?>);">
                  <a href="https://www.instagram.com/"></a>
                </div>
              </div>
              <div class="col-xs-12 col-xs-6 col-md-3">
                <div class="instagram__item insta-img" style="background-image: url(<?php the_field('instagram-grid-3-4', 'option'); ?>);">
                  <a href="https://www.instagram.com/"></a>
                </div>
              </div>
              <div class="col-xs-12 col-xs-6 col-md-3">
                <div class="instagram__item insta-text">
                        <?php the_field('instagram-grid-4-4', 'option'); ?>
                </div>
            </div>
      </div>
  </div>
</div>


<?php do_action('generate_before_footer'); ?>
<div <?php generate_footer_class(); ?>>
    <?php
    do_action('generate_before_footer_content');

    // Get how many widgets to show
    $widgets = generate_get_footer_widgets();

    if (!empty($widgets) && 0 !== $widgets) :
        // Set up the widget width
        $widget_width = '';
        if ($widgets == 1) {
            $widget_width = '100';
        }
        if ($widgets == 2) {
            $widget_width = '50';
        }
        if ($widgets == 3) {
            $widget_width = '33';
        }
        if ($widgets == 4) {
            $widget_width = '25';
        }
        if ($widgets == 5) {
            $widget_width = '20';
        }
        ?>
        <div id="footer-widgets" class="site footer-widgets">
            <div class="inside-footer-widgets grid-container grid-parent">
                <?php if ($widgets >= 1) : ?>
                    <div class="footer-widget-1 grid-parent grid-<?php echo apply_filters('generate_footer_widget_1_width', $widget_width); ?> tablet-grid-<?php echo apply_filters('generate_footer_widget_1_tablet_width', '50'); ?>">
                        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1')) : ?>
                            <aside class="widget inner-padding widget_text">
                                <h4 class="widget-title"><?php _e('Footer Widget 1', 'generate');?></h4>
                                <div class="textwidget">
                                    <p><?php printf(__('Replace this widget content by going to <a href="%1$s"><strong>Appearance / Widgets</strong></a> and dragging widgets into Footer Area 1.', 'generate'), admin_url('widgets.php')); ?></p>
                                    <p><?php printf(__('To remove or choose the number of footer widgets, go to <a href="%1$s"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.', 'generate'), admin_url('customize.php')); ?></p>
                                </div>
                            </aside>
                        <?php endif; ?>
                    </div>
                <?php endif;

if ($widgets >= 2) : ?>
                <div class="footer-widget-2 grid-parent grid-<?php echo apply_filters('generate_footer_widget_2_width', $widget_width); ?> tablet-grid-<?php echo apply_filters('generate_footer_widget_2_tablet_width', '50'); ?>">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2')) : ?>
                        <aside class="widget inner-padding widget_text">
                            <h4 class="widget-title"><?php _e('Footer Widget 2', 'generate');?></h4>
                            <div class="textwidget">
                                <p><?php printf(__('Replace this widget content by going to <a href="%1$s"><strong>Appearance / Widgets</strong></a> and dragging widgets into Footer Area 2.', 'generate'), admin_url('widgets.php')); ?></p>
                                <p><?php printf(__('To remove or choose the number of footer widgets, go to <a href="%1$s"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.', 'generate'), admin_url('customize.php')); ?></p>
                            </div>
                        </aside>
                    <?php endif; ?>
                </div>
                <?php                 endif;

if ($widgets >= 3) : ?>
                <div class="footer-widget-3 grid-parent grid-<?php echo apply_filters('generate_footer_widget_3_width', $widget_width); ?> tablet-grid-<?php echo apply_filters('generate_footer_widget_3_tablet_width', '50'); ?>">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3')) : ?>
                        <aside class="widget inner-padding widget_text">
                            <h4 class="widget-title"><?php _e('Footer Widget 3', 'generate');?></h4>
                            <div class="textwidget">
                                <p><?php printf(__('Replace this widget content by going to <a href="%1$s"><strong>Appearance / Widgets</strong></a> and dragging widgets into Footer Area 3.', 'generate'), admin_url('widgets.php')); ?></p>
                                <p><?php printf(__('To remove or choose the number of footer widgets, go to <a href="%1$s"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.', 'generate'), admin_url('customize.php')); ?></p>
                            </div>
                        </aside>
                    <?php endif; ?>
                </div>
                <?php                 endif;

if ($widgets >= 4) : ?>
                <div class="footer-widget-4 grid-parent grid-<?php echo apply_filters('generate_footer_widget_4_width', $widget_width); ?> tablet-grid-<?php echo apply_filters('generate_footer_widget_4_tablet_width', '50'); ?>">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-4')) : ?>
                        <aside class="widget inner-padding widget_text">
                            <h4 class="widget-title"><?php _e('Footer Widget 4', 'generate');?></h4>
                            <div class="textwidget">
                                <p><?php printf(__('Replace this widget content by going to <a href="%1$s"><strong>Appearance / Widgets</strong></a> and dragging widgets into Footer Area 4.', 'generate'), admin_url('widgets.php')); ?></p>
                                <p><?php printf(__('To remove or choose the number of footer widgets, go to <a href="%1$s"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.', 'generate'), admin_url('customize.php')); ?></p>
                            </div>
                        </aside>
                    <?php endif; ?>
                </div>
                <?php                 endif;

if ($widgets >= 5) : ?>
                <div class="footer-widget-5 grid-parent grid-<?php echo apply_filters('generate_footer_widget_5_width', $widget_width); ?> tablet-grid-<?php echo apply_filters('generate_footer_widget_5_tablet_width', '50'); ?>">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-5')) : ?>
                        <aside class="widget inner-padding widget_text">
                            <h4 class="widget-title"><?php _e('Footer Widget 5', 'generate');?></h4>
                            <div class="textwidget">
                                <p><?php printf(__('Replace this widget content by going to <a href="%1$s"><strong>Appearance / Widgets</strong></a> and dragging widgets into Footer Area 5.', 'generate'), admin_url('widgets.php')); ?></p>
                                <p><?php printf(__('To remove or choose the number of footer widgets, go to <a href="%1$s"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.', 'generate'), admin_url('customize.php')); ?></p>
                            </div>
                        </aside>
                    <?php endif; ?>
                </div>
                <?php                 endif; ?>
            </div>
        </div>
    <?php
    endif;
    do_action('generate_after_footer_widgets');
    ?>
    <footer class="site-info" itemtype="http://schema.org/WPFooter" itemscope="itemscope">
        <div class="inside-site-info grid-container grid-parent">
            <?php do_action('generate_credits'); ?>
        </div>
    </footer><!-- .site-info -->
    <?php do_action('generate_after_footer_content'); ?>
</div><!-- .site-footer -->

<?php wp_footer(); ?>

</body>
</html>
