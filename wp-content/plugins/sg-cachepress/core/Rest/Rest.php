<?php
namespace SiteGround_Optimizer\Rest;

/**
 * Handle PHP compatibility checks.
 */
class Rest {

	const REST_NAMESPACE = 'siteground-optimizer/v1';

	/**
	 * The constructor.
	 */
	public function __construct() {
		$this->helper  = new Rest_Helper();

		add_action( 'rest_api_init', array( $this, 'register_rest_routes' ) );
	}

	/**
<<<<<<< Updated upstream
	 * Check if a given request has admin access
	 *
	 * @since  5.0.13
	 *
	 * @param  WP_REST_Request $request Full data about the request.
	 * @return WP_Error|bool
	 */
	public function check_permissions( $request ) {
		return current_user_can( 'administrator' );
	}

	/**
=======
>>>>>>> Stashed changes
	 * Register rest routes.
	 *
	 * @since  5.0.0
	 */
	public function register_rest_routes() {
		register_rest_route(
			self::REST_NAMESPACE, '/check-compatibility/', array(
				'methods'  => 'POST',
				'callback' => array( $this->helper, 'handle_compatibility_check' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/check-compatibility-status/', array(
				'methods'  => 'GET',
				'callback' => array( $this->helper, 'handle_compatibility_status_check' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/hide-rating/', array(
				'methods'  => 'GET',
				'callback' => array( $this->helper, 'handle_hide_rating' ),
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/optimize-images/', array(
				'methods'  => 'GET',
				'callback' => array( $this->helper, 'optimize_images' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/stop-images-optimization/', array(
				'methods'  => 'GET',
				'callback' => array( $this->helper, 'stop_images_optimization' ),
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/check-image-optimizing-status/', array(
				'methods'  => 'GET',
				'callback' => array( $this->helper, 'check_image_optimizing_status' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/reset-images-optimization/', array(
				'methods'  => 'GET',
				'callback' => array( $this->helper, 'reset_images_optimization' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/switch-php/', array(
				'methods'  => 'POST',
				'callback' => array( $this->helper, 'switch_php' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/enable-option/', array(
				'methods'  => 'POST',
				'callback' => array( $this->helper, 'enable_option_from_rest' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/disable-option/', array(
				'methods'  => 'POST',
				'callback' => array( $this->helper, 'disable_option_from_rest' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/update-excluded-urls/', array(
				'methods'  => 'POST',
				'callback' => array( $this->helper, 'update_excluded_urls' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/test-url-cache/', array(
				'methods'  => 'POST',
				'callback' => array( $this->helper, 'test_cache' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/purge-cache/', array(
				'methods'  => 'GET',
				'callback' => array( $this->helper, 'purge_cache_from_rest' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/fetch-options/', array(
				'methods'  => 'GET',
				'callback' => array( $this->helper, 'fetch_options' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/enable-memcache/', array(
				'methods'  => 'GET',
				'callback' => array( $this->helper, 'enable_memcache' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/disable-memcache/', array(
				'methods'  => 'GET',
				'callback' => array( $this->helper, 'disable_memcache' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/enable-ssl/', array(
				'methods'  => 'POST',
				'callback' => array( $this->helper, 'enable_ssl' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/disable-ssl/', array(
				'methods'  => 'POST',
				'callback' => array( $this->helper, 'disable_ssl' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/enable-multisite-optimization/', array(
				'methods'  => 'POST',
				'callback' => array( $this->helper, 'enable_multisite_optimization' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);

		register_rest_route(
			self::REST_NAMESPACE, '/disable-multisite-optimization/', array(
				'methods'  => 'POST',
				'callback' => array( $this->helper, 'disable_multisite_optimization' ),
<<<<<<< Updated upstream
				'permission_callback' => array( $this, 'check_permissions' ),
=======
>>>>>>> Stashed changes
			)
		);
	}
}
