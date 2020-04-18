<?php
/**
 * Single Property: Agent for Sidebar
 *
 * Property agent for sidebar on single property.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

global $post;   // Property.

/**
 * A function that works as re-usable template
 *
 * @param array $args - function arguments.
 */
function display_sidebar_agent_box( $args ) {
	global $post;
	?>
	<section class="widget rh_property_agent <?php echo esc_attr( $args['agent_class'] ); ?>">
		<?php
		if ( isset( $args['display_author'] ) && ( $args['display_author'] ) ) {
			if ( isset( $args['profile_image_id'] ) && ( 0 < $args['profile_image_id'] ) ) : ?>
				<a class="agent-image" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					<?php echo wp_get_attachment_image( $args['profile_image_id'], 'agent-image' ); ?>
				</a>
				<?php
			elseif ( isset( $args['agent_email'] ) ) : ?>
				<a class="agent-image" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					<?php echo get_avatar( $args['agent_email'], '210' ); ?>
				</a>
				<?php
			endif;
		} else {
			if ( isset( $args['agent_id'] ) && has_post_thumbnail( $args['agent_id'] ) ) {
				?>
				<a class="agent-image" href="<?php echo esc_url( get_permalink( $args['agent_id'] ) ); ?>">
					<?php echo get_the_post_thumbnail( $args['agent_id'], 'agent-image' ); ?>
				</a>
				<?php
			}
		}
		?>
		<?php
		if ( isset( $args['agent_title_text'] ) && ! empty( $args['agent_title_text'] ) ) {
			?><h3 class="rh_property_agent__title"><?php echo esc_html( $args['agent_title_text'] ); ?></h3><?php
		}
		?>
		<div class="rh_property_agent__agent_info">
			<?php
			if ( isset( $args['agent_office_phone'] ) && ! empty( $args['agent_office_phone'] ) ) {
				?>
				<p class="contact office">
					<?php esc_html_e( 'Office', 'framework' ); ?> : <span class="value"><?php echo esc_html( $args['agent_office_phone'] ); ?></span>
				</p>
				<?php
			}
			if ( isset( $args['agent_mobile'] ) && ! empty( $args['agent_mobile'] ) ) {
				?>
				<p class="contact mobile">
					<?php esc_html_e( 'Mobile', 'framework' ); ?> : <span class="value"><?php echo esc_html( $args['agent_mobile'] ); ?></span>
				</p>
				<?php
			}
			if ( isset( $args['agent_office_fax'] ) && ! empty( $args['agent_office_fax'] ) ) {
				?>
				<p class="contact fax">
					<?php esc_html_e( 'Fax', 'framework' ); ?> : <span class="value"><?php echo esc_html( $args['agent_office_fax'] ); ?></span>
				</p>
				<?php
			}
			if ( isset( $args['agent_whatsapp'] ) && ! empty( $args['agent_whatsapp'] ) ) {
				?>
				<p class="contact whatsapp">
					<?php esc_html_e( 'WhatsApp', 'framework' ); ?> : <span class="value"><?php echo esc_html( $args['agent_whatsapp'] ); ?></span>
				</p>
				<?php
			}
			if ( isset( $args['agent_email'] ) && ! empty( $args['agent_email'] ) ) {
				?>
				<p class="contact email">
					<?php esc_html_e( 'Email', 'framework' ); ?> : <a href="mailto:<?php echo esc_attr( antispambot( $args['agent_email'] ) ); ?>" class="value"><?php echo esc_html( antispambot( $args['agent_email'] ) ); ?></a>
				</p>
				<?php
			}
			?>
		</div>
		<?php
		if ( isset( $args['display_author'] ) && ( $args['display_author'] ) ) {
			?><a class="rh_btn rh_btn--primary rh_property_agent__link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html_e( 'View My Listings', 'framework' ); ?></a><?php
		} else {
			?><a class="rh_btn rh_btn--primary rh_property_agent__link" href="<?php echo esc_url( get_permalink( $args['agent_id'] ) ); ?>"><?php esc_html_e( 'View My Listings', 'framework' ); ?></a><?php
		}
		?>
	</section>
	<?php
}

/**
 * Logic behind displaying agents / author information
 */
$display_agent_info 	= get_option( 'theme_display_agent_info' );
$agent_display_option 	= get_post_meta( get_the_ID(), 'REAL_HOMES_agent_display_option', true );

if ( ( 'true' === $display_agent_info ) && ( 'none' !== $agent_display_option ) ) {

	if ( 'my_profile_info' === $agent_display_option ) {

		$profile_args = array();
		$profile_args['display_author'] 	= true;
		$profile_args['agent_title_text']	= get_the_author_meta( 'display_name' );
		$profile_args['profile_image_id'] 	= intval( get_the_author_meta( 'profile_image_id' ) );
		$profile_args['agent_mobile'] 		= get_the_author_meta( 'mobile_number' );
		$profile_args['agent_whatsapp'] 	= get_the_author_meta( 'mobile_whatsapp' );
		$profile_args['agent_office_phone'] = get_the_author_meta( 'office_number' );
		$profile_args['agent_office_fax'] 	= get_the_author_meta( 'fax_number' );
		$profile_args['agent_email'] 		= get_the_author_meta( 'user_email' );
		display_sidebar_agent_box( $profile_args );

	} else {

		$property_agents = get_post_meta( get_the_ID(), 'REAL_HOMES_agents' );
		// Remove invalid ids.
		$property_agents = array_filter( $property_agents, function( $v ) {
			return ( $v > 0 );
		} );
		// Remove duplicated ids.
		$property_agents = array_unique( $property_agents );
		$agents_count = 0;
		if ( ! empty( $property_agents ) ) {
			foreach ( $property_agents as $agent ) {
				if ( 0 < intval( $agent ) ) {
					$agent_args = array();
					$agent_args['agent_id'] = intval( $agent );
					$agent_args['agent_title_text'] = esc_html__( 'Agent', 'framework' ) . ' ' . get_the_title( $agent_args['agent_id'] );
					$agent_args['agent_mobile'] = get_post_meta( $agent_args['agent_id'], 'REAL_HOMES_mobile_number', true );
					$agent_args['agent_whatsapp'] = get_post_meta( $agent_args['agent_id'], 'REAL_HOMES_whatsapp_number', true );
					$agent_args['agent_office_phone'] = get_post_meta( $agent_args['agent_id'], 'REAL_HOMES_office_number', true );
					$agent_args['agent_office_fax'] = get_post_meta( $agent_args['agent_id'], 'REAL_HOMES_fax_number', true );
					$agent_args['agent_email'] = get_post_meta( $agent_args['agent_id'], 'REAL_HOMES_agent_email', true );
					$agent_args['agent_class'] = ( 0 !== $agents_count ) ? 'multiple-agent' : false;
					display_sidebar_agent_box( $agent_args );
					$agents_count++;
				}
			}
		}
	}
}
