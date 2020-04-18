<?php
/**
 * Single Property Template
 *
 * Template for single property.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

$theme_property_detail_variation = get_option( 'theme_property_detail_variation' );

get_header();

// Page Head.
$header_variation = get_option( 'inspiry_property_detail_header_variation' );

if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'header' );
} elseif ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) {
	// Banner Image.
	$banner_image_path = '';
	$banner_image_id = get_post_meta( $post->ID, 'REAL_HOMES_page_banner_image', true );
	if ( $banner_image_id ) {
	    $banner_image_path = wp_get_attachment_url( $banner_image_id );
	} else {
	    $banner_image_path = get_default_banner();
	}
	?>
	<section class="rh_banner rh_banner__image" style="background-repeat: no-repeat;background-position: center top;background-image: url('<?php echo esc_url( $banner_image_path ); ?>'); background-size: cover; ">

		<div class="rh_banner__cover"></div>
		<!-- /.rh_banner__cover -->

		<div class="rh_banner__wrap">

			<h2 class="rh_banner__title">
				<?php echo esc_html( get_the_title() ); ?>
			</h2>
			<!-- /.rh_banner__title -->

		</div>
		<!-- /.rh_banner__wrap -->

	</section>
	<!-- /.rh_banner -->
	<?php
}

if ( inspiry_show_header_search_form() ) {
	get_template_part( 'assets/modern/partials/property/search/search', 'advance' );
}

?>

<section class="rh_section rh_wrap--padding rh_wrap--topPadding">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : ?>

			<?php the_post(); ?>

			<?php if ( ! post_password_required() ) : ?>

				<div class="rh_page rh_page--fullWidth">

					<?php get_template_part( 'assets/modern/partials/property/single/single', 'head' ); ?>

					<div class="rh_property">
						<?php
						/**
						 * Property Slider
						 */
						get_template_part( 'assets/modern/partials/property/single/property-details/property', 'slider' );
						?>

						<div class="rh_property__wrap rh_property--padding">
							<div class="rh_property__main">
								<?php
								/**
								 * Property Slider
								 */
								get_template_part( 'assets/modern/partials/property/single/property-details/property', 'content' );
								?>
							</div>
							<!-- /.rh_property__main -->

							<div class="rh_property__sidebar">
								<?php
								if ( 'agent-in-sidebar' === $theme_property_detail_variation ) {
									?>
									<aside class="rh_sidebar">
										<?php
							            get_template_part( 'assets/modern/partials/property/single/property-details/property', 'agent-for-sidebar' );
					                    if ( ! dynamic_sidebar( 'property-sidebar' ) ) :
					                    endif;
					                	?>
					                	</aside>
										<!-- /.rh_sidebar -->
									<?php
						        } else {
						            get_sidebar( 'property' );
						        }
								?>
							</div>
							<!-- /.rh_property__sidebar -->
						</div>
						<!-- /.rh_property__wrap -->
					</div>
					<!-- /.rh_property -->

				</div>
				<!-- /.rh_page -->

			<?php else : ?>

				<div class="rh_page rh_page--fullWidth">

					<?php echo get_the_password_form(); ?>

				</div>
				<!-- /.rh_page -->

			<?php endif; ?>

		<?php endwhile; ?>

	<?php endif; ?>

</section>

<?php
get_footer();
