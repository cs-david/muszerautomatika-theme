<?php
/**
 * Template Name: Bemutatokozás
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Műszer_Automatika_Sablon
 */

get_header();
?>

	<?php if(get_field('floating_cta') == "true") : ?>
        <a class="fixed-offer-btn" href="#contact-form"><?php the_field('floating_cta_label'); ?></a>
    <?php endif; ?>
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
                <div class="wrap-narrow">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <?php the_content(); ?>
                </div>
            </section>
            <section class="services-section">
                <div class="wrap-narrow">
                    <div class="service-subsection" id="dev">
                        <div class="service-subsection-img">
                            <?php $image_dev = get_field('dev_img');
                            if (is_array($image_dev)) {
                                echo '<img src="'. esc_url($image_dev['url']) . '" alt="' . esc_attr($image_dev['alt']) . '"/>';
                            } ?>
                        </div>
                        <div class="services">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon-development.svg" alt="<?php _e('ceruza és vonalzó ikon', 'muszerautomatika-theme'); ?>"><h3><?php _e('Fejlesztés', 'muszerautomatika-theme'); ?></h3>
                        </div>
                        <?php the_field("dev_desc"); ?>
                    </div>
                    <div class="service-subsection" id="manu">
                        <div class="service-subsection-img">
                            <?php $image_manu = get_field('manu_img');
                            if (is_array($image_manu)) {
                                echo '<img src="'. esc_url($image_manu['url']) . '" alt="' . esc_attr($image_manu['alt']) . '"/>';
                            } ?>
                        </div>
                        <div class="services">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon-manufacturing.svg" alt="<?php _e('fogaskerék ikon', 'muszerautomatika-theme'); ?>"><h3><?php _e('Gyártás', 'muszerautomatika-theme'); ?></h3>
                        </div>
                        <?php the_field("manu_desc"); ?>
                    </div>
                    <div class="service-subsection" id="service">
                        <div class="service-subsection-img">
                        <?php $image_service = get_field('service_img');
                            if (is_array($image_service)) {
                                echo '<img src="'. esc_url($image_service['url']) . '" alt="' . esc_attr($image_service['alt']) . '"/>';
                            } ?>
                        </div>
                        <div class="services">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/icon-service.svg" alt="<?php _e('csavarkulcs ikon', 'muszerautomatika-theme'); ?>"><h3><?php _e('Szakszerviz szolgáltatás', 'muszerautomatika-theme'); ?></h3>
                        </div>
                        <?php the_field("service_desc"); ?>
                    </div>
                </div>
            </section>
            <?php if (get_field("contact_form_type") != "disabled") {
                    include_once(get_template_directory() . '/contact-form-section.php');
                } ?>

            <?php include_once('landing-link-section.php'); ?>
        
        </article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
