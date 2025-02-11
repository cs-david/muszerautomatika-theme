<?php
/**
 * The template for displaying product archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Műszer_Automatika_Sablon
 */

get_header(); ?>

    <?php if(get_field('floating_cta', 15)) : ?>
        <a class="fixed-offer-btn" href="#contact-form"><?php the_field('floating_cta_label', 15); ?></a>
    <?php endif; ?>

    <main id="primary">
 <!--        <section class="hero featured-img-section">
            <div class="wrap-wide">
                <div class="owl-carousel">
                        <?php
                        $args = array(
                            'post_type' => 'slides',
                            'posts_per_page' => -1
                        );
                        $slides = new WP_Query($args);
                        if ($slides->have_posts()) :
                            while ($slides->have_posts()) : $slides->the_post(); ?>
                                <figure>
                                    <?php if (has_post_thumbnail()) : ?>
                                        
                                    <?php endif; ?>
                                </figure>
                            <?php endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                  </div>                
            </div>
        </section> -->
        <section class="product-list-intro">
            <div class="wrap">
                <div class="product-cols product-col-1">
                    <h1><?php echo get_the_title(15); ?></h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="118" height="90" viewBox="0 0 118 90" fill="none">
                        <path d="M113.01 0.115601H54.6264C51.3654 0.115601 48.3544 1.82201 46.7239 4.60387C37.6423 20.0977 10.9044 65.7164 0.777042 82.9931C-0.977173 85.9901 1.21863 89.7303 4.73191 89.7303H63.1038C66.3672 89.7303 69.3758 88.0263 71.0063 85.2421C80.3645 69.2774 106.476 24.7294 116.965 6.83366C118.72 3.84148 116.519 0.115601 113.01 0.115601Z" fill="#C41D48"/>
                    </svg>
                </div>
                <div class="product-cols product-col-2">
                    <?php echo get_post(15)->post_content; ?>
                </div>
            </div>
        </section>
        <section class="product-list-section">
            <div class="wrap">
                <div class="product-cols product-col-1">
                    <div class="category-filters">
                        <div class="searchbox">
                            <i class="fa-solid fa-magnifying-glass"></i><input type="text" placeholder="Keresés" class="search-field">
                        </div>
                        <h4 class="ul-dots">Termék kategóriák</h4>
                        <ul class="product-categories fancy-anchor">
                            <li class="active-list-item"><a class="all-products" href="">Összes termék</a></li>
                            <li><a href="">Érzékelők</a></li>
                            <li><a href="">Központi egységek</a></li>
                            <li><a href="">Hang és fényjelzők</a></li>
                            <li><a href="">Hordozható gázérzékelők</a></li>
                            <li><a href="">Kiegészítő egységek</a></li>
                        </ul>
                        <h4 class="ul-dots">Szűrés alkalmazási terület szerint</h4>
                            <ul class="checkbox-list">
                                <li><input type="checkbox" id="app-1" name="app-1" value="app-1"><label for="app-1">Kazánházi földgázérzékelés</label></li>
                                <li><input type="checkbox" id="app-2" name="app-2" value="app-2"><label for="app-2">Garázs szén-monoxid és nitrogén-dioxid érzékelés</label></li>
                                <li><input type="checkbox" id="app-3" name="app-3" value="app-3"><label for="app-3">Technológiai gázérzékelés</label></li>
                                <li><input type="checkbox" id="app-4" name="app-4" value="app-4"><label for="app-4">Lakótéri gázérzékelés</label></li>
                            </ul>
                    </div>
                </div>
                <div class="product-cols product-col-2">
                    <div class="product-card-list">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="product-card-img">
                                <?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" )[0]; ?>
                                <img src="<?php echo $thumbnail; ?>" alt="<?php _e('termék fotó - kiemelt kép', 'muszerautomatika-theme'); ?>" class="featured-img" />
                                <?php if(get_field("atex_label")) : ?>
                                    <img class="atex-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/certs/atex-logo.svg" alt="<?php _e('ATEX direktíva szerinti termék', 'muszerautomatika-theme'); ?>"/>
                                <?php endif; ?>
                            </div>
                            <div class="product-card-content">
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn"><?php _e('tovább a termékhez', 'text-domain'); ?></a>
                            </div>
                        </article>
                    <?php endwhile; else : ?>
                        <p><?php _e('Nincsenek projektek.'); ?></p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php if (get_field("contact_form_type" , 15) != "disabled") {
			include_once(get_template_directory() . '/contact-form-section.php');
        } ?>
   </main>
<?php get_footer(); ?>