<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'WPML_Elementor_Module_With_Items' ) && ! class_exists( 'TWAE_WPML_TRANSLATION' ) ) {
	/**
	 * Wpml translation widget register.
	 */
	class TWAE_WPML_TRANSLATION extends WPML_Elementor_Module_With_Items {
		/**
		 * Return widget repeater fields name.
		 *
		 * @return string
		 */
		public function get_items_field() {
			return 'twae_list';
		}

		/**
		 * Return widget fields name.
		 *
		 * @return array
		 */
		public function get_fields() {
			return array( 'twae_story_title', 'twae_description', 'twae_year', 'twae_date_label', 'twae_extra_label' );
		}

		/**
		 * @param string $field
		 *
		 * @return string
		 */
		protected function get_title( $field ) {
			switch ( $field ) {
				case 'twae_story_title':
					return esc_html__( 'Timeline: Title', 'twae' );

				case 'twae_description':
					return esc_html__( 'Timeline: Desc', 'twae' );

				case 'twae_year':
					return esc_html__( 'Timeline: Year', 'twae' );

				case 'twae_date_label':
					return esc_html__( 'Timeline: Label', 'twae' );

				case 'twae_extra_label':
					return esc_html__( 'Timeline: Sub Label', 'twae' );

				default:
					return '';
			}
		}

		/**
		 * @param string $field
		 *
		 * @return string
		 */
		protected function get_editor_type( $field ) {
			switch ( $field ) {
				case 'twae_story_title':
					return 'LINE';

				case 'twae_description':
					return 'VISUAL';

				case 'twae_year':
					return 'LINE';

				case 'twae_date_label':
					return 'LINE';

				case 'twae_extra_label':
					return 'LINE';

				default:
					return '';
			}
		}

	}
}
