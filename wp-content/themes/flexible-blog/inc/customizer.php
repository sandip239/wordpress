<?php
/**
 * Flexible Blog Theme Customizer
 *
 * @package Flexible Blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flexible_blog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Register custom section types.
	$wp_customize->register_section_type( 'flexible_blog_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new flexible_blog_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Flexible Blog', 'flexible-blog' ),
				'pro_text' => esc_html__( 'Buy Pro', 'flexible-blog' ),
				'pro_url'  => 'http://www.creativthemes.com/downloads/flexible-blog-pro/',
				'priority'  => 10,
			)
		)
	);

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-section.php';
	
}
add_action( 'customize_register', 'flexible_blog_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function flexible_blog_customize_preview_js() {
	wp_enqueue_script( 'flexible_blog_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'flexible_blog_customize_preview_js' );
/**
 *
 */
function flexible_blog_customize_backend_scripts() {

	wp_enqueue_style( 'flexible-blog-fontawesome-all', get_template_directory_uri() . '/assets/css/all.css' );

	wp_enqueue_style( 'flexible-blog-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );

	wp_enqueue_script( 'flexible-blog-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-script.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'flexible_blog_customize_backend_scripts', 10 );