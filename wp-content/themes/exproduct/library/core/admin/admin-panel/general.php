<?php 
	
	function exproduct_customize_general_tab($wp_customize, $theme_name){
	
		$wp_customize->add_section( 'exproduct_general_settings' , array(
		    'title'      => esc_html__( 'General Settings', 'exproduct' ),
		    'priority'   => 20,
		) );
		
		
		/* logo image */ 
		
		$wp_customize->add_setting( 'exproduct_general_settings_logo' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
	        new WP_Customize_Image_Control(
	            $wp_customize,
	            'exproduct_general_settings_logo',
				array(
				   'label'      => esc_html__( 'Logo image light', 'exproduct' ),
				   'section'    => 'exproduct_general_settings',
				   'context'    => 'exproduct_general_settings_logo',
				   'settings'   => 'exproduct_general_settings_logo',
				   'priority'   => 50
				)
	       )
	    );

		$wp_customize->add_setting( 'exproduct_general_settings_logo_inverse' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
	        new WP_Customize_Image_Control(
	            $wp_customize,
	            'exproduct_general_settings_logo_inverse',
				array(
				   'label'      => esc_html__( 'Logo image dark', 'exproduct' ),
				   'section'    => 'exproduct_general_settings',
				   'context'    => 'exproduct_general_settings_logo_inverse',
				   'settings'   => 'exproduct_general_settings_logo_inverse',
				   'priority'   => 60
				)
	       )
	    );
		
		$wp_customize->add_setting( 'exproduct_general_settings_logo_text' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'exproduct_general_settings_logo_text',
			array(
				'label'    => esc_html__( 'Logo Text', 'exproduct' ),
				'section'  => 'exproduct_general_settings',
				'settings' => 'exproduct_general_settings_logo_text',
				'type'     => 'text',
				'priority'   => 70
			)
		);

		$wp_customize->add_setting( 'exproduct_general_settings_bg_image' , array(
			'default'     => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
	        new WP_Customize_Image_Control(
	            $wp_customize,
	            'exproduct_general_settings_bg_image',
				array(
				   'label'      => esc_html__( 'Background Image', 'exproduct' ),
				   'description'=> esc_html__( 'for Boxed layout', 'exproduct' ),
				   'section'    => 'exproduct_general_settings',
				   'context'    => 'exproduct_general_settings_bg_image',
				   'settings'   => 'exproduct_general_settings_bg_image',
				   'priority'   => 80
				)
	       )
	    );
		
		$wp_customize->add_setting( 'exproduct_general_settings_loader' , array(
		    'default'     => 'useall',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'exproduct_general_settings_loader',
			array(
				'label'    => esc_html__( 'Loader', 'exproduct' ),
				'section'  => 'exproduct_general_settings',
				'settings' => 'exproduct_general_settings_loader',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__( 'Off', 'exproduct' ),
					'usemain' => esc_html__( 'Use on main', 'exproduct' ),
					'useall' => esc_html__( 'Use on all pages', 'exproduct' ),
				),
				'priority'   => 110
			)
		);

		$wp_customize->add_setting( 'exproduct_general_settings_footer_social' , array(
		    'default'     => '0',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'exproduct_general_settings_footer_social',
			array(
				'label'    => esc_html__( 'Footer Socials', 'exproduct' ),
				'section'  => 'exproduct_general_settings',
				'settings' => 'exproduct_general_settings_footer_social',
				'type'     => 'select',
				'choices'  => array(
					'1'    => esc_html__( 'On', 'exproduct' ),
					'0'    => esc_html__( 'Off', 'exproduct' ),
				),
				'priority'   => 150
			)
		);
		
		
	}
	
	