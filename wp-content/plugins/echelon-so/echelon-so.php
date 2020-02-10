<?php

/*
Plugin Name:	Echelon UIkit for SiteOrigin
Plugin URI:		https://echelonso.com
Description: 	UIkit powered widgets, features and presets for SiteOrigin Page Builder.
Version: 		2.0.7
Author: 		Echelon
Author URI:  	https://echelonso.com
License: 		GPL3
License URI: 	https://www.gnu.org/licenses/gpl-3.0.txt
*/

if (!class_exists('EchelonSO')) {

	class EchelonSO {

		public function __construct() {

			define('ECHELONSO', true);
			define('ECHELONSO_VERSION', '2.0.7');

			register_activation_hook( __FILE__, array( 'EchelonSO', 'install' ) );

			require 'inc/customiser.php';

			/*
			* Admin only
			*/

			if (is_admin()) {
				require 'inc/tools.php';
				require 'inc/ajax.php';
			}

			/*
			* Load global modifiers
			*/

			require 'inc/modifiers.php';

			/*
			* Load widget teasers
			*/

			require 'inc/teasers.php';

			/*
			* Load features
			*/

			// reusable layouts
			add_action( 'init', array($this, 'reusable_layouts_cpt_tax'));

			require 'features/animate/animate.php';
			require 'features/animated-gradients/animated-gradients.php';
			require 'features/attribute/attribute.php';
			require 'features/background-rgba/background-rgba.php';
			require 'features/custom-palette/custom-palette.php';
			require 'features/helper-css/helper-css.php';
			require 'features/cell-flex/cell-flex.php';
			require 'features/linked-widgets/linked-widgets.php';
			require 'features/sticky/sticky.php';
			require 'features/hover-transition/hover-transition.php';
			require 'features/parallax/parallax.php';
			require 'features/scrollspy/scrollspy.php';

			/*
			* Other actions
			*/

			// add_action( 'wp_ajax_so_panels_widget_form', array( $this, 'keep_teasers' ) );
			add_action( 'plugins_loaded', array($this, 'plugins_loaded'));
			add_action( 'wp_enqueue_scripts', array($this, 'scripts'));
			add_action( 'admin_enqueue_scripts', array($this, 'admin_scripts'), 100);
			add_action( 'customize_controls_print_footer_scripts', array($this, 'admin_scripts'), 100);
			add_action( 'admin_notices', array($this, 'admin_notices') );
			add_action( 'wp_head', array($this, 'wp_head'));
		}

		/*
		* Activation function
		*/

		static function install() {
			// compile the Less on activation
			require 'inc/less/less.php';
		}

		/*
		* Current Version
		*/

		public function current_version() {
			return '2.0.7';
		}

		/*
		* Prime tag
		*/

		public function prime_tag() {
			if ( defined('ECHELONSO_PRIME') ) {
				return '';
			}
			return ' (Prime)';
		}

		/*
		* Prime link
		*/

		public function prime_link() {
			if ( defined('ECHELONSO_PRIME') ) {
				return '';
			}
			return '<br><br><a class="button-primary" target="_blank" href="https://echelonso.com/prime/">Get Prime</a>';
		}

		/*
		* Plugin row meta link
		*/

		public function custom_plugin_row_meta( $links, $file ) {
			if ( strpos( $file, 'echelon-so.php' ) !== false ) {
				$new_links['eso_prime'] = '<a target="_blank" style="color: #3db634;" href="https://echelonso.com/prime/">Get Prime</a>';
				$new_links['eso_support'] = '<a href="https://wordpress.org/support/plugin/echelon-so/" target="_blank">Support</a>';
				$links = array_merge( $links, $new_links );
			}
			return $links;
		}

		/*
		* Image sizes select option
		*/

		public function image_sizes() {
			$sizes = get_intermediate_image_sizes();
			foreach ($sizes as $k => $v) {
				$return[$v] = $v;
			}
			$return['0'] = '-';
			return $return;
		}

		/*
		* Plugins loaded
		*/

		public function plugins_loaded() {

			add_filter( 'siteorigin_widgets_widget_folders', array($this, 'widget_folders') );
			add_filter( 'siteorigin_widgets_widget_banner', array($this, 'widget_banner'), 10, 2 );
			add_filter( 'plugin_row_meta', array($this, 'custom_plugin_row_meta'), 10, 2 );
			add_filter( 'siteorigin_widgets_field_class_prefixes', array($this, 'widget_fields_class_prefixes') );
			add_filter( 'siteorigin_widgets_field_class_paths', array($this, 'widget_fields_class_paths') );

			if (class_exists('ACF')) {
				require 'acf/acf/eso-acf.php';
				add_filter( 'siteorigin_widgets_widget_folders', array($this, 'acf_widget_folders') );
				add_filter( '404_template', array($this, 'cb_404_template') );
				add_filter( 'single_template', array($this, 'single_template') );
				add_filter( 'acf/settings/load_json', array($this, 'acf_json_load_point') );
				add_filter( 'acf/load_field/name=echelonso_post_type', array( $this, 'acf_post_type_choices') );
			}

		}

		/*
		*
		*  ECHELON ACF
		*
		*/

		/*
		* ACF: Load the json for Echelon layouts
		*/

		public function acf_json_load_point( $paths ) {
			$paths[] = $path = plugin_dir_path(__FILE__) . 'acf/acf-json/load';
			return $paths;
		}

		/*
		* ACF: Load the ACF widget
		*/

		public function acf_widget_folders($folders) {
			$folders['echelonso_acf_widgets'] = plugin_dir_path(__FILE__) . 'acf/widgets/';
			return $folders;
		}

		/*
		* ACF: Allow the selection of ACF fields in the widget
		*/

		function acf_post_type_choices( $field ) {
			$field['choices'] = array();
			$choices = get_post_types( array('public' => true, '_builtin' => false) );
			$field['choices']['post'] = 'post';
			if( is_array($choices) ) {
				foreach( $choices as $choice ) {
					$field['choices'][ $choice ] = $choice;
				}
			}
			unset($field['choices']['echelonso_layout']);
			return $field;
		}

		/*
		* ACF: Allow overriding the single tamplate for CPT
		*/

		public function single_template( $template ) {

			$posts = get_posts(array(
				'numberposts'	=> -1,
				'post_type'		=> 'echelonso_layout',
				'meta_query' => array(
					array(
						'key'     => 'echelonso_post_type',
						'value'   => get_post_type(),
					),
					array(
						'key'     => 'echelonso_layout_type',
						'value'   => 'single',
					),
				),
			));

			if ( !empty($posts) && function_exists('siteorigin_panels_render') ) {
				global $echelonso_template;
				$echelonso_template = $posts[0]->ID;
				$template = plugin_dir_path(__FILE__) . 'acf/templates/single.php';
			}

			return $template;
		}

		/*
		* ACF: Allow overriding the 404 tamplate
		*/

		public function cb_404_template( $template ) {

			$posts = get_posts(array(
				'numberposts'	=> -1,
				'post_type'		=> 'echelonso_layout',
				'meta_key'		=> 'echelonso_layout_type',
				'meta_value'	=> 'x404'
			));

			if ( !empty($posts) && function_exists('siteorigin_panels_render') ) {
				global $echelonso_template;
				$echelonso_template = $posts[0]->ID;
				$template = plugin_dir_path(__FILE__) . 'acf/templates/render.php';
			}

			return $template;
		}

		/*
		*
		*  ECHELON NON ACF
		*
		*/

		/*
		* Widget folders
		*/

		public function widget_folders($folders) {
			if ( get_option('echelonso_widgets', 'enabled') == 'enabled' ) {
				$folders['echelonso_widgets'] = plugin_dir_path(__FILE__) . 'widgets/';
			}
			return $folders;
		}


		/*
		* Widget fields class prefixes
		*/

		public function widget_fields_class_prefixes( $class_prefixes ) {
			$class_prefixes[] = 'Echelon_';
			return $class_prefixes;
		}

		/**
		* Widget fields class paths
		*/

		public function widget_fields_class_paths( $class_paths ) {
			$class_paths[] = plugin_dir_path( __FILE__ ) . 'custom-fields/';
			return $class_paths;
		}

		/*
		* Scripts
		*/

		public function scripts() {
			wp_enqueue_style( 'echelonso_uikit_compiled', wp_get_upload_dir()['baseurl'] . "/echelon-so/echelon.css", array(), get_option('eso_css_rand'));
			wp_enqueue_script('echelonso_js', plugin_dir_url(__FILE__) . 'inc/echelon.js', array('jquery'), $this->current_version(), false);
			wp_enqueue_script('echelonso_uikit', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit.min.js', array('jquery'), '3.1.6', false);
			wp_enqueue_script('echelonso_uikit_icons', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-icons.min.js', array('jquery'), '3.1.6', false);
		}

		public function admin_scripts() {
			wp_enqueue_script('echelonso_alpha_picker_js', plugin_dir_url(__FILE__) . 'custom-fields/alpha-color-picker/alpha-color-picker.js', array('jquery', 'wp-color-picker'), $this->current_version(), true);
			wp_enqueue_style( 'echelonso_alpha_picker_css', plugin_dir_url(__FILE__) . 'custom-fields/alpha-color-picker/alpha-color-picker.css', array('wp-color-picker'), $this->current_version());
		}

		/*
		* Register Reusable Layouts CPT and Taxes
		*/

		public function reusable_layouts_cpt_tax() {

			register_taxonomy(
				'echelonso_layout_cat',
				'echelonso_layout',
				array(
					'hierarchical' => true,
					'label' => __('Categories', 'echelon-so'),
					'query_var' => true,
					'has_archive' => false,
					'show_in_nav_menus' => false,
					'show_admin_column' => true
				)
			);

			register_taxonomy(
				'echelonso_layout_tag',
				'echelonso_layout',
				array(
					'hierarchical' => false,
					'label' => __('Tags', 'echelon-so'),
					'query_var' => true,
					'has_archive' => false,
					'show_in_nav_menus' => false,
					'show_admin_column' => true
				)
			);

			register_post_type( 'echelonso_layout', array(
				'label'  => __('Echelon Layouts', 'echelon-so'),
				'public' => true,
				'has_archive' => false,
				'show_in_nav_menus' => false,
				'menu_position' => 80,
				'menu_icon' => 'dashicons-layout',
				'exclude_from_search' => true
			));
		}

		/*
		* Get echelonso_layout names
		*/

		public function get_layout_select_options() {
			$args = array(
				'post_type'=> 'echelonso_layout',
				'posts_per_page' => -1,
				'orderby' => 'post_title',
				'order' => 'ASC'
			);
			$the_query = new WP_Query( $args );
			$options = array();
			$options[0] = __('None', 'echelon-so');
			if ( $the_query->have_posts() ) {
				foreach ($the_query->posts as $k => $v) {
					$options[$v->ID] = $v->post_title;
				}
			}
			return $options;
		}

		/**
		* Widget banners
		*/

		public function widget_banner( $banner_url, $widget_meta ) {

			$widgets = array(
				'eso-acf-field',
				'eso-before-after',
				'eso-button',
				'eso-card',
				'eso-comment',
				'eso-count-query-result',
				'eso-counter',
				'eso-custom-loop',
				'eso-description-list',
				'eso-divider',
				'eso-feature',
				'eso-filter',
				'eso-heading',
				'eso-icon-list',
				'eso-label',
				'eso-lightbox-component-image',
				'eso-lightbox-gallery',
				'eso-modal',
				'eso-nav',
				'eso-navigator',
				'eso-off-canvas',
				'eso-overlay',
				'eso-pricing',
				'eso-radial',
				'eso-reuse-layout',
				'eso-slabtext',
				'eso-slider',
				'eso-slideshow',
				'eso-smooth-scroll',
				'eso-tabs',
				'eso-text',
				'eso-text-rotator',
				'eso-template-tag',
				'eso-twitter-feed',
				'eso-typewriter',
				'eso-video',
				'eso-woocommerce-tag',
			);

			if ( in_array($widget_meta['ID'], $widgets) ) {
				return plugin_dir_url( __FILE__ ) . 'inc/widget-icon.png?v=' . $this->current_version();
			}

			return $banner_url;

		}

		private function get_widget_base_ids() {
			return array(
				'echelonso-eso-acf-field',
				'echelonso-eso-before-after',
				'echelonso-eso-button',
				'echelonso-eso-card',
				'echelonso-eso-comment',
				'echelonso-eso-count-query-result',
				'echelonso-eso-counter',
				'echelonso-eso-custom-loop',
				'echelonso-eso-description-list',
				'echelonso-eso-divider',
				'echelonso-eso-feature',
				'echelonso-eso-filter',
				'echelonso-eso-heading',
				'echelonso-eso-icon-list',
				'echelonso-eso-label',
				'echelonso-eso-lightbox-component-image',
				'echelonso-eso-lightbox-gallery',
				'echelonso-eso-modal',
				'echelonso-eso-nav',
				'echelonso-eso-navigator',
				'echelonso-eso-off-canvas',
				'echelonso-eso-overlay',
				'echelonso-eso-pricing',
				'echelonso-eso-radial',
				'echelonso-eso-reuse-layout',
				'echelonso-eso-slabtext',
				'echelonso-eso-slider',
				'echelonso-eso-slideshow',
				'echelonso-eso-smooth-scroll',
				'echelonso-eso-tabs',
				'echelonso-eso-text',
				'echelonso-eso-text-rotator',
				'echelonso-eso-template-tag',
				'echelonso-eso-twitter-feed',
				'echelons0-eso-typewriter',
				'echelonso-eso-video',
				'echelonso-eso-woocommerce-tag',
			);
		}

		/*
		* Get SO breakpoint widths
		*/

		public function get_breakpoints($as_int = false) {
			if (function_exists('siteorigin_panels_setting')) {
				$settings = siteorigin_panels_setting();
				if ($as_int == true) {
					$break_points['tablet'] = $settings['tablet-width'];
					$break_points['mobile'] = $settings['mobile-width'];
				} else {
					$break_points['tablet'] = ($settings['tablet-width'] + 1) . 'px';
					$break_points['mobile'] = ($settings['mobile-width'] + 1) . 'px';
				}
			} else {
				if ($as_int == true) {
					$break_points['tablet'] = 1000;
					$break_points['mobile'] = 500;
				} else {
					$break_points['tablet'] = '1000px';
					$break_points['mobile'] = '500px';
				}
			}
			return $break_points;
		}

		/*
		* Setup default palette colors
		*/

		public function get_palette_colors() {
			$options = get_option('echelonso_options');
			$return['color_1'] = (isset($options['custom_palette_1']) ? $options['custom_palette_1'] : '#000000');
			$return['color_2'] = (isset($options['custom_palette_2']) ? $options['custom_palette_2'] : '#ffffff');
			$return['color_3'] = (isset($options['custom_palette_3']) ? $options['custom_palette_3'] : '#dd3333');
			$return['color_4'] = (isset($options['custom_palette_4']) ? $options['custom_palette_4'] : '#dd9933');
			$return['color_5'] = (isset($options['custom_palette_5']) ? $options['custom_palette_5'] : '#eeee22');
			return apply_filters('eso_palette_colors', $return);
		}

		/*
		* Admin notices
		*/

		public function admin_notices() {
			$file = wp_upload_dir()['basedir'] . "/echelon-so/echelon.css";
			if ( !file_exists($file) ) {
				?>
				<div class="notice notice-error">
					<p><?php _e( 'You need to generate Echelon plugins styles under Tools > Regenerate Echelon Plugin Styles', 'echelon-so' ); ?></p>
				</div>
				<?php
			}
		}

		/*
		* Form Teaser
		*/

		public function form_teaser() {
			if ( defined('ECHELONSO_PRIME') ) {
				return '';
			}
			return '<a href="https://echelonso.com/prime/" target="_blank">Join Prime</a> for upgraded widgets, enhanced features and email support.';
		}

		/**
		* CSS for the header
		*/

		private function get_head_css() {
			global $echelon_so;
			ob_start();
			?>
			<style type="text/css">
			body {
				overflow-x: hidden;
			}
			.eso-animate-hidden .so-panel {
				visibility:hidden;
			}
			.eso-animate-hidden .so-panel.eso-animate-visible {
				visibility: visible;
			}
			.eso-animate-hidden-widget {
				visibility:hidden;
			}
			.eso-animate-hidden-widget.eso-animate-visible-widget {
				visibility: visible;
			}
			@media only screen and (max-width: <?php echo $this->get_breakpoints()['mobile']; ?>) {
				.eso-hide-mobile {
					display: none !important;
				}
			}
			@media only screen and (min-width: <?php echo $this->get_breakpoints()['mobile']; ?>) and (max-width: <?php echo $this->get_breakpoints()['tablet']; ?>){
				.eso-hide-tablet {
					display: none !important;
				}
			}
			@media only screen and (min-width: <?php echo $this->get_breakpoints()['tablet']; ?>){
				.eso-hide-desktop {
					display: none !important;
				}
			}
			</style>
			<?php
			$str = str_replace(array("\r","\n"),'',trim(ob_get_clean()));
			$str = str_replace("			", ' ', $str);
			$str = str_replace("  ", ' ', $str);
			return $str;
		}

		public function wp_head() {
			echo $this->get_head_css();
		}



	}

	global $echelon_so;
	$echelon_so = new EchelonSO();
}
