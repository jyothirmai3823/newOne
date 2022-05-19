 <?php /* Template Name: Single Service */ 

$exproduct_custom = isset( $wp_query ) ? get_post_custom( $wp_query->get_queried_object_id() ) : '';
$exproduct_layout = isset ($exproduct_custom['pix_page_layout']) ? $exproduct_custom['pix_page_layout'][0] : '2';
$exproduct_sidebar = isset ($exproduct_custom['pix_selected_sidebar'][0]) ? $exproduct_custom['pix_selected_sidebar'][0] : 'services-sidebar-1';

if ( ! is_active_sidebar($exproduct_sidebar) ) $exproduct_layout = '1';

?>
<?php get_header();?>

<section class="page-content">
    <div class="container">
        <div class="row">
      
		<?php exproduct_show_sidebar( 'left', $exproduct_layout, $exproduct_sidebar ); ?>
        
        <div class="<?php if ( $exproduct_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($exproduct_layout); ?>">

        	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
					
				$exproduct_thumbnail = get_the_post_thumbnail($post->ID);
			
			?>

		        <?php the_content(); ?>
                
            <?php endwhile; ?>

		</div>

		<?php exproduct_show_sidebar( 'right', $exproduct_layout, $exproduct_sidebar ); ?>

		</div>
	</div>
</section>
<?php get_footer();?>
