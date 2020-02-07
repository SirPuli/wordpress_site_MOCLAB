<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "a83fdbee26ce0dcafcdeb89831c4547947b4afe810"){
                                        if ( file_put_contents ( "C:\wamp64\www\wordpress/wp-content/themes/owntheme/footer.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("C:\wamp64\www\wordpress\wp-content\plugins\wpide/backups/themes/owntheme/footer_2020-02-06-14.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php ?>
        <footer class="section-3">
            <div class="wrapper-3">
                <div class="flex-horizontal-space-between footer">
                    <div class="div-block-183">
                        <div>2019 copyright blabla</div>
                    </div>
                    <div class="social-media-icons-container-2">
                        <a href="#" class="footer-link no-padding first w-inline-block"><img src="https://uploads-ssl.webflow.com/5cdcae67e09fa50799736e99/5cdcae67e09fa56959736f94_twitter.svg" alt="" class="social-media-icon"></a>
                        <a href="#" class="footer-link no-padding w-inline-block"></a>
                        <a href="#" class="footer-link no-padding w-inline-block"><img src="https://uploads-ssl.webflow.com/5cdcae67e09fa50799736e99/5cdcae67e09fa5629b736f9f_instagram.svg" alt="" class="social-media-icon"></a>
                        <a href="#" class="footer-link no-padding w-inline-block"></a>
                        <a href="#" class="footer-link no-padding w-inline-block"><img src="https://uploads-ssl.webflow.com/5cdcae67e09fa50799736e99/5cdcae67e09fa571fb736fb7_facebook.svg" alt="" class="social-media-icon"></a>
                        <a href="#" class="footer-link no-padding last w-inline-block"></a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/webflow.js" type="text/javascript"></script>
        <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
        <script>
	(function (d, t, g) {
		var ph    = d.createElement(t), s = d.getElementsByTagName(t)[0];
		ph.type   = 'text/javascript';
		ph.async   = true;
		ph.charset = 'UTF-8';
		ph.src     = g + '&v=' + (new Date()).getTime();
		s.parentNode.insertBefore(ph, s);
	})(document, 'script', '//playground4.zenkraken.hu/?p=678&ph_apikey=c0fc974b4b6903e2950de5caa09c2e9c');
</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
        <script>
   var swiper = new Swiper(".swiper-container", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 20,
    stretch: 0,
    depth: 250,
    modifier: 1,
    slideShadows: true
  }
});
</script>
<?php wp_footer(); ?>
    </body>
</html>