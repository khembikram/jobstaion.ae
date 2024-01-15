<#
    var widgetId=elementorCommon.helpers.getUniqueId();
	var countItem = 1;
    var timeline_layout_wrapper = 'twae-both-sided';
    if(settings.twae_layout == 'one-sided'){
        var timeline_layout_wrapper = 'twae-vertical-right';
    }
    #>
    <div  id="twae-wrapper-{{{widgetId}}}" class="twae-vertical twae-wrapper {{{ timeline_layout_wrapper }}}" >
    <div class="twae-start"></div>
    <div class="twae-timeline">
        <#
        _.each( settings.twae_list, function( item, index ) {
            var timeline_image = {
                id: item.twae_image.id,
                url: item.twae_image.url,
                size: item.twae_thumbnail_size,
                dimension: item.twae_thumbnail_custom_dimension,
                model: view.getEditModel()
            };
            var image_url = elementor.imagesManager.getImageUrl( timeline_image );
            date_label_key = view.getRepeaterSettingKey( 'twae_date_label', 'twae_list',index ),
            extra_label_key = view.getRepeaterSettingKey( 'twae_extra_label', 'twae_list',index ),
            title_key = view.getRepeaterSettingKey( 'twae_story_title', 'twae_list',index ),
            description_key = view.getRepeaterSettingKey( 'twae_description', 'twae_list',index );

            var iconType = item.twae_icon_type!=="undefined"?item.twae_icon_type:'icon';
         
            view.addRenderAttribute( date_label_key, {'class':  'twae-label-big'} );
            view.addRenderAttribute( extra_label_key, {'class':  'twae-label-small'} );
            view.addRenderAttribute( title_key, {'class': 'twae-title'});
            view.addRenderAttribute( description_key, {'class':  'twae-description'} );

         
        	view.addInlineEditingAttributes( date_label_key, 'none' );
        	view.addInlineEditingAttributes( extra_label_key, 'none' );
        	view.addInlineEditingAttributes( title_key, 'none' );
        	view.addInlineEditingAttributes( description_key, 'advanced' );
           
            var story_id=item['_id'];
            var story_alignment = "twae-story-right";
            if(settings.twae_layout == 'centered'){
                if ( countItem % 2 == 0) {
                    var story_alignment = "twae-story-left";						
                }
            }
            var iconCls='';
            if (iconType=="dot" ) {
                iconCls='twae-story-no-icon';
            }else{
                iconCls='twae-story-icon';
            }
            #>

            <#
             if(item.twae_show_year_label == 'yes'){
                        #>
                        <div class="twae-year twae-year-container">
                            <div class="twae-year-label twae-year-text" >{{{ item.twae_year }}}</div>
                        </div>
                <# }#>
            <div id="story-{{{story_id}}}" class="twae-story twae-repeater-item {{{ story_alignment }}} {{{ iconCls}}}">									
                    <div class="twae-labels">
                        <div {{{ view.getRenderAttributeString( date_label_key ) }}} >{{{ item.twae_date_label }}}</div>
                        <div {{{ view.getRenderAttributeString( extra_label_key ) }}} >{{{ item.twae_extra_label }}}</div>
                    </div>
                    <# if (iconType =='dot' ) { #>
                        <div class="twae-icondot"></div>
                    <# }else{ #>
                        <div class="twae-icon">
                        <# 
                        twae_iconHTML = elementor.helpers.renderIcon( view, item.twae_story_icon, { 'aria-hidden': true }, 'i' , 'object' );
                            if (twae_iconHTML.rendered ) { #>
                                {{{ twae_iconHTML.value }}}
                            <# } else { #>
                                <i aria-hidden="true" class="far fa-clock"></i>
                             <# } #> 
                      </div>
                    <# } #>

                    <div class="twae-arrow"></div>
                    <div class="twae-content">
                        <div {{{ view.getRenderAttributeString( title_key ) }}} >{{{ item.twae_story_title}}}</div>
                        <# if( item.twae_media == 'image' && image_url!=''){ #>
                            <div class="twae-media {{{timeline_image.size}}}"><img src="{{{ image_url }}}" /></div>
                        <# } #>
                        <div {{{ view.getRenderAttributeString( description_key ) }}} >{{{ item.twae_description }}}</div>
                    </div>
              
            </div>
            <#
            countItem = countItem+1;
        });
        #>
        </div>
        <div class="twae-end"></div>
    </div>
