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

$exproduct_format = !in_array($exproduct_format, array("quote", "gallery", "video")) ? "standared" : $exproduct_format;
$icon = array("standared" => "icon-picture", "quote" => "fa fa-pencil", "gallery" => "icon-camera", "video" => "fa fa-video-camera");
	
?>
	      
        
        	
            