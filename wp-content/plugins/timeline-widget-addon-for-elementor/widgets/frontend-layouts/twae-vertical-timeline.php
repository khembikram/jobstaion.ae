<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$widget_id = $this->get_id();
$title_tag='div';
$connector_html='<div class="twae-arrow"></div>';   
  
$this->add_render_attribute(
    'twae-wrapper',
    [
    'id' => 'twae-wrapper-'.$widget_id,
    'class' => [ 'twae-vertical','twae-wrapper ',$timeline_layout_wrapper,$timeline_style],
    ]);
 
$this->add_render_attribute(
    'twae-timeline',
    [
    'id' =>'twea-timeline-'.$widget_id,
    'class' => ['twae-timeline'],
    ]);
	
echo '<!-- ========= Timeline Widget Addon For Elementor '.TWAE_VERSION.' ========= -->
<div '.$this->get_render_attribute_string( 'twae-wrapper' ).'>   
    <div class="twae-start"></div>    
    <div '.$this->get_render_attribute_string( 'twae-timeline' ).' >';
    
    
  if(is_array($data)){
    foreach($data as $index=>$content){
        $story_alignment = "twae-story-right";
        if($layout == 'centered'){
            if($countItem % 2 == 0){ 
                $story_alignment = "twae-story-left";  
            }
        }
      
        $story_id=$content['_id'];
        $timeline_description = $content['twae_description'];
        $show_year_label = $content['twae_show_year_label'];
        $timeline_year =$content['twae_year'];
        $image ='';
        $icon_cls = '';
        $icon_html = '';
       
        $story_date_label = $content['twae_date_label'];
        $story_extra_label =isset($content['twae_extra_label'])?$content['twae_extra_label']:'';

        $timeline_story_title =$content['twae_story_title'];
      
        $icon_type = isset($content['twae_icon_type'])?$content['twae_icon_type']:'icon'; 
        $image_size = $content['twae_thumbnail_size'];
       
        $title_key = $this->get_repeater_setting_key( 'twae_story_title', 'twae_list', $index );
       
        $date_label_key = $this->get_repeater_setting_key( 'twae_date_label', 'twae_list', $index );
        $extra_label_key = $this->get_repeater_setting_key( 'twae_extra_label', 'twae_list', $index );
        $description_key = $this->get_repeater_setting_key( 'twae_description', 'twae_list', $index );
      
        $this->add_inline_editing_attributes( $title_key, 'none' );
        $this->add_inline_editing_attributes( $date_label_key, 'none' );
        $this->add_inline_editing_attributes( $extra_label_key, 'none' );
        $this->add_inline_editing_attributes( $description_key, 'advanced' );
        
        $this->add_render_attribute( $title_key, ['class'=> 'twae-title']);
      
        $this->add_render_attribute( $date_label_key, ['class'=> 'twae-label-big']);
        $this->add_render_attribute( $extra_label_key, ['class'=> 'twae-label-small']);
        $this->add_render_attribute( $description_key, ['class'=> 'twae-description']); 
      
        $article_key='twae-article-'.$story_id;
        $repeator_item_key='elementor-repeater-item-'.$story_id;
        $year_label_html ='';

        if(isset($content['twae_show_year_label'])&& $content['twae_show_year_label'] == 'yes'){
           $year_label_html .='<div class="twae-year twae-year-container  story-year-' . esc_attr($story_id) . '">
                <div class="twae-year-label twae-year-text">'.$timeline_year.'</div>
            </div>'; 
        }
       
        $date_label_html ='<div '.$this->get_render_attribute_string( $date_label_key).'>'.wp_kses_post($content['twae_date_label']).'</div>';

        $sub_label_html = '';
            if( $content['twae_extra_label']!=''){
                $sub_label_html .='<div '.$this->get_render_attribute_string( $extra_label_key ).'>'.wp_kses_post($content['twae_extra_label']).'</div>';
            }
       
         if($icon_type=='dot'){
            $icon_cls = 'twae-story-no-icon';
            $icon_html.='<div class="twae-icondot"></div>';
         }else{
            $icon_cls = 'twae-story-icon';
            $icon_html.='<div class="twae-icon">';
             if(isset($content['twae_story_icon'])){
                $icon_html.=  twae_get_icons($content['twae_story_icon']);
             }else{
                $icon_html.='<i aria-hidden="true" class="far fa-clock"></i>';
             }
             $icon_html.='</div>';
           }

         if($content['twae_image']['id']!=""){
            if($image_size =='custom'){
                $thumbnail_custom_dimension = $content['twae_thumbnail_custom_dimension'];
                $custom_size = array ( $thumbnail_custom_dimension['width'],$thumbnail_custom_dimension['height']);
                $image= wp_get_attachment_image($content['twae_image']['id'], $custom_size );	
            }
            else{
                $image= wp_get_attachment_image($content['twae_image']['id'],$image_size);                
            }
        }else if($content['twae_image']['url']!=""){
            $image = '<img src="'.esc_url($content['twae_image']['url']).'">';
        }
       

        $this->add_render_attribute(
            $article_key,
            [
            'id' =>'story-'.$story_id,
            'class' => ['twae-story', 'twae-repeater-item', $story_alignment,$icon_cls
                         ]
            ]);

    // all other vertical layouts.
        echo $year_label_html;     
        echo '<div '.$this->get_render_attribute_string( $article_key ).'>
                <div class="twae-labels" >';
                    echo $date_label_html;
                    echo $sub_label_html;  
                echo'</div>';
                echo $icon_html;
                echo $connector_html;
                echo '<div class="twae-content">';

                echo '<div '.$this->get_render_attribute_string( $title_key ).'>'.wp_kses_post($timeline_story_title).'</div>';
                if($content['twae_image']['url']!="" && $content['twae_media']=="image"){
                    echo '<div class="twae-media  '.esc_attr($image_size).'">'. $image.'</div>';
                }
                echo '<div '.$this->get_render_attribute_string( $description_key ).'>'.wp_kses_post($timeline_description).'</div>
                </div>
        </div>';				
        $countItem = $countItem +1;
    }
}
    echo'</div>
    <div class="twae-end"></div>
    </div>';