<?php

$exproduct_layout = exproduct_get_option('blog_settings_sidebar_type', '2');
$exproduct_sidebar = exproduct_get_option('blog_settings_sidebar_content', 'sidebar-1');


if ( ! is_active_sidebar($exproduct_sidebar) ) $exproduct_layout = '1';

    $custom = isset ($wp_query) ? get_post_custom($wp_query->get_queried_object_id()) : '';
?>

<?php get_header(); ?>

<section class="blog-content-section" id="main">
	<div class="container">
	    <div class="row">
	        <?php exproduct_show_sidebar( 'left', $exproduct_layout, $exproduct_sidebar ); ?>
	        <div class="<?php if ( $exproduct_layout == 1 ) : ?>col-lg-12 col-md-12<?php else : ?>col-lg-9 col-md-8<?php endif; ?> col-sm-12 col-xs-12 left-column sidebar-type-<?php echo esc_attr($exproduct_layout); ?>">
	           <?php if ( have_posts() ) : ?>

                         <?php
                             if ( have_posts() )
                                the_post();
                             rewind_posts();
                             get_template_part( 'loop', 'archive' );
                         ?>
                    <?php endif ?>
				
				<?php exproduct_num_pagination(); ?>
				
	        </div>
	        <?php exproduct_show_sidebar( 'right', $exproduct_layout, $exproduct_sidebar ); ?>
	    </div>
	</div>
</section>

<?php get_footer(); ?>