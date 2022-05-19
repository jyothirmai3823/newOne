<?php /*** The template for displaying 404 pages (not found) ***/ ?>

<?php get_header(); ?>
<!-- PAGE CONTENTS STARTS
	========================================================================= -->
<section class="blog-content-section page-404">
	<div class="container">
		<div class="row rtd">
			<div class="col-xs-12 col-sm-12">
				<h2 class="notfound_title">
					<?php esc_html_e('Page not found', 'exproduct'); ?>
				</h2>
				<div class="line"></div>
				<p class="notfound_description large">
					<?php esc_html_e('The page you are looking for seems to be missing.', 'exproduct'); ?>
				</p>
				<a class="notfound_button" href="javascript: history.go(-1)">
				<?php esc_html_e('Return to previous page', 'exproduct'); ?>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- /. PAGE CONTENTS ENDS
	========================================================================= -->
<?php get_footer(); ?>