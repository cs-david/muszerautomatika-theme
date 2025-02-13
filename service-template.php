<?php
/**
 * Template Name: Szakszerviz
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Műszer_Automatika_Sablon
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <section class="hero featured-img-section">
                <div class="wrap-wide">
                    <figure>
                        <?php the_post_thumbnail('full', array('class' => 'full-img')); ?>
                    </figure>
                </div>
            </section>
            <section class="content-section">
                <div class="wrap">
                    <div class="multi-column-grid">
                        <div class="mc-grid-1">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            <?php the_content(); ?>
                        </div>
                        <div class="mc-grid-2">
                            <div class="cta-bg fancy-anchor">
                                <h3><?php _e('Azonnali információ kérés és hibabejelentés:', 'muszerautomatika-theme'); ?></h3>
                                <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', get_theme_mod('service_phone', '+36-23-416-761')); ?>"><?php echo get_theme_mod('service_phone', '+36-23-416-761'); ?></a>
                            </div>
                        </div>
                        <div class="mc-grid-3">
                            <h3><?php _e('A szakszerviz elérhetőségei:', 'muszerautomatika-theme'); ?></h3>
                            <dl class="contact-list">
                                <dt><?php _e('Postacím:', 'muszerautomatika-theme'); ?></dt>
                                <dd><a href="<?php echo get_theme_mod('sales_address_map'); ?>" target="_blank"><?php echo get_theme_mod('service_address'); ?></a></dd>
                                <dt><?php _e('Postafiók:', 'muszerautomatika-theme'); ?></dt>
                                <dd><?php echo get_theme_mod('service_postbox'); ?></dd>
                                <dt><?php _e('Telefon:', 'muszerautomatika-theme'); ?></dt>
                                <dd><?php 
                                    $phone_numbers = explode(',', get_theme_mod('service_normal_phone', '+36-23-416-761'));
                                    foreach ($phone_numbers as $phone_number) {
                                        $cleaned_phone_number = preg_replace('/[^0-9+]/', '', $phone_number);
                                        echo '<a href="tel:' . $cleaned_phone_number . '">' . $phone_number . '</a><br>';
                                    }
                                    ?></dd>
                                <dt><?php _e('Azonnali információ kérés:', 'muszerautomatika-theme'); ?></dt>
                                <dd><a href="tel:<?php echo preg_replace('/[^0-9+]/', '', get_theme_mod('service_phone', '+36-23-416-761')); ?>"><?php echo get_theme_mod('service_phone', '+36-23-416-761'); ?></a></dd>
                                <dt><?php _e('Fax:', 'muszerautomatika-theme'); ?></dt>
                                <dd><?php echo get_theme_mod('service_fax'); ?></dd>
                                <dt><?php _e('e-mail:', 'muszerautomatika-theme'); ?></dt>
                                <dd><a href="mailto:<?php echo get_theme_mod('service_email'); ?>"><?php echo get_theme_mod('service_email'); ?></a></dd>
                            </dl>
                            <a class="pdf-download" href="h<?php the_field('order_sheet'); ?>"><i class="fas fa-file-download"></i>üzembe helyezési<br> megrendelőlap letöltés</a>
                        </div>
                    </div>
                </div>
            </section>   
            <?php if (get_field("contact_form_type") != "disabled") {
                    include_once(get_template_directory() . '/contact-form-section.php');
                } ?>
        
        </article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
