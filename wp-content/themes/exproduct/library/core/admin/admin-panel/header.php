<?php

	function exproduct_header_type_callback( $control ) {
	    if ( $control->manager->get_setting('exproduct_header_type')->value() == 'header3' ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function exproduct_header_type12_callback( $control ) {
	    if ( $control->manager->get_setting('exproduct_header_type')->value() != 'header3' ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function exproduct_header_background_callback( $control ) {
	    if (  in_array($control->manager->get_setting('exproduct_header_background')->value(), array('trans-white', 'trans-black')) ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function exproduct_header_menu_callback( $control ) {
	    if (  $control->manager->get_setting('exproduct_header_menu')->value() != 0 ) {
	        return true;
	    } else {
	        return false;
	    }
	}

	function exproduct_customize_header_tab($wp_customize, $theme_name){

		$wp_customize->add_panel('exproduct_header_panel',  array(
            'title' => 'Header',
            'priority' => 30,
            )
        );


		$wp_customize->add_section( 'exproduct_header_settings' , array(
		    'title'      => esc_html__( 'General Settings', 'exproduct' ),
		    'priority'   => 5,
			'panel' => 'exproduct_header_panel'
		) );

		$wp_customize->add_setting( 'exproduct_header_type' , array(
				'default'     => 'header1',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_type',
            array(
                'label'    => esc_html__( 'Type', 'exproduct' ),
                'section'  => 'exproduct_header_settings',
                'settings' => 'exproduct_header_type',
                'type'     => 'select',
                'choices'  => array(
                    'header1'  => esc_html__( 'Classic', 'exproduct' ),
                    'header2' => esc_html__( 'Shop', 'exproduct' ),
		            'header3' => esc_html__( 'Sidebar', 'exproduct' ),
                ),
                'priority'   => 10
            )
        );


		$wp_customize->add_setting( 'exproduct_header_sidebar_view' , array(
				'default'     => 'fixed',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_sidebar_view',
            array(
                'label'    => esc_html__( 'Sidebar View', 'exproduct' ),
                'section'  => 'exproduct_header_settings',
                'settings' => 'exproduct_header_sidebar_view',
                'type'     => 'select',
                'choices'  => array(
                    'fixed'  => esc_html__( 'Fixed', 'exproduct' ),
                    'horizontal' => esc_html__( 'Horizontal Button', 'exproduct' ),
		            'vertical' => esc_html__( 'Vertical Button', 'exproduct' ),
                ),
                'active_callback' => 'exproduct_header_type_callback',
                'priority'   => 20
            )
        );


		$wp_customize->add_setting( 'exproduct_header_sticky' , array(
				'default'     => '0',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_sticky',
            array(
                'label'         => esc_html__( 'Behavior', 'exproduct' ),
                'section'       => 'exproduct_header_settings',
                'settings'      => 'exproduct_header_sticky',
                'type'          => 'select',
                'choices'       => array(
                    '0' => esc_html__( 'Default', 'exproduct' ),
                    'sticky'  => esc_html__( 'Sticky', 'exproduct' ),
		            'fixed'  => esc_html__( 'Fixed', 'exproduct' ),
                ),
                'priority'   => 30
            )
        );


		$wp_customize->add_setting( 'exproduct_header_menu' , array(
				'default'     => '1',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_menu',
            array(
                'label'    => esc_html__( 'Menu', 'exproduct' ),
                'section'  => 'exproduct_header_settings',
                'settings' => 'exproduct_header_menu',
                'type'     => 'select',
                'choices'  => array(
                    '1'  => esc_html__( 'On', 'exproduct' ),
                    '0' => esc_html__( 'Off', 'exproduct' ),
                ),
                'priority'   => 40
            )
        );


		$wp_customize->add_setting( 'exproduct_header_menu_add' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$args = array(
			'taxonomy' => 'nav_menu',
			'hide_empty' => true,
		);
		$menus = get_terms( $args );
		$menus_arr = array();
		$menus_arr[''] = esc_html__( 'Select Menu', 'exproduct' );
		foreach ($menus as $key => $value) {
			if(is_object($value)) {
				$menus_arr[$value->term_id] = $value->name;
			}
		}
        $wp_customize->add_control(
            'exproduct_header_menu_add',
            array(
                'label'         => esc_html__( 'Additional Menu', 'exproduct' ),
                'section'       => 'exproduct_header_settings',
                'settings'      => 'exproduct_header_menu_add',
                'type'          => 'select',
                'choices'       => $menus_arr,
                'active_callback' => 'exproduct_header_type12_callback',
                'priority'   => 50
            )
        );


		$wp_customize->add_setting( 'exproduct_header_menu_add_position' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_menu_add_position',
            array(
                'label'    => esc_html__( 'Additional Menu Position', 'exproduct' ),
                'section'  => 'exproduct_header_settings',
                'settings' => 'exproduct_header_menu_add_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left Sidebar', 'exproduct' ),
                    'right' => esc_html__( 'Right Sidebar', 'exproduct' ),
		            'top' => esc_html__( 'Top Sidebar', 'exproduct' ),
		            'bottom'  => esc_html__( 'Bottom Sidebar', 'exproduct' ),
                    'screen' => esc_html__( 'Full Screen', 'exproduct' ),
		            'disable' => esc_html__( 'Disabled', 'exproduct' ),
                ),
                'active_callback' => 'exproduct_header_type12_callback',
                'priority'   => 60
            )
        );
		
		
		$wp_customize->add_setting( 'exproduct_header_like_blog' , array(
				'default'     => '0',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_like_blog',
            array(
                'label'    => esc_html__( 'Inner page Header like Blog', 'exproduct' ),
                'section'  => 'exproduct_header_settings',
                'settings' => 'exproduct_header_like_blog',
                'type'     => 'select',
                'choices'  => array(
                    '0' => esc_html__( 'Off', 'exproduct' ),
                    '1'  => esc_html__( 'On', 'exproduct' ),
                ),
                'priority'   => 65
            )
        );
		

        $wp_customize->add_setting( 'exproduct_header_advanced_page' , array(
				'default'     => '0',
				'transport'   => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_advanced_page',
            array(
                'label'    => esc_html__( 'Advanced Options on Page', 'exproduct' ),
                'description'   => '',
                'section'  => 'exproduct_header_settings',
                'settings' => 'exproduct_header_advanced_page',
                'type'     => 'select',
                'choices'  => array(
                    '0' => esc_html__( 'Off', 'exproduct' ),
                    '1'  => esc_html__( 'On', 'exproduct' ),
                ),
                'priority'   => 70
            )
        );



		/// HEADER STYLE ///

		$wp_customize->add_section( 'exproduct_header_settings_style' , array(
		    'title'      => esc_html__( 'Style', 'exproduct' ),
		    'priority'   => 10,
			'panel' => 'exproduct_header_panel'
		) );


		$wp_customize->add_setting( 'exproduct_header_layout' , array(
				'default'     => 'normal',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_layout',
            array(
                'label'    => esc_html__( 'Layout', 'exproduct' ),
                'section'  => 'exproduct_header_settings_style',
                'settings' => 'exproduct_header_layout',
                'type'     => 'select',
                'choices'  => array(
                    'normal'  => esc_html__( 'Normal', 'exproduct' ),
                    'boxed' => esc_html__( 'Boxed', 'exproduct' ),
		            'full' => esc_html__( 'Full Width', 'exproduct' ),
                ),
                'priority'   => 10
            )
        );


		$wp_customize->add_setting( 'exproduct_header_background' , array(
				'default'     => 'trans-black',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_background',
            array(
                'label'    => esc_html__( 'Background', 'exproduct' ),
                'description'   => esc_html__( 'Background header color', 'exproduct' ),
                'section'  => 'exproduct_header_settings_style',
                'settings' => 'exproduct_header_background',
                'type'     => 'select',
                'choices'  => array(
                    ''  => esc_html__( 'Default', 'exproduct' ),
                    'white' => esc_html__( 'White', 'exproduct' ),
		            'black' => esc_html__( 'Black', 'exproduct' ),
	                'trans-white' => esc_html__( 'Transparent White', 'exproduct' ),
		            'trans-black' => esc_html__( 'Transparent Black', 'exproduct' ),
                ),
                'priority'   => 20
            )
        );


		$wp_customize->add_setting( 'exproduct_header_transparent' , array(
				'default'     => '4',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_transparent',
            array(
                'label'    => esc_html__( 'Transparent', 'exproduct' ),
                'section'  => 'exproduct_header_settings_style',
                'settings' => 'exproduct_header_transparent',
                'type'     => 'select',
                'choices'  => array(
                    '0' => "0.0",
					'1' => "0.1",
					'2' => "0.2",
					'3' => "0.3",
					'4' => "0.4",
					'5' => "0.5",
					'6' => "0.6",
					'7' => "0.7",
					'8' => "0.8",
					'9' => "0.9",
                ),
                'priority'   => 30
            )
        );


        $wp_customize->add_setting( 'exproduct_header_menu_animation' , array(
				'default'     => 'overlay',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_menu_animation',
            array(
                'label'         => esc_html__( 'Sidebar Menu Animation', 'exproduct' ),
                'description'   => esc_html__( 'Overlay or reveal Sidebar menu animation', 'exproduct' ),
                'section'       => 'exproduct_header_settings_style',
                'settings'      => 'exproduct_header_menu_animation',
                'type'          => 'select',
                'choices'       => array(
                    'overlay' => esc_html__( 'Overlay', 'exproduct' ),
                    'reveal'  => esc_html__( 'Reveal', 'exproduct' ),
                ),
                'priority'   => 40
            )
        );


		$wp_customize->add_setting( 'exproduct_header_hover_effect' , array(
				'default'     => '0',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_hover_effect',
            array(
                'label'    => esc_html__( 'Menu Hover Effect', 'exproduct' ),
                'section'  => 'exproduct_header_settings_style',
                'settings' => 'exproduct_header_hover_effect',
                'type'     => 'select',
                'choices'  => array(
                    '0' => esc_html__( 'Without effect', 'exproduct' ),
					'1' => "a",
					'3' => "b",
					'4' => "c",
					'6' => "d",
					'7' => "e",
					'8' => "f",
					'9' => "g",
					'11' => "h",
					'12' => "i",
		            '13' => "j",
					'14' => "k",
		            '17' => "l",
					'18' => "m",
                ),
                'active_callback' => 'exproduct_header_menu_callback',
                'priority'   => 50
            )
        );


		$wp_customize->add_setting( 'exproduct_header_marker' , array(
				'default'     => 'menu-marker-arrow',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'exproduct_header_marker',
			array(
				'label'    => esc_html__( 'Menu Markers', 'exproduct' ),
				'section'  => 'exproduct_header_settings_style',
				'settings' => 'exproduct_header_marker',
				'type'     => 'select',
				'choices'  => array(
						'menu-marker-arrow'  => esc_html__( 'Arrows', 'exproduct' ),
						'menu-marker-dot' => esc_html__( 'Dots', 'exproduct' ),
						'no-marker' => esc_html__( 'Without markers', 'exproduct' ),
				),
				'active_callback' => 'exproduct_header_menu_callback',
				'priority'   => 60
			)
		);




        /// HEADER ELEMENTS ///

		$wp_customize->add_section( 'exproduct_header_settings_elements' , array(
		    'title'      => esc_html__( 'Elements', 'exproduct' ),
		    'priority'   => 15,
			'panel' => 'exproduct_header_panel'
		) );


		$wp_customize->add_setting( 'exproduct_header_bar' , array(
				'default'     => '0',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'exproduct_header_bar',
			array(
				'label'    => esc_html__( 'Top Bar', 'exproduct' ),
				'section'  => 'exproduct_header_settings_elements',
				'settings' => 'exproduct_header_bar',
				'type'     => 'select',
				'choices'  => array(
						'1'  => esc_html__( 'On', 'exproduct' ),
						'0' => esc_html__( 'Off', 'exproduct' ),
				),
				'priority'   => 10
			)
		);


		$wp_customize->add_setting( 'exproduct_header_minicart' , array(
				'default'     => '1',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_minicart',
            array(
                'label'    => esc_html__( 'Minicart', 'exproduct' ),
                'section'  => 'exproduct_header_settings_elements',
                'settings' => 'exproduct_header_minicart',
                'type'     => 'select',
                'choices'  => array(
                    '1'  => esc_html__( 'On', 'exproduct' ),
                    '0' => esc_html__( 'Off', 'exproduct' ),
                ),
                'priority'   => 20
            )
        );


		$wp_customize->add_setting( 'exproduct_header_search' , array(
				'default'     => '1',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_search',
            array(
                'label'    => esc_html__( 'Search', 'exproduct' ),
                'section'  => 'exproduct_header_settings_elements',
                'settings' => 'exproduct_header_search',
                'type'     => 'select',
                'choices'  => array(
                    '1'  => esc_html__( 'On', 'exproduct' ),
                    '0' => esc_html__( 'Off', 'exproduct' ),
                ),
                'priority'   => 30
            )
        );


		$wp_customize->add_setting( 'exproduct_header_socials' , array(
				'default'     => '1',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_socials',
            array(
                'label'    => esc_html__( 'Socials', 'exproduct' ),
                'section'  => 'exproduct_header_settings_elements',
                'settings' => 'exproduct_header_socials',
                'type'     => 'select',
                'choices'  => array(
                    '1'  => esc_html__( 'On', 'exproduct' ),
                    '0' => esc_html__( 'Off', 'exproduct' ),
                ),
                'priority'   => 40
            )
        );




		/// HEADER ELEMENTS POSITION ///

		$wp_customize->add_section( 'exproduct_header_settings_elements_position' , array(
		    'title'      => esc_html__( 'Elements Position', 'exproduct' ),
		    'priority'   => 20,
			'panel' => 'exproduct_header_panel'
		) );


		$wp_customize->add_setting( 'exproduct_header_topbarbox_1_position' , array(
				'default'     => 'left',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_topbarbox_1_position',
            array(
                'label'    => esc_html__( 'Top Bar Email', 'exproduct' ),
                'section'  => 'exproduct_header_settings_elements_position',
                'settings' => 'exproduct_header_topbarbox_1_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'exproduct' ),
                    'right' => esc_html__( 'Right', 'exproduct' ),
                ),
                'priority'   => 50
            )
        );

		$wp_customize->add_setting( 'exproduct_header_topbarbox_2_position' , array(
				'default'     => 'right',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_topbarbox_2_position',
            array(
                'label'    => esc_html__( 'Top Bar Menu', 'exproduct' ),
                'section'  => 'exproduct_header_settings_elements_position',
                'settings' => 'exproduct_header_topbarbox_2_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'exproduct' ),
                    'right' => esc_html__( 'Right', 'exproduct' ),
                ),
                'priority'   => 60
            )
        );


		$wp_customize->add_setting( 'exproduct_header_navibox_1_position' , array(
				'default'     => 'left',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_navibox_1_position',
            array(
                'label'    => esc_html__( 'Logo', 'exproduct' ),
                'section'  => 'exproduct_header_settings_elements_position',
                'settings' => 'exproduct_header_navibox_1_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'exproduct' ),
                    'right' => esc_html__( 'Right', 'exproduct' ),
                ),
                'priority'   => 70
            )
        );


		$wp_customize->add_setting( 'exproduct_header_navibox_2_position' , array(
				'default'     => 'right',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_navibox_2_position',
            array(
                'label'    => esc_html__( 'Main Menu', 'exproduct' ),
                'section'  => 'exproduct_header_settings_elements_position',
                'settings' => 'exproduct_header_navibox_2_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'exproduct' ),
                    'right' => esc_html__( 'Right', 'exproduct' ),
                ),
                'priority'   => 80
            )
        );


		$wp_customize->add_setting( 'exproduct_header_navibox_3_position' , array(
				'default'     => 'right',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_navibox_3_position',
            array(
                'label'    => esc_html__( 'Socials And Phone', 'exproduct' ),
                'section'  => 'exproduct_header_settings_elements_position',
                'settings' => 'exproduct_header_navibox_3_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'exproduct' ),
                    'right' => esc_html__( 'Right', 'exproduct' ),
                ),
                'priority'   => 90
            )
        );


		$wp_customize->add_setting( 'exproduct_header_navibox_4_position' , array(
				'default'     => 'right',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
            'exproduct_header_navibox_4_position',
            array(
                'label'    => esc_html__( 'Minicart', 'exproduct' ),
                'section'  => 'exproduct_header_settings_elements_position',
                'settings' => 'exproduct_header_navibox_4_position',
                'type'     => 'select',
                'choices'  => array(
                    'left'  => esc_html__( 'Left', 'exproduct' ),
                    'right' => esc_html__( 'Right', 'exproduct' ),
                ),
                'priority'   => 100
            )
        );


		$wp_customize->add_setting( 'exproduct_header_adm_bar' , array(
				'default'     => '0',
				'sanitize_callback' => 'sanitize_text_field'
		) );
        $wp_customize->add_control(
            'exproduct_header_adm_bar',
            array(
                'label'    => esc_html__( 'Admin Bar Opacity', 'exproduct' ),
                'description'   => '',
                'section'  => 'exproduct_header_settings_elements_position',
                'settings' => 'exproduct_header_adm_bar',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'No', 'exproduct' ),
                    '1' => esc_html__( 'Yes', 'exproduct' ),
                ),
                'priority'   => 110
            )
        );





        /// HEADER INFO ///

		$wp_customize->add_section( 'exproduct_header_settings_info' , array(
		    'title'      => esc_html__( 'Phone and email', 'exproduct' ),
		    'priority'   => 25,
			'panel' => 'exproduct_header_panel'
		) );


		$wp_customize->add_setting( 'exproduct_header_phone' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'exproduct_header_phone',
			array(
				'label'    => esc_html__( 'Phone', 'exproduct' ),
				'section'  => 'exproduct_header_settings_info',
				'settings' => 'exproduct_header_phone',
				'type'     => 'text',
				'priority'   => 10
			)
		);


		$wp_customize->add_setting( 'exproduct_header_email' , array(
				'default'     => '',
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control(
			'exproduct_header_email',
			array(
				'label'    => esc_html__( 'Email', 'exproduct' ),
				'section'  => 'exproduct_header_settings_info',
				'settings' => 'exproduct_header_email',
				'type'     => 'text',
				'priority'   => 20
			)
		);

		
	}
		
?>