<?php 
	/**  Theme_index  **/

	/* Include library Theme files */

    include_once( get_template_directory() . '/library/theme/styles_scripts.php' );
    include_once( get_template_directory() . '/library/theme/functions.php' );
    include_once( get_template_directory() . '/library/theme/blog.php' );
    include_once( get_template_directory() . '/library/theme/filters.php' );
    include_once( get_template_directory() . '/library/theme/import.php' );
    include_once( get_template_directory() . '/library/theme/comment_walker.php' );
    include_once( get_template_directory() . '/library/theme/menu_walker.php' );
    include_once( get_template_directory() . '/library/theme/portfolio_walker.php' );
    include_once( get_template_directory() . '/library/theme/customizer.php' );
    include_once( get_template_directory() . '/library/theme/vc_templates.php' );
    include_once( get_template_directory() . '/library/theme/woo.php' );
    include_once( get_template_directory() . '/library/theme/defaults.php' );
    include_once( get_template_directory() . '/library/about.php');



	add_action('after_setup_theme', 'exproduct_theme_support_setup');
	function exproduct_theme_support_setup(){
		add_theme_support('exproduct_customize_opt');
		add_theme_support('default_customize_opt');
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		
		add_image_size('exproduct-thumb', 70, 70, false);
		// Define various thumbnail sizes
		add_image_size('exproduct-post-thumb', 420, 280);
		$width = ( ( exproduct_get_option( 'portfolio_settings_thumb_width', '555' ) ) &&
					 is_numeric( exproduct_get_option( 'portfolio_settings_thumb_width', '555' ) ) &&
					 exproduct_get_option( 'portfolio_settings_thumb_width', '555' ) > 0
				 ) ? exproduct_get_option( 'portfolio_settings_thumb_width', '555' ) : 555;
		$height = ( ( exproduct_get_option( 'portfolio_settings_thumb_height', '555' ) ) &&
					 is_numeric( exproduct_get_option( 'portfolio_settings_thumb_height', '555' ) ) &&
					 exproduct_get_option( 'portfolio_settings_thumb_height', '555' ) > 0
				 ) ? exproduct_get_option( 'portfolio_settings_thumb_height', '555' ) : 555;
		add_image_size('exproduct-portfolio-thumb', $width, $height, true);
		add_image_size('exproduct-portfolio-single', 620);
		add_image_size('exproduct-services-thumb', 350, 233, true);
	}

	if ( ! isset( $content_width ) ) {
		$content_width = 1200;
	}

?>