<?php
/**
 * Main Headless WordPress
 * Called from headless-wordpress.php
 *
 * @package headless-wordpress
 */
namespace HeadlessWP;

/**
 * Main Headless WordPress class
 */
final class Headless_WordPress {

	/**
	 * Class instance
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return void
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialize class
	 *
	 * @return void
	 */
	public static function init() {
		$ob_class = get_called_class();
		add_action( 'wp', array( $ob_class, 'headlesswp_frontend_redirect' ) );
	}

	/**
	 * Die if we try to access a page or the front page
	 *
	 * @return void
	 */
	public static function headlesswp_frontend_redirect() {
		if ( ! is_admin() ) {

			/**
			 * Fetch the IDs of the post, page or blog page
			 */
			$post_ID     = get_the_id();
			$homepage_id = get_option( 'page_on_front' );
			$blogpage_id = get_option( 'page_for_posts' );

			/**
			 * Do a wp_die so we can't access the site
			 */
			if ( $homepage_id === $post_ID || $blogpage_id === $post_ID || is_front_page() ) {
				wp_die( 'This site is not accessible' );
				exit;
			} else {

				/**
				 * Else do a redirect back to WP admin again
				 */

				$post_edit_link = admin_url( 'post.php?post=' . $post_ID . '&action=edit' );

				if ( is_user_logged_in() ) {
					/**
					 * Logged in users go to the post edit screen
					 */
					wp_safe_redirect( $post_edit_link );
					exit;
				} else {
					/**
					 * Not logged in? Redirect to login page
					 */
					wp_safe_redirect( wp_login_url( $post_edit_link ) );
					exit;
				}
			}
		}
	}
		/**
		 * Get class object instance
		 *
		 * @return object
		 */
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new Headless_WordPress();
		}
		return self::$instance;
	}
}
