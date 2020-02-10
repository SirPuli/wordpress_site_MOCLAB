<div id="<?php echo $int_id; ?>" class="<?php echo esc_attr(implode(' ', $text_modifiers)); ?>" uk-slider="autoplay: true; autoplay-interval: 5000;">
    <ul class="uk-slider-items uk-child-width-1-1 uk-grid">

    </ul>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>

<script type="text/javascript">
(function($) {
    $(document).ready(function() {

        getTweets()

        function getTweets() {
            twitterFetcher.fetch({
                "profile": {"screenName": '<?php echo esc_attr($username); ?>'},
                "domId": '<?php echo $int_id; ?>',
                "maxTweets": <?php echo $max_tweets; ?>,
                "enableLinks": true,
                "showUser": true,
                "showTime": true,
                "showImages": false,
                "lang": 'en',
                "showInteraction": false,
                "customCallback": handleTweets,
            });
        }

        function handleTweets(tweets) {

            var n = 0;
            var x = tweets.length;

            var parts = [];
            var element = {};

            while(n < x) {
                element.time = $($.parseHTML(tweets[n])).filter('.timePosted').text();
                element.tweet = $($.parseHTML(tweets[n])).filter('.tweet').html();
                element.image_src = $($.parseHTML(tweets[n])).filter('.user').find('img').attr('src');
                element.user_url = $($.parseHTML(tweets[n])).filter('.user').find('a').attr('href');
                element.username = $($.parseHTML(tweets[n])).filter('.user').find('[data-scribe="element:screen_name"]').text();
                parts.push( element)
                element = {};
                n++;
            }


            html = '';

            $.each(parts, function(k, v) {
                html += '<li>';
                html += '<div class="uk-width-1-1 uk-flex uk-flex-top">';
                html += '<div class="uk-width-auto uk-margin-medium-right"><a href="' + v.user_url + '"><img class="uk-border-circle" src="' + v.image_src + '"></a></div>';
                html += '<div class="uk-width-expand"><div class="uk-margin-small-bottom">' + v.tweet + '</div><div>' + v.time + '</div></div>';
                html += '</div>';
                html += '</li>';
            })

            $('#<?php echo $int_id; ?> ul.uk-slider-items').html(html);

            // var slider = UIkit.slider($('#<?php echo $int_id; ?>'), {});

        }

    })
})(jQuery)
</script>
