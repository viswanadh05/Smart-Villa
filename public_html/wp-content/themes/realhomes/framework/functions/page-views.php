<?php
/**
 * Class Inspiry_Page_Views'
 *
 * Provide stats of Page views count and relevant dates
 */
class Inspiry_Page_Views {

	private $pageViews;
	private $pageViewed;

	function __construct( $post_id ) {

		$this->pageViews  = get_post_meta( $post_id, 'inspiry_page_views', true );
		$this->pageViewed = ( $viewed = get_transient( 'inspiry_page_count-' . $post_id ) );

		if ( false === $this->pageViewed ) {


			$today_date = date( "d-m-Y" );
			if ( empty( $this->pageViews ) ) {
				$today_count = array(
					$today_date => 1
				);

				add_post_meta( $post_id, 'inspiry_page_views', $today_count, true );

			} else {

				if ( array_key_exists( $today_date, $this->pageViews ) ) {

					$today_count = array(
						$today_date => $this->pageViews[ $today_date ] + 1
					);

				} else {

					$today_count = array(
						$today_date => 1
					);
				}

				$pageViews = array_slice( array_merge( $this->pageViews, $today_count ), -15 ); // save 15 last records only
				update_post_meta( $post_id, 'inspiry_page_views', $pageViews );
			}

			$this->pageViews = get_post_meta( $post_id, 'inspiry_page_views', true ); // todo: move it to destructor
			set_transient( 'inspiry_page_count-' . $post_id, 'viewed', 86400 ); // one day in seconds = 86400
		}

		$this->pageViewed = ( $viewed = get_transient( 'inspiry_page_count-' . $post_id ) );
	}

	public function get_page_views_list() {
		return (array) $this->pageViews;
	}
}