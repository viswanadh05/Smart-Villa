<?php
/**
 * Author Template
 *
 * Author template.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

if ( is_singular( 'agent' ) ) {
	global $post;
} elseif ( is_author() ) {
	global $current_author;
}

// Get Author Information.
global $wp_query;

get_header();

/* Page Head */
$banner_image_path = get_default_banner();

$header_variation = get_option( 'inspiry_agents_header_variation', 'none' );

if ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) :
	?>
	<section class="rh_banner rh_banner__image" style="background-repeat: no-repeat;background-position: center top;background-image: url('<?php echo esc_url( $banner_image_path ); ?>'); background-size: cover; ">

		<div class="rh_banner__cover"></div>
		<!-- /.rh_banner__cover -->

		<div class="rh_banner__wrap">

			<h2 class="rh_banner__title">
				<?php esc_html_e( 'All Properties By', 'framework' ); ?>
			</h2>
			<!-- /.rh_banner__title -->

		</div>
		<!-- /.rh_banner__wrap -->

	</section>
	<!-- /.rh_banner -->
	<?php
elseif ( empty( $header_variation ) || ( 'none' === $header_variation ) ) :
	get_template_part( 'assets/modern/partials/banner/banner', 'header' );
endif;

if ( inspiry_show_header_search_form() ) {
	get_template_part( 'assets/modern/partials/property/search/search', 'advance' );
}

?>

<section class="rh_section rh_section--flex rh_wrap--padding rh_wrap--topPadding">

	<div class="rh_page rh_page__agents rh_page__main">

		<?php if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) : ?>
			<div class="rh_page__head">

				<h2 class="rh_page__title">
					<span class="sub"><?php esc_html_e( 'All Properties By', 'framework' ); ?></span>
				</h2>
				<!-- /.rh_page__title -->

			</div>
			<!-- /.rh_page__head -->
		<?php endif; ?>

		<?php get_template_part( 'assets/modern/partials/author/author', 'agent-card' ); ?>

		<div class="rh_page__head rh_page--single_agent">

			<h2 class="rh_page__title">
				<span class="sub"><?php esc_html_e( 'My Listings', 'framework' ); ?></span>
			</h2>
			<!-- /.rh_page__title -->

		</div>
		<!-- /.rh_page__head -->

		<?php
		$compare_properties_module  = get_option( 'theme_compare_properties_module' );
	    $inspiry_compare_page       = get_option( 'inspiry_compare_page' );
	    if ( ('enable' === $compare_properties_module) && ( $inspiry_compare_page ) ) {
	        get_template_part( 'assets/modern/partials/property/compare/compare', 'view' );
	    }
		?>

		<div class="rh_page__section">
			<?php
			if ( have_posts() ) :
	            while ( have_posts() ) :
	                the_post();

	                /* Display Property for Listing */
	                get_template_part( 'assets/modern/partials/property/view/view', 'property-list-card' );

	            endwhile;
	            wp_reset_postdata();
	        else :
	            ?>
	            <div class="rh_alert-wrapper">
	                <h4 class="no-results"><?php esc_html_e( 'Sorry No Results Found', 'framework' ) ?></h4>
	            </div>
	            <?php
	        endif;
	        ?>
		</div>
		<!-- /.rh_page__section -->

		<?php inspiry_theme_pagination( $wp_query->max_num_pages ); ?>

	</div>
	<!-- /.rh_page rh_page__main -->

	<div class="rh_page rh_page__sidebar">
		<?php get_sidebar( 'agent' ); ?>
	</div>
	<!-- /.rh_page rh_page__sidebar -->

</section>
<!-- /.rh_section rh_wrap rh_wrap--padding -->

<?php
get_footer();
