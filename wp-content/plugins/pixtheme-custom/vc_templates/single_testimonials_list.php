<?php 
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
	do_shortcode($content);	 	

	// get data from child template
	exproduct_set_global_data('exproduct_review_count', 0);
	$testimonials_list = exproduct_get_global_data('testimonials_list');

	if( is_array( $testimonials_list ) ){
		foreach ($testimonials_list as $item) {
			

			// item img
			$img = wp_get_attachment_image_src( $item['test_avatar'], 'full' );
			$img_output = (isset($img[0]))?$img[0]:'';


			$star_result = '';
			// rating star html
			$rating_val = intval( $item['test_rating'] );
			for ($i=1; $i <= 5; $i++) { 
				if ($i <= $rating_val) {
					$star_result .= '<li class="raiting__item"><i class="icon fa fa-star"></i></li>';
				} else{
					$star_result .= '<li class="raiting__item"><i class="icon fa fa-star-o"></i></li>';
				}
			}

			// item content
			$out = '
				<section class="slider-reviews__item">
					<h3 class="slider-reviews__title">'.esc_attr($item['test_title']).'</h3>
					<div class="slider-reviews__text">'.esc_attr($item['test_desc']).'</div>
					<ul class="raiting list-inline">
						'.$star_result.'
					</ul>
					<div class="slider-reviews__img">';
			$out .= '
					<img class="img-responsive" src="'.esc_url($img_output).'" height="56" width="56" alt="'.esc_attr($item['test_namesurn']).'">';
			$out .= '
					</div>
					<div class="slider-reviews__name">'.esc_attr($item['test_namesurn']).'</div>
					<div class="slider-reviews__time">'.esc_attr($item['test_date']).'</div>
				</section>
			';

			$testimonials[] = $out;
		}

		$output .= 
			' <div class="slider-reviews owl-carousel owl-theme enable-owl-carousel" data-min480="1" data-min600="1" data-min800="2" data-min1200="3" data-pagination="true" data-navigation="false" data-auto-play="400000" data-stop-on-hover="true">
				'.implode( "\n", $testimonials ).'
			</div>';					
	}
	echo $output;
?>