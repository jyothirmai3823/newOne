<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $buttype
 * @var $border_color 
 * @var $title
 * @var $titlefont
 * @var $type
 * @var $icon_pixelegant
 * @var $icon_pixflaticon
 * @var $icon_pixicomoon
 * @var $icon_pixfontawesome
 * @var $icon_pixsimple
 * @var $icon_fontawesome
 * @var $icon_openiconic
 * @var $icon_typicons
 * @var $icon_entypo
 * @var $icon_linecons
 * @var $but_desc
 * @var $link
 * @var $title2
 * @var $titlefont2
 * @var $icon2
 * @var $but_desc2
 * @var $link2
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_Block_Title
 */
 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );


$link = vc_build_link( $banner_link );

$href = isset($link['http']) ? $link['http'] : '#';


$img = wp_get_attachment_image_src( $image, 'full' );
$bannerClassName = ($buttype == 'buttom') ? 1 : 0;

if ($buttype == 'type3'){
    $bannerClassName = 5 . ' home-construction-v5';
}

$imgSrc = '';
if ($img && is_array($img))
	$imgSrc = reset($img);

$out = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '<div>';	

$out .= '<div class="banner-type'.esc_attr($bannerClassName).'"><div class="pix-row">';

if($buttype == 'buttom'){
	
	$out .= '<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 clearfix">
		<img class="discount-image" src="'.esc_url($imgSrc).'" alt="'.wp_kses_post($pb_title).'">
	</div>
	<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 clearfix">
		<div class="discount-info">
			<span class="discount-info_small_txt font-third font-weight-bold text-uppercase">'.wp_kses_post($su_title).'</span>
			<span class="discount-info_shadow_txt text-shadow font-additional font-weight-bold text-uppercase customColor" >'.wp_kses_post($title).'</span>
			<span class="discount-info_right_txt text-right font-additional font-weight-bold text-uppercase">
				<span class="arrow_right" aria-hidden="true"></span>
				'.wp_kses_post($pb_title).'
			</span>
			<a href="'.esc_url($href).'" class="discount-info_link button-border font-additional font-weight-bold customBorderColor text-uppercase hvr-rectangle-out before-bg hover-focus-bg">'.wp_kses_post($button_title).'</a>
		</div>
	</div>';
	
	
	
}elseif ($buttype == 'type3') {
	$out .= '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 clearfix">
							<img class="discount-image" src="'.esc_url($imgSrc).'" alt="'.wp_kses_post($pb_title).'" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 clearfix">
							<div class="discount-banner-info">
								<span class="discount-banner-info_small_txt text-shadow font-additional font-weight-normal text-uppercase customColor wow fadeInRight" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">'.wp_kses_post($su_title).'</span>
								<span class="discount-banner-info_shadow_txt text-shadow font-additional font-weight-bold text-uppercase customColor wow fadeInRight" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">'.wp_kses_post($title).'</span>
								<span class="discount-banner-info_subtitle font-additional font-weight-bold text-uppercase wow fadeInRight" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">'.wp_kses_post($pb_title).'</span>
								<a href="'.esc_url($href).'" class="discount-info_link button-border font-additional font-weight-bold customBorderColor text-uppercase hvr-rectangle-out before-bg wow fadeInRight hover-focus-bg" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">'.wp_kses_post($button_title).'</a>
							</div>
						</div>';
}else{
	
	$out .= '<div class="banner-item grid">
						<figure class="effect-bubba">
							<img src="'.esc_url($imgSrc).'" alt="'.wp_kses_post($pb_title).'">
							<figcaption>
								<h2 class="font-third font-weight-light text-uppercase color-main">'.wp_kses_post($su_title).'</h2>
								<div class="font-additional font-weight-bold text-uppercase customColor">'.wp_kses_post($title).'</div>
								<p class="font-third font-weight-light text-uppercase color-main line-text line-text_white">'.wp_kses_post($pb_title).'</p>
								<a href="'.esc_url($href).'">'.esc_html__("View more","exproduct").'</a>
							</figcaption>			
						</figure>
					</div>';
	
	
}

$out .= '</div></div></div>';
	
echo $out;