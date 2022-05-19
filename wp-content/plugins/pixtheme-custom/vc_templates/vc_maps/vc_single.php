<?php

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

	
?>