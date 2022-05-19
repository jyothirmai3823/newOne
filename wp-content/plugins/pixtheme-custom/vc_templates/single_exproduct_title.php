<?php 
// template for exproduct not standart title
	$out = $image = '';
	$title_link_type = 'anchor-link';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
	
	if ($title_alignment == 'Center') {$alignment_class = 'text-center';} else {$alignment_class = '';}
	if ($title_color_mode == 'White') {$color_mode_class = 'ui-title-block_mod-a '; $color2_mode_class = 'btn-title_mod-a'; } else {$color_mode_class = ''; $color2_mode_class = '';}
?>


<h2 class="ui-title-block <?php echo esc_attr($alignment_class).' '.esc_attr($color_mode_class);  ?>">
	<span class="ui-title-block__inner"><span class="ui-title-block__brand"><?php echo esc_attr($brand_title1); ?></span><?php echo esc_attr($brand_title2); ?></span>
	<?php echo esc_attr($brand_subtitle); ?>
</h2>
<?php if ($title_button_text) { ?>
	<div class="title-btn-wrap <?php echo esc_attr($alignment_class).' '.esc_attr($color_mode_class);  ?> <?php echo esc_attr($color2_mode_class); ?>"><a class="btn-title btn-effect <?php echo esc_attr($title_link_type); ?>" href="<?php echo esc_url($title_button_link); ?>"><?php echo esc_attr($title_button_text); ?></div></a>
<?php } ?>

