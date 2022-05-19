<?php
/*** Single Portfolio Default template. */

?>

	<div class="row">
		<div class="col-md-8">
			<div class="work-image">
				<div class="image">
					<?php
					if ( $exproduct_portfolio_post_type == 'image' ) : ?>
						<div class="single-portfolio-carousel owl-carousel enable-owl-carousel owl-theme" data-auto-play="4000" data-single-item="true"  data-items="1" data-responsive-items="1" data-pagination="true">
							<div class="item">
								<a href="<?php echo esc_url($exproduct_portfolio_link); ?>" class="fancybox" data-rel="gallery[pp_gal_001]">
									<?php the_post_thumbnail( $post->ID, 'full', array('class' => 'img-responsive') ); ?>
								</a>
							</div>
							<?php
								if ( $exproduct_portfolio_gallery ) {
									foreach ( $exproduct_portfolio_gallery as $key => $slide ) {
											if ( $key > 0 ) :
									?>
									<div class="item">
										<a href="<?php echo esc_url($slide['url']); ?>" class="fancybox" data-rel="gallery[pp_gal_001]">
											<img src="<?php echo esc_url($slide['url']); ?>" width="<?php echo esc_attr($slide['width']); ?>" height="<?php echo esc_attr($slide['height']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" title="<?php echo esc_attr($slide['title']); ?>"/>
										</a>
									</div>
									<?php 	endif;
									}
								}

							 ?>
						</div>
						<?php
						if ( $exproduct_portfolio_gallery ) :
							foreach ( $exproduct_portfolio_gallery as $key => $slide ) :
								if ( $key > 0 ) :
								?>
									<div class="portfolio-gallery-none">
										<a href="<?php echo esc_url($slide['url']); ?>" class="fancybox" data-rel="gallery[pp_gal_001]" ><img src="<?php echo esc_url($slide['url']); ?>" width="<?php echo esc_attr($slide['width']); ?>" height="<?php echo esc_attr($slide['height']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" title="<?php echo esc_attr($slide['title']); ?>"/></a>
									</div>
								<?php
								endif;
							endforeach;
						endif;
						?>

					<?php
					endif; ?>

					<?php
					if ( $exproduct_portfolio_post_type == 'video' ) : ?>
						<div class="item">
							<?php the_post_thumbnail( $post->ID, 'full', array('class' => 'img-responsive') ); ?>
						</div>
						<?php
						$exproduct_portfolio_video_href = ( class_exists( 'RW_Meta_Box' ) ) ? get_post_meta( get_the_ID(), 'portfolio_video_href', true ) : '';
						if ( $exproduct_portfolio_video_href != '' ) :
							$exproduct_portfolio_video_width = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_video_width') : '';
							$exproduct_portfolio_video_height = ( class_exists( 'RW_Meta_Box' ) ) ? rwmb_meta('portfolio_video_height') : '';
							?>
							<div class="controls">
								<div class="big-view"><a href="<?php echo esc_url($exproduct_portfolio_video_href.'?width='.esc_attr($exproduct_portfolio_video_width).'&amp;height='. esc_attr($exproduct_portfolio_video_height)) ?>" class="fancybox" data-rel="gallery[pp_gal_<?php echo esc_attr($post->ID); ?>]"><span class="icon icon-Media"></span></a></div>
							</div>
						<?php
						endif;
						?>

					<?php
					endif;?>
				</div>
			</div>
			<div class="work-body">
				<div class="work-body">
					<div class="work-name">
						<?php the_title( '<h3>', '</h3>' ); ?>
					</div>
					<div class="rtd"><?php the_content(); ?></div>
					<?php if ( $exproduct_portfolio_button_link != '') : ?>
						<a href="<?php echo esc_url($exproduct_portfolio_button_link); ?>" class="btn btn-default" target="_blank"><?php esc_html_e( 'View project', 'exproduct' ); ?></a>
					<?php endif; ?>

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="work-body">
				<div class="row">
					<div class="col-md-12 col-sm-12 work-body-info">
						<div class="summary-list">
							<?php if ( $exproduct_portfolio_create != '') : ?>
							<div class="col-md-12 clearfix">
								<div class="type-info pull-left">
									<i class="icon icon-User"></i>
									<?php esc_html_e( 'Created by', 'exproduct' ); ?>
								</div>
								<div class="info pull-right text-right">
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
								<div class=" pull-right text-right">
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
								<div class=" pull-right text-right">
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
								<div class=" pull-right text-right">
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