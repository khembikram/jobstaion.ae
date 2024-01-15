<?php
if ( ! current_user_can( 'manage_options' ) ) {
	die( 'Access Denied' );
}
global $wpdb;

$ti_table_name_1 = $wpdb->prefix . "rich_web_timeline_style_options";
$ti_table_name_2 = $wpdb->prefix . "rich_web_timeline_style_options_2";

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
	if ( check_admin_referer( 'edit-menu_', 'Rich_Web_Timeline_Nonce' ) ) {
		$rw_timeline_title = sanitize_text_field( $_POST['rich_web_timeline_title'] );
		$rw_timeline_theme = sanitize_text_field( $_POST['rich_web_timeline_theme'] );
		if ( $rw_timeline_theme == '5' || $rw_timeline_theme == '6' ) {
			$rw_type_theme = "_2";
		} else {
			$rw_type_theme = "";
		}

		$rw_timeline_title_col               = sanitize_text_field( $_POST[ "rich_web_timeline_title_color" . $rw_type_theme ] );
		$rw_timeline_border_col              = sanitize_text_field( $_POST[ "rich_web_timeline_border_color" . $rw_type_theme ] );
		$rw_timeline_number_col              = sanitize_text_field( $_POST[ "rich_web_timeline_number_color" . $rw_type_theme ] );
		$rw_timeline_line_col                = sanitize_text_field( $_POST[ "rich_web_timeline_line_color" . $rw_type_theme ] );
		$rw_timeline_font_size               = sanitize_text_field( $_POST[ "rich_web_timeline_font_size" . $rw_type_theme ] );
		$rw_timeline_fonts                   = sanitize_text_field( $_POST[ "rich_web_timeline_fonts" . $rw_type_theme ] );
		$rw_timeline_md_color                = sanitize_text_field( $_POST[ "rich_web_timeline_md_color" . $rw_type_theme ] );
		$rw_timeline_hover_color             = sanitize_text_field( $_POST[ "rich_web_timeline_hover_color" . $rw_type_theme ] );
		$rich_web_timeline_sort              = sanitize_text_field( $_POST[ "rich_web_timeline_sort" . $rw_type_theme ] );
		$rw_timeline_effect                  = sanitize_text_field( $_POST[ "rich_web_timeline_effect" . $rw_type_theme ] );
		$rw_timeline_round_bg                = sanitize_text_field( $_POST[ "rich_web_timeline_round_bg" . $rw_type_theme ] );
		$rw_timeline_round_bg_hover          = sanitize_text_field( $_POST[ "rich_web_timeline_round_bg_hover" . $rw_type_theme ] );
		$rw_timeline_round_border_px         = sanitize_text_field( $_POST[ "rich_web_timeline_round_border_px" . $rw_type_theme ] );
		$rw_timeline_border_px               = sanitize_text_field( $_POST[ "rich_web_timeline_border_px" . $rw_type_theme ] );
		$rw_timeline_box_shadow              = sanitize_text_field( $_POST[ "rich_web_timeline_box_shadow" . $rw_type_theme ] );
		$rw_timeline_box_shadow_px           = sanitize_text_field( $_POST[ "rich_web_timeline_box_shadow_px" . $rw_type_theme ] );
		$rw_timeline_border_type_article     = sanitize_text_field( $_POST[ "rich_web_timeline_border_type_article" . $rw_type_theme ] );
		$rw_timeline_border_type_line        = sanitize_text_field( $_POST[ "rich_web_timeline_border_type_line" . $rw_type_theme ] );
		$rw_timeline_icon_type               = sanitize_text_field( $_POST[ "rich_web_timeline_icon_type" . $rw_type_theme ] );
		$rw_timeline_icon_color              = sanitize_text_field( $_POST[ "rich_web_timeline_icon_color" . $rw_type_theme ] );
		$rw_timeline_icon_size               = sanitize_text_field( $_POST[ "rich_web_timeline_icon_size" . $rw_type_theme ] );
		$rw_timeline_year_block_bg           = sanitize_text_field( $_POST[ "rich_web_timeline_year_block_bg" . $rw_type_theme ] );
		$rw_timeline_round_size              = sanitize_text_field( $_POST[ "rich_web_timeline_round_size" . $rw_type_theme ] );
		$rw_timeline_year_color_hover        = sanitize_text_field( $_POST[ "rich_web_timeline_year_color_hover" . $rw_type_theme ] );
		$rw_timeline_year_block_bg_hover     = sanitize_text_field( $_POST[ "rich_web_timeline_year_block_bg_hover" . $rw_type_theme ] );
		$rw_timeline_timeline_year_size      = sanitize_text_field( $_POST[ "rich_web_timeline_year_size" . $rw_type_theme ] );
		$rw_timeline_md_color_hover          = sanitize_text_field( $_POST[ "rich_web_timeline_md_color_hover" . $rw_type_theme ] );
		$rw_timeline_md_border_color         = sanitize_text_field( $_POST[ "rich_web_timeline_md_border_color" . $rw_type_theme ] );
		$rw_timeline_md_border_color_hover   = sanitize_text_field( $_POST[ "rich_web_timeline_md_border_color_hover" . $rw_type_theme ] );
		$rw_timeline_round_border_col        = sanitize_text_field( $_POST[ "rich_web_timeline_round_border_col" . $rw_type_theme ] );
		$rw_timeline_round_border_col_hover  = sanitize_text_field( $_POST[ "rich_web_timeline_round_border_col_hover" . $rw_type_theme ] );
		$rw_timeline_title_bg_color          = sanitize_text_field( $_POST[ "rich_web_timeline_title_bg_color" . $rw_type_theme ] );
		$rw_timeline_bg_color                = sanitize_text_field( $_POST[ "rich_web_timeline_bg_color" . $rw_type_theme ] );
		$rw_timeline_bg_color_hover          = sanitize_text_field( $_POST[ "rich_web_timeline_bg_color_hover" . $rw_type_theme ] );
		$rw_timeline_box_shadow_hover        = sanitize_text_field( $_POST[ "rich_web_timeline_box_shadow_hover" . $rw_type_theme ] );
		$rw_timeline_year_border_color       = sanitize_text_field( $_POST[ "rich_web_timeline_year_border_color" . $rw_type_theme ] );
		$rw_timeline_month_col               = sanitize_text_field( $_POST[ "rich_web_timeline_month_col" . $rw_type_theme ] );
		$rw_timeline_icon_type_st            = sanitize_text_field( $_POST[ "rich_web_timeline_icon_type_st" . $rw_type_theme ] );
		$rw_timeline_icon_color_st           = sanitize_text_field( $_POST[ "rich_web_timeline_icon_color_st" . $rw_type_theme ] );
		$rw_timeline_icon_size_st            = sanitize_text_field( $_POST[ "rich_web_timeline_icon_size_st" . $rw_type_theme ] );
		$rw_timeline_md_bg_color             = sanitize_text_field( $_POST[ "rich_web_timeline_md_bg_color" . $rw_type_theme ] );
		$rw_timeline_md_color_bg_hover       = sanitize_text_field( $_POST[ "rich_web_timeline_md_color_bg_hover" . $rw_type_theme ] );
		$rw_timeline_month_col_hov           = sanitize_text_field( $_POST[ "rich_web_timeline_month_col_hov" . $rw_type_theme ] );
		$rw_timeline_year_border_color_hover = sanitize_text_field( $_POST[ "rich_web_timeline_year_border_hover_color" . $rw_type_theme ] );
		$RW_TimeLine_7_DFormat               = sanitize_text_field( $_POST['RW_TimeLine_7_DFormat'] );
		$RW_TimeLine_1_7_PaginType           = sanitize_text_field( $_POST['RW_TimeLine_1_7_PaginType'] );
		$RW_TimeLine_1_7_PaginCol            = sanitize_text_field( $_POST['RW_TimeLine_1_7_PaginCol'] );
		$RW_TimeLine_1_7_PaginBackCol        = sanitize_text_field( $_POST['RW_TimeLine_1_7_PaginBackCol'] );
		$RW_TimeLine_1_7_PaginCurrCol        = sanitize_text_field( $_POST['RW_TimeLine_1_7_PaginCurrCol'] );
		$RW_TimeLine_1_7_PaginCurrBackCol    = sanitize_text_field( $_POST['RW_TimeLine_1_7_PaginCurrBackCol'] );
		$RW_TimeLine_1_7_PaginHoverCol       = sanitize_text_field( $_POST['RW_TimeLine_1_7_PaginHoverCol'] );
		$RW_TimeLine_1_7_PaginHoverBackCol   = sanitize_text_field( $_POST['RW_TimeLine_1_7_PaginHoverBackCol'] );
		$RW_TimeLine_1_7_PaginFS             = sanitize_text_field( $_POST['RW_TimeLine_1_7_PaginFS'] );
		$RW_TimeLine_1_7_PaginFF             = sanitize_text_field( $_POST['RW_TimeLine_1_7_PaginFF'] );

		if ( isset( $_POST['rich_webTimeline_Save'] ) ) {
			if ( $rw_timeline_theme == '1' || $rw_timeline_theme == '2' || $rw_timeline_theme == '3' || $rw_timeline_theme == '4' || $rw_timeline_theme == '5' || $rw_timeline_theme == '6' || $rw_timeline_theme == '7' ) {
				$wpdb->query( $wpdb->prepare( "INSERT INTO $ti_table_name_1 (id, rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_round_border_col_hover, rw_timeline_title_bg_color, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04 ) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s)", '', $rw_timeline_title, $rw_timeline_theme, $rw_timeline_title_col, $rw_timeline_border_col, $rw_timeline_number_col, $rw_timeline_line_col, $rw_timeline_font_size, $rw_timeline_fonts, $rw_timeline_md_color, $rw_timeline_hover_color, $rich_web_timeline_sort, $rw_timeline_effect, $rw_timeline_round_bg, $rw_timeline_round_bg_hover, $rw_timeline_round_border_px, $rw_timeline_border_px, $rw_timeline_box_shadow, $rw_timeline_box_shadow_px, $rw_timeline_border_type_article, $rw_timeline_border_type_line, $rw_timeline_icon_type, $rw_timeline_icon_color, $rw_timeline_icon_size, $rw_timeline_year_block_bg, $rw_timeline_round_size, $rw_timeline_bg_color, $rw_timeline_bg_color_hover, $rw_timeline_box_shadow_hover, $rw_timeline_year_color_hover, $rw_timeline_year_block_bg_hover, $rw_timeline_timeline_year_size, $rw_timeline_md_color_hover, $rw_timeline_md_border_color, $rw_timeline_md_border_color_hover, $rw_timeline_round_border_col, $rw_timeline_round_border_col_hover, $rw_timeline_title_bg_color, $rw_timeline_year_border_color, $rw_timeline_year_border_color_hover, $RW_TimeLine_1_7_PaginType, $RW_TimeLine_1_7_PaginCol ) );
				$max_id = $wpdb->get_results( $wpdb->prepare( "SELECT id FROM $ti_table_name_1 WHERE id>%d order by id desc limit 1", 0 ) );
				$wpdb->query( $wpdb->prepare( "INSERT INTO $ti_table_name_2 (id, style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06, rw_timeline_07, rw_timeline_08) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $max_id[0]->id, $rw_timeline_month_col, $rw_timeline_month_col_hov, $rw_timeline_icon_color_st, $rw_timeline_icon_size_st, $rw_timeline_icon_type_st, $rw_timeline_md_bg_color, $rw_timeline_md_bg_color_hover, $RW_TimeLine_7_DFormat, $RW_TimeLine_1_7_PaginBackCol, $RW_TimeLine_1_7_PaginCurrCol, $RW_TimeLine_1_7_PaginCurrBackCol, $RW_TimeLine_1_7_PaginHoverCol, $RW_TimeLine_1_7_PaginHoverBackCol, $RW_TimeLine_1_7_PaginFS, $RW_TimeLine_1_7_PaginFF ) );
			}

		} else if ( isset( $_POST['rich_webTimeline_Update'] ) ) {
			$id = sanitize_text_field( $_POST['rw_ti_id'] );

			if ( $rw_timeline_theme == '1' || $rw_timeline_theme == '2' || $rw_timeline_theme == '3' || $rw_timeline_theme == '4' || $rw_timeline_theme == '5' || $rw_timeline_theme == '6' || $rw_timeline_theme == '7' ) {
				$wpdb->query( $wpdb->prepare( "UPDATE $ti_table_name_1 set rw_timeline_title = %s, rw_timeline_theme = %s, rw_timeline_title_col = %s, rw_timeline_border_col = %s, rw_timeline_number_col = %s, rw_timeline_line_col = %s, rw_timeline_font_size = %s, rich_web_timeline_fonts = %s, rw_timeline_md_color = %s, rw_timeline_hover_color = %s, rw_timeline_sort = %s, rw_timeline_effect = %s, rw_timeline_round_bg = %s, rw_timeline_round_bg_hover = %s, rw_timeline_round_border_px = %s, rw_timeline_border_px = %s, rw_timeline_box_shadow = %s, rw_timeline_box_shadow_px = %s, rw_timeline_border_type_article = %s, rw_timeline_border_type_line = %s, rw_timeline_icon_type = %s, rw_timeline_icon_color = %s, rw_timeline_icon_size = %s, rw_timeline_year_block_bg = %s, rw_timeline_round_size = %s, rw_timeline_bg_color = %s, rw_timeline_bg_color_hover = %s, rw_timeline_box_shadow_hover = %s, rw_timeline_year_color_hover = %s, rw_timeline_year_block_bg_hover = %s, rw_timeline_year_size = %s, rw_timeline_md_color_hover = %s, rw_timeline_md_border_color = %s, rw_timeline_md_border_color_hover = %s, rw_timeline_round_border_col = %s, rw_timeline_round_border_col_hover = %s, rw_timeline_title_bg_color = %s, rw_timeline_01 = %s, rw_timeline_02 = %s, rw_timeline_03 = %s, rw_timeline_04 = %s WHERE id = %d", $rw_timeline_title, $rw_timeline_theme, $rw_timeline_title_col, $rw_timeline_border_col, $rw_timeline_number_col, $rw_timeline_line_col, $rw_timeline_font_size, $rw_timeline_fonts, $rw_timeline_md_color, $rw_timeline_hover_color, $rich_web_timeline_sort, $rw_timeline_effect, $rw_timeline_round_bg, $rw_timeline_round_bg_hover, $rw_timeline_round_border_px, $rw_timeline_border_px, $rw_timeline_box_shadow, $rw_timeline_box_shadow_px, $rw_timeline_border_type_article, $rw_timeline_border_type_line, $rw_timeline_icon_type, $rw_timeline_icon_color, $rw_timeline_icon_size, $rw_timeline_year_block_bg, $rw_timeline_round_size, $rw_timeline_bg_color, $rw_timeline_bg_color_hover, $rw_timeline_box_shadow_hover, $rw_timeline_year_color_hover, $rw_timeline_year_block_bg_hover, $rw_timeline_timeline_year_size, $rw_timeline_md_color_hover, $rw_timeline_md_border_color, $rw_timeline_md_border_color_hover, $rw_timeline_round_border_col, $rw_timeline_round_border_col_hover, $rw_timeline_title_bg_color, $rw_timeline_year_border_color, $rw_timeline_year_border_color_hover, $RW_TimeLine_1_7_PaginType, $RW_TimeLine_1_7_PaginCol, $id ) );
				$wpdb->query( $wpdb->prepare( "UPDATE $ti_table_name_2 set rw_timeline_month_col = %s, rw_timeline_month_col_hov = %s, rw_timeline_icon_col = %s, rw_timeline_icon_size = %s, rw_timeline_icon_style = %s, rw_timeline_md_bg_color = %s, rw_timeline_md_bg_color_hover = %s, rw_timeline_01 = %s,  rw_timeline_02 = %s, rw_timeline_03 = %s, rw_timeline_04 = %s, rw_timeline_05 = %s, rw_timeline_06 = %s, rw_timeline_07 = %s, rw_timeline_08 = %s WHERE style_id = %d", $rw_timeline_month_col, $rw_timeline_month_col_hov, $rw_timeline_icon_color_st, $rw_timeline_icon_size_st, $rw_timeline_icon_type_st, $rw_timeline_md_bg_color, $rw_timeline_md_color_bg_hover, $RW_TimeLine_7_DFormat, $RW_TimeLine_1_7_PaginBackCol, $RW_TimeLine_1_7_PaginCurrCol, $RW_TimeLine_1_7_PaginCurrBackCol, $RW_TimeLine_1_7_PaginHoverCol, $RW_TimeLine_1_7_PaginHoverBackCol, $RW_TimeLine_1_7_PaginFS, $RW_TimeLine_1_7_PaginFF, $id ) );
			}

		}
	} else {
		wp_die( 'Security check fail' );
	}
}

$get_timeline_style   = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_1 WHERE id>%d order by id", 0 ) );
$get_timeline_style_2 = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ti_table_name_2 WHERE id=%d", $get_timeline_style[0]->id ) );

$Rich_Web_SB_Fonts = array(
	'Abadi MT Condensed Light',
	'Aharoni',
	'Aldhabi',
	'Andalus',
	'Angsana New',
	'AngsanaUPC',
	'Aparajita',
	'Arabic Typesetting',
	'Arial',
	'Arial Black',
	'Batang',
	'BatangChe',
	'Browallia New',
	'BrowalliaUPC',
	'Calibri',
	'Calibri Light',
	'Calisto MT',
	'Cambria',
	'Candara',
	'Century Gothic',
	'Comic Sans MS',
	'Consolas',
	'Constantia',
	'Copperplate Gothic',
	'Copperplate Gothic Light',
	'Corbel',
	'Cordia New',
	'CordiaUPC',
	'Courier New',
	'DaunPenh',
	'David',
	'DFKai-SB',
	'DilleniaUPC',
	'DokChampa',
	'Dotum',
	'DotumChe',
	'Ebrima',
	'Estrangelo Edessa',
	'EucrosiaUPC',
	'Euphemia',
	'FangSong',
	'Franklin Gothic Medium',
	'FrankRuehl',
	'FreesiaUPC',
	'Gabriola',
	'Gadugi',
	'Gautami',
	'Georgia',
	'Gisha',
	'Gulim',
	'GulimChe',
	'Gungsuh',
	'GungsuhChe',
	'Impact',
	'IrisUPC',
	'Iskoola Pota',
	'JasmineUPC',
	'KaiTi',
	'Kalinga',
	'Kartika',
	'Khmer UI',
	'KodchiangUPC',
	'Kokila',
	'Lao UI',
	'Latha',
	'Leelawadee',
	'Levenim MT',
	'LilyUPC',
	'Lucida Console',
	'Lucida Handwriting Italic',
	'Lucida Sans Unicode',
	'Malgun Gothic',
	'Mangal',
	'Manny ITC',
	'Marlett',
	'Meiryo',
	'Meiryo UI',
	'Microsoft Himalaya',
	'Microsoft JhengHei',
	'Microsoft JhengHei UI',
	'Microsoft New Tai Lue',
	'Microsoft PhagsPa',
	'Microsoft Sans Serif',
	'Microsoft Tai Le',
	'Microsoft Uighur',
	'Microsoft YaHei',
	'Microsoft YaHei UI',
	'Microsoft Yi Baiti',
	'MingLiU_HKSCS',
	'MingLiU_HKSCS-ExtB',
	'Miriam',
	'Mongolian Baiti',
	'MoolBoran',
	'MS UI Gothic',
	'MV Boli',
	'Myanmar Text',
	'Narkisim',
	'Nirmala UI',
	'News Gothic MT',
	'NSimSun',
	'Nyala',
	'Palatino Linotype',
	'Plantagenet Cherokee',
	'Raavi',
	'Rod',
	'Sakkal Majalla',
	'Segoe Print',
	'Segoe Script',
	'Segoe UI Symbol',
	'Shonar Bangla',
	'Shruti',
	'SimHei',
	'SimKai',
	'Simplified Arabic',
	'SimSun',
	'SimSun-ExtB',
	'Sylfaen',
	'Tahoma',
	'Times New Roman',
	'Traditional Arabic',
	'Trebuchet MS',
	'Tunga',
	'Utsaah',
	'Vani',
	'Vijaya'
);
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
    <div style="position: relative; width: 100%; right: 1%; height: 50px;">
        <input type="button" class="AddOption" value="Add Option" onclick="addTiOption()">
        <input type="submit" class="SaveOption" value="Save" name="rich_webTimeline_Save">
        <input type="submit" class="UpdateOption" value="Update" name="rich_webTimeline_Update">
        <input type="button" class="CanselOption" value="Cancel" onclick="canselTiOption()">
        <input type="text" style="display:none" id="upd_id_TI" name="upd_id_TI">
        <input style="display: none;" type="text" value="" name='rw_ti_id' class="Rich_Web_TI_Id">
    </div>
    <div class="RW_TimeLine_Loading">
        <img src="<?php echo esc_url( plugins_url( '/Images/loading.gif', __FILE__ ) ); ?>">
    </div>
    <div class="Rich_Web_Timeline_Content">
        <div class="Rich_Web_Timeline_Table_Data_Option">
            <table class="RW_TI_Table_G_1">
                <tr class="RW_TI_Table_G_1_Tr">
                    <td>No</td>
                    <td>Option Name</td>
                    <td>Timeline Type</td>
                    <td>Copy</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </table>
            <table class="RW_TI_Table_G_2">
				<?php for ( $i = 0; $i < count( $get_timeline_style ); $i ++ ) { ?>
                    <tr class='RW_TI_Table_G_2_Tr'>
                        <td><?php echo esc_html( $i + 1 ); ?></td>
                        <td><?php echo esc_html( $get_timeline_style[ $i ]->rw_timeline_title ); ?></td>
						<?php if ( $get_timeline_style[ $i ]->rw_timeline_theme == "Amazing" || $get_timeline_style[ $i ]->rw_timeline_theme == "Classic" ) { ?>
                            <td><?php echo esc_html( $get_timeline_style[ $i ]->rw_timeline_theme . ' Timeline' ); ?></td>
						<?php } else { ?>
                            <td><?php echo esc_html( 'Timeline ' . $get_timeline_style[ $i ]->rw_timeline_theme ); ?></td>
						<?php } ?>
                        <td onclick="rw_ti_copy_option('<?php echo esc_html( $get_timeline_style[ $i ]->id ); ?>')"><i
                                    class='rw_ti_fileso rich_web rich_web-files-o'></i></td>
                        <td onclick="rw_ti_edit_option('<?php echo esc_html( $get_timeline_style[ $i ]->id ); ?>')"><i
                                    class='rw_ti_pencil rich_web rich_web-pencil'></i></td>
                        <td onclick="rw_ti_del_option('<?php echo esc_html( $get_timeline_style[ $i ]->id ); ?>')"><i
                                    class='rw_ti_trash rich_web rich_web-trash'></i></td>
                    </tr>
				<?php } ?>
                <tr class='RW_TI_Table_G_2_Tr'>
                    <td><?php echo esc_html( $i + 1 ); ?></td>
                    <td>Style 15</td>
                    <td>Amazing Timeline (Pro)</td>
                    <td><a href="<?php echo esc_url( 'https://rich-web.org/wordpress-timeline-amazing/' ); ?>"
                           target="_blank">Demo 1</a></td>
                    <td><a href="<?php echo esc_url( 'https://rich-web.org/wordpress-timeline-amazing-2/' ); ?>"
                           target="_blank">Demo 2</a></td>
                    <td></td>
                </tr>
                <tr class='RW_TI_Table_G_2_Tr'>
                    <td><?php echo esc_html( $i + 2 ); ?></td>
                    <td>Style 16</td>
                    <td>Classic Timeline (Pro)</td>
                    <td><a href="<?php echo esc_url( 'https://rich-web.org/wordpress-timeline-classic/' ); ?>"
                           target="_blank">Demo 1</a></td>
                    <td><a href="<?php echo esc_url( 'https://rich-web.org/wordpress-timeline-classic-2/' ); ?>"
                           target="_blank">Demo 2</a></td>
                    <td></td>
                </tr>
                <tr class='RW_TI_Table_G_2_Tr'>
                    <td><?php echo esc_html( $i + 3 ); ?></td>
                    <td>Style 17</td>
                    <td>Fashion Timeline (Pro)</td>
                    <td><a href="<?php echo esc_url( 'https://rich-web.org/wordpress-timeline-fashion/' ); ?>"
                           target="_blank">Demo 1</a></td>
                    <td><a href="<?php echo esc_url( 'https://rich-web.org/wordpress-timeline-fashion-2/' ); ?>"
                           target="_blank">Demo 2</a></td>
                    <td></td>
                </tr>
                <tr class='RW_TI_Table_G_2_Tr'>
                    <td><?php echo esc_html( $i + 4 ); ?></td>
                    <td>Style 18</td>
                    <td>Twist Timeline (Pro)</td>
                    <td><a href="<?php echo esc_url( 'https://rich-web.org/wordpress-timeline-twist/' ); ?>"
                           target="_blank">Demo 1</a></td>
                    <td><a href="<?php echo esc_url( 'https://rich-web.org/wordpress-timeline-twist-2/' ); ?>"
                           target="_blank">Demo 2</a></td>
                    <td></td>
                </tr>
                <tr class='RW_TI_Table_G_2_Tr'>
                    <td><?php echo esc_html( $i + 5 ); ?></td>
                    <td>Style 19</td>
                    <td>Double Sided Timeline (Pro)</td>
                    <td><a href="<?php echo esc_url( 'https://rich-web.org/wordpress-timeline-double-sided/' ); ?>"
                           target="_blank">Demo 1</a></td>
                    <td><a href="<?php echo esc_url( 'https://rich-web.org/wordpress-timeline-double-sided-2/' ); ?>"
                           target="_blank">Demo 2</a></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="Rich_Web_New_Timeline_Option">
            <table class="RW_Ti_Option_Table">
                <tr>
                    <td colspan="2">Timeline Name</td>
                    <td colspan="2">Timeline Type</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" class="Rich_Web_TI_Select_Menu" name="rich_web_timeline_title" value=""
                               id="rich_web_timeline_title" required="" placeholder="* Required">
                    </td>
                    <td colspan="2">
                        <select class="Rich_Web_TI_Select_Menu" id="rich_web_timeline_theme"
                                name="rich_web_timeline_theme" onchange="RW_TimeLine_Theme_Changed()">
                            <option value="1">Timeline 1</option>
                            <option value="2">Timeline 2</option>
                            <option value="3">Timeline 3</option>
                            <option value="4">Timeline 4</option>
                            <option value="5">Timeline 5</option>
                            <option value="6">Timeline 6</option>
                            <option value="7">Timeline 7</option>
                            <option disabled="disabled" value="Amazing">Amazing Timeline (Pro)</option>
                            <option disabled="disabled" value="Classic">Classic Timeline (Pro)</option>
                            <option disabled="disabled" value="Fashion">Fashion Timeline (Pro)</option>
                            <option disabled="disabled" value="Twist">Twist Timeline (Pro)</option>
                            <option disabled="disabled" value="Double Sided">Double Sided Timeline (Pro)</option>
                        </select>
                    </td>
                </tr>
            </table>
            <table class="RW_Ti_Option_Table" id="RW_Ti_Option_TiTable">
                <tr class="RW_Op_Title">
                    <td colspan="4">General Options</td>
                </tr>
                <tr>
                    <td>Timeline Effect</td>
                    <td>Sortable</td>
                    <td><span class="rw_timeline_line_col">Line Color</span></td>
                    <td><span class="rw_timeline_data_format">Data Format</span></td>
                </tr>
                <tr>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rich_web_timeline_effect" id="rich_web_timeline_effect"
                                name="rich_web_timeline_effect">
                            <option value="blind" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'blind' ) {
								echo esc_html( 'selected' );
							} ?>> Blind
                            </option>
                            <option value="bounce" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'bounce' ) {
								echo esc_html( 'selected' );
							} ?>> Bounce
                            </option>
                            <option value="drop" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'drop' ) {
								echo esc_html( 'selected' );
							} ?>> Drop
                            </option>
                            <option value="fade" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'fade' ) {
								echo esc_html( 'selected' );
							} ?>> Fade
                            </option>
                            <option value="fold" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'fold' ) {
								echo esc_html( 'selected' );
							} ?>> Fold
                            </option>
                            <option value="puff" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'puff' ) {
								echo esc_html( 'selected' );
							} ?>> Puff
                            </option>
                            <option value="pulsate" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'pulsate' ) {
								echo esc_html( 'selected' );
							} ?>> Pulsate
                            </option>
                            <option value="scale" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'scale' ) {
								echo esc_html( 'selected' );
							} ?>> Scale
                            </option>
                            <option value="shake" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'shake' ) {
								echo esc_html( 'selected' );
							} ?>> Shake
                            </option>
                            <option value="slide" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'slide' ) {
								echo esc_html( 'selected' );
							} ?>> Slide
                            </option>
                        </select>
                    </td>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rich_web_timeline_sort" id="rich_web_timeline_sort"
                                name="rich_web_timeline_sort">
                            <option value="ASC" <?php if ( $get_timeline_style[0]->rw_timeline_sort == 'ASC' ) {
								echo esc_html( 'selected' );
							} ?>> ASC
                            </option>
                            <option value="DESC" <?php if ( $get_timeline_style[0]->rw_timeline_sort == 'DESC' ) {
								echo esc_html( 'selected' );
							} ?>> DESC
                            </option>
                        </select>
                    </td>
                    <td>
                        <div class="rw_timeline_line_col">
                            <input type="text" class="rich_web_timeline_color rich_web_timeline_line_color"
                                   id="rich_web_timeline_line_color" name="rich_web_timeline_line_color"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_line_col ); ?>"/>
                        </div>
                    </td>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rw_timeline_data_format" name="RW_TimeLine_7_DFormat"
                                id="RW_TimeLine_7_DFormat">
                            <option value="yy-mm-dd" <?php if ( $get_timeline_style[0]->rw_timeline_01 == 'yy-mm-dd' ) {
								echo esc_attr( 'selected' );
							} ?>> yy-mm-dd
                            </option>
                            <option value="yy MM dd" <?php if ( $get_timeline_style[0]->rw_timeline_01 == 'yy MM dd' ) {
								echo esc_attr( 'selected' );
							} ?>> yy MM dd
                            </option>
                            <option value="dd-mm-yy" <?php if ( $get_timeline_style[0]->rw_timeline_01 == 'dd-mm-yy' ) {
								echo esc_attr( 'selected' );
							} ?>> dd-mm-yy
                            </option>
                            <option value="dd MM yy" <?php if ( $get_timeline_style[0]->rw_timeline_01 == 'dd MM yy' ) {
								echo esc_attr( 'selected' );
							} ?>> dd MM yy
                            </option>
                            <option value="mm-dd-yy" <?php if ( $get_timeline_style[0]->rw_timeline_01 == 'mm-dd-yy' ) {
								echo esc_attr( 'selected' );
							} ?>> mm-dd-yy
                            </option>
                            <option value="" <?php if ( $get_timeline_style[0]->rw_timeline_01 == '' ) {
								echo esc_attr( 'selected' );
							} ?>> mm.dd.yy
                            </option>
                            <option value="dd.mm.yy" <?php if ( $get_timeline_style[0]->rw_timeline_01 == 'dd.mm.yy' ) {
								echo esc_attr( 'selected' );
							} ?>> dd.mm.yy
                            </option>
                            <option value="MM dd, yy" <?php if ( $get_timeline_style[0]->rw_timeline_01 == 'MM dd, yy' ) {
								echo esc_attr( 'selected' );
							} ?>> MM dd, yy
                            </option>
                        </select>
                    </td>
                </tr>
                <tr class="RW_Op_Title">
                    <td colspan="4">Title Options</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>Hover Color</td>
                    <td>Font Size (px)</td>
                    <td>Font Family</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_title_color"
                               id="rich_web_timeline_title_color" name="rich_web_timeline_title_color"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_title_col ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_hover_color"
                               id="rich_web_timeline_hover_color" name="rich_web_timeline_hover_color"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_hover_color ); ?>"/>
                    </td>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_font_size" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_font_size ); ?>"
                                   id="rich_web_timeline_font_size" name="rich_web_timeline_font_size" min="0"
                                   max="100">
                            <span class="range-timeline__value rich_web_timeline_font_size_span"
                                  id="rich_web_timeline_font_size_span">0</span>
                        </div>
                    </td>
                    <td>
                        <select class="rich_web_timeline_color_font_family Rich_Web_TI_Select_Menu"
                                id="rich_web_timeline_color_font_family" name="rich_web_timeline_fonts">
							<?php foreach ( $Rich_Web_SB_Fonts as $value ) {
								if ( $value == $get_timeline_style[0]->rich_web_timeline_fonts ) { ?>
                                    <option value="<?php echo esc_attr( $value ); ?>"
                                            selected><?php echo esc_html( $value ); ?></option>
								<?php } else { ?>
                                    <option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php }
							} ?>
                        </select>
                    </td>
                </tr>
                <tr class="rw_timeline_title_bg_tr">
                    <td>Background Color</td>
                    <td colspan="3"></td>
                </tr>
                <tr class="rw_timeline_title_bg_tr">
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_title_bg_color"
                               id="rich_web_timeline_title_bg_color" name="rich_web_timeline_title_bg_color"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_title_bg_color ); ?>"/>
                    </td>
                    <td colspan="3"></td>
                </tr>
                <tr class="RW_Op_Title">
                    <td colspan="4">Article Options</td>
                </tr>
                <tr>
                    <td>Background Color</td>
                    <td>Hover Background Color</td>
                    <td>Border Color</td>
                    <td>Border Width (px)</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_bg_color"
                               id="rich_web_timeline_bg_color" name="rich_web_timeline_bg_color"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_bg_color ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_bg_color_hover"
                               id="rich_web_timeline_bg_color_hover" name="rich_web_timeline_bg_color_hover"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_bg_color_hover ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_border_color"
                               id="rich_web_timeline_border_color" name="rich_web_timeline_border_color"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_border_col ); ?>"/>
                    </td>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_border_px" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_border_px ); ?>"
                                   id="rich_web_timeline_border_px" name="rich_web_timeline_border_px" min="0" max="10">
                            <span class="range-timeline__value rich_web_timeline_border_span"
                                  id="rich_web_timeline_border_span">0</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Box Shadow (px)</td>
                    <td>Box Shadow Color</td>
                    <td>Hover Box Shadow Color</td>
                    <td>Border Style</td>
                </tr>
                <tr>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_box_shadow_px" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_box_shadow_px ); ?>"
                                   id="rich_web_timeline_box_shadow_px" name="rich_web_timeline_box_shadow_px" min="0"
                                   max="100">
                            <span class="range-timeline__value rich_web_timeline_box_shadow_span"
                                  id="rich_web_timeline_box_shadow_span">0</span>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_box_shadow"
                               id="rich_web_timeline_box_shadow" name="rich_web_timeline_box_shadow"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_box_shadow ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_box_shadow_hover"
                               id="rich_web_timeline_box_shadow_hover" name="rich_web_timeline_box_shadow_hover"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_box_shadow_hover ); ?>"/>
                    </td>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rich_web_timeline_border_type_article"
                                id="rich_web_timeline_border_type_article" name="rich_web_timeline_border_type_article">
                            <option value="none" <?php if ( $get_timeline_style[0]->rw_timeline_border_type_article == 'none' ) {
								echo esc_attr( 'selected' );
							} ?>> None
                            </option>
                            <option value="solid" <?php if ( $get_timeline_style[0]->rw_timeline_border_type_article == 'solid' ) {
								echo esc_attr( 'selected' );
							} ?>> Solid
                            </option>
                            <option value="dotted" <?php if ( $get_timeline_style[0]->rw_timeline_border_type_article == 'dotted' ) {
								echo esc_attr( 'selected' );
							} ?>> Dotted
                            </option>
                            <option value="dashed" <?php if ( $get_timeline_style[0]->rw_timeline_border_type_article == 'dashed' ) {
								echo esc_attr( 'selected' );
							} ?>> Dashed
                            </option>
                        </select>
                    </td>
                </tr>
                <tr class="RW_Op_Title">
                    <td colspan="4">Year Options</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>Hover Color</td>
                    <td><span class="rw_timeline_year_bg">Background Color</span></td>
                    <td><span class="rw_timeline_year_bg">Hover Background Color</span></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_number_color"
                               id="rich_web_timeline_number_color" name="rich_web_timeline_number_color"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_number_col ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_year_color_hover"
                               id="rich_web_timeline_year_color_hover" name="rich_web_timeline_year_color_hover"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_year_color_hover ); ?>"/>
                    </td>
                    <td>
                        <div class="rw_timeline_year_bg">
                            <input type="text" class="rich_web_timeline_color rich_web_timeline_year_block_bg"
                                   id="rich_web_timeline_year_block_bg" name="rich_web_timeline_year_block_bg"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_year_block_bg ); ?>"/>
                        </div>
                    </td>
                    <td>
                        <div class="rw_timeline_year_bg">
                            <input type="text" class="rich_web_timeline_color rich_web_timeline_year_block_bg_hover"
                                   id="rich_web_timeline_year_block_bg_hover"
                                   name="rich_web_timeline_year_block_bg_hover"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_year_block_bg_hover ); ?>"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Size (px)</td>
                    <td><span class="rich_web_timeline_ybs">Year Block Size</span></td>
                    <td><span class="rw_timeline_year_border_col">Border Color</span></td>
                    <td><span class="rw_timeline_year_border_col">Hover Border Color</span></td>
                </tr>
                <tr>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_year_size" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_year_size ); ?>"
                                   id="rich_web_timeline_year_size" name="rich_web_timeline_year_size" min="0"
                                   max="100">
                            <span class="range-timeline__value rich_web_timeline_year_size_span"
                                  id="rich_web_timeline_year_size_span">0</span>
                        </div>
                    </td>
                    <td>
                        <div class="rich_web_timeline_ybs">
                            <select class="Rich_Web_TI_Select_Menu rich_web_timeline_round_size"
                                    id="rich_web_timeline_round_size" name="rich_web_timeline_round_size">
                                <option value="big" <?php if ( $get_timeline_style[0]->rw_timeline_round_size == 'big' ) {
									echo esc_attr( 'selected' );
								} ?>> Big
                                </option>
                                <option value="medium" <?php if ( $get_timeline_style[0]->rw_timeline_round_size == 'medium' ) {
									echo esc_attr( 'selected' );
								} ?>> Medium
                                </option>
                                <option value="small" <?php if ( $get_timeline_style[0]->rw_timeline_round_size == 'small' ) {
									echo esc_attr( 'selected' );
								} ?>> Small
                                </option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="rw_timeline_year_border_col">
                            <input type="text" class="rich_web_timeline_color rich_web_timeline_year_border_color"
                                   id="rich_web_timeline_year_block_bg_hover" name="rich_web_timeline_year_border_color"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_01 ); ?>"/>
                        </div>
                    </td>
                    <td>
                        <div class="rw_timeline_year_border_col">
                            <input type="text" class="rich_web_timeline_color rich_web_timeline_year_border_hover_color"
                                   id="rich_web_timeline_year_block_bg_hover"
                                   name="rich_web_timeline_year_border_hover_color"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_02 ); ?>"/>
                        </div>
                    </td>
                </tr>
                <tr class="RW_Op_Title rw_ti_month_opt">
                    <td colspan="4">Header Block Month Options</td>
                </tr>
                <tr class="rw_ti_month_opt">
                    <td>Color</td>
                    <td>Hover Color</td>
                    <td colspan="2"></td>
                </tr>
                <tr class="rw_ti_month_opt">
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_month_col"
                               id="rich_web_timeline_month_col" name="rich_web_timeline_month_col"
                               value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_month_col ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_month_col_hov"
                               id="rich_web_timeline_month_col_hov" name="rich_web_timeline_month_col_hov"
                               value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_month_col_hov ); ?>"/>
                    </td>
                    <td colspan="2"></td>
                </tr>
                <tr class="RW_Op_Title">
                    <td colspan="4">Month/Day Options</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>Hover Color</td>
                    <td><span class="rw_ti_border_opt">Border Color</span></td>
                    <td><span class="rw_ti_border_opt">Hover Border Color</span></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_md_color"
                               id="rich_web_timeline_md_color" name="rich_web_timeline_md_color"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_md_color ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_md_color_hover"
                               id="rich_web_timeline_md_color_hover" name="rich_web_timeline_md_color_hover"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_md_color_hover ); ?>"/>
                    </td>
                    <td>
                        <div class="rw_ti_border_opt">
                            <input type="text" class="rich_web_timeline_color rich_web_timeline_md_border_color"
                                   id="rich_web_timeline_md_border_color" name="rich_web_timeline_md_border_color"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_md_border_color ); ?>"/>
                        </div>
                    </td>
                    <td>
                        <div class="rw_ti_border_opt">
                            <input type="text" class="rich_web_timeline_color rich_web_timeline_md_border_color_hover"
                                   id="rich_web_timeline_md_border_color_hover"
                                   name="rich_web_timeline_md_border_color_hover"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_md_border_color_hover ); ?>"/>
                        </div>
                    </td>
                </tr>
                <tr class="rw_timeline_md_op_st">
                    <td>Background Color</td>
                    <td>Hover Background Color</td>
                    <td colspan="2"></td>
                </tr>
                <tr class="rw_timeline_md_op_st">
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_md_bg_color"
                               id="rich_web_timeline_md_bg_color" name="rich_web_timeline_md_bg_color"
                               value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_md_bg_color ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_md_color_bg_hover"
                               id="rich_web_timeline_md_color_bg_hover" name="rich_web_timeline_md_color_bg_hover"
                               value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_md_bg_color_hover ); ?>"/>
                    </td>
                    <td colspan="2"></td>
                </tr>
                <tr class="RW_Op_Title RW_Op_Title_Round">
                    <td colspan="4">Round Options</td>
                </tr>
                <tr class="RW_Op_Title_Round">
                    <td>Background Color</td>
                    <td>Hover Background Color</td>
                    <td>Border Color</td>
                    <td>Hover Border Color</td>
                </tr>
                <tr class="RW_Op_Title_Round">
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_round_bg"
                               id="rich_web_timeline_round_bg" name="rich_web_timeline_round_bg"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_round_bg ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_round_bg_hover"
                               id="rich_web_timeline_round_bg_hover" name="rich_web_timeline_round_bg_hover"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_round_bg_hover ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_round_border_col"
                               id="rich_web_timeline_round_border_col" name="rich_web_timeline_round_border_col"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_round_border_col ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_round_border_col_hover"
                               id="rich_web_timeline_round_border_col_hover"
                               name="rich_web_timeline_round_border_col_hover"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_round_border_col_hover ); ?>"/>
                    </td>
                </tr>
                <tr class="RW_Op_Title_Round">
                    <td>Border Width (px)</td>
                    <td colspan="3"></td>
                </tr>
                <tr class="RW_Op_Title_Round">
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_round_border_px" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_round_border_px ); ?>"
                                   id="rich_web_timeline_round_border_px" name="rich_web_timeline_round_border_px"
                                   min="0" max="100">
                            <span class="range-timeline__value rich_web_timeline_round_border_px_span"
                                  id="rich_web_timeline_round_border_px_span">0</span>
                        </div>
                    </td>
                    <td colspan="3"></td>
                </tr>
                <tr class="rw_timeline_icons_tr">
                    <td colspan="4">Icons Options</td>
                </tr>
                <tr class="rw_timeline_icons_tr">
                    <td>Icon Color</td>
                    <td>Icon Size (px)</td>
                    <td>Icon Style</td>
                    <td></td>
                </tr>
                <tr class="rw_timeline_icons_tr">
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_icon_color"
                               id="rich_web_timeline_icon_color" name="rich_web_timeline_icon_color"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_icon_color ); ?>"/>
                    </td>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_icon_size" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_icon_size ); ?>"
                                   id="rich_web_timeline_icon_size" name="rich_web_timeline_icon_size" min="0"
                                   max="100">
                            <span class="range-timeline__value rich_web_timeline_icon_size_span"
                                  id="rich_web_timeline_icon_size_span">0</span>
                        </div>
                    </td>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rich_web_timeline_icon_type"
                                id="rich_web_timeline_icon_type" name="rich_web_timeline_icon_type">
                            <option value="angle" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'angle' ) {
								echo esc_attr( 'selected' );
							} ?>> Angle
                            </option>
                            <option value="angle-double" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'angle-double' ) {
								echo esc_attr( 'selected' );
							} ?>> Angle Double
                            </option>
                            <option value="chevron" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'chevron' ) {
								echo esc_attr( 'selected' );
							} ?>> Chevron
                            </option>
                            <option value="chevron-circle" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'chevron-circle' ) {
								echo esc_attr( 'selected' );
							} ?>> Chevron Circle
                            </option>
                            <option value="arrow" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'arrow' ) {
								echo esc_attr( 'selected' );
							} ?>> Arrow
                            </option>
                            <option value="arrow-circle" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'arrow-circle' ) {
								echo esc_attr( 'selected' );
							} ?>> Arrow Circle
                            </option>
                            <option value="arrow-circle-o" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'arrow-circle-o' ) {
								echo esc_attr( 'selected' );
							} ?>> Arrow Circle O
                            </option>
                            <option value="caret" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'caret' ) {
								echo esc_attr( 'selected' );
							} ?>> Caret
                            </option>
                            <option value="caret-square-o" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'caret-square-o' ) {
								echo esc_attr( 'selected' );
							} ?>> Caret Square O
                            </option>
                            <option value="hand-o" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'hand-o' ) {
								echo esc_attr( 'selected' );
							} ?>> Hand O
                            </option>
                            <option value="long-arrow" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'long-arrow' ) {
								echo esc_attr( 'selected' );
							} ?>> Long Arrow
                            </option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr class="rw_timeline_icons_tr_st">
                    <td>M/D Icon Color</td>
                    <td>M/D Icon Size (px)</td>
                    <td>M/D Icon Style</td>
                    <td></td>
                </tr>
                <tr class="rw_timeline_icons_tr_st">
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_icon_color_st"
                               id="rich_web_timeline_icon_color_st" name="rich_web_timeline_icon_color_st"
                               value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_icon_col ); ?>"/>
                    </td>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_icon_size_st" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_icon_size ); ?>"
                                   id="rich_web_timeline_icon_size_st" name="rich_web_timeline_icon_size_st" min="0"
                                   max="100">
                            <span class="range-timeline__value rich_web_timeline_icon_size_span_st"
                                  id="rich_web_timeline_icon_size_span_st">0</span>
                        </div>
                    </td>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rich_web_timeline_icon_type_st"
                                id="rich_web_timeline_icon_type_st" name="rich_web_timeline_icon_type_st">
                            <option value="angle" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'angle' ) {
								echo esc_attr( 'selected' );
							} ?>> Angle
                            </option>
                            <option value="angle-double" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'angle-double' ) {
								echo esc_attr( 'selected' );
							} ?>> Angle Double
                            </option>
                            <option value="chevron" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'chevron' ) {
								echo esc_attr( 'selected' );
							} ?>> Chevron
                            </option>
                            <option value="chevron-circle" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'chevron-circle' ) {
								echo esc_attr( 'selected' );
							} ?>> Chevron Circle
                            </option>
                            <option value="arrow" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'arrow' ) {
								echo esc_attr( 'selected' );
							} ?>> Arrow
                            </option>
                            <option value="arrow-circle" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'arrow-circle' ) {
								echo esc_attr( 'selected' );
							} ?>> Arrow Circle
                            </option>
                            <option value="arrow-circle-o" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'arrow-circle-o' ) {
								echo esc_attr( 'selected' );
							} ?>> Arrow Circle O
                            </option>
                            <option value="caret" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'caret' ) {
								echo esc_attr( 'selected' );
							} ?>> Caret
                            </option>
                            <option value="caret-square-o" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'caret-square-o' ) {
								echo esc_attr( 'selected' );
							} ?>> Caret Square O
                            </option>
                            <option value="hand-o" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'hand-o' ) {
								echo esc_attr( 'selected' );
							} ?>> Hand O
                            </option>
                            <option value="long-arrow" <?php if ( $get_timeline_style_2[0]->rw_timeline_icon_style == 'long-arrow' ) {
								echo esc_attr( 'selected' );
							} ?>> Long Arrow
                            </option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr class="rw_timeline_pagination_tr">
                    <td colspan="4">Pagination and Load More</td>
                </tr>
                <tr class="rw_timeline_pagination_tr">
                    <td>Pagination Type</td>
                    <td>Color</td>
                    <td>Background Color</td>
                    <td>Current Color</td>
                </tr>
                <tr>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu" id="RW_TimeLine_1_7_PaginType"
                                name="RW_TimeLine_1_7_PaginType">
                            <option value="Pagination 1" <?php if ( $get_timeline_style[0]->rw_timeline_03 == 'Pagination 1' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 1
                            </option>
                            <option value="Pagination 2" <?php if ( $get_timeline_style[0]->rw_timeline_03 == 'Pagination 2' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 2
                            </option>
                            <option value="Pagination 3" <?php if ( $get_timeline_style[0]->rw_timeline_03 == 'Pagination 3' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 3
                            </option>
                            <option value="Pagination 4" <?php if ( $get_timeline_style[0]->rw_timeline_03 == 'Pagination 4' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 4
                            </option>
                            <option value="Pagination 5" <?php if ( $get_timeline_style[0]->rw_timeline_03 == 'Pagination 5' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 5
                            </option>
                            <option value="Pagination 6" <?php if ( $get_timeline_style[0]->rw_timeline_03 == 'Pagination 6' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 6
                            </option>
                            <option value="Pagination 7" <?php if ( $get_timeline_style[0]->rw_timeline_03 == 'Pagination 7' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 7
                            </option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_1_7_PaginCol"
                               name="RW_TimeLine_1_7_PaginCol"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_04 ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_1_7_PaginBackCol"
                               name="RW_TimeLine_1_7_PaginBackCol"
                               value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_02 ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_1_7_PaginCurrCol"
                               name="RW_TimeLine_1_7_PaginCurrCol"
                               value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_03 ); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Current Background Color</td>
                    <td>Hover Color</td>
                    <td>Hover Background Color</td>
                    <td>Font Size(px)</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_1_7_PaginCurrBackCol"
                               name="RW_TimeLine_1_7_PaginCurrBackCol"
                               value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_04 ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_1_7_PaginHoverCol"
                               name="RW_TimeLine_1_7_PaginHoverCol"
                               value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_05 ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_1_7_PaginHoverBackCol"
                               name="RW_TimeLine_1_7_PaginHoverBackCol"
                               value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_06 ); ?>"/>
                    </td>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range RW_TimeLine_1_7_PaginFS" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style_2[0]->rw_timeline_07 ); ?>"
                                   id="RW_TimeLine_1_7_PaginFS" name="RW_TimeLine_1_7_PaginFS" min="10" max="25">
                            <span class="range-timeline__value RW_TimeLine_1_7_PaginFS"
                                  id="$RW_TimeLine_1_7_PaginFS">0</span>
                        </div>
                    </td>
                <tr>

                    <td>Font Family</td>
                    <td colspan="3"></td>
                </tr>
                <td>
                    <select class="rich_web_timeline_color_font_family Rich_Web_TI_Select_Menu"
                            id="RW_TimeLine_1_7_PaginFF" name="RW_TimeLine_1_7_PaginFF">
						<?php foreach ( $Rich_Web_SB_Fonts as $value ) {
							if ( $value == $get_timeline_style_2[0]->rw_timeline_08 ) { ?>
                                <option value="<?php echo esc_attr( $value ); ?>"
                                        selected><?php echo esc_attr( $value ); ?></option>
							<?php } else { ?>
                                <option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_attr( $value ); ?></option>
							<?php }
						} ?>
                    </select>
                </td>


                </tr>
            </table>
            <table class="RW_Ti_Option_Table" id="RW_Ti_Option_TiTable_2">
                <tr class="RW_Op_Title">
                    <td colspan="4">General Options</td>
                </tr>
                <tr>
                    <td>Timeline Effect</td>
                    <td>Sortable</td>
                    <td><span>Line Color</span></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rich_web_timeline_effect" id="rich_web_timeline_effect"
                                name="rich_web_timeline_effect_2">
                            <option value="blind" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'blind' ) {
								echo esc_attr( 'selected' );
							} ?>> Blind
                            </option>
                            <option value="bounce" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'bounce' ) {
								echo esc_attr( 'selected' );
							} ?>> Bounce
                            </option>
                            <option value="drop" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'drop' ) {
								echo esc_attr( 'selected' );
							} ?>> Drop
                            </option>
                            <option value="fade" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'fade' ) {
								echo esc_attr( 'selected' );
							} ?>> Fade
                            </option>
                            <option value="fold" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'fold' ) {
								echo esc_attr( 'selected' );
							} ?>> Fold
                            </option>
                            <option value="puff" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'puff' ) {
								echo esc_attr( 'selected' );
							} ?>> Puff
                            </option>
                            <option value="pulsate" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'pulsate' ) {
								echo esc_attr( 'selected' );
							} ?>> Pulsate
                            </option>
                            <option value="scale" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'scale' ) {
								echo esc_attr( 'selected' );
							} ?>> Scale
                            </option>
                            <option value="shake" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'shake' ) {
								echo esc_attr( 'selected' );
							} ?>> Shake
                            </option>
                            <option value="slide" <?php if ( $get_timeline_style[0]->rw_timeline_effect == 'slide' ) {
								echo esc_attr( 'selected' );
							} ?>> Slide
                            </option>
                        </select>
                    </td>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rich_web_timeline_sort" id="rich_web_timeline_sort"
                                name="rich_web_timeline_sort_2">
                            <option value="ASC" <?php if ( $get_timeline_style[0]->rw_timeline_sort == 'ASC' ) {
								echo esc_attr( 'selected' );
							} ?>> ASC
                            </option>
                            <option value="DESC" <?php if ( $get_timeline_style[0]->rw_timeline_sort == 'DESC' ) {
								echo esc_attr( 'selected' );
							} ?>> DESC
                            </option>
                        </select>
                    </td>
                    <td>
                        <div>
                            <input type="text" class="rich_web_timeline_color rich_web_timeline_line_color"
                                   id="rich_web_timeline_line_color" name="rich_web_timeline_line_color_2"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_line_col ); ?>"/>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr class="RW_Op_Title">
                    <td colspan="4">Title Options</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>Hover Color</td>
                    <td>Font Size (px)</td>
                    <td>Font Family</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_title_color"
                               id="rich_web_timeline_title_color" name="rich_web_timeline_title_color_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_title_col ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_hover_color"
                               id="rich_web_timeline_hover_color" name="rich_web_timeline_hover_color_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_hover_color ); ?>"/>
                    </td>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_font_size" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_font_size ); ?>"
                                   id="rich_web_timeline_font_size" name="rich_web_timeline_font_size_2" min="0"
                                   max="100">
                            <span class="range-timeline__value rich_web_timeline_font_size_span"
                                  id="rich_web_timeline_font_size_span">0</span>
                        </div>
                    </td>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rich_web_timeline_color_font_family"
                                id="rich_web_timeline_color_font_family" name="rich_web_timeline_fonts_2">
							<?php foreach ( $Rich_Web_SB_Fonts as $value ) {
								if ( $value == $get_timeline_style[0]->rich_web_timeline_fonts ) { ?>
                                    <option value="<?php echo esc_html( $value ); ?>"
                                            selected><?php echo esc_html( $value ); ?></option>
								<?php } else { ?>
                                    <option value="<?php echo esc_html( $value ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php }
							} ?>
                        </select>
                    </td>
                </tr>
                <tr class="rw_timeline_title_bg_tr">
                    <td>Background Color</td>
                    <td colspan="3"></td>
                </tr>
                <tr class="rw_timeline_title_bg_tr">
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_title_bg_color"
                               id="rich_web_timeline_title_bg_color" name="rich_web_timeline_title_bg_color_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_title_bg_color ); ?>"/>
                    </td>
                    <td colspan="3"></td>
                </tr>
                <tr class="RW_Op_Title">
                    <td colspan="4">Article Options</td>
                </tr>
                <tr>
                    <td>Background Color</td>
                    <td>Hover Background Color</td>
                    <td>Border Color</td>
                    <td>Border Width (px)</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_bg_color"
                               id="rich_web_timeline_bg_color" name="rich_web_timeline_bg_color_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_bg_color ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_bg_color_hover"
                               id="rich_web_timeline_bg_color_hover" name="rich_web_timeline_bg_color_hover_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_bg_color_hover ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_border_color"
                               id="rich_web_timeline_border_color" name="rich_web_timeline_border_color_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_border_col ); ?>"/>
                    </td>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_border_px" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_border_px ); ?>"
                                   id="rich_web_timeline_border_px" name="rich_web_timeline_border_px_2" min="0"
                                   max="100">
                            <span class="range-timeline__value rich_web_timeline_border_span"
                                  id="rich_web_timeline_border_span">0</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Box Shadow (px)</td>
                    <td>Box Shadow Color</td>
                    <td>Hover Box Shadow Color</td>
                    <td>Border Style</td>
                </tr>
                <tr>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_box_shadow_px" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_box_shadow_px ); ?>"
                                   id="rich_web_timeline_box_shadow_px" name="rich_web_timeline_box_shadow_px_2" min="0"
                                   max="100">
                            <span class="range-timeline__value rich_web_timeline_box_shadow_span"
                                  id="rich_web_timeline_box_shadow_span">0</span>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_box_shadow"
                               id="rich_web_timeline_box_shadow" name="rich_web_timeline_box_shadow_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_box_shadow ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_box_shadow_hover"
                               id="rich_web_timeline_box_shadow_hover" name="rich_web_timeline_box_shadow_hover_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_box_shadow_hover ); ?>"/>
                    </td>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rich_web_timeline_border_type_article"
                                id="rich_web_timeline_border_type_article"
                                name="rich_web_timeline_border_type_article_2">
                            <option value="none" <?php if ( $get_timeline_style[0]->rw_timeline_border_type_article == 'none' ) {
								echo esc_attr( 'selected' );
							} ?>> None
                            </option>
                            <option value="solid" <?php if ( $get_timeline_style[0]->rw_timeline_border_type_article == 'solid' ) {
								echo esc_attr( 'selected' );
							} ?>> Solid
                            </option>
                            <option value="dotted" <?php if ( $get_timeline_style[0]->rw_timeline_border_type_article == 'dotted' ) {
								echo esc_attr( 'selected' );
							} ?>> Dotted
                            </option>
                            <option value="dashed" <?php if ( $get_timeline_style[0]->rw_timeline_border_type_article == 'dashed' ) {
								echo esc_attr( 'selected' );
							} ?>> Dashed
                            </option>
                        </select>
                    </td>
                </tr>
                <tr class="RW_Op_Title">
                    <td colspan="4">Year Options</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>Current Color</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_number_color"
                               id="rich_web_timeline_number_color" name="rich_web_timeline_number_color_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_number_col ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_year_color_hover"
                               id="rich_web_timeline_year_color_hover" name="rich_web_timeline_year_color_hover_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_year_color_hover ); ?>"/>
                    </td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>Size (px)</td>
                    <td class="rich_web_timeline_ybs">Year Block Size</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_year_size" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_year_size ); ?>"
                                   id="rich_web_timeline_year_size" name="rich_web_timeline_year_size_2" min="0"
                                   max="100">
                            <span class="range-timeline__value rich_web_timeline_year_size_span"
                                  id="rich_web_timeline_year_size_span">0</span>
                        </div>
                    </td>
                    <td>
                        <div class="rich_web_timeline_ybs">
                            <select class="Rich_Web_TI_Select_Menu rich_web_timeline_round_size"
                                    id="rich_web_timeline_round_size" name="rich_web_timeline_round_size_2">
                                <option value="big" <?php if ( $get_timeline_style[0]->rw_timeline_round_size == 'big' ) {
									echo esc_attr( 'selected' );
								} ?>> Big
                                </option>
                                <option value="medium" <?php if ( $get_timeline_style[0]->rw_timeline_round_size == 'medium' ) {
									echo esc_attr( 'selected' );
								} ?>> Medium
                                </option>
                                <option value="small" <?php if ( $get_timeline_style[0]->rw_timeline_round_size == 'small' ) {
									echo esc_attr( 'selected' );
								} ?>> Small
                                </option>
                            </select>
                        </div>
                    </td>
                    <td colspan="2"></td>
                </tr>
                <tr class="RW_Op_Title">
                    <td colspan="4">Month/Day Options</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>Hover Color</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_md_color"
                               id="rich_web_timeline_md_color" name="rich_web_timeline_md_color_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_md_color ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_md_color_hover"
                               id="rich_web_timeline_md_color_hover" name="rich_web_timeline_md_color_hover_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_md_color_hover ); ?>"/>
                    </td>
                    <td colspan="2"></td>
                </tr>
                <tr class="RW_Op_Title">
                    <td colspan="4">Round Options</td>
                </tr>
                <tr>
                    <td>Background Color</td>
                    <td>Hover Background Color</td>
                    <td>Border Color</td>
                    <td>Hover Border Color</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_round_bg"
                               id="rich_web_timeline_round_bg" name="rich_web_timeline_round_bg_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_round_border_col ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_round_bg_hover"
                               id="rich_web_timeline_round_bg_hover" name="rich_web_timeline_round_bg_hover_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_round_border_col_hover ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_round_border_col"
                               id="rich_web_timeline_round_border_col" name="rich_web_timeline_round_border_col_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_round_border_col ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_round_border_col_hover"
                               id="rich_web_timeline_round_border_col_hover"
                               name="rich_web_timeline_round_border_col_hover_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_round_border_col_hover ); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Border Width (px)</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_round_border_px" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_round_border_px ); ?>"
                                   id="rich_web_timeline_round_border_px" name="rich_web_timeline_round_border_px_2"
                                   min="0" max="100">
                            <span class="range-timeline__value rich_web_timeline_round_border_px_span"
                                  id="rich_web_timeline_round_border_px_span">0</span>
                        </div>
                    </td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="4">Icons Options</td>
                </tr>
                <tr>
                    <td>Icon Color</td>
                    <td>Icon Size (px)</td>
                    <td>Icon Style</td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color rich_web_timeline_icon_color"
                               id="rich_web_timeline_icon_color" name="rich_web_timeline_icon_color_2"
                               value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_icon_color ); ?>"/>
                    </td>
                    <td>
                        <div class="range-timeline">
                            <input class="range-timeline__range rich_web_timeline_icon_size" type="range"
                                   value="<?php echo esc_attr( $get_timeline_style[0]->rw_timeline_icon_size ); ?>"
                                   id="rich_web_timeline_icon_size" name="rich_web_timeline_icon_size_2" min="0"
                                   max="100">
                            <span class="range-timeline__value rich_web_timeline_icon_size_span"
                                  id="rich_web_timeline_icon_size_span">0</span>
                        </div>
                    </td>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu rich_web_timeline_icon_type"
                                id="rich_web_timeline_icon_type" name="rich_web_timeline_icon_type_2">
                            <option value="angle" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'angle' ) {
								echo esc_attr( 'selected' );
							} ?>> Angle
                            </option>
                            <option value="angle-double" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'angle-double' ) {
								echo esc_attr( 'selected' );
							} ?>> Angle Double
                            </option>
                            <option value="chevron" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'chevron' ) {
								echo esc_attr( 'selected' );
							} ?>> Chevron
                            </option>
                            <option value="chevron-circle" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'chevron-circle' ) {
								echo esc_attr( 'selected' );
							} ?>> Chevron Circle
                            </option>
                            <option value="arrow" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'arrow' ) {
								echo esc_attr( 'selected' );
							} ?>> Arrow
                            </option>
                            <option value="arrow-circle" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'arrow-circle' ) {
								echo esc_attr( 'selected' );
							} ?>> Arrow Circle
                            </option>
                            <option value="arrow-circle-o" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'arrow-circle-o' ) {
								echo esc_attr( 'selected' );
							} ?>> Arrow Circle O
                            </option>
                            <option value="caret" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'caret' ) {
								echo esc_attr( 'selected' );
							} ?>> Caret
                            </option>
                            <option value="caret-square-o" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'caret-square-o' ) {
								echo esc_attr( 'selected' );
							} ?>> Caret Square O
                            </option>
                            <option value="hand-o" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'hand-o' ) {
								echo esc_attr( 'selected' );
							} ?>> Hand O
                            </option>
                            <option value="long-arrow" <?php if ( $get_timeline_style[0]->rw_timeline_icon_type == 'long-arrow' ) {
								echo esc_attr( 'selected' );
							} ?>> Long Arrow
                            </option>
                        </select>
                    </td>
                    <td></td>
                </tr>
            </table>
            <table class="RW_Ti_Option_Table" id="RW_Ti_Option_TiTable_3">
                <td colspan="4">Pagination and Load more</td>
                </tr>
                <tr>
                    <td>Pagination Type</td>
                    <td>Color</td>
                    <td>Background Color</td>
                    <td>Current Color</td>
                </tr>
                <tr>
                    <td>
                        <select class="Rich_Web_TI_Select_Menu" id="RW_TimeLine_8_PaginType"
                                name="RW_TimeLine_8_PaginType">
                            <option value="Pagination 1" <?php if ( $get_timeline_style_4[0]->rw_timeline_title_bg_color == 'Pagination 1' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 1
                            </option>
                            <option value="Pagination 2" <?php if ( $get_timeline_style_4[0]->rw_timeline_title_bg_color == 'Pagination 2' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 2
                            </option>
                            <option value="Pagination 3" <?php if ( $get_timeline_style_4[0]->rw_timeline_title_bg_color == 'Pagination 3' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 3
                            </option>
                            <option value="Pagination 4" <?php if ( $get_timeline_style_4[0]->rw_timeline_title_bg_color == 'Pagination 4' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 4
                            </option>
                            <option value="Pagination 5" <?php if ( $get_timeline_style_4[0]->rw_timeline_title_bg_color == 'Pagination 5' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 5
                            </option>
                            <option value="Pagination 6" <?php if ( $get_timeline_style_4[0]->rw_timeline_title_bg_color == 'Pagination 6' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 6
                            </option>
                            <option value="Pagination 6" <?php if ( $get_timeline_style_4[0]->rw_timeline_title_bg_color == 'Pagination 7' ) {
								echo esc_attr( 'selected' );
							} ?>> Pagination 7
                            </option>
                        </select>
                    </td>


                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_8_PaginCol"
                               name="RW_TimeLine_8_PaginCol"
                               value="<?php echo esc_attr( $get_timeline_style_3[0]->rw_timeline_year_block_bg_hover ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_8_PaginBackCol"
                               name="RW_TimeLine_8_PaginBackCol"
                               value="<?php echo esc_attr( $get_timeline_style_3[0]->rw_timeline_year_size ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_8_PaginCurrCol"
                               name="RW_TimeLine_8_PaginCurrCol"
                               value="<?php echo esc_attr( $get_timeline_style_5[0]->rw_timeline_md_color_hover ); ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Current Background Color</td>
                    <td>Hover Color</td>
                    <td>Hover Background Color</td>
                    <td>Font Family</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_8_PaginCurrBackCol"
                               name="RW_TimeLine_8_PaginCurrBackCol"
                               value="<?php echo esc_attr( $get_timeline_style_5[0]->rw_timeline_md_border_color ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_8_PaginHovCol"
                               name="RW_TimeLine_8_PaginHovCol"
                               value="<?php echo esc_attr( $get_timeline_style_5[0]->rw_timeline_md_border_color_hover ); ?>"/>
                    </td>
                    <td>
                        <input type="text" class="rich_web_timeline_color" id="RW_TimeLine_8_PaginHovBackCol"
                               name="RW_TimeLine_8_PaginHovBackCol"
                               value="<?php echo esc_attr( $get_timeline_style_5[0]->rw_timeline_round_border_col ); ?>"/>
                    </td>
                    <td>
                        <select class="rich_web_timeline_color_font_family Rich_Web_TI_Select_Menu"
                                id="RW_TimeLine_8_PaginFF" name="RW_TimeLine_8_PaginFF">
							<?php foreach ( $Rich_Web_SB_Fonts as $value ) {
								if ( $value == $get_timeline_style_3[0]->rw_timeline_year_color_hover ) { ?>
                                    <option value="<?php echo esc_attr( $value ); ?>"
                                            selected><?php echo esc_html( $value ); ?></option>
								<?php } else { ?>
                                    <option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php }
							} ?>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>Font Size(px)</td>
                    <td colspan="3"></td>
                </tr>
                <td>
                    <div class="range-timeline">
                        <input class="range-timeline__range RW_TimeLine_8_PaginFS" type="range"
                               value="<?php echo esc_attr( $get_timeline_style_3[0]->rw_timeline_box_shadow_hover ); ?>"
                               id="RW_TimeLine_8_PaginFS" name="RW_TimeLine_8_PaginFS" min="10" max="25">
                        <span class="range-timeline__value RW_TimeLine_8_PaginFS" id="$RW_TimeLine_8_PaginFS">0</span>
                    </div>
                </td>
            </table>
        </div>
    </div>
</form>
