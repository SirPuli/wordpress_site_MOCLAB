<?php
/*
Widget Name: E: Twitter Feed
Description: Display your recent tweets.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoTwitterFeed extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-twitter-feed',
			__('E: Twitter Feed', 'echelon-so'),
			array(
				'description' => __('Display your recent tweets.', 'echelon-so' ),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template Name
	*/

	function get_template_name($instance) {
		$allowed_templates = array('default', 'slider');
		if ( in_array($instance['twitter_feed']['template'], $allowed_templates) ) {
			return $instance['twitter_feed']['template'];
		} else {
			return 'default';
		}
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {
		$return['int_id'] = 'tf_' . uniqid(rand(1,9999));
		$return['username'] = !empty( $instance['twitter_feed']['username'] ) ? $instance['twitter_feed']['username'] : '';
		$return['max_tweets'] = absint($instance['twitter_feed']['max_tweets']);
		return $return;
	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {
		$return['inner_border'] = !empty( $instance['twitter_feed']['inner_border'] ) ? $instance['twitter_feed']['inner_border'] : false;
		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so, $echelon_so_modifiers;

		$option_template_sv = 'Slider Vertical' . $echelon_so->prime_tag();

		$return['twitter_feed'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'template' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Template', 'echelon-so'),
					'options' => array(
						'default' => __('Default', 'echelon-so'),
						'slider' => __('Slider', 'echelon-so'),
						'slider_vertical' => __($option_template_sv, 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'template' )
					)
				),
				'username' => array(
					'type' => 'text',
					'label' => __( 'Username', 'echelon-so' ),
					'default' => 'wptavern'
				),
				'max_tweets' => array(
					'type' => 'number',
					'label' => __( 'Max Tweet', 'echelon-so' ),
					'default' => 3
				),
				'inner_border' => array(
					'type' => 'color',
					'label' => __( 'Inner Border', 'echelon-so' ),
					'default' => '#ececec'
				),
			)
		);

		return $return;
	}

	/*
	* Scripts
	*/

	function initialize(){
		add_action( 'siteorigin_widgets_enqueue_frontend_scripts_' . $this->id_base, array( $this, 'enqueue_widget_scripts' ) );
	}

	function enqueue_widget_scripts($instance) {
		$js = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-fetcher/18.0.2/js/twitterFetcher_min.js';
		wp_enqueue_script('echelonso_twitter_feed_cdn_js', $js, array('jquery'), '18.0.2', false);
	}

	/*
	* Form Teaser
	*/

	function get_form_teaser() {
		global $echelon_so_teasers;
		return $echelon_so_teasers->teaser('eso-twitter-feed');
	}

}

siteorigin_widget_register('echelonso-eso-twitter-feed', __FILE__, 'EchelonSOEsoTwitterFeed');
