<?php
/*** The template for displaying search results pages. ***/

$exproduct_custom =  get_post_custom(get_the_ID());
$exproduct_layout = isset( $exproduct_custom['pix_page_layout'] ) ? $exproduct_custom['pix_page_layout'][0] : '2';
$exproduct_sidebar = isset( $exproduct_custom['pix_selected_sidebar'][0] ) ? $exproduct_custom['pix_selected_sidebar'][0] : 'sidebar-1';

?>

<?php get_header();?>
    <section class="page-content" id="pageContent">
        <div class="container">
            <div class="row">

                <?php exproduct_show_sidebar( 'left', $exproduct_layout, $exproduct_sidebar ); ?>

				<div class="<?php if ( $exproduct_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8 left-column sidebar-type-<?php echo esc_attr($exproduct_layout); ?><?php endif; ?> col-sm-12 col-xs-12">

                <?php if ( have_posts() ) : ?>

		            <?php get_template_part( 'loop', 'search' );?>

			    <?php else : ?>
			        <div id="post-0" class="post no-results not-found">
			            <h2><?php esc_html_e( 'Nothing Found', 'exproduct' ); ?></h2>
			            <div class="entry-content">
			                <p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'exproduct' ); ?></p>
			             </div><!-- .entry-content -->
			             <?php get_search_form(); ?>
			        </div><!-- #post-0 -->
			    <?php endif; ?>

                </div>

                <?php exproduct_show_sidebar( 'right', $exproduct_layout, $exproduct_sidebar ); ?>

            </div>
        </div>
    </section>
<?php get_footer(); ?>
			
            
            