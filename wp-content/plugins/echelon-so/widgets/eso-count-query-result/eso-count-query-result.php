<?php
/*
Widget Name: E: Count Query Result
Description: Display the count from a posts query.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoCountQueryResult extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-count-query-result',
			__('E: Count Query Result', 'echelon-so' ),
			array(
				'description' => __('Display the count from a posts query.', 'echelon-so' ),
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
		$return = array();

		// the query to count
		$post_selector_pseudo_query = $instance['count_query_result']['query'];
		$processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );
		$query_result = new WP_Query( $processed_query );
		if ($query_result->have_posts()) {
			$return['found_posts'] = $query_result->found_posts;
		} else {
			$return['found_posts'] = false;
		}

		// class
		$return['class'] = array();
		(empty($instance['modifiers']['size'])) ?: $return['class'][] = $instance['modifiers']['size'];
		(empty($instance['modifiers']['weight']) && $instance['count_query_result']['font'] != 'default') ?: $return['class'][] = $instance['modifiers']['weight'];
		(empty($instance['modifiers']['alignment'])) ?: $return['class'][] = $instance['modifiers']['alignment'];
		(empty($instance['modifiers']['inverse'])) ?: $return['class'][] = $instance['modifiers']['inverse'];

		return $return;
	}

	/**
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['count_query_result'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'font' => array(
					'type' => 'font',
					'default' => 'default',
					'label' => __('Font', 'echelon-so'),
				),
				'query' => array(
					'type' => 'posts',
					'label' => __('Query', 'echelon-so' ),
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
					'options' => $echelon_so_modifiers->font_size()
				),
				'weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Font Weight', 'echelon-so'),
					'description' => $echelon_so_modifiers->font_weight(true),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'alignment' => array(
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
	* Google Font
	*/

	function get_style_name($instance) {
		if ( $instance['count_query_result']['font'] != 'default' ) {
			return 'style';
		}
		return false;
	}

	function get_google_font_fields($instance) {
		if ( $instance['count_query_result']['font'] != 'default' ) {
			return array(
				$instance['count_query_result']['font'],
			);
		}
		return false;
	}

	function get_less_variables($instance) {
		$return = array();
		if ( $instance['count_query_result']['font'] != 'default' ) {
			$font = siteorigin_widget_get_font( $instance['count_query_result']['font'] );
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
		return $echelon_so_teasers->teaser('generic');
	}

}

siteorigin_widget_register('echelonso-eso-count-query-result', __FILE__, 'EchelonSOEsoCountQueryResult');
