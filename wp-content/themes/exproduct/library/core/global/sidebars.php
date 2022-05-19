<?php 


function exproduct_init_sidebars(){
	if ( function_exists('register_sidebar') ){
	
		register_sidebar(array(
			'name' => esc_html__('WP Default Sidebar', 'exproduct'),
			'id'	=> 'sidebar-1',
			'before_widget' => '<div id="%1$s" class="%2$s widget block_content">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title"><span>',
			'after_title' => '</span></h4>',
		));
	
		register_sidebar(array(
			'name' => esc_html__('Blog Sidebar', 'exproduct'),
			'id' => 'global-sidebar-1',
			'before_widget' => '<div id="%1$s" class="%2$s widget block_content">',
			'before_title' => '<h4 class="widget-title"><span>',
			'after_title' => '</span></h4>',
			'after_widget' => '</div>',
		));

		register_sidebar(array(
			'name' => esc_html__('Portfolio Sidebar', 'exproduct'),
			'id' => 'portfolio-sidebar-1',
			'before_widget' => '<div id="%1$s" class="%2$s widget block_content">',
			'before_title' => '<h4 class="widget-title"><span>',
			'after_title' => '</span></h4>',
			'after_widget' => '</div>',
		));

		register_sidebar(array(
			'name' => esc_html__('Services Sidebar', 'exproduct'),
			'id' => 'services-sidebar-1',
			'before_widget' => '<div id="%1$s" class="%2$s widget block_content">',
			'before_title' => '<h4 class="widget-title"><span>',
			'after_title' => '</span></h4>',
			'after_widget' => '</div>',
		));

		register_sidebar(array(
			'name' => esc_html__('Shop sidebar', 'exproduct'),
			'id'	=> 'shop-sidebar-1',
			'before_widget' => '<div id="%1$s" class="%2$s widget block_content">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title"><span>',
			'after_title' => '</span></h4>',
		));

		register_sidebar(array(
			'name' => esc_html__('Product sidebar', 'exproduct'),
			'id'	=> 'product-sidebar-1',
			'before_widget' => '<div id="%1$s" class="%2$s widget block_content">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title"><span>',
			'after_title' => '</span></h4>',
		));

		register_sidebar(array(
			'name' => esc_html__('Custom Area', 'exproduct'),
			'id'	=> 'custom-area-1',
			'before_widget' => '<div id="%1$s" class="%2$s widget block_content">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title"><span>',
			'after_title' => '</span></h4>',
		));
		
		
		
	}
}


add_action('widgets_init','exproduct_init_sidebars');