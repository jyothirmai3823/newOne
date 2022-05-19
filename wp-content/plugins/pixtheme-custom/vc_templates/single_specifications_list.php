<?php 
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
	do_shortcode($content);	 	

	// get data from child template
	exproduct_set_global_data('exproduct_review_count', 0);
	$specifications_list = exproduct_get_global_data('specifications_list');

	if( is_array( $specifications_list ) ){
		foreach ($specifications_list as $item) {
			

			

			// item content
			$out = '
				<dt class="list-descriptions__name">'.esc_attr($item['spec_title']).'</dt>
				<dd class="list-descriptions__description">'.esc_attr($item['spec_description']).'</dd>
			';

			$specifications[] = $out;
		}

		$output .= 
			'<dl class="list-descriptions">
				'.implode( "\n", $specifications ).'
			</dl>';					
	}
	echo $output;
?>
