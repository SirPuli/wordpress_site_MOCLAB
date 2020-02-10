<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "a83fdbee26ce0dcafcdeb89831c4547947b4afe810"){
                                        if ( file_put_contents ( "C:\wamp64\www\wordpress/wp-content/themes/owntheme/index.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("C:\wamp64\www\wordpress\wp-content\plugins\wpide/backups/themes/owntheme/index_2020-02-06-13.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?>