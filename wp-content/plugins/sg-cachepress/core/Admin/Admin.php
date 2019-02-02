<?php
namespace SiteGround_Optimizer\Admin;

use SiteGround_Optimizer;

use SiteGround_Optimizer\Admin\Admin_Bar;
use SiteGround_Optimizer\Rest\Rest;
use SiteGround_Optimizer\Htaccess\Htaccess;
use SiteGround_Optimizer\Helper\Helper;
use SiteGround_Optimizer\Multisite\Multisite;
use SiteGround_Optimizer\Modules\Modules;

/**
 * Handle all hooks for our custom admin page.
 */
class Admin {

	/**
	 * The constructor.
	 */
	public function __construct() {
		$this->modules = new Modules();
<<<<<<< Updated upstream
		$admin_bar     = new Admin_Bar();

		add_action( 'wp_ajax_admin_bar_purge_cache', array( $admin_bar, 'purge_cache' ) );
=======
>>>>>>> Stashed changes

		// Bail if there is nothing to display.
		if ( empty( $this->modules->get_active_tabs() ) ) {
			return;
		}

		if ( is_network_admin() ) {
			add_action( 'network_admin_menu', array( $this, 'add_plugin_admin_menu' ) );
<<<<<<< Updated upstream
=======
			new Admin_Bar();
>>>>>>> Stashed changes
		}

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'plugins_loaded', array( $this, 'hide_errors_and_notices' ) );

		if ( ! $this->is_multisite_without_permissions() ) {
			add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );
<<<<<<< Updated upstream
			// add_action( 'admin_notices', array( $this, 'memcache_notice' ) );
			add_action( 'wp_ajax_dismiss_memcache_notice', array( $this, 'hide_memcache_notice' ) );
			add_action( 'wp_ajax_dismiss_blocking_plugins_notice', array( $this, 'hide_blocking_plugins_notice' ) );
			add_action( 'wp_ajax_dismiss_cache_plugins_notice', array( $this, 'hide_cache_plugins_notice' ) );
=======
			add_action( 'admin_notices', array( $this, 'memcache_notice' ) );
			add_action( 'wp_ajax_dismiss_memcache_notice', array( $this, 'hide_memcache_notice' ) );
			add_action( 'wp_ajax_dismiss_blocking_plugins_notice', array( $this, 'hide_blocking_plugins_notice' ) );
			add_action( 'wp_ajax_dismiss_cache_plugins_notice', array( $this, 'hide_cache_plugins_notice' ) );

