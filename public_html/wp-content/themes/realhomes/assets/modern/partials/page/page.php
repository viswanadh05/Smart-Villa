<?php
/**
 * Page Template
 *
 * Template for simple page.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

get_header();

$header_variation = get_option( 'inspiry_pages_header_variation' );

if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'header' );
} elseif ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'image' );
}

if ( inspiry_show_header_search_form() ) {
	get_template_part( 'assets/modern/partials/property/search/search', 'advance' );
}

?>

<section class="rh_section rh_section--flex rh_wrap--padding rh_wrap--topPadding">

	<div class="rh_page rh_page__listing_page rh_page__main">

		<?php if ( have_posts() ) : ?>

			<div class="rh_blog rh_blog__listing rh_blog__single">

				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>

					<?php
					// Header margin fix in case of no thumbnail for a blog post.
			        $article_classes = 'rh_blog__post';
			        if ( ! has_post_thumbnail() ) {
			            $article_classes .= ' entry-header-margin-fix';
			        }
					?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( $article_classes ); ?> >

			            <div class="entry-header blog-post-entry-header">
			                <?php get_template_part( 'assets/modern/partials/blog/post/post', 'title' ); ?>
			            </div>

			            <div class="rh_content entry-content">
			                <?php the_content(); ?>
			            </div>

			        </article>
			        <?php wp_link_pages( array( 'before' => '<div class="rh_pagination__pages-nav">', 'after' => '</div>', 'next_or_number' => 'next' ) ); ?>
				<?php endwhile; ?>

				<?php comments_template(); ?>

			</div>
			<!-- /.rh_blog rh_blog__listing -->

		<?php endif; ?>

	</div>
	<!-- /.rh_page rh_page__main -->

	<div class="rh_page rh_page__sidebar">
		<?php get_sidebar( 'pages' ); ?>
	</div>
	<!-- /.rh_page rh_page__sidebar -->

</section>
<!-- /.rh_section rh_wrap rh_wrap--padding -->

<?php
get_footer();
