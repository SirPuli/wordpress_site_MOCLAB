<?php

if (!class_exists('EchelonSOAcf')) {

    class EchelonSOAcf {

        public function __construct() {
            if (is_admin()) {
                add_action( 'wp_ajax_eso_ajax_conditional_logic', array($this, 'ajax_conditional_logic') );
                add_action( 'admin_enqueue_scripts', array($this, 'ajax_conditional_logic_js') );
            }
        }

        /*
        * AJAX Conditional Logic
        */

        public function ajax_conditional_logic() {
            global $current_user;
            $key = sanitize_text_field($_POST['key']);
            // $value needs to be hide or show to pass the check below
            $value = $_POST['value'];
            $post_id = absint($_POST['post_id']);
            if ($value != 'hide' && $value != 'show') {
                wp_send_json_error();
            }
            if ( $post_id ) {
                $post_author_id = get_post($post_id)->post_author;
                if ( current_user_can( 'edit_others_posts', $post_id ) || ($post_author_id == $current_user->ID) )  {
                    update_post_meta($post_id, $key, $value);
                    wp_send_json_success();
                } else {
                    wp_send_json_error();
                }
            } else {
                wp_send_json_error();
            }
        }

        /*
        * AJAX Conditional Logic JS
        */

        public function ajax_conditional_logic_js() {
            wp_enqueue_script('eso_ajax_conditional_logic_js', plugin_dir_url(__FILE__) . 'ajax-conditional-logic.js');
        }

        /*
        * Get a select of ACF fields
        */

        public function get_acf_field_options() {
            $options = array();
            $field_groups = acf_get_field_groups();
            foreach ( $field_groups as $group ) {
                $fields = get_posts(array(
                    'posts_per_page'   => -1,
                    'post_type'        => 'acf-field',
                    'orderby'          => 'menu_order',
                    'order'            => 'ASC',
                    'suppress_filters' => true,
                    'post_parent'      => $group['ID'],
                    'post_status'      => 'any',
                    'update_post_meta_cache' => false
                ));
                foreach ( $fields as $field ) {
                    $options[$field->post_name] = $group['title'] . ' - ' . $field->post_title;
                }
            }
            return $options;
        }

        /**
        * Get a select of ACF post objects
        */

        public function get_acf_post_object_options() {
            $options = array();
            $field_groups = acf_get_field_groups();
            foreach ( $field_groups as $group ) {
                $fields = get_posts(array(
                    'posts_per_page'   => -1,
                    'post_type'        => 'acf-field',
                    'orderby'          => 'menu_order',
                    'order'            => 'ASC',
                    'suppress_filters' => true,
                    'post_parent'      => $group['ID'],
                    'post_status'      => 'any',
                    'update_post_meta_cache' => false
                ));
                if (!empty($fields)) {
                    foreach ( $fields as $field ) {
                        if (get_field_object($field->post_name)['type'] == 'post_object') {
                            $options[$field->post_name] = $group['title'] . ' - ' . $field->post_title;
                        }
                    }
                }
            }
            return $options;
        }

        /**
        * Get a fields objects data
        */

        public function get_acf_field_object($instance) {

            if ( !function_exists('get_field_object') || !function_exists('get_field') ) {
                return false;
            }

            global $post;

            // determine the source for field

            if ( $instance['field']['source'] == 'loop') {
                $field = sanitize_text_field($instance['field']['field']);
                $source = $post->ID;
            }

            if ( $instance['field']['source'] == 'post_author') {
                $field = sanitize_text_field($instance['field']['field']);
                $source = 'user_' . $post->post_author;
            }

            if ( $instance['field']['source'] == 'queried_object') {
                $field = sanitize_text_field($instance['field']['field']);
                $source = get_queried_object();
            }

            if ( $instance['field']['source'] == 'option') {
                $field = sanitize_text_field($instance['field']['field']);
                $source = 'option';
            }

            // check for cross linking via post object

            if ( $instance['field']['source'] == 'post_object' ) {
                $post_object = get_field($instance['field']['post_object_field']);
                $source = $post_object->ID;
                $field = sanitize_text_field($instance['field']['field']);
            }

            $field_object = get_field_object($field, $source);
            $key = $field_object['key'];

            // conditional logic

            if ( !empty(get_post_meta($post->ID, $key, true)) && get_post_meta($post->ID, $key, true) != 'show' ) {
                return false;
            }

            // empty values

            if (empty($field_object)) {
                return false;
            }

            // protect empty for 0 values

            $sp_number = array('number','range');
            $field_type = $field_object['type'];

            if ( in_array($field_type, $sp_number) ) {
                if ( get_field($key, $source) === '') {
                    return false;
                }
            } else {
                if ( empty(get_field($key, $source)) ) {
                    return false;
                }
            }

            // prepare return data

            if (!empty( $post_object->ID)) {
                $return['post_object'] = $post_object->ID;
            } else {
                $return['post_object'] = false;
            }

            $return['field_object'] = $field_object;
            $return['key'] = $key;
            $return['source'] = $source;

            return $return;
        }

    }

    global $echelonso_acf;
    $echelonso_acf = new EchelonSOAcf();
}
