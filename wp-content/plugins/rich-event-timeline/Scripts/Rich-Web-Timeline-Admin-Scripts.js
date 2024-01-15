//Admin Menu
jQuery(function() {
    jQuery('#datepicker').datepicker({ dateFormat: 'dd.mm.yy' });
});

function LMP(val) {
    var inps = document.querySelectorAll(".pInputs")
    if (val == "Pagination") {
        inps[0].style.display = "block"
        inps[1].style.display = "none"
    } else if (val == "Load More") {
        inps[1].style.display = "block"
        inps[0].style.display = "none"
    } else {
        for (var i = 0; i < inps.length; i++) {
            inps[i].style.display = "none"
        }
        document.querySelector('.lmp').innerHTML = ""
        return
    }
    document.querySelector('.lmp').innerHTML = val + " Text"
}

var allTypes = document.querySelectorAll(".RW_Timeline_ShowType");
for (var i = 0; i < allTypes.length; i++) {
    allTypes[i].onclick = function() {
        document.querySelector(".RW_Timeline_ShowType_Val").value = this.value;
        LMP(this.value)
    }
}

function addTimeline(short_value) {
    jQuery('.AddTimeline').css({ 'width': '0px', 'padding': '0px' });
    jQuery('.SaveTimeline').css({ 'width': '100px', 'padding': '0px' });
    jQuery('.CanselTimeline').css({ 'width': '100px', 'padding': '0px' });
    jQuery('.Rich_Web_Timeline_Table_Data').hide();
    jQuery('.Rich_Web_New_Timeline').show();
    jQuery('.rich_web_Timeline_ID').html('[Rich_Web_Timeline id="' + short_value + '"]');
    jQuery('.rich_web_Timeline_PID').html('&lt;?php echo do_shortcode(&apos;[Rich_Web_Timeline id="' + short_value + '"]&apos;);?&gt;');
    Rich_Web_Timeline_Tinymce();
}

