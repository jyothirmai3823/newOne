<?php 
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
	do_shortcode($content);	 	

	// get data from child template
	exproduct_set_global_data('exproduct_review_count', 0);
	$images_video_gal_all = exproduct_get_global_data('images_video_gal_all');

	if( is_array( $images_video_gal_all ) ){
		foreach ($images_video_gal_all as $item) {
			
			// item content
			$icon_image = wp_get_attachment_image_src( $item['gal_image'], 'little-gal-image');
			$img_output1 = (isset($icon_image[0]))?$icon_image[0]:'';

			$icon_image_big = wp_get_attachment_image_src( $item['gal_image'], 'big-gal-image');
			$img_output2 = (isset($icon_image_big[0]))?$icon_image_big[0]:'';


			

			$out1 = '  <li>';
			if ($item['gal_image']) $out1.='<img class="sp-image" src="'.$img_output2.'" alt="foto">';
			$out1 .= '</li>';

			$out2 = '<li><img class="sp-thumbnail" src="';
			if ($item['gal_image']) $out2.= $img_output1.'" height="80" width="100" alt="foto"></li>';

			$images_video_gal_big[] = $out1;
			$images_video_gal_little[] = $out2;
		}

		// items output
		$output .= 
            
            
			'<div class="section-slider">
            <div id="slider" class="flexslider">
            <ul class="slides">
					'.implode( "\n", $images_video_gal_big ).'
				</ul></div>
				<div id="carousel" class="flexslider">
            <ul class="slides">
					'.implode( "\n", $images_video_gal_little ).'
				  </ul></div>
			</div>';					
	}
	echo $output;
?>
 
