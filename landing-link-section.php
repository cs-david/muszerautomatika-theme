<section class="landing-link">
    <div class="wrap-narrow">
        <div class="landing-link-container">
            <img src="<?php echo get_template_directory_uri(); ?>/img/ma-logo.svg" alt="Műszer automatika szimbolum"/> 
            <h2>Műszer Automatika Kft.</h2>
            <?php
            $link = "https://muszerautomatika.hu/";
            if (get_locale() == 'en_US') {
                $link .= "en";
            }
            ?>
            <a href="<?php echo esc_url($link); ?>" class="btn" target="_blank"><?php _e('egyéb tevékenységek, termékek megtekintése', 'muszerautomatika-theme'); ?></a>
        </div>
    </div>
</section>