function rich_web_Save_TI() {
    var timeline_HidNum = jQuery('.Rich_Web_TI_HidNum').val();
    var timeline_date = jQuery('#datepicker').val();
    var timeline_day = timeline_date.substr(0, 2);
    var timeline_month = timeline_date.substr(3, 2);
    var timeline_year = timeline_date.substr(6, 7);
    var timeline_title = jQuery('.Rich_Web_TI_td_DO_Title_input').val();
    var timeline_text = tinyMCE.get('Rich_Web_Timeline_Editing_Cont').getContent();
    var timeline_icon = jQuery('.Rich_Web_TI_td_Icon_Input').val();
    jQuery('.Rich_Web_TI_SaveTable_3').append("<tr class='Rich_Web_TI_SaveTable_3_tr ui-sortable-handle' id='ti_tr_" + parseInt(parseInt(timeline_HidNum) + 1) + "'><td class='ti_num'>" + parseInt(parseInt(timeline_HidNum) + 1) + "</td><td class='ti_title_" + parseInt(parseInt(timeline_HidNum) + 1) + "'>" + timeline_title + "</td><td><span class='ti_day_" + parseInt(parseInt(timeline_HidNum) + 1) + "'>" + timeline_day + '</span>-<span class="ti_month_' + parseInt(parseInt(timeline_HidNum) + 1) + '">' + timeline_month + '</span>-<span class="ti_year_' + parseInt(parseInt(timeline_HidNum) + 1) + '">' + timeline_year + "</span></td><td><input type='text' class='rw_ti_color_val rw_ti_color_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_color_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='#ffffff'/></td><td class='ti_copy' onclick='RW_TI_Copy_TR(" + parseInt(parseInt(timeline_HidNum) + 1) + ")'><i class='rw_ti_fileso rich_web rich_web rich_web-files-o'></td><td class='ti_edit' onclick='RW_TI_Edit_TR(" + parseInt(parseInt(timeline_HidNum) + 1) + ")'><i class='rw_ti_pencil rich_web rich_web-pencil'></td><td class='ti_del' onclick='RW_TI_Del_TR(" + parseInt(parseInt(timeline_HidNum) + 1) + ")'><i class='rw_ti_trash rich_web rich_web-trash'></i></td><td style='display: none;'><input type='text' class='rw_ti_title_val rw_ti_title_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_title_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_title + "'/><input type='text' class='rw_ti_year_val rw_ti_year_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_year_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_year + "'/><input type='text' class='rw_ti_day_val rw_ti_day_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_day_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_day + "'/><input type='text' class='rw_ti_month_val rw_ti_month_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_month_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_month + "'/><input type='text' class='rw_ti_text_val rw_ti_text_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_text_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value=''/><input type='text' class='rw_ti_icon_val rw_ti_icon_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_icon_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_icon + "'/></td></tr>");
    jQuery('.Rich_Web_TI_HidNum').val(parseInt(parseInt(timeline_HidNum) + 1));
    jQuery('.rw_ti_text_' + parseInt(parseInt(timeline_HidNum) + 1)).val(timeline_text);
    jQuery('.rw_ti_color_' + parseInt(parseInt(timeline_HidNum) + 1)).alphaColorPicker();
    jQuery('.wp-color-result').attr('title', 'Select');
    jQuery('.wp-color-result').attr('data-current', 'Selected');
    Rich_Web_Res_TI();
}

function RW_TI_Copy_TR(copyNumber) {
    var timeline_HidNum = jQuery('.Rich_Web_TI_HidNum').val();
    var timeline_day = jQuery('#ti_tr_' + copyNumber + ' .rw_ti_day_' + copyNumber).val();
    var timeline_month = jQuery('#ti_tr_' + copyNumber + ' .rw_ti_month_' + copyNumber).val();
    var timeline_year = jQuery('#ti_tr_' + copyNumber + ' .rw_ti_year_' + copyNumber).val();
    var timeline_title = jQuery('#ti_tr_' + copyNumber + ' .rw_ti_title_' + copyNumber).val();
    var timeline_text = jQuery('#ti_tr_' + copyNumber + ' .rw_ti_text_' + copyNumber).val();
    var timeline_icon = jQuery('#ti_tr_' + copyNumber + ' .rw_ti_icon_' + copyNumber).val();
    var timeline_color = jQuery('#ti_tr_' + copyNumber + ' .rw_ti_color_' + copyNumber).val();

    jQuery('.Rich_Web_TI_SaveTable_3').append("<tr class='Rich_Web_TI_SaveTable_3_tr ui-sortable-handle' id='ti_tr_" + parseInt(parseInt(timeline_HidNum) + 1) + "'><td class='ti_num'>" + parseInt(parseInt(timeline_HidNum) + 1) + "</td><td class='ti_title_" + parseInt(parseInt(timeline_HidNum) + 1) + "'>" + timeline_title + "</td><td><span class='ti_day_" + parseInt(parseInt(timeline_HidNum) + 1) + "'>" + timeline_day + '</span>-<span class="ti_month_' + parseInt(parseInt(timeline_HidNum) + 1) + '">' + timeline_month + '</span>-<span class="ti_year_' + parseInt(parseInt(timeline_HidNum) + 1) + '">' + timeline_year + "</span></td><td><input type='text' class='rw_ti_color_val rw_ti_color_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_color_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_color + "'/></td><td class='ti_copy' onclick='RW_TI_Copy_TR(" + parseInt(parseInt(timeline_HidNum) + 1) + ")'><i class='rw_ti_fileso rich_web rich_web rich_web-files-o'></td><td class='ti_edit' onclick='RW_TI_Edit_TR(" + parseInt(parseInt(timeline_HidNum) + 1) + ")'><i class='rw_ti_pencil rich_web rich_web-pencil'></td><td class='ti_del' onclick='RW_TI_Del_TR(" + parseInt(parseInt(timeline_HidNum) + 1) + ")'><i class='rw_ti_trash rich_web rich_web-trash'></i></td><td style='display: none;'><input type='text' class='rw_ti_title_val rw_ti_title_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_title_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_title + "'/><input type='text' class='rw_ti_year_val rw_ti_year_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_year_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_year + "'/><input type='text' class='rw_ti_day_val rw_ti_day_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_day_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_day + "'/><input type='text' class='rw_ti_month_val rw_ti_month_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_month_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_month + "'/><input type='text' class='rw_ti_text_val rw_ti_text_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_text_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value=''/><input type='text' class='rw_ti_icon_val rw_ti_icon_" + parseInt(parseInt(timeline_HidNum) + 1) + "' name='rw_ti_icon_" + parseInt(parseInt(timeline_HidNum) + 1) + "' value='" + timeline_icon + "'/></td></tr>");
    jQuery('.Rich_Web_TI_HidNum').val(parseInt(parseInt(timeline_HidNum) + 1));
    jQuery('.rw_ti_text_' + parseInt(parseInt(timeline_HidNum) + 1)).val(timeline_text);
    jQuery('.rw_ti_color_' + parseInt(parseInt(timeline_HidNum) + 1)).alphaColorPicker();
    jQuery('.wp-color-result').attr('title', 'Select');
    jQuery('.wp-color-result').attr('data-current', 'Selected');
}

function RW_TI_Edit_TR(editNumber) {
    jQuery('.rich_web_Save_TI').hide();
    jQuery('.rich_web_Update_TI').show();
    jQuery('.rich_web_Update_TI').attr('onclick', 'Rich_Web_Update_TI(' + editNumber + ')');
    var title = jQuery('.rw_ti_title_' + editNumber).val();
    jQuery('.Rich_Web_TI_td_DO_Title_input').val(title);
    var year = jQuery('.rw_ti_year_' + editNumber).val();
    var day = jQuery('.rw_ti_day_' + editNumber).val();
    var month = jQuery('.rw_ti_month_' + editNumber).val();
    var icon = jQuery('.rw_ti_icon_' + editNumber).val();
    if (icon == '') {
        icon = 'none';
    }
    jQuery('.Rich_Web_TI_td_Icon_Input').val(icon);
    jQuery('#datepicker').val(day + '.' + month + '.' + year);
    var ti_text = jQuery('.rw_ti_text_' + editNumber).val();
    tinyMCE.get('Rich_Web_Timeline_Editing_Cont').setContent(ti_text);
}

function Rich_Web_Update_TI(updateNumber) {
    jQuery('.rich_web_Update_TI').hide();
    jQuery('.rich_web_Save_TI').show();
    var title = jQuery('.Rich_Web_TI_td_DO_Title_input').val();
    jQuery('.ti_title_' + updateNumber).text(title);
    jQuery('.rw_ti_title_' + updateNumber).val(title);
    var timeline_date = jQuery('#datepicker').val();
    var timeline_day = timeline_date.substr(0, 2);
    var timeline_month = timeline_date.substr(3, 2);
    var timeline_year = timeline_date.substr(6, 7);
    jQuery('.ti_year_' + updateNumber).text(timeline_year);
    jQuery('.rw_ti_year_' + updateNumber).val(timeline_year);
    jQuery('.ti_day_' + updateNumber).text(timeline_day);
    jQuery('.rw_ti_day_' + updateNumber).val(timeline_day);
    jQuery('.ti_month_' + updateNumber).text(timeline_month);
    jQuery('.rw_ti_month_' + updateNumber).val(timeline_month);
    var ti_text = tinyMCE.get('Rich_Web_Timeline_Editing_Cont').getContent();
    jQuery('.rw_ti_text_' + updateNumber).val(ti_text);
    var timeline_icon = jQuery('.Rich_Web_TI_td_Icon_Input').val();
    jQuery('.rw_ti_icon_' + updateNumber).val(timeline_icon);
    Rich_Web_Res_TI();
}

function RW_TI_Del_TR(delNumber) {
    var RWTIRS = delNumber;
    jQuery('.Rich_Web_Timeline_Fixed_Div').fadeIn();
    jQuery('.Rich_Web_Timeline_Absolute_Div').fadeIn();
    jQuery('.Rich_Web_Timeline_Relative_No').click(function() {
        jQuery('.Rich_Web_Timeline_Fixed_Div').fadeOut();
        jQuery('.Rich_Web_Timeline_Absolute_Div').fadeOut();
        RWTIRS = null;
    });
    jQuery('.Rich_Web_Timeline_Relative_Yes').click(function() {
        if (RWTIRS != null) {
            jQuery('#ti_tr_' + delNumber).remove();
            jQuery('.Rich_Web_TI_HidNum').val(jQuery('.Rich_Web_TI_HidNum').val() - 1);
            var i = 0;
            jQuery('.Rich_Web_TI_SaveTable_3 tr').each(function() {
                i++;
                jQuery(this).attr('id', 'ti_tr_' + i);
                jQuery(this).find('td:nth-child(1)').html(i);
                jQuery(this).find('td:nth-child(2)').attr('class', 'ti_title_' + i);
                jQuery(this).find('td:nth-child(3) span:nth-child(1)').attr('class', 'ti_day_' + i);
                jQuery(this).find('td:nth-child(3) span:nth-child(2)').attr('class', 'ti_month_' + i);
                jQuery(this).find('td:nth-child(3) span:nth-child(3)').attr('class', 'ti_year_' + i);
                jQuery(this).find('td:nth-child(4) input.rw_ti_color_val').attr('class', 'wp-color-picker rw_ti_color_val rw_ti_color_' + i).attr('name', 'rw_ti_color_' + i);
                jQuery(this).find('td:nth-child(5)').attr('onclick', "RW_TI_Copy_TR(" + i + ")");
                jQuery(this).find('td:nth-child(6)').attr('onclick', "RW_TI_Edit_TR(" + i + ")");
                jQuery(this).find('td:nth-child(7)').attr('onclick', "RW_TI_Del_TR(" + i + ")");
                jQuery(this).find('td:nth-child(8) input.rw_ti_title_val').attr('class', 'rw_ti_title_val rw_ti_title_' + i).attr('name', 'rw_ti_title_' + i);
                jQuery(this).find('td:nth-child(8) input.rw_ti_year_val').attr('class', 'rw_ti_year_val rw_ti_year_' + i).attr('name', 'rw_ti_year_' + i);
                jQuery(this).find('td:nth-child(8) input.rw_ti_day_val').attr('class', 'rw_ti_day_val rw_ti_day_' + i).attr('name', 'rw_ti_day_' + i);
                jQuery(this).find('td:nth-child(8) input.rw_ti_month_val').attr('class', 'rw_ti_month_val rw_ti_month_' + i).attr('name', 'rw_ti_month_' + i);
                jQuery(this).find('td:nth-child(8) input.rw_ti_text_val').attr('class', 'rw_ti_text_val rw_ti_text_' + i).attr('name', 'rw_ti_text_' + i);
                jQuery(this).find('td:nth-child(8) input.rw_ti_icon_val').attr('class', 'rw_ti_icon_val rw_ti_icon_' + i).attr('name', 'rw_ti_icon_' + i);
            });
        }
        RWTIRS = null;
        jQuery('.Rich_Web_Timeline_Fixed_Div').fadeOut();
        jQuery('.Rich_Web_Timeline_Absolute_Div').fadeOut();
    });
}

function rich_webTiSortable() {
    jQuery('.Rich_Web_TI_SaveTable_3 tbody').sortable({
        update: function(event, ui) {
            jQuery(this).find('tr').each(function(i) {
                jQuery(this).attr('id', 'ti_tr_' + (i + 1));
                jQuery(this).find('td:nth-child(1)').html((i + 1));
                jQuery(this).find('td:nth-child(2)').attr('class', 'ti_title_' + (i + 1));
                jQuery(this).find('td:nth-child(3) span:nth-child(1)').attr('class', 'ti_day_' + (i + 1));
                jQuery(this).find('td:nth-child(3) span:nth-child(2)').attr('class', 'ti_month_' + (i + 1));
                jQuery(this).find('td:nth-child(3) span:nth-child(3)').attr('class', 'ti_year_' + (i + 1));
                jQuery(this).find('td:nth-child(4) input.rw_ti_color_val').attr('class', 'wp-color-picker rw_ti_color_val rw_ti_color_' + (i + 1)).attr('name', 'rw_ti_color_' + (i + 1));
                jQuery(this).find('td:nth-child(5)').attr('onclick', "RW_TI_Copy_TR(" + (i + 1) + ")");
                jQuery(this).find('td:nth-child(6)').attr('onclick', "RW_TI_Edit_TR(" + (i + 1) + ")");
                jQuery(this).find('td:nth-child(7)').attr('onclick', "RW_TI_Del_TR(" + (i + 1) + ")");
                jQuery(this).find('td:nth-child(8) input.rw_ti_title_val').attr('class', 'rw_ti_title_val rw_ti_title_' + (i + 1)).attr('name', 'rw_ti_title_' + (i + 1));
                jQuery(this).find('td:nth-child(8) input.rw_ti_year_val').attr('class', 'rw_ti_year_val rw_ti_year_' + (i + 1)).attr('name', 'rw_ti_year_' + (i + 1));
                jQuery(this).find('td:nth-child(8) input.rw_ti_day_val').attr('class', 'rw_ti_day_val rw_ti_day_' + (i + 1)).attr('name', 'rw_ti_day_' + (i + 1));
                jQuery(this).find('td:nth-child(8) input.rw_ti_month_val').attr('class', 'rw_ti_month_val rw_ti_month_' + (i + 1)).attr('name', 'rw_ti_month_' + (i + 1));
                jQuery(this).find('td:nth-child(8) input.rw_ti_text_val').attr('class', 'rw_ti_text_val rw_ti_text_' + (i + 1)).attr('name', 'rw_ti_text_' + (i + 1));
                jQuery(this).find('td:nth-child(8) input.rw_ti_icon_val').attr('class', 'rw_ti_icon_val rw_ti_icon_' + (i + 1)).attr('name', 'rw_ti_icon_' + (i + 1));
            });
        }
    })
}

function Rich_Web_Res_TI() {
    jQuery('.Rich_Web_TI_ST_Effect').val('1');
    jQuery('#datepicker').val('');
    jQuery('.Rich_Web_TI_td_DO_Title_input').val('');
    jQuery('.Rich_Web_TI_td_Icon_Input').val('none');
    tinyMCE.get('Rich_Web_Timeline_Editing_Cont').setContent('');
}

function canselTimeline() {
    location.reload();
}

function canselTiOption() {
    location.reload();
}

function Rich_Web_Timeline_Tinymce() {
    tinymce.init({
        selector: '#Rich_Web_Timeline_Editing_Cont',
        menubar: false,
        statusbar: false,
        height: 270,
        plugins: [
            'advlist autolink lists link image charmap print preview hr',
            'searchreplace wordcount code media ',
            'insertdatetime media save table contextmenu directionality',
            'paste textcolor colorpicker textpattern imagetools codesample'
        ],
        toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink image media code | insertdatetime preview | forecolor backcolor",
        toolbar3: "table | hr | subscript superscript | charmap | print | codesample ",
        fontsize_formats: '8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px',
        font_formats: 'Abadi MT Condensed Light = abadi mt condensed light; Aharoni = aharoni; Aldhabi = aldhabi; Andalus = andalus; Angsana New = angsana new; AngsanaUPC = angsanaupc; Aparajita = aparajita; Arabic Typesetting = arabic typesetting; Arial = arial; Arial Black = Arial Black; Batang = batang; BatangChe = batangche; Browallia New = browallia new; BrowalliaUPC = browalliaupc; Calibri = calibri; Calibri Light = calibri light; Calisto MT = calisto mt; Cambria = cambria; Candara = candara; Century Gothic = century gothic; Comic Sans MS = comic sans ms; Consolas = consolas; Constantia = constantia; Copperplate Gothic = copperplate gothic; Copperplate Gothic Light = copperplate gothic light; Corbel = corbel; Cordia New = cordia new; CordiaUPC = cordiaupc; Courier New = courier new; DaunPenh = daunpenh; David = david; DFKai-SB = dfkai-sb; DilleniaUPC = dilleniaupc; DokChampa = dokchampa; Dotum = dotum; DotumChe = dotumche; Ebrima = ebrima; Estrangelo Edessa = estrangelo edessa; EucrosiaUPC = eucrosiaupc; Euphemia = euphemia; FangSong = fangsong; Franklin Gothic Medium = franklin gothic medium; FrankRuehl = frankruehl; FreesiaUPC = freesiaupc; Gabriola = gabriola; Gadugi = gadugi; Gautami = gautami; Georgia = georgia; Gisha = gisha; Gulim = gulim; GulimChe = gulimche; Gungsuh = gungsuh; GungsuhChe = gungsuhche; Impact = impact; IrisUPC = irisupc; Iskoola Pota = iskoola pota; JasmineUPC = jasmineupc; KaiTi = kaiti; Kalinga = kalinga; Kartika = kartika; Khmer UI = khmer ui; KodchiangUPC = kodchiangupc; Kokila = kokila; Lao UI = lao ui; Latha = latha; Leelawadee = leelawadee; Levenim MT = levenim mt; LilyUPC = lilyupc; Lucida Console = lucida console; Lucida Handwriting Italic = lucida handwriting italic; Lucida Sans Unicode = lucida sans unicode; Malgun Gothic = malgun gothic; Mangal = mangal; Manny ITC = manny itc; Marlett = marlett; Meiryo = meiryo; Meiryo UI = meiryo ui; Microsoft Himalaya = microsoft himalaya; Microsoft JhengHei = microsoft jhenghei; Microsoft JhengHei UI = microsoft jhenghei ui; Microsoft New Tai Lue = microsoft new tai lue; Microsoft PhagsPa = microsoft phagspa; Microsoft Sans Serif = microsoft sans serif; Microsoft Tai Le = microsoft tai le; Microsoft Uighur = microsoft uighur; Microsoft YaHei = microsoft yahei; Microsoft YaHei UI = microsoft yahei ui; Microsoft Yi Baiti = microsoft yi baiti; MingLiU_HKSCS = mingliu_hkscs; MingLiU_HKSCS-ExtB = mingliu_hkscs-extb; Miriam = miriam; Mongolian Baiti = mongolian baiti; MoolBoran = moolboran; MS UI Gothic = ms ui gothic; MV Boli = mv boli; Myanmar Text = myanmar text; Narkisim = narkisim; Nirmala UI = nirmala ui; News Gothic MT = news gothic mt; NSimSun = nsimsun; Nyala = nyala; Palatino Linotype = palatino linotype; Plantagenet Cherokee = plantagenet cherokee; Raavi = raavi; Rod = rod; Sakkal Majalla = sakkal majalla; Segoe Print = segoe print; Segoe Script = segoe script; Segoe UI Symbol = segoe ui symbol; Shonar Bangla = shonar bangla; Shruti = shruti; SimHei = simhei; SimKai = simkai; Simplified Arabic = simplified arabic; SimSun = simsun; SimSun-ExtB = simsun-extb; Sylfaen = sylfaen; Tahoma = tahoma; Times New Roman = times new roman; Traditional Arabic = traditional arabic; Trebuchet MS = trebuchet ms; Tunga = tunga; Utsaah = utsaah; Vani = vani; Vijaya = vijaya'
    });
    tinyMCE.get('Rich_Web_Timeline_Editing_Cont').setContent("");

}

function rw_ti_edit(ti_id) {
    jQuery('.AddTimeline').css({ 'width': '0px', 'padding': '0px' });
    jQuery('.SaveTimeline').css({ 'width': '0', 'padding': '0px' });
    jQuery('.UpdateTimeline').css({ 'width': '100px', 'padding': '0px' });
    jQuery('.CanselTimeline').css({ 'width': '100px', 'padding': '0px' });
    jQuery('.Rich_Web_Timeline_Table_Data').hide();
    jQuery('.Rich_Web_New_Timeline').show();
    jQuery('.rich_web_Timeline_ID').html('[Rich_Web_Timeline id="' + ti_id + '"]');
    jQuery('.rich_web_Timeline_PID').html('&lt;?php echo do_shortcode(&apos;[Rich_Web_Timeline id="' + ti_id + '"]&apos;);?&gt;');
    jQuery('.Rich_Web_TI_idNum').attr('value', ti_id);
    Rich_Web_Timeline_Tinymce();
    var ajaxurl = object.ajaxurl;
    var data = {
        rwt_nonce: object.rw_timeline_nonce,
        action: 'rich_web_timeline',
        foobar_1: ti_id,
    };
    jQuery.post(ajaxurl, data, function(response) {
        if (response.success !== true) {
            location.reload(true);
        }
        var arr = response.data;
        jQuery('.Rich_Web_TI_ST_Name').val(arr["rw_timeline_name"]);
        jQuery('.Rich_Web_TI_ST_Style').val(arr["rw_timeline_style_id"]);
        jQuery('.RW_Timeline_ShowType_Val').val(arr["rw_timeline_01"]);
        jQuery('#rich_web_timeline_pp').val(arr["rw_timeline_02"]);
        jQuery('#rich_web_timeline_pp_span').html(arr["rw_timeline_02"]);
        jQuery('#RW_Timeline_LoadMore').val(arr["rw_timeline_03"]);
        jQuery('#RW_Timeline_Prev_Text').val(arr["rw_timeline_04"]);
        jQuery('#RW_Timeline_Next_Text').val(arr["rw_timeline_05"]);
        var allSHTypes = document.querySelectorAll(".RW_Timeline_ShowType")
        for (var i = 0; i < allSHTypes.length; i++) {
            if (arr["rw_timeline_01"] == allSHTypes[i].value) {
                allSHTypes[i].setAttribute("checked", "checked")
            }
        }
        LMP(arr["rw_timeline_01"])
    });
    var ajaxurl = object.ajaxurl;
    var data = {
        rwt_nonce: object.rw_timeline_nonce,
        action: 'rich_web_timeline_options',
        foobar_1: ti_id,
    };
    jQuery.post(ajaxurl, data, function(response) {
        if (response.success !== true) {
            location.reload(true);
        }
        var data = response.data;
        for (i = 1; i <= data.length; i++) {
            jQuery('.Rich_Web_TI_SaveTable_3').append("<tr class='Rich_Web_TI_SaveTable_3_tr ui-sortable-handle' id='ti_tr_" + i + "'><td class='ti_num'>" + i + "</td><td class='ti_title_" + i + "'>" + data[i - 1]['rw_timeline_title'] + "</td><td><span class='ti_day_" + i + "'>" + data[i - 1]['rw_timeline_day'] + '</span>-<span class="ti_month_' + i + '">' + data[i - 1]['rw_timeline_month'] + '</span>-<span class="ti_year_' + i + '">' + data[i - 1]['rw_timeline_year'] + "</span></td><td><input type='text' class='rw_ti_color_val rw_ti_color_" + i + "' name='rw_ti_color_" + i + "' value='" + data[i - 1]['rw_timeline_02'] + "'/></td><td class='ti_copy' onclick='RW_TI_Copy_TR(" + i + ")'><i class='rw_ti_fileso rich_web rich_web rich_web-files-o'></td><td class='ti_edit' onclick='RW_TI_Edit_TR(" + i + ")'><i class='rw_ti_pencil rich_web rich_web-pencil'></td><td class='ti_del' onclick='RW_TI_Del_TR(" + i + ")'><i class='rw_ti_trash rich_web rich_web-trash'></i></td><td style='display: none;'><input type='text' class='rw_ti_title_val rw_ti_title_" + i + "' name='rw_ti_title_" + i + "' value='" + data[i - 1]['rw_timeline_title'] + "'/><input type='text' class='rw_ti_year_val rw_ti_year_" + i + "' name='rw_ti_year_" + i + "' value='" + data[i - 1]['rw_timeline_year'] + "'/><input type='text' class='rw_ti_day_val rw_ti_day_" + i + "' name='rw_ti_day_" + i + "' value='" + data[i - 1]['rw_timeline_day'] + "'/><input type='text' class='rw_ti_month_val rw_ti_month_" + i + "' name='rw_ti_month_" + i + "' value='" + data[i - 1]['rw_timeline_month'] + "'/><input type='text' class='rw_ti_text_val rw_ti_text_" + i + "' name='rw_ti_text_" + i + "' value=''/><input type='text' class='rw_ti_icon_val rw_ti_icon_" + i + "' name='rw_ti_icon_" + i + "' value='" + data[i - 1]['rw_timeline_01'] + "'/></td></tr>");

            jQuery('.rw_ti_text_' + i).val(data[i - 1]['rw_timeline_text']);
        }
        jQuery('.Rich_Web_TI_HidNum').attr('value', data.length);
        jQuery('.rw_ti_color_val').alphaColorPicker();
        jQuery('.wp-color-result').attr('title', 'Select');
        jQuery('.wp-color-result').attr('data-current', 'Selected');
    });
}

function rw_ti_copy(ti_id) {
    var ajaxurl = object.ajaxurl;
    var data = {
        rwt_nonce: object.rw_timeline_nonce,
        action: 'rich_web_copy_timeline',
        foobar_1: ti_id,
    };
    jQuery.post(ajaxurl, data, function(response) {
        location.reload();
    });
}

//Theme Menu
function addTiOption() {
    jQuery('.AddOption').css({ 'width': '0px', 'padding': '0px' });
    jQuery('.SaveOption').css({ 'width': '100px', 'padding': '0px' });
    jQuery('.CanselOption').css({ 'width': '100px', 'padding': '0px' });
    jQuery('.Rich_Web_Timeline_Table_Data_Option').hide();
    jQuery('.Rich_Web_New_Timeline_Option').show();
    jQuery('#rich_web_timeline_theme').val('1');
    jQuery('input.rich_web_timeline_color').alphaColorPicker();
    jQuery('.wp-color-result').attr('title', 'Select');
    jQuery('.wp-color-result').attr('data-current', 'Selected');
    RW_TimeLine_Theme_Changed();
}

function RW_TimeLine_Theme_Changed() {
    jQuery(".rw_timeline_icons_tr").hide();
    jQuery(".rich_web_timeline_ybs").hide();
    jQuery(".rw_ti_border_opt").show();
    jQuery(".rw_timeline_year_bg").hide();
    jQuery("#RW_Ti_Option_TiTable").hide();
    jQuery("#RW_Ti_Option_TiTable_2").hide();
    jQuery("#RW_Ti_Option_TiTable_3").hide();
    jQuery("#RW_Ti_Option_TiTable_4").hide();
    jQuery(".rw_timeline_year_border_col").hide();
    jQuery(".rw_ti_month_opt").hide();
    jQuery(".rw_timeline_icons_tr_st").hide();
    jQuery(".rw_timeline_md_op_st").hide();
    jQuery('.rw_timeline_data_format').hide();

    var value = jQuery("#rich_web_timeline_theme").val();
    if (value == '1') {
        jQuery("#RW_Ti_Option_TiTable").show();
        jQuery("#RW_Ti_Option_TiTable_2").hide();
        jQuery(".rw_timeline_year_bg").hide();
        jQuery(".rich_web_timeline_ybs").hide();
        jQuery(".rw_ti_border_opt").show();
        jQuery(".RW_Op_Title_Round").show();
        jQuery(".rw_timeline_year_border_col").hide();
        jQuery(".rw_ti_month_opt").hide();
        jQuery(".rw_timeline_icons_tr_st").hide();
        jQuery(".rw_timeline_md_op_st").hide();
        jQuery(".rw_timeline_line_col").show();
        jQuery('.rw_timeline_data_format').hide();
    } else {
        jQuery("#RW_Ti_Option_TiTable").show();
        jQuery("#RW_Ti_Option_TiTable_2").hide();
        jQuery(".rw_timeline_year_bg").show();
        jQuery(".rich_web_timeline_ybs").hide();
        jQuery(".rw_ti_border_opt").hide();
        jQuery('.rw_timeline_data_format').hide();
    }
    if (value == '2') {
        jQuery(".RW_Op_Title_Round").hide();
        jQuery(".rw_timeline_year_border_col").hide();
        jQuery(".rw_ti_month_opt").hide();
        jQuery(".rw_timeline_icons_tr_st").hide();
        jQuery(".rw_timeline_md_op_st").hide();
        jQuery(".rw_timeline_line_col").show();
        jQuery('.rw_timeline_data_format').hide();
    }
    if (value == '3') {
        jQuery("#RW_Ti_Option_TiTable").show();
        jQuery("#RW_Ti_Option_TiTable_2").hide();
        jQuery(".rw_timeline_icons_tr").show();
        jQuery(".rw_timeline_year_bg").hide();
        jQuery(".rich_web_timeline_ybs").hide();
        jQuery(".rw_ti_border_opt").hide();
        jQuery(".RW_Op_Title_Round").show();
        jQuery(".rw_timeline_year_border_col").show();
        jQuery(".rw_ti_month_opt").hide();
        jQuery(".rw_timeline_icons_tr_st").hide();
        jQuery(".rw_timeline_md_op_st").hide();
        jQuery(".rw_timeline_line_col").show();
        jQuery('.rw_timeline_data_format').hide();
    } else {
        jQuery(".rw_timeline_icons_tr").hide();
    }
    if (value == '4') {
        jQuery("#RW_Ti_Option_TiTable").show();
        jQuery(".rich_web_timeline_ybs").show();
        jQuery("#RW_Ti_Option_TiTable_2").hide();
        jQuery(".rw_ti_border_opt").hide();
        jQuery(".RW_Op_Title_Round").show();
        jQuery(".rw_timeline_year_border_col").hide();
        jQuery(".rw_ti_month_opt").hide();
        jQuery(".rw_timeline_icons_tr_st").hide();
        jQuery(".rw_timeline_md_op_st").hide();
        jQuery(".rw_timeline_line_col").show();
        jQuery('.rw_timeline_data_format').hide();
    }
    if (value == '5' || value == '6') {
        jQuery("#RW_Ti_Option_TiTable").hide();
        jQuery("#RW_Ti_Option_TiTable_2").show();
        jQuery(".rich_web_timeline_ybs").hide();
        jQuery(".rw_ti_border_opt").hide();
        jQuery(".RW_Op_Title_Round").show();
        jQuery(".rw_timeline_year_border_col").hide();
        jQuery(".rw_ti_month_opt").hide();
        jQuery(".rw_timeline_icons_tr_st").hide();
        jQuery(".rw_timeline_md_op_st").hide();
        jQuery(".rw_timeline_line_col").show();
        jQuery('.rw_timeline_data_format').hide();
    }
    if (value == '7') {
        jQuery("#RW_Ti_Option_TiTable").show();
        jQuery(".rich_web_timeline_ybs").show();
        jQuery("#RW_Ti_Option_TiTable_2").hide();
        jQuery(".rich_web_timeline_ybs").hide();
        jQuery(".rw_timeline_icons_tr").show();
        jQuery(".rw_ti_border_opt").show();
        jQuery(".RW_Op_Title_Round").hide();
        jQuery(".rw_timeline_year_border_col").hide();
        jQuery(".rw_ti_month_opt").show();
        jQuery(".rw_timeline_icons_tr_st").show();
        jQuery(".rw_timeline_md_op_st").show();
        jQuery(".rw_timeline_line_col").hide();
        jQuery('.rw_timeline_data_format').show();
    }

}

function rw_ti_edit_option(ti_id) {
    jQuery('.AddOption').css({ 'width': '0px', 'padding': '0px' });
    jQuery('.SaveOption').css({ 'width': '0', 'padding': '0px' });
    jQuery('.UpdateOption').css({ 'width': '100px', 'padding': '0px' });
    jQuery('.CanselOption').css({ 'width': '100px', 'padding': '0px' });
    jQuery('.Rich_Web_TI_Id').attr('value', ti_id);
    jQuery.ajax({
        type: 'POST',
        url: object.ajaxurl,
        data: {
            rwt_nonce: object.rw_timeline_nonce,
            action: 'rich_web_timeline_style',
            foobar_1: ti_id,
        },
        beforeSend: function() {
            jQuery('.RW_TimeLine_Loading').css('display', 'block');
        },
        success: function(response) {
            if (response.success !== true) {
                location.reload(true);
            }
            var data = response.data;
            jQuery('#rich_web_timeline_title').val(data['rw_timeline_title']);
            jQuery('#rich_web_timeline_theme').val(data['rw_timeline_theme']);
            if (data['rw_timeline_theme'] == '1' || data['rw_timeline_theme'] == '2' || data['rw_timeline_theme'] == '3' || data['rw_timeline_theme'] == '4' || data['rw_timeline_theme'] == '5' || data['rw_timeline_theme'] == '6' || data['rw_timeline_theme'] == '7') {
                jQuery('.rich_web_timeline_title_color').val(data['rw_timeline_title_col']);
                jQuery('.rich_web_timeline_border_color').val(data['rw_timeline_border_col']);
                jQuery('.rich_web_timeline_number_color').val(data['rw_timeline_number_col']);
                jQuery('.rich_web_timeline_line_color').val(data['rw_timeline_line_col']);
                jQuery('.rich_web_timeline_font_size').val(data['rw_timeline_font_size']);
                jQuery('.rich_web_timeline_color_font_family').val(data['rich_web_timeline_fonts']);
                jQuery('.rich_web_timeline_md_color').val(data['rw_timeline_md_color']);
                jQuery('.rich_web_timeline_hover_color').val(data['rw_timeline_hover_color']);
                jQuery('.rich_web_timeline_sort').val(data['rw_timeline_sort']);
                jQuery('.rich_web_timeline_effect').val(data['rw_timeline_effect']);
                jQuery('.rich_web_timeline_round_bg').val(data['rw_timeline_round_bg']);
                jQuery('.rich_web_timeline_round_bg_hover').val(data['rw_timeline_round_bg_hover']);
                jQuery('.rich_web_timeline_round_border_px').val(data['rw_timeline_round_border_px']);
                jQuery('.rich_web_timeline_border_px').val(data['rw_timeline_border_px']);
                jQuery('.rich_web_timeline_box_shadow').val(data['rw_timeline_box_shadow']);
                jQuery('.rich_web_timeline_box_shadow_px').val(data['rw_timeline_box_shadow_px']);
                jQuery('.rich_web_timeline_border_type_article').val(data['rw_timeline_border_type_article']);
                jQuery('.rich_web_timeline_border_type_line').val(data['rw_timeline_border_type_line']);
                jQuery('.rich_web_timeline_icon_type').val(data['rw_timeline_icon_type']);
                jQuery('.rich_web_timeline_icon_color').val(data['rw_timeline_icon_color']);
                jQuery('.rich_web_timeline_icon_size').val(data['rw_timeline_icon_size']);
                jQuery('.rich_web_timeline_year_block_bg').val(data['rw_timeline_year_block_bg']);
                jQuery('.rich_web_timeline_round_size').val(data['rw_timeline_round_size']);
                jQuery('.rich_web_timeline_bg_color').val(data['rw_timeline_bg_color']);
                jQuery('.rich_web_timeline_bg_color_hover').val(data['rw_timeline_bg_color_hover']);
                jQuery('.rich_web_timeline_box_shadow_hover').val(data['rw_timeline_box_shadow_hover']);
                jQuery('.rich_web_timeline_year_color_hover').val(data['rw_timeline_year_color_hover']);
                jQuery('.rich_web_timeline_year_block_bg_hover').val(data['rw_timeline_year_block_bg_hover']);
                jQuery('.rich_web_timeline_year_size').val(data['rw_timeline_year_size']);
                jQuery('.rich_web_timeline_md_color_hover').val(data['rw_timeline_md_color_hover']);
                jQuery('.rich_web_timeline_md_border_color').val(data['rw_timeline_md_border_color']);
                jQuery('.rich_web_timeline_md_border_color_hover').val(data['rw_timeline_md_border_color_hover']);
                jQuery('.rich_web_timeline_round_border_col').val(data['rw_timeline_round_border_col']);
                jQuery('.rich_web_timeline_round_border_col_hover').val(data['rw_timeline_round_border_col_hover']);
                jQuery('.rich_web_timeline_title_bg_color').val(data['rw_timeline_title_bg_color']);
                jQuery('.rich_web_timeline_year_border_color').val(data['rw_timeline_01']);
                jQuery('.rich_web_timeline_year_border_hover_color').val(data['rw_timeline_02']);
                jQuery('#RW_TimeLine_1_7_PaginType').val(data['rw_timeline_03']);
                jQuery('#RW_TimeLine_1_7_PaginCol').val(data['rw_timeline_04']);
            }
            if (data['rw_timeline_theme'] == '7') {
                jQuery('tbody tr:nth-last-child(-n+7)').css('display', 'none')
            }
        }
    });
    jQuery.ajax({
        type: 'POST',
        url: object.ajaxurl,
        data: {
            rwt_nonce: object.rw_timeline_nonce,
            action: 'rich_web_timeline_style_2',
            foobar_2: ti_id,
        },
        beforeSend: function() {},
        success: function(response) {
            if (response.success !== true) {
                location.reload(true);
            }
            var data = response.data;
            if (data['rw_timeline_month_col'] != '' || data['rw_timeline_month_col_hov'] != '' || data['rw_timeline_icon_col'] != '' || data['rw_timeline_icon_size'] != '' || data['rw_timeline_icon_style'] != '' || data['rw_timeline_md_bg_color'] != '' || data['rw_timeline_md_bg_color_hover'] != '') {
                jQuery('.rich_web_timeline_month_col').val(data['rw_timeline_month_col']);
                jQuery('.rich_web_timeline_month_col_hov').val(data['rw_timeline_month_col_hov']);
                jQuery('.rich_web_timeline_icon_color_st').val(data['rw_timeline_icon_col']);
                jQuery('.rich_web_timeline_icon_size_st').val(data['rw_timeline_icon_size']);
                jQuery('.rich_web_timeline_icon_type_st').val(data['rw_timeline_icon_style']);
                jQuery('.rich_web_timeline_md_bg_color').val(data['rw_timeline_md_bg_color']);
                jQuery('.rich_web_timeline_md_color_bg_hover').val(data['rw_timeline_md_bg_color_hover']);
                jQuery('#RW_TimeLine_7_DFormat').val(data['rw_timeline_01']);
                jQuery('#RW_TimeLine_1_7_PaginBackCol').val(data['rw_timeline_02']);
                jQuery('#RW_TimeLine_1_7_PaginCurrCol').val(data['rw_timeline_03']);
                jQuery('#RW_TimeLine_1_7_PaginCurrBackCol').val(data['rw_timeline_04']);
                jQuery('#RW_TimeLine_1_7_PaginHoverCol').val(data['rw_timeline_05']);
                jQuery('#RW_TimeLine_1_7_PaginHoverBackCol').val(data['rw_timeline_06']);
                jQuery('#RW_TimeLine_1_7_PaginFS').val(data['rw_timeline_07']);
                jQuery('#RW_TimeLine_1_7_PaginFF').val(data['rw_timeline_08']);
            }
            setTimeout(function() {
                RW_TimeLine_Theme_Changed();
                rangeGI();
                jQuery('input.rich_web_timeline_color').alphaColorPicker();
                jQuery('.wp-color-result').attr('title', 'Select');
                jQuery('.wp-color-result').attr('data-current', 'Selected');
                jQuery('.RW_TimeLine_Loading').css('display', 'none');
                jQuery('.Rich_Web_Timeline_Table_Data_Option').hide();
                jQuery('.Rich_Web_New_Timeline_Option').show();
            }, 100)
        }
    });
}

function rw_ti_copy_option(ti_id) {
    var ajaxurl = object.ajaxurl;
    var data = {
        rwt_nonce: object.rw_timeline_nonce,
        action: 'rich_web_timeline_copy_style',
        foobar_1: ti_id,
        foobar_2: ti_id,
    };
    jQuery.post(ajaxurl, data, function(response) {
        location.reload();
    });
}

function rw_ti_del(ti_id) {
    var RWTIRS = ti_id;
    jQuery('.Rich_Web_Timeline_Fixed_Div').fadeIn();
    jQuery('.Rich_Web_Timeline_Absolute_Div').fadeIn();
    jQuery('.Rich_Web_Timeline_Relative_No').click(function() {
        jQuery('.Rich_Web_Timeline_Fixed_Div').fadeOut();
        jQuery('.Rich_Web_Timeline_Absolute_Div').fadeOut();
        RWTIRS = null;
    });
    jQuery('.Rich_Web_Timeline_Relative_Yes').click(function() {
        if (RWTIRS != null) {
            jQuery('.Rich_Web_Timeline_Fixed_Div').fadeOut();
            jQuery('.Rich_Web_Timeline_Absolute_Div').fadeOut();
            var ajaxurl = object.ajaxurl;
            var data = {
                rwt_nonce: object.rw_timeline_nonce,
                action: 'rich_web_timeline_del',
                foobar_1: ti_id,
            };
            jQuery.post(ajaxurl, data, function(response) {
                location.reload();
            });
        }
        RWTIRS = null;
    });
}

function rw_ti_del_option(ti_id) {
    var RWTIRS = ti_id;
    jQuery('.Rich_Web_Timeline_Fixed_Div').fadeIn();
    jQuery('.Rich_Web_Timeline_Absolute_Div').fadeIn();
    jQuery('.Rich_Web_Timeline_Relative_No').click(function() {
        jQuery('.Rich_Web_Timeline_Fixed_Div').fadeOut();
        jQuery('.Rich_Web_Timeline_Absolute_Div').fadeOut();
        RWTIRS = null;
    });
    jQuery('.Rich_Web_Timeline_Relative_Yes').click(function() {
        if (RWTIRS != null) {
            var ajaxurl = object.ajaxurl;
            var data = {
                rwt_nonce: object.rw_timeline_nonce,
                action: 'rich_web_timeline_del_option',
                foobar_1: ti_id,
            };
            jQuery.post(ajaxurl, data, function(response) {
                location.reload();
            });
        }
        RWTIRS = null;
    });
}

function rangeGI() {
    var slider = jQuery('.range-timeline'),
        range = jQuery('.range-timeline__range'),
        value = jQuery('.range-timeline__value');
    slider.each(function() {
        value.each(function() {
            var value = jQuery(this).prev().attr('value');
            jQuery(this).html(value);
        });
        range.on('input', function() {
            jQuery(this).next(value).html(this.value);
        });
    });
};
rangeGI();

function refresh_page() {
    location.reload();
}