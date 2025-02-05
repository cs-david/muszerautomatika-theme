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
        <div class="footer-top">
            <div class="wrap">
                <div class="footer-col-1">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/ma-logo-white.svg" alt="<?php esc_attr_e( 'Műszer automatika szimbolum', 'muszerautomatika-theme' ); ?>"/>
                    <h4>Műszer<br> Automatika Kft.</h4>
                    <h5><?php echo get_bloginfo( 'description', 'display' ); ?></h5>
                </div>
                <div class="footer-col-2 fancy-anchor">
                    <h4 class="fat-footer-titles ul-dots">Termékek</h4>
                    <div class="fat-footer-menu">
                        <a href="">Érzékelők</a>
                        <a href="">Központi egységek</a>
                        <a href="">Hang és fényjelzők</a>
                        <a href="">Hordozható gázérzékelők</a>
                        <a href="">Kiegészítő egységek</a>
                    </div>
                </div>
                <div class="footer-col-3 fancy-anchor">
                    <h4 class="fat-footer-titles ul-dots">Alkalmazások</h4>
                    <div class="fat-footer-menu">
                        <a href="">Kazánházi földgázérzékelés</a>
                        <a href="">Garázs szén-monoxid és nitrogén-dioxid érzékelés</a>
                        <a href="">Technológiai gázérzékelés</a>
                        <a href="">Lakótéri gázérzékelés</a>
                    </div>
                </div>
                <div class="footer-col-4 fancy-anchor">
                    <h4 class="fat-footer-titles ul-dots">Kapcsolat</h4>
                    <dl>
                        <dt>info</dt>
                        <dd><a href="tel:+36203599316">+36-20/359-9316</a></dd>
                        <dt>szakszerviz</dt>
                        <dd><a href="tel:+3623416761">+36-23-416-761</a></dd>    
                    </dl>
                    <a href="kapcsolat.html">további elérhetőségek</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="wrap">
                <p class="copyright"><?php esc_html_e( '© 2024 - Minden jog fenntartva Műszer Automatika Kft.', 'muszerautomatika-theme' ); ?></p>
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


<?php wp_footer(); ?>

</body>
</html>
