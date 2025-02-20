<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Műszer_Automatika_Sablon
 */

 get_header(); ?>

    <?php if(get_field('floating_cta', 15)) : ?>
        <a class="fixed-offer-btn" href="#contact-form"><?php the_field('floating_cta_label', 15); ?></a>
    <?php endif; ?>

	<?php if ( have_posts() ) : ?>

    <main id="primary">
        <section class="product-list-intro">
            <div class="wrap">
                <div class="product-cols product-col-1">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Találatok erre: %s', 'muszerautomatika-theme' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
                </div>
                <div class="product-cols product-col-2">
                </div>
            </div>
        </section>

		<section class="product-list-section">
            <div class="wrap">
                <div class="product-cols product-col-1">
                    
                    <?php get_template_part( 'template-parts/sidebar', 'category' ); ?>

                </div>
                <div class="product-cols product-col-2">
                    <div class="product-card-list">

					<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'termek-loop' );

						endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

                    </div>
                </div>
            </div>
        </section>
		<?php if (get_field("contact_form_type" , 15) != "disabled") {
			include_once(get_template_directory() . '/contact-form-section.php');
        } ?>

	</main><!-- #main -->

<?php
get_footer();
