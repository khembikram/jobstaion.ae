<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! current_user_can( 'manage_options' ) ) {
	die( 'Access Denied' );
}
require_once( 'Rich-Web-Timeline-Header.php' );
?>
<style type="text/css">
    .Rich_Web_Header_Main {
        position: relative;
        width: 100%;
        height: 140px;
        background: #6ecae9;
        margin-top: 30px;
        text-align: left;
        margin-bottom: 20px;
    }

    .Rich_Web_Header_Main img {
        position: relative;
        width: 222px;
    }

    .Rich_Web_Products_Main_Div {
        width: 99%;
        position: relative;
        margin: 15px 0px;
        float: left;
    }

    .Rich_Web_Products_Product_Div {
        float: left;
        position: relative;
        width: 270px;
        height: 530px;
        text-align: center;
        background: #fff;
        margin-left: 5px;
        margin-top: 15px;
        box-shadow: 0 1px 4px #6ecae9;
        -webkit-box-shadow: 0 1px 4px #6ecae9;
        -moz-box-shadow: 0 1px 4px #6ecae9;
    }

    .Rich_Web_Products_Product_Div:before, .Rich_Web_Products_Product_Div:after {
        content: "";
        position: absolute;
        z-index: -1;
        box-shadow: 0 0 20px #6ecae9;
        -webkit-box-shadow: 0 0 20px #6ecae9;
        -moz-box-shadow: 0 0 20px #6ecae9;
        top: 50%;
        bottom: 0;
        left: 10px;
        right: 10px;
        border-radius: 100px / 10px;
    }

    .Rich_Web_Products_Product_Div img {
        margin-top: 10px;
    }

    .Rich_Web_Products_Product_Div p {
        padding: 0px 15px 10px 15px;
        text-align: justify;
        font-size: 14px;
        line-height: 1.2;
        color: #30a9d1;
    }

    .Rich_Web_Products_Product_Div p span {
        margin-left: 5px;
        margin-right: 3px;
        padding: 0px;
        font-size: 24px;
        color: #6ecae9;
        text-shadow: 0px 0px 1px #000;
    }

    .Rich_Web_Products_Product_Div h1 {
        display: block;
        width: 90%;
        margin: 0 auto;
        border-top: 1px solid #6ecae9;
    }

    .Rich_Web_Products_Product_Div a {
        padding: 8px 0px;
        box-shadow: 0px 0px 20px #6ecae9 inset;
        width: 90%;
        text-decoration: none;
        color: #30a9d1;
        position: absolute;
        left: 5%;
        bottom: 10px;
    }

    .Rich_Web_Products_Product_Div a:hover {
        box-shadow: 0px 0px 20px #30a9d1 inset;
    }
