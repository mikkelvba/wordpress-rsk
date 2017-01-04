<?php
/**
 * @package GeneratePress
 */

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<li class="col-lg-3 col-md-4 col-xs-6 thumb gallery__image">

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
        <?php if ( has_post_thumbnail() ) { ?>
            <a class="grid-hover" data-lightbox="<?php esc_html__( the_title(), '', '' ); ?>" data-title="<?php esc_html__( the_title(), '', '' ); ?>" href="<?php the_post_thumbnail_url(); ?>">
              <?php the_post_thumbnail('misc-thumb'); ?>
            </a>
        <?php } ?>

        <section class="grid-post-header">
            <h4>
              <a data-lightbox="<?php esc_html__( the_title(), '', '' ); ?>" data-title="<?php esc_html__( the_title(), '', '' ); ?>" href="<?php esc_url( the_permalink() ); ?>"><?php esc_html__( the_title(), '', '' ); ?></a>
            </h4>
        </section>

    </article>

</li>
