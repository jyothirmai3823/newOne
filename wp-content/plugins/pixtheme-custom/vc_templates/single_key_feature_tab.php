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
		'key_features_tabs',
		array( 'key_feature_title' => $key_feature_title, 'key_feature_text' => $key_feature_text, 'picon' => $picon),
		$x
	);


	$reviewCount = exproduct_get_global_data('exproduct_review_count');
	$reviewCount++;
	exproduct_set_global_data('exproduct_review_count',$reviewCount);



 ?>