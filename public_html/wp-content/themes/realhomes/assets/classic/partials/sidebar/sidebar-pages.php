<?php
/**
 * Sidebar: Pages
 *
 * @since 1.0.0
 * @package RH/classic
 */

?>

<div class="span3 sidebar-wrap">

    <!-- Sidebar -->
    <aside class="sidebar">
        <?php
        if ( ! dynamic_sidebar( 'default-page-sidebar' ) ) :
        endif;
        ?>
    </aside><!-- End Sidebar -->

</div>
