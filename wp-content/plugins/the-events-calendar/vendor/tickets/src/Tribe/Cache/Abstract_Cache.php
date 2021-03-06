<?php
/**
 * Implements methods common to all caches implementations.
 */
abstract class Tribe__Tickets__Cache__Abstract_Cache implements Tribe__Tickets__Cache__Cache_Interface {
	/**
	 * @var array
	 */
	protected $keys = array(
		'posts_with_tickets',
		'posts_without_tickets',
		'past_events',
	);

	/**
	 * @var int The expiration time in seconds.
	 */
	protected $expiration = 60;

	/**
	 * Sets the expiration time for the cache.
	 *
	 * @param int $seconds
	 *
	 * @return void
	 */
	public function set_expiration_time( $seconds ) {
		$this->expiration = $seconds;
	}

	/**
	 * @return array
	 */
	protected function fetch_posts_with_ticket_types() {
		$supported_types = array_map( 'esc_sql', (array) tribe_get_option( 'ticket-enabled-post-types', array() ) );

		if ( empty( $supported_types ) ) {
			$ids = array();
		}

		/** @var \wpdb $wpdb */
		global $wpdb;

		$post_types = "('" . implode( "','", $supported_types ) . "')";

		$query = "SELECT DISTINCT(pm.meta_value) FROM {$wpdb->postmeta} pm
				LEFT JOIN {$wpdb->posts} p
				ON pm.meta_value = p.ID
				WHERE p.post_type IN {$post_types}
				AND pm.meta_key LIKE '_tribe_%_for_event'
				AND pm.meta_value IS NOT NULL";

		// if events are among the supported post types then exclude past events
		if ( in_array( Tribe__Events__Main::POSTTYPE, $supported_types ) ) {
			$past_events = '(' . implode( ',', $this->past_events() ) . ')';
			$query .= " AND pm.meta_value NOT IN {$past_events}";
		}

		$ids = $wpdb->get_col( $query );

		$ids = is_array( $ids ) ? $ids : array();

		return $ids;
	}

	/**
	 * @return array
	 */
	protected function fetch_posts_without_ticket_types() {
		$supported_types = array_map( 'esc_sql', (array) tribe_get_option( 'ticket-enabled-post-types', array() ) );

		if ( empty( $supported_types ) ) {
			$ids = array();
		}

		/** @var \wpdb $wpdb */
		global $wpdb;

		$post_types = "('" . implode( "','", $supported_types ) . "')";

		$query = "SELECT DISTINCT(ID) FROM {$wpdb->posts}
				WHERE post_type IN {$post_types}";

		$posts_with_tickets = $this->posts_with_ticket_types();

		if ( ! empty( $posts_with_tickets ) ) {
			$excluded = '(' . implode( ',', $posts_with_tickets ) . ')';
			$query .= " AND ID NOT IN {$excluded}";
		}
		$ids = $wpdb->get_col( $query );

		$ids = is_array( $ids ) ? $ids : array();

		return $ids;
	}

	/**
	 * @return array
	 */
	protected function fetch_past_events() {
		/** @var \wpdb $wpdb */
		global $wpdb;

		$query = $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} p
			LEFT JOIN {$wpdb->postmeta} pm
			ON p.ID = pm.post_id
			WHERE p.post_type = %s
			AND pm.meta_key = '_EventStartDate'
			AND pm.meta_value < NOW()", Tribe__Events__Main::POSTTYPE );

		$ids = $wpdb->get_col( $query );

		return is_array( $ids ) ? $ids : array();
	}
}