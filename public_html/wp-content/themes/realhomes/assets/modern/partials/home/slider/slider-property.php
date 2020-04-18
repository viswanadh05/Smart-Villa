<?php
/**
 * Homepage Property Slider
 *
 * @since 3.0.0
 * @package RH/modern
 */

$number_of_slides = intval( get_option( 'theme_number_of_slides' ) );
if ( ! $number_of_slides ) {
	$number_of_slides = -1;
}

$slider_args = array(
	'post_type'     => 'property',
	'posts_per_page'    => $number_of_slides,
	'meta_query'    => array(
		array(
			'key'   => 'REAL_HOMES_add_in_slider',
			'value' => 'yes',
			'compare'   => 'LIKE',
		),
	),
);

$slider_query = new WP_Query( $slider_args );

if ( $slider_query->have_posts() ) : ?>

	<!-- Slider -->
	<section id="rh_slider__home" class="rh_slider clearfix">
		<div class="flexslider loading">
			<ul class="slides">
				<?php
				while ( $slider_query->have_posts() ) :
					$slider_query->the_post();
					$slide_id 			= get_the_ID();
					$slider_image_id 	= get_post_meta( $slide_id, 'REAL_HOMES_slider_image', true );
					$property_size 		= get_post_meta( $slide_id, 'REAL_HOMES_property_size', true );
					$size_postfix 		= get_post_meta( $slide_id, 'REAL_HOMES_property_size_postfix', true );
					$property_bedrooms	= get_post_meta( $slide_id, 'REAL_HOMES_property_bedrooms', true );
					$property_bathrooms	= get_post_meta( $slide_id, 'REAL_HOMES_property_bathrooms', true );
					$property_address	= get_post_meta( $slide_id, 'REAL_HOMES_property_address', true );
					$is_featured 		= get_post_meta( $slide_id, 'REAL_HOMES_featured', true );
					if ( $slider_image_id ) {
						$slider_image_url = wp_get_attachment_url( $slider_image_id ); ?>
						<li>

							<a  class="slide" href="<?php the_permalink(); ?>"
								style="background: url('<?php echo esc_url( $slider_image_url ); ?>') 50% 50% no-repeat;
									background-size: cover;">
							</a>

							<div class="rh_slide__desc">

								<div class="rh_slide__desc_wrap">

									<?php if ( ! empty( $is_featured ) ) : ?>
										<div class="rh_label rh_label__slide">
											<div class="rh_label__wrap">
												<?php esc_html_e( 'Featured', 'framework' ); ?>
												<span></span>
											</div>
										</div>
										<!-- /.rh_label -->
									<?php endif; ?>

									<h3>
										<a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
									</h3>

									<?php if ( ! empty( $property_address ) ) : ?>
										<p><?php echo esc_html( $property_address ); ?></p>
									<?php endif; ?>

									<div class="rh_slide__meta_wrap">

										<?php if ( ! empty( $property_bedrooms ) ) : ?>
											<div class="rh_slide__prop_meta">
												<h4><?php esc_html_e( 'Bedrooms', 'framework' ); ?></h4>
												<div>
													<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-bed.svg' ); ?>
													<!-- <img src="php" alt="" /> -->
													<span class="figure"><?php echo esc_html( $property_bedrooms ); ?></span>
												</div>
											</div>
											<!-- /.rh_slide__prop_meta -->
										<?php endif; ?>

										<?php if ( ! empty( $property_bathrooms ) ) : ?>
											<div class="rh_slide__prop_meta">
												<h4><?php esc_html_e( 'Bathrooms', 'framework' ); ?></h4>
												<div>
													<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-shower.svg' ); ?>
													<!-- <img src="php" alt="" /> -->
													<span class="figure"><?php echo esc_html( $property_bathrooms ); ?></span>
												</div>
											</div>
											<!-- /.rh_slide__prop_meta -->
										<?php endif; ?>

										<?php if ( ! empty( $property_size ) ) : ?>
											<div class="rh_slide__prop_meta">
												<h4><?php esc_html_e( 'Area', 'framework' ); ?></h4>
												<div>
													<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-area.svg' ); ?>
													<!-- <img src="php" alt="" /> -->
													<span class="figure">
														<?php echo esc_html( $property_size ); ?>
													</span>
													<?php if ( ! empty( $size_postfix ) ) : ?>
														<span class="label">
															<?php echo esc_html( $size_postfix ); ?>
														</span>
													<?php endif; ?>
												</div>
											</div>
											<!-- /.rh_slide__prop_meta -->
										<?php endif; ?>

									</div>
									<!-- /.rh_slide__meta_wrap -->

									<div class="rh_slide_prop_price">
										<?php
										$price = get_property_price();
										if ( $price ) {
											echo '<h4>' . esc_html__( 'For Sale', 'framework' ) . '</h4>';
											echo '<span>' . esc_html( $price ) . '</span>';
										}
										?>
									</div>
									<!-- /.rh_slide_prop_price -->
								</div>
								<!-- /.rh_slide__desc_wrap -->

							</div>
							<!-- /.rh_slide__desc -->

						</li>
						<?php
					}
				endwhile;
				wp_reset_postdata(); ?>
			</ul>
		</div>
	</section><!-- End Slider -->
	<?php

endif;
