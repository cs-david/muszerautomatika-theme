<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Műszer_Automatika_Sablon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="hero featured-img-section">
		<div class="wrap-wide">
			<figure>
				<?php the_post_thumbnail('full', array('class' => 'full-img')); ?>
			</figure>
		</div>
	</section>
	<section class="content-section">
		<div class="wrap-narrow">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php the_content(); ?>
		</div>
	</section>
	<?php if (get_field("contact_form_type") != "disabled") {
			include_once(get_template_directory() . '/contact-form-section.php');
        } ?>

</article><!-- #post-<?php the_ID(); ?> -->
