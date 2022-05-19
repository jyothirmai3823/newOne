<?php 


$out = $css_class = $cnt = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class .= $this->getCSSAnimation($css_animation);

if (!isset($block_type)) $block_type = false;

$args = array(
	'posts_per_page'   => $count,
	'offset'           => 0,
	'category'         => '',
	'category_name'    => '',
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$posts_array = get_posts( $args );
$picon = '';
if(function_exists('fil_init')){
	$picon = isset( ${"icon_" . $type} ) ? ${"icon_" . $type} : '';
}
 ?>

<?php if ($block_type != 'hor'):?> 
	 
	<div class="blog-preview">
	
		<h3 class="title-primary font-additional font-weight-bold text-uppercase zoomIn" style="visibility: visible; "><?php echo esc_attr($title)?></h3>
		<?php if (strlen($picon)):?>
			<div class="starSeparator">
				<span aria-hidden="true" class="<?php echo esc_attr($picon)?>"></span>
			</div>  
		<?php endif;?> 
	<?php for( $i=0; $i < sizeof($posts_array); $i++ ):
		$post = $posts_array[$i];


		if (function_exists('rwmb_meta')){
			$exproduct_content = rwmb_meta('post_quote_content');
			$exproduct_source = rwmb_meta('post_quote_source');
		}else{
			$exproduct_content = get_post_meta( $post->ID, 'post_quote_content', true );
			$exproduct_source = get_post_meta( $post->ID, 'post_quote_source', true );
		}
		$exproduct_format = get_post_format();
		$exproduct_format = !in_array($exproduct_format, array("quote", "gallery", "video")) ? "standared" : $exproduct_format;
		$icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");

		$custom =  get_post_custom($post->ID);
		$thumbnailId = (isset($custom['post_standared']))?reset($custom['post_standared']):false;

		if (!$thumbnailId){
			$thumbnailId = get_post_thumbnail_id($post->ID);
		}


		$thumbnailSrc = wp_get_attachment_url($thumbnailId);


	?>
	
	
	
	                            
	                            
	                            
	<div class="blog-preview_item">
		<a href="<?php echo esc_url(get_the_permalink($post->ID))?>" class="blog-preview_image">
			<?php if ( has_post_thumbnail($post->ID) ):?>
				<img class="attachment-post-thumbnail wp-post-image" src="<?php echo esc_url($thumbnailSrc)?>"/>
			<?php else:?>	
				<img src="<?php echo get_template_directory_uri() . '/images/noimage.jpg'?>" alt="<?php echo esc_attr(get_the_title($post->ID))?>"/>
		    <?php endif ?>
		    <?php if ($show_dc):?>
			<div class="blog-preview_posted">
				<span class="blog-preview_date font-additional font-weight-bold text-uppercase"><?php echo esc_attr(date('d',strtotime($post->post_date))) . ' ' . esc_attr(date('M',strtotime($post->post_date))) ?></span>
				<span class="blog-preview_comments font-additional font-weight-normal text-uppercase"><?php echo esc_attr($post->comment_count)?> <?php echo esc_html__('comment(s)','exproduct')?></span>
			</div>
			<?php endif;?>
		</a>
		<div class="blog-preview_info">
			<h4 class="blog-preview_title font-additional font-weight-bold text-uppercase"><?php echo esc_attr(get_the_title($post->ID))?></h4>
			<div class="blog-preview_desc font-main font-weight-normal"><?php $content = get_the_content($post->ID);
                $trimmed_content = preg_replace("#\[.*?\]#is",'',$content);
                $trimmed_content = wp_trim_words( $trimmed_content, 60);

				  ?>
				  <p><?php echo esc_html($trimmed_content); ?></p></div>
			<a class="blog-preview_btn button-border font-additional font-weight-normal before-bg text-uppercase hvr-rectangle-out hover-focus-bg" href="<?php echo esc_url(get_the_permalink($post->ID))?>"><?php echo esc_html__('MORE','exproduct')?></a>
		</div>
	</div>
	
	
	
	<?php endfor;?>
	</div>

<?php else:?>
		<section id="fromBlog">
				<div class="container">
					<h3 class="title-small font-additional font-weight-bold text-uppercase"><?php echo esc_attr($title)?></h3>
					<div class="blog-container">
						<?php if (strlen($picon)):?>
							<div class="starSeparator">
								<span aria-hidden="true" class="<?php echo esc_attr($picon)?>"></span>
							</div>  
						<?php endif;?>
						
						<div class="row">
						<?php for( $i=0; $i < sizeof($posts_array); $i++ ):
							$post = $posts_array[$i];

							setup_postdata($post);
							if (function_exists('rwmb_meta')){
								$exproduct_content = rwmb_meta('post_quote_content');
								$exproduct_source = rwmb_meta('post_quote_source');
							}else{
								$exproduct_content = get_post_meta( $post->ID, 'post_quote_content', true );
								$exproduct_source = get_post_meta( $post->ID, 'post_quote_source', true );
							}
							$exproduct_format = get_post_format();
							$exproduct_format = !in_array($exproduct_format, array("quote", "gallery", "video")) ? "standared" : $exproduct_format;
							$icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");

							$custom =  get_post_custom($post->ID);
							$thumbnailId = (isset($custom['post_standared']))?reset($custom['post_standared']):false;

							if (!$thumbnailId){
								$thumbnailId = get_post_thumbnail_id($post->ID);
							}


							$thumbnailSrc = wp_get_attachment_url($thumbnailId);
						?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 clearfix">
								<div class="blog-preview-small">
									<?php if ( has_post_thumbnail($post->ID) ):?>
										<img class="attachment-post-thumbnail wp-post-image" src="<?php echo esc_url($thumbnailSrc)?>"/>
									<?php else:?>	
										<img width="350" height="320" src="<?php echo get_template_directory_uri() . '/images/noimage.jpg'?>" alt="<?php echo esc_attr(get_the_title($post->ID))?>"/>
								    <?php endif ?>
									<a href="<?php echo esc_url(get_the_permalink($post->ID))?>" class="blog-preview-small_link">
										<span class="blog-preview-small_txt font-additional font-weight-bold color-main"><?php echo esc_attr(get_the_title($post->ID))?></span>
										<div class="blog-preview_posted">
											<span class="blog-preview_date font-additional font-weight-bold text-uppercase"><?php echo esc_attr(date('d',strtotime($post->post_date))) . ' ' . esc_attr(date('M',strtotime($post->post_date))) ?></span>
											<span class="blog-preview_comments font-additional font-weight-normal text-uppercase"><?php echo esc_attr($post->comment_count)?> <?php echo esc_html__('comment(s)','exproduct')?></span>
										</div>
									</a>
								</div>
								<a href="<?php echo esc_url(get_the_permalink($post->ID))?>" class="blog-preview-small_more button-border font-additional font-weight-normal before-bg text-uppercase hvr-rectangle-out hover-focus-bg" ><?php echo esc_html__('MORE','exproduct')?></a>
							</div>
							<?php endfor;?>
						</div>
					</div>
				</div>
			</section>
<?php endif;?>

