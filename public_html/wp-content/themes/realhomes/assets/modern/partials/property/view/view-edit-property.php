<?php
/**
 * View: Edit Property
 *
 * Viewing template of Submit Property Edit page.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

if ( is_page_template( 'templates/template-submit-property.php' ) ) {
	global $target_property;
	global $edit_property_id;

	$edit_property_id = intval( trim( $_GET['edit_property'] ) );
	$target_property  = get_post( $edit_property_id );

	/* check if passed id is a proper property post */
	if ( ! empty( $target_property ) && ( 'property' == $target_property->post_type ) ) {

		// Check Author.
		$current_user = wp_get_current_user();

		/* check if current logged in user is the author of property */
		if ( $target_property->post_author == $current_user->ID ) {
			global $post_meta_data;
			$post_meta_data = get_post_custom( $target_property->ID );

			$inspiry_submit_fields = inspiry_get_submit_fields(); ?>
			<div class="rh_form">
				<form id="submit-property-form" class="rh_form__form" enctype="multipart/form-data" method="post">

					<div class="rh_form__row">

						<?php
						/**
				         * Property Title
				         */
				        if ( in_array( 'title', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/title' );
				        }
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
						/**
				         * Property Description
				         */
				        if ( in_array( 'description', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/description' );
				        }
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
						/**
				         * Property Type
				         */
				        if ( in_array( 'property-type', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/property-type' );
				        }

				        /**
				         * Property Status
				         */
				        if ( in_array( 'property-status', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/property-status' );
				        }

				        /**
				         * Locations
				         */
				        if ( in_array( 'locations', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/locations' );
				        }

						/**
				         * Bedrooms
				         */
				        if ( in_array( 'bedrooms', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/bedrooms' );
				        }

				        /**
				         * Bathrooms
				         */
				        if ( in_array( 'bathrooms', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/bathrooms' );
				        }

				        /**
				         * Garages
				         */
				        if ( in_array( 'garages', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/garages' );
				        }

						/**
				         * Property ID
				         */
				        if ( in_array( 'property-id', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/property-id' );
				        }

				        /**
				         * Property Price
				         */
				        if ( in_array( 'price', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/price' );
				        }

				        /**
				         * Property Price Postfix
				         */
				        if ( in_array( 'price-postfix', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/price-postfix' );
				        }

						/**
				         * Property Area
				         */
				        if ( in_array( 'area', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/area' );
				        }

				        /**
				         * Property Area Postfix
				         */
				        if ( in_array( 'area-postfix', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/area-postfix' );
				        }

				        /**
				         * Property Video
				         */
				        if ( in_array( 'video', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/video' );
				        }
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
						/**
				         * Gallery Images
				         */
				        global $column_class;
		        		$column_class = 'rh_form--2-column';
				        if ( in_array( 'images', $inspiry_submit_fields, true ) ) {
				        	if ( ! in_array( 'address-and-map', $inspiry_submit_fields, true ) ) {
					            $column_class = 'rh_form--1-column';
					        }
				            get_template_part( 'assets/modern/partials/property/view/form-fields/images' );
				        }

				        /**
				         * Address and Google Map
				         */
				        if ( in_array( 'address-and-map', $inspiry_submit_fields, true ) ) {
				        	if ( ! in_array( 'images', $inspiry_submit_fields, true ) ) {
					            $column_class = 'rh_form--1-column';
					        }
				            get_template_part( 'assets/modern/partials/property/view/form-fields/address-and-map' );
				        }
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
						/**
				         * Additional Details
				         */
				        if ( in_array( 'additional-details', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/additional-details' );
				        }
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
						/**
				         * Property Features
				         */
				        if ( in_array( 'features', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/features' );
				        }
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
						/**
				         * Property Agent
				         */
				        if ( in_array( 'agent', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/agent' );
				        }
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
						/**
				         * Parent Property
				         */
				        if ( in_array( 'parent', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/parent' );
				        }
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
						/**
				         * Reviewer Message
				         */
				        if ( in_array( 'reviewer-message', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/reviewer-message' );
				        }
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
						/**
				         * Featured Property
				         */
				        if ( in_array( 'featured', $inspiry_submit_fields, true ) ) {
				            get_template_part( 'assets/modern/partials/property/view/form-fields/featured' );
				        }
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
							/**
							 * Terms & Conditions
							 */
							if ( in_array( 'terms-conditions', $inspiry_submit_fields, true ) ) {
								get_template_part( 'assets/modern/partials/property/view/form-fields/terms-conditions' );
							}
						?>

					</div>
					<!-- /.rh_form__row -->

					<div class="rh_form__row">

						<?php
						/**
				         * Submit Button
				         */
				        get_template_part( 'assets/modern/partials/property/view/form-fields/submit-button' );
						?>

					</div>
					<!-- /.rh_form__row -->

				</form>
			</div>
			<!-- /.rh_form -->
			<?php
		}
	}
}
