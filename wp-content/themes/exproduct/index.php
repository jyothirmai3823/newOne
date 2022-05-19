<?php
/**
 * The main template file
 */

$exproduct_postpage_id = get_option( 'page_for_posts' );
$exproduct_frontpage_id = get_option( 'page_on_front' );
$exproduct_page_id = isset($wp_query) ? $wp_query->get_queried_object_id() : '';

if ( $exproduct_page_id == $exproduct_postpage_id && $exproduct_postpage_id != $exproduct_frontpage_id ) :
	$exproduct_custom = isset( $wp_query ) ? get_post_custom( $wp_query->get_queried_object_id() ) : '';
	$exproduct_layout = isset( $exproduct_custom['pix_page_layout'] ) ? $exproduct_custom['pix_page_layout'][0] : '2';
	$exproduct_sidebar = isset( $exproduct_custom['pix_selected_sidebar'][0] ) ? $exproduct_custom['pix_selected_sidebar'][0] : 'sidebar-1';
else :
	$exproduct_layout = exproduct_get_option('blog_settings_sidebar_type', '2');
	$exproduct_sidebar = exproduct_get_option('blog_settings_sidebar_content', 'sidebar-1');
endif;

if ( ! is_active_sidebar($exproduct_sidebar) ) $exproduct_layout = '1';
?>
<?php get_header();?>

<section class="blog-content-section">
	<div class="container">
		<div class="row">
			<?php exproduct_show_sidebar( 'left', $exproduct_layout, $exproduct_sidebar ); ?>

			<div class="  <?php if ( $exproduct_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($exproduct_layout); ?>">
			<?php
	            $wp_query = new WP_Query();
	            $pp = get_option('posts_per_page');
	            $wp_query->query('posts_per_page='.$pp.'&paged='.$paged);
	            get_template_part( 'loop', 'index' );
			?>
			<?php the_posts_pagination( array(
			            'prev_text'          => esc_html__( '&lt;', 'exproduct' ),
			            'next_text'          => esc_html__( '&gt;', 'exproduct' ),
			            'screen_reader_text' => esc_html__( '&nbsp;', 'exproduct'),
			            'type' => 'list'
			        ) );
			?>
			</div>
			<!-- end col -->

			<?php exproduct_show_sidebar( 'right', $exproduct_layout, $exproduct_sidebar ); ?>
		</div>
		<!-- end row -->
	</div>
</section>
<?php get_footer(); ?>
