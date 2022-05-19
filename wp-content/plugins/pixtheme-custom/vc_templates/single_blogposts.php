<?php 


$out = $css_class = $cnt = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );





$args = array(
	'posts_per_page'   => 4,
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

?>


<?php for( $i=0; $i < sizeof($posts_array); $i++ ){
	$post = $posts_array[$i];

	setup_postdata($post);
	
}


?>

<div class="section-block-news clearfix" >	
<?php
	$counter = 1;
	for( $i=0; $i < sizeof($posts_array); $i++ ){ 
		$post = $posts_array[$i];
        setup_postdata($post);
		$counter % 2 == 0 ? $data_translatext = '300' : $data_translatext = '-300';


		// thumbnail
		$custom =  get_post_custom($post->ID);
		$thumbnailId = (isset($custom['post_standared']))?reset($custom['post_standared']):false;

		if (!$thumbnailId){
			$thumbnailId = get_post_thumbnail_id($post->ID);
		}


		$thumbnailSrc = wp_get_attachment_url($thumbnailId);
?>	
	<div class="scrollme animateme" data-when="enter" data-from="0.5" data-to="0" data-opacity="0" data-translatex="<?php echo $data_translatext; ?>" data-translatey="0" data-rotatez="0" style="opacity: 1; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scale3d(1, 1, 1);">
		<section class="block-news section-bg" style = "background-image: url(<?php echo $thumbnailSrc;?>);">
			<div class="section__inner">
				<h2 class="block-news__title"><a class="block-news__title-link" href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h2>
				<div class="block-news__meta"><?php esc_html_e('Posted by:', 'exproduct') ?> <?php echo get_the_author_link($post->ID); ?>,
					<a class="block-news__time" href="<?php echo get_the_permalink($post->ID); ?>">
						<time><?php echo wp_kses_post(get_the_time('d F Y', $post->ID)); ?></time>
					</a>
				</div>
                   <p class="block-news__info">
				    <?php echo get_the_excerpt($post->ID); ?>
                   </p>
			
			</div>
		</section>
	</div>

<?php 
		$counter++;
	} 
?>
<i class="block-news__icon pe-7s-pen"></i>
</div>





<div class="section-block-news clearfix" id="news">

	
</div>