			if ( ! is_network_admin() ) {
				new Admin_Bar();
			}
>>>>>>> Stashed changes
		}

	}

	/**
	 * Check if it's a multisite, but the single site
	 * has no permisions to edit optimizer settings.
	 *
	 * @since  5.0.0
	 *
	 * @return boolean True if there are no permissions, false otherwise.
	 */
	private function is_multisite_without_permissions() {
		if (
			is_multisite() &&
			0 === (int) get_site_option( 'siteground_optimizer_supercacher_permissions', 0 ) &&
			0 === (int) get_site_option( 'siteground_optimizer_frontend_permissions', 0 ) &&
			0 === (int) get_site_option( 'siteground_optimizer_images_permissions', 0 ) &&
			0 === (int) get_site_option( 'siteground_optimizer_environment_permissions', 0 )
		) {

			return true;
		}

		return false;
	}

	/**
	 * Hide all errors and notices on our custom dashboard.
	 *
	 * @since  1.0.0
	 */
	public function hide_errors_and_notices() {
		// Hide all error in our page.
		if (
			isset( $_GET['page'] ) &&
			'sg-cachepress' === $_GET['page']
		) {
			remove_all_actions( 'network_admin_notices' );
			remove_all_actions( 'user_admin_notices' );
			remove_all_actions( 'admin_notices' );
			remove_all_actions( 'all_admin_notices' );

			error_reporting( 0 );
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since 5.0.0
	 */
	public function enqueue_styles() {
		// Bail if we are on different page.
		if ( false === $this->is_optimizer_page() ) {
			return;
		}

		wp_enqueue_style(
			'siteground-optimizer-admin',
			\SiteGround_Optimizer\URL . '/assets/css/main.css',
			array(),
			\SiteGround_Optimizer\VERSION,
			'all'
		);

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since 5.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script(
			'siteground-optimizer-dashboard',
			\SiteGround_Optimizer\URL . '/assets/js/admin.js',
			array( 'jquery' ), // Dependencies.
			\SiteGround_Optimizer\VERSION,
			true
		);

		// Bail if we are on different page.
		if ( false === $this->is_optimizer_page() ) {
			return;
		}

		// Enqueue the optimizer script.
		wp_enqueue_script(
			'siteground-optimizer-admin',
			\SiteGround_Optimizer\URL . '/assets/js/optimizer.bundle.js',
			array( 'jquery' ), // Dependencies.
			\SiteGround_Optimizer\VERSION,
			true
		);

		$data = array(
			'rest_base'          => untrailingslashit( get_rest_url( null, Rest::REST_NAMESPACE ) ),
<<<<<<< Updated upstream
			'home_url'           => Helper::get_home_url(),
=======
			'home_url'           => home_url( '/' ),
>>>>>>> Stashed changes
			'php_version'        => Htaccess::get_instance()->get_php_version(),
			'is_cron_disabled'   => Helper::is_cron_disabled(),
			'modules'            => $this->modules->get_active_modules(),
			'tabs'               => $this->modules->get_active_tabs(),
			'locale'             => Helper::get_i18n_data_json(),
			'should_flush_cache' => $this->should_flush_cache(),
			'localeSlug'         => join( '-', explode( '_', \get_user_locale() ) ),
<<<<<<< Updated upstream
			'wp_nonce'           => wp_create_nonce( 'wp_rest' ),
=======
>>>>>>> Stashed changes
			'config'             => array(
				'iconsPath' => SiteGround_Optimizer\URL . '/assets/images/svg',
			),
			'network_settings'   => array(
				'is_network_admin' => intval( is_network_admin() ),
				'is_multisite'     => intval( is_multisite() ),
			),
		);

		wp_localize_script( 'siteground-optimizer-admin', 'optimizerData', $data );
	}

	/**
	 * Check whether to flush the redux cache.
	 *
	 * @since  5.0.0
	 *
	 * @return bool True|False
	 */
	public function should_flush_cache() {
		$should_flush_cache = get_option( 'siteground_optimizer_flush_redux_cache', 0 );

		if ( 1 === (int) $should_flush_cache ) {
			delete_option( 'siteground_optimizer_flush_redux_cache' );

			return 1;
		}

		return 0;
	}

	/**
	 * Hide the global memcache notice.
	 *
	 * @since  5.0.0
	 */
	public function hide_memcache_notice() {
		update_option( 'siteground_optimizer_memcache_notice', 0 );
<<<<<<< Updated upstream
		update_site_option( 'siteground_optimizer_memcache_notice', 0 );
=======
>>>>>>> Stashed changes
	}

	/**
	 * Hide the global blocking plugins notice.
	 *
	 * @since  5.0.0
	 */
	public function hide_blocking_plugins_notice() {
		update_option( 'siteground_optimizer_blocking_plugins_notice', 0 );
<<<<<<< Updated upstream
		update_site_option( 'siteground_optimizer_blocking_plugins_notice', 0 );
=======
>>>>>>> Stashed changes
	}

	/**
	 * Hide the global cache plugins notice.
	 *
	 * @since  5.0.0
	 */
	public function hide_cache_plugins_notice() {
		update_option( 'siteground_optimizer_cache_plugins_notice', 0 );
<<<<<<< Updated upstream
		update_site_option( 'siteground_optimizer_cache_plugins_notice', 0 );
=======
>>>>>>> Stashed changes
	}


	/**
	 * Display admin error when the memcache is disabled.
	 *
	 * @since  5.0.0
	 */
	public function memcache_notice() {
		// Get the option.
<<<<<<< Updated upstream
		$show_notice = (int) get_site_option( 'siteground_optimizer_memcache_notice', 0 );
=======
		$show_notice = (int) get_option( 'siteground_optimizer_memcache_notice', 0 );
>>>>>>> Stashed changes

		// Bail if the current user is not admin or if we sholdn't  display notice.
		if (
			! is_admin() ||
			0 === $show_notice ||
<<<<<<< Updated upstream
			$this->is_optimizer_page() ||
			! current_user_can( 'administrator' )
=======
			$this->is_optimizer_page()
>>>>>>> Stashed changes
		) {
			return;
		}

		$class = 'notice notice-error';
		$message = __( 'SG Optimizer has detected that Memcached was turned off. If you want to use it, please enable it from cPanel first.', 'sg-cachepress' );

		printf(
			'<div class="%1$s" style="position: relative"><p>%2$s</p><button type="button" class="notice-dismiss dismiss-memcache-notice" data-link="%3$s"><span class="screen-reader-text">Dismiss this notice.</span></button></div>',
			esc_attr( $class ),
			esc_html( $message ),
			admin_url( 'admin-ajax.php?action=dismiss_memcache_notice' )
		);
	}

	/**
	 * Register the top level page into the WordPress admin menu.
	 *
	 * @since 5.0.0
	 */
	public function add_plugin_admin_menu() {
		$page = \add_menu_page(
			__( 'SG Optimizer', 'sg-cachepress' ), // Page title.
			__( 'SG Optimizer', 'sg-cachepress' ), // Menu item title.
			'manage_options',
			\SiteGround_Optimizer\PLUGIN_SLUG,   // Page slug.
			array( $this, 'render' ),
			\SiteGround_Optimizer\URL . '/assets/images/logo-white.svg'
		);
	}

	/**
	 * Display the admin page.
	 *
	 * @since  5.0.0
	 */
	public function render() {
		// Include the partial.
		include \SiteGround_Optimizer\DIR . '/partials/admin-page.php';
	}


	/**
	 * Check if this is the Optimizer page.
	 *
	 * @since  5.0.0
	 *
	 * @return bool True/False
	 */
	public static function is_optimizer_page() {
		$current_screen = \get_current_screen();

		if (
			'toplevel_page_sg-cachepress' !== $current_screen->id &&
			'toplevel_page_sg-cachepress-network' !== $current_screen->id
		) {
			return false;
		}

		return true;
	}

	/**
	 * Adds a purge buttion in the admin bar menu.
	 *
	 * @param (WP_Admin_Bar) $wp_admin_bar WP_Admin_Bar instance, passed by reference.
	 *
	 * @since 5.0.0
	 */
	public function add_admin_bar_purge( $wp_admin_bar ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$args = array(
			'id'    => 'SG_CachePress_Supercacher_Purge',
			'title' => __( 'Purge SG Cache', 'sg-cachepress' ),
			'href'  => wp_nonce_url( admin_url( 'admin-post.php?action=sg-cachepress-purge' ), 'sg-cachepress-purge' ),
			'meta'  => array( 'class' => 'sg-cachepress-admin-bar-purge' ),
		);

		$wp_admin_bar->add_node( $args );
	}
}
