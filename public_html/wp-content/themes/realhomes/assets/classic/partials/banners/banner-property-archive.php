<?php
/**
 * Banner: Property Archive
 *
 * @since 2.7.0
 * @package RH/classic
 */

// Banner Image.
$banner_image_path = get_default_banner(); ?>

<div class="page-head" style="background-repeat: no-repeat;background-position: center top;background-image: url('<?php echo esc_url( $banner_image_path ); ?>'); background-size: cover; ">
	<?php if ( ! ( 'true' == get_option( 'theme_banner_titles' ) ) ) { ?>
    <div class="container">
        <div class="wrap clearfix">
            <h1 class="page-title"><span><?php post_type_archive_title(); ?></span></h1>
        </div>
    </div>
    <?php } ?>
</div><!-- End Page Head -->
