<?php
	$out = $out2 = $image = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );

    $watch_marker_pos = $watch_marker_pos != '' ? $watch_marker_pos : 'center';
    $images_markers = vc_param_group_parse_atts( $atts['images_markers'] );
    $i = 0;
    foreach($images_markers as $val){
        $i++;
        $img = wp_get_attachment_image_src( $val['watch_image'], 'large');
        $img_output = isset($img[0]) ? $img[0] : '';
        $class = $i == 1 ? 'active' : '';
        $expanded = $i == 1 ? 'true' : 'false';

        $background_color = $val['watch_marker_color'] == '' ? '' : ' style="background-color: '.esc_attr($val['watch_marker_color']).'"';

        if($val['watch_image']){
            $out .= '
                <li class="slider-color-nav__item '.esc_attr($class).'">
		            <a class="slider-color-nav__link" '.wp_kses_post($background_color).' href="#slider-color_'.esc_attr($i).'" data-toggle="tab"></a>
		        </li>
            ';

            $out2 .= '
                <div class="slider-color-content__item tab-pane '.esc_attr($class).'" id="slider-color_'.esc_attr($i).'">
                    <img class="img-responsive" src="'.esc_url($img_output).'" alt="'.esc_attr__('Color Slider Image', 'exproduct').'" height="716" width="556">
                </div>
            ';
        }
    }

?>


<div class="scrollme animateme" data-when="enter" data-from="0.8" data-to="0" data-opacity="0" data-translatex="300" data-translatey="0" data-rotatez="0" style="opacity: 1; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);">
	<div class="slider-color markers-<?php echo esc_attr($watch_marker_pos)?>">
	    <ul class="slider-color-nav nav">
	    	<?php echo ($out); ?>
	    </ul>

	    <div class="slider-color-content tab-content ">
	        <?php echo wp_kses_post($out2); ?>
	    </div>
	</div>
</div>
