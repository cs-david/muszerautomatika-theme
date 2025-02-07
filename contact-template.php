<?php
/**
 * Template Name: Kapcsolat
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Műszer_Automatika_Sablon
 */

get_header();
?>

	<?php if(get_field('floating_cta')) : ?>
        <a class="fixed-offer-btn" href="#contact-form"><?php the_field('floating_cta_label'); ?></a>
    <?php endif; ?>
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <section class="hero featured-img-section">
                <div class="wrap-wide">
                    <figure>
                        <?php the_post_thumbnail('full', array('class' => 'full-img')); ?>
                    </figure>
                </div>
            </section>
            <section class="content-section">
                <div class="wrap">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </div>
            </section>
            <section class="contact-infos">
                <div class="wrap">
                    <div class="contact-info-container">
                        <div>
                        <h3 class="ul-dots">MŰSZER AUTOMATIKA KFT.</h3>
                            <dl class="contact-list">
                            <dt>Postacím:</dt>
                            <dd>2040 Budaörs, Komáromi utca 22.</dd>
                            <dt>Postafiók:</dt>
                            <dd>2040 Budaörs, Pf. 296.</dd>
                            <dt>Telefon:</dt>
                            <dd><a href="tel:+3623365280">(23) 365-280</a>, <a href="tel:+3623414922">(23) 414-922</a>, <a href="tel:+3623414923">(23) 414-923</a></dd>
                            <dt>Fax:</dt>
                            <dd>(23) 365-087</dd>
                            <dt>e-mail:</dt>
                            <dd><a href="mailto:mautom@muszerautomatika.hu">mautom@muszerautomatika.hu</a></dd>
                            </dl>
                        </div>
                        <div>
                        <h3 class="ul-dots">GÁZÉRZÉKELŐ GYÁRTÁS<br> ÉS ÉRTÉKESÍTÉS</h3>
                        <dl class="contact-list">
                            <dt>Postacím:</dt>
                            <dd>2040 Budaörs, Komáromi utca 22.</dd>
                            <dt>Szállítási cím:</dt>
                            <dd>2040 Budaörs, Garibaldi utca 8.</dd>
                            <dt>Postafiók:</dt>
                            <dd>2040 Budaörs, Pf. 296.</dd>
                            <dt>Telefon:</dt>
                            <dd><a href="tel:+3623365152">(23) 365-152</a>, <a href="tel:+3623524152">(23) 524-152</a></dd>
                            <dt>Azonnali információ kérés:</dt>
                            <dd><a href="tel:+36203599316">20/359-9316</a></dd>
                            <dt>Fax:</dt>
                            <dd>(23) 365-087</dd>
                            <dt>e-mail:</dt>
                            <dd><a href="mailto:gaz@muszerautomatika.hu">gaz@muszerautomatika.hu</a></dd>
                        </dl>
                        </div>
                        <div>
                        <h3 class="ul-dots">GÁZÉRZÉKELŐ<br> SZAKSZERVIZ</h3>
                            <dl class="contact-list">
                            <dt>Postacím:</dt>
                            <dd>2040 Budaörs, Komáromi utca 22.</dd>
                            <dt>Postafiók:</dt>
                            <dd>2040 Budaörs, Pf. 296.</dd>
                            <dt>Telefon:</dt>
                            <dd><a href="tel:+3623416761">(23) 416-761</a>, <a href="tel:+36203599332">06-20-359-9332</a></dd>
                            <dt>Azonnali információ kérés:</dt>
                            <dd><a href="tel:+3623416761">06-23-416-761</a></dd>
                            <dt>Fax:</dt>
                            <dd>(23) 365-837</dd>
                            <dt>e-mail:</dt>
                            <dd><a href="mailto:gazszerviz@muszerautomatika.hu">gazszerviz@muszerautomatika.hu</a></dd>
                            </dl>
                        </div>
                    </div>
                </div> 
            </section>
            <section class="maps">
                <div class="wrap-wide wrap-reverse">
                <div class="wrap">
                    <div class="maps-container">
                    <div class="map-1">
                        <p>2040 Budaörs, Komáromi utca 22.</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2697.703258321635!2d18.947505376729588!3d47.45672357117646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741de279561e329%3A0xea8d170749fda762!2zQnVkYcO2cnMsIEtvbcOhcm9taSB1LiAyMiwgMjA0MA!5e0!3m2!1sen!2shu!4v1738175893963!5m2!1sen!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>              </div>
                    <div class="map-2">
                        <p>2040 Budaörs, Garibaldi utca 8.</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2697.747585623543!2d18.946925776729564!3d47.45585957117642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741de278b7943cb%3A0x82c7a903852a2639!2sBuda%C3%B6rs%2C%20Garibaldi%20u.%208%2C%202040!5e0!3m2!1sen!2shu!4v1738175929987!5m2!1sen!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>              </div>
                    </div>
                </div>
                </div>
            </section>
            <section class="team">
                <div class="wrap">
                <h3 class="ul-dots">ÜZLETÁG VEZETŐ KOLLÉGÁINK</h3>
                <div class="team-members">
                    <div class="team-member">
                    <span class="team-member-name">Kovács József</span>
                    <span class="team-member-position">Ügyvezető</span>
                    <p><span class="team-member-phone"><a href="tel:+3623365280">(23) 365-280</a></span></p>
                    <p><span class="team-member-email"><a href="mailto:valami@mautomatika.hu">valami@mautomatika.hu</a></span></p>
                    </div>
                    <div class="team-member">
                    <span class="team-member-name">Kovács József</span>
                    <span class="team-member-position">Ügyvezető</span>
                    <p><span class="team-member-phone"><a href="tel:+3623365280">(23) 365-280</a></span></p>
                    <p><span class="team-member-email"><a href="mailto:valami@mautomatika.hu">valami@mautomatika.hu</a></span></p>
                    </div>
                    <div class="team-member">
                    <span class="team-member-name">Kovács József</span>
                    <span class="team-member-position">Ügyvezető</span>
                    <p><span class="team-member-phone"><a href="tel:+3623365280">(23) 365-280</a></span></p>
                    <p><span class="team-member-email"><a href="mailto:valami@mautomatika.hu">valami@mautomatika.hu</a></span></p>
                    </div>
                </div>
                </div>
            </section>
            <?php if (get_field("contact_form_type") != "disabled") {
                    include_once(get_template_directory() . '/contact-form-section.php');
                } ?>
        
        </article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
