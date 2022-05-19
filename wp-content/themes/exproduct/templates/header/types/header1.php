<?php /* Header Type 1 */
	$post_ID = isset ($wp_query) ? $wp_query->get_queried_object_id() : get_the_ID();
	if( class_exists( 'WooCommerce' ) && exproduct_is_woo_page() && exproduct_get_option('woo_header_global','1') ){
		$post_ID = get_option( 'woocommerce_shop_page_id' ) ? get_option( 'woocommerce_shop_page_id' ) : $post_ID;
	} elseif (!is_page_template('page-home.php') && get_option('page_for_posts') && exproduct_get_option('header_like_blog','0')){
		$post_ID = get_option('page_for_posts') ? get_option('page_for_posts') : 0;
	}

	$exproduct_header = apply_filters('exproduct_header_settings', $post_ID);
	$exproduct_header['header_background'] = $exproduct_header['header_background'] == '' ? 'white' : $exproduct_header['header_background'];
	$hover_effect = $exproduct_header['header_hover_effect'] > 0 ? 'cl-effect-'.$exproduct_header['header_hover_effect'] : '';
?>


	<header class="header

    <?php if ($exproduct_header['header_bar']) : ?>
	    header-topbar-view
	    header-topbarbox-1-<?php echo esc_attr($exproduct_header['header_topbarbox_1_position']) ?>
        header-topbarbox-2-<?php echo esc_attr($exproduct_header['header_topbarbox_2_position']) ?>
    <?php endif; ?>

        header-<?php echo esc_attr($exproduct_header['header_layout']) ?>-width

    <?php if ($exproduct_header['header_sticky'] == 'fixed') : ?>
        navbar-fixed-top
        navbar-fixed-js
    <?php elseif ($exproduct_header['header_sticky'] == 'sticky') : ?>
        navbar-fixed-top
        navbar-sticky-top
    <?php endif; ?>

		header-background-<?php echo esc_attr( $exproduct_header['header_background'] ) ?><?php echo esc_attr( in_array($exproduct_header['header_background'], array('trans-white', 'trans-black')) ? '-rgba0' . $exproduct_header['header_transparent'] : '' ) ?>

	<?php if ( in_array($exproduct_header['header_background'], array('trans-white', 'white')) ) : ?>
        header-color-black
        header-logo-black
	<?php else : ?>
        header-color-white
        header-logo-white
	<?php endif; ?>

        header-navibox-1-<?php echo esc_attr($exproduct_header['header_navibox_1_position']) ?>
        header-navibox-2-<?php echo esc_attr($exproduct_header['header_navibox_2_position']) ?>
        header-navibox-3-<?php echo esc_attr($exproduct_header['header_navibox_3_position']) ?>
        header-navibox-4-<?php echo esc_attr($exproduct_header['header_navibox_4_position']) ?>

	<?php echo esc_attr($exproduct_header['mobile_sticky']) ?>
	<?php echo esc_attr($exproduct_header['mobile_topbar']) ?>
	<?php echo esc_attr($exproduct_header['tablet_minicart']) ?>
	<?php echo esc_attr($exproduct_header['tablet_search']) ?>
	<?php echo esc_attr($exproduct_header['tablet_phone']) ?>
	<?php echo esc_attr($exproduct_header['tablet_socials']) ?> 

	<?php echo esc_attr($exproduct_header['header_uniq_class']) ?>

       ">
		<div class="container container-boxed-width">
		<?php if ($exproduct_header['header_bar']) : ?>
			<div class="top-bar">
				<div class="container">
					<div class="header-topbarbox-1">
						<ul>
						    <?php if ($exproduct_header['header_phone']) : ?>
								<li class="no-hover header-phone"><?php esc_html_e('call us', 'exproduct') ?> <?php echo wp_kses_post(exproduct_get_option('header_phone', '')) ?> </li>
							<?php endif; ?>
							<?php if ($exproduct_header['header_email']) : ?>
								<li><?php echo wp_kses_post(exproduct_get_option('header_email', '')) ?></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="header-topbarbox-2">
		                <?php
			            if ( has_nav_menu( 'top_nav' ) ) {
							wp_nav_menu(array(
								'theme_location'  => 'top_nav',
			        			'container'       => false,
			        			'menu_id'		  => 'top-menu',
			        			'menu_class'      => '',
			        			'depth'           => 1
							));
						}
						?>
					</div>
				</div>
			</div>
		<?php endif; ?>
			<nav id="nav" class="navbar">
				<div class="container ">
					<div class="header-navibox-1">
						<button class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button ">
							<span class="toggle-menu-button-icon"><span></span> <span></span> <span></span> <span></span>
								<span></span> <span></span></span>
						</button>
						<a class="navbar-brand scroll" href="<?php echo esc_url(home_url('/')) ?>">
							<?php if ($exproduct_header['logo']): ?>
								<img class="normal-logo"
								     src="<?php echo esc_url($exproduct_header['logo']) ?>"
								     alt="logo"/>
							<?php else: ?>
								<img class="normal-logo"
								     src="<?php echo get_template_directory_uri(); ?>/images/logo-w.png" alt="logo"/>
							<?php endif ?>
							<?php if ($exproduct_header['logo_inverse']): ?>
								<img class="scroll-logo hidden-xs"
								     src="<?php echo esc_url($exproduct_header['logo_inverse']) ?>"
								     alt="logo"/>
							<?php else: ?>
								<img class="scroll-logo hidden-xs"
								     src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo"/>
							<?php endif ?>
						</a>
					</div>
					<?php if (class_exists('WooCommerce') && $exproduct_header['header_minicart']) : ?>
						<?php $cart_class = WC()->cart->cart_contents_count > 0 ? 'flaticon-shopping-cart' : 'flaticon-shopping-cart-empty'; ?>
						<div class="header-navibox-4">
							<div class="header-cart">
                                <a href="<?php echo wc_get_cart_url(); ?>"><i class="<?php echo esc_attr($cart_class) ?>"></i></a>
								<span class="header-cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>
							</div>
						</div>
					<?php endif; ?>
					<div class="header-navibox-3">
						<ul class="nav navbar-nav hidden-xs">
						<?php if ( $exproduct_header['header_socials'] ) : ?>
							<?php if (exproduct_get_option('social_facebook', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_facebook', '')); ?>"
								       target="_blank"><i class="fa fa-facebook"></i></a></li>
							<?php } ?>
							<?php if (exproduct_get_option('social_vk', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_vk', '')); ?>"
								       target="_blank"><i class="fa fa-vk"></i></a></li>
							<?php } ?>
							<?php if (exproduct_get_option('social_youtube', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_youtube', '')); ?>"
								       target="_blank"><i class="fa fa-youtube"></i></a></li>
							<?php } ?>
							<?php if (exproduct_get_option('social_vimeo', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_vimeo', '')); ?>"
								       target="_blank"><i class="fa fa-vimeo"></i></a></li>
							<?php } ?>
							<?php if (exproduct_get_option('social_twitter', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_twitter', '')); ?>"
								       target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?php } ?>
							<?php if (exproduct_get_option('social_google', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_google', '')); ?>"
								       target="_blank"><i class="fa fa-google-plus"></i></a></li>
							<?php } ?>
							<?php if (exproduct_get_option('social_tumblr', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_tumblr', '')); ?>"
								       target="_blank"><i class="fa fa-tumblr"></i></a></li>
							<?php } ?>
							<?php if (exproduct_get_option('social_instagram', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_instagram', '')); ?>"
								       target="_blank"><i class="fa fa-instagram"></i></a></li>
							<?php } ?>
							<?php if (exproduct_get_option('social_pinterest', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_pinterest', '')); ?>"
								       target="_blank"><i class="fa fa-pinterest"></i></a></li>
							<?php } ?>
							<?php if (exproduct_get_option('social_linkedin', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_linkedin', '')); ?>"
								       target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<?php } ?>
							<?php if (exproduct_get_option('social_custom_url_1', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_custom_url_1', '')); ?>"
								       target="_blank"><i
												class="fa <?php echo esc_attr(exproduct_get_option('social_custom_icon_1', '')); ?>"></i></a>
								</li>
							<?php } ?>
							<?php if (exproduct_get_option('social_custom_url_2', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_custom_url_2', '')); ?>"
								       target="_blank"><i
												class="fa <?php echo esc_attr(exproduct_get_option('social_custom_icon_2', '')); ?>"></i></a>
								</li>
							<?php } ?>
							<?php if (exproduct_get_option('social_custom_url_3', '')) { ?>
								<li class="header-social-link"><a href="<?php echo esc_url(exproduct_get_option('social_custom_url_3', '')); ?>"
								       target="_blank"><i
												class="fa <?php echo esc_attr(exproduct_get_option('social_custom_icon_3', '')); ?>"></i></a>
								</li>
							<?php } ?>
						<?php endif; ?>

							<?php if ( $exproduct_header['header_search'] ) : ?>
							<li class="header-search-icon"><a class="btn_header_search" href="#"><i class="fa fa-search"></i></a></li>
						    <?php endif; ?>

							<?php if ( $exproduct_header['header_menu_add_position'] != 'disable' ) : ?>
							<li>
								<button class=" js-toggle-<?php echo esc_attr($exproduct_header['header_menu_add_position'] == 'screen' ? 'screen' : $exproduct_header['header_menu_add_position'].'-slidebar') ?> toggle-menu-button ">
									<span class="toggle-menu-button-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
										<span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
								</button>
							</li>
							<?php endif; ?>

						</ul>
					</div>
					<?php if ( $exproduct_header['header_menu'] ) : ?>
					<div class="header-navibox-2">
						<?php echo exproduct_site_menu('yamm main-menu nav navbar-nav ' . esc_attr($hover_effect). ' ' .esc_attr($exproduct_header['header_marker']) ); ?>
					</div>
					<?php endif; ?>
				</div>
			</nav>
		</div>
	</header>
