<?php
/*** The html form for search input. ***/
?>

	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url(site_url()) ?>">
		<div>
			<input type="text" placeholder="<?php esc_html_e('Search', 'exproduct');?>" value="<?php esc_attr(the_search_query()); ?>" name="s" id="search">
			<input type="submit" id="searchsubmit" value="<?php esc_html_e('Search', 'exproduct');?>">
		</div>
	</form>