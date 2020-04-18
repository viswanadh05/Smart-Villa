<?php
/**
 * Advance Property Search
 *
 * @package RH/classic
 */

if ( inspiry_is_search_page_configured() ) : ?>
    <section class="advance-search ">
        <?php
        $home_advance_search_title = get_option( 'theme_home_advance_search_title' );
        if ( ! empty( $home_advance_search_title ) ) {
            ?><h3 class="search-heading"><i class="fa fa-search"></i><?php echo esc_html( $home_advance_search_title ); ?></h3><?php
        }
        get_template_part( 'assets/classic/partials/property/search/search', 'form' );
        ?>
    </section>
<?php endif; ?>
