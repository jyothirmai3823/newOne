<?php
	$out = $image = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );


	// first img
	$img1 = wp_get_attachment_image_src( $watch_auto_image1, 'large');
	$img_output1 = (isset($img1[0]))?$img1[0]:'';

	// second img
	$img2 = wp_get_attachment_image_src( $watch_auto_image2, 'large');
	$img_output2 = (isset($img2[0]))?$img2[0]:'';
	
	// third img
	$img3 = wp_get_attachment_image_src( $watch_auto_image3, 'large');
	$img_output3 = (isset($img3[0]))?$img3[0]:'';

	$all_images = array($img_output1, $img_output2, $img_output3);

?>





 <div class="slider-4 owl-carousel owl-theme enable-owl-carousel" data-pagination="false" data-navigation="false" data-single-item="true" data-auto-play="5000" data-transition-style="fade" data-main-text-animation="true" data-after-init-delay="3000" data-after-move-delay="1000" data-stop-on-hover="true">
    <img class="img-responsive" src="<?php echo esc_url($img_output1); ?>" alt="slider">
    <img class="img-responsive" src="<?php echo esc_url($img_output2); ?>" alt="slider2">
</div>