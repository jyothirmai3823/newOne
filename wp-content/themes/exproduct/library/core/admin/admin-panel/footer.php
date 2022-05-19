<?php 
	
	function exproduct_customize_footer_tab($wp_customize, $theme_name){

		$wp_customize->add_section( 'exproduct_footer_settings' , array(
		    'title'      => esc_html__( 'Footer', 'exproduct' ),
		    'priority'   => 75,
		) );

		$wp_customize->add_setting( 'exproduct_footer_settings_copyright' , array(
            'default'     => esc_html__( 'Copyright 2016. Design by Templines', 'exproduct' ),
            'transport'   => 'refresh',
		    'sanitize_callback' => 'esc_html'
        ) );

        $wp_customize->add_setting( 'exproduct_footer_socials' , array(
            'default'     => '1',
            'transport'   => 'refresh',
		    'sanitize_callback' => 'esc_html'
        ) );


        $wp_customize->add_control(
            'exproduct_footer_settings_copyright',
            array(
                'label'    => esc_html__( 'Footer Copyright Text', 'exproduct' ),
                'section'  => 'exproduct_footer_settings',
                'settings' => 'exproduct_footer_settings_copyright',
                'type'     => 'textarea',
                'priority'   => 10
            )
        );

		$wp_customize->add_control(
            'exproduct_footer_socials',
            array(
                'label'    => esc_html__( 'Show Footer Socials', 'exproduct' ),
                'section'  => 'exproduct_footer_settings',
                'settings' => 'exproduct_footer_socials',
                'type'     => 'select',
                'choices'  => array(
                    '1'  => esc_html__( 'On', 'exproduct' ),
                    '0' => esc_html__( 'Off', 'exproduct' ),
                ),
                'priority'   => 20
            )
        );

		$staticBlocks = exproduct_get_staticblock_option_array();

		$wp_customize->add_setting( 'exproduct_footer_block_top' , array(
			'default'     => '0',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_html'
		) );
		$wp_customize->add_control(
			'exproduct_footer_block_top',
			array(
				'label'    => esc_html__( 'Top Footer Block', 'exproduct' ),
				'section'  => 'exproduct_footer_settings',
				'settings' => 'exproduct_footer_block_top',
				'type'     => 'select',
				'choices'  => $staticBlocks,
				'priority' => 30
			)
		);

		$wp_customize->add_setting( 'exproduct_footer_block' , array(
			'default'     => '0',
			'transport'   => 'refresh',
			'sanitize_callback' => 'esc_html'
		) );
		$wp_customize->add_control(
			'exproduct_footer_block',
			array(
				'label'    => esc_html__( 'Bottom Footer Block', 'exproduct' ),
				'section'  => 'exproduct_footer_settings',
				'settings' => 'exproduct_footer_block',
				'type'     => 'select',
				'choices'  => $staticBlocks,
				'priority' => 40
			)
		);

	}
		
?>