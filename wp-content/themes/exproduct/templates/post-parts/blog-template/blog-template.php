<?php
/**
 * This template is for displaying part of blog.
 *
 * @package Pix-Theme
 * @since 1.0
 */
$exproduct_format  = get_post_format();
$pix_options = get_option('pix_general_settings');
$custom =  get_post_custom($post->ID);
$layout = isset ($custom['_page_layout']) ? $custom['_page_layout'][0] : '1';
$exproduct_date = $exproduct_cat = $exproduct_dev = '';
$exproduct_format = !in_array($exproduct_format, array("quote", "gallery", "video")) ? "standared" : $exproduct_format;
if(exproduct_get_option('blog_settings_date', 1)) {
				$exproduct_date = '<a href="' . esc_url(get_the_permalink()) . '">' . get_the_date() . '</a>';
			}
			if( exproduct_get_option('blog_settings_category', 1) ){
				$exproduct_categories = get_the_category(get_the_ID());
				if($exproduct_categories){
					foreach($exproduct_categories as $category) {
						$exproduct_cat .= '<a href="'.esc_url(get_category_link( $category->term_id )).'">'.wp_kses_post($category->cat_name).' , </a>';
					}
				}
			}
			



?>

    
    <div class="post-body">
        <h4 class="post-name"><a href="<?php esc_url(the_permalink())?>"><?php wp_kses_post(the_title())?></a></h4>

        <?php wp_link_pages();?>
        
        <div class="post-description">
         
             <?php if( $exproduct_date != '' || $exproduct_cat != '' ) : ?>
                    <div class="post-date">
                         <?php echo wp_kses_post($exproduct_dev) ?>
                        <i class="fa fa-folder-o"></i><?php echo wp_kses_post($exproduct_cat) ?>
                        <i class="fa fa-clock-o" ></i><?php echo wp_kses_post($exproduct_date) ?>
                       
            </div>
             <?php endif; ?>
            
        </div>

        <div class="rtd">
        <?php
			if (get_option('rss_use_excerpt') == 0 && !is_search())
				the_content();
			else
				echo do_shortcode(get_the_excerpt());
		?>
		</div>

        
    </div>


<div class="post_footer"><a href="<?php echo esc_url(get_the_permalink())?>" class="post_read_more"><?php esc_html_e( 'Read more', 'exproduct' )?> <i class="fa fa-long-arrow-right"></i></a></div>



