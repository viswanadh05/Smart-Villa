<?php
/**
 * Listing: Map Based Listing Container
 *
 * Listing container for map based listing layout.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

?>

<section class="rh_section rh_section--flex rh_section__map_listing">

	<div class="rh_page rh_page__listing_map">
		<?php get_template_part( 'assets/modern/partials/property/listing/listing', 'map' ); ?>
	</div>
	<!-- /.rh_page rh_page__listing_map -->

	<div class="rh_page rh_page__map_properties">

		<div class="rh_page__head">

			<h2 class="rh_page__title">
				<?php
				// Page Title.
			    $page_title = get_post_meta( get_the_ID(), 'REAL_HOMES_banner_title', true );
			    if ( empty( $page_title ) ) {
			        $page_title = get_the_title( get_the_ID() );
			    }

			    $page_title = explode( ' ', $page_title, 2 );

			    if ( ! empty( $page_title ) ) {
			    	?>
			    	<span class="sub"><?php echo esc_html( $page_title[0] ); ?></span>
			    	<span class="title"><?php echo esc_html( $page_title[1] ); ?></span>
			    	<?php
			    }
				?>
			</h2>
			<!-- /.rh_page__title -->

			<div class="rh_page__controls">
				<?php get_template_part( 'assets/modern/partials/property/listing/listing', 'sort-controls' ); ?>
			</div>
			<!-- /.rh_page__controls -->

		</div>
		<!-- /.rh_page__head -->

		<?php
		$compare_properties_module  = get_option( 'theme_compare_properties_module' );
	    $inspiry_compare_page       = get_option( 'inspiry_compare_page' );
	    if ( ('enable' === $compare_properties_module) && ( $inspiry_compare_page ) ) {
	        get_template_part( 'assets/modern/partials/property/compare/compare', 'view' );
	    }
		?>

		<div class="rh_page__listing">

			<?php
			$number_of_properties = intval( get_option( 'theme_number_of_properties' ) );
	        if ( ! $number_of_properties ) {
	            $number_of_properties = 6;
	        }

	        global $paged;
	        if ( is_front_page() ) {
	            $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
	        }

	        $property_listing_args = array(
	            'post_type' 		=> 'property',
	            'posts_per_page' 	=> $number_of_properties,
	            'paged' 			=> $paged,
	        );

	        // Apply properties filter.
	        $property_listing_args = apply_filters( 'inspiry_properties_filter', $property_listing_args );

	        $property_listing_args = sort_properties( $property_listing_args );

	        $property_listing_query = new WP_Query( $property_listing_args );

	        if ( $property_listing_query->have_posts() ) :
	            while ( $property_listing_query->have_posts() ) :
	                $property_listing_query->the_post();

	                // Display property in list layout.
	                get_template_part( 'assets/modern/partials/property/view/view', 'property-list-map-card' );

	            endwhile;
	            wp_reset_postdata();
	        else :
	            ?>
	            <div class="rh_alert-wrapper">
	                <h4><?php esc_html_e( 'Sorry No Results Found', 'framework' ) ?></h4>
	            </div>
	            <?php
	        endif;
	        ?>
		</div>
		<!-- /.rh_page__listing -->

		<?php inspiry_theme_pagination( $property_listing_query->max_num_pages ); ?>

	</div>
	<!-- /.rh_page rh_page__map_properties -->

</section>
<!-- /.rh_section rh_wrap rh_wrap--padding -->
