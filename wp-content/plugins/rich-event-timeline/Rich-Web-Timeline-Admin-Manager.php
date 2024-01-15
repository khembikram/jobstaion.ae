<?php
if ( ! current_user_can( 'manage_options' ) ) {
	die( 'Access Denied' );
}
global $wpdb;

$ti_table_name_1 = $wpdb->prefix . "rich_web_timeline_manager";
$ti_table_name_2 = $wpdb->prefix . "rich_web_timeline_options";
$ti_table_name_3 = $wpdb->prefix . "rich_web_timeline_style_options";
$ti_table_name_4 = $wpdb->prefix . "rich_web_timeline_short_options";
$ti_table_name_6 = $wpdb->prefix . "rich_web_icons";

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
	if ( check_admin_referer( 'edit-menu_', 'Rich_Web_Timeline_Nonce' ) ) {
		if ( isset( $_POST['rich_webTimeline_Save'] ) ) {
			$rw_timeline_name  = sanitize_text_field( $_POST['rw_timeline_name'] );
			$rw_timeline_style = sanitize_text_field( $_POST['rw_timeline_style'] );
			$RW_Timeline_ShowType  = sanitize_text_field( $_POST['RW_Timeline_ShowType_Val'] );
			$RW_Timeline_PerPage   = sanitize_text_field( $_POST['rich_web_timeline_pp'] );
			$RW_Timeline_LoadMore  = sanitize_text_field( $_POST['RW_Timeline_LoadMore'] );
			$RW_Timeline_Prev_Text = sanitize_text_field( $_POST['RW_Timeline_Prev_Text'] );
			$RW_Timeline_Next_Text = sanitize_text_field( $_POST['RW_Timeline_Next_Text'] );
			$wpdb->query( $wpdb->prepare( "INSERT INTO $ti_table_name_1 (id, rw_timeline_name, rw_timeline_style_id, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05) VALUES (%d, %s, %s, %s, %s, %s, %s, %s)", '', $rw_timeline_name, $rw_timeline_style, $RW_Timeline_ShowType, $RW_Timeline_PerPage, $RW_Timeline_LoadMore, $RW_Timeline_Prev_Text, $RW_Timeline_Next_Text ) );
			$max_id = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_1 WHERE id>%d order by id desc limit 1", 0 ) );
			$wpdb->query( $wpdb->prepare( "INSERT INTO $ti_table_name_4 (id, rw_timeline_ti_id) VALUES (%d, %s)", '', $max_id[0]->id ) );

			$rw_ti_HidNum = sanitize_text_field( $_POST['rw_ti_HidNum'] );
			for ( $i = 1; $i <= $rw_ti_HidNum; $i ++ ) {
				$rw_ti_title = sanitize_text_field( $_POST[ 'rw_ti_title_' . $i ] );
				$rw_ti_year  = sanitize_text_field( $_POST[ 'rw_ti_year_' . $i ] );
				$rw_ti_day   = sanitize_text_field( $_POST[ 'rw_ti_day_' . $i ] );
				$rw_ti_month = sanitize_text_field( $_POST[ 'rw_ti_month_' . $i ] );
				$rw_ti_text  = str_replace( "\&", "&", sanitize_text_field( esc_html( $_POST[ 'rw_ti_text_' . $i ] ) ) );
				$rw_ti_icon  = sanitize_text_field( $_POST[ 'rw_ti_icon_' . $i ] );
				$rw_ti_color = sanitize_text_field( $_POST[ 'rw_ti_color_' . $i ] );

				$wpdb->query( $wpdb->prepare( "INSERT INTO $ti_table_name_2 (id, rw_general_id, rw_timeline_title, rw_timeline_year, rw_timeline_day, rw_timeline_month, rw_timeline_text, rw_timeline_01, rw_timeline_02) VALUES (%d, %d, %s, %s, %s, %s, %s, %s, %s)", '', $max_id[0]->id, $rw_ti_title, $rw_ti_year, $rw_ti_day, $rw_ti_month, $rw_ti_text, $rw_ti_icon, $rw_ti_color ) );
			}
		} else if ( isset( $_POST['rich_webTimeline_Update'] ) ) {
			$rw_timeline_name  = sanitize_text_field( $_POST['rw_timeline_name'] );
			$rw_timeline_style = sanitize_text_field( $_POST['rw_timeline_style'] );
			$id                = sanitize_text_field( $_POST['rw_ti_id'] );

			$RW_Timeline_ShowType  = sanitize_text_field( $_POST['RW_Timeline_ShowType_Val'] );
			$RW_Timeline_PerPage   = sanitize_text_field( $_POST['rich_web_timeline_pp'] );
			$RW_Timeline_LoadMore  = sanitize_text_field( $_POST['RW_Timeline_LoadMore'] );
			$RW_Timeline_Prev_Text = sanitize_text_field( $_POST['RW_Timeline_Prev_Text'] );
			$RW_Timeline_Next_Text = sanitize_text_field( $_POST['RW_Timeline_Next_Text'] );

			$wpdb->query( $wpdb->prepare( "UPDATE $ti_table_name_1 set rw_timeline_style_id = %s, rw_timeline_name = %s, rw_timeline_01 = %s, rw_timeline_02 = %s, rw_timeline_03 = %s, rw_timeline_04 = %s, rw_timeline_05 = %s WHERE id = %d", $rw_timeline_style, $rw_timeline_name, $RW_Timeline_ShowType, $RW_Timeline_PerPage, $RW_Timeline_LoadMore, $RW_Timeline_Prev_Text, $RW_Timeline_Next_Text, $id ) );
			$wpdb->query( $wpdb->prepare( "DELETE FROM $ti_table_name_2 WHERE rw_general_id = %d", $id ) );

			$rw_ti_HidNum = sanitize_text_field( $_POST['rw_ti_HidNum'] );
			for ( $i = 1; $i <= $rw_ti_HidNum; $i ++ ) {
				$rw_ti_title = sanitize_text_field( $_POST[ 'rw_ti_title_' . $i ] );
				$rw_ti_year  = sanitize_text_field( $_POST[ 'rw_ti_year_' . $i ] );
				$rw_ti_day   = sanitize_text_field( $_POST[ 'rw_ti_day_' . $i ] );
				$rw_ti_month = sanitize_text_field( $_POST[ 'rw_ti_month_' . $i ] );
				$rw_ti_text  = str_replace( "\&", "&", sanitize_text_field( esc_html( $_POST[ 'rw_ti_text_' . $i ] ) ) );
				$rw_ti_icon  = sanitize_text_field( $_POST[ 'rw_ti_icon_' . $i ] );
				$rw_ti_color = sanitize_text_field( $_POST[ 'rw_ti_color_' . $i ] );

				$wpdb->query( $wpdb->prepare( "INSERT INTO $ti_table_name_2 (id, rw_general_id, rw_timeline_title, rw_timeline_year, rw_timeline_day, rw_timeline_month, rw_timeline_text, rw_timeline_01, rw_timeline_02) VALUES (%d, %d, %s, %s, %s, %s, %s, %s, %s)", '', $id, $rw_ti_title, $rw_ti_year, $rw_ti_day, $rw_ti_month, $rw_ti_text, $rw_ti_icon, $rw_ti_color ) );
			}
		}
	} else {
		wp_die( 'Security check fail' );
	}
}

