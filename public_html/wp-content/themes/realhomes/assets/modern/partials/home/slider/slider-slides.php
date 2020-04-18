<?php
/**
 * Slider: CPT based slider
 *
 * Slider based on Slides Custom Post Type.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

$number_of_slides = intval( get_option( 'theme_number_custom_slides' ) );
if ( ! $number_of_slides ) {
	$number_of_slides = 5;
}

$slides_arguments 	= array(
	'post_type'		=> 'slide',
	'posts_per_page' => $number_of_slides,
);

$slides_query = new WP_Query( $slides_arguments );

if ( $slides_query->have_posts() ) : ?>

	<!-- Slider -->
	<section id="rh_slider__home" class="rh_slider clearfix">
		<div class="flexslider loading">
			<ul class="slides">
				<?php
				while ( $slides_query->have_posts() ) :
					$slides_query->the_post();
					$slide_title 		= get_the_title();
					$image_id 			= get_post_thumbnail_id();
					$slide_sub_text		= get_post_meta( get_the_ID(), 'slide_sub_text', true );
					$slide_url 			= get_post_meta( get_the_ID(), 'slide_url', true );
					if ( $image_id ) {
						$slider_image_url = wp_get_attachment_url( $image_id ); ?>
						<li>

							<div 	class="slide" style="background: url('<?php echo esc_url( $slider_image_url ); ?>') 50% 50% no-repeat;
								background-size: cover;">
							</div>

							<div class="rh_slide__desc">

								<?php if ( ! empty( $slide_title ) || ! empty( $slide_sub_text ) ) : ?>

									<div class="rh_slide__desc_wrap">

										<?php the_title( '<h3>', '</h3>' ); ?>

										<?php if ( ! empty( $slide_sub_text ) ) : ?>
											<p class="sub-text"><?php echo esc_html( $slide_sub_text ); ?></p>
										<?php endif; ?>

										<?php if ( ! empty( $slide_url ) ) : ?>
											<a href="<?php echo esc_url( $slide_url ); ?>" class="rh_btn rh_btn--primary read-more">
												<?php esc_html_e( 'Read More', 'framework' ); ?>
											</a>
										<?php endif; ?>

									</div>
									<!-- /.rh_slide__desc_wrap -->

								<?php endif; ?>

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
