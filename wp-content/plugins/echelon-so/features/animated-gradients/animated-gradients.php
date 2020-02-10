<?php

if (!class_exists('EchelonSOAnimatedGradients')) {

	class EchelonSOAnimatedGradients {

		public function __construct() {
			add_action( 'plugins_loaded', array($this, 'plugins_loaded') );
			add_action( 'wp_enqueue_scripts', array($this, 'wp_enqueue_scripts') );
			add_action( 'wp_head', array($this, 'head_css') );
		}

		/**
		* Plugins Loaded
		*/

		public function plugins_loaded() {
			add_filter( 'siteorigin_panels_general_style_groups', array($this, 'general_style_groups') );
			add_filter( 'siteorigin_panels_general_style_fields', array($this, 'general_style_fields') );
			add_filter( 'siteorigin_panels_general_style_attributes', array( $this, 'general_style_attributes' ), 10, 2 );
		}

		/**
		* Scripts
		*/

		public function wp_enqueue_scripts() {
			global $echelon_so;
			wp_enqueue_script( 'echelonso_granim', plugin_dir_url( __FILE__ ) . 'inc/granim.min.js', array('jquery'), $echelon_so->current_version() );
			wp_enqueue_script( 'echelonso_animated_gradients_js', plugin_dir_url( __FILE__ ) . 'inc/animated-gradients.js', array('echelonso_granim'), $echelon_so->current_version() );
		}

		/**
		* Head CSS
		*/

		public function head_css() {
			echo '<style type="text/css">.eso-animated-gradient { position: relative; } .eso-animated-gradient .gradient-canvas { position: absolute; display: block; width: 100%; height: 100%; top: 0; right: 0; bottom: 0; left: 0; z-index: 0; }  .eso-animated-gradient div { position: relative; z-index: 1;} </style>';
		}

		/**
		* Add the style group the modal UI panels, right hand side menus.
		*/

		public function general_style_groups($groups) {

			$groups['echelonso_gradient_states_group'] = array(
				'name'     => __( 'Background Gradient', 'echelon-so' ),
				'priority' => 9030
			);

			return $groups;
		}

		/**
		* Add the style fields into those groups above.
		*/

		public function general_style_fields($fields) {

			global $echelon_so_teasers, $echelon_so;

			$fields['echelonso_gradient_animation_direction'] = array(
				'name'        => __('Gradient Direction', 'echelon-so'),
				'type'        => 'select',
				'group'       => 'echelonso_gradient_states_group',
				'description' => __('Choose a direction for the gradient.', 'echelon-so') . $echelon_so_teasers->teaser('des-animated-gradient-direction') . $echelon_so->prime_link(),
				'priority'    => 1,
				'options'     => array(
					'left-right' => __('Left Right', 'echelon-so'),
					'top-bottom' => __('Top Bottom', 'echelon-so'),
				)
			);

			$fields['echelonso_gradient_animation_speed'] = array(
				'name'        => __('Transition Speed', 'echelon-so'),
				'type'        => 'text',
				'group'       => 'echelonso_gradient_states_group',
				'description' => __('Gradient transition speed in milliseconds.', 'echelon-so'),
				'priority'    => 2,
				'default'     => '2000'
			);

			// gradient 1
			$fields['echelonso_gradient_animation_1_start'] = array(
				'name'        => __('Gradient 1 Start', 'echelon-so'),
				'type'        => 'color',
				'group'       => 'echelonso_gradient_states_group',
				'description' => __('Gradient 1 start color.', 'echelon-so'),
				'priority'    => 101,
			);

			$fields['echelonso_gradient_animation_1_end'] = array(
				'name'        => __('Gradient 1 End', 'echelon-so'),
				'type'        => 'color',
				'group'       => 'echelonso_gradient_states_group',
				'description' => __('Gradient 1 end color.', 'echelon-so'),
				'priority'    => 103,
			);

			// gradient 2
			$fields['echelonso_gradient_animation_2_start'] = array(
				'name'        => __('Gradient 2 Start', 'echelon-so'),
				'type'        => 'color',
				'group'       => 'echelonso_gradient_states_group',
				'description' => __('Gradient 2 start color.', 'echelon-so'),
				'priority'    => 105,
			);

			$fields['echelonso_gradient_animation_2_end'] = array(
				'name'        => __('Gradient 2 End', 'echelon-so'),
				'type'        => 'color',
				'group'       => 'echelonso_gradient_states_group',
				'description' => __('Gradient 2 end color.', 'echelon-so'),
				'priority'    => 107,
			);

			// gradient 3
            $fields['echelonso_gradient_animation_3_start'] = array(
                'name'        => __('Gradient 3 Start', 'echelon-so'),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 3 start color.', 'echelon-so'),
                'priority'    => 110,
            );

            $fields['echelonso_gradient_animation_3_end'] = array(
                'name'        => __('Gradient 3 End', 'echelon-so'),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 3 end color.', 'echelon-so'),
                'priority'    => 111,
            );

            // gradient 4
            $fields['echelonso_gradient_animation_4_start'] = array(
                'name'        => __('Gradient 4 Start', 'echelon-so'),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 4 start color.', 'echelon-so'),
                'priority'    => 112,
            );

            $fields['echelonso_gradient_animation_4_end'] = array(
                'name'        => __('Gradient 4 End', 'echelon-so'),
                'type'        => 'color',
                'group'       => 'echelonso_gradient_states_group',
                'description' => __('Gradient 4 end color.', 'echelon-so'),
                'priority'    => 113,
            );

			return apply_filters('eso_animated_gradients', $fields);

		}

		public function general_style_attributes( $attributes, $style ) {

			if (!empty($style['echelonso_gradient_animation_1_start']) && !empty($style['echelonso_gradient_animation_1_end'])) {
				// prep the element
				$attributes['class'][] = 'eso-animated-gradient';
				$attributes['data-echelonso_animated_gradient'] = 'true';
				$id = 'ag_' . uniqid(rand(1,9999));
				$attributes['data-echelonso_animated_gradient_id'] = $id;
				// build granim data
				$args['granim'] = array();

				// check if we need to set a direction
				if (!empty($style['echelonso_gradient_animation_direction'])) {
					$args['granim']['direction'] = esc_attr($style['echelonso_gradient_animation_direction']);
				} else {
					$args['granim']['direction'] = 'top-bottom';
				}

				// set the speed atleast 1
				$args['granim']['speed'] = absint($style['echelonso_gradient_animation_speed']);

				// are there images and blending
				// if ( !empty($style['echelonso_gradient_animation_blending']) && !empty($style['echelonso_gradient_animation_image']) ) {
				// 	$args['granim']['blending'] = esc_attr($style['echelonso_gradient_animation_blending']);
				// 	$args['granim']['image'] = wp_get_attachment_image_src((int)$style['echelonso_gradient_animation_image'], 'full')[0];
				// }

				// performance
				$args['granim']['isPausedWhenNotInView'] = true;

				// add in the gradient states
				if ( !empty($style['echelonso_gradient_animation_1_start']) && !empty($style['echelonso_gradient_animation_1_end']) ) {
					$args['granim']['states']['gradients'][] = array(sanitize_hex_color($style['echelonso_gradient_animation_1_start']), sanitize_hex_color($style['echelonso_gradient_animation_1_end']));
				}

				if ( !empty($style['echelonso_gradient_animation_2_start']) && !empty($style['echelonso_gradient_animation_2_end']) ) {
					$args['granim']['states']['gradients'][] = array(sanitize_hex_color($style['echelonso_gradient_animation_2_start']), sanitize_hex_color($style['echelonso_gradient_animation_2_end']));
				}

				if ( !empty($style['echelonso_gradient_animation_3_start']) && !empty($style['echelonso_gradient_animation_3_end']) ) {
					$args['granim']['states']['gradients'][] = array(sanitize_hex_color($style['echelonso_gradient_animation_3_start']), sanitize_hex_color($style['echelonso_gradient_animation_3_end']));
				}

				if ( !empty($style['echelonso_gradient_animation_4_start']) && !empty($style['echelonso_gradient_animation_4_end']) ) {
					$args['granim']['states']['gradients'][] = array(sanitize_hex_color($style['echelonso_gradient_animation_4_start']), sanitize_hex_color($style['echelonso_gradient_animation_4_end']));
				}

				// add json to the element
				$attributes['data-echelonso_animated_gradient_data'] = json_encode($args['granim']);
			}
			return $attributes;
		}

	}
	$class = new EchelonSOAnimatedGradients();
}
