<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  data-scrolling-animations="true">
<?php wp_body_open(); ?>
<?php
	$post_ID = isset ($wp_query) ? $wp_query->get_queried_object_id() : get_the_ID();
	$exproduct_page_layout = get_post_meta($post_ID, 'page_layout', 1) != '' ? get_post_meta($post_ID, 'page_layout', 1) : exproduct_get_option('style_general_settings_layout', 'normal');
	if( class_exists( 'WooCommerce' ) ){
		$post_ID = $post_ID ? $post_ID : get_option( 'wc_shop_page_id' );
	}
	$exproduct_woo_layout = get_post_meta($post_ID, 'pix_woo_layout', 1) != '' ? get_post_meta($post_ID, 'pix_woo_layout', 1) : exproduct_get_option('woo_layout', 'default');
	
	if( class_exists( 'WooCommerce' ) && exproduct_is_woo_page() && exproduct_get_option('exproduct_woo_header_global','1') ){
		$post_ID = get_option( 'wc_shop_page_id' ) ? get_option( 'wc_shop_page_id' ) : $post_ID;
	} elseif (!is_page_template('page-home.php') && get_option('page_for_posts') != ''){
		$post_ID = get_option('page_for_posts') ? get_option('page_for_posts') : 0;
	}

	$exproduct_header = apply_filters('exproduct_header_settings', $post_ID);

	$exproduct_global_color = exproduct_get_option('style_settings_global_color', '1')
	            && (exproduct_get_option('style_settings_main_color', get_option('exproduct_default_main_color')) != get_option('exproduct_default_main_color')
                    || exproduct_get_option('style_settings_additional_color', get_option('exproduct_default_additional_color')) != get_option('exproduct_default_additional_color')
                    ) ? 'global-customizer-color' : '';
?>

<?php if( (exproduct_get_option('general_settings_loader','useall') == 'usemain' && is_front_page()) || exproduct_get_option('general_settings_loader','useall') == 'useall' ) : ?>
<!-- Loader -->
	<div id="page-preloader"><div class="loader-center"><span class="loader05"></span></div></div>
<!-- Loader end -->
<?php endif; ?>
    


<div class="layout <?php echo esc_attr($exproduct_global_color); ?> animated-css page-layout-<?php echo esc_attr($exproduct_page_layout); ?> woo-layout-<?php echo esc_attr($exproduct_woo_layout); ?>" >

<?php
	if ( $exproduct_header['header_search'] ) {
		include(get_template_directory() . '/templates/header/header_menu/search.php');
	}
	if ( in_array($exproduct_header['header_menu_add_position'], array('left', 'right', 'top', 'bottom'))  && $exproduct_header['header_type'] != 'header3' ) {
		include(get_template_directory() . '/templates/header/header_menu/slide.php');
	}
	?>
	<div data-off-canvas="slidebar-5 left overlay" class="mobile-slidebar-menu">
		<button class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button">
			<span class="toggle-menu-button-icon"><span></span> <span></span> <span></span> <span></span>
				<span></span> <span></span></span>
		</button>
		<?php
			if ( has_nav_menu( 'mobile_nav' ) ) {
				wp_nav_menu(array(
					'theme_location'  => 'mobile_nav',
	                'container'       => false,
	                'menu_id'		  => 'mobile-menu',
	                'menu_class'      => 'nav navbar-nav'
				));
			} else {
				echo exproduct_site_menu('yamm main-menu nav navbar-nav');
			}
		?>
	</div>
	<?php
	if ( $exproduct_header['header_menu_add_position'] == 'screen' && $exproduct_header['header_type'] != 'header3' ) {
		include(get_template_directory() . '/templates/header/header_menu/full-screen.php');
	}
?>

<?php if($exproduct_header['header_sidebar_view'] == 'fixed') : ?>
	<!-- FIXED SIDEBAR MENU  -->
	<div class="wrap-left-open ">
<?php endif; ?>

<?php
	if($exproduct_header['header_type'] == 'header3')
		exproduct_get_theme_header($exproduct_header['header_type']);
?>

<?php if($exproduct_header['header_menu_animation'] == 'reveal') : ?>
	<!-- ========================== -->
	<!-- CONTAINER SLIDE MENU  -->
	<!-- ========================== -->
	<div data-canvas="container">
<?php endif; ?>

<?php
	if($exproduct_header['header_type'] != 'header3')
		exproduct_get_theme_header($exproduct_header['header_type']);

	if( exproduct_get_option('shop_header_slider','') && class_exists( 'WooCommerce' ) && is_shop() ){
		echo '<div class="shop-slider-container">';
		putRevSlider( exproduct_get_option('shop_header_slider') );
		if( exproduct_get_option('tab_bottom_decor', '1') ) {
			echo '
			<div class="section-decor-wrap bottom" >
				<svg width = "100%" height = "90px" >
					<defs >
						<pattern id = "decor-shape-header" preserveAspectRatio = "none" patternUnits = "userSpaceOnUse" x = "0" y = "0" width = "100%" height = "900px" viewBox = "0 0 100 1000" >
							<polygon fill = "#ffffff" points = "50,100 50,100 100,0 100,100 0,100 0,0  " ></polygon >
						</pattern >
					</defs >
					<rect x = "0" y = "0" width = "100%" height = "90px" fill = "url(#decor-shape-header)" ></rect >
				</svg >
			</div >
			';
		}
		echo '</div>';
	} elseif (!is_page_template('page-home.php'))  {
		exproduct_load_block('header/header_bgimage');
	}
?>








