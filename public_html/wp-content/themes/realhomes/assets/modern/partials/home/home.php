<?php
/**
 * Homepage Template
 *
 * Page template for homepage.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

get_header();

/* Theme Home Page Module */
$theme_homepage_module  = get_option( 'theme_homepage_module' );

switch ( $theme_homepage_module ) {
	case 'properties-slider':
		get_template_part( 'assets/modern/partials/home/slider/slider', 'property' );
		break;

	case 'properties-map':
	    get_template_part( 'assets/modern/partials/home/slider/slider', 'map' );
	    break;

	case 'slides-slider':
	    get_template_part( 'assets/modern/partials/home/slider/slider', 'slides' );
	    break;

	case 'revolution-slider':
	    $rev_slider_alias = trim( get_option( 'theme_rev_alias' ) );
	    if ( function_exists( 'putRevSlider' ) && ( ! empty( $rev_slider_alias ) ) ) {
	        putRevSlider( $rev_slider_alias );
	    } else {
	        get_template_part( 'assets/modern/partials/banner/banner', 'header' );
	    }
	    break;

	default:
		get_template_part( 'assets/modern/partials/banner/banner', 'header' );
	    break;
}

// Show sections options.
$inspiry_show_home_search 			= get_option( 'theme_show_home_search' ); 			// Advance Search.
$inspiry_show_featured_properties 	= get_option( 'theme_show_featured_properties' );	// Featured Properties.
$inspiry_show_testimonial 			= get_option( 'inspiry_show_testimonial' );			// Testimonial.
$inspiry_show_cta 					= get_option( 'inspiry_show_cta' );					// Call to Action.
$inspiry_show_agents 				= get_option( 'inspiry_show_agents' );				// Agents.
$inspiry_show_home_features 		= get_option( 'inspiry_show_home_features' );		// Features.
$inspiry_show_home_partners 		= get_option( 'inspiry_show_home_partners' );		// Partners.
$inspiry_show_home_cta_contact 		= get_option( 'inspiry_show_home_cta_contact' );	// CTA Contact.

if ( ! empty( $inspiry_show_home_search ) && 'true' === $inspiry_show_home_search ) {
	get_template_part( 'assets/modern/partials/property/search/search', 'advance' );
}

get_template_part( 'assets/modern/partials/home/section/section', 'latest-properties' );

if ( ! empty( $inspiry_show_featured_properties ) && 'true' === $inspiry_show_featured_properties ) {
	get_template_part( 'assets/modern/partials/home/section/section', 'featured-properties' );
}

if ( ! empty( $inspiry_show_testimonial ) && 'true' === $inspiry_show_testimonial ) {
	get_template_part( 'assets/modern/partials/home/section/section', 'testimonial' );
}

if ( ! empty( $inspiry_show_cta ) && 'true' === $inspiry_show_cta ) {
	get_template_part( 'assets/modern/partials/home/section/section', 'cta' );
}

if ( ! empty( $inspiry_show_agents ) && 'true' === $inspiry_show_agents ) {
	get_template_part( 'assets/modern/partials/home/section/section', 'agents' );
}

if ( ! empty( $inspiry_show_home_features ) && 'true' === $inspiry_show_home_features ) {
	get_template_part( 'assets/modern/partials/home/section/section', 'features' );
}

if ( ! empty( $inspiry_show_home_partners ) && 'true' === $inspiry_show_home_partners ) {
	get_template_part( 'assets/modern/partials/home/section/section', 'partners' );
}

if ( ! empty( $inspiry_show_home_cta_contact ) && 'true' === $inspiry_show_home_cta_contact ) {
	get_template_part( 'assets/modern/partials/home/section/section', 'cta-contact' );
}

get_footer();
