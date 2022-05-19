<?php 
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
	do_shortcode($content);	 	

	// get data from child template
	exproduct_set_global_data('exproduct_review_count', 0);
	$how_it_helps_all_items = exproduct_get_global_data('how_it_helps_all_items');

	if( is_array( $how_it_helps_all_items ) ){
		foreach ($how_it_helps_all_items as $item) {
			
			// item content
			$icon_image = wp_get_attachment_image_src( $item['exp_image'], 'large');
			$img_output = (isset($icon_image[0]))?$icon_image[0]:'';


			$out = '<li class="list-description__item clearfix">
						<div class="scrollme animateme" data-when="enter" data-from="0.5" data-to="0" data-opacity="0" data-translatex="0" data-translatey="300" data-rotatez="0" style="opacity: 1; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);">
							<span class="list-description__img">
					';
					if ($img_output) $out .= '<img class="img-responsive" src="'.$img_output.'" alt="foto" width="108" height="108">';
					$out .=			
						'
							</span>
							<span class="list-description__inner">
								<span class="list-description__title">';
									if ($item['exp_title']) $out.=$item['exp_title'];
					$out .=		'</span>
								<span class="list-description__text">';
									if ($item['exp_description']) $out.= wpb_js_remove_wpautop($item['exp_description']);
					$out .= 	'</span>
							</span>
						</div>
					</li>';

			$how_it_helps_content[] = $out;
		}

		$output .= 
			'<ul class="list-description list-unstyled">
				'.implode( "\n", $how_it_helps_content ).'
			</ul>';					
	}
	echo $output;
?>
