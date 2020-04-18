<?php
/**
 * Field: Agent
 *
 * @since 	3.0.0
 * @package RH/modern
 */

?>

<div class="rh_form__item rh_form--1-column rh_form--columnAlign agent-fields-wrapper">
	<label><?php esc_html_e( 'What to display in agent information box ?', 'framework' );?></label>
	<div class="rh_agent_options">

		<label for="agent_option_none">
			<span class="title"><?php esc_html_e( 'None', 'framework' ); ?></span>
			<span class="sub-title"><?php esc_html_e( '( Agent information box will not be displayed )', 'framework' ); ?></span>
			<input id="agent_option_none" type="radio" name="agent_display_option" value="none" <?php
		    if ( inspiry_is_edit_property() ) {
		        global $post_meta_data;
		        if ( isset( $post_meta_data['REAL_HOMES_agent_display_option'] ) && ( 'none' == $post_meta_data['REAL_HOMES_agent_display_option'][0] ) ) {
		            echo 'checked';
		        }
		    }
		    ?> />
		    <span class="control__indicator"></span>
		</label>

		<label for="agent_option_profile">
			<span class="title"><?php esc_html_e( 'My profile information', 'framework' );?></span>
			<?php
		    $profile_url = inspiry_get_edit_profile_url();
		    if ( ! empty( $profile_url ) ) {
		        ?><span class="sub-title"><a href="<?php echo esc_url( $profile_url ); ?>" target="_blank"><?php esc_html_e( '( Edit Profile Information )', 'framework' ); ?></a></span><?php

		    } else {
		        ?><span class="sub-title"><a href="<?php echo esc_url( network_admin_url( 'profile.php' ) ); ?>" target="_blank"><?php esc_html_e( '( Edit Profile Information )', 'framework' ); ?></a></span><?php

		    }
		    ?>
			<input id="agent_option_profile" type="radio" name="agent_display_option" value="my_profile_info" <?php
		    if ( inspiry_is_edit_property() ) {
		        global $post_meta_data;
		        if ( isset( $post_meta_data['REAL_HOMES_agent_display_option'] ) && ( 'my_profile_info' == $post_meta_data['REAL_HOMES_agent_display_option'][0] ) ) {
		            echo 'checked';
		        }
		    }
		    ?> />
		    <span class="control__indicator"></span>
		</label>

		<div class="rh_agent_options__wrap">
			<label for="agent_option_agent">
				<span class="title"><?php esc_html_e( 'Display an agent\'s information', 'framework' ); ?></span>
				<input id="agent_option_agent" type="radio" name="agent_display_option" value="agent_info" <?php
			    if ( inspiry_is_edit_property() ) {
			        global $post_meta_data;
			        if ( isset( $post_meta_data['REAL_HOMES_agent_display_option'] ) && ( 'agent_info' == $post_meta_data['REAL_HOMES_agent_display_option'][0] ) ) {
			            echo 'checked';
			        }
			    }
			    ?> />
			    <span class="control__indicator"></span>
			</label>
			<select name="agent_id[]" id="agent-selectbox" class="rh_select2" multiple="multiple">
				<?php
		        if ( inspiry_is_edit_property() ) {
		            global $post_meta_data;
		            if ( isset( $post_meta_data['REAL_HOMES_agents'] ) ) {
		                generate_posts_list( 'agent', $post_meta_data['REAL_HOMES_agents'] );
		            } else {
		                generate_posts_list( 'agent' );
		            }
		        } else {
		            generate_posts_list( 'agent' );
		        }
		        ?>
			</select>
		</div>
		<!-- /.rh_agent_options__wrap -->
	</div>
</div>
<!-- /.rh_form__item -->
