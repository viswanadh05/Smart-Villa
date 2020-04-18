<?php
/**
 * Section: Partners
 *
 * Partners section of the homepage.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

$number_of_partners = 6;

if ( is_front_page() ) {
	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
}

$partners_args = array(
	'post_type' 		=> 'partners',
	'posts_per_page' 	=> $number_of_partners,
	'paged' 			=> $paged,
);

$home_partners_query = new WP_Query( $partners_args ); ?>

<section class="rh_section rh_section__partners">

	<?php
	$inspiry_home_partners_title 	= get_option( 'inspiry_home_partners_title' );
	$inspiry_home_partners_desc 	= get_option( 'inspiry_home_partners_desc' );

	if ( ! empty( $inspiry_home_partners_title ) ) {
	    $inspiry_home_partners_title = explode( ' ', $inspiry_home_partners_title, 2 );

	    if ( ! empty( $inspiry_home_partners_title ) && ( 1 < count( $inspiry_home_partners_title ) ) ) {
	    	?>
	    	<div class="rh_section__head">
				<h2 class="rh_section__title">
					<span><?php echo esc_html( $inspiry_home_partners_title[0] ); ?></span>
					<?php echo esc_html( $inspiry_home_partners_title[1] ); ?>
				</h2>
				<!-- /.rh_section__title -->
				<p class="rh_section__desc">
					<?php echo ( ! empty( $inspiry_home_partners_desc ) ) ? esc_html( $inspiry_home_partners_desc ) : false; ?>
				</p>
				<!-- /.rh_section__desc -->
			</div>
			<!-- /.rh_section__head -->
	    	<?php
	    } else {
	    	?>
	    	<div class="rh_section__head">
				<h2 class="rh_section__title">
					<?php echo esc_html( $inspiry_home_partners_title[0] ); ?>
				</h2>
				<!-- /.rh_section__title -->
				<p class="rh_section__desc">
					<?php echo ( ! empty( $inspiry_home_partners_desc ) ) ? esc_html( $inspiry_home_partners_desc ) : false; ?>
				</p>
				<!-- /.rh_section__desc -->
			</div>
			<!-- /.rh_section__head -->
	    	<?php
	    }
	} else {
		?>
		<div class="rh_section__head">
			<h2 class="rh_section__title">
				<span><?php esc_html_e( 'Our', 'framework' ); ?></span>
				<?php esc_html_e( 'Partners', 'framework' ); ?>
			</h2>
			<!-- /.rh_section__title -->
			<p class="rh_section__desc">
				<?php esc_html_e( 'Some amazing features of Real Homes theme.', 'framework' ); ?>
			</p>
			<!-- /.rh_section__desc -->
		</div>
		<!-- /.rh_section__head -->
		<?php
	} ?>

	<?php if ( $home_partners_query->have_posts() ) : ?>

		<div class="rh_section__partners_wrap">

			<?php while ( $home_partners_query->have_posts() ) : ?>

				<?php $home_partners_query->the_post(); ?>

				<div <?php post_class( 'rh_partner' ); ?>>
					<?php $partner_url = get_post_meta( get_the_ID(), 'REAL_HOMES_partner_url', true ); ?>
					<a target="_blank" href="<?php echo esc_url( $partner_url ); ?>" title="<?php the_title(); ?>">
						<?php
	                    $thumb_title = trim( strip_tags( get_the_title( get_the_ID() ) ) );
	                    the_post_thumbnail('partners-logo', array(
	                        'alt'   => $thumb_title,
	                        'title' => $thumb_title,
	                    ) );
	                    ?>
					</a>
				</div>
				<!-- /.rh_partner -->

			<?php endwhile; ?>

		</div>
		<!-- /.rh_section__partners_wrap -->

	<?php endif; ?>

</section>
<!-- /.rh_section rh_section__partners -->
