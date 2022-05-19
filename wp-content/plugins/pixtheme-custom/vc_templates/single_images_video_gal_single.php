<?php 	
	
	// extract variables
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );


	

	
	// counter
	$x = exproduct_get_global_data('exproduct_review_count');

	// set data for parent template
	exproduct_set_global_data(
		'images_video_gal_all',
		array( 'gal_image' => $gal_image ),
		$x
	);


	$reviewCount = exproduct_get_global_data('exproduct_review_count');
	$reviewCount++;
	exproduct_set_global_data('exproduct_review_count',$reviewCount);



 ?>