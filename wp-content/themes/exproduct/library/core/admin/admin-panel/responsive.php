<?php

	function exproduct_customize_responsive_tab($wp_customize, $theme_name){
	
		$wp_customize->add_section( 'exproduct_responsive_settings' , array(
		    'title'      => esc_html__( 'Responsive', 'exproduct' ),
		    'priority'   => 35,
		) );

		$wp_customize->add_setting( 'exproduct_general_settings_responsive' , array(
		    'default'     => '',
		    'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'exproduct_mobile_sticky' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'exproduct_mobile_topbar' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'exproduct_tablet_minicart' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'exproduct_tablet_search' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'exproduct_tablet_phone' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_setting( 'exproduct_tablet_socials' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );

		

		$wp_customize->add_control(
			'exproduct_general_settings_responsive',
			array(
				'label'    => esc_html__( 'Responsive', 'exproduct' ),
				'section'  => 'exproduct_responsive_settings',
				'settings' => 'exproduct_general_settings_responsive',
				'type'     => 'select',
				'choices'  => array(
					'off'  => esc_html__( 'Off', 'exproduct' ),
					'on'   => esc_html__( 'On', 'exproduct' ),
				),
				'priority'   => 5
			)
		);

		$wp_customize->add_control(
            'exproduct_mobile_sticky',
            array(
                'label'    => esc_html__( 'Header Mobile Behavior', 'exproduct' ),
                'description'   => esc_html__( 'Off header sticky or fixed on mobile', 'exproduct' ),
                'section'  => 'exproduct_responsive_settings',
                'settings' => 'exproduct_mobile_sticky',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'exproduct' ),
                    'mobile-no-sticky' => esc_html__( 'No Sticky', 'exproduct' ),
		            'mobile-no-fixed' => esc_html__( 'No Fixed', 'exproduct' ),
                ),
                'priority'   => 10
            )
        );

        $wp_customize->add_control(
            'exproduct_mobile_topbar',
            array(
                'label'    => esc_html__( 'Header Mobile Behavior', 'exproduct' ),
                'description'   => esc_html__( 'Off header top bar on mobile', 'exproduct' ),
                'section'  => 'exproduct_responsive_settings',
                'settings' => 'exproduct_mobile_sticky',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'exproduct' ),
                    'no-mobile-topbar' => esc_html__( 'Off', 'exproduct' ),
                ),
                'priority'   => 20
            )
        );

        $wp_customize->add_control(
            'exproduct_tablet_minicart',
            array(
                'label'    => esc_html__( 'Tablet Minicart', 'exproduct' ),
                'description'   => esc_html__( 'Off header cart on tablet', 'exproduct' ),
                'section'  => 'exproduct_responsive_settings',
                'settings' => 'exproduct_tablet_minicart',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'exproduct' ),
                    'no-tablet-minicart' => esc_html__( 'Off', 'exproduct' ),
                ),
                'priority'   => 30
            )
        );

        $wp_customize->add_control(
            'exproduct_tablet_search',
            array(
                'label'    => esc_html__( 'Tablet Search', 'exproduct' ),
                'description'   => esc_html__( 'Off header search on tablet', 'exproduct' ),
                'section'  => 'exproduct_responsive_settings',
                'settings' => 'exproduct_tablet_search',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'exproduct' ),
                    'no-tablet-search' => esc_html__( 'Off', 'exproduct' ),
                ),
                'priority'   => 40
            )
        );

        $wp_customize->add_control(
            'exproduct_tablet_phone',
            array(
                'label'    => esc_html__( 'Tablet Header Phone', 'exproduct' ),
                'description'   => esc_html__( 'Off header phone on tablet', 'exproduct' ),
                'section'  => 'exproduct_responsive_settings',
                'settings' => 'exproduct_tablet_phone',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'exproduct' ),
                    'no-tablet-phone' => esc_html__( 'Off', 'exproduct' ),
                ),
                'priority'   => 50
            )
        );

        $wp_customize->add_control(
            'exproduct_tablet_socials',
            array(
                'label'    => esc_html__( 'Tablet Socials', 'exproduct' ),
                'description'   => esc_html__( 'Off header social icons on tablet', 'exproduct' ),
                'section'  => 'exproduct_responsive_settings',
                'settings' => 'exproduct_tablet_socials',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Global', 'exproduct' ),
                    'no-tablet-socials' => esc_html__( 'Off', 'exproduct' ),
                ),
                'priority'   => 60
            )
        );
		
	}
		
?>