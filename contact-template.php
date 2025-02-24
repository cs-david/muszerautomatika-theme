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
                        <h3 class="ul-dots"><?php _e('MŰSZER AUTOMATIKA KFT.', 'muszerautomatika-theme'); ?></h3>
                            <dl class="contact-list">
                            <dt><?php _e('Postacím:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php echo get_theme_mod('company_address'); ?></dd>
                            <dt><?php _e('Postafiók:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php echo get_theme_mod('company_postbox'); ?></dd>
                            <dt><?php _e('Telefon:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php 
                                $company_phone_numbers = explode(',', get_theme_mod('company_phone'));
                                foreach ($company_phone_numbers as $phone_number) {
                                    $cleaned_phone_number = preg_replace('/[^0-9+]/', '', $phone_number);
                                    echo '<a href="tel:' . $cleaned_phone_number . '">' . $phone_number . '</a><br>';
                                }
                                ?>
                            </dd>                            <dt><?php _e('Fax:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php echo get_theme_mod('company_fax'); ?></dd>
                            <dt><?php _e('e-mail:', 'muszerautomatika-theme'); ?></dt>
                            <dd><a href="mailto:<?php echo get_theme_mod('company_email'); ?>"><?php echo get_theme_mod('company_email'); ?></a></dd>

                            </dl>
                        </div>
                        <div>
                        <h3 class="ul-dots"><?php _e('GÁZÉRZÉKELŐ GYÁRTÁS<br> ÉS ÉRTÉKESÍTÉS', 'muszerautomatika-theme'); ?></h3>
                        <dl class="contact-list">
                            <dt><?php _e('Postacím:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php echo get_theme_mod('sales_address'); ?></dd>
                            <dt><?php _e('Szállítási cím:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php echo get_theme_mod('shipping_address'); ?></dd>
                            <dt><?php _e('Postafiók:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php echo get_theme_mod('sales_postbox'); ?></dd>
                            <dt><?php _e('Telefon:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php 
                                $sales_phone_numbers = explode(',', get_theme_mod('sales_phone'));
                                foreach ($sales_phone_numbers as $phone_number) {
                                    $cleaned_phone_number = preg_replace('/[^0-9+]/', '', $phone_number);
                                    echo '<a href="tel:' . $cleaned_phone_number . '">' . $phone_number . '</a><br>';
                                }
                                ?>
                            </dd>
                            <dt><?php _e('Azonnali információ kérés:', 'muszerautomatika-theme'); ?></dt>
                            <dd><a href="tel:<?php echo preg_replace('/[^0-9+]/', '', get_theme_mod('info_phone')); ?>"><?php echo get_theme_mod('info_phone'); ?></a></dd>
                            <dt><?php _e('Fax:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php echo get_theme_mod('sales_fax'); ?></dd>
                            <dt><?php _e('e-mail:', 'muszerautomatika-theme'); ?></dt>
                            <dd><a href="mailto:<?php echo get_theme_mod('sales_email'); ?>"><?php echo get_theme_mod('sales_email'); ?></a></dd>
                        </dl>
                        </div>
                        <div>
                        <h3 class="ul-dots"><?php _e('GÁZÉRZÉKELŐ<br> SZAKSZERVIZ', 'muszerautomatika-theme'); ?></h3>
                            <dl class="contact-list">
                            <dt><?php _e('Postacím:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php echo get_theme_mod('service_address'); ?></dd>
                            <dt><?php _e('Postafiók:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php echo get_theme_mod('service_postbox'); ?></dd>
                            <dt><?php _e('Telefon:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php 
                                $service_phone_numbers = explode(',', get_theme_mod('service_normal_phone'));
                                foreach ($service_phone_numbers as $phone_number) {
                                    $cleaned_phone_number = preg_replace('/[^0-9+]/', '', $phone_number);
                                    echo '<a href="tel:' . $cleaned_phone_number . '">' . $phone_number . '</a><br>';
                                }
                                ?>
                            </dd>
                            <dt><?php _e('Azonnali információ kérés:', 'muszerautomatika-theme'); ?></dt>
                            <dd><a href="tel:<?php echo preg_replace('/[^0-9+]/', '', get_theme_mod('service_phone', '+36-23-416-761')); ?>"><?php echo get_theme_mod('service_phone', '+36-23-416-761'); ?></a></dd>
                            <dt><?php _e('Fax:', 'muszerautomatika-theme'); ?></dt>
                            <dd><?php echo get_theme_mod('service_fax'); ?></dd>
                            <dt><?php _e('e-mail:', 'muszerautomatika-theme'); ?></dt>
                            <dd><a href="mailto:<?php echo get_theme_mod('service_email'); ?>"><?php echo get_theme_mod('service_email'); ?></a></dd>
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
                                <p><?php echo get_theme_mod('sales_address'); ?></p>
                                <?php echo get_field('contact_map_1'); ?>
                            </div>
                            <div class="map-2">
                                <p><?php echo get_theme_mod('shipping_address'); ?></p>
                                <?php echo get_field('contact_map_2'); ?>              
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="team">
                <div class="wrap">
                <h3 class="ul-dots"><?php the_field('team_h2') ?></h3>
                <div class="team-members">
                    <?php
                    // Query for 'munkatarsak' post type
                    $args = array(
                        'post_type' => 'munkatarsak',
                        'posts_per_page' => -1, // Get all posts
                        'orderby' => 'title',
                        'order' => 'ASC'
                    );
                    $munkatarsak_query = new WP_Query($args);

                    // Loop through the posts
                    if ($munkatarsak_query->have_posts()) :
                        while ($munkatarsak_query->have_posts()) : $munkatarsak_query->the_post();
                    ?>
                    <div class="team-member">
                        <span class="team-member-name"><?php the_title(); ?></span>
                        <span class="team-member-position"><?php the_field('team_position'); ?></span>
                        <p><span class="team-member-phone"><a href="tel:<?php echo preg_replace('/[^0-9+]/', '', get_field('team_phone')); ?>"><?php echo get_field('team_phone'); ?></a></span></p>
                        <p><span class="team-member-email"><a href="mailto:<?php the_field('team_email'); ?>"><?php the_field('team_email'); ?></a></span></p>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>' . __('Nem található munkatárs', 'muszerautomatika-theme') . '</p>';
                    endif;
                    ?>
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
