<?php
/**
 * Blog Search
 *
 * Blog search template.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

get_header();

/* Page Head */
$banner_image_path = get_default_banner();

$header_variation = get_option( 'inspiry_news_header_variation', 'none' );

if ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) :
	?>
	<section class="rh_banner rh_banner__image" style="background-repeat: no-repeat;background-position: center top;background-image: url('<?php echo esc_url( $banner_image_path ); ?>'); background-size: cover; ">

		<div class="rh_banner__cover"></div>
		<!-- /.rh_banner__cover -->

		<div class="rh_banner__wrap">

			<h2 class="rh_banner__title">
				<?php esc_html_e( 'Search Results', 'framework' ) ?>: <?php the_search_query(); ?>
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

	<div class="rh_page rh_page__listing_page rh_page__main">

		<?php if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) : ?>
			<div class="rh_page__head">

				<h2 class="rh_page__title">
					<span class="sub"><?php esc_html_e( 'Search Results', 'framework' ); ?></span>
				    <span class="title"><?php the_search_query(); ?></span>
				</h2>
				<!-- /.rh_page__title -->

			</div>
			<!-- /.rh_page__head -->
		<?php endif; ?>

		<?php get_template_part( 'assets/modern/partials/blog/blog', 'loop' ); ?>

	</div>
	<!-- /.rh_page rh_page__main -->

	<div class="rh_page rh_page__sidebar">
		<?php get_sidebar(); ?>
	</div>
	<!-- /.rh_page rh_page__sidebar -->

</section>
<!-- /.rh_section rh_wrap rh_wrap--padding -->

<?php
get_footer();
