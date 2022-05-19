<?php 
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
	do_shortcode($content);	 	

	// get data from child template
	exproduct_set_global_data('exproduct_review_count', 0);
	$feaguresItem = exproduct_get_global_data('extra_features');

	
	// make result output 
	if( is_array( $feaguresItem ) ){
		$count = 1;
		foreach( $feaguresItem as $item ){
			$out = 
			'<li class="list-advantages__item">
				<i class="icon '.$item['picon'].'"></i>
					<span class="list-advantages__inner">';
						if ($item['feature_title']) $out.=$item['feature_title'];
			$out .=		'</span>		
			</li>';
			$reviews[] = $out;
			$count ++;
		}

		// final result output 
		$output .= 
		' 
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div class="advantages__title">
								<div class="title-brand">'.esc_attr($header_title).'</div>
								<h2 class="ui-title-block ui-title-block_sm">'.esc_attr($header_sub_title).'</h2>
							</div>
						</div>
						<div class="col-md-10">
							<ul class="list-advantages list-unstyled">'
								.implode( "\n", $reviews ).'
							</ul>
						</div>
					</div>
				</div>
		';		
	}
	echo $output;	
?>