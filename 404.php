<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Műszer_Automatika_Sablon
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="wrap">
				<header class="page-header">
					<span>404</span>
					<h1 class="page-title"><?php esc_html_e( 'Az oldal nem található.', 'muszerautomatika-theme' ); ?></h1>
				</header><!-- .page-header -->
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
