<?php

class RenditionSidebars {

private function __construct() {}

public static function setup_sidebars() {
	add_action( 'after_setup_theme', array( __CLASS__, 'after_setup_theme' ) );
	do_action( 'rendition_sidebars' );
}
public static function after_setup_theme() {
   add_action( 'widgets_init', array( __CLASS__, 'widgets_init' ) );
   do_action( 'rendition_sidebars_after_setup_theme' );
   add_filter('widget_text', 'do_shortcode');
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
//function rendition_widgets_init() 

public static function widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'rendition' ),
		'id'            => 'sidebar-1',
		'description' => __( 'Appears on pages and single post view only!', 'rendition' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Portfolio', 'rendition' ),
		'id'            => 'portfolio',
		'description' => __( 'Appears on single portfolio view only!', 'rendition' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer One.', 'rendition' ),
		'id' => 'footer-1',
		'description' => __( 'One of four footer widget areas - sitewide', 'rendition' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Two.', 'rendition' ),
		'id' => 'footer-2',
		'description' => __( 'One of four footer widget areas - sitewide', 'rendition' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Three', 'rendition' ),
		'id' => 'footer-3',
		'description' => __( 'One of four footer widget areas - sitewide', 'rendition' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Four', 'rendition' ),
		'id' => 'footer-4',
		'description' => __( 'One of four footer widget areas - sitewide', 'rendition' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

}
RenditionSidebars::setup_sidebars();