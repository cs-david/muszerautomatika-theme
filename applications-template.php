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
                    <figure>
                        <?php the_post_thumbnail('full', array('class' => 'full-img')); ?>
                    </figure>
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

                        <div class="app-section" id="<?php echo esc_html($foa_term->slug); ?>">
                            <div class="wrap-wide <?php echo ($foa_order % 2 == 1) ? 'wrap-reverse' : ''; ?>">
                                <div class="wrap">
                                    <div class="app-img">
                                        <figure>
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        </figure>
                                    </div>
                                    <div class="app-text">
                                        <h3 class="ul-dots"><?php echo esc_html($foa_term->name); ?></h3>
                                        <p><?php echo esc_html($foa_term->description); ?></p>
                                        <a href="<?php echo esc_url(get_term_link($foa_term)); ?>" class="btn"><?php echo esc_html(__('kapcsolódó termékek', 'muszerautomatika-theme')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>

						<?php }

					} else {
                        echo '<p>' . esc_html__('Nincsenek elérhető kategóriák.', 'muszerautomatika-theme') . '</p>';
					}
					?>

            <?php if (get_field("contact_form_type") != "disabled") {
                    include_once(get_template_directory() . '/contact-form-section.php');
                } ?>
        
        </article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
