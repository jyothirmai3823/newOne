<?php

function exproduct_import_files() {
    

    
    add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
    
    return array(
        
		array(
            'import_file_name'           => esc_html__( 'Exproduct Theme', 'exproduct' ),
            'import_file_url'            => esc_url('http://assets.templines.com/plugins/theme/exproduct/khh9289jq2zfm5s9w96tytzn4sm6jvkkmu2ubbr3hy7j5xhdbj8kgv2tpuhek22pqzgjmm3jx4n4zksjg5te4b3hgtywmvy72j/exproduct.xml'),
            'import_widget_file_url'     => esc_url('http://assets.templines.com/plugins/theme/exproduct/khh9289jq2zfm5s9w96tytzn4sm6jvkkmu2ubbr3hy7j5xhdbj8kgv2tpuhek22pqzgjmm3jx4n4zksjg5te4b3hgtywmvy72j/exproduct.wie'),
            'import_customizer_file_url' => esc_url('http://assets.templines.com/plugins/theme/exproduct/khh9289jq2zfm5s9w96tytzn4sm6jvkkmu2ubbr3hy7j5xhdbj8kgv2tpuhek22pqzgjmm3jx4n4zksjg5te4b3hgtywmvy72j/exproduct.dat'),
            'import_preview_image_url'   => esc_url('http://assets.templines.com/plugins/theme/exproduct/khh9289jq2zfm5s9w96tytzn4sm6jvkkmu2ubbr3hy7j5xhdbj8kgv2tpuhek22pqzgjmm3jx4n4zksjg5te4b3hgtywmvy72j/exproduct.jpg'),
            'import_notice'   
        ),
        
        
    );
}
add_filter( 'pt-ocdi/import_files', 'exproduct_import_files' );


function exproduct_after_import( $selected_import ) {

    $menu_arr = array();
    
    $main_menu = get_term_by('name', 'main', 'nav_menu');
    $top_menu = get_term_by('name', 'top', 'nav_menu');
    
    if ( 'Exproduct Theme' === $selected_import['import_file_name'] ) {
    	$main_menu = get_term_by('name', 'main', 'nav_menu');
    } 
    
        

    
    if(is_object($main_menu)) {
    	$menu_arr['primary_nav'] = $main_menu->term_id;
    }
    if(is_object($top_menu)) {
    	$menu_arr['top_nav'] = $top_menu->term_id;
    }
    set_theme_mod( 'nav_menu_locations', $menu_arr );

   
     
    if ( 'Exproduct Theme' === $selected_import['import_file_name'] ) {
    	
        
         $slider_array = array(
             get_template_directory()."/library/revslider/app-landing-page.zip",
             get_template_directory()."/library/revslider/app.zip",
             get_template_directory()."/library/revslider/app carousel.zip",
             get_template_directory()."/library/revslider/app-hand.zip",
             get_template_directory()."/library/revslider/bear-video.zip",
             get_template_directory()."/library/revslider/bear.zip",
             get_template_directory()."/library/revslider/home.zip",
             get_template_directory()."/library/revslider/image_slider_watch.zip",
             get_template_directory()."/library/revslider/media-carousel-autoplay18.zip",
             get_template_directory()."/library/revslider/video-app.zip",
             get_template_directory()."/library/revslider/video-watch.zip",
             get_template_directory()."/library/revslider/video-watch1.zip",
    );
        
    } 
    
        


    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );
	
	
	

    update_option( 'show_on_front', 'page' );
    
    if ( 'Exproduct Theme' === $selected_import['import_file_name'] ) {
    	update_option( 'page_on_front', 9119 );
    } 
    
        
    
    
    
    update_option( 'page_for_posts', $blog_page_id->ID );
    
      set_theme_mod( 'fixar_footer_block', '1308' );
   
    
    

    $absolute_path = __FILE__;
    $path_to_file = explode( 'wp-content', $absolute_path );
    $path_to_wp = $path_to_file[0];

    require_once( $path_to_wp.'/wp-load.php' );
    require_once( $path_to_wp.'/wp-includes/functions.php');

    $slider = new RevSlider();

    foreach($slider_array as $filepath){
     $slider->importSliderFromPost(true,true,$filepath);
    }
	
	update_post_meta($blog_page_id->ID,'pix_selected_sidebar','sidebar-1');

}
add_action( 'pt-ocdi/after_import', 'exproduct_after_import' );

?>