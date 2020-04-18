<?php
/**
 * Template: `Advance Search - Homepage`
 *
 * @package RealHomes
 * @since   2.6.3
 */

/* Theme Home Page Module */
$theme_homepage_module  = get_option( 'theme_homepage_module' );
$main_border_class      = '';

/* For demo purpose only */
if ( isset( $_GET['module'] ) ) {
    $theme_homepage_module  = $_GET['module'];
}

?>

<!-- Content -->
<div class="container">

    <div class="row">

        <div class="span12">
            <?php
            if ( ! inspiry_is_search_page_configured() ) {
                $main_border_class = 'top-border';
            }
            ?>
            <!-- Main Content -->
            <div class="main <?php echo esc_attr( $main_border_class ); ?>">
                <?php
                /* In case of search form over  image, we do not need to display search form below */
                if ( 'search-form-over-image' !== $theme_homepage_module ) {
                    /* Display home search area widgets if there is any - otherwise display default advance search form */
                    if ( is_active_sidebar( 'home-search-area' ) ) :
                        dynamic_sidebar( 'home-search-area' );
                    else :
                        $show_home_search = get_option( 'theme_show_home_search' );

                        if ( 'true' === $show_home_search ) {
                            /* Advance Search Form for Homepage */
                            get_template_part( 'assets/classic/partials/property/search/search', 'advance' );
                        }
                    endif;
                }

                /* Homepage Contents from Page Editor */
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        $content = get_the_content( '' );
                        if ( ! empty( $content ) ) {
                            ?>
                            <div class="inner-wrapper">
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
                                    <?php the_content(); ?>
                                </article>
                            </div>
                            <?php

                        }
                    endwhile;
                endif;

                ?>
            </div><!-- End Main Content -->

        </div> <!-- End span12 -->

    </div><!-- End row -->

</div><!-- End content -->
