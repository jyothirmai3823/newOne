<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
	$bgstyle
    $jartype
	$jarspeed
	$pdecor
	$ptextcolor
	$ppadding
    $poverlay
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = '';
$disable_element = '';
$output = $after_output = $paralax_fix_before = $paralax_fix_after = $bg_image_src = $class_slider = $pix_bg_class = $pix_bg_color = $pix_decor_class = $pix_gradient = $pix_gradient_style = $pix_gradient_class = $scroll_bg = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

/////////////////////////////////////////////
$class_preset_text = $ptextcolor == 'White' ? ' text-'.strtolower($ptextcolor).'-color text-shadow' : '';
if ($ptextcolor == "Default")
	$class_preset_text = "";

$class_bg = $bgstyle == 'attachment' && !empty($bgimage) ? 'background-attachment-fixed' : '';
$jarstretch = $jarstretch == '' ? 'No' : $jarstretch;
if( !empty($bgimage) ){
	$bg_image_id = preg_replace( '/[^\d]/', '', $bgimage );
	$bg_image_src = wp_get_attachment_image_src( $bg_image_id, 'full' );
	if ( ! empty( $bg_image_src[0] ) ) {
		$bg_image_src = $bg_image_src[0];
	}
}

$scroll_bg = $bgstyle == 'scroll' && !empty($scroll_color) ? 'scrollie' : '';

$pix_decor_class = $pdecor ? 'pix-row-decor' : '';
$poverlay = $poverlay=='' ? 'pix-row-overlay' : $poverlay;
/////////////////////////////////////////////

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	$ppadding,
	$poverlay,
	$pix_decor_class,
	$class_preset_text,
	$scroll_bg,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
	$css_classes[]='vc_row-has-fill';
}

if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $scroll_bg ) ) {
	$wrapper_attributes[] = 'data-background="' . esc_attr( $scroll_color ) . '"';
}
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) && empty($bgstyle) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
	$paralax_fix_before = '<div class="anchor-parallax-fix">';
	$paralax_fix_after = '</div> <!-- END anchor-parallax-fix -->';
}

if ( ! empty( $parallax_image ) && empty($bgimage) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
$css_arr = preg_split('/vc\_custom\_/',$css_class);
$css_id = isset($css_arr[1]) ? explode(' ', $css_arr[1]) : '';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

if($bgstyle == 'jarallax' && !empty($bgimage) ){
	wp_enqueue_script( 'jarallax' );
	$class_jarallax = $class_jarallax_inner = '';
	if ( ! empty( $full_width ) ) {
		$class_jarallax = 'jarallax-full-width';
		if ( 'stretch_row_content' === $full_width ) {
			$class_jarallax = 'jarallax-full-width-content';
		} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
			$class_jarallax = 'jarallax-full-width-content-no-padding';
		}
	}
	$class_jarallax_inner = ! empty( $full_width ) && $jarstretch == "No" ? 'container' : 'jarallax-content-inner';
	$output .= '<div class="jarallax '.esc_attr($class_jarallax).'"';
	$arr_jarallax = array();
	if($jartype != 'Default' && $jartype != '')
		$arr_jarallax['type'] = $jartype;
	if($jarspeed != '')
		$arr_jarallax['speed'] = $jarspeed;
	if(empty($arr_jarallax))
		$arr_jarallax['speed'] = '0.2';
	$output .= ' data-jarallax=\''.json_encode($arr_jarallax).'\''; // parallax image
	$output .= ' style="background-image:url(' . esc_attr($bg_image_src) . ')"'; // parallax image
	$output .= '>
	<div class="jarallax-content">
		<div class="'.esc_attr($class_jarallax_inner).'">';
}elseif(!empty($bgimage)){
	$output .= '<div class="'.esc_attr($class_bg).'" style="background-image:url(' . esc_attr($bg_image_src) . ')">';
}

