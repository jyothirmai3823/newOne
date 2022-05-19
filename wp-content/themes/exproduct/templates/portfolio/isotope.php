<?php
/*** Single Portfolio Centered template. */

?>
<div class="portfolio-isotope">
	<div class="work-body">
		<div class="row">
			<div class="col-md-8 col-sm-7">
				<div class="work-name">
					<?php the_title( '<h3>', '</h3>' ); ?>
				</div>
				<div class="rtd"><?php the_content(); ?></div>
				<?php if ( $exproduct_portfolio_button_link != '') : ?>
					<a href="<?php echo esc_url($exproduct_portfolio_button_link); ?>" class="btn btn-default" target="_blank"><?php esc_html_e( 'View project', 'exproduct' ); ?></a>
				<?php endif; ?>
			</div>
			<div class="col-md-4 col-sm-5 work-body-info">
				<div class="summary-list">
					<?php if ( $exproduct_portfolio_create != '') : ?>
					<div class="col-md-12 clearfix">
						<div class="type-info pull-left">
							<i class="icon icon-User"></i>
							<?php esc_html_e( 'Created by', 'exproduct' ); ?>
						</div>
						<div class="pull-right text-right">
							<p class="no-margin"><?php echo wp_kses_post($exproduct_portfolio_create); ?></p>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( $exproduct_portfolio_complete != '') : ?>
					<div class="col-md-12 clearfix">
						<div class="type-info pull-left">
							<i class="icon icon-Agenda"></i>
							<?php esc_html_e( 'Completed on', 'exproduct' ); ?>
						</div>
						<div class="pull-right text-right">
							<p class="no-margin"><?php echo wp_kses_post($exproduct_portfolio_complete); ?></p>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( $exproduct_portfolio_skills != '') : ?>
					<div class="col-md-12 clearfix">
						<div class="type-info pull-left">
							<i class="icon icon-Layers"></i>
							<?php esc_html_e( 'Skills', 'exproduct' ); ?>
						</div>
						<div class="info pull-right text-right">
							<p class="no-margin"><?php echo wp_kses_post($exproduct_portfolio_skills); ?></p>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( $exproduct_portfolio_client != '') : ?>
					<div class="col-md-12 clearfix">
						<div class="type-info pull-left">
							<i class="icon icon-DesktopMonitor"></i>
							<?php esc_html_e( 'Client', 'exproduct' ); ?>
						</div>
						<div class="info pull-right text-right">
							<p class="no-margin">
								<?php if ( $exproduct_portfolio_client_link != '') : ?>
									<a href="<?php echo esc_url($exproduct_portfolio_client_link); ?>" target="_blank">
									<?php echo wp_kses_post($exproduct_portfolio_client); ?>
									</a>
								<?php else : ?>
									<?php echo wp_kses_post($exproduct_portfolio_client); ?>
								<?php endif; ?>
							</p>
						</div>
					</div>
					<?php endif; ?>
					<?php if ( exproduct_get_option( 'portfolio_settings_share', 'on' ) == 'on' ) : ?>
					<div class="col-md-12 clearfix">
						<div class="type-info pull-left">
							<i class="icon icon-Antenna1"></i>
							<?php esc_html_e( 'Share', 'exproduct' ); ?>
						</div>
						<div class=" pull-right text-right">
							<?php echo do_shortcode('[share post_type="portfolio"]'); ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</div>


		</div>
	</div>
</div>

<div><div>
<div class="row isotope-portfolio portfolio-masonry-holder list-works clearfix">

	<?php
	if ( $exproduct_portfolio_post_type == 'image' ) : ?>
		<div class="col-md-3 col-sm-4 col-xs-6 item">
			<div class="portfolio-item">
				<div class="portfolio-image">
					<a href="<?php echo esc_url($exproduct_portfolio_link); ?>" class="fancybox" rel="gallery[pp_gal_001]">
						<?php the_post_thumbnail( 'exproduct-portfolio-thumb', array('class' => 'img-responsive') ); ?>
					</a>
				</div>
			</div>
		</div>
			<?php
			if ( $exproduct_portfolio_gallery ) {
				foreach ( $exproduct_portfolio_gallery as $key => $slide ) {
						if ( $key > 0 ) :
							$link = isset($slide['sizes']['exproduct-portfolio-thumb']['file']) ? str_replace($slide['name'], $slide['sizes']['exproduct-portfolio-thumb']['file'], $slide['url']) : $slide['url'];
				?>
		<div class="col-md-3 col-sm-4 col-xs-6 item">
			<div class="portfolio-item">
				<div class="portfolio-image">
					<a href="<?php echo esc_url($slide['url']); ?>" class="fancybox" rel="gallery[pp_gal_001]">
						<img src="<?php echo esc_url($link); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" title="<?php echo esc_attr($slide['title']); ?>"/>
					</a>
				</div>
			</div>
		</div>
				<?php 	endif;
				}
			}
	endif;
	?>
