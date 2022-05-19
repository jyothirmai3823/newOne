<?php
/**  Theme_vc_index  **/

add_action( 'vc_before_init', 'exproduct_integrateWithVC', 200 );

function exproduct_integrateWithVC() {
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



    $vc_icons_data = exproduct_init_vc_icons();

    $args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0');
    $categories = get_categories($args);
    $cats = array();
    $i = 0;


    foreach($categories as $category){
        if ($category && is_object($category)){
            if($i==0){
                $default = $category->slug;
                $i++;
            }
            $cats[$category->name] = $category->term_id;
        }

    }

    $args = array( 'taxonomy' => 'product_cat', 'hide_empty' => '0');
    $categories_woo = get_categories($args);
    $cats_woo = array();
    $i = 0;
    foreach($categories_woo as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats_woo[$category->name] = $category->term_id;
    }


    //-------------------------------------------------------------------------------extra features
    // extra features(container)
    vc_map(
        array(
            'name' => esc_html__( 'Extra features', 'exproduct' ),
            'base' => 'single_xtra_features',
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct' , 'exproduct'),
            'as_parent' => array('only' => 'single_xtra_feature'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "content_element" => true,
            "show_settings_on_create" => false,
            "is_container" => true,
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'exproduct' ),
                    'param_name' => 'header_title',
                    'description' => esc_html__( 'Block title text', 'exproduct' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Sub-title', 'exproduct' ),
                    'param_name' => 'header_sub_title',
                    'description' => esc_html__( 'Block sub title text', 'exproduct' )
                )
            ),
            "js_view" => 'VcColumnView'
        )
    );

    // extra feature (single)
    exproduct_vc_map(
        array(
            "name" => esc_html__( "Extra feature", "exproduct" ),
            "base" => "single_xtra_feature",
            'class' => 'pix-theme-icon-exproduct',
            "content_element" => true,
            "as_child" => array('only' => 'single_xtra_features'), // Use only|except attributes to limit parent (separate multiple values with comma)
            "params" => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",

                    "heading" => esc_html__( "Title", "exproduct" ),
                    "param_name" => "feature_title",
                    "value" => '',
                    "description" => esc_html__( "Feature title", "exproduct" )
                ),
            )
        ),
        $add_animation,
        exproduct_get_vc_icons($vc_icons_data),
        1
    );


    //-------------------------------------------------------------------------------exproduct title
    vc_map(
        array(
            "name" => esc_html__( "Section title", "exproduct" ),
            "base" => "single_exproduct_title",
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct' , 'exproduct'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",

                    "heading" => esc_html__( "Brand title 1", "exproduct" ),
                    "param_name" => "brand_title1",
                    "value" => '',
                    "description" => esc_html__( "Brand title first part", "exproduct" )
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",

                    "heading" => esc_html__( "Brand title 2", "exproduct" ),
                    "param_name" => "brand_title2",
                    "value" => '',
                    "description" => esc_html__( "Brand title second part", "exproduct" )
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",

                    "heading" => esc_html__( "Brand subtitle", "exproduct" ),
                    "param_name" => "brand_subtitle",
                    "value" => '',
                    "description" => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__("Alignment", 'exproduct' ),
                    'param_name' => 'title_alignment',
                    'value' => array(
                        esc_html__("Left", 'exproduct' ) ,
                        esc_html__("Center", 'exproduct' )
                    ),
                    'description' => esc_html__( "choose text alignment", "exproduct" )
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__("Color Mode", 'exproduct' ),
                    'param_name' => 'title_color_mode',
                    'value' => array(
                        esc_html__("Black", 'exproduct' ),
                        esc_html__("White", 'exproduct' )
                    ),
                    'description' => esc_html__( "choose text color mode", "exproduct" )
                ),

                array(
                    "type" => "textfield",
                    "holder" => "div",

                    "heading" => esc_html__( "Button text", "exproduct" ),
                    "param_name" => "title_button_text",
                    "value" => '',
                    "description" => esc_html__( "button will not be displayed if leave empty", "exproduct" )
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",

                    "heading" => esc_html__( "Button link", "exproduct" ),
                    "param_name" => "title_button_link",
                    "value" => '',
                    "description" => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__("Link Type", 'exproduct' ),
                    'param_name' => 'title_link_type',
                    'value' => array(
                        esc_html__("Anchor", 'exproduct' ) => 'anchor-link',
                        esc_html__("External", 'exproduct' ) => 'ext-link',
                    ),
                    'description' => esc_html__( "choose link type", "exproduct" )
                ),
            )
        )
    );

    //-------------------------------------------------------------------------------key features tabs
    // features tabs (container)
    vc_map(
        array(
            'name' => esc_html__( 'Key features tabs', 'exproduct' ),
            'base' => 'single_key_features_tabs',
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct' , 'exproduct'),
            'as_parent' => array('only' => 'single_key_feature_tab'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "content_element" => true,
            "show_settings_on_create" => false,
            "is_container" => true,
            'params' => array(

            ),
            "js_view" => 'VcColumnView'
        )
    );

    // feature tab (single)
    exproduct_vc_map(
        array(
            "name" => esc_html__( "Key feature tab ", "exproduct" ),
            "base" => "single_key_feature_tab",
            'class' => 'pix-theme-icon-exproduct',
            "content_element" => true,
            "as_child" => array('only' => 'single_key_features_tabs'), // Use only|except attributes to limit parent (separate multiple values with comma)
            "params" => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",

                    "heading" => esc_html__( "Title", "exproduct" ),
                    "param_name" => "key_feature_title",
                    "value" => '',
                    "description" => esc_html__( "icon title", "exproduct" )
                ),
                array(
                    "type" => "textarea",
                    "holder" => "div",

                    "heading" => esc_html__( "Key feature text", "exproduct" ),
                    "param_name" => "key_feature_text",
                    "value" => '',
                    "description" => esc_html__( "tab content", "exproduct" )
                )
            )
        ),
        $add_animation,
        exproduct_get_vc_icons($vc_icons_data),
        2
    );

    //-------------------------------------------------------------------------------color watches
    vc_map(
        array(
            "name" => esc_html__( 'Color Product Slider', 'exproduct' ),
            "base" => "single_color_watches",
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct' , 'exproduct'),
            "params" => array(
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'heading' => esc_html__( 'Images and Color Markers', 'exproduct' ),
                    'param_name' => 'images_markers',
                    // Note params is mapped inside param-group:
                    'params' => array(
                        array(
                            "type" => "attach_image",
                            "heading" => esc_html__( "Image", "exproduct" ),
                            "param_name" => "watch_image",
                            "value" => '',
                            "description" => esc_html__( 'Select image from media library.', 'exproduct' )
                        ),

                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__( 'Marker color', 'exproduct' ),
                            'param_name' => 'watch_marker_color',
                            'value' => '',
                            'description' => '',
                        ),
                    ),
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Markers position', 'exproduct' ),
                    'param_name' => 'watch_marker_pos',
                    'value' => array(
                        esc_html__('Center', 'exproduct' ) => 'center',
                        esc_html__('Top', 'exproduct' ) => 'top',
                        esc_html__('Bottom', 'exproduct' ) => 'bottom',
                        esc_html__('Left', 'exproduct' ) => 'left',
                        esc_html__('Right', 'exproduct' ) => 'right',
                    ),
                    'description' => ''
                ),
            )
        )
    );


    //-------------------------------------------------------------------------------auto rotate images
    vc_map(
        array(
            'name' => esc_html__( 'Auto rotate images', 'exproduct' ),
            'base' => 'single_auto_rotate_images',
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct' , 'exproduct'),
            "show_settings_on_create" => false,
            'params' => array(
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__( "Image 1", "exproduct" ),
                    "param_name" => "watch_auto_image1",
                    "value" => '',
                    "description" => esc_html__( "Select image from media library.", "exproduct" )
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__( "Image 2", "exproduct" ),
                    "param_name" => "watch_auto_image2",
                    "value" => '',
                    "description" => esc_html__( "Select image from media library.", "exproduct" )
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__( "Image 3", "exproduct" ),
                    "param_name" => "watch_auto_image3",
                    "value" => '',
                    "description" => esc_html__( "Select image from media library.", "exproduct" )
                )
            )
        )
    );


    //-------------------------------------------------------------------------------How it helps content
    // how it helps (container)
    vc_map(
        array(
            'name' => esc_html__( 'How it helps content', 'exproduct' ),
            'base' => 'single_how_it_helps',
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct' , 'exproduct'),
            'as_parent' => array('only' => 'single_how_it_helps_single'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "content_element" => true,
            "show_settings_on_create" => false,
            "is_container" => true,
            'params' => array(

            ),
            "js_view" => 'VcColumnView'
        )
    );

    // how it helpls (single)
    vc_map(
        array(
            "name" => esc_html__( "How it helps item", "exproduct" ),
            "base" => "single_how_it_helps_single",
            'class' => 'pix-theme-icon-exproduct',
            "content_element" => true,
            "as_child" => array('only' => 'single_how_it_helps'), // Use only|except attributes to limit parent (separate multiple values with comma)
            "params" => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => esc_html__( "Title", "exproduct" ),
                    "param_name" => "exp_title",
                    "value" => '',
                    "description" => esc_html__( "item title", "exproduct" )
                ),
                array(
                    "type" => "textarea",
                    "holder" => "div",
                    "heading" => esc_html__( "Description text", "exproduct" ),
                    "param_name" => "exp_description",
                    "value" => '',
                    "description" => esc_html__( "tab content", "exproduct" )
                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__( "Image", "exproduct" ),
                    "param_name" => "exp_image",
                    "value" => '',
                    "description" => esc_html__( "Select image from media library.", "exproduct" )
                ),
            )
        )
    );


    //-------------------------------------------------------------------------------Single Shopping Cart
    vc_map(
        array(
            'name' => esc_html__( 'Single Shopping Cart', 'exproduct' ),
            'base' => 'single_shopping_cart',
            'class' => 'pix-theme-icon-exproduct',
            'category' => esc_html__( 'ExProduct' , 'exproduct' ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'heading' => esc_html__( 'Product ID', 'exproduct' ),
                    'param_name' => 'product_id',
                    'value' => '',
                    'description' => wp_kses_post(sprintf(__( 'See product ID <a target="_blank" href="%s">here</a>.', 'exproduct' ), esc_url(admin_url().'edit.php?post_type=product'))),
                )
            )
        )
    );


    //-------------------------------------------------------------------------------Exproduct Action button
    vc_map(
        array(
            "name" => esc_html__( "Exproduct button ", "exproduct" ),
            "base" => "single_exproduct_button",
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct' , 'exproduct'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => esc_html__( "Text", "exproduct" ),
                    "param_name" => "exp_btn_text",
                    "value" => '',
                    "description" => esc_html__( "button text", "exproduct" )
                ),
                array(
                    "type" => "vc_link",
                    "holder" => "div",
                    "heading" => esc_html__( "Link", "exproduct" ),
                    "param_name" => "exp_btn_link",
                    "value" => '',
                    "description" => esc_html__( "button link", "exproduct" )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__("Button style", 'exproduct' ),
                    'param_name' => 'exp_btn_color',
                    'value' => array(
                        esc_html__("Blue", 'exproduct' ),
                        esc_html__("Orange", 'exproduct' ),
                        esc_html__("Grey", 'exproduct' )
                    ),
                    'description' => esc_html__( "choose button style", "exproduct" )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__("Button size", 'exproduct' ),
                    'param_name' => 'exp_btn_size',
                    'value' => array(
                        esc_html__("Small", 'exproduct' ),
                        esc_html__("Medium", 'exproduct' ),
                        esc_html__("Large", 'exproduct' )
                    ),
                    'description' => esc_html__( "choose button size", "exproduct" )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__("Alignment", 'exproduct' ),
                    'param_name' => 'exp_btn_align',
                    'value' => array(
                        esc_html__("Left", 'exproduct' ),
                        esc_html__("Right", 'exproduct' ),
                        esc_html__("Center", 'exproduct' )
                    ),
                    'description' => esc_html__( "choose button alignment", "exproduct" )
                )
            )
        )
    );



    //-------------------------------------------------------------------------------build-in apps
    // build-in apps (container)
    vc_map(
        array(
            'name' => esc_html__( 'Product Features', 'exproduct' ),
            'base' => 'single_build_in_apps',
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct' , 'exproduct'),
            'as_parent' => array('only' => 'single_build_in_app'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "content_element" => true,
            "show_settings_on_create" => false,
            "is_container" => true,
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'exproduct' ),
                    'param_name' => 'bin_title',
                    'description' => esc_html__( 'Block title text', 'exproduct' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Sub-title', 'exproduct' ),
                    'param_name' => 'bin_sub_title',
                    'description' => esc_html__( 'Block sub title text', 'exproduct' )
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Brand title 1", "exproduct" ),
                    "param_name" => "bin_brand_title1",
                    "description" => esc_html__( "Brand title first part", "exproduct" )
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Brand title 2", "exproduct" ),
                    "param_name" => "bin_brand_title2",
                    "value" => '',
                    "description" => esc_html__( "Brand title second part", "exproduct" )
                )
            ),
            "js_view" => 'VcColumnView'
        )
    );

    // app (single)
    exproduct_vc_map(
        array(
            "name" => esc_html__( 'Feature', "exproduct" ),
            "base" => "single_build_in_app",
            'class' => 'pix-theme-icon-exproduct',
            "content_element" => true,
            "as_child" => array('only' => 'single_build_in_apps'),
            "params" => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'exproduct' ),
                    'param_name' => 'bia_image',
                    'description' => esc_html__( 'Select image from media library.', 'exproduct' )
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Title", "exproduct" ),
                    "param_name" => "bia_title",
                    "description" => esc_html__( "App title", "exproduct" )
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Icon Background color', 'exproduct' ),
                    'param_name' => 'bia_bg_color',
                    'value' => '',
                    'description' => '',
                ),
                array(
                    "type" => "textarea",
                    "heading" => esc_html__( "Description", "exproduct" ),
                    "param_name" => "bia_description",
                    "description" => esc_html__( "App description", "exproduct" )
                )
            )
        ),
        $add_animation,
        exproduct_get_vc_icons($vc_icons_data),
        3
    );


    //-------------------------------------------------------------------------------specifications list
    // specifications list(container)
    vc_map(
        array(
            'name' => esc_html__( 'Specifications list', 'exproduct' ),
            'base' => 'single_specifications_list',
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct' , 'exproduct'),
            'as_parent' => array('only' => 'single_specification_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "content_element" => true,
            "show_settings_on_create" => false,
            "is_container" => true,
            'params' => array(

            ),
            "js_view" => 'VcColumnView'
        )
    );

    // app (single)
    vc_map(
        array(
            "name" => esc_html__( "Specification item", "exproduct" ),
            "base" => "single_specification_item",
            'class' => 'pix-theme-icon-exproduct',
            "content_element" => true,
            "as_child" => array('only' => 'single_specifications_list'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Title", "exproduct" ),
                    "param_name" => "spec_title",
                    "description" => esc_html__( "App title", "exproduct" )
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Description", "exproduct" ),
                    "param_name" => "spec_description",
                    "description" => esc_html__( "App title", "exproduct" )
                )
            )
        )
    );


    //-------------------------------------------------------------------------------Testimonials
    // testimonials list(container)
    vc_map(
        array(
            'name' => esc_html__( 'Testimonials', 'exproduct' ),
            'base' => 'single_testimonials_list',
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct' , 'exproduct'),
            'as_parent' => array('only' => 'single_testimonial_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "content_element" => true,
            "show_settings_on_create" => false,
            "is_container" => true,
            'params' => array(

            ),
            "js_view" => 'VcColumnView'
        )
    );

    // testimonial_item (single)
    vc_map(
        array(
            "name" => esc_html__( "Testimonial item", "exproduct" ),
            "base" => "single_testimonial_item",
            'class' => 'pix-theme-icon-exproduct',
            "content_element" => true,
            "as_child" => array('only' => 'single_testimonials_list'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Title", "exproduct" ),
                    "param_name" => "test_title",
                    "description" => esc_html__( "testimonial title", "exproduct" )
                ),
                array(
                    "type" => "textarea",
                    "heading" => esc_html__( "Text", "exproduct" ),
                    "param_name" => "test_desc",
                    "description" => esc_html__( "Testimonial content", "exproduct" )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Rating', 'exproduct' ),
                    'param_name' => 'test_rating',
                    'value' => array(
                        esc_html__("1", 'exproduct' ),
                        esc_html__("2", 'exproduct' ),
                        esc_html__("3", 'exproduct' ),
                        esc_html__("4", 'exproduct' ),
                        esc_html__("5", 'exproduct' )
                    ),
                    'description' => esc_html__( 'rating stars value', 'exproduct' )
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Avatar', 'exproduct' ),
                    'param_name' => 'test_avatar',
                    'description' => esc_html__( 'Select image from media library.', 'exproduct' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Name Surname', 'exproduct' ),
                    'param_name' => 'test_namesurn'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Testimonial date', 'exproduct' ),
                    'param_name' => 'test_date'
                )
            )
        )
    );

    // Blog grid
    vc_map(
        array(
            "name" => esc_html__( "Blog posts", "exproduct" ),
            "base" => "single_blogposts",
            'class' => 'pix-theme-icon-exproduct',
            "category" => esc_html__( 'ExProduct', 'exproduct'),
            "params" => array(
            ),
        )
    );

    if ( class_exists( 'WPBakeryShortCode' ) ) {

    // extra features classes
    class WPBakeryShortCode_Single_Xtra_Features extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Single_Xtra_Feature extends WPBakeryShortCode {
    }


    // exproduct title with button
    class WPBakeryShortCode_Single_Exproduct_Title extends WPBakeryShortCode {
    }


    // key features tabs
    class WPBakeryShortCode_Single_Key_Features_Tabs extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Single_Key_Feature_Tab extends WPBakeryShortCode {
    }


    // color watches slider
    class WPBakeryShortCode_Single_Color_Watches extends WPBakeryShortCode {
    }


    // color watches autorotate
    class WPBakeryShortCode_Single_Auto_Rotate_Images extends WPBakeryShortCode {
    }


    // how it helps items
    class WPBakeryShortCode_Single_How_It_Helps extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Single_How_It_Helps_Single extends WPBakeryShortCode {
    }


    // Shopping Cart
    class WPBakeryShortCode_Single_Shopping_cart extends WPBakeryShortCode {
    }


    // Exproduct button
    class WPBakeryShortCode_Single_Exproduct_Button extends WPBakeryShortCode {
    }


    // Build-in apps
    class WPBakeryShortCode_Single_Build_In_Apps extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Single_Build_In_App extends WPBakeryShortCode {
    }


    // Specifications list
    class WPBakeryShortCode_Single_Specifications_List extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Single_Specification_Item extends WPBakeryShortCode {
    }


    // Testimonials list
    class WPBakeryShortCode_Single_Testimonials_List extends WPBakeryShortCodesContainer {
    }

    class WPBakeryShortCode_Single_Testimonial_Item extends WPBakeryShortCode {
    }


    // Blogposts
    class WPBakeryShortCode_Single_Blogposts extends WPBakeryShortCode {
    }


}
}

?>
