<?php
$comments = wp_count_comments($post->ID);
$categories = wp_get_post_categories($post->ID,array('fields' => 'all'));
$tags = get_the_tags($post->ID);
?>


<div class="post-image">
				<?php
					$exproduct_format  = get_post_format();
			        $exproduct_format = !in_array($exproduct_format, array("quote", "gallery", "video")) ? 'standared' : $exproduct_format;
			        get_template_part( 'templates/post-single/blog', $exproduct_format);
				?>
				
            </div>



		<div class="post-body">

			 <h4 class="post-name"><?php wp_kses_post(the_title())?></h4>
            

			<div class="post-description">
                
                
               <div class="post-date">
                
                <span class="author"><?php esc_html_e('Posted by', 'exproduct')?> <?php the_author_posts_link(); ?></span>
                <i class="fa fa-clock-o" ></i>
				<?php if(exproduct_get_option('blog_settings_date', 1)) : ?>
				<?php echo get_the_time('M j Y'); ?>
				<?php endif ?>
                <?php if( 'open' == $post->comment_status && exproduct_get_option('blog_settings_comments', 1) ) : ?>
		           <span class="fa fa-comment-o"></span><?php comments_popup_link( '0', '1', '%', 'vcenter'); ?>
		        <?php endif ?>
            </div>
            
            </div>

			
			
                <p></p>

                <!-- === BLOG TEXT === -->
				<div class="post-content rtd">
					<?php wp_link_pages();?>
	                <?php the_content()?>
				</div>

        

			

        </div>
        <!--blog-post-->


<div class="post-footer">
				<!-- === BLOG CATEGORIES === -->
				<?php if(exproduct_get_option('blog_settings_categories', 1)) : ?>
					<div class="footer-meta blog-footer-categories">  
                          <div class="blog-footer-title"><?php esc_html_e('Categories:', 'exproduct')?></div>
						<?php $catIndex = 0; foreach($categories as $category):?>
							<a href="<?php echo esc_url(get_category_link($category->term_id))?>">
								<?php echo esc_attr($category->name) ?>
							</a>
							<?php $catIndex++; endforeach ?>
					</div>
				<?php endif ?>
				<?php if ($tags && exproduct_get_option('blog_settings_tags', 1)):?>
					<div class="footer-meta blog-footer-tags">
	                   <div class="blog-footer-title"><?php esc_html_e('Tags:', 'exproduct')?></div>
		                    <?php $tagIndex = 0; foreach($tags as $tag):?>
		                    <a href="<?php echo esc_url(get_tag_link( $tag->term_id ))?>" class="entry-meta__link">
		                       <?php echo esc_attr($tag->name)?>
		                    </a>
			                    <?php $tagIndex++; endforeach; ?>
	                
					</div>
				<?php endif;?>

                <!-- === BLOG SHARE === -->
				<?php if(shortcode_exists( 'share' ) && exproduct_get_option('blog_settings_share', 1)) : ?>
					<?php echo do_shortcode('[share title="'.esc_html__('Share this post', 'exproduct').'"]'); ?>
				<?php endif ?>

            </div>

     
		<?php comments_template(); ?>

