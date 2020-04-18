<?php
/**
 * Single Property: Attachments
 *
 * Attachments of a property.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

$display_display_attachments = get_option( 'theme_display_attachments' );
if ( 'true' === $display_display_attachments ) {
	global $post;
	$attachments = get_post_meta( get_the_ID(), 'REAL_HOMES_attachments', false );
	if ( is_array( $attachments ) ) {
	    $attachments = array_filter( $attachments );
	}
	if ( ! empty( $attachments ) ) {
	    ?>
	    <div class="rh_property__attachments_wrap">
	        <?php
	        $property_attachments_title = get_option( 'theme_property_attachments_title' );
	        if ( ! empty( $property_attachments_title ) ) {
	            ?><h4 class="rh_property__heading"><?php echo esc_html( $property_attachments_title ); ?></h4><?php
	        }
	        echo '<ul class="rh_property__attachments">';
	        foreach ( $attachments as $attachment_id ) {
	            $file_path = wp_get_attachment_url( $attachment_id );
	            if ( $file_path ) {
	                $file_type = wp_check_filetype( $file_path );
	                echo '<li class="' . esc_attr( $file_type['ext'] ) . '"><a target="_blank" href="' . esc_attr( $file_path ) . '">' . get_icon_for_extension( $file_type['ext'] ) . get_the_title( $attachment_id ) . '</a></li>';
	            }
	        }
	        echo '</ul>';
	        ?>
	    </div>
	    <?php
	}
}
