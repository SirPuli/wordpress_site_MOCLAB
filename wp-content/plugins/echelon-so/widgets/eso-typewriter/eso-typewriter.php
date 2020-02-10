<?php
/*
Widget Name: E: Typewriter
Description: A type out, letter by letter typewriter effect.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoTypewriter extends SiteOrigin_Widget {

	function __construct() {


		parent::__construct(
			'echelonso-eso-typewriter',
			__('E: Typewriter', 'echelon-so'),
			array(
				'description' => __('A cool typewriter effect.', 'echelon-so' ),
			),
			false,
			array(),
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template Vars
	*/

	function get_template_variables( $instance, $args ) {

		// steps
		if (!empty($instance['strings'])) {
			// limit steps
			$sliced = array_slice($instance['strings'], 0, 3);
			$s = 'typewriter';
			foreach ($sliced as $k => $v) {
				$s .= ".typeString('".esc_js($v['text'])."')";
				$s .= '.pauseFor('.absint($v['pause_for']).')';
				if ($v['deletion_mode'] == 'delete_all') {
					$s .= '.deleteAll()';
				} else {
					$s .= '.deleteChars('.absint($v['delete_some']).')';
				}
				$s .= '.pauseFor('.absint($v['pause_for']).')';
			}
			$s .= '.start()';
		}

		$return['s'] = $s;

		// data
		$return['int_id'] = 'tw_' . uniqid(rand(1,9999));
		$return['cursor'] = !empty($instance['typewriter']['cursor']) ? $instance['typewriter']['cursor'] : '|';
		$return['loop'] = !empty($instance['typewriter']['loop']) ? 'true' : 'false';
		$return['delay'] = absint($instance['typewriter']['delay']);
		$return['before'] = $instance['typewriter']['before'];
		$return['after'] = $instance['typewriter']['after'];
		$return['text_color_typed'] = !empty($instance['typewriter']['text_color_typed']) ? sanitize_hex_color($instance['typewriter']['text_color_typed']) : 'inherit';

		// modifiers
		$return['wrap_class'] = array();
		(empty($instance['modifiers']['text_align'])) ?: $return['wrap_class'][] = $instance['modifiers']['text_align'];
		(empty($instance['modifiers']['inverse'])) ?: $return['wrap_class'][] = $instance['modifiers']['inverse'];

		$return['before_class'] = array();
		(empty($instance['modifiers']['font_size_before'])) ?: $return['before_class'][] = $instance['modifiers']['font_size_before'];
		(empty($instance['modifiers']['font_weight_before'])) ?: $return['before_class'][] = $instance['modifiers']['font_weight_before'];

		$return['typed_class'] = array();
		(empty($instance['modifiers']['font_size_typed'])) ?: $return['typed_class'][] = $instance['modifiers']['font_size_typed'];
		(empty($instance['modifiers']['font_weight_typed'])) ?: $return['typed_class'][] = $instance['modifiers']['font_weight_typed'];

		$return['after_class'] = array();
		(empty($instance['modifiers']['font_size_after'])) ?: $return['after_class'][] = $instance['modifiers']['font_size_after'];
		(empty($instance['modifiers']['font_weight_after'])) ?: $return['after_class'][] = $instance['modifiers']['font_weight_after'];


		return $return;
	}


	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['strings'] = array(
			'type' => 'repeater',
			'label' => __( 'Typewriter Steps' , 'echelon-so' ),
			'item_name'  => __( 'Step', 'echelon-so' ),
			'fields' => array(
				'text' => array(
					'type' => 'text',
					'label' => __( 'Text', 'echelon-so' ),
					'description' =>  __( 'The Text to type.', 'echelon-so')
				),
				'deletion_mode' => array(
					'type' => 'select',
					'label' => __( 'Deletion Mode', 'echelon-so' ),
					'description' =>  __( 'How the Typewriter should handle deleting the text from this step.', 'echelon-so'),
					'options' => array(
						'delete_all' => 'Delete All Letters',
						'delete_some' => 'Delete Some Letters',
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'deletion_mode_{$repeater}' ),
					)
				),
				'delete_some' => array(
					'type' => 'number',
					'label' => __( 'Delete Letter Count', 'echelon-so' ),
					'description' =>  __( 'How many letters to delete.', 'echelon-so'),
					'state_handler' => array(
						'deletion_mode_{$repeater}[delete_some]' => array('show'),
						'deletion_mode_{$repeater}[delete_all]' => array('hide')
					),
				),
				'pause_for' => array(
					'type' => 'slider',
					'default' => 1500,
					'min' => 0,
					'max' => 3000,
					'integer' => false,
					'label' => __( 'Pause For', 'echelon-so'),
					'description' =>  __( 'How long to pause before typing the next step. In milliseconds.', 'echelon-so' )
				)
			)
		);

		$return['typewriter'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'cursor' => array(
					'type' => 'text',
					'default' => '|',
					'label' => __( 'Cursor', 'echelon-so' ),
					'description' => __( 'Symbol to use for the insertion point cursor.', 'echelon-so' ),
				),
				'loop' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => __( 'Loop', 'echelon-so' ),
					'description' => __( 'Should the Typewriter repeat in a loop.', 'echelon-so' ),
				),
				'delay' => array(
					'type' => 'slider',
					'default' => 100,
					'min' => 0,
					'max' => 3000,
					'integer' => false,
					'label' => __( 'Delay', 'echelon-so' ),
					'description' => __( 'The time is takes for new letters to be typed. In milliseconds.', 'echelon-so' ),
				),
				'before' => array(
					'type' => 'text',
					'default' => '',
					'label' => __( 'Before Text', 'echelon-so' ),
				),
				'after' => array(
					'type' => 'text',
					'default' => '',
					'label' => __( 'After Text', 'echelon-so' ),
				),
				'text_color_typed' => array(
					'type' => 'color',
					'label' => __( 'Typed Text Color', 'echelon-so' )
				),
			)
		);

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'font_size_before' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Before Font Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'font_weight_before' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Before Font Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'font_size_typed' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Typed Font Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'font_weight_typed' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Typed Font Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'font_size_after' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('After Font Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'font_weight_after' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('After Font Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'text_align' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Text Align', 'echelon-so'),
					'options' => $echelon_so_modifiers->text_align()
				),
				'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Inverse', 'echelon-so'),
					'options' => $echelon_so_modifiers->inverse()
				),
			)
		);

		return $return;
	}

	/**
	* Scripts
	*/

	function initialize(){
		add_action( 'siteorigin_widgets_enqueue_frontend_scripts_' . $this->id_base, array( $this, 'enqueue_widget_scripts' ) );
	}

	function enqueue_widget_scripts($instance) {
		global $echelon_so;
		wp_enqueue_script( 'echelonso_typewriter', plugin_dir_url( __FILE__ ) . 'inc/typewriter.js', array('jquery'), $echelon_so->current_version(), true );
	}

	/*
	* Form Teaser
	*/

	function get_form_teaser() {
		global $echelon_so_teasers;
		return $echelon_so_teasers->teaser('eso-typewriter');
	}
}

siteorigin_widget_register('echelonso-eso-typewriter', __FILE__, 'EchelonSOEsoTypewriter');
