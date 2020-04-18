<?php
/**
 * Home Section: Latest Properties
 *
 * Latest properties section of homepage.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

// Skip sticky properties.
$skip_sticky = get_option( 'inspiry_home_skip_sticky', false );
if ( $skip_sticky ) {
	remove_filter( 'the_posts', 'inspiry_make_properties_stick_at_top', 10 );
}

/* List of Properties on Homepage */
$number_of_properties = intval( get_option( 'theme_properties_on_home' ) );
if ( ! $number_of_properties ) {
	$number_of_properties = 4;
}

if ( is_front_page() ) {
	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
}

$home_args = array(
	'post_type' 		=> 'property',
	'posts_per_page' 	=> $number_of_properties,
	'paged' 			=> $paged,
);

/* Modify home query arguments based on theme options - related filters resides in functions.php */
$home_args = apply_filters( 'real_homes_homepage_properties', $home_args );

/* Sort Properties Based on Theme Option Selection */
$sorty_by = get_option( 'theme_sorty_by' );

if ( ! empty( $sorty_by ) ) {
	if ( 'low-to-high' === $sorty_by ) {
		$home_args['orderby']  	= 'meta_value_num';
		$home_args['meta_key'] 	= 'REAL_HOMES_property_price';
		$home_args['order']    	= 'ASC';
	} elseif ( 'high-to-low' === $sorty_by ) {
		$home_args['orderby']  	= 'meta_value_num';
		$home_args['meta_key'] 	= 'REAL_HOMES_property_price';
		$home_args['order']    	= 'DESC';
	} elseif ( 'random' === $sorty_by ) {
		$home_args['orderby']	= 'rand';
	}
}
$home_properties_query = new WP_Query( $home_args );

$inspiry_show_home_search = get_option( 'theme_show_home_search' ); ?>

<section class="rh_section rh_section--props_padding ">

	<?php
	/* Slogan Title and Text */
	$slogan_title 	= get_option( 'inspiry_home_properties_title' );
	$slogan_text 	= get_option( 'inspiry_home_properties_desc' );

	if ( ! empty( $slogan_title ) ) {
	    $slogan_title = explode( ' ', $slogan_title, 2 );

	    if ( ! empty( $slogan_title ) && ( 1 < count( $slogan_title ) ) ) {
	    	?>
	    	<div class="rh_section__head">
				<h2 class="rh_section__title">
					<span><?php echo esc_html( $slogan_title[0] ); ?></span>
					<?php echo esc_html( $slogan_title[1] ); ?>
				</h2>
				<!-- /.rh_section__title -->
				<p class="rh_section__desc">
					<?php echo ( ! empty( $slogan_text ) ) ? esc_html( $slogan_text ) : false; ?>
				</p>
				<!-- /.rh_section__desc -->
			</div>
			<!-- /.rh_section__head -->
	    	<?php
	    } else {
	    	?>
	    	<div class="rh_section__head">
				<h2 class="rh_section__title">
					<?php echo esc_html( $slogan_title[0] ); ?>
				</h2>
				<!-- /.rh_section__title -->
				<p class="rh_section__desc">
					<?php echo ( ! empty( $slogan_text ) ) ? esc_html( $slogan_text ) : false; ?>
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
				<span><?php esc_html_e( 'Latest', 'framework' ); ?></span>
				<?php esc_html_e( 'Properties', 'framework' ); ?>
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

	<?php if ( $home_properties_query->have_posts() ) : ?>

		<div class="rh_section__properties">

			<?php while ( $home_properties_query->have_posts() ) : ?>

				<?php $home_properties_query->the_post(); ?>

				<?php get_template_part( 'assets/modern/partials/property/view/view', 'property-card' ); ?>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		</div>
		<!-- /.rh_section__properties -->

	<?php endif; ?>

</section>
<!-- /.rh_section -->

<?php
