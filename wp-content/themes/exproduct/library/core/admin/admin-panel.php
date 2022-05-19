<?php

	require_once(get_template_directory() . '/library/core/admin/admin-panel/class.customizer.fonts.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/general.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/style.php' );
	require_once(get_template_directory() . '/library/core/admin/admin-panel/header.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/page-tab.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/responsive.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/search.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/footer.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/shop.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/portfolio.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/services.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/blog.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/social.php');
	require_once(get_template_directory() . '/library/core/admin/admin-panel/sanitizer.php' );

	
	function exproduct_customize_register( $wp_customize ) {

		$wp_customize->remove_section('header_image');
		$wp_customize->remove_section('background_image');
		$wp_customize->remove_section('colors');

		/** GENERAL SETTINGS **/
		exproduct_customize_general_tab($wp_customize,'exproduct');


		/** STYLE SECTION **/

		exproduct_customize_style_tab($wp_customize, 'exproduct');
		
		
		/** HEADER SECTION **/

		exproduct_customize_header_tab($wp_customize,'exproduct');


		/** RESPONSIVE SECTION **/

		exproduct_customize_responsive_tab($wp_customize,'exproduct');


		/** SEARCH SECTION **/

		exproduct_customize_search_tab($wp_customize,'exproduct');


		/** PAGE TITLE AND BREADCRUMBS SECTION **/

		exproduct_customize_page_t_a_b_tab($wp_customize,'exproduct');


		/** FOOTER SECTION **/

		exproduct_customize_footer_tab($wp_customize,'exproduct');


		/** SHOP SECTION **/

		exproduct_customize_shop_tab($wp_customize,'exproduct');


		/** PORTFOLIO SECTION **/

		exproduct_customize_portfolio_tab($wp_customize, 'exproduct');


		/** SERVICES SECTION **/

		exproduct_customize_services_tab($wp_customize, 'exproduct');


		/** BLOG SECTION **/

		exproduct_customize_blog_tab($wp_customize,'exproduct');

		/** SOCIAL SECTION **/

		exproduct_customize_social_tab($wp_customize,'exproduct');

		/** Remove unused sections */

		$removedSections = apply_filters('exproduct_admin_customize_removed_sections', array('header_image','background_image'));
		foreach ($removedSections as $_sectionName){
			$wp_customize->remove_section($_sectionName);
		}

    }
    
    
	add_action( 'customize_register', 'exproduct_customize_register' );
?>