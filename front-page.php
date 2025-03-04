<?php
/**
 * The template for displaying Front Page
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

        <section class="hero featured-img-section">
            <div class="wrap-wide">
                <figure>
                    <?php the_post_thumbnail('full', array('class' => 'full-img')); ?>
                </figure>

                <div class="wrap wrap-absolute">
                    <h2><?php the_field('hero_text'); ?></h2>
                </div>
            </div>
        </section>
        <section class="content-section">
            <div class="wrap-narrow">
                <?php the_content(); ?>
                <div class="what-we-do">
                    <div class="services">
                        <a href="<?php echo esc_url(get_permalink(apply_filters('wpml_object_id', get_page_by_path('bemutatkozas')->ID, 'page', true)) . '#dev'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-development.svg"><h3><?php _e('Fejlesztés', 'muszerautomatika-theme'); ?></h3></a>
                    </div>
                    <div class="services">
                        <a href="<?php echo esc_url(get_permalink(apply_filters('wpml_object_id', get_page_by_path('bemutatkozas')->ID, 'page', true)) . '#manu'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-manufacturing.svg"><h3><?php _e('Gyártás', 'muszerautomatika-theme'); ?></h3></a>
                    </div>
                    <div class="services">
                        <a href="<?php echo esc_url(get_permalink(apply_filters('wpml_object_id', get_page_by_path('bemutatkozas')->ID, 'page', true)) . '#service'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-service.svg"><h3><?php _e('Szakszerviz<br> szolgáltatás', 'muszerautomatika-theme'); ?></h3></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="products-home">
            <div class="wrap-narrow">
                <h2 class="ul-dots"><?php _e('Termékeink', 'muszerautomatika-theme'); ?></h2>
                
                <?php
					$product_cat_terms = get_terms(array(
						'taxonomy'   => 'termek_kategoria', // Your custom taxonomy name
						'hide_empty' => false, // Show even empty categories
						'parent'     => 0, // Get only top-level terms (no parent)
                        'meta_key' => 'cat_order',
                        'orderby'  => 'meta_value_num',
                        'order'    => 'ASC'
					));

					if (!empty($product_cat_terms) && !is_wp_error($product_cat_terms)) {
						echo '<div class="product-tiles">';
						foreach ($product_cat_terms as $product_cat_term) {
                            $image = get_field('home_product_img', $product_cat_term);
                            echo '<a href="' . get_term_link($product_cat_term) . '" class="product-tile">';
                            if (is_array($image)) {
                                echo '<figure><img src="'. esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '"/></figure>';
                            }
                            echo '<span>' . esc_html($product_cat_term->name) . '</span>';
                            echo '</a>';
                            echo '<div class="row-break"></div>';
						}
						echo '</div>';
					} else {
						echo '<p>' . esc_html_e('Nincsenek elérhető kategóriák.', 'muszerautomatika-theme') . '</p>';
					}
					?>

            </div>
        </section> 
        <section class="certs">
            <div class="wrap-narrow">
                <img src="<?php echo get_template_directory_uri(); ?>/img/certs/system-certification.svg" alt="System certification logo"/>
                <img src="<?php echo get_template_directory_uri(); ?>/img/certs/atex-logo.svg" alt="Atex logo"/>
                <img src="<?php echo get_template_directory_uri(); ?>/img/certs/CE-logo.svg" alt="CE logo"/>
                <img src="<?php echo get_template_directory_uri(); ?>/img/certs/katasztrofavedelem.png" alt="Katasztrófavédelem logo"/>
                <img src="<?php echo get_template_directory_uri(); ?>/img/certs/BKI-logo.png" alt="BKI logo"/>
                <img src="<?php echo get_template_directory_uri(); ?>/img/certs/EMEI-logo.png" alt="EMEI logo"/>
                <img src="<?php echo get_template_directory_uri(); ?>/img/certs/MKEH-logo.png" alt="MKEH logo"/>
            </div>
        </section>
        <section class="numbers">
            <div class="wrap-wide wrap-reverse">
                <div class="wrap">
                    <h2><?php _e('CÉGÜNK SZÁMOKBAN', 'muszerautomatika-theme'); ?></h2>
                    <div class="numbers-container">
                        <div class="number-tile">
                            <h3><?php 
                                $current_year = date('Y');
                                echo $current_year - 1982; ?>
                            </h3>
                            <p><?php _e('év tapasztalat', 'muszerautomatika-theme'); ?></p>
                        </div>
                        <div class="number-tile">
                            <h3>20000+</h3>
                            <p><?php _e('legyártott gázérzékelő', 'muszerautomatika-theme'); ?></p>
                        </div>
                        <div class="number-tile">
                            <h3>100%</h3>
                            <p><?php _e('magyar tulajdon', 'muszerautomatika-theme'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="applications">
            <div class="wrap">
                <h2 class="ul-dots"><?php _e('Alkalmazási területek', 'muszerautomatika-theme'); ?></h2>
                <div class="application-tiles">
                    <div class="at-rows at-row-1">
                        <a href="<?php echo site_url('/gazerzekelo-alkalmazasok/#kazanhazi-foldgazerzekeles-robbanasvedelem-biogaz-metan-propan-butan-gazveszely'); ?>" class="application-tile">
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/alkalmazas_kazanhaz.png" alt="<?php _e('Kazánház', 'muszerautomatika-theme'); ?>"/>
                            </figure>
                            <h3><span><?php _e('Kazánházi', 'muszerautomatika-theme'); ?></span> <span class="indent-1"><?php _e('földgázérzékelés', 'muszerautomatika-theme'); ?></span></h3>
                        </a>
                        <a href="<?php echo site_url('/gazerzekelo-alkalmazasok/#garazs-szen-monoxid-es-nitrogen-dioxid-erzekeles'); ?>" class="application-tile">
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/alkalmazas_garazs.png" alt="<?php _e('mélygarázs', 'muszerautomatika-theme'); ?>"/>
                            </figure>
                            <h3><span class="indent-2"><?php _e('Garázs szén-monoxid', 'muszerautomatika-theme'); ?></span> <span class="indent-1"><?php _e('és nitrogén-dioxid', 'muszerautomatika-theme'); ?></span> <span><?php _e('érzékelés', 'muszerautomatika-theme'); ?></span></h3>
                        </a>
                    </div>
                    <div class="at-rows at-row-2">
                        <a href="<?php echo site_url('/gazerzekelo-alkalmazasok/#technologiai-gazerzekeles'); ?>" class="application-tile">
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/alkalmazas_tech.png" alt="<?php _e('Gyógyszerek egy futószalagon', 'muszerautomatika-theme'); ?>"/>
                            </figure>
                            <h3><span><?php _e('Technológiai', 'muszerautomatika-theme'); ?></span> <span class="indent-1"><?php _e('gázérzékelés', 'muszerautomatika-theme'); ?></span></h3>
                        </a>
                        <a href="<?php echo site_url('/gazerzekelo-alkalmazasok/#lakoteri-gazerzekeles-szen-monoxid-lakoter-lakas-mergezo-gaz-co-riaszto-riasztas-mergezes'); ?>" class="application-tile">
                            <figure>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/alkalmazas_lakoter.png" alt="<?php _e('Alvó kisgyerek', 'muszerautomatika-theme'); ?>"/>
                            </figure>
                            <h3><span class="indent-1"><?php _e('Lakótéri', 'muszerautomatika-theme'); ?></span> <span><?php _e('gázérzékelés', 'muszerautomatika-theme'); ?></span></h3>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="partners">
            <div class="wrap">
                <h2><?php _e('KIEMELT PARTNEREINK, VEVŐINK:', 'muszerautomatika-theme'); ?></h2>
                <div class="partner-logos">
                    <svg viewBox="0 0 2142 1321"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-mol"></use></svg>
                    <svg viewBox="0 0 472 157"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-bkv"></use></svg>
                    <svg viewBox="0 0 3850 750"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-audi"></use></svg>
                    <svg viewBox="0 0 260 260"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-mercedes"></use></svg>
                    <svg viewBox="0 0 1900 1555"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-opel"></use></svg>
                    <svg viewBox="0 0 496 333"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-suzuki"></use></svg>
                    <svg viewBox="0 0 504 143"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-tesco"></use></svg>
                    <svg viewBox="0 0 293 351"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-aldi"></use></svg>
                    <svg viewBox="0 0 287 287"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-lidl"></use></svg>
                    <svg viewBox="0 0 578 96"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-spar"></use></svg>
                    <svg viewBox="0 0 563 121"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-bosch"></use></svg>
                    <svg viewBox="0 0 365 61"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-strabag"></use></svg>
                    <svg viewBox="0 0 770 147"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-denso"></use></svg>
                    <svg viewBox="0 0 468 147"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-cocacola"></use></svg>
                    <svg viewBox="0 0 379 145"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-pepsi"></use></svg>
                    <svg viewBox="0 0 400 93"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-heineken"></use></svg>
                    <svg viewBox="0 0 787 109"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-rgedeon"></use></svg>
                    <svg viewBox="0 0 266 167"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-egis"></use></svg>
                    <svg viewBox="0 0 551 193"><use xlink:href="<?php echo get_template_directory_uri(); ?>/img/partners/partners-sprite.svg?v=<?php echo time(); ?>#logo-teva"></use></svg>
                </div>
            </div>
        </section>

        <?php if (get_field("contact_form_type") != "disabled") {
            include_once('contact-form-section.php');
        } ?>

        <?php include_once('landing-link-section.php'); ?>

		<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();