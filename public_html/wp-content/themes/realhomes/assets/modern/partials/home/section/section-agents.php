<?php
/**
 * Section: Agents
 *
 * Agents section on homepage.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

/* List of Agents on Homepage */
$number_of_agents = get_option( 'inspiry_agents_on_home' );
if ( ! $number_of_agents ) {
	$number_of_agents = 4;
}

$agents_args = array(
	'post_type' 		=> 'agent',
	'posts_per_page' 	=> $number_of_agents,
);

$home_agents_query = new WP_Query( $agents_args ); ?>

<section class="rh_section rh_section__agents">

	<?php
	$inspiry_home_agents_title 	= get_option( 'inspiry_home_agents_title' );
	$inspiry_home_agents_desc 	= get_option( 'inspiry_home_agents_desc' );

	if ( ! empty( $inspiry_home_agents_title ) ) {
	    $inspiry_home_agents_title = explode( ' ', $inspiry_home_agents_title, 2 );

	    if ( ! empty( $inspiry_home_agents_title ) && ( 1 < count( $inspiry_home_agents_title ) ) ) {
	    	?>
	    	<div class="rh_section__head">
				<h2 class="rh_section__title">
					<span><?php echo esc_html( $inspiry_home_agents_title[0] ); ?></span>
					<?php echo esc_html( $inspiry_home_agents_title[1] ); ?>
				</h2>
				<!-- /.rh_section__title -->
				<p class="rh_section__desc">
					<?php echo ( ! empty( $inspiry_home_agents_desc ) ) ? esc_html( $inspiry_home_agents_desc ) : false; ?>
				</p>
				<!-- /.rh_section__desc -->
			</div>
			<!-- /.rh_section__head -->
	    	<?php
	    } else {
	    	?>
	    	<div class="rh_section__head">
				<h2 class="rh_section__title">
					<?php echo esc_html( $inspiry_home_agents_title[0] ); ?>
				</h2>
				<!-- /.rh_section__title -->
				<p class="rh_section__desc">
					<?php echo ( ! empty( $inspiry_home_agents_desc ) ) ? esc_html( $inspiry_home_agents_desc ) : false; ?>
				</p>
				<!-- /.rh_section__desc -->
			</div>
			<!-- /.rh_section__head -->
	    	<?php
	    }
	} else {
		?>
		<div class="rh_section__head">
			<h2 class="rh_section__title">
				<span><?php esc_html_e( 'Recent', 'framework' ); ?></span>
				<?php esc_html_e( 'Agents', 'framework' ); ?>
			</h2>
			<!-- /.rh_section__title -->
			<p class="rh_section__desc">
				<?php esc_html_e( 'Some amazing features of Real Homes theme.', 'framework' ); ?>
			</p>
			<!-- /.rh_section__desc -->
		</div>
		<!-- /.rh_section__head -->
		<?php
	} ?>

	<?php if ( $home_agents_query->have_posts() ) : ?>

		<div class="rh_section__agents_wrap">

			<?php while ( $home_agents_query->have_posts() ) : ?>

				<?php $home_agents_query->the_post(); ?>

				<?php get_template_part( 'assets/modern/partials/agent/view/view', 'home-agent' ); ?>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		</div>
		<!-- /.rh_section__properties -->

	<?php endif; ?>

</section>
<!-- /.rh_section rh_section__agents -->
