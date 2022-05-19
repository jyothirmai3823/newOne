<?php

/********** WOOCOMERCE **********/

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price', 18);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 20);


add_action('woocommerce_single_variation_shopping_cart', 'woocommerce_single_variation', 10);


add_filter( 'woocommerce_show_page_title' , 'exproduct_woo_hide_page_title' );
function exproduct_woo_hide_page_title() {
	return false;
}

add_action( 'woocommerce_before_shop_loop_item_title', 'exproduct_woo_shop_loop_item_overlay_begin', 16);
function exproduct_woo_shop_loop_item_overlay_begin() {
	echo '<a class="woo-item-overlay-grid" href="' . get_the_permalink() . '">';
};

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_shop_loop_item_title_overlay', 17);
function woocommerce_shop_loop_item_title_overlay() {
	echo '<span class="product-name">' . get_the_title() . '</span>';
};

add_action( 'woocommerce_before_shop_loop_item_title', 'exproduct_woo_shop_loop_item_link_close', 19);
function exproduct_woo_shop_loop_item_link_close() {
	echo '</a>';
};

//add_action( 'woocommerce_before_shop_loop_item_title', 'exproduct_woo_shop_loop_item_overlay_end', 21);
//function exproduct_woo_shop_loop_item_overlay_end() {
//	echo '</div>';
//};


add_action( 'woocommerce_shop_loop_item_title', 'exproduct_woo_shop_loop_item_title_open', 5);
function exproduct_woo_shop_loop_item_title_open() {
	echo '<div class="woo-item-footer">';
};

add_action( 'woocommerce_shop_loop_item_title', 'exproduct_woo_shop_loop_item_title', 10);
function exproduct_woo_shop_loop_item_title() {
	echo '<div class="product-name"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>';
};

add_action( 'woocommerce_after_shop_loop_item_title', 'exproduct_woo_shop_loop_item_title_close', 15);
function exproduct_woo_shop_loop_item_title_close() {
	echo '</div>';
};





add_filter( 'loop_shop_per_page', function ($cols) { return exproduct_get_option('exproduct_products_per_page','9'); }, 20 );



add_filter('loop_shop_columns', 'exproduct_loop_columns');
if (!function_exists('exproduct_loop_columns')) {
	function exproduct_loop_columns() {
		return 3; // 3 products per row
	}
}


add_filter( 'woocommerce_output_related_products_args', 'exproduct_related_products_args' );
function exproduct_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 3 columns
	return $args;
}

if (exproduct_get_option('shop_settings_checkout') == 'on'){
	add_filter ('woocommerce_add_to_cart_redirect', 'exproduct_woo_redirect_to_checkout');
}
function exproduct_woo_redirect_to_checkout() {
	$checkout_url = wc_get_cart_url();
	return $checkout_url;
}

function exproduct_is_woo_page () {
        if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
                return true;
        }
        $woocommerce_keys   =   array ( "woocommerce_shop_page_id" ,
                                        "woocommerce_terms_page_id" ,
                                        "woocommerce_cart_page_id" ,
                                        "woocommerce_checkout_page_id" ,
                                        "woocommerce_pay_page_id" ,
                                        "woocommerce_thanks_page_id" ,
                                        "woocommerce_myaccount_page_id" ,
                                        "woocommerce_edit_address_page_id" ,
                                        "woocommerce_view_order_page_id" ,
                                        "woocommerce_change_password_page_id" ,
                                        "woocommerce_logout_page_id" ,
                                        "woocommerce_lost_password_page_id" ) ;
        foreach ( $woocommerce_keys as $wc_page_id ) {
                if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
                        return true ;
                }
        }
        return false;
}
add_filter('woocommerce_available_variation', function($available_variations, \WC_Product_Variable $variable, \WC_Product_Variation $variation) {
    if (empty($available_variations['price_html'])) {
        $available_variations['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
    }
    return $available_variations;
        }, 10, 3);