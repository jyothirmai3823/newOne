<?php

	$vc_icons_data = exproduct_init_vc_icons();

	$args = array( 'hide_empty' => false );
	$categories = get_terms( $args );
	$cats = $cats_woo = $cats_serv = array();
	foreach($categories as $category){
		if( is_object($category) ){
			if( $category->taxonomy == 'portfolio_category' ){
				$cats[$category->name] = $category->term_id;
			} elseif( $category->taxonomy == 'product_cat' ) {
				$cats_woo[$category->name] = $category->term_id;
			} elseif( $category->taxonomy == 'services_category' ) {
				$cats_serv[$category->name] = $category->term_id;
			}
		}
	}

	$args = array( 'post_type' => 'services');
	$services = get_posts($args);
	$serv = array();
	if(empty($services['errors'])){
		foreach($services as $service){
			$serv[$service->post_title] = $service->ID;
		}
	}
	
	$args = array( 'post_type' => 'wpcf7_contact_form');
	$forms = get_posts($args);
	$cform7 = array();
	if(empty($forms['errors'])){
		foreach($forms as $form){		
			$cform7[$form->post_title] = $form->ID;
		}
	}

	$add_css_animation = array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'CSS Animation', 'exproduct' ),
		'param_name' => 'css_animation',
		'admin_label' => true,
		'value' => array(
			esc_html__( 'No', 'exproduct' ) => '',
			esc_html__( 'bounce', 'exproduct' ) => 'bounce',
			esc_html__( 'flash', 'exproduct' ) => 'flash',
			esc_html__( 'pulse', 'exproduct' ) => 'pulse',
			esc_html__( 'rubberBand', 'exproduct' ) => 'rubberBand',
			esc_html__( 'shake', 'exproduct' ) => 'shake',
			esc_html__( 'swing', 'exproduct' ) => 'swing',
			esc_html__( 'tada', 'exproduct' ) => 'tada',
			esc_html__( 'wobble', 'exproduct' ) => 'wobble',
			esc_html__( 'jello', 'exproduct' ) => 'jello',

			esc_html__( 'bounceIn', 'exproduct' ) => 'bounceIn',
			esc_html__( 'bounceInDown', 'exproduct' ) => 'bounceInDown',
			esc_html__( 'bounceInLeft', 'exproduct' ) => 'bounceInLeft',
			esc_html__( 'bounceInRight', 'exproduct' ) => 'bounceInRight',
			esc_html__( 'bounceInUp', 'exproduct' ) => 'bounceInUp',
			esc_html__( 'bounceOut', 'exproduct' ) => 'bounceOut',
			esc_html__( 'bounceOutDown', 'exproduct' ) => 'bounceOutDown',
			esc_html__( 'bounceOutLeft', 'exproduct' ) => 'bounceOutLeft',
			esc_html__( 'bounceOutRight', 'exproduct' ) => 'bounceOutRight',
			esc_html__( 'bounceOutUp', 'exproduct' ) => 'bounceOutUp',

			esc_html__( 'fadeIn', 'exproduct' ) => 'fadeIn',
			esc_html__( 'fadeInDown', 'exproduct' ) => 'fadeInDown',
			esc_html__( 'fadeInDownBig', 'exproduct' ) => 'fadeInDownBig',
			esc_html__( 'fadeInLeft', 'exproduct' ) => 'fadeInLeft',
			esc_html__( 'fadeInLeftBig', 'exproduct' ) => 'fadeInLeftBig',
			esc_html__( 'fadeInRight', 'exproduct' ) => 'fadeInRight',
			esc_html__( 'fadeInRightBig', 'exproduct' ) => 'fadeInRightBig',
			esc_html__( 'fadeInUp', 'exproduct' ) => 'fadeInUp',
			esc_html__( 'fadeInUpBig', 'exproduct' ) => 'fadeInUpBig',
			esc_html__( 'fadeOut', 'exproduct' ) => 'fadeOut',
			esc_html__( 'fadeOutDown', 'exproduct' ) => 'fadeOutDown',
			esc_html__( 'fadeOutDownBig', 'exproduct' ) => 'fadeOutDownBig',
			esc_html__( 'fadeOutLeft', 'exproduct' ) => 'fadeOutLeft',
			esc_html__( 'fadeOutLeftBig', 'exproduct' ) => 'fadeOutLeftBig',
			esc_html__( 'fadeOutRight', 'exproduct' ) => 'fadeOutRight',
			esc_html__( 'fadeOutRightBig', 'exproduct' ) => 'fadeOutRightBig',
			esc_html__( 'fadeOutUp', 'exproduct' ) => 'fadeOutUp',
			esc_html__( 'fadeOutUpBig', 'exproduct' ) => 'fadeOutUpBig',

			esc_html__( 'flip', 'exproduct' ) => 'flip',
			esc_html__( 'flipInX', 'exproduct' ) => 'flipInX',
			esc_html__( 'flipInY', 'exproduct' ) => 'flipInY',
			esc_html__( 'flipOutX', 'exproduct' ) => 'flipOutX',
			esc_html__( 'flipOutY', 'exproduct' ) => 'flipOutY',

			esc_html__( 'lightSpeedIn', 'exproduct' ) => 'lightSpeedIn',
			esc_html__( 'lightSpeedOut', 'exproduct' ) => 'lightSpeedOut',

			esc_html__( 'rotateIn', 'exproduct' ) => 'rotateIn',
			esc_html__( 'rotateInDownLeft', 'exproduct' ) => 'rotateInDownLeft',
			esc_html__( 'rotateInDownRight', 'exproduct' ) => 'rotateInDownRight',
			esc_html__( 'rotateInUpLeft', 'exproduct' ) => 'rotateInUpLeft',
			esc_html__( 'rotateInUpRight', 'exproduct' ) => 'rotateInUpRight',
			esc_html__( 'rotateOut', 'exproduct' ) => 'rotateOut',
			esc_html__( 'rotateOutDownLeft', 'exproduct' ) => 'rotateOutDownLeft',
			esc_html__( 'rotateOutDownRight', 'exproduct' ) => 'rotateOutDownRight',
			esc_html__( 'rotateOutUpLeft', 'exproduct' ) => 'rotateOutUpLeft',
			esc_html__( 'rotateOutUpRight', 'exproduct' ) => 'rotateOutUpRight',

			esc_html__( 'slideInUp', 'exproduct' ) => 'slideInUp',
			esc_html__( 'slideInDown', 'exproduct' ) => 'slideInDown',
			esc_html__( 'slideInLeft', 'exproduct' ) => 'slideInLeft',
			esc_html__( 'slideInRimounght', 'exproduct' ) => 'slideInRight',
			esc_html__( 'slideOutUp', 'exproduct' ) => 'slideOutUp',
			esc_html__( 'slideOutDown', 'exproduct' ) => 'slideOutDown',
			esc_html__( 'slideOutLeft', 'exproduct' ) => 'slideOutLeft',
			esc_html__( 'slideOutRight', 'exproduct' ) => 'slideOutRight',

			esc_html__( 'zoomIn', 'exproduct' ) => 'zoomIn',
			esc_html__( 'zoomInDown', 'exproduct' ) => 'zoomInDown',
			esc_html__( 'zoomInLeft', 'exproduct' ) => 'zoomInLeft',
			esc_html__( 'zoomInRight', 'exproduct' ) => 'zoomInRight',
			esc_html__( 'zoomInUp', 'exproduct' ) => 'zoomInUp',
			esc_html__( 'zoomOut', 'exproduct' ) => 'zoomOut',
			esc_html__( 'zoomOutDown', 'exproduct' ) => 'zoomOutDown',
			esc_html__( 'zoomOutLeft', 'exproduct' ) => 'zoomOutLeft',
			esc_html__( 'zoomOutRight', 'exproduct' ) => 'zoomOutRight',
			esc_html__( 'zoomOutUp', 'exproduct' ) => 'zoomOutUp',

			esc_html__( 'hinge', 'exproduct' ) => 'hinge',
			esc_html__( 'rollIn', 'exproduct' ) => 'rollIn',
			esc_html__( 'rollOut', 'exproduct' ) => 'rollOut',

		),
		'description' => esc_html__( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'exproduct' )
	);
	
	
	$add_animation = array(
		$add_css_animation,
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Duration", 'exproduct' ),
			'param_name' => 'wow_duration',
			'value' => '',
			'description' => esc_html__( 'Change the animation duration in seconds.', 'exproduct' ),
			'dependency' => array(
				'element' => 'css_animation',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Delay", 'exproduct' ),
			'param_name' => 'wow_delay',
			'value' => '',
			'description' => esc_html__( 'Delay before the animation starts in seconds.', 'exproduct' ),
			'dependency' => array(
				'element' => 'css_animation',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Offset", 'exproduct' ),
			'param_name' => 'wow_offset',
			'value' => '',
			'description' => esc_html__( 'Distance to start the animation (related to the browser bottom) in pixels.', 'exproduct' ),
			'dependency' => array(
				'element' => 'css_animation',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Iteration", 'exproduct' ),
			'param_name' => 'wow_iteration',
			'value' => '',
			'description' => esc_html__( 'Number of times the animation is repeated.', 'exproduct' ),
			'dependency' => array(
				'element' => 'css_animation',
				'not_empty' => true,
			),
		),
	);

	$add_animation_group = array(
		$add_css_animation,
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Items in Group", 'exproduct' ),
			'param_name' => 'wow_group',
			'value' => '',
			'description' => esc_html__( 'Items number in animated group.', 'exproduct' ),
			'dependency' => array(
				'element' => 'css_animation',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Group Delay Offset", 'exproduct' ),
			'param_name' => 'wow_group_delay',
			'value' => '',
			'description' => esc_html__( 'Offset delay before the next group animation starts in seconds.', 'exproduct' ),
			'dependency' => array(
				'element' => 'css_animation',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Duration", 'exproduct' ),
			'param_name' => 'wow_duration',
			'value' => '',
			'description' => esc_html__( 'Change the animation duration in seconds.', 'exproduct' ),
			'dependency' => array(
				'element' => 'css_animation',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Delay", 'exproduct' ),
			'param_name' => 'wow_delay',
			'value' => '',
			'description' => esc_html__( 'Delay before the animation starts in seconds.', 'exproduct' ),
			'dependency' => array(
				'element' => 'css_animation',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Offset", 'exproduct' ),
			'param_name' => 'wow_offset',
			'value' => '',
			'description' => esc_html__( 'Distance to start the animation (related to the browser bottom) in pixels.', 'exproduct' ),
			'dependency' => array(
				'element' => 'css_animation',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( "Iteration", 'exproduct' ),
			'param_name' => 'wow_iteration',
			'value' => '',
			'description' => esc_html__( 'Number of times the animation is repeated.', 'exproduct' ),
			'dependency' => array(
				'element' => 'css_animation',
				'not_empty' => true,
			),
		),
	);
		
	$jarallax = array(
		array(
			'type' => 'attach_image',
			'heading' => "Background Image",
			'param_name' => 'bgimage',
			'value' => '',
			'description' => esc_html__( "Background image ", 'exproduct' ),
			'group' => esc_html__( 'Row Options', 'exproduct' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => "Background Style",
			'param_name' => 'bgstyle',
			'value' => array(
				esc_html__( "Default", 'exproduct' ) => '',
				esc_html__( "Parallax", 'exproduct' ) => 'jarallax',
				esc_html__( "Fixed", 'exproduct' ) => 'attachment',
				esc_html__( "Color Scroll", 'exproduct' ) => 'scroll',
			),
			'description' => esc_html__( "Image background style", 'exproduct' ),
			'group' => esc_html__( 'Row Options', 'exproduct' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( "Stretch Content", 'exproduct' ),
			'param_name' => 'jarstretch',
			'value' => array('No', 'Yes'),
			'description' => esc_html__( 'Select stretching options for content.', 'exproduct' ),
			'dependency' => array(
				'element' => 'bgstyle',
				'value' => 'jarallax',
			),
			'group' => esc_html__( 'Row Options', 'exproduct' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( "Type", 'exproduct' ),
			'param_name' => 'jartype',
			'value' => array('Default', 'scale', 'opacity', 'scroll-opacity', 'scale-opacity'),
			'description' => '',
			'dependency' => array(
				'element' => 'bgstyle',
				'value' => 'jarallax',
			),
			'group' => esc_html__( 'Row Options', 'exproduct' ),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__( "Speed", 'exproduct' ),
			"param_name" => "jarspeed",
			"value" => '',
			"description" => esc_html__( "Provide numbers from -1.0 to 2.0", 'exproduct' ),
			'dependency' => array(
				'element' => 'bgstyle',
				'value' => 'jarallax',
			),
			'group' => esc_html__( 'Row Options', 'exproduct' ),
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( "Color For Scroll Background", 'exproduct' ),
			'param_name' => 'scroll_color',
			'value' => '',
			'description' => '',
			'dependency' => array(
				'element' => 'bgstyle',
				'value' => 'scroll',
			),
			'group' => esc_html__( 'Row Options', 'exproduct' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => "Text Color",
			'param_name' => 'ptextcolor',
			'value' => array("Default" , "White" , "Black"),
			'description' => esc_html__( "Text Color", 'exproduct' ),
			'group' => esc_html__( 'Row Options', 'exproduct' ),
		),

		// Gradient Overlay
        array(
            'type' => 'param_group',
            'value' => '',
            'heading' => esc_html__( 'Gradient Overlay', 'exproduct' ),
            'param_name' => 'gradient_colors',
            // Note params is mapped inside param-group:
            'params' => array(
                array(
                    'type' => 'colorpicker',
                    'value' => '',
                    'heading' => esc_html__( 'Color For Gradient', 'exproduct' ),
                    'param_name' => 'gradient_color',
                )
            ),
		    'group' => esc_html__( 'Gradient Overlay', 'exproduct' ),
        ),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Direction', 'exproduct' ),
			'param_name' => 'gradient_direction',
			'value' => array(
				esc_html__( 'To Right ', 'exproduct' ).html_entity_decode('&rarr;') => 'to right',
				esc_html__( 'To Left ', 'exproduct' ).html_entity_decode('&larr;') => 'to left',
				esc_html__( 'To Bottom ', 'exproduct' ).html_entity_decode('&darr;') => 'to bottom',
				esc_html__( 'To Top ', 'exproduct' ).html_entity_decode('&uarr;') => 'to top',
				esc_html__( 'To Bottom Right ', 'exproduct' ).html_entity_decode('&#8600;') => 'to bottom right',
				esc_html__( 'To Bottom Left ', 'exproduct' ).html_entity_decode('&#8601;') => 'to bottom left',
				esc_html__( 'To Top Right ', 'exproduct' ).html_entity_decode('&#8599;') => 'to top right',
				esc_html__( 'To Top Left ', 'exproduct' ).html_entity_decode('&#8598;') => 'to top left',
				esc_html__( 'Angle ', 'exproduct' ).html_entity_decode('&#10227;') => 'angle',
			),
			'description' => '',
			'group' => esc_html__( 'Gradient Overlay', 'exproduct' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Angle Direction', 'exproduct' ),
			'param_name' => 'gradient_angle',
			'value' => "90",
			'description' => esc_html__( 'Values -360 - 360', 'exproduct' ),
			'dependency' => array(
				'element' => 'gradient_direction',
				'value' => 'angle',
			),
			'group' => esc_html__( 'Gradient Overlay', 'exproduct' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Opacity', 'exproduct' ),
			'param_name' => 'gradient_opacity',
			'value' => "1",
			'description' => esc_html__( 'Values 0.01 - 0.99', 'exproduct' ),
			'group' => esc_html__( 'Gradient Overlay', 'exproduct' ),
		),

	);

	$attributes2 = array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Padding', 'exproduct' ),
			'param_name' => 'ppadding',
			'value' => array(
				esc_html__( "No Padding", 'exproduct' ) => 'vc_row-no-padding',
				esc_html__( "Both", 'exproduct' ) => 'vc_row-padding-both',
				esc_html__( "Top", 'exproduct' ) => 'vc_row-padding-top',
				esc_html__( "Bottom", 'exproduct' ) => 'vc_row-padding-bottom',
			),
			'description' => esc_html__( 'Top, bottom, both', 'exproduct' ),
			'group' => esc_html__( 'Row Options', 'exproduct' ),
		),
	);

	$attributes3 = array(
		array(
			'type' => 'dropdown',
			'heading' => "Show Section Decor",
			'param_name' => 'pdecor',
			'value' => array(
				esc_html__( "No", 'exproduct' ) => '0',
				esc_html__( "Yes", 'exproduct' ) => '1',
			),
			'description' => esc_html__( "Show white arrow at the bottom of the section.", 'exproduct' ),
			'group' => esc_html__( 'Row Options', 'exproduct' ),
		),
		// Gradient Overlay
        array(
            'type' => 'param_group',
            'value' => '',
            'heading' => esc_html__( 'Section Decors', 'exproduct' ),
            'param_name' => 'section_decors',
            // Note params is mapped inside param-group:
            'params' => array(
                array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Decor Type', 'exproduct' ),
					'param_name' => 'decor_type',
					'value' => array(
						esc_html__( 'V-type', 'exproduct' ) => 'v',
						esc_html__( 'Cloud', 'exproduct' ) => 'cloud',
					),
					'description' => '',
				),
                array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Position in section', 'exproduct' ),
					'param_name' => 'decor_position',
					'value' => array(
						esc_html__( 'Top', 'exproduct' ) => 'top',
						esc_html__( 'Bottom', 'exproduct' ) => 'bottom',
					),
					'description' => esc_html__( 'Top or bottom of the section', 'exproduct' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Height', 'exproduct' ),
					'param_name' => 'decor_height',
					'value' => '90',
					'description' => esc_html__( 'Values 0 - 300', 'exproduct' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Vertical Flip decor', 'exproduct' ),
					'param_name' => 'decor_flip',
					'value' => array(
						esc_html__( 'No', 'exproduct' ) => '0',
						esc_html__( 'Yes', 'exproduct' ) => '1',
					),
					'description' => '',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Peak horizontal position', 'exproduct' ),
					'param_name' => 'decor_peak',
					'value' => '50',
					'description' => esc_html__( 'Values 0 - 100', 'exproduct' ),
					'dependency' => array(
						'element' => 'decor_type',
						'value' => array('v'),
					),
				),
                array(
                    'type' => 'colorpicker',
                    'value' => '',
                    'heading' => esc_html__( 'Decor Color', 'exproduct' ),
                    'param_name' => 'decor_color',
                )
            ),
            'dependency' => array(
				'element' => 'pdecor',
				'value' => '1',
			),
		    'group' => esc_html__( 'Row Options', 'exproduct' ),
        ),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Overlay', 'exproduct' ),
			'param_name' => 'poverlay',
			'value' => array(
				esc_html__( "Use", 'exproduct' ) => 'pix-row-overlay',
				esc_html__( "None", 'exproduct' ) => 'no-overlay',
			),
			'description' => '',
			'group' => esc_html__( 'Row Options', 'exproduct' ),
		),
	);
	$attributes = array_merge($attributes2, $jarallax, $attributes3);
	vc_add_params( 'vc_row', $attributes );
	vc_add_params( 'vc_row_inner', $jarallax );
	vc_add_params( 'vc_column', $jarallax );



?>