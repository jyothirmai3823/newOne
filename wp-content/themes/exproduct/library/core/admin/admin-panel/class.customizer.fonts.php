<?php 

if( class_exists( 'WP_Customize_Control' ) ) :
	class Exproduct_Google_Fonts_Control extends WP_Customize_Control {
 
		public function render_content() {

//		echo '<p><select class="rwmb-select" name="pix-google-font" id="pix-google-font" />
//			<option value="">'.esc_html__('Select Google Font', 'exproduct').'</option>
//		  </select>
//		  <input type="hidden" id="pix-google-family" name="page_google_font" value="'.esc_attr(str_replace('+', ' ', $sel_f[0])).'">
//		  <input type="hidden" id="pix-font-variants" value="'.esc_attr($fv).'">
//		  </p>
//		  <div id="pix-font-content"></div>';

		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> class="pix-google-font" data-value="<?php echo esc_attr( $this->value() ) ?>">
					<option value=""><?php esc_html_e('Select Google Font', 'exproduct') ?></option>
				</select>
			</label>
		<?php
		}
	}
endif;

if( class_exists( 'WP_Customize_Control' ) ) :
	class Exproduct_Google_Font_Weight_Control extends WP_Customize_Control {

		public $hidden_class = '';
		public $container_class = '';

		public function render_content() {

//		echo '<p><select class="rwmb-select" name="pix-google-font" id="pix-google-font" />
//			<option value="">'.esc_html__('Select Google Font', 'exproduct').'</option>
//		  </select>
//		  <input type="hidden" id="pix-google-family" name="page_google_font" value="'.esc_attr(str_replace('+', ' ', $sel_f[0])).'">
//		  <input type="hidden" id="pix-font-variants" value="'.esc_attr($fv).'">
//		  </p>
//		  <div id="pix-font-content"></div>';

		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="text" <?php $this->link(); ?> id="<?php echo esc_attr( $this->hidden_class ) ?>" value="<?php echo esc_attr( $this->value() ) ?>">
			</label>
			<div id="<?php echo esc_attr( $this->container_class ) ?>" class="pix-font-wight-content"></div>
		<?php
		}
	}
endif;

if( class_exists( 'WP_Customize_Control' ) ) :
	class Exproduct_Google_Font_Weight_Single_Control extends WP_Customize_Control {

		public $container_class = '';

		public function render_content() {

//		echo '<p><select class="rwmb-select" name="pix-google-font" id="pix-google-font" />
//			<option value="">'.esc_html__('Select Google Font', 'exproduct').'</option>
//		  </select>
//		  <input type="hidden" id="pix-google-family" name="page_google_font" value="'.esc_attr(str_replace('+', ' ', $sel_f[0])).'">
//		  <input type="hidden" id="pix-font-variants" value="'.esc_attr($fv).'">
//		  </p>
//		  <div id="pix-font-content"></div>';

		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> id="<?php echo esc_attr( $this->container_class ) ?>_weight" data-value="<?php echo esc_attr( $this->value() ) ?>">
					<option value=""><?php esc_html_e('Default', 'exproduct') ?></option>
				</select>
			</label>
		<?php
		}
	}
endif;