$gradient_colors = vc_param_group_parse_atts( $atts['gradient_colors'] );
if(isset($gradient_colors[0]['gradient_color']) && $gradient_colors[0]['gradient_color'] != ''){
	$pix_gradient_class = isset($css_id[0]) && $css_id[0] != '' ? 'pix_gradient_colors_'.$css_id[0] : 'pix_gradient_colors_'.rand();
	$gradient_direction = $gradient_direction == '' ? 'to right' : $gradient_direction;
	$gradient_angle = $gradient_angle == '' ? '90' : $gradient_angle;
	$pix_directions_arr = array(
			'to right' => array('-webkit' => 'left', '-o-linear' => 'right', '-moz-linear' => 'right', 'linear' => 'to right',),
			'to left' => array('-webkit' => 'right', '-o-linear' => 'left', '-moz-linear' => 'left', 'linear' => 'to left',),
			'to bottom' => array('-webkit' => 'top', '-o-linear' => 'bottom', '-moz-linear' => 'bottom', 'linear' => 'to bottom',),
			'to top' => array('-webkit' => 'bottom', '-o-linear' => 'top', '-moz-linear' => 'top', 'linear' => 'to top',),
			'to bottom right' => array('-webkit' => 'left top', '-o-linear' => 'bottom right', '-moz-linear' => 'bottom right', 'linear' => 'to bottom right',),
			'to bottom left' => array('-webkit' => 'right top', '-o-linear' => 'bottom left', '-moz-linear' => 'bottom left', 'linear' => 'to bottom left',),
			'to top right' => array('-webkit' => 'left bottom', '-o-linear' => 'top right', '-moz-linear' => 'top right', 'linear' => 'to top right',),
			'to top left' => array('-webkit' => 'right bottom', '-o-linear' => 'top left', '-moz-linear' => 'top left', 'linear' => 'to top left',),
			'angle' => array('-webkit' => $gradient_angle.'deg', '-o-linear' => $gradient_angle.'deg', '-moz-linear' => $gradient_angle.'deg', 'linear' => $gradient_angle.'deg',),

	);
	$gradient_opacity = $gradient_opacity == '' ? 1 : $gradient_opacity;
	foreach($gradient_colors as $val){
		$pix_gradient .= ','.$val['gradient_color'];
	}
	$pix_gradient_style = $pix_gradient == '' && isset($pix_directions_arr[$gradient_direction]) ? '' : '
jQuery(function($){
    $("head").append("<style>.vc_row-overlay.'.$pix_gradient_class.'{background: '.esc_attr($gradient_colors[0]['gradient_color']).';background: -webkit-linear-gradient('.$pix_directions_arr[$gradient_direction]['-webkit'].esc_attr($pix_gradient).');background: -o-linear-gradient('.$pix_directions_arr[$gradient_direction]['-o-linear'].esc_attr($pix_gradient).');background: -moz-linear-gradient('.$pix_directions_arr[$gradient_direction]['-moz-linear'].esc_attr($pix_gradient).');background: linear-gradient('.$pix_directions_arr[$gradient_direction]['linear'].esc_attr($pix_gradient).');opacity:'.esc_attr($gradient_opacity).';}</style>");
});
';
}
wp_add_inline_script( 'exproduct-custom', $pix_gradient_style );
$sect_color = $sect_rgba = '';
if( $pix_gradient_class != '') {
	$output .= '<span class="vc_row-overlay ' . esc_attr($pix_gradient_class) . '" ></span>';
}else{
	$decor_dg = preg_split('/\{/', $css);
	preg_match_all( '/{([^\}]+)/i', $css, $matches, PREG_OFFSET_CAPTURE );
	if(isset($matches[1][0][0])){
		foreach( explode( ';', $matches[1][0][0] ) as $val ){
			if( substr_count($val, 'background')>0 && substr_count($val, 'rgba')>0 ){
				foreach( explode( ' ', $val ) as $val_exp ){
					if( substr_count($val_exp, 'rgba')>0 ){
						$sect_rgba = $val_exp;
						$output .= '<span class="vc_row-overlay" style="background-color: '.$val_exp.' !important;"></span>';
					}
				}
			}
			if( substr_count($val, 'background')>0 && substr_count($val, '#')>0 ){
				foreach( explode( ' ', $val ) as $val_exp ){
					if( substr_count($val_exp, '#')>0 ){
						$sect_color = $val_exp;
						$pix_sep_element = isset($decor_dg[0]) ? '
jQuery(function($){
    $("head").append("<style> '.$decor_dg[0]. ' .section-heading.white-heading .sep-element:after{ background: '.$val_exp.';}</style>");
});' : '';
						wp_add_inline_script( 'exproduct-custom', $pix_sep_element );
					}
				}
			}
		}
	}
}

