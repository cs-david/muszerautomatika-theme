<?php
/**
 * Template Name: Támogatás
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Műszer_Automatika_Sablon
 */

get_header();
?>

	<?php if(get_field('floating_cta')) : ?>
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
            <section class="doc-downloads">
            <div class="wrap">
                <h1><?php _e('LETÖLTHETŐ DOKUMENTUMOK', 'muszerautomatika-theme'); ?></h1>
                    <?php
                        $args = array(
                            'post_type' => 'termek',
                            'posts_per_page' => -1
                        );
                        $termek_query = new WP_Query($args);

                        if ($termek_query->have_posts()) :
                            while ($termek_query->have_posts()) : $termek_query->the_post(); ?>
                            <div class="downloads-subsection">
                                <h3><?php _e('Műszaki Adatlapok', 'muszerautomatika-theme'); ?></h3>
                                <ul class="fancy-anchor"> 
                                <?php
                                $tech_sheets = get_field('product_tech_sheets');
                                if ($tech_sheets) {
                                    $tech_sheets_array = explode('\n', $tech_sheets);
                                    foreach ($tech_sheets_array as $sheet) {
                                        list($text, $href) = explode('|', $sheet);
                                        echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                    }
                                } ?>
                                </ul>
                            </div>
                            <hr />
                            <div class="downloads-subsection">
                                <h3><?php _e('Műszerkönyvek', 'muszerautomatika-theme'); ?></h3>
                                <ul class="fancy-anchor"> 
                                <?php
                                $product_manuals = get_field('product_manuals');
                                if ($product_manuals) {
                                    $product_manuals_array = explode('\n', $product_manuals);
                                    foreach ($product_manuals_array as $manual) {
                                        list($text, $href) = explode('|', $manual);
                                        echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                    }
                                } ?>
                                </ul>
                            </div>
                            <hr />
                            <div class="downloads-subsection">
                                <h3><?php _e('Engedélyek', 'muszerautomatika-theme'); ?></h3>
                                <ul class="fancy-anchor"> 
                                <?php
                                $product_licences = get_field('product_licences');
                                if ($product_licences) {
                                    $product_licences_array = explode("\n", $product_licences);
                                    foreach ($product_licences_array as $licence) {
                                        list($text, $href) = explode('|', $licence);
                                        echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                    }
                                } ?>
                                </ul>
                            </div>
                            <hr />
                            <div class="downloads-subsection">
                                <h3><?php _e('Telepítési vázlatok', 'muszerautomatika-theme'); ?></h3>
                                <ul class="fancy-anchor"> 
                                <?php
                                $product_installation_doc = get_field('product_installation_doc');
                                if ($product_installation_doc) {
                                    $product_installation_doc_array = explode('\n', $product_installation_doc);
                                    foreach ($product_installation_doc_array as $doc) {
                                        list($text, $href) = explode('|', $doc);
                                        echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                    }
                                } ?>
                                </ul>
                            </div>
                            <hr />
                            <?php endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
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
