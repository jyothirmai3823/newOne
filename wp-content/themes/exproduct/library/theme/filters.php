<?php
/**
 * The template for registering metabox.
 *
 * @package PixTheme
 * @since 1.0
 */
add_filter( 'rwmb_meta_boxes', 'exproduct_register_meta_boxes' );

function exproduct_register_meta_boxes( $meta_boxes ) {
	
	$meta_boxes[] = array(

		'id' => 'product_options',
		'title' => esc_html__( 'Additional Title', 'exproduct' ),
		'pages' => array( 'services', 'portfolio', 'post', 'page', 'product'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(

			array(
				'name'    => esc_html__( 'Text', 'exproduct' ),
				'id'      => 'add_title_text',
				'desc'  => '',
				'type'    => 'textarea',
				'std'   => ''
			),

		)
	);
	
	$meta_boxes[] = array(
		
		'id' => 'post_format',
		'title' => esc_html__( 'Post Format Options', 'exproduct' ),
		'pages' => array( 'post' ),
		'context' => 'normal',
		'priority' => 'low',
		'autosave' => true,
		'fields' => array(
			array(
				'name' => esc_html__('Post Standared:', 'exproduct' ),
				'id'   => "post_standared",
				'type' => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type' => 'image,application,audio,video',
			),
			array(
				'name' => esc_html__('Post Gallery:','exproduct'),
				'id'   => "post_gallery",
				'type' => 'plupload_image',
				'max_file_uploads' => 25,
			),
			array(
				'name'  => esc_html__('Quote Source:', 'exproduct'),
				'id'    => "post_quote_source",
				'desc'  => '',
				'type'  => 'text',
				'std'   => '',
			),
			array(
				'name'  => esc_html__('Quote Content:', 'exproduct'),
				'id'    => "post_quote_content",
				'desc'  => '',
				'type'  => 'textarea',
				'std'   => '',
			),
			array(
				'name'  => esc_html__('Video','exproduct'),
				'id'    => "post_video",
				'desc'  => 'Video URL',
				'type'  => 'textarea',
				'std'   => '',
			)
		)
		
	);

	return $meta_boxes;
}
