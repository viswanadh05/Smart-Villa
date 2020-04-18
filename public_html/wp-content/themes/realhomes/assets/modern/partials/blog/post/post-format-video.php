<?php
/**
 * Format: Video
 *
 * Video post format.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

global $post;
$embed_code = get_post_meta( get_the_ID(), 'REAL_HOMES_embed_code', true );

if ( is_single() ) {
	if ( ! empty( $embed_code ) ) {
		?>
		<div class="post-video">
		    <span class="format-icon video"></span>
		    <div class="video-wrapper">
		        <?php echo stripslashes( htmlspecialchars_decode( $embed_code ) ); ?>
		    </div>
		</div>
		<?php
	} elseif ( has_post_thumbnail() ) {
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_url( $image_id );

		?>
		<div class="post-video">
		    <a href="<?php echo esc_url( $image_url ); ?>" class="pretty-photo" title="<?php the_title(); ?>">
		        <?php the_post_thumbnail( 'post-featured-image' ); ?>
		    </a>
		</div>
		<?php
	}
} else {
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_url( $image_id );

	?>
	<div class="post-video">
	    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	        <?php the_post_thumbnail( 'post-featured-image' ); ?>
	    </a>
	</div>
	<?php
}
