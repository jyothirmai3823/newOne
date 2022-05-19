
<?php
/**
 * This template is for displaying part of blog.
 *
 * @package Pix-Theme
 * @since 1.0
 */

?>
	<?php if ( has_post_thumbnail() ):?>
		<a href="<?php esc_url(the_permalink())?>"><?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></a>
	<?php endif; ?>
