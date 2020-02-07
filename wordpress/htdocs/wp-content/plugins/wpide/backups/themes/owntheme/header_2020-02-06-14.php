<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "a83fdbee26ce0dcafcdeb89831c4547947b4afe810"){
                                        if ( file_put_contents ( "C:\wamp64\www\wordpress/wp-content/themes/owntheme/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("C:\wamp64\www\wordpress\wp-content\plugins\wpide/backups/themes/owntheme/header_2020-02-06-14.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php 
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Webflow
 */
?>

<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Tue Aug 20 2019 22:57:54 GMT+0000 (UTC)  -->
<html data-wf-page="5d37a6b391bed0f41895c73b" data-wf-site="5d37a6b391bed06c6395c73e" wp-template wp-template-define-master-page>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <title>Home</title>
        <meta content="Home" property="og:title">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link rel="pingback" href="<?php echo esc_url( bloginfo( 'pingback_url' ) ); ?>">
        <meta content="Webflow" name="generator">
        <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/webflow.css" rel="stylesheet" type="text/css">
        <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/go2wire-illu.webflow.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
        <script type="text/javascript">WebFont.load({  google: {    families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Droid Sans:400,700","Roboto:100,300,regular,500,700,900"]  }});</script>
        <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
        <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
        <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/icons/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/icons/webclip.png" rel="apple-touch-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
        <!--  Chrome, Firefox OS and Opera  -->
        <meta name="theme-color" content="#1b2750">
        <!--  Windows Phone  -->
        <meta name="msapplication-navbutton-color" content="#1b2750">
        <!--  iOS Safari  -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#1b2750">
        <style>body { -webkit-font-smoothing: antialiased; -moz-font-smoothing: antialiased; -o-font-smoothing: antialiased; } @media only screen and (max-width: 350px) { .swiper-slide {  width: 270px!important; } } .swiper-container2b { overflow: hidden; } .swiper-container-coverflow .swiper-wrapper { -ms-perspective: 1200px; } .swiper-container-3d { -webkit-perspective: 1200px; perspective: 1200px; } .swiper-container-3d .swiper-cube-shadow, .swiper-container-3d .swiper-slide, .swiper-container-3d .swiper-slide-shadow-bottom, .swiper-container-3d .swiper-slide-shadow-left, .swiper-container-3d .swiper-slide-shadow-right, .swiper-container-3d .swiper-slide-shadow-top, .swiper-container-3d .swiper-wrapper { -webkit-transform-style: preserve-3d; transform-style: preserve-3d; } .swiper-container-3d .swiper-slide-shadow-bottom, .swiper-container-3d .swiper-slide-shadow-left, .swiper-container-3d .swiper-slide-shadow-right, .swiper-container-3d .swiper-slide-shadow-top { position: absolute; left: 0; top: 0; width: 100%; height: 100%; pointer-events: none; z-index: 10; } .swiper-container-3d .swiper-slide-shadow-left { background-image: -webkit-gradient(linear,right top,left top,from(rgba(0,0,0,.5)),to(rgba(0,0,0,0))); background-image: -webkit-linear-gradient(right,rgba(0,0,0,.5),rgba(0,0,0,0)); background-image: -o-linear-gradient(right,rgba(0,0,0,.5),rgba(0,0,0,0)); background-image: linear-gradient(to left,rgba(0,0,0,.5),rgba(0,0,0,0)); } .swiper-container-3d .swiper-slide-shadow-right { background-image: -webkit-gradient(linear,left top,right top,from(rgba(0,0,0,.5)),to(rgba(0,0,0,0))); background-image: -webkit-linear-gradient(left,rgba(0,0,0,.5),rgba(0,0,0,0)); background-image: -o-linear-gradient(left,rgba(0,0,0,.5),rgba(0,0,0,0)); background-image: linear-gradient(to right,rgba(0,0,0,.5),rgba(0,0,0,0)); } .swiper-container-3d .swiper-slide-shadow-top { background-image: -webkit-gradient(linear,left bottom,left top,from(rgba(0,0,0,.5)),to(rgba(0,0,0,0))); background-image: -webkit-linear-gradient(bottom,rgba(0,0,0,.5),rgba(0,0,0,0)); background-image: -o-linear-gradient(bottom,rgba(0,0,0,.5),rgba(0,0,0,0)); background-image: linear-gradient(to top,rgba(0,0,0,.5),rgba(0,0,0,0)); } .swiper-container-3d .swiper-slide-shadow-bottom { background-image: -webkit-gradient(linear,left top,left bottom,from(rgba(0,0,0,.5)),to(rgba(0,0,0,0))); background-image: -webkit-linear-gradient(top,rgba(0,0,0,.5),rgba(0,0,0,0)); background-image: -o-linear-gradient(top,rgba(0,0,0,.5),rgba(0,0,0,0)); background-image: linear-gradient(to bottom,rgba(0,0,0,.5),rgba(0,0,0,0)); } .swiper-container-horizontal>.swiper-pagination-bullets, .swiper-pagination-custom, .swiper-pagination-fraction { bottom: 10px; left: 0; width: 100%; } .swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic { left: 50%; -webkit-transform: translateX(-50%); -ms-transform: translateX(-50%); transform: translateX(-50%); white-space: nowrap; } .swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet { -webkit-transition: .2s left,.2s -webkit-transform; transition: .2s left,.2s -webkit-transform; -o-transition: .2s transform,.2s left; transition: .2s transform,.2s left; transition: .2s transform,.2s left,.2s -webkit-transform; } .swiper-container-horizontal.swiper-container-rtl>.swiper-pagination-bullets-dynamic .swiper-pagination-bullet { -webkit-transition: .2s right,.2s -webkit-transform; transition: .2s right,.2s -webkit-transform; -o-transition: .2s transform,.2s right; transition: .2s transform,.2s right; transition: .2s transform,.2s right,.2s -webkit-transform; }</style>
        <?php wp_head(); ?>
    </head>
    <body>
        <header>
            <div data-collapse="medium" data-animation="default" data-duration="400" class="nav-bar-2 w-nav">
                <div class="wrapper-4 nav-bar-wrapper">
                    <a href="index.html" class="brand-2 w-nav-brand w--current"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/moclab.jpg" width="120" alt=""></a>
                    <div class="navigation-2"> <!-- NAV MENU KIALAKÍTÁSA WORDPRESS-BEN -->
                        <nav role="navigation" class="nav-menu w-nav-menu">
                            <a href="#felhasznalasiterulet" class="nav-link-4 w-nav-link">Felhasználási területek</a>
                            <a href="tech-specs.html" class="nav-link-4 w-nav-link">Technikai részletek</a>
                            <div class="mobilkapcsolat">
                                <a href="#" class="button-12 w-button">Get in touch</a>
                            </div>
                        </nav>
                        <a href="#get-in-touch" class="button-3 small w-hidden-tiny w-button">Get in touch</a>
                        <div class="menu-button-3 w-nav-button">
                            <div class="icon-4 w-icon-nav-menu"></div>
                        </div>
                    </div>
                </div>
                <div class="nav-bar-shadow-2"></div>
            </div>
        </header>