<?php 	
	
	// extract variables
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );

	// get feature icon
	$picon = '';
	if(function_exists('fil_init')){
		$picon = isset( ${"icon_" . $type} ) ? ${"icon_" . $type} : '';
	}
	
	// counter
	$x = exproduct_get_global_data('exproduct_review_count');

	// set data for parent template
	exproduct_set_global_data(
		'build_in_apps',
		array( 'bia_image' => $bia_image, 'picon' => $picon, 'bia_bg_color' => $bia_bg_color, 'bia_title' => $bia_title, 'bia_description' => $bia_description ),
		$x
	);


	$reviewCount = exproduct_get_global_data('exproduct_review_count');
	$reviewCount++;
	exproduct_set_global_data('exproduct_review_count',$reviewCount);



 ?>