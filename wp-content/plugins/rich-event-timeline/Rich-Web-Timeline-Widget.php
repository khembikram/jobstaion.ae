<?php

class Rich_Web_Timeline_Widget extends WP_Widget {
	public function __construct() {
		$args = [ 'name' => 'Rich Web Timeline', 'description' => 'Show your Timeline with our plugin.' ];
		parent::__construct( 'Rich_Web_Timeline_Widget', '', $args );
	}

	public function form( $instance ) {
		$defaults = array( 'Rich_Web_Timeline' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );

		$Rich_Web_Timeline = $instance['Rich_Web_Timeline'];
		?>
        <div>
            <p>
                Timeline Title:
                <select name="<?php echo esc_html( $this->get_field_name( 'Rich_Web_Timeline' ) ); ?>" class="widefat">
					<?php
					global $wpdb;

					$table_name        = $wpdb->prefix . "rich_web_timeline_manager";
					$Rich_Web_Timeline = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE id > %d", 0 ) );

					foreach ( $Rich_Web_Timeline as $Rich_Web_Timeline1 ) {
						?>
                        <option value="<?php echo esc_html( $Rich_Web_Timeline1->id ); ?>"> <?php echo esc_html( $Rich_Web_Timeline1->rw_timeline_name ); ?> </option> <?php
					}
					?>
                </select>
            </p>
        </div>
		<?php
	}

	public function widget( $args, $instance ) {
		Rich_Web_Show_Timeline_Widget( $instance['Rich_Web_Timeline'] );
	}
}

