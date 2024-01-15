<?php
add_action( 'wp_ajax_rich_web_timeline', 'rich_web_ti_edit' );
function rich_web_ti_edit() {
	if ( ! isset( $_POST['rwt_nonce'] ) || $_POST['rwt_nonce'] == "" || ! wp_verify_nonce( $_POST['rwt_nonce'], 'rw_timeline_nonce' ) ) {
		wp_send_json_error( "Not valid nonce." );
	}
	$number_1 = sanitize_text_field( $_POST['foobar_1'] );
	global $wpdb;
	$table_name_1       = $wpdb->prefix . "rich_web_timeline_manager";
	$get_timeline_param = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name_1 WHERE id = %d", $number_1 ) );
	wp_send_json_success( $get_timeline_param );
}
add_action( 'wp_ajax_rich_web_copy_timeline', 'rich_web_ti_copty' );
function rich_web_ti_copty() {
	if ( ! isset( $_POST['rwt_nonce'] ) || $_POST['rwt_nonce'] == "" || ! wp_verify_nonce( $_POST['rwt_nonce'], 'rw_timeline_nonce' ) ) {
		wp_send_json_error( "Not valid nonce." );
	}
	$number_1 = sanitize_text_field( $_POST['foobar_1'] );
	global $wpdb;
	$table_name_1         = $wpdb->prefix . "rich_web_timeline_manager";
	$table_name_2         = $wpdb->prefix . "rich_web_timeline_options";
	$table_name_3         = $wpdb->prefix . "rich_web_timeline_short_options";
	$get_timeline_param   = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name_1 WHERE id = %d", $number_1 ) );
	$get_timeline_options = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name_2 WHERE rw_general_id = %d order by id", $get_timeline_param->id ) );
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_1 (rw_timeline_name, rw_timeline_style_id, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06, rw_timeline_07, rw_timeline_08, rw_timeline_09, rw_timeline_10) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $get_timeline_param->rw_timeline_name, $get_timeline_param->rw_timeline_style_id, $get_timeline_param->rw_timeline_01, $get_timeline_param->rw_timeline_02, $get_timeline_param->rw_timeline_03, $get_timeline_param->rw_timeline_04, $get_timeline_param->rw_timeline_05, $get_timeline_param->rw_timeline_06, $get_timeline_param->rw_timeline_07, $get_timeline_param->rw_timeline_08, $get_timeline_param->rw_timeline_09, $get_timeline_param->rw_timeline_10 ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_ti_id) VALUES (%s)", $max_id ) );
	for ( $i = 0; $i < count( $get_timeline_options ); $i ++ ) {
		$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_2 (rw_general_id, rw_timeline_title, rw_timeline_year, rw_timeline_day, rw_timeline_month, rw_timeline_text, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06, rw_timeline_07, rw_timeline_08, rw_timeline_09, rw_timeline_10) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $max_id, $get_timeline_options[ $i ]->rw_timeline_title, $get_timeline_options[ $i ]->rw_timeline_year, $get_timeline_options[ $i ]->rw_timeline_day, $get_timeline_options[ $i ]->rw_timeline_month, $get_timeline_options[ $i ]->rw_timeline_text, $get_timeline_options[ $i ]->rw_timeline_01, $get_timeline_options[ $i ]->rw_timeline_02, $get_timeline_options[ $i ]->rw_timeline_03, $get_timeline_options[ $i ]->rw_timeline_04, $get_timeline_options[ $i ]->rw_timeline_05, $get_timeline_options[ $i ]->rw_timeline_06, $get_timeline_options[ $i ]->rw_timeline_07, $get_timeline_options[ $i ]->rw_timeline_08, $get_timeline_options[ $i ]->rw_timeline_09, $get_timeline_options[ $i ]->rw_timeline_10 ) );
	}
	wp_send_json_success();
}
add_action( 'wp_ajax_rich_web_timeline_options', 'rich_web_ti_edit_options' );
function rich_web_ti_edit_options() {
	if ( ! isset( $_POST['rwt_nonce'] ) || $_POST['rwt_nonce'] == "" || ! wp_verify_nonce( $_POST['rwt_nonce'], 'rw_timeline_nonce' ) ) {
		wp_send_json_error( "Not valid nonce." );
	}
	$number_1 = sanitize_text_field( $_POST['foobar_1'] );
	global $wpdb;
	$table_name_2        = $wpdb->prefix . "rich_web_timeline_options";
	$get_timeline_option = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name_2 WHERE rw_general_id = %d ORDER BY id ASC", $number_1 ) );
	for ( $i = 0; $i < count( $get_timeline_option ); $i ++ ) {
		$get_timeline_option[ $i ]->rw_timeline_text = html_entity_decode( $get_timeline_option[ $i ]->rw_timeline_text );
	}
	wp_send_json_success( $get_timeline_option );
}
add_action( 'wp_ajax_rich_web_timeline_del', 'rich_web_timeline_delete' );
function rich_web_timeline_delete() {
	if ( ! isset( $_POST['rwt_nonce'] ) || $_POST['rwt_nonce'] == "" || ! wp_verify_nonce( $_POST['rwt_nonce'], 'rw_timeline_nonce' ) ) {
		wp_send_json_error( "Not valid nonce." );
	}
	$del_id = sanitize_text_field( $_POST['foobar_1'] );
	global $wpdb;
	$table_name_1 = $wpdb->prefix . "rich_web_timeline_manager";
	$table_name_2 = $wpdb->prefix . "rich_web_timeline_options";
	$wpdb->query( $wpdb->prepare( "DELETE FROM $table_name_1 WHERE id=%d", $del_id ) );
	$wpdb->query( $wpdb->prepare( "DELETE FROM $table_name_2 WHERE rw_general_id=%d", $del_id ) );
	wp_send_json_success();
}
add_action( 'wp_ajax_rich_web_timeline_style', 'rich_web_timeline_style_func' );
function rich_web_timeline_style_func() {
	if ( ! isset( $_POST['rwt_nonce'] ) || $_POST['rwt_nonce'] == "" || ! wp_verify_nonce( $_POST['rwt_nonce'], 'rw_timeline_nonce' ) ) {
		wp_send_json_error( "Not valid nonce." );
	}
	$number_1 = sanitize_text_field( $_POST['foobar_1'] );
	global $wpdb;
	$table_name_1       = $wpdb->prefix . "rich_web_timeline_style_options";
	$get_timeline_style = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name_1 WHERE id = %d", $number_1 ) );
	wp_send_json_success( $get_timeline_style );
}
add_action( 'wp_ajax_rich_web_timeline_style_2', 'rich_web_timeline_style_func_2' );
function rich_web_timeline_style_func_2() {
	if ( ! isset( $_POST['rwt_nonce'] ) || $_POST['rwt_nonce'] == "" || ! wp_verify_nonce( $_POST['rwt_nonce'], 'rw_timeline_nonce' ) ) {
		wp_send_json_error( "Not valid nonce." );
	}
	$number_2 = sanitize_text_field( $_POST['foobar_2'] );
	global $wpdb;
	$table_name_2         = $wpdb->prefix . "rich_web_timeline_style_options_2";
	$get_timeline_style_2 = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name_2 WHERE style_id = %d", $number_2 ) );
	wp_send_json_success( $get_timeline_style_2 );
}
add_action( 'wp_ajax_rich_web_timeline_del_option', 'rich_web_timeline_delete_option' );
function rich_web_timeline_delete_option() {
	if ( ! isset( $_POST['rwt_nonce'] ) || $_POST['rwt_nonce'] == "" || ! wp_verify_nonce( $_POST['rwt_nonce'], 'rw_timeline_nonce' ) ) {
		wp_send_json_error( "Not valid nonce." );
	}
	$del_id = sanitize_text_field( $_POST['foobar_1'] );
	global $wpdb;
	$table_name_1 = $wpdb->prefix . "rich_web_timeline_style_options";
	$table_name_2 = $wpdb->prefix . "rich_web_timeline_style_options_2";
	$wpdb->query( $wpdb->prepare( "DELETE FROM $table_name_1 WHERE id=%d", $del_id ) );
	$wpdb->query( $wpdb->prepare( "DELETE FROM $table_name_2 WHERE style_id=%d", $del_id ) );
	wp_send_json_success();
}
add_action( 'wp_ajax_rich_web_timeline_copy_style', 'rich_web_timeline_copy_style_option' );
function rich_web_timeline_copy_style_option() {
	if ( ! isset( $_POST['rwt_nonce'] ) || $_POST['rwt_nonce'] == "" || ! wp_verify_nonce( $_POST['rwt_nonce'], 'rw_timeline_nonce' ) ) {
		wp_send_json_error( "Not valid nonce." );
	}
	$number_1 = sanitize_text_field( $_POST['foobar_1'] );
	$number_2 = sanitize_text_field( $_POST['foobar_2'] );
	global $wpdb;
	$table_name_1         = $wpdb->prefix . "rich_web_timeline_style_options";
	$table_name_2         = $wpdb->prefix . "rich_web_timeline_style_options_2";
	$get_timeline_style   = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name_1 WHERE id = %d", $number_1 ) );
	$get_timeline_style_2 = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name_2 WHERE style_id = %d", $number_2 ) );
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_1 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_round_border_col_hover, rw_timeline_title_bg_color, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $get_timeline_style->rw_timeline_title, $get_timeline_style->rw_timeline_theme, $get_timeline_style->rw_timeline_title_col, $get_timeline_style->rw_timeline_border_col, $get_timeline_style->rw_timeline_number_col, $get_timeline_style->rw_timeline_line_col, $get_timeline_style->rw_timeline_font_size, $get_timeline_style->rich_web_timeline_fonts, $get_timeline_style->rw_timeline_md_color, $get_timeline_style->rw_timeline_hover_color, $get_timeline_style->rw_timeline_sort, $get_timeline_style->rw_timeline_effect, $get_timeline_style->rw_timeline_round_bg, $get_timeline_style->rw_timeline_round_bg_hover, $get_timeline_style->rw_timeline_round_border_px, $get_timeline_style->rw_timeline_border_px, $get_timeline_style->rw_timeline_box_shadow, $get_timeline_style->rw_timeline_box_shadow_px, $get_timeline_style->rw_timeline_border_type_article, $get_timeline_style->rw_timeline_border_type_line, $get_timeline_style->rw_timeline_icon_type, $get_timeline_style->rw_timeline_icon_color, $get_timeline_style->rw_timeline_icon_size, $get_timeline_style->rw_timeline_year_block_bg, $get_timeline_style->rw_timeline_round_size, $get_timeline_style->rw_timeline_bg_color, $get_timeline_style->rw_timeline_bg_color_hover, $get_timeline_style->rw_timeline_box_shadow_hover, $get_timeline_style->rw_timeline_year_color_hover, $get_timeline_style->rw_timeline_year_block_bg_hover, $get_timeline_style->rw_timeline_year_size, $get_timeline_style->rw_timeline_md_color_hover, $get_timeline_style->rw_timeline_md_border_color, $get_timeline_style->rw_timeline_md_border_color_hover, $get_timeline_style->rw_timeline_round_border_col, $get_timeline_style->rw_timeline_round_border_col_hover, $get_timeline_style->rw_timeline_title_bg_color, $get_timeline_style->rw_timeline_01, $get_timeline_style->rw_timeline_02, $get_timeline_style->rw_timeline_03, $get_timeline_style->rw_timeline_04 ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_2 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06, rw_timeline_07, rw_timeline_08, rw_timeline_09, rw_timeline_10, rw_timeline_11, rw_timeline_12, rw_timeline_13, rw_timeline_14, rw_timeline_15, rw_timeline_16, rw_timeline_17, rw_timeline_18, rw_timeline_19, rw_timeline_20, rw_timeline_21, rw_timeline_22, rw_timeline_23, rw_timeline_24, rw_timeline_25, rw_timeline_26, rw_timeline_27, rw_timeline_28, rw_timeline_29, rw_timeline_30, rw_timeline_31, rw_timeline_32 ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $max_id, $get_timeline_style_2->rw_timeline_month_col, $get_timeline_style_2->rw_timeline_month_col_hov, $get_timeline_style_2->rw_timeline_icon_col, $get_timeline_style_2->rw_timeline_icon_size, $get_timeline_style_2->rw_timeline_icon_style, $get_timeline_style_2->rw_timeline_md_bg_color, $get_timeline_style_2->rw_timeline_md_bg_color_hover, $get_timeline_style_2->rw_timeline_01, $get_timeline_style_2->rw_timeline_02, $get_timeline_style_2->rw_timeline_03, $get_timeline_style_2->rw_timeline_04, $get_timeline_style_2->rw_timeline_05, $get_timeline_style_2->rw_timeline_06, $get_timeline_style_2->rw_timeline_07, $get_timeline_style_2->rw_timeline_08, $get_timeline_style_2->rw_timeline_09, $get_timeline_style_2->rw_timeline_10, $get_timeline_style_2->rw_timeline_11, $get_timeline_style_2->rw_timeline_12, $get_timeline_style_2->rw_timeline_13, $get_timeline_style_2->rw_timeline_14, $get_timeline_style_2->rw_timeline_15, $get_timeline_style_2->rw_timeline_16, $get_timeline_style_2->rw_timeline_17, $get_timeline_style_2->rw_timeline_18, $get_timeline_style_2->rw_timeline_19, $get_timeline_style_2->rw_timeline_20, $get_timeline_style_2->rw_timeline_21, $get_timeline_style_2->rw_timeline_22, $get_timeline_style_2->rw_timeline_23, $get_timeline_style_2->rw_timeline_24, $get_timeline_style_2->rw_timeline_25, $get_timeline_style_2->rw_timeline_26, $get_timeline_style_2->rw_timeline_27, $get_timeline_style_2->rw_timeline_28, $get_timeline_style_2->rw_timeline_29, $get_timeline_style_2->rw_timeline_30, $get_timeline_style_2->rw_timeline_31, $get_timeline_style_2->rw_timeline_32 ) );
	wp_send_json_success();
}
?>