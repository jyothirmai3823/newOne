<?php 
	function exproduct_get_option($slug,$_default = false){
		
		if ($stgs = exproduct_getCustomizeSettings()){
			$slug_option_name = 'exproduct_'.$slug;
			if (isset($stgs->$slug_option_name))
				return wp_kses_post($stgs->$slug_option_name);
		}

		$slug = 'exproduct_' . $slug;

		$pix_options = get_theme_mods();

		if (isset($pix_options[$slug])){
			return wp_kses_post($pix_options[$slug]);
		}else{
			if ($_default)
				return wp_kses_post($_default);
			else
				return false;	
		}
		
	}

	function exproduct_getCustomizeSettings(){
		if (isset($_POST['wp_customize']) && $_POST['wp_customize'] == 'on'){
			$settings = json_decode(stripslashes($_POST['customized']));
			return $settings;	
		}else{
			return false;
		}

	}

	function exproduct_get_global_data($slug){
		return isset($GLOBALS[$slug]) ? $GLOBALS[$slug] : 0;
	}

	function exproduct_set_global_data($slug, $data, $index = false){
		if ($index !== false){

			$GLOBALS[$slug][$index] = $data;
		}else{
			$GLOBALS[$slug] = $data;
		}
	}

?>