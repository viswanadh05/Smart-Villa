<?php
/**
 * Home Section: Featured Properties
 *
 * Featured properties section of homepage.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

/* Featured Properties Query Arguments */
$featured_properties_args = array(
	'post_type'         => 'property',
	'posts_per_page'    => 12,
	'meta_query'        => array(
	    array(
	        'key'       => 'REAL_HOMES_featured',
	        'value'     => 1,
	        'compare'   => '=',
	        'type'      => 'NUMERIC',
	    ),
	),
);

$featured_properties_query      = new WP_Query( $featured_properties_args ); ?>

<section class="rh_section rh_section--featured">

	<?php
	$featured_prop_title 	= get_option( 'theme_featured_prop_title' );
	$featured_prop_text 	= get_option( 'theme_featured_prop_text' );

	if ( ! empty( $featured_prop_title ) ) {
	    $featured_prop_title = explode( ' ', $featured_prop_title, 2 );

	    if ( ! empty( $featured_prop_title ) && ( 1 < count( $featured_prop_title ) ) ) {
	    	?>
	    	<div class="rh_section__head">
				<h2 class="rh_section__title">
					<span><?php echo esc_html( $featured_prop_title[0] ); ?></span>
					<?php echo esc_html( $featured_prop_title[1] ); ?>
				</h2>
				<!-- /.rh_section__title -->
				<p class="rh_section__desc">
					<?php echo ( ! empty( $featured_prop_text ) ) ? esc_html( $featured_prop_text ) : false; ?>
				</p>
				<!-- /.rh_section__desc -->
			</div>
			<!-- /.rh_section__head -->
	    	<?php
	    } else {
	    	?>
	    	<div class="rh_section__head">
				<h2 class="rh_section__title">
					<?php echo esc_html( $featured_prop_title[0] ); ?>
				</h2>
				<!-- /.rh_section__title -->
				<p class="rh_section__desc">
					<?php echo ( ! empty( $featured_prop_text ) ) ? esc_html( $featured_prop_text ) : false; ?>
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
				<span><?php esc_html_e( 'Featured', 'framework' ); ?></span>
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

	<?php if ( $featured_properties_query->have_posts() ) : ?>

		<div id="rh_section__featured_slider" class="rh_section__featured clearfix">

			<div class="flexslider loading">

				<ul class="slides">

					<?php while ( $featured_properties_query->have_posts() ) : ?>

						<?php $featured_properties_query->the_post(); ?>

						<?php get_template_part( 'assets/modern/partials/property/view/view', 'featured-property' ); ?>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				</ul>
				<!-- /.slides -->

			</div>
			<!-- /.flexslider loading -->

			<div class="rh_flexslider__nav">
				<a href="#" class="flex-prev rh_flexslider__prev">
					<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-left.svg' ); ?>
				</a>
				<!-- /.rh_flexslider__prev -->
				<a href="#" class="flex-next rh_flexslider__next">
					<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-right.svg' ); ?>
				</a>
				<!-- /.rh_flexslider__next -->
			</div>
			<!-- /.rh_flexslider__nav -->

		</div>
		<!-- /.rh_section__properties -->

	<?php endif; ?>

</section>
<!-- /.rh_section -->

<?php
