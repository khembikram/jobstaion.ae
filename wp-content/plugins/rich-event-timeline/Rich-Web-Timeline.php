<?php
/*
Plugin Name: Rich Event Timeline
Plugin URI: https://rich-web.org/wp-event-timeline/
Description: Timeline plugin is fully responsive. Timeline Is awesome WordPress plugin with many useful features and effects.
Version: 1.1.6
Author: richteam
Author URI: https://rich-web.org
License: http://www.gnu.org/licenses/gpl-2.0.html
*/

add_action( 'widgets_init', 'Rich_Web_Timeline_Widget' );
function Rich_Web_Timeline_Widget() {
	register_widget( 'Rich_Web_Timeline_Widget' );
}
require_once( dirname( __FILE__ ) . '/Rich-Web-Timeline-Ajax.php' );
require_once( dirname( __FILE__ ) . '/Rich-Web-Timeline-Widget.php' );
require_once( dirname( __FILE__ ) . '/Rich-Web-Timeline-Shortcode.php' );
add_action( 'wp_enqueue_scripts', 'Rich_Web_Timeline_Style' );
function Rich_Web_Timeline_Style() {
	wp_register_script( 'Rich_Web_Timeline', plugins_url( '/Scripts/Rich-Web-Timeline-Scripts.js', __FILE__ ), array(
		'jquery',
		'jquery-effects-blind',
		'jquery-effects-bounce',
		'jquery-effects-clip',
		'jquery-effects-drop',
		'jquery-effects-explode',
		'jquery-effects-fade',
		'jquery-effects-fold',
		'jquery-effects-highlight',
		'jquery-effects-pulsate',
		'jquery-effects-scale',
		'jquery-effects-shake',
		'jquery-effects-slide',
		'jquery-effects-size',
		'jquery-effects-puff'
	) );
	wp_enqueue_script( 'Rich_Web_Timeline' );
	wp_enqueue_script( "jquery" );
	wp_register_style( 'fontawesome-TI-css', plugins_url( '/Style/Rich-Web-Icons.css', __FILE__ ) );
	wp_enqueue_style( 'fontawesome-TI-css' );
}

add_action( 'admin_init', 'Rich_Web_Timeline_Admin_Init' );
function Rich_Web_Timeline_Admin_Init() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_style( 'rich-web-timeline-admin-style', plugins_url( '/Style/Rich-Web-Timeline-Admin-Style.css', __FILE__ ) );
	wp_register_style( 'fontawesomeTI-css', plugins_url( '/Style/Rich-Web-Icons.css', __FILE__ ) );
	wp_enqueue_style( 'fontawesomeTI-css' );
}

add_action( 'admin_menu', 'Rich_Web_Timeline_Menu' );
function Rich_Web_Timeline_Menu() {
	add_menu_page( 'Rich-Web Timeline Admin', 'Timeline', 'manage_options', 'Rich-Web Timeline Admin', 'rich_web_timeline_manager', plugins_url( '/Images/rich-web-timeline-logo.png', __FILE__ ) );
	add_submenu_page( 'Rich-Web Timeline Admin', 'Rich-Web Timeline Admin', 'Timeline Manager', 'manage_options', 'Rich-Web Timeline Admin', 'rich_web_timeline_manager' );
	add_submenu_page( 'Rich-Web Timeline Admin', 'Rich-Web Timeline General', 'Timeline Options', 'manage_options', 'Rich-Web Timeline General', 'rich_web_timeline_general' );
	add_submenu_page( 'Rich-Web Timeline Admin', 'Rich-Web Products', 'Our Products', 'manage_options', 'Rich-Web Products', 'rich_web_timeline_products' );
}

function rich_web_timeline_manager() {
	wp_enqueue_script( 'rich-web-timeline-tinymce', plugins_url( '/Scripts/tinymce.js', __FILE__ ), array( 'jquery' ), null, true );
	wp_enqueue_script('jquery-ui');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script( 'rich-web-timeline-admin-scripts', plugins_url( '/Scripts/Rich-Web-Timeline-Admin-Scripts.js', __FILE__ ), array( 'jquery','rich-web-timeline-tinymce' ), null, true );
	wp_localize_script( 'rich-web-timeline-admin-scripts', 'object', array(
		'ajaxurl'           => admin_url( 'admin-ajax.php' ),
		'rw_timeline_nonce' => wp_create_nonce( 'rw_timeline_nonce' )
	) );
	require_once( dirname( __FILE__ ) . '/Rich-Web-Timeline-Admin-Manager.php' );
}

function rich_web_timeline_general() {
	wp_enqueue_script('jquery-ui');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script( 'rich-web-timeline-admin-scripts', plugins_url( '/Scripts/Rich-Web-Timeline-Admin-Scripts.js', __FILE__ ), array( 'jquery' ), null, true );
	wp_localize_script( 'rich-web-timeline-admin-scripts', 'object', array(
		'ajaxurl'           => admin_url( 'admin-ajax.php' ),
		'rw_timeline_nonce' => wp_create_nonce( 'rw_timeline_nonce' )
	) );
	require_once( dirname( __FILE__ ) . '/Rich-Web-Timeline-Admin-General.php' );
}

function rich_web_timeline_products() {
	require_once( dirname( __FILE__ ) . '/Rich-Web-Products.php' );
}

register_activation_hook( __FILE__, 'Rich_Web_Timeline_Activate' );
function Rich_Web_Timeline_Activate() {
	require_once( dirname( __FILE__ ) . '/Rich-Web-Timeline-Install.php' );
}

function Rich_Web_Timeline_Color() {
	wp_enqueue_script(
		'alpha-color-picker',
		plugins_url( '/Scripts/Rich-Web-Timeline-Alpha-Color-Picker.js', __FILE__ ),
		array( 'jquery', 'wp-color-picker' ), // You must include these here.
		null,
		true
	);
	wp_enqueue_style(
		'alpha-color-picker',
		plugins_url( '/Style/Rich-Web-Timeline-Alpha-Color-Picker.css', __FILE__ ),
		array( 'wp-color-picker' ) // You must include these here.
	);
}

add_action( 'admin_enqueue_scripts', 'Rich_Web_Timeline_Color' );
?>