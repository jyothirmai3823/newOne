<?php

if ( is_customize_preview()  ) {
	function exproduct_customizer_preview_css() {

		$exproduct_main_color = exproduct_get_option('style_settings_main_color', get_option('exproduct_default_main_color'));
		$exproduct_additional_color = exproduct_get_option('style_settings_additional_color', get_option('exproduct_default_additional_color'));

		$tab_bg_image_fixed = exproduct_get_option('tab_bg_image_fixed', '0');
		$tab_bg_color = exproduct_get_option('tab_bg_color', '#000000');//exproduct_hex2rgb(exproduct_get_option('tab_bg_color', '#000000'));
		$tab_bg_color_gradient = exproduct_get_option('tab_bg_color_gradient', '');
		$tab_gradient_direction = exproduct_get_option('tab_gradient_direction', 'to right');
		$tab_bg_opacity = exproduct_get_option('tab_bg_opacity', '0.7');
		$tab_padding_top = exproduct_get_option('tab_padding_top', '50');
		$tab_padding_bottom = exproduct_get_option('tab_padding_bottom', '50');
		$tab_margin_bottom = exproduct_get_option('tab_margin_bottom', '50');
		$tab_border = exproduct_get_option('tab_border', '1');

		?>
		<style type="text/css">
			<?php
			if($tab_bg_color != '' && $tab_bg_color_gradient != ''){
				$gradient_direction = $tab_gradient_direction == '' ? 'to right' : $tab_gradient_direction;
				//$gradient_angle = $tab_bg_color_gradient == '' ? '90' : $tab_bg_color_gradient;
				$pix_directions_arr = array(
						'to right' => array('-webkit' => 'left', '-o-linear' => 'right', '-moz-linear' => 'right', 'linear' => 'to right',),
						'to left' => array('-webkit' => 'right', '-o-linear' => 'left', '-moz-linear' => 'left', 'linear' => 'to left',),
						'to bottom' => array('-webkit' => 'top', '-o-linear' => 'bottom', '-moz-linear' => 'bottom', 'linear' => 'to bottom',),
						'to top' => array('-webkit' => 'bottom', '-o-linear' => 'top', '-moz-linear' => 'top', 'linear' => 'to top',),
						'to bottom right' => array('-webkit' => 'left top', '-o-linear' => 'bottom right', '-moz-linear' => 'bottom right', 'linear' => 'to bottom right',),
						'to bottom left' => array('-webkit' => 'right top', '-o-linear' => 'bottom left', '-moz-linear' => 'bottom left', 'linear' => 'to bottom left',),
						'to top right' => array('-webkit' => 'left bottom', '-o-linear' => 'top right', '-moz-linear' => 'top right', 'linear' => 'to top right',),
						'to top left' => array('-webkit' => 'right bottom', '-o-linear' => 'top left', '-moz-linear' => 'top left', 'linear' => 'to top left',),
						//'angle' => array('-webkit' => $gradient_angle.'deg', '-o-linear' => $gradient_angle.'deg', '-moz-linear' => $gradient_angle.'deg', 'linear' => $gradient_angle.'deg',),

				);

				$pix_gradient = ', '.$tab_bg_color.','.$tab_bg_color_gradient;

				?>

				html .header-section span.vc_row-overlay{
					background: <?php echo esc_attr($tab_bg_color)?>; /* For browsers that do not support gradients */
					background: -webkit-linear-gradient(<?php echo esc_attr($pix_directions_arr[$gradient_direction]['-webkit'].$pix_gradient)?>); /*Safari 5.1-6*/
					background: -o-linear-gradient(<?php echo esc_attr($pix_directions_arr[$gradient_direction]['-o-linear'].$pix_gradient)?>); /*Opera 11.1-12*/
					background: -moz-linear-gradient(<?php echo esc_attr($pix_directions_arr[$gradient_direction]['-moz-linear'].$pix_gradient)?>); /*Fx 3.6-15*/
					background: linear-gradient(<?php echo esc_attr($pix_directions_arr[$gradient_direction]['linear'].$pix_gradient)?>); /*Standard*/
					opacity: <?php echo esc_attr($tab_bg_opacity)?>;
				}

				<?php
			} else {
			?>
			html .header-section span.vc_row-overlay{
				background-color: <?php echo esc_attr($tab_bg_color); ?> !important;
				opacity: <?php echo esc_attr($tab_bg_opacity)?>;
			}
			<?php
			}
			?>

			html .header-section{
				padding: <?php echo esc_attr($tab_padding_top)?>px 0 <?php echo esc_attr($tab_padding_bottom)?>px;
				margin-bottom: <?php echo esc_attr($tab_margin_bottom)?>px;
			    border-bottom: <?php if($tab_border) : ?> 6px solid <?php echo esc_attr($exproduct_main_color) ?> <?php else : ?> none <?php endif; ?>;
			    <?php if($tab_bg_image_fixed) : ?>
			    background-attachment: fixed;
			    <?php endif; ?>
			}


		</style>
		<?php
	}
	add_action( 'wp_head', 'exproduct_customizer_preview_css' );
}