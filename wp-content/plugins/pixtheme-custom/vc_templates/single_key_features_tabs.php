<?php 
	$output = '';
	$output1 = '';
	$output2 = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
	do_shortcode($content);	 	

	// get data from child template
	exproduct_set_global_data('exproduct_review_count', 0);
	$key_features_tabs = exproduct_get_global_data('key_features_tabs');

	if( is_array( $key_features_tabs ) ){
		$count = 1;
		foreach ($key_features_tabs as $tab) {
			if ($count == 1) {$active = 'active';} else {$active = '';}

			// tab content
			$out = 
				'<div class="tab-advantages__pane tab-pane '.$active.'" id="advantages-'.$count.'"><p>';
					if ($tab['key_feature_text']) $out.=wpb_js_remove_wpautop($tab['key_feature_text']);
				$out .= '</p></div>';
			$tab_content[] = $out;

			// tab icons
			$out2 = 
				'<li class="list-advantages__item '.$active.'">
					<a class="list-advantages__link" href="#advantages-'.$count.'" data-toggle="tab" aria-expanded="true">
						<i class="icon '.$tab['picon'].'"></i>
						<span class="list-advantages__inner">'.$tab['key_feature_title'].'</span>
					</a>
				</li>';
			$tab_icons[] = $out2;


			$count ++;
		}

		// final result output 
		$output .= 
			'<div class="tab-advantages__content tab-content">
				'.implode( "\n", $tab_content ).'
			</div>';

		$output2 .=
		'<ul class="list-advantages list-nobefore list-advantages_mod-a nav js-tabs">
			'.implode( "\n", $tab_icons ).'
		</ul>';
				
	}
	echo $output;
	echo $output2;
	



	// 	// final results output 
	// 	$output1 .= 
	// 	'<div class="tab-advantages__content tab-content">
	// 			'.implode( "\n", $tab_content ).'
	// 	</div>';

	// 	$output2 .=
	// 	'<ul class="list-advantages list-advantages_mod-a nav js-tabs">
	// 		'.implode( "\n", $tab_icons ).'
	// 	</ul>';

			
	// }
	// echo $output1;	
	// echo $output2;



?>