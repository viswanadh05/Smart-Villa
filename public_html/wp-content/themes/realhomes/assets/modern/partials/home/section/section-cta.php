<?php
/**
 * Section: Call to Action - CTA
 *
 * CTA section of the homepage.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

$inspiry_cta_title 	= get_option( 'inspiry_cta_title' );
$inspiry_cta_desc 	= get_option( 'inspiry_cta_desc' );
$inspiry_cta_btn_one_title 	= get_option( 'inspiry_cta_btn_one_title' );
$inspiry_cta_btn_one_url 	= get_option( 'inspiry_cta_btn_one_url' );
$inspiry_cta_btn_two_title 	= get_option( 'inspiry_cta_btn_two_title' );
$inspiry_cta_btn_two_url 	= get_option( 'inspiry_cta_btn_two_url' );

?>

<section class="rh_section rh_section__cta rh_cta--featured">

	<div class="rh_cta">
	</div>
	<!-- /.rh_cta -->

	<div class="rh_cta__wrap">

		<?php if ( ! empty( $inspiry_cta_title ) ) : ?>
			<p class="rh_cta__title">
				<?php echo esc_html( $inspiry_cta_title ); ?>
			</p>
			<!-- /.rh_cta__title -->
		<?php endif; ?>

		<?php if ( $inspiry_cta_desc ) : ?>
			<h3 class="rh_cta__quote">
				<?php echo esc_html( $inspiry_cta_desc ); ?>
			</h3>
			<!-- /.rh_cta__quote -->
		<?php endif; ?>

		<div class="rh_cta__btns">

			<?php if ( $inspiry_cta_btn_one_title ) : ?>
				<a href="<?php echo esc_url( $inspiry_cta_btn_one_url ); ?>" class="rh_btn rh_btn--secondary">
					<?php echo esc_html( $inspiry_cta_btn_one_title ); ?>
				</a>
			<?php endif; ?>

			<?php if ( $inspiry_cta_btn_one_title ) : ?>
				<a href="<?php echo esc_url( $inspiry_cta_btn_two_url ); ?>" class="rh_btn rh_btn--greyBG">
					<?php echo esc_html( $inspiry_cta_btn_two_title ); ?>
				</a>
			<?php endif; ?>

		</div>
		<!-- /.rh_cta__btns -->

	</div>
	<!-- /.rh_cta__wrap -->

</section>
<!-- /.rh_section rh_section__cta -->
