<?php
/**
 * Post Title
 *
 * Title of the blog post.
 *
 * @since 	3.0.0
 * @package RH/modern
 */

if ( is_single() || is_page() ) :
	?><h1 class="entry-title"><?php the_title(); ?></h1><?php
	else :
	?><h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2><?php
endif;
