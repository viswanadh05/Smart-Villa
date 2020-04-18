<?php
/**
 * Gallery Listing
 *
 * Listing for gallery template.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

global $gallery_name;

?>

<section class="rh_section rh_wrap--padding rh_wrap--topPadding">

	<div class="rh_page">

		<div class="rh_page__head">

			<h2 class="rh_page__title">
				<?php
		        $page_title = get_the_title( get_the_ID() ); ?>
		    	<p class="title"><?php echo esc_html( $page_title ); ?></p>
		    	<?php
				?>
			</h2>
			<!-- /.rh_page__title -->

			<div id="filter-by" class="rh_page__gallery_filters">
				<a href="#" data-filter="rh_gallery__item" class="active"><?php esc_html_e( 'All', 'framework' ); ?></a><?php
				$status_terms = get_terms( array( 'taxonomy' => 'property-status' ) );
				if ( ! empty( $status_terms ) && is_array( $status_terms ) ) {
					foreach ( $status_terms as $status_term ) {
						echo '<a href="' . esc_url( get_term_link( $status_term->slug, $status_term->taxonomy ) ) . '" data-filter="' . esc_attr( $status_term->slug ) . '" title="' . sprintf( esc_html__( 'View all Properties having %s status', 'framework' ), $status_term->name ) . '">' . esc_html( $status_term->name ) . '</a>';
					}
				}
				?>
			</div>
			<!-- /.rh_page__gallery_filters -->

		</div>
		<!-- /.rh_page__head -->

		<div class="rh_gallery">
			<div class="rh_gallery__wrap isotope">
				<?php
				// Basic Gallery Query.
				$query_args = array(
					'post_type' => 'property',
					'posts_per_page' => -1,
				);

				// Gallery Query and Start of Loop.
				$gallery_query = new WP_Query( $query_args );
				while ( $gallery_query->have_posts() ) :
					$gallery_query->the_post();

					// Getting list of property status terms.
					$term_list 	= '';
					$terms 		= get_the_terms( get_the_ID(), 'property-status' );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
						foreach ( $terms as $term ) {
							$term_list .= $term->slug;
							$term_list .= ' ';
						}
					endif;

					if ( has_post_thumbnail() ) : ?>
						<div <?php post_class( "rh_gallery__item isotope-item $gallery_name $term_list" ); ?> >
							<?php
							$image_id 		= get_post_thumbnail_id();
							$full_image_url = wp_get_attachment_url( $image_id );
							global $gallery_image_size;
							$featured_image = wp_get_attachment_image_src( $image_id, $gallery_image_size );
							?>
							<figure>
								<div class="media_container">
									<a class="<?php echo get_lightbox_plugin_class(); ?> zoom" <?php echo generate_gallery_attribute(); ?> href="<?php echo esc_url( $full_image_url ); ?>" title="<?php the_title(); ?>">
										<img src="<?php echo esc_url( INSPIRY_DIR_URI . '/images/icons/icon-zoom.png' ); ?>">
									</a>
									<a class="link" href="<?php the_permalink(); ?>">
										<img src="<?php echo esc_url( INSPIRY_DIR_URI . '/images/icons/icon-link.png' ); ?>">
									</a>
								</div>
								<?php echo '<img class="img-border" src="' . esc_attr( $featured_image[0] ) . '" alt="' . get_the_title() . '">'; ?>
							</figure>
							<h5 class="item-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
						</div>
						<?php
					endif;
				endwhile;
				?>
			</div>
			<!-- /.rh_gallery__wrap isotope -->
		</div>
		<!-- /.rh_gallery -->

	</div>
	<!-- /.rh_page rh_page__main -->

</section>
<!-- /.rh_section rh_wrap rh_wrap--padding -->
