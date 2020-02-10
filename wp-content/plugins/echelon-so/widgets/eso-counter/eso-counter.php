<?php
/*
Widget Name: E: Counter
Description: Animate the count between two numbers.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/counter/
*/

class EchelonSOEsoCounter extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-counter',
			__('E: Counter', 'echelon-so'),
			array(
				'description' => __('Animate the count between two numbers.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/counter/'
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/**
	* Template Variables
	*/

	function get_template_variables($instance, $args) {
		// counter
		if ( !empty($instance['counter']['easing']) ) {
			$return['easing'] = 'true';
		} else {
			$return['easing'] = 'false';
		}
		$return['int_id'] = 'cu_' . uniqid(rand(1,9999));
		$return['grouping'] = 'false';
		$return['startVal'] = !empty($instance['counter']['start']) ? $instance['counter']['start'] : 0;
		$return['endVal'] =  !empty($instance['counter']['end']) ? $instance['counter']['end'] : 0;
		$return['duration'] = !empty($instance['counter']['duration']) ? $instance['counter']['duration'] : 0;
		$return['offset'] = !empty($instance['counter']['offset']) ? $instance['counter']['offset'] : 0;
		$return['decimal_places'] = 0;
		$return['decimal'] = '.';
		$return['separator'] = ',';
		$return['grouping'] = 'false';

		// modifiers
		$return['class'] = array();
		(empty($instance['modifiers']['size'])) ?: $return['class'][] = $instance['modifiers']['size'];
		(empty($instance['modifiers']['weight']) && $instance['counter']['font'] != 'default') ?: $return['class'][] = $instance['modifiers']['weight'];

		$return['wrapper_class'] = array();
		(empty($instance['modifiers']['align'])) ?: $return['class'][] = $instance['modifiers']['align'];
		(empty($instance['modifiers']['inverse'])) ?: $return['wrapper_class'][] = $instance['modifiers']['inverse'];

		return $return;
	}

	/**
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so, $echelon_so_modifiers;

		$option_use_grouping = 'Yes' . $echelon_so->prime_tag();
		$label_separator_character = 'Separator Character' . $echelon_so->prime_tag();
		$label_decimal_character = 'Decimal Character' . $echelon_so->prime_tag();
		$label_decimal_places = 'Decimal Places' . $echelon_so->prime_tag();

		$return['counter'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'start' => array(
					'type' => 'number',
					'label' => __( 'Start Number', 'echelon-so' ),
					'description' => __( 'The number to count from. E.g 1', 'echelon-so' ),
				),
				'end' => array(
					'type' => 'number',
					'label' => __( 'End Number', 'echelon-so' ),
					'description' => __( 'The number to count to. E.g 200', 'echelon-so' ),
				),
				'duration' => array(
					'type' => 'number',
					'label' => __( 'Duration', 'echelon-so' ),
					'description' => __( 'Duration of the count in seconds. E.g 2', 'echelon-so' ),
				),
				'easing' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __( 'Use Easing', 'echelon-so' ),
					'description' => __( 'Slow the counter as it nears the final number.', 'echelon-so' ),
				),
				'use_grouping' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( 'Use Grouping', 'echelon-so' ),
					'options' => array(
						'0' => __('No', 'echelon-so'),
						'1' => __( $option_use_grouping, 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'use_grouping' )
					),
				),
				'separator' => array(
					'type' => 'text',
					'default' => '',
					'label' => __( $label_separator_character, 'echelon-so' ),
					'description' => __( 'When grouping numbers this character will be used to separate thousands. E.g , (comma)', 'echelon-so' ),
					'state_handler' => array(
						'use_grouping[1]' => array('show'),
						'use_grouping[0]' => array('hide'),
					),
				),
				'decimal' => array(
					'type' => 'text',
					'default' => '',
					'label' => __( $label_decimal_character, 'echelon-so' ),
					'description' => __( 'When grouping numbers this character will be used to separate decimals. E.g . (dot)', 'echelon-so' ),
					'state_handler' => array(
						'use_grouping[1]' => array('show'),
						'use_grouping[0]' => array('hide'),
					),
				),
				'decimal_places' => array(
					'type' => 'number',
					'label' => __( $label_decimal_places, 'echelon-so' ),
					'description' => __( 'If using decimal values for the start and end numbers set the number of places here. E.g 2', 'echelon-so' ),
					'state_handler' => array(
						'use_grouping[1]' => array('show'),
						'use_grouping[0]' => array('hide'),
					),
				),
				'offset' => array(
					'type' => 'number',
					'label' => __('Inview Offset', 'echelon-so'),
					'description' => __('How many pixels the counter needs to be in view before it is animated. Recommended values are 0 - 400.', 'echelon-so'),
				),
				'font' => array(
					'type' => 'font',
					'default' => 'default',
					'label' => __('Font', 'echelon-so'),
					'description' => __('Use a Google Font for the counter.', 'echelon-so'),
				)
			)
		);

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Font Size', 'echelon-so'),
					'description' => $echelon_so_modifiers->font_size(true),
					'options' => $echelon_so_modifiers->font_size(),
				),
				'weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Font Weight', 'echelon-so'),
					'description' => $echelon_so_modifiers->font_weight(true),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'align' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Text Align', 'echelon-so'),
					'description' => $echelon_so_modifiers->text_align(true),
					'options' => $echelon_so_modifiers->text_align()
				),
				'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Inverse', 'echelon-so'),
					'description' => $echelon_so_modifiers->inverse(true),
					'options' => $echelon_so_modifiers->inverse()
				)
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
		wp_enqueue_script( 'echelonso_countup_cdn_js', 'https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.9.3/countUp.min.js', array('jquery'), '1.9.3', false );
	}

	/*
	* Google Font
	*/

	function get_style_name($instance) {
		if ( $instance['counter']['font'] != 'default' ) {
			return 'style';
		}
		return false;
	}

	function get_google_font_fields($instance) {
		if ( $instance['counter']['font'] != 'default' ) {
			return array(
				$instance['counter']['font'],
			);
		}
		return false;
	}

	function get_less_variables($instance) {
		$return = array();
		if ( $instance['counter']['font'] != 'default' ) {
			$font = siteorigin_widget_get_font( $instance['counter']['font'] );
			$return['font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$return['font_weight'] = $font['weight'];
			}
			return $return;
		}
		return false;
	}

	/*
	* Form Teaser
	*/

	function get_form_teaser() {
		global $echelon_so_teasers;
		return $echelon_so_teasers->teaser('eso-counter');
	}

}

siteorigin_widget_register('echelonso-eso-counter', __FILE__, 'EchelonSOEsoCounter');
