<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Plugin class.
 *
 * The main class that initiates and runs the addon.
 *
 * @since 1.0.0
 */
final class TWAE_Free_Main {


	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the addon.
	 */
	const MINIMUM_PHP_VERSION = '5.6';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var \Elementor_Test_Addon\Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @return \Elementor_Test_Addon\Plugin An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * Perform some compatibility checks to make sure basic requirements are meet.
	 * If all compatibility checks pass, initialize the functionality.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', array( $this, 'init' ) );
			// Add a custom category for panel widgets
			add_action( 'elementor/init', array( $this, 'register_timeline_category' ) );
		}

	}
	public function register_timeline_category() {

			\Elementor\Plugin::$instance->elements_manager->add_category(
				'twae',              // the name of the category
				array(
					'title' => esc_html__( 'Timeline Widgets', 'twae' ),
					'icon'  => 'fa fa-header', // default icon
				),
				1 // position
			);
	}

	/**
	 * Compatibility Checks
	 *
	 * Checks whether the site meets the addon requirement.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function is_compatible() {

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return false;
		}

		return true;

	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'twae' ),
			'<strong>' . esc_html__( 'Timeline Widget Pro For Elementor', 'twae' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'twae' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Initialize
	 *
	 * Load the addons functionality only after Elementor is initialized.
	 *
	 * Fired by `elementor/init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {
		add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );

		if ( function_exists( 'is_plugin_active' ) ) {
			if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) ) {
				require_once TWAE_PATH . 'includes/class-twae-wpml-translation.php';
				add_filter( 'wpml_elementor_widgets_to_translate', array( $this, 'timeline_widgets_to_translate_filter' ) );
			};
		}

	}

	/**
	 * Register Widgets
	 *
	 * Load widgets files and register new Elementor widgets.
	 *
	 * Fired by `elementor/widgets/register` action hook.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets( $widgets_manager ) {
		require_once TWAE_PATH . 'widgets/twae-widget.php';
		$widgets_manager->register( new TWAE_Widget() );

	}

	/**
	 * Add wpml dependency.
	 *
	 * @param array $widget all elementor widgets.
	 */
	public function timeline_widgets_to_translate_filter( $widget ) {
		$widget['timeline-widget-addon'] = array(
			'conditions'        => array( 'widgetType' => 'timeline-widget-addon' ),
			'fields'            => array(),
			'integration-class' => 'TWAE_WPML_TRANSLATION',
		);

		return $widget;
	}

}
