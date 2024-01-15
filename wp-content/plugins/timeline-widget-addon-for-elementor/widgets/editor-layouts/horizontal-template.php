<# 
var widgetId=elementorCommon.helpers.getUniqueId();
var slideToShow=settings.twae_slides_to_show;
var slideHeight=settings.twae_slides_height;

if(settings.twae_icon_position.size >= 1 && settings.twae_icon_position.size < 40){
    twae_icon_position='twae-position-40-minus';
}else if(settings.twae_icon_position.size > 50 && settings.twae_icon_position.size <= 60){
    twae_icon_position='twae-position-50-60';
}else if(settings.twae_icon_position.size > 60){
    twae_icon_position='twae-position-60-plus';
}else{
    twae_icon_position='twae-position-40-50';
}


#>
<div id="twae-wrapper-{{{widgetId}}}" class="twae-wrapper twae-horizontal-timeline" >
<div class="twae-wrapper-inside">
    <div class="twae-slider-container swiper-container" data-dir="<?php echo $dir ?>" data-slidestoshow = "{{{slideToShow}}}"  data-autoplay="{{{autoplay}}}"  >

    <div class="twae-slider-wrapper swiper-wrapper {{{slideHeight}}}">
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
           
            var year_key = view.getRepeaterSettingKey( 'twae_year', 'twae_list',index ),
            date_label_key = view.getRepeaterSettingKey( 'twae_date_label', 'twae_list',index ),
            extra_label_key = view.getRepeaterSettingKey( 'twae_extra_label', 'twae_list',index ),
            title_key = view.getRepeaterSettingKey( 'twae_story_title', 'twae_list',index ),
            description_key = view.getRepeaterSettingKey( 'twae_description', 'twae_list',index );

            var iconType = item.twae_icon_type!=="undefined"?item.twae_icon_type:'icon';
            #>
            
            <div class="swiper-slide twae-repeater-item twae-story {{{twae_icon_position}}}">	
            <div class="twae-story-line"></div>
            <#
             if(item.twae_show_year_label == 'yes'){
                        #>
                        <div class="twae-year twae-year-container">
                            <div class="twae-year-label twae-year-text" >{{{ item.twae_year }}}</div>
                        </div>
                <# }#>
                   
                    <div class="twae-labels">
                        <div  class="twae-label-big" >{{{ item.twae_date_label }}}</div>
                       
                        <# if(extra_label_key!=="undefined")
                        { #>
                        <div class="twae-label-small">{{{ item.twae_extra_label }}}</div>
                        <# } #>

                    </div>	
                    <div class="twae-arrow" ></div>	
                    <# if (iconType =='icon' ) { #>
                    <div class="twae-icon">
                      <# 
                      twae_iconHTML = elementor.helpers.renderIcon( view, item.twae_story_icon, { 'aria-hidden': true }, 'i' , 'object' );
                        if (twae_iconHTML.rendered ) { #>
                            {{{ twae_iconHTML.value }}}
                        <# } else { #>
                            <i aria-hidden="true" class="far fa-clock"></i>
                        <# } #> 
                      </div>
                    <# }else{ #>
                         <div class="twae-icondot"></div>
                        <# } #>

                    <div class="twae-content">
                    <# if( item.twae_media == 'image' && image_url!=''){ #>          
                        <div class="twae-media  {{{timeline_image.size}}}"><img src="{{{ image_url }}}" /></div>
                    <# } #>            
                        <div class="twae-title">{{{ item.twae_story_title}}}</div>
                        <div class="twae-description">{{{ item.twae_description }}}</div>
                    </div>
            </div>
<# }); #>
    </div></div></div>
    <!-- Add Pagination -->        
    <!-- Add Arrows -->
            <div class="twae-button-prev"><i class="fas fa-chevron-left"></i></div>
            <div class="twae-button-next"><i class="fas fa-chevron-right"></i></div>
            <div class="twae-h-line"></div>
            <div class="twae-line-fill"></div>
</div>

