<?php $contact_form_type = ''; 

if (is_archive('termek') || is_singular('termek')) {
    $contact_form_type = get_field("contact_form_type" , 15);
} else {
    $contact_form_type = get_field("contact_form_type");
} 

?>

<section class="form-section <?php if ($contact_form_type == "service" || $contact_form_type == "sales" ) {
            echo "simple-form";
        } ?>" id="contact-form">
    <div class="wrap-wide with-narrow">
        <div class="wrap with-narrow">
            <div class="wrap-narrow">
                <h2><?php if (is_singular('termek') || is_archive() || is_search()) { echo get_field("contact_form_heading" , 15); } else { the_field("contact_form_heading"); } ?></h2>
                <?php

                switch ($contact_form_type) {
                    case "service":
                            echo do_shortcode('[contact-form-7 id="d810b90" title="Szakszerviz kapcsolat űrlap"]');
                            break;
                        case "sales":
                            echo do_shortcode('[contact-form-7 id="5c80456" title="Értékesítés kapcsolat űrlap"]');
                            break;
                        default:
                            echo do_shortcode('[contact-form-7 id="f138fd4" title="Általános kapcsolat űrlap"]');
                            break;
                    }
                
                ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/ma-logo-white.svg" alt="Műszer automatika szimbolum" class="form-ma-logo">
            </div>
        </div>
    </div>
</section>