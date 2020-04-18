<?php
/**
 * Single Property: Floor Plans
 *
 * Floor plans of property.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

global $post;
$property_floor_plans = get_post_meta( get_the_ID(), 'inspiry_floor_plans', true );

if ( ! empty( $property_floor_plans )
	&& is_array( $property_floor_plans )
	&& ! empty( $property_floor_plans[0]['inspiry_floor_plan_name'] ) ) {
	?>
	<div class="rh_property__floor_plans floor-plans">

		<h3 class="rh_property__heading floor-plans-label"><?php esc_html_e( 'Floor Plans', 'framework' ); ?></h3>

		<div class="floor-plans-accordions">
	        <?php
	        /**
	         * Floor plans contents
	         */
	        foreach ( $property_floor_plans as $i => $floor ) {
	            ?>
				<div class="floor-plan">
					<div class="floor-plan-title">
						<div class="title">
							<i class="fa fa-plus"></i>
							<h3><?php echo esc_html( $floor['inspiry_floor_plan_name'] ); ?></h3>
						</div>
						<div class="floor-plan-meta">
							<?php
							/**
	                         * Size
	                         */
							if ( ! empty( $floor['inspiry_floor_plan_size'] ) ) {
								$floor_size = $floor['inspiry_floor_plan_size'];
								echo '<p>';
								echo esc_html( $floor_size );
								if ( ! empty( $floor['inspiry_floor_plan_size_postfix'] ) ) {
									$floor_size_postfix = $floor['inspiry_floor_plan_size_postfix'];
									echo ' ' . $floor_size_postfix;
								}
								echo '</p>';
							}

							/*
                             * Bedrooms
                             */
							if ( ! empty( $floor['inspiry_floor_plan_bedrooms'] ) ) {
								$floor_bedrooms = floatval( $floor['inspiry_floor_plan_bedrooms'] );
								$bedrooms_label = ( $floor_bedrooms > 1 ) ? esc_html__( 'Bedrooms', 'framework' ) : esc_html__( 'Bedroom', 'framework' );
								echo '<p>';
								echo esc_html( $floor_bedrooms . ' ' . $bedrooms_label );
								echo '</p>';
							}

							/*
                             * Bathrooms
                             */
							if ( ! empty( $floor['inspiry_floor_plan_bathrooms'] ) ) {
								$floor_bathrooms = floatval( $floor['inspiry_floor_plan_bathrooms'] );
								$bathrooms_label = ( $floor_bathrooms > 1 ) ? esc_html__( 'Bathrooms', 'framework' ): esc_html__( 'Bathroom', 'framework' );
								echo '<p>';
								echo esc_html( $floor_bathrooms . ' ' . $bathrooms_label );
								echo '</p>';
							}

							/**
	                         * Price
	                         */
							if ( ! empty( $floor['inspiry_floor_plan_price'] ) ) {
								echo '<p class="floor-price">' . get_property_floor_price( $floor ) . '</p>';
							}

							?>
						</div>
					</div>
					<div class="floor-plan-content">

	                    <?php if ( ! empty( $floor['inspiry_floor_plan_descr'] ) ) { ?>
	                        <div class="floor-plan-desc">
	                            <?php echo apply_filters( 'the_content', $floor['inspiry_floor_plan_descr'] ); ?>
	                        </div>
	                    <?php } ?>

	                    <?php if ( ! empty( $floor['inspiry_floor_plan_image'] ) ) { ?>
	                    <div class="floor-plan-map">
	                        <a href="<?php echo esc_url( $floor['inspiry_floor_plan_image'] ); ?>" class="<?php echo get_lightbox_plugin_class(); ?>" <?php echo generate_gallery_attribute( 'floor_plans' ); ?>>
	                            <img src="<?php echo esc_url( $floor['inspiry_floor_plan_image'] ); ?>" alt="<?php echo esc_attr( $floor['inspiry_floor_plan_name'] ); ?>" >
	                        </a>
	                    </div>
	                    <?php } ?>
					</div>
				</div>
	            <?php
	        }
	        ?>
		</div>
	</div>
	<?php
}
