<?php
/**
 * View: Homepage Agents
 *
 * Agents on the homepage agents section.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

global $post;
$agent_id		= get_the_ID();
$agent_mobile 	= get_post_meta( $agent_id, 'REAL_HOMES_mobile_number', true );
$agent_email 	= get_post_meta( $agent_id, 'REAL_HOMES_agent_email', true );

$listed_properties	= inspiry_get_listed_properties( $agent_id );

?>

<article <?php post_class( 'rh_agent' ); ?>>

	<div class="rh_agent__wrap">

		<div class="rh_agent__thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail( $agent_id ) ) {
	                the_post_thumbnail( 'agent-image' );
	            }
				?>
			</a>
		</div>
		<!-- /.rh_agent__thumbnail -->

		<div class="rh_agent__details">

			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			<?php if ( ! empty( $agent_mobile ) ) : ?>
				<p class="rh_agent__phone"><?php echo esc_html( $agent_mobile ); ?></p>
				<!-- /.rh_agent__phone -->
			<?php endif; ?>

			<?php if ( ! empty( $agent_email ) ) : ?>
				<a href="mailto:<?php echo esc_attr( antispambot( $agent_email ) ); ?>" class="rh_agent__email">
					<?php echo esc_html( antispambot( $agent_email ) ); ?>
				</a>
				<!-- /.rh_agent__email -->
			<?php endif; ?>

			<div class="rh_agent__listed">
				<p class="figure"><?php echo ( ! empty( $listed_properties ) ) ? esc_html( $listed_properties ) : 0; ?></p>
				<!-- /.figure -->
				<p class="heading"><?php ( 1 === $listed_properties ) ? esc_html_e( 'Listed Property', 'framework' ) : esc_html_e( 'Listed Properties', 'framework' ); ?></p>
				<!-- /.heading -->
			</div>
			<!-- /.rh_agent__listed -->

			<span class="rh_agent__arrow">
				<a href="<?php the_permalink(); ?>">
					<?php include( INSPIRY_THEME_DIR . '/images/icons/icon-arrow-right.svg' ); ?>
				</a>
			</span>
			<!-- /.rh_agent__arrow -->

		</div>
		<!-- /.rh_agent__details -->

	</div>
	<!-- /.rh_agent__wrap -->

</article>
<!-- /.rh_agent -->
