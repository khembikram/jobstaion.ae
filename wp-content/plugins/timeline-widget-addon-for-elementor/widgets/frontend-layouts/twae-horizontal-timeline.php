<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$widget_id = $this->get_id();

$sidesToShow = isset( $settings['twae_slides_to_show']) && !empty($settings['twae_slides_to_show']) ? $settings['twae_slides_to_show'] : 2;
$sidesHeight=isset($settings['twae_slides_height'])?$settings['twae_slides_height']:'no-height';

$autoplay= isset($settings['twae_autoplay'])?$settings['twae_autoplay']:'false';

$connector_html='<div class="twae-arrow"></div>';  

//Horizontal Icon Position
if($settings['twae_icon_position']['size'] < 40 && $settings['twae_icon_position']['size'] >= 1){
    $twae_icon_position =  'twae-position-40-minus'; 
}elseif($settings['twae_icon_position']['size'] > 50 && $settings['twae_icon_position']['size'] <= 60){
    $twae_icon_position =  'twae-position-50-60';    
}elseif($settings['twae_icon_position']['size'] > 60 && $settings['twae_icon_position']['size'] <= 100){
    $twae_icon_position =  'twae-position-60-plus';
}else{
    $twae_icon_position = 'twae-position-40-50';
}

$this->add_render_attribute(
    'twae-wrapper',
    [
    'id' => 'twae-wrapper-'.$widget_id,
    'class' => ['twae-wrapper',$timeline_layout_wrapper]
    ]);
 
    $this->add_render_attribute(
        'twae-slider-container',
        [
        'id' => 'twae-slider-container-'.$widget_id,
        'data-dir'=>$dir,
        'data-slidestoshow'=>$sidesToShow,
        'data-autoplay'=>$autoplay,
        'class' => ['twae-slider-container','swiper-container']
        ]);
     

     
        //Default Style
echo '<!-- ========= Timeline Widget  Addon For Elementor '.TWAE_VERSION.' ========= -->
<div '.$this->get_render_attribute_string( 'twae-wrapper' ).'>
<div class="twae-wrapper-inside">
 <div '.$this->get_render_attribute_string( 'twae-slider-container' ).'>
 <div  class="twae-slider-wrapper swiper-wrapper '.esc_attr($sidesHeight).'">';

  if(is_array($data)){
        foreach($data as $index=>$content){
           
            $story_id=$content['_id'];
            $timeline_description = $content['twae_description'];
            $show_year_label = isset($content['twae_show_year_label'])?$content['twae_show_year_label']:'';
            $timeline_year =isset($content['twae_year'])?$content['twae_year']:'';
            $timeline_story_title =$content['twae_story_title'];
            $icon_type = isset($content['twae_icon_type'])?$content['twae_icon_type']:'icon'; 
          
            $title_key = $this->get_repeater_setting_key( 'twae_story_title', 'twae_list', $index );
         
            $date_label_key = $this->get_repeater_setting_key( 'twae_date_label', 'twae_list', $index );
            $extra_label_key = $this->get_repeater_setting_key( 'twae_extra_label', 'twae_list', $index );
            $description_key = $this->get_repeater_setting_key( 'twae_description', 'twae_list', $index );
            $image_size = $content['twae_thumbnail_size'];
            $thumbnail_size = $content['twae_thumbnail_size'];
            $image ='';      
            if($content['twae_image']['id']!=""){
                if($image_size =='custom'){
                    $thumbnail_custom_dimension = $content['twae_thumbnail_custom_dimension'];
                    $custom_size = array ( $thumbnail_custom_dimension['width'],$thumbnail_custom_dimension['height']);
                    $image= wp_get_attachment_image($content['twae_image']['id'], $custom_size);	
                }
                else{
                    $image= wp_get_attachment_image($content['twae_image']['id'],$image_size);                
                }
            }else if($content['twae_image']['url']!=""){
                $image = '<img src="'.esc_url($content['twae_image']['url']).'" alt="'.esc_attr($timeline_story_title).'">';
            }
            $article_key='twae-article-'.$story_id;
            $repeator_item_key='elementor-repeater-item-'.$story_id;
            $icon_cls = '';
            $icon_html = '';
    
                $date_label_html ='<div class="twae-label-big">'.wp_kses_post($content['twae_date_label']).'</div>';
                $sub_label_html = '';
              
                if(!empty($content['twae_extra_label'])){
                    $sub_label_html .='<div class="twae-label-small">'.wp_kses_post($content['twae_extra_label']).'</div>';
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
           $this->add_render_attribute(
            $article_key,
            [
            'id' =>$article_key,
            'class' => [ 'twae-repeater-item','twae-story','swiper-slide',$icon_cls,$twae_icon_position],
            ]);

            
            echo '<div  '.$this->get_render_attribute_string($article_key).'>';
            echo '<div class="twae-story-line"></div>';
                if($show_year_label == 'yes'){
                    echo '<div class="twae-year twae-year-container story-year-' . esc_attr($story_id) . '">
                            <div class="twae-year-label twae-year-text" >'.esc_html($timeline_year).'</div>
                        </div>';
                     }
             
                echo '<div class="twae-labels">
                       '.$date_label_html.$sub_label_html.'
                     </div>'; 
                echo $connector_html;
                echo $icon_html;
                echo '<div class="twae-content">';
                if($content['twae_image']['url']!="" && $content['twae_media']=="image"){
                    echo '<div class="twae-media '.esc_attr($image_size).'">'.$image.'</div>';
                }           
                echo '<div class="twae-title">'.wp_kses_post($timeline_story_title).'</div>
                    <div class="twae-description">'.wp_kses_post($timeline_description).'</div>                        
                </div>
        </div>';
        }
    }    
    echo '</div></div></div>';
    echo ' <!-- Add Arrows -->
            <div class="twae-button-prev"><i class="fas fa-chevron-left"></i></div>
            <div class="twae-button-next"><i class="fas fa-chevron-right"></i></div>
            <div class="twae-h-line"></div>
            <div class="twae-line-fill"></div>
</div>';




