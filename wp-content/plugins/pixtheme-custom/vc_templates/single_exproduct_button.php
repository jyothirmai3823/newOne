<?php 
// template for exproduct not standart title
	$out = $image = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
    $href = vc_build_link( $exp_btn_link );
    $target = empty($href['target']) ? '' : 'target="'.esc_attr($href['target']).'"';

	// alignment
	if ($exp_btn_align == 'Center') {
		$open_align = '<div class = "text-center">';
		$close_align = '</div>';
	} elseif($exp_btn_align == 'Right') {
		$open_align = '<div class = "text-right">';
		$close_align = '</div>';
	} else {
		$open_align = '';
		$close_align = '';
	}

	// color style
	if ($exp_btn_color == 'Orange') {
		$btn_color_class = 'btn_mod-orange btn_mod-c ';
	} elseif ($exp_btn_color == "Grey") {
		$btn_color_class = 'btn_mod-simple btn_mod-c btn-effect';
	} else{
		$btn_color_class = 'btn_mod-blue btn_mod-c';
	}
	
	// button size
	if ($exp_btn_size == 'Small') {
		$size_class = 'btn-sm';
	} elseif ($exp_btn_size == 'Medium') {
		$size_class = '';
	} else{
		$size_class = 'btn-lg';
	}
?>

<?php echo $open_align; ?>
<a <?php echo wp_kses_post($target); ?> class="<?php echo esc_attr($btn_color_class); ?> <?php echo esc_attr($size_class); ?>" href="<?php echo esc_url($href['url']); ?>"><?php echo esc_attr($exp_btn_text); ?></a>
<?php echo $close_align; ?>
