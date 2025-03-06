<div class="category-filters">
    <h2 class="screen-reader-text"><?php _e('Alkalmazási terület választó', 'muszerautomatika-theme'); ?></h2>

    <h3 class="ul-dots"><?php _e('Alkalmazási területek', 'muszerautomatika-theme'); ?></h3>
    <?php
    $taxonomy = 'alkalmazasi_teruletek';
    $terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
        'meta_key' => 'foa_order',
        'orderby'  => 'meta_value_num',
        'order'    => 'ASC'
    ));

    if (!empty($terms) && !is_wp_error($terms)) {
        echo '<ul class="product-categories fancy-anchor">';
        foreach ($terms as $term) {
            $active_class = (is_tax($taxonomy, $term->term_id)) ? 'active-list-item' : '';
            echo '<li class="' . $active_class . '"><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
        }
        echo '</ul>';
    }
    ?>
</div>