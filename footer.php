<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Műszer_Automatika_Sablon
 */

?>

	<footer class="site-footer">
		<h2 class="screen-reader-text"><?php _e('Lábléc', 'muszerautomatika-theme'); ?></h2>
        <div class="footer-top">
            <div class="wrap">
                <div class="footer-col-1">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/ma-logo-white.svg" alt="<?php esc_attr_e( 'Műszer automatika szimbolum', 'muszerautomatika-theme' ); ?>"/>
                    <h3>Műszer<br> Automatika Kft.</h3>
                    <h4><?php echo get_bloginfo( 'description', 'display' ); ?></h4>
                </div>
                <div class="footer-col-2 fancy-anchor">
					<h3 class="fat-footer-titles ul-dots"><?php _e('Termékek', 'muszerautomatika-theme'); ?></h4>
                    <div class="fat-footer-menu">
					<?php
					$product_terms = get_terms(array(
						'taxonomy'   => 'termek_kategoria', // Your custom taxonomy name
						'hide_empty' => false, // Show even empty categories
						'parent'     => 0, // Get only top-level terms (no parent)
						'meta_key' => 'cat_order',
						'orderby'  => 'meta_value_num',
						'order'    => 'ASC'
					));

					if (!empty($product_terms) && !is_wp_error($product_terms)) {
						echo '<ul class="footer-product-cat-list">';
						foreach ($product_terms as $product_term) {
							echo '<li><a href="' . get_term_link($product_term) . '">' . esc_html($product_term->name) . '</a></li>';
						}
						echo '</ul>';
					} else {
						echo '<p>' . esc_html_e('Nincsenek elérhető kategóriák.', 'muszerautomatika-theme') . '</p>';
					}
					?>
                    </div>
                </div>
                <div class="footer-col-3 fancy-anchor">
					<h3 class="fat-footer-titles ul-dots"><?php _e('Alkalmazások', 'muszerautomatika-theme'); ?></h4>
                    <div class="fat-footer-menu">
					<?php
					$foa_terms = get_terms(array(
						'taxonomy'   => 'alkalmazasi_teruletek', // Your custom taxonomy name
						'hide_empty' => false, // Show even empty categories
						'parent'     => 0,
						'meta_key' => 'foa_order',
                        'orderby'  => 'meta_value_num',
                        'order'    => 'ASC'
					));

					if (!empty($foa_terms) && !is_wp_error($foa_terms)) {
						echo '<ul class="footer-foa-list">';
						foreach ($foa_terms as $foa_term) {
							$foa_order = get_term_meta($foa_term->term_id, 'foa_order', true);
							echo '<li><a href="' . esc_url(get_permalink(apply_filters('wpml_object_id', get_page_by_path('gazerzekelo-alkalmazasok')->ID, 'page', true)) . '#foa-' . $foa_order) . '">' . esc_html($foa_term->name) . '</a></li>';
						}
						echo '</ul>';
					} else {
						echo '<p>' . esc_html_e('Nincsenek elérhető kategóriák.', 'muszerautomatika-theme') . '</p>';
					}
					?>
                    </div>
                </div>
                <div class="footer-col-4 fancy-anchor">
					<h3 class="fat-footer-titles ul-dots"><?php _e('Kapcsolat', 'muszerautomatika-theme'); ?></h4>
                    <dl>
                        <dt>info</dt>
                        <dd><a href="tel:<?php echo preg_replace('/[^0-9+]/', '', get_theme_mod('info_phone', '+36-20/359-9316')); ?>"><?php echo get_theme_mod('info_phone', '+36-20/359-9316'); ?></a></dd>
						<dt><?php _e('szakszerviz', 'muszerautomatika-theme'); ?></dt>
                        <dd><a href="tel:<?php echo preg_replace('/[^0-9+]/', '', get_theme_mod('service_phone', '+36-23-416-761')); ?>"><?php echo get_theme_mod('service_phone', '+36-23-416-761'); ?></a></dd>    
                    </dl>
					<a href="<?php echo esc_url(home_url('/kapcsolat')); ?>"><?php _e('további elérhetőségek', 'muszerautomatika-theme'); ?></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="wrap">
				<p class="copyright">© <?php echo date('Y'); ?> - <?php esc_html_e( 'Minden jog fenntartva Műszer Automatika Kft.', 'muszerautomatika-theme' ); ?></p>
				<?php 
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer',
						'menu_id'        => 'footer-menu-list',
						'container_class' => 'footer-menu',
					)
				); ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php if (ICL_LANGUAGE_CODE == 'en') { ?>
	<script>
		const plinks = document.querySelectorAll('.footer-product-cat-list a');
		plinks.forEach(link => {
			link.href = '';
		});
	</script>
	<style>
		.footer-product-cat-list a {
			cursor: not-allowed;
			pointer-events: none;
		}
	</style>
<?php } ?>


<?php wp_footer(); ?>

</body>
</html>
