<?php
/**
 * Property: Compare Properties Template
 *
 * Page template for compare properties.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

get_header();

$header_variation = get_option( 'inspiry_member_pages_header_variation' );

if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'header' );
} elseif ( ! empty( $header_variation ) && ( 'banner' === $header_variation ) ) {
	get_template_part( 'assets/modern/partials/banner/banner', 'image' );
}

if ( inspiry_show_header_search_form() ) {
	get_template_part( 'assets/modern/partials/property/search/search', 'advance' );
}

if ( isset( $_COOKIE['inspiry_compare'] ) ) {
	$compare_list_items	= unserialize( $_COOKIE['inspiry_compare'] );
}

$count = 0;

if ( ! empty( $compare_list_items ) ) {

	foreach ( $compare_list_items as $compare_list_item ) {

		if ( 4 > $count ) {

			$compare_property 	= get_post( $compare_list_item );

			if ( isset( $compare_property->ID ) ) {
				$compare_property_img 		= wp_get_attachment_image_src(
					get_post_meta( $compare_property->ID, '_thumbnail_id', true ), 'property-thumb-image'
				);
				$compare_property_permalink	= get_permalink( $compare_property->ID );
				$compare_properties[]	= array(
					'ID' 		=> $compare_property->ID,
					'title' 	=> $compare_property->post_title,
					'img'		=> $compare_property_img,
					'permalink'	=> $compare_property_permalink,
				);
			}
		} else {
			break;
		}

		$count++;

	}
}

?>

<section class="rh_section rh_wrap rh_wrap--padding rh_wrap--topPadding">

	<div class="rh_page">

		<?php if ( empty( $header_variation ) || ( 'none' === $header_variation ) ) : ?>
			<div class="rh_page__head">

				<h2 class="rh_page__title">
					<?php
				    $page_title = get_the_title( get_the_ID() );
				    $page_title = explode( ' ', $page_title, 2 );

				    if ( ! empty( $page_title ) && ( 1 < count( $page_title ) ) ) {
				    	?>
				    	<span class="sub"><?php echo esc_html( $page_title[0] ); ?></span>
				    	<span class="title"><?php echo esc_html( $page_title[1] ); ?></span>
				    	<?php
				    } elseif ( ! empty( $page_title ) && ( 1 === count( $page_title ) ) ) {
				    	?>
				    	<span class="title"><?php echo esc_html( $page_title[0] ); ?></span>
				    	<?php
				    }
					?>
				</h2>
				<!-- /.rh_page__title -->

			</div>
			<!-- /.rh_page__head -->
		<?php endif; ?>

		<div class="rh_prop_compare">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'rh_prop_compare__wrap' ); ?>>

						<?php if ( ! empty( $compare_list_items ) ) : ?>

							<?php if ( ! empty( $compare_properties ) ) : ?>

								<div class="rh_prop_compare__row clearfix rh_prop_compare__details rh_prop_compare--height_fixed">

									<div class="rh_prop_compare__column heading">

										<div class="property-thumbnail">
										</div>
										<!-- /.property-thumbnail -->

										<p><?php esc_html_e( 'Type', 'framework' ); ?></p>

										<p><?php esc_html_e( 'City', 'framework' ); ?></p>

	                                	<p><?php esc_html_e( 'Area', 'framework' ); ?></p>

	                                	<p><?php esc_html_e( 'Property Size', 'framework' ); ?></p>

	                                	<p><?php esc_html_e( 'Property ID', 'framework' ); ?></p>

	                                	<p><?php esc_html_e( 'Bedrooms', 'framework' ); ?></p>

	                                	<p><?php esc_html_e( 'Bathrooms', 'framework' ); ?></p>

	                                	<?php
	                                	$compare_features = get_terms( array(
										    'taxonomy' 		=> 'property-feature',
										    'hide_empty'	=> false,
										) );

										if ( ! empty( $compare_features ) ) {
											foreach ( $compare_features as $compare_feature ) : ?>
												<p><?php echo esc_html( $compare_feature->name, 'framework' ); ?></p>
											<?php
											endforeach;
										}
										?>

									</div>
									<!-- /.rh_prop_compare__column -->

									<?php foreach ( $compare_properties as $compare_property ) : ?>

										<div class="rh_prop_compare__column details">

											<div class="property-thumbnail">

		                                		<?php if ( ! empty( $compare_property['img'] ) ) : ?>
		                                			<a class="thumbnail" href="<?php echo esc_attr( $compare_property['permalink'] ); ?>">
		                                				<img
		                                					src="<?php echo esc_attr( $compare_property['img'][0] ); ?>"
		                                					width="<?php echo esc_attr( $compare_property['img'][1] ); ?>"
		                                					height="<?php echo esc_attr( $compare_property['img'][2] ); ?>"
		                                				>
		                                			</a>
		                                		<?php endif; ?>
		                                		<!-- Property Thumbnail -->

		                                		<h5 class="property-title">
		                                			<a href="<?php echo esc_attr( $compare_property['permalink'] ); ?>">
		                                				<?php echo esc_html( $compare_property['title'], 'framework' ); ?>
		                                			</a>
		                                		</h5>
		                                		<!-- Property Title -->

		                                		<h5 class="property-status">
													<?php echo esc_html( display_property_status( $compare_property['ID'] ) ); ?>
												</h5>
												<!-- /.property-status -->

			                                	<div class="property-price">
			                                		<p>
			                                			<?php
		                                				if ( get_property_price_by_id( $compare_property['ID'] ) ) {
		                                					echo esc_html( get_property_price_by_id( $compare_property['ID'] ), 'framework' );
		                                				}
			                                			?>
			                                		</p>
			                                	</div>
		                                		<!-- Property Price -->

		                                	</div>
		                                	<!-- /.property-thumbnail -->

											<p class="property-type">
	                                			<?php
	                                			$compare_property_types = strip_tags( get_the_term_list(
	                                				$compare_property['ID'], 'property-type', '', ',', ''
	                                			) );
	                                			if ( ! empty( $compare_property_types ) ) {
	                                				echo esc_html( $compare_property_types, 'framework' );
	                                			} else {
													include( INSPIRY_THEME_DIR . '/images/icons/icon-cross.svg' );
												}
	                                			?>
	                                		</p>
	                                		<!-- Property Type -->

	                                		<p>
	                                			<?php
	                            				$compare_property_cities 		= wp_get_object_terms(
	                            					$compare_property['ID'], 'property-city'
	                            				);
	                            				if ( empty( $compare_property_cities ) ) {
	                            					include( INSPIRY_THEME_DIR . '/images/icons/icon-cross.svg' );
	                            				} else {
	                                				$compare_property_cities	= array_reverse(
	                                					$compare_property_cities
	                                				);
	                                				foreach ( $compare_property_cities as $compare_property_city ) {
	                                					// Check if the location is city or not.
	                                					if ( 0 == $compare_property_city->parent ) {
	                                						$city 	= $compare_property_city->name;
		                                					echo esc_html( $city, 'framework' );
	                                					}
	                                				}
	                                			}
	                                			?>
	                                		</p>
	                                		<!-- Property City -->

	                                		<p>
	                                			<?php
	                            				$compare_property_locations 	= wp_get_object_terms(
	                            					$compare_property['ID'], 'property-city'
	                            				);

	                            				if ( $compare_property_locations && ! is_wp_error( $compare_property_locations ) ) {
	                                				// To get the city of property, reverse the array.
	                                				$compare_property_locations 	= array_reverse(
	                                					$compare_property_locations
	                                				);
	                                				// Areas are equal to total terms minus the city term.
	                                				$area_count				= count( $compare_property_locations ) - 1;
	                                				$loop_count				= 1;
	                                				$compare_locations_str	= '';

	                                				foreach ( $compare_property_locations as $compare_property_location ) {
	                                					// Check to see if the location is not a city.
	                                					if ( 0 < $compare_property_location->parent ) {
	                                						$area 	= get_term_by(
	                                							'id', $compare_property_location->term_id, 'property-city'
	                                						);
	                                						$compare_locations_str .= $area->name;
	                                						if ( $loop_count < $area_count && $area_count > 1 ) {
																$compare_locations_str .= ', ';
															}
															$loop_count++;
	                                					}
	                                				}

	                                				if ( $compare_locations_str ) {
	                                					echo esc_html( $compare_locations_str, 'framework' );
	                                				} else {
	                                					include( INSPIRY_THEME_DIR . '/images/icons/icon-cross.svg' );
	                                				}
	                                			} else {
	                            					include( INSPIRY_THEME_DIR . '/images/icons/icon-cross.svg' );
	                            				}
	                                			?>
	                                		</p>
	                                		<!-- Property Area -->

	                                		<p>
	                                			<?php
	                            				$post_meta_data = get_post_custom( $compare_property['ID'] );
	                            				if ( ! empty( $post_meta_data['REAL_HOMES_property_size'][0] ) ) {
									                $prop_size = $post_meta_data['REAL_HOMES_property_size'][0];
								                    if ( ! empty( $post_meta_data['REAL_HOMES_property_size_postfix'][0] ) ) {
								                        $prop_size_postfix = $post_meta_data['REAL_HOMES_property_size_postfix'][0];
								                        echo esc_html( $prop_size . ' ' . $prop_size_postfix );
								                    }
										        } else {
										        	include( INSPIRY_THEME_DIR . '/images/icons/icon-cross.svg' );
										        }
	                                			?>
	                                		</p>
	                                		<!-- Property Size -->

	                                		<p>
	                                			<?php
	                            				if ( ! empty( $post_meta_data['REAL_HOMES_property_id'][0] ) ) {
									                $prop_id = floatval( $post_meta_data['REAL_HOMES_property_id'][0] );
								                    echo esc_html( $prop_id );
										        } else {
										        	include( INSPIRY_THEME_DIR . '/images/icons/icon-cross.svg' );
										        }
	                                			?>
	                                		</p>
	                                		<!-- Property Size -->

	                                		<p>
			                        			<?php
			        							if ( ! empty( $post_meta_data['REAL_HOMES_property_bedrooms'][0] ) ) {
									                $prop_bedrooms = floatval( $post_meta_data['REAL_HOMES_property_bedrooms'][0] );
								                    echo esc_html( $prop_bedrooms );
										        } else {
										        	include( INSPIRY_THEME_DIR . '/images/icons/icon-cross.svg' );
										        }
	                                			?>
	                                		</p>
	                                		<!-- Bedrooms -->

	                                		<p>
	                                			<?php
	                            				if ( ! empty( $post_meta_data['REAL_HOMES_property_bathrooms'][0] ) ) {
											        $prop_bathrooms = floatval( $post_meta_data['REAL_HOMES_property_bathrooms'][0] );
										            echo esc_html( $prop_bathrooms );
											    } else {
										        	include( INSPIRY_THEME_DIR . '/images/icons/icon-cross.svg' );
										        }
	                                			?>
	                                		</p>
	                                		<!-- Bathrooms -->

	                                		<?php
	                            			$property_feature_terms = get_the_terms(
	                            				$compare_property['ID'], 'property-feature'
	                            			);

	                            			$property_features = array();
	                            			if ( is_array( $property_feature_terms ) && ! is_wp_error( $property_feature_terms ) ) {
	                                			foreach ( $property_feature_terms as $property_feature_term ) {
	                                				$property_features[] = $property_feature_term->name;
	                                			}
	                            			}

	                            			$feature_names = array();
	                            			$property_feature_values = get_terms( array(
											    'taxonomy' 		=> 'property-feature',
											    'hide_empty'	=> false,
											) );
	                            			if ( ! empty( $property_feature_values ) ) {
	                                			foreach ( $property_feature_values as $property_feature_value ) {
	                                				$feature_names[] 	= $property_feature_value->name;
	                                			}
	                                		}

	                            			$features_count = count( $feature_names );

	                            			for ( $index = 0; $index < $features_count; $index++ ) {

	                            				if ( isset( $property_features[ $index ] ) && isset( $feature_names[ $index ] ) ) {

	                                				if ( $property_features[ $index ] == $feature_names[ $index ] ) {

	                                					echo '<p>';
	                                					include( INSPIRY_THEME_DIR . '/images/icons/icon-check.svg' );
	                                					echo '</p>';

	                                				} else {

	                                					/**
	                                					 * If feature doesn't match then add a 0 at that
	                                					 * index of property_features array.
	                                					 */
	                                					array_splice( $property_features, $index, 0, array( 0 ) );
	                                					echo '<p>';
											        	include( INSPIRY_THEME_DIR . '/images/icons/icon-cross.svg' );
											        	echo '</p>';
											        }
											    } else {
											    	echo '<p>';
											    	include( INSPIRY_THEME_DIR . '/images/icons/icon-cross.svg' );
											    	echo '</p>';
											    }
	                            			}
	                                		?>

										</div>
										<!-- /.rh_prop_compare__column -->

									<?php endforeach; ?>

								</div>
								<!-- /.rh_prop_compare__row -->

							<?php endif; ?>

						<?php else : ?>

	                    	<p class="nothing-found"><?php esc_html_e( 'No Properties Found!', 'framework' ); ?></p>

	                    <?php endif; ?>

					</article>
					<!-- /.rh_prop_compare__wrap -->

				<?php endwhile; ?>

			<?php endif; ?>

		</div>
		<!-- /.rh_prop_compare -->

	</div>
	<!-- /.rh_page -->

</section>
<!-- /.rh_section rh_wrap rh_wrap--padding -->

<?php
get_footer();
