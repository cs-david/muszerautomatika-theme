<?php
/**
 * Műszer Automatika Sablon Theme Customizer
 *
 * @package Műszer_Automatika_Sablon
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function muszerautomatika_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'muszerautomatika_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'muszerautomatika_theme_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'muszerautomatika_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function muszerautomatika_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function muszerautomatika_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function muszerautomatika_theme_customize_preview_js() {
	wp_enqueue_script( 'muszerautomatika-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'muszerautomatika_theme_customize_preview_js' );

function ma_customizer_settings($wp_customize) {

    $wp_customize->add_section('company_contact_section', array(
        'title'       => 'MA Kft. Elérhetőségek',
        'priority'    => 31,
    ));
    $wp_customize->add_section('sales_contact_section', array(
        'title'       => 'Gyártás és Értékesítés Elérhetőségek',
        'priority'    => 32,
    ));
    $wp_customize->add_section('service_contact_section', array(
        'title'       => 'Szakszervíz Elérhetőségek',
        'priority'    => 33,
    ));

    /* COMPANY */

    // Address
    $wp_customize->add_setting('company_address', array(
        'default'           => 'Postacím',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('company_address', array(
        'label'       => 'Postacím',
        'section'     => 'company_contact_section',
        'type'        => 'text',
    ));

    // Postafiók
    $wp_customize->add_setting('company_postbox', array(
        'default'           => 'Postafiók',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('company_postbox', array(
        'label'       => 'Postafiók',
        'section'     => 'company_contact_section',
        'type'        => 'text',
    ));

    // Telefon
    $wp_customize->add_setting('company_phone', array(
        'default'           => 'Telefon',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('company_phone', array(
        'label'       => 'Telefon',
        'section'     => 'company_contact_section',
        'type'        => 'text',
    ));

    // Fax
    $wp_customize->add_setting('company_fax', array(
        'default'           => 'Fax',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('company_fax', array(
        'label'       => 'Fax',
        'section'     => 'company_contact_section',
        'type'        => 'text',
    ));

    // Email
    $wp_customize->add_setting('company_email', array(
        'default'           => 'Email',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('company_email', array(
        'label'       => 'Email',
        'section'     => 'company_contact_section',
        'type'        => 'email',
    ));

    /* SALES */

    // Address
    $wp_customize->add_setting('sales_address', array(
        'default'           => 'Postacím',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('sales_address', array(
        'label'       => 'Postacím',
        'section'     => 'sales_contact_section',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('sales_address_map', array(
        'default'           => 'Google Maps Link',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('sales_address_map', array(
        'label'       => 'Google Maps Link',
        'section'     => 'sales_contact_section',
        'type'        => 'text',
    ));

    // Shipping Address
    $wp_customize->add_setting('shipping_address', array(
        'default'           => 'Szállítási cím',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('shipping_address', array(
        'label'       => 'Szállítási cím',
        'section'     => 'sales_contact_section',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('sales_shipping_map', array(
        'default'           => 'Google Maps Link',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('sales_shipping_map', array(
        'label'       => 'Google Maps Link',
        'section'     => 'sales_contact_section',
        'type'        => 'text',
    ));

    // Postafiók
    $wp_customize->add_setting('sales_postbox', array(
        'default'           => 'Postafiók',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('sales_postbox', array(
        'label'       => 'Postafiók',
        'section'     => 'sales_contact_section',
        'type'        => 'text',
    ));

    // Telefon
    $wp_customize->add_setting('sales_phone', array(
        'default'           => 'Telefon',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('sales_phone', array(
        'label'       => 'Telefon',
        'section'     => 'sales_contact_section',
        'type'        => 'text',
    ));

    // Info Phone
    $wp_customize->add_setting('info_phone', array(
        'default'           => 'Azonnali info telefonszám',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('info_phone', array(
        'label'       => 'Azonnali info telefonszám',
        'section'     => 'sales_contact_section',
        'type'        => 'text',
    ));

    // Fax
    $wp_customize->add_setting('sales_fax', array(
        'default'           => 'Fax',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('sales_fax', array(
        'label'       => 'Fax',
        'section'     => 'sales_contact_section',
        'type'        => 'text',
    ));

    // Email
    $wp_customize->add_setting('sales_email', array(
        'default'           => 'Email',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('sales_email', array(
        'label'       => 'Email',
        'section'     => 'sales_contact_section',
        'type'        => 'email',
    ));

    /* SERVICE */

    // Address
    $wp_customize->add_setting('service_address', array(
        'default'           => 'Postacím',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('service_address', array(
        'label'       => 'Postacím',
        'section'     => 'service_contact_section',
        'type'        => 'text',
    ));

	// Shipping Address
	$wp_customize->add_setting('service_shipping_address', array(
		'default'           => 'Szállítási cím',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	));

	$wp_customize->add_control('service_shipping_address', array(
		'label'       => 'Szállítási cím',
		'section'     => 'service_contact_section',
		'type'        => 'text',
	));

    // Postafiók
    $wp_customize->add_setting('service_postbox', array(
        'default'           => 'Postafiók',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('service_postbox', array(
        'label'       => 'Postafiók',
        'section'     => 'service_contact_section',
        'type'        => 'text',
    ));

    // Telefon
    $wp_customize->add_setting('service_normal_phone', array(
        'default'           => 'Telefon',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('service_normal_phone', array(
        'label'       => 'Telefon',
        'section'     => 'service_contact_section',
        'type'        => 'text',
    ));

    // Info Phone
    $wp_customize->add_setting('service_phone', array(
        'default'           => 'Azonnali info telefonszám',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('service_phone', array(
        'label'       => 'Azonnali info telefonszám',
        'section'     => 'service_contact_section',
        'type'        => 'text',
    ));

    // Fax
    $wp_customize->add_setting('service_fax', array(
        'default'           => 'Fax',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('service_fax', array(
        'label'       => 'Fax',
        'section'     => 'service_contact_section',
        'type'        => 'text',
    ));

    // Email
    $wp_customize->add_setting('service_email', array(
        'default'           => 'Email',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('service_email', array(
        'label'       => 'Email',
        'section'     => 'service_contact_section',
        'type'        => 'email',
    ));
 
}

add_action('customize_register', 'ma_customizer_settings');
