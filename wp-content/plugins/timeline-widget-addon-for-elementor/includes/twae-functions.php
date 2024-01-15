<?php

//get icons
function twae_get_icons($icon_setting){
        if(isset($icon_setting)){
            ob_start();
            \Elementor\Icons_Manager::render_icon( $icon_setting, [ 'aria-hidden' => 'true' ] );
            $render_icon = ob_get_contents();
            ob_end_clean();
            return $render_icon;
        }else{
            return '<i class="far fa-clock"></i>';
        }
}

