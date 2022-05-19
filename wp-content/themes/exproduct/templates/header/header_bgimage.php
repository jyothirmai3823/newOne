<?php /* Header Background Image tamplate */ ?>

<?php
	$title_class = $breadcrumbs_class = '';

	$bg_image = exproduct_get_option('tab_bg_image', '') ? exproduct_get_option('tab_bg_image', '') : get_template_directory_uri().'/images/page-img.jpg';
	$title_position = exproduct_get_option('tab_title_position', '');
	$breadcrumbs_position = exproduct_get_option('tab_breadcrumbs_position', '');
	if( $title_position != $breadcrumbs_position ){
		$title_class = $title_position != '' ? 'pull-'.$title_position : '';
		$breadcrumbs_class = $breadcrumbs_position != '' ? 'pull-'.$breadcrumbs_position : '';
	} elseif($title_position != '') {
		$title_class = $breadcrumbs_class = 'text-'.$title_position;
	}
?>
<!-- ========================== -->
<!-- Top header -->
<!-- ========================== -->
<section class="header-section" style="background-image:url(
	<?php if ( class_exists( 'WooCommerce' ) && exproduct_is_woo_page() ) :
	        $thumbnail_id = get_post_thumbnail_id(wc_get_page_id('shop'));
			$image = wp_get_attachment_url( $thumbnail_id );
			$image = $image == '' ? $bg_image : $image;
		?>
	<?php echo esc_url($image) ?>);" >
	<?php
	    elseif ( class_exists( 'WooCommerce' ) && is_product_category() ) :
			$cat = $wp_query->get_queried_object();
	        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			$image = $image == '' ? $bg_image : $image;
		?>
	<?php echo esc_url($image) ?>);" >
	<?php
	    elseif ( class_exists( 'WooCommerce' ) && is_product() && !empty($post->ID)) :
			$terms = get_the_terms( $post->ID, 'product_cat' );
			$image = '';
			if($terms)
			foreach ($terms as $term) {
				$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				if($image != '')
					break;
			}
			$image = $image == '' ? $bg_image : $image;
			echo esc_url($image) ?>
	);" >
	<?php
	    elseif ( is_home() || is_archive() || is_page_template('blog-template.php') ) :
			$term = isset ($wp_query) ? $wp_query->get_queried_object() : '';
			$image = '';
			if(isset($term->taxonomy) && $term->taxonomy == 'category') {
				$post_thumbnail_id = get_post_thumbnail_id($term->term_id);
				$image = wp_get_attachment_url( $post_thumbnail_id );
			}
			elseif(isset($term->term_id)){
				$image = get_option("exproduct_tax_thumb".$term->term_id);
			}
			$image = $image == '' ? $bg_image : $image;
			echo esc_url($image) ?>
	);" >
	
	<?php
		elseif ( is_single() && get_post_type($post->ID) == 'post' ) :
			$categories = get_the_category($post->ID);
			$image = '';
			if($categories){
				foreach($categories as $category) {
					$image = get_option('exproduct_tax_thumb' . $category->term_id);
					if($image != '')
						break;
				}
			}
			$image = $image == '' ? $bg_image : $image;
			if( has_post_thumbnail() ){
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
				echo esc_url($post_thumbnail_url);
			}else{
				echo esc_url($image);
			}
				  ?>
	
	);" >
	
	
 

	<?php
		elseif( get_post_type() != 'portfolio' && get_post_type() != 'services') :
			if( has_post_thumbnail() ):
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );?>
	<?php 		echo esc_url($post_thumbnail_url) ?>
	);" >
	<?php 	else:?>
	<?php 		echo esc_url($bg_image); ?>);" >
	<?php 	endif;
	    else:
	        echo esc_url($bg_image); ?>);" >

	<?php endif; ?>
	<span class="vc_row-overlay"></span>
	<div class="container">
	    <div class="row">
	        <div class="col-md-12">
		        <div class="page-title-box">
		            <?php if( exproduct_get_option('tab_title_position', '') != 'hide' ) : ?>
		            <div class="ui-title-page <?php echo esc_attr($title_class) ?>">
		                <h1>
						<?php
						    $exproduct_postpage_id = get_option('page_for_posts');
							$exproduct_frontpage_id = get_option('page_on_front');
							$exproduct_page_id = isset ($wp_query) ? $wp_query->get_queried_object_id() : '';
						?>
						<?php if(is_single() && ! is_attachment()): ?>
						<?php echo wp_kses_post(get_the_title()); ?>
						<?php elseif( class_exists( 'WooCommerce' ) && (is_shop() || is_product_category() || is_product_tag()) ): ?>
						<?php wp_kses_post(woocommerce_page_title()); ?>
						<?php elseif( is_author() ): ?>
                        <?php echo wp_kses_post(get_the_author()); ?>
						<?php elseif( is_archive() && get_post_type() != 'post'): ?>
						<?php echo wp_kses_post($term->name); ?>
						<?php elseif( $exproduct_page_id == $exproduct_frontpage_id ): ?>
						<?php echo wp_kses_post(esc_html_e('Posts', 'exproduct'));  ?>
						<?php elseif( is_home() ): ?>
						<?php echo wp_kses_post(get_the_title($exproduct_postpage_id)); ?>
						<?php elseif( is_page_template( 'blog-template.php' ) ): ?>
						<?php echo wp_kses_post(get_the_title($exproduct_page_id));  ?>
						<?php elseif( is_search() ): ?>
						<?php echo wp_kses_post(get_search_query()); ?>
						<?php elseif( is_category() ): ?>
						<?php echo wp_kses_post(single_cat_title()); ?>
						<?php elseif( is_tag() ): ?>
						<?php echo wp_kses_post(single_tag_title()); ?>
						<?php elseif( $exproduct_page_id > 0 ): ?>
						<?php echo wp_kses_post(get_the_title($exproduct_page_id)); ?>
						<?php else: ?>
						<?php echo wp_kses_post(get_the_title()); ?>
						<?php endif; ?>
				        </h1>
					    <?php if( class_exists( 'RW_Meta_Box' ) && rwmb_meta( 'add_title_text' ) != '' && !is_home() ) : ?>
				            <span class="subtitle"><?php echo wp_kses_post(rwmb_meta( 'add_title_text' ))?></span>
				        <?php endif; ?>
				    </div>
				    <?php endif ?>

				    <?php if( exproduct_get_option('tab_breadcrumbs_position', '') != 'hide' ) : ?>
		            <div class="breadcrumbs <?php echo esc_attr($breadcrumbs_class) ?>">
		                <?php exproduct_show_breadcrumbs()?>
		            </div>
		            <?php endif ?>
	            </div>
	        </div>
	    </div>
	</div>
	<?php if( exproduct_get_option('tab_bottom_decor', '1') ) : ?>
	<div class="section-decor-wrap bottom">
	    <svg width="100%" height="90px">
	        <defs>
	            <pattern id="decor-shape-header" preserveAspectRatio="none" patternUnits="userSpaceOnUse" x="0" y="0" width="100%" height="900px" viewBox="0 0 100 1000">
                    <polygon fill="#ffffff" points="50,100 50,100 100,0 100,100 0,100 0,0  "></polygon>
                </pattern>
            </defs>
            <rect x="0" y="0" width="100%" height="90px" fill="url(#decor-shape-header)"></rect>
        </svg>
	</div>
	<?php endif ?>
</section><!--./top header -->
