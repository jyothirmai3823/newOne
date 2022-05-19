<?php
	
	function exproduct_customize_shop_tab($wp_customize, $theme_name){

		$exproduct_pix_slider = array( 0 => esc_html__( 'No RevSlider', 'exproduct' ) );
		if (class_exists('RevSlider')) {
			$arr = array( 0 => esc_html__( 'No RevSlider', 'exproduct' ) );

			$pix_sliders 	= new RevSlider();
			$pix_arrSliders = $pix_sliders->getArrSliders();

			foreach($pix_arrSliders as $slider){
			  $arr[$slider->getAlias()] = $slider->getTitle();
			}
			if($arr){
			  $exproduct_pix_slider = $arr;
			}

		}

		$wp_customize->add_section( 'exproduct_shop_settings' , array(
		    'title'      => esc_html__( 'Shop', 'exproduct' ),
		    'priority'   => 50,
		) );



		$wp_customize->add_setting( 'exproduct_shop_header_slider' , array(
			'default'     => 0,
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'exproduct_shop_header_slider',
			array(
					'label'    => esc_html__( 'Header RevSlider On Main Shop Page', 'exproduct' ),
					'section'  => 'exproduct_shop_settings',
					'settings' => 'exproduct_shop_header_slider',
					'type'     => 'select',
					'choices'  => $exproduct_pix_slider,
					'priority' => 10
			)
		);

		$wp_customize->add_setting( 'exproduct_shop_header_image' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
        $wp_customize->add_control(
	        new WP_Customize_Image_Control(
	            $wp_customize,
	            'exproduct_shop_header_image',
				array(
				   'label'      => esc_html__( 'Header Image', 'exproduct' ),
				   'section'    => 'exproduct_shop_settings',
				   'context'    => 'exproduct_shop_header_image',
				   'settings'   => 'exproduct_shop_header_image',
				   'priority'   => 20
				)
	       )
	    );

	    $wp_customize->add_setting( 'exproduct_shop_settings_global_product' , array(
			'default'     => 'on',
			'transport'   => 'refresh',
			'sanitize_callback' => 'exproduct_sanitize_onoff'
		) );
		$wp_customize->add_control(
			'exproduct_shop_settings_global_product',
			array(
				'label'    => esc_html__( 'Global sidebar settings for Product pages', 'exproduct' ),
				'section'  => 'exproduct_shop_settings',
				'settings' => 'exproduct_shop_settings_global_product',
				'description' => esc_html__( 'Global sidebar settings for all Product pages.', 'exproduct' ),
				'type'     => 'select',
				'choices'  => array(
					'on'  => esc_html__( 'On', 'exproduct' ),
					'off'  => esc_html__( 'Off', 'exproduct' ),
				),
				'priority'   => 30
			)
		);

		$wp_customize->add_setting( 'exproduct_shop_settings_sidebar_type' , array(
			'default'     => '2',
			'transport'   => 'refresh',
			'sanitize_callback' => 'exproduct_sanitize_sidebar_blog_type'
		) );
		$wp_customize->add_control(
			'exproduct_shop_settings_sidebar_type',
			array(
				'label'    => esc_html__( 'Product sidebar type', 'exproduct' ),
				'section'  => 'exproduct_shop_settings',
				'settings' => 'exproduct_shop_settings_sidebar_type',
				'description' => esc_html__( 'Select sidebar type for Product pages.', 'exproduct' ),
				'type'     => 'select',
				'choices'  => array(
					'1' => esc_html__( 'Full width', 'exproduct' ),
					'2' => esc_html__( 'Right Sidebar', 'exproduct' ),
					'3' => esc_html__( 'Left Sidebar', 'exproduct' ),
				),
				'priority' => 40
			)
		);

		$wp_customize->add_setting( 'exproduct_shop_settings_sidebar_content' , array(
			'default'     => 'product-sidebar-1',
			'transport'   => 'refresh',
			'sanitize_callback' => 'exproduct_sanitize_sidebar_blog_content'
		) );
		$wp_customize->add_control(
			'exproduct_shop_settings_sidebar_content',
			array(
				'label'    => esc_html__( 'Product sidebar content', 'exproduct' ),
				'section'  => 'exproduct_shop_settings',
				'settings' => 'exproduct_shop_settings_sidebar_content',
				'description' => esc_html__( 'Select sidebar content for product pages', 'exproduct' ),
				'type'     => 'select',
				'choices'  => array(
					'sidebar-1' => esc_html__( 'WP Default Sidebar', 'exproduct' ),
					'global-sidebar-1' => esc_html__( 'Blog Sidebar', 'exproduct' ),
					'portfolio-sidebar-1' => esc_html__( 'Portfolio Sidebar', 'exproduct' ),
					'shop-sidebar-1' => esc_html__( 'Shop Sidebar', 'exproduct' ),
					'product-sidebar-1' => esc_html__( 'Product Sidebar', 'exproduct' ),
					'custom-area-1' => esc_html__( 'Custom Area', 'exproduct' ),
				),
				'priority' => 50
			)
		);

		$wp_customize->add_setting( 'exproduct_shop_settings_checkout' , array(
			'default'     => 'off',
			'transport'   => 'refresh',
			'sanitize_callback' => 'exproduct_sanitize_onoff'
		) );
		$wp_customize->add_control(
			'exproduct_shop_settings_checkout',
			array(
				'label'    => esc_html__( 'Checkout without Cart', 'exproduct' ),
				'section'  => 'exproduct_shop_settings',
				'settings' => 'exproduct_shop_settings_checkout',
				'description' => esc_html__( 'Add to cart go to checkout', 'exproduct' ),
				'type'     => 'select',
				'choices'  => array(
					'on'  => esc_html__( 'On', 'exproduct' ),
					'off'  => esc_html__( 'Off', 'exproduct' ),
				),
				'priority'   => 60
			)
		);


				
	}
?>