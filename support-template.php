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
                <h1><?php the_title(); ?></h1>
                <h2><?php _e('LETÖLTHETŐ DOKUMENTUMOK', 'muszerautomatika-theme'); ?></h2>
                    <?php
                        $args = array(
                            'post_type' => 'termek',
                            'posts_per_page' => -1
                        );
                        $termek_query = new WP_Query($args);?>

                    <div class="accordion-section">
                        <h3 class="accordion-section-header"><i class="fas fa-file-download"></i><?php _e('Műszaki Adatlapok', 'muszerautomatika-theme'); ?><i class="fa-solid fa-circle-arrow-down accordion-arrow"></i></h3>
                        <div class="accordion-section-content">
                            <ul class="fancy-anchor"> 

                            <?php if ($termek_query->have_posts()) :
                                while ($termek_query->have_posts()) : $termek_query->the_post(); 

                                    $tech_sheets = get_field('product_tech_sheets');
                                    if ($tech_sheets) {
                                        $tech_sheets_array = explode("\n", $tech_sheets);
                                        foreach ($tech_sheets_array as $sheet) {
                                            list($text, $href) = explode('|', $sheet);
                                            if (!isset($seen_hrefs[$href])) {
                                                echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                                $seen_hrefs[$href] = true;
                                            }                                    }
                                    } 
                                endwhile;
                                wp_reset_postdata();
                                endif;
                            ?>
                            </ul>
                        </div>
                    </div>
                            
                    <div class="accordion-section">
                        <h3 class="accordion-section-header"><i class="fas fa-file-download"></i><?php _e('Felhasználói kézikönyvek', 'muszerautomatika-theme'); ?><i class="fa-solid fa-circle-arrow-down accordion-arrow"></i></h3>
                        <div class="accordion-section-content">
                            <ul class="fancy-anchor">
                            
                            <?php if ($termek_query->have_posts()) :
                                while ($termek_query->have_posts()) : $termek_query->the_post(); 

                                    $product_manuals = get_field('product_manuals');

                                    if ($product_manuals) {
                                        $product_manuals_array = explode("\n", $product_manuals);;
                                        foreach ($product_manuals_array as $manual) {
                                            list($text, $href) = explode('|', $manual);
                                            if (!isset($seen_hrefs[$href])) {
                                                echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                                $seen_hrefs[$href] = true;
                                            }
                                        }
                                    }
                                endwhile;
                                wp_reset_postdata();
                                endif;
                            ?>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="accordion-section">
                        <h3 class="accordion-section-header"><i class="fas fa-file-download"></i><?php _e('Engedélyek', 'muszerautomatika-theme'); ?><i class="fa-solid fa-circle-arrow-down accordion-arrow"></i></h3>
                        <div class="accordion-section-content">
                            <ul class="fancy-anchor"> 
                                    
                            <?php if ($termek_query->have_posts()) :
                                while ($termek_query->have_posts()) : $termek_query->the_post(); 

                                    $product_licences = get_field('product_licences');
                                    if ($product_licences) {
                                        $product_licences_array = explode("\n", $product_licences);
                                        foreach ($product_licences_array as $licence) {
                                            list($text, $href) = explode('|', $licence);
                                            if (!isset($seen_hrefs[$href])) {
                                                echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                                $seen_hrefs[$href] = true;
                                            }                                    }
                                    }
                                endwhile;
                                wp_reset_postdata();
                                endif;
                            ?>        
                            </ul>
                        </div>
                    </div>
                            
                    <div class="accordion-section">
                        <h3 class="accordion-section-header"><i class="fas fa-file-download"></i><?php _e('Telepítési segédletek', 'muszerautomatika-theme'); ?><i class="fa-solid fa-circle-arrow-down accordion-arrow"></i></h3>
                        <div class="accordion-section-content">
                            <ul class="fancy-anchor"> 
                                    
                            <?php if ($termek_query->have_posts()) :
                                while ($termek_query->have_posts()) : $termek_query->the_post(); 

                                    $product_installation_doc = get_field('product_installation_doc');
                                    if ($product_installation_doc) {
                                        $product_installation_doc_array = explode("\n", $product_installation_doc);
                                        foreach ($product_installation_doc_array as $doc) {
                                            list($text, $href) = explode('|', $doc);
                                            if (!isset($seen_hrefs[$href])) {
                                                echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                                $seen_hrefs[$href] = true;
                                            }                                    }
                                    }
                                endwhile;
                                wp_reset_postdata();
                                endif;
                            ?>        
                            </ul>
                        </div>
                    </div>

                    <div class="accordion-section">
                        <h3 class="accordion-section-header"><i class="fas fa-file-download"></i><?php echo get_field('other_accordion_heading') ?><i class="fa-solid fa-circle-arrow-down accordion-arrow"></i></h3>
                        <div class="accordion-section-content">
                            <ul class="fancy-anchor">
                                <?php 
                                $misc_docs = get_field('misc_docs');
                                if ($misc_docs) {
                                    $misc_docs_array = explode("\n", $misc_docs);
                                    foreach ($misc_docs_array as $misc_doc) {
                                        list($text, $href) = explode('|', $misc_doc);
                                        if (!isset($seen_hrefs[$href])) {
                                            echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                            $seen_hrefs[$href] = true;
                                        }                                    }
                                } ?>
                            </ul>
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
