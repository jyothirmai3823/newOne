<?php

/**
 * Iconc loader for VC
 * version 1.15.11
 */

function exproduct_init_vc_icons(){
    $pix_libs = $pix_fonts = $pix_fonts_str = $params = $params1 = $params2 = array();

    if(function_exists('fil_init')) {

        if( array_key_exists( 'vc_iconpicker-type-pixflaticon' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Flaticon', 'exproduct' )] = 'pixflaticon';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixfontawesome' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Font Awesome', 'exproduct' )] = 'pixfontawesome';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixelegant' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Elegant', 'exproduct' )] = 'pixelegant';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixicomoon' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Icomoon', 'exproduct' )] = 'pixicomoon';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixsimple' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Simple', 'exproduct' )] = 'pixsimple';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixstroke' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Stroke-Gap-Icons', 'exproduct' )] = 'pixstroke';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixcustom' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Custom', 'exproduct' )] = 'pixcustom';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixcustom1' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Custom 1', 'exproduct' )] = 'pixcustom1';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixcustom2' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Custom 2', 'exproduct' )] = 'pixcustom2';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixcustom3' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Custom 3', 'exproduct' )] = 'pixcustom3';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixcustom4' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Custom 4', 'exproduct' )] = 'pixcustom4';
        }
        if( array_key_exists( 'vc_iconpicker-type-pixcustom5' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'Custom 5', 'exproduct' )] = 'pixcustom5';
        }
        if( array_key_exists( 'vc_iconpicker-type-fontawesome' , $GLOBALS['wp_filter']) ) {
            $pix_libs[esc_html__( 'VC Font Awesome', 'exproduct' )] = 'fontawesome';
        }
        if( get_option('fil_use_vc_icons') ) {
            if (array_key_exists('vc_iconpicker-type-openiconic', $GLOBALS['wp_filter'])) {
                $pix_libs[esc_html__('VC Open Iconic', 'exproduct')] = 'openiconic';
            }
            if (array_key_exists('vc_iconpicker-type-typicons', $GLOBALS['wp_filter'])) {
                $pix_libs[esc_html__('VC Typicons', 'exproduct')] = 'typicons';
            }
            if (array_key_exists('vc_iconpicker-type-entypo', $GLOBALS['wp_filter'])) {
                $pix_libs[esc_html__('VC Entypo', 'exproduct')] = 'entypo';
            }
            if (array_key_exists('vc_iconpicker-type-linecons', $GLOBALS['wp_filter'])) {
                $pix_libs[esc_html__('VC Linecons', 'exproduct')] = 'linecons';
            }
        }
        $add_icon_libs = array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon library', 'exproduct' ),
            'param_name' => 'type',
            'value' => $pix_libs,
            'admin_label' => true,
            'description' => esc_html__( 'Select icon library.', 'exproduct' ),
        );

        if (is_array($pix_libs)) {
            $pix_fonts_str[] = $add_icon_libs;

            foreach ($pix_libs as $val) {
                if ($val != ''){
                    $pix_fonts[$val] = array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'exproduct'),
                        'param_name' => 'icon_' . $val,
                        'value' => '',
                        'settings' => array(
                            'emptyIcon' => true,
                            'type' => $val,
                            'iconsPerPage' => 4000,
                        ),
                        'dependency' => array(
                            'element' => 'type',
                            'value' => $val,
                        ),
                        'description' => esc_html__('Select icon from library.', 'exproduct'),
                    );
                }

                $pix_fonts_str[] = $pix_fonts[$val];
            }
        }
    }
    return $pix_fonts_str;
}



function exproduct_get_vc_icons($pix_fonts_str){
    $result = array();
    if (!empty($pix_fonts_str) && function_exists('fil_init'))
        $result = apply_filters('exproduct_vc_icons_loader_show',$pix_fonts_str);
    return array_values($result);

}






?>