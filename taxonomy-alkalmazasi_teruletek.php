<?php
/**
 * The template for displaying archive pages
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
        <section class="product-list-intro">
            <div class="wrap">
                <div class="product-cols product-col-1">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' );?>
                </div>
                <div class="product-cols product-col-2">
                    <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
                </div>
            </div>
        </section>
        <section class="product-list-section">
            <div class="wrap">
                <div class="product-cols product-col-1">

                    <?php get_template_part( 'template-parts/sidebar', 'foa' ); ?>
                
                </div>
                <div class="product-cols product-col-2">
                    <div class="product-card-list">
                    <?php 
                    $args = array(
                        'post_type' => 'termek',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'alkalmazasi_teruletek',
                                'field' => 'term_id',
                                'terms' => get_queried_object_id(),
                            ),
                        ),
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
                        
                        get_template_part( 'template-parts/content', 'termek-loop' );
                    
                    endwhile; else : ?>
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
