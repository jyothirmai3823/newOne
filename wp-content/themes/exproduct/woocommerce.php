<?php
/* Woocommerce template. */
$exproduct_id = exproduct_woo_get_page_id();
$exproduct_isProduct = false;

if ( is_single() && get_post_type() == 'product' ) {
	$exproduct_isProduct = true;
}

$exproduct_custom = $exproduct_id > 0 ? get_post_custom($exproduct_id) : array();
$exproduct_layout = isset ($exproduct_custom['pix_page_layout']) ? reset($exproduct_custom['pix_page_layout']) : '2';
$exproduct_sidebar = isset ($exproduct_custom['pix_selected_sidebar'][0]) ? reset($exproduct_custom['pix_selected_sidebar']) : 'sidebar-1';

if ( $exproduct_isProduct === true ) {
	$exproduct_useSettingsGlobal = exproduct_get_option( 'shop_settings_global_product', 'on' );
	if ( $exproduct_useSettingsGlobal == 'on' ) {
		$exproduct_layout = exproduct_get_option( 'shop_settings_sidebar_type', '2');
		$exproduct_sidebar = exproduct_get_option( 'shop_settings_sidebar_content', 'product-sidebar-1' );
	}
}

if ( ! is_active_sidebar($exproduct_sidebar) ) $exproduct_layout = '1';

get_header(); ?>


<section class="page-section">
	<div class="container">
		<div class="row">
			<main class="main-content">

				<?php exproduct_show_sidebar( 'left', $exproduct_layout, $exproduct_sidebar ); ?>

				<div class="rtd <?php if ( $exproduct_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($exproduct_layout); ?>">

					<?php  woocommerce_content(); ?>

				</div>

				<?php exproduct_show_sidebar( 'right', $exproduct_layout, $exproduct_sidebar ); ?>

			</main>

		</div>
	</div>
</section>

<?php get_footer();?>
