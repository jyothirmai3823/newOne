<?php
function exproduct_fonts_url($post_id) {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/

	$main_font = get_post_meta($post_id, 'page_google_font', 1);
	$main_font_title = get_post_meta($post_id, 'page_google_font_title', 1);
	$main_font_subtitle = get_post_meta($post_id, 'page_google_font_subtitle', 1);
	$exproduct_font = exproduct_get_option('font', get_option('exproduct_default_font'));
	$exproduct_font_weights = exproduct_get_option('font_weights', get_option('exproduct_default_font_weights'));
	$exproduct_title = exproduct_get_option('title_font', get_option('exproduct_default_title'));
	$exproduct_title_weights = exproduct_get_option('title_font_weights', get_option('exproduct_default_title_weights'));
	$exproduct_subtitle = exproduct_get_option('subtitle_font', get_option('exproduct_default_subtitle'));
	$exproduct_subtitle_weights = exproduct_get_option('subtitle_font_weights', get_option('exproduct_default_subtitle_weights'));

    $exproduct = _x( 'on', 'Roboto fonts: on or off', 'exproduct' );

	if ( 'off' !== $exproduct || $main_font != '' || $main_font_title != '') {
		$font_families = array();

        if ( 'off' !== $exproduct ) {
			$font_families[] = 'Roboto+Condensed:400,700|Roboto+Mono|Roboto:400,500,700';
		}

		if ( $main_font != '' ) {
			$font_families[] = $main_font;
		}

		if ( $main_font_title != '' ) {
			$font_families[] = $main_font_title;
		}

		if( $exproduct_font != '' ) {
			$cf = $exproduct_font;
			if ( $exproduct_font_weights != '' )
				$cf .= ':'.$exproduct_font_weights;
			$font_families[] = $cf;
		}

		if( $exproduct_title != '' ) {
			$cf = $exproduct_title;
			if ( $exproduct_title_weights != '' )
				$cf .= ':'.$exproduct_title_weights;
			$font_families[] = $cf;
		}

		if( $exproduct_subtitle != '' ) {
			$cf = $exproduct_subtitle;
			if ( $exproduct_subtitle_weights != '' )
				$cf .= ':'.$exproduct_subtitle_weights;
			$font_families[] = $cf;
		}

		$query_args = array(
			'family' => str_replace('%2B', '+', urlencode( implode( '|', $font_families ) )),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

add_filter('woocommerce_enqueue_styles', 'exproduct_load_woo_styles');
function exproduct_load_woo_styles($styles){
	if (isset($styles['woocommerce-general']) && isset($styles['woocommerce-general']['src'])){
		$styles['woocommerce-general']['src'] = get_template_directory_uri() . '/assets/woocommerce/css/woocommerce.css';
	}
	return $styles;
}


function exproduct_load_styles(){

    wp_enqueue_style('style', get_stylesheet_uri());

    /* PRIMARY CSS */
	if (exproduct_get_option('general_settings_responsive','1')){
		wp_enqueue_style('exproduct-responsive', get_template_directory_uri() . '/css/responsive.css');
	}else{
		wp_enqueue_style('exproduct-no-responsive', get_template_directory_uri() . '/css/no-responsive.css');
	}
    wp_enqueue_style('exproduct-fonts', exproduct_fonts_url(get_the_ID()), array(), null );
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/animate/animate.css');
	wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/assets/owl/css/owl.carousel.css');
    wp_enqueue_style('bxslider', get_template_directory_uri() . '/assets/bxslider/jquery.bxslider.css');
    wp_enqueue_style('flexslider', get_template_directory_uri(). '/assets/flexslider/flexslider.css');
	wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/fancybox/jquery.fancybox.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('pe-icon-7-stroke', get_template_directory_uri() . '/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css');
        
	wp_enqueue_style('flaticon-font', get_template_directory_uri() . '/fonts/flaticon/css/flaticon.css');
    
	wp_enqueue_style('exproduct-main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('exproduct-blog', get_template_directory_uri() . '/css/blog.css');

	/* HEADER CSS */
	wp_enqueue_style('exproduct-header', get_template_directory_uri() . '/assets/header/header.css');
	wp_enqueue_style('exproduct-header-yamm', get_template_directory_uri() . '/assets/header/yamm.css');

	// Grid Portfolio
	wp_register_style('exproduct-grid', get_template_directory_uri() . '/assets/grid/grid.css');

	/* THEME CSS */
    wp_enqueue_style('exproduct-supply', get_template_directory_uri() . '/css/vc/supply.css');
    wp_enqueue_style('exproduct-single', get_template_directory_uri() . '/css/vc/single.css');
    
    wp_enqueue_style('exproduct-woocommerce-layout', get_template_directory_uri() . '/assets/woocommerce/css/woocommerce-layout.css');

    //wp_enqueue_style('exproduct-dynamic-styles', admin_url('admin-ajax.php').'?action=dynamic_styles&pageID='.get_the_ID());
    
    
     ob_start();
    include( get_template_directory().'/library/theme/dynamic-styles.php' );
	$dynamic_styles = ob_get_contents();
	ob_clean();		
	
	wp_add_inline_style( 'exproduct-single', $dynamic_styles );

}
add_action('wp_enqueue_scripts', 'exproduct_load_styles');




        
        
        function exproduct_load_scripts(){
            
            
 

	wp_register_script('exproduct-single-product', get_template_directory_uri() . '/woocommerce/assets/js/single-product.js', array() , '1.0', true);
    wp_register_script('exproduct-add-to-cart-variation', get_template_directory_uri() . '/woocommerce/assets/js/add-to-cart-variation.js', array() , '1.0', true);

    wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/lib/waypoints.min.js', array('jquery') , '', false);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr.js', array('jquery') , '', false);
     if ( class_exists( 'PixthemeCustom' ) ){
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery') , '', false);
            
     }   
        
    wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/assets/owl/js/owl.carousel.min.js', array() , '1.0', true);
    wp_enqueue_script('bxslider', get_template_directory_uri() . '/assets/bxslider/jquery.bxslider.min.js', array() , '1.0', true);
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/flexslider/jquery.flexslider.js', array('jquery') , '1.0', true);
    wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/isotope/isotope.pkgd.min.js', array() , '1.0', true);
    wp_enqueue_script('isotope-images', get_template_directory_uri() . '/assets/isotope/imagesLoaded.js', array() , '1.0', true);
    wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/fancybox/jquery.fancybox.js', array() , '1.0', true);
    wp_enqueue_script('animate-wow', get_template_directory_uri() . '/assets/animate/wow.min.js', array() , '1.0', true);
    wp_enqueue_script('scrollreveal', get_template_directory_uri() . '/assets/animate/scrollreveal.min.js', array() , '1.0', true);
    wp_enqueue_script('shuffleLetters', get_template_directory_uri() . '/assets/letters/jquery.shuffleLetters.js', array() , '1.0', true);
    wp_enqueue_script('typed', get_template_directory_uri() . '/assets/letters/typed.js', array() , '1.0', true);
    wp_enqueue_script('scrollie', get_template_directory_uri() . '/assets/animate/jquery.scrollie.min.js', array() , '1.0', true);
    wp_enqueue_script('pricing', get_template_directory_uri() . '/assets/pricing/js/pricing.js', array() , '1.0', true);


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    /* HEADER JS */
    wp_enqueue_script('exproduct-slidebar', get_template_directory_uri() . '/assets/header/slidebar.js', array('jquery') , '1.0', false);
	wp_enqueue_script('exproduct-header', get_template_directory_uri() . '/assets/header/header.js', array('jquery') , '1.0', true);
	wp_enqueue_script('exproduct-slidebars', get_template_directory_uri() . '/assets/header/slidebars.js', array('jquery') , '1.0', true);
    
	// Jarallax
	wp_register_script('jarallax', get_template_directory_uri() . '/assets/jarallax/jarallax.js', array('jquery') , '1.0', true);

	// Grid Portfolio
	wp_register_script('exproduct-grid', get_template_directory_uri() . '/assets/grid/grid.js', array('jquery') , '1.0', true);

    // CUSTOM SCRIPT
    wp_enqueue_script('exproduct-custom', get_template_directory_uri() . '/js/custom.js', array() , '1.1', true);

}


    add_action('wp_enqueue_scripts', 'exproduct_load_scripts');    
        
 
   



        
        
       


add_filter('exproduct_grid_portfolio_enq', 'exproduct_portfolio_enqueue');
function exproduct_portfolio_enqueue() {
	wp_enqueue_style( 'exproduct-grid' );
    wp_enqueue_script( 'exproduct-grid' );
}


//add_filter('body_class','exproduct_browser_body_class');
function exproduct_browser_body_class($classes = '') {
    $classes[] = 'animated-css';
    $classes[] = 'layout-switch';

    if (exproduct_get_option('header_settings_type')){
        $headerType = exproduct_get_option('header_settings_type');
        $classes[] =  'home-construction-v' . $headerType;

    }

    return $classes;
}

?>