<?php 
	$output = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
	do_shortcode($content);	 	

	// get data from child template
	exproduct_set_global_data('exproduct_review_count', 0);
	$build_in_apps = exproduct_get_global_data('build_in_apps');

	if( is_array( $build_in_apps ) ){
		$count = 1;
		foreach( $build_in_apps as $item ){

			// first items animation
			if ($count == 1) {
				$item_animation = 'data-translatex="-300" data-translatey="0"';
			} elseif ($count == 2) {
				$item_animation = 'data-translatex="0" data-translatey="300"';
			} elseif ($count == 3) {
				$item_animation = 'data-translatex="300" data-translatey="0"';
			} else{
				$item_animation = '';
			}

			// item img
			$img = wp_get_attachment_image_src( $item['bia_image'], 'large' );
			$img_output = (isset($img[0]))?$img[0]:'';
			$bg_color = $item['bia_bg_color'] != '' ? 'style="background-color:'.$item['bia_bg_color'].'"' : '';
			$icon = $item['picon'] != '' ? '<span class="list-goods__label" '.wp_kses_post($bg_color).'><i class="icon '.$item['picon'].'"></i></span>' : '';

			// each item html
			$out = 
			'<div class="list-goods___item">
				<div class="scrollme animateme" data-when="enter" data-from="0.5" data-to="0" data-opacity="0" '.$item_animation.' data-rotatez="0" style="opacity: 1; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);">';
			$out .= '<img class="list-goods__img img-responsive" src="'.esc_url($img_output).'" alt="'.esc_attr($item['bia_title']).'" width="232" height="411">';

			$out .=
				'	<h3 class="list-goods__title">'.esc_attr($item['bia_title']).'</h3>
					<div class="list-goods__description">'.esc_attr($item['bia_description']).'</div>
					'.wp_kses_post($icon).'
				</div>
			</div>
			';

			$apps[] = $out;
			$count ++;
		}

		// final result output 
		$output .= 
		'
			<div class="list-goods content">'
				.implode( "\n", $apps ).
			'</div>
		';		
	}
?>
<!-- block header -->
<h2 class="ui-title-block ui-title-block_mod-c" style = "text-align: center;">
	<?php echo esc_attr($bin_title); ?>
	<span class="ui-title-block__inner"><?php echo esc_attr($bin_sub_title); ?> <br><span class="ui-title-block__brand"><?php echo esc_attr($bin_brand_title1); ?></span><?php echo esc_attr($bin_brand_title2); ?></span>
</h2>

<?php echo $output;	?>


