<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Műszer_Automatika_Sablon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top" >
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Ugrás a tartalomhoz', 'muszerautomatika-theme' ); ?></a>
	<header id="masthead" class="sticky-header site-header">
        <div class="wrap">
            <nav class="top-nav" id="top-nav">
				<?php if ( is_front_page() && is_home() ) : ?>
				<a class="header-logo" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1 class="site-title"><?php _e( 'Gáz és oldószergőz', 'muszerautomatika-theme' ); ?><br> <span><?php _e( 'érzékelő készülékek', 'muszerautomatika-theme' ); ?></span></h1><p class="ma-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ma-logo.svg" alt="<?php esc_attr_e( 'Műszer automatika szimbolum', 'muszerautomatika-theme' ); ?>"/> <?php _e( 'Műszer Automatika Kft.', 'muszerautomatika-theme' ); ?></p></a>
                <?php else : ?>
				<a class="header-logo" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><p class="site-title"><?php _e( 'Gáz és oldószergőz', 'muszerautomatika-theme' ); ?><br> <span><?php _e( 'érzékelő készülékek', 'muszerautomatika-theme' ); ?></span></p><p class="ma-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/ma-logo.svg" alt="<?php esc_attr_e( 'Műszer automatika szimbolum', 'muszerautomatika-theme' ); ?>"/> <?php _e( 'Műszer Automatika Kft.', 'muszerautomatika-theme' ); ?></p></a>
				<?php endif; ?>
				<div class="header-right">
                    <div class="header-right-top">
						<div class="info-line"><?php esc_html_e( 'Gázérzékelőkkel kapcsolatos tájékoztatás:', 'muszerautomatika-theme' ); ?> <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', get_theme_mod('info_phone', '+36-20/359-9316')); ?>"><?php echo get_theme_mod('info_phone', '+36-20/359-9316'); ?></a></div>
						<?php do_action('wpml_add_language_selector'); ?>
                    </div>
                    <div class="header-right-bottom">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'main-menu-list',
								'container_class' => 'main-menu',
								'walker' => new Custom_Walker_Nav_Menu()
							)
						);
						?>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'social-links-list',
								'container_class' => 'social-links',
							)
						);
						?>          
                    </div>
                </div>
				<button class="mobile-menu-trigger" id="menu-trigger" aria-controls="top-nav" aria-expanded="false">
					<span class="screen-reader-text"><?php esc_html_e( 'Mobil menü megnyitása', 'muszerautomatika-theme' ); ?></span>
					<i class="fa fa-bars"></i>
				</button>
            </nav>
        </div>
    </header>
	<a class="jump-to-top" href="#top" role=button aria-hidden="true" aria-label="<?php _e( 'Ugrás az oldal tetejére', 'muszerautomatika-theme' ); ?>"><i class="fa-solid fa-chevron-up"></i></a>
	<?php if((get_field('floating_cta') == "true") && !is_archive()) : ?>
        <a class="fixed-offer-btn" href="#contact-form"><?php the_field('floating_cta_label'); ?></a>
    <?php endif; ?>
