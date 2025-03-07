<?php
/**
 * Template Name: Alkalmazások
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
                                        "terms" => "foa"
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
            <section class="content-section">
                <div class="wrap">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <?php the_content(); ?>
                </div>
            </section>
            <section class="app-sections">

            <?php
					$foa_page_terms = get_terms(array(
						'taxonomy'   => 'alkalmazasi_teruletek', // Your custom taxonomy name
						'hide_empty' => false, // Show even empty categories
						'parent'     => 0,
                        'meta_key' => 'foa_order',
                        'orderby'  => 'meta_value_num',
                        'order'    => 'ASC'
					));

					if (!empty($foa_page_terms) && !is_wp_error($foa_page_terms)) {

						foreach ($foa_page_terms as $foa_term) { 
                            
                            $image = get_field('foa_img', $foa_term);
                            $foa_order = get_field('foa_order', $foa_term);                  
                        
                        ?>

                        <div class="app-section" id="<?php echo 'foa-' . esc_html($foa_order); ?>">
                            <div class="wrap-wide <?php echo ($foa_order % 2 == 1) ? 'wrap-reverse' : ''; ?>">
                                <div class="wrap">
                                    <div class="app-img">
                                        <figure>
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        </figure>
                                    </div>
                                    <div class="app-text">
                                        <h2 class="ul-dots"><?php echo esc_html($foa_term->name); ?></h2>
                                        <p><?php echo esc_html($foa_term->description); ?></p>
                                        <?php if (ICL_LANGUAGE_CODE !== 'en') { ?>
                                        <a href="<?php echo esc_url(get_term_link($foa_term)); ?>" class="btn"><?php echo esc_html(__('kapcsolódó termékek', 'muszerautomatika-theme')); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

						<?php }

					} else {
                        echo '<p>' . esc_html__('Nincsenek elérhető kategóriák.', 'muszerautomatika-theme') . '</p>';
					}
					?>

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
