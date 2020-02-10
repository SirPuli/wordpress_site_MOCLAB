
<div class="eso-template-tag <?php echo esc_attr(implode(' ', $tag_class)); ?>">

    <?php

    /*
    * Blog Info
    */



    if ($template_tag == 'bloginfo') {

        $show = $instance['bloginfo']['show'];
        $shows = array('name', 'description', 'url');

        if ( !empty($instance['bloginfo']['create_home_link']) ) {
            echo '<a href="'.site_url().'">';
        }

        if (in_array($show, $shows)) {
            bloginfo(sanitize_text_field($instance['bloginfo']['show']));
        }

        if ( !empty($instance['bloginfo']['create_home_link']) ) {
            echo '</a>';
        }

    }

    /*
    * Post Date
    */

    if ($template_tag == 'post_date') {
        echo get_the_date();
    }

    /*
    * Author Meta
    */

    if ($template_tag == 'author_meta') {

        if ( !empty($instance['author_meta']['link']) ) {
            echo '<a href="' . get_author_posts_url(get_the_author_ID()) . '">';
        }

        $meta_field = sanitize_text_field($instance['author_meta']['meta_field']);
        the_author_meta($meta_field, get_the_author_ID());

        if ( !empty($instance['author_meta']['link']) ) {
            echo '</a>';
        }

    }

    /*
    * Category
    */

    if ($template_tag == 'category') {

        $sep = sanitize_text_field($instance['category']['sep']);
        the_category($sep);

    }

    /*
    * Excerpt
    */

    if ($template_tag == 'excerpt') {

        $words = $instance['excerpt']['words'];
        add_filter( 'excerpt_length', function( $length ) use( &$words ) {
            if (!empty((int)$words)) {
                return $words;
            } else {
                return 50;
            }
        }, 999, 1 );

        $more_text = $instance['excerpt']['more_text'];
        add_filter( 'excerpt_more', function ( $more )  use( &$more_text ) {
            if ( is_string($more_text) ) {
                return esc_html($more_text);
            } else {
                return '[...]';
            }
        }, 999, 1 );

        $old_value = apply_filters('siteorigin_panels_filter_content_enabled', true);

        add_filter('siteorigin_panels_filter_content_enabled', function() { return false; });

        echo get_the_excerpt();

        add_filter('siteorigin_panels_filter_content_enabled', function() use ($old_value) { return $old_value; });

    }

    /*
    * Permalink
    */

    if ($template_tag == 'permalink') {

        echo '<a href="' . the_permalink() . '">';
        echo esc_html($instance['permalink']['link_text']);
        echo '</a>';

    }

    /*
    * Tags
    */

    if ($template_tag == 'tags') {

        $sep = esc_html($instance['tags']['sep']);
        the_tags('', $sep, '');

    }

    /*
    * Title
    */

    if ($template_tag == 'title') {

        if ( !empty($instance['title']['link']) ) {
            $before = '<a href="' . get_permalink(get_the_ID()) .'">';
            $after = '</a>';
        } else {
            $before = '';
            $after = '';
        }

        the_title($before, $after, true);

    }

    /*
    * Content
    */

    if ($template_tag == 'content') {

        the_content();

    }


    /*
    * Terms
    */

    if ($template_tag == 'terms') {

        $taxonomy = sanitize_text_field($instance['terms']['taxonomy']);
        $sep = esc_html($instance['terms']['sep']);
        the_terms( get_the_ID(), $taxonomy, '', $sep, '' );

    }

    /*
    * Thumbnail
    */

    if ($template_tag == 'thumbnail') {

        $size = empty( $instance['thumbnail']['image_size'] ) ? 'full' : $instance['thumbnail']['image_size'];

        if (!empty( $instance['thumbnail']['link'])) {
            echo '<a href="' . get_permalink() . '" title="' . get_the_title(get_the_ID()) . '">';
        }

        the_post_thumbnail($size);

        if (!empty( $instance['thumbnail']['link'])) {
            echo '</a>';
        }

    }

    ?>
</div>
