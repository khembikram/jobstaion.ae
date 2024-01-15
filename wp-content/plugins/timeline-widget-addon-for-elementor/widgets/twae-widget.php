<?php
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Controls_Manager;
// use Elementor\Scheme_Color;
use Elementor\Core\Schemes\Global_Colors;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
// use Elementor\Scheme_Typography;

class TWAE_Widget extends \Elementor\Widget_Base {

	public function __construct( $data = array(), $args = null ) {

		parent::__construct( $data, $args );
		// run hook on page save and update status
		add_action( 'elementor/editor/after_save', array( $this, 'twae_update_migration_status' ), 10, 2 );

		$min_v = true;
		$ext   = '.css';
		if ( $min_v == true ) {
			$ext = '.min.css';
		}
		wp_register_style( 'twae-vertical-timeline', TWAE_URL . 'assets/css/twae-vertical-timeline' . $ext, array(), TWAE_VERSION, 'all' );

		wp_register_style( 'twae-common-styles', TWAE_URL . 'assets/css/twae-common-styles' . $ext, array(), TWAE_VERSION, 'all' );

		wp_register_style( 'twae-horizontal-timeline', TWAE_URL . 'assets/css/twae-horizontal-timeline' . $ext, array(), TWAE_VERSION, 'all' );

		wp_register_style( 'font-awesome-5-all', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/all' . $ext, array(), TWAE_VERSION, 'all' );// load elementor fontawesome
		wp_register_script( 'twae-horizontal-js', TWAE_URL . 'assets/js/twae-horizontal.min.js', array( 'elementor-frontend', 'jquery' ), TWAE_VERSION, true );

		 // load helper functions

		 require_once TWAE_PATH . '/includes/twae-functions.php';

	}

	public function get_script_depends() {
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			return array( 'twae-horizontal-js' );
		}
		 $settings = $this->get_settings_for_display();
		$layout    = $settings['twae_layout'];
		if ( $layout == 'horizontal' ) {
			return array( 'twae-horizontal-js' );
		} else {
			return array();
		}
		return array( 'twae-horizontal-js' );
	}

