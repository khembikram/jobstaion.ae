<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Admin notice class for wordpress plugin.
 * This class can not be initialized or extended.
 */

/**************************************************************************************************
 *  HOW TO USE.
 * After including this file, use the below example to start creating admin notice / review box
 *
 * Two arguments, id & message are required and can not be ommitied.
 * id must be unique for every message or it will override the previous message with same id.
 * 
 *               create a simple admin text message
 *   twae_free_create_admin_notice( array('id'=>'bp-greeting-mesage','message'=>'Hey there!') );
 * 
 *              create a admin text error message
 * twae_free_create_admin_notice( array('id'=>'bp-error-mesage','message'=>'this is an example of error!','type'=>'error') );
 * The argument 'type' can be: error, success, warning
 * 
 *              create a review box by passing minimum arguments
 * $slug = 'bp';
 * update_option($slug . '_activation_time,strtotime('now') ); // must create an activation time 
 * twae_free_create_admin_notice( 
 *          array(
 *              'id'=>'bp_review_box',  // required and must be unique
 *              'slug'=>$slug,      // required in case of review box
 *              'review'=>true,     // required and set to be true for review box
 *              'review_url'=>'http://coolplugins.net', // required
 *              'plugin_name'=>'Boiler Plate Plugin',    // required
 *              'logo'=>'http://example.com/logo.png',   // optional: it will display logo
 *              'review_interval'=>5                    // optional: this will display review notice
 *                                                      //   after 5 days from the installation_time
 *                                                      // default is 3
 *          )
 * );
 * 
 * NOTE: Review box does not be displayed unless the $slug _activation_time is equals or
 * more than the 3 days from current time. This can also be changed by setting 'review_interval' arguments
 ***************************************************************************************************** 
 */
