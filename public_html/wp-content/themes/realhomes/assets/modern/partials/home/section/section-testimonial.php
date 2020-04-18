<?php
/**
 * Section: Testimonial
 *
 * Testimonial section of the homepage.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

$inspiry_testimonial_text 	= get_option( 'inspiry_testimonial_text' );
$inspiry_testimonial_name 	= get_option( 'inspiry_testimonial_name' );
$inspiry_testimonial_url 	= get_option( 'inspiry_testimonial_url' );

?>

<section class="rh_section rh_section__testimonial">

	<div class="rh_testimonial__quote_bg"></div>
	<!-- /.rh_testimonial__quote_left -->

	<div class="rh_testimonial">

		<h3 class="rh_testimonial__quote">
			<?php echo esc_html( $inspiry_testimonial_text ); ?>
		</h3>
		<!-- /.rh_testimonial__quote -->
		<div class="rh_testimonial__author">
			<p class="rh_testimonial__author_name">
				<?php echo esc_html( $inspiry_testimonial_name ); ?>
			</p>
			<!-- /.rh_testimonial__author_name -->
			<p class="rh_testimonial__author__link">
				<a href="<?php echo esc_url( $inspiry_testimonial_url ); ?>">
					<?php echo esc_html( $inspiry_testimonial_url ); ?>
				</a>
			</p>
			<!-- /.rh_testimonial__author__link -->
		</div>
		<!-- /.rh_testimonial__author -->

	</div>
	<!-- /.rh_testimonial -->

</section>
<!-- /.rh_section rh_section__testimonial -->
