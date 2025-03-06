<?php
/**
 * Template part for displaying content in single-termek.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Műszer_Automatika_Sablon
 */

?>

<section class="product-list-section product-list-section-reverse">
    <div class="wrap">
        <div class="product-cols product-col-1">
            <div class="category-filters">
            <h2 class="screen-reader-text"><?php _e('Kategória szűrők', 'muszerautomatika-theme'); ?></h2>
            <h3 class="ul-dots"><?php _e('Termékkategóriák', 'muszerautomatika-theme'); ?></h3>
            <?php
            $taxonomy = 'termek_kategoria';
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
                'meta_key' => 'cat_order',
                'orderby'  => 'meta_value_num',
                'order'    => 'ASC'
            ));

            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<ul class="product-categories fancy-anchor">';
                echo '<li><a class="all-products" href="' . esc_url(home_url("/termekek")) . '">' . __('Összes termék', 'muszerautomatika-theme') . '</a></li>';
                foreach ($terms as $term) {
                    $active_class = has_term($term->term_id, $taxonomy) ? 'active-list-item cat-open' : '';
                    if ($term->parent == 0) {
                        $child_terms = get_terms(array(
                            'taxonomy' => $taxonomy,
                            'hide_empty' => false,
                            'parent' => $term->term_id,
                            'meta_key' => 'cat_order',
                            'orderby'  => 'meta_value_num',
                            'order'    => 'ASC'
                        ));
                        $has_subcat_class = !empty($child_terms) && !is_wp_error($child_terms) ? 'has_subcat' : '';
                        echo '<li class="' . $active_class . ' ' . $has_subcat_class . '"><a href="' . get_term_link($term) . '">' . $term->name . '</a>';
                        if (!empty($child_terms) && !is_wp_error($child_terms)) {
                            echo '<button aria-label="Alkategória megjelenítés és elrejtés" class="expand-collapse-btn"><i class="fa-solid fa-circle-arrow-down"></i></button>';
                        }
                        if (!empty($child_terms) && !is_wp_error($child_terms)) {
                            echo '<ul class="sub-categories">';
                            foreach ($child_terms as $child_term) {
                                $child_active_class = has_term($child_term->term_id, $taxonomy) ? 'active-list-item' : '';
                                echo '<li class="' . $child_active_class . '"><a href="' . get_term_link($child_term) . '">' . $child_term->name . '</a></li>';
                            }
                            echo '</ul>';
                        }
                        echo '</li>';
                    }
                }
                echo '</ul>';
            }
            ?>
            </div>
        </div>
        <div class="product-cols product-col-2">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_title( '<h1 class="product-name">', '</h1>' ); ?>
                <div class="product-head">
                    <div class="product-card-img">

                            <?php if(has_post_thumbnail()) :
                                
                            $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" )[0]; ?>
                            <img src="<?php echo $thumbnail; ?>" alt="<?php _e('termék fotó - kiemelt kép', 'muszerautomatika-theme'); ?>" class="featured-img" />
                            <?php else : ?>
                                <div class="placeholder-img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/ma-logo-white.svg" alt="<?php esc_attr_e( 'Műszer automatika szimbolum', 'muszerautomatika-theme' ); ?>"/>
                                </div>
                            <?php endif; ?>
                            <?php if(get_field("atex_label")) : ?>
                                <img class="atex-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/certs/atex-logo.svg" alt="<?php _e('ATEX direktíva szerinti termék', 'muszerautomatika-theme'); ?>"/>
                            <?php endif; ?>

                        <?php if(get_field('product_gallery') != null) : ?>

                        <div class="product-card-gallery">

                            <img src="<?php echo $thumbnail; ?>" alt="<?php _e('termék fotó', 'muszerautomatika-theme'); ?>" class="current-gallery-item" />

                            <?php 

                            $images = get_field('product_gallery');

                            if( $images ): ?>
                                <?php foreach( $images as $image ): ?>
                                    <img src="<?php echo $image['metadata']['full']['file_url']; ?>" alt="<?php _e('termék fotó', 'muszerautomatika-theme'); ?>" />
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>

                        <?php endif; ?>
                    </div>
                    <div class="product-card-content">
                        <?php the_content(); ?>
                        <h2 class="foa-title"><?php _e('Alkalmazási terület:', 'muszerautomatika-theme'); ?></h2>
                        <p>
                        <?php
                        $alkalmazasi_teruletek = get_the_terms(get_the_ID(), 'alkalmazasi_teruletek');
                        if ($alkalmazasi_teruletek && !is_wp_error($alkalmazasi_teruletek)) {
                            $alkalmazasi_teruletek_names = wp_list_pluck($alkalmazasi_teruletek, 'name');
                            echo implode(', ', $alkalmazasi_teruletek_names);
                        }
                        ?>
                        </p>
                        <a href="#contact-form" class="btn red"><?php _e('ajánlatot kérek', 'muszerautomatika-theme'); ?></a>
                    </div>
                </div>
                <div class="accordion-section">
                    <h2 class="accordion-section-header"><i class="fas fa-file-download"></i><?php _e('Letölthető dokumentumok', 'muszerautomatika-theme'); ?><i class="fa-solid fa-circle-arrow-down accordion-arrow"></i></h2>
                    <div class="accordion-section-content">
                    <?php if(get_field('product_tech_sheets')) : ?>
                    <h3 class="dl-subheading"><?php _e('Műszaki adatlapok', 'muszerautomatika-theme'); ?></h3>
                    <ul class="fancy-anchor">
                        <?php 
                        $tech_sheets = get_field('product_tech_sheets');
                        if ($tech_sheets) {
                            $tech_sheets_array = explode("\n", $tech_sheets);
                            foreach ($tech_sheets_array as $sheet) {
                                list($text, $href) = explode('|', $sheet);
                                echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                            }
                        }
                        ?>
                        </ul>
                        <?php endif; ?>
                        <?php if(get_field('product_manuals')) : ?>
                        <h3 class="dl-subheading"><?php _e('Műszerkönyvek', 'muszerautomatika-theme'); ?></h3>
                        <ul class="fancy-anchor">
                            <?php 
                            $product_manuals = get_field('product_manuals');
                            if ($product_manuals) {
                                $product_manuals_array = explode("\n", $product_manuals);
                                foreach ($product_manuals_array as $manual) {
                                    list($text, $href) = explode('|', $manual);
                                    echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <?php endif; ?>
                        <?php if(get_field('product_licences')) : ?>
                        <h3 class="dl-subheading"><?php _e('Engedélyek', 'muszerautomatika-theme'); ?></h3>
                        <ul class="fancy-anchor">
                            <?php 
                            $product_licences = get_field('product_licences');
                            if ($product_licences) {
                                $product_licences_array = explode("\n", $product_licences);
                                foreach ($product_licences_array as $licence) {
                                    list($text, $href) = explode('|', $licence);
                                    echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <?php endif; ?>
                        <?php if(get_field('product_installation_doc')) : ?>
                        <h3 class="dl-subheading"><?php _e('Telepítési vázlatok', 'muszerautomatika-theme'); ?></h3>
                        <ul class="fancy-anchor">
                            <?php 
                            $product_installation_doc = get_field('product_installation_doc');
                            if ($product_installation_doc) {
                                $product_installation_doc_array = explode("\n", $product_installation_doc);
                                foreach ($product_installation_doc_array as $doc) {
                                    list($text, $href) = explode('|', $doc);
                                    echo '<li><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
                <?php
                    $related_products = get_field('related_products');
                    if( $related_products ): ?>
                    <div class="related-products">
                        <h2 class="ul-dots"><i class="fa-solid fa-link"></i><?php _e('Kapcsolódó termékek', 'muszerautomatika-theme'); ?></h2>
                        <div class="related-cards">
                        <?php foreach( $related_products as $post ): 

                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post); ?>

                            <article class="related-card">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if(has_post_thumbnail()) :
                                    
                                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" )[0]; ?>
                                    <img src="<?php echo $thumbnail; ?>" alt="<?php _e('termék fotó - kiemelt kép', 'muszerautomatika-theme'); ?>" class="featured-img" />
                                    <?php else : ?>
                                        <div class="placeholder-img">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/ma-logo-white.svg" alt="<?php esc_attr_e( 'Műszer automatika szimbolum', 'muszerautomatika-theme' ); ?>"/>
                                        </div>
                                    <?php endif; ?>
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </article>
                        <?php endforeach; ?>
                        </div></div>
                        <?php 
                        // Reset the global post object so that the rest of the page works correctly.
                        wp_reset_postdata(); ?>
                <?php endif; ?>
        </div>
    </div>
</section>

	<?php if (get_field("contact_form_type") != "disabled") {
			include_once(get_template_directory() . '/contact-form-section.php');
        } ?>

