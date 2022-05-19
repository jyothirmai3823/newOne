<?php 	
	
	// extract variables
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );

	
	// counter
	$x = exproduct_get_global_data('exproduct_review_count');

	// set data for parent template
	exproduct_set_global_data(
		'how_it_helps_all_items',
		array( 'exp_title' => $exp_title, 'exp_description' => $exp_description, 'exp_image' => $exp_image),
		$x
	);


	$reviewCount = exproduct_get_global_data('exproduct_review_count');
	$reviewCount++;
	exproduct_set_global_data('exproduct_review_count',$reviewCount);



 ?>