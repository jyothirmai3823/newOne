<?php 	
	
	// extract variables
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );

	
	// counter
	$x = exproduct_get_global_data('exproduct_review_count');

	// set data for parent template
	exproduct_set_global_data(
		'testimonials_list',
		array( 
			'test_title' 	=> $test_title,
			'test_desc' 	=> $test_desc,
			'test_rating' 	=> $test_rating,
			'test_avatar' 	=> $test_avatar,
			'test_namesurn' => $test_namesurn,
			'test_date' 	=> $test_date
		),
		$x
	);


	$reviewCount = exproduct_get_global_data('exproduct_review_count');
	$reviewCount++;
	exproduct_set_global_data('exproduct_review_count',$reviewCount);



 ?>