function Rich_Web_Show_Timeline_Widget( $id ) {
	global $wpdb;
	$ti_table_name_1 = $wpdb->prefix . "rich_web_timeline_manager";
	$ti_table_name_2 = $wpdb->prefix . "rich_web_timeline_options";
	$ti_table_name_3 = $wpdb->prefix . "rich_web_timeline_style_options";
	$ti_table_name_4 = $wpdb->prefix . "rich_web_timeline_style_options_2";

	$get_timeline = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_1 WHERE id=%d", $id ) );
	$rw_ti_id     = $get_timeline[0]->id;
	$ti_rand      = rand( 1, 100 );
	$rw_ti_id     = $rw_ti_id . '_' . $ti_rand;

	$style_id = $get_timeline[0]->rw_timeline_style_id;

	$get_timeline_style_options   = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_3 WHERE id=%d", $style_id ) );
	$get_timeline_style_options_2 = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_4 WHERE style_id=%d", $style_id ) );

	if ( $get_timeline_style_options[0]->rw_timeline_sort == 'ASC' ) {
		$get_timeline_options = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_2 WHERE rw_general_id=%d ORDER BY rw_timeline_year ASC, rw_timeline_month ASC, rw_timeline_day ASC, id ASC", $id ) );
		// print_r($get_timeline_options);
	} else if ( $get_timeline_style_options[0]->rw_timeline_sort == 'DESC' ) {
		$get_timeline_options = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_2 WHERE rw_general_id=%d ORDER BY rw_timeline_year DESC, rw_timeline_month DESC, rw_timeline_day DESC, id DESC", $id ) );
		// print_r($get_timeline_options);
	}
	$ti_style_article = $ti_panel_width = $style_ti = $ti_panel_style = $ti_style_article = $style_ti = $ti_style_article = $rw_ti_3 = $rw_icon_right = $rw_icon_left = $style_ti_3 = $style_ti_panel_3 = $ti_section = $ti_style_width = $ti_panel_style = $style_ti_p_mb = $style_ti = $ti_style_article = $rw_round_size = $style_ti_3 = $style_ti = $ti_panel_style = $style_ti_mb = $ti_style_article = "";

	if ( ( $get_timeline_style_options[0]->rw_timeline_theme == 1 ) || ( $get_timeline_style_options[0]->rw_timeline_theme == 2 ) || ( $get_timeline_style_options[0]->rw_timeline_theme == 3 ) || ( $get_timeline_style_options[0]->rw_timeline_theme == 4 ) ) {
		if ( $get_timeline_style_options[0]->rw_timeline_theme == 1 ) {
			$ti_style_article = "border: none; position: relative; ";
			$ti_panel_width   = "width: 100%;";
			$style_ti         = "padding: 5px 0;";
		} else if ( $get_timeline_style_options[0]->rw_timeline_theme == 2 ) {
			$ti_panel_style   = "border: " . $get_timeline_style_options[0]->rw_timeline_border_px . "px " . $get_timeline_style_options[0]->rw_timeline_border_type_article . " " . $get_timeline_style_options[0]->rw_timeline_border_col . ";";
			$ti_style_article = "z-index: 3; ";
			$style_ti         = "margin-top: 10px; margin-right: 100%; font-size: " . $get_timeline_style_options[0]->rw_timeline_year_size . "px; line-height: 1; background: " . $get_timeline_style_options[0]->rw_timeline_year_block_bg . "; border-bottom: 1px solid " . $get_timeline_style_options[0]->rw_timeline_line_col . ";";
			$ti_style_article = "padding: 10px 0 0 15px; border-bottom: none; margin: 0 0 0 50px; position: relative; border-color: " . $get_timeline_style_options[0]->rw_timeline_line_col . ";";
		} else if ( $get_timeline_style_options[0]->rw_timeline_theme == 3 ) {
			$rw_ti_3          = "position: relative; padding: 0 30px;";
			$rw_icon_right    = 'right';
			$rw_icon_left     = 'left';
			$style_ti_3       = "padding: 3px; line-height: 16px; white-space: normal;";
			$style_ti_panel_3 = "max-height: 450px; overflow-x: hidden;";
			$ti_section       = "width: 100%; overflow-y: hidden; overflow-x: hidden;";
			$ti_style_width   = "width: 350px; max-width: 350px; min-width: 350px; max-height: 350px;";
			$ti_panel_style   = "border: " . $get_timeline_style_options[0]->rw_timeline_border_px . "px " . $get_timeline_style_options[0]->rw_timeline_border_type_article . " " . $get_timeline_style_options[0]->rw_timeline_border_col . "; box-sizing: border-box;";
			$style_ti_p_mb    = '0 20px 0';
			$style_ti         = "line-height: 1; position: relative; top: 30px; z-index: 999; font-size: " . $get_timeline_style_options[0]->rw_timeline_year_size . "px;";
			$ti_style_article = "padding: 0 10px 0 0; border: none;";
		} else if ( $get_timeline_style_options[0]->rw_timeline_theme == 4 ) {
			if ( $get_timeline_style_options[0]->rw_timeline_round_size == 'big' ) {
				$rw_round_size = "min-width: 110px; min-height: 60px; padding: 17px; font-size: " . $get_timeline_style_options[0]->rw_timeline_year_size . "px;";
			} else if ( $get_timeline_style_options[0]->rw_timeline_round_size == 'medium' ) {
				$rw_round_size = "min-width: 90px; min-height: 40px; padding: 7px; font-size: " . $get_timeline_style_options[0]->rw_timeline_year_size . "px;";
			} else if ( $get_timeline_style_options[0]->rw_timeline_round_size == 'small' ) {
				$rw_round_size = "min-width: 65px; min-height: 33px; padding: 7px; font-size: " . $get_timeline_style_options[0]->rw_timeline_year_size . "px;";
			}
			$style_ti_3       = "line-height: 16px;padding: 3px; white-space: normal;";
			$style_ti         = "display: table; line-height: 2; padding: 5px; margin: 0 auto 35px auto; z-index: 3; top: 2px; position: relative; background: " . $get_timeline_style_options[0]->rw_timeline_year_block_bg . "; box-shadow: 0 0 0 2px " . $get_timeline_style_options[0]->rw_timeline_line_col . ", inset 0 0 0 " . $get_timeline_style_options[0]->rw_timeline_box_shadow . ", 0 0px 0 2px rgba(0, 0, 0, 0.15);";
			$ti_panel_style   = "border: " . $get_timeline_style_options[0]->rw_timeline_border_px . "px " . $get_timeline_style_options[0]->rw_timeline_border_type_article . " " . $get_timeline_style_options[0]->rw_timeline_border_col . "; margin: 0 8px";
			$style_ti_mb      = '0 25px 0';
			$ti_style_article = 'border-bottom: none;';
		} ?>
        <style type="text/css">
            <?php if($get_timeline_style_options[0]->rw_timeline_theme == 1) { ?>
            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu {
                height: 50px;
                text-align: center;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu li {
                position: relative;
                float: left;
                list-style: none;
                margin: 0px;
                padding: 0px;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu li a {
                display: block;
                text-decoration: none;
                font-size: 16px;
                padding: 10px;
                padding-top: 20px;
                color: black;
                font-weight: bold;
                border-bottom: 5px solid transparent;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> {
                width: 100%;
                position: relative;
                padding-bottom: 24px;
                overflow: hidden;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?>:before {
                position: absolute;
                content: '';
                left: 49.95%;
                height: 100%;
                z-index: 4;
                width: 2px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> div[class*='group'] {
                text-align: center;
                font-weight: bold;
                font-size: 1.2em;
                letter-spacing: 5px;
                margin: 25px 0px 25px 4px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article {
                position: relative;
                margin-bottom: 20px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel {
                display: inline-block;
                margin-bottom: 0;
                border: none;
                border-radius: 0;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_panel-body {
                -webkit-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                -moz-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                text-align: right;
                border-right: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_type_article);?> #09F;
                float: left;
                width: 35%;
                padding: 10px 25px 10px 25px;
                position: relative;
                color: #333;
                margin: 0 5px;
                background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color);?>;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_panel-body h3.rich_web_timeline_group-title {
                text-transform: uppercase;
                letter-spacing: 2px;
                font-size: 20px;
                margin-bottom: 5px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_panel-body span.group-sub-title {
                font-weight: 100;
                text-transform: uppercase;
                letter-spacing: 3px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_panel-body p {
                padding-top: 0px;
                font-weight: 100;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_badge {
                display: inline-block;
                float: right;
                right: 36%;
                top: 30px;
                color: #333;
                border-left: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_type_article);?> #09F;
                position: relative;
                text-transform: uppercase;
                background-color: transparent;
                border-radius: 0;
                font-weight: normal;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article.inverted > div.rich_web_timeline_panel .rich_web_timeline_panel-body {
                -webkit-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                -moz-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                text-align: left;
                border-right: none;
                border-left: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_type_article);?> #09F;
                float: right;
                color: #151d2a;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article.inverted > div.rich_web_timeline_panel div.rich_web_timeline_badge {
                float: left;
                left: 36%;
                border-right: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_type_article);?> #09F;
                border-left: none;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_badge:last-child {
                display: none;
            }

            @media (max-width: 767px) {
                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article {
                    z-index: 11;
                }

                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_badge,
                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_panel-body {
                    z-index: 10;
                    padding: 5px;
                    margin: 0 !important;
                }

                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_panel-body,
                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article.inverted > div.rich_web_timeline_panel .rich_web_timeline_panel-body {
                    -webkit-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px rgba(0, 0, 0, 0.15);
                    -moz-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px rgba(0, 0, 0, 0.15);
                    box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px rgba(0, 0, 0, 0.15);
                    border-left: none;
                    border-right: none;
                    float: none;
                }

                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_panel-body {
                    text-align: center;
                    float: none;
                    width: 96%;
                    top: 0px;
                    margin-left: 0;
                    margin-bottom: 30px;
                    border-radius: 0;
                }

                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel div.rich_web_timeline_badge,
                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article.inverted > div.rich_web_timeline_panel div.rich_web_timeline_badge {
                    text-align: center;
                    display: block;
                    float: none;
                    position: static;
                    border: none;
                    border-radius: 0;
                }

                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel:before {
                    display: none;
                }
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel:before {
                z-index: 9;
                content: ' ';
                width: 20px;
                height: 20px;
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg);?>;
                display: block;
                position: absolute;
                margin: 0 auto;
                top: 30px;
                border: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px solid<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>;
                box-sizing: content-box;
                -moz-box-sizing: content-box;
                -webkit-box-sizing: content-box;
                border-radius: 50%;
                left: 50%;
                transform: translateX(-50%);
                -moz-transform: translateX(-50%);
                -webkit-transform: translateX(-50%);
            }

            /*section.rich_web_timeline_
            <?php echo esc_html($rw_ti_id);?>  > article > div.rich_web_timeline_panel:hover:before { content: ' '; width: 20px; height: 20px; background:
            <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg_hover);?> ; display: block; position: absolute; margin: 0 auto; top: 30px; border:
            <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?> px solid
            <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col_hover);?>  !important; border-radius: 50%; left: 50%; transform: translateX(-50%); -moz-transform: translateX(-50%); -webkit-transform: translateX(-50%);}*/
            <?php } else if($get_timeline_style_options[0]->rw_timeline_theme == 2) { ?>
            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu {
                height: 50px;
                text-align: center;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu li {
                position: relative;
                float: left;
                list-style: none;
                margin: 0px;
                padding: 0px;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu li a {
                display: block;
                text-decoration: none;
                font-size: 16px;
                padding: 10px;
                padding-top: 20px;
                color: black;
                font-weight: bold;
                border-bottom: 5px solid transparent;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu li a:hover {
                color: #EF693A;
                border-bottom: 5px solid #EF693A;
                font-weight: normal;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section#Rich_Web_BTimeline {
                width: 100%;
                margin-right: auto;
                margin-left: auto;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section#Rich_Web_BTimeline article {
                padding: 10px 0 0 15px;
                margin: 0 0 0 50px;
                position: relative;
                border-left: 1px solid #666;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section#Rich_Web_BTimeline > article > div.rich_web_timeline_panel {
                -webkit-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?> -moz-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                padding: 5px;
                margin: 0;
                border-style: none;
                background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color);?>;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section#Rich_Web_BTimeline > article > div.rich_web_timeline_panel:hover {
                background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color_hover);?>;
                box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?>;
                -moz-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?>;
                -webkit-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?>;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section#Rich_Web_BTimeline > article > div.rich_web_timeline_panel:last-child:after {
                display: none;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section#Rich_Web_BTimeline > article > div.rich_web_timeline_panel div.rich_web_timeline_badge {
                display: inline-block;
                padding: 3px 7px 3px 0;
                font-size: 12px;
                line-height: 1;
                color: #FFF;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                border-radius: 0;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section#Rich_Web_BTimeline > article > div.rich_web_timeline_panel div.rich_web_timeline_badge:last-child {
                margin-left: -30px;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section#Rich_Web_BTimeline div[class*='group'] {
                min-width: 75px;
                padding: 5px !important;
                display: inline-block !important;
                padding: 0px;
                margin-top: 0;
                font-weight: bold;
                text-align: center;
                display: block;
                border-bottom: 2px solid;
                font-size: 1.6em;
                line-height: 1.5;
                right: 125px;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section#Rich_Web_BTimeline div[class*='group']:hover {
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_block_bg_hover);?> !important;
            }

            @media (max-width: 767px) {
                .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section#Rich_Web_BTimeline article {
                    margin: 0 0 0 15px !important;
                }
            }

            <?php } else if($get_timeline_style_options[0]->rw_timeline_theme == 3) { ?>
            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-body::-webkit-scrollbar {
                width: 0.5em;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-body::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-body::-webkit-scrollbar-thumb {
                background-color: #ffffff;
                outline: #ffffff;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> {
                list-style: none;
                position: relative;
                margin: 20px 0 20px 0 !important;
                padding: 50px 0 0 0;
                display: inline-block;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?>:before {
                height: 2px;
                top: auto;
                bottom: 10px;
                left: 0;
                right: 0;
                position: absolute;
                content: ' ';
                margin-left: -1.5px;
                position: absolute;
                background-color: #EF693A;
                margin-left: -1.5px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> div[class*='group'], section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article {
                display: table-cell;
                width: 350px;
                min-width: 350px;
                max-width: 350px;
                float: none !important;
                padding: 0 10px;
                vertical-align: bottom;
                position: relative;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article:after {
                display: block;
                clear: both;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel {
                top: auto;
                bottom: 35px;
                display: inline-block;
                float: none !important;
                left: 0 !important;
                right: 0 !important;
                width: 100%;
                margin-bottom: 20px;
                position: relative;
                border: none;
                -webkit-border-radius: 0px;
                -moz-border-radius: 0px;
                border-radius: 0px;
                -webkit-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                -moz-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color);?>;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel:hover {
                background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color_hover);?>;
                box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?>;
                -moz-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?>;
                -webkit-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?>;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel:after {
                position: absolute;
                bottom: -5px;
                right: 170px;
                width: 0px;
                height: 0px;
                -moz-transform: rotate(-45deg);
                -ms-transform: rotate(-45deg);
                -o-transform: rotate(-45deg);
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg);
                background: #FFF;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-heading {
                padding: 5px 10px;
                margin: 0;
                font-size: 1.2em;
                background-color: #EF693A;
                overflow: hidden;
                text-align: center;
                -webkit-border-radius: 0px;
                -moz-border-radius: 0px;
                border-radius: 0px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-heading .rich_web_timeline_panel-title {
                color: #FFF;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-body {
                padding: 15px;
                position: relative;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-body img {
                float: left;
                margin: 0 15px 15px 0;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-footer {
                padding: 15px;
                background-color: #EEE;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel div.rich_web_timeline_badge {
                display: block;
                text-align: center;
                font-weight: bold;
                -moz-box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
                -webkit-box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
                box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel div.rich_web_timeline_badge:hover {
                display: block;
                text-align: center;
                font-weight: bold;
                -moz-box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col_hover);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
                -webkit-box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col_hover);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
                box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col_hover);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel div.rich_web_timeline_badge {
                position: absolute;
                z-index: 3;
                bottom: -45px;
                left: 50%;
                border-radius: 50%;
                font-size: 0.75em;
                width: 40px;
                height: 40px;
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg);?>;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>;
                transform: translateX(-50%) translateY(50%);
                -moz-transform: translateX(-50%) translateY(50%);
                -webkit-transform: translateX(-50%) translateY(50%);
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel div.rich_web_timeline_badge:hover {
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg_hover);?>;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> div[class*='group'] {
                min-width: 40px;
                max-width: 0 !important;
                padding: 0px;
                font-weight: bold;
                text-align: center;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> div[class*='group'] span {
                border-bottom: 5px solid<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_01);?>;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> div[class*='group'] :hover {
                border-bottom: 5px solid<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_02);?>;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article:nth-last-child(2) {
                width: 40px;
                min-width: 40px;
                max-width: 40px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article:nth-last-child(2) div.rich_web_timeline_panel:after {
                display: none;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> .year_block span {
                width: calc(<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_size);?>px + <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_size);?>px + 15px) !important;
                display: block;
                margin-bottom: 2px;
                text-align: center;
            }

            @media (max-width: 900px) {
                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article {
                    width: 210px !important;
                    max-width: 210px !important;
                }
            }

            @media (max-width: 321px) {
                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article {
                    width: 180px !important;
                    max-width: 180px !important;
                }
            }

            <?php } else if($get_timeline_style_options[0]->rw_timeline_theme == 4) { ?>
            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu {
                height: 50px;
                text-align: center;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu li {
                position: relative;
                float: left;
                list-style: none;
                margin: 0px;
                padding: 0px;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu li a {
                display: block;
                text-decoration: none;
                font-size: 16px;
                padding: 10px;
                padding-top: 20px;
                color: black;
                font-weight: bold;
                border-bottom: 5px solid transparent;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul#Rich_Web_BTimeline-menu li a:hover {
                color: #EF693A;
                border-bottom: 5px solid #EF693A;
                font-weight: normal;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> {
                width: 100%;
                margin: 0 auto;
                padding-bottom: 0;
                position: relative;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?>:before {
                top: 0;
                bottom: 0;
                position: absolute;
                content: ' ';
                width: 2px;
                background-color: #EF693A;
                left: 50%;
                height: 100%;
                margin-left: -1.5px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article {
                width: 100%;
                margin-bottom: 20px;
                position: relative;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article:after {
                content: '';
                display: block;
                clear: both;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel {
                width: 45%;
                float: left;
                border: none;
                -webkit-border-radius: 0px;
                -moz-border-radius: 0px;
                border-radius: 0px;
                -webkit-box-shadow: 0 0px 6px rgba(0, 0, 0, 0.15);
                -moz-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?>;
                background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color);?>;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel:hover {
                background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color_hover);?>;
                box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?>;
                -moz-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?>;
                -webkit-box-shadow: 0 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?>;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-heading {
                padding: 5px 10px;
                margin: 0;
                font-size: 1.2em;
                background-color: #EF693A;
                overflow: hidden;
                text-align: center;
                -webkit-border-radius: 0px;
                -moz-border-radius: 0px;
                border-radius: 0px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-heading .rich_web_timeline_panel-title {
                color: #FFF;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-body {
                padding: 15px;
                position: relative;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel-body:after {
                position: absolute;
                top: 20px;
                right: -5px;
                width: 0px;
                height: 0px;
                -moz-transform: rotate(-45deg);
                -ms-transform: rotate(-45deg);
                -o-transform: rotate(-45deg);
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg);
                background: #FFF;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-body img {
                float: left;
                margin: 0 15px 15px 0;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel .rich_web_timeline_panel-footer {
                padding: 15px;
                background-color: #EEE;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article.inverted > div.rich_web_timeline_panel {
                float: right;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article.inverted > div.rich_web_timeline_panel .rich_web_timeline_panel-body:after {
                left: -5px;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article.inverted > div.rich_web_timeline_panel .rich_web_timeline_panel-body img {
                float: right;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> div[class*='group'], section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel div.rich_web_timeline_badge {
                display: block;
                z-index: 3;
                text-align: center;
                font-weight: bold;
                -moz-box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
                -webkit-box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
                box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel div.rich_web_timeline_badge:hover {
                display: block;
                z-index: 3;
                text-align: center;
                font-weight: bold;
                -moz-box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col_hover);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
                -webkit-box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col_hover);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
                box-shadow: 0 0 0 <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col_hover);?>, inset 0 2px 0 rgba(0, 0, 0, 0.1), 0 0px 0 2px rgba(0, 0, 0, 0.15);
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> div[class*='group'] {
                width: 65px;
                font-size: 1.3em;
                margin: 35px auto;
                padding: 5px;
                border-radius: 0px;
                background: #EF693A;
                color: #FFF;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> div[class*='group']:hover {
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_block_bg_hover);?> !important;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel div.rich_web_timeline_badge {
                position: absolute;
                top: 0;
                left: 50%;
                margin: 0 0 0 -20px !important;
                border-radius: 50%;
                font-size: 0.75em;
                width: 40px;
                height: 40px;
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg);?>;
                color: #EF693A;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel div.rich_web_timeline_badge:hover {
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg_hover);?>;
            }

            section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel div.rich_web_timeline_badge:last-child {
                background-color: #EF693A;
                width: 20px;
                height: 20px;
                margin: 0 0 0 -10px;
            }

            @media (max-width: 900px) {
                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel {
                    width: 100%;
                }

                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article div.rich_web_timeline_panel div.rich_web_timeline_badge {
                    margin: 0 !important;
                    top: -16px;
                    left: -12px;
                    width: 28px !important;
                    height: 28px !important;
                    line-height: 13px !important;
                    font-size: 11px;
                }

                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article.inverted div.rich_web_timeline_panel div.rich_web_timeline_badge {
                    top: -16px !important;
                    left: auto !important;
                    right: -12px !important;
                }

                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> article {
                    margin-bottom: 80px !important;
                    z-index: 99 !important;
                }

                section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> div[class*='group'] {
                    margin-bottom: 85px !important;
                }
            }

            <?php } ?>
            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?>:before {
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_line_col);?>;
                z-index: 2;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section pre {
                background: none !important;
                padding: 0 !important;
                margin: 0 !important;
                border: none !important;
                outline: none !important;
                box-shadow: none !important;
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel:before {
                border-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> > article > div.rich_web_timeline_panel:before:hover {
                border-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col_hover);?>;
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg_hover);?>;
            }

            .rich_web_ti_content_<?php echo esc_html($rw_ti_id);?> #slid_icon_left_<?php echo esc_html($rw_ti_id);?> {
                position: absolute;
                font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_size);?>px;
                font-weight: bold;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_color);?>;
                cursor: pointer;
                top: 50%;
                z-index: 7;
                left: -10px;
                transform: translateY(-50%);
                -moz-transform: translateY(-50%);
                -webkit-transform: translateY(-50%);
            }

            .rich_web_ti_content_<?php echo esc_html($rw_ti_id);?> #slid_icon_right_<?php echo esc_html($rw_ti_id);?> {
                position: absolute;
                font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_size);?>px;
                font-weight: bold;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_color);?>;
                cursor: pointer;
                top: 50%;
                z-index: 7;
                right: -10px;
                transform: translateY(-50%);
                -moz-transform: translateY(-50%);
                -webkit-transform: translateY(-50%);
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> .rich_web_timeline_badge {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                line-height: 1em;
                font-size: 14px;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_color);?> !important;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> ul.rich_web_timeline_<?php echo esc_html($rw_ti_id);?> li a:hover {
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_hover_color);?> !important;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> .rich_web_timeline_<?php echo esc_html($rw_ti_id);?> h3 {
                letter-spacing: 0 !important;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> .rich_web_timeline_<?php echo esc_html($rw_ti_id);?> p {
                margin: 0 !important;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> #rich_web_div_block_<?php echo esc_html($rw_ti_id);?> {
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
                line-height: 1.42857143;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> #Rich_Web_BTimeline .year_block {
                font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_size);?>px !important;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> #Rich_Web_BTimeline .year_block:hover {
                font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_size);?>px;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_color_hover);?> !important;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> #Rich_Web_BTimeline .rich_web_timeline_badge {
                border-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_border_color);?> !important;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> #Rich_Web_BTimeline .rich_web_timeline_badge:hover {
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_color_hover);?> !important;
                border-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_border_color_hover);?> !important;
            }

            .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> #Rich_Web_BTimeline h3:hover {
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_hover_color);?> !important;
            }

            @media (max-width: 767px) {
                .rich_web_div_block_<?php echo esc_html($rw_ti_id);?> section.rich_web_timeline_<?php echo esc_html($rw_ti_id);?>:before {
                    background: unset;
                    z-index: 2;
                }
            }


            <?php if($get_timeline_style_options[0]->rw_timeline_03 == "Pagination 1") { ?>
            /*Pagination1*/

            #pagination<?php echo esc_html($rw_ti_id);?> {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                cursor: pointer;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li {

            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_02 );?>;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_04 );?>;
                font-family: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_08 );?>;
                font-size: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_07 );?>px;
                padding: 5px 10px;
                margin: 2px;
                border-right: 0;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a {
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_03 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover {
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06 );?>;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;
            }


            <?php } elseif($get_timeline_style_options[0]->rw_timeline_03 == "Pagination 2") { ?>


            /*Pagination2*/
            #pagination<?php echo esc_html($rw_ti_id);?> {
                background-color: white;
                text-align: center;
                font-family: arial;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> {
                list-style: none;
                display: inline-block;
                padding: 0;
                margin-top: 10px;
                text-align: center;
                cursor: pointer;
                position: relative;
                left: 50%;
                transform: translateX(-50%);
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li {
                display: inline;
                text-align: center;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                float: left;
                display: block;
                font-size: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_07 );?>px;
                font-family: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_08 );?>;
                text-decoration: none;
                padding: 5px 12px;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_04 );?>;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_02 );?>;
                margin-left: -1px;
                border: 1px solid transparent;
                line-height: 1.5;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul a.active {
                cursor: default;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul a:active {
                outline: none;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li:first-child a {
                margin-left: 3px;
                line-height: 30px;
                -moz-border-radius: 100%;
                -webkit-border-radius: 100%;
                border-radius: 100%;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li:last-child a {
                margin-left: 3px;
                line-height: 30px;
                -moz-border-radius: 100%;
                -webkit-border-radius: 100%;
                border-radius: 100%;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                margin-left: 3px;
                padding: 8px 20px;
                line-height: 30px;
                -moz-border-radius: 100%;
                -webkit-border-radius: 100%;
                border-radius: 100%;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover {
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06 );?>;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a {
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_03 );?>;
            }


            <?php } elseif($get_timeline_style_options[0]->rw_timeline_03 == "Pagination 3") { ?>

            /*Pagination3*/
            #pagination<?php echo esc_html($rw_ti_id);?> {
                margin-top: 1em;
                padding-top: 2em;
                text-align: center;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li {
                list-style-type: none;
                display: inline-block;
                border-right: 1px solid #d7dadb;
                transform: scale(1) rotate(19deg) translateX(0px) translateY(0px) skewX(-7deg) skewY(-20deg);
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li:hover,
            {
                background-color: #fa4248;
                border-right: 1px solid #fff;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li {
                color: #fff;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li:hover a {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li:hover {
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_03 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active {
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
            }


            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                padding: 1.1em 1.6em;
                display: inline-block;
                text-decoration: none;
                color: #8b969c;

                transform: scale(1) rotate(0deg) translateX(0px) translateY(0px) skewX(20deg) skewY(0deg);
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li {
                list-style-type: none;
                display: inline-block;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_02 );?>;
                cursor: pointer;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li:last-child {
                margin: 0 0 0 0.5em;
                border-right: none;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                text-decoration: none;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_04 );?>;
                padding: 1em 2em;
                font-family: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_08 );?>;
                font-size: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_07);?>px;
            }


            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:first-child:before,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:last-child:after {
                font-family: 'entypo';
                speak: none;
                font-style: normal;
                font-weight: normal;
                font-variant: normal;
                text-transform: none;
                line-height: 1;
            }


            <?php } elseif($get_timeline_style_options[0]->rw_timeline_03 == "Pagination 4") { ?>
            /*pagination4*/

            #pagination<?php echo esc_html($rw_ti_id);?> {
                text-align: center;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul {
                display: inline-flex;
                border-radius: 0;
                overflow: hidden;
                position: relative;
                cursor: pointer;
                align-items: center;
                justify-content: center;
                list-style: none;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                width: 45px;
                height: 45px;
                font-size: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_07 );?>px;
                font-family: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_08 );?>;
                font-weight: 700;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_04 );?>;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_02 );?>;
                padding: 6px;
                letter-spacing: 1px;
                line-height: 30px;
                text-transform: uppercase;
                margin: 5px;
                transition: box-shadow 0.2s, color -0.5s 1.25s;
            }


            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover {
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06 );?>;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;

            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_03 );?>;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
            }


            @media only screen and (max-width: 480px) {
                #pagination {
                    display: block;
                }

                #pagination li {
                    display: inline-block;
                    margin-bottom: 10px;
                }
            }

            <?php } elseif($get_timeline_style_options[0]->rw_timeline_03 == "Pagination 5") { ?>

            /*pagination 5*/

            #pagination<?php echo esc_html($rw_ti_id);?> {
                text-align: center;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul {
                display: inline-flex;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                list-style: none;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_04);?>;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_02 );?>;
                font-size: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_07);?>px;
                font-family: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_08);?>;
                font-weight: 700;
                line-height: 35px;
                margin: 0 10px 10px 0;
                border: 2px solid<?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_02 );?>;
                border-radius: 50%;
                overflow: hidden;
                position: relative;
                z-index: 1;
                transition: all 0.4s ease 0s;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                position: relative;
                float: left;
                padding: 4px 15px;
                margin-left: -1px;
                line-height: 1.42857143;
                text-decoration: none;

            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li:last-child a {
                margin-right: 0;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_03 );?>;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
                border: 2px solid<?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06 );?>;
                border: 2px solid<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_06 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover:after,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover:before {
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
                width: 100%;
                height: 100%;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:before,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:after {
                content: '';
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
                padding: 20px 24px;
                border-radius: 50%;
                transform: translateX(-50%);
                position: absolute;
                left: 50%;
                top: 70px;
                z-index: -1;
                transition: all 0.5s;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:after {
                top: 50px;
                transition-delay: 0.2s;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover:before,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a:before,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover:after,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a:after {
                top: 8px;
            }

            @media only screen and (max-width: 480px) {
                ul {
                    display: block;
                }

                ul li {
                    margin-bottom: 10px;
                    display: inline-block;
                }
            }

            <?php } elseif($get_timeline_style_options[0]->rw_timeline_03 == "Pagination 6") { ?>
            /*Pagination 6*/

            #pagination<?php echo esc_html($rw_ti_id);?> {
                text-align: center;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul {
                display: inline-flex;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                list-style: none;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                padding: 15px 20px;
                line-height: 35px;
                border-radius: 0;
                border: none;
                font-size: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_07 );?>px;
                font-family: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_08 );?>;
                font-weight: 700;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_04 );?>;
                letter-spacing: 1px;
                text-transform: uppercase;
                z-index: 1;
                margin: 0 10px 10px 0;
                position: relative;
                transition: all 0.4s ease 0s;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a:hover {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;
                background: transparent;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_03 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li:hover a:after {
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover:before {
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.previous a,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li.next a {
                height: 50px;
                line-height: 40px;
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
                font-size: 17px;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_04 );?>;
                -webkit-clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
                clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.next a {
                margin-right: 0;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.previous a:hover,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li.next a:hover {
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06 );?>;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;


            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:before {
                content: "";
                width: 0;
                height: 2px;
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_03 );?>;
                position: absolute;
                bottom: 0;
                left: 0;
                transition: all 0.3s ease 0s;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover:before,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a:before {
                width: 100%;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:after {
                content: "";
                width: 17px;
                height: 17px;
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
                margin: 0 auto;
                position: absolute;
                bottom: -7px;
                left: 0;
                right: 0;
                opacity: 0;
                -webkit-clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
                clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);

            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover:after,
            {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover:after,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a:after {
                opacity: 1;
                transform: rotate(1turn);
            }

            ul li:first-child a:hover:before,
            ul li:last-child a:hover:before,
            ul li:last-child a:hover:after,
            ul li:first-child a:hover:after {
                display: none;
            }

            @media only screen and (max-width: 480px) {
                ul {
                    display: block;
                }

                ul li {
                    display: inline-block;
                    margin-bottom: 10px;
                }
            }

            <?php } elseif($get_timeline_style_options[0]->rw_timeline_03 == "Pagination 7") { ?>
            /*Pagination 7*/

            #pagination {
                text-align: center;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul {

                display: inline-flex;
                border-radius: 50px;
                padding: 24px 8px;
                position: relative;
                list-style: none;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                list-style: none;
            }

            }
            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                color: #b71540;
                background: #fff;
                font-size: 20px;
                font-weight: 700;
                letter-spacing: 1px;
                line-height: 33px;
                width: 30px;
                height: 30px;
                margin: 0 10px;
                border-radius: 50%;
                border: none;
                transition: all 0.4s ease 0s;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_03 );?>;
                background: transparent;
                text-align: center;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a:hover {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05 );?>;
                background: transparent;
                text-align: center;
            }


            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:before,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:after {
                content: "";
                border-radius: 50%;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_04 );?>;
                position: absolute;
                top: -100%;
                z-index: -1;
                opacity: 0;
                transition: all 0.3s ease 0s;
                width: 100%;
                height: 100%;
                left: 0px;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li:hover a:before,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li:hover a:after {
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06 );?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.next a, #pagination<?php echo esc_html($rw_ti_id);?> ul li.previous a {
                width: unset;
                height: unset;
                padding: 20px;
                border-radius: 15px;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_04 );?>;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_02 );?>;
                line-height: 30px;
                transform: scale(1.2);
                font-weight: 700;
                letter-spacing: 1px;
                line-height: 33px;
                margin: 0 10px;
                border-radius: 50%;
                border: none;
                transition: all 0.2s ease 0s;

            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.previous:hover a {
                border-radius: 15px;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06);?>;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05);?>;
                box-shadow: 0 4px 8px 4px rgba(0, 0, 0, 0.4);
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.next:hover a {
                border-radius: 15px;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05);?>;
                background-color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06);?>;
                box-shadow: 0 4px 8px 4px rgba(0, 0, 0, 0.4);
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                margin-right: 20px;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                margin-left: 20px;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05);?>;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.next a:before {
                display: none;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.previous a:before {
                display: none;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a:hover:before,
            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a:before {
                box-shadow: 0 4px 8px 4px rgba(0, 0, 0, 0.4);
                opacity: 1;
                top: 0;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a:after {
                transform: scale(1.5);
                background-color: #fff;
                opacity: 0;
                z-index: 1;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li a {
                position: relative;
                overflow: hidden;
                margin: 14px;
                text-overflow: ellipsis;
                white-space: break-word;
                font-family: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_08);?>;
                font-size: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_07);?>px;
                width: 45px;
                height: 45px;
                float: left;
                line-height: 1px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li.active a {
                box-shadow: 0 4px 8px 4px rgba(0, 0, 0, 0.4);
            }

            #pagination<?php echo esc_html($rw_ti_id);?> ul li:hover a {
                box-shadow: 0 4px 8px 4px rgba(0, 0, 0, 0.4);
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05);?>;
            }

            <?php } ?>

            #loadMore<?php echo esc_html($rw_ti_id);?> {
                box-sizing: border-box;
                padding: 7px;
                text-align: center;
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_02);?>;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_04);?>;
                cursor: pointer;
                border-radius: 100px;
                border: 2px solid<?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_03);?>;
                font-size: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_07);?>px;
                font-family: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_08);?>;
            }


            #loadMore<?php echo esc_html($rw_ti_id);?>:hover {
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_06);?>;
                border: 2px solid<?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_03);?>;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_05);?>;
            }
        </style>
        <div class="rich_web_ti_content_<?php echo esc_html( $rw_ti_id ); ?>"
             style="<?php echo esc_html( $rw_ti_3 ); ?>">
			<?php if ( $get_timeline_style_options[0]->rw_timeline_theme == 3 ) { ?>
                <i id="slid_icon_left_<?php echo esc_html( $rw_ti_id ); ?>"
                   class="rich_web rich_web-<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_icon_type ); ?>-left"
                   style="font-style: normal;" aria-hidden="true"></i>
                <i id="slid_icon_right_<?php echo esc_html( $rw_ti_id ); ?>"
                   class="rich_web rich_web-<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_icon_type ); ?>-right"
                   style="font-style: normal;" aria-hidden="true"></i>
			<?php } ?>
            <div style="<?php echo esc_html( $ti_section ); ?> position: relative; margin-bottom: 25px;"
                 id="rich_web_div_block" class="rich_web_div_block_<?php echo esc_html( $rw_ti_id ); ?>">
                <input type="text" style="display: none;" name="" id="effect_val"
                       class="rich_web_effect_val_<?php echo esc_html( $rw_ti_id ); ?>"
                       value="<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_effect ); ?>">
                <section id="Rich_Web_BTimeline" class="rich_web_timeline_<?php echo esc_html( $rw_ti_id ); ?>"
                         style='display: none; cursor: default;'>
					<?php
					$list = array();
					for ( $i = 0; $i < count( $get_timeline_options ); $i ++ ) {
						$y = true;
						for ( $c = 0; $c < $i; $c ++ ) {
							if ( $get_timeline_options[ $c ]->rw_timeline_year == $get_timeline_options[ $i ]->rw_timeline_year ) {
								$y = false;
							}
						}
						if ( $y == true ) {
							array_push( $list, $get_timeline_options[ $i ]->rw_timeline_year );
						}
					}
					for ( $k = 0; $k < count( $list ); $k ++ ) {
						?>
                        <div id="year<?php echo esc_html( $list[ $k ] ); ?>"
                             class="group<?php echo esc_html( $list[ $k ] ); ?> year_block"
                             style="<?php echo esc_html( $style_ti ); ?> <?php echo esc_html( $rw_round_size ); ?> color: <?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_number_col ); ?>">
                            <span><?php echo esc_html( $list[ $k ] ); ?></span>
                        </div>
						<?php for ( $i = 0; $i < count( $get_timeline_options ); $i ++ ) {
							if ( $get_timeline_style_options[0]->rw_timeline_theme == 2 ) {
								if ( $get_timeline_options[ $i ]->rw_timeline_month == '01' ) {
									$rw_timeline_month = 'January';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '02' ) {
									$rw_timeline_month = 'February';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '03' ) {
									$rw_timeline_month = 'March';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '04' ) {
									$rw_timeline_month = 'April';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '05' ) {
									$rw_timeline_month = 'May';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '06' ) {
									$rw_timeline_month = 'June';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '07' ) {
									$rw_timeline_month = 'July';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '08' ) {
									$rw_timeline_month = 'August';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '09' ) {
									$rw_timeline_month = 'September';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '10' ) {
									$rw_timeline_month = 'October';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '11' ) {
									$rw_timeline_month = 'November';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '12' ) {
									$rw_timeline_month = 'December';
								}
							} else {
								if ( $get_timeline_options[ $i ]->rw_timeline_month == '01' ) {
									$rw_timeline_month = 'Jan';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '02' ) {
									$rw_timeline_month = 'Feb';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '03' ) {
									$rw_timeline_month = 'Mar';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '04' ) {
									$rw_timeline_month = 'Apr';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '05' ) {
									$rw_timeline_month = 'May';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '06' ) {
									$rw_timeline_month = 'Jun';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '07' ) {
									$rw_timeline_month = 'Jul';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '08' ) {
									$rw_timeline_month = 'Aug';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '09' ) {
									$rw_timeline_month = 'Sep';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '10' ) {
									$rw_timeline_month = 'Oct';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '11' ) {
									$rw_timeline_month = 'Nov';
								} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '12' ) {
									$rw_timeline_month = 'Dec';
								}
							}

							if ( $get_timeline_options[ $i ]->rw_timeline_year == $list[ $k ] ) {
								$data = array();
								?>
                                <article data-year="<?php echo esc_html( $list[ $k ] ); ?>" class="" data-tim="rw_tim"
                                         id="rich_web_timeline_article"
                                         style="overflow: visible; <?php echo esc_html( $ti_style_width ); ?> margin: 0 <?php echo esc_html( $style_ti_mb ); ?>; padding: 0; opacity:1; <?php echo esc_html( $ti_style_article ); ?>">
                                    <div class="rich_web_timeline_panel"
                                         style="margin: 0 <?php echo esc_html( $style_ti_p_mb ); ?>; <?php echo esc_html( $ti_panel_width ); ?> <?php echo esc_html( $ti_panel_style ); ?>">
                                        <div class="rich_web_timeline_badge"
                                             style="<?php echo esc_html( $style_ti_3 ); ?> font-size: 13.2px; border-color: <?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_border_col ); ?>"><?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_day . ' ' . $rw_timeline_month ); ?></div>
                                        <div class="rich_web_timeline_panel-body"
                                             style="<?php echo esc_html( $style_ti_panel_3 ); ?> border-color: <?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_border_col ); ?>">
                                            <h3 class="rich_web_timeline_group-title"
                                                style='margin: 0; display: block; text-align: center; padding: 5px 10px; background-color: <?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_title_bg_color ); ?>; text-transform: none; line-height: 0.8; font-size: <?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_font_size ); ?>px; font-family: <?php echo esc_html( $get_timeline_style_options[0]->rich_web_timeline_fonts ); ?>; color: <?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_title_col ); ?>'><?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_title ); ?></h3>
											<?php echo html_entity_decode( $get_timeline_options[ $i ]->rw_timeline_text ); ?>
                                        </div>
                                    </div>
                                </article>
							<?php }
						}
					} ?>
                </section>
            </div>
        </div>
		<?php if ( $get_timeline_style_options[0]->rw_timeline_theme != 3 ) { ?>
			<?php if ( $get_timeline[0]->rw_timeline_01 == "Pagination" ) { ?>
                <div id="pagination<?php echo esc_html( $rw_ti_id ); ?>"></div>
			<?php } ?>
			<?php if ( $get_timeline[0]->rw_timeline_01 == "Load More" ) { ?>
                <div id="loadMore<?php echo esc_html( $rw_ti_id ); ?>"><?php echo esc_html( $get_timeline[0]->rw_timeline_03 ); ?></div>
			<?php } ?>
		<?php } ?>
		<?php if ( $get_timeline_style_options[0]->rw_timeline_theme != 3 ) { ?>
            <script type="text/javascript">
                let pages = <?php echo esc_html( ceil( count( $get_timeline_options ) / $get_timeline[0]->rw_timeline_02 ) );?>;
                let count = <?php echo esc_html( $get_timeline[0]->rw_timeline_02 );?>;
                let showType = "<?php echo esc_html( $get_timeline[0]->rw_timeline_01 );?>";


                // loadMore
                if (showType == "Load More") {
                    document.getElementById('loadMore<?php echo esc_html( $rw_ti_id );?>').onclick = createLoadMore;
                }
                var counter = 1;

                function createLoadMore() {
                    if (counter == pages) {
                        jQuery("#loadMore<?php echo esc_html( $rw_ti_id );?>").hide();
                    }
                    if (showType != "Load More") {
                        return;
                    }
                    var allTimeLines = document.querySelectorAll("article[data-tim='rw_tim']");
                    var array = [];
                    for (var i = 0; i < allTimeLines.length; i++) {
                        allTimeLines[i].style.display = "none"

                    }

                    for (var i = 0; i < count * counter; i++) {
                        allTimeLines[i].style.display = "block";
                        array.push(allTimeLines[i].dataset.year);
                    }


                    var allYears = document.querySelectorAll(".year_block span");
                    var allYearsArr = [...allYears];
                    allYearsArr.forEach(function (item, index) {
                        allYearsArr[index].parentElement.style.display = "block";
                        var y = array.some(function (value) {
                            return value == item.innerText;
                        })
                        if (y == false) {
                            allYearsArr[index].parentElement.style.display = "none";
                        }
                    })

                    counter++
                }

                createLoadMore();


                // pagination
                if (showType == "Pagination") {
                    document.getElementById('pagination<?php echo esc_html( $rw_ti_id );?>').innerHTML = createPagination(pages, 0);
                }

                function createPagination(pages, page) {
                    if (showType != "Pagination") {
                        return;
                    }

                    if (page != 0) {
                        jQuery("html, body").animate({scrollTop: jQuery('.rich_web_ti_content_<?php echo esc_html( $rw_ti_id );?>').position().top + 80}, 1000);
                    } else {
                        page = 1;
                    }

                    var allTimeLines = document.querySelectorAll("article[data-tim='rw_tim']");
                    var array = [];
                    for (var i = 0; i < allTimeLines.length; i++) {
                        allTimeLines[i].style.display = "none"
                        if (i >= count * (page - 1) && i < page * count) {
                            allTimeLines[i].style.display = "block";
                            array.push(allTimeLines[i].dataset.year);
                        }
                    }


                    var allYears = document.querySelectorAll(".year_block span");
                    var allYearsArr = [...allYears];
                    allYearsArr.forEach(function (item, index) {
                        allYearsArr[index].parentElement.style.display = "block";
                        var y = array.some(function (value) {
                            return value == item.innerText;
                        })
                        if (y == false) {
                            allYearsArr[index].parentElement.style.display = "none";
                        }
                    })

                    let str = '<ul>';
                    let active;
                    let pageCutLow = page - 1;
                    let pageCutHigh = page + 1;
                    // Show the Previous button only if you are on a page other than the first
                    if (page > 1) {
                        str += '<li class="page-item previous no"><a onclick="createPagination(pages, ' + (page - 1) + ')"><?php echo esc_html( $get_timeline[0]->rw_timeline_04 );?></a></li>';
                    }
                    // Show all the pagination elements if there are less than 6 pages total
                    if (pages < 6) {
                        for (let p = 1; p <= pages; p++) {
                            active = page == p ? "active" : "no";
                            str += '<li class="' + active + '"><a onclick="createPagination(pages, ' + p + ')">' + p + '</a></li>';
                        }
                    }
                    // Use "..." to collapse pages outside of a certain range
                    else {
                        // Show the very first page followed by a "..." at the beginning of the
                        // pagination section (after the Previous button)
                        if (page > 2) {
                            str += '<li class="no page-item"><a onclick="createPagination(pages, 1)">1</a></li>';
                            if (page > 3) {
                                str += '<li class="out-of-range"><a onclick="createPagination(pages,' + (page - 2) + ')">..</a></li>';
                            }
                        }
                        // Determine how many pages to show after the current page index
                        if (page === 1) {
                            pageCutHigh += 2;
                        } else if (page === 2) {
                            pageCutHigh += 1;
                        }
                        // Determine how many pages to show before the current page index
                        if (page === pages) {
                            pageCutLow -= 2;
                        } else if (page === pages - 1) {
                            pageCutLow -= 1;
                        }
                        // Output the indexes for pages that fall inside the range of pageCutLow
                        // and pageCutHigh
                        for (let p = pageCutLow; p <= pageCutHigh; p++) {
                            if (p === 0) {
                                p += 1;
                            }
                            if (p > pages) {
                                continue
                            }
                            active = page == p ? "active" : "no";
                            str += '<li class="page-item ' + active + '"><a onclick="createPagination(pages, ' + p + ')">' + p + '</a></li>';
                        }
                        // Show the very last page preceded by a "..." at the end of the pagination
                        // section (before the Next button)
                        if (page < pages - 1) {
                            if (page < pages - 2) {
                                str += '<li class="out-of-range"><a onclick="createPagination(pages,' + (page + 2) + ')">..</a></li>';
                            }
                            str += '<li class="page-item no"><a onclick="createPagination(pages, pages)">' + pages + '</a></li>';
                        }
                    }
                    // Show the Next button only if you are on a page other than the last
                    if (page < pages) {
                        str += '<li class="page-item next no"><a onclick="createPagination(pages, ' + (page + 1) + ')"><?php echo esc_html( $get_timeline[0]->rw_timeline_05 );?></a></li>';
                    }
                    str += '</ul>';
                    // Return the pagination string to be outputted in the pug templates
                    document.getElementById('pagination<?php echo esc_html( $rw_ti_id );?>').innerHTML = str;
                    return str;
                }
            </script>
		<?php } ?>
        <script>
            jQuery(document).ready(function () {
                var count_article_<?php echo esc_html( $rw_ti_id );?> = jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?> article').length;
                count_article_<?php echo esc_html( $rw_ti_id );?>++;
                for (var i = 1; i < count_article_<?php echo esc_html( $rw_ti_id );?>; i++) {
                    if (i % 2 == 0) {
                        jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?> article:nth-of-type(' + parseInt(parseInt(i)) + ')').attr('class', 'inverted animated');
                    } else {
                        jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?> article:nth-of-type(' + parseInt(parseInt(i)) + ')').attr('class', 'animated');
                    }
                }
                var i_<?php echo esc_html( $rw_ti_id );?> = 0;
                jQuery('#slid_icon_left_<?php echo esc_html( $rw_ti_id );?>').click(function () {
                    var t_width_<?php echo esc_html( $rw_ti_id );?> = jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?>').width();
                    var div_width_<?php echo esc_html( $rw_ti_id );?> = jQuery('.rich_web_div_block_<?php echo esc_html( $rw_ti_id );?>').width();
                    i_<?php echo esc_html( $rw_ti_id );?>--;

                    var timline_left_<?php echo esc_html( $rw_ti_id );?> = t_width_<?php echo esc_html( $rw_ti_id );?> + jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?>').offset().left;
                    var div_left_<?php echo esc_html( $rw_ti_id );?> = div_width_<?php echo esc_html( $rw_ti_id );?> + jQuery('.rich_web_div_block_<?php echo esc_html( $rw_ti_id );?>').offset().left;

                    if (jQuery('.rich_web_div_block_<?php echo esc_html( $rw_ti_id );?>').offset().left < jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?>').offset().left) {
                        i_<?php echo esc_html( $rw_ti_id );?> = parseInt((timline_left_<?php echo esc_html( $rw_ti_id );?> - div_width_<?php echo esc_html( $rw_ti_id );?>) / 110);
                        jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?>').animate({'right': (timline_left_<?php echo esc_html( $rw_ti_id );?> - div_width_<?php echo esc_html( $rw_ti_id );?>) + 'px'}, 500);
                    } else {
                        var slidwidth_<?php echo esc_html( $rw_ti_id );?> = 110 * i_<?php echo esc_html( $rw_ti_id );?>;
                        jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?>').animate({'right': slidwidth_<?php echo esc_html( $rw_ti_id );?>+ 'px'}, 500);
                    }
                });
                jQuery('#slid_icon_right_<?php echo esc_html( $rw_ti_id );?>').click(function () {
                    var t_width_<?php echo esc_html( $rw_ti_id );?> = jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?>').width();
                    var div_width_<?php echo esc_html( $rw_ti_id );?> = jQuery('.rich_web_div_block_<?php echo esc_html( $rw_ti_id );?>').width();
                    i_<?php echo esc_html( $rw_ti_id );?>++;
                    var timline_left_<?php echo esc_html( $rw_ti_id );?> = t_width_<?php echo esc_html( $rw_ti_id );?> + jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?>').offset().left;
                    var div_left_<?php echo esc_html( $rw_ti_id );?> = div_width_<?php echo esc_html( $rw_ti_id );?> + jQuery('.rich_web_div_block_<?php echo esc_html( $rw_ti_id );?>').offset().left;
                    if (timline_left_<?php echo esc_html( $rw_ti_id );?> > div_left_<?php echo esc_html( $rw_ti_id );?>) {
                        var slidwidth_<?php echo esc_html( $rw_ti_id );?> = 110 * i_<?php echo esc_html( $rw_ti_id );?>;
                        jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?>').animate({'right': slidwidth_<?php echo esc_html( $rw_ti_id );?>+ 'px'}, 500);
                    } else {
                        i_<?php echo esc_html( $rw_ti_id );?> = 0;
                        jQuery('.rich_web_timeline_<?php echo esc_html( $rw_ti_id );?>').animate({'right': 0 + 'px'}, 500);
                    }
                });

                function runEffect_<?php echo esc_html( $rw_ti_id );?>() {
                    var selectedEffect = jQuery(".rich_web_effect_val_<?php echo esc_html( $rw_ti_id );?>").val();
                    var options = {};
                    if (selectedEffect === "fold") {
                        options = {horizFirst: true};
                    } else if (selectedEffect === "puff") {
                        options = {percent: 200};
                    } else if (selectedEffect === "drop") {
                        options = {direction: "left"};
                    }
                    jQuery(".rich_web_timeline_<?php echo esc_html( $rw_ti_id );?>").show(selectedEffect, options, 2500);
                };
                var rw_div_height_<?php echo esc_html( $rw_ti_id );?> = jQuery('.rich_web_div_block_<?php echo esc_html( $rw_ti_id );?>').offset().top;
                var rw_window_height_<?php echo esc_html( $rw_ti_id );?> = jQuery(window).height();
                var rw_scroll_height_<?php echo esc_html( $rw_ti_id );?> = jQuery(this).scrollTop();
                if (rw_div_height_<?php echo esc_html( $rw_ti_id );?> > rw_window_height_<?php echo esc_html( $rw_ti_id );?>) {
                    var x_height_<?php echo esc_html( $rw_ti_id );?> = rw_div_height_<?php echo esc_html( $rw_ti_id );?> - rw_window_height_<?php echo esc_html( $rw_ti_id );?>;
                } else {
                    runEffect_<?php echo esc_html( $rw_ti_id );?>();
                }
                if (jQuery(this).scrollTop() > x_height_<?php echo esc_html( $rw_ti_id );?>) {
                    runEffect_<?php echo esc_html( $rw_ti_id );?>();
                }
                jQuery(window).scroll(function () {
                    if (jQuery(this).scrollTop() > x_height_<?php echo esc_html( $rw_ti_id );?>) {
                        runEffect_<?php echo esc_html( $rw_ti_id );?>();
                    }
                });
            });
        </script>
	<?php }
	if ( $get_timeline_style_options[0]->rw_timeline_theme == 5 or $get_timeline_style_options[0]->rw_timeline_theme == 6 ) {
		if ( $get_timeline_style_options[0]->rw_timeline_theme == 5 ) {
			$rw_orientation = 'horizontal';
			$rw_arrowkeys   = 'true';
			$rw_issuespeed  = 'slow';
			$rw_dataspeed   = 'normal';
			$rw_icon_right  = 'right';
			$rw_icon_left   = 'left';
			$rw_date_div    = "width: 100%; position: relative;";
			$rw_date_pDiv   = "height: 100px; margin-left: 80px; margin-right: 80px; overflow: hidden;";
			?>
            <style>
                #rw_timeline_<?php echo esc_html($rw_ti_id);?> {
                    width: 100%;
                    padding: 0 !important;
                    box-sizing: content-box !important;
                    -moz-box-sizing: content-box !important;
                    -webkit-box-sizing: content-box !important;
                    height: 350px;
                    overflow: hidden;
                    margin: 0px auto;
                    position: relative;
                    cursor: default;
                }

                #rw_dates_<?php echo esc_html($rw_ti_id);?> {
                    height: 100%;
                }

                #rw_dates_<?php echo esc_html($rw_ti_id);?> li {
                    list-style: none;
                    height: 100% !important;
                    padding: 0;
                    line-height: 30px;
                    float: left;
                    width: 100px;
                    font-size: 24px;
                    text-align: center;
                    position: relative;
                }

                #rw_dates_<?php echo esc_html($rw_ti_id);?> a {
                    padding: 0;
                }

                #rw_dates_<?php echo esc_html($rw_ti_id);?> .selected {
                    font-size: 38px;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_color_hover);?> !important;
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> {
                    width: 100%;
                    height: 350px;
                    overflow: hidden;
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> li {
                    width: 100%;
                    height: 350px;
                    margin: 0 !important;
                    opacity: 1 !important;
                    list-style: none;
                    float: left;
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> li.selected img {
                    -webkit-transform: scale(1.1, 1.1);
                    -moz-transform: scale(1.1, 1.1);
                    -o-transform: scale(1.1, 1.1);
                    -ms-transform: scale(1.1, 1.1);
                    transform: scale(1.1, 1.1);
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> li img {
                    float: left;
                    margin: 10px 30px 10px 50px;
                    background: transparent;
                    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF,endColorstr=#00FFFFFF)";
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF, endColorstr=#00FFFFFF);
                    zoom: 1;
                    -webkit-transition: all 2s ease-in-out;
                    -moz-transition: all 2s ease-in-out;
                    -o-transition: all 2s ease-in-out;
                    -ms-transition: all 2s ease-in-out;
                    transition: all 2s ease-in-out;
                    -webkit-transform: scale(0.7, 0.7);
                    -moz-transform: scale(0.7, 0.7);
                    -o-transform: scale(0.7, 0.7);
                    -ms-transform: scale(0.7, 0.7);
                    transform: scale(0.7, 0.7);
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> li h1 {
                    color: #ffcc00;
                    font-size: 48px;
                    margin: 20px 0;
                    text-shadow: #000 1px 1px 2px;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> {
                    width: 100%;
                    height: 450px;
                    max-width: 100%;
                    background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color);?> !important;
                    box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?> !important;
                    -moz-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?> !important;
                    -webkit-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?> !important;
                    border: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_type_article);?> <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_col);?>;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?>:hover {
                    box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?> !important;
                    -moz-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?> !important;
                    -webkit-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?> !important;
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> li.selected img {
                    width: 30% !important;
                    height: auto !important;
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> {
                    height: 100%;
                    padding: 20px 0 0 0 !important;
                    box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    -webkit-box-sizing: content-box;
                }

                #rw_next_<?php echo esc_html($rw_ti_id);?> {
                    position: absolute;
                    z-index: 999 !important;
                    bottom: 15px;
                    font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_size);?>px;
                    font-weight: bold;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_color);?> !important;
                    cursor: pointer;
                    right: 40px;
                }

                #rw_prev_<?php echo esc_html($rw_ti_id);?> {
                    position: absolute;
                    z-index: 999 !important;
                    bottom: 15px;
                    font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_size);?>px;
                    font-weight: bold;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_color);?> !important;
                    cursor: pointer;
                    left: 37px;
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> li {
                    height: 100%;
                }

                .rw_content_div_<?php echo esc_html($rw_ti_id);?> {
                    max-height: calc(100% - 85px);
                    overflow-x: hidden;
                    padding: 0 35px;
                }

                .rw_content_div_<?php echo esc_html($rw_ti_id);?>::-webkit-scrollbar {
                    width: 0.5em;
                }

                .rw_content_div_<?php echo esc_html($rw_ti_id);?>::-webkit-scrollbar-track {
                    -webkit-box-shadow: inset 0 0 6px;
                }

                .rw_content_div_<?php echo esc_html($rw_ti_id);?>::-webkit-scrollbar-thumb {
                    background-color: #ffffff;
                    outline: #ffffff;
                }

                .rw_content_div_<?php echo esc_html($rw_ti_id);?> li {
                    opacity: 1 !important;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_year_<?php echo esc_html($rw_ti_id);?> {
                    height: 55px;
                    margin: 15px 0 0 -35px !important;
                    border-bottom: 1px solid<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_line_col);?>;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> li:before {
                    content: none;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_year_<?php echo esc_html($rw_ti_id);?> #rw_dates_<?php echo esc_html($rw_ti_id);?> li a {
                    outline: none;
                    box-shadow: none !important;
                    -moz-box-shadow: none !important;
                    -webkit-box-shadow: none !important;
                    text-decoration: none !important;
                    border: none;
                    vertical-align: initial;
                    display: inline;
                    line-height: 1px;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_number_col);?>;
                    font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_size);?>px;
                    height: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_size);?>px;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_year_<?php echo esc_html($rw_ti_id);?> #rw_dates_<?php echo esc_html($rw_ti_id);?> li a:focus {
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_color_hover);?>;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_year_<?php echo esc_html($rw_ti_id);?> #rw_dates_<?php echo esc_html($rw_ti_id);?> li span.rw_round_<?php echo esc_html($rw_ti_id);?> {
                    margin: 0 auto;
                    z-index: 5;
                    width: 15px;
                    height: 15px;
                    background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg);?>;
                    display: block;
                    position: absolute;
                    transform: translateY(-50%);
                    -moz-transform: translateY(-50%);
                    -webkit-transform: translateY(-50%);
                    left: 1px;
                    right: 0;
                    top: 100%;
                    border: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px solid<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>;
                    border-radius: 50%;
                    box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    -webkit-box-sizing: content-box;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_year_<?php echo esc_html($rw_ti_id);?> #rw_dates_<?php echo esc_html($rw_ti_id);?> li:hover span.rw_round_<?php echo esc_html($rw_ti_id);?> {
                    background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg_hover);?>;
                    border: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px solid<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col_hover);?>;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_issues_<?php echo esc_html($rw_ti_id);?> .rw_resp_li_<?php echo esc_html($rw_ti_id);?> .rw_title_<?php echo esc_html($rw_ti_id);?> {
                    text-transform: none !important;
                    background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_title_bg_color);?>;
                    padding: 10px;
                    margin: 0;
                    font-family: <?php echo esc_html($get_timeline_style_options[0]->rich_web_timeline_fonts);?> !important;
                    line-height: 1;
                    font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_font_size);?>px !important;
                    text-align: center;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_title_col);?>;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_issues_<?php echo esc_html($rw_ti_id);?> .rw_resp_li_<?php echo esc_html($rw_ti_id);?> .rw_title_<?php echo esc_html($rw_ti_id);?>:hover {
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_hover_color);?> !important;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> .rw_md_<?php echo esc_html($rw_ti_id);?> {
                    font-size: 12px;
                    display: block;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_color);?>;
                    line-height: 1;
                    height: 12px;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> .rw_md_<?php echo esc_html($rw_ti_id);?>:hover {
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_color_hover);?>;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> pre {
                    background: none !important;
                    padding: 0 !important;
                    margin: 0 !important;
                    border: none !important;
                    outline: none !important;
                    box-shadow: none !important;
                    -moz-box-shadow: none !important;
                    -webkit-box-shadow: none !important;
                }
            </style>
		<?php }
		if ( $get_timeline_style_options[0]->rw_timeline_theme == 6 ) {
			$rw_orientation = 'vertical';
			$rw_arrowkeys   = 'true';
			$rw_issuespeed  = 300;
			$rw_dataspeed   = 100;
			$rw_icon_right  = 'down';
			$rw_icon_left   = 'up';
			?>
            <style>
                .sociales {
                    text-align: center;
                    margin-bottom: 20px;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> {
                    max-width: 100%;
                    min-width: 100px;
                    height: 520px;
                    padding: 0 !important;
                    margin: 0 !important;
                    overflow: hidden;
                    position: relative;
                    background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color);?> !important;
                    box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?> !important;
                    -moz-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?> !important;
                    -webkit-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?> !important;
                    border: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_type_article);?> <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_col);?>;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?>:hover {
                    box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?> !important;
                    -moz-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?> !important;
                    -webkit-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?> !important;
                }

                #rw_dates_<?php echo esc_html($rw_ti_id);?> {
                    width: 100px !important;
                    height: 600px !important;
                    padding: 0 !important;
                    margin-left: 0 !important;
                    float: left;
                }

                #rw_dates_<?php echo esc_html($rw_ti_id);?> li {
                    list-style: none;
                    width: 100px;
                    margin: 0 0 0 15px !important;
                    padding: 0 !important;
                    height: 100px;
                    font-size: 24px;
                }

                #rw_dates_<?php echo esc_html($rw_ti_id);?> li:before {
                    content: none;
                }

                #rw_dates_<?php echo esc_html($rw_ti_id);?> a {
                    line-height: 38px;
                    padding-bottom: 10px;
                    box-shadow: none !important;
                    -moz-box-shadow: none !important;
                    -webkit-box-shadow: none !important;
                }

                #rw_dates_<?php echo esc_html($rw_ti_id);?> .selected {
                    font-size: 38px;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_color_hover);?> !important;
                }

                .rw_content_div_<?php echo esc_html($rw_ti_id);?>::-webkit-scrollbar {
                    width: 0.5em;
                }

                .rw_content_div_<?php echo esc_html($rw_ti_id);?>::-webkit-scrollbar-track {
                    -webkit-box-shadow: inset 0 0 6px;
                }

                .rw_content_div_<?php echo esc_html($rw_ti_id);?>::-webkit-scrollbar-thumb {
                    background-color: #ffffff;
                    outline: #ffffff;
                }

                .rw_content_div_<?php echo esc_html($rw_ti_id);?> li {
                    opacity: 1 !important;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_year_<?php echo esc_html($rw_ti_id);?> #rw_dates_<?php echo esc_html($rw_ti_id);?> li span.rw_round_<?php echo esc_html($rw_ti_id);?> {
                    margin: 0 auto;
                    z-index: 5;
                    width: 15px;
                    height: 15px;
                    background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg);?>;
                    display: block;
                    position: relative;
                    transform: translateY(-50%);
                    -moz-transform: translateY(-50%);
                    -webkit-transform: translateY(-50%);
                    left: -65px;
                    bottom: 22px;
                    border: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px solid<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col);?>;
                    box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    -webkit-box-sizing: content-box;
                    border-radius: 50%;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_year_<?php echo esc_html($rw_ti_id);?> #rw_dates_<?php echo esc_html($rw_ti_id);?> li:hover span.rw_round_<?php echo esc_html($rw_ti_id);?> {
                    background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_bg_hover);?>;
                    border: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_px);?>px solid<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_round_border_col_hover);?>;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_issues_<?php echo esc_html($rw_ti_id);?> .rw_resp_li_<?php echo esc_html($rw_ti_id);?> .rw_title_<?php echo esc_html($rw_ti_id);?> {
                    text-transform: none !important;
                    background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_title_bg_color);?>;
                    padding: 10px;
                    margin: 0;
                    font-family: <?php echo esc_html($get_timeline_style_options[0]->rich_web_timeline_fonts);?> !important;
                    line-height: 1;
                    font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_font_size);?>px !important;
                    text-align: center;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_title_col);?>;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_issues_<?php echo esc_html($rw_ti_id);?> .rw_resp_li_<?php echo esc_html($rw_ti_id);?>:before {
                    content: none;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_issues_<?php echo esc_html($rw_ti_id);?> .rw_resp_li_<?php echo esc_html($rw_ti_id);?> .rw_title_<?php echo esc_html($rw_ti_id);?>:hover {
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_hover_color);?> !important;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_year_<?php echo esc_html($rw_ti_id);?> {
                    height: 600px;
                    width: 100px;
                    margin: 0 0 0 12px;
                    border-left: 1px solid<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_line_col);?>;
                    float: left;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> #rw_year_<?php echo esc_html($rw_ti_id);?> #rw_dates_<?php echo esc_html($rw_ti_id);?> li a {
                    text-decoration: none !important;
                    box-shadow: none !important;
                    -moz-box-shadow: none !important;
                    -webkit-box-shadow: none !important;
                    outline: none !important;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_number_col);?>;
                    font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_size);?>px;
                    height: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_size);?>px;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> .rw_md_<?php echo esc_html($rw_ti_id);?> {
                    font-size: 12px;
                    display: block;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_color);?>;
                    line-height: 1;
                    height: 12px;
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> .rw_md_<?php echo esc_html($rw_ti_id);?>:hover {
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_color_hover);?>;
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> {
                    max-width: 100%;
                    height: 600px;
                }

                .rw_content_div_<?php echo esc_html($rw_ti_id);?> {
                    padding-right: 10px;
                    max-height: 420px;
                    margin: 0 10px 0 10px;
                    min-width: 100px;
                    overflow-x: hidden;
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> li {
                    height: 600px;
                    list-style: none;
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> li.selected img {
                    -webkit-transform: scale(1.1, 1.1);
                    -moz-transform: scale(1.1, 1.1);
                    -o-transform: scale(1.1, 1.1);
                    -ms-transform: scale(1.1, 1.1);
                    transform: scale(1.1, 1.1);
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> li img {
                    float: left;
                    margin: 10px 30px 10px 50px;
                    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF,endColorstr=#00FFFFFF)";
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF, endColorstr=#00FFFFFF);
                    zoom: 1;
                    -webkit-transition: all 2s ease-in-out;
                    -moz-transition: all 2s ease-in-out;
                    -o-transition: all 2s ease-in-out;
                    -ms-transition: all 2s ease-in-out;
                    transition: all 2s ease-in-out;
                    -webkit-transform: scale(0.7, 0.7);
                    -moz-transform: scale(0.7, 0.7);
                    -o-transform: scale(0.7, 0.7);
                    -ms-transform: scale(0.7, 0.7);
                    transform: scale(0.7, 0.7);
                }

                #rw_issues_<?php echo esc_html($rw_ti_id);?> li h1 {
                    color: #ffcc00;
                    font-size: 48px;
                    text-align: center;
                    text-shadow: #000 1px 1px 2px;
                }

                #rw_next_<?php echo esc_html($rw_ti_id);?> {
                    position: absolute;
                    z-index: 999 !important;
                    bottom: 2%;
                    right: 50%;
                    font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_size);?>px;
                    font-weight: bold;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_color);?> !important;
                    cursor: pointer;
                    transform: translateX(50%);
                    -moz-transform: translateX(50%);
                    -webkit-transform: translateX(50%);
                }

                #rw_prev_<?php echo esc_html($rw_ti_id);?> {
                    position: absolute;
                    z-index: 999 !important;
                    top: 2%;
                    right: 50%;
                    font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_size);?>px;
                    font-weight: bold;
                    color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_color);?> !important;
                    cursor: pointer;
                    transform: translateX(50%);
                    -moz-transform: translateX(50%);
                    -webkit-transform: translateX(50%);
                }

                #rw_timeline_<?php echo esc_html($rw_ti_id);?> pre {
                    background: none !important;
                    padding: 0 !important;
                    margin: 0 !important;
                    border: none !important;
                    outline: none !important;
                    box-shadow: none !important;
                    -moz-box-shadow: none !important;
                    -webkit-box-shadow: none !important;
                }
            </style>
		<?php } ?>
        <input type="text" style="display: none;" name="" id="effect_val"
               class="rich_web_effect_val_<?php echo esc_html( $rw_ti_id ); ?>"
               value="<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_effect ); ?>">
        <div style="position: relative; display: none; margin-bottom: 30px;"
             id="rw_ti_cont_<?php echo esc_html( $rw_ti_id ); ?>">
            <div id="rw_timeline_<?php echo esc_html( $rw_ti_id ); ?>">
                <div style="<?php echo esc_html( $rw_date_div ); ?>">
                    <i id="rw_next_<?php echo esc_html( $rw_ti_id ); ?>"
                       class="rich_web rich_web-<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_icon_type ); ?>-<?php echo esc_html( $rw_icon_right ); ?>"
                       style="font-style: normal;" aria-hidden="true"></i>
                    <i id="rw_prev_<?php echo esc_html( $rw_ti_id ); ?>"
                       class="rich_web rich_web-<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_icon_type ); ?>-<?php echo esc_html( $rw_icon_left ); ?>"
                       style="font-style: normal;" aria-hidden="true"></i>
                    <div style="<?php echo esc_html( $rw_date_pDiv ); ?>">
                        <div id="rw_year_<?php echo esc_html( $rw_ti_id ); ?>">
                            <ul id="rw_dates_<?php echo esc_html( $rw_ti_id ); ?>">
								<?php
								for ( $i = 0; $i < count( $get_timeline_options ); $i ++ ) {
									if ( $get_timeline_options[ $i ]->rw_timeline_month == '01' ) {
										$rw_timeline_month = 'Jan';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '02' ) {
										$rw_timeline_month = 'Feb';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '03' ) {
										$rw_timeline_month = 'Mar';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '04' ) {
										$rw_timeline_month = 'Apr';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '05' ) {
										$rw_timeline_month = 'May';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '06' ) {
										$rw_timeline_month = 'Jun';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '07' ) {
										$rw_timeline_month = 'Jul';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '08' ) {
										$rw_timeline_month = 'Aug';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '09' ) {
										$rw_timeline_month = 'Sep';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '10' ) {
										$rw_timeline_month = 'Oct';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '11' ) {
										$rw_timeline_month = 'Nov';
									} else if ( $get_timeline_options[ $i ]->rw_timeline_month == '12' ) {
										$rw_timeline_month = 'Dec';
									}
									?>
                                    <li class="">
                                        <a href="#<?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_year ); ?>"><?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_year ); ?>
                                            <span class="rw_md_<?php echo esc_html( $rw_ti_id ); ?>"><?php echo esc_html( $rw_timeline_month ); ?> - <?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_day ); ?></span></a>
                                        <span class="rw_round_<?php echo esc_html( $rw_ti_id ); ?>"></span>
                                    </li>
								<?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
				<?php if ( $get_timeline_style_options[0]->rw_timeline_theme == 6 ) { ?>
                    <div style="height: 50px; width: 1px;"></div> <?php } ?>
                <ul id="rw_issues_<?php echo esc_html( $rw_ti_id ); ?>" style="margin: 0;">
					<?php for ( $i = 0; $i < count( $get_timeline_options ); $i ++ ) { ?>
                        <li class="rw_resp_li_<?php echo esc_html( $rw_ti_id ); ?>" style="width: 100%;">
                            <div class="rw_content_div_<?php echo esc_html( $rw_ti_id ); ?>">
                                <h3 class="rw_title_<?php echo esc_html( $rw_ti_id ); ?>"><?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_title ); ?></h3>
								<?php echo html_entity_decode( $get_timeline_options[ $i ]->rw_timeline_text ); ?>
                            </div>
                        </li>
					<?php } ?>
                </ul>
            </div>
        </div>
        <script>
            jQuery.fn.timelinr_<?php echo esc_html( $rw_ti_id );?> = function (options_<?php echo esc_html( $rw_ti_id );?>) {
                settings_<?php echo esc_html( $rw_ti_id );?> = jQuery.extend({
                    orientation_<?php echo esc_html( $rw_ti_id );?>: "<?php echo esc_html( $rw_orientation );?>",
                    containerDiv_<?php echo esc_html( $rw_ti_id );?>: "#rw_timeline_<?php echo esc_html( $rw_ti_id );?>",
                    datesDiv_<?php echo esc_html( $rw_ti_id );?>: "#rw_dates_<?php echo esc_html( $rw_ti_id );?>",
                    datesSelectedClass_<?php echo esc_html( $rw_ti_id );?>: 'selected',
                    datesSpeed_<?php echo esc_html( $rw_ti_id );?>: "<?php echo esc_html( $rw_dataspeed );?>",
                    issuesDiv_<?php echo esc_html( $rw_ti_id );?>: "#rw_issues_<?php echo esc_html( $rw_ti_id );?>",
                    issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>: 'selected',
                    issuesSpeed_<?php echo esc_html( $rw_ti_id );?>: "<?php echo esc_html( $rw_issuespeed );?>",
                    issuesTransparency_<?php echo esc_html( $rw_ti_id );?>: 0.2,
                    issuesTransparency_<?php echo esc_html( $rw_ti_id );?>Speed: 500,
                    prevButton_<?php echo esc_html( $rw_ti_id );?>: "#rw_prev_<?php echo esc_html( $rw_ti_id );?>",
                    nextButton_<?php echo esc_html( $rw_ti_id );?>: "#rw_next_<?php echo esc_html( $rw_ti_id );?>",
                    arrowKeys_<?php echo esc_html( $rw_ti_id );?>: "<?php echo esc_html( $rw_arrowkeys );?>",
                    startAt_<?php echo esc_html( $rw_ti_id );?>: 1,
                    autoPlay_<?php echo esc_html( $rw_ti_id );?>: 'false',
                    autoPlay_<?php echo esc_html( $rw_ti_id );?>Direction: 'forward',
                    autoPlay_<?php echo esc_html( $rw_ti_id );?>Pause: 2000
                }, options_<?php echo esc_html( $rw_ti_id );?>);
                jQuery(function () {
                    if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).length > 0 && jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).length > 0) {
                        var howManyDates_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').length;
                        var howManyIssues_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').length;
                        var currentDate_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).find('a.' + settings_<?php echo esc_html( $rw_ti_id );?>.datesSelectedClass_<?php echo esc_html( $rw_ti_id );?>);
                        var currentIssue_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).find('li.' + settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>);
                        var widthContainer_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.containerDiv_<?php echo esc_html( $rw_ti_id );?>).width();
                        var heightContainer_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.containerDiv_<?php echo esc_html( $rw_ti_id );?>).height();
                        var widthIssue_<?php echo esc_html( $rw_ti_id );?>s_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).width();
                        var heightIssue_<?php echo esc_html( $rw_ti_id );?>s_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).height();
                        var widthIssue_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').width();
                        var heightIssue_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').height();
                        var widthDate_<?php echo esc_html( $rw_ti_id );?>s_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).width();
                        var heightDate_<?php echo esc_html( $rw_ti_id );?>s_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).height();
                        var widthDate_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').width();
                        var heightDate_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').height();
                        if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?> == 'horizontal') {
                            jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).width(widthIssue_<?php echo esc_html( $rw_ti_id );?>* howManyIssues_<?php echo esc_html( $rw_ti_id );?>);
                            jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).width(widthDate_<?php echo esc_html( $rw_ti_id );?>* howManyDates_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft', widthContainer_<?php echo esc_html( $rw_ti_id );?>/ 2.5 - widthDate_<?php echo esc_html( $rw_ti_id );?>/ 2);
                            var defaultPositionDates = parseInt(jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft').substring(0, jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft').indexOf('px')));
                        } else if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?> == 'vertical') {
                            jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).height(heightIssue_<?php echo esc_html( $rw_ti_id );?>* howManyIssues_<?php echo esc_html( $rw_ti_id );?>);
                            jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).height(heightDate_<?php echo esc_html( $rw_ti_id );?>* howManyDates_<?php echo esc_html( $rw_ti_id );?>).css('marginTop', heightContainer_<?php echo esc_html( $rw_ti_id );?>/ 2 - heightDate_<?php echo esc_html( $rw_ti_id );?>/ 2);
                            var defaultPositionDates = parseInt(jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginTop').substring(0, jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginTop').indexOf('px')));
                        }
                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' a').click(function (event) {
                            event.preventDefault();
                            var whichIssue_<?php echo esc_html( $rw_ti_id );?> = jQuery(this).text();
                            var currentIndex_<?php echo esc_html( $rw_ti_id );?> = jQuery(this).parent().prevAll().length;
                            if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?> == 'horizontal') {
                                jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).animate({'marginLeft': -widthIssue_<?php echo esc_html( $rw_ti_id );?>* currentIndex_<?php echo esc_html( $rw_ti_id );?>}, {
                                    queue: false,
                                    duration: settings_<?php echo esc_html( $rw_ti_id );?>.issuesSpeed_<?php echo esc_html( $rw_ti_id );?>});
                            } else if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?> == 'vertical') {
                                jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).animate({'marginTop': -heightIssue_<?php echo esc_html( $rw_ti_id );?>* currentIndex_<?php echo esc_html( $rw_ti_id );?>}, {
                                    queue: false,
                                    duration: settings_<?php echo esc_html( $rw_ti_id );?>.issuesSpeed_<?php echo esc_html( $rw_ti_id );?>});
                            }
                            jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').animate({'opacity': settings_<?php echo esc_html( $rw_ti_id );?>.issuesTransparency_<?php echo esc_html( $rw_ti_id );?>}, {
                                queue: false,
                                duration: settings_<?php echo esc_html( $rw_ti_id );?>.issuesSpeed_<?php echo esc_html( $rw_ti_id );?>}).removeClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>).eq(currentIndex_<?php echo esc_html( $rw_ti_id );?>).addClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>).fadeTo(settings_<?php echo esc_html( $rw_ti_id );?>.issuesTransparency_<?php echo esc_html( $rw_ti_id );?>Speed, 1);
                            if (howManyDates_<?php echo esc_html( $rw_ti_id );?> == 1) {
                                jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>+ ',' + settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                            } else if (howManyDates_<?php echo esc_html( $rw_ti_id );?> == 2) {
                                if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:first-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('fast');
                                } else if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:last-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('fast');
                                }
                            } else {
                                if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:first-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('fast');
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                } else if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:last-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('fast');
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                } else {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>+ ',' + settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('slow');
                                }
                            }
                            jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' a').removeClass(settings_<?php echo esc_html( $rw_ti_id );?>.datesSelectedClass_<?php echo esc_html( $rw_ti_id );?>);
                            jQuery(this).addClass(settings_<?php echo esc_html( $rw_ti_id );?>.datesSelectedClass_<?php echo esc_html( $rw_ti_id );?>);
                            if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?> == 'horizontal') {
                                jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).animate({'marginLeft': defaultPositionDates - (widthDate_<?php echo esc_html( $rw_ti_id );?>* currentIndex_<?php echo esc_html( $rw_ti_id );?>)}, {
                                    queue: false,
                                    duration: 'settings_<?php echo esc_html( $rw_ti_id );?>.datesSpeed_<?php echo esc_html( $rw_ti_id );?>'
                                });
                            } else if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?> == 'vertical') {
                                jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).animate({'marginTop': defaultPositionDates - (heightDate_<?php echo esc_html( $rw_ti_id );?>* currentIndex_<?php echo esc_html( $rw_ti_id );?>)}, {
                                    queue: false,
                                    duration: 'settings_<?php echo esc_html( $rw_ti_id );?>.datesSpeed_<?php echo esc_html( $rw_ti_id );?>'
                                });
                            }
                        });
                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).bind('click', function (event) {
                            event.preventDefault();
                            var currentIndex_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).find('li.' + settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>).index();
                            if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?> == 'horizontal') {
                                var currentPositionIssues<?php echo esc_html( $rw_ti_id );?> = parseInt(jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft').substring(0, jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft').indexOf('px')));
                                var currentIssue_<?php echo esc_html( $rw_ti_id );?>Index = currentPositionIssues<?php echo esc_html( $rw_ti_id );?>/ widthIssue_<?php echo esc_html( $rw_ti_id );?>;
                                var currentPositionDates = parseInt(jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft').substring(0, jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft').indexOf('px')));
                                var currentIssue_<?php echo esc_html( $rw_ti_id );?>Date = currentPositionDates - widthDate_<?php echo esc_html( $rw_ti_id );?>;
                                if (currentPositionIssues<?php echo esc_html( $rw_ti_id );?> <= -(widthIssue_<?php echo esc_html( $rw_ti_id );?>* howManyIssues_<?php echo esc_html( $rw_ti_id );?>- (widthIssue_<?php echo esc_html( $rw_ti_id );?>))) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).stop();
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:last-child a').click();
                                } else {
                                    if (!jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).is(':animated')) {
                                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').eq(currentIndex_<?php echo esc_html( $rw_ti_id );?>+ 1).find('a').trigger('click');
                                    }
                                }
                            } else if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?> == 'vertical') {
                                var currentPositionIssues<?php echo esc_html( $rw_ti_id );?> = parseInt(jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginTop').substring(0, jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginTop').indexOf('px')));
                                var currentIssue_<?php echo esc_html( $rw_ti_id );?>Index = currentPositionIssues<?php echo esc_html( $rw_ti_id );?>/ heightIssue_<?php echo esc_html( $rw_ti_id );?>;
                                var currentPositionDates = parseInt(jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginTop').substring(0, jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginTop').indexOf('px')));
                                var currentIssue_<?php echo esc_html( $rw_ti_id );?>Date = currentPositionDates - heightDate_<?php echo esc_html( $rw_ti_id );?>;
                                if (currentPositionIssues<?php echo esc_html( $rw_ti_id );?> <= -(heightIssue_<?php echo esc_html( $rw_ti_id );?>* howManyIssues_<?php echo esc_html( $rw_ti_id );?>- (heightIssue_<?php echo esc_html( $rw_ti_id );?>))) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).stop();
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:last-child a').click();
                                } else {
                                    if (!jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).is(':animated')) {
                                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').eq(currentIndex_<?php echo esc_html( $rw_ti_id );?>+ 1).find('a').trigger('click');
                                    }
                                }
                            }
                            if (howManyDates_<?php echo esc_html( $rw_ti_id );?> == 1) {
                                jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>+ ',' + settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                            } else if (howManyDates_<?php echo esc_html( $rw_ti_id );?> == 2) {
                                if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:first-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('fast');
                                } else if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:last-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('fast');
                                }
                            } else {
                                if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:first-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                } else if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:last-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                } else {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>+ ',' + settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('slow');
                                }
                            }
                        });
                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).click(function (event) {
                            event.preventDefault();
                            var currentIndex_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).find('li.' + settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>).index();
                            if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?> == 'horizontal') {
                                var currentPositionIssues<?php echo esc_html( $rw_ti_id );?> = parseInt(jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft').substring(0, jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft').indexOf('px')));
                                var currentIssue_<?php echo esc_html( $rw_ti_id );?>Index = currentPositionIssues<?php echo esc_html( $rw_ti_id );?>/ widthIssue_<?php echo esc_html( $rw_ti_id );?>;
                                var currentPositionDates = parseInt(jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft').substring(0, jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginLeft').indexOf('px')));
                                var currentIssue_<?php echo esc_html( $rw_ti_id );?>Date = currentPositionDates + widthDate_<?php echo esc_html( $rw_ti_id );?>;
                                if (currentPositionIssues<?php echo esc_html( $rw_ti_id );?> >= 0) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).stop();
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:first-child a').click();
                                } else {
                                    if (!jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).is(':animated')) {
                                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').eq(currentIndex_<?php echo esc_html( $rw_ti_id );?>- 1).find('a').trigger('click');
                                    }
                                }
                            } else if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?> == 'vertical') {
                                var currentPositionIssues<?php echo esc_html( $rw_ti_id );?> = parseInt(jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginTop').substring(0, jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginTop').indexOf('px')));
                                var currentIssue_<?php echo esc_html( $rw_ti_id );?>Index = currentPositionIssues<?php echo esc_html( $rw_ti_id );?>/ heightIssue_<?php echo esc_html( $rw_ti_id );?>;
                                var currentPositionDates = parseInt(jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginTop').substring(0, jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).css('marginTop').indexOf('px')));
                                var currentIssue_<?php echo esc_html( $rw_ti_id );?>Date = currentPositionDates + heightDate_<?php echo esc_html( $rw_ti_id );?>;
                                if (currentPositionIssues<?php echo esc_html( $rw_ti_id );?> >= 0) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).stop();
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:first-child a').click();
                                } else {
                                    if (!jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>).is(':animated')) {
                                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').eq(currentIndex_<?php echo esc_html( $rw_ti_id );?>- 1).find('a').trigger('click');
                                    }
                                }
                            }
                            if (howManyDates_<?php echo esc_html( $rw_ti_id );?> == 1) {
                                jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>+ ',' + settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                            } else if (howManyDates_<?php echo esc_html( $rw_ti_id );?> == 2) {
                                if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:first-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('fast');
                                } else if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:last-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('fast');
                                }
                            } else {
                                if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:first-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                } else if (jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.issuesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:last-child').hasClass(settings_<?php echo esc_html( $rw_ti_id );?>.issuesSelectedClass_<?php echo esc_html( $rw_ti_id );?>)) {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).fadeOut('fast');
                                } else {
                                    jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>+ ',' + settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).fadeIn('slow');
                                }
                            }
                        });
                        if (settings_<?php echo esc_html( $rw_ti_id );?>.arrowKeys_<?php echo esc_html( $rw_ti_id );?>== 'true') {
                            if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?>== 'horizontal') {
                                jQuery(document).keydown(function (event) {
                                    if (event.keyCode == 39) {
                                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).click();
                                    }
                                    if (event.keyCode == 37) {
                                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).click();
                                    }
                                });
                            } else if (settings_<?php echo esc_html( $rw_ti_id );?>.orientation_<?php echo esc_html( $rw_ti_id );?>== 'vertical') {
                                jQuery(document).keydown(function (event) {
                                    if (event.keyCode == 40) {
                                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.nextButton_<?php echo esc_html( $rw_ti_id );?>).click();
                                    }
                                    if (event.keyCode == 38) {
                                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.prevButton_<?php echo esc_html( $rw_ti_id );?>).click();
                                    }
                                });
                            }
                        }
                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li').eq(settings_<?php echo esc_html( $rw_ti_id );?>.startAt_<?php echo esc_html( $rw_ti_id );?>- 1).find('a').trigger('click');
                        if (settings_<?php echo esc_html( $rw_ti_id );?>.autoPlay_<?php echo esc_html( $rw_ti_id );?> == 'true') {
                            setInterval("autoPlay_<?php echo esc_html( $rw_ti_id );?>()", settings_<?php echo esc_html( $rw_ti_id );?>.autoPlay_<?php echo esc_html( $rw_ti_id );?>Pause);
                        }
                    }
                });
            };

            function autoPlay_<?php echo esc_html( $rw_ti_id );?>() {
                var currentDate_<?php echo esc_html( $rw_ti_id );?> = jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>).find('a.' + settings_<?php echo esc_html( $rw_ti_id );?>.datesSelectedClass_<?php echo esc_html( $rw_ti_id );?>);
                if (settings_<?php echo esc_html( $rw_ti_id );?>.autoPlay_<?php echo esc_html( $rw_ti_id );?>Direction == 'forward') {
                    if (currentDate_<?php echo esc_html( $rw_ti_id );?>.parent().is('li:last-child')) {
                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:first-child').find('a').trigger('click');
                    } else {
                        currentDate_<?php echo esc_html( $rw_ti_id );?>.parent().next().find('a').trigger('click');
                    }
                } else if (settings_<?php echo esc_html( $rw_ti_id );?>.autoPlay_<?php echo esc_html( $rw_ti_id );?>Direction == 'backward') {
                    if (currentDate_<?php echo esc_html( $rw_ti_id );?>.parent().is('li:first-child')) {
                        jQuery(settings_<?php echo esc_html( $rw_ti_id );?>.datesDiv_<?php echo esc_html( $rw_ti_id );?>+ ' li:last-child').find('a').trigger('click');
                    } else {
                        currentDate_<?php echo esc_html( $rw_ti_id );?>.parent().prev().find('a').trigger('click');
                    }
                }
            }
        </script>
        <script type="text/javascript">
            jQuery(function () {
                jQuery().timelinr_<?php echo esc_html( $rw_ti_id );?>({arrowKeys_<?php echo esc_html( $rw_ti_id );?>: 'true'})
                jQuery(window).resize(function () {
                    jQuery().timelinr_<?php echo esc_html( $rw_ti_id );?>({arrowKeys_<?php echo esc_html( $rw_ti_id );?>: 'true'})
                })
            });

            function runEffect_<?php echo esc_html( $rw_ti_id );?>() {
                var selectedEffect = jQuery(".rich_web_effect_val_<?php echo esc_html( $rw_ti_id );?>").val();
                var options = {};
                if (selectedEffect === "fold") {
                    options = {horizFirst: false};
                } else if (selectedEffect === "scale") {
                    var selectedEffect = "drop";
                    options = {direction: "right"};
                }
                jQuery("#rw_ti_cont_<?php echo esc_html( $rw_ti_id );?>").show(selectedEffect, options, 2500);
            };
            var rw_div_height_<?php echo esc_html( $rw_ti_id );?> = jQuery('#rw_timeline_<?php echo esc_html( $rw_ti_id );?>').offset().top;
            var rw_window_height_<?php echo esc_html( $rw_ti_id );?> = jQuery(window).height();
            var rw_scroll_height_<?php echo esc_html( $rw_ti_id );?> = jQuery(this).scrollTop();
            if (rw_div_height_<?php echo esc_html( $rw_ti_id );?> > rw_window_height_<?php echo esc_html( $rw_ti_id );?>) {
                var x_height_<?php echo esc_html( $rw_ti_id );?> = rw_div_height_<?php echo esc_html( $rw_ti_id );?> - rw_window_height_<?php echo esc_html( $rw_ti_id );?>;
            } else {
                runEffect_<?php echo esc_html( $rw_ti_id );?>();
            }
            if (jQuery(this).scrollTop() > x_height_<?php echo esc_html( $rw_ti_id );?>) {
                runEffect_<?php echo esc_html( $rw_ti_id );?>();
            }
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() > x_height_<?php echo esc_html( $rw_ti_id );?>) {
                    runEffect_<?php echo esc_html( $rw_ti_id );?>();
                }
            });
        </script>
        <script type="text/javascript">
            function resp_<?php echo esc_html( $rw_ti_id );?>() {
                jQuery(".rw_resp_li_<?php echo esc_html( $rw_ti_id );?>").css("width", jQuery("#rw_timeline_<?php echo esc_html( $rw_ti_id );?>").width());
            }

            resp_<?php echo esc_html( $rw_ti_id );?>();
            jQuery(window).resize(function () {
                resp_<?php echo esc_html( $rw_ti_id );?>();
            });
        </script>
	<?php }
	if ( $get_timeline_style_options[0]->rw_timeline_theme == 7 ) {
		$rw_icon_right = 'right';
		$rw_icon_left  = 'left';
		if ( $get_timeline_style_options[0]->rw_timeline_sort == 'ASC' ) {
			$rw_date_big   = '>';
			$rw_date_small = '<';
		}
		if ( $get_timeline_style_options[0]->rw_timeline_sort == 'DESC' ) {
			$rw_date_big   = '<';
			$rw_date_small = '>';
		}
		?>
        <style>
            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> {
                width: 700px;
                margin: 0 auto 30px auto;
                box-sizing: content-box;
                -moz-box-sizing: content-box;
                -webkit-box-sizing: content-box;
                border: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_px);?>px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_type_article);?> <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_col);?>;
                box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?> !important;
                -moz-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?> !important;
                -webkit-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow);?> !important;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?>:hover {
                box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?> !important;
                -moz-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?> !important;
                -webkit-box-shadow: 0px 0px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_px);?>px <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_box_shadow_hover);?> !important;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar {
                line-height: 1.2 !important;
                transition: all .5s;
                -moz-transition: all .5s;
                -webkit-transition: all .5s;
                background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_block_bg);?>;
                display: table;
                width: 100%;
                color: #ffffff;
                font-size: 25px;
                font-weight: 300;
                padding: 5px;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                cursor: default;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar:hover {
                background-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_block_bg_hover);?>
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar .rw_tim_prev_<?php echo esc_html($rw_ti_id);?>, .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar .rw_tim_next_<?php echo esc_html($rw_ti_id);?> {
                border-bottom: none !important;
                padding: 0 12px;
                text-decoration: none !important;
                box-shadow: none !important;
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
                font-size: 30px;
                cursor: pointer;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_color);?> !important;
                font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_icon_size);?>px !important;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar .year {
                float: left;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar .month {
                float: right;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> {
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_md_bg_color);?> !important;
                display: block;
                width: 100%;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                padding: 0 50px;
                position: relative;
                font-size: 0;
                white-space: nowrap;
                overflow: hidden;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                transition: all .5s;
                -moz-transition: all .5s;
                -webkit-transition: all .5s;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?>:hover {
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_md_bg_color_hover);?> !important;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a {
                border-bottom: none !important;
                display: block;
                height: 70px;
                width: 70px;
                color: #a2a2a2;
                text-align: center;
                display: inline-block;
                border-right: 1px solid #E7E7E7;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                cursor: pointer;
                transition: color .2s, transform .2s;
                -webkit-transition: color .2s, transform .2s;
                -moz-transition: color .2s, transform .2s;
                z-index: 0;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a:hover {
                color: #686666;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a span {
                transition: color .2s, transform .2s;
                -webkit-transition: color .2s, -webkit-transform .2s;
                -moz-transition: color .2s, -moz-transform .2s;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a.norw_event_<?php echo esc_html($rw_ti_id);?> {
                display: none;
                width: 100%;
                color: #7B7B7B;
                font-size: 19px;
                line-height: 70px;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a.selected {
                color: #696969;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a.selected > span.date {
                transform: scale(1.2, 1.2);
                -moz-transform: scale(1.2, 1.2);
                -webkit-transform: scale(1.2, 1.2);
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a.rw_tim_prev_<?php echo esc_html($rw_ti_id);?>, .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a.rw_tim_next_<?php echo esc_html($rw_ti_id);?> {
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_md_bg_color);?>;
                position: absolute;
                top: 0;
                width: 50px;
                min-width: 0;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_icon_col);?> !important;
                font-size: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_icon_size);?>px !important;
                line-height: 70px;
                transition: all .5s !important;
                -moz-transition: all .5s !important;
                -webkit-transition: all .5s !important;
                z-index: 2;
                display: inline-block;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a.rw_tim_prev_<?php echo esc_html($rw_ti_id);?>:hover, .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a.rw_tim_next_<?php echo esc_html($rw_ti_id);?>:hover {
                background: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_md_bg_color_hover);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> .month span {
                display: inline-block;
                min-width: 60px;
                text-align: center;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a.rw_tim_prev_<?php echo esc_html($rw_ti_id);?> {
                left: 0;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a.rw_tim_next_<?php echo esc_html($rw_ti_id);?> {
                right: 0;
                border-left: solid 1px #e7e7e7;
                border-right: none;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a span.date {
                display: block;
                font-size: 30px;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a span.month {
                font-size: 13px;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> {
                width: 100%;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                border: none !important;
                border-top: 0;
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?>:hover {
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_bg_color_hover);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> {
                overflow: auto;
                border-bottom: solid 1px<?php echo esc_html($get_timeline_style_options[0]->rw_timeline_border_col);?>;
                display: none;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?>.selected {
                display: block;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> .date {
                display: block;
                font-size: 14px;
                padding: 0 15px 15px;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> .date i {
                padding: 0 10px 0 0;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> > div {
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                padding: 15px;
                width: 100%;
                display: table;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> div.right {
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
                padding: 15px;
                padding-right: 0;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> div.layout1 > div {
                float: left;
                width: 50%;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> .layout1 div.left > img {
                width: 100%;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> .layout1 div.right h3.rw_ti_ev_h3 {
                text-align: center;
                font-size: 20px;
                text-transform: uppercase;
                margin: 5px 0;
                color: #3E3E3E;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> .layout1 div.right p {
                font-size: 13px;
                color: #707070;
                line-height: 21px;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> div.layout2 > div {
                float: left;
                width: 50%;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> .layout2 div.right > img {
                width: 100%;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> .layout2 div.right h3.rw_ti_ev_h3 {
                text-align: center;
                font-size: 20px;
                text-transform: uppercase;
                margin: 5px 0;
                color: #3E3E3E;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> .layout2 div.right p {
                font-size: 13px;
                color: #707070;
                line-height: 21px;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> h3.rw_ti_ev_h3 {
                text-align: center;
                font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_font_size);?>px;
                text-transform: uppercase;
                margin: 5px 0;
                padding: 8px;
                background: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_title_bg_color);?>;
                font-family: <?php echo esc_html($get_timeline_style_options[0]->rich_web_timeline_fonts);?>;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_title_col);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> h3.rw_ti_ev_h3:hover {
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_hover_color);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> p {
                font-size: 13px;
                color: #707070;
                line-height: 21px;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> .layout3 img {
                width: 100%;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?>.rw_s_screen_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> div.layout1 > div {
                float: none;
                width: 100%;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?>.rw_s_screen_<?php echo esc_html($rw_ti_id);?> .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .rw_event_<?php echo esc_html($rw_ti_id);?> div.layout2 > div {
                float: none;
                width: 100%;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar .year span {
                font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_size);?>px;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_number_col);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar .month span {
                font-size: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_size);?>px;
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_month_col);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar .year span:hover {
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_year_color_hover);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar .month span:hover {
                color: <?php echo esc_html($get_timeline_style_options_2[0]->rw_timeline_month_col_hov);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a {
                border-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_border_color);?> !important;
                text-decoration: none !important;
                border-width: 1px !important;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a:hover {
                border-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_border_color_hover);?> !important;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a[data-date] {
                border-bottom: none !important;
                line-height: 1.2;
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_color);?>;
                border-color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_border_color);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a[data-date]:hover {
                color: <?php echo esc_html($get_timeline_style_options[0]->rw_timeline_md_color_hover);?>;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar a i {
                font-style: normal !important;
            }

            .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .dates-bar_<?php echo esc_html($rw_ti_id);?> a i {
                font-style: normal !important;
            }

            .rw_timeline_wrap_<?php echo esc_html($rw_ti_id);?> .date i {
                font-style: normal !important;
            }

            @media (max-width: 750px) {
                .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> {
                    width: 600px;
                }
            }

            @media (max-width: 639px) {
                .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> {
                    width: 498px;
                }
            }

            @media (max-width: 500px) {
                .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> {
                    width: 80%;
                }

                .RW_TImeline_Ev_<?php echo esc_html($rw_ti_id);?> .month-year-bar .month {
                    float: left;
                }
            }
        </style>
        <script>
            (function (jQuery) {
                jQuery.fn.RW_TImeline_Ev_<?php echo esc_html( $rw_ti_id );?> = function (options_<?php echo esc_html( $rw_ti_id );?>) {
                    var rw_timelinedates_<?php echo esc_html( $rw_ti_id );?> = new Array();
                    var rw_date_sort_asc_<?php echo esc_html( $rw_ti_id );?> = function (date1, date2) {
                        if (date1 <?php echo $rw_date_big;?> date2
                    )
                        return -1;
                        if (date1 <?php echo $rw_date_small;?> date2
                    )
                        return 1;
                        return 0;
                    };
                    var current_year_<?php echo esc_html( $rw_ti_id );?> = 0;
                    var current_month_<?php echo esc_html( $rw_ti_id );?> = 0;
                    var scroll_count_<?php echo esc_html( $rw_ti_id );?> = 2;
                    var scrolled_<?php echo esc_html( $rw_ti_id );?> = 0;
                    var scroll_time_<?php echo esc_html( $rw_ti_id );?> = 500;

                    var month_<?php echo esc_html( $rw_ti_id );?>= new Array();
                    month_<?php echo esc_html( $rw_ti_id );?>[0] = "January";
                    month_<?php echo esc_html( $rw_ti_id );?>[1] = "February";
                    month_<?php echo esc_html( $rw_ti_id );?>[2] = "March";
                    month_<?php echo esc_html( $rw_ti_id );?>[3] = "April";
                    month_<?php echo esc_html( $rw_ti_id );?>[4] = "May";
                    month_<?php echo esc_html( $rw_ti_id );?>[5] = "June";
                    month_<?php echo esc_html( $rw_ti_id );?>[6] = "July";
                    month_<?php echo esc_html( $rw_ti_id );?>[7] = "August";
                    month_<?php echo esc_html( $rw_ti_id );?>[8] = "September";
                    month_<?php echo esc_html( $rw_ti_id );?>[9] = "October";
                    month_<?php echo esc_html( $rw_ti_id );?>[10] = "November";
                    month_<?php echo esc_html( $rw_ti_id );?>[11] = "December";

                    var config = {};
                    if (options_<?php echo esc_html( $rw_ti_id );?>) {
                        jQuery.extend(config, options_<?php echo esc_html( $rw_ti_id );?>);
                    }
                    return this.each(function () {
                        selector_<?php echo esc_html( $rw_ti_id );?> = jQuery(this);
                        if (options_<?php echo esc_html( $rw_ti_id );?>.scroll) scroll_count_<?php echo esc_html( $rw_ti_id );?> = parseInt(options_<?php echo esc_html( $rw_ti_id );?>.scroll);
                        if (options_<?php echo esc_html( $rw_ti_id );?>.width) selector_<?php echo esc_html( $rw_ti_id );?>.css('width', options_<?php echo esc_html( $rw_ti_id );?>.width)
                        if (options_<?php echo esc_html( $rw_ti_id );?>.scrollingTime) scroll_time_<?php echo esc_html( $rw_ti_id );?> = options_<?php echo esc_html( $rw_ti_id );?>.scrollingTime;
                        if (!selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>.selected').length)
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>:first-child').addClass('selected')
                        current_year_<?php echo esc_html( $rw_ti_id );?> = (new Date(selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>.selected').attr('data-date'))).getFullYear()
                        current_month_<?php echo esc_html( $rw_ti_id );?> = (new Date(selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>.selected').attr('data-date'))).getMonth()
                        if (!selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').length) {
                            selector_<?php echo esc_html( $rw_ti_id );?>.prepend('<div class = "month-year-bar"></div>')
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').prepend('<div class = "year"><a class = "rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>"><i class = "rich_web rich_web-<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_icon_type );?>-<?php echo esc_html( $rw_icon_left );?>"></i></a><span>' + String(current_year_<?php echo esc_html( $rw_ti_id );?>) + '</span><a class = "rw_tim_next_<?php echo esc_html( $rw_ti_id );?>"><i class = "rich_web rich_web-<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_icon_type );?>-<?php echo esc_html( $rw_icon_right );?>"></i></a></div>')
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').prepend('<div class = "month"><a class = "rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>"><i class = "rich_web rich_web-<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_icon_type );?>-<?php echo esc_html( $rw_icon_left );?>"></i></a><span>' + String(month_<?php echo esc_html( $rw_ti_id );?>[current_month_<?php echo esc_html( $rw_ti_id );?>]) + '</span><a class = "rw_tim_next_<?php echo esc_html( $rw_ti_id );?>"><i class = "rich_web rich_web-<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_icon_type );?>-<?php echo esc_html( $rw_icon_right );?>"></i></a></div>')
                        }
                        var i = 0;
                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>').each(function () {
                            rw_timelinedates_<?php echo esc_html( $rw_ti_id );?>[i] = new Date(jQuery(this).attr('data-date'));
                            i++;
                        })
                        rw_timelinedates_<?php echo esc_html( $rw_ti_id );?>.sort(rw_date_sort_asc_<?php echo esc_html( $rw_ti_id );?>)

                        if (!selector_<?php echo esc_html( $rw_ti_id );?>.children(".dates-bar_<?php echo esc_html( $rw_ti_id );?>").length)
                            selector_<?php echo esc_html( $rw_ti_id );?>.children(".month-year-bar").after('<div class = "dates-bar_<?php echo esc_html( $rw_ti_id );?>"><a class = "rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>"><i class = "rich_web rich_web-<?php echo esc_html( $get_timeline_style_options_2[0]->rw_timeline_icon_style );?>-<?php echo esc_html( $rw_icon_left );?>"></i></a><a class = "norw_event_<?php echo esc_html( $rw_ti_id );?>">No Event</a><a class = "rw_tim_next_<?php echo esc_html( $rw_ti_id );?>"><i class = "rich_web rich_web-<?php echo esc_html( $get_timeline_style_options_2[0]->rw_timeline_icon_style );?>-<?php echo esc_html( $rw_icon_right );?>"></i></a></div>')
                        for (i = 0; i < rw_timelinedates_<?php echo esc_html( $rw_ti_id );?>.length; i++) {
                            dateString = String((rw_timelinedates_<?php echo esc_html( $rw_ti_id );?>[i].getMonth() + 1) + "/" + rw_timelinedates_<?php echo esc_html( $rw_ti_id );?>[i].getDate() + "/" + rw_timelinedates_<?php echo esc_html( $rw_ti_id );?>[i].getFullYear())
                            if (selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a[data-date = "' + dateString + '"]').length)
                                continue;
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>').after('<a data-date = ' + dateString + '><span class = "date">' + String(rw_timelinedates_<?php echo esc_html( $rw_ti_id );?>[i].getDate()) + '</span><span class = "month">' + String(month_<?php echo esc_html( $rw_ti_id );?>[rw_timelinedates_<?php echo esc_html( $rw_ti_id );?>[i].getMonth()]) + '</span></a>')
                        }
                        for (i = 0; i < selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>').length; i++) {
                            var a = new Date(selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>:nth-child(' + String(i + 1) + ')').attr('data-date'))
                            dateString = String((a.getMonth() + 1) + "/" + a.getDate() + "/" + a.getFullYear())
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>:nth-child(' + String(i + 1) + ')').attr('data-date', dateString)
                        }
                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>)').each(function () {
                            if ((new Date(jQuery(this).attr('data-date'))).getFullYear() != current_year_<?php echo esc_html( $rw_ti_id );?>)
                                jQuery(this).hide();
                        })
                        if (selector_<?php echo esc_html( $rw_ti_id );?>.hasClass('calledOnce'))
                            return 0;
                        selector_<?php echo esc_html( $rw_ti_id );?>.addClass('calledOnce')
                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a[data-date ="' + String(selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>.selected').attr('data-date')) + '"]').addClass('selected')
                        if (selector_<?php echo esc_html( $rw_ti_id );?>.width() < 500) selector_<?php echo esc_html( $rw_ti_id );?>.addClass('rw_s_screen_<?php echo esc_html( $rw_ti_id );?>')
                        jQuery(window).resize(function () {
                            if (selector_<?php echo esc_html( $rw_ti_id );?>.width() < 500) selector_<?php echo esc_html( $rw_ti_id );?>.addClass('rw_s_screen_<?php echo esc_html( $rw_ti_id );?>')
                            else selector_<?php echo esc_html( $rw_ti_id );?>.removeClass('rw_s_screen_<?php echo esc_html( $rw_ti_id );?>')
                        })
                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>)').click(function () {
                            a = String(jQuery(this).attr('data-date'));
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>.selected').removeClass('selected');
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>[data-date="' + a + '"]').addClass('selected');
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>)').removeClass('selected');
                            jQuery(this).addClass('selected')
                        })
                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a.rw_tim_next_<?php echo esc_html( $rw_ti_id );?>').click(function () {
                            var actual_scroll = scroll_count_<?php echo esc_html( $rw_ti_id );?>;
                            var c = selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible()').length
                            if (scrolled_<?php echo esc_html( $rw_ti_id );?> + scroll_count_<?php echo esc_html( $rw_ti_id );?> >= c) actual_scroll = (c - scrolled_<?php echo esc_html( $rw_ti_id );?>) - 1
                            if (parseInt(selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').css('width')) * actual_scroll > selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').width())
                                while (parseInt(selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').css('width')) * actual_scroll > selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').width() && actual_scroll > 1)
                                    actual_scroll -= 1;
                            var a = (-1) * actual_scroll * parseInt(selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').css('width'));
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').animate({marginLeft: '+=' + String(a) + 'px'}, scroll_time_<?php echo esc_html( $rw_ti_id );?>)
                            scrolled_<?php echo esc_html( $rw_ti_id );?> += actual_scroll;
                            current_month_<?php echo esc_html( $rw_ti_id );?> = new Date(selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(' + String(scrolled_<?php echo esc_html( $rw_ti_id );?>) + ')').attr('data-date')).getMonth()
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.month').children('span').text(month_<?php echo esc_html( $rw_ti_id );?>[current_month_<?php echo esc_html( $rw_ti_id );?>])
                        })
                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>').click(function () {
                            var actual_scroll = scroll_count_<?php echo esc_html( $rw_ti_id );?>;
                            var c = selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible()').length
                            if (scrolled_<?php echo esc_html( $rw_ti_id );?> <= scroll_count_<?php echo esc_html( $rw_ti_id );?>) actual_scroll = scrolled_<?php echo esc_html( $rw_ti_id );?>;
                            if (parseInt(selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').css('width')) * actual_scroll > selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').width())
                                while (parseInt(selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').css('width')) * actual_scroll > selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').width() && actual_scroll > 1)
                                    actual_scroll -= 1;
                            var a = actual_scroll * parseInt(selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').css('width'));
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').animate({marginLeft: '+=' + String(a) + 'px'}, scroll_time_<?php echo esc_html( $rw_ti_id );?>)
                            scrolled_<?php echo esc_html( $rw_ti_id );?> -= actual_scroll;
                            current_month_<?php echo esc_html( $rw_ti_id );?> = new Date(selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(' + String(scrolled_<?php echo esc_html( $rw_ti_id );?>) + ')').attr('data-date')).getMonth()
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.month').children('span').text(month_<?php echo esc_html( $rw_ti_id );?>[current_month_<?php echo esc_html( $rw_ti_id );?>])
                        })
                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.month').children('.rw_tim_next_<?php echo esc_html( $rw_ti_id );?>').click(function () {
                            if (!(current_month_<?php echo esc_html( $rw_ti_id );?> == 11)) current_month_<?php echo esc_html( $rw_ti_id );?> += 1; else current_month_<?php echo esc_html( $rw_ti_id );?> = 0;
                            var month_found = 0;
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.month').children('span').text(month_<?php echo esc_html( $rw_ti_id );?>[current_month_<?php echo esc_html( $rw_ti_id );?>])
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible()').each(function () {
                                month_found += 1;
                                if ((new Date(jQuery(this).attr('data-date'))).getMonth() >= current_month_<?php echo esc_html( $rw_ti_id );?>) {
                                    return false;
                                }
                            })
                            var a = (month_found - scrolled_<?php echo esc_html( $rw_ti_id );?>- 1) * parseInt(selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').css('width'));
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').animate({marginLeft: '-=' + String(a) + 'px'}, scroll_time_<?php echo esc_html( $rw_ti_id );?>)
                            scrolled_<?php echo esc_html( $rw_ti_id );?> = month_found - 1;
                        })
                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.month').children('.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>').click(function () {
                            if (!(current_month_<?php echo esc_html( $rw_ti_id );?> == 0)) current_month_<?php echo esc_html( $rw_ti_id );?> -= 1; else current_month_<?php echo esc_html( $rw_ti_id );?> = 11;
                            var month_found = 0;
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.month').children('span').text(month_<?php echo esc_html( $rw_ti_id );?>[current_month_<?php echo esc_html( $rw_ti_id );?>])
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible()').each(function () {
                                month_found += 1;
                                if ((new Date(jQuery(this).attr('data-date'))).getMonth() >= current_month_<?php echo esc_html( $rw_ti_id );?>) {
                                    return false;
                                }
                            })
                            var a = (month_found - scrolled_<?php echo esc_html( $rw_ti_id );?>- 1) * parseInt(selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').css('width'));
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible():eq(0)').animate({marginLeft: '-=' + String(a) + 'px'}, scroll_time_<?php echo esc_html( $rw_ti_id );?>)
                            scrolled_<?php echo esc_html( $rw_ti_id );?> = month_found - 1;
                        })
                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.year').children('.rw_tim_next_<?php echo esc_html( $rw_ti_id );?>').click(function () {
                            current_year_<?php echo esc_html( $rw_ti_id );?> += 1;
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.year').children('span').text(String(current_year_<?php echo esc_html( $rw_ti_id );?>))
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>)').each(function () {
                                if ((new Date(jQuery(this).attr('data-date'))).getFullYear() != current_year_<?php echo esc_html( $rw_ti_id );?>) jQuery(this).hide(); else jQuery(this).show()
                            })
                            if (!selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible').length) {
                                selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a.norw_event_<?php echo esc_html( $rw_ti_id );?>').css('display', 'block');
                            } else {
                                selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a.norw_event_<?php echo esc_html( $rw_ti_id );?>').css('display', 'none');
                                selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>)').css('margin-left', '0');
                                scrolled_<?php echo esc_html( $rw_ti_id );?> = 0;
                                selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>').removeClass('selected');
                                selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>').each(function () {
                                    a = (new Date(jQuery(this).attr('data-date')))
                                    if (a.getFullYear() == current_year_<?php echo esc_html( $rw_ti_id );?>) {
                                        jQuery(this).addClass('selected')
                                        current_month_<?php echo esc_html( $rw_ti_id );?> = a.getMonth();
                                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.month').children('span').text(month_<?php echo esc_html( $rw_ti_id );?>[current_month_<?php echo esc_html( $rw_ti_id );?>])
                                        return false;
                                    }
                                })
                            }
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>)').removeClass('selected');
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a[data-date ="' + String(selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>.selected').attr('data-date')) + '"]').addClass('selected')
                        })
                        selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.year').children('.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>').click(function () {
                            current_year_<?php echo esc_html( $rw_ti_id );?> -= 1;
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.year').children('span').text(String(current_year_<?php echo esc_html( $rw_ti_id );?>))
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>)').each(function () {
                                if ((new Date(jQuery(this).attr('data-date'))).getFullYear() != current_year_<?php echo esc_html( $rw_ti_id );?>) jQuery(this).hide(); else jQuery(this).show()
                                if (!selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>):visible').length) {
                                    selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a.norw_event_<?php echo esc_html( $rw_ti_id );?>').css('display', 'block');
                                } else {
                                    selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a.norw_event_<?php echo esc_html( $rw_ti_id );?>').css('display', 'none');
                                    selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>)').css('margin-left', '0');
                                    scrolled_<?php echo esc_html( $rw_ti_id );?> = 0;
                                    selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>').removeClass('selected');
                                    selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>').each(function () {
                                        a = (new Date(jQuery(this).attr('data-date')))
                                        if (a.getFullYear() == current_year_<?php echo esc_html( $rw_ti_id );?>) {
                                            jQuery(this).addClass('selected')
                                            current_month_<?php echo esc_html( $rw_ti_id );?> = a.getMonth();
                                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.month-year-bar').children('.month').children('span').text(month_<?php echo esc_html( $rw_ti_id );?>[current_month_<?php echo esc_html( $rw_ti_id );?>])
                                            return false;
                                        }
                                    })
                                }
                            })
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a:not(.rw_tim_prev_<?php echo esc_html( $rw_ti_id );?>, .rw_tim_next_<?php echo esc_html( $rw_ti_id );?>, .norw_event_<?php echo esc_html( $rw_ti_id );?>)').removeClass('selected');
                            selector_<?php echo esc_html( $rw_ti_id );?>.children('.dates-bar_<?php echo esc_html( $rw_ti_id );?>').children('a[data-date ="' + String(selector_<?php echo esc_html( $rw_ti_id );?>.children('.rw_timeline_wrap_<?php echo esc_html( $rw_ti_id );?>').children('.rw_event_<?php echo esc_html( $rw_ti_id );?>.selected').attr('data-date')) + '"]').addClass('selected')
                        })
                    })
                }
            })(jQuery);
            jQuery(document).ready(function () {
                jQuery('div.RW_TImeline_Ev_<?php echo esc_html( $rw_ti_id );?>').RW_TImeline_Ev_<?php echo esc_html( $rw_ti_id );?>({
                    scroll: '2',
                    scrollingTime: '300'
                });

                function runEffect_<?php echo esc_html( $rw_ti_id );?>() {
                    var selectedEffect = jQuery(".rich_web_effect_val_<?php echo esc_html( $rw_ti_id );?>").val();
                    var options = {};
                    if (selectedEffect === "fold") {
                        options = {horizFirst: true};
                    } else if (selectedEffect === "puff") {
                        options = {percent: 200};
                    } else if (selectedEffect === "drop") {
                        options = {direction: "left"};
                    }
                    jQuery(".RW_TImeline_Ev_<?php echo esc_html( $rw_ti_id );?>").show(selectedEffect, options, 2500);
                };
                runEffect_<?php echo esc_html( $rw_ti_id );?>();
            });
        </script>
        <input type="text" style="display: none;" name="" id="effect_val"
               class="rich_web_effect_val_<?php echo esc_html( $rw_ti_id ); ?>"
               value="<?php echo esc_html( $get_timeline_style_options[0]->rw_timeline_effect ); ?>">
        <div class="RW_TImeline_Ev_Cont_<?php echo esc_html( $rw_ti_id ); ?>">
            <div class="RW_TImeline_Ev_<?php echo esc_html( $rw_ti_id ); ?>" style="display: none;">
                <div class="rw_timeline_wrap_<?php echo esc_html( $rw_ti_id ); ?>">
					<?php
					for ( $i = 0; $i < count( $get_timeline_options ); $i ++ ) { ?>
                        <div class="rw_event_<?php echo esc_html( $rw_ti_id ); ?>"
                             data-date="<?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_month ); ?>/<?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_day ); ?>/<?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_year ); ?>">
                            <div class="layout3">
                                <h3 class="rw_ti_ev_h3"><?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_title ); ?></h3>
                                <p>
									<?php echo html_entity_decode( $get_timeline_options[ $i ]->rw_timeline_text ); ?>
                                </p>
                            </div>
							<?php if ( $get_timeline_options[ $i ]->rw_timeline_01 == '' ) {
								$get_timeline_options[ $i ]->rw_timeline_01 = 'calendar';
							} ?>
							<?php if ( $get_timeline_options[ $i ]->rw_timeline_02 == '' ) {
								$get_timeline_options[ $i ]->rw_timeline_02 = '#3F3F3F';
							} ?>
                            <span class="date"
                                  style="color: <?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_02 ); ?>">
										<i class="rich_web rich_web-<?php echo esc_html( $get_timeline_options[ $i ]->rw_timeline_01 ); ?>"></i>
										<?php
										$RW_TimeLine_Date_Months = array(
											'',
											'January',
											'February',
											'March',
											'April',
											'May',
											'June',
											'July',
											'August',
											'September',
											'October',
											'November',
											'December'
										);
										if ( $get_timeline_style_options_2[0]->rw_timeline_01 == 'yy-mm-dd' ) {
											echo esc_html( $get_timeline_options[ $i ]->rw_timeline_year . '-' . $get_timeline_options[ $i ]->rw_timeline_month . '-' . $get_timeline_options[ $i ]->rw_timeline_day );
										} else if ( $get_timeline_style_options_2[0]->rw_timeline_01 == 'yy MM dd' ) {
											echo esc_html( $get_timeline_options[ $i ]->rw_timeline_year . ' ' . $RW_TimeLine_Date_Months[ intval( $get_timeline_options[ $i ]->rw_timeline_month ) ] . ' ' . $get_timeline_options[ $i ]->rw_timeline_day );
										} else if ( $get_timeline_style_options_2[0]->rw_timeline_01 == 'dd-mm-yy' ) {
											echo esc_html( $get_timeline_options[ $i ]->rw_timeline_day . '-' . $get_timeline_options[ $i ]->rw_timeline_month . '-' . $get_timeline_options[ $i ]->rw_timeline_year );
										} else if ( $get_timeline_style_options_2[0]->rw_timeline_01 == 'dd MM yy' ) {
											echo esc_html( $get_timeline_options[ $i ]->rw_timeline_day . ' ' . $RW_TimeLine_Date_Months[ intval( $get_timeline_options[ $i ]->rw_timeline_month ) ] . ' ' . $get_timeline_options[ $i ]->rw_timeline_year );
										} else if ( $get_timeline_style_options_2[0]->rw_timeline_01 == 'mm-dd-yy' ) {
											echo esc_html( $get_timeline_options[ $i ]->rw_timeline_month . '-' . $get_timeline_options[ $i ]->rw_timeline_day . '-' . $get_timeline_options[ $i ]->rw_timeline_year );
										} else if ( $get_timeline_style_options_2[0]->rw_timeline_01 == 'MM dd, yy' ) {
											echo esc_html( $RW_TimeLine_Date_Months[ intval( $get_timeline_options[ $i ]->rw_timeline_month ) ] . ' ' . $get_timeline_options[ $i ]->rw_timeline_day . ',' . $get_timeline_options[ $i ]->rw_timeline_year );
										} else if ( $get_timeline_style_options_2[0]->rw_timeline_01 == 'dd.mm.yy' ) {
											echo esc_html( $get_timeline_options[ $i ]->rw_timeline_day . '.' . $get_timeline_options[ $i ]->rw_timeline_month . '.' . $get_timeline_options[ $i ]->rw_timeline_year );
										} else if ( $get_timeline_style_options_2[0]->rw_timeline_01 == '' ) {
											echo esc_html( $get_timeline_options[ $i ]->rw_timeline_month . '.' . $get_timeline_options[ $i ]->rw_timeline_day . '.' . $get_timeline_options[ $i ]->rw_timeline_year );
										}
										?>
									</span>
                        </div>
					<?php } ?>
                </div>
            </div>
        </div>
	<?php }
}

?>