</style>
<div class="Rich_Web_Products_Main_Div">
    <div class="Rich_Web_Products_Product_Div">
        <img src="<?php echo esc_url( plugins_url( '/Images/Products/Forms.png', __FILE__ ) ); ?>">
        <h1></h1>
        <p>
            <span>R</span>ich is a WordPress form creator with a multiple choice, that allows to create WordPress form
            for several minutes. As soon as possible, you can create fully functional contact form without writing a
            single line of code. Forms Plugin allows to change all settings like the colors, fonts and sizes, which are
            appropriates to forms standards. Rich Web form has all functions, that you can expect from the other free
            forms plugin.
        </p>
        <a href="<?php echo esc_url( 'https://rich-web.org/wp-contact-form/' ); ?>" target="_blank"> View More </a>
    </div>
    <div class="Rich_Web_Products_Product_Div">
        <img src="<?php echo esc_url( plugins_url( '/Images/Products/Gallery-Image.png', __FILE__ ) ); ?>">
        <h1></h1>
        <p>
            <span>P</span>hoto Gallery is awesome WordPress gallery plugin with many useful features and effects. The
            photo plugin was created and specially designed for photos. Photo Gallery plugin is the responsive photo
            gallery plugin of the WordPress. There are 8 major versions of gallery style. Photo Gallery plugin is
            compatible with WordPress themes. You can change the colors of the gallery, sizes, font size and distance
            from powerful settings panel of gallery plugin.
        </p>
        <a href="<?php echo esc_url( 'https://rich-web.org/wp-image-gallery/' ); ?>" target="_blank"> View More </a>
    </div>
    <div class="Rich_Web_Products_Product_Div">
        <img src="<?php echo esc_url( plugins_url( '/Images/Products/Slider-Image.png', __FILE__ ) ); ?>">
        <h1></h1>
        <p>
            <span>S</span>lider Rich Web is one of the most important plugins for WordPress websites. Besides, by
            beautiful and unrepeatable effects, your slider gives more professional look to your website. Slider Image
            is one of the best in responsive Slider images plugins. Plugin allows you to modify all setting, such as
            colors, fonts and sizes, which are corresponding, to standards of the slider. Rich Web Slider Image has that
            all features, that you can expect from another free slider images plugin. You can create unlimited sliders
            and images.
        </p>
        <a href="<?php echo esc_url( 'https://rich-web.org/wp-image-slider/' ); ?>" target="_blank"> View More </a>
    </div>
    <div class="Rich_Web_Products_Product_Div">
        <img src="<?php echo esc_url( plugins_url( '/Images/Products/Slider-Video.png', __FILE__ ) ); ?>">
        <h1></h1>
        <p>
            <span>S</span>lider Video plugin is a great way to create a stunning video slider without programming
            skills. Fully responsive, works on any mobile device. You can attract more people to your website and amaze
            them with effective slideshows, that show your videos amazing way. It is very easy. It is necessary to
            select the video ( currently supports in Youtube, Vimeo, Vevo and MP4) that you would like to show in a
            Slider using the Rich Web, wich creates a responsive slideshow, thumbnail slider or slider post feed. Slider
            Video Plugin supports Youtube, Vimeo, Vevo and MP4 videos. It is fully responsive works on iPhone, IPAD,
            Android, Firefox, Chrome, Safari, Opera and Internet Explorer.
        </p>
        <a href="<?php echo esc_url( 'https://rich-web.org/wp-video-slider/' ); ?>" target="_blank"> View More </a>
    </div>
    <div class="Rich_Web_Products_Product_Div">
        <img src="<?php echo esc_url( plugins_url( '/Images/Products/Tabs.png', __FILE__ ) ); ?>">
        <h1></h1>
        <p>
            <span>T</span>abs plugin is fully responsive. Tabs plugin is for creating responsive tabbed panels with
            unlimited options and transition animations support. If you wish to spice up your corporate website, blog,
            ecommerce site or a message board, with tabbed it’s easy to show any content, video, price or data tables,
            form or other elements.
        </p>
        <a href="<?php echo esc_url( 'https://rich-web.org/wp-tab-accordion/' ); ?>" target="_blank"> View More </a>
    </div>
    <div class="Rich_Web_Products_Product_Div">
        <img src="<?php echo esc_url( plugins_url( '/Images/Products/Coming-Soon.png', __FILE__ ) ); ?>">
        <h1></h1>
        <p>
            <span>C</span>oming Soon plugin is a responsive, modern and clean under construction & coming soon WordPress
            Plugin. This minimal template is packed with a countdown timer, ajax subscription form, social icons and
            about page where you can write a little bit about yourself and add your phone, email and address
            information.
        </p>
        <a href="<?php echo esc_url( 'https://rich-web.org/wp-coming-soon/' ); ?>" target="_blank"> View More </a>
    </div>
    <div class="Rich_Web_Products_Product_Div">
        <img src="<?php echo esc_url( plugins_url( '/Images/Products/Share-Button.png', __FILE__ ) ); ?>">
        <h1></h1>
        <p>
            <span>S</span>ocial Share Buttons are a fun way to display your social media buttons. Social network is one
            of the popular places where people get information about everything in the world.
        </p>
        <a href="<?php echo esc_url( 'https://rich-web.org/wp-share-button/' ); ?>" target="_blank"> View More </a>
    </div>
    <div class="Rich_Web_Products_Product_Div">
        <img src="<?php echo esc_url( plugins_url( '/Images/Products/Timeline.png', __FILE__ ) ); ?>">
        <h1></h1>
        <p>
            <span>E</span>vent Timeline is an advanced WordPress timeline plugin that showcases your life history
            timeline or your company ‘ s story timeline in a responsive horizontal or vertical chronological order based
            on the year and the date of your posts. It is best plugin to create a timeline theme. You can also convert
            your blog posts into a blog timeline by using this awesome timeline template maker plugin.
        </p>
        <a href="<?php echo esc_url( 'https://rich-web.org/wp-event-timeline/' ); ?>" target="_blank"> View More </a>
    </div>
</div>