if (!class_exists('twae_free_admin_notices')):

    final class twae_free_admin_notices
    {

        private static $instance = null;
        private $messages = array();
        private $version = '1.0.0';

        /**
         * initialize the class with single instance
         */
        public static function twae_free_create_notice()
        {
            if (!empty(self::$instance)) {
                return self::$instance;
            }
            return self::$instance = new self;
        }

        /**
         * add messages for admin notice
         * @param array $notice this array contains $id,$message,$type,$class,$id
         *
         */
        public function twae_free_add_message($notice)
        {

            if( !isset( $notice['id']) || empty($notice['id']) ){
                //$this->twae_free_show_error('id is required for integrating admin notice.');
                return;
            }

            if( array_key_exists( $notice['id'], $this->messages ) ){

            }

            if ( isset($notice['review']) && true != (bool)$notice['review'] && ( !isset($notice['message']) || empty($notice['message']) )) {
                //$this->twae_free_show_error('message can not be null. You must provide some text for message field');
                return;
            }
            $message         = (isset($notice['message']) && !empty($notice['message'])) ?  wp_kses( $notice['message'], 'post' ) : null ;
            $type            = (isset($notice['type']) && !empty($notice['type'])) ? 'notice-' . sanitize_text_field( $notice['type'] ) : 'notice-success' ;
            $class           = (isset($notice['class']) && !empty($notice['class'])) ? sanitize_text_field( $notice['class'] ): '';
            $review          = (bool)(isset($notice['review'] ) && !empty( $notice['review'] ) ) ? sanitize_text_field( $notice['review'] ) : false;
            $slug            = (isset($notice['slug']) && !empty($notice['slug'])) ? sanitize_text_field( $notice['slug'] ): '' ;
            $plugin_name     = (isset($notice['plugin_name']) && !empty($notice['plugin_name'])) ? sanitize_text_field( $notice['plugin_name'] ) : '' ;
            $logo            = (isset($notice['logo']) && !empty($notice['logo'])) ? esc_url( $notice['logo'] ) : null ;
            $review_url      = (isset($notice['review_url']) && !empty($notice['review_url'])) ? esc_url( $notice['review_url'] ) : '' ;
            $review_interval = (isset($notice['review_interval']) && !empty($notice['review_interval'])) ? sanitize_text_field( $notice['review_interval'] ) : '3' ;
            if( $review == true && ( empty( $slug ) || empty( $plugin_name ) || empty( $review_url ) )){
               // $this->twae_free_show_error( 'slug / plugin_name / review_url can not be empty if admin notice is set to review' );
                return;
            }
            $this->messages[$notice['id']] = array(
                                            'message' => $message,
                                            'type' => $type,
                                            'class' => $class,
                                            'review' => $review,
                                            'logo'=>$logo,
                                            'slug' => $slug,
                                            'plugin_name' => $plugin_name,
                                            'review_url' => $review_url,
                                            'review_interval' => $review_interval
                                        );

            add_action('admin_notices', array($this, 'twae_free_show_notice'));
            add_action( 'admin_print_scripts', array($this, 'twae_free_load_script' ) );
            add_action('wp_ajax_twae_free_admin_notice', array($this, 'twae_free_admin_notice_dismiss'));
            add_action('wp_ajax_twae_free_admin_review_notice_dismiss', array($this, 'twae_free_admin_review_notice_dismiss'));
        }

        /**
    	 * Load script to dismiss notices.
    	 *
    	 * @return void
    	 */
    	public function twae_free_load_script() {    	
            wp_register_style( 'twae-feedback-notice-styles',TWAE_URL.'assets/css/twae-admin-feedback-notice.min.css',array(),TWAE_VERSION,'all' );
            wp_enqueue_style( 'twae-feedback-notice-styles' );
        }

        /**
         * Create simple admin notice
         */
        public function twae_free_show_notice()
        {
            if (count($this->messages) > 0) {
                
                foreach ($this->messages as $id => $message) {
                    if( true == (bool) $message['review'] ){
                        $this->twae_free_admin_notice_for_review( $id, $message);
                    }else{
                        $this->twae_free_simple_notice($id, $message );
                    }
                }
            }
        }

        /**
         * Due to the nature of private function. This must not be called directly
         * Create simple text/html admin notice and initialize required JS
         * @param array $message This is an array of message object
         */
        private function twae_free_simple_notice($id, $message ){

            if( get_option($id . '_remove_notice') ) return;
            
            $classes = esc_attr('notice ' . trim( $message['type'] ) . ' is-dismissible ' . trim( $message['class'] ));
            $script = '<script>
            jQuery(document).ready(function ($) {
                $(".'.$id.'_admin_notice .notice-dismiss").css("border","2px solid red");
                $(document).on("click",".'.$id.'_admin_notice button.notice-dismiss", function (event) {
                    var $this = $(this);
                    var wrapper=$this.parents(".'.$id.'_admin_notice");
                    var ajaxURL=wrapper.data("ajax-url");
                    var id = wrapper.data("plugin-slug");
                    var wp_nonce = wrapper.data("wp-nonce");
                    $.post(ajaxURL, { "action":"twae_free_admin_notice","id":id,"_nonce":wp_nonce }, function( data ) {
                        wrapper.slideUp("fast");
                      }, "json");
                });
            });
            </script>';
            $nonce = wp_create_nonce( $id . '_notice_nonce' );
            echo "<div class='".$id."_admin_notice $classes' data-ajax-url='".admin_url('admin-ajax.php')."' data-wp-nonce='". $nonce . "' data-plugin-slug='$id'><p>" . $message['message'] . "</p></div>" . $script;
        }

        /**
         * This function decides if its good to show the review notice or not
         * Review notice will only be displayed if $slug_activation_time is greater or equals to the 3 days
         */
        private function twae_free_admin_notice_for_review( $id, $messageObj ){
            // Everyone should not be able see the review message
            if( !current_user_can( 'update_plugins' ) ){
                return;
            }
            $slug = $messageObj['slug'];
            $days = $messageObj['review_interval'];
            if(get_option( $slug.'_activation_time' )){
                // get installation dates and rated settings
                //$installation_date =date( 'Y-m-d h:i:s', get_option( $slug.'_activation_time' ));
                $installation_date = date( 'Y-m-d h:i:s', strtotime(get_option( $slug.'_activation_time' )) );
            }else{
               // $this->twae_free_show_error('Review notice can not be integrated. '.$slug.'_activation_time option is not set for the plugin');
                return;
            }
           
             // check if user already rated 
            if(get_option( $slug . '_spare_me' )) {
                return;
            }
                
                // grab plugin installation date and compare it with current date
                $display_date = date( 'Y-m-d h:i:s' );
                $install_date = new DateTime( $installation_date );
                $current_date = new DateTime( $display_date );
                $difference   = $install_date->diff($current_date);
                $diff_days    = $difference->days;
              
                // check if installation days is greator then week
                if (isset($diff_days) && $diff_days>= $days ) {
                    echo $this->twae_free_create_notice_content( $id, $messageObj );
                 }
        }

        /**
         * Generate review notice HTMl with all required css & js
         *
         * @param array $messageObj array of a message object 
         **/ 
       function twae_free_create_notice_content( $id, $messageObj ){

        $ajax_url      = admin_url( 'admin-ajax.php' );
        $ajax_callback = 'twae_free_admin_review_notice_dismiss';
        $wrap_cls      = "notice notice-info is-dismissible";
        $img_path      = (isset( $messageObj['logo'] ) && !empty($messageObj['logo'] ) ) ? $messageObj['logo'] : null;
        $slug          = $messageObj['slug'];
        $plugin_name   = $messageObj['plugin_name'];
        $like_it_text  ='Rate Now! ★★★★★';
        $already_rated_text= esc_html__( 'I already rated it', 'twae' );
        $not_like_it_text  = esc_html__( 'Not Interested', 'twae' );
        $plugin_link       = $messageObj['review_url'] ;
        $review_nonce      = wp_create_nonce( $id . '_review_nonce' );
        $message           ="Thanks for using <b>$plugin_name</b> - WordPress plugin.
        We hope you liked it ! <br/>Please give us a quick rating, it works as a boost for us to keep working on more <a href='https://coolplugins.net' target='_blank'><strong>Cool Plugins</strong></a>!<br/>";
      
        $html='<div data-ajax-url="%8$s" data-plugin-slug="%11$s" data-wp-nonce="%12$s" id="%13$s" data-ajax-callback="%9$s" class="%11$s-feedback-notice-wrapper %1$s">';
        
        if( $img_path != null ){
            $html .='<div class="logo_container"><a href="%5$s"><img src="%2$s" alt="%3$s" style="max-width:80px;"></a></div>';
        }

        $html .='<div class="message_container">%4$s
        <div class="callto_action">
        <ul>
            <li class="love_it"><a href="%5$s" class="like_it_btn button button-primary" target="_new" title="%6$s">%6$s</a></li>
            <li class="already_rated"><a href="#" class="already_rated_btn button %11$s_dismiss_notice" title="%7$s">%7$s</a></li>  
            <li class="already_rated"><a href="#" class="already_rated_btn button %11$s_dismiss_notice" title="%10$s">%10$s</a></li>           
        </ul>
        <div class="clrfix"></div>
        </div>
        </div>
        </div>';
        $script = '<script>
        jQuery(document).ready(function ($) {
            $(document).on("click", "#'.$id.' .'.$slug.'_dismiss_notice", function (event) {
                var $this = $(this);
                var wrapper=$this.parents(".'.$slug.'-feedback-notice-wrapper");
                var ajaxURL=wrapper.data("ajax-url");
                var ajaxCallback=wrapper.data("ajax-callback");
                var slug = wrapper.data("plugin-slug");
                var id = wrapper.attr("id");
                var wp_nonce = wrapper.data("wp-nonce");
                $.post(ajaxURL, { "action":ajaxCallback,"slug":slug,"id":id,"_nonce":wp_nonce }, function( data ) {
                    wrapper.slideUp("fast");
                  })
            });
        });
        </script>';

        $html .= $script;
      

        return sprintf($html,
                $wrap_cls,
                $img_path,
                $plugin_name,
                $message,
                $plugin_link,
                $like_it_text,
                $already_rated_text,
                $ajax_url,// 8
                $ajax_callback,//9
                $not_like_it_text,//10
                $slug, //11
                $review_nonce, //12
                $id //13
        );
        
       }

       /**
        * This function will dismiss the review notice.
        * This is called by a wordpress ajax hook
        */
        public function twae_free_admin_review_notice_dismiss(){
            $slug = filter_var($_REQUEST['slug'], FILTER_SANITIZE_STRING);
            $id   = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING); 
            $nonce_key = $id . '_review_nonce' ;
           
            if( check_ajax_referer( $nonce_key, '_nonce' ) ){
                update_option( $slug . '_spare_me','yes' );
                echo json_encode( array("success"=>"true") );
            }else{
              //  echo json_encode( array("error"=>"nonce verification failed!") );
            }
                exit;
        }

        /************************************************************
         * This function will dismiss the text/html admin notice    *
         * This is called by a wordpress ajax hook                  *
         ************************************************************/
        public function twae_free_admin_notice_dismiss()
        {
           
            $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING); 
            $wp_nonce = $id . '_notice_nonce';
            if( check_ajax_referer($wp_nonce , '_nonce') ){
                $us = update_option( $id . '_remove_notice','yes' );
                die( 'Admin message removed!' );
            }else{
                die( 'nounce verification failed!' );
            }

        }

        /**************************************************************
         * This function is used by the class for displaying error    *
         *  in case of wrong implementation of the class.             *
         **************************************************************/
        private function twae_free_show_error($error_text){
            $er = "<div style='text-align:center;margin-left:20px;padding:10px;background-color: #cc0000; color: #fce94f; font-size: x-large;'>";
            $er .= "Error: ".$error_text;
            $er .= "</div>";
            echo wp_kese_post($er);
        }

    }   // end of main class twae_free_admin_notices;
endif;
    /********************************************************************************
     * A global function to create admin notice/review box using the above class.   *
     * This function makes it easy to use above class                               *
     ********************************************************************************/
    function twae_free_create_admin_notice($notice)
    {
        // Do not initialize anything if it's not wordpress admin dashboard
        if (!is_admin()) {
            return;
        }

        $main_class = twae_free_admin_notices::twae_free_create_notice();
        $main_class->twae_free_add_message($notice);
        return $main_class;
    }