$get_timeline       = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_1 WHERE id>%d order by id", 0 ) );
$max_short_id       = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_4 WHERE id>%d order by id desc limit 1", 0 ) );
$get_sstyle_options = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_3 WHERE id>%d order by id", 0 ) );
$Rich_WebIconCount  = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_6 WHERE id>%d order by id", 0 ) );
?>
<form method="POST" enctype="multipart/form-data">
	<?php wp_nonce_field( 'edit-menu_', 'Rich_Web_Timeline_Nonce' ); ?>
	<?php require_once( 'Rich-Web-Timeline-Header.php' ); ?>
    <div class="Rich_Web_Timeline_Fixed_Div" style="display: none;"></div>
    <div class="Rich_Web_Timeline_Absolute_Div" style="display: none;">
        <div class="Rich_Web_Timeline_Relative_Div">
            <p> Are you sure you want to remove ? </p>
            <span class="Rich_Web_Timeline_Relative_No">No</span>
            <span class="Rich_Web_Timeline_Relative_Yes">Yes</span>
        </div>
    </div>
    <div style="position: relative; width: 99%; margin-right: 0; height: 50px;">
        <input type="button" class="AddTimeline" value="New Timeline"
               onclick="addTimeline(<?php echo is_array( $max_short_id ) && count( $max_short_id ) > 0 ? esc_js( $max_short_id[0]->id + 1 ) : 1; ?>)">
        <input type="submit" class="SaveTimeline" value="Save" name="rich_webTimeline_Save">
        <input type="submit" class="UpdateTimeline" value="Update" name="rich_webTimeline_Update">
        <input type="button" class="CanselTimeline" value="Cancel" onclick="canselTimeline()">
        <input type="text" style="display:none" id="upd_id_TI" name="upd_id_TI">
    </div>
    <div class="Rich_Web_Timeline_Content">
        <div class="Rich_Web_Timeline_Table_Data">
            <table class="RW_TI_Table_1">
                <tr class="RW_TI_Table_1_Tr">
                    <td>No</td>
                    <td>Timeline Name</td>
                    <td>Timeline Style</td>
                    <td>Events Count</td>
                    <td>Copy</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </table>
            <table class="RW_TI_Table_2">
				<?php for ( $i = 0; $i < count( $get_timeline ); $i ++ ) {
					$get_timeline_style = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_3 WHERE id=%d", $get_timeline[ $i ]->rw_timeline_style_id ) );
					$get_timeline_event = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_2 WHERE rw_general_id=%d", $get_timeline[ $i ]->id ) );
					?>
                    <tr class="RW_TI_Table_2_Tr">
                        <td><?php echo esc_html( $i + 1 ); ?></td>
                        <td><?php echo esc_html( $get_timeline[ $i ]->rw_timeline_name ); ?></td>
                        <td><?php echo esc_html( $get_timeline_style[0]->rw_timeline_title ); ?></td>
                        <td><?php echo esc_html( count( $get_timeline_event ) ); ?></td>
                        <td onclick="rw_ti_copy(<?php echo esc_js( $get_timeline[ $i ]->id ); ?>)"><i
                                    class="rw_ti_fileso rich_web rich_web-files-o"></i></td>
                        <td onclick="rw_ti_edit(<?php echo esc_js( $get_timeline[ $i ]->id ); ?>)"><i
                                    class="rw_ti_pencil rich_web rich_web-pencil"></i></td>
                        <td onclick="rw_ti_del(<?php echo esc_js( $get_timeline[ $i ]->id ); ?>)"><i
                                    class="rw_ti_trash rich_web rich_web-trash"></i></td>
                    </tr>
				<?php } ?>
            </table>
        </div>
        <div class="Rich_Web_New_Timeline" style="display: none;">
            <table class="Rich_Web_Timeline_ShortTable">
                <tr class="Rich_Web_TI_ST_TR_1">
                    <td>Shortcode</td>
                </tr>
                <tr class="Rich_Web_TI_ST_TR_2">
                    <td>Copy &amp; paste the shortcode directly into any WordPress post or page.</td>
                </tr>
                <tr class="Rich_Web_TI_ST_TR_2">
                    <td class="rich_web_Timeline_ID"></td>
                </tr>
                <tr class="Rich_Web_TI_ST_TR_1">
                    <td>Templete Include</td>
                </tr>
                <tr class="Rich_Web_TI_ST_TR_2">
                    <td>Copy &amp; paste this code into a template file to include the timeline within your theme.</td>
                </tr>
                <tr class="Rich_Web_TI_ST_TR_2">
                    <td class="rich_web_Timeline_PID"></td>
                </tr>
            </table>
            <table class="Rich_Web_Timeline_SaveTable">
                <tr class="Rich_Web_TI_SaveTable_TR">
                    <td style="width: 50%;">Timeline Name</td>
                    <td style="width: 50%;">Timeline Style</td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR">
                    <td style="width: 50%;">
                        <input type="text" class="Rich_Web_TI_Select_Menu Rich_Web_TI_ST_Name" name="rw_timeline_name"
                               placeholder=" * Required" required="">
                    </td>
                    <td style="width: 50%;">
                        <select class="Rich_Web_TI_Select_Menu Rich_Web_TI_ST_Style" name="rw_timeline_style">
							<?php for ( $i = 0; $i < count( $get_sstyle_options ); $i ++ ) { ?>
                                <option value="<?php echo esc_attr( $get_sstyle_options[ $i ]->id ); ?>"><?php echo esc_attr( $get_sstyle_options[ $i ]->rw_timeline_title ); ?></option>
							<?php } ?>
                        </select>
                    </td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR">
                    <td colspan="2">Timeline Show Type</td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR">
                    <td colspan="2" style="height: 25px;">
						<span class="RW_Timeline_ShowType_span">
							<input type="radio" name="RW_Timeline_ShowType" class="RW_Timeline_ShowType" value="All"
                                   checked> All
						</span>
                        <span class="RW_Timeline_ShowType_span">
							<input type="radio" name="RW_Timeline_ShowType" class="RW_Timeline_ShowType"
                                   value="Pagination"> Pagination
						</span>
                        <span class="RW_Timeline_ShowType_span">
							<input type="radio" name="RW_Timeline_ShowType" class="RW_Timeline_ShowType"
                                   value="Load More"> Load More
						</span>
                        <input type="text" style="display: none;" class="RW_Timeline_ShowType_Val"
                               name="RW_Timeline_ShowType_Val" value="">
                    </td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR">
                    <td>Timeline Per Page</td>
                    <td class="lmp"></td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR">
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_per_page" type="range" value=""
                                   id="rich_web_timeline_pp" name="rich_web_timeline_pp" min="0" max="30">
                            <span class="range-timeline__value rich_web_timeline_pp_span"
                                  id="rich_web_timeline_pp_span">0</span>
                        </div>
                    </td>
                    <td>
                        <div class="pInputs pInputs1" style="display: none;">
                            <input type="text" name="RW_Timeline_Prev_Text" id="RW_Timeline_Prev_Text"
                                   class="Rich_Web_TI_Select_Menu" value="Prev">
                            <input type="text" name="RW_Timeline_Next_Text" id="RW_Timeline_Next_Text"
                                   class="Rich_Web_TI_Select_Menu" value="Next">

                        </div>
                        <div class="pInputs pInputs2" style="display: none;">
                            <input type="text" name="RW_Timeline_LoadMore" id="RW_Timeline_LoadMore"
                                   class="Rich_Web_TI_Select_Menu" value="Load More ...">

                        </div>
                    </td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR">
                    <td colspan="2" class="Rich_Web_TI_td_Data">Settings</td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR_1" style="background: #f1f1f1;">
                    <td class="Rich_Web_TI_td_DO Rich_Web_TI_td_DO_day" style="width: 50%;">Title</td>
                    <td style="width: 50%;">Date ( dd.mm.yyyy )</td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR_1">
                    <td style="width: 50%;">
                        <input type="text" class="Rich_Web_TI_Select_Menu Rich_Web_TI_td_DO_Title_input">
                    </td>
                    <td style="width: 50%;">
                        <input type="text" class="Rich_Web_TI_Select_Menu" id="datepicker">
                    </td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR_1">
                    <td style="width: 50%;">Icon</td>
                    <td style="width: 50%;"></td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR_1">
                    <td style="width: 50%;">
                        <select class="Rich_Web_TI_Select_Menu Rich_Web_TI_td_Icon_Input"
                                style="font-family: 'FontAwesome', Arial;">
                            <option value="none" selected> None</option>
							<?php for ( $i = 0; $i < count( $Rich_WebIconCount ); $i ++ ) { ?>
                                <option value="<?php echo esc_attr( strtolower( str_replace( " ", "-", $Rich_WebIconCount[ $i ]->Icon_Name ) ) ); ?>"><?php echo '&#x' . esc_attr( $Rich_WebIconCount[ $i ]->Icon_Type ) . '&nbsp; &nbsp; &nbsp;' . esc_attr( $Rich_WebIconCount[ $i ]->Icon_Name ); ?></option>
							<?php } ?>
                        </select>
                    </td>
                    <td style="width: 50%;"></td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR_1">
                    <td colspan="2">Text</td>
                </tr>
                <tr class="Rich_Web_TI_SaveTable_TR_1">
                    <td colspan="2">
                        <textarea id="Rich_Web_Timeline_Editing_Cont" class="Rich_Web_Timeline_Text_Input"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="Rich_Web_TI_td_Data_Form" colspan="2" style="padding:0px;">
                        <input type="button" class="rich_web_Save_TI" onclick="rich_web_Save_TI()" value="Save">
                        <input type="button" class="rich_web_Update_TI" style="display: none;"
                               onclick="Rich_Web_Update_TI()" value="Update">
                        <input type="button" class="Rich_Web_Res_TI" onclick="Rich_Web_Res_TI()" value="Reset">
                    </td>
                </tr>
            </table>
            <table class="Rich_Web_TI_SaveTable_2">
                <tr>
                    <td>No</td>
                    <td>Timeline Title</td>
                    <td>Day - Month - Year</td>
                    <td>Color</td>
                    <td>Copy</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </table>
            <table class="Rich_Web_TI_SaveTable_3" onmousemove="rich_webTiSortable()">
                <tbody class="ui-sortable"></tbody>
            </table>
            <input style="display: none;" type="text" value="0" name='rw_ti_HidNum' class="Rich_Web_TI_HidNum">
            <input style="display: none;" type="text" value="" name='rw_ti_id' class="Rich_Web_TI_idNum">
        </div>
    </div>
</form>