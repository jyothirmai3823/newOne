<?php
$post_ID = isset ($wp_query) ? $wp_query->get_queried_object_id() : (get_the_ID()>0 ? get_the_ID() : '');
$custom =  get_post_custom($post_ID);
$layout = isset ($custom['_page_layout']) ? $custom['_page_layout'][0] : '1';
$i=0;
?>

<?php if ( ! have_posts() ) : ?>
    <div  class="post error404 not-found">
        <h1 class="entry-title"><?php esc_html_e( 'Not Found', 'exproduct' ); ?></h1>
        <div class="entry-content">
            <p><?php esc_html_e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'exproduct' ); ?></p>
            <?php get_search_form(); ?>
        </div><!-- .entry-content -->
    </div><!-- #post-0 -->
<?php endif; ?>


	<?php while ( have_posts() ) : the_post(); ?>
        <?php
            $exproduct_class = $exproduct_date = $exproduct_cat = $exproduct_dev = '';
            $exproduct_format  = get_post_format();
            $exproduct_format = !in_array($exproduct_format, array("quote", "gallery", "video")) ? 'standared' : $exproduct_format;
            if(exproduct_get_option('blog_settings_date', 1)) {
				$exproduct_date = '<a href="' . esc_url(get_the_permalink()) . '">' . get_the_time('j M Y') . '</a>';
			}
			if( exproduct_get_option('blog_settings_category', 1) ){
				$exproduct_categories = get_the_category(get_the_ID());
				if($exproduct_categories){
					foreach($exproduct_categories as $category) {
						$exproduct_cat .= '<a href="'.esc_url(get_category_link( $category->term_id )).'">'.wp_kses_post($category->cat_name).'</a>';
					}
				}
			}
			if( $exproduct_date != '' && $exproduct_cat != '' ){
				$exproduct_dev = '|';
			}
			$exproduct_img_class = !has_post_thumbnail() ? 'no-image' : '';
			$exproduct_blog_item = get_post_format() ? get_post_format() : 'standared';
			$classes = array('wrap-blog-post','blog-item-'.$exproduct_blog_item,$exproduct_img_class);
        ?>
        <div id="post-<?php esc_attr(the_ID()); ?>" <?php post_class($classes); ?>>
            <div class="wrap-image wrap-image-grid">
                <?php get_template_part( 'templates/post-parts/post-format/blog', $exproduct_format); ?>
                
               
                
			</div>

            <div class="wrap-info wrap-info-grid">
	        <?php get_template_part( 'templates/post-parts/blog-template/blog', 'template'); ?>
                </div>

        </div>

    <?php endwhile;?>

