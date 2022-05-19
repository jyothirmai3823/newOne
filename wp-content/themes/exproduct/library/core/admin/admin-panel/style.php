<?php

function exproduct_customize_style_tab($wp_customize, $theme_name) {

	$wp_customize->add_panel('exproduct_style_panel',  array(
        'title' => 'Style',
        'priority' => 25,
        )
    );



	/// COLOR SETTINGS ///

	$wp_customize->add_section( 'exproduct_style_general_settings' , array(
	    'title'      => esc_html__( 'Layout', 'exproduct' ),
	    'priority'   => 10,
		'panel' => 'exproduct_style_panel'
	) );


	$wp_customize->add_setting( 'exproduct_style_general_settings_layout' , array(
        'default'     => 'normal',
        'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control(
        'exproduct_style_general_settings_layout',
        array(
            'label'    => esc_html__( 'Page Layout', 'exproduct' ),
            'section'  => 'exproduct_style_general_settings',
            'settings' => 'exproduct_style_general_settings_layout',
            'type'     => 'select',
            'choices'  => array(
                'normal'  => esc_html__( 'Normal', 'exproduct' ),
                'full-width' => esc_html__( 'Full Width', 'exproduct' ),
		        'boxed' => esc_html__( 'Boxed', 'exproduct' ),
            ),
            'priority'   => 10,
        )
    );



	/// COLOR SETTINGS ///

	$wp_customize->add_section( 'exproduct_style_settings' , array(
	    'title'      => esc_html__( 'Color', 'exproduct' ),
	    'priority'   => 20,
		'panel' => 'exproduct_style_panel'
	) );


	$wp_customize->add_setting(
		'exproduct_style_settings_main_color',
		array(
			'default' => get_option('exproduct_default_main_color'),
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'exproduct_style_settings_main_color',
			array(
				'label' => esc_html__( 'Main Color', 'exproduct' ),
				'section' => 'exproduct_style_settings',
				'settings' => 'exproduct_style_settings_main_color',
				'priority'   => 10
			)
		)
	);
	
	$wp_customize->add_setting(
		'exproduct_style_settings_gradient_color',
		array(
			'default' => get_option('exproduct_default_gradient_color'),
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'exproduct_style_settings_gradient_color',
			array(
				'label' => esc_html__( 'Gradient Color', 'exproduct' ),
				'section' => 'exproduct_style_settings',
				'settings' => 'exproduct_style_settings_gradient_color',
				'priority'   => 15
			)
		)
	);
	
	$wp_customize->add_setting(
		'exproduct_style_settings_additional_color',
		array(
			'default' => get_option('exproduct_default_additional_color'),
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'exproduct_style_settings_additional_color',
			array(
				'label' => esc_html__( 'Additional Color', 'exproduct' ),
				'section' => 'exproduct_style_settings',
				'settings' => 'exproduct_style_settings_additional_color',
				'priority'   => 20
			)
		)
	);

	$wp_customize->add_setting(
		'exproduct_style_settings_bg_color',
		array(
			'default' => '',
			'transport'   => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'exproduct_style_settings_bg_color',
			array(
				'label' => esc_html__( 'Background Color', 'exproduct' ),
				'section' => 'exproduct_style_settings',
				'settings' => 'exproduct_style_settings_bg_color',
				'priority'   => 30
			)
		)
	);

	$wp_customize->add_setting( 'exproduct_style_settings_global_color', array(
			'default'     => '1',
			'transport'   => 'refresh',
			'sanitize_callback' => 'exproduct_sanitize_checkbox'
		)
	);
    $wp_customize->add_control(	'exproduct_style_settings_global_color', array(
		  'label' => esc_html__( 'Use Global Color', 'exproduct' ),
		  'type' => 'checkbox',
		  'section' => 'exproduct_style_settings',
		  'settings' => 'exproduct_style_settings_global_color',
		  'description' => esc_html__( 'For all imported row sections', 'exproduct' ),
		  'priority'   => 150
		)
	);



	/// FONT SETTINGS ///

	$wp_customize->add_section( 'exproduct_style_font_settings' , array(
		'title'      => esc_html__( 'Fonts', 'exproduct' ),
		'priority'   => 30,
		'panel' => 'exproduct_style_panel',
	) );


	$wp_customize->add_setting( 'exproduct_font_api' , array(
		'default'     => 'AIzaSyAAChcJ6xYHmHRRTRMvt9GLCXeQG1qasV4',
		'transport'   => 'refresh',
		'sanitize_callback' => 'esc_attr'
	) );
    $wp_customize->add_control(
        'exproduct_font_api',
        array(
			'label' => esc_html__( 'Google Font Api Key', 'exproduct' ),
			'type' => 'text',
			'section' => 'exproduct_style_font_settings',
			'settings' => 'exproduct_font_api',
			'priority'   => 10
		)
	);

	$wp_customize->add_setting( 'exproduct_font' , array(
		'default'     => get_option('exproduct_default_font'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'esc_attr'
	) );
    $wp_customize->add_control(
        new Exproduct_Google_Fonts_Control(
			$wp_customize,
			'exproduct_font',
			array(
				'label' => esc_html__( 'Font', 'exproduct' ),
				'section' => 'exproduct_style_font_settings',
				'settings' => 'exproduct_font',
				'priority'   => 20
			)
		)
	);

	$wp_customize->add_setting( 'exproduct_font_weights' , array(
		'default'     => get_option('exproduct_default_font_weights'),
		'transport'   => 'postMessage',
		'sanitize_callback' => 'esc_attr'
	) );
    $wp_customize->add_control(
        new Exproduct_Google_Font_Weight_Control(
			$wp_customize,
			'exproduct_font_weights',
			array(
				'label' => esc_html__( 'Font Variants to Load', 'exproduct' ),
				'section' => 'exproduct_style_font_settings',
				'settings' => 'exproduct_font_weights',
				'hidden_class' => 'font_value',
				'container_class' => 'font',
				'priority'   => 30
			)
		)
	);

	$wp_customize->add_setting( 'exproduct_font_weight' , array(
		'default'     => get_option('exproduct_default_font_weight'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'exproduct_sanitize_text'
	) );
    $wp_customize->add_control(
        new Exproduct_Google_Font_Weight_Single_Control(
			$wp_customize,
			'exproduct_font_weight',
			array(
			    'label' => esc_html__( 'Font Weight', 'exproduct' ),
				'section' => 'exproduct_style_font_settings',
				'settings' => 'exproduct_font_weight',
				'container_class' => 'font',
				'priority'   => 40
			)
        )
	);


	$wp_customize->add_setting( 'exproduct_title_font' , array(
		'default'     => get_option('exproduct_default_title'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'exproduct_sanitize_text'
	) );
    $wp_customize->add_control(
        new Exproduct_Google_Fonts_Control(
			$wp_customize,
			'exproduct_title_font',
			array(
				'label' => esc_html__( 'Title Font', 'exproduct' ),
				'section' => 'exproduct_style_font_settings',
				'settings' => 'exproduct_title_font',
				'priority'   => 50
			)
		)
	);

	$wp_customize->add_setting( 'exproduct_title_font_weights' , array(
		'default'     => get_option('exproduct_default_title_weights'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'exproduct_sanitize_text'
	) );
    $wp_customize->add_control(
        new Exproduct_Google_Font_Weight_Control(
			$wp_customize,
			'exproduct_title_font_weights',
			array(
				'label' => esc_html__( 'Title Font Variants to Load', 'exproduct' ),
				'section' => 'exproduct_style_font_settings',
				'settings' => 'exproduct_title_font_weights',
				'hidden_class' => 'title_font_value',
				'container_class' => 'title_font',
				'priority'   => 60
			)
		)
	);

	$wp_customize->add_setting( 'exproduct_title_font_weight' , array(
		'default'     => get_option('exproduct_default_title_weight'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'exproduct_sanitize_text'
	) );
    $wp_customize->add_control(
        new Exproduct_Google_Font_Weight_Single_Control(
			$wp_customize,
			'exproduct_title_font_weight',
			array(
			    'label' => esc_html__( 'Title Font Weight', 'exproduct' ),
				'section' => 'exproduct_style_font_settings',
				'settings' => 'exproduct_title_font_weight',
				'container_class' => 'title_font',
				'priority'   => 70
			)
        )
	);


	$wp_customize->add_setting( 'exproduct_subtitle_font' , array(
		'default'     => get_option('exproduct_default_subtitle'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'exproduct_sanitize_text'
	) );
    $wp_customize->add_control(
        new Exproduct_Google_Fonts_Control(
			$wp_customize,
			'exproduct_subtitle_font',
			array(
				'label' => esc_html__( 'Subtitle Font', 'exproduct' ),
				'section' => 'exproduct_style_font_settings',
				'settings' => 'exproduct_subtitle_font',
				'priority'   => 80
			)
		)
	);

	$wp_customize->add_setting( 'exproduct_subtitle_font_weights' , array(
		'default'     => get_option('exproduct_default_subtitle_weights'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'exproduct_sanitize_text'
	) );
    $wp_customize->add_control(
        new Exproduct_Google_Font_Weight_Control(
			$wp_customize,
			'exproduct_subtitle_font_weights',
			array(
				'label' => esc_html__( 'Subtitle Font Variants to Load', 'exproduct' ),
				'section' => 'exproduct_style_font_settings',
				'settings' => 'exproduct_subtitle_font_weights',
				'hidden_class' => 'subtitle_font_value',
				'container_class' => 'subtitle_font',
				'priority'   => 90
			)
		)
	);

	$wp_customize->add_setting( 'exproduct_subtitle_font_weight' , array(
		'default'     => get_option('exproduct_default_subtitle_weight'),
		'transport'   => 'refresh',
		'sanitize_callback' => 'exproduct_sanitize_text'
	) );
    $wp_customize->add_control(
        new Exproduct_Google_Font_Weight_Single_Control(
			$wp_customize,
			'exproduct_subtitle_font_weight',
			array(
			    'label' => esc_html__( 'Subtitle Font Weight', 'exproduct' ),
				'section' => 'exproduct_style_font_settings',
				'settings' => 'exproduct_subtitle_font_weight',
				'container_class' => 'subtitle_font',
				'priority'   => 100
			)
        )
	);


}

