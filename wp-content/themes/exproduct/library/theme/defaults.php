<?php 
/**  Theme defaults values  **/

add_action('after_setup_theme', 'exproduct_theme_defaults');
function exproduct_theme_defaults(){

	// Colors and Fonts
	update_option( 'exproduct_default_main_color', '#237ac6' );
	update_option( 'exproduct_default_gradient_color', '#00c8c8' );
	update_option( 'exproduct_default_additional_color', '#ed912a' );
	update_option( 'exproduct_default_font', 'Raleway' );
	update_option( 'exproduct_default_font_weights', '100,300,400,500,600,700,900' );
	update_option( 'exproduct_default_font_weight', '500' );
	update_option( 'exproduct_default_title', 'Montserrat' );
	update_option( 'exproduct_default_title_weights', '100,300,400,600,700' );
	update_option( 'exproduct_default_title_weight', '700' );
	update_option( 'exproduct_default_subtitle', 'Raleway' );
	update_option( 'exproduct_default_subtitle_weights', '400,700' );
	update_option( 'exproduct_default_subtitle_weight', '400' );

	// Header Title and Breadcrumbs
	update_option( 'exproduct_default_tab_bg_color', '#4494ec' );
	update_option( 'exproduct_default_tab_bg_color_gradient', '' );
	update_option( 'exproduct_default_tab_gradient_direction', 'to bottom' );
	update_option( 'exproduct_default_tab_bg_opacity', '0.8' );
	update_option( 'exproduct_default_tab_padding_top', '180' );
	update_option( 'exproduct_default_tab_padding_bottom', '100' );
	update_option( 'exproduct_default_tab_bottom_decor', '1' );
	update_option( 'exproduct_default_tab_border', '0' );

}

