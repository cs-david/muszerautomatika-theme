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
                    <div class="category-filters">
                        <div class="searchbox">
                            <i class="fa-solid fa-magnifying-glass"></i><input type="text" placeholder="Keresés" class="search-field">
                        </div>
                        <h4 class="ul-dots"><?php _e('Termékkategóriák', 'muszerautomatika-theme'); ?></h4>
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
                            echo '<li class="active-list-item"><a class="all-products" href="' . esc_url(home_url("/termekek")) . '">' . __('Összes termék', 'muszerautomatika-theme') . '</a></li>';
                            foreach ($terms as $term) {
								$active_class = (is_tax($taxonomy, $term->term_id) || (is_tax($taxonomy) && term_is_ancestor_of($term->term_id, get_queried_object()->term_id, $taxonomy))) ? 'active-list-item cat-open' : '';
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
                                        echo '<button class="expand-collapse-btn"><i class="fa-solid fa-circle-arrow-down"></i></button>';
                                    }
                                    if (!empty($child_terms) && !is_wp_error($child_terms)) {
                                        echo '<ul class="sub-categories">';
                                        foreach ($child_terms as $child_term) {
											$child_active_class = (is_tax($taxonomy, $child_term->term_id)) ? 'active-list-item' : '';
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
                        <h4 class="ul-dots">Szűrés alkalmazási terület szerint</h4>
                        <?php
                        $alkalmazasi_teruletek = get_terms(array(
                            'taxonomy' => 'alkalmazasi_teruletek',
                            'hide_empty' => false,
                        ));

                        if (!empty($alkalmazasi_teruletek) && !is_wp_error($alkalmazasi_teruletek)) {
                            echo '<ul class="foa-filter">';
                            foreach ($alkalmazasi_teruletek as $terulet) {
                                echo '<li><input type="checkbox" class="foa-item" id="app-' . $terulet->term_id . '" name="app-' . $terulet->term_id . '" value="' . $terulet->slug . '"><label for="app-' . $terulet->term_id . '">' . $terulet->name . '</label></li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
                <div class="product-cols product-col-2">
                    <div class="product-card-list">
                    <?php
                    $current_taxonomy = get_queried_object()->taxonomy;
                    $args = array(
                        'post_type' => 'termek',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => $current_taxonomy,
                                'field'    => 'term_id',
                                'terms'    => get_queried_object_id(),
                            ),
                        ),
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
                            </div>
                            <div class="product-card-content">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="product-category">
                                    <?php
                                    $terms = get_the_terms($post->ID, 'termek_kategoria');
                                    if ($terms && !is_wp_error($terms)) :
                                        // Sort terms by hierarchy
                                        usort($terms, function($a, $b) {
                                            return ($a->parent === $b->parent) ? 0 : ($a->parent < $b->parent ? -1 : 1);
                                        });

                                        $lowest_level_terms = array();
                                        foreach ($terms as $term) {
                                            $lowest_level_terms[] = $term->name;
                                        }

                                        if (!empty($lowest_level_terms)) {
                                            echo '<span class="category-label">' . implode(' | ', $lowest_level_terms) . '</span>';
                                        }
                                    endif;
                                    ?>
                                </div>
                                <div class="card-excerpt">
                                    <?php the_content(); ?>
                                </div>
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