	public function get_style_depends() {

		return array( 'twae-vertical-timeline', 'twae-common-styles', 'twae-horizontal-timeline', 'font-awesome-5-all' );
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			return array( 'twae-vertical-timeline', 'twae-common-styles', 'twae-horizontal-timeline', 'font-awesome-5-all' );
		}
		$settings = $this->get_settings_for_display();
		$layout   = $settings['twae_layout'];
		$styles   = array( 'font-awesome-5-all', 'twae-common-styles' );
		if ( $layout == 'horizontal' ) {
			array_push( $styles, 'twae-horizontal-timeline' );
		} else {
			array_push( $styles, 'twae-vertical-timeline' );
		}
		return $styles;

	}

	public function get_name() {
		return 'timeline-widget-addon';
	}

	public function get_title() {
		return __( 'Story Timeline', 'twae' );
	}

	public function get_icon() {
		return 'eicon-time-line';
	}

	public function get_categories() {
		return array( 'twae' );
	}
	protected function register_controls() {
		$this->content_controls();

		/* ----------------------------- Layout Settings ---------------------------- */
		$this->start_controls_section(
			'twae_layout_section',
			array(
				'label' => __( 'Layout Settings', 'twae1' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		// Select Layout
		$this->add_control(
			'twae_layout',
			array(
				'label'   => __( 'Layout', 'twae1' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'centered',
				'options' => array(
					'centered'   => 'Vertical (Right / Left)',
					'one-sided'  => 'Vertical (Right Only)',
					'horizontal' => 'Horizontal',
				),
			)
		);
		// Story Content Alignment
		$this->add_control(
			'content-alignment',
			array(
				'label'     => esc_html__( 'Content Alignment', 'twae' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'twae' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'twae' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'twae' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-cbx-text-align: {{VALUE}};',
				),
			)
		);
		// Story Content Alternate Alignment
		$this->add_control(
			'content-alignment_alternate',
			array(
				'label'     => esc_html__( 'Content Alignment (Left)', 'twae' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'twae' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'twae' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'twae' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'right',
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-cbx-text-align-alternate: {{VALUE}};',
				),
				'condition' => array(
					'twae_layout' => array(
						'centered',
					),
				),
			)
		);
		// Icon Box Position
		$this->add_responsive_control(
			'twae_icon_position',
			array(
				'label'       => __( 'Icon / Labels Position', 'twae1' ),
				'type'        => \Elementor\Controls_Manager::SLIDER,
				'render_type' => 'template',
				'range'       => array(
					'px' => array(
						'min'  => 1,
						'max'  => 100,
						'step' => 2,
					),
				),
				'devices'     => array( 'desktop', 'tablet', 'mobile' ),
				'selectors'   => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-ibx-position: {{SIZE}};',
				),
				/*
				'condition'   => [
					'twae_layout'   => [
						'centered','one-sided'
						],
				],*/
			)
		);

		// Horizontal Slides Settings
		$this->add_control(
			'twae_horizontal_slides',
			array(
				'label'     => esc_html__( '🔶 Horizontal Slides', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => array(
					'twae_layout' => 'horizontal',
				),
			)
		);
		// Slides to Show
		$this->add_control(
			'twae_slides_to_show',
			array(
				'label'     => esc_html__( 'Slides To Show', 'twea1' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 2,
				'options'   => array(
					1 => esc_html__( '1 Slide', 'twae1' ),
					2 => esc_html__( '2 Slides', 'twae1' ),
					3 => esc_html__( '3 Slides', 'twae1' ),
					4 => esc_html__( '4 Slides', 'twae1' ),
					5 => esc_html__( '5 Slides', 'twae1' ),
					6 => esc_html__( '6 Slides', 'twae1' ),
				),
				'condition' => array(
					'twae_layout' => 'horizontal',
				),
			)
		);
		// Horizontal Slides Autoplay
		$this->add_control(
			'twae_autoplay',
			array(
				'label'     => __( 'Autoplay', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'false',
				'options'   => array(
					'true'  => 'True',
					'false' => 'False',
				),
				'condition' => array(
					'twae_layout' => array(
						'horizontal',
					),
				),
			)
		);
		// Horizontal Equal Height Slides
		$this->add_control(
			'twae_slides_height',
			array(
				'label'       => __( 'Slides Height', 'twae1' ),
				'description' => __( 'Make all slides the same height based on the tallest slide', 'twae1' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => 'no-height',
				'options'     => array(
					'auto-height' => 'Equal Height',
					'no-height'   => 'Auto',
				),
				'condition'   => array(
					'twae_layout' => 'horizontal',
				),
			)
		);
		// Horizontal Layout [PRO]
		$this->add_control(
			'pro_layout_horizontal_settings',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=layout_settings">
							<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/layout-h-settings.png"></a>',
				'content_classes' => 'twae_pro_content',
				'condition'       => array(
					'twae_layout' => 'horizontal',
				),
			)
		);
		// Vertical Layout [PRO]
		$this->add_control(
			'pro_layout_settings',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=layout_settings">
							<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/layout-settings.png">
							</a>',
				'content_classes' => 'twae_pro_content',
				'separator'       => 'before',
				'condition'       => array(
					'twae_layout!' => 'horizontal',
				),
			)
		);

		// Layout Section End
		$this->end_controls_section();
		$this->twae_line_settings();
		$this->story_icon_style_settings();
		$this->story_yld_settings();
		$this->twae_cbox_settings();
		$this->twae_storycontent_settings();
		$this->story_pro_style_settings();
	}
	// for frontend
	protected function render() {

		$settings             = $this->get_settings_for_display();
		$layout               = $settings['twae_layout'];
		$data                 = $settings['twae_list'];
		$compatibility_styles = '';
		$story_styles         = '';
		$timeline_style       = '';
		$timeline_layout      = '';
		global $post;
		$post_id   = $post->ID;
		$widget_id = $this->get_id();
		$countItem = 1;
		$isRTL     = is_rtl();
		$dir       = '';
		if ( $isRTL ) {
			$dir = 'rtl';
		}

		// run code only for old users
		if ( get_option( 'twae-v' ) != false ) {
			global $post;
			$post_id = $post->ID;
			// delete_post_meta($post_id, 'twae_style_migration');
			if ( ! get_post_meta( $post_id, 'twae_style_migration', true ) ) {
				update_post_meta( $post_id, 'twae_exists', 'yes' );
				$compatibility_styles .= $this->older_v_compatibility( $post_id, $settings, $timeline_style );
			}
		}

		if ( $layout == 'horizontal' ) {

			$timeline_layout_wrapper = 'twae-horizontal-timeline';

				require TWAE_PATH . 'widgets/frontend-layouts/twae-horizontal-timeline.php';

		} else {
			$timeline_layout_wrapper = 'twae-both-sided';
			if ( $layout == 'one-sided' ) {
				$timeline_layout_wrapper = 'twae-vertical-right';
			}
			require TWAE_PATH . 'widgets/frontend-layouts/twae-vertical-timeline.php';
		}

			$compatibility_styles .= $story_styles;
			echo '<style type="text/css">' . $compatibility_styles . '</style>';

	}



	/**
	 * update some settings when user saves Elementor data.
	 *
	 * @since 1.0.0
	 * @param int   $post_id     The ID of the post.
	 * @param array $editor_data The editor data.
	 */
	function twae_update_migration_status( $post_id, $editor_data ) {

		if ( get_option( 'twae-v' ) != false ) {
			if ( get_post_meta( $post_id, 'twae_exists', true ) ) {
				update_post_meta( $post_id, 'twae_style_migration', 'done' );
				update_option( 'twae-migration-status', 'done' );
				return;
			}
		}
	}
	// compatibility for < 1.3 versions
	function older_v_compatibility( $post_id, $settings, $timeline_style ) {
		$custom_styles  = '';
		$widgetID       = '.elementor-' . $post_id . ' .elementor-element.elementor-element-' . $this->get_id();
		$selector       = $widgetID . ' .twae-wrapper';
		$typo_index     = '_typography';
		$custom_styles .= $selector . '.twae-vertical .twae-story{margin-bottom:60px!important}';

		if ( isset( $settings['twae_story_title_color'] ) && $settings['twae_story_title_color'] != '' ) {
			$custom_styles .= $selector . '{--tw-cbx-title-color:' . $settings['twae_story_title_color'] . ';}';
		}
		if ( isset( $settings['twae_date_label_color'] ) && $settings['twae_date_label_color'] != '' ) {
			$custom_styles .= $selector . '{--tw-lbl-big-color:' . $settings['twae_date_label_color'] . ';}';
		}
		if ( isset( $settings['twae_extra_label_color'] ) && $settings['twae_extra_label_color'] != '' ) {
			$custom_styles .= $selector . '{--tw-lbl-small-color:' . $settings['twae_extra_label_color'] . ';}';
		}

		if ( isset( $settings['twae_description_color'] ) && $settings['twae_description_color'] != '' ) {
			$custom_styles .= $selector . '{--tw-cbx-des-color:' . $settings['twae_description_color'] . ';}';
		}
		if ( isset( $settings['twae_icon_bgcolor'] ) && $settings['twae_icon_bgcolor'] != '' ) {
			$custom_styles .= $selector . '{--tw-ibx-bg:' . $settings['twae_icon_bgcolor'] . ';}';
		}
		if ( isset( $settings['twae_year_label_color'] ) && $settings['twae_year_label_color'] != '' ) {
			$custom_styles .= $selector . '{--tw-ybx-text-color:' . $settings['twae_year_label_color'] . '}';
		}
		if ( isset( $settings['twae_year_label_bgcolor'] ) && $settings['twae_year_label_bgcolor'] != '' ) {
			$custom_styles .= $selector . '{--tw-ybx-bg:' . $settings['twae_year_label_bgcolor'] . '}';
			$custom_styles .= $selector . ' .twae-year{background:none!important;}';
		}
		if ( isset( $settings['twae_story_bgcolor'] ) && $settings['twae_story_bgcolor'] != '' ) {
			$custom_styles .= $selector . '{--tw-cbx-bg:' . $settings['twae_story_bgcolor'] . '}';
		}
		if ( isset( $settings['twae_line_color'] ) && $settings['twae_line_color'] != '' ) {
			$custom_styles .= $selector . '{--tw-line-bg:' . $settings['twae_line_color'] . '}';
		}
		if ( isset( $settings['twae_border'] ) && $settings['twae_border'] == '' ) {
			$custom_styles .= $selector . '{ 
			--tw-cbx-bd-top-width: 0px;
			--tw-cbx-bd-right-width: 0px;
			--tw-cbx-bd-bottom-width: 0px;
			--tw-cbx-bd-left-width:0px;
			}';
		}

		$title_key = 'twae_title_typography';
		if ( isset( $settings[ $title_key . $typo_index ] ) &&
		$settings[ $title_key . $typo_index ] == 'custom' ) {
			$title_styles   = $this->get_typography_settings( $title_key, $settings );
			$custom_styles .= $widgetID . ' .twae-title{' . $title_styles . '}';
		}
		$label_key = 'twae_label_typography';
		if ( isset( $settings[ $label_key . $typo_index ] ) &&
		$settings[ $label_key . $typo_index ] == 'custom' ) {
			$label_styles   = $this->get_typography_settings( $label_key, $settings );
			$custom_styles .= $widgetID . ' .twae-label-big{' . $label_styles . '}';
			if ( isset( $settings[ $label_key . '_font_size' ]['size'] ) ) {
				$custom_styles .= $widgetID . ' .twae-wrapper{--tw-lbl-big-size:' . $settings[ $label_key . '_font_size' ]['size'] . '' . $settings[ $label_key . '_font_size' ]['unit'] . '}';
			}
		}
		$sub_label_key = 'twae_extra_label_typography';
		if ( isset( $settings[ $sub_label_key . $typo_index ] ) &&
		$settings[ $sub_label_key . $typo_index ] == 'custom' ) {
			$sublabel_styles = $this->get_typography_settings( $sub_label_key, $settings );
			$custom_styles  .= $widgetID . ' .twae-label-small{' . $sublabel_styles . '}';
			if ( isset( $settings[ $sub_label_key . '_font_size' ]['size'] ) ) {
				$custom_styles .= $widgetID . ' .twae-wrapper{--tw-lbl-small-size:' . $settings[ $sub_label_key . '_font_size' ]['size'] . '' . $settings[ $sub_label_key . '_font_size' ]['unit'] . '}';
			}
		}
		$desc_key = 'twae_description_typography';
		if ( isset( $settings[ $desc_key . $typo_index ] ) &&
		$settings[ $desc_key . $typo_index ] == 'custom' ) {
			$desc_styles    = $this->get_typography_settings( $desc_key, $settings );
			$custom_styles .= $widgetID . ' .twae-description{' . $desc_styles . '}';
		}
		$year_key = 'twae_year_typography';
		if ( isset( $settings[ $year_key . $typo_index ] ) &&
		$settings[ $year_key . $typo_index ] == 'custom' ) {
			$desc_styles    = $this->get_typography_settings( $year_key, $settings );
			$custom_styles .= $widgetID . '.twae-year{' . $desc_styles . '}';
		}
		if ( ! empty( $custom_styles ) ) {
			return $custom_styles;

		} else {
			return false;
		}
	}

	// get an older version style settings
	function get_typography_settings( $key, $all_settings ) {
		$fields    = array(
			'font_family',
			'font_size',
			'font_weight',
			'text_transform',
			'font_style',
			'text_decoration',
			'line_height',
			'letter_spacing',
			'word_spacing',
		);
		$field_css = '';
		foreach ( $fields as $field ) {
			$index     = $key . '_' . $field;
			$attribute = str_replace( '_', '-', $field );
			if ( isset( $all_settings[ $index ] ) && $all_settings[ $index ] !== '' ) {
				if ( is_array( $all_settings[ $index ] ) ) {
					if ( $all_settings[ $index ]['size'] !== '' ) {
						$unit       = $all_settings[ $index ]['unit'];
						$size       = $all_settings[ $index ]['size'];
						$field_css .= $attribute . ':' . $size . $unit . ';';
					}
				} else {
					$field_css .= $attribute . ':' . $all_settings[ $index ] . ';';
				}
			}
		}
		return $field_css;
	}



	/* --------------------------- Add Story Repeater --------------------------- */
	function content_controls() {
		// Add Timeline Stories Section
		$this->start_controls_section(
			'twae_content_section',
			array(
				'label' => __( 'Timeline Stories', 'twae1' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		// Story Repeater
		$repeater = new \Elementor\Repeater();
		// Story Tabs - START
		$repeater->start_controls_tabs(
			'twae_story_tabs'
		);

		// Story Tab - Content - START
		$repeater->start_controls_tab(
			'twae_content_tab',
			array(
				'label' => __( 'Content', 'twae1' ),
			)
		);
		// Story Year / Label Show/Hide
		$repeater->add_control(
			'twae_show_year_label',
			array(
				'label'        => __( 'Year / Label (Top)', 'twae1' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'twae1' ),
				'label_off'    => __( 'Hide', 'twae1' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'separator'    => 'before',
			)
		);
		// Story Year / Label Text
		$repeater->add_control(
			'twae_year',
			array(
				'label'     => __( 'Year / Label Text', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default'   => '2022',
				'condition' => array(
					'twae_show_year_label' => array(
						'yes',
					),
				),
			)
		);
		// Story Label / Date
		$repeater->add_control(
			'twae_date_label',
			array(
				'label'   => __( 'Label / Date', 'twae1' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'March 30',
			)
		);
		// Story Sub Label Text
		$repeater->add_control(
			'twae_extra_label',
			array(
				'label'   => __( 'Sub Label', 'twae1' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => 'Sub Label',
			)
		);
		// Story Title
		$repeater->add_control(
			'twae_story_title',
			array(
				'label'       => __( 'Title', 'twae1' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => 'Add Title Here',
				'label_block' => true,
				'separator'   => 'before',
			)
		);
		// Story Media
		$repeater->add_control(
			'twae_media',
			array(
				'label'     => __( 'Choose Media', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'separator' => 'before',
				'options'   => array(
					'image'     => array(
						'title' => __( 'Image', 'twae1' ),
						'icon'  => 'fa fa-image',
					),
					'video'     => array(
						'title' => __( 'Video', 'twae1' ),
						'icon'  => 'fa fa-video',
					),
					'slideshow' => array(
						'title' => __( 'Slideshow', 'twae1' ),
						'icon'  => 'fa fa-images',
					),
				),
				'default'   => 'image',
				'toggle'    => true,
			)
		);
		// Story Media - Image
		$repeater->add_control(
			'twae_image',
			array(
				'label'       => __( 'Choose Image', 'twae1' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'description' => __( 'Image Size will not work with default image', 'twae1' ),
				'default'     => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
				'condition'   => array(
					'twae_media' => array(
						'image',
					),
				),

			)
		);
		// Story Media - Image Size
		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'        => 'twae_thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'separator'   => 'none',
				'default'     => 'large',
				'description' => __( 'Image Size will not work with dummy image.', 'twae1' ),
				'exclude'     => array( 'custom' ),
				'condition'   => array(
					'twae_media' => array(
						'image',
					),
				),
			)
		);
		// Story Media - Slideshow [PRO]
		$repeater->add_control(
			'twae_pro_slideshow',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=story_content_settings">
							<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/slideshow-settings.png"></a>',
				'content_classes' => 'twae_pro_content',
				'condition'       => array(
					'twae_media' => array(
						'slideshow',
					),
				),
			)
		);
		// Story Media - Youtube [PRO]
		$repeater->add_control(
			'twae_pro_yt',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=story_content_settings">
							<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/youtube-settings.png"></a>',
				'content_classes' => 'twae_pro_content',
				'condition'       => array(
					'twae_media' => array(
						'video',
					),
				),
			)
		);
		// Story Description
		$repeater->add_control(
			'twae_description',
			array(
				'label'     => __( 'Description', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::WYSIWYG,
				'default'   => 'Add Description Here',
				'separator' => 'before',
			)
		);
		// Story Tab - Content - END
		$repeater->end_controls_tab();

		// Story Tab - Advanced - START
		$repeater->start_controls_tab(
			'twae_advanced_tab',
			array(
				'label' => __( 'Advanced', 'twae1' ),
			)
		);
		// Story Icon Type
		$repeater->add_control(
			'twae_icon_type',
			array(
				'label'     => __( 'Icon Type', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'separator' => 'before',
				'options'   => array(
					'icon'       => array(
						'title' => __( 'Icon', 'twae1' ),
						'icon'  => 'fab fa-font-awesome',
					),
					'customtext' => array(
						'title' => __( 'Text', 'twae1' ),
						'icon'  => 'fa fa-list-ol',
					),
					'image'      => array(
						'title' => __( 'Image', 'twae1' ),
						'icon'  => 'fa fa-images',
					),
					'dot'        => array(
						'title' => __( 'Dot', 'twae1' ),
						'icon'  => 'eicon-circle',
					),
				),
				'toggle'    => false,
				'default'   => 'icon',
			)
		);
		// Story FontAwesome Icon
		$repeater->add_control(
			'twae_story_icon',
			array(
				'label'     => __( 'FontAwesome Icon', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'far fa-clock',
					'library' => 'solid',
				),
				'condition' => array(
					'twae_icon_type' => array( 'icon' ),
				),
			)
		);
		// Story Image Icon [PRO]
		$repeater->add_control(
			'twae_pro_content_img',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=story_content_settings">
							<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/icon-image-settings.png"></a>',
				'content_classes' => 'twae_pro_content',
				'condition'       => array(
					'twae_icon_type' => array( 'image' ),
				),
			)
		);
		// Story Text Icon [PRO]
		$repeater->add_control(
			'twae_pro_content_text',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=story_content_settings">
							<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/icon-text-settings.png"></a>',
				'content_classes' => 'twae_pro_content',
				'condition'       => array(
					'twae_icon_type' => array( 'customtext' ),
				),
			)
		);
		// Story Button [PRO]
		$repeater->add_control(
			'twae_pro_readmore',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=story_content_settings">
							<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/button-settings.png"></a>',
				'content_classes' => 'twae_pro_content',
				'separator'       => 'before',
			)
		);
		// Story Tab - Advanced - END
		$repeater->end_controls_tab();

		// Story Tab - Colors - START
		$repeater->start_controls_tab(
			'twae_style_tab',
			array(
				'label' => __( 'Colors', 'twae1' ),
			)
		);
		// Story Colors [PRO]
		$repeater->add_control(
			'twae_pro_story_style',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=story_color_settings"><img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/single-color-settings.png"></a>',
				'content_classes' => 'twae_pro_content',
				'separator'       => 'before',
			)
		);
		// Story Tab - Colors - END
		$repeater->end_controls_tab();

		// Story Tabs - END
		$repeater->end_controls_tabs();

		// Story Dummy Content
		$this->add_control(
			'twae_list',
			array(
				'label'       => __( 'Content', 'twae1' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'twae_story_title' => __( 'Amazon is born', 'twae1' ),
						'twae_description' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Erat enim res aperta. Ne discipulum abducam, times. Primum quid tu dicis breve? An haec ab eo non dicuntur?', 'twae1' ),
						'twae_year'        => __( '1994', 'twae1' ),
						'twae_date_label'  => __( 'July 5', 'twae1' ),
						'twae_extra_label' => __( 'Introduced', 'twae1' ),
						'twae_image'       => array(
							'url' => TWAE_URL . 'assets/images/amazon1.jpg',
							'id'  => '',
						),
						'twae_video_url'   => '',
					),
					array(
						'twae_story_title' => __( 'Amazon Prime debuts', 'twae1' ),
						'twae_description' => __( 'Aliter homines, aliter philosophos loqui putas oportere? Sin aliud quid voles, postea. Mihi enim satis est, ipsis non satis. Negat enim summo bono afferre incrementum diem. Quod ea non occurrentia fingunt, vincunt Aristonem.', 'twae1' ),
						'twae_year'        => __( '2005', 'twae1' ),
						'twae_date_label'  => __( 'February 2', 'twae1' ),
						'twae_extra_label' => __( 'Expanded', 'twae1' ),
						'twae_image'       => array(
							'url' => TWAE_URL . 'assets/images/amazon2.jpg',
							'id'  => '',
						),
						'twae_video_url'   => '',
					),
					array(
						'twae_story_title' => __( 'Amazon acquires Audible', 'twae1' ),
						'twae_description' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'twae1' ),
						'twae_year'        => __( '2008', 'twae1' ),
						'twae_date_label'  => __( 'January 31', 'twae1' ),
						'twae_extra_label' => __( 'Expanded', 'twae1' ),
						'twae_image'       => array(
							'url' => TWAE_URL . 'assets/images/amazon3.png',
							'id'  => '',
						),
						'twae_video_url'   => '',
					),
				),
				'title_field' => '{{{ twae_story_title }}}',
			)
		);

		// Add Timeline Stories Section - END
		$this->end_controls_section();
	}

	/* ------------------------------ Line Settings ----------------------------- */
	function twae_line_settings() {
		// Line Section Start
		$this->start_controls_section(
			'twae_line_section',
			array(
				'label' => __( '📍 Line Settings', 'twae' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		// Line Color
		$this->add_control(
			'twae_line_color',
			array(
				'label'     => __( 'Line Color', 'twae' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper, {{WRAPPER}} .twae-navigationBar' => '--tw-line-bg: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'pro_line_settings',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=style_settings">
						<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/line-style.png"></a>',
				'content_classes' => 'twae_pro_content',
			)
		);
		// Line Section End
		$this->end_controls_section();

	}

	/* ---------------- Content Settings - Title/Img/Desc/Button ---------------- */
	function twae_storycontent_settings() {
		// Content Section Start
		$this->start_controls_section(
			'twae_storycontent_section',
			array(
				'label' => __( '#️⃣ Title / Desc ', 'twae1' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		// Title Section
		$this->add_control(
			'twae_title_section',
			array(
				'label' => __( '🔶 Title', 'twae1' ),
				'type'  => \Elementor\Controls_Manager::HEADING,
			)
		);

		// Title Color
		$this->add_control(
			'twae_story_title_color',
			array(
				'label'     => __( 'Color', 'twae1' ),
				'type'      => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-cbx-title-color: {{VALUE}}',
				),
			)
		);

		// Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'               => 'twae_title_typography',
				'label'              => __( 'Typography', 'twae1' ),
				'selector'           => '{{WRAPPER}} .twae-title, .twae-popup .twae-title',
				'frontend_available' => true,
			// 'exclude'            => array( 'line_height' ),
			)
		);

		// Title Bottom Margin
		$this->add_responsive_control(
			'twae_story_title_margin',
			array(
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Bottom Spacing', 'twae' ),
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-cbx-title-margin: 0 0 {{SIZE}}{{UNIT}} 0',
				),
			)
		);

		// Description Section
		$this->add_control(
			'twae_description_section',
			array(
				'label'     => __( '🔶 Description', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		// Description Color
		$this->add_control(
			'twae_description_color',
			array(
				'label'     => __( 'Color', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-cbx-des-color: {{VALUE}}',
				),
			)
		);

		// Description Typo
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'twae_description_typography',
				'label'    => __( 'Typography', 'twae1' ),
				'selector' => '{{WRAPPER}} .twae-description, {{WRAPPER}} .twae-button a, .twae-popup .twae-description',
			// 'exclude'  => array( 'line_height' ),
			)
		);

		// Description Bottom Margin
		$this->add_responsive_control(
			'space_between_story_desc',
			array(
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Bottom Spacing', 'twae' ),
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'devices'   => array( 'desktop', 'tablet', 'mobile' ),
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-cbx-des-margin: 0 0 {{SIZE}}{{UNIT}} 0',
				),
			)
		);

		// Content Section End
		$this->end_controls_section();
	}
	/* ------------- Content Settings - Title/Img/Desc/Button - END ------------- */


	/* ------------------------------- Content Box ------------------------------ */
	function twae_cbox_settings() {
		// Content Box Section Start
		$this->start_controls_section(
			'twae_cbox_section',
			array(
				'label' => __( '🔳 Content Background / Border', 'twae1' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		// Content Box Padding
		$this->add_control(
			'twae_cbox_padding',
			array(
				'label'      => __( 'Padding', 'twae1' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px' ),
				'selectors'  => array(
					'{{WRAPPER}} .twae-wrapper' =>
					'--tw-cbx-padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		// Content Box Bottom Margin
		$this->add_responsive_control(
			'twae_space_between',
			array(
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'label'     => esc_html__( 'Bottom Spacing', 'twae' ),
				'default'   => array(
					'size' => '60',
					'unit' => 'px',
				),
				'range'     => array(
					'px' => array(
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-cbx-bottom-margin: {{SIZE}}{{UNIT}}',
				),
			)
		);
		// Content Box Background
		$this->add_control(
			'twae_cbox_background',
			array(
				'label'     => __( '🔶 Content Box Background', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		// Content Box Background Tabs
		$this->start_controls_tabs(
			'twae_cbox_background_tabs',
			array(
				'separator' => 'before',
			)
		);
		// Content Box Background Normal Tab
		$this->start_controls_tab(
			'twae_cbox_background_normal',
			array(
				'label' => esc_html__( 'Normal', 'twae1' ),
			)
		);
		// Content Box Background Type Normal
		$this->add_control(
			'twae_cbox_background_type',
			array(
				'label'   => esc_html__( 'Background Type', 'twae' ),
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'default' => 'simple',
				'options' => array(
					'simple'     => array(
						'title' => esc_html__( 'Simple', 'twae' ),
						'icon'  => 'eicon-paint-brush',
					),
					'gradient'   => array(
						'title' => esc_html__( 'Gradient', 'twae' ),
						'icon'  => 'eicon-barcode',
					),
					'multicolor' => array(
						'title' => esc_html__( 'Multi Color', 'twae' ),
						'icon'  => 'eicon-plus-square',
					),
				),
				'toggle'  => false,
			)
		);
		// Content Box Background Color1 Normal
		$this->add_control(
			'twae_story_bgcolor',
			array(
				'label'     => esc_html__( 'Background Color', 'twae' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper, .elementor-page .twae-popup .twae-popup-content' => '--tw-cbx-bg: {{VALUE}}',
				),
				'condition' => array(
					'twae_cbox_background_type' => array( 'simple' ),
				),
			)
		);
		// Content Box Background Gradient [PRO]
		$this->add_control(
			'twae_story_bgcolor_gradient_pro',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=style_settings">
						<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/gradient-bg-style.png"></a>',
				'content_classes' => 'twae_pro_content',
				'condition'       => array(
					'twae_cbox_background_type' => array( 'gradient' ),
				),
			)
		);
		// Content Box Background Multicolor [PRO]
		$this->add_control(
			'twae_story_bgcolor_multicolor_pro',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=style_settings">
						<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/multi-bg-style.png"></a>',
				'content_classes' => 'twae_pro_content',
				'condition'       => array(
					'twae_cbox_background_type' => array( 'multicolor' ),
				),
			)
		);
		$this->end_controls_tab();
		// Content Box Background Hover Tab
		$this->start_controls_tab(
			'twae_cbox_background_hover',
			array(
				'label' => esc_html__( 'Hover', 'twae1' ),
			)
		);
		// Content Box Background Hover [PRO]
		$this->add_control(
			'twae_story_bgcolor_hover_pro',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=style_settings">
						<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/bg-hover-style.png"></a>',
				'content_classes' => 'twae_pro_content',
			)
		);
		$this->end_controls_tab();
		// Content Box Background Tabs END
		$this->end_controls_tabs();
		$this->add_control(
			'twae_cbox_border',
			array(
				'label'     => __( '🔶 Content Box Border', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		// Content Box Border Color
		$this->add_control(
			'twae_cbox_border_color',
			array(
				'label'     => esc_html__( 'Border Color', 'twae' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-cbx-bd-color: {{VALUE}}',
				),
				'separator' => 'before',
			)
		);
		// Content Box Border Width
		$this->add_control(
			'twae_cbox_border_width',
			array(
				'label'      => __( 'Border Width', 'twae1' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px' ),
				'selectors'  => array(
					'{{WRAPPER}} .twae-wrapper' =>
					'--tw-cbx-bd-top-width: {{TOP}}{{UNIT}};
				--tw-cbx-bd-right-width: {{RIGHT}}{{UNIT}};
				--tw-cbx-bd-bottom-width: {{BOTTOM}}{{UNIT}};
				--tw-cbx-bd-left-width: {{LEFT}}{{UNIT}};',
				),

			)
		);
		// Content Box Border Styles [PRO]
		$this->add_control(
			'pro_cbox_settings',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=style_settings"><img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/border-style.png"></a>',
				'content_classes' => 'twae_pro_content',
			)
		);

		$this->end_controls_section();
	}
	/* ---------------------------- Content Box - END --------------------------- */


	/* ---------------------------- Icon Box Settings --------------------------- */
	public function story_icon_style_settings() {
		// Icon Box Section
		$this->start_controls_section(
			'twae_icon_section',
			array(
				'label' => __( '🔵 Icon Box / Dot', 'twae1' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		// Icon Box BG Color
		$this->add_control(
			'twae_icon_bgcolor',
			array(
				'label'     => __( 'Icon / Dot Background', 'twae1' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper, {{WRAPPER}} .twae-navigationBar' => '--tw-ibx-bg: {{VALUE}}',
				),
			)
		);
		// Icon Box Color
		$this->add_control(
			'twae_icon_color',
			array(
				'label'     => __( 'Icon / Text Color', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper, {{WRAPPER}} .twae-navigationBar' => '--tw-ibx-color: {{VALUE}}',
				),
			)
		);
		// Icon Styles [PRO]
		$this->add_control(
			'pro_icon_settings',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=style_settings"><img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/icon-box-style.png"></a>',
				'content_classes' => 'twae_pro_content',
			)
		);
		// Icon Box Section - END
		$this->end_controls_section();
	}
	/* ------------------------- Icon Box Settings - END ------------------------ */

	/* ------------------------------- Pro Styles ------------------------------- */
	public function story_pro_style_settings() {
		// Image Styles - [PRO]
		$this->start_controls_section(
			'twae_image_section',
			array(
				'label' => __( '📺 Image / Media - PRO', 'twae1' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'pro_image_settings',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=style_settings">
						<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/image-style.png"></a>',
				'content_classes' => 'twae_pro_content',
			)
		);
		$this->end_controls_section();
		// Button Styles - [PRO]
		$this->start_controls_section(
			'twae_button_section',
			array(
				'label' => __( '🅱 Button (Read More) - PRO', 'twae1' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'pro_button_settings',
			array(
				'label'           => '',
				'label_block'     => true,
				'type'            => \Elementor\Controls_Manager::RAW_HTML,
				'raw'             => '<a target="_blank" href="' . TWAE_BUY_PRO_LINK . '&utm_content=style_settings">
						<img class="twae-screenshots" src="' . TWAE_URL . 'assets/images/pro/button-style.png"></a>',
				'content_classes' => 'twae_pro_content',
			)
		);
		$this->end_controls_section();
	}
	/* ---------------------------- Pro Styles - END ---------------------------- */

	/* ---------------------- Year / Labels / Date Settings --------------------- */
	public function story_yld_settings() {
		// Year / Labels / Date Section
		$this->start_controls_section(
			'twae_yld_section',
			array(
				'label' => __( '📢 Labels / Date / Year Box', 'twae1' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		// Date / Labels
		$this->add_control(
			'twae_yld_labels',
			array(
				'label' => __( '🔶 Label / Sub Label / Date', 'twae1' ),
				'type'  => \Elementor\Controls_Manager::HEADING,
			)
		);

		// Primary Label Color
		$this->add_control(
			'twae_date_label_color',
			array(
				'label'     => __( 'Label Color', 'twae1' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-lbl-big-color: {{VALUE}}',
				),
				'separator' => 'before',
			)
		);
		// Primary Label Typo
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'twae_label_typography',
				'label'    => __( 'Label Typography', 'twae1' ),
				'selector' => '{{WRAPPER}} .twae-label-big,{{WRAPPER}} .twae_icon_text',
				'exclude'  => array( 'line_height', 'font_size', 'letter_spacing', 'word_spacing' ),
			)
		);
		// Primary Label Size
		$this->add_responsive_control(
			'twae_yld_label_size',
			array(
				'type'           => \Elementor\Controls_Manager::SLIDER,
				'label'          => esc_html__( 'Label Size', 'twae' ),
				'range'          => array(
					'px' => array(
						'min' => 8,
						'max' => 64,
					),
				),
				'devices'        => array( 'desktop', 'tablet', 'mobile' ),
				'default'        => array(
					'size' => 22,
					'unit' => 'px',
				),
				'tablet_default' => array(
					'size' => 20,
					'unit' => 'px',
				),
				'mobile_default' => array(
					'size' => 18,
					'unit' => 'px',
				),
				'selectors'      => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-lbl-big-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		// Sub Label Color
		$this->add_control(
			'twae_extra_label_color',
			array(
				'label'     => __( 'Sub Label Color', 'twae1' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-lbl-small-color: {{VALUE}}',
				),
				'separator' => 'before',
			)
		);
		// Sub Label Typo
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'twae_extra_label_typography',
				'label'    => __( 'Sub Label Typography', 'twae1' ),
				'selector' => '{{WRAPPER}} .twae-label-small',
				'exclude'  => array( 'line_height', 'font_size', 'letter_spacing', 'word_spacing' ),
			)
		);
		// Sub Label Size
		$this->add_responsive_control(
			'twae_yld_sublabel_size',
			array(
				'type'           => \Elementor\Controls_Manager::SLIDER,
				'label'          => esc_html__( 'Sub Label Size', 'twae' ),
				'range'          => array(
					'px' => array(
						'min' => 8,
						'max' => 64,
					),
				),
				'devices'        => array( 'desktop', 'tablet', 'mobile' ),
				'default'        => array(
					'size' => 16,
					'unit' => 'px',
				),
				'tablet_default' => array(
					'size' => 14,
					'unit' => 'px',
				),
				'mobile_default' => array(
					'size' => 14,
					'unit' => 'px',
				),
				'selectors'      => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-lbl-small-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		// Year Box
		$this->add_control(
			'twae_year_label_section',
			array(
				'label'     => __( '🔶 Year/Label (On Line)', 'twae1' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		// Year Box Font Color
		$this->add_control(
			'twae_year_label_color',
			array(
				'label'     => __( 'Color', 'twae1' ),
				'type'      => Controls_Manager::COLOR,
				'separator' => 'before',
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper, {{WRAPPER}} .twae-navigationBar' => '--tw-ybx-text-color: {{VALUE}}',
				),

			)
		);
		// Year Box BG Color
		$this->add_control(
			'twae_year_label_bgcolor',
			array(
				'label'     => __( 'Background Color', 'twae1' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .twae-wrapper, {{WRAPPER}} .twae-navigationBar' => '--tw-ybx-bg: {{VALUE}}',
				),
			)
		);
		// Year Box Typo
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'twae_year_typography_new',
				'label'    => __( 'Typography', 'twae1' ),
				'exclude'  => array( 'line_height' ),
				'selector' => '{{WRAPPER}} .twae-year-text',
			)
		);

		// Year Box Size
		$this->add_responsive_control(
			'twae_year_size',
			array(
				'type'           => \Elementor\Controls_Manager::SLIDER,
				'label'          => esc_html__( 'Year Box Size', 'twae' ),
				'range'          => array(
					'px' => array(
						'min' => 36,
						'max' => 128,
					),
				),
				'devices'        => array( 'desktop', 'tablet', 'mobile' ),
				'default'        => array(
					'size' => 80,
					'unit' => 'px',
				),
				'tablet_default' => array(
					'size' => 80,
					'unit' => 'px',
				),
				'mobile_default' => array(
					'size' => 60,
					'unit' => 'px',
				),
				'selectors'      => array(
					'{{WRAPPER}} .twae-wrapper' => '--tw-ybx-size: {{SIZE}}{{UNIT}};',
				),
			)
		);
		// Year / Labels / Date Section - END
		$this->end_controls_section();
	}




	/* ------------------------ Content Box Settings - END ------------------------ */


	// for live editor
	protected function content_template() {
		?>
	<#
		if( settings.twae_list ) {
			
			#>
				<?php
				$isRTL = is_rtl();
				$dir   = '';
				if ( $isRTL ) {
					$dir = 'rtl';
				}
				?>
			<#	
				var border = settings.twae_border;	
				var no_border = '';
				if(border !='yes'){
					no_border = 'twae-no-border';
				}

			if(settings.twae_layout == 'horizontal'){
				var sidesToShow = settings.twae_slides_to_show;
				var sidesHeight = settings.twae_slides_height;
				var autoplay = settings.twae_autoplay;
				if(sidesToShow==''){
					sidesToShow = 2;
				}
				#>
				<?php
				require TWAE_PATH . 'widgets/editor-layouts/horizontal-template.php';

				?>
				<#		
				
			}
			else{
				#>	
			
				<?php require TWAE_PATH . 'widgets/editor-layouts/vertical-template.php'; ?>
			<#
				}		
		}	
		
		#>
		<?php

	}




}



