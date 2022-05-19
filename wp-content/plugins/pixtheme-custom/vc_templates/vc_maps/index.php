<?php 
/**  Theme_vc_index  **/

add_action( 'vc_before_init', 'exproduct_integrateWithVC', 200 );

function exproduct_integrateWithVC() {
    /** Fonts Icon Loader */

    include_once( get_template_directory() . '/vc_templates/vc_maps/vc_common.php' );
    include_once( get_template_directory() . '/vc_templates/vc_maps/vc_single.php' );

    //////////////////////////////////////////////////////////////////////

	if(isset($_GET['vc_action']) && $_GET['vc_action'] == 'vc_inline'){
		wp_enqueue_style('exproduct-theme', get_stylesheet_directory_uri() . '/css/editor_styles.css');
	}

	return true;

}
?>