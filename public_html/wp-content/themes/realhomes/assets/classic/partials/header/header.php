<?php
/**
 * Header File
 *
 * Header file.
 *
 * @since 	2.7.0
 * @package RH/classic
 */

?>

<!-- Start Header -->
<div class="header-wrapper">

	<div class="container"><!-- Start Header Container -->

		<?php
		/**
		 * Header Variation
		 */
		$inspiry_header_variation = get_option( 'inspiry_header_variation' );

		// For demo purpose only.
		if ( isset( $_GET['header-variation'] ) ) {
			$inspiry_header_variation = $_GET['header-variation'];
		}

		if ( 'center' == $inspiry_header_variation ) {
			get_template_part( 'assets/classic/partials/header/variation-center' );
		} else {
			get_template_part( 'assets/classic/partials/header/variation-simple' );
		}
		?>

	</div> <!-- End Header Container -->

</div><!-- End Header -->
