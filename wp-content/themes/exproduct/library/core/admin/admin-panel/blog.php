<?php
    function exproduct_customize_blog_tab($wp_customize, $theme_name){

        $wp_customize->add_section( 'exproduct_blog_settings' , array(
            'title'      => esc_html__( 'Blog', 'exproduct' ),
            'priority'   => 65,
        ) );

        $wp_customize->add_setting( 'exproduct_blog_settings_date' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'exproduct_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );
        
		$wp_customize->add_setting( 'exproduct_blog_settings_author_name' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'exproduct_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_setting( 'exproduct_blog_settings_author' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'exproduct_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_setting( 'exproduct_blog_settings_comments' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'exproduct_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );

        $wp_customize->add_setting( 'exproduct_blog_settings_categories' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'exproduct_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_setting( 'exproduct_blog_settings_tags' , array(
			'default'     => '1',
			'transport'   => 'refresh',
            'theme_supports' => 'exproduct_customize_opt',
		    'sanitize_callback' => 'esc_attr',
		) );
		
        $wp_customize->add_setting( 'exproduct_blog_settings_share' , array(
            'default'     => '1',
            'transport'   => 'refresh',
            'theme_supports' => 'exproduct_customize_opt',
            'sanitize_callback' => 'esc_attr',
        ) );
        
        $wp_customize->add_setting( 'exproduct_blog_settings_readmore' , array(
            'default'     => esc_html__( 'Read more', 'exproduct' ),
            'transport'   => 'refresh',
            'theme_supports' => 'exproduct_customize_opt',
		    'sanitize_callback' => 'esc_html',
        ) );


        $wp_customize->add_control(
            'exproduct_blog_settings_date',
            array(
                'label'    => esc_html__( 'Display Date on blog posts', 'exproduct' ),
                'section'  => 'exproduct_blog_settings',
                'settings' => 'exproduct_blog_settings_date',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'Off', 'exproduct' ),
                    '1' => esc_html__( 'On', 'exproduct' ),
                ),
                'priority'   => 50
            )
        );
        
        $wp_customize->add_control(
            'exproduct_blog_settings_author_name',
            array(
                'label'    => esc_html__( 'Display Author name on blog page and single post', 'exproduct' ),
                'section'  => 'exproduct_blog_settings',
                'settings' => 'exproduct_blog_settings_author_name',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'Off', 'exproduct' ),
                    '1' => esc_html__( 'On', 'exproduct' ),
                ),
                'priority'   => 60
            )
        );
        
        $wp_customize->add_control(
            'exproduct_blog_settings_author',
            array(
                'label'    => esc_html__( 'Display About Author block on single post', 'exproduct' ),
                'section'  => 'exproduct_blog_settings',
                'settings' => 'exproduct_blog_settings_author',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'Off', 'exproduct' ),
                    '1' => esc_html__( 'On', 'exproduct' ),
                ),
                'priority'   => 70
            )
        );
        
        $wp_customize->add_control(
            'exproduct_blog_settings_comments',
            array(
                'label'    => esc_html__( 'Display Comments on single post', 'exproduct' ),
                'section'  => 'exproduct_blog_settings',
                'settings' => 'exproduct_blog_settings_comments',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'Off', 'exproduct' ),
                    '1' => esc_html__( 'On', 'exproduct' ),
                ),
                'priority'   => 80
            )
        );
        
        $wp_customize->add_control(
            'exproduct_blog_settings_categories',
            array(
                'label'    => esc_html__( 'Display Categories', 'exproduct' ),
                'section'  => 'exproduct_blog_settings',
                'settings' => 'exproduct_blog_settings_categories',
                'type'     => 'select',
                'choices'  => array(
                    '0'  => esc_html__( 'Off', 'exproduct' ),
                    '1' => esc_html__( 'On', 'exproduct' ),
                ),
                'priority'   => 90
            )
        );
        
        $wp_customize->add_control(
            'exproduct_blog_settings_tags',
            array(
                'label'    => esc_html__( 'Display Tags', 'exproduct' ),
                'section'  => 'exproduct_blog_settings',
                'settings' => 'exproduct_blog_settings_tags',
                'type'     => 'select',
                'choices'  => array(
                    'off'  => esc_html__( 'Off', 'exproduct' ),
                    'on' => esc_html__( 'On', 'exproduct' ),
                ),
                'priority'   => 100
            )
        );
        
        $wp_customize->add_control(
            'exproduct_blog_settings_share',
            array(
                'label'    => esc_html__( 'Display share buttons on single post', 'exproduct' ),
                'section'  => 'exproduct_blog_settings',
                'settings' => 'exproduct_blog_settings_share',
                'type'     => 'select',
                'choices'  => array(
                    'off'  => esc_html__( 'Off', 'exproduct' ),
                    'on' => esc_html__( 'On', 'exproduct' ),
                ),
                'priority'   => 110
            )
        );
        


        $wp_customize->add_control(
            'exproduct_blog_settings_readmore',
            array(
                'label'    => esc_html__( 'Read More button text', 'exproduct' ),
                'section'  => 'exproduct_blog_settings',
                'settings' => 'exproduct_blog_settings_readmore',
                'type'     => 'textfield',
                'priority'   => 10
            )
        );


    }
?>