<?php

	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );



	$position = ($carousel_type) ? $carousel_type : 'Bottom';
	$positionClass = 'owl-'.strtolower($position).'-pagination';

	$cssAnimationHtmlStart = $css_animation != '' ? '<div class="animated" data-animation="' . esc_attr($css_animation) . '">' : '';
	$cssAnimationHtmlEnd = $css_animation != '' ? '</div>' : '';
	
?>	
<?php echo esc_html($cssAnimationHtmlStart) ?>

<?php if (isset($is_carousel) && $is_carousel == 'true'):?>

<div id="owl-product-slider" class="enable-owl-carousel owl-product-slider <?php echo esc_attr($positionClass) ?> owl-carousel owl-theme wow fadeInUp" data-wow-delay="0.7s" data-navigation="true" data-pagination="false" data-single-item="false" data-auto-play="false" data-transition-style="false" data-main-text-animation="false" data-min600="2" data-min800="3" data-min1200="4">
<?php else : ?>
<div id="owl-product-slider" class="owl-product-box owl-bottom-pagination owl-theme">
<?php endif;?>
<?php	
			$_products = explode(',',$wc_product_search);
			
			$args = array(
				'post_type' => 'product', 
				'post__in' => $_products,		 
				'order' => 'ASC',
			);

	$wp_query = new WP_Query( $args );	

	if ($wp_query->have_posts()): 
		while ($wp_query->have_posts()) : 	
?>	
	<?php 
		$wp_query->the_post();


		$product = new WC_Product(get_the_ID());

		$custom = get_post_custom(get_the_ID());
		$demo_link = get_post_meta(get_the_ID(), 'demo_link', true);
		$review = !empty($demo_link) ? '<a href="'.esc_url($demo_link).'" rel="nofollow" class="btn btn-link"><i class="fa fa-search-plus"></i>'.esc_html__('Preview', 'exproduct').'</a>' : '';
		$cats = wp_get_object_terms(get_the_ID(), 'product_cat');
								
		if ($cats){
			$cat_slugs = '';
			$cat_names = '';
			foreach( $cats as $cat ){
				$cat_slugs .= $cat->slug . " ";
				$cat_names .= $cat->name . ", ";
			}
			$cat_names = substr($cat_names, 0, -2);
		}
		
		$link = get_the_permalink($product->get_id());
		$thumbnail = get_the_post_thumbnail(get_the_ID(), 'shop_catalog', array('class' => 'cover'));
		
		$attach_ids = $product->get_gallery_attachment_ids();
		$attachment_count = count( $product->get_gallery_attachment_ids() );

		$image = wc_placeholder_img('shop_catalog');
		if($attachment_count > 0){
			$image_link = wp_get_attachment_url( $attach_ids[0] ); 

			$default_attr = array(
				'class'	=> "slider_img",
				'alt'   => get_the_title($product->get_id()),
			);
			$image = wp_get_attachment_image( $attach_ids[0], 'shop_catalog', false, $default_attr);
			
		}

		if ($thumbnail == ''){
			$thumbnail = $image;
		}
		
		$price_html = $product->get_price_html();
	?>
	
	
	
		<div class="item  <?php echo esc_attr($cat_slugs) ?>">
			<div class="product-item hvr-underline-from-center">
				<div class="product-item_body">
					<?php echo wp_kses_post($thumbnail)?>
					<a class="product-item_link" href="<?php echo esc_url($link)?>">
						<?php woocommerce_show_product_loop_sale_flash() ?>
						<!--<span class="product-item_sale color-main font-additional customBgColor circle">-15%</span>-->
					</a>
					<ul class="product-item_info transition">
						<li>
							<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
									sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="">',
										esc_url( $product->add_to_cart_url() ),
										esc_attr( $product->get_id() ),
										esc_attr( $product->get_sku() ),
										esc_attr( isset( $quantity ) ? $quantity : 1 ),
										$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
										esc_attr( $product->product_type ),
										esc_html( $product->add_to_cart_text() )
									),
								$product ) ?>
								<span class="icon-bag" aria-hidden="true"></span>
								<div class="product-item_tip font-additional font-weight-normal text-uppercase customBgColor color-main transition">
									<?php echo esc_attr($product->single_add_to_cart_text())?>
								</div>
							</a>
						</li>
						<?php if (exproduct_get_option('shop_settings_quickview')):?>
						<li>
							<a href="<?php echo esc_url($link)?>" class="quickview-list">
								<span class="icon-eye" aria-hidden="true"></span>
								<div class="product-item_tip font-additional font-weight-normal text-uppercase customBgColor color-main transition"><?php echo esc_html__('QUICK VIEW','exproduct')?></div>
							</a>
						</li>
						<?php endif; ?>
						<li>
							<a href="#">
								<span class="icon-heart" aria-hidden="true"></span>
								<div class="product-item_tip font-additional font-weight-normal text-uppercase customBgColor color-main transition"><?php echo esc_html__('Add to Favorites','exproduct')?></div>
							</a>
						</li>													
					</ul>
				</div>
				<a href="<?php echo esc_url($link)?>" class="product-item_footer">
					<div class="product-item_title font-additional font-weight-bold text-center text-uppercase"><?php echo get_the_title($product->get_id()) ?></div>
					<div class="product-item_price font-additional font-weight-normal customColor"><?php echo wp_kses_post($price_html)?></div>
				</a>
			</div>
		</div>
	
<?php	
	endwhile;
endif;?>
</div>
<?php echo esc_html($cssAnimationHtmlEnd) ?>