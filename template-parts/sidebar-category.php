<div class="category-filters">
    <div class="searchbox">
    <?php get_search_form(); ?>
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
    <h4 class="ul-dots"><?php _e('Szűrés alkalmazási terület szerint', 'muszerautomatika-theme'); ?></h4>
    <?php
    $alkalmazasi_teruletek = get_terms(array(
        'taxonomy' => 'alkalmazasi_teruletek',
        'hide_empty' => false,
        'meta_key' => 'foa_order',
        'orderby'  => 'meta_value_num',
        'order'    => 'ASC'
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