$output .= wpb_js_remove_wpautop( $content );

if( $bgstyle == 'jarallax' ){
	$output .= '</div></div>';
}
if( !empty($bgimage) ){
	$output .= '</div>';
}

if($pdecor){
	$section_decors = vc_param_group_parse_atts( $atts['section_decors'] );
	foreach($section_decors as $val){
		$pix_decor_class = isset($css_id[0]) && $css_id[0] != '' ? 'pix-decor-shape-'.$val['decor_position'].'-'.$css_id[0] : 'pix-decor-shape-'.rand();
		if(!isset($val['decor_color']))
			$decor_color = $sect_color ? $sect_color : ( $sect_rgba ? $sect_rgba : '#ffffff');
		else
			$decor_color = $val['decor_color'];
		$pix_decor_height = isset($val['decor_height']) ? $val['decor_height'] : 100;
		$pix_decor_type = isset($val['decor_type']) ? $val['decor_type'] : 'v';
		$output .= '
			<div class="section-decor-wrap '.esc_attr($val['decor_position']).'" style="'.esc_attr($val['decor_position']).': -'.esc_attr($val['decor_height']).'px; height:'.esc_attr($val['decor_height']).'px">
			    <svg width="100%" height="'.esc_attr($val['decor_height']).'px">
			        <defs>';
			        if($pix_decor_type == 'cloud'){
			        $output .= '
			            <pattern id="'.esc_attr($pix_decor_class).'" patternUnits="userSpaceOnUse" x="-80" y="0" width="520" height="'.esc_attr($val['decor_height']).'" >
							<g id="g4157" transform="matrix(1.0099504,0,0,1,-360.49154,245.56016)">
								<path id="path4159" fill="'.esc_attr($decor_color).'" d="M874.9-143.3
									c-10.3-11.5-28.5-19.1-49.4-19.1c-4.1,0-8.1,0.4-12.2,1.1c-11.2-29.4-48.9-50.9-94.2-50.9c-21.4,0-40.7,4.7-56.5,12.9
									c-7.6-25.8-40.7-45.2-79.4-45.2c-37.2,0-68.2,17.2-77.9,41.2c-4.6-0.7-9.2-1.1-14.3-1.1c-33.1,0-60.1,19-60.1,42.3
									c0,1.4,0,3.2,0.5,4.7c-8.1-2.9-17.3-4.7-27-4.7c-20.4,0-38.6,7.4-49.1,18.7l-0.1,38.9l519.5,0L874.9-143.3L874.9-143.3z"/>
							</g>
		                </pattern>
			        ';
			        } else {
			        $output .= '
			            <pattern id="'.esc_attr($pix_decor_class).'" preserveAspectRatio="none" patternUnits="userSpaceOnUse" x="0" y="0" width="100%" height="900px" viewBox="0 0 100 1000">';
			            if(isset($val['decor_flip']) && $val['decor_flip'])
		                    $output .= '<polygon fill="'.esc_attr($decor_color).'" points="'.esc_attr($val['decor_peak']).',0 100,100 100,0 0,0 0,100 "></polygon>';
		                else
		                    $output .= '<polygon fill="'.esc_attr($decor_color).'" points="'.esc_attr($val['decor_peak']).',100 100,0 100,100 0,100 0,0"></polygon>';
		            $output .= '
		                </pattern>';
			        }
		$output .= '
		                </pattern>
		            </defs>
		            <rect x="0" y="0" width="100%" height="'.esc_attr($val['decor_height']).'px" fill="url(#'.esc_attr($pix_decor_class).')"></rect>
		        </svg>
			</div>
		';
	}
}

$output .= '</div>';
$output .= $after_output;

echo $output;