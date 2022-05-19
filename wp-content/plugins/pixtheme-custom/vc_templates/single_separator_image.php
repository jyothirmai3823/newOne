<?php

	$out = $image = '';
    extract(shortcode_atts(array(
		'image'=>''
    ), $atts));
	
	$img = wp_get_attachment_image_src( $image, 'large' );
	$img_output = (isset($img[0]))?$img[0]:'';
?>


<section class="borderTopSeparator">
	<div class="container relative">
		<div class="smallLogo" style="background-image: url('<?php echo esc_url($img_output) ?>')"></div>
	</div>
</section>	