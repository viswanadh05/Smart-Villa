<?php
/**
 * Banner: Image
 *
 * Image banner for page templates.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

global $post;

// Revolution Slider if alias is provided and plugin is installed.
$rev_slider_alias = get_post_meta( $post->ID, 'REAL_HOMES_rev_slider_alias', true );
if ( function_exists( 'putRevSlider' ) && ( ! empty( $rev_slider_alias ) ) ) {
	putRevSlider( $rev_slider_alias );
} else {
	// Banner Image.
	$banner_image_path = '';
	$banner_image_id = get_post_meta( $post->ID, 'REAL_HOMES_page_banner_image', true );
	if ( $banner_image_id ) {
	    $banner_image_path = wp_get_attachment_url( $banner_image_id );
	} else {
	    $banner_image_path = get_default_banner();
	}

	// Banner Title.
	$banner_title = get_post_meta( $post->ID, 'REAL_HOMES_banner_title', true );
	if ( empty( $banner_title ) ) {
	    $banner_title = get_the_title( $post->ID );
	}
	?>
	<section class="rh_banner rh_banner__image" style="background-repeat: no-repeat;background-position: center top;background-image: url('<?php echo esc_url( $banner_image_path ); ?>'); background-size: cover; ">

		<div class="rh_banner__cover"></div>
		<!-- /.rh_banner__cover -->

		<div class="rh_banner__wrap">

			<h2 class="rh_banner__title">
				<?php echo esc_html( $banner_title ); ?>
			</h2>
			<!-- /.rh_banner__title -->

			<?php if ( is_page_template( 'templates/template-property-listing.php' ) || is_page_template( 'templates/template-property-grid-listing.php' ) ) : ?>
				<div class="rh_banner__controls">
					<?php get_template_part( 'assets/modern/partials/property/listing/listing', 'view-buttons' ); ?>
				</div>
				<!-- /.rh_banner__controls -->
			<?php endif; ?>

		</div>
		<!-- /.rh_banner__wrap -->

	</section>
	<!-- /.rh_banner -->
	<?php
}
