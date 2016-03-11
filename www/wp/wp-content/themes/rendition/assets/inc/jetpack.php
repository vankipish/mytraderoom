<?php

/**
* Add theme support for Jetpack features.
* See: http://jetpack.me/
 *
 * @package		Rendition
 * @since		Rendition 1.0.0
*/

class RenditionJetpack {

private function __construct() {}

/**
 * Runs immediately at the end of this file, not to be confused
 * with after_setup_theme, which runs a little bit later.
*/

public static function setup() {
	add_action( 'after_setup_theme', array( __CLASS__, 'after_setup_theme' ) );
	do_action( 'rendition_jetpack_functions' );	
}


public static function after_setup_theme() {

	add_theme_support( 'jetpack-portfolio' );
	
	add_theme_support( 'jetpack-responsive-videos' );
	
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'footer',
		'render'    => 'rendition_infinite_scroll_render',
	) );
	
do_action( 'rendition_after_setup_theme' );	
}

	
/**
 * Define the code that is used to render the posts added by Infinite Scroll.
 *
 * Includes the whole loop. Used to include the correct template part for the Portfolio CPT.
 */
public static function rendition_infinite_scroll_render() {
	while( have_posts() ) {
		the_post();

		if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
			get_template_part( 'content/content', 'portfolio' );
		} else {
			get_template_part( 'content', get_post_format() );
		}
	}
}

}

RenditionJetpack::setup();

function rendition_jetpack_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'rendition_portfolio_options' , array(
       'title'      => __('Rendition Portfolio Options','rendition'),
	   'description' => sprintf( __( 'Use the following settings to control the Portfolio output.', 'rendition' )),
       'priority'   => 39,
    ) );
	
	// Begin Portfolio section
	$wp_customize->add_setting(
        'rendition_home_projects_visibility', array (
		'sanitize_callback' => 'rendition_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'rendition_home_projects_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show/Hide Portfolio section on front page', 'rendition'),
        'section'  => 'rendition_portfolio_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
        'rendition_project_header_visibility', array (
		'sanitize_callback' => 'rendition_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'rendition_project_header_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show/Hide Portfolio header?', 'rendition'),
        'section'  => 'rendition_portfolio_options',
		'priority' => 2,
        )
    );
	
	$wp_customize->add_setting(
    'rendition_project_header_title',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_project_header_title',
    array(
        'label'     => __('Portfolio Section Title', 'rendition'),
        'section'   => 'rendition_portfolio_options',
		'priority'  => 3,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'rendition_frontpage_project_num', array (
		'sanitize_callback' => 'rendition_sanitize_integer',
    ));

    $wp_customize->add_control(
    'rendition_frontpage_project_num',
    array(
        'type' => 'text',
		'default' => '',
        'label' => __('Number of portfolio projects on front page', 'rendition'),
        'section' => 'rendition_portfolio_options',
		'priority' => 4,
        )
    );
	// End Portfolio section
}
add_action( 'customize_register', 'rendition_jetpack_customize_register' );
 
if ( ! function_exists( 'rendition_sanitize_checkbox' ) ) :
	function rendition_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
endif;

if ( ! function_exists( 'rendition_sanitize_integer' ) ) :
   function rendition_sanitize_integer( $input ) {
	   return absint( $input );
  }
endif;