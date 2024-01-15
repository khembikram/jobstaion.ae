<?php
/**
 * Plugin Name: Timeline Widget For Elementor
 * Description: Best timeline widget for Elementor page builder to showcase your personal or business stories in beautiful vertical or horizontal timeline layouts. <strong>[Elementor Addon]</strong>
 * Plugin URI:  https://coolplugins.net
 * Version:     1.5.2
 * Author:      Cool Plugins
 * Author URI:  https://coolplugins.net/
 * Text Domain: twae
 * Elementor tested up to: 3.17.2
 * Elementor Pro tested up to: 3.17.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( defined( 'TWAE_VERSION' ) ) {
	return;
}

define( 'TWAE_VERSION', '1.5.2' );
define( 'TWAE_FILE', __FILE__ );
define( 'TWAE_PATH', plugin_dir_path( TWAE_FILE ) );
define( 'TWAE_URL', plugin_dir_url( TWAE_FILE ) );
define( 'TWAE_BUY_PRO_LINK', 'https://coolplugins.net/product/elementor-timeline-widget-pro-addon/?utm_source=twae_plugin&utm_medium=inside&utm_campaign=get_pro' );

register_activation_hook( TWAE_FILE, array( 'Timeline_Widget_Addon', 'twae_activate' ) );
register_deactivation_hook( TWAE_FILE, array( 'Timeline_Widget_Addon', 'twae_deactivate' ) );

/**
 * Class Timeline_Widget_Addon
 */
final class Timeline_Widget_Addon {


	/**
	 * Plugin instance.
	 *
	 * @var Timeline_Widget_Addon
	 * @access private
	 */
	private static $instance = null;

	/**
	 * Get plugin instance.
	 *
	 * @return Timeline_Widget_Addon
	 * @static
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * @access private
	 */
	private function __construct() {
		// Load the plugin after Elementor (and other plugins) are loaded.
		add_action( 'plugins_loaded', array( $this, 'twae_plugins_loaded' ) );
		add_action( 'plugins_loaded', array( $this, 'twae_load_addon' ) );
	}


	/**
	 * Code you want to run when all other plugins loaded.
	 */
	function twae_plugins_loaded() {

		// Notice if the Elementor is not active
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'twae_fail_to_load' ) );
			return;
		}
		load_plugin_textdomain( 'twae', false, TWAE_FILE . 'languages' );

		// Require the main plugin file
		// require( __DIR__ . '/includes/class-twae.php' );
		if ( is_admin() ) {
			/*** Plugin review notice file */
			require_once __DIR__ . '/admin/twae-feedback-notice.php';
			new TWAEFeedbackNotice();
			require_once __DIR__ . '/admin/feedback/twae-admin-feedback-form.php';
			require_once __DIR__ . '/admin/admin-notices.php';
		}

		if ( is_admin() ) {
			add_action( 'admin_init', array( $this, 'twae_show_upgrade_notice' ) );
		}
	}   // end of ctla_loaded()


	function twae_load_addon() {
		// Load plugin file
		require_once TWAE_PATH . '/includes/class-twae-free-main.php';
		// Run the plugin
		TWAE_Free_Main::instance();

	}

	public function twae_show_upgrade_notice() {
		if ( get_option( 'twae-v' ) != false ) {
			twae_free_create_admin_notice(
				array(
					'id'      => 'twae-upgrade-notices',
					'message' => '<strong>Major Update Notice!</strong> Please update your timeline widget settings if you face any style issue after an update of <strong>Timeline Widget for Elementor</strong>.',
				)
			);
		}
	}

	function twae_fail_to_load() {

		if ( ! is_plugin_active( 'elementor/elementor.php' ) ) : ?>
			<div class="notice notice-warning is-dismissible">
				<p><?php echo sprintf( __( '<a href="%s"  target="_blank" >Elementor Page Builder</a>  must be installed and activated for "<strong>Timeline Widget Addon For Elementor</strong>" to work' ), 'https://wordpress.org/plugins/elementor/' ); ?></p>
			</div>
			<?php
		endif;

	}

	/**
	 * Run when activate plugin.
	 */
	public static function twae_activate() {
		update_option( 'twae-free-v', TWAE_VERSION );
		update_option( 'twae-type', 'FREE' );
		update_option( 'twae-installDate', date( 'Y-m-d h:i:s' ) );
	}

	/**
	 * Run when deactivate plugin.
	 */
	public static function twae_deactivate() {
	}
}

function Timeline_Widget_Addon() {
	return Timeline_Widget_Addon::get_instance();
}

$GLOBALS['Timeline_Widget_Addon'] = Timeline_Widget_Addon();