add_filter( 'exproduct_header_settings', 'exproduct_header_settings_var' );
function exproduct_header_settings_var( $post_ID=0 ){

	if(isset($post_ID) && $post_ID>0) {

		/// Header global parameters
		$exproduct['header_type'] = get_post_meta($post_ID, 'header_type', 1) != '' ? get_post_meta($post_ID, 'header_type', 1) : exproduct_get_option('header_type', 'header1');
		$exproduct['header_sidebar_view'] = $exproduct['header_type'] == 'header3' ? (get_post_meta($post_ID, 'header_sidebar_view', 1) != '' ? get_post_meta($post_ID, 'header_sidebar_view', 1) : exproduct_get_option('header_sidebar_view', 'fixed')) : '';
		$exproduct['header_background'] = get_post_meta($post_ID, 'header_background', 1) != '' ? get_post_meta($post_ID, 'header_background', 1) : (exproduct_get_option('header_background', 'white'));
		$exproduct['header_transparent'] = get_post_meta($post_ID, 'header_transparent', 1) != '' ? get_post_meta($post_ID, 'header_transparent', 1) : exproduct_get_option('header_transparent', '1');
		$exproduct['header_hover_effect'] = get_post_meta($post_ID, 'header_hover_effect', 1) != '' ? get_post_meta($post_ID, 'header_hover_effect', 1) : exproduct_get_option('header_hover_effect', '0');
		$exproduct['header_marker'] = get_post_meta($post_ID, 'header_marker', 1) != '' ? get_post_meta($post_ID, 'header_marker', 1) : exproduct_get_option('header_marker', 'menu-marker-arrow');
		$exproduct['header_layout'] = get_post_meta($post_ID, 'header_layout', 1) != '' ? get_post_meta($post_ID, 'header_layout', 1) : exproduct_get_option('header_layout', 'boxed');
		$exproduct['header_bar'] = get_post_meta($post_ID, 'header_bar', 1) != '' ? get_post_meta($post_ID, 'header_bar', 1) : exproduct_get_option('header_bar', '0');

		$exproduct['header_sticky'] = get_post_meta($post_ID, 'header_sticky', 1) != '' ? get_post_meta($post_ID, 'header_sticky', 1) : exproduct_get_option('header_sticky', '');
		$exproduct['mobile_sticky'] = get_post_meta($post_ID, 'mobile_sticky', 1) != '' ? get_post_meta($post_ID, 'mobile_sticky', 1) : exproduct_get_option('mobile_sticky', '');


		/// Header menu settings
		$exproduct['header_menu'] = get_post_meta($post_ID, 'header_menu', 1) != '' ? get_post_meta($post_ID, 'header_menu', 1) : exproduct_get_option('header_menu', '1');
		$exproduct['header_menu_add'] = get_post_meta($post_ID, 'header_menu_add', 1) != '' ? get_post_meta($post_ID, 'header_menu_add', 1) : exproduct_get_option('header_menu_add', '');
		$exproduct['header_menu_add_position'] = get_post_meta($post_ID, 'header_menu_add_position', 1) != '' ? get_post_meta($post_ID, 'header_menu_add_position', 1) : exproduct_get_option('header_menu_add_position', 'disable');
		$exproduct['header_menu_animation'] = get_post_meta($post_ID, 'header_menu_animation', 1) != '' ? get_post_meta($post_ID, 'header_menu_animation', 1) : exproduct_get_option('header_menu_animation', 'overlay');

		/// Header widgets
		$exproduct['header_minicart'] = get_post_meta($post_ID, 'header_minicart', 1) != '' ? get_post_meta($post_ID, 'header_minicart', 1) : exproduct_get_option('header_minicart', '1');
		$exproduct['header_search'] = get_post_meta($post_ID, 'header_search', 1) != '' ? get_post_meta($post_ID, 'header_search', 1) : exproduct_get_option('header_search', '1');
		$exproduct['header_socials'] = get_post_meta($post_ID, 'header_socials', 1) != '' ? get_post_meta($post_ID, 'header_socials', 1) : exproduct_get_option('header_socials', '1');


		$class = '';
		foreach ($exproduct as $key => $val) {
			if (!in_array($key, array('header_transparent', 'header_sticky', 'mobile_sticky', 'header_menu_animation')))
				$class .= $val . '-';
		}
		$exproduct['header_uniq_class'] = substr($class, 0, -1);

		$exproduct['header_phone'] = get_post_meta($post_ID, 'header_phone', 1) != '' ? get_post_meta($post_ID, 'header_phone', 1) : exproduct_get_option('header_phone', '');
		$exproduct['header_email'] = get_post_meta($post_ID, 'header_email', 1) != '' ? get_post_meta($post_ID, 'header_email', 1) : exproduct_get_option('header_email', '');

		/// Header elements position
		$exproduct['header_topbarbox_1_position'] = get_post_meta($post_ID, 'header_topbarbox_1_position', 1) != '' ? get_post_meta($post_ID, 'header_topbarbox_1_position', 1) : exproduct_get_option('header_topbarbox_1_position', 'left', 0);
		$exproduct['header_topbarbox_2_position'] = get_post_meta($post_ID, 'header_topbarbox_2_position', 1) != '' ? get_post_meta($post_ID, 'header_topbarbox_2_position', 1) : exproduct_get_option('header_topbarbox_2_position', 'right', 0);
		$exproduct['header_navibox_1_position'] = get_post_meta($post_ID, 'header_navibox_1_position', 1) != '' ? get_post_meta($post_ID, 'header_navibox_1_position', 1) : exproduct_get_option('header_navibox_1_position', 'left');
		$exproduct['header_navibox_2_position'] = get_post_meta($post_ID, 'header_navibox_2_position', 1) != '' ? get_post_meta($post_ID, 'header_navibox_2_position', 1) : exproduct_get_option('header_navibox_2_position', 'right');
		$exproduct['header_navibox_3_position'] = get_post_meta($post_ID, 'header_navibox_3_position', 1) != '' ? get_post_meta($post_ID, 'header_navibox_3_position', 1) : exproduct_get_option('header_navibox_3_position', 'right');
		$exproduct['header_navibox_4_position'] = get_post_meta($post_ID, 'header_navibox_4_position', 1) != '' ? get_post_meta($post_ID, 'header_navibox_4_position', 1) : exproduct_get_option('header_navibox_4_position', 'right');

		/// Responsive
		$exproduct['mobile_sticky'] = get_post_meta($post_ID, 'mobile_sticky', 1) != '' ? get_post_meta($post_ID, 'mobile_sticky', 1) : exproduct_get_option('mobile_sticky', '');
		$exproduct['mobile_topbar'] = get_post_meta($post_ID, 'mobile_topbar', 1) != '' ? get_post_meta($post_ID, 'mobile_topbar', 1) : exproduct_get_option('mobile_topbar', '');
		$exproduct['tablet_minicart'] = get_post_meta($post_ID, 'tablet_minicart', 1) != '' ? get_post_meta($post_ID, 'tablet_minicart', 1) : exproduct_get_option('tablet_minicart', '');
		$exproduct['tablet_search'] = get_post_meta($post_ID, 'tablet_search', 1) != '' ? get_post_meta($post_ID, 'tablet_search', 1) : exproduct_get_option('tablet_search', '');
		$exproduct['tablet_phone'] = get_post_meta($post_ID, 'tablet_phone', 1) != '' ? get_post_meta($post_ID, 'tablet_phone', 1) : exproduct_get_option('tablet_phone', '');
		$exproduct['tablet_socials'] = get_post_meta($post_ID, 'tablet_socials', 1) != '' ? get_post_meta($post_ID, 'tablet_socials', 1) : exproduct_get_option('tablet_socials', '');


		/// Logo
		$exproduct['logo'] = get_post_meta($post_ID, 'header_logo', 1) != '' ? get_post_meta($post_ID, 'header_logo', 1) : exproduct_get_option('general_settings_logo', '');
		$exproduct['logo_inverse'] = get_post_meta($post_ID, 'header_logo_inverse', 1) != '' ? get_post_meta($post_ID, 'header_logo_inverse', 1) : exproduct_get_option('general_settings_logo_inverse', '');


		return $exproduct;
	} else {

		/// Header global parameters
		$exproduct['header_type'] = 'header1';
		$exproduct['header_sidebar_view'] = 'fixed';
		$exproduct['header_background'] = 'white';
		$exproduct['header_transparent'] = '1';
		$exproduct['header_hover_effect'] = '0';
		$exproduct['header_marker'] = 'menu-marker-arrow';
		$exproduct['header_layout'] = 'boxed';
		$exproduct['header_bar'] = '0';

		$exproduct['header_sticky'] = '';
		$exproduct['mobile_sticky'] = '';

		/// Header menu settings
		$exproduct['header_menu'] = '1';
		$exproduct['header_menu_add'] = '';
		$exproduct['header_menu_add_position'] = 'disable';
		$exproduct['header_menu_animation'] = 'overlay';

		/// Header widgets
		$exproduct['header_minicart'] = '1';
		$exproduct['header_search'] = '1';
		$exproduct['header_socials'] = '1';

		$class = '';
		foreach ($exproduct as $key => $val) {
			if (!in_array($key, array('header_transparent', '', 'mobile_sticky', 'header_menu_animation')))
				$class .= $val . '-';
		}
		$exproduct['header_uniq_class'] = substr($class, 0, -1);

		$exproduct['header_phone'] = '';
		$exproduct['header_email'] = '';

		/// Header elements position
		$exproduct['header_topbarbox_1_position'] = 'left';
		$exproduct['header_topbarbox_2_position'] = 'right';
		$exproduct['header_navibox_1_position'] = 'left';
		$exproduct['header_navibox_2_position'] = 'right';
		$exproduct['header_navibox_3_position'] = 'right';
		$exproduct['header_navibox_4_position'] = 'right';

		/// Responsive
		$exproduct['mobile_sticky'] = '';
		$exproduct['mobile_topbar'] = '';
		$exproduct['tablet_minicart'] = '';
		$exproduct['tablet_search'] = '';
		$exproduct['tablet_phone'] = '';
		$exproduct['tablet_socials'] = '';

		/// Logo
		$exproduct['logo'] = '';
		$exproduct['logo_inverse'] = '';

		return $exproduct;
	}
}