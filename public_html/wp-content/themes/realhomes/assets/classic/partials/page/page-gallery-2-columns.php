<?php
/**
 * Gallery 2 Columns Template
 *
 * Page template for 2 columns gallery template.
 *
 * @since 	2.7.0
 * @package RH/classic
 */

global $gallery_name;
$gallery_name = 'gallery-2-columns';

global $gallery_image_size;
$gallery_image_size = 'gallery-two-column-image';

get_template_part( 'assets/classic/partials/property/views/view', 'gallery' );
