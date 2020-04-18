<?php
/**
 * Advance Property Search
 *
 * Advance search of properties.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

if ( inspiry_is_search_page_configured() ) : ?>
	<section class="rh_prop_search rh_wrap--padding">
		<?php get_template_part( 'assets/modern/partials/property/search/search', 'form' ); ?>
	</section>
	<!-- /.rh_prop_search -->
<?php endif; ?>
