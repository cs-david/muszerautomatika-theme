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
        <section class="hero featured-img-section">
            <div class="wrap-wide">
                <div class="owl-carousel owl-theme">
                        <?php
                        $args = array(
                            'post_type' => 'slides',
                            'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            "tax_query" => array(
                                array(
                                    "taxonomy" => "megjelenesi-helyek",
                                    "field" => "slug",
                                    "terms" => "product-archive"
                                )
                            )
                        );
                        $slides = new WP_Query($args);
                        if ($slides->have_posts()) :
                            while ($slides->have_posts()) : $slides->the_post(); ?>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="full-img">
                                <?php endif; ?>
                            <?php endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
 
                  </div>
                  <div class="nav-dots">
                    <div class="my-dots"></div>
                    <div class="my-nav"></div>
                </div>                
            </div>
        </section> 
        <section class="product-list-intro">
            <div class="wrap">
                <div class="product-cols product-col-1">
                    <h1><span><?php echo get_the_title(15); ?></span></h1>
                </div>
                <div class="product-cols product-col-2">
                    <?php echo get_post(15)->post_content; ?>
                </div>
            </div>
        </section>
        <section class="product-list-section" id="product-list">
            <div class="wrap">
                <div class="product-cols product-col-1">

                    <?php get_template_part( 'template-parts/sidebar', 'category' ); ?>

                </div>
                <div class="product-cols product-col-2">
                    <div class="product-card-list">
                    <?php
                    $args = array(
                        'post_type' => 'termek',
                        'orderby' => 'menu_order',
                        'order' => 'ASC'
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
                        
                        get_template_part( 'template-parts/content', 'termek-loop' );

                    endwhile; else : ?>
                        <p><?php _e('Nincsenek termékek.'); ?></p>
                    <?php endif; ?>
                    </div>
                    <div class="not-found-message" aria-hidden="true">
                        <i class="fa-solid fa-hand-point-up"></i>
                        <p><?php _e('Nem találhatók a megadott alkalmazási terület(ek)hez kapcsolódó termékek ebben a kategóriában.'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <?php if (get_field("contact_form_type" , 15) != "disabled") {
			include_once(get_template_directory() . '/contact-form-section.php');
        } ?>
   </main>
<?php get_footer(); ?>