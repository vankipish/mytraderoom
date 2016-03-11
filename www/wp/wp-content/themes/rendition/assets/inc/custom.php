<?php

// Custom functions for Fourteen Extended plugin

add_filter( 'cmb_meta_boxes', 'rendition_custom_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function rendition_custom_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_rendition_';

	$meta_boxes[] = array(
		'id'         => 'widget_title',
		'title'      => 'Project Widget Title',
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Enter Widget Title',
				'desc'    => 'This will act as the widget enabler as well as the title - if left blank widget will not appear and the information entered below will not be shown!',
				'id'      => $prefix . 'widget_title',
				'type'    => 'text',
				'sanitize_callback' => 'sanitize_text_field'
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'project_url',
		'title'      => 'Project Link',
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Enter Project url',
				'desc'    => 'This url will be used to link the post title i.e project name (on single project view page) to the project website!',
				'id'      => $prefix . 'project_url',
				'type'    => 'text',
				'sanitize_callback' => 'esc_url_raw'
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'project_type',
		'title'      => 'Project Type',
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Enter Project Type',
				'desc'    => 'Enter project type i.e. Website, Mobile App, Theme or Graphics!',
				'id'      => $prefix . 'project_type',
				'type'    => 'text',
				'sanitize_callback' => 'sanitize_text_field'
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'project_status',
		'title'      => 'Project Status',
		'pages'      => array( 'jetpack-portfolio'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => 'Enter Project Status',
				'desc'    => 'Enter project status i.e. New, Ongoing, Completed or Shelved/On Hold!',
				'id'      => $prefix . 'project_status',
				'type'    => 'text',
				'sanitize_callback' => 'sanitize_text_field'
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_rendition_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_rendition_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'cmb/init.php';

}
