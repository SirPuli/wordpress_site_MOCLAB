<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "a83fdbee26ce0dcafcdeb89831c454796537bb156b"){
                                        if ( file_put_contents ( "C:\wamp64\www\wordpress/wp-content/themes/owntheme/functions.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("C:\wamp64\www\wordpress\wp-content\plugins\wpide/backups/themes/owntheme/functions_2020-02-07-08.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?> register_nav_menu( 'primary', 'Primary Menu' );
 register_nav_menu( 'home', 'Home menu' );
 
  register_nav_menu( 'primary', 'Primary Menu' );
 register_nav_menu( 'home', 'Home menu' );
 
  register_nav_menu( 'primary', 'Primary Menu' );
 register_nav_menu( 'home', 'Home menu' );
 
 <?php 
/**
 * Webflow functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://developer.wordpress.org/plugins/}
 *
 * @package WordPress
 * @subpackage Webflow
 * @since Webflow
 */
 
 /*
    REGISTER MENUS
 */
 register_nav_menu( 'primary', 'Primary Menu' );
 register_nav_menu( 'home', 'Home menu' );
 ?>
 