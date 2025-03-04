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
        <a href="<?php the_permalink(); ?>" class="btn"><?php _e('tovább a termékhez', 'muszerautomatika-theme'); ?></a>
    </div>
</article>